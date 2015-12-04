--
-- Table structure for table `librovisitas`
--

DROP TABLE IF EXISTS `librovisitas`;

CREATE TABLE `librovisitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `comentario` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

