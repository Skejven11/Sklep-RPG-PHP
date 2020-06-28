-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema bazyrpg
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bazyrpg
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bazyrpg` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci ;
USE `bazyrpg` ;

-- -----------------------------------------------------
-- Table `bazyrpg`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bazyrpg`.`user` (
  `iduser` INT(11) NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(45) NULL DEFAULT NULL,
  `pass` VARCHAR(45) NULL DEFAULT NULL,
  `role` VARCHAR(45) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`iduser`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_polish_ci;


-- -----------------------------------------------------
-- Table `bazyrpg`.`address`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bazyrpg`.`address` (
  `idaddress` INT(11) NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NULL DEFAULT NULL,
  `last_name` VARCHAR(45) NULL DEFAULT NULL,
  `street` VARCHAR(45) NULL DEFAULT NULL,
  `house` INT(11) NULL DEFAULT NULL,
  `apartment` INT(11) NULL DEFAULT NULL,
  `postal_code` VARCHAR(24) NULL DEFAULT NULL,
  `city` VARCHAR(45) NULL DEFAULT NULL,
  `country` VARCHAR(45) NULL DEFAULT NULL,
  `edit_date` DATETIME NULL DEFAULT NULL,
  `user_iduser` INT(11) NOT NULL,
  PRIMARY KEY (`idaddress`),
  INDEX `fk_address_user1_idx` (`user_iduser` ASC) ,
  CONSTRAINT `fk_address_user1`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `bazyrpg`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_polish_ci;


-- -----------------------------------------------------
-- Table `bazyrpg`.`genre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bazyrpg`.`genre` (
  `idGenre` INT(11) NOT NULL AUTO_INCREMENT,
  `Genname` VARCHAR(45) NULL DEFAULT NULL,
  `description` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`idGenre`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_polish_ci;


-- -----------------------------------------------------
-- Table `bazyrpg`.`status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bazyrpg`.`status` (
  `idstatus` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idstatus`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_polish_ci;


-- -----------------------------------------------------
-- Table `bazyrpg`.`order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bazyrpg`.`order` (
  `idorder` INT(11) NOT NULL AUTO_INCREMENT,
  `user_iduser` INT(11) NOT NULL,
  `total_price` DOUBLE NULL DEFAULT NULL,
  `date` DATE NULL DEFAULT NULL,
  `status_idstatus` INT(11) NOT NULL,
  PRIMARY KEY (`idorder`),
  INDEX `fk_basket_user1_idx` (`user_iduser` ASC) ,
  INDEX `fk_order_status1_idx` (`status_idstatus` ASC) ,
  CONSTRAINT `fk_basket_user1`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `bazyrpg`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_status1`
    FOREIGN KEY (`status_idstatus`)
    REFERENCES `bazyrpg`.`status` (`idstatus`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_polish_ci;


-- -----------------------------------------------------
-- Table `bazyrpg`.`rpg`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bazyrpg`.`rpg` (
  `idRPG` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `publisher` VARCHAR(45) NULL DEFAULT NULL,
  `author` VARCHAR(45) NULL DEFAULT NULL,
  `price` DOUBLE NULL DEFAULT NULL,
  `Genre_idGenre` INT(11) NOT NULL,
  PRIMARY KEY (`idRPG`),
  INDEX `fk_RPG_Genre1_idx` (`Genre_idGenre` ASC) ,
  CONSTRAINT `fk_RPG_Genre1`
    FOREIGN KEY (`Genre_idGenre`)
    REFERENCES `bazyrpg`.`genre` (`idGenre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 21
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_polish_ci;


-- -----------------------------------------------------
-- Table `bazyrpg`.`rpg_has_order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bazyrpg`.`rpg_has_order` (
  `RPG_idRPG` INT(11) NOT NULL AUTO_INCREMENT,
  `order_idorder` INT(11) NOT NULL,
  `amount` INT(11) NOT NULL,
  PRIMARY KEY (`RPG_idRPG`, `order_idorder`),
  INDEX `fk_RPG_has_basket_basket1_idx` (`order_idorder` ASC) ,
  INDEX `fk_RPG_has_basket_RPG1_idx` (`RPG_idRPG` ASC) ,
  CONSTRAINT `fk_RPG_has_basket_RPG1`
    FOREIGN KEY (`RPG_idRPG`)
    REFERENCES `bazyrpg`.`rpg` (`idRPG`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_RPG_has_basket_basket1`
    FOREIGN KEY (`order_idorder`)
    REFERENCES `bazyrpg`.`order` (`idorder`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_polish_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
