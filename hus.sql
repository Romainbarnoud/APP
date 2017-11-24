-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 24 Novembre 2017 à 16:45
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `hus`
--

-- --------------------------------------------------------

--
-- Structure de la table `caractere`
--

CREATE TABLE IF NOT EXISTS `caractere` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `categorie_equipement`
--

CREATE TABLE IF NOT EXISTS `categorie_equipement` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `categorie_equipement`
--

INSERT INTO `categorie_equipement` (`ID`, `Nom`) VALUES
(2, 'lumiere'),
(3, 'temperature');

-- --------------------------------------------------------

--
-- Structure de la table `conditions_generales_utilisation`
--

CREATE TABLE IF NOT EXISTS `conditions_generales_utilisation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Contenu` text NOT NULL,
  `Date_de_derniere_modification` date NOT NULL,
  `Date_de_mise_en_ligne` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `consommation`
--

CREATE TABLE IF NOT EXISTS `consommation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date_de_depart` datetime NOT NULL,
  `Date_arret` datetime NOT NULL,
  `Temps_de_fonctionnement` int(11) NOT NULL,
  `Puissance` int(11) DEFAULT NULL,
  `ID_Equipement` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `donnee`
--

CREATE TABLE IF NOT EXISTS `donnee` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` datetime NOT NULL,
  `Donnée` int(11) NOT NULL,
  `ID_Equipement` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

CREATE TABLE IF NOT EXISTS `droits` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `element_du_site`
--

CREATE TABLE IF NOT EXISTS `element_du_site` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(60) NOT NULL,
  `Lien` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `equipements`
--

CREATE TABLE IF NOT EXISTS `equipements` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Etat` tinyint(1) NOT NULL,
  `Date_installation` datetime NOT NULL,
  `ID_Piece` int(11) NOT NULL,
  `ID_Equipement_lie` int(11) DEFAULT NULL,
  `ID_type_equipement` int(11) NOT NULL,
  `ID_categorie_equipement` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `equipements`
--

INSERT INTO `equipements` (`ID`, `Nom`, `Etat`, `Date_installation`, `ID_Piece`, `ID_Equipement_lie`, `ID_type_equipement`, `ID_categorie_equipement`) VALUES
(1, 'cemacsalon', 1, '2017-11-24 14:34:37', 1, NULL, 6, NULL),
(2, 'capttemp', 0, '2017-11-24 16:37:38', 1, 1, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `equipements_proposes_par_domisep`
--

CREATE TABLE IF NOT EXISTS `equipements_proposes_par_domisep` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prix` int(11) NOT NULL,
  `Caracteristiques` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fonctionnalite_programmee`
--

CREATE TABLE IF NOT EXISTS `fonctionnalite_programmee` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(30) NOT NULL,
  `Date_de_la_demande` datetime NOT NULL,
  `Date_execution` datetime NOT NULL,
  `Detail _de_la_demande` varchar(255) NOT NULL,
  `ID_Equipement` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `formulaire_sav`
--

CREATE TABLE IF NOT EXISTS `formulaire_sav` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` datetime NOT NULL,
  `Contenu` varchar(255) NOT NULL,
  `ID_Objet_Formulaire` int(11) NOT NULL,
  `ID_Utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `habitat`
--

CREATE TABLE IF NOT EXISTS `habitat` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Code postal` int(11) NOT NULL,
  `Rue` varchar(255) NOT NULL,
  `Numero_de_la_rue` int(11) NOT NULL,
  `Etage` int(11) DEFAULT NULL,
  `Numero_de_appartement` int(11) DEFAULT NULL,
  `ID_Pays` int(11) NOT NULL,
  `ID_Ville` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `habitat`
--

INSERT INTO `habitat` (`ID`, `Code postal`, `Rue`, `Numero_de_la_rue`, `Etage`, `Numero_de_appartement`, `ID_Pays`, `ID_Ville`) VALUES
(1, 75006, 'rue du regard', 16, 0, 15, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `intervention_domisep`
--

CREATE TABLE IF NOT EXISTS `intervention_domisep` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date_intervention` date NOT NULL,
  `Description_intervention` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `lien intervention domisep-panne`
--

CREATE TABLE IF NOT EXISTS `lien intervention domisep-panne` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Intervention_Domisep` int(11) NOT NULL,
  `ID_Panne` int(11) NOT NULL,
  `ID_Utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `lien_droit_utilisateur`
--

CREATE TABLE IF NOT EXISTS `lien_droit_utilisateur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Droit` int(11) NOT NULL,
  `ID_Utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `objet_formulaire`
--

CREATE TABLE IF NOT EXISTS `objet_formulaire` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `pannes`
--

CREATE TABLE IF NOT EXISTS `pannes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Equipement` int(11) NOT NULL,
  `Date_de_signalisation` datetime NOT NULL,
  `Date_de_reparation` datetime DEFAULT NULL,
  `Statut` tinyint(1) NOT NULL,
  `ID_Caractere` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`ID`, `Nom`) VALUES
(1, 'France');

-- --------------------------------------------------------

--
-- Structure de la table `pieces`
--

CREATE TABLE IF NOT EXISTS `pieces` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Surface` int(11) NOT NULL,
  `ID_Habitat` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `pieces`
--

INSERT INTO `pieces` (`ID`, `Nom`, `Surface`, `ID_Habitat`) VALUES
(1, 'salon', 50, 1);

-- --------------------------------------------------------

--
-- Structure de la table `poins_de_vente_domisep`
--

CREATE TABLE IF NOT EXISTS `poins_de_vente_domisep` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_du_point_de_vente` varchar(255) NOT NULL,
  `Code_postal` int(11) NOT NULL,
  `Rue` varchar(255) NOT NULL,
  `Numero_de_la_rue` int(11) NOT NULL,
  `Numero_de_telephone` int(11) NOT NULL,
  `Adresse_mail` varchar(255) NOT NULL,
  `ID_Pays` int(11) NOT NULL,
  `ID_Ville` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Etat` tinyint(1) NOT NULL,
  `ID_point_de_vente_Domisep` int(11) NOT NULL,
  `ID_equipement _propose_par_Domisep` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `type utilisateur`
--

CREATE TABLE IF NOT EXISTS `type utilisateur` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `ID_Habitat` int(11) NOT NULL,
  `ID_Utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `type_equipement`
--

CREATE TABLE IF NOT EXISTS `type_equipement` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `type_equipement`
--

INSERT INTO `type_equipement` (`ID`, `Nom`) VALUES
(1, 'capteur'),
(3, 'actionneur'),
(6, 'cemac');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Adresse_mail` varchar(50) NOT NULL,
  `Mot_de_passe` varchar(30) NOT NULL,
  `Numero_fixe` int(11) NOT NULL,
  `Numero_Telephone` int(11) NOT NULL,
  `Date_inscription` date NOT NULL,
  `ID_compte_parent` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE IF NOT EXISTS `ville` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `ville`
--

INSERT INTO `ville` (`ID`, `nom`) VALUES
(1, 'Paris');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
