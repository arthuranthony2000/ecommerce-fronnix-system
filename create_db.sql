CREATE DATABASE sistema_financeiro;
USE sistema_financeiro;

CREATE TABLE Usuario (
    idUsuario INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(20) NOT NULL,
    password VARCHAR(45) NOT NULL,
    acess_token VARCHAR(45),
    auth_key VARCHAR(45),
    tipoUsuario VARCHAR(45),
    status INT DEFAULT 1,

    UNIQUE KEY `username_UNIQUE` (`username`)
);

CREATE TABLE Endereco (
    idEndereco INT AUTO_INCREMENT PRIMARY KEY,
    pais VARCHAR(20) NOT NULL,
    uf VARCHAR(15),
    cep INT NOT NULL,
    cidade VARCHAR(20),
    bairro VARCHAR(45) NOT NULL,
    endereco VARCHAR(45) NOT NULL,
    numEstabelecimento INT NOT NULL
);

CREATE TABLE Categoria (
    idCategoria INT AUTO_INCREMENT PRIMARY KEY,
    nomeCategoria VARCHAR(15) NOT NULL,
    descricaoCategoria TEXT NOT NULL
);

CREATE TABLE Cliente (
    idCliente INT AUTO_INCREMENT PRIMARY KEY,
    nomeCliente VARCHAR(15) NOT NULL,
    sobrenomeCliente VARCHAR(15),
    emailCliente VARCHAR(45) NOT NULL UNIQUE,
    telefoneCliente VARCHAR(20) UNIQUE,
    cpfCliente VARCHAR(20) NOT NULL UNIQUE,
    rgCliente VARCHAR(20) UNIQUE,
    dataNascimento DATE,
    idEndereco INT NOT NULL,
    idUsuario INT,

    FOREIGN KEY (idEndereco) REFERENCES Endereco(idEndereco),
    FOREIGN KEY (idUsuario) REFERENCES Usuario(idUsuario)
);

CREATE TABLE Fornecedor (
    idFornecedor INT AUTO_INCREMENT PRIMARY KEY,
    nomeFornecedor VARCHAR(20) NOT NULL,
    telefoneFornecedor VARCHAR(20) UNIQUE,
    emailFornecedor VARCHAR(45) NOT NULL UNIQUE,
    cnpjFornecedor VARCHAR(45) NOT NULL UNIQUE,
    descricaoFornecedor TEXT,
    idEndereco INT NOT NULL,
    idUsuario INT,

    FOREIGN KEY (idEndereco) REFERENCES Endereco(idEndereco),
    FOREIGN KEY (idUsuario) REFERENCES Usuario(idUsuario)
);

CREATE TABLE Pedido (
    idPedido INT AUTO_INCREMENT PRIMARY KEY,
    idUsuario INT NOT NULL,
    finalizado CHAR(4) DEFAULT '0',

    FOREIGN KEY (idUsuario) REFERENCES Usuario(idUsuario)
);

CREATE TABLE Produto (
    idProduto INT AUTO_INCREMENT PRIMARY KEY,
    nomeProduto VARCHAR(100) NOT NULL,
    valorProduto DOUBLE NOT NULL,
    desconto DOUBLE,
    estoque INT NOT NULL,
    idCategoria INT NOT NULL,
    marcaProduto VARCHAR(15),
    descricaoProduto TEXT,
    idFornecedor INT,
    imagem VARCHAR(300),

    FOREIGN KEY (idCategoria) REFERENCES Categoria(idCategoria),
    FOREIGN KEY (idFornecedor) REFERENCES Fornecedor(idFornecedor)
);

CREATE TABLE Formapagamento (
    idFormaPagamento INT AUTO_INCREMENT PRIMARY KEY,
    numCartao BIGINT NOT NULL CHECK (numCartao >= 1000000000000000 AND numCartao <= 9999999999999999),
    mesValidade CHAR(2) NOT NULL,
    anoValidade CHAR(4) NOT NULL,
    nomeTitular VARCHAR(45) NOT NULL,
    codSeguranca INT NOT NULL CHECK (codSeguranca >= 100 AND codSeguranca <= 999),
    idPedido INT NOT NULL,

    FOREIGN KEY (idPedido) REFERENCES Pedido(idPedido)
);

CREATE TABLE Pedidoproduto (
    qtdProduto INT NOT NULL,
    idPedido INT NOT NULL,
    idProduto INT NOT NULL,

    PRIMARY KEY (idPedido, idProduto),

    FOREIGN KEY (idPedido) REFERENCES Pedido(idPedido),
    FOREIGN KEY (idProduto) REFERENCES Produto(idProduto)
);

