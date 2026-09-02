/*
Modelo de base de dados inicial para a implementação do CRUD Jogos
*/

/* TABELA generos */
CREATE TABLE generos ( 
  id int AUTO_INCREMENT NOT NULL, 
  nome varchar(70) NOT NULL,
  CONSTRAINT pk_generos PRIMARY KEY (id) 
);

/* INSERTs generos */
INSERT INTO generos (nome) VALUES ('Ação');
INSERT INTO generos (nome) VALUES ('RPG');
INSERT INTO generos (nome) VALUES ('Esporte');
INSERT INTO generos (nome) VALUES ('Estratégia');


/* TABELA classificacoes */
CREATE TABLE classificacoes ( 
  id int AUTO_INCREMENT NOT NULL, 
  codigo varchar(2) NOT NULL, /* L, 10, 12, 14, 16, 18 */
  CONSTRAINT pk_classificacoes PRIMARY KEY (id) 
);

/* INSERTs classificacoes */
INSERT INTO classificacoes (codigo) VALUES ('L');
INSERT INTO classificacoes (codigo) VALUES ('10');
INSERT INTO classificacoes (codigo) VALUES ('12');
INSERT INTO classificacoes (codigo) VALUES ('14');
INSERT INTO classificacoes (codigo) VALUES ('16');
INSERT INTO classificacoes (codigo) VALUES ('18');


/* TABELA jogos */
CREATE TABLE jogos (
  id int AUTO_INCREMENT NOT NULL, 
  nome varchar(70) NOT NULL, 
  ano int NOT NULL,
  multiplayer varchar(1) NOT NULL, /* S=Sim, N=Não */
  id_genero int NOT NULL, 
  id_classificacao int NOT NULL,
  CONSTRAINT pk_jogos PRIMARY KEY (id)
);
ALTER TABLE jogos ADD CONSTRAINT fk_genero FOREIGN KEY (id_genero) REFERENCES generos (id);
ALTER TABLE jogos ADD CONSTRAINT fk_classificacao FOREIGN KEY (id_classificacao) REFERENCES classificacoes (id);
