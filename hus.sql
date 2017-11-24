-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 17 Novembre 2017 à 15:49
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
-- Structure de la table `categorie equipement`
--

CREATE TABLE IF NOT EXISTS `categorie equipement` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `conditions générales d'utilisation`
--

CREATE TABLE IF NOT EXISTS `conditions générales d'utilisation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Contenu` text NOT NULL,
  `Date de dernière modification` date NOT NULL,
  `Date de mise en ligne` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `consommation`
--

CREATE TABLE IF NOT EXISTS `consommation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date/Heure de départ` datetime NOT NULL,
  `Date/Heure d'arrêt` datetime NOT NULL,
  `Temps de fonctionnement` int(11) NOT NULL,
  `Puissance` int(11) DEFAULT NULL,
  `ID_Equipement` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `donnée`
--

CREATE TABLE IF NOT EXISTS `donnée` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date/Heure` datetime NOT NULL,
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
-- Structure de la table `element du site`
--

CREATE TABLE IF NOT EXISTS `element du site` (
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
  `Etat` int(11) NOT NULL,
  `Date d'installation` datetime NOT NULL,
  `ID_Pièce` int(11) NOT NULL,
  `ID_Equipement_lié` int(11) NOT NULL,
  `ID_type_equipement` int(11) NOT NULL,
  `ID_catégorie_equipement` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fonctionnalité programmée`
--

CREATE TABLE IF NOT EXISTS `fonctionnalité programmée` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(30) NOT NULL,
  `Date/Heure de la demande` datetime NOT NULL,
  `Date/Heure d'exécution` datetime NOT NULL,
  `Détail de la demande` varchar(255) NOT NULL,
  `ID_Equipement` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `formulaire sav`
--

CREATE TABLE IF NOT EXISTS `formulaire sav` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date/Heure` datetime NOT NULL,
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
  `Numéro de la rue` int(11) NOT NULL,
  `Etage` int(11) DEFAULT NULL,
  `Numéro de l'appartement` int(11) DEFAULT NULL,
  `ID_Pays` int(11) NOT NULL,
  `ID_Ville` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `intervention domisep`
--

CREATE TABLE IF NOT EXISTS `intervention domisep` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date d'intervention` date NOT NULL,
  `Description intervention` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `lien droit-utilisateur`
--

CREATE TABLE IF NOT EXISTS `lien droit-utilisateur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Droit` int(11) NOT NULL,
  `ID_Utilisateur` int(11) NOT NULL,
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
-- Structure de la table `objet formulaire`
--

CREATE TABLE IF NOT EXISTS `objet formulaire` (
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
  `Date de signalisation` datetime NOT NULL,
  `Date de réparation` datetime DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `pièces`
--

CREATE TABLE IF NOT EXISTS `pièces` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Surface` int(11) NOT NULL,
  `ID_Habitat` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `poins de vente domisep`
--

CREATE TABLE IF NOT EXISTS `poins de vente domisep` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom du point de vente` varchar(255) NOT NULL,
  `Code postal` int(11) NOT NULL,
  `Rue` varchar(255) NOT NULL,
  `Numéro de la rue` int(11) NOT NULL,
  `Numéro de téléphone` int(11) NOT NULL,
  `Adresse mail` varchar(255) NOT NULL,
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
  `ID_equipement _proposé_par_Domisep` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `type equipement`
--

CREATE TABLE IF NOT EXISTS `type equipement` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
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
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  `Prénom` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Adresse mail` varchar(50) NOT NULL,
  `Mot de passe` varchar(30) NOT NULL,
  `Numéro fixe` int(11) NOT NULL,
  `Numéro Téléphone` int(11) NOT NULL,
  `Date d'inscription` date NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `équipements proposés par domisep`
--

CREATE TABLE IF NOT EXISTS `équipements proposés par domisep` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prix` int(11) NOT NULL,
  `Caractéristiques` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
