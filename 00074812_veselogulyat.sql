-- phpMyAdmin SQL Dump
-- version home.pl
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 15 2018 г., 13:20
-- Версия сервера: 5.7.19-17-log
-- Версия PHP: 7.1.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `00074812_veselogulyat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `header` text,
  `descript` text,
  `content` text,
  `createman` int(11) DEFAULT NULL,
  `createtime` text,
  `src1` text,
  `src2` text,
  `src3` text,
  `href` int(11) DEFAULT '0',
  `link` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- Структура таблицы `attfiles`
--

CREATE TABLE IF NOT EXISTS `attfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identup` text,
  `href` text,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `attpages`
--

CREATE TABLE IF NOT EXISTS `attpages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identup` text,
  `link` text,
  `content` text,
  `identdown` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `header` text,
  `src` text,
  `href` text,
  `link` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `banners`
--

INSERT INTO `banners` (`id`, `header`, `src`, `href`, `link`) VALUES
(1, 'ĐťĐžĐłĐžŃĐ¸Đż', '1516859189.png', '2', 'http://bmh.su');

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE IF NOT EXISTS `catalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `cat` int(11) DEFAULT NULL,
  `articul` text,
  `cost` int(11) DEFAULT NULL,
  `bundling` text,
  `img` text,
  `imgs_csv` text NOT NULL COMMENT 'Массив изображений, разделенных запятой',
  `slim` int(11) NOT NULL DEFAULT '0',
  `col` int(11) NOT NULL DEFAULT '1',
  `calc` int(11) NOT NULL DEFAULT '0',
  `descr` text NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2705 ;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `cat`, `articul`, `cost`, `bundling`, `img`, `imgs_csv`, `slim`, `col`, `calc`, `descr`, `type`) VALUES
