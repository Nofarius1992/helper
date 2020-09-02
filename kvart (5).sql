-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 31 2020 г., 08:18
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kvart`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `phone_num` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `adress_kv` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `infrast` text NOT NULL,
  `attractions` text NOT NULL,
  `terms` text NOT NULL,
  `status` text NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ads`
--

INSERT INTO `ads` (`id`, `user_id`, `user_name`, `phone_num`, `city`, `adress_kv`, `description`, `infrast`, `attractions`, `terms`, `status`, `photo`) VALUES
(71, 44, '123', '12345', '123', '123', '123', '123', '123', '123', '123', 'files/5f4c8b98e5a9d.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `komu_user_id` int(11) NOT NULL,
  `ot_user_id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `time`, `komu_user_id`, `ot_user_id`, `text`) VALUES
(110, '2020-08-30 17:54:25', 45, 44, '345345'),
(111, '2020-08-30 17:57:58', 46, 44, '345'),
(112, '2020-08-30 17:58:06', 46, 44, '345'),
(113, '2020-08-30 18:35:02', 44, 46, '456'),
(114, '2020-08-30 18:56:33', 46, 44, '123');

-- --------------------------------------------------------

--
-- Структура таблицы `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `phone_num` varchar(255) NOT NULL,
  `adress_user` varchar(255) NOT NULL,
  `denomination` varchar(255) NOT NULL,
  `church_name` varchar(255) NOT NULL,
  `church_adress` varchar(255) NOT NULL,
  `pastor_num` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `register`
--

INSERT INTO `register` (`id`, `name`, `surname`, `phone_num`, `adress_user`, `denomination`, `church_name`, `church_adress`, `pastor_num`, `email`, `password`, `photo`) VALUES
(44, '123', '124', '12345', '123', '123', '123', '123', '123', '123@123', '123', 'files/5f4c8c418cb5a.jpg'),
(45, '234', '234', '234', '234', '234', '234', '234', '234', '234@234', '234', 'files/5f4b639c79feb.jpg'),
(46, '345', '345', '345', '345', '345', '345', '345', '345', '345@345', '345', 'files/5f4b640258952.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT для таблицы `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
