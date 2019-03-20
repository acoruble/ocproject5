-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 20 mars 2019 à 07:49
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ocproject5`
--

-- --------------------------------------------------------

--
-- Structure de la table `car`
--

DROP TABLE IF EXISTS `car`;
CREATE TABLE IF NOT EXISTS `car` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Brand` varchar(255) NOT NULL,
  `Color` varchar(255) NOT NULL,
  `Owner` varchar(255) NOT NULL,
  `Seat_number` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `people`
--

DROP TABLE IF EXISTS `people`;
CREATE TABLE IF NOT EXISTS `people` (
  `ID` int(7) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `people`
--

INSERT INTO `people` (`ID`, `Name`, `Surname`, `Password`, `Email`) VALUES
(14, 'test', 'test', '$2y$10$DHQtPPDa6U.1xqtnu3w6feDmpaIZVhgwZpVJ8W34L1hs4Q91n3kNy', 'guillanne@gmail.com'),
(15, 'test', 'test', '$2y$10$drxv5wHbShsYcI7V5IhG8eGVDnmOFN2bfPajh4//KADm2GIUbkQ7e', 'acoruble@yahoo.com'),
(16, 'Bonbon', 'Bleu', '$2y$10$raf/SHvgbHsOmOyiD2mG.OGcjvoJAqmj1ltBJwsQJIX5SWGLgZzYy', 'anne-lise.coruble@my-digital-school.org');

-- --------------------------------------------------------

--
-- Structure de la table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `ID` int(11) NOT NULL,
  `Post` text NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Way_ID` int(11) NOT NULL,
  KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `way`
--

DROP TABLE IF EXISTS `way`;
CREATE TABLE IF NOT EXISTS `way` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Status` varchar(255) NOT NULL,
  `Driver` int(11) NOT NULL,
  `Starting_point` varchar(255) NOT NULL,
  `Destination` varchar(255) NOT NULL,
  `Passenger` varchar(255) NOT NULL,
  `Car` varchar(255) NOT NULL,
  `Date_way` varchar(15) NOT NULL,
  `Time_start` varchar(255) NOT NULL,
  `Time_arrival` varchar(255) NOT NULL,
  `Passenger_1` varchar(11) DEFAULT NULL,
  `Passenger_2` varchar(11) DEFAULT NULL,
  `Passenger_3` varchar(11) DEFAULT NULL,
  `Passenger_4` varchar(11) DEFAULT NULL,
  `Passenger_5` varchar(11) DEFAULT NULL,
  `Passenger_6` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_driver` (`Driver`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `way`
--

INSERT INTO `way` (`ID`, `Status`, `Driver`, `Starting_point`, `Destination`, `Passenger`, `Car`, `Date_way`, `Time_start`, `Time_arrival`, `Passenger_1`, `Passenger_2`, `Passenger_3`, `Passenger_4`, `Passenger_5`, `Passenger_6`) VALUES
(16, 'En cours', 15, '45 Rue de Rivoli, Paris, France', '45 Boulevard Haussmann, Paris, France', '1', 'c4picasso', '2019-03-08', '01:10', '11:51', '15', '', '', '', '', ''),
(17, 'En cours', 16, '44 Rue de Rivoli, Paris, France', '51 Rue de Dunkerque, Paris, France', '1', 'citroen', '2019-03-08', '10:10', '10:10', '16', '', '', '', '', ''),
(18, 'En cours', 14, '45 Rue de Dunkerque, Paris, France', '57 Rue de Dunkerque, Paris, France', '0', 'renault', '2019-03-08', '11:11', '12:12', '', '', '', '', '', '');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `way`
--
ALTER TABLE `way`
  ADD CONSTRAINT `way_ibfk_1` FOREIGN KEY (`Driver`) REFERENCES `people` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
