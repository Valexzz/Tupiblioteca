DROP DATABASE IF EXISTS BIBLIOTECA;

CREATE DATABASE BIBLIOTECA
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;



USE BIBLIOTECA;

DROP TABLE IF EXISTS TBL_PESSOA;
CREATE TABLE TBL_PESSOA(
id_pessoa  int auto_increment PRIMARY KEY ,
user_login varchar(150),
user_senha varchar(150)
);
DROP TABLE IF EXISTS TBL_TIPO_CADASTRO;
CREATE TABLE TBL_TIPO_CADASTRO(
id_tipo_cadastro int auto_increment PRIMARY KEY,
descricao varchar(50)
);
DROP TABLE IF EXISTS TBL_CATEGORIA;
CREATE TABLE TBL_CATEGORIA(
id_categoria int auto_increment PRIMARY KEY,
descricao varchar(45)
);
DROP TABLE IF EXISTS TBL_EDITORA;
CREATE TABLE TBL_EDITORA(
id_editora int auto_increment PRIMARY KEY,
descricao varchar(45)
);
DROP TABLE IF EXISTS TBL_ESTADO;
CREATE TABLE TBL_ESTADO(
id_estado int auto_increment PRIMARY KEY,
uf varchar(2)
);
DROP TABLE IF EXISTS TBL_CIDADE;
CREATE TABLE TBL_CIDADE(
id_cidade int auto_increment PRIMARY KEY,
cod_estado int,
nome varchar(45),
foreign key (cod_estado) references TBL_ESTADO(id_estado)
);
DROP TABLE IF EXISTS TBL_CADASTRO_GERAL;
CREATE TABLE TBL_CADASTRO_GERAL(
id_cadastro_geral int auto_increment PRIMARY KEY,
cod_tipo_cadastro int,
titulo varchar(90),
autores varchar(80),
cod_editora int,
edicao int(3),
ano int(4),
codigo_barras varchar(30),
num_isbn varchar(30),
cod_cidade int,
idioma varchar(45),
aquisicao DATETIME DEFAULT CURRENT_TIMESTAMP,
cod_categoria int,
assunto varchar(80),
classificacao varchar(45),
colecao_volume varchar(45),
extra text,
resenha text,
comentario text,
imagem text,
ativo_inativo enum('ativo', 'inativo') DEFAULT 'ativo',
foreign key (cod_tipo_cadastro) references TBL_TIPO_CADASTRO(id_tipo_cadastro),
foreign key (cod_editora) REFERENCES TBL_EDITORA(id_editora),
foreign key (cod_cidade) REFERENCES TBL_CIDADE(id_cidade),
FOREIGN KEY (cod_categoria) REFERENCES TBL_CATEGORIA(id_categoria)
);

#inserção da pessoa:

insert into TBL_PESSOA(id_pessoa, user_login, user_senha) values (1, 'adm', '123');

#inserção do cadastro:

insert into TBL_TIPO_CADASTRO(id_tipo_cadastro, descricao) values (1, 'Livro');
insert into TBL_TIPO_CADASTRO(id_tipo_cadastro, descricao) values (2, 'manual');
insert into TBL_TIPO_CADASTRO(id_tipo_cadastro, descricao) values (3, 'revista');
insert into TBL_TIPO_CADASTRO(id_tipo_cadastro, descricao) values (4, 'vídeo');
insert into TBL_TIPO_CADASTRO(id_tipo_cadastro, descricao) values (5, 'gibi');
insert into TBL_TIPO_CADASTRO(id_tipo_cadastro, descricao) values (6, 'Outro');

#inserção da categoria:

insert into TBL_CATEGORIA(descricao) values ('Fantasia'); # a ordem vermelha
insert into TBL_CATEGORIA(descricao) values ('Ficção científica'); # serpentário
insert into TBL_CATEGORIA(descricao) values ('Romance');
insert into TBL_CATEGORIA(descricao) values ('Drama');
insert into TBL_CATEGORIA(descricao) values ('Suspense');
insert into TBL_CATEGORIA(descricao) values ('Jurídico');
insert into TBL_CATEGORIA(descricao) values ('Biografia');
insert into TBL_CATEGORIA(descricao) values ('Folclore');
insert into TBL_CATEGORIA(descricao) values ('Conto');
insert into TBL_CATEGORIA(descricao) values ('Infanto juvenil');
insert into TBL_CATEGORIA(descricao) values ('Super-herói');
insert into TBL_CATEGORIA(descricao) values ('Humor');
insert into TBL_CATEGORIA(descricao) values ('Jogos');
insert into TBL_CATEGORIA(descricao) values ('Poesia');
insert into TBL_CATEGORIA(descricao) values ('Matemática');
insert into TBL_CATEGORIA(descricao) values ('História');
insert into TBL_CATEGORIA(descricao) values ('Geografia');
insert into TBL_CATEGORIA(descricao) values ('Sociologia');
insert into TBL_CATEGORIA(descricao) values ('Religião');
insert into TBL_CATEGORIA(descricao) values ('Outro');

