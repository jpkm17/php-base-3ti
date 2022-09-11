create table genero(
    idGenero int primary key auto_increment,
    nomeGenero varchar(100)
);

create table produto(
    idProduto int primary key auto_increment,
    nomeProduto varchar(100) not null,
    preçoProduto float not null,
    quantidade int(255) not null,
    fk_idGenero int not null,
    FOREIGN KEY (fk_idGenero) REFERENCES genero(idGenero)
);