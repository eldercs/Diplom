USE `diplom`;

CREATE TABLE comments(
    id INT AUTO_INCREMENT PRIMARY KEY,
    hotel_id INT(20),
    comment VARCHAR(400),
    user VARCHAR(20),
    date VARCHAR(50),
    KEY `hotel_com_1` (`hotel_com_1`),
	CONSTRAINT `hotel_com_1` FOREIGN KEY (`hotel_com_1`) REFERENCES `hotels`(`id`),
);
CREATE TABLE hotel_image(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_hotel INT(20),
    image2 VARCHAR(400),
    image3 VARCHAR(400),
    image4 VARCHAR(400),
    image5 VARCHAR(400),
    KEY `hotel-img_fk1` (`hotel-img_fl1`),
	CONSTRAINT `hotel-img_fk1` FOREIGN KEY (`hotel-img_fk1`) REFERENCES `hotels`(`id`),
);
CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(128),
    name VARCHAR(86),
    password VARCHAR(120),
    avatar VARCHAR(86),
    contacts VARCHAR(86),
    username VARCHAR(50),
    role INT(11)
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
    user_id INT(11),
    is_active INT(11),
    count_like INT(11) default 0,
    title_image VARCHAR(150),
    KEY `category_fk_1` (`category_fk_1`),
	KEY `user_fk_2` (`user_fk_2`),
	CONSTRAINT `category_fk_1` FOREIGN KEY (`category_fk_1`) REFERENCES `category`(`id`),
	CONSTRAINT `user_fk_2` FOREIGN KEY (`user_fk_2`) REFERENCES `users`(`id`)
);
CREATE TABLE likes(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT(20),
    id_hotels INT(20),
    KEY `hotel_fk_1` (`hotel_fk_1`),
	KEY `user-like_fk_2` (`user_fk_2`),
	CONSTRAINT `hotel_fk_1` FOREIGN KEY (`hotel_fk_1`) REFERENCES `hotels`(`id`),
	CONSTRAINT `user-like_fk_2` FOREIGN KEY (`user-like_fk_2`) REFERENCES `users`(`id`)
); 
CREATE TABLE bron(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT(20),
    id_creater INT(20),
    telephone INT(20),
    surname VARCHAR(50),
    name VARCHAR(50),
    patronymic VARCHAR(50),
    KEY `id_user` (`id_user`),
	KEY `id_creater` (`id_creater`),
	CONSTRAINT `bron_fk_1` FOREIGN KEY (`id_user`) REFERENCES `users`(`id`),
	CONSTRAINT `bron_fk_2` FOREIGN KEY (`id_creater`) REFERENCES `hotels`(`user_id`)
); 