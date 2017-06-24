-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 24, 2017 at 01:22 PM
-- Server version: 5.5.54-0+deb8u1
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eurobet`
--

-- --------------------------------------------------------

--
-- Table structure for table `agencias`
--

CREATE TABLE IF NOT EXISTS `agencias` (
`id` int(11) NOT NULL,
  `agencia` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `agencias`
--

INSERT INTO `agencias` (`id`, `agencia`) VALUES
(1, 'matriz'),
(2, 'agencia01');

-- --------------------------------------------------------

--
-- Table structure for table `apuestas`
--

CREATE TABLE IF NOT EXISTS `apuestas` (
`id` int(11) NOT NULL,
  `id_partido` int(11) NOT NULL,
  `logro` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `val_alta` float NOT NULL,
  `valor_logro` float NOT NULL,
  `ticket` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=381 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `apuestas`
--

INSERT INTO `apuestas` (`id`, `id_partido`, `logro`, `val_alta`, `valor_logro`, `ticket`) VALUES
(85, 1, 'gj1', 0, 318, 'MppLnXnaW'),
(86, 2, 'g5to1', 0, 700, 'MppLnXnaW'),
(87, 1, 'gj1', 0, 318, '1-81-61-01'),
(88, 8, 'gj1', 0, 187, '1-81-61-01'),
(89, 1, 'gj1', 0, 318, '1-31-1-21-'),
(90, 8, 'gj1', 0, 187, '1-31-1-21-'),
(91, 1, 'gj1', 0, 318, '1-94179382'),
(92, 8, 'gj1', 0, 187, '1-94179382'),
(93, 1, 'gj1', 0, 318, '1-25925195'),
(94, 8, 'gj1', 0, 187, '1-25925195'),
(95, 8, 'gj2', 0, -500, '1-25925195'),
(96, 5, 'gj1', 0, -500, '1-50239454'),
(97, 8, 'gj2', 0, 171, '1-50239454'),
(98, 2, 'gj2', 0, 100, '1-50239454'),
(99, 6, 'gj2', 0, -200, '1-50239454'),
(100, 2, 'baja', 0, -500, '1-50239454'),
(101, 3, 'runline1', 0, 800, '1-50239454'),
(102, 1, 'gpt1', 0, 500, '1-50239454'),
(103, 8, 'runline2', 0, -114, '1-48865315'),
(104, 1, 'gpt2', 0, 600, '1-48865315'),
(105, 2, 'g5to1', 0, 700, '1-48865315'),
(106, 3, 'baja', 0, 300, '1-9535566'),
(107, 3, 'runline1', 0, 800, '1-9535566'),
(108, 8, 'gpt1', 0, 167, '1-9535566'),
(109, 1, 'gst2', 0, 800, '1-9535566'),
(110, 2, 'g5to2', 0, 400, '1-9535566'),
(111, 4, 'gj1', 0, -400, '1-347158'),
(112, 5, 'gj1', 0, -500, '1-347158'),
(113, 4, 'gj1', 0, -400, '1-05165014'),
(114, 5, 'gj1', 0, -500, '1-05165014'),
(115, 4, 'gj1', 0, -400, '1-30759633'),
(116, 5, 'gj1', 0, -500, '1-30759633'),
(117, 4, 'gj1', 0, -400, '1-67707982'),
(118, 5, 'gj1', 0, -500, '1-67707982'),
(119, 4, 'gj1', 0, -400, '1-379465'),
(120, 5, 'gj1', 0, -500, '1-379465'),
(121, 4, 'gj1', 0, -400, '1-2614044'),
(122, 5, 'gj1', 0, -500, '1-2614044'),
(123, 4, 'gj1', 0, -400, '1-3759165'),
(124, 7, 'gj2', 0, 500, '1-3759165'),
(125, 4, 'gj1', 0, -400, '1-82616566'),
(126, 7, 'gj2', 0, 500, '1-82616566'),
(127, 4, 'gj1', 0, -400, '1-8984465'),
(128, 7, 'gj2', 0, 500, '1-8984465'),
(129, 4, 'gj1', 0, -400, '1-83482991'),
(130, 7, 'gj2', 0, 500, '1-83482991'),
(131, 4, 'gj1', 0, -400, '1-68240713'),
(132, 7, 'gj2', 0, 500, '1-68240713'),
(133, 4, 'gj1', 0, -400, '1-7976370'),
(134, 7, 'gj2', 0, 500, '1-7976370'),
(135, 4, 'gj1', 0, -400, '1-8829510'),
(136, 7, 'gj2', 0, 500, '1-8829510'),
(137, 4, 'gj1', 0, -400, '1-655944'),
(138, 7, 'gj2', 0, 500, '1-655944'),
(139, 4, 'gj1', 0, -400, '1-7572684'),
(140, 7, 'gj2', 0, 500, '1-7572684'),
(141, 4, 'gj1', 0, -400, '1-9485670'),
(142, 7, 'gj2', 0, 500, '1-9485670'),
(143, 4, 'gj1', 0, -400, '1-2092788'),
(144, 7, 'gj2', 0, 500, '1-2092788'),
(145, 4, 'gj1', 0, -400, '1-2989776'),
(146, 7, 'gj2', 0, 500, '1-2989776'),
(147, 4, 'gj1', 0, -400, '1-45712500'),
(148, 7, 'gj2', 0, 500, '1-45712500'),
(149, 4, 'gj1', 0, -400, '1-1498074'),
(150, 7, 'gj2', 0, 500, '1-1498074'),
(151, 4, 'gj1', 0, -400, '1-20958417'),
(152, 7, 'gj2', 0, 500, '1-20958417'),
(153, 4, 'gj1', 0, -400, '1-558145'),
(154, 7, 'gj2', 0, 500, '1-558145'),
(155, 4, 'gj1', 0, -400, '1-97481073'),
(156, 7, 'gj2', 0, 500, '1-97481073'),
(157, 4, 'gj1', 0, -400, '1-8303763'),
(158, 7, 'gj2', 0, 500, '1-8303763'),
(159, 4, 'gj1', 0, -400, '1-51921'),
(160, 7, 'gj2', 0, 500, '1-51921'),
(161, 4, 'gj1', 0, -400, '1-136350'),
(162, 7, 'gj2', 0, 500, '1-136350'),
(163, 4, 'gj1', 0, -400, '1-4253770'),
(164, 7, 'gj2', 0, 500, '1-4253770'),
(165, 4, 'gj1', 0, -400, '33329166'),
(166, 7, 'gj2', 0, 500, '33329166'),
(167, 4, 'gj1', 0, -400, '2906587'),
(168, 7, 'gj2', 0, 500, '2906587'),
(169, 4, 'gj1', 0, -400, '492301'),
(170, 7, 'gj2', 0, 500, '492301'),
(171, 4, 'gj1', 0, -400, '1-7870830'),
(172, 7, 'gj2', 0, 500, '1-7870830'),
(173, 5, 'gj1', 0, -500, '1-146383'),
(174, 7, 'gj2', 0, 500, '1-146383'),
(175, 4, 'gj1', 0, -400, '1-12645937'),
(176, 5, 'gj1', 0, -500, '1-12645937'),
(177, 7, 'gj2', 0, 500, '1-12645937'),
(178, 4, 'baja', 0, 700, '1-12645937'),
(179, 4, 'gj1', 0, -400, '1-224292'),
(180, 4, 'baja', 0, 700, '1-224292'),
(181, 4, 'gj1', 0, -400, '1-14355500'),
(182, 4, 'baja', 0, 700, '1-14355500'),
(183, 4, 'gj2', 0, 500, '2-68456991'),
(184, 4, 'baja', 0, 700, '2-68456991'),
(185, 4, 'gj1', 0, -400, '2-6012250'),
(186, 4, 'baja', 0, 700, '2-6012250'),
(187, 10, 'gj1', 0, 188, '2-638402'),
(188, 7, 'gj2', 0, 500, '2-638402'),
(189, 10, 'gj1', 0, 188, '2-4860054'),
(190, 4, 'gj1', 0, -400, '2-4860054'),
(191, 4, 'gj1', 0, -400, '2-958432'),
(192, 4, 'baja', 0, 700, '2-958432'),
(193, 4, 'gj1', 0, -400, '2-51994676'),
(194, 4, 'baja', 0, 700, '2-51994676'),
(195, 4, 'gj2', 0, 500, '2-01066221'),
(196, 9, 'gpt1', 0, 167, '2-01066221'),
(197, 9, 'gj1', 0, 187, '2-2748320'),
(198, 9, 'baja', 0, -122, '2-2748320'),
(199, 9, 'empate', 0, 214, '2-2168612'),
(200, 4, 'gj1', 0, -400, '2-08739369'),
(201, 4, 'baja', 0, 700, '2-08739369'),
(202, 9, 'gj1', 0, 187, '2-92501306'),
(203, 9, 'baja', 0, -122, '2-92501306'),
(204, 1, 'gj1', 0, 318, '2-61409370'),
(205, 9, 'gj1', 0, 187, '2-61409370'),
(206, 1, 'gj1', 0, 318, '2-50711804'),
(207, 9, 'empate', 0, 214, '2-50711804'),
(208, 1, 'gj1', 0, 318, '2-18203345'),
(209, 9, 'baja', 0, -122, '2-18203345'),
(210, 1, 'gj2', 0, -117, '2-44017711'),
(211, 9, 'baja', 0, -122, '2-44017711'),
(212, 1, 'empatept', 0, 787, '2-26998949'),
(213, 1, 'gst1', 0, 85, '2-26998949'),
(214, 1, 'empatept', 0, 787, '2-647748'),
(215, 1, 'gst2', 0, 86, '2-647748'),
(216, 1, 'empatept', 0, 787, '2-97801619'),
(217, 1, 'gj1', 0, 318, '2-6838993'),
(218, 9, 'baja', 0, -122, '2-6838993'),
(219, 1, 'gj1', 0, 318, '2-1392457'),
(220, 9, 'baja', 0, -122, '2-1392457'),
(221, 9, 'gj1', 0, 187, '2-917397'),
(222, 9, 'alta', 0, 104, '2-917397'),
(223, 9, 'gj1', 0, 187, '2-96901825'),
(224, 9, 'baja', 0, -122, '2-96901825'),
(225, 9, 'gj1', 0, 187, '2-35770989'),
(226, 9, 'baja', 0, -122, '2-35770989'),
(227, 9, 'gj1', 0, 187, '2-02673948'),
(228, 9, 'baja', 0, -122, '2-02673948'),
(229, 9, 'gj1', 0, 187, '2-8272390'),
(230, 9, 'baja', 0, -122, '2-8272390'),
(231, 9, 'gj1', 0, 187, '2-332388'),
(232, 9, 'baja', 0, -122, '2-332388'),
(233, 9, 'gj1', 0, 187, '2-5170866'),
(234, 9, 'gj1', 0, 187, '2-23742999'),
(235, 9, 'baja', 0, -122, '2-23742999'),
(236, 9, 'empate', 0, 214, '2-60292854'),
(237, 9, 'alta', 0, 104, '2-60292854'),
(238, 9, 'gj1', 0, 187, '2-8681115'),
(239, 9, 'gj1', 0, 187, '2-11723102'),
(240, 9, 'baja', 0, -122, '2-11723102'),
(241, 9, 'alta', 0, 104, '2-5339384'),
(242, 9, 'runline1', 0, -104, '2-5339384'),
(243, 9, 'baja', 0, -122, '2-578215'),
(244, 9, 'runline2', 0, -114, '2-578215'),
(245, 9, 'gj1', 0, 187, '2-144335'),
(246, 9, 'baja', 0, -122, '2-144335'),
(247, 9, 'gj1', 0, 187, '2-35114'),
(248, 9, 'baja', 0, -122, '2-35114'),
(249, 9, 'gj1', 0, 187, '2-96720'),
(250, 9, 'baja', 0, -122, '2-96720'),
(251, 9, 'gj2', 0, 171, '2-59326414'),
(252, 9, 'alta', 0, 104, '2-59326414'),
(253, 9, 'gj1', 0, 187, '2-77070091'),
(254, 9, 'baja', 0, -122, '2-77070091'),
(255, 9, 'gj1', 0, 187, '2-1520442'),
(256, 9, 'baja', 0, -122, '2-1520442'),
(257, 9, 'gj1', 0, 187, '2-70431558'),
(258, 9, 'baja', 0, -122, '2-70431558'),
(259, 9, 'gj1', 0, 187, '2-826468'),
(260, 9, 'baja', 0, -122, '2-826468'),
(261, 9, 'gj1', 0, 187, '2-43620482'),
(262, 9, 'baja', 0, -122, '2-43620482'),
(263, 9, 'gj1', 0, 187, '2-1977929'),
(264, 9, 'gj1', 0, 187, '2-919930'),
(265, 9, 'gj1', 0, 187, '2-35943716'),
(266, 9, 'gj1', 0, 187, '2-2441467'),
(267, 9, 'gj1', 0, 187, '1-9465840'),
(268, 9, 'baja', 0, -122, '1-9465840'),
(269, 9, 'gj1', 0, 187, '1-79168982'),
(270, 9, 'baja', 0, -122, '1-79168982'),
(271, 9, 'gj1', 0, 187, '1-8015352'),
(272, 9, 'baja', 0, -122, '1-8015352'),
(273, 9, 'gj1', 0, 187, '2-360733'),
(274, 9, 'empate', 0, 214, '2-067822'),
(275, 9, 'gj1', 0, 187, '2-83399731'),
(276, 9, 'baja', 0, -122, '2-83399731'),
(277, 9, 'gj2', 0, 171, '2-30262564'),
(278, 9, 'gj1', 0, 187, '1-75378646'),
(279, 9, 'baja', 0, -122, '1-75378646'),
(280, 9, 'gj1', 0, 187, '2-5824360'),
(281, 9, 'gj1', 0, 187, '1-11948'),
(282, 9, 'baja', 0, -122, '1-11948'),
(283, 9, 'gj1', 0, 187, '1-64177296'),
(284, 9, 'baja', 0, -122, '1-64177296'),
(285, 9, 'gj1', 0, 187, '1-78714727'),
(286, 9, 'baja', 0, -122, '1-78714727'),
(287, 9, 'gj1', 0, 187, '1-56457019'),
(288, 4, 'gj1', 0, -400, '1-56457019'),
(289, 9, 'baja', 0, -122, '1-56457019'),
(290, 4, 'gj2', 0, 500, '1-0407323'),
(291, 9, 'alta', 0, 104, '1-0407323'),
(292, 9, 'gj1', 0, 187, '1-4100584'),
(293, 4, 'gj2', 0, 500, '1-4100584'),
(294, 9, 'gj1', 0, 187, '1-9398982'),
(295, 4, 'gj1', 0, -400, '1-9398982'),
(296, 9, 'baja', 0, -122, '1-9398982'),
(297, 9, 'gj1', 0, 187, '1-00438293'),
(298, 4, 'gj1', 0, -400, '1-00438293'),
(299, 9, 'baja', 0, -122, '1-00438293'),
(300, 9, 'gj1', 0, 187, '1-0931293'),
(301, 4, 'gj1', 0, -400, '1-0931293'),
(302, 9, 'baja', 0, -122, '1-0931293'),
(303, 9, 'gj1', 0, 187, '1-7533567'),
(304, 4, 'gj2', 0, 500, '1-7533567'),
(305, 9, 'baja', 0, -122, '1-7533567'),
(306, 9, 'gj1', 0, 187, '1-12339322'),
(307, 4, 'gj2', 0, 500, '1-12339322'),
(308, 9, 'baja', 0, -122, '1-12339322'),
(309, 9, 'gj1', 0, 187, '1-744842'),
(310, 9, 'gj1', 0, 187, '1-1415056'),
(311, 9, 'baja', 0, -122, '1-1183177'),
(312, 9, 'gj1', 0, 187, '1-2727887'),
(313, 9, 'baja', 0, -122, '1-2727887'),
(314, 4, 'gj1', 0, -400, '1-14886246'),
(315, 4, 'baja', 0, 700, '1-14886246'),
(316, 4, 'gj1', 0, -400, '1-7168588'),
(317, 4, 'baja', 0, 700, '1-7168588'),
(318, 4, 'gj1', 0, -400, '1-06443206'),
(319, 4, 'baja', 0, 700, '1-06443206'),
(320, 4, 'gj1', 0, -400, '1-745580'),
(321, 4, 'baja', 0, 700, '1-745580'),
(322, 4, 'gj1', 0, -400, '1-7140413'),
(323, 4, 'baja', 0, 700, '1-7140413'),
(324, 4, 'gj1', 0, -400, '1-468103'),
(325, 4, 'baja', 0, 700, '1-468103'),
(326, 4, 'gj1', 0, -400, '1-6561715'),
(327, 4, 'baja', 0, 700, '1-6561715'),
(328, 4, 'gj1', 0, -400, '1-3982783'),
(329, 4, 'baja', 0, 700, '1-3982783'),
(330, 4, 'gj1', 0, -400, '1-6896529'),
(331, 4, 'baja', 0, 700, '1-6896529'),
(332, 4, 'gj1', 0, -400, '1-9281214'),
(333, 4, 'baja', 0, 700, '1-9281214'),
(334, 4, 'gj1', 0, -400, '1-6700038'),
(335, 4, 'baja', 0, 700, '1-6700038'),
(336, 4, 'gj1', 0, -400, '1-6597899'),
(337, 4, 'baja', 0, 700, '1-6597899'),
(338, 4, 'gj1', 0, -400, '1-98233757'),
(339, 4, 'baja', 0, 700, '1-98233757'),
(340, 4, 'gj1', 0, -400, '1-10153932'),
(341, 4, 'baja', 0, 700, '1-10153932'),
(342, 4, 'gj1', 0, -400, '1-96859886'),
(343, 4, 'baja', 0, 700, '1-96859886'),
(344, 4, 'gj1', 0, -400, '1-57094351'),
(345, 4, 'baja', 0, 700, '1-57094351'),
(346, 4, 'gj1', 0, -400, '1-10722253'),
(347, 4, 'baja', 0, 700, '1-10722253'),
(348, 4, 'gj1', 0, -400, '1-93341'),
(349, 4, 'baja', 0, 700, '1-93341'),
(350, 4, 'gj1', 0, -400, '1-5582050'),
(351, 4, 'baja', 0, 700, '1-5582050'),
(352, 4, 'gj1', 0, -400, '1-22933047'),
(353, 4, 'baja', 0, 700, '1-22933047'),
(354, 1, 'gj1', 0, 318, '2-03911367'),
(355, 1, 'baja', 0, 128, '2-03911367'),
(356, 1, 'gj1', 0, 318, '1-35868077'),
(357, 1, 'baja', 0, 128, '1-35868077'),
(358, 1, 'gg', 0, 100, '1-35868077'),
(359, 1, 'ng', 0, -200, '1-35868077'),
(360, 1, 'dc1x', 0, 300, '1-35868077'),
(361, 1, 'dc2x', 0, -300, '1-35868077'),
(362, 1, 'dc12', 0, 400, '1-35868077'),
(363, 1, 'gj1', 0, 318, '2-29886555'),
(364, 1, 'baja', 0, 128, '2-29886555'),
(365, 1, 'baja', 0, 128, '1-01958475'),
(366, 1, 'runline1', 0, -101, '1-01958475'),
(367, 1, 'gj2', 0, -117, '2-8435071'),
(368, 1, 'baja', 0, 128, '2-8435071'),
(369, 1, 'alta', 2.5, -146, '1-17745747'),
(370, 1, 'gj1', 0, 318, '1-62624575'),
(371, 1, 'gj1', 0, 318, '1-428089'),
(372, 1, 'baja', 0, 128, '1-428089'),
(373, 1, 'baja', 2.5, 128, '1-93754809'),
(374, 1, 'runline1', 0, -101, '1-93754809'),
(375, 1, 'empate', 0, 286, '1-36673590'),
(376, 1, 'alta', 3.5, -146, '1-36673590'),
(377, 1, 'gj1', 0, 318, '1-54166'),
(378, 1, 'baja', 3.5, 128, '1-54166'),
(379, 1, 'empate', 0, 286, '1-7929366'),
(380, 1, 'alta', 5.5, -146, '1-7929366');

-- --------------------------------------------------------

--
-- Table structure for table `competiciones`
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
-- Dumping data for table `competiciones`
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
-- Table structure for table `deportes`
--

CREATE TABLE IF NOT EXISTS `deportes` (
`id` int(11) NOT NULL,
  `deporte` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `deportes`
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
-- Table structure for table `equipos`
--

CREATE TABLE IF NOT EXISTS `equipos` (
`id` int(11) NOT NULL,
  `equipo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_deporte` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `equipos`
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
-- Table structure for table `equipos_competicion`
--

CREATE TABLE IF NOT EXISTS `equipos_competicion` (
`id` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `id_competicion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paises`
--

CREATE TABLE IF NOT EXISTS `paises` (
`id` int(11) NOT NULL,
  `pais` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paises`
