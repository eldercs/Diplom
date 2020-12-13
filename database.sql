USE `diplom`;

CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(128),
    name VARCHAR(86),
    password VARCHAR(120),
    avatar VARCHAR(86),
    contacts VARCHAR(86)
);
CREATE TABLE category(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title CHAR(86)
);
CREATE TABLE hotels(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(86),
    category_id INT(11),
    price INT(20),
    city VARCHAR(100),
    description VARCHAR(1000),
    img VARCHAR(100),
    like INT(11) default 0
);
CREATE TABLE likes(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT(20),
    id_hotel INT(20),
    
);