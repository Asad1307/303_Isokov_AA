#!/bin/bash
chcp 65001

sqlite3 movies_rating.db < db_init.sql

echo "1. Найти все комедии, выпущенные после 2000 года, которые понравились мужчинам (оценка не ниже 4.5). Для каждого фильма в этом списке вывести название, год выпуска и количество таких оценок."
echo "--------------------------------------------------"
sqlite3 movies_rating.db -box -echo "select m.title, m.year, count(rating) as ratings_count from movies m join ratings r on m.id = r.movie_id join users u on r.user_id = u.id where instr(m.genres, 'Comedy') > 0 and u.gender = 'male' and m.year > 2000 and rating >= 4.5 group by m.id;"
echo " "

echo "2. Провести анализ занятий (профессий) пользователей - вывести количество пользователей для каждого рода занятий. Найти самую распространенную и самую редкую профессию посетитетей сайта."
echo "--------------------------------------------------"
sqlite3 movies_rating.db -box -echo "create view occupation_statistics as select occupation as 'Occupation', count(occupation) as 'Number' from users group by occupation;" 
sqlite3 movies_rating.db -box -echo "select * from occupation_statistics;"
sqlite3 movies_rating.db -box -echo "select Occupation, Number from(select *, max(Number)over() as 'Popular', min(Number)over() as 'Unpopular' from occupation_statistics) where Number=Popular or Number=Unpopular;"
sqlite3 movies_rating.db -box -echo "drop view occupation_statistics;"
echo " "

echo "3. Найти все пары пользователей, оценивших один и тот же фильм. Устранить дубликаты, проверить отсутствие пар с самим собой. Для каждой пары должны быть указаны имена пользователей и название фильма, который они ценили."
echo "--------------------------------------------------"
sqlite3 movies_rating.db -box -echo "Select DISTINCT title as 'Movie', u1.name as 'User 1', u2.name as 'User 2' FROM ratings a, ratings b INNER JOIN movies ON a.movie_id = movies.id INNER JOIN users u1 ON a.user_id = u1.id INNER JOIN users u2 ON b.user_id = u2.id WHERE a.movie_id = b.movie_id and a.user_id < b.user_id order by title limit 100;"
echo " "

echo "4. Найти 10 самых свежих оценок от разных пользователей, вывести названия фильмов, имена пользователей, оценку, дату отзыва в формате ГГГГ-ММ-ДД."
echo "--------------------------------------------------"
sqlite3 movies_rating.db -box -echo "create view user_movies_ratings as select ratings.user_id as 'userID', ratings.movie_id as 'movieID', ratings.rating as 'Rating', max(ratings.timestamp) as 'Date' from ratings group by ratings.user_id order by timestamp desc;"
sqlite3 movies_rating.db -box -echo "select movies.title as 'Movie', users.name as 'Name', Rating, date(Date,'unixepoch') as 'Date' from movies, users, user_movies_ratings where movies.id = movieID and users.id = userID limit 10;"
sqlite3 movies_rating.db -box -echo "drop view user_movies_ratings;"
echo " "

echo "5. Вывести в одном списке все фильмы с максимальным средним рейтингом и все фильмы с минимальным средним рейтингом. Общий список отсортировать по году выпуска и названию фильма. В зависимости от рейтинга в колонке "Рекомендуем" для фильмов должно быть написано "Да" или "Нет"."
echo "--------------------------------------------------"
sqlite3 movies_rating.db -box -echo "create view average_ratings as select movies.title as 'Movie', movies.year as 'Year', Rating from movies inner join(select ratings.movie_id, avg(ratings.rating) as 'Rating' from ratings group by ratings.movie_id) ratings on ratings.movie_id = movies.id;"
sqlite3 movies_rating.db -box -echo "select Movie, Year, Rating, case when MaxRating = Rating then 'Yes' else 'No' end as Recommend from(select *, max(Rating)over() as 'MaxRating', min(Rating)over() as 'MinRating' from average_ratings) where Rating = MaxRating or Rating = MinRating order by Year, Movie;"
echo " "

echo "6. Вычислить количество оценок и среднюю оценку, которую дали фильмам пользователи-женщины в период с 2010 по 2012 год."
echo "--------------------------------------------------"
sqlite3 movies_rating.db -box -echo "select count(*) as ratings_count, round(avg(r.rating), 2) as ratings_average from ratings r join users u on r.user_id = u.id where u.gender = 'female' and datetime(r.timestamp, 'unixepoch') between '2010-01-01' and '2012-01-01';"
echo " "

echo "7. Составить список фильмов с указанием их средней оценки и места в рейтинге по средней оценке. Полученный список отсортировать по году выпуска и названиям фильмов. В списке оставить первые 20 записей."
echo "--------------------------------------------------"
sqlite3 movies_rating.db -box -echo "select *, dense_rank()over(order by Rating desc) as 'Place' from average_ratings order by Year, Movie limit 20;"
sqlite3 movies_rating.db -box -echo "drop view average_ratings;"
echo " "

echo "8. Определить самый распространенный жанр фильма и количество фильмов в этом жанре."
echo "--------------------------------------------------"
sqlite3 movies_rating.db -box -echo "create view genres_statistics as with t(id,gen, rest) as(select id, null, genres from movies union all select id, case when instr(rest,'|') = 0 then rest else substr(rest,1,instr(rest,'|')-1) end, case when instr(rest,'|')=0 then null else substr(rest,instr(rest,'|')+1) end from t where rest is not null order by id) select gen as 'Genres', count(id) as 'Number' from t where gen is not null group by gen;"
sqlite3 movies_rating.db -box -echo "select Genres as genre, max(Number) as movies_count from genres_statistics;"
sqlite3 movies_rating.db -box -echo "drop view genres_statistics;"
