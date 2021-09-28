DROP DATABASE IF EXISTS sistema_investimento_tcc

-- 

CREATE DATABASE IF NOT sistema_investimento_tcc;

USE sistema_investimento_tcc;

ALTER DATABASE sistema_investimento_tcc DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS usuario (
    id int (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome varchar (100),
    email varchar (100),
    telefone varchar (20),
    senha varchar (500)

) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS mensagem_contato (
	id int (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email varchar (100),
    telefone varchar (20),
    nome varchar (100),
    mensagem TEXT
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
