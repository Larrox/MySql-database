

CREATE TABLE `Tiry` (
  `idTiry` INT NOT NULL AUTO_INCREMENT,
  `rejestracja` VARCHAR(7) NULL,
  `rocznik` INT NULL,
  `spalanie` INT NULL,
  PRIMARY KEY (`idTiry`),
  UNIQUE INDEX `idTiry_UNIQUE` (`idTiry` ASC),
  UNIQUE INDEX `Tirycol_UNIQUE` (`rejestracja` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Trasy`
-- -----------------------------------------------------

CREATE TABLE `Trasy` (
  `idTrasy` INT NOT NULL AUTO_INCREMENT,
  `Tiry_idTiry` INT NOT NULL,
  `dystans` INT NULL,
  PRIMARY KEY (`idTrasy`, `Tiry_idTiry`),
  INDEX `fk_Trasy_Tiry_idx` (`Tiry_idTiry` ASC),
  CONSTRAINT `fk_Trasy_Tiry`
    FOREIGN KEY (`Tiry_idTiry`)
    REFERENCES `Tiry` (`idTiry`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Uzytkownicy`
-- -----------------------------------------------------

CREATE TABLE `Uzytkownicy` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(45) NULL,
  `pass` VARCHAR(40) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

INSERT INTO `uzytkownicy` (`id`, `login`, `pass`) VALUES ('1', 'admin', SHA1('admin'));
