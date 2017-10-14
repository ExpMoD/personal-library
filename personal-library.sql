-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 14 2017 г., 22:10
-- Версия сервера: 5.7.14
-- Версия PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `personal-library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `date-read` date NOT NULL,
  `cover-path` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `date-read`, `cover-path`) VALUES
(1, 'Оно', 'Стивен Кинг', '2017-10-10', 'uploads/2104459e25c306dec0.jpg'),
(2, 'Художник зыбкого мира', 'Кадзуо Исигуро', '2017-09-15', 'uploads/2486059e260c9a08a2.jpg'),
(3, 'Свет утренней звезды', 'Снежная Александра', '2017-09-01', 'uploads/1555959e2620ed42b6.jpg'),
(4, 'Альберто Ривера: «Разоблачение, обличение — иезуитов, католицизма»', 'Литвин Дмитрий Дмитриевич', '2017-10-14', 'uploads/1714659e26e2f93d41.jpg'),
(5, 'Багровый пик', 'Холдер Нэнси', '2010-02-22', '0'),
(6, 'Кремль 2222. Куркино', 'Бондарев Олег Игоревич', '2013-05-28', '0'),
(7, 'Под знаком мантикоры', 'Пехов Алексей Юрьевич', '2017-10-15', 'uploads/1129559e2865967590.jpg'),
(14, 'Архивариус (СИ)', 'Мирецкий Игорь', '2016-12-31', '0');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
