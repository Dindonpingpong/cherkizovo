DROP DATABASE IF EXISTS miniShop;
CREATE DATABASE miniShop;
USE miniShop;

DROP TABLE IF EXISTS Clients;
CREATE TABLE Clients
(
    UserID SERIAL,
    FirstName VARCHAR(255),
    LastName VARCHAR(255),
    NickName VARCHAR(255),
    Password VARCHAR(512),
    Email VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    Status VARCHAR(255) DEFAULT 'User',
    PRIMARY KEY (UserID)
);

DROP TABLE IF EXISTS Products;
CREATE TABLE Products
(
    ProductID SERIAL,
    Name VARCHAR(255),
    Description TEXT,
    Price DECIMAL (11,2),
    Quantity INT,
    Path VARCHAR(255),
    PRIMARY KEY (ProductID)
);

DROP TABLE IF EXISTS Tags;
CREATE TABLE Tags
(
    TagID SERIAL,
    Name VARCHAR(255),
    PRIMARY KEY(TagID)
);

DROP TABLE IF EXISTS Products_Tags;
CREATE TABLE Products_Tags
(
    TagID BIGINT UNSIGNED NOT NULL,
    ProductID BIGINT UNSIGNED NOT NULL,
    PRIMARY KEY (TagID, ProductID),
    FOREIGN KEY (TagID) REFERENCES Tags(TagID) ON DELETE CASCADE,
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID) ON DELETE CASCADE
);

DROP TABLE IF EXISTS Orders;
CREATE TABLE Orders (   
    OrderID SERIAL,
    ClientID BIGINT UNSIGNED NOT NULL,
    OrderDate DATETIME DEFAULT CURRENT_TIMESTAMP,
    Status VARCHAR(255),
    PRIMARY KEY (OrderID),
    FOREIGN KEY (ClientID) REFERENCES Clients(UserID) ON DELETE CASCADE
);

DROP TABLE IF EXISTS OrdersPosition;
CREATE TABLE OrdersPosition
(
    OrdersPositionID SERIAL,
    OrderID BIGINT UNSIGNED NOT NULL,
    ProductID BIGINT UNSIGNED NOT NULL,
    Quantity INT,
    PRIMARY KEY (OrdersPositionID),
    FOREIGN KEY (OrderID) REFERENCES Orders(OrderID) ON DELETE CASCADE,
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID)
);

INSERT INTO Products (Name, Description, Price, Quantity, Path) VALUES
    ('Pummel Party', 'Pummel Party – забава для вечеринок с участием 4-8 игроков.', 360.00,30, 'PummelParty.jpg'),
    ('PAYDAY 2', 'PAYDAY 2 - это кооперативный экшн-шутер для четверых игроков.', 259.00, 30, 'Payday2.jpg'),
    ('DOOM Eternal', 'Армии ада вторглись на Землю. Станьте Палачом Рока и убейте демонов во всех измерениях, чтобы спасти человечество.', 1999.00, 30, 'DoomEternal.jpg'),
    ('Sea of Thieves', 'В игре Sea of Thieves вас ждут морские путешествия, сражения, исследования и сокровища.', 725.00, 30, 'SeaOfThieves.jpg'),
    ('The Dark Occult', 'The Dark Occult - психологическая игра ужасов, которая ставит игроков в постоянное состояние тревоги, паники и ужаса.', 400.00, 30, 'TheDarkOccult.jpg'),
    ('Overcooked! 2', 'Overcooked! 2 - это хаотичная совместная кулинарная игра для 1-4 игроков.', 759.00, 30, 'Overcooked!2.jpg'),
    ('Outlast', 'Ад - это эксперимент, в котором нельзя выжить в Outlast, игре ужасов на выживание от первого лица.', 435.00, 30, 'Outlast.jpg'),
    ('RESIDENT EVIL 3', 'Только Джилл Валентайн знает о преступлениях корпорации «Амбрелла». Чтобы остановить ее, «Амбрелла» использует секретное оружие: Немезис!', 1999.00, 30, 'ResidentEvil3.jpg'),
    ('Human: Fall Flat', 'Human: Fall Flat - необычная игра, где вы будете исследовать окружение и решать физические головоломки, чтобы выбраться из сюрреалистичных снов.', 499.00, 30, 'HumanFallFlat.jpg');

INSERT INTO Tags (Name) VALUES
    ('Экшен'),
    ('Шутер'),
    ('Хоррор'),
    ('Кооператив');

INSERT INTO Clients (FirstName, LastName, NickName, Password, Email) VALUES
    ('Nil', 'Nilov', 'kitikat', SHA2('111', 512), 'test@test.ru'),
    ('Buy', 'Luck', 'monika', SHA2('kus', 512), 'monila@test.ru'),
    ('Amel', 'Le', 'Lamel', SHA2('123', 512), 'lamel@gmail.com');

INSERT INTO Clients (FirstName, LastName, NickName, Password, Email, Status) VALUES
    ('super', 'puper', 'admin', SHA2('123', 512), 'admin@minishop.ru', 'admin');

INSERT INTO Products_Tags (TagID, ProductID) VALUES
    (1,1),
    (4,1),
    (2,2),
    (4,2),
    (2,3),
    (3,3),
    (1,4),
    (4,4),
    (3,5),
    (1,6),
    (4,6),
    (3,7),
    (3,8),
    (1,9),
    (4,9);

