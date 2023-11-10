CREATE TABLE Users(
email VARCHAR(50),
username VARCHAR(15) PRIMARY KEY,
address VARCHAR(150)
);

CREATE TABLE Login(
username VARCHAR(15),
password VARCHAR(8),
FOREIGN KEY (username) REFERENCES Users(username)
);

CREATE TABLE Genre(
genreId INT PRIMARY KEY,
genreType VARCHAR(20)
);

CREATE TABLE Books(
bookId INT PRIMARY KEY,
title VARCHAR(100),
price INT,
genreId INT,
FOREIGN KEY (genreId) REFERENCES Genre(genreId)
);

