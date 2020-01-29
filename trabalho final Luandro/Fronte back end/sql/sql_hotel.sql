DROP DATABASE IF EXISTS id9305608_hotel;

CREATE DATABASE id9305608_hotel DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE id9305608_hotel;

DROP USER IF EXISTS 'usuario'@'localhost';

CREATE USER 'usuario'@'localhost' IDENTIFIED BY 'senha'; 

GRANT SELECT, INSERT, UPDATE, DELETE ON id9305608_hotel.* TO 'usuario'@'localhost';


CREATE TABLE cliente (
    Nome varchar(30),
    RG Bigint(10),
    CPF Bigint(12) PRIMARY KEY,
    Endereco varchar(50),
    Telefone Bigint(15),
    email varchar(30),
    senha varchar(50),
    Data_nascimento date
);

CREATE TABLE quartos (
    Andar int(3),    
    Tipo varchar(80),
    Numero int(4),
    imagem VARCHAR(50), 
    Identificador integer AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE pagamento (
    Forma_pagamento varchar(20),
    valor float(6),
    cod int(5) PRIMARY KEY,
    fk_cliente_quarto_cod_pagamento int(5),
    Data date,
    hora time
);

CREATE TABLE hotel (
    Cidade varchar(20),
    Sigla varchar(5) PRIMARY KEY,
    Avaliacao varchar(150),
    Nota int(2)
);

CREATE TABLE cliente_quarto (
    data_entrada date,
    data_saida date,
    hora_entrada time,
    hora_saida time,
    cod_pagamento integer AUTO_INCREMENT PRIMARY KEY,
    fk_quartos_Identificador int(5),
    fk_cliente_CPF Bigint(12)
);

CREATE TABLE possui (
    fk_quartos_Identificador int(5),
    fk_hotel_Sigla varchar(5)
);
 
ALTER TABLE pagamento ADD CONSTRAINT FK_pagamento_2
    FOREIGN KEY (fk_cliente_quarto_cod_pagamento)
    REFERENCES cliente_quarto (cod_pagamento)
    ON DELETE CASCADE;
 
ALTER TABLE cliente_quarto ADD CONSTRAINT FK_cliente_quarto_2
    FOREIGN KEY (fk_quartos_Identificador)
    REFERENCES quartos (Identificador);
 
ALTER TABLE cliente_quarto ADD CONSTRAINT FK_cliente_quarto_3
    FOREIGN KEY (fk_cliente_CPF)
    REFERENCES cliente (CPF);
 
ALTER TABLE possui ADD CONSTRAINT FK_possui_1
    FOREIGN KEY (fk_quartos_Identificador)
    REFERENCES quartos (Identificador)
    ON DELETE RESTRICT;
 
ALTER TABLE possui ADD CONSTRAINT FK_possui_2
    FOREIGN KEY (fk_hotel_Sigla)
    REFERENCES hotel (Sigla)
    ON DELETE RESTRICT;


