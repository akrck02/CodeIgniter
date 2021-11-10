-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-10-2015 a las 22:52:33
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `biblio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE IF NOT EXISTS `autores` (
  `idautor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `fechanac` date NOT NULL,
  `nacionalidad` varchar(200) NOT NULL,
  PRIMARY KEY (`idautor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`idautor`, `nombre`, `fechanac`, `nacionalidad`) VALUES
(1, 'Charles Dickens', '1812-02-07', 'Reino Unido'),
(2, 'Miguel de Cervantes Saavedra', '1516-04-22', 'España'),
(3, 'Fiodor Dostoievsky', '1821-11-11', 'Rusia');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE IF NOT EXISTS `libros` (
  `idlibro` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) NOT NULL,
  `paginas` int(11) NOT NULL,
  `genero` varchar(40) NOT NULL,
  `idautor` int(11) NOT NULL,
  PRIMARY KEY (`idlibro`),
  KEY `idautor` (`idautor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`idlibro`, `titulo`, `paginas`, `genero`, `idautor`) VALUES
(3, 'Grandes esperanzas', 664, 'Drama', 1),
(4, 'David Copperfield', 716, 'Narrativa', 1),
(5, 'Cuento de Navidad', 112, 'Narrativa', 1),
(8, 'Don Quijote de La Mancha', 1250, 'Novela', 2),
(9, 'Novelas ejemplares', 530, 'Novela', 2),
(10, 'Viaje del Parnaso', 216, 'Poesia', 2),
(11, 'Noches blancas', 72, 'Novela', 3),
(12, 'Los hermanos Karamazov', 1120, 'Novela', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE IF NOT EXISTS `prestamos` (
  `idprestamo` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `idlibro` int(11) NOT NULL,
  PRIMARY KEY (`idprestamo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`idprestamo`, `fecha`, `idlibro`) VALUES
(24, '2015-10-28', 11),
(32, '2015-10-28', 11),
(35, '2015-10-28', 11),
(36, '2015-10-28', 12),
(40, '2015-10-28', 10),
(41, '2015-10-28', 10),
(42, '2015-10-28', 3),
(43, '2015-10-28', 3),
(45, '2015-10-28', 5),
(49, '2015-10-28', 5),
(50, '2015-10-28', 8),
(51, '2015-10-28', 9),
(52, '2015-10-28', 11),
(53, '2015-10-28', 9),
(54, '2015-10-28', 10),
(55, '2015-10-28', 10);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `fk_autor` FOREIGN KEY (`idautor`) REFERENCES `autores` (`idautor`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
