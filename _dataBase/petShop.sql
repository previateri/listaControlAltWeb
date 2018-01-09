CREATE TABLE `clientes` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nome`  varchar(255) NOT NULL ,
`telefone`  varchar(255) NULL DEFAULT NULL ,
`email`  varchar(255) NULL DEFAULT NULL ,
`endereco`  varchar(255) NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
);

CREATE TABLE `animal_categoria` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nome_categoria`  varchar(255) NOT NULL ,
PRIMARY KEY (`id`)
);

CREATE TABLE `animal_raca` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nome_raca`  varchar(255) NOT NULL ,
`id_categoria`  int(11) NOT NULL ,
PRIMARY KEY (`id`)
);

CREATE TABLE `animal` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nome`  varchar(255) NOT NULL ,
`raca`  int(11) NOT NULL ,
`id_dono`  int(11) NOT NULL ,
PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `banhos`;
CREATE TABLE `banhos` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`id_dono`  int(11) NOT NULL ,
`id_animal`  int(11) NOT NULL ,
`data_hora`  timestamp NOT NULL ,
`valor`  double NOT NULL ,
`pago`  char(1) NOT NULL ,
`observacoes`  longtext NULL ,
PRIMARY KEY (`id`)
);

INSERT INTO `clientes` VALUES ('1', 'Thiago Henrique Previateri', '16991951876', 'thiago.previateri@outlook.com', 'Rua Isidoro Nardine; 153; Itápolis; SP; 14900-000');

INSERT INTO `animal` VALUES ('1', 'Thor o Gato', '1', '1');

INSERT INTO `animal_categoria` VALUES ('1', 'Gatos'), ('2', 'Cachorros'), ('3', 'Aves');

INSERT INTO `animal_raca` VALUES ('1', 'Vira Lata', '1'), ('2', 'Siamês', '1'), ('3', 'Dalmata', '2');

INSERT INTO `banhos` VALUES ('1', '1', '1', '2018-01-09 09:43:50', '35', 'N', 'Animal possui alergia a condicionadores.');