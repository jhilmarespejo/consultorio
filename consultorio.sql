-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`consultorio`clinics
-- ------------------------------ -----------------------
CREATE TABLE IF NOT EXISTS `mydb`.`consultorio` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `logo` VARCHAR(250) NULL,
  `intervalo_cita` VARCHAR(45) NULL,
  `nombre_consultorio` VARCHAR(250) NULL,
  `direccion` VARCHAR(45) NULL,
  `responsable` VARCHAR(45) NULL,
  `celular` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `nit` VARCHAR(45) NULL,
  `registro` VARCHAR(45) NULL,
  `horarios` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`pacientes` patients
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`pacientes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `consultorio_id` INT NOT NULL,
  `nombres` VARCHAR(200) NULL,
  `apellidos` VARCHAR(200) NULL,
  `sexo` VARCHAR(10) NULL,
  `fecha_nacimiento` DATE NULL,
  `celular` VARCHAR(10) NULL,
  `grupo_sanguineo` VARCHAR(15) NULL,
  `celular_referencia` VARCHAR(10) NULL,
  `estado_civil` VARCHAR(250) NULL,
  `correo` VARCHAR(150) NULL,
  `domicilio` VARCHAR(250) NULL,
  `persona_responsable` VARCHAR(250) NULL,
  `celular_persona_responsable` VARCHAR(10) NULL,
  `ucupacion` VARCHAR(200) NULL,
  `ci` VARCHAR(10) NULL,
  `ci_exp` VARCHAR(5) NULL,
  `religion` VARCHAR(45) NULL,
  `foto` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_pacientes_consultorio1_idx` (`consultorio_id` ASC) VISIBLE,
  CONSTRAINT `fk_pacientes_consultorio1`
    FOREIGN KEY (`consultorio_id`)
    REFERENCES `mydb`.`consultorio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`consultas` consultations
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`consultas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `pacientes_id` INT NOT NULL,
  `medico` VARCHAR(100) NULL,
  `motivo` VARCHAR(100) NULL,
  `descripcion` VARCHAR(1500) NULL,
  `diagnostico` VARCHAR(250) NULL,
  `pronostico` VARCHAR(45) NULL,
  `tratamiento` VARCHAR(500) NULL,
  `observaciones` VARCHAR(500) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_consultas_pacientes1_idx` (`pacientes_id` ASC) VISIBLE,
  CONSTRAINT `fk_consultas_pacientes1`
    FOREIGN KEY (`pacientes_id`)
    REFERENCES `mydb`.`pacientes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`signos_vitales` vital_signs
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`signos_vitales` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `consultas_id` INT NOT NULL,
  `peso` VARCHAR(45) NULL,
  `talla` VARCHAR(45) NULL,
  `pulso` VARCHAR(45) NULL,
  `fc` VARCHAR(45) NULL,
  `fr` VARCHAR(45) NULL,
  `pa` VARCHAR(45) NULL COMMENT 'presion arterial',
  PRIMARY KEY (`id`),
  INDEX `fk_signos_vitales_consultas1_idx` (`consultas_id` ASC) VISIBLE,
  CONSTRAINT `fk_signos_vitales_consultas1`
    FOREIGN KEY (`consultas_id`)
    REFERENCES `mydb`.`consultas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`examenes` exams
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`examenes` (
  `id` INT NOT NULL,
  `indole` VARCHAR(45) NULL COMMENT 'examen fisico, sistemico, laboratorial\n',
  `tipo` VARCHAR(45) NULL COMMENT 'sistema respiratorio, cardiovascular, nervioso',
  `descripcion` VARCHAR(45) NULL,
  `resultado` VARCHAR(45) NULL,
  `observaciones` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_examenes_fisicos_consultas1_idx` (`tipo` ASC) VISIBLE,
  CONSTRAINT `fk_examenes_fisicos_consultas1`
    FOREIGN KEY (`tipo`)
    REFERENCES `mydb`.`consultas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`citas`  medical_appointments
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`citas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `pacientes_id` INT NOT NULL,
  `fecha` DATE NULL,
  `hora` DATETIME(6) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_citas_pacientes1_idx` (`pacientes_id` ASC) VISIBLE,
  CONSTRAINT `fk_citas_pacientes1`
    FOREIGN KEY (`pacientes_id`)
    REFERENCES `mydb`.`pacientes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`cuentas` payments
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cuentas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `pacientes_id` INT NOT NULL,
  `total` FLOAT NULL,
  `acuenta` FLOAT NULL,
  `saldo` FLOAT NULL,
  `fecha` DATE NULL,
  `observaciones` VARCHAR(350) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cuentas_pacientes1_idx` (`pacientes_id` ASC) VISIBLE,
  CONSTRAINT `fk_cuentas_pacientes1`
    FOREIGN KEY (`pacientes_id`)
    REFERENCES `mydb`.`pacientes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`recetas` prescriptions
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`recetas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `consultas_id` INT NOT NULL,
  `medicamento` VARCHAR(200) NOT NULL,
  `presentacion` VARCHAR(150) NULL,
  `cantidad` VARCHAR(45) NULL,
  `indicacion` VARCHAR(300) NULL,
  `observaciones` VARCHAR(350) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_recetas_consultas1_idx` (`consultas_id` ASC) VISIBLE,
  CONSTRAINT `fk_recetas_consultas1`
    FOREIGN KEY (`consultas_id`)
    REFERENCES `mydb`.`consultas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`alergias` allergies
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`alergias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `pacientes_id` INT NOT NULL,
  `agente` VARCHAR(250) NULL COMMENT 'polen, alimento, antibiótico…',
  `respuesta` TEXT(500) NULL COMMENT 'inflamación, rubor, dolor, choque anafiláctico...',
  `control` TEXT(500) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_alergias_pacientes1_idx` (`pacientes_id` ASC) VISIBLE,
  CONSTRAINT `fk_alergias_pacientes1`
    FOREIGN KEY (`pacientes_id`)
    REFERENCES `mydb`.`pacientes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`caja` cash_registers
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`caja` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `consultorio_id` INT NOT NULL,
  `ingresos` INT NULL,
  `egresos` INT NULL,
  `observaciones` VARCHAR(150) NULL,
  `fecha` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_caja_consultorio1_idx` (`consultorio_id` ASC) VISIBLE,
  CONSTRAINT `fk_caja_consultorio1`
    FOREIGN KEY (`consultorio_id`)
    REFERENCES `mydb`.`consultorio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`historias` clinical_histories ***
