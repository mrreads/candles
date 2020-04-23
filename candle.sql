-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 23 2020 г., 03:49
-- Версия сервера: 10.4.12-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `candle`
--

-- --------------------------------------------------------

--
-- Структура таблицы `candle`
--

CREATE TABLE `candle` (
  `id_candle` int(11) NOT NULL,
  `candle_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_zapah` int(11) DEFAULT NULL,
  `id_form` int(11) DEFAULT NULL,
  `id_color` int(11) DEFAULT NULL,
  `id_razer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `candle`
--

INSERT INTO `candle` (`id_candle`, `candle_name`, `id_zapah`, `id_form`, `id_color`, `id_razer`) VALUES
(1, 'свеча 1', 2, 3, 7, 1),
(2, 'свеча 2', 1, 3, 6, 2),
(3, 'свеча 3', 4, 1, 2, 2),
(4, 'свеча 4', 1, 4, 2, 2),
(5, 'свеча 5', 4, 1, 6, 2),
(6, 'свеча 6', 2, 3, 1, 3),
(7, 'свеча 7', 3, 4, 5, 2),
(8, 'свеча 8', 3, 3, 6, 4),
(9, 'свеча 9', 3, 1, 2, 1),
(10, 'свеча 10', 4, 4, 7, 4),
(11, 'свечка 11', 2, 1, 5, 2),
(12, 'свечка 12', 3, 4, 4, 3),
(13, 'свечка 13', 1, 4, 1, 4),
(14, 'свечка 14', 4, 4, 4, 3),
(15, 'свечка 15', 1, 4, 1, 4),
(16, 'свечка 16', 4, 4, 7, 3),
(17, 'свечка 17', 4, 4, 7, 3),
(18, 'свечка 18', 1, 2, 3, 2),
(19, 'свечка 19', 2, 3, 4, 3),
(20, 'свечка 20', 2, 1, 1, 4),
(21, 'свечка 21', 1, 1, 1, 2),
(22, 'свечка 22', 2, 1, 2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_candle` int(11) DEFAULT NULL,
  `cart_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `id_candle`, `cart_count`) VALUES
(60, 1, 2, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `color`
--

CREATE TABLE `color` (
  `id_color` int(11) NOT NULL,
  `color_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_code` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `color`
--

INSERT INTO `color` (`id_color`, `color_name`, `color_code`, `color_price`) VALUES
(1, 'красный', 'red', 200),
(2, 'оранжевый', 'orange', 200),
(3, 'желтый', 'yellow', 200),
(4, 'зеленый', 'green', 200),
(5, 'голубой', 'aqua', 200),
(6, 'синий', 'blue', 200),
(7, 'фиолетовый', 'purple', 200);

-- --------------------------------------------------------

--
-- Структура таблицы `form`
--

CREATE TABLE `form` (
  `id_form` int(11) NOT NULL,
  `form_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_path` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_price` int(11) NOT NULL,
  `form_available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `form`
--

INSERT INTO `form` (`id_form`, `form_name`, `form_path`, `form_price`, `form_available`) VALUES
(1, 'Длинная', 'img/forma_1.png', 300, 373),
(2, 'Короткая', 'img/forma_2.png', 10, 17),
(3, 'Изогнутая', 'img/forma_3.png', 168, 173),
(4, 'Сердечко', 'img/forma_4.png', 19, 352);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id_order`, `id_user`, `order_date`) VALUES
(41, 1, '2020-04-23 14:27:01'),
(42, 1, '2020-04-23 14:27:01');

-- --------------------------------------------------------

--
-- Структура таблицы `order_candle`
--

