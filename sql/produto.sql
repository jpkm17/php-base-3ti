create table categoria(
    idCategoria int primary key auto_increment,
    nomeCategoria varchar(100)
);

create table produto(
    idProduto int primary key auto_increment,
    nomeProduto varchar(100) not null,
    preçoProduto float not null,
    fk_idCategoria int not null,
    FOREIGN KEY (fk_idCategoria) REFERENCES categoria(idCategoria)
);