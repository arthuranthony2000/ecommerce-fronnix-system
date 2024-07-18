-- Inserir usuário admin
INSERT INTO Usuario (username, password, tipoUsuario) VALUES ('admin', SHA1('senha123'), 'administrador');

-- Inserir usuário arthur
INSERT INTO Usuario (username, password, tipoUsuario) VALUES ('arthur', SHA1('senha123'), 'cliente');

-- Inserir dados obrigatórios para testes
INSERT INTO Endereco (pais, cep, bairro, endereco, numEstabelecimento) VALUES ('Brasil', 12345678, 'Centro', 'Rua Principal', 100);

-- Inserir categoria
INSERT INTO Categoria (nomeCategoria, descricaoCategoria) VALUES ('Música', 'Categoria para produtos relacionados a música');

-- Inserir cliente arthur
INSERT INTO Cliente (nomeCliente, emailCliente, cpfCliente, idEndereco, idUsuario) VALUES ('Arthur', 'arthur@example.com', '123.456.789-00', 1, 2);

-- Inserir fornecedor
INSERT INTO Fornecedor (nomeFornecedor, emailFornecedor, cnpjFornecedor, idEndereco, idUsuario) VALUES ('Fornecedor A', 'fornecedor@example.com', '12.345.678/0001-00', 1, 1);

-- Inserir produto
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem)
VALUES ('Violão XYZ', 1200.00, 50, 1, 1, 'XYZ', 'Descrição do produto Violão XYZ', 'https://www.tritons.com.br/media/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/2/4/24.jpg');
