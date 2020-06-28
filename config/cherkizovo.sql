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
