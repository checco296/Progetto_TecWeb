
CREATE TABLE IF NOT EXISTS `fferrai`.`cani` (
  `id_cani` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `data_nascita` DATE NOT NULL,
  `sesso` VARCHAR(20) NOT NULL,
  `descrizione` VARCHAR(250) NOT NULL,
  `richiesta` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id_cani`))
ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `fferraio`.`foto_cane` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `path` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `fferraio`.`gatti` (
  `id_gatti` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `data_nascita` VARCHAR(45) NOT NULL,
  `sesso` VARCHAR(45) NOT NULL,
  `descrizione` VARCHAR(250) NOT NULL,
  `richiesta` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id_gatti`))
ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `fferraio`.`foto_gatto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `path` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `fferraio`.`users` (
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