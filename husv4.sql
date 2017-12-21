-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 13 déc. 2017 à 16:46
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `husv4`
--

-- --------------------------------------------------------

--
-- Structure de la table `caractere`
--

DROP TABLE IF EXISTS `caractere`;
CREATE TABLE IF NOT EXISTS `caractere` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `categorie_equipement`
--

DROP TABLE IF EXISTS `categorie_equipement`;
CREATE TABLE IF NOT EXISTS `categorie_equipement` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie_equipement`
--

INSERT INTO `categorie_equipement` (`ID`, `Nom`) VALUES
(2, 'lumiere'),
(3, 'temperature'),
(4, 'pression'),
(43, 'pas de catégorie'),
(44, 'humidité');

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_sender` int(11) NOT NULL,
  `user_receiver` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chat`
--

INSERT INTO `chat` (`id`, `user_sender`, `user_receiver`, `message`, `date`) VALUES
(1, 1, 0, 'Bonjour, j\'ai besoin d\'aide', '2017-12-07 10:06:52'),
(2, 0, 1, 'Comment puis-je vous aider ?', '2017-12-07 10:21:25'),
(3, 0, 1, 'Je suis la pour vous aider', '2017-12-09 16:28:49'),
(4, 0, 1, 'Comment allez vous ?', '2017-12-09 18:31:08'),
(5, 1, 0, 'oui', '2017-12-10 14:02:36'),
(6, 1, 0, 'test', '2017-12-10 14:03:03'),
(7, 1, 0, 'bonjour', '2017-12-10 14:03:55'),
(8, 0, 1, 'slt', '2017-12-10 14:04:13'),
(9, 0, 1, 'john c\'est bien toi ?', '2017-12-12 06:28:54'),
(10, 1, 0, 'oui oui c\'est moi', '2017-12-12 06:29:14'),
(11, 0, 0, 'test', '2017-12-12 07:34:59'),
(12, 25, 0, 'bonjour', '2017-12-13 10:12:57'),
(13, 25, 0, 'bonjour', '2017-12-13 10:24:56'),
(14, 25, 0, 'bonjour', '2017-12-13 13:24:48');

-- --------------------------------------------------------

--
-- Structure de la table `conditions_generales_utilisation`
--

DROP TABLE IF EXISTS `conditions_generales_utilisation`;
CREATE TABLE IF NOT EXISTS `conditions_generales_utilisation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Contenu` text NOT NULL,
  `Date_de_derniere_modification` date NOT NULL,
  `Date_de_mise_en_ligne` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `conditions_generales_utilisation`
--

INSERT INTO `conditions_generales_utilisation` (`ID`, `Contenu`, `Date_de_derniere_modification`, `Date_de_mise_en_ligne`) VALUES
(2, 'ARTICLE 1 : Objet\r\nLes présentes « conditions générales d\'utilisation » ont pour objet l\'encadrement juridique des modalités de mise à disposition des services du site [Nom du site] et leur utilisation par « l\'Utilisateur ».\r\nLes conditions générales d\'utilisation doivent être acceptées par tout Utilisateur souhaitant accéder au site. Elles constituent le contrat entre le site et l\'Utilisateur. L’accès au site par l’Utilisateur signifie son acceptation des présentes conditions générales d’utilisation.\r\nÉventuellement :\r\nEn cas de non-acceptation des conditions générales d\'utilisation stipulées dans le présent contrat, l\'Utilisateur se doit de renoncer à l\'accès des services proposés par le site.\r\n[Nom du site] se réserve le droit de modifier unilatéralement et à tout moment le contenu des présentes conditions générales d\'utilisation.\r\nARTICLE 2 : Mentions légales\r\nL\'édition du site [Nom du site] est assurée par la Société [Nom de la société] [SAS / SA / SARL, etc.] au capital de [montant en euros] € dont le siège social est situé au [adresse du siège social].\r\n[Le Directeur / La Directrice] de la publication est [Madame / Monsieur] [Nom & Prénom].\r\nÉventuellement :\r\n[Nom de la société] est une société du groupe [Nom de la société] [SAS / SA / SARL, etc.] au capital de [montant en euros] € dont le siège social est situé au [adresse du siège social].\r\nL\'hébergeur du site [Nom du site] est la Société [Nom de la société] [SAS / SA / SARL, etc.] au capital de [montant en euros] € dont le siège social est situé au [adresse du siège social].\r\nARTICLE 3 : Définitions\r\nLa présente clause a pour objet de définir les différents termes essentiels du contrat :\r\nUtilisateur : ce terme désigne toute personne qui utilise le site ou l\'un des services proposés par le site.\r\nContenu utilisateur : ce sont les données transmises par l\'Utilisateur au sein du site.\r\nMembre : l\'Utilisateur devient membre lorsqu\'il est identifié sur le site.\r\nIdentifiant et mot de passe : c\'est l\'ensemble des informations nécessaires à l\'identification d\'un Utilisateur sur le site. L\'identifiant et le mot de passe permettent à l\'Utilisateur d\'accéder à des services réservés aux membres du site. Le mot de passe est confidentiel.\r\nARTICLE 4 : accès aux services\r\nLe site permet à l\'Utilisateur un accès gratuit aux services suivants :\r\n[articles d’information] ;\r\n[annonces classées] ;\r\n[mise en relation de personnes] ;\r\n[publication de commentaires / d’œuvres personnelles] ;\r\n[…].\r\nLe site est accessible gratuitement en tout lieu à tout Utilisateur ayant un accès à Internet. Tous les frais supportés par l\'Utilisateur pour accéder au service (matériel informatique, logiciels, connexion Internet, etc.) sont à sa charge.\r\nSelon le cas :\r\nL’Utilisateur non membre n\'a pas accès aux services réservés aux membres. Pour cela, il doit s\'identifier à l\'aide de son identifiant et de son mot de passe.\r\nLe site met en œuvre tous les moyens mis à sa disposition pour assurer un accès de qualité à ses services. L\'obligation étant de moyens, le site ne s\'engage pas à atteindre ce résultat.\r\nTout événement dû à un cas de force majeure ayant pour conséquence un dysfonctionnement du réseau ou du serveur n\'engage pas la responsabilité de [Nom du site].\r\nL\'accès aux services du site peut à tout moment faire l\'objet d\'une interruption, d\'une suspension, d\'une modification sans préavis pour une maintenance ou pour tout autre cas. L\'Utilisateur s\'oblige à ne réclamer aucune indemnisation suite à l\'interruption, à la suspension ou à la modification du présent contrat.\r\nL\'Utilisateur a la possibilité de contacter le site par messagerie électronique à l’adresse [contact@nomdusite.com].\r\nARTICLE 5 : Propriété intellectuelle\r\nLes marques, logos, signes et tout autre contenu du site font l\'objet d\'une protection par le Code de la propriété intellectuelle et plus particulièrement par le droit d\'auteur.\r\nL\'Utilisateur sollicite l\'autorisation préalable du site pour toute reproduction, publication, copie des différents contenus.\r\nL\'Utilisateur s\'engage à une utilisation des contenus du site dans un cadre strictement privé. Une utilisation des contenus à des fins commerciales est strictement interdite.\r\nTout contenu mis en ligne par l\'Utilisateur est de sa seule responsabilité. L\'Utilisateur s\'engage à ne pas mettre en ligne de contenus pouvant porter atteinte aux intérêts de tierces personnes. Tout recours en justice engagé par un tiers lésé contre le site sera pris en charge par l\'Utilisateur.\r\nLe contenu de l\'Utilisateur peut être à tout moment et pour n\'importe quelle raison supprimé ou modifié par le site. L\'Utilisateur ne reçoit aucune justification et notification préalablement à la suppression ou à la modification du contenu Utilisateur.\r\nARTICLE 6 : Données personnelles\r\nLes informations demandées à l’inscription au site sont nécessaires et obligatoires pour la création du compte de l\'Utilisateur. En particulier, l\'adresse électronique pourra être utilisée par le site pour l\'administration, la gestion et l\'animation du service.\r\nLe site assure à l\'Utilisateur une collecte et un traitement d\'informations personnelles dans le respect de la vie privée conformément à la loi n°78-17 du 6 janvier 1978 relative à l\'informatique, aux fichiers et aux libertés. Le site est déclaré à la CNIL sous le numéro [numéro].\r\nEn vertu des articles 39 et 40 de la loi en date du 6 janvier 1978, l\'Utilisateur dispose d\'un droit d\'accès, de rectification, de suppression et d\'opposition de ses données personnelles. L\'Utilisateur exerce ce droit via :\r\nson espace personnel ;\r\nun formulaire de contact ;\r\npar mail à [adresse mail] ;\r\npar voie postale au [adresse].\r\nARTICLE 7 : Responsabilité et force majeure\r\nLes sources des informations diffusées sur le site sont réputées fiables. Toutefois, le site se réserve la faculté d\'une non-garantie de la fiabilité des sources. Les informations données sur le site le sont à titre purement informatif. Ainsi, l\'Utilisateur assume seul l\'entière responsabilité de l\'utilisation des informations et contenus du présent site.\r\nL\'Utilisateur s\'assure de garder son mot de passe secret. Toute divulgation du mot de passe, quelle que soit sa forme, est interdite.\r\nL\'Utilisateur assume les risques liés à l\'utilisation de son identifiant et mot de passe. Le site décline toute responsabilité.\r\nTout usage du service par l\'Utilisateur ayant directement ou indirectement pour conséquence des dommages doit faire l\'objet d\'une indemnisation au profit du site.\r\nUne garantie optimale de la sécurité et de la confidentialité des données transmises n\'est pas assurée par le site. Toutefois, le site s\'engage à mettre en œuvre tous les moyens nécessaires afin de garantir au mieux la sécurité et la confidentialité des données.\r\nLa responsabilité du site ne peut être engagée en cas de force majeure ou du fait imprévisible et insurmontable d\'un tiers.\r\nARTICLE 8 : Liens hypertextes\r\nDe nombreux liens hypertextes sortants sont présents sur le site, cependant les pages web où mènent ces liens n\'engagent en rien la responsabilité de [Nom du site] qui n\'a pas le contrôle de ces liens.\r\nL\'Utilisateur s\'interdit donc à engager la responsabilité du site concernant le contenu et les ressources relatives à ces liens hypertextes sortants.\r\nARTICLE 9 : Évolution du contrat\r\nLe site se réserve à tout moment le droit de modifier les clauses stipulées dans le présent contrat.\r\nARTICLE 10 : Durée\r\nLa durée du présent contrat est indéterminée. Le contrat produit ses effets à l\'égard de l\'Utilisateur à compter de l\'utilisation du service.\r\nARTICLE 11 : Droit applicable et juridiction compétente\r\nLa législation française s\'applique au présent contrat. En cas d\'absence de résolution amiable d\'un litige né entre les parties, seuls les tribunaux [du ressort de la Cour d\'appel de / de la ville de] [Ville] sont compétents.\r\nÉventuellement\r\nARTICLE 12 : Publication par l’Utilisateur\r\nLe site permet aux membres de publier [des commentaires / des œuvres personnelles].\r\nDans ses publications, le membre s’engage à respecter les règles de la Netiquette et les règles de droit en vigueur.\r\nLe site exerce une modération [a priori / a posteriori] sur les publications et se réserve le droit de refuser leur mise en ligne, sans avoir à s’en justifier auprès du membre.\r\nLe membre reste titulaire de l’intégralité de ses droits de propriété intellectuelle. Mais en publiant une publication sur le site, il cède à la société éditrice le droit non exclusif et gratuit de représenter, reproduire, adapter, modifier, diffuser et distribuer sa publication, directement ou par un tiers autorisé, dans le monde entier, sur tout support (numérique ou physique), pour la durée de la propriété intellectuelle. Le Membre cède notamment le droit d\'utiliser sa publication sur internet et sur les réseaux de téléphonie mobile.\r\nLa société éditrice s\'engage à faire figurer le nom du membre à proximité de chaque utilisation de sa publication.', '2017-12-12', '2017-12-12');

-- --------------------------------------------------------

--
-- Structure de la table `consommation`
--

DROP TABLE IF EXISTS `consommation`;
CREATE TABLE IF NOT EXISTS `consommation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date_de_depart` datetime NOT NULL,
  `Date_arret` datetime NOT NULL,
  `Temps_de_fonctionnement` int(11) NOT NULL,
  `Puissance` int(11) DEFAULT NULL,
  `ID_Equipement` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `donnee`
--

DROP TABLE IF EXISTS `donnee`;
CREATE TABLE IF NOT EXISTS `donnee` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` datetime NOT NULL,
  `Donnée` int(11) NOT NULL,
  `ID_Equipement` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

