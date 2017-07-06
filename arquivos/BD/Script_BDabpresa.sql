CREATE TABLE categorias (
 id SERIAL PRIMARY KEY,
 titulo_categoria VARCHAR NOT NULL
);

CREATE TABLE tags (
 id SERIAL PRIMARY KEY,
 descricao_tag VARCHAR NULL
);

CREATE TABLE tipo_arquivo (
 id SERIAL PRIMARY KEY,
 descricao_tipo_arquivo VARCHAR NOT NULL
);

CREATE TABLE usuarios (
 id SERIAL PRIMARY KEY,
 nome VARCHAR NOT NULL,
 username VARCHAR NOT NULL,
 password VARCHAR NOT NULL
);

CREATE TABLE praticas (
 id SERIAL PRIMARY KEY,
 titulo_pratica VARCHAR NOT NULL,
 descricao_pratica VARCHAR NOT NULL,
 categorias_id INTEGER NOT NULL REFERENCES categorias(id) --ver a possibilidade de deletar categoria com praticas associadas
);

CREATE TABLE arquivos (
 id SERIAL PRIMARY KEY,
 cod_arquivo VARCHAR UNIQUE NULL,
 titulo_arquivo VARCHAR NOT NULL,
 descricao_arquivo VARCHAR NULL,
 path_arquivo VARCHAR NOT NULL,
 tipo_arquivo_id INTEGER NOT NULL REFERENCES tipo_arquivo(id)
);

CREATE TABLE praticas_arquivos (
 id SERIAL PRIMARY KEY,
 praticas_id INTEGER NOT NULL REFERENCES praticas(id),
 arquivos_id INTEGER NOT NULL REFERENCES arquivos(id)
);

CREATE TABLE praticas_tags (
 id SERIAL PRIMARY KEY,
 praticas_id INTEGER NOT NULL REFERENCES praticas(id),
 tags_id INTEGER NOT NULL REFERENCES tags(id)
);

---------------------------------------------------------------------
/*INSERTS*/
---------------------------------------------------------------------
INSERT INTO categorias (id, titulo_categoria) VALUES (1, 'RUP');
INSERT INTO categorias (id, titulo_categoria) VALUES (2, 'XP');
INSERT INTO categorias (id, titulo_categoria) VALUES (3, 'SCRUM');

INSERT INTO tags (id, descricao_tag) VALUES (1, 'GERENCIA');
INSERT INTO tags (id, descricao_tag) VALUES (2, 'DESENVOLVIMENTO');
INSERT INTO tags (id, descricao_tag) VALUES (3, 'REUNIOES');
INSERT INTO tags (id, descricao_tag) VALUES (4, 'XP');
INSERT INTO tags (id, descricao_tag) VALUES (5, 'TESTES');

INSERT INTO tipo_arquivo (id, descricao_tipo_arquivo) VALUES (1, 'PDF');
INSERT INTO tipo_arquivo (id, descricao_tipo_arquivo) VALUES (2, 'PNG');
INSERT INTO tipo_arquivo (id, descricao_tipo_arquivo) VALUES (3, 'DOC');

INSERT INTO arquivos (id, cod_arquivo, titulo_arquivo, descricao_arquivo, path_arquivo, tipo_arquivo_id) 
VALUES (1, 'A001', 'Arquivo A001', 'descricao do arquivo A001', '/diretorio/teste/A001.pdf', 1);
INSERT INTO arquivos (id, cod_arquivo, titulo_arquivo, descricao_arquivo, path_arquivo, tipo_arquivo_id) 
VALUES (2, 'A002', 'Arquivo A002', 'descricao do arquivo A002', '/diretorio/teste/A002.pdf', 1);
INSERT INTO arquivos (id, cod_arquivo, titulo_arquivo, descricao_arquivo, path_arquivo, tipo_arquivo_id) 
VALUES (3, 'B001', 'Arquivo B001', 'descricao do arquivo B001', '/diretorio/teste/B001.png', 2);

INSERT INTO praticas (id, titulo_pratica, descricao_pratica, categorias_id) VALUES (1, 'Planning Pocker', 'Descrição da boa prática Planning Pocker', 3);
INSERT INTO praticas (id, titulo_pratica, descricao_pratica, categorias_id) VALUES (2, 'Reunios Diarias', 'Descrição da boa prática Reunios Diarias', 2);
INSERT INTO praticas (id, titulo_pratica, descricao_pratica, categorias_id) VALUES (3, 'Desenvolvimento em Pares', 'Descrição da boa prática Desenvolvimento em Pares', 2);
INSERT INTO praticas (id, titulo_pratica, descricao_pratica, categorias_id) VALUES (4, 'Disponibilidade do Cliente', 'Descrição da boa prática Disponibilidade do Cliente', 2);
INSERT INTO praticas (id, titulo_pratica, descricao_pratica, categorias_id) VALUES (5, 'Small Releases', 'Descrição da boa prática Small Releases', 2);
INSERT INTO praticas (id, titulo_pratica, descricao_pratica, categorias_id) VALUES (6, 'Testes de Aceitação', 'Descrição da boa prática Testes de Aceitação', 2);

INSERT INTO praticas_tags (id, praticas_id, tags_id) VALUES (1, 1, 1);
INSERT INTO praticas_tags (id, praticas_id, tags_id) VALUES (2, 1, 3);
INSERT INTO praticas_tags (id, praticas_id, tags_id) VALUES (3, 2, 3);
INSERT INTO praticas_tags (id, praticas_id, tags_id) VALUES (4, 2, 4);
INSERT INTO praticas_tags (id, praticas_id, tags_id) VALUES (5, 3, 4);
INSERT INTO praticas_tags (id, praticas_id, tags_id) VALUES (6, 3, 2);
INSERT INTO praticas_tags (id, praticas_id, tags_id) VALUES (7, 4, 3);
INSERT INTO praticas_tags (id, praticas_id, tags_id) VALUES (8, 4, 4);
INSERT INTO praticas_tags (id, praticas_id, tags_id) VALUES (9, 5, 4);
INSERT INTO praticas_tags (id, praticas_id, tags_id) VALUES (10, 6, 4);
INSERT INTO praticas_tags (id, praticas_id, tags_id) VALUES (11, 6, 5);

INSERT INTO praticas_arquivos (id, praticas_id, arquivos_id) VALUES (1, 1, 1);
INSERT INTO praticas_arquivos (id, praticas_id, arquivos_id) VALUES (2, 1, 2);
INSERT INTO praticas_arquivos (id, praticas_id, arquivos_id) VALUES (3, 2, 3);
INSERT INTO praticas_arquivos (id, praticas_id, arquivos_id) VALUES (4, 4, 2);
INSERT INTO praticas_arquivos (id, praticas_id, arquivos_id) VALUES (5, 5, 2);
INSERT INTO praticas_arquivos (id, praticas_id, arquivos_id) VALUES (6, 6, 2);

INSERT INTO usuarios (id, nome, username, password) VALUES (1, 'Jonathas Almeida', 'jonathas.almeida', 12345);
INSERT INTO usuarios (id, nome, username, password) VALUES (2, 'Alber Jonathas', 'alber.jonathas', 12345);
INSERT INTO usuarios (id, nome, username, password) VALUES (3, 'Samyra Almeida', 'samyra.almeida', 12345);
INSERT INTO usuarios (id, nome, username, password) VALUES (4, 'Heremita Brasileiro', 'heremita.brasileiro', 12345);