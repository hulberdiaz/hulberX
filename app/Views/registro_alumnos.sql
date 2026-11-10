CREATE DATABASE IF NOT EXISTS registro_alumnos
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE registro_alumnos;

CREATE TABLE IF NOT EXISTS alumnos (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    dni CHAR(8) NOT NULL,
    nombres VARCHAR(100) NOT NULL,
    apellido_paterno VARCHAR(60) NOT NULL,
    apellido_materno VARCHAR(60) NOT NULL,
    correo VARCHAR(120) NOT NULL,
    semestre VARCHAR(30) NOT NULL,
    fecha_registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY uq_alumnos_dni (dni)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
