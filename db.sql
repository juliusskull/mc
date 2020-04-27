-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.5.25a - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla consultorio.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `fecha_nac` date NOT NULL,
  `peso` double NOT NULL,
  `telefono1` varchar(11) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `sexo` varchar(1) NOT NULL DEFAULT 'M',
  `direccion` varchar(100) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT 'SALTA',
  `fch_alta` date NOT NULL,
  `id_usu_alta` int(11) NOT NULL DEFAULT '1',
  `estado` int(11) NOT NULL,
  `usuarioid` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla consultorio.clientes: 31 rows
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `fecha_nac`, `peso`, `telefono1`, `dni`, `sexo`, `direccion`, `ciudad`, `fch_alta`, `id_usu_alta`, `estado`, `usuarioid`) VALUES
	(1, 'juan', 'Forchino', '0000-00-00', 95.5, '123445', '213123', 'm', 'espaÃ±a 716', 'Salta', '2013-09-29', 1, 1, 1),
	(2, 'Jorge', 'Solis', '1945-10-01', 55.2, NULL, NULL, 'M', NULL, NULL, '2013-09-29', 1, 1, 1),
	(56, 'Matias', 'Ramos', '0000-00-00', 0, '1122334455', '12345678', 'F', '', '', '2014-07-21', 1, 1, 1),
	(23, 'Jorge', 'Solisa', '2008-01-01', 55.2, NULL, NULL, 'M', NULL, NULL, '2013-09-29', 1, 1, 1),
	(24, 'Jorge', 'Solisan', '2007-12-01', 55.4, NULL, NULL, 'M', NULL, NULL, '2013-09-29', 1, 1, 1),
	(35, 'gutierrez', 'gutierrez', '0000-00-00', 0, '123', '123', 'M', 'batalla de salta', 'salta', '2013-09-30', 1, 1, 1),
	(36, 'juan', 'juan', '0000-00-00', 0, '', '', '', '', '', '2013-09-30', 1, 1, 1),
	(37, 'juan', 'juan', '2014-08-25', 0, '', '', '', '', '', '2013-09-30', 1, 1, 1),
	(38, 'juan', 'juan', '2014-08-25', 0, '', '', '', '', '', '2013-09-30', 1, 1, 1),
	(39, 'juan', 'juan', '0000-00-00', 0, '', '', '', '', '', '2013-09-30', 1, 1, 1),
	(41, 'juan2', 'juan2', '0000-00-00', 0, '', '', '', '', '', '2013-09-30', 1, 1, 1),
	(44, 'jose', 'flores', '1980-08-01', 0, '123456', '', 'm', 'dorrego 123', 'salta', '2013-10-06', 1, 1, 1),
	(45, 'martin', 'nievas', '0000-00-00', 0, '1233333', '', '', 'barrio san ignacio', 'salta', '2013-10-06', 1, 1, 1),
	(46, 'benjamin', 'matius', '0000-00-00', 0, '1239000', '', '', 'gobelli 838', 'guemes', '2013-10-06', 1, 1, 1),
	(47, 'homero', 'simpson', '0000-00-00', 0, '123233', '', '', 'siempre viva 23', 'sprinfil', '2013-10-06', 1, 1, 1),
	(49, 'claudia', 'tsss', '0000-00-00', 0, '123333', '123399', '', 'parque belgrano', 'sala', '2013-10-20', 1, 1, 1),
	(57, 'Lucas', 'Torres', '0000-00-00', 0, '123456789', '12345678', 'F', '', '', '2014-07-21', 1, 1, 1),
	(52, 'juan', 'nanis', '0000-00-00', 0, '', '', '', '', '', '2013-11-08', 1, 1, 1),
	(53, 'm', 'mm', '0000-00-00', 0, '', '', 'F', '', '', '2013-11-12', 1, 1, 1),
	(55, 'juan', 'q', '0000-00-00', 0, '', '', 'F', '', '', '2014-02-26', 1, 1, 1),
	(58, 'Pamela', 'Teran', '0000-00-00', 0, '123456789', '12345678', 'F', '', '', '2014-07-21', 1, 1, 1),
	(59, 'Jose', 'Teran', '0000-00-00', 0, '123456789', '12345678', 'F', '', '', '2014-07-21', 1, 1, 1),
	(60, 'Nicolas', 'Teran', '0000-00-00', 0, '123456789', '12345678', 'F', '', '', '2014-07-21', 1, 1, 1),
	(61, 'Alberto', 'Teran', '0000-00-00', 0, '123456789', '34616909', 'F', '', '', '2014-07-21', 1, 1, 1),
	(62, 'Claudia', 'Teran', '0000-00-00', 0, '123456789', '12345678', 'F', '', '', '2014-07-21', 1, 1, 1),
	(63, 'Jonatan', 'Waymar', '0000-00-00', 0, '123456789', '12345678', 'F', '', '', '2014-07-21', 1, 1, 1),
	(64, 'facund&ograve;', 'Teran', '0000-00-00', 0, '123456789', '12345678', 'F', '', '', '2014-07-21', 1, 1, 1),
	(65, 'juan', 'teran', '0000-00-00', 0, '123456789', '12345678', 'F', '', '', '2014-07-21', 1, 1, 1),
	(66, 'juan', 'tieneli', '1964-04-01', 0, '12313', '12313', 'F', '', '', '2014-08-25', 1, 1, 1),
	(67, 'juan', 'perez', '0000-00-00', 0, '1232131231', '12313131', 'F', '', '', '2014-09-20', 1, 1, 1),
	(68, 'juan', 'perez', '0000-00-00', 0, '1232131231', '12313131', 'F', '', '', '2014-09-21', 1, 1, 1);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Volcando estructura para tabla consultorio.cta_cte
