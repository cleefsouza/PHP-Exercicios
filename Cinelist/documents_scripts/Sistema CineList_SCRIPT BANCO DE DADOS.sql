-- Script SQL - Banco de Dados - CineList
CREATE DATABASE IF NOT EXISTS cinelist;
USE cinelist;

-- Criar tabela usuário
CREATE TABLE IF NOT EXISTS usuario(
    cod_usu INTEGER PRIMARY KEY AUTO_INCREMENT,
    nome_usu VARCHAR(255),
    senha_usu VARCHAR(255)
);

-- Criar tabela diretor
CREATE TABLE IF NOT EXISTS diretor(
    cod_dir INTEGER PRIMARY KEY AUTO_INCREMENT,
    nome_dir VARCHAR(255),
    usuario_dir INTEGER,
    FOREIGN KEY(usuario_dir) REFERENCES usuario(cod_usu);
);

-- Criar tabela genero
CREATE TABLE IF NOT EXISTS genero(
    cod_gen INTEGER PRIMARY KEY AUTO_INCREMENT,
    nome_gen VARCHAR(255),
    usuario_gen INTEGER,
    FOREIGN KEY(usuario_gen) REFERENCES usuario(cod_usu);
);

-- Criar tabela filme
CREATE TABLE IF NOT EXISTS filme(
    cod_fil INTEGER PRIMARY KEY AUTO_INCREMENT,
    nome_fil VARCHAR(255),
    genero_fil INTEGER,
    diretor_fil INTEGER,
    descricao_fil TEXT,
    usuario_fil INTEGER,
    FOREIGN KEY(genero_fil) REFERENCES genero(cod_gen),
    FOREIGN KEY(diretor_fil) REFERENCES diretor(cod_dir),
    FOREIGN KEY(usuario_fil) REFERENCES usuario(cod_usu)
);

-- Criar tabela critica
CREATE TABLE IF NOT EXISTS critica(
    cod_cri INTEGER PRIMARY KEY AUTO_INCREMENT,
    descricao_cri TEXT,
    filme_cri INTEGER,
    nota_cri INTEGER,
    usuario_cri INTEGER,
    FOREIGN KEY(filme_cri) REFERENCES filme(cod_fil),
    FOREIGN KEY (usuario_cri) REFERENCES usuario(cod_usu);
);

