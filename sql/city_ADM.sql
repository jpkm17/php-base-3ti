create table city(
    idCity int primary key AUTO_INCREMENT,
    nameCity varchar(300) NOT NULL
);

INSERT INTO `city` (`idCity`, `nameCity`) VALUES (NULL, 'Sumaré'), (NULL, 'Hortolândia');

CREATE TABLE `profile_reg` (
  `idProfile` int(11) primary key NOT NULL,
  `nameProfile` varchar(500) DEFAULT NULL
);

INSERT INTO `profile_reg` (`idProfile`, `nameProfile`) VALUES
(1, 'Admin'),
(2, 'Func'),
(3,'User');

ALTER TABLE `reg` ADD FOREIGN KEY (`fk_profile`) REFERENCES `profile_reg`(`idProfile`) ON DELETE RESTRICT ON UPDATE RESTRICT; 
-- CREATE table logging (
--         idLogging int primary key auto_increment,
--         dateLogging datetime not null,
--         level varchar(100) not null,
--         msg varchar(1000) not null,
--         fk_reg int not null,
--         FOREIGN key (fk_reg) REFERENCES reg (id)
--     );