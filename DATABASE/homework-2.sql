-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 10 2021 г., 14:25
-- Версия сервера: 5.7.29
-- Версия PHP: 7.2.34

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
  `phone` bigint(12) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `img_src` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `telegram` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `vk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `fullname`, `work`, `phone`, `address`, `img_src`, `status`, `telegram`, `instagram`, `vk`) VALUES
(8, 'oliver.kopyov@smartadminwebapp.com', '$2y$10$sPP7cfpsz3EaIo87vdBTeepfHDrqEhLP9UKiZbHegWUek6ybiH836', 'user', 'Oliver Kopyov', 'Амерка', 87081712588, 'Кызлыорда', 'img/demo/avatars/avatar-b.png', NULL, NULL, NULL, NULL),
(21, 'Alita@smartadminwebapp.com', '$2y$10$sPP7cfpsz3EaIo87vdBTeepfHDrqEhLP9UKiZbHegWUek6ybiH836', 'user', 'Alita Gray', 'Амерка', 87081712588, 'Кызлыорда', 'img/demo/avatars/avatar-c.png', NULL, NULL, NULL, NULL),
(25, 'admin@admin.com', '$2y$10$j3HyPsW1j532b4oAzp/LlOfxhN1codgqrGD3uHnt2T76bTymo83PO', 'admin', NULL, 'Амерка', 87081712588, 'Кызлыорда', 'img/demo/avatars/avatar-k.png', NULL, NULL, NULL, NULL),
(45, 'admin@admin.commm', '$2y$10$gyd65F161J5fnW1ebudeq.9KnVshMbT08MUNkrZXaAL36YvUplu7y', 'user', NULL, 'Амерка', 87081712588, 'Кызлыорда', 'img/demo/avatars/16206458671.png', 'Онлайн', 'vk.com', 'telegram.com', 'instagram.com'),
(46, 'admin@admin.com4', '$2y$10$u2Q56HllzyrczzWdNLI.SO8QDKDKH.4s4QEt/HZQHWrlvh719Mkju', 'user', NULL, 'Амерка', 87081712588, 'Кызлыорда', 'img/demo/avatars/16206459161.png', 'Отошел', 'vk.com', 'telegram.com', 'instagram.com');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
