CREATE DATABASE padoca;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    email VARCHAR(255),
    senha VARCHAR(255),
    chave VARCHAR(255),
    admin INT,
    ativo INT,
);


CREATE TABLE tipo (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	tipo VARCHAR(255)
);


CREATE TABLE produto (
    id INT AUTO_INCREMENT PRIMARY KEY ,
    nome VARCHAR(255) ,
    perecivel VARCHAR(1),
    tipo_produto INT,
    valor DECIMAL(10, 2) ,
    estoque INT,
    imagem VARCHAR(100)
);


ALTER TABLE produto
	ADD CONSTRAINT fk_tipo_produto
	FOREIGN KEY (tipo_produto)
	REFERENCES tipo(id);


INSERT INTO tipo
( cor )
VALUES
( 'Refrigerante' ),
( 'Salgado' ),
( 'Bolo' ),
( 'Suco' ),
( 'Lanche' ),
( 'Pao' );