
-- SQL TAVELA USUARIO
CREATE TABLE usuario(

id int  PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome varchar(45),
    cpf varchar(15),
    senha varchar(45)
    

);

INSERT INTO usuario(nome, cpf,senha) VALUES
('Guilherme', '123.123.123-12','123'),
('larissa','321.321.321-32','321');


-- SQL  TABELA CIDADE
CREATE TABLE cidade(

    id int  PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome varchar(45),
    cep varchar(15),
   estado varchar(15)
    

);

INSERT INTO cidade (nome, cep, estado)values
('Nova Londrina', '87.970-000', 'Paraná'),
('Marilena', '87.960-000', 'Paraná');



--SQL TABELA FUNCIONARIO
CREATE TABLE funcionario(

    id int  PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome varchar(245),
    cpf varchar(15),
    celular varchar(15),
    endereco varchar(255),
    numero int,
    bairro varchar(255),
    email varchar (255),
    cargo varchar(255),
    salario varchar (50),
    cidade_id int,
    FOREIGN KEY (cidade_id) REFERENCES cidade(id)

);

INSERT INTO funcionario (nome, cpf, celular, endereco, numero, bairro, email, cargo, salario, cidade_id ) VALUES
('Pamela', '444.444.444-44', '(44)944444444', 'Rua Nova Olimpía', 500, 'Centro', 'pamela@gamil.com', 'Gerente', '4.500', 1);


--SQL TABELA CLIENTE
CREATE TABLE cliente(

    id int  PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome varchar(245),
    cpf varchar(15),
    celular varchar(15),
    endereco varchar(255),
    numero int,
    bairro varchar(255),
    email varchar (255),
    cidade_id int,
    FOREIGN KEY (cidade_id) REFERENCES cidade(id)

);

INSERT INTO cliente(nome, cpf, celular, endereco, numero, bairro, email, cidade_id) VALUES
('Dominique', '888.888.888-77', '(44)955555555', 'Rua Santos', 55, 'Centro','dominique@gmail.com', 1);


-- SQL TABELA VENDA
CREATE TABLE venda (

id int PRIMARY KEY NOT null AUTO_INCREMENT,
    obs varchar (255),
    valor_total int,
    quantidade_total int,
    data_venda datetime default CURRENT_TIMESTAMP,
    cliente_id int,
    funcionario_id int,
      FOREIGN KEY (cliente_id) REFERENCES cliente(id),
     FOREIGN KEY (funcionario_id) REFERENCES funcionario(id)
    
);

INSERT INTO venda (obs, valor_total, quantidade_total, cliente_id, funcionario_id) values
('Venda com pendência', 50, 10, 1, 1);


--SQL TAVELA PRODUTO
CREATE TABLE produto(

id int PRIMARY KEY not null AUTO_INCREMENT,
    nome varchar(255) NOT null,
    preco decimal(10,2) not null,
    estoque int,
    custo int,
    lucro int,
    margem int

)

INSERT INTO produto (nome, preco, estoque, custo, lucro, margem) values 
('mouse',70, 3, 40, 30, 90),
('teclado',100, 10, 50, 50, 100);



create table item_venda(

id int PRIMARY KEY AUTO_INCREMENT not null,
    quantidade int,
    valor decimal(10,2),
    venda_id int, 
    produto_id int,
    FOREIGN KEY (venda_id) REFERENCES venda(id),
    FOREIGN KEY (produto_id) REFERENCES produto(id) 
);

insert into item_venda(quantidade, valor, venda_id, produto_id) values 
(2, 140, 1, 1),
(2, 140, 1, 2); 