-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 16 déc. 2019 à 22:39
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `inscription`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `Id_auteur` int(11) NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Prenom` varchar(50) DEFAULT NULL,
  `Titre` varchar(100) DEFAULT NULL,
  `Texte` text,
  `Date_Publication` date DEFAULT NULL,
  `Email` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`Id_auteur`, `Nom`, `Prenom`, `Titre`, `Texte`, `Date_Publication`, `Email`) VALUES
(30, 'adam', 'Diallo', 'tfytfuj', 'jdiposqÃ´mqckdjo', NULL, 'KDOKSOJ@gmail.com'),
(29, 'adam', 'Diallo', 'tfytfuj', 'jdiposqÃ´mqckdjo', NULL, 'KDOKSOJ@gmail.com'),
(28, 'adam', 'Diallo', 'tfytfuj', 'jdiposqÃ´mqckdjo', NULL, 'KDOKSOJ@gmail.com'),
(27, 'adam', 'Diallo', 'tfytfuj', 'jdiposqÃ´mqckdjo', NULL, 'KDOKSOJ@gmail.com'),
(26, 'adam', 'Diallo', 'tfytfuj', 'jdiposqÃ´mqckdjo', NULL, 'KDOKSOJ@gmail.com'),
(25, 'adam', 'Diallo', 'tfytfuj', 'jdiposqÃ´mqckdjo', NULL, 'KDOKSOJ@gmail.com'),
(24, 'adam', 'Diallo', 'tfytfuj', 'jdiposqÃ´mqckdjo', NULL, 'KDOKSOJ@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`Id_auteur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `Id_auteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