CREATE TABLE IF NOT EXISTS `cta_cte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `monto` double NOT NULL,
  `presupuesto` varchar(500) DEFAULT NULL,
  `fch_alta` date NOT NULL,
  `id_usu_alta` int(11) NOT NULL,
  `fch_cad` int(11) DEFAULT NULL,
  `id_usu_cad` int(11) DEFAULT NULL,
  `fch_inicio` date NOT NULL,
  `usuarioid` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla consultorio.cta_cte: ~21 rows (aproximadamente)
/*!40000 ALTER TABLE `cta_cte` DISABLE KEYS */;
INSERT INTO `cta_cte` (`id`, `id_cliente`, `monto`, `presupuesto`, `fch_alta`, `id_usu_alta`, `fch_cad`, `id_usu_cad`, `fch_inicio`, `usuarioid`) VALUES
	(1, 1, 2000, 'xxxxxxxxxxxxxxxxxxxxxxxxxxxx', '2013-10-04', 1, 2013, NULL, '2013-10-04', 1),
	(2, 44, 3000, NULL, '2013-10-06', 1, 2013, NULL, '2013-10-06', 1),
	(3, 44, 3000, NULL, '2013-10-06', 1, 2013, NULL, '2013-10-06', 1),
	(4, 44, 3500, NULL, '2013-10-06', 1, 2013, NULL, '2013-10-06', 1),
	(5, 44, 1000, NULL, '2013-10-06', 1, NULL, NULL, '2013-10-06', 1),
	(6, 1, 2000, 'nuevo presupuesto', '2013-10-17', 1, 2013, NULL, '2013-10-17', 1),
	(7, 1, 2000, 'nuevo presupuesto', '2013-10-17', 1, NULL, NULL, '2013-10-17', 1),
	(8, 42, 2000, 'nuevo presupuesto', '2013-10-18', 1, 2013, NULL, '2013-10-18', 1),
	(9, 42, 3000, 'nuevo presupuesto2', '2013-10-18', 1, 2013, NULL, '2013-10-18', 1),
	(10, 42, 4000, 'nuevo presupuesto2', '2013-10-18', 1, 2013, NULL, '2013-10-18', 1),
	(11, 42, 9000, 'nuevo presupuesto por nuevos aparatos', '2013-10-20', 1, NULL, NULL, '2013-11-05', 1),
	(12, 34, 3000, 'por al go', '2013-10-21', 1, NULL, NULL, '2013-10-21', 1),
	(13, 51, 3000, 'nuevo presupuesto', '2013-10-21', 1, 2013, NULL, '2013-10-21', 1),
	(14, 51, 3000, 'nuevo presupuesto', '2013-10-21', 1, NULL, NULL, '2013-10-21', 1),
	(15, 52, 3000, 'asdasdasd', '2013-11-08', 1, 2013, NULL, '2013-11-08', 1),
	(16, 52, 3000, 'asdasdasd', '2013-11-08', 1, 2013, NULL, '2013-11-08', 1),
	(17, 52, 10000, 'asdasdasd', '2013-11-08', 1, NULL, NULL, '2013-11-08', 1),
	(18, 43, 0, 'a 2 a&ntilde;os', '2013-11-12', 1, NULL, NULL, '2013-11-12', 1),
	(19, 54, 10000, 'asd a&ntilde;o 1 y &ntilde;uego en a&ntilde;o 2 y 3', '2013-11-12', 1, NULL, NULL, '2013-11-12', 1),
	(20, 3, 10000, 'xsxsaxax', '2014-07-16', 1, NULL, NULL, '2014-07-17', 1),
	(21, 56, 10000, 'Arreglo dental', '2014-07-21', 1, NULL, NULL, '2014-07-22', 1);
/*!40000 ALTER TABLE `cta_cte` ENABLE KEYS */;

-- Volcando estructura para tabla consultorio.cta_cte_det
CREATE TABLE IF NOT EXISTS `cta_cte_det` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cta_cte` int(11) NOT NULL,
  `sub_total` double NOT NULL,
  `fch_alta` date NOT NULL,
  `id_usu_alta` int(11) NOT NULL,
  `usuarioid` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla consultorio.cta_cte_det: ~20 rows (aproximadamente)
