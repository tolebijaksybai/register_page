-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 22 2021 г., 17:03
-- Версия сервера: 5.7.29
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `homework-2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `work` varchar(255) DEFAULT NULL,
  `phone` int(12) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `img_src` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `fullname`, `work`, `phone`, `address`, `img_src`) VALUES
(8, 'oliver.kopyov@smartadminwebapp.com', '$2y$10$sPP7cfpsz3EaIo87vdBTeepfHDrqEhLP9UKiZbHegWUek6ybiH836', 'user', 'Oliver Kopyov', 'IT Director, Gotbootstrap Inc.', NULL, '15 Charist St, Detroit, MI, 48212, USA', 'img/demo/avatars/avatar-b.png'),
(21, 'Alita@smartadminwebapp.com', '$2y$10$sPP7cfpsz3EaIo87vdBTeepfHDrqEhLP9UKiZbHegWUek6ybiH836', 'user', 'Alita Gray', 'Project Manager, Gotbootstrap Inc.', NULL, '134 Hamtrammac, Detroit, MI, 48314, USA', 'img/demo/avatars/avatar-c.png'),
(25, 'admin@admin.com', '$2y$10$j3HyPsW1j532b4oAzp/LlOfxhN1codgqrGD3uHnt2T76bTymo83PO', 'admin', NULL, NULL, NULL, NULL, 'img/demo/avatars/avatar-k.png'),
(26, 'john.cook@smartadminwebapp.com', '$2y$10$rLh0T024rqy611mG7iQto.oroKI0/7AwgC.pnsWzU6xthiFK9mGlS', 'user', 'Dr. John Cook PhD', 'Human Resources, Gotbootstrap Inc.', NULL, '55 Smyth Rd, Detroit, MI, 48341, USA', 'img/demo/avatars/avatar-e.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
