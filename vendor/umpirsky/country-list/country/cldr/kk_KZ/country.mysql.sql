CREATE TABLE country (id VARCHAR(2) NOT NULL, name VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = InnoDB;

INSERT INTO `country` (`id`, `name`) VALUES ('KZ', 'Қазақстан');
INSERT INTO `country` (`id`, `name`) VALUES ('TO', 'Тонга');
