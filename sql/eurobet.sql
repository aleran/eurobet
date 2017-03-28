-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-03-2017 a las 00:52:56
-- Versión del servidor: 5.5.54-0+deb8u1
-- Versión de PHP: 5.6.29-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `eurobet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apuestas`
--

CREATE TABLE IF NOT EXISTS `apuestas` (
`id` int(11) NOT NULL,
  `id_partido` int(11) NOT NULL,
  `ticket` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `a_gj1` int(1) NOT NULL,
  `a_gj2` int(1) NOT NULL,
  `a_empate` int(1) NOT NULL,
  `a_alta` int(1) NOT NULL,
  `a_baja` int(1) NOT NULL,
  `a_gpt1` int(1) NOT NULL,
  `a_gpt2` int(1) NOT NULL,
  `a_gst1` int(1) NOT NULL,
  `a_gst2` int(1) NOT NULL,
  `a_g5to1` int(1) NOT NULL,
  `a_g5to2` int(1) NOT NULL,
  `a_runline` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competiciones`
--

CREATE TABLE IF NOT EXISTS `competiciones` (
`id_competicion` int(11) NOT NULL,
  `competicion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_deporte` int(11) NOT NULL,
  `ambito` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `inicio` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `fin` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `activa` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `competiciones`
--

INSERT INTO `competiciones` (`id_competicion`, `competicion`, `id_deporte`, `ambito`, `pais`, `inicio`, `fin`, `activa`) VALUES
(1, 'UEFA - LIGA DE CAMPEONES ', 1, 'INTERNACIONAL', '', '2016', '2017', 1),
(2, 'UEFA - EUROPA LEAGUE ', 1, 'INTERNACIONAL', '', '2016', '2017', 1),
(3, 'MLB', 2, 'NACIONAL', 'USA', '2016', '2017', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportes`
--

CREATE TABLE IF NOT EXISTS `deportes` (
`id` int(11) NOT NULL,
  `deporte` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `deportes`
--

INSERT INTO `deportes` (`id`, `deporte`) VALUES
(1, 'FUTBOL (SOCCER)'),
(2, 'BEISBOL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE IF NOT EXISTS `equipos` (
`id` int(11) NOT NULL,
  `equipo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_deporte` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `equipo`, `id_deporte`) VALUES
(1, 'REAL MADRID (ESP)', 1),
(2, 'BAYERN MUNICH (GER)', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos_competicion`
--

CREATE TABLE IF NOT EXISTS `equipos_competicion` (
`id` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `id_competicion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parlay`
--

CREATE TABLE IF NOT EXISTS `parlay` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `monto` decimal(10,0) NOT NULL,
  `ganar` int(1) NOT NULL,
  `premio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE IF NOT EXISTS `partidos` (
`id` int(11) NOT NULL,
  `id_competicion` int(11) NOT NULL,
  `equipo1` int(11) NOT NULL,
  `equipo2` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `gj1` float NOT NULL,
  `gj2` float NOT NULL,
  `empate` float NOT NULL,
  `alta` float NOT NULL,
  `baja` float NOT NULL,
  `gpt1` float NOT NULL,
  `gpt2` float NOT NULL,
  `gst1` float NOT NULL,
  `gst2` float NOT NULL,
  `g5to` float NOT NULL,
  `runline` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`id`, `id_competicion`, `equipo1`, `equipo2`, `fecha`, `hora`, `gj1`, `gj2`, `empate`, `alta`, `baja`, `gpt1`, `gpt2`, `gst1`, `gst2`, `g5to`, `runline`) VALUES
(1, 1, 1, 2, '2017-04-12', '13:45:00', 319, -114, 277, 3, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL,
  `cedula` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `cedula`, `nombre`, `apellido`, `correo`, `clave`, `direccion`, `telefono`, `tipo`) VALUES
(5, '21182164', 'alejandro', 'rangel', 'ale.ran92@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'venezuela', '04247242018', 'suscriptor'),
(6, '123456', 'al', 'ran', 'ale.ran92@gmail.comdsd', 'e10adc3949ba59abbe56e057f20f883e', 'da', '123456', 'suscriptor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apuestas`
--
ALTER TABLE `apuestas`
 ADD PRIMARY KEY (`id`), ADD KEY `ticket` (`ticket`);

--
-- Indices de la tabla `competiciones`
--
ALTER TABLE `competiciones`
 ADD PRIMARY KEY (`id_competicion`), ADD KEY `id_deporte` (`id_deporte`);

--
-- Indices de la tabla `deportes`
--
ALTER TABLE `deportes`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
 ADD PRIMARY KEY (`id`), ADD KEY `id_deporte` (`id_deporte`);

--
-- Indices de la tabla `equipos_competicion`
--
ALTER TABLE `equipos_competicion`
 ADD PRIMARY KEY (`id`), ADD KEY `id_equipo` (`id_equipo`), ADD KEY `id_competicion` (`id_competicion`);

--
-- Indices de la tabla `parlay`
--
ALTER TABLE `parlay`
 ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
 ADD PRIMARY KEY (`id`), ADD KEY `equipo1` (`equipo1`,`equipo2`,`id_competicion`), ADD KEY `equipo2` (`equipo2`), ADD KEY `id_competicion` (`id_competicion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `cedula` (`cedula`), ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apuestas`
--
ALTER TABLE `apuestas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `competiciones`
--
ALTER TABLE `competiciones`
MODIFY `id_competicion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `deportes`
--
ALTER TABLE `deportes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `equipos_competicion`
--
ALTER TABLE `equipos_competicion`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `apuestas`
--
ALTER TABLE `apuestas`
ADD CONSTRAINT `apuestas_ibfk_2` FOREIGN KEY (`ticket`) REFERENCES `parlay` (`codigo`);

--
-- Filtros para la tabla `competiciones`
--
ALTER TABLE `competiciones`
ADD CONSTRAINT `competiciones_ibfk_1` FOREIGN KEY (`id_deporte`) REFERENCES `deportes` (`id`);

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`id_deporte`) REFERENCES `deportes` (`id`);

--
-- Filtros para la tabla `equipos_competicion`
--
ALTER TABLE `equipos_competicion`
ADD CONSTRAINT `equipos_competicion_ibfk_2` FOREIGN KEY (`id_competicion`) REFERENCES `competiciones` (`id_competicion`),
ADD CONSTRAINT `equipos_competicion_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id`);

--
-- Filtros para la tabla `partidos`
--
ALTER TABLE `partidos`
ADD CONSTRAINT `partidos_ibfk_3` FOREIGN KEY (`id_competicion`) REFERENCES `competiciones` (`id_competicion`),
ADD CONSTRAINT `partidos_ibfk_1` FOREIGN KEY (`equipo1`) REFERENCES `equipos` (`id`),
ADD CONSTRAINT `partidos_ibfk_2` FOREIGN KEY (`equipo2`) REFERENCES `equipos` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
