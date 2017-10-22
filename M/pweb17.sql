-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 22 Octobre 2017 à 20:38
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pweb17`
--

-- --------------------------------------------------------

--
-- Structure de la table `bilan`
--

CREATE TABLE `bilan` (
  `id_bilan` int(11) NOT NULL,
  `id_test` int(11) NOT NULL,
  `id_etu` int(11) NOT NULL,
  `note_test` int(11) NOT NULL,
  `date_bilan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_etu` int(11) NOT NULL,
  `genre` text COLLATE utf8_bin NOT NULL,
  `nom` text COLLATE utf8_bin NOT NULL,
  `prenom` text COLLATE utf8_bin NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `login_etu` text COLLATE utf8_bin NOT NULL,
  `pass_etu` text COLLATE utf8_bin NOT NULL,
  `matricule` int(8) NOT NULL,
  `num_grpe` text COLLATE utf8_bin NOT NULL,
  `date_etu` date NOT NULL,
  `bConnect` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`id_etu`, `genre`, `nom`, `prenom`, `email`, `login_etu`, `pass_etu`, `matricule`, `num_grpe`, `date_etu`, `bConnect`) VALUES
(1, '', 'DM', 'Michaël', 'michael.dm@etu.parisdescartes.fr', 'ii00000', 'fayestmoche', 1007, '206', '2017-09-01', 0),
(2, 'M', 'Couderc', 'Jacques', 'jacques.couderc@etu.parisdescartes.fr', 'couderc', 'couderc', 4188, '206', '2017-10-22', 1);

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id_grpe` int(11) NOT NULL,
  `num_grpe` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`id_grpe`, `num_grpe`) VALUES
(0, '206'),
(1, '205');

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE `professeur` (
  `id_prof` int(11) NOT NULL,
  `nom` text COLLATE utf8_bin NOT NULL,
  `prenom` text COLLATE utf8_bin NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `login_prof` text COLLATE utf8_bin NOT NULL,
  `pass_prof` text COLLATE utf8_bin NOT NULL,
  `date_prof` date NOT NULL,
  `bConnect` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `professeur`
--

INSERT INTO `professeur` (`id_prof`, `nom`, `prenom`, `email`, `login_prof`, `pass_prof`, `date_prof`, `bConnect`) VALUES
(1, 'Prof', 'Esseur', 'professeur@parisdescartes.fr', 'professeur', 'professeur', '2017-10-01', 0),
(2, 'Ilie', 'JM', 'jm.ilie@parisdescartes.fr', 'jmilie', 'jmilie', '2017-10-22', 0);

-- --------------------------------------------------------

--
-- Structure de la table `qcm`
--

CREATE TABLE `qcm` (
  `id_qcm` int(11) NOT NULL,
  `id_test` int(11) NOT NULL,
  `id_quest` int(11) NOT NULL,
  `bAutorise` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `id_quest` int(11) NOT NULL,
  `id_theme` int(11) NOT NULL,
  `titre` text COLLATE utf8_bin NOT NULL,
  `texte` text COLLATE utf8_bin NOT NULL,
  `bmultiple` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `question`
--

INSERT INTO `question` (`id_quest`, `id_theme`, `titre`, `texte`, `bmultiple`) VALUES
(1, 1, 'Addition', '4+6', 0),
(2, 1, 'Multiplication', '7*6', 0),
(3, 1, 'Soustraction', '18-9', 0);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `id_rep` int(11) NOT NULL,
  `id_quest` int(11) NOT NULL,
  `texte_rep` text COLLATE utf8_bin NOT NULL,
  `bvalide` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `reponse`
--

INSERT INTO `reponse` (`id_rep`, `id_quest`, `texte_rep`, `bvalide`) VALUES
(1, 1, '10', 1),
(2, 1, '8', 0),
(3, 1, '11', 0),
(4, 1, '0', 0),
(5, 2, '45', 0),
(6, 2, '42', 1),
(7, 2, '40', 0),
(8, 2, '64', 0),
(9, 3, '10', 0),
(10, 3, '12', 0),
(11, 3, '9', 1),
(12, 3, '16', 0);

-- --------------------------------------------------------

--
-- Structure de la table `resultat`
--

CREATE TABLE `resultat` (
  `id_res` int(11) NOT NULL,
  `id_test` int(11) NOT NULL,
  `id_etu` int(11) NOT NULL,
  `id_quest` int(11) NOT NULL,
  `date_res` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE `test` (
  `id_test` int(11) NOT NULL,
  `id_prof` int(11) NOT NULL,
  `num_grpe` text COLLATE utf8_bin NOT NULL,
  `titre_test` text COLLATE utf8_bin NOT NULL,
  `date_test` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `test`
--

INSERT INTO `test` (`id_test`, `id_prof`, `num_grpe`, `titre_test`, `date_test`) VALUES
(1, 0, '0', '', '0000-00-00'),
(2, 0, '0', '', '0000-00-00'),
(3, 0, '0', '', '0000-00-00'),
(4, 0, '0', '', '0000-00-00'),
(5, 1, '2', 'Lol', '0000-00-00'),
(6, 1, '2', 'Lol', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE `theme` (
  `id_theme` int(11) NOT NULL,
  `titre_theme` text COLLATE utf8_bin NOT NULL,
  `desc_theme` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `theme`
--

INSERT INTO `theme` (`id_theme`, `titre_theme`, `desc_theme`) VALUES
(1, 'Math', 'Questions de mathématiques');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `bilan`
--
ALTER TABLE `bilan`
  ADD PRIMARY KEY (`id_bilan`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_etu`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id_grpe`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`id_prof`);

--
-- Index pour la table `qcm`
--
ALTER TABLE `qcm`
  ADD PRIMARY KEY (`id_qcm`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_quest`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id_rep`);

--
-- Index pour la table `resultat`
--
ALTER TABLE `resultat`
  ADD PRIMARY KEY (`id_res`);

--
-- Index pour la table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id_test`);

--
-- Index pour la table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id_theme`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `bilan`
--
ALTER TABLE `bilan`
  MODIFY `id_bilan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id_etu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `professeur`
--
ALTER TABLE `professeur`
  MODIFY `id_prof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `id_quest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id_rep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `resultat`
--
ALTER TABLE `resultat`
  MODIFY `id_res` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `test`
--
ALTER TABLE `test`
  MODIFY `id_test` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `theme`
--
ALTER TABLE `theme`
  MODIFY `id_theme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