--

INSERT INTO `paises` (`id`, `pais`) VALUES
(1, 'COLOMBIA'),
(2, 'VENEZUELA'),
(3, 'MEXICO');

-- --------------------------------------------------------

--
-- Table structure for table `parlay`
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
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `parlay`
--

INSERT INTO `parlay` (`id`, `codigo`, `agencia`, `cedula`, `tipo`, `fecha`, `hora`, `monto`, `premio`, `ganar`, `pagado`, `push`, `activo`) VALUES
(41, '1-146383', 2, '', 'parlay', '2017-04-10', '15:17:37', 500000, 3600000, 0, '', '', 1),
(42, '1-12645937', 2, '', 'parlay', '2017-04-10', '23:25:54', 600000, 10000000, 3, '', '', 1),
(44, '1-14355500', 1, '', 'parlay', '2017-04-10', '23:43:14', 1000000, 10000000, 3, '0', '', 1),
(45, '2-68456991', 2, '', 'parlay', '2017-04-11', '00:07:30', 500100, 10000000, 0, '0', '', 1),
(46, '2-6012250', 2, '', 'parlay', '2017-04-11', '00:25:31', 500000, 5000000, 0, '', '', 1),
(47, '2-638402', 2, '', 'parlay', '2017-04-11', '01:26:15', 500000, 8640000, 0, '', '', 1),
(48, '2-4860054', 2, '', 'parlay', '2017-04-11', '17:56:00', 500000, 1800000, 0, '', '', 1),
(50, '2-51994676', 2, '', 'parlay', '2017-04-13', '22:24:04', 500000, 5000000, 3, '0', '', 1),
(53, '2-2168612', 2, '', 'directa', '2017-04-14', '18:33:16', 5000, 15700, 0, '0', '', 1),
(54, '2-08739369', 2, '', 'parlay', '2017-04-14', '22:37:07', 50000, 500000, 0, '', '', 1),
(55, '2-92501306', 2, '', 'parlay', '2017-04-18', '21:47:01', 5000, 26112, 0, '', '', 1),
(56, '2-61409370', 2, '', 'parlay', '2017-04-18', '22:19:34', 5000, 59983, 0, '', '', 1),
(58, '2-18203345', 2, '', 'parlay', '2017-04-19', '22:20:46', 5000, 38031, 0, '', '', 1),
(59, '2-44017711', 2, '', 'parlay', '2017-04-19', '22:22:11', 5000, 16875, 0, '', '', 1),
(60, '2-26998949', 2, '', 'parlay', '2017-04-19', '23:54:33', 500, 8205, 0, '', '', 1),
(61, '2-647748', 2, '', 'parlay', '2017-04-19', '23:56:49', 7000, 115487, 0, '', '', 1),
(64, '2-917397', 2, '', 'parlay', '2017-04-23', '21:17:25', 50000, 3000, 3, '0', '', 1),
(65, '2-96901825', 2, '', 'parlay', '2017-04-23', '23:19:25', 5200, 27157, 3, '0', '', 1),
(66, '2-35770989', 2, '', 'parlay', '2017-04-23', '23:36:36', 50000, 261123, 3, '0', '', 1),
(67, '2-02673948', 2, '', 'parlay', '2017-04-23', '23:37:44', 5000, 26112, 3, '0', '', 1),
(68, '2-8272390', 2, '', 'parlay', '2017-04-23', '23:45:03', 5000, 26112, 3, '0', '', 1),
(69, '2-332388', 2, '', 'parlay', '2017-04-24', '23:25:09', 500, 2611, 3, '0', '', 1),
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
(93, '2-360733', 2, '', 'directa', '2017-05-04', '00:10:15', 5000, 14350, 3, '0', '', 0),
(99, '1-11948', 1, '', 'parlay', '2017-05-07', '22:37:23', 10000, 52225, 3, '0', '', 1),
(100, '1-64177296', 1, '', 'parlay', '2017-05-07', '22:45:16', 10000, 52225, 3, '0', '', 1),
(101, '1-78714727', 1, '', 'parlay', '2017-05-07', '22:48:14', 10000, 52225, 3, '0', '', 1),
(102, '1-56457019', 1, '', 'parlay', '2017-05-07', '22:54:42', 10000, 65281, 3, '0', '', 1),
(103, '1-0407323', 1, '', 'parlay', '2017-05-07', '22:55:50', 10000, 122400, 3, '0', '', 1),
(104, '1-4100584', 1, '', 'parlay', '2017-05-07', '22:56:22', 10000, 172200, 3, '0', '', 1),
(105, '1-9398982', 1, '', 'parlay', '2017-05-07', '23:00:32', 10000, 65281, 3, '0', '', 1),
(106, '1-00438293', 1, '', 'parlay', '2017-05-07', '23:02:04', 10000, 65281, 3, '0', '', 1),
(107, '1-0931293', 1, '', 'parlay', '2017-05-07', '23:08:23', 100000, 652807, 3, '0', '', 1),
(108, '1-7533567', 1, '', 'parlay', '2017-05-07', '23:13:22', 10000, 313348, 3, '0', '', 1),
(109, '1-12339322', 1, '', 'parlay', '2017-05-07', '23:15:11', 10000, 313348, 3, '0', '', 1),
(110, '1-744842', 1, '', 'directa', '2017-05-07', '23:16:21', 100000, 287000, 3, '0', '', 1),
(111, '1-1415056', 1, '', 'directa', '2017-05-07', '23:18:20', 1000000, 2870000, 3, '0', '', 1),
(112, '1-1183177', 1, '', 'directa', '2017-05-07', '23:18:39', 10000, 18197, 3, '0', '', 1),
(113, '1-3711801', 1, '', 'parlay', '2017-05-07', '23:23:03', 100000, 0, 3, '0', '', 1),
(114, '1-2727887', 1, '', 'parlay', '2017-05-07', '23:30:30', 10000, 52225, 3, '0', '', 1),
(115, '1-14886246', 1, '', 'parlay', '2017-05-11', '14:44:32', 10000, 100000, 3, '0', '', 1),
(116, '1-7168588', 1, '', 'parlay', '2017-05-11', '14:55:47', 10000, 100000, 3, '0', '', 1),
(117, '1-06443206', 1, '', 'parlay', '2017-05-11', '14:57:51', 10000, 100000, 3, '0', '', 1),
(118, '1-745580', 1, '', 'parlay', '2017-05-11', '15:18:32', 10000, 100000, 3, '0', '', 1),
(119, '1-7140413', 1, '', 'parlay', '2017-05-11', '15:21:59', 100000, 1000000, 3, '0', '', 1),
(120, '1-468103', 1, '', 'parlay', '2017-05-11', '15:22:10', 100000, 1000000, 3, '0', '', 1),
(121, '1-6561715', 1, '', 'parlay', '2017-05-11', '15:22:26', 100000, 1000000, 3, '0', '', 1),
(122, '1-3982783', 1, '', 'parlay', '2017-05-11', '15:22:37', 100000, 1000000, 3, '0', '', 1),
(123, '1-6896529', 1, '', 'parlay', '2017-05-11', '15:22:57', 100000, 1000000, 3, '0', '', 1),
(124, '1-9281214', 1, '', 'parlay', '2017-05-11', '15:26:02', 100000, 1000000, 3, '0', '', 1),
(125, '1-6700038', 1, '', 'parlay', '2017-05-11', '15:26:56', 100000, 1000000, 3, '0', '', 1),
(126, '1-6597899', 1, '', 'parlay', '2017-05-11', '15:27:09', 10000, 100000, 3, '0', '', 1),
(127, '1-98233757', 1, '', 'parlay', '2017-05-11', '15:29:47', 100000, 1000000, 3, '0', '', 1),
(128, '1-10153932', 1, '', 'parlay', '2017-05-11', '15:30:31', 100000, 1000000, 3, '0', '', 1),
(129, '1-96859886', 1, '', 'parlay', '2017-05-11', '15:38:53', 10000, 100000, 3, '0', '', 1),
(130, '1-57094351', 1, '', 'parlay', '2017-05-11', '15:39:27', 10000, 100000, 3, '0', '', 1),
(131, '1-10722253', 1, '', 'parlay', '2017-05-11', '15:40:37', 10000, 100000, 3, '0', '', 1),
(132, '1-93341', 1, '', 'parlay', '2017-05-11', '15:40:51', 10000, 100000, 3, '0', '', 1),
(134, '1-22933047', 1, '', 'parlay', '2017-05-11', '15:51:25', 10000, 100000, 0, '0', '', 1),
(135, '2-03911367', 2, '44444', 'parlay', '2017-05-20', '23:53:00', 60000, 571824, 3, '0', '', 1),
(136, '1-35868077', 1, '', 'parlay', '2017-06-17', '16:17:50', 5000, 3812160, 3, '0', '', 1),
(137, '2-29886555', 2, '44444', 'parlay', '2017-06-17', '17:55:01', 5000, 47652, 1, '0', '', 1),
(138, '1-01958475', 1, '', 'parlay', '2017-06-17', '18:01:43', 6000, 27225, 3, '0', '', 1),
(139, '2-8435071', 2, '44444', 'parlay', '2017-06-17', '18:04:04', 7000, 29601, 1, '0', '', 1),
(140, '1-17745747', 1, '', 'directa', '2017-06-24', '10:39:32', 10000, 16849, 3, '0', '', 1),
(141, '1-62624575', 1, '', 'directa', '2017-06-24', '10:43:40', 10000, 41800, 3, '0', '', 1),
(142, '1-428089', 1, '', 'parlay', '2017-06-24', '10:50:13', 10000, 95304, 3, '0', '', 1),
(143, '1-93754809', 1, '', 'parlay', '2017-06-24', '10:51:46', 50000, 226871, 3, '0', '', 1),
(144, '1-36673590', 1, '', 'parlay', '2017-06-24', '10:53:11', 5000, 32519, 3, '0', '', 1),
(145, '1-54166', 1, '', 'parlay', '2017-06-24', '10:53:34', 50000, 476520, 3, '0', '', 1),
(146, '1-7929366', 1, '', 'parlay', '2017-06-24', '10:55:09', 5000, 32519, 3, '0', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `partidos`
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
  `gg` float NOT NULL,
  `ng` float NOT NULL,
  `dc1x` float NOT NULL,
  `dc2x` float NOT NULL,
  `dc12` float NOT NULL,
  `v_runline1` float NOT NULL,
  `v_runline2` float NOT NULL,
  `runline1` float NOT NULL,
  `runline2` float NOT NULL,
  `inicio` int(1) NOT NULL,
  `inicio_v` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `partidos`
--

INSERT INTO `partidos` (`id`, `id_competicion`, `equipo1`, `equipo2`, `fecha`, `hora`, `fecha_v`, `hora_v`, `gj1`, `gj2`, `empate`, `v_alta`, `alta`, `baja`, `gpt1`, `gpt2`, `empatept`, `gst1`, `gst2`, `g5to1`, `g5to2`, `gg`, `ng`, `dc1x`, `dc2x`, `dc12`, `v_runline1`, `v_runline2`, `runline1`, `runline2`, `inicio`, `inicio_v`) VALUES
(1, 1, 1, 2, '2017-06-30', '12:00:00', '2017-06-30', '00:00:00', 318, -117, 286, 5.5, -146, 128, 500, 600, 787, 85, 86, 900, 100, 100, -200, 300, -300, 400, 1.5, -0.5, -101, -117, 0, 0),
(2, 3, 3, 4, '2017-05-05', '12:00:00', '0000-00-00', '00:00:00', 200, 100, 300, 7, -200, -500, 900, 800, 0, 0, 0, 700, 400, 0, 0, 0, 0, 0, 1.2, 0, -100, 200, 0, 0),
(3, 4, 5, 6, '2017-04-25', '12:00:00', '0000-00-00', '00:00:00', -200, 150, 0, 202, -150, 300, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 45, 0, 800, -900, 0, 0),
(4, 5, 7, 8, '2017-06-18', '03:00:00', '0000-00-00', '00:00:00', -400, 500, 0, 30, 800, 700, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 7, 9, 10, '2017-04-30', '02:00:00', '0000-00-00', '00:00:00', -500, 200, 1, 2, 3, 4, 5, 6, 0, 0, 0, 9, 10, 0, 0, 0, 0, 0, 50, 0, -100, 200, 1, 0),
(6, 6, 13, 14, '2017-04-20', '03:00:00', '0000-00-00', '00:00:00', 300, -200, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 8, 15, 16, '2017-04-18', '05:00:00', '0000-00-00', '00:00:00', -800, 500, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(9, 1, 17, 18, '2017-05-09', '03:40:00', '2017-05-09', '04:40:00', 187, 171, 214, 2.5, 104, -122, 167, 151, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -104, -114, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trans_usuario`
--

CREATE TABLE IF NOT EXISTS `trans_usuario` (
`id` int(11) NOT NULL,
  `agencia` int(11) NOT NULL,
  `cedula` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `tipo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `monto` int(11) NOT NULL,
  `agente` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trans_usuario`
--

INSERT INTO `trans_usuario` (`id`, `agencia`, `cedula`, `fecha`, `hora`, `tipo`, `monto`, `agente`) VALUES
(7, 1, '44444', '2017-05-04', '00:00:00', 'recarga', 10000, ''),
(8, 1, '44444', '2017-05-04', '00:00:00', 'pago', 10000, ''),
(9, 1, '44444', '2017-05-04', '00:00:00', 'recarga', 5000, ''),
(10, 1, '44444', '2017-05-04', '00:00:00', 'pago', 1000, ''),
(11, 1, '44444', '2017-05-05', '00:00:00', 'recarga', 2000, ''),
(12, 1, '44444', '2017-05-05', '00:00:00', 'pago', 2000, ''),
(13, 2, '44444', '2017-05-05', '00:00:00', 'recarga', 3000, ''),
(14, 2, '44444', '2017-05-05', '00:00:00', 'pago', 3000, ''),
(15, 1, '44444', '2017-05-24', '18:44:53', 'recarga', 1000, '32134'),
(16, 1, '44444', '2017-05-24', '18:45:24', 'pago', 1000, '32134'),
(17, 1, '44444', '2017-05-24', '19:30:13', 'recarga', 20000, '32134');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `pais`, `agencia`, `cedula`, `nombre`, `apellido`, `correo`, `clave`, `direccion`, `telefono`, `saldo`, `tipo`) VALUES
(8, 1, 1, '32134', 'alejandro', 'rangel', 'ale.ran92@gmail.com', 'c33367701511b4f6020ec61ded352059', 'dasdas', '323232', 0, 'root'),
(9, 1, 2, '55555', 'barny', 'gomez', 'ba@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'colombia', '4564', 5000, 'admin'),
(19, 3, 2, '44444', 'bad', 'bunny', 'bad@bunny.com', 'e10adc3949ba59abbe56e057f20f883e', 'PR', '123456', 95253, 'normal'),
(20, 0, 0, 's', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', 0, 'normal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencias`
--
ALTER TABLE `agencias`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apuestas`
--
ALTER TABLE `apuestas`
 ADD PRIMARY KEY (`id`), ADD KEY `ticket` (`ticket`);

--
-- Indexes for table `competiciones`
--
ALTER TABLE `competiciones`
 ADD PRIMARY KEY (`id_competicion`), ADD KEY `id_deporte` (`id_deporte`);

--
-- Indexes for table `deportes`
--
ALTER TABLE `deportes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipos`
--
ALTER TABLE `equipos`
 ADD PRIMARY KEY (`id`), ADD KEY `id_deporte` (`id_deporte`);

--
-- Indexes for table `equipos_competicion`
--
ALTER TABLE `equipos_competicion`
 ADD PRIMARY KEY (`id`), ADD KEY `id_equipo` (`id_equipo`), ADD KEY `id_competicion` (`id_competicion`);

--
-- Indexes for table `paises`
--
ALTER TABLE `paises`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parlay`
--
ALTER TABLE `parlay`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `codigo` (`codigo`), ADD KEY `codigo_2` (`codigo`);

--
-- Indexes for table `partidos`
--
ALTER TABLE `partidos`
 ADD PRIMARY KEY (`id`), ADD KEY `equipo1` (`equipo1`,`equipo2`,`id_competicion`), ADD KEY `equipo2` (`equipo2`), ADD KEY `id_competicion` (`id_competicion`);

--
-- Indexes for table `trans_usuario`
--
ALTER TABLE `trans_usuario`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `cedula` (`cedula`), ADD UNIQUE KEY `correo` (`correo`), ADD KEY `agencia` (`agencia`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencias`
--
ALTER TABLE `agencias`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `apuestas`
--
ALTER TABLE `apuestas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=381;
--
-- AUTO_INCREMENT for table `competiciones`
--
ALTER TABLE `competiciones`
MODIFY `id_competicion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `deportes`
--
ALTER TABLE `deportes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `equipos`
--
ALTER TABLE `equipos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `equipos_competicion`
--
ALTER TABLE `equipos_competicion`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paises`
--
ALTER TABLE `paises`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `parlay`
--
ALTER TABLE `parlay`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=147;
--
-- AUTO_INCREMENT for table `partidos`
--
ALTER TABLE `partidos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `trans_usuario`
--
ALTER TABLE `trans_usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `competiciones`
--
ALTER TABLE `competiciones`
ADD CONSTRAINT `competiciones_ibfk_1` FOREIGN KEY (`id_deporte`) REFERENCES `deportes` (`id`);

--
-- Constraints for table `equipos`
--
ALTER TABLE `equipos`
ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`id_deporte`) REFERENCES `deportes` (`id`);

--
-- Constraints for table `equipos_competicion`
--
ALTER TABLE `equipos_competicion`
ADD CONSTRAINT `equipos_competicion_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id`),
ADD CONSTRAINT `equipos_competicion_ibfk_2` FOREIGN KEY (`id_competicion`) REFERENCES `competiciones` (`id_competicion`);

--
-- Constraints for table `partidos`
--
ALTER TABLE `partidos`
ADD CONSTRAINT `partidos_ibfk_1` FOREIGN KEY (`equipo1`) REFERENCES `equipos` (`id`),
ADD CONSTRAINT `partidos_ibfk_2` FOREIGN KEY (`equipo2`) REFERENCES `equipos` (`id`),
ADD CONSTRAINT `partidos_ibfk_3` FOREIGN KEY (`id_competicion`) REFERENCES `competiciones` (`id_competicion`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
