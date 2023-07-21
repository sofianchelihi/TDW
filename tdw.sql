-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 25 déc. 2022 à 11:20
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tdw`
--

-- --------------------------------------------------------

--
-- Structure de la table `culture`
--

CREATE TABLE `culture` (
  `Id_culture` int(11) NOT NULL,
  `Nom_culture` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Superficie` int(11) NOT NULL,
  `Production` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Déchargement des données de la table `culture`
--

INSERT INTO `culture` (`Id_culture`, `Nom_culture`, `Superficie`, `Production`) VALUES
(51, 'dkk', 2000, 2000),
(44, 'Haricot gaines', 30612, 26529),
(34, 'Mais', 184800, 1037791),
(38, 'Arachide', 4000, 4000),
(40, 'Pomme de terre', 2000, 2000);

-- --------------------------------------------------------

--
-- Structure de la table `elevage`
--

CREATE TABLE `elevage` (
  `Id_elevage` int(11) NOT NULL,
  `Nom_animal` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Nombre_tete` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Déchargement des données de la table `elevage`
--

INSERT INTO `elevage` (`Id_elevage`, `Nom_animal`, `Nombre_tete`) VALUES
(1, 'Poulet', 2),
(7, 'Ovin', 1195624),
(29, 'Autres volailes', 359302),
(32, 'Chevre', 1011251),
(33, 'Buffle', 1000);

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `Id_item_menu` int(11) NOT NULL,
  `Nom_item_menu` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

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

CREATE TABLE `sous_menu` (
  `Id_item_sous_menu` int(11) NOT NULL,
  `Id_item_menu` int(11) NOT NULL,
  `Nom_item_sous_menu` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Déchargement des données de la table `sous_menu`
--

INSERT INTO `sous_menu` (`Id_item_sous_menu`, `Id_item_menu`, `Nom_item_sous_menu`) VALUES
(1, 2, 'Conventionnelle'),
(2, 2, 'Biologique'),
(3, 2, 'Durable'),
(4, 2, 'Raisonnee'),
(5, 2, 'Integree');

-- --------------------------------------------------------

--
-- Structure de la table `type_agriculture`
--

CREATE TABLE `type_agriculture` (
  `Id_type_agriculture` int(11) NOT NULL,
  `Type_agriculture` varchar(30) COLLATE ascii_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Déchargement des données de la table `type_agriculture`
--

INSERT INTO `type_agriculture` (`Id_type_agriculture`, `Type_agriculture`) VALUES
(1, 'agriculture conventionnelle'),
(2, 'agriculture biologique'),
(3, 'agriculture durable'),
(4, 'agriculture raisonnee'),
(5, 'agriculture integree');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(20) COLLATE ascii_bin NOT NULL,
  `hash_pwd` varchar(1024) COLLATE ascii_bin NOT NULL,
  `con_hashcode` text COLLATE ascii_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `name_user`, `hash_pwd`, `con_hashcode`) VALUES
(1, 'admin', 'admin', '62e81e92b7f7e7f6d1b4eb165f387fd8');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `culture`
--
ALTER TABLE `culture`
  ADD PRIMARY KEY (`Id_culture`);

--
-- Index pour la table `elevage`
--
ALTER TABLE `elevage`
  ADD PRIMARY KEY (`Id_elevage`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`Id_item_menu`);

--
-- Index pour la table `sous_menu`
--
ALTER TABLE `sous_menu`
  ADD PRIMARY KEY (`Id_item_sous_menu`);

--
-- Index pour la table `type_agriculture`
--
ALTER TABLE `type_agriculture`
  ADD PRIMARY KEY (`Id_type_agriculture`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `name_user` (`name_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `culture`
--
ALTER TABLE `culture`
  MODIFY `Id_culture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `elevage`
--
ALTER TABLE `elevage`
  MODIFY `Id_elevage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `Id_item_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `sous_menu`
--
ALTER TABLE `sous_menu`
  MODIFY `Id_item_sous_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `type_agriculture`
--
ALTER TABLE `type_agriculture`
  MODIFY `Id_type_agriculture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
