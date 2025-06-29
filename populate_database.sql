-- Inserir usuários
INSERT INTO Usuario (username, password, tipoUsuario) VALUES ('admin', SHA1('senha123'), 'administrador');
INSERT INTO Usuario (username, password, tipoUsuario) VALUES ('arthur', SHA1('senha123'), 'cliente');
INSERT INTO Usuario (username, password, tipoUsuario) VALUES ('isaac', SHA1('senha123'), 'fornecedor');
INSERT INTO Usuario (username, password, tipoUsuario) VALUES ('maria.silva', SHA1('senha123'), 'fornecedor');
INSERT INTO Usuario (username, password, tipoUsuario) VALUES ('jose.santos', SHA1('senha123'), 'fornecedor');
INSERT INTO Usuario (username, password, tipoUsuario) VALUES ('ana.pereira', SHA1('senha123'), 'fornecedor');
INSERT INTO Usuario (username, password, tipoUsuario) VALUES ('joao.costa', SHA1('senha123'), 'fornecedor');
INSERT INTO Usuario (username, password, tipoUsuario) VALUES ('paula.rodrigues', SHA1('senha123'), 'fornecedor');
INSERT INTO Usuario (username, password, tipoUsuario) VALUES ('carlos.almeida', SHA1('senha123'), 'fornecedor');
INSERT INTO Usuario (username, password, tipoUsuario) VALUES ('lucia.martins', SHA1('senha123'), 'fornecedor');
INSERT INTO Usuario (username, password, tipoUsuario) VALUES ('roberto.oliveira', SHA1('senha123'), 'fornecedor');
INSERT INTO Usuario (username, password, tipoUsuario) VALUES ('fernanda.lima', SHA1('senha123'), 'fornecedor');
INSERT INTO Usuario (username, password, tipoUsuario) VALUES ('antonio.souza', SHA1('senha123'), 'fornecedor');

-- Inserir endereços
INSERT INTO Endereco (pais, cep, bairro, endereco, numEstabelecimento) VALUES ('Brasil', 59380000, 'Centro', 'Praça Desembargador Tomaz Salustino', 12);
INSERT INTO Endereco (pais, cep, bairro, endereco, numEstabelecimento) VALUES ('Brasil', 01000001, 'Bela Vista', 'Rua da Glória', 45);
INSERT INTO Endereco (pais, cep, bairro, endereco, numEstabelecimento) VALUES ('Brasil', 01000002, 'Liberdade', 'Rua Galvão Bueno', 200);
INSERT INTO Endereco (pais, cep, bairro, endereco, numEstabelecimento) VALUES ('Brasil', 01000003, 'Sé', 'Rua Boa Vista', 300);
INSERT INTO Endereco (pais, cep, bairro, endereco, numEstabelecimento) VALUES ('Brasil', 01000004, 'Santa Ifigênia', 'Rua dos Timbiras', 150);
INSERT INTO Endereco (pais, cep, bairro, endereco, numEstabelecimento) VALUES ('Brasil', 01000005, 'República', 'Avenida Ipiranga', 1000);
INSERT INTO Endereco (pais, cep, bairro, endereco, numEstabelecimento) VALUES ('Brasil', 01000006, 'Consolação', 'Rua Augusta', 250);
INSERT INTO Endereco (pais, cep, bairro, endereco, numEstabelecimento) VALUES ('Brasil', 01000007, 'Jardins', 'Alameda Santos', 600);
INSERT INTO Endereco (pais, cep, bairro, endereco, numEstabelecimento) VALUES ('Brasil', 01000008, 'Higienópolis', 'Avenida Angélica', 850);
INSERT INTO Endereco (pais, cep, bairro, endereco, numEstabelecimento) VALUES ('Brasil', 01000009, 'Vila Mariana', 'Rua Domingos de Morais', 400);
INSERT INTO Endereco (pais, cep, bairro, endereco, numEstabelecimento) VALUES ('Brasil', 01000010, 'Moema', 'Avenida Ibirapuera', 700);
INSERT INTO Endereco (pais, cep, bairro, endereco, numEstabelecimento) VALUES ('Brasil', 01000011, 'Brooklin', 'Avenida Santo Amaro', 550);
INSERT INTO Endereco (pais, cep, bairro, endereco, numEstabelecimento) VALUES ('Brasil', 01000012, 'Pinheiros', 'Rua dos Pinheiros', 350);
INSERT INTO Endereco (pais, cep, bairro, endereco, numEstabelecimento) VALUES ('Brasil', 01000013, 'Butantã', 'Avenida Vital Brasil', 500);
INSERT INTO Endereco (pais, cep, bairro, endereco, numEstabelecimento) VALUES ('Brasil', 01000014, 'Morumbi', 'Avenida Giovanni Gronchi', 900);
INSERT INTO Endereco (pais, cep, bairro, endereco, numEstabelecimento) VALUES ('Brasil', 01000015, 'Perdizes', 'Rua Cardoso de Almeida', 100);
INSERT INTO Endereco (pais, cep, bairro, endereco, numEstabelecimento) VALUES ('Brasil', 01000016, 'Pacaembu', 'Avenida Pacaembu', 450);
INSERT INTO Endereco (pais, cep, bairro, endereco, numEstabelecimento) VALUES ('Brasil', 01000017, 'Tatuapé', 'Rua Apucarana', 300);
INSERT INTO Endereco (pais, cep, bairro, endereco, numEstabelecimento) VALUES ('Brasil', 01000018, 'Vila Prudente', 'Avenida Anhaia Mello', 200);
INSERT INTO Endereco (pais, cep, bairro, endereco, numEstabelecimento) VALUES ('Brasil', 01000019, 'Vila Olímpia', 'Rua Funchal', 650);
INSERT INTO Endereco (pais, cep, bairro, endereco, numEstabelecimento) VALUES ('Brasil', 01000020, 'Itaim Bibi', 'Rua Joaquim Floriano', 700);

