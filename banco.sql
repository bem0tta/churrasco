CREATE DATABASE churrasco;
CHARACTER SET utf8mb4;
COLLATE utf8mb4_unicode_ci;
USE churrasco;
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);
CREATE TABLE participantes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    turma VARCHAR(50) NOT NULL,
    telefone VARCHAR(20),
    tipo_churrasco VARCHAR(30) NOT NULL,
    acompanhamento VARCHAR(50),
    confirmado BOOLEAN NOT NULL DEFAULT FALSE,
    pago BOOLEAN NOT NULL DEFAULT FALSE
);