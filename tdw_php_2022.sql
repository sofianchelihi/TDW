-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 27 jan. 2021 à 18:18
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
-- Base de données :  `tdw_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `Id_item_menu` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_item_menu` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id_item_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`Id_item_menu`, `Nom_item_menu`) VALUES
(1, 'Acceuil'),
(2, 'Type agriculture'),
(3, 'evenement'),
(4, 'Contact');

-- --------------------------------------------------------

--
-- Structure de la table `sous_menu`
--

DROP TABLE IF EXISTS `sous_menu`;
CREATE TABLE IF NOT EXISTS `sous_menu` (
  `Id_item_sous_menu` int(11) NOT NULL AUTO_INCREMENT,
  `Id_item_menu` int(11) NOT NULL,
  `Nom_item_sous_menu` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id_item_sous_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Déchargement des données de la table `sous_menu`
--

INSERT INTO `sous_menu` (`Id_item_sous_menu`, `Id_item_menu`, `Nom_item_sous_menu`) VALUES
(1, 2, 'Conventionnelle'),
(2, 2, 'Biologique'),
(3, 2, 'Durable'),
(4, 2, 'Raisonnee'),
(5, 2, 'Integree');



--- Type agriculture


CREATE TABLE IF NOT EXISTS `Type_agriculture` (
  `Id_type_agriculture` int(11) NOT NULL AUTO_INCREMENT,
  `Type_agriculture` varchar(30) COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`Id_type_agriculture`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=ascii COLLATE=ascii_bin;

INSERT INTO `formation` (`Id_formation`, `Id_type_formation`, `Nom_formation`) VALUES
(1, 'agriculture conventionnelle'),
(2, 'agriculture biologique'),
(3, 'agriculture durable'),
(4, 'agriculture raisonnée'),
(5, 'agriculture intégrée');

-- --------------------------------------------------------
DROP TABLE IF EXISTS `culture`;
CREATE TABLE IF NOT EXISTS `culture` (
  `Id_culture` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_culture` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Superficie` int(11) NOT NULL,
  `Production` int(11) NOT NULL,
  PRIMARY KEY (`Id_culture`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Déchargement des données de la table `culture`
--

INSERT INTO `culture` (`Id_culture`, `Nom_culture`, `Superficie`, `Production`) VALUES
(1, 'Ble', 220417, 729012),
(2, 'Mais', 184800, 1037791),
(3, 'Riz', 162716, 741477),
(4, 'Haricot gaines', 30612, 26529),
(5, 'Canne a sucre', 27124, 1844246),
(6, 'Arachide', 26541, 43915),
(7, 'Tournesol', 25203, 41422),
(8, 'Pomme de terre', 19098, 381682);

-- --------------------------------------------------------

--
-- Structure de la table `elevage`
--

DROP TABLE IF EXISTS `elevage`;
CREATE TABLE IF NOT EXISTS `elevage` (
  `Id_elevage` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_animal` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Nombre_tete` int(11) NOT NULL,
  PRIMARY KEY (`Id_elevage`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Déchargement des données de la table `elevage`
--

INSERT INTO `elevage` (`Id_elevage`, `Nom_animal`, `Nombre_tete`) VALUES
(1, 'Poulet', 21409683),
(2, 'Canard', 1131984),
(3, 'Lapin', 769172),
(4, 'Dinde', 462873),
(5, 'Autres volailes', 359302),
(6, 'Bovin', 1474526),
(7, 'Ovin', 1195624),
(8, 'Chevre', 1011251),
(9, 'Buffle', 194463),
(10, 'Cheval', 58832);

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name_user` varchar(20) COLLATE ascii_bin NOT NULL,
  `hash_pwd` varchar(1024) COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `name_user` (`name_user`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `name_user`, `hash_pwd`) VALUES
(1, 'Admin', 'Password');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
