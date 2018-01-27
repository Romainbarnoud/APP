-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 08 Janvier 2018 à 11:52
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `husv4`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=60 ;

--
-- Contenu de la table `categorie_equipement`
--

INSERT INTO `categorie_equipement` (`ID`, `Nom`) VALUES
(2, 'lumiere'),
(3, 'temperature'),
(4, 'pression'),
(43, 'pas de catégorie'),
(54, 'capteur de mouvement'),
(55, 'chauffage'),
(58, 'climatisation');

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_sender` int(11) NOT NULL,
  `user_receiver` int(11) NOT NULL,
  `message` text CHARACTER SET latin1 NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `chat`
--

INSERT INTO `chat` (`id`, `user_sender`, `user_receiver`, `message`, `date`) VALUES
(1, 1, 0, 'Bonjour, j''ai besoin d''aide', '2017-12-07 10:06:52'),
(2, 0, 1, 'Comment puis-je vous aider ?', '2017-12-07 10:21:25'),
(3, 0, 1, 'Je suis la pour vous aider', '2017-12-09 16:28:49'),
(4, 0, 1, 'Comment allez vous ?', '2017-12-09 18:31:08'),
(5, 1, 0, 'oui', '2017-12-10 14:02:36'),
(6, 1, 0, 'test', '2017-12-10 14:03:03'),
(7, 1, 0, 'bonjour', '2017-12-10 14:03:55'),
(8, 0, 1, 'slt', '2017-12-10 14:04:13'),
(9, 0, 1, 'john c''est bien toi ?', '2017-12-12 06:28:54'),
(10, 1, 0, 'oui oui c''est moi', '2017-12-12 06:29:14'),
(11, 0, 0, 'test', '2017-12-12 07:34:59'),
(12, 25, 0, 'bonjour', '2017-12-13 10:12:57'),
(13, 25, 0, 'bonjour', '2017-12-13 10:24:56'),
(14, 25, 0, 'bonjour', '2017-12-13 13:24:48');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `conditions_generales_utilisation`
--

INSERT INTO `conditions_generales_utilisation` (`ID`, `Contenu`, `Date_de_derniere_modification`, `Date_de_mise_en_ligne`) VALUES
(2, 'ARTICLE 1 : Objet\r\nLes présentes « conditions générales d''utilisation » ont pour objet l''encadrement juridique des modalités de mise à disposition des services du site [Nom du site] et leur utilisation par « l''Utilisateur ».\r\nLes conditions générales d''utilisation doivent être acceptées par tout Utilisateur souhaitant accéder au site. Elles constituent le contrat entre le site et l''Utilisateur. L’accès au site par l’Utilisateur signifie son acceptation des présentes conditions générales d’utilisation.\r\nÉventuellement :\r\nEn cas de non-acceptation des conditions générales d''utilisation stipulées dans le présent contrat, l''Utilisateur se doit de renoncer à l''accès des services proposés par le site.\r\n[Nom du site] se réserve le droit de modifier unilatéralement et à tout moment le contenu des présentes conditions générales d''utilisation.\r\nARTICLE 2 : Mentions légales\r\nL''édition du site [Nom du site] est assurée par la Société [Nom de la société] [SAS / SA / SARL, etc.] au capital de [montant en euros] € dont le siège social est situé au [adresse du siège social].\r\n[Le Directeur / La Directrice] de la publication est [Madame / Monsieur] [Nom & Prénom].\r\nÉventuellement :\r\n[Nom de la société] est une société du groupe [Nom de la société] [SAS / SA / SARL, etc.] au capital de [montant en euros] € dont le siège social est situé au [adresse du siège social].\r\nL''hébergeur du site [Nom du site] est la Société [Nom de la société] [SAS / SA / SARL, etc.] au capital de [montant en euros] € dont le siège social est situé au [adresse du siège social].\r\nARTICLE 3 : Définitions\r\nLa présente clause a pour objet de définir les différents termes essentiels du contrat :\r\nUtilisateur : ce terme désigne toute personne qui utilise le site ou l''un des services proposés par le site.\r\nContenu utilisateur : ce sont les données transmises par l''Utilisateur au sein du site.\r\nMembre : l''Utilisateur devient membre lorsqu''il est identifié sur le site.\r\nIdentifiant et mot de passe : c''est l''ensemble des informations nécessaires à l''identification d''un Utilisateur sur le site. L''identifiant et le mot de passe permettent à l''Utilisateur d''accéder à des services réservés aux membres du site. Le mot de passe est confidentiel.\r\nARTICLE 4 : accès aux services\r\nLe site permet à l''Utilisateur un accès gratuit aux services suivants :\r\n[articles d’information] ;\r\n[annonces classées] ;\r\n[mise en relation de personnes] ;\r\n[publication de commentaires / d’œuvres personnelles] ;\r\n[…].\r\nLe site est accessible gratuitement en tout lieu à tout Utilisateur ayant un accès à Internet. Tous les frais supportés par l''Utilisateur pour accéder au service (matériel informatique, logiciels, connexion Internet, etc.) sont à sa charge.\r\nSelon le cas :\r\nL’Utilisateur non membre n''a pas accès aux services réservés aux membres. Pour cela, il doit s''identifier à l''aide de son identifiant et de son mot de passe.\r\nLe site met en œuvre tous les moyens mis à sa disposition pour assurer un accès de qualité à ses services. L''obligation étant de moyens, le site ne s''engage pas à atteindre ce résultat.\r\nTout événement dû à un cas de force majeure ayant pour conséquence un dysfonctionnement du réseau ou du serveur n''engage pas la responsabilité de [Nom du site].\r\nL''accès aux services du site peut à tout moment faire l''objet d''une interruption, d''une suspension, d''une modification sans préavis pour une maintenance ou pour tout autre cas. L''Utilisateur s''oblige à ne réclamer aucune indemnisation suite à l''interruption, à la suspension ou à la modification du présent contrat.\r\nL''Utilisateur a la possibilité de contacter le site par messagerie électronique à l’adresse [contact@nomdusite.com].\r\nARTICLE 5 : Propriété intellectuelle\r\nLes marques, logos, signes et tout autre contenu du site font l''objet d''une protection par le Code de la propriété intellectuelle et plus particulièrement par le droit d''auteur.\r\nL''Utilisateur sollicite l''autorisation préalable du site pour toute reproduction, publication, copie des différents contenus.\r\nL''Utilisateur s''engage à une utilisation des contenus du site dans un cadre strictement privé. Une utilisation des contenus à des fins commerciales est strictement interdite.\r\nTout contenu mis en ligne par l''Utilisateur est de sa seule responsabilité. L''Utilisateur s''engage à ne pas mettre en ligne de contenus pouvant porter atteinte aux intérêts de tierces personnes. Tout recours en justice engagé par un tiers lésé contre le site sera pris en charge par l''Utilisateur.\r\nLe contenu de l''Utilisateur peut être à tout moment et pour n''importe quelle raison supprimé ou modifié par le site. L''Utilisateur ne reçoit aucune justification et notification préalablement à la suppression ou à la modification du contenu Utilisateur.\r\nARTICLE 6 : Données personnelles\r\nLes informations demandées à l’inscription au site sont nécessaires et obligatoires pour la création du compte de l''Utilisateur. En particulier, l''adresse électronique pourra être utilisée par le site pour l''administration, la gestion et l''animation du service.\r\nLe site assure à l''Utilisateur une collecte et un traitement d''informations personnelles dans le respect de la vie privée conformément à la loi n°78-17 du 6 janvier 1978 relative à l''informatique, aux fichiers et aux libertés. Le site est déclaré à la CNIL sous le numéro [numéro].\r\nEn vertu des articles 39 et 40 de la loi en date du 6 janvier 1978, l''Utilisateur dispose d''un droit d''accès, de rectification, de suppression et d''opposition de ses données personnelles. L''Utilisateur exerce ce droit via :\r\nson espace personnel ;\r\nun formulaire de contact ;\r\npar mail à [adresse mail] ;\r\npar voie postale au [adresse].\r\nARTICLE 7 : Responsabilité et force majeure\r\nLes sources des informations diffusées sur le site sont réputées fiables. Toutefois, le site se réserve la faculté d''une non-garantie de la fiabilité des sources. Les informations données sur le site le sont à titre purement informatif. Ainsi, l''Utilisateur assume seul l''entière responsabilité de l''utilisation des informations et contenus du présent site.\r\nL''Utilisateur s''assure de garder son mot de passe secret. Toute divulgation du mot de passe, quelle que soit sa forme, est interdite.\r\nL''Utilisateur assume les risques liés à l''utilisation de son identifiant et mot de passe. Le site décline toute responsabilité.\r\nTout usage du service par l''Utilisateur ayant directement ou indirectement pour conséquence des dommages doit faire l''objet d''une indemnisation au profit du site.\r\nUne garantie optimale de la sécurité et de la confidentialité des données transmises n''est pas assurée par le site. Toutefois, le site s''engage à mettre en œuvre tous les moyens nécessaires afin de garantir au mieux la sécurité et la confidentialité des données.\r\nLa responsabilité du site ne peut être engagée en cas de force majeure ou du fait imprévisible et insurmontable d''un tiers.\r\nARTICLE 8 : Liens hypertextes\r\nDe nombreux liens hypertextes sortants sont présents sur le site, cependant les pages web où mènent ces liens n''engagent en rien la responsabilité de [Nom du site] qui n''a pas le contrôle de ces liens.\r\nL''Utilisateur s''interdit donc à engager la responsabilité du site concernant le contenu et les ressources relatives à ces liens hypertextes sortants.\r\nARTICLE 9 : Évolution du contrat\r\nLe site se réserve à tout moment le droit de modifier les clauses stipulées dans le présent contrat.\r\nARTICLE 10 : Durée\r\nLa durée du présent contrat est indéterminée. Le contrat produit ses effets à l''égard de l''Utilisateur à compter de l''utilisation du service.\r\nARTICLE 11 : Droit applicable et juridiction compétente\r\nLa législation française s''applique au présent contrat. En cas d''absence de résolution amiable d''un litige né entre les parties, seuls les tribunaux [du ressort de la Cour d''appel de / de la ville de] [Ville] sont compétents.\r\nÉventuellement\r\nARTICLE 12 : Publication par l’Utilisateur\r\nLe site permet aux membres de publier [des commentaires / des œuvres personnelles].\r\nDans ses publications, le membre s’engage à respecter les règles de la Netiquette et les règles de droit en vigueur.\r\nLe site exerce une modération [a priori / a posteriori] sur les publications et se réserve le droit de refuser leur mise en ligne, sans avoir à s’en justifier auprès du membre.\r\nLe membre reste titulaire de l’intégralité de ses droits de propriété intellectuelle. Mais en publiant une publication sur le site, il cède à la société éditrice le droit non exclusif et gratuit de représenter, reproduire, adapter, modifier, diffuser et distribuer sa publication, directement ou par un tiers autorisé, dans le monde entier, sur tout support (numérique ou physique), pour la durée de la propriété intellectuelle. Le Membre cède notamment le droit d''utiliser sa publication sur internet et sur les réseaux de téléphonie mobile.\r\nLa société éditrice s''engage à faire figurer le nom du membre à proximité de chaque utilisation de sa publication.', '2017-12-12', '2017-12-12');

-- --------------------------------------------------------

--
-- Structure de la table `consommation`
--

CREATE TABLE IF NOT EXISTS `consommation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date_de_depart` datetime NOT NULL,
  `Date_arret` datetime DEFAULT NULL,
  `Temps_de_fonctionnement` int(11) DEFAULT NULL,
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
  `Donnee` int(11) NOT NULL,
  `ID_Equipement` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Contenu de la table `donnee`
--

INSERT INTO `donnee` (`ID`, `Date`, `Donnee`, `ID_Equipement`) VALUES
(1, '2018-01-07 12:53:22', 20, 105),
(26, '2018-01-08 10:05:19', 21, 105),
(27, '2018-01-08 10:05:24', 21, 105),
(28, '2018-01-08 10:05:30', 21, 105),
(29, '2018-01-08 10:05:35', 21, 105),
(30, '2018-01-08 10:05:40', 21, 105),
(31, '2018-01-08 10:05:45', 21, 105),
(32, '2018-01-08 10:05:50', 21, 105),
(33, '2018-01-08 10:05:55', 21, 105),
(34, '2018-01-08 10:06:00', 21, 105),
(35, '2018-01-08 10:06:05', 21, 105),
(36, '2018-01-08 10:06:10', 21, 105),
(37, '2018-01-08 10:06:15', 21, 105),
(38, '2018-01-08 10:06:20', 21, 105),
(39, '2018-01-08 10:06:25', 21, 105),
(40, '2018-01-08 10:06:30', 21, 105),
(41, '2018-01-08 10:06:35', 21, 105),
(42, '2018-01-08 10:06:40', 21, 105),
(43, '2018-01-08 10:06:46', 21, 105),
(44, '2018-01-08 10:06:51', 21, 105),
(45, '2018-01-08 10:06:56', 21, 105),
(46, '2018-01-08 10:07:01', 21, 105),
(47, '2018-01-08 10:07:06', 21, 105),
(48, '2018-01-08 10:07:11', 21, 105),
(49, '2018-01-08 10:07:16', 21, 105);

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

CREATE TABLE IF NOT EXISTS `droits` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `droits`
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
  `Reference` text NOT NULL,
  `Etat` tinyint(1) NOT NULL,
  `Date_installation` datetime NOT NULL,
  `Presence_page_accueil` tinyint(1) NOT NULL,
  `ID_Piece` int(11) NOT NULL,
  `ID_Equipement_lie` int(11) DEFAULT NULL,
  `ID_type_equipement` int(11) NOT NULL,
  `ID_categorie_equipement` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=106 ;

--
-- Contenu de la table `equipements`
--

INSERT INTO `equipements` (`ID`, `Nom`, `Reference`, `Etat`, `Date_installation`, `Presence_page_accueil`, `ID_Piece`, `ID_Equipement_lie`, `ID_type_equipement`, `ID_categorie_equipement`) VALUES
(1, 'cemac salon', '', 0, '2017-11-24 14:34:37', 0, 1, NULL, 6, 43),
(95, 'cemac rdc', '', 0, '2017-12-12 09:43:31', 0, 1, NULL, 6, 43),
(96, 'actionneur1', '', 0, '2017-12-12 09:44:13', 0, 5, 95, 3, 43),
(99, 'capteur de pression', '', 0, '2017-12-15 14:45:47', 1, 2, 95, 1, 4),
(101, 'actionneur salon', '684548474531rgrgrtg', 0, '2017-12-21 11:00:00', 0, 4, NULL, 3, NULL),
(103, 'lumiere salon', '546423684', 1, '2017-12-30 18:02:26', 1, 1, 1, 3, 2),
(104, 'Chauffage salon', 'f16r4f63r51f', 1, '2017-12-30 18:35:18', 1, 1, 1, 3, 55),
(105, 'capteur temperature', '5464r3s4d6', 0, '2017-12-30 18:48:28', 1, 1, 1, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `equipements_proposes_par_domisep`
--

CREATE TABLE IF NOT EXISTS `equipements_proposes_par_domisep` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Lien_image` text NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Reference` text NOT NULL,
  `Prix` int(11) NOT NULL,
  `Caracteristiques` text NOT NULL,
  `Type_equipement` varchar(255) NOT NULL,
  `Categorie_equipement` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `equipements_proposes_par_domisep`
--

INSERT INTO `equipements_proposes_par_domisep` (`ID`, `Lien_image`, `Nom`, `Reference`, `Prix`, `Caracteristiques`, `Type_equipement`, `Categorie_equipement`) VALUES
(1, '', 'Capteur de soleil - Sunis Wirefree IO', 'XHEF3', 110, 'Le détecteur de soleil Somfy permet de mesurer l''ensoleillement à l''extérieur de votre habitat : maison, appartement... Ce capteur est conçu pour être couplé avec la Somfy Box ou TaHoma, afin de pouvoir envoyer des ordres aux autres équipement Somfy de la maison (volets, stores, lumières).', 'luminosite', 'capteur'),
(2, 'https://www.w3schools.com/w3css/img_fjords.jpg', 'Capteur de température extérieur- TahoMa', 'XARK9', 100, 'Le capteur de température extérieur pour box domotique (thermis) gère l’activation et la désactivation du chauffage, la descente et la remontée des volets roulants, screens extérieurs des stores et brise-soleil orientables en fonction du seuil de température réglé sur l’interface TaHoma', 'temperature', 'capteur'),
(3, '', 'Détecteur de fumée - devolo Home Control', 'BDIZYX41', 60, 'Le détecteur de fumée connecté devolo Home Control identifie tout développement de fumée très tôt et avec précision. Cet appareil alimenté par pile est installé au plafond de votre pièce où il passe presque inaperçu. Il ne nécessite aucune intervention sauf pour remplacer les piles, procéder à un test de fonctionnement et en cas d''alarme. Comme tous les composants devolo Home Control, le détecteur de fumée est configuré confortablement à travers la box devolo Home Control. Après la configuration, vous pouvez ainsi contrôler le détecteur de n''importe où pendant vos absences.', 'securite', 'capteur'),
(4, '', 'Thermostat d''ambiance - Devolo Home Control', 'XURIKTREE74', 100, 'Le thermostat d''ambiance devolo Home Control veille à ce que vous ayez dans chaque pièce la température à laquelle vous vous sentez à l''aise. Avec ce régulateur thermostatique contrôlable à distance et les thermostats de radiateur associés, vous n’avez qu’à régler la température ambiante à votre fauteuil ou à votre table au salon. Le gradient de température qui prévaut habituellement entre votre endroit préféré et le radiateur est compensé automatiquement − du moment que vous utilisez aussi le thermostat de radiateur devolo Home Control.', 'temperature', 'capteur'),
(5, '', 'Sirène d''alarme - Devolo Home Control', 'LUCARIO25', 80, 'Avec la sirène d''alarme domotique devolo Home Control, votre maison intelligente se fait entendre ! Ses 110 décibels vous avertissent de tout évènement susceptible de menacer votre maison, avec les personnes et les biens qui s’y trouvent. Vous pouvez désormais dormir tranquilles, votre alarme domotique vous alerte en cas d’intrusion, de cambriolage, de départ d’incendie ou de début d’inondation. Chaque danger est signalé de manière fiable par un son puissant.', 'securite', 'capteur'),
(6, '', 'Thermostat de radiateur - Devolo Home Control', 'MEIAOU89', 70, 'Le thermostat de radiateur intelligent devolo Home Control assure la température à laquelle vous vous sentez à l''aise dans tous les cas où vous en avez le plus besoin : le matin à la salle de bain et à la cuisine, et au salon quand vous rentrez le soir, votre chauffage domotique prend soin de votre bien être . Avec le thermostat de radiateur à commande radio et la box devolo Home Control, vous réglez la température ambiante entièrement selon vos souhaits, à la minute près.', 'temperature', 'capteur'),
(7, '', 'devolo Home Control - Détecteur de mouvement', 'HKBJIW903', 70, 'Avec le détecteur de présence devolo Home Control, vous êtes toujours en sécurité chez vous. Ce détecteur de mouvement sans fil peut être mis en place discrètement partout dans votre maison et surveille un angle de 90°.Le capteur détecte les mouvements à l''intérieur de la maison et les signale. Étant parfaitement intégré dans votre système smart home intelligent, celui-ci vous tient au courant des allées et venues dans votre maison. Vous pouvez aussi coupler le détecteur de mouvement par radio à la commande de l''éclairage, par exemple pour allumer les lampes voulues dès que vous rentrez chez vous.', 'Confort', 'Capteur'),
(8, '', 'Relais connecté sans fil - DIO Ed th 02', 'MINDILIP107', 50, 'Brancher le module sur l’entrée thermostat de la chaudière. Grâce à  l''actionneur DiO, le chauffage est programmé et contrôlé facilement depuis n’importe où avec votre smartphone.\r\n', 'actionneur', 'actionneur');

-- --------------------------------------------------------

--
-- Structure de la table `fonctionnalite_programmee`
--

CREATE TABLE IF NOT EXISTS `fonctionnalite_programmee` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Utilisateur` int(11) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Etat` tinyint(1) NOT NULL,
  `ID_Equipement` int(11) NOT NULL,
  `Jours_activite` int(11) NOT NULL,
  `Heure_Debut` int(11) NOT NULL,
  `Heure_Fin` int(11) NOT NULL,
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
  `Code_postal` int(11) NOT NULL,
  `Rue` varchar(255) NOT NULL,
  `Numero_de_la_rue` int(11) NOT NULL,
  `Etage` int(11) DEFAULT NULL,
  `Numero_de_appartement` int(11) DEFAULT NULL,
  `Surface` int(11) NOT NULL,
  `ID_Pays` int(11) NOT NULL,
  `ID_Ville` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `habitat`
--

INSERT INTO `habitat` (`ID`, `Code_postal`, `Rue`, `Numero_de_la_rue`, `Etage`, `Numero_de_appartement`, `Surface`, `ID_Pays`, `ID_Ville`) VALUES
(2, 75001, 'rue des renards', 14, NULL, NULL, 150, 1, 3),
(3, 78960, 'Rue des peupliers', 21, NULL, NULL, 250, 1, 2),
(4, 74003, 'Rue du 14 juillet', 12, 5, 7, 150, 1, 4);

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
-- Structure de la table `lien_intervention_domisep-panne`
--

CREATE TABLE IF NOT EXISTS `lien_intervention_domisep-panne` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Intervention_Domisep` int(11) NOT NULL,
  `ID_Panne` int(11) NOT NULL,
  `ID_Utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `lien_utilisateur_habitat`
--

CREATE TABLE IF NOT EXISTS `lien_utilisateur_habitat` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_type_utilisateur` int(11) NOT NULL,
  `ID_Habitat` int(11) DEFAULT NULL,
  `ID_Utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `lien_utilisateur_habitat`
--

INSERT INTO `lien_utilisateur_habitat` (`ID`, `ID_type_utilisateur`, `ID_Habitat`, `ID_Utilisateur`) VALUES
(20, 2, NULL, 38),
(21, 5, NULL, 39),
(22, 3, NULL, 40),
(23, 4, NULL, 41),
(24, 6, 2, 42),
(25, 2, 3, 43),
(26, 1, 4, 44),
(27, 1, 0, 45),
(28, 3, 2, 46),
(29, 4, 4, 47),
(30, 5, 0, 48);

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
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `capteur` varchar(255) CHARACTER SET latin1 NOT NULL,
  `type_panne` text CHARACTER SET latin1 NOT NULL,
  `date` date NOT NULL,
  `etat` varchar(255) CHARACTER SET latin1 NOT NULL,
  `date_intervention` date DEFAULT NULL,
  `nbre_interventions_necessaires` int(255) DEFAULT NULL,
  `dates_passees` int(11) DEFAULT NULL,
  `ID_Equipement` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `pannes`
--

INSERT INTO `pannes` (`id`, `client_id`, `capteur`, `type_panne`, `date`, `etat`, `date_intervention`, `nbre_interventions_necessaires`, `dates_passees`, `ID_Equipement`) VALUES
(11, 25, 'cemacsalon', 'HS', '2017-12-13', 'en attente', '2017-12-13', 0, 0, 94),
(12, 25, 'cemac rdc', 'hs', '2017-12-13', 'terminé', '2017-12-13', 1, 0, 95),
(15, 25, 'actionneur1', 'mouillé', '2017-12-13', 'terminé', '2017-12-13', 1, 1, 96),
(16, 28, 'cemac rdc', 'HS', '2017-12-14', 'en attente', '2017-12-14', 2, 1, 95),
(17, 25, 'cemac rdc', 'HS', '2017-12-15', 'en attente', '2017-12-15', 0, 0, 95),
(18, 25, 'cemac rdc', 'Hs', '2017-12-15', 'terminé', '2017-12-15', 2, 0, 95);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`ID`, `Nom`) VALUES
(1, 'France'),
(2, 'Angleterre'),
(3, 'Allemagne');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `pieces`
--

INSERT INTO `pieces` (`ID`, `Nom`, `Surface`, `ID_Habitat`) VALUES
(1, 'salon', 50, 1),
(2, 'RDC', 150, 1),
(3, 'WC', 5, 1),
(4, 'Chambre1', 20, 2),
(5, 'Chambre1', 30, 1);

-- --------------------------------------------------------

--
-- Structure de la table `points_de_vente_domisep`
--

CREATE TABLE IF NOT EXISTS `points_de_vente_domisep` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_du_point_de_vente` varchar(255) NOT NULL,
  `Image` text,
  `Code_postal` int(11) NOT NULL,
  `Rue` varchar(255) NOT NULL,
  `Numero_de_la_rue` int(11) NOT NULL,
  `Numero_de_telephone` int(11) NOT NULL,
  `Adresse_mail` varchar(255) NOT NULL,
  `ID_Pays` int(11) NOT NULL,
  `ID_Ville` int(11) NOT NULL,
  `ID_Departement` int(11) NOT NULL,
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
-- Structure de la table `type_equipement`
--

