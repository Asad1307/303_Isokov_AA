DROP TABLE IF EXISTS specialties;
DROP TABLE IF EXISTS car_categories;
DROP TABLE IF EXISTS employee_statuses;
DROP TABLE IF EXISTS clients;
DROP TABLE IF EXISTS workers;
DROP TABLE IF EXISTS services;
DROP TABLE IF EXISTS event_statuses;
DROP TABLE IF EXISTS events;
DROP TABLE IF EXISTS statistics_workers;
DROP TABLE IF EXISTS billings;
DROP TABLE IF EXISTS schedule;

CREATE TABLE IF NOT EXISTS specialties
(
    id    INTEGER PRIMARY KEY,
    title TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS car_categories
(
    id    INTEGER PRIMARY KEY,
    title TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS employee_statuses
(
    id    INTEGER PRIMARY KEY,
    title TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS workers
(
    id                  INTEGER PRIMARY KEY,
    first_name          TEXT    NOT NULL,
    last_name           TEXT    NOT NULL,
    patronymic          TEXT,
    date_of_birth       TEXT    NOT NULL,
    speciality_id       INTEGER NOT NULL,
    earning_in_percents INTEGER NOT NULL,
    employee_status_id  INTEGER NOT NULL,
    FOREIGN KEY (speciality_id) REFERENCES specialties (id),
    FOREIGN KEY (employee_status_id) REFERENCES employee_statuses (id)
);

CREATE TABLE IF NOT EXISTS clients
(
    id            INTEGER PRIMARY KEY,
    first_name    TEXT NOT NULL,
    last_name     TEXT NOT NULL,
    patronymic    TEXT,
    date_of_birth TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS services
(
    id                  INTEGER PRIMARY KEY,
    title               TEXT    NOT NULL,
    price               DECIMAL NOT NULL,
    duration_in_minutes INTEGER NOT NULL,
    car_category_id     INTEGER NOT NULL,
    FOREIGN KEY (car_category_id) REFERENCES car_categories (id)
    check(price >= 0)
);

CREATE TABLE IF NOT EXISTS event_statuses
(
    id    INTEGER PRIMARY KEY,
    title TEXT
);

CREATE TABLE IF NOT EXISTS events
(
    id           INTEGER PRIMARY KEY,
    worker_id    INTEGER NOT NULL,
    client_id    INTEGER NOT NULL,
    service_id   INTEGER NOT NULL,
    scheduled_at TEXT,
    started_at   TEXT,
    ended_at     TEXT,
    cancelled_at TEXT,
    is_completed INTEGER,
    status_id    INTEGER NOT NULL,
    FOREIGN KEY (worker_id) REFERENCES workers (id),
    FOREIGN KEY (client_id) REFERENCES clients (id),
    FOREIGN KEY (status_id) REFERENCES event_statuses (id),
    FOREIGN KEY (service_id) REFERENCES services (id)
);

CREATE TABLE IF NOT EXISTS statistics_workers
(
    id                            INTEGER PRIMARY KEY,
    worker_id                     INTEGER NOT NULL,
    count_events              INTEGER NOT NULL,
    count_successfully_events INTEGER NOT NULL,
    count_working_day             INTEGER,
    first_working_day             TEXT,
    last_working_day              TEXT,
    FOREIGN KEY (worker_id) REFERENCES workers (id)
);

CREATE TABLE IF NOT EXISTS billings
(
    id              INTEGER PRIMARY KEY,
    worker_id       INTEGER NOT NULL,
    paid_at         TEXT,
    original_amount DECIMAL NOT NULL DEFAULT 0,
    earnings_amount DECIMAL NOT NULL DEFAULT 0,
    FOREIGN KEY (worker_id) REFERENCES workers (id)
);

CREATE TABLE IF NOT EXISTS schedule
(
  id INTEGER PRIMARY KEY,
  mon_start TIME NULL,
  mon_end TIME NULL,
  tue_start TIME NULL,
  tue_end TIME NULL,
  wed_start TIME NULL,
  wed_end TIME NULL,
  thu_start TIME NULL,
  thu_end TIME NULL,
  fri_start TIME NULL,
  fri_end TIME NULL,
  sat_start TIME NULL,
  sat_end TIME NULL,
  sun_start TIME NULL,
  sun_end TIME NULL,
    FOREIGN KEY (id) REFERENCES workers(id) on delete cascade
);



INSERT INTO event_statuses (title)
VALUES ('New'),
       ('Done'),
       ('Canceled');

INSERT INTO employee_statuses (title)
VALUES ('Working'),
       ('Absent'),
       ('Fired'),
       ('Vacationed');

INSERT INTO specialties (title)
VALUES ('Auto mechanic'),
       ('Auto electrician'),
       ('Rebar operator');

INSERT INTO car_categories (title)
VALUES ('Passenger cars'),
       ('Cargo vehicles'),
       ('Motorcycles');

INSERT INTO clients (first_name, last_name, patronymic, date_of_birth)
VALUES ('Ivan', 'Ivanov', 'Ivanovich', '1995-01-15'),
       ('Petr', 'Petrov', 'Petrovich', '1994-01-15'),
       ('Alexey', 'Alexeev', 'Alexeevich', '1993-01-15');

INSERT INTO workers (first_name, last_name, patronymic, date_of_birth, speciality_id, earning_in_percents,
                     employee_status_id)
VALUES ('Kirill', 'Kirillov', 'Kirillovich', '1983-01-15', 1, 90, 1),
       ('Vladislove', 'Vladislavov', 'Vladislavevovich', '1983-01-15', 2, 80, 1),
       ('Semen', 'Semenov', 'Semenovich', '1983-01-15', 3, 70, 1);

INSERT INTO services (title, price, duration_in_minutes, car_category_id)
VALUES
       ('Vehicle washing', 300, 30, 1),
       ('Vehicle washing', 500, 30, 2),
       ('Vehicle washing', 200, 30, 3),
       ('Vehicle diagnostics', 500, 60, 1),
       ('Vehicle diagnostics', 500, 60, 2),
       ('Vehicle diagnostics', 500, 60, 3),
       ('Wheel replacement', 500, 30, 1),
       ('Wheel replacement', 700, 30, 2),
       ('Wheel replacement', 200, 30, 3);

INSERT INTO events (worker_id, client_id, service_id, scheduled_at, started_at, ended_at, cancelled_at, is_completed, status_id)
VALUES (1, 1, 1,'2020-04-12 10:30:00', null, null, null, 0, 1),
       (1, 2, 2,'2020-04-13 11:30:00', null, null, null, 0, 1),
       (2, 3, 1,'2020-04-14 12:00:00', null, null, null, 0, 1),
       (3, 1, 8,'2020-04-15 12:00:00', null, null, null, 0, 1),
       (1, 2, 7, null, '2020-04-06 12:00:00', '2020-04-06 13:00:00', null, 1, 2),
       (2, 3, 4, null, '2020-04-07 12:00:00', '2020-04-07 13:00:00', null, 1, 2),
       (3, 3, 3, null, '2020-04-08 12:00:00', '2020-04-08 13:00:00', null, 1, 2);

INSERT INTO statistics_workers (worker_id, count_events, count_successfully_events, count_working_day,
                                first_working_day, last_working_day)
VALUES (1, 5, 4, 20, '2020-04-01', '2020-04-28'),
       (2, 8, 6, 22, '2020-04-01', '2020-04-25'),
       (3, 11, 10, 18, '2020-04-05', '2020-04-30');

INSERT INTO billings (worker_id, paid_at, original_amount, earnings_amount)
VALUES (1, '2020-04-02 00:00:00', 10000, 8000),
       (2, '2020-04-03 00:00:00', 15000, 12000),
       (3, '2020-04-04 00:00:00', 20000, 15000);

INSERT INTO schedule (mon_start, mon_end, tue_start, tue_end, wed_start, wed_end, thu_start, thu_end, fri_start, fri_end, sat_start, sat_end, sun_start, sun_end)
VALUES ('9:00','16:00','9:00','16:00','9:00','16:00','9:00','16:00','9:00','16:00',null, null, null, null),
       (null, null, null, null,'15:00','22:00','15:00','22:00','15:00','22:00','9:00','16:00','9:00','16:00'),
       ('15:00','22:00','15:00','22:00',null, null, null, null,'15:00','22:00','15:00','22:00','15:00','22:00');