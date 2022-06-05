SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE TABLE `gerenciamento_especialista_shop_qf1WuvpU`.`tab_motorista` (
  `id_motorista` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `cpf` VARCHAR(14) NOT NULL,
  `tipo_cnh` VARCHAR(5) NOT NULL,
  `validade_cnh` DATE NOT NULL,
  PRIMARY KEY (`id_motorista`))
ENGINE = InnoDB;


CREATE TABLE `gerenciamento_especialista_shop_qf1WuvpU`.`tab_veiculo` (
  `id_veiculo` INT NOT NULL AUTO_INCREMENT,
  `marca` VARCHAR(45) NOT NULL,
  `modelo` VARCHAR(45) NOT NULL,
  `ano` YEAR(4) NOT NULL,
  `placa` VARCHAR(20) NOT NULL,
  `chassi` VARCHAR(20) NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_veiculo`))
ENGINE = InnoDB;

CREATE TABLE `gerenciamento_especialista_shop_qf1WuvpU`.`tab_usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB;


CREATE TABLE `gerenciamento_especialista_shop_qf1WuvpU`.`tab_viagens` (
  `id_viagens` INT NOT NULL AUTO_INCREMENT,
  `data_saida` DATE NOT NULL,
  `hora_saida` VARCHAR(5) NOT NULL,
  `data_chegada` DATE,
  `hora_chegada` VARCHAR(5),
  `tab_motorista_id_motorista` INT NOT NULL,
  `tab_veiculo_id_veiculo` INT NOT NULL,
  PRIMARY KEY (`id_viagens`, `tab_motorista_id_motorista`, `tab_veiculo_id_veiculo`, `tab_usuario_id_usuario`),
  INDEX `fk_tab_viagens_tab_motorista_idx` (`tab_motorista_id_motorista`),
  INDEX `fk_tab_viagens_tab_veiculo1_idx` (`tab_veiculo_id_veiculo`),
  CONSTRAINT `fk_tab_viagens_tab_motorista`
    FOREIGN KEY (`tab_motorista_id_motorista`)
    REFERENCES `gerenciamento_especialista_shop_qf1WuvpU`.`tab_motorista` (`id_motorista`),
  CONSTRAINT `fk_tab_viagens_tab_veiculo`
    FOREIGN KEY (`tab_veiculo_id_veiculo`)
    REFERENCES `gerenciamento_especialista_shop_qf1WuvpU`.`tab_veiculo` (`id_veiculo`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