-- Inserir categorias
INSERT INTO Categoria (nomeCategoria, descricaoCategoria) VALUES ('Alimentos', 'Produtos alimentícios de diversos tipos, como frutas, vegetais, carnes e grãos.');
INSERT INTO Categoria (nomeCategoria, descricaoCategoria) VALUES ('Informática', 'Produtos e acessórios de tecnologia, como computadores, periféricos e softwares.');
INSERT INTO Categoria (nomeCategoria, descricaoCategoria) VALUES ('Roupas', 'Vestuário e acessórios de moda, incluindo calças, camisas, vestidos e calçados.');
-- INSERT INTO Categoria (nomeCategoria, descricaoCategoria) VALUES ('Armas', 'Equipamentos de defesa pessoal e artigos de caça, como facas, armas de fogo e munições.');
INSERT INTO Categoria (nomeCategoria, descricaoCategoria) VALUES ('Livros', 'Diversos tipos de livros e publicações, abrangendo diferentes gêneros e assuntos.');
INSERT INTO Categoria (nomeCategoria, descricaoCategoria) VALUES ('Carros', 'Veículos automotores de diversos modelos, incluindo carros, caminhões e motos.');

-- Inserir cliente Arthur
INSERT INTO Cliente (nomeCliente, sobrenomeCliente, emailCliente, telefoneCliente, cpfCliente, rgCliente, dataNascimento, idEndereco, idUsuario) 
VALUES ('Arthur', NULL, 'arthur@mail.com', NULL, '123.456.789-00', NULL, '09/02/2000', 1, 2);


