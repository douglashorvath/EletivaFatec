-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema academiaphp
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema academiaphp
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `academiaphp` DEFAULT CHARACTER SET utf8 ;
USE `academiaphp` ;

-- -----------------------------------------------------
-- Table `academiaphp`.`Membro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academiaphp`.`Membro` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(60) NOT NULL,
  `idade` INT NOT NULL,
  `tipo_plano` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `academiaphp`.`Instrutor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academiaphp`.`Instrutor` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `academiaphp`.`especializacao_instrutor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academiaphp`.`especializacao_instrutor` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` LONGTEXT NOT NULL,
  `instrutor_id` INT NOT NULL,
  PRIMARY KEY (`id`),
    FOREIGN KEY (`instrutor_id`)
    REFERENCES `academiaphp`.`Instrutor` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `academiaphp`.`certificacao_instrutor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academiaphp`.`certificacao_instrutor` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` LONGTEXT NOT NULL,
  `instrutor_id` INT NOT NULL,
  PRIMARY KEY (`id`),
    FOREIGN KEY (`instrutor_id`)
    REFERENCES `academiaphp`.`Instrutor` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `academiaphp`.`Aula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academiaphp`.`Aula` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(60) NOT NULL,
  `horario` TIME NOT NULL,
  `instrutor_id` INT NOT NULL,
  PRIMARY KEY (`id`),
    FOREIGN KEY (`instrutor_id`)
    REFERENCES `academiaphp`.`Instrutor` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `academiaphp`.`participacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academiaphp`.`participacao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data_hora` DATETIME NOT NULL,
  `membro_id` INT NOT NULL,
  `aula_id` INT NOT NULL,
  PRIMARY KEY (`id`),
    FOREIGN KEY (`membro_id`)
    REFERENCES `academiaphp`.`Membro` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    FOREIGN KEY (`aula_id`)
    REFERENCES `academiaphp`.`Aula` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
