USE `diplom`;

CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(128),
    name VARCHAR(86),
    password VARCHAR(120),
    avatar VARCHAR(86),
    contacts VARCHAR(86)
);