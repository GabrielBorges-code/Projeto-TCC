CREATE DATABASE sistema_investimento_tcc;

USE sistema_investimento_tcc;

CREATE TABLE IF NOT EXISTS usuario (
    id int (11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nome varchar (100),
    email varchar (100),
    telefone varchar (50),
    senha varchar (500)

);