-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-04-2017 a las 17:44:28
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
  `logro` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `valor_logro` float NOT NULL,
  `ticket` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `apuestas`
--

INSERT INTO `apuestas` (`id`, `id_partido`, `logro`, `valor_logro`, `ticket`) VALUES
(70, 2, 'alta', -200, 'bQ5gqe0VB'),
(71, 1, 'runline1', -101, 'bQ5gqe0VB'),
(72, 8, 'runline1', -104, 'bQ5gqe0VB'),
(73, 3, 'runline1', 800, 'bQ5gqe0VB'),
(74, 8, 'runline2', -114, 'bQ5gqe0VB'),
(75, 1, 'gst1', 700, 'bQ5gqe0VB'),
(76, 2, 'g5to1', 700, 'bQ5gqe0VB');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competiciones`
--

CREATE TABLE IF NOT EXISTS `competiciones` (
`id_competicion` int(11) NOT NULL,
  `competicion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_deporte` int(11) NOT NULL,
  `ambito` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `inicio` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `fin` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `activa` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `competiciones`
--

INSERT INTO `competiciones` (`id_competicion`, `competicion`, `id_deporte`, `ambito`, `pais`, `inicio`, `fin`, `activa`) VALUES
(1, 'UEFA - LIGA DE CAMPEONES ', 1, 'INTERNACIONAL', '', '2016', '2017', 1),
(2, 'UEFA - EUROPA LEAGUE ', 1, 'INTERNACIONAL', '', '2016', '2017', 1),
(3, 'MLB', 2, 'NACIONAL', 'USA', '2016', '2017', 1),
(4, 'NBA', 3, 'NACIONAL', 'USA', '2016', '2017', 1),
(5, 'NHL', 4, 'NACIONAL', 'USA', '2016', '2017', 1),
(6, 'PELEA 2017', 6, 'INTERNACIONAL', '', '2017', '2017', 1),
(7, 'US OPEN', 5, 'INTERNACIONAL', '', '2017', '2017', 1),
(8, 'NFL', 7, '', '', '2016', '2017', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportes`
--

CREATE TABLE IF NOT EXISTS `deportes` (
`id` int(11) NOT NULL,
  `deporte` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `deportes`
--

INSERT INTO `deportes` (`id`, `deporte`) VALUES
(1, 'FUTBOL (SOCCER)'),
(2, 'BEISBOL'),
(3, 'BALONCESTO'),
(4, 'HOCKEY'),
(5, 'TENIS'),
(6, 'BOXEO'),
(7, 'FUTBOL AMERICANO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE IF NOT EXISTS `equipos` (
`id` int(11) NOT NULL,
  `equipo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_deporte` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `equipo`, `id_deporte`) VALUES
(1, 'REAL MADRID (ESP)', 1),
(2, 'BAYERN MUNICH (GER)', 1),
(3, 'YANKEES', 2),
(4, 'RED SOX', 2),
(5, 'CAVALIERS(CLE)', 3),
(6, 'LAKERS(LA)', 3),
(7, 'HK1', 4),
(8, 'HK2', 4),
(9, 'NADAL', 5),
(10, 'FEDERER', 5),
(13, 'CANELO ALVAREZ', 6),
(14, 'JULIO CHAVEZ JR', 6),
(15, 'PATRIOTS', 7),
(16, 'HALCONS', 7),
(17, 'BARCELONA', 1),
(18, 'JUVENTUS', 1);

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
  `premio` decimal(10,0) NOT NULL,
  `ganar` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `parlay`
--

INSERT INTO `parlay` (`id`, `codigo`, `monto`, `premio`, `ganar`) VALUES
(0, 'bQ5gqe0VB', 10, 63313, 0);

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
  `v_alta` float NOT NULL,
  `alta` float NOT NULL,
  `baja` float NOT NULL,
  `gpt1` float NOT NULL,
  `gpt2` float NOT NULL,
  `gst1` float NOT NULL,
  `gst2` float NOT NULL,
  `g5to1` float NOT NULL,
  `g5to2` float NOT NULL,
  `v_runline` float NOT NULL,
  `runline1` float NOT NULL,
  `runline2` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`id`, `id_competicion`, `equipo1`, `equipo2`, `fecha`, `hora`, `gj1`, `gj2`, `empate`, `v_alta`, `alta`, `baja`, `gpt1`, `gpt2`, `gst1`, `gst2`, `g5to1`, `g5to2`, `v_runline`, `runline1`, `runline2`) VALUES
(1, 1, 1, 2, '2017-04-12', '13:45:00', 318, -117, 286, 2.5, -146, 128, 500, 600, 700, 800, 900, 100, 1.5, -101, -117),
(2, 3, 3, 4, '2017-03-17', '12:00', 200, 100, 300, 7, -200, -500, 900, 800, 500, 600, 700, 400, 1.2, -100, 200),
(3, 4, 5, 6, '2017-04-06', '12:00', -200, 150, 0, 202, -150, 300, 0, 0, 0, 0, 0, 0, 45, 800, -900),
(4, 5, 7, 8, '2017-04-18', '3:00', -400, 500, 0, 30, 800, 700, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 7, 9, 10, '2017-04-16', '2:00', -500, 200, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 50, -100, 200),
(6, 6, 13, 14, '2017-04-07', '3:00', 300, -200, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 8, 15, 16, '2017-04-11', '5:00', -800, 500, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 1, 17, 18, '2017-04-19', '3:00', 187, 171, 214, 2.5, 104, -122, 167, 151, 127, 131, 0, 0, 0, -104, -114);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT de la tabla `competiciones`
--
ALTER TABLE `competiciones`
MODIFY `id_competicion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `deportes`
--
ALTER TABLE `deportes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `equipos_competicion`
--
ALTER TABLE `equipos_competicion`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

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
ADD CONSTRAINT `equipos_competicion_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id`),
ADD CONSTRAINT `equipos_competicion_ibfk_2` FOREIGN KEY (`id_competicion`) REFERENCES `competiciones` (`id_competicion`);

--
-- Filtros para la tabla `partidos`
--
ALTER TABLE `partidos`
ADD CONSTRAINT `partidos_ibfk_1` FOREIGN KEY (`equipo1`) REFERENCES `equipos` (`id`),
ADD CONSTRAINT `partidos_ibfk_2` FOREIGN KEY (`equipo2`) REFERENCES `equipos` (`id`),
ADD CONSTRAINT `partidos_ibfk_3` FOREIGN KEY (`id_competicion`) REFERENCES `competiciones` (`id_competicion`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
