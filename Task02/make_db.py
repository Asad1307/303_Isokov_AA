import csv
import re
import os

RESULT_FILE_PATH = 'db_init.sql'

create_tables_queries = {
    "movies": 'CREATE TABLE IF NOT EXISTS movies(id INTEGER PRIMARY KEY, title TEXT, year INTEGER, genres TEXT);\n',
    "ratings": 'CREATE TABLE IF NOT EXISTS ratings(id INTEGER PRIMARY KEY, user_id INTEGER, movie_id INTEGER, rating REAL, timestamp INTEGER);\n',
    "tags": 'CREATE TABLE IF NOT EXISTS tags(id INTEGER PRIMARY KEY, user_id INTEGER, movie_id INTEGER, tag TEXT, timestamp INTEGER);\n',
    "users": 'CREATE TABLE IF NOT EXISTS users(id INTEGER PRIMARY KEY, name TEXT, email TEXT, gender TEXT, register_date TEXT, occupation TEXT);\n'
}

purge_tables_queries = {
    "movies": 'DROP TABLE IF EXISTS movies;\n',
    "ratings": 'DROP TABLE IF EXISTS ratings;\n',
    "tags": 'DROP TABLE IF EXISTS tags;\n',
    "users": 'DROP TABLE IF EXISTS users;\n'
}

fill_database_core_queries = {
    "movies": 'INSERT INTO movies (id, title, year, genres)\nVALUES \n',
    "ratings": 'INSERT INTO ratings (user_id, movie_id, rating, timestamp)\nVALUES \n',
    "tags": 'INSERT INTO tags (user_id, movie_id, tag, timestamp)\nVALUES \n',
    "users": 'INSERT INTO users (id, name, email, gender, register_date, occupation)\nVALUES \n'
}

def delete_init_file():
    try:
        os.remove(RESULT_FILE_PATH)
    except OSError:
        pass

def write_create_tables_queries(file):
    file.write(create_tables_queries['movies'])
    file.write(create_tables_queries['ratings'])
    file.write(create_tables_queries['tags'])
    file.write(create_tables_queries['users'])

def write_purge_database_queries(file):
    file.write(purge_tables_queries['movies'])
    file.write(purge_tables_queries['ratings'])
    file.write(purge_tables_queries['tags'])
    file.write(purge_tables_queries['users'])

def insert_into(file_name):
    current_file = open(file_name, 'r')

    file_type = file_name[-3:]
    table_name = file_name[:-4]

    insert_into_table_query_part = fill_database_core_queries[table_name]

    full_query = insert_into_table_query_part

    lines = None
    splitter = None
    if file_type == 'csv':
        lines = current_file.readlines()[1:]
        splitter = ','
    else:
        lines = current_file.readlines()
        splitter = '|'

    comma = ','

    for raw_line in lines:
        fields = raw_line.split(splitter)

        fields[:] = ['"' + x.replace('"', '""').replace('\'', '\'\'').replace('\n', '') + '"' for x in fields]

        comma_separated_fields = comma.join(fields)
        values_to_insert_query_part = '(' + comma_separated_fields + ')'
        full_query += values_to_insert_query_part + ',\n'

    return full_query[:-2] + ';\n'

def insert_into_movies(file_name):
    movies_file_csv =  open(file_name, 'r')
    dict_reader = csv.DictReader(movies_file_csv)

    insert_into_table_query_part = fill_database_core_queries['movies']

    full_query = insert_into_table_query_part

    for row in dict_reader:
        title = row['title'].replace('"', '""').replace('\'', '\'\'')
        year = get_year_from_title(row['title'])
        full_query += f"({row['movieId']}, \"{title[:-7]}\", {year}, \"{row['genres']}\"),\n"

    return full_query[:-2] + ';\n'

def get_year_from_title(line):
    result = re.search(r'\d{4}', line)

    if result == None:
        return 'null'

    return result.group(0)

def write_insert_queries(file):
    insertUsersQuery = insert_into('users.txt')
    insertMoviesQuery = insert_into_movies('movies.csv')
    insertRatingsQuery = insert_into('ratings.csv')
    insertTagsQuery = insert_into('tags.csv')

    write(file, insertUsersQuery)
    write(file, insertMoviesQuery)
    write(file, insertRatingsQuery)
    write(file, insertTagsQuery)

def write(file, line):
    file.write(line)

def handle():
    delete_init_file()
    file = open(RESULT_FILE_PATH, 'a')
    write_purge_database_queries(file)
    write_create_tables_queries(file)
    write_insert_queries(file)
    file.close()

handle()