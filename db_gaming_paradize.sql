-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 19, 2021 at 03:05 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gaming_paradize`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name_category`) VALUES
(5, 'ACTION'),
(6, 'ACTION-AVENTURE'),
(4, 'AVENTURE'),
(1, 'FPS'),
(3, 'MMORPG'),
(2, 'RPG');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_order`
--

CREATE TABLE `delivery_order` (
  `id` int(11) NOT NULL,
  `name_user_order_id` int(11) NOT NULL,
  `date_order` datetime NOT NULL,
  `state_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_order_product`
--

CREATE TABLE `delivery_order_product` (
  `delivery_order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210519114628', '2021-05-19 11:49:12', 596);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_product` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_product` double NOT NULL,
  `picture_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title_product`, `description_product`, `price_product`, `picture_product`, `stock_product`) VALUES
(1, 'Final Fantasy VII Remake', 'Réinterprétation du célèbre RPG de 1997. Ce premier volet se déroulera intégralement dans la ville éclectique de Midgar, où un groupe de résistants nommé Avalanche se bat pour arrêter la Shinra, une compagnie exploitant l\'énergie vitale de la planète.', 70, 'https://media.senscritique.com/media/000019104302/source_big/Final_Fantasy_VII_Remake.jpg', 50),
(2, 'NieR Replicant', 'La préquelle améliorée de NieR:Automata. Un jeune homme au grand cœur part à la recherche des Vers scellés avec Grimoire Weiss, un étrange livre doué de parole, afin de sauver sa sœur, Yonah, qui se meurt de la nécrose runique.', 70, 'https://media.senscritique.com/media/000020022467/source_big/Nie_R_Replicant_ver_1_22474487139.jpg', 20),
(3, 'Mass Effect : Legendary Edition', 'Mass Effect : Legendary Edition est une version entièrement remasterisée et optimisée en 4K Ultra HD qui inclut tout le contenu solo de base et les DLC de Mass Effect, Mass Effect 2 et Mass Effect 3, ainsi que les armes, les armures et les packs promotionnels. Visuellement les jeux ont été retravaillés pour avoir de meilleurs textures, modèles 3D, framerate etc... ', 70, 'https://media.senscritique.com/media/000019684838/source_big/Mass_Effect_Legendary_Edition.jpg', 50),
(4, 'Nioh', 'Jeu d\'action historique dans un Japon du 16e siècle, suivant les aventures d\'un samurai blond parti se battre sur les champs de bataille', 70, 'https://media.senscritique.com/media/000011864135/source_big/Nioh.jpg', 50),
(5, 'Blue Dragon', 'Rejoignez Shu et ses amis dans leurs aventures épiques au cœur du monde de Blue Dragon. Le démoniaque Nene s\'attaque à d\'innocents villages depuis son vieux vaisseau. Arriverez-vous à le traduire en justice ?', 30, 'https://media.senscritique.com/media/000016342032/source_big/Blue_Dragon.jpg', 50),
(6, 'Kingdom Hearts 2.8 HD - Final Chapter Prologue', 'Compilation de remake HD de Kingdom Hearts Dream Drop Distance, Kingdom hearts X et Kingdom Hearts 0.2: Birth by Sleep: A Fragmentary Passage', 50, 'https://media.senscritique.com/media/000020053026/source_big/Kingdom_Hearts_2_8_HD_Final_Chapter_Prologue.jpg', 30),
(7, 'Monster Hunter World', 'Plus complet que jamais, le jeu transporte le joueur au travers de batailles contre de terribles monstres et de magnifiques paysages. Récupérerez des objets sur vos ennemis, créez de nouveaux équipements et armures, explorez tous les territoires disponibles. Saurez vous devenir le chasseur ultime ?', 30, 'https://media.senscritique.com/media/000017040713/source_big/Monster_Hunter_World.jpg', 30),
(8, 'Star Wars : Jedi Knight - Jedi Academy', 'Jedi Knight: Jedi Academy est le dernier épisode de la série très acclamée, Jedi Knight. Incarnez un nouvel élève impatient de pouvoir apprendre les secrets de la Force, dispensés par le Maître Jedi Luke Skywalker. Rencontrez les personnages célèbres de Star Wars dans différents lieux issus de la série de films, alors que vous devez faire le choix ultime : vous battre pour le bien et la liberté du côté lumineux, ou suivre le chemin du pouvoir et du mal du côté obscur...', 20, 'https://media.senscritique.com/media/000019320797/source_big/Star_Wars_Jedi_Knight_Jedi_Academy.png', 10);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_id`, `category_id`) VALUES
(1, 2),
(1, 4),
(2, 2),
(2, 4),
(3, 2),
(3, 5),
(4, 2),
(4, 5),
(5, 2),
(6, 2),
(6, 6),
(7, 2),
(7, 5),
(8, 1),
(8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `product_support`
--

CREATE TABLE `product_support` (
  `product_id` int(11) NOT NULL,
  `support_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_support`
--

INSERT INTO `product_support` (`product_id`, `support_id`) VALUES
(1, 2),
(1, 3),
(2, 2),
(2, 3),
(3, 1),
(4, 2),
(5, 6),
(6, 2),
(6, 3),
(7, 2),
(7, 3),
(8, 7);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_address`
--

