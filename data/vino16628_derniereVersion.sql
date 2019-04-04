-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 04 avr. 2019 à 04:42
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `vino16628`
--

-- --------------------------------------------------------

--
-- Structure de la table `stats`
--

DROP TABLE IF EXISTS `stats`;
CREATE TABLE IF NOT EXISTS `stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombrePartage` int(11) NOT NULL,
  `nombreAjoute` int(11) NOT NULL,
  `nombreBu` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stats`
--

INSERT INTO `stats` (`id`, `nombrePartage`, `nombreAjoute`, `nombreBu`, `date`) VALUES
(16, 0, 0, 7, '2019-04-03'),
(17, 0, 0, 6, '2019-04-02');

-- --------------------------------------------------------

--
-- Structure de la table `vino_bouteille`
--

DROP TABLE IF EXISTS `vino_bouteille`;
CREATE TABLE IF NOT EXISTS `vino_bouteille` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `code_saq` varchar(50) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `prix_saq` float DEFAULT NULL,
  `url_saq` varchar(200) DEFAULT NULL,
  `url_img` varchar(200) DEFAULT NULL,
  `format` varchar(20) DEFAULT NULL,
  `garde_jusqua` varchar(200) DEFAULT NULL,
  `millesime` int(11) DEFAULT NULL,
  `type_id` int(11) UNSIGNED NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `date_achat` date DEFAULT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `cellier_id` int(11) UNSIGNED NOT NULL,
  `vote` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`),
  KEY `cellier_id` (`cellier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vino_bouteille`
--

INSERT INTO `vino_bouteille` (`id`, `nom`, `image`, `code_saq`, `pays`, `description`, `prix_saq`, `url_saq`, `url_img`, `format`, `garde_jusqua`, `millesime`, `type_id`, `quantite`, `date_achat`, `notes`, `cellier_id`, `vote`) VALUES
(5, 'Bodegas Atalaya Laya 2017', '//s7d9.scene7.com/is/image/SAQ/12375942_is?$saq-rech-prod-gril$', '12375942', 'Espagne', 'Vin rouge\r\n         \r\n      \r\n      \r\n      Espagne, 750 ml\r\n      \r\n      \r\n      Code SAQ : 12375942', 17, 'https://www.saq.com/page/fr/saqcom/vin-rouge/bodegas-atalaya-laya-2017/12375942', '//s7d9.scene7.com/is/image/SAQ/12375942_is?$saq-rech-prod-gril$', ' 750 ml', '2020-11-10', 2010, 1, 1, '2019-01-16', NULL, 1, '3'),
(6, 'Vin Vault Pinot Grigio', '//s7d9.scene7.com/is/image/SAQ/13467048_is?$saq-rech-prod-gril$', '13467048', 'États-Unis', 'Vin blanc\r\n         \r\n      \r\n      \r\n      États-Unis, 3 L\r\n      \r\n      \r\n      Code SAQ : 13467048', 13, 'https://www.saq.com/page/fr/saqcom/vin-blanc/vin-vault-pinot-grigio/13467048', '//s7d9.scene7.com/is/image/SAQ/13467048_is?$saq-rech-prod-gril$', ' 3 L', '2019-12-14', 2015, 2, 13, '2019-01-16', NULL, 3, '4'),
(7, 'Huber Riesling Engelsberg 2017', '//s7d9.scene7.com/is/image/SAQ/13675841_is?$saq-rech-prod-gril$', '13675841', 'Autriche', 'Vin blanc\r\n         \r\n      \r\n      \r\n      Autriche, 750 ml\r\n      \r\n      \r\n      Code SAQ : 13675841', 22, 'https://www.saq.com/page/fr/saqcom/vin-blanc/huber-riesling-engelsberg-2017/13675841', '//s7d9.scene7.com/is/image/SAQ/13675841_is?$saq-rech-prod-gril$', ' 750 ml', '2019-06-26', 2008, 2, 11, '2019-01-16', NULL, 2, ''),
(8, 'Dominio de Tares Estay Castilla y Léon 2015', '//s7d9.scene7.com/is/image/SAQ/13802571_is?$saq-rech-prod-gril$', '13802571', 'Espagne', 'Vin rouge\r\n         \r\n      \r\n      \r\n      Espagne, 750 ml\r\n      \r\n      \r\n      Code SAQ : 13802571', 18, 'https://www.saq.com/page/fr/saqcom/vin-rouge/dominio-de-tares-estay-castilla-y-leon-2015/13802571', '//s7d9.scene7.com/is/image/SAQ/13802571_is?$saq-rech-prod-gril$', ' 750 ml', '2019-05-23', 2003, 1, 11, '2019-01-16', NULL, 10, ''),
(9, 'Dominio de Tares Estay Castilla y Léon 2015', '//s7d9.scene7.com/is/image/SAQ/13802571_is?$saq-rech-prod-gril$', '13802571', 'Espagne', 'Vin rouge                           Espagne, 750 ml                  Code SAQ : 13802571', 18, 'https://www.saq.com/page/fr/saqcom/vin-rouge/dominio-de-tares-estay-castilla-y-leon-2015/13802571', '//s7d9.scene7.com/is/image/SAQ/13802571_is?$saq-rech-prod-gril$', ' 750 ml', '2019-04-01', 2011, 1, 10, '2019-02-12', 'test', 4, '0'),
(10, 'Taurino Riserva Salice Salentino 2010', '//s7d9.scene7.com/is/image/SAQ/00411892_is?$saq-rech-prod-gril$', '00411892', 'Italie', 'Vin rouge    Italie,750ml      Code SAQ00411892', 16.95, 'https://www.saq.com/page/fr/saqcom/vin-rouge/taurino-riserva-salice-salentino-2010/411892', '//s7d9.scene7.com/is/image/SAQ/00411892_is?$saq-rech-prod-gril$', '750ml', '2019-04-02', 2002, 1, 9, '2018-10-08', 'test', 1, '4'),
(11, 'A.A. Badenhorst The Curator 2018', '//s7d9.scene7.com/is/image/SAQ/12889126_is?$saq-rech-prod-gril$', '12889126', 'Afrique du Sud', 'Vin blanc', 13.35, 'https://www.saq.com/page/fr/saqcom/vin-blanc/aa-badenhorst-the-curator-2018/12889126', '//s7d9.scene7.com/is/image/SAQ/12889126_is?$saq-rech-prod-gril$', '750ml', '2019-04-02', 2002, 1, 6, '2019-01-08', 'test', 1, '3');

-- --------------------------------------------------------

--
-- Structure de la table `vino_cellier`
--

DROP TABLE IF EXISTS `vino_cellier`;
CREATE TABLE IF NOT EXISTS `vino_cellier` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `usager_id` smallint(5) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usager_id` (`usager_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vino_cellier`
--

INSERT INTO `vino_cellier` (`id`, `nom`, `usager_id`) VALUES
(1, 'Cellier Tim', 4),
(2, 'Cellier Din', 2),
(3, 'Cellier Tim Chalet', 4),
(4, 'Cellier Campagne', 4),
(6, 'Cellier Nord', 4),
(8, 'test', 4),
(9, 'rsdfsdfs', 4),
(10, 'Cellier Bertrant', 6),
(11, 'Cellier Marc', 5),
(12, 'Cellier Montréal', 4),
(13, 'RETEST', 4),
(14, 'Cellier Foudil', 9),
(15, 'Cellier Machin', 4);

-- --------------------------------------------------------

--
-- Structure de la table `vino_saq`
--

DROP TABLE IF EXISTS `vino_saq`;
CREATE TABLE IF NOT EXISTS `vino_saq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `code_saq` varchar(50) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `prix_saq` float DEFAULT NULL,
  `url_saq` varchar(200) DEFAULT NULL,
  `url_img` varchar(200) DEFAULT NULL,
  `format` varchar(20) DEFAULT NULL,
  `type_id` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=649 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vino_saq`
--

INSERT INTO `vino_saq` (`id`, `nom`, `image`, `code_saq`, `pays`, `description`, `prix_saq`, `url_saq`, `url_img`, `format`, `type_id`) VALUES
(629, 'Farnese Vini Vigneti del Salento Vani...', '//s7d9.scene7.com/is/image/SAQ/13575807_is?$saq-rech-prod-gril$', '13575807', 'Italie', 'Vin rouge\r\n         \r\n      \r\n      \r\n      Italie, 750 ml\r\n      \r\n      \r\n      Code SAQ : 13575807', 15.2, 'https://www.saq.com/page/fr/saqcom/vin-rouge/farnese-vini-vigneti-del-salento-vanita-primitivo-puglia/13575807', '//s7d9.scene7.com/is/image/SAQ/13575807_is?$saq-rech-prod-gril$', '750 ml', 1),
(630, 'Taurino Riserva Salice Salentino 2010', '//s7d9.scene7.com/is/image/SAQ/00411892_is?$saq-rech-prod-gril$', '00411892', 'Italie', 'Vin rouge\r\n         \r\n      \r\n      \r\n      Italie, 750 ml\r\n      \r\n      \r\n      Code SAQ : 00411892', 16.95, 'https://www.saq.com/page/fr/saqcom/vin-rouge/taurino-riserva-salice-salentino-2010/411892', '//s7d9.scene7.com/is/image/SAQ/00411892_is?$saq-rech-prod-gril$', '750 ml', 1),
(631, 'Mezzacorona Teroldego Rotaliano Reserva 2014', '//s7d9.scene7.com/is/image/SAQ/00964593_is?$saq-rech-prod-gril$', '00964593', 'Italie', 'Vin rouge\r\n         \r\n      \r\n      \r\n      Italie, 750 ml\r\n      \r\n      \r\n      Code SAQ : 00964593', 17.55, 'https://www.saq.com/page/fr/saqcom/vin-rouge/mezzacorona-teroldego-rotaliano-reserva-2014/964593', '//s7d9.scene7.com/is/image/SAQ/00964593_is?$saq-rech-prod-gril$', '750 ml', 1),
(632, 'Alois Lageder Pinot Bianco 2017', '//s7d9.scene7.com/is/image/SAQ/12057004_is?$saq-rech-prod-gril$', '12057004', 'Italie', 'Vin blanc\r\n         \r\n      \r\n      \r\n      Italie, 750 ml\r\n      \r\n      \r\n      Code SAQ : 12057004', 19.6, 'https://www.saq.com/page/fr/saqcom/vin-blanc/alois-lageder-pinot-bianco-2017/12057004', '//s7d9.scene7.com/is/image/SAQ/12057004_is?$saq-rech-prod-gril$', '750 ml', 2),
(633, 'I Greppi Greppicante 2017', '//s7d9.scene7.com/is/image/SAQ/11191826_is?$saq-rech-prod-gril$', '11191826', 'Italie', 'Vin rouge\r\n         \r\n      \r\n      \r\n      Italie, 750 ml\r\n      \r\n      \r\n      Code SAQ : 11191826', 20.75, 'https://www.saq.com/page/fr/saqcom/vin-rouge/i-greppi-greppicante-2017/11191826', '//s7d9.scene7.com/is/image/SAQ/11191826_is?$saq-rech-prod-gril$', '750 ml', 1),
(634, 'Guado Al Tasso Il Bruciato 2017', '//s7d9.scene7.com/is/image/SAQ/11347018_is?$saq-rech-prod-gril$', '11347018', 'Italie', 'Vin rouge\r\n         \r\n      \r\n      \r\n      Italie, 750 ml\r\n      \r\n      \r\n      Code SAQ : 11347018', 24.95, 'https://www.saq.com/page/fr/saqcom/vin-rouge/guado-al-tasso-il-bruciato-2017/11347018', '//s7d9.scene7.com/is/image/SAQ/11347018_is?$saq-rech-prod-gril$', '750 ml', 1),
(635, '\'\'M\'\' Montepulciano-d\'Abruzzo', '//s7d9.scene7.com/is/image/SAQ/00518712_is?$saq-rech-prod-gril$', '00518712', 'Italie', 'Vin rouge\r\n         \r\n      \r\n      \r\n      Italie, 1 L\r\n      \r\n      \r\n      Code SAQ : 00518712', 9.65, 'https://www.saq.com/page/fr/saqcom/vin-rouge/m-montepulciano-dabruzzo/518712', '//s7d9.scene7.com/is/image/SAQ/00518712_is?$saq-rech-prod-gril$', '1 L', 1),
(636, '1000 Stories Zinfandel 2016', '//s7d9.scene7.com/is/image/SAQ/13584455_is?$saq-rech-prod-gril$', '13584455', 'États-Unis', 'Vin rouge\r\n         \r\n      \r\n      \r\n      États-Unis, 750 ml\r\n      \r\n      \r\n      Code SAQ : 13584455', 28.6, 'https://www.saq.com/page/fr/saqcom/vin-rouge/1000-stories-zinfandel-2016/13584455', '//s7d9.scene7.com/is/image/SAQ/13584455_is?$saq-rech-prod-gril$', '750 ml', 1),
(637, '14 Hands Hot to Trot Red Blend', '//s7d9.scene7.com/is/image/SAQ/12245611_is?$saq-rech-prod-gril$', '12245611', 'États-Unis', 'Vin rouge\r\n         \r\n      \r\n      \r\n      États-Unis, 750 ml\r\n      \r\n      \r\n      Code SAQ : 12245611', 15.95, 'https://www.saq.com/page/fr/saqcom/vin-rouge/14-hands-hot-to-trot-red-blend/12245611', '//s7d9.scene7.com/is/image/SAQ/12245611_is?$saq-rech-prod-gril$', '750 ml', 1),
(638, '14 Hands Pinot Grigio', '//s7d9.scene7.com/is/image/SAQ/13876271_is?$saq-rech-prod-gril$', '13876271', 'États-Unis', 'Vin blanc\r\n         \r\n      \r\n      \r\n      États-Unis, 750 ml\r\n      \r\n      \r\n      Code SAQ : 13876271', 14.95, 'https://www.saq.com/page/fr/saqcom/vin-blanc/14-hands-pinot-grigio/13876271', '//s7d9.scene7.com/is/image/SAQ/13876271_is?$saq-rech-prod-gril$', '750 ml', 2),
(639, 'Farnese Vini Vigneti del Salento Vani...', '//s7d9.scene7.com/is/image/SAQ/13575807_is?$saq-rech-prod-gril$', '13575807', 'Italie', 'Vin rouge\r\n         \r\n      \r\n      \r\n      Italie, 750 ml\r\n      \r\n      \r\n      Code SAQ : 13575807', 15.2, 'https://www.saq.com/page/fr/saqcom/vin-rouge/farnese-vini-vigneti-del-salento-vanita-primitivo-puglia/13575807', '//s7d9.scene7.com/is/image/SAQ/13575807_is?$saq-rech-prod-gril$', '750 ml', 1),
(640, 'Taurino Riserva Salice Salentino 2010', '//s7d9.scene7.com/is/image/SAQ/00411892_is?$saq-rech-prod-gril$', '00411892', 'Italie', 'Vin rouge\r\n         \r\n      \r\n      \r\n      Italie, 750 ml\r\n      \r\n      \r\n      Code SAQ : 00411892', 16.95, 'https://www.saq.com/page/fr/saqcom/vin-rouge/taurino-riserva-salice-salentino-2010/411892', '//s7d9.scene7.com/is/image/SAQ/00411892_is?$saq-rech-prod-gril$', '750 ml', 1),
(641, 'Mezzacorona Teroldego Rotaliano Reserva 2014', '//s7d9.scene7.com/is/image/SAQ/00964593_is?$saq-rech-prod-gril$', '00964593', 'Italie', 'Vin rouge\r\n         \r\n      \r\n      \r\n      Italie, 750 ml\r\n      \r\n      \r\n      Code SAQ : 00964593', 17.55, 'https://www.saq.com/page/fr/saqcom/vin-rouge/mezzacorona-teroldego-rotaliano-reserva-2014/964593', '//s7d9.scene7.com/is/image/SAQ/00964593_is?$saq-rech-prod-gril$', '750 ml', 1),
(642, 'Alois Lageder Pinot Bianco 2017', '//s7d9.scene7.com/is/image/SAQ/12057004_is?$saq-rech-prod-gril$', '12057004', 'Italie', 'Vin blanc\r\n         \r\n      \r\n      \r\n      Italie, 750 ml\r\n      \r\n      \r\n      Code SAQ : 12057004', 19.6, 'https://www.saq.com/page/fr/saqcom/vin-blanc/alois-lageder-pinot-bianco-2017/12057004', '//s7d9.scene7.com/is/image/SAQ/12057004_is?$saq-rech-prod-gril$', '750 ml', 2),
(643, 'I Greppi Greppicante 2017', '//s7d9.scene7.com/is/image/SAQ/11191826_is?$saq-rech-prod-gril$', '11191826', 'Italie', 'Vin rouge\r\n         \r\n      \r\n      \r\n      Italie, 750 ml\r\n      \r\n      \r\n      Code SAQ : 11191826', 20.75, 'https://www.saq.com/page/fr/saqcom/vin-rouge/i-greppi-greppicante-2017/11191826', '//s7d9.scene7.com/is/image/SAQ/11191826_is?$saq-rech-prod-gril$', '750 ml', 1),
(644, 'Guado Al Tasso Il Bruciato 2017', '//s7d9.scene7.com/is/image/SAQ/11347018_is?$saq-rech-prod-gril$', '11347018', 'Italie', 'Vin rouge\r\n         \r\n      \r\n      \r\n      Italie, 750 ml\r\n      \r\n      \r\n      Code SAQ : 11347018', 24.95, 'https://www.saq.com/page/fr/saqcom/vin-rouge/guado-al-tasso-il-bruciato-2017/11347018', '//s7d9.scene7.com/is/image/SAQ/11347018_is?$saq-rech-prod-gril$', '750 ml', 1),
(645, '\'\'M\'\' Montepulciano-d\'Abruzzo', '//s7d9.scene7.com/is/image/SAQ/00518712_is?$saq-rech-prod-gril$', '00518712', 'Italie', 'Vin rouge\r\n         \r\n      \r\n      \r\n      Italie, 1 L\r\n      \r\n      \r\n      Code SAQ : 00518712', 9.65, 'https://www.saq.com/page/fr/saqcom/vin-rouge/m-montepulciano-dabruzzo/518712', '//s7d9.scene7.com/is/image/SAQ/00518712_is?$saq-rech-prod-gril$', '1 L', 1),
(646, '1000 Stories Zinfandel 2016', '//s7d9.scene7.com/is/image/SAQ/13584455_is?$saq-rech-prod-gril$', '13584455', 'États-Unis', 'Vin rouge\r\n         \r\n      \r\n      \r\n      États-Unis, 750 ml\r\n      \r\n      \r\n      Code SAQ : 13584455', 28.6, 'https://www.saq.com/page/fr/saqcom/vin-rouge/1000-stories-zinfandel-2016/13584455', '//s7d9.scene7.com/is/image/SAQ/13584455_is?$saq-rech-prod-gril$', '750 ml', 1),
(647, '14 Hands Hot to Trot Red Blend', '//s7d9.scene7.com/is/image/SAQ/12245611_is?$saq-rech-prod-gril$', '12245611', 'États-Unis', 'Vin rouge\r\n         \r\n      \r\n      \r\n      États-Unis, 750 ml\r\n      \r\n      \r\n      Code SAQ : 12245611', 15.95, 'https://www.saq.com/page/fr/saqcom/vin-rouge/14-hands-hot-to-trot-red-blend/12245611', '//s7d9.scene7.com/is/image/SAQ/12245611_is?$saq-rech-prod-gril$', '750 ml', 1),
(648, '14 Hands Pinot Grigio', '//s7d9.scene7.com/is/image/SAQ/13876271_is?$saq-rech-prod-gril$', '13876271', 'États-Unis', 'Vin blanc\r\n         \r\n      \r\n      \r\n      États-Unis, 750 ml\r\n      \r\n      \r\n      Code SAQ : 13876271', 14.95, 'https://www.saq.com/page/fr/saqcom/vin-blanc/14-hands-pinot-grigio/13876271', '//s7d9.scene7.com/is/image/SAQ/13876271_is?$saq-rech-prod-gril$', '750 ml', 2);

-- --------------------------------------------------------

--
-- Structure de la table `vino_type`
--

DROP TABLE IF EXISTS `vino_type`;
CREATE TABLE IF NOT EXISTS `vino_type` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vino_type`
--

INSERT INTO `vino_type` (`id`, `type`) VALUES
(1, 'Vin rouge'),
(2, 'Vin blanc');

-- --------------------------------------------------------

--
-- Structure de la table `vino_usagers`
--

DROP TABLE IF EXISTS `vino_usagers`;
CREATE TABLE IF NOT EXISTS `vino_usagers` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` char(255) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `admin` varchar(3) NOT NULL DEFAULT 'non',
  `banni` varchar(3) NOT NULL DEFAULT 'non',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vino_usagers`
--

INSERT INTO `vino_usagers` (`id`, `username`, `password`, `nom`, `prenom`, `admin`, `banni`) VALUES
(1, 'Ivan', '202cb962ac59075b964b07152d234b70', 'Trembley', 'Ivan', 'non', 'non'),
(2, 'Din', 'caf1a3dfb505ffed0d024130f58c5cfa', 'Krol', 'Alex', 'oui', 'non'),
(4, 'Admin', 'fcea920f7412b5da7be0cf42b8c93759', 'Tim', 'Elena', 'oui', 'non'),
(5, 'Marchand', '7fe779ec8f4991300e594f8e1619b376', 'Marc', 'Galina', 'non', 'non'),
(6, 'Marvel', '7fe779ec8f4991300e594f8e1619b376', 'Bertrant', 'Marion', 'non', 'non'),
(9, 'Trambley', '6f5387f35a11094e40bce3d202c02f25', 'Foudil', 'Tarik', 'non', 'non'),
(11, 'Berger', '7fe779ec8f4991300e594f8e1619b376', 'Sebastien', 'Darmand', 'non', 'non'),
(12, 'Foudil', '7fe779ec8f4991300e594f8e1619b376', 'Michel', 'Tartant', 'non', 'non'),
(13, 'Massinissa', '7fe779ec8f4991300e594f8e1619b376', 'Salim', 'Barra', 'non', 'non');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `vino_bouteille`
--
ALTER TABLE `vino_bouteille`
  ADD CONSTRAINT `vino_bouteille_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `vino_type` (`id`),
  ADD CONSTRAINT `vino_bouteille_ibfk_2` FOREIGN KEY (`cellier_id`) REFERENCES `vino_cellier` (`id`);

--
-- Contraintes pour la table `vino_cellier`
--
ALTER TABLE `vino_cellier`
  ADD CONSTRAINT `vino_cellier_ibfk_1` FOREIGN KEY (`usager_id`) REFERENCES `vino_usagers` (`id`);

--
-- Contraintes pour la table `vino_saq`
--
ALTER TABLE `vino_saq`
  ADD CONSTRAINT `vino_saq_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `vino_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
