
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Дек 02 2015 г., 17:26
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
-- Структура таблицы `IK-1_1_01`
--

CREATE TABLE IF NOT EXISTS `IK-1_1_01` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fathername` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `access` int(11) NOT NULL,
  `special` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Дамп данных таблицы `IK-1_1_01`
--

INSERT INTO `IK-1_1_01` (`id`, `name`, `surname`, `fathername`, `login`, `password`, `access`, `special`) VALUES
(10, 'Захар ', 'Бабенко', 'Анатолійович', 'Babenko', 'password', 0, ''),
(11, 'Руслан ', 'Берчук ', 'Миколайович', 'Berchuk', 'password', 0, ''),
(12, 'Святослав ', 'Бойчук ', 'Ігорович', 'Boichuk', 'password', 0, ''),
(13, 'Павло ', 'Бохан ', 'Сергійович', 'Boxan', 'password', 0, ''),
(14, 'Юрій ', 'Власов ', 'Борисович', 'Vlasov', 'password', 0, ''),
(15, 'Ірина ', 'Глущенко ', 'Олександрівна', 'Glushenko', 'password', 1, ''),
(16, 'Андрій ', 'Горлінський ', 'Леонідович', 'Gorlinskii', 'password', 0, ''),
(17, 'Кабірулла ', 'Гулам ', 'Рабані', 'Gulam', 'password', 0, ''),
(18, 'Анастасія ', 'Золотайкіна ', 'Сергіївна', 'Zolotaikina', 'password', 0, ''),
(19, 'Євген ', 'Калугін ', 'Євгенович', 'Kalugin', 'password', 0, ''),
(20, 'Андрій ', 'Катрага ', 'Владиславович', 'Katraga', 'password', 0, ''),
(21, 'Володимир ', 'Кушнір ', 'Віталійович', 'Kushnir', 'password', 0, ''),
(22, 'Вячеслав ', 'Лупша ', 'Костянтинович', 'Lupsha', 'password', 0, ''),
(23, 'Дмитро ', 'Маслаков ', 'Геннадійович', 'Maslakov', 'password', 0, ''),
(24, 'Вячеслав ', 'Нарваткін ', 'Юрійович', 'Narvatkin', 'password', 0, ''),
(25, 'Володимир ', 'Підтикан ', 'Віталійович', 'Pidtikan', 'password', 0, ''),
(26, 'Юлія ', 'Поп ', 'Вікторівна ', 'Pop', 'password', 0, ''),
(27, 'Сергій ', 'Порошенко ', 'Андрійович', 'Poroshenko', 'password', 0, ''),
(28, 'Максим ', 'Радіонов ', 'Михайлович', 'Radionov', 'password', 0, ''),
(29, 'Микола ', 'Скребнєв ', 'Миколайович', 'Ckrebyev', 'password', 0, ''),
(30, 'Дмитрій ', 'Таранцов ', 'Віталійович', 'Taraycov', 'password', 0, ''),
(31, 'Олександр ', 'Унтіла ', 'Ігорович', 'Untila', 'password', 0, ''),
(32, 'Олексій ', 'Фортуна ', 'Андрійович', 'Fortuna', 'password', 0, ''),
(33, 'Богдан ', 'Ярцун ', 'Олександрович', 'Yarcuk', 'password', 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `IK-1_1_02`
--

CREATE TABLE IF NOT EXISTS `IK-1_1_02` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fathername` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `access` int(11) NOT NULL,
  `special` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Дамп данных таблицы `IK-1_1_02`
--

