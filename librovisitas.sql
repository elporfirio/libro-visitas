-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-11-2012 a las 00:58:20
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `base_pruebas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `librovisitas`
--

CREATE TABLE IF NOT EXISTS `librovisitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `comentario` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `librovisitas`
--

INSERT INTO `librovisitas` (`id`, `nombre`, `comentario`, `fecha`) VALUES
(1, 'Porfirio', 'Este es un texto muy coqueto ñ_ñ', '2012-11-22'),
(2, 'Roberto', 'otro texto ingresado que se va a colocar solito jajaja\r\n\r\náéíóú', '2012-11-22'),
(3, 'Porfirin', 'Lorem Ipsum Dolor lominiaco', '2012-11-22'),
(4, 'Arturo Islas', 'Este es mi comentario', '2012-11-22'),
(5, 'Cecilio', 'Este es mi comentario', '2012-11-22'),
(7, 'Rogelio', 'Mujeriego', '2012-11-22'),
(8, 'Cerrito', 'Comentario del cerrito', '2012-11-22');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
