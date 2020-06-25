DROP DATABASE IF EXISTS cherkizovo;
CREATE DATABASE cherkizovo;
USE cherkizovo;

DROP TABLE IF EXISTS Staff;
CREATE TABLE Staff
(
    ID SERIAL,
    Name VARCHAR(255),
    SurnameName VARCHAR(255),
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
    Status VARCHAR(32),

    PRIMARY KEY (ID),
    FOREIGN KEY (StaffID) REFERENCES Staff(ID)
);

DROP TABLE IF EXISTS PR;
CREATE TABLE Products_Tags
(
    ID SERIAL,
    DatePR Datetime DEFAULT CURRENT_TIMESTAMP,
    Description TEXT,
    Tv int,
    MassMedia int,
    Gallery int,
    PosComments int,
    NegComments int,
    StaffID BIGINT UNSIGNED NOT NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY (StaffID) REFERENCES Staff(ID)
);

INSERT INTO Staff VALUES (1, 'Nguen', 'Hai', 'Duong', SHA2('123',512), 'rkina7@gmail.com','Admin','89778660695','1998-07-03','VDNH','In love','Bachelor','Fullstack', 130000);

INSERT INTO SMM VALUES (1, '2019-06-01' , 'test', 150000, 3758, 235, 4072281, 120, 249, 1,'done');