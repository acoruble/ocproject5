-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 12 avr. 2019 à 14:57
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
-- Base de données :  `ocproject5`
--

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
(14, 'test1', 'test1', '$2y$10$DHQtPPDa6U.1xqtnu3w6feDmpaIZVhgwZpVJ8W34L1hs4Q91n3kNy', 'guillanne@gmail.com'),
(15, 'superadmin', 'administrateur', '$2y$10$drxv5wHbShsYcI7V5IhG8eGVDnmOFN2bfPajh4//KADm2GIUbkQ7e', 'acoruble@yahoo.com'),
(16, 'Bonbon', 'Bleu', '$2y$10$raf/SHvgbHsOmOyiD2mG.OGcjvoJAqmj1ltBJwsQJIX5SWGLgZzYy', 'anne-lise.coruble@my-digital-school.org');

-- --------------------------------------------------------

--
-- Structure de la table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Status` varchar(255) NOT NULL,
  `Author` int(255) NOT NULL,
  `Way_ID` int(11) NOT NULL,
  `Target` int(255) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Content` text NOT NULL,
  UNIQUE KEY `ID_2` (`ID`),
  KEY `ID` (`ID`),
  KEY `ID_3` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `review`
--

INSERT INTO `review` (`ID`, `Status`, `Author`, `Way_ID`, `Target`, `Rating`, `Content`) VALUES
(20, 'Validé', 14, 32, 15, 5, 'jy, b'),
(24, 'Validé', 15, 32, 16, 5, 'Ceci est un avis pour bonbon !'),
(28, 'Validé', 16, 32, 15, 3, 'Toc toc !');

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
  `Passenger_1` int(11) DEFAULT NULL,
  `Passenger_2` int(11) DEFAULT NULL,
  `Passenger_3` int(11) DEFAULT NULL,
  `Passenger_4` int(11) DEFAULT NULL,
  `Passenger_5` int(11) DEFAULT NULL,
  `Passenger_6` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_driver` (`Driver`),
  KEY `Passenger_1` (`Passenger_1`),
  KEY `Passenger_2` (`Passenger_2`),
  KEY `Passenger_3` (`Passenger_3`),
  KEY `Passenger_4` (`Passenger_4`),
  KEY `Passenger_5` (`Passenger_5`),
  KEY `Passenger_6` (`Passenger_6`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `way`
--

INSERT INTO `way` (`ID`, `Status`, `Driver`, `Starting_point`, `Destination`, `Passenger`, `Car`, `Date_way`, `Time_start`, `Time_arrival`, `Passenger_1`, `Passenger_2`, `Passenger_3`, `Passenger_4`, `Passenger_5`, `Passenger_6`) VALUES
(32, 'Terminé', 15, '64 Rue de Dunkerque, Paris, France', '54 Rue de Rivoli, Paris, France', '3', 'c4 picasso', '2019-04-12', '15:30', '16:30', 14, 16, NULL, NULL, NULL, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `way`
--
ALTER TABLE `way`
  ADD CONSTRAINT `FK_ Passenger_1` FOREIGN KEY (`Passenger_1`) REFERENCES `people` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_ Passenger_2` FOREIGN KEY (`Passenger_2`) REFERENCES `people` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_ Passenger_3` FOREIGN KEY (`Passenger_3`) REFERENCES `people` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_ Passenger_4` FOREIGN KEY (`Passenger_4`) REFERENCES `people` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_ Passenger_5` FOREIGN KEY (`Passenger_5`) REFERENCES `people` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_ Passenger_6` FOREIGN KEY (`Passenger_6`) REFERENCES `people` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_driver` FOREIGN KEY (`Driver`) REFERENCES `people` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