/*!40000 ALTER TABLE `cta_cte_det` DISABLE KEYS */;
INSERT INTO `cta_cte_det` (`id`, `id_cta_cte`, `sub_total`, `fch_alta`, `id_usu_alta`, `usuarioid`) VALUES
	(1, 1, 250, '2013-09-04', 1, 1),
	(2, 1, 250, '2013-10-04', 1, 1),
	(3, 1, 150.5, '2013-10-05', 1, 1),
	(4, 1, 150.5, '2013-10-05', 1, 1),
	(5, 1, 150.5, '2013-10-05', 1, 1),
	(8, 1, 50, '2013-10-05', 1, 1),
	(9, 1, 10, '2013-10-06', 1, 1),
	(10, 5, 10, '2013-10-06', 1, 1),
	(11, 5, 10, '2013-10-06', 1, 1),
	(12, 1, 10, '2013-10-07', 1, 1),
	(13, 11, 3000, '2013-10-20', 1, 1),
	(14, 11, 5000, '2013-10-20', 1, 1),
	(15, 11, 500, '2013-10-20', 1, 1),
	(17, 16, 10000, '2013-11-08', 1, 1),
	(18, 17, 1000, '2013-11-08', 1, 1),
	(19, 17, 1000, '2013-11-08', 1, 1),
	(20, 17, 1000, '2013-11-08', 1, 1),
	(22, 19, 1000, '2013-11-12', 1, 1),
	(23, 20, 100, '2014-07-17', 1, 1),
	(25, 5, 1, '2015-02-17', 1, 1);
/*!40000 ALTER TABLE `cta_cte_det` ENABLE KEYS */;

-- Volcando estructura para tabla consultorio.diagnostico
CREATE TABLE IF NOT EXISTS `diagnostico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcliente` int(11) NOT NULL,
  `observacion` varchar(2000) NOT NULL,
  `fchalta` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `usuarioid` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla consultorio.diagnostico: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `diagnostico` DISABLE KEYS */;
INSERT INTO `diagnostico` (`id`, `idcliente`, `observacion`, `fchalta`, `usuarioid`) VALUES
	(7, 1, '<p>This is some <strong>sample text</strong>. You are using <a data-cke-saved-href="http://ckeditor.com/" href="http://ckeditor.com/">CKEditor</a>. |||ï¿½|ÂºÂºÂºÂºÂº| <span class="marker">hola de nuevo</span><br></p><p><br></p><p><br></p>', '2014-08-28 03:00:00', 1),
	(14, 44, '<p>sadasdasdasdasd &nbsp;sadasdasdasdasd &nbsp;<span class="marker">sadasdasdasdasd</span></p><p>sadasdasdasdasd</p><p>hola prueba 1</p><p><br></p><p><br></p><p><br></p><p><br></p>', '2014-08-28 03:00:00', 1);
/*!40000 ALTER TABLE `diagnostico` ENABLE KEYS */;

