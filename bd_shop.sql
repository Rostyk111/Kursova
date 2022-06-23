-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Час створення: Трв 25 2022 р., 22:28
-- Версія сервера: 5.7.33
-- Версія PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `bd_shop`
--

-- --------------------------------------------------------

--
-- Структура таблиці `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_id_furniture` int(11) NOT NULL,
  `order_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `table_furniture`
--

CREATE TABLE `table_furniture` (
  `id_furniture` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `table_furniture`
--

INSERT INTO `table_furniture` (`id_furniture`, `title`, `author`, `description`, `price`, `img`) VALUES
(1, 'Офісна система Герман БРВ Україна', 'ВМК (БРВ Україна)', 'Модульна система Герман БРВ - це по справжньому оригінальні меблі для вітальні, спальні. Гарнітур випускається в кольоровій комбінації: дуб стірлінг з добре видимою текстурою дерева.', 1841, 'ofisna-sistema-german-brv-ukraina-catalog.jpg'),
(2, 'Офісна система Індіана / Indiana БРВ Україна', 'ВМК (БРВ Україна)', 'Оригінальна і неймовірно стильна система Індіана від фабрики БРВ Україна створить атмосферу затишку і вінтажної розкоші в вашому домі. Завдяки багатій деревній фактурі, кованим елементам і металевим ручкам в ретро стилі ці меблі асоціюється з інтер\'єром старовинного заміського будинку.', 2975, 'ofisna-sistema-indiana-indiana-brv-catalog.jpg'),
(3, 'Офісна система Кентукі БРВ Україна', 'ВМК (БРВ Україна)', 'Модульна система Кентукі — сучасні меблі для дому в класичному стилі фабрики Black Red White Україна. Ця колекція викликає прихильність до себе, випромінюючи особливу легкість, природність та простоту. Вона відмінно підійде любителям затишних і теплих кімнат.', 2888, 'ofisna-sistema-kentuki-brv-ukraina-catalog.jpg'),
(4, 'Офісна система Garant NV', 'Garant NV', 'Офісна система Garant NV виконана в сучасному стилі. Меблі призначеня для облаштування чи доповнення офісу, дитячої кімнати тощо.', 888, 'ofisni-mebli-garant-nv-115204-catalog.jpg'),
(5, 'Офісна система Офіс-Лайн Гербор', 'Гербор', 'Модульні меблі Офіс-Лайн від меблевої фабрики Гербор — відмінне рішення для сучасного кабінету або офісного приміщення. Завдяки великому вибору компонентів, які можна розташувати будь-яким зручним для вас чином, ця система дуже практична і функціональна.', 3472, 'ofisna-sistema-ofis-lajn-gerbor-catalog.jpg'),
(6, 'Дитяча Лофт Світ Меблів', 'Світ Меблів', 'Модульна дитяча Лофт представлена компанією Світ Меблів - стильний і сучасний набір меблів для дитячої кімнати в популярному стилі лофт.\r\nТакі меблі підійдуть як для хлопчика, так і для дівчинки, тому що дизайн меблів універсальний.', 6169, 'ditaca-loft-svit-mebliv-catalog.jpg'),
(7, 'Дитяча Савана New Світ Меблів', 'Світ Меблів', 'Дитяча Савана New Світ Меблів — стильний набір меблів для сучасної дитячої кімнати.\r\nМеблі Савана New функціональні та практичні, мають теплі та м\'які відтінки, що без сумніву створить атмосферу затишку і тепла в кімнаті Вашого чада.', 1919, 'ditaca-savana-new-svit-mebliv-catalog.jpg'),
(8, 'Дитяча Салерно Нові направляючі Гербор', 'Гербор', 'Модульна дитяча Салерно від виробника Гербор, створена на основі останніх тенденцій італійських дизайнерів.\r\nСвіжа, сяюча і ніжна дитяча система меблів. Любителям провансу і сучасної класики ця дитяча припаде до душі.', 4813, 'ditaca-salerno-novi-napravlauci-gerbor-catalog.jpg'),
(9, 'Дитяча Алекс VMV holding', 'VMV holding', 'Система Алекс ВМВ Холдінг виготовляється з високоякісної ламінованої ДСП класу Е1 на обладнані німецьких та італійський виробників. Дитяча Алекс виконується в кольорах: корпус - графіт; фасад - білий дуб; вставки, полички, узголів\'я ліжка - дуб сонома.', 1835, 'ditaca-aleks-vmv-holding-catalog.jpg'),
(10, 'Дитяча Памп VMV holding', 'VMV holding', 'Модульна дитяча Памп фабрики VMV Holding буде хорошим рішенням для Вашої кімнати.\r\nСистема має декілька елементів, які допоможуть облаштувати дитячу кімнату так, як Вам буде зручно та задовільнить потреби Вашої дитини.', 1599, 'ditaca-pamp-vmv-holding-catalog.jpg'),
(11, 'Спальня Ріко 4D VMV holding', 'VMV holding', 'Спальня Ріко фабрики ВМВ Холдінг виготовляється з високоякісної ламінованої плити ДСП класу Е1 на обладнанні німецьких та італійський виробників. Система виготовляється в кольорах: корпус - дуб сонома, фасад - дуб сонома/білий.', 24379, 'spalna-riko-4d-vmv-holding-catalog.jpg'),
(12, 'Спальня Нортон 3D VMV holding', 'VMV holding', 'Система Нортон від фабрики ВМВ Холдінг виготовляється з високоякісних матеріалів вітчизняного та закордонного виробництва. Характерною рисою продукції є сучасний дизайн. Гладкі фасади і строгі форми, замість ручок зроблені зручні поглиблення – з сторони ергономіки це чудове рішення. При цьому вся система виглядає сучасно.', 19699, 'spalna-norton-3d-vmv-holding-catalog.jpg'),
(13, 'Спальня Джульєта 4D (з комодом) VMV holding', 'VMV holding', 'Модульна спальня Джульєтта ВМВ Холдінг виготовляється з високоякісної ламінованої плити ДСП класу Е1 на обладнанні німецьких та італійський виробників. Виготовляється в кольорах: корпус - дуб арканзас темний, фасад - дуб арканзас темний/бронза.', 24399, 'spalna-dzuleta-4d-z-komodom-vmv-catalog.jpg'),
(14, 'Спальня Нортон Спальня Комплект із двома шафами VMV holding', 'VMV holding', 'Система Нортон від фабрики ВМВ Холдінг виготовляється з високоякісних матеріалів вітчизняного та закордонного виробництва. Характерною рисою продукції є сучасний дизайн. Гладкі фасади і строгі форми, замість ручок зроблені зручні поглиблення – з сторони ергономіки це чудове рішення. При цьому вся система виглядає  сучасно.', 22899, 'spalna-norton-spalna-komplekt-iz-dvoma-catalog.jpg'),
(15, 'Спальня Джульєта 4D (без комоду) VMV holding', 'VMV holding', 'Модульна спальня Джульєтта ВМВ Холдінг виготовляється з високоякісної ламінованої плити ДСП класу Е1 на обладнанні німецьких та італійський виробників. Виготовляється в кольорах: корпус - дуб арканзас темний, фасад - дуб арканзас темний/бронза.', 19999, 'spalna-dzuleta-4d-bez-komodu-vmv-catalog.jpg');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `secondname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Індекси таблиці `table_furniture`
--
ALTER TABLE `table_furniture`
  ADD PRIMARY KEY (`id_furniture`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `table_furniture`
--
ALTER TABLE `table_furniture`
  MODIFY `id_furniture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


SELECT * FROM table_furniture WHERE id_furniture = '1' OR id_furniture = '2' OR id_furniture = '3' OR id_furniture = '4'OR id_furniture = '5'OR id_furniture = '6' OR id_furniture = '7' OR id_furniture = '8' OR id_furniture = '9';
SELECT firstname, secondname FROM users JOIN orders WHERE id_user =  order_id_user;
SELECT title FROM table_furniture JOIN orders WHERE id_furniture = order_id_furniture;
SELECT id_furniture, id_user FROM table_furniture JOIN users WHERE title = '" . $_POST[''] . "' AND email ='" . $_POST[''] . "';
SELECT email, password, firstname FROM users WHERE email ='" . $_POST[''] . "' AND password = '$password';
SELECT * FROM table_furniture WHERE title LIKE '%$search%'  OR author LIKE '%$search%';