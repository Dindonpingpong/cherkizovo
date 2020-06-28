DROP DATABASE IF EXISTS cherkizovo;
CREATE DATABASE cherkizovo;
USE cherkizovo;

DROP TABLE IF EXISTS Staff;
CREATE TABLE Staff
(
    ID SERIAL,
    Login VARCHAR(255),
    Name VARCHAR(255),
    SurName VARCHAR(255),
    MiddleName VARCHAR(255),
    Password VARCHAR(512),
    Email VARCHAR(255),
    Status VARCHAR(255) DEFAULT 'User',
    Phone VARCHAR(11),
    DateBirth Date,
    Address VARCHAR(255),
    FamilyStatus VARCHAR(32),
    Education VARCHAR(32),
    Job VARCHAR(32),
    Department VARCHAR(32),
    Salary INT, 
    PRIMARY KEY (ID)
);

DROP TABLE IF EXISTS SMM;
CREATE TABLE SMM
(
    ID SERIAL,
    CreatedAt Datetime DEFAULT CURRENT_TIMESTAMP,
    Description TEXT,
    Price INT,
    Likes INT,
    Dislikes INT,
    Views INT,
    Shares INT,
    Comments INT,
    StaffID BIGINT UNSIGNED NOT NULL,
    Stat VARCHAR(32) DEFAULT 'В работе',
    PRIMARY KEY (ID),
    FOREIGN KEY (StaffID) REFERENCES Staff(ID)
);

DROP TABLE IF EXISTS PR;
CREATE TABLE PR
(
    ID SERIAL,
    DatePR Datetime DEFAULT CURRENT_TIMESTAMP,
    Description TEXT,
    Price int,
    Tv int,
    MassMedia int,
    Gallery int,
    PosComments int,
    NegComments int,
    StaffID BIGINT UNSIGNED NOT NULL,
    Stat VARCHAR(32) DEFAULT 'В работе',
    PRIMARY KEY (ID),
    FOREIGN KEY (StaffID) REFERENCES Staff(ID)
);

INSERT INTO Staff VALUES
(1, 'PetrovskyZA','Петровский', 'Зуфар', 'Александрович', SHA2('123',512), 'petrovsky@mai.ru','User','89568885456','1965-02-22','Авиамоторная','Женат','Высшее','Директор отдела', 'ADM', 500000),
(2, 'GushinVF','Гущин', 'Владимр', 'Федорович', SHA2('123',512), 'Guwin@mail.ru','User','89998745569','1976-11-18','Новый Арбат','Женат','Высшее','Руководитель PR-отдела', 'ADM', 350000),
(3, 'AvdeevYA','Авдеев', 'Ян', 'Эдуардович', SHA2('123',512), 'Avdeev@gmail.com','User','89189125436','1981-06-14','Смоленская площадь','Не женат','Высшее','SMM-маркетолог', 'SMM', 115000),
(4, 'EreminGB','Еремин', 'Глеб', 'Борисович', SHA2('123',512), 'Eremin@gmail.com','User','89888952635','1997-07-21','Ейская','Не женат','Высшее','Дизайнер', 'PR', 90000);

INSERT INTO SMM VALUES
(1, '2019-06-01' , 'test', 150000, 3758, 235, 123, 120, 249, 4,'Завершен'),
(2, '2019-07-01' , 'test1', 114214, 3421, 2124, 1234, 120, 249, 2,'Завершен');

INSERT INTO PR VALUES 
(1,'2019-07-03','PRPRPRP', 124000, 12,51,51,125, 124, 1, 'В работе'),
(2,'2019-07-07', 'test', 543550, 51124,512,123,125, 124, 1, 'Done');