#inserção da editora:

insert into TBL_EDITORA(descricao) values ('Editora Intrínseca');
insert into TBL_EDITORA(descricao) values ('Companhia das Letras');
insert into TBL_EDITORA(descricao) values ('Editora Rocco');
insert into TBL_EDITORA(descricao) values ('Editora Arqueiro');
insert into TBL_EDITORA(descricao) values ('Editora Sextante');
insert into TBL_EDITORA(descricao) values ('Harper Collins');
insert into TBL_EDITORA(descricao) values ('Editora Record');
insert into TBL_EDITORA(descricao) values ('Saraiva');
insert into TBL_EDITORA(descricao) values ('Darkside Books');
insert into TBL_EDITORA(descricao) values ('Alta Books');

#inserção dos estados:

insert into TBL_ESTADO(id_estado, uf) values (1, 'AC');
insert into TBL_ESTADO(id_estado, uf) values (2, 'AL');
insert into TBL_ESTADO(id_estado, uf) values (3, 'AM');
insert into TBL_ESTADO(id_estado, uf) values (4, 'AP');
insert into TBL_ESTADO(id_estado, uf) values (5, 'BA');
insert into TBL_ESTADO(id_estado, uf) values (6, 'CE');
insert into TBL_ESTADO(id_estado, uf) values (7, 'DF');
insert into TBL_ESTADO(id_estado, uf) values (8, 'ES');
insert into TBL_ESTADO(id_estado, uf) values (9, 'GO');
insert into TBL_ESTADO(id_estado, uf) values (10, 'MA');
insert into TBL_ESTADO(id_estado, uf) values (11, 'MG');
insert into TBL_ESTADO(id_estado, uf) values (12, 'MS');
insert into TBL_ESTADO(id_estado, uf) values (13, 'MT');
insert into TBL_ESTADO(id_estado, uf) values (14, 'PA');
insert into TBL_ESTADO(id_estado, uf) values (15, 'PB');
insert into TBL_ESTADO(id_estado, uf) values (16, 'PE');
insert into TBL_ESTADO(id_estado, uf) values (17, 'PI');
insert into TBL_ESTADO(id_estado, uf) values (18, 'PR');
insert into TBL_ESTADO(id_estado, uf) values (19, 'RJ');
insert into TBL_ESTADO(id_estado, uf) values (20, 'RN');
insert into TBL_ESTADO(id_estado, uf) values (21, 'RO');
insert into TBL_ESTADO(id_estado, uf) values (22, 'RR');
insert into TBL_ESTADO(id_estado, uf) values (23, 'RS');
insert into TBL_ESTADO(id_estado, uf) values (24, 'SC');
insert into TBL_ESTADO(id_estado, uf) values (25, 'SE');
insert into TBL_ESTADO(id_estado, uf) values (26, 'SP');
insert into TBL_ESTADO(id_estado, uf) values (27, 'TO');

#inserção das cidades:
insert into TBL_CIDADE(cod_estado, nome) values (26, 'São Paulo');
insert into TBL_CIDADE(cod_estado, nome) values (9, 'Goiânia');
insert into TBL_CIDADE(cod_estado, nome) values (16, 'Alagoinha');
insert into TBL_CIDADE(cod_estado, nome) values (15, 'Serra Redonda');
insert into TBL_CIDADE(cod_estado, nome) values (11, 'Ouro Preto');
insert into TBL_CIDADE(cod_estado, nome) values (9, 'Santa Isabel');

#inserção dos livros :
insert into TBL_CADASTRO_GERAL(id_cadastro_geral, cod_tipo_cadastro, titulo, autores, cod_editora, edicao, ano, codigo_barras, num_isbn, cod_cidade, idioma, aquisicao, cod_categoria, assunto, classificacao, colecao_volume, extra, resenha, comentario, imagem)
VALUES (1, 1, 'Ordem Vermelha: Filhos da degradação', 'Felipe Castilho', 1, 1, 2017, '9788551002698', '9788551002698', 1, 'Português', default, 1, 'Revolução Mística', '16 anos', 'Volume 1', 'Ordem Vermelha','Você destruiria seu mundo em nome da verdade?A última região habitada do mundo, Untherak, é povoada por humanos, anões e gigantes, sinfos, kaorshs e gnolls. Nela, a deusa Una reina soberana, lembrando a todos a missão maior de suas vidas: servir a Ela sem questionamentos. No entanto, um pequeno grupo de rebeldes, liderado por uma figura misteriosa, está disposto a tudo para tirá-la do trono.', 'O livro começa meio lento, mas da metade para o final tudo muda, o ritmo e leitura ficam muito mais atrativos. Me surpreendeu muito e considero um dos meus prediletos. Estou aguardando ansiosamente o segundo volume.', 'uploads/ordem_vermelha.jpg');

