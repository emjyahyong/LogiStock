-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 25 oct. 2024 à 08:36
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `logistock`
--

-- --------------------------------------------------------

--
-- Structure de la table `gerants`
--

DROP TABLE IF EXISTS `gerants`;
CREATE TABLE IF NOT EXISTS `gerants` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `gerants`
--

INSERT INTO `gerants` (`id`, `nom`, `prenom`, `email`, `mdp`) VALUES
(1, 'ahyong', 'mj', 'mj@gmail.com', '$2y$10$UlkhUjGUTCBn2IrkK/Ptqu.X0YZnj6O4KpHK6LPfa7DXUIsP.8u6O'),
(2, 'aové', 'saingorge', 'sg@gmail.com', '$2y$10$LpxVFcuDoV/G02FXFnozYeE9DyvzrxYZjk8fOidPslc4lLbFb8BYO');

-- --------------------------------------------------------

--
-- Structure de la table `inventaireslogistock`
--

DROP TABLE IF EXISTS `inventaireslogistock`;
CREATE TABLE IF NOT EXISTS `inventaireslogistock` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomArticles` varchar(30) NOT NULL,
  `stock` int NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `idGerant` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `inventaireslogistock`
--

INSERT INTO `inventaireslogistock` (`id`, `nomArticles`, `stock`, `prix`, `idGerant`) VALUES
(1, 'marteau', 4, 54, 1),
(2, 'pioche', 6, 20, 2),
(3, 'lunettes', 10, 500, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
