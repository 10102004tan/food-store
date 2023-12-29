-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 29, 2023 at 10:21 AM
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
  `code` varchar(100) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `email` varchar(255) NOT NULL,
  `token` varchar(500) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `password`, `code`, `role`, `email`, `token`, `status`) VALUES
(15, 'admin', '$2y$10$PvKbkajQ8yIMujtd4vh/yer0FmkrtYtFj/VzQSZl4PKfp.WuFmPKO', '0', 0, 'tan@gmail.com', '884ce14f1d147b3bcba3f0ab2eb7f0a2', 1),
(23, 'ser', '$2y$10$weEeOtNshiDenXdK/lf7MetDTl87hCZcFAUlWtXoLiT7rdMzUgkPy', NULL, 1, 'ser@ser.ser', 'cc01b053afef7c678e1d1463fd235e77', 0),
(24, 'NguyenTienDat', '$2y$10$Xac1HIL5Y.2TrufYXE1qoevb5s/LvtPG0gqwcoo2AN7dpdxOsjwvy', NULL, 1, 'dat@gmail.com', '8dcdb13022f9fbb6ed0eb22804a99389', 0),
(28, 'tan', '$2y$10$ueb6l3aoM3WHMf0Sledyeut9gDOrX6sxWiGCH7SaXriwGX0v9dFP.', '0', 1, 'tannguyen.10102004@gmail.com', NULL, 1),
(33, 'tandz1234', '$2y$10$np.j1anaG9qJIBbD7mqL3.79QYw9ZRx3WofeXAyciL5/uJgnuQPAu', '0', 1, 'tan123oskse@gmail.com', NULL, 1),
(34, 'tandz123', '$2y$10$zKHFYGqSbAyGCBCDAKpn/.bRmHiFo92q2KxqOc6gZwjFlYHZNuvEG', '0', 1, 'taolathogohoanganh@gmail.com', '0dba8456e9a36ff4ff4f697f40dcb864', 1),
(35, 'tan1', '$2y$10$LFXBP0zxsnZaYCwlsjHp9OLEjhSamBFHJjY/pOr/RkQysDoNjd5nK', '0', 1, 'dat61222@gmail.com', 'c5dd85089bd2ecd9e91ac74a4e1a934d', 1);

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
-- Table structure for table `momo_payment`
--

