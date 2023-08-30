-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema stamp
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema stamp
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `stamp` DEFAULT CHARACTER SET utf8 ;
USE `stamp` ;

-- -----------------------------------------------------
-- Table `stamp`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stamp`.`category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `stamp`.`condition`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stamp`.`condition` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `stamp`.`stamp`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stamp`.`stamp` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `year` INT NULL,
  `origin` VARCHAR(45) NULL,
  `category_id` INT NOT NULL,
  `condition_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_stamp_category_idx` (`category_id` ASC) VISIBLE,
  INDEX `fk_stamp_condition1_idx` (`condition_id` ASC) VISIBLE,
  CONSTRAINT `fk_stamp_category`
    FOREIGN KEY (`category_id`)
    REFERENCES `stamp`.`category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_stamp_condition1`
    FOREIGN KEY (`condition_id`)
    REFERENCES `stamp`.`condition` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `stamp`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stamp`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `stamp`.`user_stamp`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stamp`.`user_stamp` (
  `stamp_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `qty` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`stamp_id`, `user_id`),
  INDEX `fk_stamp_has_user_user1_idx` (`user_id` ASC) VISIBLE,
  INDEX `fk_stamp_has_user_stamp1_idx` (`stamp_id` ASC) VISIBLE,
  CONSTRAINT `fk_stamp_has_user_stamp1`
    FOREIGN KEY (`stamp_id`)
    REFERENCES `stamp`.`stamp` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_stamp_has_user_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `stamp`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

