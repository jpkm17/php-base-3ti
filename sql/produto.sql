create table genero(
    idGenero int primary key auto_increment,
    nomeGenero varchar(100)
);

INSERT INTO `genero` (`idGenero`, `nomeGenero`) VALUES
(1, 'Comedia'),
(2, 'Ação');

create table produto(
    img varchar(50) not null,
    idProduto int primary key auto_increment,
    nomeProduto varchar(100) not null,
    preçoProduto float not null,
    quantidade int(255) not null,
    fk_idGenero int not null,
    FOREIGN KEY (fk_idGenero) REFERENCES genero(idGenero)
);

INSERT INTO `produto` ( `img`, `idProduto`, `nomeProduto`, `preçoProduto`, `quantidade`, `fk_idGenero`) VALUES
('image/viagemCentroDaTerra.jpg',null, 'Viagem ao centro da terra', 25, 100, 2),
('image/trapalhoes.jpg',null, 'Os trapalhoes', 15, 90 , 1);