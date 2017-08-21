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
 password VARCHAR NOT NULL,
 email VARCHAR NOT NULL,
 tipo_usuario VARCHAR NOT NULL
);

CREATE TABLE praticas (
 id SERIAL PRIMARY KEY,
 titulo_pratica VARCHAR NOT NULL,
 descricao_pratica VARCHAR NOT NULL,
 categorias_id INTEGER NOT NULL REFERENCES categorias(id) --ver a possibilidade de deletar categoria com praticas associadas
);

CREATE TABLE arquivos (
 id SERIAL PRIMARY KEY,
 titulo_arquivo VARCHAR NOT NULL,
 descricao_arquivo VARCHAR NULL,
 path_arquivo VARCHAR NOT NULL,
 tipo VARCHAR NOT NULL
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

INSERT INTO usuarios (id, nome, username, email, password, tipo_usuario) VALUES (1, 'Jonathas Almeida', 'jonathas.almeida', 'jonathasarts@gmail.com', 12345, 'ADM');
INSERT INTO usuarios (id, nome, username, email, password, tipo_usuario) VALUES (2, 'Alber Jonathas', 'alber.jonathas', 'alber.jonathas@gmail.com', 12345, 'NORMAL');
INSERT INTO usuarios (id, nome, username, email, password, tipo_usuario) VALUES (3, 'Samyra Almeida', 'samyra.almeida', 'samyra.almeida@gmail.com', 12345, 'NORMAL');
INSERT INTO usuarios (id, nome, username, email, password, tipo_usuario) VALUES (4, 'Heremita Brasileiro', 'heremita.brasileiro', 'heremita.brasileiro@gmail.com', 12345, 'ADM');