-- Inserir fornecedores 
INSERT INTO Fornecedor (nomeFornecedor, emailFornecedor, cnpjFornecedor, idEndereco, idUsuario) VALUES ('Isaac Bruno Sales', 'isaac@mail.com', '24.580.006/0001-43', 1, 3);
INSERT INTO Fornecedor (nomeFornecedor, emailFornecedor, cnpjFornecedor, idEndereco, idUsuario) VALUES ('Maria Silva', 'maria.silva@mail.com', '24.580.006/0001-44', 2, 4);
INSERT INTO Fornecedor (nomeFornecedor, emailFornecedor, cnpjFornecedor, idEndereco, idUsuario) VALUES ('José Santos', 'jose.santos@mail.com', '24.580.006/0001-45', 3, 5);
INSERT INTO Fornecedor (nomeFornecedor, emailFornecedor, cnpjFornecedor, idEndereco, idUsuario) VALUES ('Ana Pereira', 'ana.pereira@mail.com', '24.580.006/0001-46', 4, 6);
INSERT INTO Fornecedor (nomeFornecedor, emailFornecedor, cnpjFornecedor, idEndereco, idUsuario) VALUES ('João Costa', 'joao.costa@mail.com', '24.580.006/0001-47', 5, 7);
INSERT INTO Fornecedor (nomeFornecedor, emailFornecedor, cnpjFornecedor, idEndereco, idUsuario) VALUES ('Paula Rodrigues', 'paula.rodrigues@mail.com', '24.580.006/0001-48', 6, 8);
INSERT INTO Fornecedor (nomeFornecedor, emailFornecedor, cnpjFornecedor, idEndereco, idUsuario) VALUES ('Carlos Almeida', 'carlos.almeida@mail.com', '24.580.006/0001-49', 7, 9);
INSERT INTO Fornecedor (nomeFornecedor, emailFornecedor, cnpjFornecedor, idEndereco, idUsuario) VALUES ('Lúcia Martins', 'lucia.martins@mail.com', '24.580.006/0001-50', 8, 10);
INSERT INTO Fornecedor (nomeFornecedor, emailFornecedor, cnpjFornecedor, idEndereco, idUsuario) VALUES ('Roberto Oliveira', 'roberto.oliveira@mail.com', '24.580.006/0001-51', 9, 11);
INSERT INTO Fornecedor (nomeFornecedor, emailFornecedor, cnpjFornecedor, idEndereco, idUsuario) VALUES ('Fernanda Lima', 'fernanda.lima@mail.com', '24.580.006/0001-52', 10, 12);
INSERT INTO Fornecedor (nomeFornecedor, emailFornecedor, cnpjFornecedor, idEndereco, idUsuario) VALUES ('Antônio Souza', 'antonio.souza@mail.com', '24.580.006/0001-53', 11, 13);

-- Inserir produtos
-- Alimentos
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Maçã', 3.50, 100, 1, 3, 'Frutas do Vale', 'Maçã fresca', 'https://upload.wikimedia.org/wikipedia/commons/1/15/Red_Apple.jpg');
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Banana', 2.50, 200, 1, 4, 'Tropical Frutas', 'Banana nanica', 'https://tdc0wy.vteximg.com.br/arquivos/ids/157903-1000-1000/BANANA-NANICA-KG.png?v=637963609452530000');
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Carne Bovina', 20.00, 50, 1, 5, 'Frigorífico Boi Bom', 'Carne bovina de primeira', 'https://www.comprerural.com/wp-content/uploads/2017/12/carne-bovina-41.jpg');
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Leite', 4.00, 150, 1, 6, 'Laticínios Leitinho', 'Leite integral', 'https://s1.static.brasilescola.uol.com.br/be/conteudo/images/caixinha-leite-longa-vida-53601e57211bd.jpg');
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Arroz', 10.00, 100, 1, 7, 'Cereal Alvorada', 'Arroz branco', 'https://cdn.awsli.com.br/600x700/1638/1638820/produto/109947366/arroz-agulha-integral-1kg-iezilo99n1.jpg');
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Feijão', 8.00, 80, 1, 8, 'Grãos do Sertão', 'Feijão carioca', 'https://cdn.awsli.com.br/2500x2500/1638/1638820/produto/111768449/feij-o-carioca-1kg-tf0pe3eypb.jpg');
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Batata', 3.00, 120, 1, 9, 'Hortifruti Terra Fértil', 'Batata inglesa', 'https://www.frutiver.com.br/app/uploads/2022/10/batatainglesa.jpg');
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Tomate', 4.50, 90, 1, 10, 'AgroVida', 'Tomate maduro', 'https://megag.com.br/v21/wp-content/uploads/2021/07/arq_189Tomate-Salada.jpg');
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Cenoura', 3.20, 110, 1, 11, 'BioOrganic', 'Cenoura orgânica', 'https://acdn.mitiendanube.com/stores/174/441/products/produto-10-11-2f4a2d4f1a2ecff8c515122892240880-640-0.jpg');
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Alface', 2.00, 70, 1, 5, 'VerdeFresco', 'Alface crespa', 'https://img.irroba.com.br/filters:fill(fff):quality(80)/tulasime/catalog/api/tulasime_blingirr/63b4294f8db25.jpg');