-- ------------------------------------ -----------------
CREATE TABLE IF NOT EXISTS `mydb`.`historias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `documentos` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`antecedentes` medical_histories
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`antecedentes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `pacientes_id` INT NOT NULL,
  `indole` VARCHAR(500) NULL COMMENT 'antecedentes personales, familiares, psicosociales',
  `tipo` VARCHAR(700) NULL COMMENT 'patologicos, quirurgicos, hositalizaciones',
  `descripcion` VARCHAR(700) NULL,
  `observaciones` VARCHAR(150) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_antecedentes_personales_pacientes1_idx` (`pacientes_id` ASC) VISIBLE,
  CONSTRAINT `fk_antecedentes_personales_pacientes1`
    FOREIGN KEY (`pacientes_id`)
    REFERENCES `mydb`.`pacientes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`habitos` habits
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`habitos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `pacientes_id` INT NOT NULL,
  `alimentacion` VARCHAR(500) NULL,
  `apetito` VARCHAR(500) NULL,
  `catarsis_intestinal` VARCHAR(300) NULL,
  `diuresis` VARCHAR(45) NULL,
  `sueno` VARCHAR(250) NULL,
  `alcohol` VARCHAR(250) NULL,
  `infusiones` VARCHAR(250) NULL,
  `drogas` VARCHAR(250) NULL,
  `tabaco` VARCHAR(250) NULL,
  `observaciones` VARCHAR(250) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_habitos_pacientes1_idx` (`pacientes_id` ASC) VISIBLE,
  CONSTRAINT `fk_habitos_pacientes1`
    FOREIGN KEY (`pacientes_id`)
    REFERENCES `mydb`.`pacientes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`documentos` documents
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`documentos` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `descripcion` VARCHAR(100) NULL,
  `url` VARCHAR(150) NULL,
  `observaciones` VARCHAR(250) NULL,
  `consultas_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_documentos_consultas1_idx` (`consultas_id` ASC) VISIBLE,
  CONSTRAINT `fk_documentos_consultas1`
    FOREIGN KEY (`consultas_id`)
    REFERENCES `mydb`.`consultas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
