-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 25 avr. 2020 à 15:38
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `velovert`
--

-- --------------------------------------------------------

--
-- Structure de la table `ADMIN`
--

CREATE TABLE `ADMIN` (
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ADMIN`
--

INSERT INTO `ADMIN` (`login`, `password`) VALUES
('admin', 'admin'),
('boss', 'boss');

-- --------------------------------------------------------

--
-- Structure de la table `AMIS`
--

CREATE TABLE `AMIS` (
  `noami` varchar(50) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `AMIS`
--

INSERT INTO `AMIS` (`noami`, `nom`, `prenom`, `telephone`, `photo`, `password`) VALUES
('goue', 'goube ', 'elise', '4384321123', 'elise.jpg', '123'),
('kalg', 'kalume ', 'gael', '5144581134', 'gaelchoco.jpg', '123'),
('soug', 'soumbia ', 'guidi', '5145180155', 'soumbia.jpg', 'juju'),
('tagu', 'tagne', 'ulrich', '5145180155', 'ulrich.jpg', '123');

-- --------------------------------------------------------

--
-- Structure de la table `VELO`
--

CREATE TABLE `VELO` (
  `novelo` int(50) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `prix` double NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `VELO`
--

INSERT INTO `VELO` (`novelo`, `marque`, `prix`, `photo`) VALUES
(2, 'BIXI', 342, 'peugeot.jpeg'),
(3, 'VTC', 121, 'vtc.jpg'),
(4, 'Sport urban ', 232, 'vsporturbain.jpg'),
(5, 'VAE', 343, 'vae.jpg'),
(6, 'cargo', 89, 'cargo.jpg'),
(7, 'les trois roues', 146, '3roue.jpg'),
(8, 'VTT', 300, 'vtt.jpg'),
(9, 'CHOCO', 147, 'choco.jpg'),
(11, 'GCDN ', 400, 'gcdn.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ADMIN`
--
ALTER TABLE `ADMIN`
  ADD PRIMARY KEY (`login`);

--
-- Index pour la table `AMIS`
--
ALTER TABLE `AMIS`
  ADD PRIMARY KEY (`noami`);

--
-- Index pour la table `VELO`
--
ALTER TABLE `VELO`
  ADD PRIMARY KEY (`novelo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `VELO`
--
ALTER TABLE `VELO`
  MODIFY `novelo` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