CREATE TABLE `momo_payment` (
  `partner_code` varchar(500) NOT NULL,
  `order_id` varchar(500) NOT NULL,
  `request_id` varchar(500) NOT NULL,
  `amount` int(11) NOT NULL,
  `order_info` varchar(500) NOT NULL,
  `order_type` varchar(500) NOT NULL,
  `trans_id` varchar(500) NOT NULL,
  `result_code` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `pay_type` varchar(500) NOT NULL,
  `response_time` varchar(500) NOT NULL,
  `extra_data` varchar(500) DEFAULT NULL,
  `signature` varchar(500) NOT NULL,
  `payment_option` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `momo_payment`
--

INSERT INTO `momo_payment` (`partner_code`, `order_id`, `request_id`, `amount`, `order_info`, `order_type`, `trans_id`, `result_code`, `message`, `pay_type`, `response_time`, `extra_data`, `signature`, `payment_option`) VALUES
('MOMOBKUN20180529', '658ce4432e8cc1703732291', '1703732294', 15792000, 'Thanh toán qua MoMo', 'momo_wallet', '3111297476', 0, 'Successful.', 'napas', '1703732385079', '', 'e258e11e99198131b62467eddc7fa1491ab9aa2b02de1365c0bb3a5923c54755', 'momo'),
('MOMOBKUN20180529', '658ce59b9be0d1703732635', '1703732638', 15792000, 'Thanh toán qua MoMo', 'momo_wallet', '3111318231', 0, 'Successful.', 'napas', '1703732684686', '', 'abd6274f2418e9a302396eccc07e331ba66664a660c1f394dfe2f7baf28a1df2', 'momo'),
('MOMOBKUN20180529', '658d6afa2b9651703766778', '1703766779', 960000, 'Thanh toán qua MoMo', 'momo_wallet', '3111620798', 0, 'Successful.', 'napas', '1703766836834', '', '156ffe940cf9b7850979e6f82d44adad385c8f580aeda93e98b006f142ac6679', 'momo'),
('MOMOBKUN20180529', '658d7363e07c51703768931', '1703768933', 3360000, 'Thanh toán qua MoMo', 'momo_wallet', '3111580757', 0, 'Successful.', 'napas', '1703768976082', '', '4fd03ccf0092dadc702935da0bc7051727c0ca73418343cf6e244454fee25ca1', 'momo'),
('MOMOBKUN20180529', '658d89496fe131703774537', '1703774538', 1800000, 'Thanh toán qua MoMo', 'momo_wallet', '3111621973', 0, 'Successful.', 'napas', '1703774590620', '', '13eb256207e111df9977681786b4b7a25658a1b78e382e63133e3be91c3aa4bc', 'momo'),
('MOMOBKUN20180529', '658d8fc8eeb5f1703776200', '1703776202', 2880000, 'Thanh toán qua MoMo', 'momo_wallet', '3111622272', 0, 'Successful.', 'napas', '1703776241910', '', '6c94045dc17382dc3c6e35c32f094ba27e9d3e1c579075b083377b867b9da7a3', 'momo'),
('MOMOBKUN20180529', '658e18bb633ac1703811259', '1703811262', 4200000, 'Thanh toán qua MoMo', 'momo_wallet', '3111547468', 0, 'Successful.', 'napas', '1703811328126', '', 'e88ec3c512a4267f1f86a96a468c5b73516e2957414a096ca57fb611d6cdde50', 'momo'),
('MOMOBKUN20180529', '658e39ab8496a1703819691', '1703819694', 1440000, 'Thanh toán qua MoMo', 'momo_wallet', '3111507705', 0, 'Successful.', 'napas', '1703819739741', '', '35f9d0876a7ead173381886ddad3ab048875c6c6bfeaeb77b0f58aaf5023c38f', 'momo'),
('MOMOBKUN20180529', '658e49991bcbb1703823769', '1703823771', 10800000, 'Thanh toán qua MoMo', 'momo_wallet', '3111612900', 0, 'Successful.', 'napas', '1703823818299', '', 'ac42cc282587a0f1d53e0c425018bb9d0c568b990af3062447566a30b2896cc6', 'momo'),
('MOMOBKUN20180529', '658e4c57a012e1703824471', '1703824473', 2400000, 'Thanh toán qua MoMo', 'momo_wallet', '3111587232', 0, 'Successful.', 'napas', '1703824519362', '', '61116ab75940e7f38b1560026e17b22cae3a163a48bfb4cd37769c14aed7427f', 'momo');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `delivery_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fullname`, `email`, `phone`, `address`, `payment_status`, `created_at`, `delivery_status`) VALUES
('658d7363e07c51703768931', 23, 'Nguyen Dat', 'dat@gmail.com', '0988809989', 'Ho Chi Minh', 1, '2023-12-28 13:08:51', 0),
('658d89496fe131703774537', 23, 'Nguyen Dat', 'dat@gmail.com', '098899000', 'Ho Chi Minh', 1, '2023-12-28 14:42:17', 0),
('658d8fc8eeb5f1703776200', 23, 'Dat Nguyen', 'dat@gmail.com', '0999999999', 'Thu Duc', 1, '2023-12-28 15:10:00', 0),
('658e18bb633ac1703811259', 23, 'Nguyen Dat', 'dat61222@gmail.com', '098009999', 'Ho Chi Minh', 1, '2023-12-29 00:54:19', 0),
('658e39ab8496a1703819691', 23, 'Nguyen Dat', 'dat61222@gmail.com', '09999999', 'Ho Chi Minh ', 1, '2023-12-29 03:14:51', 0),
('658e49991bcbb1703823769', 24, 'Nguyen Dat', 'dat@gmail.com', '0988999000', 'Ho Chi Minh', 1, '2023-12-29 04:22:49', 2),
('658e4c57a012e1703824471', 24, 'Nguyen Dat', 'dat@gmail.com', '0999000999', 'Ho Chi Minh', 1, '2023-12-29 04:34:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` varchar(500) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(20, '658d7363e07c51703768931', 75, 6),
(21, '658d7363e07c51703768931', 76, 4),
(22, '658d7363e07c51703768931', 32, 10),
(23, '658d89496fe131703774537', 68, 5),
(24, '658d8af050e6a1703774960', 45, 6),
(25, '658d8af050e6a1703774960', 32, 6),
(26, '658d8b50637261703775056', 45, 6),
(27, '658d8b50637261703775056', 32, 6),
(28, '658d8b62c60f41703775074', 45, 6),
(29, '658d8b62c60f41703775074', 32, 6),
(30, '658d8fc8eeb5f1703776200', 45, 6),
(31, '658d8fc8eeb5f1703776200', 32, 6),
(32, '658e18bb633ac1703811259', 68, 5),
(33, '658e18bb633ac1703811259', 50, 5),
(34, '658e18bb633ac1703811259', 35, 5),
(35, '658e39ab8496a1703819691', 63, 5),
(36, '658e49991bcbb1703823769', 62, 20),
(37, '658e49991bcbb1703823769', 35, 10),
(38, '658e4c57a012e1703824471', 33, 10);

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
(49, 8, 'Bottega-Limoncino-limoncello.jpg', 'Limoncello', '<p><strong>A famous citrus liqueur from the Campania region, often served as a digestif</strong></p>\r\n', 10),
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
(75, 9, 'cannoli-small-8-scaled.jpg', 'Cannoli', '<p>Crispy pastry shells filled with a mixture of ricotta cheese, sugar, and other ingredients</p>\r\n', 4),
(76, 9, 'gelato-1296x728-header.webp', 'Gelato', '<p>Description:<strong> An Italian ice cream similar to regular ice cream but with a softer texture and lower fat content</strong></p>\r\n', 4);

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
(128, '5e434363-f5c3-456e-b6ea-c1c88b-5013-3571-1526988505.jpg', 33),
(129, 'code456sdf.png', 78),
(130, 'Screenshot from 2023-12-15 21-48-29.png', 78),
(131, 'Screenshot from 2023-12-15 21-49-53.png', 78),
(132, 'sdfsdf.png', 78),
(159, 'd41d8cd98f00b204e9800998ecf8427e20231227041023.', 76),
(161, 'd41d8cd98f00b204e9800998ecf8427e20231227043136.', 49),
(162, 'd41d8cd98f00b204e9800998ecf8427e20231228143455.', 75);

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
(35, '2023-12-21 10:30:00', 4, 'Nguyen Phuong Tan', '0392185869', 'tan@gmail.com', 1),
(36, '2023-12-27 10:00:00', 3, 'Nguyen Phuong Tan', '0392185869', 'tannguyen.10102004@gmail.com', 2),
(43, '2023-12-27 09:00:00', 3, 'Nguyen Phuong Tan', '0392185869', 'tannguyen.10102004@gmail.com', 2);

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
-- Indexes for table `momo_payment`
--
ALTER TABLE `momo_payment`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
