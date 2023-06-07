-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema db_cmc
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_cmc
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_cmc` DEFAULT CHARACTER SET utf8mb4 ;
-- -----------------------------------------------------
-- Schema instrument_project
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema instrument_project
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `instrument_project` DEFAULT CHARACTER SET utf8mb4 ;
USE `db_cmc` ;

-- -----------------------------------------------------
-- Table `db_cmc`.`cmc_admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cmc`.`cmc_admin` (
  `userID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_login` VARCHAR(30) NOT NULL,
  `user_pwd` VARCHAR(250) NOT NULL,
  `user_mail` VARCHAR(250) NOT NULL,
  `perm_user` INT(4) NOT NULL,
  `user_uniqID` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE INDEX `userID_UNIQUE` (`userID` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `db_cmc`.`agenda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cmc`.`agenda` (
  `idagenda` INT(11) NOT NULL,
  `cmc_admin_userID` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idagenda`, `cmc_admin_userID`),
  INDEX `fk_agenda_cmc_admin1_idx` (`cmc_admin_userID` ASC) VISIBLE,
  CONSTRAINT `fk_agenda_cmc_admin1`
    FOREIGN KEY (`cmc_admin_userID`)
    REFERENCES `db_cmc`.`cmc_admin` (`userID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `db_cmc`.`cmc_medecin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cmc`.`cmc_medecin` (
  `medecinID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `nickname` VARCHAR(50) NOT NULL,
  `lang` VARCHAR(50) NOT NULL,
  `info` TEXT NOT NULL,
  `imgMed` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`medecinID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `db_cmc`.`cmc_service`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cmc`.`cmc_service` (
  `serviceID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `soins` VARCHAR(50) NOT NULL,
  `info_soins` TEXT NOT NULL,
  `imgSoins` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`serviceID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `db_cmc`.`cmc_service_has_cmc_medecin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cmc`.`cmc_service_has_cmc_medecin` (
  `cmc_service_serviceID` INT(10) UNSIGNED NOT NULL,
  `cmc_medecin_medecinID` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`cmc_service_serviceID`, `cmc_medecin_medecinID`),
  INDEX `fk_cmc_service_has_cmc_medecin_cmc_medecin1_idx` (`cmc_medecin_medecinID` ASC) VISIBLE,
  INDEX `fk_cmc_service_has_cmc_medecin_cmc_service_idx` (`cmc_service_serviceID` ASC) VISIBLE,
  CONSTRAINT `fk_cmc_service_has_cmc_medecin_cmc_service`
    FOREIGN KEY (`cmc_service_serviceID`)
    REFERENCES `db_cmc`.`cmc_service` (`serviceID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cmc_service_has_cmc_medecin_cmc_medecin1`
    FOREIGN KEY (`cmc_medecin_medecinID`)
    REFERENCES `db_cmc`.`cmc_medecin` (`medecinID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

USE `instrument_project` ;

-- -----------------------------------------------------
-- Table `instrument_project`.`artiste`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `instrument_project`.`artiste` (
  `artisteID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(50) NOT NULL,
  `wiki_url` VARCHAR(250) NULL DEFAULT NULL,
  `website_url` VARCHAR(250) NULL DEFAULT NULL,
  PRIMARY KEY (`artisteID`))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `instrument_project`.`category_instrument`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `instrument_project`.`category_instrument` (
  `categoryID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cat_instrument` VARCHAR(30) NOT NULL,
  `cat_description` TEXT NOT NULL,
  `cat_img` VARCHAR(250) NULL DEFAULT NULL,
  PRIMARY KEY (`categoryID`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `instrument_project`.`contact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `instrument_project`.`contact` (
  `contactID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(30) NOT NULL,
  `prenom` VARCHAR(30) NOT NULL,
  `message` VARCHAR(500) NOT NULL,
  `datemsg` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
  `email_contact` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`contactID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `instrument_project`.`instrument`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `instrument_project`.`instrument` (
  `instrumentID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(30) NOT NULL,
  `description` TEXT NOT NULL,
  `date_instrument` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
  `category_instrument_categoryID` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`instrumentID`),
  INDEX `fk_instrument_category_instrument1_idx` (`category_instrument_categoryID` ASC) VISIBLE,
  CONSTRAINT `fk_instrument_category_instrument1`
    FOREIGN KEY (`category_instrument_categoryID`)
    REFERENCES `instrument_project`.`category_instrument` (`categoryID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `instrument_project`.`instrument_has_artiste`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `instrument_project`.`instrument_has_artiste` (
  `instrument_instrumentID` INT(10) UNSIGNED NOT NULL,
  `artiste_artisteID` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`instrument_instrumentID`, `artiste_artisteID`),
  INDEX `fk_instrument_has_artiste_artiste1_idx` (`artiste_artisteID` ASC) VISIBLE,
  INDEX `fk_instrument_has_artiste_instrument1_idx` (`instrument_instrumentID` ASC) VISIBLE,
  CONSTRAINT `fk_instrument_has_artiste_artiste1`
    FOREIGN KEY (`artiste_artisteID`)
    REFERENCES `instrument_project`.`artiste` (`artisteID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_instrument_has_artiste_instrument1`
    FOREIGN KEY (`instrument_instrumentID`)
    REFERENCES `instrument_project`.`instrument` (`instrumentID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `instrument_project`.`media`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `instrument_project`.`media` (
  `idmedias` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `instrumentID` INT(10) UNSIGNED NOT NULL,
  `type_media` INT(3) NOT NULL COMMENT '1.Image \\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\n2.Video\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\n3.Audio',
  `media_url` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`idmedias`),
  INDEX `instrumentID` (`instrumentID` ASC) VISIBLE,
  CONSTRAINT `media_ibfk_1`
    FOREIGN KEY (`instrumentID`)
    REFERENCES `instrument_project`.`instrument` (`instrumentID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 37
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `instrument_project`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `instrument_project`.`user` (
  `userID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(30) NOT NULL,
  `mail_user` VARCHAR(250) NOT NULL,
  `user_pwd` VARCHAR(250) NOT NULL,
  `uniqID` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`userID`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
