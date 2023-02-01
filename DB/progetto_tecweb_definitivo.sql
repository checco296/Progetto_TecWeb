
CREATE SCHEMA IF NOT EXISTS `tec_progetto` DEFAULT CHARACTER SET utf8mb4;
USE `tec_progetto` ;

-- -----------------------------------------------------
-- Table `tec_progetto`.`cani`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tec_progetto`.`cani` ;

CREATE TABLE IF NOT EXISTS `tec_progetto`.`cani` (
  `id_cani` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `data_nascita` DATE NOT NULL,
  `sesso` VARCHAR(20) NOT NULL,
  `richiesta` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id_cani`))
ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `tec_progetto`.`foto_cane`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tec_progetto`.`foto_cane` ;

CREATE TABLE IF NOT EXISTS `tec_progetto`.`foto_cane` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `path` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `tec_progetto`.`gatti`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tec_progetto`.`gatti` ;

CREATE TABLE IF NOT EXISTS `tec_progetto`.`gatti` (
  `id_gatti` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `data_nascita` VARCHAR(45) NOT NULL,
  `sesso` VARCHAR(45) NOT NULL,
  `richiesta` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id_gatti`))
ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `tec_progetto`.`foto_gatto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tec_progetto`.`foto_gatto` ;

CREATE TABLE IF NOT EXISTS `tec_progetto`.`foto_gatto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `path` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `tec_progetto`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tec_progetto`.`users` ;

CREATE TABLE IF NOT EXISTS `tec_progetto`.`users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(30) NOT NULL,
 `email` varchar(30) NOT NULL,
 `password` varchar(40) NOT NULL,
 `livello` varchar(20) NOT NULL,
 `animale1` VARCHAR(45) NULL DEFAULT NULL,
 `animale2` VARCHAR(45) NULL DEFAULT NULL,
 `animale3` VARCHAR(45) NULL DEFAULT NULL,
 `animale4` VARCHAR(45) NULL DEFAULT NULL,
 `richiesta` VARCHAR(20) NULL DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `username`, `email`, `password`, `livello`, `animale1`, `animale2`, `animale3`, `animale4`, `richiesta`) VALUES ('1', 'admin', '', '21232f297a57a5a743894a0e4a801fc3', 'admin', NULL, NULL, NULL, NULL, NULL), ('2', 'user', '', 'ee11cbb19052e40b07aac0ca060c23ee', 'utente', NULL, NULL, NULL, NULL, NULL);