-- Volcando estructura para tabla consultorio.fotos
CREATE TABLE IF NOT EXISTS `fotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `archivo` mediumblob,
  `tipo` varchar(30) DEFAULT NULL,
  `size` varchar(20) NOT NULL,
  `foto_desc` varchar(100) DEFAULT NULL,
  `foto_observacion` varchar(200) DEFAULT NULL,
  `fch_alta` date NOT NULL,
  `id_usu_alta` int(11) NOT NULL,
  `usuarioid` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla consultorio.fotos: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `fotos` DISABLE KEYS */;
INSERT INTO `fotos` (`id`, `id_cliente`, `archivo`, `tipo`, `size`, `foto_desc`, `foto_observacion`, `fch_alta`, `id_usu_alta`, `usuarioid`) VALUES
	(4, 1, NULL, NULL, '8.52 KB', 'descarga.jpg', NULL, '2013-10-06', 1, 1),
	(8, 1, NULL, NULL, '8.09 KB', 'descarga2.jpg', NULL, '2013-10-06', 1, 1),
	(9, 1, NULL, NULL, '76.02 KB', 'descarga3.jpg', NULL, '2013-10-06', 1, 1),
	(12, 42, NULL, 'application/pdf', '3.85 MB', 'Cancion hielo y fuego 1.-Juego de tronos- George R.R.Martin.pdf', NULL, '2013-10-16', 1, 1),
	(13, 42, NULL, 'image/jpeg ', '24.3 KB', 'tronos.jpg', NULL, '2013-10-18', 1, 1),
	(14, 42, NULL, 'application/pdf', '71.59 KB', 'examen android 1.pdf', NULL, '2013-10-18', 1, 1),
	(15, 42, NULL, 'image/jpeg', '418.86 KB', 'Corteguera Maria_CR_20130606_172943_1.jpg', NULL, '2013-10-19', 1, 1),
	(16, 51, NULL, 'application/pdf', '4.25 MB', 'Manual_Masisa clau.pdf', NULL, '2013-10-21', 1, 1),
	(17, 3, NULL, 'image/jpeg', '858.78 KB', 'Chrysanthemum.jpg', NULL, '2014-07-17', 1, 1),
	(18, 56, NULL, 'image/jpeg', '218.91 KB', 'F92.jpg', NULL, '2014-07-21', 1, 1),
	(19, 56, NULL, 'image/jpeg', '600.58 KB', 'paisaje.jpg', NULL, '2014-07-21', 1, 1);
/*!40000 ALTER TABLE `fotos` ENABLE KEYS */;

-- Volcando estructura para tabla consultorio.historial
CREATE TABLE IF NOT EXISTS `historial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `observacion` varchar(500) NOT NULL,
  `fch_alta` date NOT NULL,
  `id_tratamiento` int(11) DEFAULT NULL,
  `usuarioid` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla consultorio.historial: ~13 rows (aproximadamente)
/*!40000 ALTER TABLE `historial` DISABLE KEYS */;
INSERT INTO `historial` (`id`, `id_cliente`, `observacion`, `fch_alta`, `id_tratamiento`, `usuarioid`) VALUES
	(2, 1, 'nueva entrada para el historial', '2013-10-03', NULL, 1),
	(3, 1, 'nueva entrada para el historial', '2013-10-03', NULL, 1),
	(4, 1, 'nueva entrada ingresada', '2013-10-03', NULL, 1),
	(6, 1, 'esta entrada fue escrita el domingo', '2013-10-06', NULL, 1),
	(9, 1, 'En las Ãºltimas temporadas de Los Simpson, sobretodo luego de la pelÃ­cula de la serie, las aperturas de cada capÃ­tulo cambiaron y los autores decidieron incorporar mÃ¡s gags. Tal es asÃ­ que en la vuelta de la familia amarilla a FOX tras el film se vio el primer nuevo \'chiste de sofÃ¡\', en el que la familia debÃ­a escapar a un montÃ³n de sillones que los persiguen por todo Springfield. \n\nY si bien algunos fanÃ¡ticos prefieren volver a ver el humor del comienzo, hay que reconocer que el trabajo', '2013-10-06', NULL, 1),
	(10, 42, 'se realizo unas cositas', '2013-10-20', NULL, 1),
	(11, 42, 'nueva entrada de', '2013-10-20', NULL, 1),
	(12, 34, 'asdsfsdf', '2013-10-21', NULL, 1),
	(13, 54, 'sdasdasd', '2013-11-12', NULL, 1),
	(14, 42, '.&ntilde;&ntilde;.&ntilde;.{&ntilde;.', '2014-06-13', NULL, 1),
	(15, 42, '&ntilde;.&ntilde;.&ntilde;.', '2014-06-13', NULL, 1),
	(16, 42, 'asdasdasd', '2014-06-13', NULL, 1),
	(17, 3, 'asdasdada', '2014-07-16', NULL, 1);
