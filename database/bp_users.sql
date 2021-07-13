-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 13 juil. 2021 à 16:31
-- Version du serveur : 10.4.19-MariaDB
-- Version de PHP : 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cepegra_exercice_integre`
--

-- --------------------------------------------------------

--
-- Structure de la table `bp_users`
--

CREATE TABLE `bp_users` (
  `idUsers` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `bp_users`
--

INSERT INTO `bp_users` (`idUsers`, `nom`, `prenom`, `email`) VALUES
(1, 'Patureau', 'Bastien', 'bastien.patureau@yahoo.com'),
(2, 'Pat', 'Bast', 'bast.pat@yahoo.com'),
(8, 'bast', 'pat', 'pat.bast@yahoo.be');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bp_users`
--
ALTER TABLE `bp_users`
  ADD PRIMARY KEY (`idUsers`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `nom` (`nom`),
  ADD KEY `prenom` (`prenom`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bp_users`
--
ALTER TABLE `bp_users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
