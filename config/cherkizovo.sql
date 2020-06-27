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
    Stat VARCHAR(32),

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
    Stat VARCHAR(32),
    PRIMARY KEY (ID),
    FOREIGN KEY (StaffID) REFERENCES Staff(ID)
);

INSERT INTO Staff VALUES (1, 'rkina','Nguen', 'Hai', 'Duong', SHA2('123',512), 'rkina7@gmail.com','Admin','89778660695','1998-07-03','VDNH','In love','Bachelor','Fullstack', 'PR', 130000);
INSERT INTO Staff VALUES (2, 'test','Ntad', 'adi', 'Dugasdgng', SHA2('123',512), 'rkidasf','Adfdsa','89778662372','1998-09-06','Aeroport','In love','Bachelor','Develop', 'SMM', 115000);

INSERT INTO SMM VALUES (1, '2019-06-01' , 'test', 150000, 3758, 235, 4072281, 120, 249, 1,'done');
INSERT INTO SMM VALUES (2, '2019-07-01' , 'test1', 114214, 3421, 2124, 4072281, 120, 249, 1,'progress');

INSERT INTO PR (Description, Price, Tv, MassMedia, Gallery, PosComments, NegComments, StaffID, Stat) 
VALUES ('PRPRPRP', 124000, 12,51,51,125, 124, 1, 'Progress');
-- select Date(DatePR), Description, Price, Tv, MassMedia, Gallery, PosComments, NegComments, Staff.Login, Stat from PR INNER JOIN Staff WHERE PR.ID = Staff.ID;
-- SELECT CreatedAt, Description, Price, Likes, Dislikes, Views, Shares, Comments, Staff.Login, Stat FROM SMM INNER JOIN Staff WHERE SMM.ID = Staff.ID;
-- SELECT Surname, MiddleName, Email, Phone, DateBirth, Address, FamilyStatus, Education, Job, Department, Salary FROM Staff;
