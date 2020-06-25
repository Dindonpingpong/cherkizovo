DROP DATABASE IF EXISTS miniShop;
CREATE DATABASE miniShop;
GRANT USAGE ON *.* TO 'super'@'localhost';
DROP USER 'super'@'localhost';
CREATE USER 'super'@'localhost' IDENTIFIED BY '1234';
GRANT ALL PRIVILEGES ON miniShop.* TO 'super'@'localhost' IDENTIFIED BY '1234';
