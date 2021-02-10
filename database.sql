USE `diplom`;

CREATE TABLE comments(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_hotel INT(20),
    comments VARCHAR(400),
    user VARCHAR(20)
);
CREATE TABLE hotel_image(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_hotel INT(20),
    image VARCHAR(400)
);
CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(128),
    name VARCHAR(86),
    password VARCHAR(120),
    avatar VARCHAR(86),
    contacts VARCHAR(86),
    username VARCHAR(50)
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
    is_active INT(11),
    count_like INT(11) default 0
);
CREATE TABLE likes(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT(20),
    id_hotel INT(20),
); 