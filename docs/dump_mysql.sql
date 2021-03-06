-- MySQL Script generated by MySQL Workbench
-- Wed Nov 11 02:37:54 2015
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema falemais_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema falemais_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `falemais_db` DEFAULT CHARACTER SET utf8 ;
USE `falemais_db` ;

-- -----------------------------------------------------
-- Table `falemais_db`.`plans`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `falemais_db`.`plans` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `description` TEXT NULL,
  `photography` VARCHAR(256) NULL,
  `status` TINYINT(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `falemais_db`.`areas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `falemais_db`.`areas` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` CHAR(4) NULL,
  `status` TINYINT(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `falemais_db`.`rates`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `falemais_db`.`rates` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `area_origin_id` INT UNSIGNED NOT NULL,
  `area_destination_id` INT UNSIGNED NOT NULL,
  `price_normal` DECIMAL(10,2) NULL,
  `price_reverse` DECIMAL(10,2) NULL,
  `status` TINYINT(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `fk_rates_areas_idx` (`area_origin_id` ASC),
  INDEX `fk_rates_areas1_idx` (`area_destination_id` ASC),
  CONSTRAINT `fk_rates_areas`
    FOREIGN KEY (`area_origin_id`)
    REFERENCES `falemais_db`.`areas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_rates_areas1`
    FOREIGN KEY (`area_destination_id`)
    REFERENCES `falemais_db`.`areas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `falemais_db`.`phone_calls`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `falemais_db`.`phone_calls` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `rates_id` INT UNSIGNED NOT NULL,
  `plans_id` INT UNSIGNED NOT NULL,
  `time` INT(11) NULL,
  `flag_cursor` CHAR(1) NULL,
  `rate_min_with` DECIMAL(10,2) NULL,
  `rate_min_without` DECIMAL(10,2) NULL,
  `status` TINYINT(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `fk_phone_calls_rates1_idx` (`rates_id` ASC),
  INDEX `fk_phone_calls_plans1_idx` (`plans_id` ASC),
  CONSTRAINT `fk_phone_calls_rates1`
    FOREIGN KEY (`rates_id`)
    REFERENCES `falemais_db`.`rates` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_phone_calls_plans1`
    FOREIGN KEY (`plans_id`)
    REFERENCES `falemais_db`.`plans` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
