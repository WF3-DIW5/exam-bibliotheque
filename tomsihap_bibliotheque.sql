-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  ven. 08 fév. 2019 à 15:06
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tomsihap_bibliotheque`
--
CREATE DATABASE IF NOT EXISTS `tomsihap_bibliotheque` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `tomsihap_bibliotheque`;

-- --------------------------------------------------------

--
-- Structure de la table `abonne`
--

DROP TABLE IF EXISTS `abonne`;
CREATE TABLE IF NOT EXISTS `abonne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `abonne`
--

INSERT INTO `abonne` (`id`, `nom`, `prenom`) VALUES
(1, 'Watson', 'Emma'),
(3, 'Stubbs', 'Alverta'),
(4, 'Sable', 'Markus'),
(5, 'Curto', 'Juan'),
(6, 'Ivester', 'Henry'),
(7, 'Johannsen', 'Charity'),
(8, 'Glidewell', 'Christena'),
(9, 'Yerian', 'Tara'),
(10, 'Meininger', 'Stewart'),
(11, 'Erskine', 'Theron'),
(12, 'Chavera', 'Reena'),
(13, 'Blackwelder', 'Daniel');

-- --------------------------------------------------------

--
-- Structure de la table `association_abonne_ouvrage`
--

DROP TABLE IF EXISTS `association_abonne_ouvrage`;
CREATE TABLE IF NOT EXISTS `association_abonne_ouvrage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_abonne` int(11) NOT NULL,
  `id_ouvrage` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `association_abonne_ouvrage`
--

INSERT INTO `association_abonne_ouvrage` (`id`, `id_abonne`, `id_ouvrage`) VALUES
(2, 6, 7),
(3, 4, 9),
(4, 9, 7),
(5, 10, 7),
(6, 10, 11),
(7, 10, 5),
(8, 9, 6),
(9, 9, 4),
(10, 1, 4),
(11, 1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `ouvrage`
--

DROP TABLE IF EXISTS `ouvrage`;
CREATE TABLE IF NOT EXISTS `ouvrage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auteur` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ouvrage`
--

INSERT INTO `ouvrage` (`id`, `titre`, `auteur`) VALUES
(4, 'L\'étranger', 'Albert Camus'),
(5, 'Le théâtre et son double', 'Antonin Artaud'),
(6, 'Le Cycle de Fondation, tome 1 : Fondation', 'Isaac Asimov'),
(7, 'Amkoullel, l\'enfant Peul', 'Amadou Hampâté Bâ'),
(8, 'Le Degré zéro de l\'écriture, suivi de Nouveaux essais critiques', 'Roland Barthes'),
(9, 'Le bleu du ciel', 'Georges Bataille'),
(10, 'Le deuxième sexe, tome 1 : Les faits et les mythes', 'Simone de Beauvoir'),
(11, 'En attendant Godot', 'Samuel Beckett');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
