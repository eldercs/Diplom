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