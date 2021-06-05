PRAGMA foreign_keys=ON;
DROP TABLE IF EXISTS workers_busyness;
DROP TABLE IF EXISTS busyness;
DROP TABLE IF EXISTS orders_services_car_categories;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS workers;
DROP TABLE IF EXISTS services_car_categories;
DROP TABLE IF EXISTS services;
DROP TABLE IF EXISTS car_categories;
CREATE TABLE IF NOT EXISTS workers (id_w INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, surname TEXT, name TEXT, patronymic TEXT, date_of_birth TEXT, specialization TEXT, percentage_of_revenue REAL, status TEXT, CHECK (percentage_of_revenue>0 AND (status = 'является работником' OR status = 'не является работником')));
CREATE TABLE IF NOT EXISTS busyness (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, data TEXT, work_hours_start TEXT, work_hours_end TEXT);
CREATE TABLE IF NOT EXISTS workers_busyness (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL);
CREATE TABLE IF NOT EXISTS services (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name_of_service TEXT);
CREATE TABLE IF NOT EXISTS car_categories (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, marking TEXT, description TEXT);
CREATE TABLE IF NOT EXISTS services_car_categories (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, duration_in_hours REAL, price REAL, CHECK (duration_in_hours>0 AND price>0));
CREATE TABLE IF NOT EXISTS orders (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, time_of_record TEXT, service_execution_time TEXT, client_phone TEXT DEFAULT NULL, status TEXT, car_brand TEXT DEFAULT NULL, car_model TEXT DEFAULT NULL, CHECK(client_phone LIKE '+%' AND (status = 'да' OR status = 'нет')));
CREATE TABLE IF NOT EXISTS orders_services_car_categories (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL);
ALTER TABLE workers_busyness ADD COLUMN worker_id INTEGER REFERENCES workers (id_w) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE workers_busyness ADD COLUMN busyness_id INTEGER REFERENCES busyness (id) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE services_car_categories ADD COLUMN service_id INTEGER REFERENCES services(id) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE services_car_categories ADD COLUMN car_category_id INTEGER REFERENCES services(id) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE orders ADD COLUMN worker_id INTEGER REFERENCES workers(id_w) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE orders_services_car_categories ADD COLUMN orders_id INTEGER REFERENCES orders(id) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE orders_services_car_categories ADD COLUMN services_car_categories_id INTEGER REFERENCES services_car_categories(id) ON DELETE RESTRICT ON UPDATE CASCADE;
INSERT INTO workers (surname, name, patronymic, date_of_birth, specialization, percentage_of_revenue, status)
VALUES
("Федотов", "Евгений", "Николаевич", "1985-04-15", "Автомеханик", 30, "является работником"),
("Архипов", "Юрий", "Викторович", "1990-07-22", "Автомеханик", 27, "является работником"),
("Соколов", "Сергей", "Андреевич", "1992-01-12", "Автомеханик", 26, "является работником"),
("Воробьёв", "Андрей", "Павлович", "1990-06-01", "Автомеханик", 27, "является работником"),
("Герасимов", "Пётр", "Анатольевич", "1987-10-10", "Автоэлектрик", 29, "является работником"),
("Паршутин", "Фёдор", "Сергеевич", "1983-12-05", "Автоэлектрик", 27, "является работником"),
("Венедиктов", "Константин", "Сергеевич", "1993-04-30", "Мастер кузовного ремонта", 32, "является работником"),
("Сидоров", "Павел", "Петрович", "1995-10-12", "Мастер кузовного ремонта", 25, "является работником"),
("Перфилов", "Андрей", "Анатольевич", "1990-05-02", "Мастер кузовного ремонта", 28, "является работником"),
("Бородин", "Михаил", "Игоревич", "1992-07-07", "Автомаляр", 31, "является работником"),
("Горин", "Геннадий", "Иванович", "1987-08-25", "Автожестянщик", 27, "является работником"),
("Устимов", "Пётр", "Иванович", "1985-09-20", "Автожестянщик", 31, "является работником");
INSERT INTO busyness (data, work_hours_start, work_hours_end)
VALUES
("2021-04-01", "9:00", "17:00"),
("2021-04-01", "10:00", "18:00"),
("2021-04-01", "9:00", "17:00"),
("2021-04-01", "10:00", "18:00"),
("2021-04-01", "8:00", "16:00"),
("2021-04-01", "10:00", "18:00"),
("2021-04-02", "9:00", "17:00"),
("2021-04-02", "10:00", "18:00"),
("2021-04-02", "10:00", "18:00"),
("2021-04-02", "11:00", "19:00"),
("2021-04-02", "12:00", "20:00"),
("2021-04-02", "12:00", "20:00");
INSERT INTO workers_busyness (worker_id, busyness_id)
VALUES
(1, 2),
(2, 1),
(3, 4),
(4, 3),
(5, 6),
(6, 5),
(7, 9),
(8, 7),
(9, 11),
(10, 8),
(11, 12),
(12, 10);
INSERT INTO services (name_of_service)
VALUES
("Замена масла в ДВС"),
("Замена масляного фильтра"),
("Замена топливного фильтра"),
("Замена тормозной жидкости"),
("Промывка инжектора"),
("Замена свечей зажигания"),
("Замена масла"),
("Капитальный ремонт двигателя"),
("Замена ремня и цепи ГРМ"),
("Замена радиатора"),
("Замена турбины"),
("Покраска кузова автомобиля (полная окраска одного элемента)"),
("Покраска кузова автомобиля (локальная окраска одного элемента)"),
("Ремонт бампера"),
("Вакуумное удаление вмятин без покраски"),
("Восстановление геометрии кузова"),
("Замена сцепления"),
("Замена амортизатора"),
("Компьютерная диагностика развал-схождение 3D"),
("Балансировка колёс"),
("Замена АКПП"),
("Ремонт МКПП"),
("Установка парктроников"),
("Установка камер заднего вида"),
("Шумоизоляция автомобиля"),
("Автомойка"),
("Полировка"),
("Химчистка");
INSERT INTO car_categories (marking,description)
VALUES
("L1", "Двухколёсные мопеды/мотовелосипеды"),
("L2", "Трёхколёсные мопеды/мотовелосипеды"),
("L3", "Двухколёсные мотоциклы/мотороллеры"),
("L4", "Трициклы с ассиметричными относительно средней продольной плоскости колёсами"),
("L5", "Трициклы с симметричными относительно средней продольной плоскости колёсами"),
("L6", "Квадрициклы с ненагруженной массой меньше 350 кг"),
("L7", "Квадрициклы с ненагруженной массой меньше 400 кг"),
("M1", "Легковые автомобили"),
("M2", "Автобусы и троллейбусы с технически допустимой макс.массой не более 5 тонн"),
("M3", "Автобусы и троллейбусы с технически допустимой макс.массой более 5 тонн"),
("N1", "Грузовые автомобили с грузоподъёмностью не более 3.5 тонн"),
("N2", "Грузовые автомобили с грузоподъёмностью более 3.5 тонн и не более 12 тонн"),
("N3", "Грузовые автомобили с грузоподъёмностью более 12 тонн"),
("O1", "Прицепы с грузоподъёмностью не более 0.75 тонн"),
("O2", "Прицепы с грузоподъёмностью более 0.75 тонн и не более 3.5 тонн"),
("O3", "Прицепы с грузоподъёмностью более 3.5 тонн и не более 10 тонн"),
("O4", "Прицепы с грузоподъёмностью более 10 тонн");
INSERT INTO services_car_categories (duration_in_hours, price, service_id, car_category_id)
VALUES
(1, 220, 1, 8),
(1.5, 320, 1, 9),
(1.5, 300, 1, 11),
(2, 400, 1, 12),
(0.5, 150, 1, 3),
(1, 220, 2, 8),
(1.5, 300, 2, 11),
(1, 500, 3, 8),
(1.5, 650, 3, 11),
(1.5, 1000, 4, 8),
(2, 1200, 4, 11),
(2, 1500, 5, 8),
(0.5, 300, 6, 8),
(1, 400, 6, 11),
(0.5, 220, 7, 3),
(0.5, 220, 7, 8),
(1, 300, 7, 9),
(1, 320, 7, 10),
(1, 320, 7, 11),
(1, 350, 7, 12),
(6, 10000, 8, 8),
(7, 13000, 8, 11),
(2, 2000, 9, 8),
(1, 800, 10, 8),
(5, 5000, 11, 8),
(6, 6500, 11, 11),
(1, 2000, 12, 3),
(2, 5000, 12, 8),
(0.5, 1000, 13, 3),
(1, 2500, 13, 8),
(2, 1000, 14, 8),
(3, 2000, 14, 11),
(1.5, 3000, 15, 8),
(2.5, 4000, 15, 11),
(4, 4000, 16, 8),
(5, 6000, 16, 11),
(1, 1000, 17, 8),
(1.5, 1500, 17, 11),
(1, 800, 18, 8),
(1.5, 1300, 18, 11),
(0.5, 1000, 19, 8),
(1, 1500, 19, 11),
(2, 2000, 20, 8),
(2.5, 2500, 20, 11),
(3, 3000, 20, 12),
(3, 4000, 21, 8),
(4, 6000, 21, 11),
(4.5, 6500, 21, 12),
(4, 5000, 22, 8),
(5, 7000, 22, 11),
(0.5, 400, 23, 8),
(0.5, 500, 24, 8),
(1, 1000, 25, 8),
(1, 1100, 26, 8),
(1, 1500, 26, 11),
(2.5, 4000, 27, 8),
(1.5, 1000, 28, 8);
INSERT INTO orders (time_of_record, service_execution_time, client_phone, status, car_brand, car_model, worker_id)
VALUES
("2021-03-30 14:37", "2021-04-01 14:00", "+79176959495", "да", "LADA", "Largus", "2"),
("2021-03-30 15:01", "2021-04-01 15:00", "+79270749656", "да", "Renault", "Sandero", "2"),
("2021-03-30 15:15", "2021-04-01 10:00", "+79033254242", "да", "LADA", "Granta", "1"),
("2021-03-30 15:22", "2021-04-01 16:30", "+79052558762", "да", "LADA", "Vesta", "1"),
("2021-03-30 15:31", "2021-04-01 9:00", "+79274856124", "да", "Hyundai", "Solaris", "4"),
("2021-03-30 15:35", "2021-04-01 16:30", "+79052486475", "да", "Nissan", "Almera", "3"),
("2021-03-30 15:57", "2021-04-01 10:00", "+79035476221", "да", "LADA", "Granta", "5"),
("2021-03-30 16:25", "2021-04-02 10:00", "+79053498889", "да", "Skoda", "Rapid", "10"),
("2021-03-30 16:43", "2021-04-02 10:00", "+79271984321", "да", "LADA", "Granta", "7"),
("2021-03-30 17:02", "2021-04-02 11:00", "+79175421345", "да", "Kia", "Rio", "12"),
("2021-03-31 09:21", "2021-04-02 17:30", "+79031548791", "да", "LADA", "Granta", "12"),
("2021-03-31 09:55", "2021-04-02 12:00", "+79052546794", "да", "LADA", "Granta", "11"),
("2021-03-31 10:40", "2021-04-02 12:30", "+79271768945", "да", "Kia", "Rio", "11"),
("2021-03-31 11:37", "2021-04-02 13:30", "+79176578631", "да", "Renault", "Duster", "11"),
("2021-03-31 13:46", "2021-04-02 19:00", "+79035479862", "да", "LADA", "Granta", "11");
INSERT INTO orders_services_car_categories (orders_id, services_car_categories_id)
VALUES
(1, 1),
(2, 12),
(3, 6),
(4, 10),
(5, 24),
(6, 33),
(7, 13),
(8, 28),
(9, 37),
(10, 1),
(11, 55),
(12, 13),
(13, 6),
(14, 24),
(15, 39);
