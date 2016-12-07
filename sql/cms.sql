SET NAMES utf8;

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_bin NOT NULL,
  `phone` varchar(32) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `contacts` (`id`, `name`, `phone`, `description`) VALUES
(1,	'Ишутинов Дмитрий',	'380992316749',	'Это я'),
(2,	'Ишутинова Анастасия',	'380999999999',	'Это моя жена'),
(87,	'Пушок',	'380508544419',	'Мой кот'),
(88,	'Ишутинова София',	'380508544418',	'Моя дочь');
