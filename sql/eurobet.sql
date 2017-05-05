-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-05-2017 a las 23:02:05
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
-- Estructura de tabla para la tabla `agencias`
--

CREATE TABLE IF NOT EXISTS `agencias` (
`id` int(11) NOT NULL,
  `agencia` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `agencias`
--

INSERT INTO `agencias` (`id`, `agencia`) VALUES
(1, 'matriz'),
(2, 'agencia01');

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
) ENGINE=InnoDB AUTO_INCREMENT=281 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `apuestas`
--

INSERT INTO `apuestas` (`id`, `id_partido`, `logro`, `valor_logro`, `ticket`) VALUES
(85, 1, 'gj1', 318, 'MppLnXnaW'),
(86, 2, 'g5to1', 700, 'MppLnXnaW'),
(87, 1, 'gj1', 318, '1-81-61-01'),
(88, 8, 'gj1', 187, '1-81-61-01'),
(89, 1, 'gj1', 318, '1-31-1-21-'),
(90, 8, 'gj1', 187, '1-31-1-21-'),
(91, 1, 'gj1', 318, '1-94179382'),
(92, 8, 'gj1', 187, '1-94179382'),
(93, 1, 'gj1', 318, '1-25925195'),
(94, 8, 'gj1', 187, '1-25925195'),
(95, 8, 'gj2', -500, '1-25925195'),
(96, 5, 'gj1', -500, '1-50239454'),
(97, 8, 'gj2', 171, '1-50239454'),
(98, 2, 'gj2', 100, '1-50239454'),
(99, 6, 'gj2', -200, '1-50239454'),
(100, 2, 'baja', -500, '1-50239454'),
(101, 3, 'runline1', 800, '1-50239454'),
(102, 1, 'gpt1', 500, '1-50239454'),
(103, 8, 'runline2', -114, '1-48865315'),
(104, 1, 'gpt2', 600, '1-48865315'),
(105, 2, 'g5to1', 700, '1-48865315'),
(106, 3, 'baja', 300, '1-9535566'),
(107, 3, 'runline1', 800, '1-9535566'),
(108, 8, 'gpt1', 167, '1-9535566'),
(109, 1, 'gst2', 800, '1-9535566'),
(110, 2, 'g5to2', 400, '1-9535566'),
(111, 4, 'gj1', -400, '1-347158'),
(112, 5, 'gj1', -500, '1-347158'),
(113, 4, 'gj1', -400, '1-05165014'),
(114, 5, 'gj1', -500, '1-05165014'),
(115, 4, 'gj1', -400, '1-30759633'),
(116, 5, 'gj1', -500, '1-30759633'),
(117, 4, 'gj1', -400, '1-67707982'),
(118, 5, 'gj1', -500, '1-67707982'),
(119, 4, 'gj1', -400, '1-379465'),
(120, 5, 'gj1', -500, '1-379465'),
(121, 4, 'gj1', -400, '1-2614044'),
(122, 5, 'gj1', -500, '1-2614044'),
(123, 4, 'gj1', -400, '1-3759165'),
(124, 7, 'gj2', 500, '1-3759165'),
(125, 4, 'gj1', -400, '1-82616566'),
(126, 7, 'gj2', 500, '1-82616566'),
(127, 4, 'gj1', -400, '1-8984465'),
(128, 7, 'gj2', 500, '1-8984465'),
(129, 4, 'gj1', -400, '1-83482991'),
(130, 7, 'gj2', 500, '1-83482991'),
(131, 4, 'gj1', -400, '1-68240713'),
(132, 7, 'gj2', 500, '1-68240713'),
(133, 4, 'gj1', -400, '1-7976370'),
(134, 7, 'gj2', 500, '1-7976370'),
(135, 4, 'gj1', -400, '1-8829510'),
(136, 7, 'gj2', 500, '1-8829510'),
(137, 4, 'gj1', -400, '1-655944'),
(138, 7, 'gj2', 500, '1-655944'),
(139, 4, 'gj1', -400, '1-7572684'),
(140, 7, 'gj2', 500, '1-7572684'),
(141, 4, 'gj1', -400, '1-9485670'),
(142, 7, 'gj2', 500, '1-9485670'),
(143, 4, 'gj1', -400, '1-2092788'),
(144, 7, 'gj2', 500, '1-2092788'),
(145, 4, 'gj1', -400, '1-2989776'),
(146, 7, 'gj2', 500, '1-2989776'),
(147, 4, 'gj1', -400, '1-45712500'),
(148, 7, 'gj2', 500, '1-45712500'),
(149, 4, 'gj1', -400, '1-1498074'),
(150, 7, 'gj2', 500, '1-1498074'),
(151, 4, 'gj1', -400, '1-20958417'),
(152, 7, 'gj2', 500, '1-20958417'),
(153, 4, 'gj1', -400, '1-558145'),
(154, 7, 'gj2', 500, '1-558145'),
(155, 4, 'gj1', -400, '1-97481073'),
(156, 7, 'gj2', 500, '1-97481073'),
(157, 4, 'gj1', -400, '1-8303763'),
(158, 7, 'gj2', 500, '1-8303763'),
(159, 4, 'gj1', -400, '1-51921'),
(160, 7, 'gj2', 500, '1-51921'),
(161, 4, 'gj1', -400, '1-136350'),
(162, 7, 'gj2', 500, '1-136350'),
(163, 4, 'gj1', -400, '1-4253770'),
(164, 7, 'gj2', 500, '1-4253770'),
(165, 4, 'gj1', -400, '33329166'),
(166, 7, 'gj2', 500, '33329166'),
(167, 4, 'gj1', -400, '2906587'),
(168, 7, 'gj2', 500, '2906587'),
(169, 4, 'gj1', -400, '492301'),
(170, 7, 'gj2', 500, '492301'),
(171, 4, 'gj1', -400, '1-7870830'),
(172, 7, 'gj2', 500, '1-7870830'),
(173, 5, 'gj1', -500, '1-146383'),
(174, 7, 'gj2', 500, '1-146383'),
(175, 4, 'gj1', -400, '1-12645937'),
(176, 5, 'gj1', -500, '1-12645937'),
(177, 7, 'gj2', 500, '1-12645937'),
(178, 4, 'baja', 700, '1-12645937'),
(179, 4, 'gj1', -400, '1-224292'),
(180, 4, 'baja', 700, '1-224292'),
(181, 4, 'gj1', -400, '1-14355500'),
(182, 4, 'baja', 700, '1-14355500'),
(183, 4, 'gj2', 500, '2-68456991'),
(184, 4, 'baja', 700, '2-68456991'),
(185, 4, 'gj1', -400, '2-6012250'),
(186, 4, 'baja', 700, '2-6012250'),
(187, 10, 'gj1', 188, '2-638402'),
(188, 7, 'gj2', 500, '2-638402'),
(189, 10, 'gj1', 188, '2-4860054'),
(190, 4, 'gj1', -400, '2-4860054'),
(191, 4, 'gj1', -400, '2-958432'),
(192, 4, 'baja', 700, '2-958432'),
(193, 4, 'gj1', -400, '2-51994676'),
(194, 4, 'baja', 700, '2-51994676'),
(195, 4, 'gj2', 500, '2-01066221'),
(196, 9, 'gpt1', 167, '2-01066221'),
(197, 9, 'gj1', 187, '2-2748320'),
(198, 9, 'baja', -122, '2-2748320'),
(199, 9, 'empate', 214, '2-2168612'),
(200, 4, 'gj1', -400, '2-08739369'),
(201, 4, 'baja', 700, '2-08739369'),
(202, 9, 'gj1', 187, '2-92501306'),
(203, 9, 'baja', -122, '2-92501306'),
(204, 1, 'gj1', 318, '2-61409370'),
(205, 9, 'gj1', 187, '2-61409370'),
(206, 1, 'gj1', 318, '2-50711804'),
(207, 9, 'empate', 214, '2-50711804'),
(208, 1, 'gj1', 318, '2-18203345'),
(209, 9, 'baja', -122, '2-18203345'),
(210, 1, 'gj2', -117, '2-44017711'),
(211, 9, 'baja', -122, '2-44017711'),
(212, 1, 'empatept', 787, '2-26998949'),
(213, 1, 'gst1', 85, '2-26998949'),
(214, 1, 'empatept', 787, '2-647748'),
(215, 1, 'gst2', 86, '2-647748'),
(216, 1, 'empatept', 787, '2-97801619'),
(217, 1, 'gj1', 318, '2-6838993'),
(218, 9, 'baja', -122, '2-6838993'),
(219, 1, 'gj1', 318, '2-1392457'),
(220, 9, 'baja', -122, '2-1392457'),
(221, 9, 'gj1', 187, '2-917397'),
(222, 9, 'alta', 104, '2-917397'),
(223, 9, 'gj1', 187, '2-96901825'),
(224, 9, 'baja', -122, '2-96901825'),
(225, 9, 'gj1', 187, '2-35770989'),
(226, 9, 'baja', -122, '2-35770989'),
(227, 9, 'gj1', 187, '2-02673948'),
(228, 9, 'baja', -122, '2-02673948'),
(229, 9, 'gj1', 187, '2-8272390'),
(230, 9, 'baja', -122, '2-8272390'),
(231, 9, 'gj1', 187, '2-332388'),
(232, 9, 'baja', -122, '2-332388'),
(233, 9, 'gj1', 187, '2-5170866'),
(234, 9, 'gj1', 187, '2-23742999'),
(235, 9, 'baja', -122, '2-23742999'),
(236, 9, 'empate', 214, '2-60292854'),
(237, 9, 'alta', 104, '2-60292854'),
(238, 9, 'gj1', 187, '2-8681115'),
(239, 9, 'gj1', 187, '2-11723102'),
(240, 9, 'baja', -122, '2-11723102'),
(241, 9, 'alta', 104, '2-5339384'),
(242, 9, 'runline1', -104, '2-5339384'),
(243, 9, 'baja', -122, '2-578215'),
(244, 9, 'runline2', -114, '2-578215'),
(245, 9, 'gj1', 187, '2-144335'),
(246, 9, 'baja', -122, '2-144335'),
(247, 9, 'gj1', 187, '2-35114'),
(248, 9, 'baja', -122, '2-35114'),
(249, 9, 'gj1', 187, '2-96720'),
(250, 9, 'baja', -122, '2-96720'),
(251, 9, 'gj2', 171, '2-59326414'),
(252, 9, 'alta', 104, '2-59326414'),
(253, 9, 'gj1', 187, '2-77070091'),
(254, 9, 'baja', -122, '2-77070091'),
(255, 9, 'gj1', 187, '2-1520442'),
(256, 9, 'baja', -122, '2-1520442'),
(257, 9, 'gj1', 187, '2-70431558'),
(258, 9, 'baja', -122, '2-70431558'),
(259, 9, 'gj1', 187, '2-826468'),
(260, 9, 'baja', -122, '2-826468'),
(261, 9, 'gj1', 187, '2-43620482'),
(262, 9, 'baja', -122, '2-43620482'),
(263, 9, 'gj1', 187, '2-1977929'),
(264, 9, 'gj1', 187, '2-919930'),
(265, 9, 'gj1', 187, '2-35943716'),
(266, 9, 'gj1', 187, '2-2441467'),
(267, 9, 'gj1', 187, '1-9465840'),
(268, 9, 'baja', -122, '1-9465840'),
(269, 9, 'gj1', 187, '1-79168982'),
(270, 9, 'baja', -122, '1-79168982'),
(271, 9, 'gj1', 187, '1-8015352'),
(272, 9, 'baja', -122, '1-8015352'),
(273, 9, 'gj1', 187, '2-360733'),
(274, 9, 'empate', 214, '2-067822'),
(275, 9, 'gj1', 187, '2-83399731'),
(276, 9, 'baja', -122, '2-83399731'),
(277, 9, 'gj2', 171, '2-30262564'),
(278, 9, 'gj1', 187, '1-75378646'),
(279, 9, 'baja', -122, '1-75378646'),
(280, 9, 'gj1', 187, '2-5824360');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(18, 'JUVENTUS', 1),
(19, 'tal1', 1),
(20, 'tal2', 2),
(22, 'atálanta', 1);

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
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE IF NOT EXISTS `paises` (
`id` int(11) NOT NULL,
  `pais` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `pais`) VALUES
