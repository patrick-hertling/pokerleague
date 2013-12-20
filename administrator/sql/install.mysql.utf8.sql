--
-- Estructura de tabla para la tabla `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `id` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `pricemoney` decimal(8,2) NOT NULL,
  `player` varchar(128) COLLATE latin1_german2_ci NOT NULL,
  `player_nr` int(11) NOT NULL,
  `buyins` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `player`
--

CREATE TABLE IF NOT EXISTS `player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `img_path` int(11) DEFAULT NULL,
  `creation_date` int(11) NOT NULL,
  `modification_date` tinyint(4) DEFAULT NULL,
  `state` int(11) NOT NULL,
  `ordering` int(11) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `buyins` int(11) DEFAULT NULL,
  `won` int(11) DEFAULT NULL,
  `payed` int(11) DEFAULT NULL,
  `rate` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `player_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `buyin_nr` int(11) NOT NULL,
  `placing` int(11) NOT NULL,
  KEY `player_id` (`player_id`),
  KEY `game_id` (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `player` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;