(2685, 'ĐĐťŃ ĐźĐ°ĐťŃŃĐ¸ĐşĐžĐ˛', 2668, NULL, NULL, NULL, NULL, '', 0, 1, 0, '', 3),
(2686, 'ĐĐťŃ Đ´ĐľĐ˛ĐžŃĐľĐş', 2668, NULL, NULL, NULL, NULL, '', 0, 1, 0, '', 3),
(2699, 'ĐĐžĐźĐąĐ¸Đ˝ĐľĐˇĐžĐ˝ steen age', 2671, '98,104,110', 5200, NULL, '1518424874.jpg', ',151842489742.jpg,151842489782.jpg', 0, 1, 0, '<p>ĐŁŃĐľĐżĐťĐ¸ŃĐľĐťŃ - ŃĐľŃĐźĐžŃĐ°Đą, 250 ĐłŃ/Đź2<br />ĐĐ˝ŃŃŃĐľĐ˝Đ˝Đ¸Đš ŃĐťĐžĐš - ŃĐťĐžĐżĐşĐžĐ˛Đ°Ń ĐżĐžĐ´ĐşĐťĐ°Đ´ĐşĐ°&nbsp;<br />Đ˘ĐľĐźĐżĐľŃĐ°ŃŃŃĐ˝ŃĐš ŃĐľĐśĐ¸Đź Đ´Đž -20ĐĄ<br />ĐĐ°ŃĐ¸Đ˝Đ˝Đ°Ń ŃŃĐ¸ŃĐşĐ°<br />-ĐĐľĐźĐąŃĐ°Đ˝Đ˝Đ°Ń ŃĐşĐ°Đ˝Ń 4000 ĐźĐź/ŃĐź2<br />-Đ¸ĐˇĐ˝ĐžŃĐžŃŃĐžĐšĐşĐ°Ń<br />-ĐżŃĐľĐżŃŃŃŃĐ˛ŃĐľŃ ĐżŃĐžĐ˝Đ¸ĐşĐ˝ĐžĐ˛ĐľĐ˝Đ¸Ń Đ˛ĐľŃŃĐ°&nbsp;<br />-ĐžŃŃĐ°ĐťĐşĐ¸Đ˛Đ°ĐľŃ ĐśĐ¸Đ´ĐşĐžŃŃŃ Ń ĐżĐžĐ˛ĐľŃŃĐ˝ĐžŃŃĐ¸&nbsp;<br />-ĐżŃĐžĐżŃŃĐşĐ°ĐľŃ Đ¸ŃĐżĐ°ŃĐľĐ˝Đ¸Ń ŃĐľĐťĐ° -ĐˇĐ°ĐźĐľĐ´ĐťŃĐľŃ ĐżĐžŃĐľŃŃ ŃĐľĐżĐťĐ°</p>', 1),
(2700, 'ĐĐžĐźĐąĐ¸Đ˝ĐľĐˇĐžĐ˝ steen age', 2671, '116', 5200, NULL, '1518425091.jpg', '', 0, 1, 0, '<p>ĐŁŃĐľĐżĐťĐ¸ŃĐľĐťŃ - ŃĐľŃĐźĐžŃĐ°Đą, 250 ĐłŃ/Đź2<br />ĐĐ˝ŃŃŃĐľĐ˝Đ˝Đ¸Đš ŃĐťĐžĐš - ŃĐťĐžĐżĐşĐžĐ˛Đ°Ń ĐżĐžĐ´ĐşĐťĐ°Đ´ĐşĐ°&nbsp;<br />Đ˘ĐľĐźĐżĐľŃĐ°ŃŃŃĐ˝ŃĐš ŃĐľĐśĐ¸Đź Đ´Đž -20ĐĄ&nbsp;<br />ĐĐ°ŃĐ¸Đ˝Đ˝Đ°Ń ŃŃĐ¸ŃĐşĐ°</p>', 1),
(2701, 'ĐĐ¸ĐźĐ˝Đ¸Đš ĐşĐžĐźĐżĐťĐľĐşŃ Steen age', 2671, '104, 110, 122', 6300, NULL, '1518425216.jpg', '151842523558.jpg,151842523575.jpg,151842523559.jpg', 0, 1, 0, '<p>Đ˘ĐşĐ°Đ˝Ń - HKL FU-325-5<br />ĐĐ°ĐżĐžĐťĐ˝Đ¸ŃĐľĐťŃ - 100% Đ˛Đ°ĐťŃŃĐľŃĐź<br />ĐŃŃĐşĐ¸ - ŃĐžĐťĐťĐžŃĐ°ĐšĐąĐľŃ (200ĐłŃ./Đź2)<br />ĐĐžĐ´ĐşĐťĐ°Đ´ĐşĐ° - 100% ĐżĐžĐťĐ¸ŃŃŃĐľŃ (ĐźĐ¸ĐşŃĐžŃĐťĐ¸Ń)<br />ĐĐżŃŃĐşĐ° - Đ˝Đ°ŃŃŃĐ°ĐťŃĐ˝ŃĐš ĐźĐľŃ ĐľĐ˝ĐžŃĐ°</p>', 1),
(2702, 'ĐĐ¸ĐźĐ˝Đ¸Đš ĐşĐžĐźĐżĐťĐľĐşŃ Đ´ĐťŃ Đ´ĐľĐ˛ĐžŃĐşĐ¸', 2676, '98, 104', 5800, NULL, '1518425358.jpg', '151842670768.jpg,151842672652.jpg', 0, 1, 0, '<p>Đ˘ĐşĐ°Đ˝Ń - HP ZARA(HZ-PN753FC) ĐŃĐ°ĐťĐ¸Ń<br />ĐĐ°ĐżĐžĐťĐ˝Đ¸ŃĐľĐťŃ: ĐşŃŃŃĐşĐ° -100 % ĐąĐ¸Đž-ĐżŃŃ,<br />ĐąŃŃĐşĐ¸ (DuPont THERMOLITE EXTRA 200 Đł/ĐşĐ˛ Đź)<br />ĐĐžĐ´ĐşĐťĐ°Đ´ĐşĐ°: ĐşŃŃŃĐşĐ° -100% ĐżĐžĐťĐ¸ŃŃŃĐľŃ<br />ĐąŃŃĐşĐ¸-100% ĐżĐžĐťĐ¸ŃŃŃĐľŃ<br />ĐĐżŃŃĐşĐ° - ĐźĐľŃ ĐľĐ˝ĐžŃĐ° Đ˝Đ°ŃŃŃĐ°ĐťŃĐ˝ŃĐš, ŃŃĐľĐźĐ˝ŃĐš Đ˝Đ° ĐźĐžĐťĐ˝Đ¸Đ¸</p>', 1),
(2665, 'ĐĐ´ĐľĐśĐ´Đ° Đ´ĐťŃ ĐźĐ°ĐťŃŃĐ¸ĐşĐžĐ˛', 0, NULL, NULL, NULL, '', '', 0, 1, 0, '', 2),
(2666, 'ĐĐ´ĐľĐśĐ´Đ° Đ´ĐťŃ Đ´ĐľĐ˛ĐžŃĐľĐş', 0, NULL, NULL, NULL, 'http://academ-nsk.ru/uploads/source/special-item-1.jpg', '', 0, 1, 0, '', 2),
(2667, 'Đ¨Đ°ĐżĐşĐ¸ Đ¸ Đ°ĐşŃĐľŃŃŃĐ°ŃŃ', 0, NULL, NULL, NULL, '', '', 0, 1, 0, '', 2),
(2668, 'ĐĐąŃĐ˛Ń', 0, NULL, NULL, NULL, '1518348257.jpg', '', 0, 1, 0, '', 2),
(2669, 'ĐĐłŃŃŃĐşĐ¸', 0, NULL, NULL, NULL, NULL, '', 0, 1, 0, '', 3),
(2697, 'Đ Đ°ŃĐżŃĐžĐ´Đ°ĐśĐ°', 0, NULL, NULL, NULL, NULL, '', 0, 1, 0, '', 3),
(2671, 'ĐĐžĐźĐąĐ¸Đ˝ĐľĐˇĐžĐ˝Ń', 2665, NULL, NULL, NULL, 'http://academ-nsk.ru/uploads/source/1019285301.jpg', '', 0, 1, 0, '', 3),
(2672, 'ĐĐžŃŃŃĐźŃ', 2665, NULL, NULL, NULL, 'http://academ-nsk.ru/uploads/source/18b93ca2ce_1000.jpg', '', 0, 1, 0, '', 3),
(2673, 'ĐĐ°ŃĐşĐ¸', 2665, NULL, NULL, NULL, 'http://academ-nsk.ru/uploads/source/parka-dlya-malchika-2.jpg', '', 0, 1, 0, '', 3),
(2674, 'ĐŃŃŃĐşĐ¸', 2665, NULL, NULL, NULL, 'http://academ-nsk.ru/uploads/source/parka-dlya-malchika-2_1.jpg', '', 0, 1, 0, '', 3),
(2675, 'ĐŃŃĐşĐ¸ Đ¸ ĐżĐžĐťŃĐşĐžĐźĐąĐ¸Đ˝ĐľĐˇĐžĐ˝Ń', 2665, NULL, NULL, NULL, NULL, '', 0, 1, 0, '', 3),
(2676, 'ĐĐžĐźĐąĐ¸Đ˝ĐľĐˇĐžĐ˝Ń', 2666, NULL, NULL, NULL, NULL, '', 0, 1, 0, '', 3),
(2677, 'ĐĐ°ŃĐşĐ¸', 2666, NULL, NULL, NULL, NULL, '', 0, 1, 0, '', 3),
(2698, 'ĐĐžĐźĐąĐ¸Đ˝ĐľĐˇĐžĐ˝ steen age', 2671, '92,98,104,110,116', 5200, NULL, '1518424432.jpg', '151842443817.jpg,151842455194.jpg', 0, 1, 0, '<p>ĐĐľŃŃ: 100% ĐżĐžĐťĐ¸ŃŃŃĐľŃ<br />ĐĐ°ĐżĐžĐťĐ˝Đ¸ŃĐľĐťŃ - 100% ĐĐžĐťĐ¸ŃŃŃĐľŃ (Đ˘ĐľŃĐźĐžŃĐ°Đą 250 ĐłŃ/Đź2)<br />ĐĐžĐ´ĐşĐťĐ°Đ´ĐşĐ°: 100% ĐżĐžĐťĐ¸ŃŃŃĐľŃ (ĐźĐ¸ĐşŃĐžŃĐťĐ¸Ń)<br />Đ˘ĐľĐźĐżĐľŃĐ°ŃŃŃĐ˝ŃĐš ŃĐľĐśĐ¸Đź Đ´Đž -25ĐĄ<br />ĐĐ°ŃĐ¸Đ˝Đ˝Đ°Ń ŃŃĐ¸ŃĐşĐ°<br />ĐĐľĐźĐąŃĐ°Đ˝Đ˝Đ°Ń ŃĐşĐ°Đ˝Ń 3000 ĐłŃ/Đź2:<br />-Đ¸ĐˇĐ˝ĐžŃĐžŃŃĐžĐšĐşĐ°Ń<br />-ĐżŃĐľĐżŃŃŃŃĐ˛ŃĐľŃ ĐżŃĐžĐ˝Đ¸ĐşĐ˝ĐžĐ˛ĐľĐ˝Đ¸Ń Đ˛ĐľŃŃĐ°<br />-ĐžŃŃĐ°ĐťĐşĐ¸Đ˛Đ°ĐľŃ ĐśĐ¸Đ´ĐşĐžŃŃŃ Ń ĐżĐžĐ˛ĐľŃŃĐ˝ĐžŃŃĐ¸<br />-ĐżŃĐžĐżŃŃĐşĐ°ĐľŃ Đ¸ŃĐżĐ°ŃĐľĐ˝Đ¸Ń ŃĐľĐťĐ°<br />-ĐˇĐ°ĐźĐľĐ´ĐťŃĐľŃ ĐżĐžŃĐľŃŃ ŃĐľĐżĐťĐ°</p>', 1),
(2680, 'ĐĐžŃŃŃĐźŃ', 2666, NULL, NULL, NULL, NULL, '', 0, 1, 0, '', 3),
(2681, 'ĐŃŃŃĐşĐ¸', 2666, NULL, NULL, NULL, NULL, '', 0, 1, 0, '', 3),
(2682, 'ĐŃŃĐşĐ¸ Đ¸ ĐżĐžĐťŃĐąŃŃĐşĐ¸', 2666, NULL, NULL, NULL, NULL, '', 0, 1, 0, '', 3),
(2683, 'ĐĐťŃ ĐźĐ°ĐťŃŃĐ¸ĐşĐžĐ˛', 2667, NULL, NULL, NULL, NULL, '', 0, 1, 0, '', 3),
(2684, 'ĐĐťŃ Đ´ĐľĐ˛ĐžŃĐľĐş', 2667, NULL, NULL, NULL, NULL, '', 0, 1, 0, '', 3),
(2704, 'ĐĐ¸ĐźĐ˝Đ¸Đš ĐşĐžĐźĐżĐťĐľĐşŃ Đ´ĐťŃ Đ´ĐľĐ˛ĐžŃĐşĐ¸', 2676, '104, 110, 116, 122, 128', 6500, NULL, '1518449866.jpg', '', 0, 1, 0, '<p>ĐĐľŃŃ: 100% ĐżĐžĐťĐ¸ŃŃŃĐľŃ<br />ĐĐ°ĐżĐžĐťĐ˝Đ¸ŃĐľĐťŃ - 100% ĐĐ¸Đž-ĐżŃŃ<br />ĐĐžĐ´ĐşĐťĐ°Đ´ĐşĐ°: 100% ĐżĐžĐťĐ¸ŃŃŃĐľŃ (ŃĐťĐ¸Ń)<br />Đ˘ĐľĐźĐżĐľŃĐ°ŃŃŃĐ˝ŃĐš ŃĐľĐśĐ¸Đź Đ´Đž -40ĐĄ<br />ĐĐ°ŃĐ¸Đ˝Đ˝Đ°Ń ŃŃĐ¸ŃĐşĐ°<br />-Đ¸ĐˇĐ˝ĐžŃĐžŃŃĐžĐšĐşĐ°Ń<br />-ĐżŃĐľĐżŃŃŃŃĐ˛ŃĐľŃ ĐżŃĐžĐ˝Đ¸ĐşĐ˝ĐžĐ˛ĐľĐ˝Đ¸Ń Đ˛ĐľŃŃĐ°<br />-ĐžŃŃĐ°ĐťĐşĐ¸Đ˛Đ°ĐľŃ ĐśĐ¸Đ´ĐşĐžŃŃŃ Ń ĐżĐžĐ˛ĐľŃŃĐ˝ĐžŃŃĐ¸<br />-ĐżŃĐžĐżŃŃĐşĐ°ĐľŃ Đ¸ŃĐżĐ°ŃĐľĐ˝Đ¸Ń ŃĐľĐťĐ°<br />-ĐˇĐ°ĐźĐľĐ´ĐťŃĐľŃ ĐżĐžŃĐľŃŃ ŃĐľĐżĐťĐ°</p>', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_filter`
--

CREATE TABLE IF NOT EXISTS `catalog_filter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ident` text CHARACTER SET utf8 NOT NULL,
  `header` text CHARACTER SET utf8,
  `content` text CHARACTER SET utf8,
  `descript` text CHARACTER SET utf8,
  `createman` int(11) DEFAULT NULL,
  `rewriteman` int(11) DEFAULT NULL,
  `createtime` text CHARACTER SET utf8,
  `rewritetime` text CHARACTER SET utf8,
  `parent` text CHARACTER SET utf8,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=54 ;

--
-- Дамп данных таблицы `catalog_filter`
--

INSERT INTO `catalog_filter` (`id`, `ident`, `header`, `content`, `descript`, `createman`, `rewriteman`, `createtime`, `rewritetime`, `parent`) VALUES
(41, 'year_season', 'ĐĄĐľĐˇĐžĐ˝ ĐłĐžĐ´Đ°', '', '', 1, 1, '1516987455', '1516987455', '0'),
(42, 'winter', 'ĐĐ¸ĐźĐ°', '', '', 1, 1, '1516987472', '1516987472', '41'),
(43, 'spring', 'ĐĐľŃĐ˝Đ°', '', '', 1, 1, '1516987490', '1516987490', '41'),
(44, 'summer', 'ĐĐľŃĐž', '', '', 1, 1, '1516987512', '1516987512', '41'),
(45, 'autumn', 'ĐŃĐľĐ˝Ń', '', '', 1, 1, '1516987533', '1516987533', '41'),
(46, 'brand', 'Đ˘ĐžŃĐłĐžĐ˛ŃĐľ ĐźĐ°ŃĐşĐ¸ - ĐąŃĐľĐ˝Đ´', '', '', 1, 1, '1516987552', '1516987552', '0'),
(47, 'jan_steen', 'JanSteen', '', '', 1, 1, '1516987573', '1516987573', '46'),
(48, 'bilemi', 'Bilemi', '', '', 1, 1, '1516987589', '1516987589', '46'),
(49, 'steen_age', 'Steen Age', '', '', 1, 1, '1516987607', '1516987607', '46'),
(50, 'rad_rada', 'RadRada', '', '', 1, 1, '1516987623', '1516987623', '46'),
(51, 'pelican_kids', 'Pelican Kids', '', '', 1, 1, '1516987638', '1516987638', '46'),
(52, 'boom_by_orby', 'Boom by orby', '', '', 1, 1, '1516987656', '1516987656', '46'),
(53, 'piccola_coccinella', 'Piccola Coccinella', '', '', 1, 1, '1516987670', '1516987670', '46');

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_filter_relations`
--

CREATE TABLE IF NOT EXISTS `catalog_filter_relations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catalog_id` int(11) NOT NULL,
  `catalog_filter_ident` text CHARACTER SET utf8 NOT NULL,
  `catalog_filter_value` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=164 ;

--
-- Дамп данных таблицы `catalog_filter_relations`
--

INSERT INTO `catalog_filter_relations` (`id`, `catalog_id`, `catalog_filter_ident`, `catalog_filter_value`) VALUES
(9, 2658, 'type', 'pla'),
(10, 2658, 'diameter', '1_75_mm'),
(11, 2658, 'Weight', '1_kg'),
(12, 2658, 'color', 'light_gray'),
(13, 2657, 'type', 'pla'),
(14, 2657, 'diameter', '1_75_mm'),
(15, 2657, 'Weight', '1_kg'),
(16, 2657, 'color', 'coral'),
(17, 2656, 'type', 'pla'),
(18, 2656, 'diameter', '1_75_mm'),
(19, 2656, 'Weight', '1_kg'),
(20, 2656, 'color', 'emerald'),
(21, 2655, 'type', 'pla'),
(22, 2655, 'diameter', '1_75_mm'),
(23, 2655, 'Weight', '1_kg'),
(24, 2655, 'color', 'green'),
(25, 2654, 'type', 'pla'),
(26, 2654, 'diameter', '1_75_mm'),
(27, 2654, 'Weight', '1_kg'),
(28, 2654, 'color', 'yellow'),
(29, 2653, 'type', 'pla'),
(30, 2653, 'diameter', '1_75_mm'),
(31, 2653, 'Weight', '1_kg'),
(32, 2653, 'color', 'gold_metallic'),
(33, 2652, 'type', 'pla'),
(34, 2652, 'diameter', '1_75_mm'),
(35, 2652, 'Weight', '1_kg'),
(36, 2652, 'color', 'natural'),
(37, 2651, 'type', 'pla'),
(38, 2651, 'diameter', '1_75_mm'),
(39, 2651, 'Weight', '1_kg'),
(40, 2651, 'color', 'cream'),
(41, 2650, 'type', 'pla'),
(42, 2650, 'diameter', '1_75_mm'),
(43, 2650, 'Weight', '1_kg'),
(44, 2650, 'color', 'red'),
(45, 2649, 'type', 'pla'),
(46, 2649, 'diameter', '1_75_mm'),
(47, 2649, 'Weight', '1_kg'),
(48, 2649, 'color', 'brown'),
(49, 2648, 'type', 'pla'),
(50, 2648, 'diameter', '1_75_mm'),
(51, 2648, 'Weight', '1_kg'),
(52, 2648, 'color', 'chocolate'),
(53, 2647, 'type', 'pla'),
(54, 2647, 'diameter', '1_75_mm'),
(55, 2647, 'Weight', '1_kg'),
(56, 2647, 'color', 'black'),
(57, 2646, 'type', 'pla'),
(58, 2646, 'diameter', '1_75_mm'),
(59, 2646, 'Weight', '1_kg'),
(60, 2646, 'color', 'purple'),
(61, 2645, 'type', 'pla'),
(62, 2645, 'diameter', '1_75_mm'),
(63, 2645, 'Weight', '1_kg'),
(64, 2645, 'color', 'blue_dark'),
(65, 2644, 'type', 'pla'),
(66, 2644, 'diameter', '1_75_mm'),
(67, 2644, 'Weight', '1_kg'),
(68, 2644, 'color', 'gray'),
(69, 2643, 'type', 'pla'),
(70, 2643, 'diameter', '1_75_mm'),
(71, 2643, 'Weight', '1_kg'),
(72, 2643, 'color', 'lime_green'),
(73, 2642, 'type', 'pla'),
(74, 2642, 'diameter', '1_75_mm'),
(75, 2642, 'Weight', '1_kg'),
(76, 2642, 'color', 'pink'),
(77, 2641, 'type', 'pla'),
(78, 2641, 'diameter', '1_75_mm'),
(79, 2641, 'Weight', '1_kg'),
(80, 2641, 'color', 'transitive'),
(81, 2640, 'type', 'pla'),
(82, 2640, 'diameter', '1_75_mm'),
(83, 2640, 'Weight', '1_kg'),
(84, 2640, 'color', 'orange'),
(85, 2639, 'type', 'pla'),
(86, 2639, 'diameter', '1_75_mm'),
(87, 2639, 'Weight', '1_kg'),
(88, 2639, 'color', 'skyey'),
(89, 2638, 'type', 'pla'),
(90, 2638, 'diameter', '1_75_mm'),
(91, 2638, 'Weight', '1_kg'),
(92, 2638, 'color', 'silver_metallic'),
(93, 2637, 'type', 'pla'),
(94, 2637, 'diameter', '1_75_mm'),
(95, 2637, 'Weight', '1_kg'),
(96, 2637, 'color', 'blue'),
(97, 2636, 'type', 'pla'),
(98, 2636, 'diameter', '1_75_mm'),
(99, 2636, 'Weight', '1_kg'),
(100, 2636, 'color', 'white'),
(131, 2693, 'sex', 'male'),
(132, 2693, 'year_season', 'winter'),
(133, 2693, 'brand', 'jan_steen'),
(150, 2698, 'year_season', 'winter'),
(151, 2698, 'brand', 'steen_age'),
(152, 2699, 'year_season', 'winter'),
(153, 2699, 'brand', 'steen_age'),
(154, 2700, 'year_season', 'winter'),
(155, 2700, 'brand', 'steen_age'),
(156, 2701, 'year_season', 'winter'),
(157, 2701, 'brand', 'steen_age'),
(158, 2702, 'year_season', 'winter'),
(159, 2702, 'brand', 'pelican_kids'),
(162, 2704, 'year_season', 'winter'),
(163, 2704, 'brand', 'pelican_kids');

-- --------------------------------------------------------

--
-- Структура таблицы `client_domains`
--

CREATE TABLE IF NOT EXISTS `client_domains` (
  `domain_id` int(11) NOT NULL AUTO_INCREMENT,
  `domain_login` text NOT NULL,
  `domain_name` text NOT NULL,
  `domain_status` tinyint(4) NOT NULL,
  `domain_date_start` date NOT NULL,
  `domain_date_end` date NOT NULL,
  `domain_price` int(11) NOT NULL,
  `domain_dns` text NOT NULL,
  PRIMARY KEY (`domain_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `client_domains`
--

INSERT INTO `client_domains` (`domain_id`, `domain_login`, `domain_name`, `domain_status`, `domain_date_start`, `domain_date_end`, `domain_price`, `domain_dns`) VALUES
(3, '', 'www.kidswalk.ru', 1, '2018-02-13', '2019-02-13', 400, '');

-- --------------------------------------------------------

--
-- Структура таблицы `client_hosting`
--

CREATE TABLE IF NOT EXISTS `client_hosting` (
  `hosting_id` int(11) NOT NULL AUTO_INCREMENT,
  `hosting_login` text NOT NULL,
  `hosting_site_id` text NOT NULL,
  `hosting_status` int(11) NOT NULL,
  `hosting_date_start` date NOT NULL,
  `hosting_date_end` date NOT NULL,
  `hosting_price` int(11) NOT NULL,
  PRIMARY KEY (`hosting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `client_hosting`
--

INSERT INTO `client_hosting` (`hosting_id`, `hosting_login`, `hosting_site_id`, `hosting_status`, `hosting_date_start`, `hosting_date_end`, `hosting_price`) VALUES
(13, '', 'www.kidswalk.ru', 1, '2018-02-13', '2019-02-13', 1000);

-- --------------------------------------------------------

--
-- Структура таблицы `client_orders`
--

CREATE TABLE IF NOT EXISTS `client_orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_login` text NOT NULL,
  `order_type` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `order_target` text NOT NULL,
  `order_sum` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quastion` text,
  `answer` text,
  `ch` int(11) DEFAULT NULL,
  `date` text,
  `fio` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=68 ;

--
-- Дамп данных таблицы `faq`
--

INSERT INTO `faq` (`id`, `quastion`, `answer`, `ch`, `date`, `fio`) VALUES
(67, 'dsaads', NULL, 0, '1499272309', 'sdadas');

-- --------------------------------------------------------

--
-- Структура таблицы `form_data`
--

CREATE TABLE IF NOT EXISTS `form_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form` text,
  `a1` text,
  `a2` text,
  `a3` text,
  `a4` text,
  `a5` text,
  `a6` text,
  `a7` text,
  `a8` text,
  `a9` text,
  `a10` text,
  `b1` text,
  `b2` text,
  `b3` text,
  `b4` text,
  `b5` text,
  `b6` text,
  `b7` text,
  `b8` text,
  `b9` text,
  `b10` text,
  `timenow` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=210 ;

-- --------------------------------------------------------

--
-- Структура таблицы `form_list`
--

CREATE TABLE IF NOT EXISTS `form_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form` text,
  `ident` text,
  `type` text,
  `content` text,
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Дамп данных таблицы `form_list`
--

INSERT INTO `form_list` (`id`, `form`, `ident`, `type`, `content`, `value`) VALUES
(31, 'card', 'first_name', 'text', 'Đ¤Đ°ĐźĐ¸ĐťĐ¸Ń', ''),
(32, 'card', 'second_name', 'text', 'ĐĐźŃ', ''),
(33, 'card', 'email', 'text', 'ĐĐ°Ń e-mail', ''),
(34, 'card', 'phone', 'text', 'ĐĐžĐ˝ŃĐ°ĐşŃĐ˝ŃĐš ŃĐľĐťĐľŃĐžĐ˝', ''),
(35, 'card', 'address', 'text', 'ĐĐ´ŃĐľŃ Đ´ĐžŃŃĐ°Đ˛ĐşĐ¸', '');

-- --------------------------------------------------------

--
-- Структура таблицы `form_name`
--

CREATE TABLE IF NOT EXISTS `form_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `content` text,
  `mail` int(11) DEFAULT '0',
  `page` text,
  `submit` text,
  PRIMARY KEY (`id`,`name`(20))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `form_name`
--

INSERT INTO `form_name` (`id`, `name`, `content`, `mail`, `page`, `submit`) VALUES
(8, 'card', 'ĐĐžŃĐˇĐ¸Đ˝Đ°', 0, 'bag', 'ĐŃĐżŃĐ°Đ˛Đ¸ŃŃ ĐˇĐ°ŃĐ˛ĐşŃ');

-- --------------------------------------------------------

--
-- Структура таблицы `headers`
--

CREATE TABLE IF NOT EXISTS `headers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `name` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `headers`
--

INSERT INTO `headers` (`id`, `content`, `name`) VALUES
(1, 'ĐĐ˝ŃĐľŃĐ˝ĐľŃ-ĐźĐ°ĐłĐ°ĐˇĐ¸Đ˝', 'keywords'),
(2, 'ĐĐ˝ŃĐľŃĐ˝ĐľŃ-ĐźĐ°ĐłĐ°ĐˇĐ¸Đ˝', 'description'),
(3, 'ĐĐ˝ŃĐľŃĐ˝ĐľŃ-ĐźĐ°ĐłĐ°ĐˇĐ¸Đ˝', 'title');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_app`
--

CREATE TABLE IF NOT EXISTS `menu_app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` int(11) DEFAULT NULL,
  `descript` text,
  `src` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `menu_data`
--

CREATE TABLE IF NOT EXISTS `menu_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` text,
  `header` text,
  `cat` int(11) DEFAULT NULL,
  `page` text,
  `content` text,
  `pagename` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=182 ;

--
-- Дамп данных таблицы `menu_data`
--

INSERT INTO `menu_data` (`id`, `menu`, `header`, `cat`, `page`, `content`, `pagename`) VALUES
(23, 'generalmenu', 'ĐĐžĐ˝ŃĐ°ĐşŃŃ', 0, 'contacts', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `menu_name`
--

CREATE TABLE IF NOT EXISTS `menu_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `content` text,
  `level` int(11) DEFAULT '1',
  PRIMARY KEY (`id`,`name`(20))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `menu_name`
--

INSERT INTO `menu_name` (`id`, `name`, `content`, `level`) VALUES
(3, 'generalmenu', 'Main menu', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `header` text,
  `descript` text,
  `content` text,
  `createman` int(11) DEFAULT NULL,
  `createtime` text,
  `src1` text,
  `src2` text,
  `src3` text,
  `href` int(11) DEFAULT '0',
  `link` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `header`, `descript`, `content`, `createman`, `createtime`, `src1`, `src2`, `src3`, `href`, `link`) VALUES
(7, 'ĐĐ˝ŃĐžŃĐźĐ°ŃĐ¸Ń Đž ŃĐ°ĐšŃĐľ', 'ĐŃĐ¸Đ˛ĐľŃŃŃĐ˛ŃĐľĐź Đ˛ŃĐľŃ ĐłĐžŃŃĐľĐš Đ´Đ°Đ˝Đ˝ĐžĐłĐž Đ¸Đ˝ŃĐľŃĐ˝ĐľŃ ŃĐľŃŃŃŃĐ°!!!\r\n\r\nĐĽĐžŃĐ¸Đź ŃĐžĐžĐąŃĐ¸ŃŃ, Đ˛Đ°ĐśĐ˝ŃŃ Đ¸Đ˝ŃĐžŃĐźĐ°ŃĐ¸Ń', '<p>ĐŃĐ¸Đ˛ĐľŃŃŃĐ˛ŃĐľĐź Đ˛ŃĐľŃ ĐłĐžŃŃĐľĐš Đ´Đ°Đ˝Đ˝ĐžĐłĐž Đ¸Đ˝ŃĐľŃĐ˝ĐľŃ ŃĐľŃŃŃŃĐ°!!!</p>\r\n<p>ĐĽĐžŃĐ¸Đź ŃĐžĐžĐąŃĐ¸ŃŃ, ŃŃĐž ĐżŃĐľĐśĐ˝Đ¸Đš ŃĐ°ĐšŃ www.nsksvet.ru ĐżĐľŃĐľĐľŃĐ°Đť Đ˝Đ° Đ˝ĐžĐ˛ŃĐš Đ´ĐžĐźĐľĐ˝</p>\r\n<p>ĐĐľĐšŃŃĐ˛ŃŃŃĐ¸Đš ŃĐ°ĐšŃ: <a href="http://www.nsksvet.com">www.nsksvet.com</a></p>\r\n<p>ĐĄĐ°ĐšŃ ŃĐ°ĐąĐžŃĐ°ĐľŃ Ń Đ¸ŃĐťŃ 2017-ĐłĐž ĐłĐžĐ´Đ°</p>\r\n<p>Đ Đ´Đ°Đ˝Đ˝ŃĐš ĐźĐžĐźĐľĐ˝Ń Đ˛ĐľĐ´ĐľŃŃŃ ĐľĐśĐľĐ´Đ˝ĐľĐ˛Đ˝ĐžĐľ ĐˇĐ°ĐżĐžĐťĐ˝ĐľĐ˝Đ¸Đľ ŃĐžĐ˛Đ°ŃĐ°ĐźĐ¸</p>\r\n<p>ĐŃĐ¸Đ˝ĐžŃĐ¸Đź Đ¸ĐˇĐ˛Đ¸Đ˝ĐľĐ˝Đ¸Ń ĐˇĐ° Đ˛ŃĐľĐźĐľĐ˝Đ˝ŃĐľ Đ˝ĐľŃĐ´ĐžĐąŃŃĐ˛Đ°</p>\r\n<p>ĐĐ°ŃĐ¸ ŃĐžŃŃŃĐ´Đ˝Đ¸ĐşĐ¸ ĐźĐ°ĐşŃĐ¸ĐźĐ°ĐťŃĐ˝Đž Đ˝Đ¸Đ˛ĐľĐťĐ¸ŃŃŃŃ Đ˝ĐľŃĐ˛Đ°ŃĐşŃ Đ¸Đ˝ŃĐžŃĐźĐ°ŃĐ¸Đ¸ - ĐżĐž ŃĐşĐ°ĐˇĐ°Đ˝Đ˝ŃĐź ĐşĐžĐ˝ŃĐ°ĐşŃĐ°Đź</p>\r\n<p>Đ˘Đ°ĐşĐśĐľ ŃĐťĐľĐ´Đ¸ŃĐľ ĐˇĐ° Đ˝ĐžĐ˛ĐžŃŃŃĐźĐ¸ Đ˛ ĐżŃĐžŃĐ¸ĐťĐľ ĐşĐžĐźĐżĐ°Đ˝Đ¸Đ¸ Đ˛ ŃĐžŃĐ¸Đ°ĐťŃĐ˝ŃŃ ŃĐľŃŃŃ:</p>\r\n<p><a href="https://vk.com/vsegda_svetlo">vk.com/vsegda_svetlo</a> <br /><a href="https://vk.com/away.php?to=https%3A%2F%2Finstagram.com%2Fvsegda_svetlo&amp;cc_key=" target="_blank" rel="noopener">instagram.com/vsegda_svetlo</a></p>\r\n<p>ĐĐžĐ˝ŃĐ°ĐşŃŃ ĐąĐľĐˇ Đ¸ĐˇĐźĐľĐ˝ĐľĐ˝Đ¸Đš:</p>\r\n<p>8-913-763-78-89 (WhatSapp, Viber) <br />8-905-951-99-44 <br />(383) 21-444-37</p>\r\n<p><a href="https://vk.com/write?email=led-sale@mail.ru" target="_blank" rel="noopener">led-sale@mail.ru</a></p>\r\n<p>ĐĐžĐťŃŃĐžĐľ ŃĐżĐ°ŃĐ¸ĐąĐž ĐˇĐ° Đ˛Đ˝Đ¸ĐźĐ°Đ˝Đ¸Đľ.</p>', 1, '10 Đ¸ŃĐťŃ 2017 Đł.', '1499674543.jpg', NULL, NULL, 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ident` text NOT NULL,
  `header` text,
  `content` text,
  `descript` text,
  `parent` text,
  `createman` int(11) DEFAULT NULL,
  `rewriteman` int(11) DEFAULT NULL,
  `createtime` text,
  `rewritetime` text,
  PRIMARY KEY (`id`,`ident`(20))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `ident`, `header`, `content`, `descript`, `parent`, `createman`, `rewriteman`, `createtime`, `rewritetime`) VALUES
(3, 'main', 'ĐĐťĐ°Đ˛Đ˝Đ°Ń', '<p>ĐĐżĐ¸ŃĐ°Đ˝Đ¸Đľ</p>', '', '0', 1, 1, '1376008341', '1518525494'),
(13, 'oplata', 'ĐĐżĐťĐ°ŃĐ°', '<p>ĐĐżĐťĐ°ŃĐ° ĐžŃŃŃĐľŃŃĐ˛ĐťŃĐľŃŃŃ Đ˝Đ°ĐťĐ¸ŃĐ˝ŃĐź Đ¸ ĐąĐľĐˇĐ˝Đ°ĐťĐ¸ŃĐ˝ŃĐź ŃĐ°ŃŃĐľŃĐžĐź ĐżĐž ŃŃĐťĐžĐ˛Đ¸ŃĐź ĐżĐžĐťĐ˝ĐžĐš ĐżŃĐľĐ´ĐžĐżĐťĐ°ŃŃ.</p>', '', '0', 1, 1, '1459491884', '1517237636'),
(31, 'russia', 'ĐĐžŃŃĐ°Đ˛ĐşĐ° ĐżĐž Đ ĐžŃŃĐ¸Đ¸', '', '', '0', 1, 1, '1517237651', '1517237651'),
(32, 'city', 'ĐĐžŃŃĐ°Đ˛ĐşĐ° ĐżĐž ĐłĐžŃĐžĐ´Ń', '', '', '0', 1, 1, '1517237668', '1517237668'),
(33, 'vozvrat', 'ĐĐžĐˇĐ˛ŃĐ°Ń ŃĐžĐ˛Đ°ŃĐ°', '', '', '0', 1, 1, '1517237679', '1517237679'),
(14, 'good', 'ĐĐżĐťĐ°ŃĐ° ĐżŃĐžŃĐťĐ° ŃŃĐżĐľŃĐ˝Đž', '<p>ĐĄĐżĐ°ŃĐ¸ĐąĐž ĐˇĐ° ĐżĐžĐşŃĐżĐşŃ</p>', '', '0', 1, 1, '1459591236', '1498614919'),
(5, 'catalog', 'ĐĐ°ŃĐ°ĐťĐžĐł ŃĐžĐ˛Đ°ŃĐžĐ˛', '', '', '0', 1, 1, '1376008368', '1498614929'),
(9, 'contacts', 'ĐĐžĐ˝ŃĐ°ĐşŃŃ', '', '', '0', 1, 1, '1376008422', '1516859512'),
(11, 'bag', 'ĐĐžŃĐˇĐ¸Đ˝Đ°', '', '', '0', 1, 1, '1376620190', '1498614981'),
(15, 'about-company', 'Đ ĐşĐžĐźĐżĐ°Đ˝Đ¸Đ¸', '', '', '0', 1, 1, '1496544435', '1498614990'),
(30, 'catalog-full', 'ĐŃĐžĐ´ŃĐşŃĐ¸Ń', '', '', '0', 1, 1, '1506257623', '1506257623');

-- --------------------------------------------------------

--
-- Структура таблицы `photogallery`
--

CREATE TABLE IF NOT EXISTS `photogallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `cat` int(11) DEFAULT NULL,
  `img` text,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `photogallery`
--

INSERT INTO `photogallery` (`id`, `name`, `cat`, `img`, `date`) VALUES
(1, 'ŃĐžŃĐž1', 0, '1496804972.png', NULL),
(5, '', 1, '149823041140.jpg', '2017-06-23 17:06:51'),
(6, '', 1, '149823074596.jpg', '2017-06-23 17:12:25');

-- --------------------------------------------------------

--
-- Структура таблицы `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Дамп данных таблицы `slider`
--

INSERT INTO `slider` (`id`, `img`) VALUES
(26, '1516859787.jpg'),
(27, '1516859793.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `staticpromo`
--

CREATE TABLE IF NOT EXISTS `staticpromo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `staticpromo`
--

INSERT INTO `staticpromo` (`id`, `content`) VALUES
(1, '2'),
(2, 'img/1339237244.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `terms`
--

CREATE TABLE IF NOT EXISTS `terms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ident` text NOT NULL,
  `content` text,
  `header` text,
  PRIMARY KEY (`id`,`ident`(20))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `terms`
--

INSERT INTO `terms` (`id`, `ident`, `content`, `header`) VALUES
(15, 'phone', '8 (800) 000-00-00', 'Đ˘ĐľĐťĐľŃĐžĐ˝'),
(13, 'emailsend1', 'erdenirf@yandex.ru', 'ĐżĐžŃŃĐ°1'),
(14, 'emailsend2', 'thearaxis@mail.ru', 'ĐżĐžŃŃĐ°2'),
(16, 'email_my_company', 'info@olifant.ru', 'ĐĐ°Ń e-mail'),
(17, 'address_my_company', 'ĐĄĐ°Đ˝ĐşŃ ĐĐľŃĐľŃĐąŃŃĐł, ŃĐť.', 'ĐĐ°Ń Đ°Đ´ŃĐľŃ Đ˛ ĐĄĐ°Đ˝ĐşŃ ĐĐľŃĐľŃĐąŃŃĐłĐľ');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`) VALUES
(1, 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
