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

CREATE TABLE comentarios (
    com_id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    com_user_id INT(10) UNSIGNED NOT NULL,
    com_prod_id INT(10) UNSIGNED NOT NULL,
    com_mensaje TEXT NOT NULL,
    com_puntaje INT NOT NULL,
    com_fecha DATE NOT NULL,
    com_status TINYINT(1) DEFAULT 0 NOT NULL
)

ALTER TABLE comentarios
    ADD CONSTRAINT fk_userId FOREIGN KEY (com_user_id)
    REFERENCES usuarios (user_id)
    ON DELETE RESTRICT ON UPDATE CASCADE

ALTER TABLE comentarios
    ADD CONSTRAINT fk_prodId FOREIGN KEY (com_prod_id)
    REFERENCES productos (prod_id)
    ON DELETE RESTRICT ON UPDATE CASCADE

CREATE TABLE carrito (
    cart_id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    cart_user_id INT(10) UNSIGNED NOT NULL,
    cart_prod_id INT(10) UNSIGNED NOT NULL,
    cart_canti INT NOT NULL
)

ALTER TABLE carrito
    ADD CONSTRAINT fk_userCartId FOREIGN KEY (cart_user_id)
    REFERENCES usuarios (user_id)
    ON DELETE RESTRICT ON UPDATE CASCADE

ALTER TABLE carrito
    ADD CONSTRAINT fk_prodCartId FOREIGN KEY (cart_prod_id)
    REFERENCES productos (prod_id)
    ON DELETE RESTRICT ON UPDATE CASCADE