DROP TABLE IF EXISTS `droits`;
CREATE TABLE IF NOT EXISTS `droits` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `droits`
--

INSERT INTO `droits` (`ID`, `Nom`) VALUES
(1, 'Rajouter une pièce\r\n'),
(2, 'créer compte utilisateur secondaire'),
(3, 'modifier droits compte utilisateur'),
(4, 'Gestion des capteurs');

-- --------------------------------------------------------

--
-- Structure de la table `element_du_site`
--

DROP TABLE IF EXISTS `element_du_site`;
CREATE TABLE IF NOT EXISTS `element_du_site` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(60) NOT NULL,
  `Lien` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `equipements`
--

DROP TABLE IF EXISTS `equipements`;
CREATE TABLE IF NOT EXISTS `equipements` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Etat` tinyint(1) NOT NULL,
  `Date_installation` datetime NOT NULL,
  `Presence_page_accueil` tinyint(1) NOT NULL,
  `ID_Piece` int(11) NOT NULL,
  `ID_Equipement_lie` int(11) DEFAULT NULL,
  `ID_type_equipement` int(11) NOT NULL,
  `ID_categorie_equipement` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `equipements`
--

INSERT INTO `equipements` (`ID`, `Nom`, `Etat`, `Date_installation`, `Presence_page_accueil`, `ID_Piece`, `ID_Equipement_lie`, `ID_type_equipement`, `ID_categorie_equipement`) VALUES
(1, 'cemac salon', 1, '2017-11-24 14:34:37', 0, 1, NULL, 6, 43),
(94, 'capteur humidite', 1, '2017-12-12 09:42:39', 1, 1, 93, 1, 44),
(95, 'cemac rdc', 0, '2017-12-12 09:43:31', 0, 1, NULL, 6, 43),
(96, 'actionneur1', 1, '2017-12-12 09:44:13', 0, 5, 95, 3, 43);

-- --------------------------------------------------------

--
-- Structure de la table `equipements_proposes_par_domisep`
--

DROP TABLE IF EXISTS `equipements_proposes_par_domisep`;
CREATE TABLE IF NOT EXISTS `equipements_proposes_par_domisep` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Lien_image` text NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prix` int(11) NOT NULL,
  `Caracteristiques` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `fonctionnalite_programmee`
--

DROP TABLE IF EXISTS `fonctionnalite_programmee`;
CREATE TABLE IF NOT EXISTS `fonctionnalite_programmee` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(30) NOT NULL,
  `Date_de_la_demande` datetime NOT NULL,
  `Date_execution` datetime NOT NULL,
  `Detail _de_la_demande` varchar(255) NOT NULL,
  `ID_Equipement` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `formulaire_sav`
--

DROP TABLE IF EXISTS `formulaire_sav`;
CREATE TABLE IF NOT EXISTS `formulaire_sav` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` datetime NOT NULL,
  `Contenu` varchar(255) NOT NULL,
  `ID_Objet_Formulaire` int(11) NOT NULL,
  `ID_Utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `habitat`
--

DROP TABLE IF EXISTS `habitat`;
CREATE TABLE IF NOT EXISTS `habitat` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Code postal` int(11) NOT NULL,
  `Rue` varchar(255) NOT NULL,
  `Numero_de_la_rue` int(11) NOT NULL,
  `Etage` int(11) DEFAULT NULL,
  `Numero_de_appartement` int(11) DEFAULT NULL,
  `Surface` int(11) NOT NULL,
  `ID_Pays` int(11) NOT NULL,
  `ID_Ville` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `habitat`
