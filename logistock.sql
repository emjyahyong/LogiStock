-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 25 oct. 2024 à 11:04
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `gerants`
--

INSERT INTO `gerants` (`id`, `nom`, `prenom`, `email`, `mdp`) VALUES
(1, 'ahyong', 'mj', 'mj@gmail.com', '$2y$10$UlkhUjGUTCBn2IrkK/Ptqu.X0YZnj6O4KpHK6LPfa7DXUIsP.8u6O'),
(3, 't', 't', 't@gmail.com', '$2y$10$va2hfXrOUOvFtrhUvHsB/u/bWtE0U6bBloSewo1Ql4blHKi4iu2dm');

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
  PRIMARY KEY (`id`),
  KEY `fk_idGerant` (`idGerant`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `inventaireslogistock`
--

INSERT INTO `inventaireslogistock` (`id`, `nomArticles`, `stock`, `prix`, `idGerant`) VALUES
(1, 'marteau', 4, 54, 1),
(7, 'sg', 1, 1, 1),
(8, 'to', 1, 1, 1),
(11, 'r', 7, 7, 3);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `inventaireslogistock`
--
ALTER TABLE `inventaireslogistock`
  ADD CONSTRAINT `fk_idGerant` FOREIGN KEY (`idGerant`) REFERENCES `gerants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