(1, 'COLOMBIA'),
(2, 'VENEZUELA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parlay`
--

CREATE TABLE IF NOT EXISTS `parlay` (
`id` int(11) NOT NULL,
  `codigo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `agencia` int(11) NOT NULL,
  `cedula` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `monto` decimal(10,0) NOT NULL,
  `premio` decimal(10,0) NOT NULL,
  `ganar` int(1) NOT NULL,
  `pagado` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `push` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `parlay`
--

INSERT INTO `parlay` (`id`, `codigo`, `agencia`, `cedula`, `tipo`, `fecha`, `hora`, `monto`, `premio`, `ganar`, `pagado`, `push`, `activo`) VALUES
(40, '1-7870830', 2, '', 'parlay', '2017-04-10', '15:06:46', 500000, 3750000, 1, '', '', 1),
(41, '1-146383', 2, '', 'parlay', '2017-04-10', '15:17:37', 500000, 3600000, 0, '', '', 1),
(42, '1-12645937', 2, '', 'parlay', '2017-04-10', '23:25:54', 600000, 10000000, 3, '', '', 1),
(44, '1-14355500', 1, '', 'parlay', '2017-04-10', '23:43:14', 1000000, 10000000, 3, '0', '', 1),
(45, '2-68456991', 2, '', 'parlay', '2017-04-11', '00:07:30', 500100, 10000000, 0, '0', '', 1),
(46, '2-6012250', 2, '', 'parlay', '2017-04-11', '00:25:31', 500000, 5000000, 0, '', '', 1),
(47, '2-638402', 2, '', 'parlay', '2017-04-11', '01:26:15', 500000, 8640000, 0, '', '', 1),
(48, '2-4860054', 2, '', 'parlay', '2017-04-11', '17:56:00', 500000, 1800000, 0, '', '', 1),
(49, '2-958432', 2, '', 'parlay', '2017-04-13', '20:54:10', 5000, 50000, 1, '', '', 1),
(50, '2-51994676', 2, '', 'parlay', '2017-04-13', '22:24:04', 500000, 5000000, 3, '0', '', 1),
(51, '2-01066221', 2, '', 'parlay', '2017-04-13', '23:06:26', 500000, 8010000, 1, '0', '', 1),
(52, '2-2748320', 2, '', 'parlay', '2017-04-13', '23:22:05', 50000, 261123, 1, '1', '', 1),
(53, '2-2168612', 2, '', 'directa', '2017-04-14', '18:33:16', 5000, 15700, 0, '0', '', 1),
(54, '2-08739369', 2, '', 'parlay', '2017-04-14', '22:37:07', 50000, 500000, 0, '', '', 1),
(55, '2-92501306', 2, '', 'parlay', '2017-04-18', '21:47:01', 5000, 26112, 0, '', '', 1),
(56, '2-61409370', 2, '', 'parlay', '2017-04-18', '22:19:34', 5000, 59983, 0, '', '', 1),
(57, '2-50711804', 2, '', 'parlay', '2017-04-19', '22:14:03', 5000, 65626, 1, '', '', 1),
(58, '2-18203345', 2, '', 'parlay', '2017-04-19', '22:20:46', 5000, 38031, 0, '', '', 1),
(59, '2-44017711', 2, '', 'parlay', '2017-04-19', '22:22:11', 5000, 16875, 0, '', '', 1),
(60, '2-26998949', 2, '', 'parlay', '2017-04-19', '23:54:33', 500, 8205, 0, '', '', 1),
(61, '2-647748', 2, '', 'parlay', '2017-04-19', '23:56:49', 7000, 115487, 0, '', '', 1),
(62, '2-97801619', 2, '', 'directa', '2017-04-20', '00:02:57', 500000, 4435000, 1, '', '', 1),
(63, '2-1392457', 2, '', 'parlay', '2017-04-21', '23:10:29', 500000, 3803115, 1, '1', '', 1),
(64, '2-917397', 2, '', 'parlay', '2017-04-23', '21:17:25', 50000, 3000, 3, '0', '', 1),
(65, '2-96901825', 2, '', 'parlay', '2017-04-23', '23:19:25', 5200, 27157, 3, '0', '', 1),
(66, '2-35770989', 2, '', 'parlay', '2017-04-23', '23:36:36', 50000, 261123, 3, '0', '', 1),
(67, '2-02673948', 2, '', 'parlay', '2017-04-23', '23:37:44', 5000, 26112, 3, '0', '', 1),
(68, '2-8272390', 2, '', 'parlay', '2017-04-23', '23:45:03', 5000, 26112, 3, '0', '', 1),
(69, '2-332388', 2, '', 'parlay', '2017-04-24', '23:25:09', 500, 2611, 3, '0', '', 1),
(70, '2-5170866', 2, '', 'directa', '2017-04-24', '23:28:25', 5000000, 14350000, 1, '0', '', 1),
(71, '2-23742999', 2, '', 'parlay', '2017-04-25', '00:05:05', 5000, 26112, 3, '0', '', 1),
(72, '2-60292854', 2, '', 'parlay', '2017-04-25', '00:22:55', 0, 0, 3, '0', '', 1),
(73, '2-8681115', 2, '', 'directa', '2017-04-25', '01:35:00', 5000, 14350, 3, '0', '', 1),
(74, '2-11723102', 2, '', 'parlay', '2017-04-25', '01:41:17', 40000, 208898, 3, '0', '', 1),
(75, '2-5339384', 2, '', 'parlay', '2017-04-27', '23:31:23', 500, 2001, 3, '0', '', 1),
(76, '2-578215', 2, '', 'parlay', '2017-04-27', '23:32:31', 5000, 17079, 3, '0', '', 1),
(77, '2-144335', 2, '', 'parlay', '2017-04-30', '21:37:18', 6000, 31335, 3, '0', '', 1),
(78, '2-35114', 2, '', 'parlay', '2017-04-30', '21:38:54', 6000, 31335, 3, '0', '', 1),
(79, '2-96720', 2, '', 'parlay', '2017-04-30', '21:42:31', 5000, 26112, 3, '0', '', 1),
(80, '2-59326414', 2, '', 'parlay', '2017-04-30', '21:51:34', 10000, 55284, 3, '0', '', 1),
(81, '2-77070091', 2, '', 'parlay', '2017-04-30', '21:56:49', 10001, 52230, 3, '0', '', 1),
(82, '2-1520442', 2, '', 'parlay', '2017-04-30', '22:04:19', 9000, 47002, 3, '0', '', 1),
(83, '2-70431558', 2, '', 'parlay', '2017-04-30', '23:08:03', 500, 2611, 3, '0', '', 1),
(84, '2-826468', 2, '', 'parlay', '2017-04-30', '22:12:23', 5000, 26112, 3, '0', '', 1),
(85, '2-43620482', 2, '', 'parlay', '2017-04-30', '23:14:14', 500, 2611, 3, '0', '', 1),
(86, '2-1977929', 2, '', 'directa', '2017-04-30', '23:27:32', 5000, 14350, 3, '0', '', 1),
(87, '2-919930', 2, '', 'directa', '2017-04-30', '23:28:31', 9501, 27268, 3, '0', '', 1),
(88, '2-35943716', 2, '', 'directa', '2017-04-30', '23:30:29', 9500, 27265, 3, '0', '', 1),
(89, '2-2441467', 2, '', 'directa', '2017-04-30', '22:33:35', 5000, 14350, 3, '0', '', 1),
(90, '1-9465840', 1, '44444', 'parlay', '2017-05-03', '21:47:04', 5000, 26112, 1, '0', '', 1),
(91, '1-79168982', 1, '44444', 'parlay', '2017-05-03', '23:38:49', 5000, 26112, 1, '0', '', 1),
(92, '1-8015352', 1, '', 'parlay', '2017-05-03', '23:51:36', 5000, 26112, 1, '0', '', 1),
(93, '2-360733', 2, '', 'directa', '2017-05-04', '00:10:15', 5000, 14350, 3, '0', '', 0),
(94, '2-067822', 2, '44444', 'directa', '2017-05-04', '00:46:31', 10000, 31400, 1, '0', '', 1),
(95, '2-83399731', 2, '44444', 'parlay', '2017-05-04', '00:52:41', 6000, 31335, 1, '0', '', 1),
(96, '2-30262564', 2, '44444', 'directa', '2017-05-04', '01:15:01', 10000, 27100, 1, '0', '', 1),
(97, '1-75378646', 1, '', 'parlay', '2017-05-04', '01:16:25', 5000, 26112, 1, '0', '', 1),
(98, '2-5824360', 2, '44444', 'directa', '2017-05-04', '01:21:58', 7000, 20090, 1, '0', '', 1);

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
  `hora` time NOT NULL,
  `fecha_v` date NOT NULL,
  `hora_v` time NOT NULL,
  `gj1` float NOT NULL,
  `gj2` float NOT NULL,
  `empate` float NOT NULL,
  `v_alta` float NOT NULL,
  `alta` float NOT NULL,
  `baja` float NOT NULL,
  `gpt1` float NOT NULL,
  `gpt2` float NOT NULL,
  `empatept` float NOT NULL,
  `gst1` float NOT NULL,
  `gst2` float NOT NULL,
  `g5to1` float NOT NULL,
  `g5to2` float NOT NULL,
  `v_runline1` float NOT NULL,
  `v_runline2` float NOT NULL,
  `runline1` float NOT NULL,
  `runline2` float NOT NULL,
  `inicio` int(1) NOT NULL,
  `inicio_v` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`id`, `id_competicion`, `equipo1`, `equipo2`, `fecha`, `hora`, `fecha_v`, `hora_v`, `gj1`, `gj2`, `empate`, `v_alta`, `alta`, `baja`, `gpt1`, `gpt2`, `empatept`, `gst1`, `gst2`, `g5to1`, `g5to2`, `v_runline1`, `v_runline2`, `runline1`, `runline2`, `inicio`, `inicio_v`) VALUES
(1, 1, 1, 2, '2017-04-23', '12:00:00', '0000-00-00', '00:00:00', 318, -117, 286, 2.5, -146, 128, 500, 600, 787, 85, 86, 900, 100, 1.5, -0.5, -101, -117, 1, 0),
(2, 3, 3, 4, '2017-05-05', '12:00:00', '0000-00-00', '00:00:00', 200, 100, 300, 7, -200, -500, 900, 800, 0, 0, 0, 700, 400, 1.2, 0, -100, 200, 0, 0),
(3, 4, 5, 6, '2017-04-25', '12:00:00', '0000-00-00', '00:00:00', -200, 150, 0, 202, -150, 300, 0, 0, 0, 0, 0, 0, 0, 45, 0, 800, -900, 0, 0),
(4, 5, 7, 8, '2017-06-18', '03:00:00', '0000-00-00', '00:00:00', -400, 500, 0, 30, 800, 700, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 7, 9, 10, '2017-04-30', '02:00:00', '0000-00-00', '00:00:00', -500, 200, 1, 2, 3, 4, 5, 6, 0, 0, 0, 9, 10, 50, 0, -100, 200, 1, 0),
(6, 6, 13, 14, '2017-04-20', '03:00:00', '0000-00-00', '00:00:00', 300, -200, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 8, 15, 16, '2017-04-18', '05:00:00', '0000-00-00', '00:00:00', -800, 500, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(9, 1, 17, 18, '2017-05-09', '03:40:00', '2017-05-09', '04:40:00', 187, 171, 214, 2.5, 104, -122, 167, 151, 0, 0, 0, 0, 0, 0, 0, -104, -114, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trans_usuario`
--

CREATE TABLE IF NOT EXISTS `trans_usuario` (
`id` int(11) NOT NULL,
  `agencia` int(11) NOT NULL,
  `cedula` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `tipo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `monto` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `trans_usuario`
--

INSERT INTO `trans_usuario` (`id`, `agencia`, `cedula`, `fecha`, `tipo`, `monto`) VALUES
(7, 1, '44444', '2017-05-04', 'recarga', 10000),
(8, 1, '44444', '2017-05-04', 'pago', 10000),
(9, 1, '44444', '2017-05-04', 'recarga', 5000),
(10, 1, '44444', '2017-05-04', 'pago', 1000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL,
  `pais` int(11) NOT NULL,
  `agencia` int(11) NOT NULL,
  `cedula` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `saldo` int(11) NOT NULL,
  `tipo` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `pais`, `agencia`, `cedula`, `nombre`, `apellido`, `correo`, `clave`, `direccion`, `telefono`, `saldo`, `tipo`) VALUES
(8, 1, 1, '32134', 'dsadas', 'dadas', 'ale.ran92@gmail.com', 'c33367701511b4f6020ec61ded352059', 'dasdas', '323232', 0, 'root'),
(9, 1, 1, '55555', 'barny', 'gomez', 'ba@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'colombia', '4564', 5000, 'admin'),
(19, 1, 2, '44444', 'bad', 'bunny', 'bad@bunny.com', 'e10adc3949ba59abbe56e057f20f883e', 'PR', '123456', 23090, 'normal');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agencias`
--
ALTER TABLE `agencias`
 ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `parlay`
--
ALTER TABLE `parlay`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `codigo` (`codigo`), ADD KEY `codigo_2` (`codigo`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
 ADD PRIMARY KEY (`id`), ADD KEY `equipo1` (`equipo1`,`equipo2`,`id_competicion`), ADD KEY `equipo2` (`equipo2`), ADD KEY `id_competicion` (`id_competicion`);

--
-- Indices de la tabla `trans_usuario`
--
ALTER TABLE `trans_usuario`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `cedula` (`cedula`), ADD UNIQUE KEY `correo` (`correo`), ADD KEY `agencia` (`agencia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agencias`
--
ALTER TABLE `agencias`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `apuestas`
--
ALTER TABLE `apuestas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=281;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `equipos_competicion`
--
ALTER TABLE `equipos_competicion`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `parlay`
--
ALTER TABLE `parlay`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `trans_usuario`
--
ALTER TABLE `trans_usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
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
