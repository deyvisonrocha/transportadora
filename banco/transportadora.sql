SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `transportadora` DEFAULT CHARACTER SET utf8 ;
USE `transportadora` ;

-- -----------------------------------------------------
-- Table `transportadora`.`tb_cliente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `transportadora`.`tb_cliente` (
  `id_cliente` INT(11) NOT NULL AUTO_INCREMENT ,
  `razao_social` VARCHAR(120) NOT NULL ,
  `nome_fantasia` VARCHAR(120) NOT NULL ,
  `tipo_cliente` ENUM('PF','PJ') NOT NULL DEFAULT 'PJ' ,
  `cpf_cnpj` VARCHAR(14) NOT NULL ,
  `endereco` VARCHAR(80) NOT NULL ,
  `numero` VARCHAR(10) NOT NULL ,
  `complemento` VARCHAR(80) NULL DEFAULT NULL ,
  `bairro` VARCHAR(60) NOT NULL ,
  `cidade` VARCHAR(80) NOT NULL ,
  `uf` VARCHAR(2) NOT NULL ,
  `cep` VARCHAR(8) NOT NULL ,
  `contato` VARCHAR(45) NULL DEFAULT NULL ,
  `sexo` ENUM('M','F') NULL DEFAULT NULL ,
  `email` VARCHAR(120) NULL DEFAULT NULL ,
  `site` VARCHAR(120) NULL DEFAULT NULL ,
  `inscricao_estadual` VARCHAR(12) NULL DEFAULT NULL ,
  `inscricao_municipal` VARCHAR(18) NULL DEFAULT NULL ,
  `data_cadastro` DATE NOT NULL ,
  `ativo` ENUM('S','N') NOT NULL DEFAULT 'S' ,
  `telefone1` VARCHAR(15) NULL DEFAULT NULL ,
  `telefone2` VARCHAR(15) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_cliente`) )
ENGINE = InnoDB
AUTO_INCREMENT = 33
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `transportadora`.`tb_fatura`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `transportadora`.`tb_fatura` (
  `id_fatura` INT(11) NOT NULL AUTO_INCREMENT ,
  `id_cliente` INT(11) NOT NULL ,
  `valor_fatura` DOUBLE(15,2) NOT NULL ,
  `numero_fatura` VARCHAR(45) NOT NULL ,
  `valor_duplicata` DOUBLE(15,2) NOT NULL ,
  `numero_duplicata` VARCHAR(45) NOT NULL ,
  `data_vencimento` DATE NOT NULL ,
  `desconto` DOUBLE(15,2) NOT NULL ,
  `data_pagamento` DATE NOT NULL ,
  `condicoes_especiais` TEXT NULL DEFAULT NULL ,
  `valor_total` DOUBLE(15,2) NOT NULL ,
  `data_cadastro` DATE NOT NULL ,
  `ativo` ENUM('S','N') NOT NULL DEFAULT 'S' ,
  PRIMARY KEY (`id_fatura`) ,
  INDEX `fk_tb_fatura_1` (`id_cliente` ASC) ,
  CONSTRAINT `fk_tb_fatura_1`
    FOREIGN KEY (`id_cliente` )
    REFERENCES `transportadora`.`tb_cliente` (`id_cliente` )
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 20
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `transportadora`.`tb_fatura_item`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `transportadora`.`tb_fatura_item` (
  `id_fatura_item` INT(11) NOT NULL AUTO_INCREMENT ,
  `id_fatura` INT(11) NOT NULL ,
  `descricao` VARCHAR(200) NOT NULL ,
  `data_execucao` DATE NOT NULL ,
  `nota_fiscal` VARCHAR(45) NOT NULL ,
  `valor` DOUBLE(15,2) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_fatura_item`) ,
  INDEX `id_fatura` (`id_fatura` ASC) ,
  CONSTRAINT `tb_fatura_item_ibfk_1`
    FOREIGN KEY (`id_fatura` )
    REFERENCES `transportadora`.`tb_fatura` (`id_fatura` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `transportadora`.`tb_usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `transportadora`.`tb_usuario` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(60) NOT NULL ,
  `email` VARCHAR(120) NOT NULL ,
  `senha` VARCHAR(128) NOT NULL ,
  `ativo` ENUM('S','N') NOT NULL DEFAULT 'S' ,
  PRIMARY KEY (`id_usuario`) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `transportadora`.`tb_uf`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `transportadora`.`tb_uf` (
  `id_uf` INT(11) NOT NULL AUTO_INCREMENT ,
  `sigla` VARCHAR(2) NOT NULL ,
  `descricao` VARCHAR(40) NOT NULL ,
  `capital` VARCHAR(40) NOT NULL ,
  PRIMARY KEY (`id_uf`) ,
  UNIQUE INDEX `sigla` (`sigla` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 28
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `transportadora`.`tb_ordem_servico`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `transportadora`.`tb_ordem_servico` (
  `id_ordem_servico` INT(11) NOT NULL AUTO_INCREMENT ,
  `id_cliente_origem` INT(11) NOT NULL ,
  `id_cliente_destino` INT(11) NOT NULL ,
  `data_execucao` DATE NULL ,
  `km_inicial` VARCHAR(15) NULL ,
  `km_final` VARCHAR(15) NULL ,
  `origem_endereco` VARCHAR(255) NULL ,
  `origem_cpf_cnpj` VARCHAR(14) NULL ,
  `origem_numero` VARCHAR(10) NULL DEFAULT NULL ,
  `origem_complemento` VARCHAR(60) NULL DEFAULT NULL ,
  `origem_bairro` VARCHAR(60) NULL ,
  `origem_cidade` VARCHAR(60) NULL ,
  `origem_contato` VARCHAR(60) NULL ,
  `origem_uf` VARCHAR(2) NULL ,
  `origem_fone` VARCHAR(60) NULL ,
  `destino_endereco` VARCHAR(255) NULL ,
  `destino_cpf_cnpj` VARCHAR(14) NULL ,
  `destino_numero` VARCHAR(10) NULL DEFAULT NULL ,
  `destino_complemento` VARCHAR(60) NULL DEFAULT NULL ,
  `destino_bairro` VARCHAR(60) NULL ,
  `destino_cidade` VARCHAR(60) NULL ,
  `destino_uf` VARCHAR(2) NULL ,
  `destino_fone` VARCHAR(60) NULL ,
  `titulo_servico` VARCHAR(60) NULL ,
  `descricao_servico` TEXT NULL ,
  `valor_frete` DOUBLE(15,2) NULL ,
  `valor_seguro` DOUBLE(15,2) NULL ,
  `valor_imposto` DOUBLE(15,2) NULL ,
  `observacao` TEXT NULL ,
  `valor_total` DOUBLE(15,2) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_ordem_servico`) ,
  INDEX `fk_tb_ordem_servico_tb_cliente1` (`id_cliente_origem` ASC) ,
  INDEX `fk_tb_ordem_servico_tb_cliente2` (`id_cliente_destino` ASC) ,
  CONSTRAINT `fk_tb_ordem_servico_tb_cliente1`
    FOREIGN KEY (`id_cliente_origem` )
    REFERENCES `transportadora`.`tb_cliente` (`id_cliente` )
    ON DELETE RESTRICT
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_ordem_servico_tb_cliente2`
    FOREIGN KEY (`id_cliente_destino` )
    REFERENCES `transportadora`.`tb_cliente` (`id_cliente` )
    ON DELETE RESTRICT
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
