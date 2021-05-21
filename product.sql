-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 21, 2021 at 03:24 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
