-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema tec_progetto
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema tec_progetto
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tec_progetto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `tec_progetto` ;

-- -----------------------------------------------------
-- Table `tec_progetto`.`adozioni`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tec_progetto`.`adozioni` ;

CREATE TABLE IF NOT EXISTS `tec_progetto`.`adozioni` (
  `id_adozioni` INT NOT NULL,
  `nome_proprietario` VARCHAR(45) NOT NULL,
  `nome_animale` VARCHAR(45) NOT NULL,
  `data_adozione` DATE NOT NULL,
  PRIMARY KEY (`id_adozioni`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `tec_progetto`.`cani`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tec_progetto`.`cani` ;

CREATE TABLE IF NOT EXISTS `tec_progetto`.`cani` (
  `id_cani` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `data_nascita` DATE NOT NULL,
  `stato` VARCHAR(45) NOT NULL,
  `sesso` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id_cani`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `tec_progetto`.`foto_cane`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tec_progetto`.`foto_cane` ;

CREATE TABLE IF NOT EXISTS `tec_progetto`.`foto_cane` (
  `id` INT NOT NULL,
  `path` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `tec_progetto`.`gatti`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tec_progetto`.`gatti` ;

CREATE TABLE IF NOT EXISTS `tec_progetto`.`gatti` (
  `idgatti` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `data_nascita` VARCHAR(45) NOT NULL,
  `stato` VARCHAR(45) NOT NULL,
  `sesso` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idgatti`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `tec_progetto`.`proprietario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tec_progetto`.`proprietario` ;

CREATE TABLE IF NOT EXISTS `tec_progetto`.`proprietario` (
  `id_proprietario` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `residenza` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_proprietario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