INSERT INTO `shipping_address` (`id`, `name`, `last_name`, `phone`, `address`, `zip_code`, `city`, `country`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'string', 'string', 'string', 'string', 'string', 'string', 'string');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `name_support` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `name_support`) VALUES
(7, 'MAC'),
(8, 'NINTENDO SWITCH'),
(1, 'PC'),
(2, 'PS4'),
(3, 'PS5'),
(6, 'XBOX 360'),
(4, 'XBOX ONE'),
(5, 'XBOX SERIE X/S');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `shipping_address_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `shipping_address_id`, `email`, `password`, `roles`, `created_at`) VALUES
(1, 1, 'admin@gmail.fr', '$2y$13$zWWZZLWzlWsqsX1GnYgvye9eLvhtAKG./fvyfFVkjn1XYf5Q6nr0q', '[\"ROLE_ADMIN\"]', '2021-05-19 11:50:35'),
(4, 5, 'user2@gmail.fr', '$2y$13$oWYOR67pYsNoJyxzYhMmPuhZk3I8OS/hzp8e9Ct9gluW6zgpv/g8O', '[\"ROLE_USER\"]', '2021-05-19 12:06:43'),
(6, 4, 'admi@gmail.fr', '$2y$13$rUrknyzB0JEIE.SpBywlU.VedE/R3/VL2rf8KQwXK45HJYoES1mq2', '[\"ROLE_USER\"]', '2021-05-19 12:08:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_64C19C12A9DEC0F` (`name_category`);

--
-- Indexes for table `delivery_order`
--
ALTER TABLE `delivery_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E522750A3FF50DBE` (`name_user_order_id`);

--
-- Indexes for table `delivery_order_product`
--
ALTER TABLE `delivery_order_product`
  ADD PRIMARY KEY (`delivery_order_id`,`product_id`),
  ADD KEY `IDX_22C2EA06ECFE8C54` (`delivery_order_id`),
  ADD KEY `IDX_22C2EA064584665A` (`product_id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_id`,`category_id`),
  ADD KEY `IDX_CDFC73564584665A` (`product_id`),
  ADD KEY `IDX_CDFC735612469DE2` (`category_id`);

--
-- Indexes for table `product_support`
--
ALTER TABLE `product_support`
  ADD PRIMARY KEY (`product_id`,`support_id`),
  ADD KEY `IDX_51DDF0154584665A` (`product_id`),
  ADD KEY `IDX_51DDF015315B405` (`support_id`);

--
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8004EBA5886FAE1B` (`name_support`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_8D93D6494D4CFF2B` (`shipping_address_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `delivery_order`
--
ALTER TABLE `delivery_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery_order`
--
ALTER TABLE `delivery_order`
  ADD CONSTRAINT `FK_E522750A3FF50DBE` FOREIGN KEY (`name_user_order_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `delivery_order_product`
--
ALTER TABLE `delivery_order_product`
  ADD CONSTRAINT `FK_22C2EA064584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_22C2EA06ECFE8C54` FOREIGN KEY (`delivery_order_id`) REFERENCES `delivery_order` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `FK_CDFC735612469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_CDFC73564584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_support`
--
ALTER TABLE `product_support`
  ADD CONSTRAINT `FK_51DDF015315B405` FOREIGN KEY (`support_id`) REFERENCES `support` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_51DDF0154584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D6494D4CFF2B` FOREIGN KEY (`shipping_address_id`) REFERENCES `shipping_address` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