/*!40000 ALTER TABLE `historial` ENABLE KEYS */;

-- Volcando estructura para tabla consultorio.pais
CREATE TABLE IF NOT EXISTS `pais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `fchalta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activo` int(1) NOT NULL DEFAULT '1',
  `usuarioid` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla consultorio.pais: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
INSERT INTO `pais` (`id`, `descripcion`, `fchalta`, `activo`, `usuarioid`) VALUES
	(1, 'Argentina', '2014-02-05 16:17:17', 1, 1),
	(2, 'BOLIVIA', '2014-02-05 16:17:17', 1, 1),
	(4, 'URUGUAY', '2014-02-05 16:17:17', 1, 1),
	(5, 'PARAGUAY', '2014-02-05 16:17:17', 1, 1),
	(6, 'CHILE', '2014-02-05 16:17:17', 1, 1);
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;

-- Volcando estructura para tabla consultorio.provincia
CREATE TABLE IF NOT EXISTS `provincia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `fchalta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activo` int(1) NOT NULL DEFAULT '1',
  `usuarioid` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla consultorio.provincia: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `provincia` DISABLE KEYS */;
/*!40000 ALTER TABLE `provincia` ENABLE KEYS */;

-- Volcando estructura para tabla consultorio.tratamiento
CREATE TABLE IF NOT EXISTS `tratamiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_tipo_tratamiento` int(11) NOT NULL,
  `fch_ini` date NOT NULL,
  `fch_fin` date DEFAULT NULL,
  `fch_alta` date NOT NULL,
  `id_usu_alta` int(11) NOT NULL,
  `fch_cad` date DEFAULT NULL,
  `usuarioid` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla consultorio.tratamiento: 3 rows
/*!40000 ALTER TABLE `tratamiento` DISABLE KEYS */;
INSERT INTO `tratamiento` (`id`, `id_cliente`, `id_tipo_tratamiento`, `fch_ini`, `fch_fin`, `fch_alta`, `id_usu_alta`, `fch_cad`, `usuarioid`) VALUES
	(1, 1, 1, '2013-10-02', NULL, '2013-10-02', 1, NULL, 1),
	(2, 1, 2, '2013-10-03', NULL, '2013-10-03', 1, NULL, 1),
	(3, 1, 3, '2013-10-03', NULL, '2013-10-03', 1, NULL, 1);
/*!40000 ALTER TABLE `tratamiento` ENABLE KEYS */;

-- Volcando estructura para tabla consultorio.tratamiento_observaciones
CREATE TABLE IF NOT EXISTS `tratamiento_observaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tratamiento` int(11) NOT NULL,
  `fecha_alta` date NOT NULL,
  `id_tipo_tratamiento` int(11) NOT NULL,
  `usuarioid` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla consultorio.tratamiento_observaciones: 0 rows
/*!40000 ALTER TABLE `tratamiento_observaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `tratamiento_observaciones` ENABLE KEYS */;

