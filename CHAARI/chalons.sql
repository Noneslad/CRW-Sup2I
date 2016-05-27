-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 09 Mai 2016 à 23:40
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `chalons`
--

-- --------------------------------------------------------

--
-- Structure de la table `pageweb`
--

CREATE TABLE IF NOT EXISTS `pageweb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `password`) VALUES
(1, 'Chomel', 'JÃ©rÃ©my', 'jeremy.chomel@gmail.com', 'test'),
(3, 'Frier', 'Arnault', 'test@gmail.com', 'test'),
(4, 'test', 'test', 'test@yahoo.fr', 'test'),
(5, 'test2', 'testtet', 'test@mail.com', 'test'),
(6, 'test3', 'test3', 'test3@gmail.com', 'test3'),
(7, 'testest', 'testest', 'testest@gmail.com', 'testest'),
(8, 'sqdsqdqdqd', 'sqdsqdqdqd', 'sqdsqdqdqd@gmail.com', 'sqdsqdqdqd'),
(9, 'IFS73', 'IFS73', 'ifs73@gmail.com', 'IFS73'),
(12, 'sdfdsf', 'sdfdsf', '', ''),
(15, 'fdsfsf', 'sdfsdf', 'dfdffsdf@gmail.com', 'sdfdsfdsf');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
