CREATE DATABASE IF NOT EXISTS `db_coopertec` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `db_coopertec`;


DROP TABLE IF EXISTS `tb_funcionario`;
CREATE TABLE IF NOT EXISTS `tb_funcionario` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL,
  `cpf` varchar(14) COLLATE utf8_bin NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `salario` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


DROP TABLE IF EXISTS `tb_dependente`;
CREATE TABLE IF NOT EXISTS `tb_dependente` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL,
  `id_funcionario` int(8) NOT NULL,
  `is_calcula_inss` varchar(1) COLLATE utf8_bin DEFAULT 'N',
  `is_calcula_ir` varchar(1) COLLATE utf8_bin DEFAULT 'N',
  PRIMARY KEY (`id`),
  KEY `id_funcionario` (`id_funcionario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


ALTER TABLE `tb_dependente`
  ADD CONSTRAINT `fk_id_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