-- Volcando estructura para tabla consultorio.tratamiento_tipo
CREATE TABLE IF NOT EXISTS `tratamiento_tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(300) NOT NULL,
  `fecha_alta` date NOT NULL,
  `id_usu_alta` int(11) NOT NULL,
  `id_usu_cad` int(11) DEFAULT NULL,
  `fch_cad` date DEFAULT NULL,
  `usuarioid` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla consultorio.tratamiento_tipo: 3 rows
/*!40000 ALTER TABLE `tratamiento_tipo` DISABLE KEYS */;
INSERT INTO `tratamiento_tipo` (`id`, `nombre`, `fecha_alta`, `id_usu_alta`, `id_usu_cad`, `fch_cad`, `usuarioid`) VALUES
	(1, 'ortodoncia', '2013-10-02', 1, NULL, NULL, 1),
	(2, 'limpieza bucal', '2013-10-03', 1, NULL, NULL, 1),
	(3, 'protecis', '2013-10-03', 1, NULL, NULL, 1);
/*!40000 ALTER TABLE `tratamiento_tipo` ENABLE KEYS */;

-- Volcando estructura para tabla consultorio.turnos
CREATE TABLE IF NOT EXISTS `turnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_usu` int(11) NOT NULL,
  `fch_turno` datetime NOT NULL,
  `turno_desc` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `fch_alta` date NOT NULL,
  `id_usu_alta` int(11) NOT NULL,
  `usuarioid` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=ascii;

-- Volcando datos para la tabla consultorio.turnos: ~23 rows (aproximadamente)
/*!40000 ALTER TABLE `turnos` DISABLE KEYS */;
INSERT INTO `turnos` (`id`, `id_cliente`, `id_usu`, `fch_turno`, `turno_desc`, `fch_alta`, `id_usu_alta`, `usuarioid`) VALUES
	(6, 1, 1, '2013-10-14 00:00:00', 'JUAN, JULIAN,:saddasdsd', '2013-10-14', 1, 1),
	(8, 2, 1, '2013-10-14 16:30:00', 'JUAN, JULIAN,:saddasdsd', '2013-10-14', 1, 1),
	(9, 3, 1, '2013-10-16 08:30:00', 'JUAN, CHOQUE:NADA', '2013-10-16', 1, 1),
	(10, 4, 1, '2013-10-16 09:30:00', 'JUANA, CHOQUE:NADA', '2013-10-16', 1, 1),
	(11, 5, 1, '2013-10-22 16:30:00', 'JUAN, PEREZ,:jsdjsd', '2013-10-21', 1, 1),
	(12, 0, 1, '2013-10-23 16:30:00', 'JULIETA, FLORENCIA,:asdasd', '2013-10-21', 1, 1),
	(13, 0, 1, '2013-10-23 17:00:00', 'AMANDA, MONSERRAT,:sdasdsd', '2013-10-21', 1, 1),
	(14, 0, 1, '2013-11-08 15:00:00', 'JUAN, MARTINA,:sdadasd', '2013-11-08', 1, 1),
	(15, 0, 1, '2013-11-08 17:30:00', 'AGUSTINA,:asdasd', '2013-11-08', 1, 1),
	(16, 0, 1, '2013-11-09 17:30:00', 'MAGDALENA,:', '2013-11-08', 1, 1),
	(17, 0, 1, '2013-11-12 15:00:00', 'JULIO,:', '2013-11-12', 1, 1),
	(18, 0, 1, '2014-02-20 15:00:00', 'CCc:cccc', '2014-02-19', 1, 1),
	(19, 0, 1, '2014-02-24 15:00:00', 'JUAN:', '2014-02-24', 1, 1),
	(20, 0, 1, '2014-02-25 15:00:00', 'JUAN,:ddd', '2014-02-24', 1, 1),
	(21, 0, 1, '2014-02-26 15:00:00', 'JUAREZ,:', '2014-02-24', 1, 1),
	(22, 4, 1, '2014-02-27 15:00:00', 'REE:', '2014-02-24', 1, 1),
	(23, 3, 1, '2014-02-28 15:00:00', 'MARTINA,:', '2014-02-24', 1, 1),
	(24, 5, 1, '2014-02-27 15:00:00', 'ERER:', '2014-02-24', 1, 1),
	(25, 2, 1, '2014-07-16 15:00:00', 'JUAN,:', '2014-07-16', 1, 1),
	(26, 4, 1, '2014-07-17 15:00:00', 'PABLO,:xvxvx', '2014-07-17', 1, 1),
	(27, 1, 1, '2014-07-17 15:00:00', 'JULIO,:bnb', '2014-07-17', 1, 1),
	(28, 1, 1, '2014-07-22 15:00:00', 'JUAN PERAZ:', '2014-07-21', 1, 1),
	(29, 5, 1, '2014-08-20 15:00:00', 'SSS:', '2014-08-19', 1, 1);
/*!40000 ALTER TABLE `turnos` ENABLE KEYS */;

-- Volcando estructura para tabla consultorio.turnosv2
CREATE TABLE IF NOT EXISTS `turnosv2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `id_usu` int(11) NOT NULL,
  `fch_turno` datetime NOT NULL,
  `turno_desc` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `fch_alta` date NOT NULL,
  `id_usu_alta` int(11) NOT NULL,
  `usuarioid` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla consultorio.turnosv2: ~18 rows (aproximadamente)
