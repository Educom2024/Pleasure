CREATE DATABASE pleasure

USE pleasure

CREATE TABLE usuarios (
    user_id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_nombres VARCHAR(100) NOT NULL,
    user_apellidos VARCHAR(100) NOT NULL,
    user_email VARCHAR(150) NOT NULL,
    user_img TEXT,
    user_pass VARCHAR(255) NOT NULL,
    user_token TEXT,
    user_status TINYINT(1) DEFAULT 0 COMMENT 'status 0: no activo, status 1: activo',
    user_rol VARCHAR(50) NOT NULL DEFAULT 'suscriptor'
)

INSERT INTO usuarios (user_nombres, user_apellidos, user_email, user_pass) VALUES ('Edu', 'Almiron', 'edu.almiron@gmail.com', '123')

CREATE TABLE productos(
    prod_id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    prod_nombre VARCHAR(100) NOT NULL,
    prod_descri TEXT NOT NULL,
    prod_precio DECIMAL(10,2) NOT NULL,
    prod_canti INT NOT NULL,
    prod_img TEXT NOT NULL
)