-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 16 mars 2021 à 19:51
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `vallenteexpertise`
--

-- --------------------------------------------------------

--
-- Structure de la table `training_sessions`
--

DROP TABLE IF EXISTS `training_sessions`;
CREATE TABLE IF NOT EXISTS `training_sessions` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME_TRAINING` varchar(50) NOT NULL,
  `START_DATE_TRAINING` date NOT NULL,
  `END_DATE_TRAINING` date NOT NULL,
  `NUMBER_OF_PLACES_TRAINING` int(11) NOT NULL,
  `NUMBER_PLACES_TAKEN` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `training_sessions`
--

INSERT INTO `training_sessions` (`ID`, `NAME_TRAINING`, `START_DATE_TRAINING`, `END_DATE_TRAINING`, `NUMBER_OF_PLACES_TRAINING`, `NUMBER_PLACES_TAKEN`) VALUES
(3, 'FORMATION SSIAP1', '2021-05-10', '2021-05-21', 15, 7),
(5, 'FORMATION RISQUES TERRORISTE', '2021-05-24', '2021-05-28', 10, 10),
(6, 'FORMATION SSIAP2', '2021-09-20', '2021-09-30', 15, 5),
(11, 'Formation SSIAP3', '2021-04-12', '2021-04-19', 15, 0),
(13, 'Formation SSIAP2', '2021-02-15', '2021-02-26', 15, 10),
(15, 'Formation sst', '2021-04-05', '2021-04-10', 10, 10),
(16, 'Formation SSIAP', '2021-06-07', '2021-06-12', 15, 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `USER_ROLE_ID` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  KEY `User_users_role_FK` (`USER_ROLE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `lastname`, `firstname`, `username`, `password`, `USER_ROLE_ID`) VALUES
(2, 'FOFANA', 'ISABEL', 'Isa', '$2y$10$/1PBjFpdJ63/OOO5zKaPs.ImAH5PN1DV4JVr9I8T76fz0bzRc72P6', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users_role`
--

DROP TABLE IF EXISTS `users_role`;
CREATE TABLE IF NOT EXISTS `users_role` (
  `USER_ROLE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `users_role_role` varchar(50) NOT NULL,
  PRIMARY KEY (`USER_ROLE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users_role`
--

INSERT INTO `users_role` (`USER_ROLE_ID`, `users_role_role`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `User_users_role_FK` FOREIGN KEY (`USER_ROLE_ID`) REFERENCES `users_role` (`USER_ROLE_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
