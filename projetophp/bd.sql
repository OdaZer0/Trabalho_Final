create database Automatiza;

Use Automatiza;

Create table Autonomo(
    Cpf_autonomo varchar(14) primary key,  
    Nome_autonomo varchar(40),
    Senha_autonomo varchar(25),
    Area_atuacao_autonomo varchar(40),
    Contato_autonomo varchar(60),
    Email_autonomo varchar(60)
);

Create table Contato(
    Email varchar(60),
    Contato varchar(60),
    Cpf_autonomo varchar(14)  
);

Create table Usuario(
    Nome_usuario varchar(40),
    Email_usuario varchar(60),
    Senha_usuario varchar(25),
    Cep_usuario int(8),
    Cpf_usuario varchar(14) primary key  
);

Create table Empresa(
    Nome_empresa varchar(25),
    Email_empresa varchar(40),
    Senha_empresa varchar(25),
    Cnpj_empresa int(14) primary key,
    Cep_empresa int(8),
    Contato_empresa int(11)
);

CREATE TABLE Produtos (
    Id_produto INT AUTO_INCREMENT PRIMARY KEY,
    Nome_produto VARCHAR(25),
    Preco_produto FLOAT(5),
    Descricao_produto VARCHAR(100),
    Quantidade_produto INT(3)
);

Select * from Produtos;