INSERT INTO `IK-1_1_02` (`id`, `name`, `surname`, `fathername`, `login`, `password`, `access`, `special`) VALUES
(1, 'Анастасія ', 'Бородаєнко ', 'Костянтинівна', 'Borodaenko', 'password', 0, ''),
(2, 'Дмитро ', 'Вусатий ', 'Сергійович', 'Vysatii', 'password', 0, ''),
(3, 'Владислав ', 'Гінжул ', 'Михайлович', 'Ginjul', 'password', 0, ''),
(4, 'Костянтин ', 'Гречанюк ', 'Вадимович', 'Grechanuk', 'password', 0, ''),
(5, 'Артем ', 'Гулий ', 'Володимирович', 'Gykii', 'password', 0, ''),
(6, 'Данііл ', 'Зайченко ', 'Романович', 'Zaichenko', 'password', 1, ''),
(7, 'Станіслав ', 'Іващенко ', 'Михайлович', 'Ivashenko', 'password', 0, ''),
(8, 'Олександра ', 'Карпенко ', 'Ігорівна', 'Karpenko', 'password', 0, ''),
(9, 'Сергій ', 'Лозович ', 'Олександрович', 'Lozovich', 'password', 0, ''),
(10, 'Дмитро ', 'Лютий ', 'Олександрович', 'Lutii', 'password', 0, ''),
(11, 'Ігор ', 'Маковей ', 'Олегович', 'Makovei', 'password', 0, ''),
(12, 'Михайло ', 'Мойсеєв ', 'Андрійович', 'Moiseev', 'password', 0, ''),
(13, 'Богдан ', 'Моргуненко ', 'Олександрович', 'Morgynenko', 'password', 0, ''),
(14, 'Дмитро ', 'Мунтян ', 'Андрійович', 'Muntyan', 'password', 0, ''),
(15, 'Вікторія ', 'Нагорська ', 'Андріївна', 'Nagorska', 'password', 0, ''),
(16, 'Олексій ', 'Нікітенко ', 'Володимирович', 'Nikitenko', 'password', 0, ''),
(17, 'Костянтин ', 'Поперногло ', 'Сергійович', 'Poperyogko', 'password', 0, ''),
(18, 'Гліб ', 'Прага-Цареградський ', 'Володимирович', 'Praga-Caregrads', 'password', 0, ''),
(19, 'Дмитро ', 'Ракоїд ', 'Володимирович', 'Rakoed', 'password', 0, ''),
(20, 'Віталій ', 'Руснак ', 'Вікторович', 'Rusnak', 'password', 0, ''),
(21, 'Олександр ', 'Сісюк ', 'Тарасович', 'Sisuk', 'password', 0, ''),
(23, 'Дмитро ', 'Скрипник ', 'Олександрович', 'Skripnik', 'password', 0, ''),
(24, 'Катерина ', 'Стальченко ', 'Андріївна', 'Stalchenko', 'password', 0, ''),
(25, 'Євген ', 'Степанов ', 'Віталійович', 'Stepanov', 'password', 0, ''),
(26, 'Анастасія ', 'Черікова ', 'Сергіївна', 'Cherikova', 'password', 0, ''),
(27, 'Олексій ', 'Чернієнко ', 'Степанович', 'Chernienko', 'password', 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `IK-1_1_03`
--

CREATE TABLE IF NOT EXISTS `IK-1_1_03` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fathername` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `access` int(11) NOT NULL,
  `special` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Дамп данных таблицы `IK-1_1_03`
--

INSERT INTO `IK-1_1_03` (`id`, `name`, `surname`, `fathername`, `login`, `password`, `access`, `special`) VALUES
(1, 'Роман ', 'Алимов ', 'Германович', 'Akimov', 'password', 0, 'іноз'),
(2, 'Поліна ', 'Барна ', 'Олегівна', 'Barna', 'password', 0, ''),
(3, 'Тарас ', 'Бондар ', 'Володимирович ', 'Bondar', 'password', 0, 'нім'),
(4, 'Михайло ', 'Булгаков ', 'Андрійович ', 'Bulgakov', 'password', 0, 'нім'),
(5, 'Дмитро ', 'Григорьєв ', 'Олександрович', 'Grigoriev', 'password', 0, ''),
(6, 'Дмитро ', 'Дарієнко ', 'Валерійович', 'Darienko', 'password', 0, ''),
(7, 'Ярослав ', 'Дмитрук ', 'Вадимович', 'Dmitruk', 'password', 0, ''),
(8, 'Олександр ', 'Жигайло ', 'Юрійович', 'Jigailo', 'password', 0, ''),
(9, 'Семен ', 'Іванов ', 'Георгійович', 'Ivanov', 'password', 0, ''),
(10, 'Шемшат ', 'Іллекова ', '', 'Illekova', 'password', 0, 'іноз'),
(11, 'Валерія ', 'Караваєва ', 'Вячеславівна', 'Karavaeva', 'password', 0, ''),
(12, 'Максим ', 'Краєвський ', 'Володимирович', 'Kraevskii', 'password', 0, ''),
(13, 'Вячеслав ', 'Кричун ', 'Сергійович', 'Krichun', 'password', 0, ''),
(14, 'Микола ', 'Курілов ', 'Сергійович', 'Kurilov', 'password', 0, ''),
(15, 'Владислав ', 'Личко ', 'Віталійович', 'Lichko', 'password', 0, ''),
(16, 'Валентин ', 'Лутай ', 'Олександрович', 'Lutai', 'password', 0, ''),
(17, 'Дмитро ', 'Младінов ', 'Панасович', 'Malandiv', 'password', 0, ''),
(18, 'Олександр ', 'Ніколаєв ', 'Іванович', 'Hikolaev', 'password', 0, ''),
(19, 'Олександр ', 'Поліщук ', 'Вячеславович', 'Polishuk', 'password', 0, ''),
(20, 'Максим ', 'Сандовський ', 'Павлович', 'Sandovskii', 'password', 0, ''),
(21, 'Андрій ', 'Уретор ', 'Михайлович ', 'Yretor', 'password', 0, 'нім'),
(22, 'Ігор ', 'Чеботар ', 'Олександрович', 'Chebotar', 'password', 0, ''),
(23, 'Андрій ', 'Шапочка ', 'Олегович   ', 'Shapochka', 'password', 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `IK-1_1_04i`
--

CREATE TABLE IF NOT EXISTS `IK-1_1_04i` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fathername` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `access` int(11) NOT NULL,
  `special` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `IK-1_1_04i`
--

INSERT INTO `IK-1_1_04i` (`id`, `name`, `surname`, `fathername`, `login`, `password`, `access`, `special`) VALUES
(1, 'Расул', 'Валізаде ', '', 'Valizale', 'password', 0, ''),
(2, 'Хідаят', 'Керімов ', '', 'Kerimov', 'password', 0, ''),
(3, 'Імамаддін', 'Мікаіли ', '', 'Mikaili', 'password', 0, ''),
(4, 'Маммад', 'Насіблі ', '', 'Nasibli', 'password', 0, ''),
(5, 'Єльвін', 'Рахімов ', '', 'Raximov', 'password', 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `IK-2_1_01`
--

CREATE TABLE IF NOT EXISTS `IK-2_1_01` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fathername` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `access` int(11) NOT NULL,
  `speсial` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Дамп данных таблицы `IK-2_1_01`
--

INSERT INTO `IK-2_1_01` (`id`, `Name`, `surname`, `fathername`, `login`, `password`, `access`, `speсial`) VALUES
(1, 'Вікторія ', 'Антименюк ', 'Леонідівна', 'Antimentik', 'password', 0, ''),
(2, 'Сергій ', 'Албур ', 'Володимирович ', 'Albur', 'password', 0, ''),
(3, 'Ганна ', 'Вершинська ', 'Олегівна', 'Vershenska', 'password', 0, ''),
(4, 'Владислав ', 'Гініятуллін ', 'Русланович', 'Giniyatylliy', 'password', 0, ''),
(5, 'Герман ', 'Данильченко ', 'Володимирович', 'Danilxhenko', 'password', 0, ''),
(6, 'Анна ', 'Журавльова ', 'Андріївна', 'Juravlova', 'password', 0, ''),
(7, 'Євгенія ', 'Журбенко ', 'Олександрівна', 'Jurbenko', 'password', 0, ''),
(8, 'Олег ', 'Іванько ', 'Віталійович', 'Ivanko', 'password', 0, ''),
(9, 'Анастасія ', 'Кобильнік ', 'Олександрівна', 'Kobilnsk', 'password', 0, ''),
(10, 'Олександр ', 'Косенко ', 'Олександрович', 'Kosenko', 'password', 0, ''),
(11, 'Андрій ', 'Лемещук ', 'Олегович', 'Lemeshuk', 'password', 1, ''),
(12, 'Павло ', 'Лозінський ', 'Сергійович', 'Lozinskii', 'password', 0, ''),
(13, 'Віктор ', 'Люба ', 'Олексійович', 'Luba', 'password', 0, ''),
(14, 'Вікторія ', 'Максимова ', 'Владиславівна', 'Maksimova', 'password', 0, ''),
(15, 'Вадим ', 'Осадченко ', 'Ігорович', 'Osadchenko', 'password', 0, ''),
(16, 'Артур ', 'Примаков ', 'Олександрович', 'Primakov', 'password', 0, ''),
(17, 'Михайло ', 'Серенков ', 'Володимирович', 'Sehenkov', 'password', 0, ''),
(18, 'Ольга ', 'Смірнова ', 'Олександрівна', 'Smsrnova', 'password', 0, ''),
(19, 'Назар ', 'Снігур ', 'Орестович', 'Snigur', 'password', 0, ''),
(20, 'Ярослав ', 'Тупій ', 'Ігорович', 'Tupii', 'password', 0, ''),
(21, 'Володимир ', 'Хімічук ', 'Миколайович', 'Ximichuk', 'password', 0, ''),
(22, 'Владислав ', 'Шептунов ', 'Валерійович', 'Sheptunov', 'password', 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `IK-2_1_02`
--

CREATE TABLE IF NOT EXISTS `IK-2_1_02` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fathername` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `access` int(11) NOT NULL,
  `special` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Дамп данных таблицы `IK-2_1_02`
--

INSERT INTO `IK-2_1_02` (`id`, `name`, `surname`, `fathername`, `login`, `password`, `access`, `special`) VALUES
(1, 'Андрій', 'Боднар ', 'Павлович', 'Bondar', 'password', 0, ''),
(2, 'Олександра ', 'Буза ', 'Віталіївна ', 'Byza', 'password', 0, 'Контр'),
(3, 'Андрій ', 'Глєба ', 'Михайлович   ', 'Gleba', 'password', 0, ''),
(4, 'Дмитро ', 'Івасенко ', 'Сергійович   ', 'Ivasenko', 'password', 0, ''),
(5, 'Мирослав ', 'Копитов ', 'Станіславович', 'Kopitov', 'password', 0, ''),
(6, 'Євгеній ', 'Косолапов ', 'Олександрович', 'Kosolapov ', 'password', 0, ''),
(7, 'Іван ', 'Котовський ', 'Русланович', 'Kotovskii', 'password', 0, ''),
(8, 'Віктор ', 'Лівадідіс ', 'Миколайович ', 'Livadidas', 'password', 0, 'Контр'),
(9, 'Юлія ', 'Лілова ', 'Олександрівна', 'Lilova', 'password', 0, ''),
(10, 'Руслан ', 'Охньовський ', 'Андрійович', 'Oxnivskii', 'password', 0, ''),
(11, 'Максим ', 'П’ятов ', 'Сергійович     ', 'Pyatov', 'password', 0, 'Контр'),
(12, 'Вадим ', 'Поліщук ', 'Павлович', 'Polichuk', 'password', 0, ''),
(13, 'Євген ', 'Порублєв ', 'Олександрович ', 'Porublev', 'password', 0, 'Контр'),
(14, 'Михайло ', 'Рак ', 'Олександрович  ', 'Rak', 'password', 0, ''),
(15, 'Ксенія ', 'Рихлік ', 'Олександрівна ', 'Rixlik', 'password', 0, ''),
(16, 'Юлія ', 'Сарабейська ', 'Віталіївна', 'Sahabeiska', 'password', 0, ''),
(17, 'Таїсія ', 'Сизоненко ', 'Леонідівна', 'Sizonenko', 'password', 0, ''),
(18, 'Віктор ', 'Скворцов ', 'Віталійович ', 'Skvorcov', 'password', 0, 'Контр'),
(19, 'Павло ', 'Федосєєв ', 'Анатолійович', 'Fedoseev', 'password', 0, ''),
(20, 'Віталій ', 'Шишмарьов ', 'Володимирович', 'SHishmarov', 'password', 0, ''),
(21, 'Ігор ', 'Щербаков ', 'Максимович', 'Sherbakov', 'password', 1, ''),
(22, 'Олег ', 'Ярошенко ', 'Михайлович', 'Yaroshenko', 'password', 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `IK-2_1_03`
--

CREATE TABLE IF NOT EXISTS `IK-2_1_03` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fathername` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `access` int(11) NOT NULL,
  `speсial` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Дамп данных таблицы `IK-2_1_03`
--

INSERT INTO `IK-2_1_03` (`id`, `name`, `surname`, `fathername`, `login`, `password`, `access`, `speсial`) VALUES
(1, 'Іван ', 'Бабаян ', 'Іванович', 'Babayan', 'password', 0, ''),
(2, 'Дмитро ', 'Блохов ', 'Валерійович ', 'Bloxov', 'password', 0, 'к'),
(3, 'Едуард ', 'Буняк ', 'Ігорович', 'Bynyak', 'password', 0, ''),
(4, 'Владислав ', 'Глущенко ', 'Олександрович', 'Glushenko', 'password', 0, ''),
(5, 'Костянтин ', 'Григор’єв ', 'Володимирович', 'Grigoriev', 'password', 0, ''),
(6, 'Михайло ', 'Драпеза ', 'Вячеславович', 'Drapeza', 'password', 0, ''),
(7, 'Павло ', 'Дробік ', 'Олегович ', 'Dribik', 'password', 0, 'к'),
(8, 'Ірина ', 'Зубцова ', 'Олексіївна', 'Zybcova', 'password', 0, ''),
(9, 'Денис ', 'Каражей ', 'Ігорович', 'Karajai', 'password', 0, ''),
(10, 'Олена ', 'Короткова ', 'Максимівна', 'Korotkova', 'password', 0, ''),
(11, 'Григорій ', 'Кучерук ', 'Олександрович ', 'Kycheryk', 'password', 0, 'к'),
(12, 'Михайло ', 'Кушніков ', 'Ілліч', 'Kyshnikov', 'password', 0, ''),
(13, 'Карина ', 'Латипова ', 'Тимурівна', 'Latipova', 'password', 0, ''),
(14, 'Володимир ', 'Лебедєв ', 'Станіславович ', 'Lebedev', 'password', 0, 'к'),
(15, 'Андрій ', 'Мишньов ', 'Русланович  ', 'Mishyov', 'password', 0, 'к'),
(16, 'Світлана ', 'Осипенко ', 'Сергіївна', 'Osipenko', 'password', 0, ''),
(17, 'Назар ', 'Подоляк ', 'Володимирович  ', 'Podolyak', 'password', 0, 'к'),
(18, 'Андрій ', 'Свириденко ', 'Ігорович', 'Sviridenko', 'password', 1, ''),
(19, 'Владислав ', 'Сергєєв ', 'Юрійович', 'Sergeev', 'password', 0, ''),
(20, 'Леонід ', 'Стефанов ', 'Зіновійович', 'Stefanov', 'password', 0, ''),
(21, 'Микола ', 'Чугуєв ', 'Володимирович ', 'Chuguev', 'password', 0, 'к');

-- --------------------------------------------------------

--
-- Структура таблицы `IK-2_1_04`
--

CREATE TABLE IF NOT EXISTS `IK-2_1_04` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fathername` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `access` int(11) NOT NULL,
  `speсial` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `IK-2_1_04`
--

INSERT INTO `IK-2_1_04` (`id`, `name`, `surname`, `fathername`, `login`, `password`, `access`, `speсial`) VALUES
(1, 'Віктор ', 'Анісімов ', 'Олександрович  ', 'Anisimov', 'password', 0, ''),
(2, 'Катерина ', 'Бабкіна ', 'Вікторівна  ', 'Babkina', 'password', 1, ''),
(3, 'Станіслав ', 'Баранніков ', 'Володимирович   ', 'Barannikov', 'password', 0, ''),
(4, 'Микита ', 'Буштян ', 'Сергійович  ', 'Byshtyan', 'password', 0, ''),
(5, 'Поліна ', 'Вдовиченко ', 'Олександрівна  ', 'Vdovichenko', 'password', 0, ''),
(6, 'Іван ', 'Волинський ', 'Олегович ', 'Volinskii', 'password', 0, 'к'),
(7, 'Ігор ', 'Гориця ', 'Валентинович', 'Goricya', 'password', 0, ''),
(8, 'Іван ', 'Дерлі ', 'Анатолійович ', 'Derli', 'password', 0, 'к'),
(9, 'Сергій ', 'Дімов ', 'Іванович  ', 'Dimov', 'password', 0, ''),
(10, 'Валерія ', 'Кириллова ', 'Володимирівна', 'Kirrilova', 'password', 0, ''),
(11, 'Антон ', 'Кіка ', 'Вікторович     ', 'Kika', 'password', 0, 'к'),
(12, 'Сергій ', 'Коваленко ', 'Сергійович', 'Kovalenko', 'password', 0, ''),
(13, 'Ігор ', 'Ковальчук ', 'Андрійович ', 'Kovalchuk', 'password', 0, 'к'),
(14, 'Владислав ', 'Кулігін ', 'Олександрович', 'Kyligin', 'password', 0, ''),
(15, 'Юрій ', 'Куприйчук ', 'Вікторович ', 'Kypriichuk', 'password', 0, 'к'),
(16, 'Вадим ', 'Молодченко ', 'Вадимович', 'Molodchenko', 'password', 0, ''),
(17, 'Анастасія ', 'Повітчан ', 'Вадимівна', 'Povitchan', 'password', 0, ''),
(18, 'Анастасія ', 'Сапега ', 'Олександрівна', 'Sapega', 'password', 0, ''),
(19, 'Євгеній ', 'Цуркан ', 'Валерійович', 'Cyrkan', 'password', 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `IK-2_1_05i`
--

CREATE TABLE IF NOT EXISTS `IK-2_1_05i` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fathername` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `access` int(11) NOT NULL,
  `speсial` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `IK-2_1_05i`
--

INSERT INTO `IK-2_1_05i` (`id`, `name`, `surname`, `fathername`, `login`, `password`, `access`, `speсial`) VALUES
(1, 'Хафіз ', 'Алашрафзаде ', '', 'Alshafazade', 'password', 0, 'іноз'),
(2, 'Леонел ', 'Баррос ', '', 'Barros', 'password', 0, 'іноз'),
(3, 'Татіана ', 'Бока ', '', 'Boka', 'password', 1, 'іноз'),
(4, 'Ількін ', 'Гаджізаде ', '', 'Gadjizade', 'password', 0, 'іноз'),
(5, 'Мурад ', 'Іскендерлі ', '', 'Iskenderli', 'password', 0, 'іноз'),
(6, 'Гурбан ', 'Мурадзаде ', '', 'Myradzade', 'password', 0, 'іноз'),
(7, 'Жозе ', 'Педро ', 'Сімао ', 'Pedro', 'password', 0, 'іноз'),
(8, 'Аіртон ', 'Себастіао ', 'Валтер ', 'Sebactiao', 'password', 0, 'іноз'),
(9, 'Рашад ', 'Тагієв ', '', 'Tagiev', 'password', 0, 'іноз');

-- --------------------------------------------------------

--
-- Структура таблицы `jurnal`
--

CREATE TABLE IF NOT EXISTS `jurnal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `day` int(10) NOT NULL,
  `month` int(10) NOT NULL,
  `active` text COLLATE utf8_unicode_ci NOT NULL,
  `access` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=40 ;

--
-- Дамп данных таблицы `jurnal`
--

INSERT INTO `jurnal` (`id`, `group`, `day`, `month`, `active`, `access`) VALUES
(39, 'IK-2_1_02', 1, 12, '1 1 1 1 1 1 1 1 1 1 1 1 1 0 1 1 1 1 1 1 1 1 1 1 1 0 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 ', 2),
(33, 'PI-2_1_01', 4, 11, '0 0 0 2 2 1 2 2 1 0 0 1 0 0 1 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 ', 2),
(34, 'PI-2_1_01', 9, 11, '1 0 1 0 1 0 1 0 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 ', 2),
(35, 'PI-2_1_01', 18, 11, '1 1 1 1 1 2 1 1 2 1 1 1 1 1 0 1 1 0 1 1 1 1 1 0 1 1 0 1 1 0 1 1 1 1 1 1 1 1 1 1 1 1 1 1 0 1 1 0 1 1 1 1 1 1 1 1 1 ', 2),
(36, 'PI-2_1_01', 1, 12, '1 1 1 1 1 1 1 1 1 1 1 2 1 1 0 1 1 0 1 1 0 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 ', 3),
(37, 'PI-2_1_01', 2, 12, '1 1 0 1 1 2 1 1 0 1 1 0 1 1 2 1 1 0 1 1 2 1 1 0 1 1 0 1 1 1 1 1 0 1 1 0 1 1 0 1 1 0 1 1 0 1 1 0 1 1 0 1 1 0 1 1 0 ', 2),
(38, 'PI-1_1_01', 2, 12, '1 0 1 1 0 1 1 0 1 1 0 1 1 0 1 1 0 1 1 0 1 1 0 1 1 0 1 1 0 1 1 0 1 1 0 1 1 0 1 1 0 1 1 0 1 1 0 1 1 0 1 1 0 1 1 0 1 1 1 1 1 0 1 1 0 1 1 0 1 ', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `table` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `change` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `edit_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=205 ;

--
-- Дамп данных таблицы `logs`
--

INSERT INTO `logs` (`id`, `date`, `table`, `login`, `data`, `change`, `edit_id`) VALUES
(2, '2015-10-29 17:43:38', 'jurnal', 'Decanat', 'active access', 'edit', 21),
(3, '2015-10-29 23:25:52', 'jurnal', 'Teacher', 'active access', 'edit', 21),
(4, '2015-10-29 23:25:55', 'jurnal', 'Teacher', 'active access', 'edit', 21),
(5, '2015-10-29 23:26:01', 'jurnal', 'Teacher', 'active access', 'edit', 21),
(6, '2015-10-29 23:28:19', 'jurnal', 'Teacher', 'active access', 'edit', 21),
(7, '2015-10-29 23:29:47', 'jurnal', 'Teacher', 'active access', 'edit', 21),
(8, '2015-10-29 23:29:48', 'jurnal', 'Teacher', 'active access', 'edit', 21),
(9, '2015-10-29 23:29:49', 'jurnal', 'Teacher', 'active access', 'edit', 21),
(10, '2015-10-29 23:29:51', 'jurnal', 'Teacher', 'active access', 'edit', 21),
(11, '2015-10-29 23:29:57', 'jurnal', 'Teacher', 'active access', 'edit', 21),
(12, '2015-10-29 23:30:11', 'jurnal', 'Teacher', 'active access', 'edit', 21),
(13, '2015-10-29 23:30:17', 'jurnal', 'Teacher', 'active access', 'edit', 21),
(14, '2015-10-29 23:30:18', 'jurnal', 'Teacher', 'active access', 'edit', 21),
(15, '2015-10-29 23:30:20', 'jurnal', 'Teacher', 'active access', 'edit', 21),
(16, '2015-10-29 23:30:27', 'jurnal', 'Teacher', 'active access', 'edit', 21),
(17, '2015-10-29 23:31:41', 'jurnal', 'Teacher', 'active access', 'edit', 21),
(18, '2015-10-29 23:31:45', 'jurnal', 'Teacher', 'active access', 'edit', 21),
(19, '2015-10-30 08:01:13', 'jurnal', 'Teacher', 'active access', 'edit', 22),
(20, '2015-10-30 08:01:21', 'jurnal', 'Teacher', 'active access', 'edit', 22),
(21, '2015-10-30 09:55:35', 'jurnal', 'Teacher', 'active access', 'edit', 21),
(22, '2015-10-30 10:11:29', 'jurnal', 'Teacher', 'active access', 'edit', 22),
(23, '2015-10-30 10:13:26', 'jurnal', 'Teacher', 'active access', 'edit', 22),
(24, '2015-10-31 15:17:10', 'jurnal', 'Decanat', 'active', 'edit', 20),
(25, '2015-10-31 15:17:10', 'jurnal', 'Decanat', 'active', 'edit', 21),
(26, '2015-10-31 15:17:14', 'jurnal', 'Decanat', 'active', 'edit', 19),
(27, '2015-10-31 15:17:14', 'jurnal', 'Decanat', 'active', 'edit', 22),
(28, '2015-10-31 15:17:47', 'jurnal', 'Decanat', 'active', 'edit', 19),
(29, '2015-10-31 15:17:47', 'jurnal', 'Decanat', 'active', 'edit', 20),
(30, '2015-10-31 15:20:56', 'jurnal', 'Decanat', 'active', 'edit', 19),
(31, '2015-10-31 15:20:56', 'jurnal', 'Decanat', 'active', 'edit', 20),
(32, '2015-10-31 15:21:18', 'jurnal', 'Decanat', 'active', 'edit', 19),
(33, '2015-10-31 15:21:18', 'jurnal', 'Decanat', 'active', 'edit', 20),
(34, '2015-10-31 15:21:19', 'jurnal', 'Decanat', 'active', 'edit', 19),
(35, '2015-10-31 15:21:19', 'jurnal', 'Decanat', 'active', 'edit', 20),
(36, '2015-10-31 15:23:06', 'jurnal', 'Decanat', 'active', 'edit', 21),
(37, '2015-10-31 15:23:06', 'jurnal', 'Decanat', 'active', 'edit', 22),
(38, '2015-10-31 15:23:31', 'jurnal', 'Decanat', 'active', 'edit', 20),
(39, '2015-10-31 15:23:31', 'jurnal', 'Decanat', 'active', 'edit', 21),
(40, '2015-10-31 15:29:55', 'jurnal', 'Decanat', 'active', 'edit', 21),
(41, '2015-10-31 15:33:48', 'jurnal', 'Decanat', 'active', 'edit', 20),
(42, '2015-10-31 15:33:48', 'jurnal', 'Decanat', 'active', 'edit', 21),
(43, '2015-10-31 15:35:40', 'jurnal', 'Decanat', 'active', 'edit', 20),
(44, '2015-10-31 15:35:40', 'jurnal', 'Decanat', 'active', 'edit', 21),
(45, '2015-10-31 15:39:12', 'jurnal', 'Decanat', 'active', 'edit', 20),
(46, '2015-10-31 15:39:12', 'jurnal', 'Decanat', 'active', 'edit', 21),
(47, '2015-10-31 15:41:24', 'jurnal', 'Decanat', 'active', 'edit', 20),
(48, '2015-10-31 15:41:24', 'jurnal', 'Decanat', 'active', 'edit', 21),
(49, '2015-10-31 15:42:03', 'jurnal', 'Decanat', 'active', 'edit', 20),
(50, '2015-10-31 15:42:03', 'jurnal', 'Decanat', 'active', 'edit', 21),
(51, '2015-10-31 15:42:05', 'jurnal', 'Decanat', 'active', 'edit', 19),
(52, '2015-10-31 15:42:05', 'jurnal', 'Decanat', 'active', 'edit', 22),
(53, '2015-10-31 15:42:08', 'jurnal', 'Decanat', 'active', 'edit', 19),
(54, '2015-10-31 15:42:08', 'jurnal', 'Decanat', 'active', 'edit', 22),
(55, '2015-10-31 15:42:12', 'jurnal', 'Decanat', 'active', 'edit', 22),
(56, '2015-10-31 15:42:15', 'jurnal', 'Decanat', 'active', 'edit', 22),
(57, '2015-10-31 15:42:18', 'jurnal', 'Decanat', 'active', 'edit', 19),
(58, '2015-10-31 15:42:18', 'jurnal', 'Decanat', 'active', 'edit', 22),
(59, '2015-10-31 15:42:21', 'jurnal', 'Decanat', 'active', 'edit', 19),
(60, '2015-10-31 15:42:21', 'jurnal', 'Decanat', 'active', 'edit', 22),
(61, '2015-10-31 15:42:26', 'jurnal', 'Decanat', 'active', 'edit', 19),
(62, '2015-10-31 15:42:26', 'jurnal', 'Decanat', 'active', 'edit', 22),
(63, '2015-10-31 15:42:28', 'jurnal', 'Decanat', 'active', 'edit', 19),
(64, '2015-10-31 15:42:28', 'jurnal', 'Decanat', 'active', 'edit', 22),
(65, '2015-10-31 15:45:10', 'jurnal', 'Decanat', 'active', 'edit', 20),
(66, '2015-10-31 15:45:16', 'jurnal', 'Decanat', 'active', 'edit', 20),
(67, '2015-10-31 15:46:11', 'jurnal', 'Decanat', 'active', 'edit', 20),
(68, '2015-10-31 15:46:14', 'jurnal', 'Decanat', 'active', 'edit', 19),
(69, '2015-10-31 15:46:18', 'jurnal', 'Decanat', 'active', 'edit', 20),
(70, '2015-10-31 15:46:23', 'jurnal', 'Decanat', 'active', 'edit', 20),
(71, '2015-10-31 15:46:23', 'jurnal', 'Decanat', 'active', 'edit', 21),
(72, '2015-10-31 15:49:21', 'jurnal', 'Decanat', 'active', 'edit', 19),
(73, '2015-10-31 15:49:21', 'jurnal', 'Decanat', 'active', 'edit', 20),
(74, '2015-10-31 15:49:21', 'jurnal', 'Decanat', 'active', 'edit', 21),
(75, '2015-10-31 15:49:24', 'jurnal', 'Decanat', 'active', 'edit', 19),
(76, '2015-10-31 15:49:24', 'jurnal', 'Decanat', 'active', 'edit', 22),
(77, '2015-10-31 15:49:26', 'jurnal', 'Decanat', 'active', 'edit', 19),
(78, '2015-10-31 15:49:26', 'jurnal', 'Decanat', 'active', 'edit', 22),
(79, '2015-10-31 15:50:26', 'jurnal', 'Decanat', 'active', 'edit', 20),
(80, '2015-10-31 15:50:28', 'jurnal', 'Decanat', 'active', 'edit', 21),
(81, '2015-10-31 15:50:30', 'jurnal', 'Decanat', 'active', 'edit', 20),
(82, '2015-10-31 15:50:30', 'jurnal', 'Decanat', 'active', 'edit', 21),
(83, '2015-10-31 15:51:05', 'jurnal', 'Decanat', 'active', 'edit', 20),
(84, '2015-10-31 15:51:05', 'jurnal', 'Decanat', 'active', 'edit', 21),
(85, '2015-10-31 15:54:07', 'jurnal', 'Decanat', 'active', 'edit', 21),
(86, '2015-10-31 15:58:13', 'jurnal', 'Decanat', 'active', 'edit', 21),
(87, '2015-10-31 16:02:03', 'jurnal', 'Teacher', 'active access', 'edit', 20),
(88, '2015-10-31 16:24:04', 'jurnal', 'Teacher', 'active access', 'edit', 20),
(89, '2015-10-31 16:29:04', 'jurnal', 'Teacher', 'active access', 'edit', 20),
(90, '2015-10-31 16:33:02', 'jurnal', 'Teacher', 'active access', 'edit', 20),
(91, '2015-10-31 16:42:25', 'jurnal', 'Teacher', 'active access', 'edit', 20),
(92, '2015-10-31 16:42:28', 'jurnal', 'Teacher', 'active access', 'edit', 20),
(93, '2015-10-31 16:42:31', 'jurnal', 'Teacher', 'active access', 'edit', 20),
(94, '2015-10-31 16:48:14', 'jurnal', 'Teacher', 'active access', 'edit', 20),
(95, '2015-10-31 17:08:36', 'jurnal', 'Teacher', 'active access', 'edit', 19),
(96, '2015-10-31 17:08:45', 'jurnal', 'Teacher', 'active access', 'edit', 23),
(97, '2015-10-31 17:08:59', 'jurnal', 'Teacher', 'active access', 'edit', 21),
(98, '2015-10-31 17:11:28', 'jurnal', 'Teacher', '', 'add', 0),
(99, '2015-10-31 17:11:33', 'jurnal', 'Teacher', 'active access', 'edit', 20),
(100, '2015-10-31 17:17:17', 'jurnal', 'Teacher', 'active access', 'edit', 24),
(101, '2015-10-31 17:17:26', 'jurnal', 'Teacher', '', 'add', 0),
(102, '2015-10-31 17:17:34', 'jurnal', 'Teacher', 'active access', 'edit', 25),
(103, '2015-10-31 17:17:44', 'jurnal', 'Teacher', 'active access', 'edit', 25),
(104, '2015-10-31 18:45:43', 'jurnal', 'Decanat', 'active access', 'edit', 25),
(105, '2015-10-31 18:48:24', 'jurnal', 'Teacher', '', 'add', 0),
(106, '2015-10-31 18:48:48', 'jurnal', 'Teacher', '', 'add', 0),
(107, '2015-10-31 20:40:01', 'jurnal', 'Decanat', 'active', 'edit', 27),
(108, '2015-10-31 20:40:24', 'jurnal', 'Decanat', 'active', 'edit', 27),
(109, '2015-10-31 20:40:30', 'jurnal', 'Decanat', 'active', 'edit', 26),
(110, '2015-10-31 20:40:30', 'jurnal', 'Decanat', 'active', 'edit', 27),
(111, '2015-10-31 20:40:33', 'jurnal', 'Decanat', 'active', 'edit', 26),
(112, '2015-10-31 20:40:33', 'jurnal', 'Decanat', 'active', 'edit', 27),
(113, '2015-10-31 20:40:37', 'jurnal', 'Decanat', 'active', 'edit', 26),
(114, '2015-10-31 20:40:37', 'jurnal', 'Decanat', 'active', 'edit', 27),
(115, '2015-10-31 21:06:22', 'jurnal', 'Decanat', 'active', 'edit', 27),
(116, '2015-10-31 21:06:24', 'jurnal', 'Decanat', 'active', 'edit', 26),
(117, '2015-10-31 21:06:24', 'jurnal', 'Decanat', 'active', 'edit', 27),
(118, '2015-10-31 21:06:26', 'jurnal', 'Decanat', 'active', 'edit', 27),
(119, '2015-10-31 21:06:29', 'jurnal', 'Decanat', 'active', 'edit', 26),
(120, '2015-10-31 21:06:29', 'jurnal', 'Decanat', 'active', 'edit', 27),
(121, '2015-10-31 21:06:31', 'jurnal', 'Decanat', 'active', 'edit', 26),
(122, '2015-10-31 21:06:31', 'jurnal', 'Decanat', 'active', 'edit', 27),
(123, '2015-10-31 21:06:34', 'jurnal', 'Decanat', 'active', 'edit', 27),
(124, '2015-10-31 21:06:36', 'jurnal', 'Decanat', 'active', 'edit', 26),
(125, '2015-10-31 21:06:36', 'jurnal', 'Decanat', 'active', 'edit', 27),
(126, '2015-10-31 21:08:10', 'jurnal', 'Decanat', 'active', 'edit', 29),
(127, '2015-10-31 21:08:10', 'jurnal', 'Decanat', 'active', 'edit', 28),
(128, '2015-10-31 21:08:13', 'jurnal', 'Decanat', 'active', 'edit', 29),
(129, '2015-10-31 21:08:13', 'jurnal', 'Decanat', 'active', 'edit', 28),
(130, '2015-10-31 21:08:13', 'jurnal', 'Decanat', 'active', 'edit', 27),
(131, '2015-10-31 21:08:15', 'jurnal', 'Decanat', 'active', 'edit', 29),
(132, '2015-10-31 21:08:25', 'jurnal', 'Decanat', 'active', 'edit', 28),
(133, '2015-10-31 21:08:28', 'jurnal', 'Decanat', 'active', 'edit', 29),
(134, '2015-10-31 21:08:28', 'jurnal', 'Decanat', 'active', 'edit', 27),
(135, '2015-10-31 21:08:31', 'jurnal', 'Decanat', 'active', 'edit', 29),
(136, '2015-10-31 21:08:33', 'jurnal', 'Decanat', 'active', 'edit', 27),
(137, '2015-10-31 21:14:52', 'jurnal', 'Decanat', 'active', 'edit', 29),
(138, '2015-10-31 21:14:56', 'jurnal', 'Decanat', 'active', 'edit', 29),
(139, '2015-10-31 21:15:40', 'jurnal', 'Decanat', 'active', 'edit', 27),
(140, '2015-10-31 21:15:44', 'jurnal', 'Decanat', 'active', 'edit', 27),
(141, '2015-11-01 09:09:20', 'jurnal', 'Teacher', 'active access', 'edit', 27),
(142, '2015-11-01 09:09:23', 'jurnal', 'Teacher', 'active access', 'edit', 27),
(143, '2015-11-01 09:09:29', 'jurnal', 'Teacher', 'active access', 'edit', 27),
(144, '2015-11-01 09:09:32', 'jurnal', 'Teacher', 'active access', 'edit', 27),
(145, '2015-11-01 09:11:59', 'jurnal', 'Teacher', 'active access', 'edit', 27),
(146, '2015-11-01 09:14:47', 'jurnal', 'Teacher', 'active access', 'edit', 27),
(147, '2015-11-01 09:15:01', 'jurnal', 'Teacher', 'active access', 'edit', 27),
(148, '2015-11-01 12:15:53', 'jurnal', 'Decanat', 'active', 'edit', 30),
(149, '2015-11-01 12:15:57', 'jurnal', 'Decanat', 'active', 'edit', 30),
(150, '2015-11-02 12:32:14', 'jurnal', 'Teacher', 'active access', 'edit', 30),
(151, '2015-11-02 12:41:39', 'jurnal', 'Teacher', 'active access', 'edit', 30),
(152, '2015-11-02 12:41:47', 'jurnal', 'Teacher', 'active access', 'edit', 30),
(153, '2015-11-02 12:41:52', 'jurnal', 'Teacher', 'active access', 'edit', 30),
(154, '2015-11-02 12:42:01', 'jurnal', 'Teacher', 'active access', 'edit', 30),
(155, '2015-11-02 12:42:02', 'jurnal', 'Teacher', 'active access', 'edit', 30),
(156, '2015-11-02 12:43:27', 'jurnal', 'Teacher', 'active access', 'edit', 30),
(157, '2015-11-02 12:50:16', 'jurnal', 'Teacher', 'active access', 'edit', 30),
(158, '2015-11-02 12:50:21', 'jurnal', 'Teacher', 'active access', 'edit', 30),
(159, '2015-11-02 12:50:23', 'jurnal', 'Teacher', 'active access', 'edit', 30),
(160, '2015-11-02 12:50:24', 'jurnal', 'Teacher', 'active access', 'edit', 30),
(161, '2015-11-02 12:50:36', 'jurnal', 'Teacher', 'active access', 'edit', 30),
(162, '2015-11-04 22:41:56', 'jurnal', 'Starosta', '', 'add', 0),
(163, '2015-11-04 22:41:57', 'jurnal', 'Starosta', 'active access', 'edit', 31),
(164, '2015-11-04 22:41:58', 'jurnal', 'Starosta', 'active access', 'edit', 31),
(165, '2015-11-04 22:41:58', 'jurnal', 'Starosta', 'active access', 'edit', 31),
(166, '2015-11-04 22:41:59', 'jurnal', 'Starosta', 'active access', 'edit', 31),
(167, '2015-11-04 22:42:00', 'jurnal', 'Starosta', 'active access', 'edit', 31),
(168, '2015-11-04 22:42:01', 'jurnal', 'Starosta', 'active access', 'edit', 31),
(169, '2015-11-04 22:42:02', 'jurnal', 'Starosta', 'active access', 'edit', 31),
(170, '2015-11-05 07:32:14', 'jurnal', 'Teacher', '', 'add', 0),
(171, '2015-11-05 07:32:43', 'jurnal', 'Teacher', 'active access', 'edit', 32),
(172, '2015-11-05 07:32:56', 'jurnal', 'Teacher', 'active access', 'edit', 32),
(173, '2015-11-05 07:32:57', 'jurnal', 'Teacher', 'active access', 'edit', 32),
(174, '2015-11-05 07:34:17', 'jurnal', 'Teacher', 'active access', 'edit', 32),
(175, '2015-11-05 11:23:59', 'jurnal', 'Teacher', 'active access', 'edit', 32),
(176, '2015-11-09 11:58:22', 'jurnal', 'Korablinova', '', 'add', 0),
(177, '2015-11-13 09:53:19', 'jurnal', 'Korablinova', '', 'add', 0),
(178, '2015-11-18 13:09:01', 'jurnal', 'Korablinova', '', 'add', 0),
(179, '2015-11-18 13:12:21', 'jurnal', 'Korablinova', 'active access', 'edit', 35),
(180, '2015-11-18 13:12:59', 'jurnal', 'Korablinova', 'active access', 'edit', 35),
(181, '2015-11-18 13:13:01', 'jurnal', 'Korablinova', 'active access', 'edit', 35),
(182, '2015-11-18 13:13:05', 'jurnal', 'Korablinova', 'active access', 'edit', 35),
(183, '2015-11-18 13:17:30', 'jurnal', 'Korablinova', 'active access', 'edit', 35),
(184, '2015-11-29 11:10:03', 'jurnal', 'Decanat', 'active', 'edit', 33),
(185, '2015-11-29 11:11:27', 'jurnal', 'Decanat', 'active', 'edit', 33),
(186, '2015-11-29 11:11:27', 'jurnal', 'Decanat', 'active', 'edit', 35),
(187, '2015-11-29 11:16:07', 'jurnal', 'Decanat', 'active', 'edit', 33),
(188, '2015-11-29 11:16:10', 'jurnal', 'Decanat', 'active', 'edit', 35),
(189, '2015-12-01 14:41:15', 'jurnal', 'Korablinova', '', 'add', 0),
(190, '2015-12-01 15:21:11', 'jurnal', 'Decanat', 'active access', 'edit', 36),
(191, '2015-12-01 15:21:18', 'jurnal', 'Decanat', 'active access', 'edit', 36),
(192, '2015-12-01 15:22:02', 'jurnal', 'Decanat', 'active', 'edit', 36),
(193, '2015-12-01 16:30:53', 'jurnal', 'Decanat', 'active', 'edit', 36),
(194, '2015-12-01 16:30:55', 'jurnal', 'Decanat', 'active', 'edit', 36),
(195, '2015-12-01 16:31:04', 'jurnal', 'Decanat', 'active', 'edit', 34),
(196, '2015-12-01 16:31:19', 'jurnal', 'Decanat', 'active', 'edit', 33),
(197, '2015-12-01 16:31:19', 'jurnal', 'Decanat', 'active', 'edit', 34),
(198, '2015-12-02 06:58:15', 'jurnal', 'Korablinova', '', 'add', 0),
(199, '2015-12-02 06:58:25', 'jurnal', 'Korablinova', 'active access', 'edit', 37),
(200, '2015-12-02 08:43:53', 'jurnal', 'Universal', '', 'add', 0),
(201, '2015-12-02 08:44:36', 'jurnal', 'Decanat', 'active', 'edit', 37),
(202, '2015-12-02 08:44:44', 'jurnal', 'Decanat', 'active', 'edit', 37),
(203, '2015-12-02 08:44:52', 'jurnal', 'Decanat', 'active', 'edit', 37),
(204, '2015-12-02 09:21:17', 'jurnal', 'Universal', '', 'add', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `parents`
--

CREATE TABLE IF NOT EXISTS `parents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foreign_key` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fathername` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `access` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `parents`
--

INSERT INTO `parents` (`id`, `foreign_key`, `name`, `surname`, `fathername`, `login`, `password`, `access`) VALUES
(1, 'PI_2_1_01|29', 'мамa', 'виталика', '...', 'mamka', 'password', -1);

-- --------------------------------------------------------

--
-- Структура таблицы `PI-1_1_01`
--

CREATE TABLE IF NOT EXISTS `PI-1_1_01` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fathername` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `access` int(11) NOT NULL,
  `speсial` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Дамп данных таблицы `PI-1_1_01`
--

INSERT INTO `PI-1_1_01` (`id`, `name`, `surname`, `fathername`, `login`, `password`, `access`, `speсial`) VALUES
(1, 'Дмитро ', 'Андрущенко ', 'Михайлович', 'Andryshenko', 'password', 0, ''),
(2, 'Андрій ', 'Артеха ', 'Олександрович  ', 'Artexa', 'password', 0, 'к'),
(3, 'Едуард ', 'Баранюк ', 'Олегович', 'Baranuk', 'password', 0, ''),
(4, 'Марія ', 'Барміна ', 'Джимшерівна', 'Barmina', 'password', 0, ''),
(5, 'Владислав ', 'Бойко ', 'Миколайович', 'Boiko', 'password', 0, ''),
(6, 'Віталій ', 'Бондаренко ', 'Сергійович', 'Bondarenko', 'password', 0, ''),
(7, 'Микола ', 'Галенко ', 'Андрійович', 'Galenko', 'password', 0, ''),
(8, 'Іван ', 'Данилець ', 'Анатолійович', 'Danilec', 'password', 0, ''),
(9, 'Євгеній ', 'Данчук ', 'Олегович', 'Daychuk', 'password', 0, ''),
(10, 'Таїсія ', 'Жарновнікова ', 'Олександрівна', 'Jarnovnilova', 'password', 1, ''),
(11, 'Костянтин ', 'Козарев ', 'Євгенійович', 'Kozarev', 'password', 0, ''),
(12, 'Михайло ', 'Кукол ', 'Сергійович', 'Kykol', 'password', 0, ''),
(13, 'Владислав ', 'Мазуркевич ', 'Вікторович    ', 'Mazurkevich', 'password', 0, 'к'),
(14, 'Єгор ', 'Місяць ', 'Дмитрович', 'Misyac', 'password', 0, ''),
(15, 'Артем ', 'Ребров ', 'Олександрович', 'Rebrov', 'password', 0, ''),
(16, 'Сергій ', 'Рудаков ', 'Антонович', 'Rudakov', 'password', 0, ''),
(17, 'Костянтин ', 'Савко ', 'Сергійович', 'Savko', 'password', 0, ''),
(18, 'Олег ', 'Терентьєв ', 'Олексійович', 'Terentev', 'password', 0, ''),
(19, 'Юлія ', 'Хаматнурова ', 'Сергіївна     ', 'Xamatnyrova', 'password', 0, 'к'),
(20, 'Антон ', 'Чабан ', 'Сергійович', 'Chaban', 'password', 0, ''),
(21, 'Артємій ', 'Черкасов ', 'Вячеславович', 'Cherkasov', 'password', 0, ''),
(22, 'Олександр ', 'Яворський ', 'Вікторович', 'Yavorskii', 'password', 0, ''),
(23, 'Олег ', 'Якуц ', 'Віталійович', 'Yakyc', 'password', 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `PI-1_1_01_TE`
--

CREATE TABLE IF NOT EXISTS `PI-1_1_01_TE` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fathername` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `access` int(11) NOT NULL,
  `special` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=43 ;

--
-- Дамп данных таблицы `PI-1_1_01_TE`
--

INSERT INTO `PI-1_1_01_TE` (`id`, `name`, `surname`, `fathername`, `login`, `password`, `access`, `special`) VALUES
(1, 'Єгор ', 'Граматик ', 'Степанович     ', 'Gramatik', 'password', 1, ''),
(2, 'Олександр ', 'Мороз ', 'Сергійович', 'Moroz', 'password', 0, ''),
(3, 'Ярослав ', 'Пашинський ', 'Ігорович', 'Pashinskii', 'password', 0, ''),
(4, 'Микола ', 'Сакач ', 'Юлійович', 'Sakach', 'password', 0, ''),
(5, 'Артем ', 'Сидорчук ', 'Ігорович', 'Sidoechuk', 'password', 0, ''),
(6, 'Максим- Георгій ', 'Шевченко ', 'Ілліч', 'Shevchenko', 'password', 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `PI-2_1_01`
--

CREATE TABLE IF NOT EXISTS `PI-2_1_01` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fathername` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `access` int(11) NOT NULL,
  `spesial` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `PI-2_1_01`
--

INSERT INTO `PI-2_1_01` (`id`, `name`, `surname`, `fathername`, `login`, `password`, `access`, `spesial`) VALUES
(1, 'Андрій ', 'Балик ', 'Дмитрович ', 'Balik', 'password', 0, ''),
(2, 'Василь ', 'Бєляєв ', 'Юрійович ', 'Belyaev', 'password', 0, 'к'),
(3, 'Марина ', 'Васюк ', 'Вікторівна ', 'Vasuk', 'password', 0, ''),
(4, 'Денис ', 'Дворовий ', 'Русланович ', 'Dvorovii', 'password', 0, 'к'),
(5, 'Віталій ', 'Дурідівка ', 'Олегович ', 'Duridivka', 'password', 0, ''),
(6, 'Олександр ', 'Духно ', 'Юрійович ', 'Dyxno', 'password', 0, 'к'),
(7, 'Ігор ', 'Канарович ', 'Русланович ', 'Kanarovich', 'password', 0, ''),
(8, 'Олексій ', 'Кац ', 'Олександрович ', 'Kac', 'password', 0, 'к'),
(9, 'Віталій ', 'Коритко ', '', 'Koritko', 'password', 0, 'к'),
(10, 'Сергій ', 'Муравський ', 'Вячеславович ', 'Myravskii', 'password', 0, 'к'),
(11, 'Костянтин ', 'Мусорін ', 'Миколайович      ', 'Mysorin', 'password', 0, 'к'),
(12, 'Валерій ', 'Нежурьов', 'Євгенійович', 'Nejyrev', 'password', 0, ''),
(13, 'Андрій ', 'Овдєйчук', 'Андрійович', 'Ovdiechyk', 'password', 0, 'к'),
(14, 'Олександр ', 'Овсяніков', 'Андрійович', 'Ovsanikov', 'password', 0, ''),
(15, 'Олександр ', 'Пантак ', 'Сергійович ', 'Pantak', 'password', 1, ''),
(16, 'Олексій ', 'Стогнієнко ', 'Геннадійович ', 'Stognienko ', 'password', 0, 'к'),
(17, 'Ігор ', 'Халанчук ', 'Павлович ', 'Xalanchyk', 'password', 0, ''),
(18, 'Євген ', 'Шиманський ', 'Ігорович ', 'Shimanskii', 'password', 0, 'к'),
(19, 'Олександра ', 'Ясінська ', 'Юріївна', 'Yasinska', 'password', 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `PI-2_1_01_TE`
--

CREATE TABLE IF NOT EXISTS `PI-2_1_01_TE` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fathername` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `access` int(11) NOT NULL,
  `special` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `PI-2_1_01_TE`
--

INSERT INTO `PI-2_1_01_TE` (`id`, `name`, `surname`, `fathername`, `login`, `password`, `access`, `special`) VALUES
(1, 'Павло ', 'Бондарчук ', 'Миколайович ', 'Bondarchuk', 'password', 0, ''),
(2, 'В`єт Хоа ', 'Зионг ', '', 'Ziong', 'password', 0, ''),
(3, 'Микита ', 'Майєр ', 'Вікторович ', 'Maier', 'password', 0, ''),
(4, 'Максим ', 'Недялков ', 'Віталійович ', 'Nedyalkov', 'password', 0, ''),
(5, 'Валентин ', 'Онищук ', 'Вікторович ', 'Onishuk', 'password', 0, ''),
(6, 'Микола ', 'Попов ', 'Євгенійович ', 'Popov', 'password', 0, ''),
(7, 'Ксенія ', 'Теренько ', 'Андріївна', 'Terenko', 'password', 1, ''),
(8, 'Іван ', 'Чернов ', 'Анатолійович', 'Chernov', 'password', 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `TE-1_1_01`
--

CREATE TABLE IF NOT EXISTS `TE-1_1_01` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fathername` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `access` int(11) NOT NULL,
  `special` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `TE-1_1_01`
--

INSERT INTO `TE-1_1_01` (`id`, `name`, `surname`, `fathername`, `login`, `password`, `access`, `special`) VALUES
(1, 'Дмитро ', 'Воронов ', 'Олегович', 'Voronov', 'password', 1, ''),
(2, 'Андрій ', 'Гавриленко ', 'Олександрович', 'Gavarlenko', 'password', 0, ''),
(3, 'Дмитро ', 'Кушпель ', 'Михайлович', 'Kyshpel', 'password', 0, ''),
(4, 'Олег ', 'Муратков ', 'Олегович', 'Myratkov', 'password', 0, ''),
(5, 'Олександр ', 'Очереднюк ', 'Володимирович', 'Ocherednuk', 'password', 0, ''),
(6, 'Олександр ', 'Цимбалюк ', 'Олександрович', 'Cimbaluk', 'password', 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `TE-2_1_01`
--

CREATE TABLE IF NOT EXISTS `TE-2_1_01` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fathername` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `access` int(11) NOT NULL,
  `spesial` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Дамп данных таблицы `TE-2_1_01`
--

INSERT INTO `TE-2_1_01` (`id`, `name`, `surname`, `fathername`, `login`, `password`, `access`, `spesial`) VALUES
(1, 'Григорій ', 'Бистров ', 'Олегович  ', 'Bistrov', 'password', 0, ''),
(2, 'Інга ', 'Голєнєва ', 'Ігорівна  ', 'Goleneva', 'password', 0, ''),
(3, 'Ганна ', 'Горбачова ', 'Вікторівна  ', 'Gorbachova', 'password', 0, ''),
(4, 'Олексій ', 'Деменніков ', 'Андрійович  ', 'Demennikov', 'password', 0, ''),
(5, 'Денис ', 'Денисенко ', 'Сергійович   ', 'Deyisenko', 'password', 0, ''),
(6, 'Наталія ', 'Касько ', 'Іванівна  ', 'Kasko', 'password', 0, ''),
(7, 'Ірина ', 'Кириченко ', 'Олександрівна', 'Kirichenko', 'password', 0, ''),
(8, 'Кирило ', 'Кодимський ', 'Анатолійович  ', 'Kodimskii', 'password', 0, ''),
(9, 'Наталія ', 'Копієвська ', 'Сергіївна', 'Kopievskaya', 'password', 0, ''),
(10, 'Вікторія ', 'Красова ', 'Андріївна  ', 'Krasnova', 'password', 0, ''),
(11, 'Андрій ', 'Курінний ', 'Сергійович   ', 'Kyrinnii', 'password', 0, ''),
(12, 'Костянтин ', 'Луценко ', 'Віталійович   ', 'Lucenko', 'password', 0, ''),
(13, 'Анастасія ', 'Микульська ', 'Олегівна   ', 'Mikylska', 'password', 0, ''),
(14, 'Володимир ', 'Отченаш ', 'Сергійович  ', 'Otchenash', 'password', 0, ''),
(15, 'Мирослав ', 'Перфільєв ', 'Веденійович ', 'Perfilev', 'password', 0, ''),
(16, 'Юлія ', 'Рябова ', 'Дмитрівна  ', 'Ryabova', 'password', 0, ''),
(17, 'Павло ', 'Сілкін ', 'Олександрович', 'Silkin', 'password', 0, ''),
(18, 'Андрій ', 'Чайка ', 'Іванович  ', 'Chaika', 'password', 1, ''),
(19, 'Дар`я ', 'Черевичина ', 'Євгеніївна  ', 'Cherevichina', 'password', 0, ''),
(20, 'Богдана ', 'Ямнюк ', 'Ярославівна', 'Yamnuk', 'password', 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fathername` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `access` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `surname`, `fathername`, `login`, `password`, `access`) VALUES
(1, 'Ирина', 'Кораблинова', 'Отчество', 'Korablinova', 'password', 2),
(2, 'Учитель', 'Вороной', 'Учителевич', 'Varanoi', 'password', 2),
(3, 'Универсальный', 'Учитель', 'Для теста', 'Universal', 'password', 2);

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
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=38 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `fathername`, `group`, `login`, `password`, `access`) VALUES
(36, 'Деканат', 'Деканатов', 'Деканатович', '', 'Decanat', 'password', 3),
(37, 'Ректор', 'Ректоров', 'Ректорович', '', 'Rector', 'password', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