CREATE TABLE `order_candle` (
  `id_order-candle` int(11) NOT NULL,
  `id_order` int(11) DEFAULT NULL,
  `id_candle` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_candle`
--

INSERT INTO `order_candle` (`id_order-candle`, `id_order`, `id_candle`) VALUES
(9, 41, 16),
(10, 42, 19),
(11, 42, 15);

-- --------------------------------------------------------

--
-- Структура таблицы `razmer`
--

CREATE TABLE `razmer` (
  `id_razmer` int(11) NOT NULL,
  `razmer_name` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `razmer_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `razmer`
--

INSERT INTO `razmer` (`id_razmer`, `razmer_name`, `razmer_price`) VALUES
(1, '100x100', 200),
(2, '150x150', 250),
(3, '200x200', 300),
(4, '250x250', 350);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_login` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `user_name`, `user_login`, `user_password`) VALUES
(1, 'Иван', '123', '123'),
(2, 'Васёк', 'login_vasek', '123123'),
(3, 'Ваня', '321', '123');

-- --------------------------------------------------------

--
-- Структура таблицы `user_candle`
--

CREATE TABLE `user_candle` (
  `id_custom` int(11) NOT NULL,
  `id_candle` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_candle`
--

INSERT INTO `user_candle` (`id_custom`, `id_candle`, `id_user`) VALUES
(9, 15, 1),
(10, 16, 1),
(11, 17, 1),
(12, 18, 1),
(13, 19, 1),
(14, 20, 1),
(15, 21, 1),
(16, 22, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `zapah`
--

CREATE TABLE `zapah` (
  `id_zapah` int(11) NOT NULL,
  `zapah_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zapah_path` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zapah_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `zapah`
--

INSERT INTO `zapah` (`id_zapah`, `zapah_name`, `zapah_path`, `zapah_price`) VALUES
(1, 'Корица', 'img/icons/icons8-палочки-корицы-100.png', 200),
(2, 'Печенье', 'img/icons/icons8-печенье-100.png', 200),
(3, 'Шоколад', 'img/icons/icons8-плитка-шоколада-100.png', 200),
(4, 'Цветы', 'img/icons/icons8-букет-цветов-100.png', 200);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `candle`
--
ALTER TABLE `candle`
  ADD PRIMARY KEY (`id_candle`),
  ADD KEY `fk_candle_zapah` (`id_zapah`),
  ADD KEY `fk_candle_form` (`id_form`),
  ADD KEY `fk_candle_color` (`id_color`),
  ADD KEY `fk_candle_razmer` (`id_razer`);

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `fk_cart_users` (`id_user`),
  ADD KEY `fk_cart_candle` (`id_candle`);

--
-- Индексы таблицы `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id_color`);

--
-- Индексы таблицы `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id_form`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `fk_order_users` (`id_user`);

--
-- Индексы таблицы `order_candle`
--
ALTER TABLE `order_candle`
  ADD PRIMARY KEY (`id_order-candle`),
  ADD KEY `fk_order_candle_order` (`id_order`),
  ADD KEY `fk_order_candle_candle` (`id_candle`);

--
-- Индексы таблицы `razmer`
--
ALTER TABLE `razmer`
  ADD PRIMARY KEY (`id_razmer`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Индексы таблицы `user_candle`
--
ALTER TABLE `user_candle`
  ADD PRIMARY KEY (`id_custom`),
  ADD KEY `fk_user_candle_candle` (`id_candle`),
  ADD KEY `fk_user_candle_users` (`id_user`);

--
-- Индексы таблицы `zapah`
--
ALTER TABLE `zapah`
  ADD PRIMARY KEY (`id_zapah`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `candle`
--
ALTER TABLE `candle`
  MODIFY `id_candle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT для таблицы `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `form`
--
ALTER TABLE `form`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `order_candle`
--
ALTER TABLE `order_candle`
  MODIFY `id_order-candle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `razmer`
--
ALTER TABLE `razmer`
  MODIFY `id_razmer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user_candle`
--
ALTER TABLE `user_candle`
  MODIFY `id_custom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `zapah`
--
ALTER TABLE `zapah`
  MODIFY `id_zapah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `candle`
--
ALTER TABLE `candle`
  ADD CONSTRAINT `fk_candle_color` FOREIGN KEY (`id_color`) REFERENCES `color` (`id_color`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_candle_form` FOREIGN KEY (`id_form`) REFERENCES `form` (`id_form`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_candle_razmer` FOREIGN KEY (`id_razer`) REFERENCES `razmer` (`id_razmer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_candle_zapah` FOREIGN KEY (`id_zapah`) REFERENCES `zapah` (`id_zapah`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_candle` FOREIGN KEY (`id_candle`) REFERENCES `candle` (`id_candle`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cart_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `order_candle`
--
ALTER TABLE `order_candle`
  ADD CONSTRAINT `fk_order_candle_candle` FOREIGN KEY (`id_candle`) REFERENCES `candle` (`id_candle`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_candle_order` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `user_candle`
--
ALTER TABLE `user_candle`
  ADD CONSTRAINT `fk_user_candle_candle` FOREIGN KEY (`id_candle`) REFERENCES `candle` (`id_candle`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_candle_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
