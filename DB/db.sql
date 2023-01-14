-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
SHOW WARNINGS;
-- -----------------------------------------------------
-- Schema tec_progetto
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `tec_progetto` ;

-- -----------------------------------------------------
-- Schema tec_progetto
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tec_progetto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
SHOW WARNINGS;
USE `tec_progetto` ;

-- -----------------------------------------------------
-- Table `tec_progetto`.`adozioni`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tec_progetto`.`adozioni` (
  `id_adozioni` INT NOT NULL,
  `nome_proprietario` VARCHAR(45) NOT NULL,
  `nome_animale` VARCHAR(45) NOT NULL,
  `data_adozione` DATE NOT NULL,
  PRIMARY KEY (`id_adozioni`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `tec_progetto`.`animali`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tec_progetto`.`animali` (
  `id_animale` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `data_nascita` DATE NOT NULL,
  `stato` VARCHAR(45) NOT NULL,
  `sesso` VARCHAR(20) NOT NULL,
  `descrizione` MEDIUMTEXT NOT NULL,
  PRIMARY KEY (`id_animale`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `tec_progetto`.`foto_animali`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tec_progetto`.`foto_animali` (
  `id` INT NOT NULL,
  `path` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `tec_progetto`.`prenotazioni`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tec_progetto`.`prenotazioni` (
  `id` INT NOT NULL,
  `nome_cliente` VARCHAR(45) NOT NULL,
  `cognome_cliente` VARCHAR(45) NOT NULL,
  `email_cliente` VARCHAR(45) NOT NULL,
  `data_prenotazione` DATE NOT NULL,
  `id_animale` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `tec_progetto`.`proprietario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tec_progetto`.`proprietario` (
  `id_proprietario` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `cognome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_proprietario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

SHOW WARNINGS;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
