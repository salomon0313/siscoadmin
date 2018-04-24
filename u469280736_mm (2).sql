
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 24-04-2018 a las 21:53:26
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u469280736_mm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ape_p` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `ape_m` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `ape_p`, `ape_m`, `telefono`) VALUES
(2, 'Raymuando ', 'Zarate', 'Romero', '2831216994'),
(3, 'Jose', 'Salomon', 'Martinez', '2831219664'),
(4, 'Fancisco ', 'Reyes', 'Domingez', '2831219469');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesos`
--

CREATE TABLE IF NOT EXISTS `procesos` (
  `id_procesos` int(4) NOT NULL AUTO_INCREMENT,
  `id_sector` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `concepto` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `material` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `costo_total` double NOT NULL,
  PRIMARY KEY (`id_procesos`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `procesos`
--

INSERT INTO `procesos` (`id_procesos`, `id_sector`, `fecha`, `concepto`, `material`, `costo_total`) VALUES
(2, 3, '2017-06-14', 'Ralla Semanal', '', 8500),
(3, 3, '2017-06-02', 'Compra Material', '', 8000),
(5, 9, '2018-04-12', 'Compra Material', 'planta', 2000000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE IF NOT EXISTS `sector` (
  `id_sector` int(3) NOT NULL AUTO_INCREMENT,
  `nombreSector` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombreEncargado` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hectareas` double NOT NULL,
  `costH` double NOT NULL,
  `estado` int(2) NOT NULL,
  `costoT` double NOT NULL,
  `venta` double NOT NULL,
  PRIMARY KEY (`id_sector`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`id_sector`, `nombreSector`, `nombreEncargado`, `hectareas`, `costH`, `estado`, `costoT`, `venta`) VALUES
(3, 'los tigres ', 'jose hipolito ', 8.5, 0, 1, 16500, 0),
(4, 'los tigres ', ' jose', 5, 0, 1, 800000, 330950),
(5, 'Los mangos', 'mirna m', 8, 0, 1, 750000, 44800),
(6, 'los tigres (pruebas 2)', 'pedro', 16, 0, 1, 1650000, 440000),
(8, 'lizbeh', 'doreidy', 50, 15000, 1, 750000, 0),
(9, 'lizbeth aguilar', 'doreidy', 50, 15000, 1, 2750000, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_m` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `privilegio` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `apellido_m`, `numero`, `pass`, `privilegio`) VALUES
('jose', 'Jose', 'Salomon', 'martinez', '2831216994', 'ppp', 2),
('mmm', 'Mirna', 'M', 'M', '2831196300', 'mmm', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `id_ventas` int(3) NOT NULL AUTO_INCREMENT,
  `id_sector` int(4) NOT NULL,
  `nombreSector` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `encargadoSec` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `id_cliente` int(4) NOT NULL,
  `nombreCliente` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `cantidadProducto` double NOT NULL,
  `Costo` double NOT NULL,
  `costoT` double NOT NULL,
  `estado` int(4) NOT NULL,
  PRIMARY KEY (`id_ventas`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_ventas`, `id_sector`, `nombreSector`, `encargadoSec`, `fecha`, `id_cliente`, `nombreCliente`, `descripcion`, `cantidadProducto`, `Costo`, `costoT`, `estado`) VALUES
(1, 4, 'los tigres ', ' jose', '2017-06-14', 3, 'Jose', 'piÃ±a segunda', 8, 5500, 44000, 0),
(3, 4, 'los tigres ', ' jose', '2017-06-13', 3, 'Jose', 'piÃ±a segunda', 23, 5300, 121900, 0),
(4, 4, 'los tigres ', ' jose', '2017-06-14', 2, 'Raymuando ', 'piÃ±a primera', 7, 5500, 38500, 0),
(5, 4, 'los tigres ', ' jose', '2017-06-14', 3, 'Jose', 'piÃ±a primera', 25.31, 5000, 126550, 1),
(6, 5, 'Los mangos', 'mirna m', '2017-06-14', 3, 'Jose', 'piÃ±a segunda', 8, 5600, 44800, 1),
(7, 6, 'los tigres (pruebas 2)', 'pedro', '2017-06-14', 4, 'Fancisco ', 'piÃ±a primera', 80, 5000, 400000, 1),
(8, 6, 'los tigres (pruebas 2)', 'pedro', '2017-06-19', 3, 'Jose', 'piña primera', 8, 5000, 40000, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
