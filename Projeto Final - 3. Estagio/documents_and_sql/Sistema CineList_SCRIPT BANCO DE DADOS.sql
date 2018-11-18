-- Script SQL - Banco de Dados - CineList

-- Crira database cinelist
CREATE DATABASE cinelist;
-- USE cinelist;

-- Criar tabela diretor
CREATE TABLE diretor(
    cod_dir INT NOT NULL AUTO_INCREMENT,
    nome_dir VARCHAR(50),
    PRIMARY KEY(cod_dir)
);

-- Criar tabela genero
CREATE TABLE genero(
    cod_gen INT NOT NULL AUTO_INCREMENT,
    nome_gen VARCHAR(50),
    PRIMARY KEY(cod_gen)
);

-- Criar tabela filme
CREATE TABLE filme(
    cod_fil INT NOT NULL AUTO_INCREMENT,
    nome_fil VARCHAR(50),
    genero_fil INT,
    diretor_fil INT,
    descricao_fil TEXT,
    PRIMARY KEY(cod_fil),
    FOREIGN KEY(genero_fil) REFERENCES genero(cod_gen),
    FOREIGN KEY(diretor_fil) REFERENCES diretor(cod_dir)
);

-- Criar tabela critica
CREATE TABLE critica(
    cod_cri INT NOT NULL AUTO_INCREMENT,
    descricao_cri TEXT,
    filme_cri INT,
    nota_cri DOUBLE,
    PRIMARY KEY(cod_cri),
    FOREIGN KEY(filme_cri) REFERENCES filme(cod_fil)
);

-- Inserindo diretores
INSERT INTO diretor(nome_dir) VALUES("David Yates");
INSERT INTO diretor(nome_dir) VALUES("Brad Bird");
INSERT INTO diretor(nome_dir) VALUES("Bryan Singer");

-- Inserindo generos
INSERT INTO genero(nome_gen) VALUES("Fantasia");
INSERT INTO genero(nome_gen) VALUES("Ficção Cientifica");
INSERT INTO genero(nome_gen) VALUES("Biografia");

-- Inserindo filmes
INSERT INTO filme(nome_fil, diretor_fil, genero_fil, descricao_fil) VALUES("Animais Fantasticos e Onde Habitam",1,1,"Um excêntrico magizoologista carrega uma maleta cheia de animais mágicos coletados durante suas viagens pelo mundo.");
INSERT INTO filme(nome_fil, diretor_fil, genero_fil, descricao_fil) VALUES("Os Incriveis 2",2,2,"A Mulher Elástica entra em ação para salvar o dia, enquanto o Sr. Incrível enfrenta seu maior desafio até agora: cuidar dos problemas de seus três filhos.");
INSERT INTO filme(nome_fil, diretor_fil, genero_fil, descricao_fil) VALUES("Bohemian Rhapsody",3,3,"Freddie Mercury, Brian May, Roger Taylor e John Deacon formam a banda de rock Queen em 1970. Quando o estilo de vida agitado de Mercury começa a sair de controle, o grupo precisa encontrar uma forma de lidar com o sucesso e os excessos de seu líder.");

-- Inserindo criticas
INSERT INTO critica(descricao_cri, filme_cri, nota_cri) VALUES("Excelente filme, muito coerente com o universo de Harry Potter",1,5);
INSERT INTO critica(descricao_cri, filme_cri, nota_cri) VALUES("Filme divertido, uma otima opção para familia",2,4);
INSERT INTO critica(descricao_cri, filme_cri, nota_cri) VALUES("O filme deixa claro quem foi o Freddie e a banda Queen",3,4);
