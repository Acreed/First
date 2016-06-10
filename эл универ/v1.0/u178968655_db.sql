
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 15 2015 г., 14:56
-- Версия сервера: 10.0.20-MariaDB
-- Версия PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `u178968655_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `jurnal`
--

CREATE TABLE IF NOT EXISTS `jurnal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `day` int(10) NOT NULL,
  `month` int(10) NOT NULL,
  `active` varchar(700) COLLATE utf8_unicode_ci NOT NULL,
  `access` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `jurnal`
--

INSERT INTO `jurnal` (`id`, `group`, `day`, `month`, `active`, `access`) VALUES
(16, 'PI_2_01', 22, 10, '0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 1 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 1 0 0 0 0 1 0 0 1 0 0 0 1 1 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 ', 1),
(15, 'PI_2_01', 19, 10, '1 0 1 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 ', 1),
(13, 'PI_2_01', 15, 10, '0 0 0 0 0 0 1 0 0 0 0 0 1 0 1 0 0 0 0 0 1 0 0 0 1 0 0 0 0 0 0 0 0 0 0 0 0 0 ', 1),
(14, 'PI_2_01', 16, 10, '0 0 0 0 0 0 0 1 0 1 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 ', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fathername` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `group` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `access` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `fathername`, `group`, `login`, `password`, `access`) VALUES
(1, 'Иван', 'Иванов', 'Иванович', 'PI_2_01', 'Ivan', 'password', 0),
(2, 'Учитель', 'Учителев', 'Учителевич', '', 'Teacher', 'password', 2),
(3, 'Админ', 'Админов', 'Админович', '', 'Admin', 'password', 3),
(4, 'Староста', 'Старостов', 'Старовтович', 'PI_2_01', 'Starosta', 'password', 1),
(5, 'Андрей', 'Овдейчук', 'отчество', 'PI_2_01', 'adrew', 'password', 0),
(6, 'Игорь', 'Канарович', 'отчество', 'PI_2_01', 'IgorKan', 'password', 0),
(22, 'Андрей', 'Балык', 'отчество', 'PI_2_01', 'AdrewB', 'password', 0),
(21, 'Василий', 'Беляев', 'отчество', 'PI_2_01', 'Vasya', 'password', 0),
(20, 'Сергей', 'Муравский', 'отчество', 'PI_2_01', 'Sergei', 'password', 0),
(23, 'Виталий', 'Корытко', 'отчество', 'PI_2_01', 'VitaliyK', 'password', 0),
(24, 'Евгений', 'Шиманский', 'отчество', 'PI_2_01', 'Zhenya', 'password', 0),
(25, 'Костя', 'Мусорин', 'отчество', 'PI_2_01', 'Kostya', 'password', 0),
(26, 'Валерий', 'Нежурёв', 'отчество', 'PI_2_01', 'Valeriy', 'password', 0),
(27, 'Игорь', 'Халанчук', 'отчество', 'PI_2_01', 'IgorH', 'password', 0),
(28, 'Денис', 'Дворовой', 'отчество', 'PI_2_01', 'Denis', 'password', 0),
(29, 'Виталий', 'Дуридивка', 'отчество', 'PI_2_01', 'VitaliyD', 'password', 0),
(30, 'Александр', 'Овсянников', 'отчество', 'PI_2_01', 'AlexO', 'password', 0),
(31, 'Александр', 'Духно', 'отчество', 'PI_2_01', 'AlexD', 'password', 0),
(32, 'Александр', 'Пантак', 'отчество', 'PI_2_01', 'AlexP', 'password', 0),
(33, 'Александра', 'Ясинская', 'отчество', 'PI_2_01', 'AlexY', 'password', 0),
(34, 'Марина', 'Васюк', 'отчество', 'PI_2_01', 'Marina', 'password', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
