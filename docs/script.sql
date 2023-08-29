-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Stamp
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Stamp
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Stamp` DEFAULT CHARACTER SET utf8 ;
USE `Stamp` ;

-- -----------------------------------------------------
-- Table `Stamp`.`stamp`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Stamp`.`stamp` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` TEXT NULL,
  `price` FLOAT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Stamp`.`client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Stamp`.`client` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NULL,
  `address` VARCHAR(45) NULL,
  `phone` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Stamp`.`invoice`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Stamp`.`invoice` (
  `id` INT NOT NULL,
  `client_id` INT NOT NULL,
  `date` DATE NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_invoice_client_idx` (`client_id` ASC),
  CONSTRAINT `fk_invoice_client`
    FOREIGN KEY (`client_id`)
    REFERENCES `Stamp`.`client` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Stamp`.`invoice_has_stamp`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Stamp`.`invoice_has_stamp` (
  `invoice_id` INT NOT NULL,
  `stamp_id` INT NOT NULL,
  `qty` INT NOT NULL,
  `price` FLOAT NOT NULL,
  PRIMARY KEY (`invoice_id`, `stamp_id`),
  INDEX `fk_invoice_has_stamp_stamp1_idx` (`stamp_id` ASC),
  INDEX `fk_invoice_has_stamp_invoice1_idx` (`invoice_id` ASC),
  CONSTRAINT `fk_invoice_has_stamp_invoice1`
    FOREIGN KEY (`invoice_id`)
    REFERENCES `Stamp`.`invoice` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_invoice_has_stamp_stamp1`
    FOREIGN KEY (`stamp_id`)
    REFERENCES `Stamp`.`stamp` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