/*!40000 ALTER TABLE `turnosv2` DISABLE KEYS */;
INSERT INTO `turnosv2` (`id`, `id_cliente`, `id_usu`, `fch_turno`, `turno_desc`, `fch_alta`, `id_usu_alta`, `usuarioid`) VALUES
	(6, NULL, 1, '2013-10-14 00:00:00', 'JUAN, JULIAN,:saddasdsd', '2013-10-14', 1, 1),
	(8, NULL, 1, '2013-10-14 16:30:00', 'JUAN, JULIAN,:saddasdsd', '2013-10-14', 1, 1),
	(9, NULL, 1, '2013-10-16 08:30:00', 'JUAN, CHOQUE:NADA', '2013-10-16', 1, 1),
	(10, NULL, 1, '2013-10-16 09:30:00', 'JUANA, CHOQUE:NADA', '2013-10-16', 1, 1),
	(11, NULL, 1, '2013-10-22 16:30:00', 'JUAN, PEREZ,:jsdjsd', '2013-10-21', 1, 1),
	(12, NULL, 1, '2013-10-23 16:30:00', 'JULIETA, FLORENCIA,:asdasd', '2013-10-21', 1, 1),
	(13, NULL, 1, '2013-10-23 17:00:00', 'AMANDA, MONSERRAT,:sdasdsd', '2013-10-21', 1, 1),
	(14, NULL, 1, '2013-11-08 15:00:00', 'JUAN, MARTINA,:sdadasd', '2013-11-08', 1, 1),
	(15, NULL, 1, '2013-11-08 17:30:00', 'AGUSTINA,:asdasd', '2013-11-08', 1, 1),
	(16, NULL, 1, '2013-11-09 17:30:00', 'MAGDALENA,:', '2013-11-08', 1, 1),
	(17, NULL, 1, '2013-11-12 15:00:00', 'JULIO,:', '2013-11-12', 1, 1),
	(18, NULL, 1, '2014-02-20 15:00:00', 'CCc:cccc', '2014-02-19', 1, 1),
	(19, NULL, 1, '2014-02-24 15:00:00', 'JUAN:', '2014-02-24', 1, 1),
	(20, NULL, 1, '2014-02-25 15:00:00', 'JUAN,:ddd', '2014-02-24', 1, 1),
	(21, NULL, 1, '2014-02-26 15:00:00', 'JUAREZ,:', '2014-02-24', 1, 1),
	(22, NULL, 1, '2014-02-27 15:00:00', 'REE:', '2014-02-24', 1, 1),
	(23, NULL, 1, '2014-02-28 15:00:00', 'MARTINA,:', '2014-02-24', 1, 1),
	(24, NULL, 1, '2014-02-27 15:00:00', 'ERER:', '2014-02-24', 1, 1);
/*!40000 ALTER TABLE `turnosv2` ENABLE KEYS */;

-- Volcando estructura para tabla consultorio.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `usuario` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL DEFAULT '123456',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(100) DEFAULT NULL,
  `tipo` int(11) NOT NULL DEFAULT '1',
  `fchalta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IMEI` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla consultorio.usuario: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`usuario`, `password`, `id`, `mail`, `tipo`, `fchalta`, `IMEI`) VALUES
	('prueba@p.com', '1234', 1, '', 1, '2014-10-04 23:35:46', ''),
	('root2', '123456', 2, '', 1, '2014-10-05 00:58:46', ''),
	('prueba@p.com', '123456', 3, 'prueba@p.com', 1, '2014-10-07 02:28:34', ''),
	('a@a.com', '123', 4, '12345', 1, '2014-10-21 01:14:13', ''),
	('dfe', '123', 7, '', 1, '2014-10-21 01:25:46', ''),
	('a@a.com', '123', 19, '', 1, '2014-10-25 02:27:00', ''),
	('juliusskull@gmail.com', 'skull01', 20, 'juliusskull@gmail.com', 1, '2014-12-06 15:23:37', ''),
	('anonimo', '', 21, '', 0, '2015-01-10 20:37:42', '0'),
	('admin', 'Aldebaran123', 22, '', 100, '2015-01-10 20:37:42', '0');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