CREATE TABLE IF NOT EXISTS `type_equipement` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `type_equipement`
--

INSERT INTO `type_equipement` (`ID`, `Nom`) VALUES
(1, 'capteur'),
(3, 'actionneur'),
(6, 'cemac');

-- --------------------------------------------------------

--
-- Structure de la table `type_utilisateur`
--

CREATE TABLE IF NOT EXISTS `type_utilisateur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `type_utilisateur`
--

INSERT INTO `type_utilisateur` (`ID`, `Nom`) VALUES
(1, 'administrateur'),
(2, 'primaire'),
(3, 'secondaire'),
(4, 'technicien'),
(5, 'gérant'),
(6, 'directeur');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `client_id` int(11) NOT NULL,
  `nom` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `telephone` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`client_id`, `nom`, `email`, `password`, `telephone`) VALUES
(1, 'john smith', 'john@smith.com', 'root', '0123456789'),
(0, 'root', 'root', 'root', '0000000000');

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
  `Etat_connexion` tinyint(1) NOT NULL,
  `Date_inscription` date NOT NULL,
  `ID_compte_parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=49 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID`, `Nom`, `Prenom`, `Adresse_mail`, `Mot_de_passe`, `Numero_fixe`, `Numero_Telephone`, `Etat_connexion`, `Date_inscription`, `ID_compte_parent`) VALUES
(43, 'BARNOUD', 'Romain', 'romain.barnoud@isep.fr', 'romain', 158497865, 944945465, 1, '2017-12-28', NULL),
(45, 'BALLAS', 'Nicolas', 'nicolas.ballas@isep.fr', 'nicolas', 158497865, 678965412, 1, '2018-01-06', NULL),
(46, 'AUBIER', 'Jules', 'jules.aubier@isep.fr', 'jules', 158497685, 678451235, 1, '2018-01-06', 43),
(47, 'BRY', 'Nathan', 'nathan.bry@isep.fr', 'nathan', 158497685, 789564512, 1, '2018-01-06', NULL),
(48, 'BRAYELLE', 'Remi', 'remi.brayelle@isep.fr', 'remi', 158497865, 944945465, 1, '2018-01-06', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE IF NOT EXISTS `ville` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `ville`
--

INSERT INTO `ville` (`ID`, `nom`) VALUES
(1, 'Paris'),
(2, 'Perpignan'),
(3, 'Marseille'),
(4, 'Lille'),
(5, 'Bordeaux'),
(6, 'Lyon');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
