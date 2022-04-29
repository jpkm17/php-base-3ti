create table produto(
    idProduto int primary key auto_increment,
    nomeProduto varchar(30) not null,
    preçoProduto float(30)not null
);

create table produto(
    idCategoria int primary key auto_increment,
    categoria varchar(50)
);