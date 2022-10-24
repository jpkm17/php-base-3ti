create table city(
    idCity int primary key AUTO_INCREMENT,
    nameCity varchar(300) NOT NULL
);

INSERT INTO `city` (`idCity`, `nameCity`) VALUES (NULL, 'Sumaré'), (NULL, 'Hortolândia');

create table adm(
    id_Adm int primary key AUTO_INCREMENT,
    perm varchar(50)
);
-- CREATE table logging (
--         idLogging int primary key auto_increment,
--         dateLogging datetime not null,
--         level varchar(100) not null,
--         msg varchar(1000) not null,
--         fk_reg int not null,
--         FOREIGN key (fk_reg) REFERENCES reg (id)
--     );