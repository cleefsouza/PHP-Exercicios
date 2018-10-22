-- CRIAR DATABASE
CREATE DATABASE minisitephp;

-- SELECIONANDO DATABASE
USE minisitephp;

-- CRIAR TABELA AVALIAÇÃO
CREATE TABLE avaliacao(
    codigo INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    comentario TEXT NOT NULL,
    PRIMARY KEY(codigo)
);

-- CRIAR TABELA CONTEUDO
CREATE TABLE conteudo(
    codigo INT NOT NULL AUTO_INCREMENT,
    paragrafo TEXT NOT NULL,
    PRIMARY KEY(codigo)
);

-- INSERINDO EXEMPLO EM AVALIAÇÃO
INSERT INTO avaliacao(nome, email, comentario) VALUES('Cleef Souza','a.cleef.souza@gmail.com','Site Maravilhoso!');

-- INSERINDO CONTEUDO
INSERT INTO conteudo(paragrafo) VALUES('<h2>Os Cinco Solas da Reforma</h2>
    <p>
        Antes da reforma protestante do século XVI, os ensinos, as ações e a postura da igreja Católica Romana, incomodavam os verdadeiros crentes, que procuravam pautar suas vidas nos ensinos das Escrituras Sagradas.
    </p>
    <p>
        Homens como Jerônimo Savanarola, João Huss e tantos outros foram mortos por defenderem seus ideais de conduta e fé.
    </p>
    <p>
        O monge agostiniano Martinho Lutero seguindo o mesmo ideal de lealdade às Escrituras. No dia 31 de outubro de 1517, Lutero afixa à porta da igreja do castelo de Witenberg, as suas 95 teses, cujo teor resume-se em que Cristo requer o arrependimento e a
    tristeza pelo pecado e não a penitência.
    </p>
    <p>
        Com o desenvolvimento dos estudos de Lutero e suas teses surgem os cinco pilares da reforma protestante que são também conhecidos como os cinco solas da reforma, são princípios fundamentais da reforma protestante sintetizando o credo dos teólogos protestantes.
    </p>
    <p>
        A palavra sola é uma palavra latina que significa "somente", esses pontos surgem com o propósito de se oporem ao pensamento, conduta e ensino da igreja romana da época.
    </p>');