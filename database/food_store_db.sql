-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 23, 2023 at 02:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_store_db`
--
CREATE DATABASE IF NOT EXISTS `food_store_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `food_store_db`;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `password`, `role`, `email`) VALUES
(15, 'admin', '$2y$10$1KVHuCTUV6TmYhnNRwxWIO.5SuK8yDEKgeGNq4SYMXuJ8/EAFv4bO', 0, 'tan@gmail.com'),
(16, 'tan', '$2y$10$0tkiCe5hQ4ACBayWGcO.SOVzisq9iEBxunL1EtEaEfm/JWTgNXwS2', 1, 'tan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `description`) VALUES
(6, 'Starters', 'List of appetizers'),
(8, 'Drinks', 'Drinks'),
(9, 'Dessert', 'Dessert'),
(10, 'Lunch', 'Lunch'),
(11, 'Dinner', 'Dinner'),
(12, 'Main', 'Main dish');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `menu_id`, `image`, `name`, `description`, `price`) VALUES
(32, 10, 'spaghetti-bolognese-36.jpg', 'Spaghetti Bolognese', 'A popular pasta dish with a sauce made of a mixture of ground beef, tomato sauce, onions, carrots, and various spices.', 10),
(33, 10, 'pizza2-4648-1526893452-6893-1526984399.jpg', 'Margherita Pizza', 'A basic type of pizza with tomato sauce, mozzarella cheese, and fresh basil leaves.', 10),
(34, 10, 'risotto-porcini-e1484691105675.webp', 'Risotto ai Funghi', 'Risotto cooked with mushrooms, broth, and Parmesan cheese, creating a delicious and creamy dish.', 15),
(35, 10, 'lasagne-la-gi-cach-lam-mon-lasagne-chuan-y-202108181927294271.jpg', 'Lasagna', 'A layered dish with pasta, meat sauce, tomato sauce, bechamel, and cheese.', 15),
(36, 10, 'Italian-Minestrone-Soup-Recipe-11-2.jpg', 'Minestrone Soup', 'A very popular soup containing various vegetables, beans, and pasta', 15),
(37, 10, '1431766579357.jpeg', 'Osso Buco', 'Beef shanks cooked in a pot with tomato sauce, onions, carrots, and spices', 30),
(38, 9, 'Tiramisu_-_Raffaele_Diomede.jpg', 'Tiramisu', 'A delicious dessert made from layers of sponge cake soaked in coffee, fresh cream, and cocoa', 5),
(39, 11, 'Easy-Fettuccine-Alfredo-Hero-Horizontal.jpg', 'Fettuccine Alfredo', 'A pasta dish with cream sauce, butter, and Parmesan cheese, creating a rich and creamy flavor', 20),
(40, 11, '80', 'Veal Piccata', 'Lightly grilled veal, often prepared with lemon and caper sauce, typically served with rice or pasta.', 20),
(41, 11, 'gnocchi-168125-1.jpeg', 'Gnocchi', 'A delicate type of dumpling made from potatoes, usually served with various sauces such as tomato sauce, gorgonzola sauce, or mushroom sauce', 20),
(42, 11, 'chicken-cannelloni-with-roasted-red-bell-pepper-sauce_batch7335_3x2-136-abe48c9f40e04ea8a2abe4b98b4038b1.jpg', 'Cannelloni', 'A rolled pasta, often filled with meat, vegetables, or seafood, and covered with tomato sauce or bechamel', 20),
(43, 11, '54165-balsamic-bruschetta-DDMFS-4x3-e2b55b5ca39b4c1783e524a2461634ea.jpg', 'Bruschetta', 'A popular appetizer consisting of crispy grilled bread, typically spread with tomatoes, garlic, basil, and olive oil', 10),
(44, 11, 'Saltimbocca_01.jpg', 'Saltimbocca', 'A meat dish (usually beef or veal) grilled with sage leaves and prosciutto, often served with mushroom sauce', 30),
(45, 9, 'panna-cotta-720x1008.webp', 'Panna Cotta', 'A traditional Italian dessert made from milk, sugar, and gelatin, typically accompanied by pear or strawberry sauce', 10),
(46, 8, 'Chianti-DOCG_1024x1024.webp', 'Chianti', 'An Italian red wine, often paired with pasta, red meat, and pizza', 30),
(47, 8, 'Prosecco_di_Conegliano_bottle_and_glass.jpg', 'Prosecco', 'An Italian sparkling wine, suitable as an aperitif or to conclude a meal', 15),
(48, 8, 'aperol-spritz-cocktail-featured.jpg', 'Negroni', 'A traditional Italian cocktail, made with gin, red vermouth, and Campari', 10),
(49, 8, 'Bottega-Limoncino-limoncello.jpg', 'Limoncello', 'A famous citrus liqueur from the Campania region, often served as a digestif', 10),
(50, 8, 'cach-pha-espresso-1.jpg', 'Espresso', 'Dark, strong, and sophisticated, espresso is a common choice to finish an Italian meal', 5),
(51, 8, 'unnamed_be2775a1-186d-40c1-b094-488fa5fa4050.webp', 'CaffÃ¨ Latte', 'A combination of espresso and warm milk, often consumed during breakfast or in the afternoon', 5),
(52, 8, 'bia-peroni-nastro-azzurro-5-1-y-chai-330ml-p104.webp', 'Peroni', 'A light Italian beer, suitable for many Italian dishes', 5),
(60, 6, 'Antipasto-Platter-2.jpg', 'Antipasto Platter', 'A diverse platter of cured meats or seafood, often including prosciutto, salami, cheeses, olives, and fresh vegetables', 20),
(61, 6, 'tomato_bruschetta.jpg', 'Bruschetta al Pomodoro', 'Crispy toasted bread topped with tomato, garlic, basil, and olive oil', 10),
(62, 6, 'FullSizeRender-2021-06-03T110631.639-scaled.jpg', 'Carpaccio', 'Thinly sliced beef or salmon, often served with fresh greens, black pepper, and Parmesan cheese', 15),
(63, 6, 'calamari-fritti-closeup.jpg', 'Calamari Fritti', 'Crispy fried squid, typically accompanied by marinara sauce or aioli', 12),
(64, 6, 'Caprese-Salad-main-1.webp', 'Caprese Salad', 'A traditional salad with tomatoes, fresh mozzarella cheese, and basil, drizzled with olive oil', 10),
(65, 6, 'aw-arancini-threeByTwoMediumAt2X.jpg', 'Arancini', 'Crispy fried Italian rice balls with fillings like mushrooms, beef, or seafood', 15),
(66, 12, 'risotto-ai-frutti-di-mare.jpg', 'Risotto ai Frutti di Mare', ' Seafood risotto, typically featuring ingredients like squid, mussels, shrimp, and mushrooms', 30),
(67, 12, 'cacciucco-versione-tradizionale.webp', 'Cacciucco', 'A delicious seafood soup originating from the Liguria region, typically containing mussels, shrimp, fish, and squid', 25),
(68, 12, 'bucatini-amatriciana-18-1.jpg', 'Pasta all\'Amatriciana', 'Polenta cooked with mushrooms, often drizzled with mushroom sauce and cheese.', 15),
(69, 12, 'BISTECCA-093022.jpg', 'Bistecca alla Fiorentina', 'A large T-bone steak from high-quality beef, usually grilled or seared, served with sauce and fresh greens', 50),
(70, 12, 'spaghetti-alle-vongole-recipe-jpg-1676890130.jpg', 'Linguine alle Vongole', 'A popular pasta dish with clam sauce, garlic, chili, and olive oil', 30),
(75, 9, 'cannoli-small-8-scaled.jpg', 'Cannoli', 'Crispy pastry shells filled with a mixture of ricotta cheese, sugar, and other ingredients', 4),
(76, 9, 'gelato-1296x728-header.webp', 'Gelato', 'Description: An Italian ice cream similar to regular ice cream but with a softer texture and lower fat content', 4),
(77, 9, 'ac18aa15611572f79a25dfc41356ed0b.jpg', 'Affogatoo', 'Description: A cup of strong black espresso poured directly over a scoop of vanilla or cappuccino-flavored ice cream', 5),
(90, 6, 'c95916519436ceac9184ae946aa4f1f520231221090252.jpg', 'Test', 'Test desc', 2000000),
(91, 8, 'c95916519436ceac9184ae946aa4f1f520231221101809.jpg', 'test2', 'desc', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `product_comments`
--

CREATE TABLE `product_comments` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_comments`
--

INSERT INTO `product_comments` (`id`, `product_id`, `comment`, `username`) VALUES
(1, 40, 'Nice', 'admin'),
(2, 32, 'ãããããããã', 'admin'),
(3, 32, 'Nice', 'NguyenTienDat'),
(4, 66, 'Fucking delicious', 'NguyenTienDat'),
(5, 32, 'Fucking delicious', 'NguyenTienDat'),
(6, 68, 'Nice', 'admin'),
(7, 63, 'hi', 'admin'),
(8, 44, 'Hello', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `name`, `product_id`) VALUES
(95, 'spaghetti-bolognese-30.jpg', 32),
(96, 'spaghetti-bolognese-32.jpg', 32),
(97, 'spaghetti-bolognese-33.jpg', 32),
(98, 'image-asset.jpeg', 34),
(99, '23600-worlds-best-lasagna-DDMFS-2x1-1193-40ded59b2a224312b66bdafbb885adc0.jpg', 35),
(100, 'RS-Lasagna-hkjl-superJumbo.jpg', 35),
(101, 'Minestrone-Soup-LEAD-2-e588767908ff46f697c5396f74120d75.jpg', 36),
(102, 'pizza2-4648-1526893452-6893-1526984399.jpg', 33),
(103, 'download.jpeg', 37),
(104, '__opt__aboutcom__coeus__resources__content_migration__simply_recipes__uploads__2006__12__Osso-Buco-LEAD-5-a816159cbe9740a5b21f3c1e515f9da2.jpg', 37),
(105, 'banh-tiramisu-trai-nghiem-mon-trang-mieng-y-ngon-kho-quen.webp', 38),
(106, 'TIRAMISU1.webp', 38),
(107, 'Fettuccine-Alfredo_7.jpg', 39),
(108, 'licensed-image.jpeg', 39),
(109, 'Piccata-Veal-Scallopini-3.jpg', 40),
(110, 'veal-picatta-6.jpg', 40),
(111, 'Homemade-Potato-Gnocchi.jpg', 41),
(112, 'Untitled-1-1200x676-8.jpg', 41),
(113, 'easy-pumpkin-spinach-and-ricotta-cannelloni-158009-1.jpg', 42),
(114, 'Simply-Recipes-Bruschetta-Tomato-Basil-LEAD-3-772fd11de4144552a485af87f7033bf8.jpg', 43),
(115, 'TomatoandAvocadoBruschetta_8.jpg', 43),
(116, '4_RlQAFY41FAwDd9JX0VmJ.webp', 44),
(117, 'Veal-saltimbocca_5a.webp', 44),
(118, '6610e022ed7c3022696d_56b314f243904c6689bcdb96ade05984_1024x1024.jpg', 45),
(119, 'panna-cotta-01.jpg', 45),
(120, 'aperol-spritz-720x720-primary-985457b239d7427da2f8b4be17131caa.jpg', 48),
(121, 'aperol-spritz-index-64873f08af990.jpg', 48),
(122, 'linguine-with-clams-3.jpg', 70),
(123, '201305-r-florentine-beefsteak_0-2000-eea190cb4f0e4d68b0595f9042c1f3b8.jpg', 69),
(124, 'Cannoli-2.webp', 75),
(125, '58.jpg', 76),
(126, 'Affogato_0-SQ.webp', 77),
(127, 'k_Photo_Recipes_2020-07-How-to-make-affogato-at-home_Kitchn_HowTo_Affogato_0281.jpeg', 77),
(128, '5e434363-f5c3-456e-b6ea-c1c88b-5013-3571-1526988505.jpg', 33),
(129, 'code456sdf.png', 78),
(130, 'Screenshot from 2023-12-15 21-48-29.png', 78),
(131, 'Screenshot from 2023-12-15 21-49-53.png', 78),
(132, 'sdfsdf.png', 78),
(157, '836a6d800e5f9defdbbc79565c841dec20231221090304.png', 90),
(158, '47941587e0e2351c9de87c73cb0e44cd20231221090304.png', 90);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `people` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `date`, `people`, `name`, `phone`, `email`, `status`) VALUES
(2, '2023-12-15 00:00:00', 1, 'Nguyen Tien Dat', '009909009', 'dat@gmail.com', 2),
(3, '2023-12-18 00:00:00', 4, 'Nguyen Thi Thanh Thao', '09880098', 'thao@gmail.com', 2),
(4, '2023-12-20 00:00:00', 5, 'Nguyen Van Thanh', '0987889987', 'thanh@gmail.com', 1),
(5, '2023-12-29 00:00:00', 6, 'Nguyen Thanh Cong', '0999900990', 'cong@gmail.com', 1),
(6, '2024-01-01 00:00:00', 4, 'Nguyen Tien Dat', '098800909', 'dat@gmail.com', 1),
(7, '2023-12-20 00:00:00', 4, 'Nguyen Van Thanh', '09009900', 'a@gmail.com', 2),
(8, '2023-12-05 00:00:00', 4, 'Nguyen Thanh Son', '098009009', 'email@gmail.com', 2),
(9, '2024-05-10 00:00:00', 1, 'Nguyen Thi Thuy Duong', '090908934', 'shin@gmail.com', 1),
(10, '2023-12-05 00:00:00', 1, 'Tran Thi Hong', '325345345', 'hong@gmail.com', 1),
(20, '2023-12-19 10:30:00', 3, 'Nguyen Tien Dat', '099090', 'dat@gmail.com', 1),
(33, '2023-12-15 09:30:00', 3, 'Nguyen Phuong Tan', '0392185869', 'tan@gmail.com', 2),
(34, '2023-12-15 09:30:00', 3, 'Nguyen Phuong Tan', '0392185869', 'tan@gmail.com', 2),
(35, '2023-12-21 10:30:00', 4, 'Nguyen Phuong Tan', '0392185869', 'tan@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