insert into TBL_CADASTRO_GERAL(id_cadastro_geral, cod_tipo_cadastro, titulo, autores, cod_editora, edicao, ano, codigo_barras, num_isbn, cod_cidade, idioma, aquisicao, cod_categoria, assunto, classificacao, colecao_volume, extra, resenha, comentario, imagem)
VALUES (2, 1, 'Serpentário', 'Felipe Castilho', 1, 1, 2019, '9788551005309', '8551005308', 1, 'Português', default, 2, 'Mitologia Sombria', '14 anos', 'Volume 1', 'No entanto, a amizade construída nas areias do litoral sofreu abalos sísmicos no Réveillon de 1999, quando algo tão inquietante quanto o bug do milênio abriu caminho para uma misteriosa ilha que despontava no horizonte, e explorá-la talvez não tenha sido a melhor decisão','Serpentário é um livro cheio de suspense, intrigante e difícil de largar. Os monstros criados por Castilho são capazes de despertar nossos medos tanto de ameaças concretas como abstratas e desconhecidas.', ' Eu estava com as expectativas muito altas depois de ler Ordem Vermelha, Filhos da Degradação, do Felipe Castilho; por causa disso, acabei me decepcionando bastante com Serpentário. A escrita continua ótima, mas a narrativa foi bem confusa e acabei não me apegando a nenhum dos personagens.', 'uploads/serpentario.jpg');

SELECT g.id_cadastro_geral, g.titulo, g.autores, g.edicao, g.ano, g.codigo_barras, g.num_isbn, g.idioma, date_format(cast(g.aquisicao AS DATE), '%d/%m/%y') as aquisicao, g.assunto, g.classificacao, g.colecao_volume, g.extra, g.resenha, g.comentario, g.imagem, g.ativo_inativo,
t.descricao AS tipo,
e.descricao AS editora,
ci.nome AS cidade,
uf.uf AS uf,
c.descricao AS categoria
FROM 
TBL_CADASTRO_GERAL AS g
LEFT JOIN TBL_TIPO_CADASTRO AS t 
ON g.cod_tipo_cadastro = t.id_tipo_cadastro
LEFT JOIN TBL_EDITORA AS e
ON g.cod_editora = e.id_editora	
LEFT JOIN TBL_CIDADE AS ci
ON g.cod_cidade = ci.id_cidade
LEFT JOIN TBL_ESTADO AS uf
ON ci.cod_estado = uf.id_estado
LEFT JOIN TBL_CATEGORIA AS c
ON g.cod_categoria = c.id_categoria
ORDER BY ativo_inativo;
select * from TBL_CADASTRO_GERAL;


SELECT g.id_cadastro_geral, g.titulo, g.autores, g.edicao, g.ano, g.codigo_barras, g.num_isbn, g.idioma, date_format(cast(g.aquisicao AS DATE), "%d/%m/%y") as aquisicao, g.assunto, g.classificacao, g.colecao_volume, g.extra, g.resenha, g.comentario, g.imagem, g.ativo_inativo,
    t.descricao AS tipo,
    e.descricao AS editora,
    ci.nome AS cidade,
    uf.uf AS uf,
    c.descricao AS categoria
    FROM 
    TBL_CADASTRO_GERAL AS g
    LEFT JOIN TBL_TIPO_CADASTRO AS t 
    ON g.cod_tipo_cadastro = t.id_tipo_cadastro
    LEFT JOIN TBL_EDITORA AS e
    ON g.cod_editora = e.id_editora	
    LEFT JOIN TBL_CIDADE AS ci
    ON g.cod_cidade = ci.id_cidade
    LEFT JOIN TBL_ESTADO AS uf
    ON ci.cod_estado = uf.id_estado
    LEFT JOIN TBL_CATEGORIA AS c
    ON g.cod_categoria = c.id_categoria
	WHERE g.ativo_inativo = "ativo" && NOT(imagem = '')
    ORDER BY RAND()
	LIMIT 0,1;
    
    SELECT g.cod_tipo_cadastro, g.cod_editora, g.cod_categoria, g.id_cadastro_geral, g.titulo, g.autores, g.edicao, g.imagem, g.ativo_inativo,
    t.descricao AS tipo,
    e.descricao AS editora,
    c.descricao AS categoria
    FROM 
    TBL_CADASTRO_GERAL AS g
    LEFT JOIN TBL_TIPO_CADASTRO AS t 
    ON g.cod_tipo_cadastro = t.id_tipo_cadastro
    LEFT JOIN TBL_EDITORA AS e
    ON g.cod_editora = e.id_editora	
    LEFT JOIN TBL_CATEGORIA AS c
    ON g.cod_categoria = c.id_categoria
    WHERE g.ativo_inativo = "ativo" AND g.titulo LIKE 'Ordem%' 

