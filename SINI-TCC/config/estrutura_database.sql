CREATE DATABASE sistema_investimento_tcc;

USE sistema_investimento_tcc;

CREATE TABLE IF NOT EXISTS usuario (
    id int (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome varchar (100),
    email varchar (100),
    telefone varchar (50),
    senha varchar (500)

);

CREATE TABLE IF NOT EXISTS mensagem_contato (
	id int (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email varchar (100),
    telefone varchar (50),
    nome varchar (100),
    mensagem TEXT
);