-- MySQL Script generated by MySQL Workbench
-- 09/19/18 18:57:09
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema blogspock
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema blogspock
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `blogspock` DEFAULT CHARACTER SET latin1 ;
-- -----------------------------------------------------
-- Schema blogspock
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema blogspock
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `blogspock` DEFAULT CHARACTER SET latin1 ;
-- -----------------------------------------------------

USE `blogspock` ;


-- -----------------------------------------------------
-- Table `blogspock`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blogspock`.`usuario` (
  `idusuario` INT NOT NULL COMMENT '',
  `nome` VARCHAR(50) NULL COMMENT '',
  `data_nasci` DATE NULL COMMENT '',
  `senha` VARCHAR(100) NULL COMMENT '',
  `email` VARCHAR(70) NULL COMMENT '',
  `dataRegistro` DATE NULL COMMENT '',
  `acesso_id` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`idusuario`, `acesso_id`)  COMMENT '',
  INDEX `fk_usuario_acesso_idx` (`acesso_id` ASC)  COMMENT '',
  CONSTRAINT `fk_usuario_acesso`
    FOREIGN KEY (`acesso_id`)
    REFERENCES `progwebsley`.`acesso` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `blogspock` ;

-- -----------------------------------------------------
-- Table `blogspock`.`post`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blogspock`.`post` (
  `idpost` INT NOT NULL COMMENT '',
  `removed` TINYINT NULL COMMENT '',
  `titulo` VARCHAR(30) NULL COMMENT '',
  `descricao` VARCHAR(50) NULL COMMENT '',
  `textoPost` TEXT NULL COMMENT '',
  `ult_Alt` DATETIME NULL COMMENT '',
  `horaCriacao` DATETIME NULL COMMENT '',
  `usuario_idusuario` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idpost`, `usuario_idusuario`)  COMMENT '',
  INDEX `fk_post_usuario1_idx` (`usuario_idusuario` ASC)  COMMENT '',
  CONSTRAINT `fk_post_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `blogspock`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blogspock`.`comentario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blogspock`.`comentario` (
  `idcomentario` INT NOT NULL COMMENT '',
  `coment` TEXT NULL COMMENT '',
  `horaCriacao` DATE NULL COMMENT '',
  PRIMARY KEY (`idcomentario`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blogspock`.`comentario_has_post`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blogspock`.`comentario_has_post` (
  `comentario_idcomentario` INT NOT NULL COMMENT '',
  `post_idpost` INT NOT NULL COMMENT '',
  `post_usuario_idusuario` INT NOT NULL COMMENT '',
  PRIMARY KEY (`comentario_idcomentario`, `post_idpost`, `post_usuario_idusuario`)  COMMENT '',
  INDEX `fk_comentario_has_post_post1_idx` (`post_idpost` ASC, `post_usuario_idusuario` ASC)  COMMENT '',
  INDEX `fk_comentario_has_post_comentario1_idx` (`comentario_idcomentario` ASC)  COMMENT '',
  CONSTRAINT `fk_comentario_has_post_comentario1`
    FOREIGN KEY (`comentario_idcomentario`)
    REFERENCES `blogspock`.`comentario` (`idcomentario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comentario_has_post_post1`
    FOREIGN KEY (`post_idpost` , `post_usuario_idusuario`)
    REFERENCES `blogspock`.`post` (`idpost` , `usuario_idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blogspock`.`permissoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blogspock`.`permissoes` (
  `idpermissoes` INT NOT NULL COMMENT '',
  `gerPost` TINYINT NULL COMMENT '',
  `gerComent` TINYINT NULL COMMENT '',
  `gerBlog` TINYINT NULL COMMENT '',
  `gerUsuario` TINYINT NULL COMMENT '',
  `usuario_idusuario` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idpermissoes`, `usuario_idusuario`)  COMMENT '',
  INDEX `fk_permissoes_usuario1_idx` (`usuario_idusuario` ASC)  COMMENT '',
  CONSTRAINT `fk_permissoes_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `blogspock`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blogspock`.`comentario_has_comentario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blogspock`.`comentario_has_comentario` (
  `comentario_idcomentario` INT NOT NULL COMMENT '',
  `comentario_idcomentario1` INT NOT NULL COMMENT '',
  PRIMARY KEY (`comentario_idcomentario`, `comentario_idcomentario1`)  COMMENT '',
  INDEX `fk_comentario_has_comentario_comentario2_idx` (`comentario_idcomentario1` ASC)  COMMENT '',
  INDEX `fk_comentario_has_comentario_comentario1_idx` (`comentario_idcomentario` ASC)  COMMENT '',
  CONSTRAINT `fk_comentario_has_comentario_comentario1`
    FOREIGN KEY (`comentario_idcomentario`)
    REFERENCES `blogspock`.`comentario` (`idcomentario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comentario_has_comentario_comentario2`
    FOREIGN KEY (`comentario_idcomentario1`)
    REFERENCES `blogspock`.`comentario` (`idcomentario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blogspock`.`blog_options`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blogspock`.`blog_options` (
  `idBlogOpt` INT NOT NULL COMMENT '',
  `opt_name` VARCHAR(45) NULL COMMENT '',
  `opt_value` VARCHAR(50) NULL COMMENT '',
  `usuario_idusuario` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idBlogOpt`, `usuario_idusuario`)  COMMENT '',
  INDEX `fk_blog_options_usuario1_idx` (`usuario_idusuario` ASC)  COMMENT '',
  CONSTRAINT `fk_blog_options_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `blogspock`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

DELIMITER $$
USE `blogspock`$$
CREATE DEFINER = CURRENT_USER TRIGGER `blogspock`.`creation_time` AFTER INSERT ON `post` FOR EACH ROW
BEGIN
update post set post.horaCriacao=now() where post.idpost=last_insert_id();
END$$

USE `blogspock`$$
CREATE DEFINER = CURRENT_USER TRIGGER `blogspock`.`comentario_AFTER_INSERT` AFTER INSERT ON `comentario` FOR EACH ROW
BEGIN
update comentario set comentario.horaCriacao=now() where comentario.idcomentario=last_insert_id();

END$$


DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;