-- Informática
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Notebook', 3500.00, 30, 2, 3, 'TechMaster', 'Notebook 8GB RAM', 'https://img.global.news.samsung.com/br/wp-content/uploads/2018/06/npc-704x334.png');
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Mouse', 50.00, 200, 2, 4, 'ClickTech', 'Mouse óptico', 'https://m.media-amazon.com/images/I/517uiKwARGL._AC_UF1000,1000_QL80_.jpg');
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Teclado', 80.00, 150, 2, 5, 'TypePro', 'Teclado mecânico', 'https://www.logitechstore.com.br/media/catalog/product/cache/105e6f420716e0751863c4b81f527d17/t/e/teclado.png');
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Monitor', 600.00, 60, 2, 6, 'ViewTech', 'Monitor 24 polegadas', 'https://s2-techtudo.glbimg.com/o3gGzMi_v6OWfxEOVrIOJ_ymq7A=/0x0:620x388/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_08fbf48bc0524877943fe86e43087e7a/internal_photos/bs/2021/n/x/F22XRUScuXC53PtAKEaA/2011-03-18-monitor-samsung-sem-fio.jpg');
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Impressora', 300.00, 40, 2, 7, 'PrintSmart', 'Impressora multifuncional', 'https://s2-techtudo.glbimg.com/I8V0MEi9U_zkoBfXmujueYImVP0=/0x0:1280x800/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_08fbf48bc0524877943fe86e43087e7a/internal_photos/bs/2021/V/Z/LqVIQUQSG0lRo2BrAlBw/hp2774.jpg');
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Webcam', 150.00, 70, 2, 8, 'CamVision', 'Webcam HD', 'https://images.kabum.com.br/produtos/fotos/sync_mirakl/220507/Webcam-Full-Hd-1080p-Preta-Goldentec_1630587068_gg.jpg');
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Headset', 100.00, 90, 2, 9, 'SoundWave', 'Headset com microfone', 'https://i.zst.com.br/thumbs/12/14/35/1997544264.jpg');
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('HD Externo', 250.00, 80, 2, 10, 'DataSafe', 'HD Externo 1TB', 'https://images.kabum.com.br/produtos/fotos/sync_mirakl/451201/HD-Externo-Portatil-Toshiba-Canvio-2TB-Preto-HdTB520xk3aa_1704217717_g.jpg');
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Pendrive', 30.00, 300, 2, 11, 'FlashDrive', 'Pendrive 16GB', 'https://5df841b7b6204c6b.cdn.gocache.net/images/1626534/pen-drive-multilaser-4gb-preto-pd586bu-sem-logo-e-sem-caixa-sinop-03-4d1abf07..jpg');
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Cabo HDMI', 20.00, 250, 2, 2, 'ConnectPro', 'Cabo HDMI 2m', 'https://i.ebayimg.com/thumbs/images/g/fBAAAOSw9j5gMs9m/s-l640.jpg');

