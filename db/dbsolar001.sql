-- MySQL Script generated by MySQL Workbench
-- Tue May 28 15:47:11 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema dbsolar
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema dbsolar
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dbsolar001` DEFAULT CHARACTER SET utf8 ;
USE `dbsolar001` ;

-- -----------------------------------------------------
-- Table `dbsolar`.`categoria_servicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsolar`.`categoria_servicio` (
  `idcategoria_servicio` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `condicion` TINYINT(1) NOT NULL,
  PRIMARY KEY (`idcategoria_servicio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbsolar`.`servicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsolar`.`servicio` (
  `idservicio` INT NOT NULL,
  `categoria_servicio_id` INT NOT NULL,
  `codigo` VARCHAR(45) NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idservicio`),
  INDEX `fk_servicios_categoria_servicio1_idx` (`categoria_servicio_id` ASC),
  CONSTRAINT `fk_servicios_categoria_servicio1`
    FOREIGN KEY (`categoria_servicio_id`)
    REFERENCES `dbsolar`.`categoria_servicio` (`idcategoria_servicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbsolar`.`producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsolar`.`producto` (
  `idproducto` INT NOT NULL AUTO_INCREMENT,
  `codigo` VARCHAR(45) NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `cantidad` INT NOT NULL,
  `imagen` VARCHAR(50) NULL,
  `estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idproducto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbsolar`.`categoria_producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsolar`.`categoria_producto` (
  `idcategoria_producto` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `condicion` TINYINT(1) NOT NULL,
  PRIMARY KEY (`idcategoria_producto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbsolar`.`cat_prod`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsolar`.`cat_prod` (
  `producto_id` INT NOT NULL,
  `categoria_producto_id` INT NOT NULL,
  INDEX `fk_cat_prod_productos1_idx` (`producto_id` ASC),
  INDEX `fk_cat_prod_categoria_producto1_idx` (`categoria_producto_id` ASC),
  CONSTRAINT `fk_cat_prod_productos1`
    FOREIGN KEY (`producto_id`)
    REFERENCES `dbsolar`.`producto` (`idproducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cat_prod_categoria_producto1`
    FOREIGN KEY (`categoria_producto_id`)
    REFERENCES `dbsolar`.`categoria_producto` (`idcategoria_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbsolar`.`proveedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsolar`.`proveedor` (
  `idproveedor` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL COMMENT '(Nombre o razon social)',
  `num_documento` VARCHAR(45) NOT NULL,
  `tipo_documento` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(45) NULL,
  `telefono` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  PRIMARY KEY (`idproveedor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbsolar`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsolar`.`cliente` (
  `idcliente` INT NOT NULL AUTO_INCREMENT,
  `tipo_cliente` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `tipo_documento` VARCHAR(45) NOT NULL,
  `num_documento` VARCHAR(45) NOT NULL,
  `fecha_prospecto` DATE NOT NULL,
  `fecha_cliente` DATE NOT NULL,
  `direccion` VARCHAR(45) NULL,
  `telefon` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  PRIMARY KEY (`idcliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbsolar`.`venta_servicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsolar`.`venta_servicio` (
  `idventa_servicio` INT NOT NULL AUTO_INCREMENT,
  `cliente_id` INT NOT NULL,
  `fecha_cotizacion` DATE NOT NULL,
  `fecha_venta` DATE NOT NULL,
  `tipo_comprobante` VARCHAR(45) NOT NULL,
  `serie_comprobante` VARCHAR(45) NOT NULL,
  `num_comprobante` VARCHAR(45) NOT NULL,
  `impuesto` DECIMAL(4,2) NOT NULL,
  `total_venta` DECIMAL(11,2) NOT NULL,
  `estado` VARCHAR(45) NULL,
  PRIMARY KEY (`idventa_servicio`),
  INDEX `fk_ventas_servicios_clientes1_idx` (`cliente_id` ASC),
  CONSTRAINT `fk_ventas_servicios_clientes1`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `dbsolar`.`cliente` (`idcliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbsolar`.`cotizacion_producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsolar`.`cotizacion_producto` (
  `idcotizacion_producto` INT NOT NULL AUTO_INCREMENT,
  `cliente_id` INT NOT NULL,
  `fecha_cotizacion` DATE NOT NULL,
  `fecha_venta` DATE NOT NULL,
  `tipo_comprobante` VARCHAR(45) NOT NULL,
  `serie_Comprobante` VARCHAR(45) NOT NULL,
  `num_comprobante` VARCHAR(45) NOT NULL,
  `impuesto` DECIMAL(4,2) NOT NULL,
  `total_cotizacion` DECIMAL(11,2) NOT NULL,
  `estado` VARCHAR(45) NULL,
  PRIMARY KEY (`idcotizacion_producto`),
  INDEX `fk_cotizacion_productos_clientes1_idx` (`cliente_id` ASC),
  CONSTRAINT `fk_cotizacion_productos_clientes1`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `dbsolar`.`cliente` (`idcliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbsolar`.`comp_prov`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsolar`.`comp_prov` (
  `idcomp_prov` INT NOT NULL,
  `proveedore_id` INT NOT NULL,
  `tipo_comprobante` VARCHAR(45) NOT NULL,
  `serie_comprobante` VARCHAR(45) NULL,
  `num_comprobante` VARCHAR(45) NOT NULL,
  `fecha_hora` DATETIME NOT NULL,
  `impuesto` DECIMAL(4,2) NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcomp_prov`),
  INDEX `fk_comp_proov_proovedores1_idx` (`proveedore_id` ASC),
  CONSTRAINT `fk_comp_proov_proovedores1`
    FOREIGN KEY (`proveedore_id`)
    REFERENCES `dbsolar`.`proveedor` (`idproveedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbsolar`.`detalle_venta_prod`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsolar`.`detalle_cotizacion_prod` (
  `iddetalle_cotizacion_prod` INT NOT NULL AUTO_INCREMENT,
  `cotizacion_producto_id` INT NOT NULL,
  `producto_id` INT NOT NULL,
  `cantidad` INT NOT NULL,
  `precio_cotizacion` DECIMAL(11,2) NOT NULL,
  `descuento` DECIMAL(11,2) NOT NULL,
  PRIMARY KEY (`iddetalle_cotizacion_prod`),
  INDEX `fk_detalle_cotizacion_prod_cotizacion_productos1_idx` (`cotizacion_producto_id` ASC),
  INDEX `fk_detalle_cotizacion_prod_productos1_idx` (`producto_id` ASC),
  CONSTRAINT `fk_detalle_cotizacion_prod_cotizacion_productos1`
    FOREIGN KEY (`cotizacion_producto_id`)
    REFERENCES `dbsolar`.`cotizacion_producto` (`idcotizacion_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_cotizacion_prod_productos1`
    FOREIGN KEY (`producto_id`)
    REFERENCES `dbsolar`.`producto` (`idproducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbsolar`.`detalle_venta_servicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsolar`.`detalle_venta_servicio` (
  `iddetalle_venta_servicio` INT NOT NULL AUTO_INCREMENT,
  `venta_servicio_idventa_servicio` INT NOT NULL,
  `servicio_id` INT NOT NULL,
  `cantidad` INT NOT NULL,
  `precio_venta` DECIMAL(11,2) NOT NULL,
  `descuento` DECIMAL(11,2) NOT NULL,
  PRIMARY KEY (`iddetalle_venta_servicio`),
  INDEX `fk_detalle_ventas_servicios_servicios1_idx` (`servicio_id` ASC),
  INDEX `fk_detalle_ventas_servicios_ventas_servicios1_idx` (`venta_servicio_idventa_servicio` ASC),
  CONSTRAINT `fk_detalle_ventas_servicios_servicios1`
    FOREIGN KEY (`servicio_id`)
    REFERENCES `dbsolar`.`servicio` (`idservicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_ventas_servicios_ventas_servicios1`
    FOREIGN KEY (`venta_servicio_idventa_servicio`)
    REFERENCES `dbsolar`.`venta_servicio` (`idventa_servicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbsolar`.`detalle_comp_prov`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsolar`.`detalle_comp_prov` (
  `iddetalle_comp_prov` INT NOT NULL AUTO_INCREMENT,
  `producto_idproducto` INT NOT NULL,
  `comp_prov_idcomp_prov` INT NOT NULL,
  `cantidad` INT NOT NULL,
  `precio_compra` DECIMAL(11,2) NOT NULL,
  `precio_venta` DECIMAL(11,2) NOT NULL,
  PRIMARY KEY (`iddetalle_comp_prov`),
  INDEX `fk_detalle_comp_prov_productos1_idx` (`producto_idproducto` ASC),
  INDEX `fk_detalle_comp_prov_comp_prov1_idx` (`comp_prov_idcomp_prov` ASC),
  CONSTRAINT `fk_detalle_comp_prov_productos1`
    FOREIGN KEY (`producto_idproducto`)
    REFERENCES `dbsolar`.`producto` (`idproducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_comp_prov_comp_prov1`
    FOREIGN KEY (`comp_prov_idcomp_prov`)
    REFERENCES `dbsolar`.`comp_prov` (`idcomp_prov`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
