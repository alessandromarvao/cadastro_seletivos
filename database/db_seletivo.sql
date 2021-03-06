-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema db_seletivo
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_seletivo
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_seletivo` DEFAULT CHARACTER SET utf8 ;
USE `db_seletivo` ;

-- -----------------------------------------------------
-- Table `db_seletivo`.`escolas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_seletivo`.`escolas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `escola` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_seletivo`.`bancos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_seletivo`.`bancos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `banco` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_seletivo`.`contas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_seletivo`.`contas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_bancos` INT NOT NULL,
  `agencia` VARCHAR(45) NULL,
  `conta` VARCHAR(45) NULL,
  `tipo` VARCHAR(45) NULL,
  `operacao` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_contas_bancos1_idx` (`id_bancos` ASC) VISIBLE,
  CONSTRAINT `fk_contas_bancos1`
    FOREIGN KEY (`id_bancos`)
    REFERENCES `db_seletivo`.`bancos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_seletivo`.`enderecos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_seletivo`.`enderecos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `endereco` VARCHAR(100) NULL,
  `bairro` VARCHAR(45) NULL,
  `cep` VARCHAR(45) NULL,
  `uf` VARCHAR(2) NULL,
  `municipio` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_seletivo`.`fiscais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_seletivo`.`fiscais` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_escolas` INT NOT NULL,
  `id_contas` INT NOT NULL,
  `id_enderecos` INT NOT NULL,
  `pis` VARCHAR(45) NULL,
  `cpf` VARCHAR(45) NOT NULL,
  `matricula` VARCHAR(45) NULL,
  `nome` VARCHAR(45) NULL,
  `rg` VARCHAR(45) NULL,
  `sexo` VARCHAR(45) NULL,
  `orgao_exp` VARCHAR(45) NULL,
  `data_exped` DATE NULL,
  `email` VARCHAR(45) NULL,
  `created_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_fiscais_escolas_idx` (`id_escolas` ASC) VISIBLE,
  INDEX `fk_fiscais_contas1_idx` (`id_contas` ASC) VISIBLE,
  INDEX `fk_fiscais_enderecos1_idx` (`id_enderecos` ASC) VISIBLE,
  CONSTRAINT `fk_fiscais_escolas`
    FOREIGN KEY (`id_escolas`)
    REFERENCES `db_seletivo`.`escolas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fiscais_contas1`
    FOREIGN KEY (`id_contas`)
    REFERENCES `db_seletivo`.`contas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fiscais_enderecos1`
    FOREIGN KEY (`id_enderecos`)
    REFERENCES `db_seletivo`.`enderecos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
