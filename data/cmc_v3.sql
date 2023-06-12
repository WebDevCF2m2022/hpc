-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema instrument_project
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema db_cmc
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_cmc
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_cmc` DEFAULT CHARACTER SET utf8mb4 ;
USE `db_cmc` ;

-- -----------------------------------------------------
-- Table `db_cmc`.`agenda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cmc`.`agenda` (
  `idagenda` INT(11) NOT NULL,
  PRIMARY KEY (`idagenda`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


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
  CONSTRAINT `fk_cmc_service_has_cmc_medecin_cmc_medecin1`
    FOREIGN KEY (`cmc_medecin_medecinID`)
    REFERENCES `db_cmc`.`cmc_medecin` (`medecinID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cmc_service_has_cmc_medecin_cmc_service`
    FOREIGN KEY (`cmc_service_serviceID`)
    REFERENCES `db_cmc`.`cmc_service` (`serviceID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `db_cmc`.`faq`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cmc`.`faq` (
  `faqID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `faqTitle` VARCHAR(120) NULL,
  `faqText` TEXT NULL,
  PRIMARY KEY (`faqID`),
  UNIQUE INDEX `faqTitle_UNIQUE` (`faqTitle` ASC) VISIBLE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
