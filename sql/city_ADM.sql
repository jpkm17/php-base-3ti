create table city(
    idCity int primary key AUTO_INCREMENT,
    nameCity varchar(300) NOT NULL
);

INSERT INTO `city` (`idCity`, `nameCity`) VALUES (NULL, 'Sumaré'), (NULL, 'Hortolândia');

create table adm(
    id_Adm int primary key AUTO_INCREMENT,
    perm varchar(50)
);