-- Roupas
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Camiseta', 40.00, 100, 3, 3, 'CottonStyle', 'Camiseta algodão', 'https://img.lojasrenner.com.br/item/549243106/large/12.jpg');
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Calça Jeans', 100.00, 70, 3, 4, 'DenimFit', 'Calça jeans azul', 'https://cdn.awsli.com.br/600x700/1759/1759278/produto/144884621/d27aba69a8.jpg');
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Jaqueta', 200.00, 50, 3, 5, 'LeatherStyle', 'Jaqueta couro', 'https://png.pngtree.com/png-vector/20240709/ourmid/pngtree-sleek-and-stylish-premium-black-leather-jacket-for-a-timeless-look-png-image_13039562.png');
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Tênis', 150.00, 80, 3, 6, 'SportFlex', 'Tênis esportivo', 'https://img.irroba.com.br/fit-in/600x600/filters:fill(fff):quality(80)/dmdamand/catalog/1500/thumbnail-co-12.jpg');
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Meias', 20.00, 200, 3, 7, 'FootComfort', 'Meias brancas', 'https://images.tcdn.com.br/img/img_prod/1238164/kit_20_pares_meias_branca_qualidade_meia_cano_curto_feminina_soquete_varias_meias_kit_de_meias_premi_4635643_2_098b2050d12e356a839824223ee9991f.png');
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Boné', 30.00, 120, 3, 8, 'CapStyle', 'Boné aba reta', 'https://imgcentauro-a.akamaihd.net/1366x1366/M084IV02.jpg');
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Vestido', 120.00, 60, 3, 9, 'ElegantChoice', 'Vestido longo', 'https://i.pinimg.com/736x/36/72/78/3672786a00be2980feff9ebb41dd6411.jpg');
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Shorts', 50.00, 90, 3, 10, 'SummerFit', 'Shorts jeans', 'https://images.tcdn.com.br/img/img_prod/769687/short_jeans_feminino_curto_azul_escuro_com_elastano_barra_dobrada_36_ao_44_live_zoom_1489_1_2c2a6c4a69d08202e627131d9381f1eb.jpg');
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Blusa', 80.00, 70, 3, 11, 'WoolBlend', 'Blusa de lã', 'https://images.tcdn.com.br/img/img_prod/1025029/kit_com_30_blusas_de_la_feminino_sortido_para_bebe_47_1_2b1509f1c84c5b67572c0458db818010.jpg');
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES ('Cinto', 25.00, 150, 3, 3, 'LeatherCraft', 'Cinto de couro', 'https://images.tcdn.com.br/img/img_prod/810822/cinto_de_couro_western_marrom_costura_decorativa_173_1_a81602f3546a8e0af84cbe38ad99d327.jpg');

