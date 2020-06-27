DROP DATABASE IF EXISTS cherkizovo;
CREATE DATABASE cherkizovo;
GRANT USAGE ON *.* TO 'super'@'localhost';
DROP USER 'super'@'localhost';
CREATE USER 'super'@'localhost' IDENTIFIED BY '1234';
GRANT ALL PRIVILEGES ON cherkizovo.* TO 'super'@'localhost' IDENTIFIED BY '1234';
