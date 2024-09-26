CREATE TABLE usuario(

id int  PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome varchar(45),
    cpf varchar(15),
    senha varchar(45)
    

);

INSERT INTO usuario(nome, cpf,senha) VALUES
('Guilherme', '123.123.123-12','123'),
('larissa','321.321.321-32','321');''