--

INSERT INTO `habitat` (`ID`, `Code postal`, `Rue`, `Numero_de_la_rue`, `Etage`, `Numero_de_appartement`, `Surface`, `ID_Pays`, `ID_Ville`) VALUES
(1, 75006, 'rue du regard', 16, 0, 15, 0, 1, 1),
(2, 75001, 'rue des renards', 14, NULL, NULL, 150, 1, 3),
(3, 78960, 'Rue des peupliers', 21, NULL, NULL, 250, 1, 2),
(4, 74003, 'Rue du 14 juillet', 12, 5, 7, 150, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `intervention_domisep`
--

DROP TABLE IF EXISTS `intervention_domisep`;
CREATE TABLE IF NOT EXISTS `intervention_domisep` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date_intervention` date NOT NULL,
  `Description_intervention` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `lien_droit_utilisateur`
--

DROP TABLE IF EXISTS `lien_droit_utilisateur`;
CREATE TABLE IF NOT EXISTS `lien_droit_utilisateur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Droit` int(11) NOT NULL,
  `ID_Utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `lien_intervention_domisep-panne`
--

DROP TABLE IF EXISTS `lien_intervention_domisep-panne`;
CREATE TABLE IF NOT EXISTS `lien_intervention_domisep-panne` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Intervention_Domisep` int(11) NOT NULL,
  `ID_Panne` int(11) NOT NULL,
  `ID_Utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `objet_formulaire`
--

DROP TABLE IF EXISTS `objet_formulaire`;
CREATE TABLE IF NOT EXISTS `objet_formulaire` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `pannes`
--

DROP TABLE IF EXISTS `pannes`;
CREATE TABLE IF NOT EXISTS `pannes` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `capteur` varchar(255) NOT NULL,
  `type_panne` text NOT NULL,
  `date` date NOT NULL,
  `etat` varchar(255) NOT NULL,
  `date_intervention` date DEFAULT NULL,
  `nbre_interventions_necessaires` int(255) DEFAULT NULL,
  `dates_passees` int(11) DEFAULT NULL,
  `ID_Equipement` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pannes`
--

INSERT INTO `pannes` (`id`, `client_id`, `capteur`, `type_panne`, `date`, `etat`, `date_intervention`, `nbre_interventions_necessaires`, `dates_passees`, `ID_Equipement`) VALUES
(11, 25, 'cemacsalon', 'HS', '2017-12-13', 'en attente', '2017-12-13', 0, 0, 94),
(12, 25, 'cemac rdc', 'hs', '2017-12-13', 'en attente', '2017-12-13', 0, 0, 95),
(15, 25, 'actionneur1', 'mouillé', '2017-12-13', 'en attente', '2017-12-13', 0, 0, 96);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`ID`, `Nom`) VALUES
(1, 'France'),
(2, 'Angleterre'),
(3, 'Allemagne');

-- --------------------------------------------------------

--
-- Structure de la table `pieces`
--

DROP TABLE IF EXISTS `pieces`;
CREATE TABLE IF NOT EXISTS `pieces` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Surface` int(11) NOT NULL,
  `ID_Habitat` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pieces`
--

INSERT INTO `pieces` (`ID`, `Nom`, `Surface`, `ID_Habitat`) VALUES
(1, 'salon', 50, 1),
(2, 'RDC', 150, 1),
(3, 'WC', 5, 1),
(4, 'Chambre1', 20, 2),
(5, 'Chambre1', 30, 1);

-- --------------------------------------------------------

--
-- Structure de la table `poins_de_vente_domisep`
--

DROP TABLE IF EXISTS `poins_de_vente_domisep`;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Etat` tinyint(1) NOT NULL,
  `ID_point_de_vente_Domisep` int(11) NOT NULL,
  `ID_equipement _propose_par_Domisep` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `type_equipement`
--

DROP TABLE IF EXISTS `type_equipement`;
CREATE TABLE IF NOT EXISTS `type_equipement` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_equipement`
--

INSERT INTO `type_equipement` (`ID`, `Nom`) VALUES
(1, 'capteur'),
(3, 'actionneur'),
(6, 'cemac');

-- --------------------------------------------------------

--
-- Structure de la table `type_utilisateur`
--

DROP TABLE IF EXISTS `type_utilisateur`;
CREATE TABLE IF NOT EXISTS `type_utilisateur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` text NOT NULL,
  `ID_Habitat` int(11) DEFAULT NULL,
  `ID_Utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_utilisateur`
--

INSERT INTO `type_utilisateur` (`ID`, `Nom`, `ID_Habitat`, `ID_Utilisateur`) VALUES
(8, 'administrateur', NULL, 29),
(9, 'primaire', 1, 25),
(10, 'technicien', NULL, 26),
(11, 'primaire', 2, 27),
(12, 'primaire', 3, 28),
(13, 'secondaire', 2, 30),
(15, 'secondaire', NULL, 32);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `client_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`client_id`, `nom`, `email`, `password`, `telephone`) VALUES
(1, 'john smith', 'john@smith.com', 'root', '0123456789'),
(0, 'root', 'root', 'root', '0000000000');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Adresse_mail` varchar(50) NOT NULL,
  `Mot_de_passe` varchar(30) NOT NULL,
  `Numero_fixe` int(11) NOT NULL,
  `Numero_Telephone` int(11) NOT NULL,
  `Etat_connexion` tinyint(1) NOT NULL,
  `Date_inscription` date NOT NULL,
  `ID_compte_parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID`, `Nom`, `Prenom`, `Adresse_mail`, `Mot_de_passe`, `Numero_fixe`, `Numero_Telephone`, `Etat_connexion`, `Date_inscription`, `ID_compte_parent`) VALUES
(25, 'BRY', 'Nathan', 'nathan.bry@isep.fr', 'nathan', 130457896, 678899663, 1, '2017-12-12', NULL),
(26, 'Brayelle', 'Rémi', 'remi.brayelle@isep.fr', 'remi', 123654789, 632145698, 0, '2017-12-12', NULL),
(27, 'JOLY', 'Guillaume', 'guillaume.joly@isep.fr', 'guillaume', 123658798, 778986554, 0, '2017-12-12', NULL),
(28, 'CHUPIN', 'Quentin', 'quentin.chupin@isep.fr', 'quentin', 145786554, 745987865, 0, '2017-12-13', NULL),
(29, 'BALLAS', 'Nicolas', 'nicolas.ballas@isep.fr', 'nicolas', 154879515, 684154532, 0, '2017-12-11', 28),
(30, 'BARNOUD', 'Romain', 'romain.barnoud@isep.fr', 'romain', 145785421, 678955421, 0, '2017-12-14', NULL),
(32, 'AUBIER', 'Jules', 'jules.aubier@isep.fr', 'jules', 158497685, 678988765, 0, '2017-12-12', 27);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`ID`, `nom`) VALUES
(1, 'Paris'),
(2, 'Perpignan'),
(3, 'Marseille'),
(4, 'Lille'),
(5, 'Bordeaux');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