-- Armas
-- INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES
-- ('Faca', 50.00, 50, 4, 1, 'EdgeMaster', 'Faca de caça', 'https://images.tcdn.com.br/img/img_prod/340075/faca_de_caca_e_pesca_mk_06_9003_25610_1_33f21de94254b35aac253002c82257e5.jpg'),
-- ('Revolver', 1200.00, 20, 4, 2, 'FireArmTech', 'Revolver calibre 38', 'https://dcdn.mitiendanube.com/stores/002/058/681/products/captura-de-tela-2022-06-17-1413301-ea585c5c7b314f93b516554862572860-640-0.png'),
-- ('Espingarda', 2500.00, 15, 4, 3, 'ShotgunMasters', 'Espingarda calibre 12', 'https://armas.beartac.com.br/wp-content/uploads/2024/02/espingardacalibre12boito.jpg'),
-- ('Pistola', 2000.00, 25, 4, 4, 'PistolTech', 'Pistola 9mm', 'https://cdn.sentinela.ind.br/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/p/r/product-245-photo-5.png'),
-- ('Arco e Flecha', 300.00, 30, 4, 5, 'ArrowCraft', 'Conjunto de arco e flecha', 'https://http2.mlstatic.com/arco-e-flecha-xavante-nautika-48-libras-3-flechas-alvo-D_NQ_NP_14948-MLB20092782003_052014-F.jpg'),
-- ('Municao 9mm', 1.00, 500, 4, 6, 'AmmoSupplies', 'Munição 9mm', 'https://images.tcdn.com.br/img/img_prod/620600/municao_cbc_9mm_luger_expo_p_gold_hex_115gr_6145_1_32527f9d9071becedf2eac4e12b1600b.png'),
-- ('Cofre', 600.00, 10, 4, 7, 'SafeGuard', 'Cofre para armas', 'https://www.hbarros.com.br/media/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/h/b/hb-014-armario-para-armas-elitei-aberto.jpg'),
-- ('Colete', 1500.00, 20, 4, 8, 'ArmorTech', 'Colete a prova de balas', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/dc/Army_IOTV.jpg/220px-Army_IOTV.jpg'),
-- ('Balestra', 800.00, 15, 4, 9, 'CrossBowTech', 'Balestra com mira', 'https://airsofts.com.br/wp-content/uploads/2018/12/Balestra-175-final-1.jpg'),
-- ('Cinto de Tiro', 70.00, 40, 4, 10, 'TacticalGear', 'Cinto de tiro tático', 'https://images.tcdn.com.br/img/img_prod/885032/cinto_invictus_modular_support_2_0_preto_21097_1_e354c1bc2d8fe78a8a990e8ace3b88ee.jpg');

-- Livros
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES
('Livro Aventura', 40.00, 100, 4, 1, 'AdventuraBooks', 'Livro de aventura emocionante', 'https://m.media-amazon.com/images/I/41EuLHZt2JL.jpg'),
('Livro Romance', 35.00, 90, 4, 2, 'RomanticNovels', 'História de amor envolvente', 'https://images-americanas.b2w.io/produtos/01/00/img3/50169567/9/5016956701_1GG.jpg'),
('Livro Ficção', 50.00, 80, 4, 3, 'SciFiReads', 'Ficção científica', 'https://editoras.com/b/wp-content/uploads/2015/01/Clockwork-Angels-os-Anjos-do-Tempo.jpg'),
('Livro Suspense', 45.00, 70, 4, 4, 'ThrillerBooks', 'Thriller de suspense', 'https://s2-galileu.glbimg.com/kX5MuNEopurzCy6VmprJevzpjX0=/0x0:984x616/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_fde5cd494fb04473a83fa5fd57ad4542/internal_photos/bs/2022/e/k/e1rAyPRj2qKBl5beKcKQ/image5-14-.jpg'),
('Livro Fantasia', 55.00, 60, 4, 5, 'FantasyWorld', 'Mundo de fantasia', 'https://m.media-amazon.com/images/I/51nsTQSstUL._SX342_SY445_.jpg'),
('Livro Infantil', 30.00, 120, 4, 6, 'KidsTales', 'Histórias para crianças', 'https://m.media-amazon.com/images/I/51I0I17n2IL._SX342_SY445_.jpg'),
('Livro Autoajuda', 40.00, 90, 4, 7, 'SelfHelpGuides', 'Guia de autoajuda', 'https://m.media-amazon.com/images/I/51hAxupVbVL._SY445_SX342_.jpg'),
('Livro História', 60.00, 50, 4, 8, 'HistoricalTales', 'Relatos históricos', 'https://m.media-amazon.com/images/I/51FIH6q3EZL._SY445_SX342_.jpg'),
('Livro Tecnologia', 70.00, 40, 4, 9, 'TechInsights', 'Avanços tecnológicos', 'https://m.media-amazon.com/images/I/51d0tkVcE0L._SY445_SX342_.jpg'),
('Livro Gastronomia', 65.00, 30, 4, 10, 'FoodieBooks', 'Receitas culinárias', 'https://m.media-amazon.com/images/I/517w-s-yAkL._SY445_SX342_.jpg');

-- Carros
INSERT INTO Produto (nomeProduto, valorProduto, estoque, idCategoria, idFornecedor, marcaProduto, descricaoProduto, imagem) VALUES
('Carro Sedan', 80000.00, 10, 5, 1, 'AutomobileCo', 'Carro Sedan 2024', 'https://fotos-jornaldocarro-estadao.nyc3.cdn.digitaloceanspaces.com/wp-content/uploads/2023/12/19121042/P90523114_highRes_the-bmw-i5-m60-xdriv-scaled.jpg'),
('Carro Hatch', 60000.00, 15, 5, 2, 'CityWheels', 'Carro Hatch 2024', 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjM7dA_duwnrd-QShD07BPhuJo5Otdk49NGbf11eVSAwvmCJfnYBwWzJxXbwmgbgVZh1b0_9TNQmVV50FRhFqSnCG5bGvSvsLT6W32rLUYhv4h-6qxZC7zW673icrWEa0nNLbhpiH0u52N2Dam3tNH3ICuTevy-YY0rTLaOlCiueF278CGqh7JLziTEXA/s2560/Honda-New-City-2024-Hatchback%20%283%29.jpg'),
('Carro SUV', 120000.00, 8, 5, 3, 'AdventureMotors', 'Carro SUV 2024', 'https://s2-autoesporte.glbimg.com/if06dZVIAj6bS0-v9TcAmSVzBqw=/0x0:1920x1080/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2023/z/w/HZyxrQRwCTQ8VSrpUfrQ/hyundao.jpeg'),
('Moto', 25000.00, 20, 5, 5, 'SpeedRiders', 'Moto 2024', 'https://w7.pngwing.com/pngs/626/733/png-transparent-honda-nxr-160-bros-honda-nxr-150-bros-motorcycle-honda-xre300-moto-racing-car-vehicle.png'),
('Caminhão', 180000.00, 5, 5, 5, 'CargoHaulers', 'Caminhão de carga', 'https://blog.texaco.com.br/wp-content/uploads/2017/05/tipos-de-caminhoes-e-capacidades-veja-o-ideal-para-sua-carga.jpg'),
('Van', 90000.00, 7, 5, 6, 'TransportVans', 'Van para transporte', 'https://www.connectvan.com.br/wp-content/uploads/2018/01/5adfb2_c35ed677fb03414ea9e81bf952616077-1-702x460.png'),
('Conversível', 150000.00, 3, 5, 7, 'OpenDrive', 'Carro conversível', 'https://cdn.autopapo.com.br/box/uploads/2023/08/14104712/fisker-ronin-2024-prata-frente-e-lateral-capota-aberta-732x488.jpg'),
('Picape', 100000.00, 10, 5, 8, 'RuggedTrucks', 'Picape 2024', 'https://s2-autoesporte.glbimg.com/xw8j0HF39j00EQQFiIoe9MvljUo=/0x0:1920x1080/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2023/c/y/gLdRhdSwirNQrskzTUEg/2024-mitsubishi-triton-l200-1-.jpg'),
('Carro Elétrico', 140000.00, 4, 5, 9, 'EcoWheels', 'Carro elétrico', 'https://s2-autoesporte.glbimg.com/NCP2C64UmY5o2Q7uZGAlYWNstTc=/0x0:1106x719/888x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2023/g/c/CwgAKCRLqalsz1AxiRIg/byd-dolphin-carro-eletrico.jpg'),
('Quadriciclo', 30000.00, 12, 5, 10, 'AllTerrainQuads', 'Quadriciclo off-road', 'https://can-am.brp.com/content/dam/global/en/can-am-off-road/my23/photos/vehicle-lineup/atv/outlander/outlander-pro/ORV-ATV-MY23-5-Can-Am-Outlander-PRO-STD-HD5-Desert-Tan-0001HPB00-34FR-INTL.png');
