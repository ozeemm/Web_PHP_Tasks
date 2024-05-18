-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3307
-- Время создания: Май 18 2024 г., 15:48
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `futurama`
--

-- --------------------------------------------------------

--
-- Структура таблицы `characters`
--

CREATE TABLE `characters` (
  `id` int NOT NULL,
  `title` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `characters`
--

INSERT INTO `characters` (`id`, `title`, `image`, `description`, `info`, `type`) VALUES
(1, 'Фрай', 'https://avatars.dzeninfra.ru/get-zen_doc/98843/pub_5a76ff80c890106d989eeb85_5a76ff92fd96b15f994f23d9/scale_1200', 'Тут расскажем про Фрая', 'Родился 14 августа 1974 года.\r\nЗаморозил себя в криогенной камере за несколько секунд до наступления 2000 года.\r\nРазморозился в конце 2999 года, и в дальнейшем стал курьером в компании «Межпланетный Экспресс».', 'Люди'),
(2, 'Бендер', 'https://icdn.lenta.ru/images/2022/02/10/16/20220210163151140/square_320_7a5413a9978bcfdbc11fb50e1ba11c38.jpg', 'Тут расскажем про Бендера', 'Был сделан в Мексике в 2997 году. Имеет серийный номер 2716057.\r\nПьет большое количество алкоголя, чтобы подзарядить свои топливные элементы.\r\nАвантюрист, любит курить сигары.\r\nВ настоящее время живет в квартире с Фраем.', 'Роботы'),
(3, 'Лила', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRzkOwdT_TQcyq6N0llzeyDtCnBgbzWpSMJllnNGXqu-FtCMddyozTXZxj-2cKsf4bZ5Qk&usqp=CAU', 'Тут расскажем про Лилу', 'Является капитаном корабля «Межпланетный Экспресс».\r\nУтверждает, что является единственным представителем инопланетной расы на Земле,\r\nно на самом деле Лила мутант, которого в самом раннем детстве подбросили в приют.', 'Другие'),
(4, 'Фарнсворт', 'https://media.2x2tv.ru/content/images/2022/04/c3aa3b563dec0b0e9b57922a63e9ea88.jpeg', 'Тут расскажем про профессора Фарнсворта', 'Является основателем и владельцем курьерской службы «Межпланетный Экспресс». Родился 9 апреля 2841 года.\nОн один из шести ныне живущих родственников Фрая. Он является пра(x30) племянником и в то же время пра(x32) внуком Фраю.\nВ отношении интеллектуального развития профессор чрезвычайно непостоянен.\nЕго интеллект то не уступает умам великих учёных, то не превышает уровня пятилетнего ребёнка.', 'Люди'),
(5, 'Зойдберг', 'https://sun9-28.userapi.com/impf/c637419/v637419002/2b308/9aauTZNggMc.jpg?size=600x450&quality=96&sign=3bdae0fc91cb5931463932d844f1c18c&type=album', 'Тут расскажем про доктора Зойдберга', 'Работает врачом в курьерской службе Межпланетный Экспресс.\nРодился 5 августа 2914 года на планете Декапод 10 и приехал на Землю, чтобы пройти медицинскую практику после того, как он бросил заниматься комедией.\nНесмотря на то, что он сам себя провозгласил экспертом по людям, при первой встрече он назвал Фрая «девушкой» и перепутал Фрая с Бендером.', 'Другие'),
(9, 'Добавлятор Картинок', '/media/File_Adder.gif', 'Он добавляет картинки', 'Он добавляет картинки. Обычно у него это получается, но сейчас просто звёзды не так сошлись.', 'Другие'),
(13, 'Робот-гедонист', '/media/gedonist.jpg', 'Тут расскажем про робота-гедониста', 'Робот, ставящий целью своей жизни получение наслаждений.\r\nИмеет цвет и блеск золота и подобие лаврового венка на голове.\r\nПостоянно лежит и передвигается на кушетке, которая является частью его корпуса, и непрерывно поглощает виноград.\r\nЛюбит полировку своего тела. Периодически его тело поливают горячим шоколадом.', 'Роботы');

-- --------------------------------------------------------

--
-- Структура таблицы `character_types`
--

CREATE TABLE `character_types` (
  `id` int NOT NULL,
  `type` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `character_types`
--

INSERT INTO `character_types` (`id`, `type`) VALUES
(1, 'Люди'),
(2, 'Другие'),
(4, 'Роботы');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'user1', 'password1'),
(2, 'user2', 'password2');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `character_types`
--
ALTER TABLE `character_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `characters`
--
ALTER TABLE `characters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `character_types`
--
ALTER TABLE `character_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
