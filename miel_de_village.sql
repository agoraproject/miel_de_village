-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 24 Mars 2014 à 00:11
-- Version du serveur :  5.5.36
-- Version de PHP :  5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `miel_de_village`
--
CREATE DATABASE IF NOT EXISTS `miel_de_village` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `miel_de_village`;

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

CREATE TABLE IF NOT EXISTS `action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `qte` int(11) NOT NULL,
  `ruche_id` int(11) DEFAULT NULL,
  `rucher_id` int(11) DEFAULT NULL,
  `action_liste_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_47CC8C9287DDEC63` (`ruche_id`),
  KEY `IDX_47CC8C928BF1374E` (`rucher_id`),
  KEY `IDX_47CC8C923F8331BE` (`action_liste_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `action`
--

INSERT INTO `action` (`id`, `date`, `qte`, `ruche_id`, `rucher_id`, `action_liste_id`) VALUES
(1, '2014-04-05', 3, 2, 1, 2),
(2, '2015-07-05', 2, 1, 3, 5);

-- --------------------------------------------------------

--
-- Structure de la table `action_liste`
--

CREATE TABLE IF NOT EXISTS `action_liste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `code_action` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `qte_affichage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unite_qte` int(11) DEFAULT NULL,
  `type_action_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1B3CE64829F4B125` (`type_action_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `action_liste`
--

INSERT INTO `action_liste` (`id`, `libelle`, `code_action`, `qte_affichage`, `unite_qte`, `type_action_id`) VALUES
(1, 'equilibrage ruches', '1', '3', NULL, 1),
(2, 'débroussailler', '2', '3', NULL, 1),
(3, 'élevage reine', '3', '2', 0, 3),
(5, 'marquage reine', '5', '2', 1, 3),
(6, 'enrucher essaim', '6', '2', 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `affection`
--

CREATE TABLE IF NOT EXISTS `affection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `affection`
--

INSERT INTO `affection` (`id`, `libelle`) VALUES
(1, 'loque américaine'),
(4, 'loque européenne'),
(5, 'couvain plâtré'),
(6, 'dysenterie'),
(7, 'nosema');

-- --------------------------------------------------------

--
-- Structure de la table `ajouterruche`
--

CREATE TABLE IF NOT EXISTS `ajouterruche` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statut` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reine` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fabrication` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `typeRuche` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `typePlancher` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sourceColonie` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rucher` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `ajouterruche`
--

INSERT INTO `ajouterruche` (`id`, `nom`, `statut`, `reine`, `fabrication`, `typeRuche`, `typePlancher`, `sourceColonie`, `rucher`) VALUES
(1, 'ruche3', 'en ponte', 'fl2', 'ruche maison sapin', 'dadant', 'aéré', 'essaim', 'Sapin'),
(3, 'ruche6', 'en développement', 'vf2', 'ruche acheté sapin', 'dadant', 'aéré', 'essaim', 'sommerance'),
(4, 'ruche12', 'fécondation', 'lv12', 'ruche maison sapin', 'voirnot', 'aéré', 'divisions sans reine', 'sommerance'),
(5, 'ruche13', 'en développement', 'lv3', 'ruche acheté sapin', 'voirnot', 'aéré', 'essaim', 'sommerance');

-- --------------------------------------------------------

--
-- Structure de la table `apiclass`
--

CREATE TABLE IF NOT EXISTS `apiclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buckfast` int(11) NOT NULL,
  `linguistica` int(11) NOT NULL,
  `carnica` int(11) NOT NULL,
  `cecropia` int(11) NOT NULL,
  `cypria` int(11) NOT NULL,
  `anatolia` int(11) NOT NULL,
  `vaucasica` int(11) NOT NULL,
  `mellifera` int(11) NOT NULL,
  `intermissa` int(11) NOT NULL,
  `lamarckii` int(11) NOT NULL,
  `sahariensis` int(11) NOT NULL,
  `adansonii` int(11) NOT NULL,
  `syriava` int(11) NOT NULL,
  `meda` int(11) NOT NULL,
  `reine_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_91991F77CED8A66B` (`reine_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `apiclass`
--

INSERT INTO `apiclass` (`id`, `buckfast`, `linguistica`, `carnica`, `cecropia`, `cypria`, `anatolia`, `vaucasica`, `mellifera`, `intermissa`, `lamarckii`, `sahariensis`, `adansonii`, `syriava`, `meda`, `reine_id`) VALUES
(1, 20, 10, 5, 15, 40, 13, 34, 21, 12, 45, 7, 2, 1, 3, 2),
(2, 13, 10, 5, 5, 7, 15, 25, 12, 31, 21, 43, 17, 11, 8, 2);

-- --------------------------------------------------------

--
-- Structure de la table `cdtsmeteo`
--

CREATE TABLE IF NOT EXISTS `cdtsmeteo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `cdtsmeteo`
--

INSERT INTO `cdtsmeteo` (`id`, `libelle`) VALUES
(1, 'grand beau temps'),
(2, 'nuageux'),
(3, 'pluvieux'),
(4, 'orageux'),
(5, 'tempête');

-- --------------------------------------------------------

--
-- Structure de la table `changement_statut`
--

CREATE TABLE IF NOT EXISTS `changement_statut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ruche_id` int(11) NOT NULL,
  `statut_id` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4D3E755687DDEC63` (`ruche_id`),
  KEY `IDX_4D3E7556F6203804` (`statut_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `changement_statut`
--

INSERT INTO `changement_statut` (`id`, `ruche_id`, `statut_id`, `date`) VALUES
(1, 1, 2, '2011-03-02'),
(3, 2, 2, '2009-01-02'),
(4, 4, 1, '2013-07-02');

-- --------------------------------------------------------

--
-- Structure de la table `couleur`
--

CREATE TABLE IF NOT EXISTS `couleur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `couleur`
--

INSERT INTO `couleur` (`id`, `libelle`) VALUES
(1, 'jaune'),
(2, 'rouge'),
(3, 'bleu'),
(4, 'vert'),
(5, 'orange'),
(6, 'noir'),
(7, 'violet');

-- --------------------------------------------------------

--
-- Structure de la table `disparition_reine`
--

CREATE TABLE IF NOT EXISTS `disparition_reine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `disparition_reine`
--

INSERT INTO `disparition_reine` (`id`, `libelle`) VALUES
(1, 'Essaimage'),
(2, 'Tuée par les abeilles'),
(3, 'Echec de fécondation');

-- --------------------------------------------------------

--
-- Structure de la table `elevage`
--

CREATE TABLE IF NOT EXISTS `elevage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_elevage` date NOT NULL,
  `nbre_greffage` int(11) NOT NULL,
  `reine_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7A23BDC0CED8A66B` (`reine_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `elevage`
--

INSERT INTO `elevage` (`id`, `date_elevage`, `nbre_greffage`, `reine_id`) VALUES
(1, '2014-07-04', 3, 2),
(2, '2014-07-07', 5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `eleveur`
--

CREATE TABLE IF NOT EXISTS `eleveur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `eleveur`
--

INSERT INTO `eleveur` (`id`, `nom`) VALUES
(1, 'Hubert Guerriat'),
(2, 'Hubert Lenoir');

-- --------------------------------------------------------

--
-- Structure de la table `essaimage`
--

CREATE TABLE IF NOT EXISTS `essaimage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `reine_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CF15A33DCED8A66B` (`reine_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `essaimage`
--

INSERT INTO `essaimage` (`id`, `date`, `reine_id`) VALUES
(1, '2014-04-04', 2),
(2, '2013-06-04', 3),
(3, '2013-07-07', 4);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE IF NOT EXISTS `evenement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_min` date NOT NULL,
  `date_max` date NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `effectuer` tinyint(1) NOT NULL,
  `notes` longtext COLLATE utf8_unicode_ci,
  `action_liste_id` int(11) DEFAULT NULL,
  `ruche_id` int(11) DEFAULT NULL,
  `rucher_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B26681E3F8331BE` (`action_liste_id`),
  KEY `IDX_B26681E87DDEC63` (`ruche_id`),
  KEY `IDX_B26681E8BF1374E` (`rucher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`id`, `titre`, `date_min`, `date_max`, `date_debut`, `date_fin`, `effectuer`, `notes`, `action_liste_id`, `ruche_id`, `rucher_id`) VALUES
(1, 'Ajouter une hausse', '2011-04-03', '2012-06-07', '2010-03-04 04:03:00', '2010-06-06 10:00:00', 1, 'azerezazer', NULL, NULL, 1),
(2, 'remplacement cadre', '2011-06-08', '2012-06-05', '2012-07-11 03:07:00', '2013-07-06 15:16:00', 1, 'azereza', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `fabrication`
--

CREATE TABLE IF NOT EXISTS `fabrication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `fabrication`
--

INSERT INTO `fabrication` (`id`, `libelle`) VALUES
(1, 'ruche acheté sapin'),
(2, 'ruche acheté polystyrène'),
(3, 'ruche grand-père'),
(4, 'ruche maison sapin'),
(5, 'ruche maison chataigner');

-- --------------------------------------------------------

--
-- Structure de la table `fleur`
--

CREATE TABLE IF NOT EXISTS `fleur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `notes` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `fleur`
--

INSERT INTO `fleur` (`id`, `nom`, `notes`) VALUES
(1, 'pivoine', NULL),
(3, 'rose', 'catégorie roseaa');

-- --------------------------------------------------------

--
-- Structure de la table `floraison`
--

CREATE TABLE IF NOT EXISTS `floraison` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `fleur_id` int(11) DEFAULT NULL,
  `rucher_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8984C2F8E8DD5A7` (`fleur_id`),
  KEY `IDX_8984C2F88BF1374E` (`rucher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `floraison`
--

INSERT INTO `floraison` (`id`, `date_debut`, `date_fin`, `fleur_id`, `rucher_id`) VALUES
(2, '2011-04-04', '2015-06-05', 1, 1),
(3, '2012-04-04', '2011-04-04', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `inspection`
--

CREATE TABLE IF NOT EXISTS `inspection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `activite_trou_envol` int(11) NOT NULL,
  `oeufs_vus` tinyint(1) NOT NULL,
  `reine_vue` tinyint(1) DEFAULT NULL,
  `moisissure` tinyint(1) DEFAULT NULL,
  `abeilles_sol_visite` tinyint(1) DEFAULT NULL,
  `t_meteo` int(11) NOT NULL,
  `vent` int(11) NOT NULL,
  `tenue_cadre` int(11) NOT NULL,
  `cadre_couvain_ferme` int(11) DEFAULT NULL,
  `cadre_couvain_ouvert` int(11) DEFAULT NULL,
  `cadre_couvain_male` int(11) DEFAULT NULL,
  `cadre_miel` int(11) DEFAULT NULL,
  `cadre_pollen` int(11) DEFAULT NULL,
  `peuplement` int(11) NOT NULL,
  `repartition_couvain` int(11) NOT NULL,
  `qte_cellule_royale` int(11) DEFAULT NULL,
  `cellule_royale_essaimage` tinyint(1) DEFAULT NULL,
  `cellule_royale_supersedure` tinyint(1) DEFAULT NULL,
  `cellule_royale_sauvete` tinyint(1) DEFAULT NULL,
  `poids_inspection` int(11) NOT NULL,
  `abeilles_trainantes` tinyint(1) DEFAULT NULL,
  `abeilles_ailes_deformees` tinyint(1) DEFAULT NULL,
  `varroa_abeilles` tinyint(1) DEFAULT NULL,
  `fecondite_eval` int(11) NOT NULL,
  `ardeur_travail_eval` int(11) NOT NULL,
  `resistance_maladie_eval` int(11) NOT NULL,
  `douceur_eval` int(11) NOT NULL,
  `hivernage_eval` int(11) DEFAULT NULL,
  `propolis_eval` int(11) NOT NULL,
  `notes` longtext COLLATE utf8_unicode_ci,
  `ruche_id` int(11) DEFAULT NULL,
  `meteo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F9F1348587DDEC63` (`ruche_id`),
  KEY `IDX_F9F13485CC6645DC` (`meteo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `inspection`
--

INSERT INTO `inspection` (`id`, `date`, `activite_trou_envol`, `oeufs_vus`, `reine_vue`, `moisissure`, `abeilles_sol_visite`, `t_meteo`, `vent`, `tenue_cadre`, `cadre_couvain_ferme`, `cadre_couvain_ouvert`, `cadre_couvain_male`, `cadre_miel`, `cadre_pollen`, `peuplement`, `repartition_couvain`, `qte_cellule_royale`, `cellule_royale_essaimage`, `cellule_royale_supersedure`, `cellule_royale_sauvete`, `poids_inspection`, `abeilles_trainantes`, `abeilles_ailes_deformees`, `varroa_abeilles`, `fecondite_eval`, `ardeur_travail_eval`, `resistance_maladie_eval`, `douceur_eval`, `hivernage_eval`, `propolis_eval`, `notes`, `ruche_id`, `meteo_id`) VALUES
(1, '2012-05-04', 2, 1, 0, 0, 0, 20, 0, 3, 2, 1, 5, 3, 2, 2, 2, 30, 1, 0, 0, 0, 1, 0, 0, 2, 2, 2, 3, 2, 2, 'azerea', 2, NULL),
(2, '2009-01-01', 0, 1, 0, 0, 0, 12, 70, 3, 3, 1, 1, 2, 1, 3, 3, 3, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, NULL),
(3, '2009-01-01', 2, 1, 0, 0, 1, 12, 3, 2, 3, 5, 1, 1, 1, 2, 2, 11, 0, 1, 0, 2, 1, 0, 0, 2, 2, 3, 3, 3, 3, NULL, 2, NULL),
(4, '2012-06-12', 2, 1, 1, 0, 0, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 9, NULL),
(5, '2012-12-12', 0, 1, 1, 0, 0, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 4, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `inspection_affection`
--

CREATE TABLE IF NOT EXISTS `inspection_affection` (
  `inspection_id` int(11) NOT NULL,
  `affection_id` int(11) NOT NULL,
  PRIMARY KEY (`inspection_id`,`affection_id`),
  KEY `IDX_C226A7D5F02F2DDF` (`inspection_id`),
  KEY `IDX_C226A7D58A6D7BD3` (`affection_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `inspection_affection`
--

INSERT INTO `inspection_affection` (`inspection_id`, `affection_id`) VALUES
(3, 5);

-- --------------------------------------------------------

--
-- Structure de la table `introduction`
--

CREATE TABLE IF NOT EXISTS `introduction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `qte_reine` int(11) NOT NULL,
  `ruche_id` int(11) DEFAULT NULL,
  `reine_id` int(11) DEFAULT NULL,
  `elevage_id` int(11) DEFAULT NULL,
  `statut_reine_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F500542487DDEC63` (`ruche_id`),
  KEY `IDX_F5005424CED8A66B` (`reine_id`),
  KEY `IDX_F50054244E2F28D` (`elevage_id`),
  KEY `IDX_F5005424B1DE1ACA` (`statut_reine_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `introduction`
--

INSERT INTO `introduction` (`id`, `date`, `qte_reine`, `ruche_id`, `reine_id`, `elevage_id`, `statut_reine_id`) VALUES
(1, '2014-05-04', 25, NULL, 2, NULL, NULL),
(2, '2009-01-01', 22, 1, 2, 1, 1),
(4, '2013-05-03', 12, 2, NULL, NULL, 2),
(5, '2012-03-04', 12, 2, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `localisation`
--

CREATE TABLE IF NOT EXISTS `localisation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_deplacement` date NOT NULL,
  `transhumance` tinyint(1) NOT NULL,
  `no_emplacement` int(11) NOT NULL,
  `motif_deplacement_id` int(11) DEFAULT NULL,
  `rucher_id` int(11) DEFAULT NULL,
  `ruche_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_BFD3CE8F8BF1374E` (`rucher_id`),
  KEY `IDX_BFD3CE8F87DDEC63` (`ruche_id`),
  KEY `IDX_BFD3CE8FC2FF313` (`motif_deplacement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `localisation`
--

INSERT INTO `localisation` (`id`, `date_deplacement`, `transhumance`, `no_emplacement`, `motif_deplacement_id`, `rucher_id`, `ruche_id`) VALUES
(1, '2013-05-03', 1, 22, 3, 1, 2),
(3, '2013-05-05', 1, 15, 3, 3, 2),
(4, '2012-08-01', 0, 0, NULL, 1, 9),
(5, '2009-01-01', 0, 0, NULL, 3, 9);

-- --------------------------------------------------------

--
-- Structure de la table `motif_deplacement`
--

CREATE TABLE IF NOT EXISTS `motif_deplacement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `motif_deplacement`
--

INSERT INTO `motif_deplacement` (`id`, `libelle`) VALUES
(1, 'transhumance'),
(3, 'essaimage');

-- --------------------------------------------------------

--
-- Structure de la table `nature_recolte`
--

CREATE TABLE IF NOT EXISTS `nature_recolte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `nature_recolte`
--

INSERT INTO `nature_recolte` (`id`, `libelle`) VALUES
(1, 'miel d''acacia'),
(2, 'miel de tilleul'),
(3, 'miel de lavande');

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chemin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `inspection_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_876E0D9F02F2DDF` (`inspection_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `provenance`
--

CREATE TABLE IF NOT EXISTS `provenance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `provenance`
--

INSERT INTO `provenance` (`id`, `libelle`) VALUES
(1, 'Essaim'),
(2, 'Elevage'),
(3, 'Division');

-- --------------------------------------------------------

--
-- Structure de la table `race`
--

CREATE TABLE IF NOT EXISTS `race` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `race`
--

INSERT INTO `race` (`id`, `libelle`) VALUES
(1, 'Buckfast'),
(2, 'Apis Mellifera Mellifera'),
(3, 'Apis Mellifera Carnica');

-- --------------------------------------------------------

--
-- Structure de la table `recolte`
--

CREATE TABLE IF NOT EXISTS `recolte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qte` int(11) NOT NULL,
  `date` date NOT NULL,
  `ruche_id` int(11) DEFAULT NULL,
  `type_recolte_id` int(11) NOT NULL,
  `nature_recolte_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3433713C87DDEC63` (`ruche_id`),
  KEY `IDX_3433713CDFC72674` (`type_recolte_id`),
  KEY `IDX_3433713C2EBA43C6` (`nature_recolte_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `recolte`
--

INSERT INTO `recolte` (`id`, `qte`, `date`, `ruche_id`, `type_recolte_id`, `nature_recolte_id`) VALUES
(2, 2, '2011-05-03', 2, 5, 2),
(3, 1, '2012-05-05', 2, 2, NULL),
(4, 1, '2013-04-04', 4, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `reine`
--

CREATE TABLE IF NOT EXISTS `reine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `mere` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code_eleveur` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecondation` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `date_acquisition` date DEFAULT NULL,
  `clippage` tinyint(1) DEFAULT NULL,
  `remarques` longtext COLLATE utf8_unicode_ci,
  `eleveur_id` int(11) DEFAULT NULL,
  `provenance_id` int(11) DEFAULT NULL,
  `race_id` int(11) DEFAULT NULL,
  `couleur_id` int(11) DEFAULT NULL,
  `disparition_reine_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C86860D2489D1B5F` (`eleveur_id`),
  KEY `IDX_C86860D2C24AFBDB` (`provenance_id`),
  KEY `IDX_C86860D26E59D40D` (`race_id`),
  KEY `IDX_C86860D2C31BA576` (`couleur_id`),
  KEY `IDX_C86860D24274E620` (`disparition_reine_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Contenu de la table `reine`
--

INSERT INTO `reine` (`id`, `nom`, `mere`, `code_eleveur`, `fecondation`, `date_naissance`, `numero`, `date_acquisition`, `clippage`, `remarques`, `eleveur_id`, `provenance_id`, `race_id`, `couleur_id`, `disparition_reine_id`) VALUES
(2, 'Elisabeth', 'Annabelle', 'F404', '1', '2013-06-15', 8, '2013-07-13', 0, 'aaaaa', 1, 2, 2, 2, 1),
(3, 'mirelle', 'églantine', 'fp2', '1', '2014-07-04', 4, '2014-02-10', 1, 'azereza', 2, 2, 1, 3, 1),
(4, 'Lya', 'Néa', 'gh2', '0', '2014-05-04', 6, '2013-05-03', 1, 'azer', 1, 2, 1, 3, 1),
(8, 'wdfhwfdhf', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ruche`
--

CREATE TABLE IF NOT EXISTS `ruche` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Contenu de la table `ruche`
--

INSERT INTO `ruche` (`id`, `nom`) VALUES
(1, 'r2'),
(2, 'r4'),
(4, 'r5'),
(9, 'Ruche 1');

-- --------------------------------------------------------

--
-- Structure de la table `rucher`
--

CREATE TABLE IF NOT EXISTS `rucher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cp` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pays` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `latitude` int(11) NOT NULL,
  `longitude` int(11) NOT NULL,
  `altitude` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `rucher`
--

INSERT INTO `rucher` (`id`, `nom`, `adresse`, `cp`, `ville`, `pays`, `description`, `latitude`, `longitude`, `altitude`) VALUES
(1, 'Sommerance', 'rue de la Vieille Voie', '08250', 'Sommerance', 'France', 'Rucher de fécondation', 0, 0, 0),
(3, 'Fleville', '33 rue de londres', '97000', 'azere', 'France', 'azere', 33, 12, 120),
(4, 'Louvier', '33rue petit', '92600', 'Charleville', 'france', '', 20, 59, 600);

-- --------------------------------------------------------

--
-- Structure de la table `source_colonie`
--

CREATE TABLE IF NOT EXISTS `source_colonie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Contenu de la table `source_colonie`
--

INSERT INTO `source_colonie` (`id`, `libelle`) VALUES
(1, 'colonie orpheline'),
(2, 'colonie avec reine'),
(3, 'essaim acheté'),
(4, 'essaim ramassé'),
(5, 'essaim rentré tout seul'),
(6, 'division sans reine'),
(7, 'division avec cellules royales'),
(8, 'division avec reine');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE IF NOT EXISTS `statut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `statut`
--

INSERT INTO `statut` (`id`, `libelle`) VALUES
(1, 'en production'),
(2, 'fécondation'),
(3, 'en développement');

-- --------------------------------------------------------

--
-- Structure de la table `statut_reine`
--

CREATE TABLE IF NOT EXISTS `statut_reine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `statut_reine`
--

INSERT INTO `statut_reine` (`id`, `libelle`) VALUES
(1, 'Reine en ponte'),
(2, 'Cellule Royale'),
(3, 'Reine vierge');

-- --------------------------------------------------------

--
-- Structure de la table `transvasement`
--

CREATE TABLE IF NOT EXISTS `transvasement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `nbre_cadres` int(11) NOT NULL,
  `fabrication_id` int(11) DEFAULT NULL,
  `source_colonie_id` int(11) DEFAULT NULL,
  `ruche_id` int(11) DEFAULT NULL,
  `type_ruche_id` int(11) DEFAULT NULL,
  `type_plancher_id` int(11) DEFAULT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `origine_ruche_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9ACE40DD2EFC43FC` (`fabrication_id`),
  KEY `IDX_9ACE40DD87DDEC63` (`ruche_id`),
  KEY `IDX_9ACE40DDCC03A059` (`type_plancher_id`),
  KEY `IDX_9ACE40DDEFAA01A9` (`source_colonie_id`),
  KEY `IDX_9ACE40DD4A22CB9F` (`type_ruche_id`),
  KEY `IDX_9ACE40DD6B42FF84` (`origine_ruche_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `transvasement`
--

INSERT INTO `transvasement` (`id`, `date`, `nbre_cadres`, `fabrication_id`, `source_colonie_id`, `ruche_id`, `type_ruche_id`, `type_plancher_id`, `notes`, `origine_ruche_id`) VALUES
(4, '2012-08-01', 6, 1, 4, 9, 1, 1, NULL, 9);

-- --------------------------------------------------------

--
-- Structure de la table `type_action`
--

CREATE TABLE IF NOT EXISTS `type_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `type_action`
--

INSERT INTO `type_action` (`id`, `libelle`) VALUES
(1, 'rucher'),
(2, 'ruche'),
(3, 'reine');

-- --------------------------------------------------------

--
-- Structure de la table `type_plancher`
--

CREATE TABLE IF NOT EXISTS `type_plancher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `type_plancher`
--

INSERT INTO `type_plancher` (`id`, `libelle`) VALUES
(1, 'plancher aéré à tiroir'),
(2, 'plancher plein');

-- --------------------------------------------------------

--
-- Structure de la table `type_recolte`
--

CREATE TABLE IF NOT EXISTS `type_recolte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `type_recolte`
--

INSERT INTO `type_recolte` (`id`, `libelle`) VALUES
(1, 'miel'),
(2, 'propolis'),
(5, 'miel');

-- --------------------------------------------------------

--
-- Structure de la table `type_ruche`
--

CREATE TABLE IF NOT EXISTS `type_ruche` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_type_ruche` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `type_ruche`
--

INSERT INTO `type_ruche` (`id`, `libelle_type_ruche`) VALUES
(1, 'Dadant'),
(2, 'Voirnot'),
(3, 'Warré'),
(4, 'Langstroth'),
(5, 'William Braughton Carr');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(1, 'admin', 'admin', 'jp.haulin@gmail.com', 'jp.haulin@gmail.com', 1, 'syngdgtkh5wwog0c0co4gggwgkg88w4', 'mknzCGbAHy8lLoQ9UaYFrymbqrx22zVHwrYxTjh/48tnVCxjL91L0tQTAnkR2TW/emRdVveV9aYMp4m3GCrSKw==', '2014-03-23 12:39:34', 0, 0, NULL, 'EUHpKjyzU_gUJS742g6qeWM59f2kTdd7s79XNVou4zA', '2014-03-15 18:05:18', 'a:0:{}', 0, NULL);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `action`
--
ALTER TABLE `action`
  ADD CONSTRAINT `FK_47CC8C923F8331BE` FOREIGN KEY (`action_liste_id`) REFERENCES `action_liste` (`id`),
  ADD CONSTRAINT `FK_47CC8C9287DDEC63` FOREIGN KEY (`ruche_id`) REFERENCES `ruche` (`id`),
  ADD CONSTRAINT `FK_47CC8C928BF1374E` FOREIGN KEY (`rucher_id`) REFERENCES `rucher` (`id`);

--
-- Contraintes pour la table `action_liste`
--
ALTER TABLE `action_liste`
  ADD CONSTRAINT `FK_1B3CE64829F4B125` FOREIGN KEY (`type_action_id`) REFERENCES `type_action` (`id`);

--
-- Contraintes pour la table `apiclass`
--
ALTER TABLE `apiclass`
  ADD CONSTRAINT `FK_91991F77CED8A66B` FOREIGN KEY (`reine_id`) REFERENCES `reine` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `changement_statut`
--
ALTER TABLE `changement_statut`
  ADD CONSTRAINT `FK_4D3E755687DDEC63` FOREIGN KEY (`ruche_id`) REFERENCES `ruche` (`id`),
  ADD CONSTRAINT `FK_4D3E7556F6203804` FOREIGN KEY (`statut_id`) REFERENCES `statut` (`id`);

--
-- Contraintes pour la table `elevage`
--
ALTER TABLE `elevage`
  ADD CONSTRAINT `FK_7A23BDC0CED8A66B` FOREIGN KEY (`reine_id`) REFERENCES `reine` (`id`);

--
-- Contraintes pour la table `essaimage`
--
ALTER TABLE `essaimage`
  ADD CONSTRAINT `FK_CF15A33DCED8A66B` FOREIGN KEY (`reine_id`) REFERENCES `reine` (`id`);

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `FK_B26681E3F8331BE` FOREIGN KEY (`action_liste_id`) REFERENCES `action_liste` (`id`),
  ADD CONSTRAINT `FK_B26681E87DDEC63` FOREIGN KEY (`ruche_id`) REFERENCES `ruche` (`id`),
  ADD CONSTRAINT `FK_B26681E8BF1374E` FOREIGN KEY (`rucher_id`) REFERENCES `rucher` (`id`);

--
-- Contraintes pour la table `floraison`
--
ALTER TABLE `floraison`
  ADD CONSTRAINT `FK_8984C2F88BF1374E` FOREIGN KEY (`rucher_id`) REFERENCES `rucher` (`id`),
  ADD CONSTRAINT `FK_8984C2F8E8DD5A7` FOREIGN KEY (`fleur_id`) REFERENCES `fleur` (`id`);

--
-- Contraintes pour la table `inspection`
--
ALTER TABLE `inspection`
  ADD CONSTRAINT `FK_F9F1348587DDEC63` FOREIGN KEY (`ruche_id`) REFERENCES `ruche` (`id`),
  ADD CONSTRAINT `FK_F9F13485CC6645DC` FOREIGN KEY (`meteo_id`) REFERENCES `cdtsmeteo` (`id`);

--
-- Contraintes pour la table `inspection_affection`
--
ALTER TABLE `inspection_affection`
  ADD CONSTRAINT `FK_C226A7D58A6D7BD3` FOREIGN KEY (`affection_id`) REFERENCES `affection` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_C226A7D5F02F2DDF` FOREIGN KEY (`inspection_id`) REFERENCES `inspection` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `introduction`
--
ALTER TABLE `introduction`
  ADD CONSTRAINT `FK_F50054244E2F28D` FOREIGN KEY (`elevage_id`) REFERENCES `elevage` (`id`),
  ADD CONSTRAINT `FK_F500542487DDEC63` FOREIGN KEY (`ruche_id`) REFERENCES `ruche` (`id`),
  ADD CONSTRAINT `FK_F5005424B1DE1ACA` FOREIGN KEY (`statut_reine_id`) REFERENCES `statut_reine` (`id`),
  ADD CONSTRAINT `FK_F5005424CED8A66B` FOREIGN KEY (`reine_id`) REFERENCES `reine` (`id`);

--
-- Contraintes pour la table `localisation`
--
ALTER TABLE `localisation`
  ADD CONSTRAINT `FK_BFD3CE8F87DDEC63` FOREIGN KEY (`ruche_id`) REFERENCES `ruche` (`id`),
  ADD CONSTRAINT `FK_BFD3CE8F8BF1374E` FOREIGN KEY (`rucher_id`) REFERENCES `rucher` (`id`),
  ADD CONSTRAINT `FK_BFD3CE8FC2FF313` FOREIGN KEY (`motif_deplacement_id`) REFERENCES `motif_deplacement` (`id`);

--
-- Contraintes pour la table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `FK_876E0D9F02F2DDF` FOREIGN KEY (`inspection_id`) REFERENCES `inspection` (`id`);

--
-- Contraintes pour la table `recolte`
--
ALTER TABLE `recolte`
  ADD CONSTRAINT `FK_3433713C2EBA43C6` FOREIGN KEY (`nature_recolte_id`) REFERENCES `nature_recolte` (`id`),
  ADD CONSTRAINT `FK_3433713C87DDEC63` FOREIGN KEY (`ruche_id`) REFERENCES `ruche` (`id`),
  ADD CONSTRAINT `FK_3433713CDFC72674` FOREIGN KEY (`type_recolte_id`) REFERENCES `type_recolte` (`id`);

--
-- Contraintes pour la table `reine`
--
ALTER TABLE `reine`
  ADD CONSTRAINT `FK_C86860D24274E620` FOREIGN KEY (`disparition_reine_id`) REFERENCES `disparition_reine` (`id`),
  ADD CONSTRAINT `FK_C86860D2489D1B5F` FOREIGN KEY (`eleveur_id`) REFERENCES `eleveur` (`id`),
  ADD CONSTRAINT `FK_C86860D26E59D40D` FOREIGN KEY (`race_id`) REFERENCES `race` (`id`),
  ADD CONSTRAINT `FK_C86860D2C24AFBDB` FOREIGN KEY (`provenance_id`) REFERENCES `provenance` (`id`),
  ADD CONSTRAINT `FK_C86860D2C31BA576` FOREIGN KEY (`couleur_id`) REFERENCES `couleur` (`id`);

--
-- Contraintes pour la table `transvasement`
--
ALTER TABLE `transvasement`
  ADD CONSTRAINT `FK_9ACE40DD2EFC43FC` FOREIGN KEY (`fabrication_id`) REFERENCES `fabrication` (`id`),
  ADD CONSTRAINT `FK_9ACE40DD4A22CB9F` FOREIGN KEY (`type_ruche_id`) REFERENCES `type_ruche` (`id`),
  ADD CONSTRAINT `FK_9ACE40DD6B42FF84` FOREIGN KEY (`origine_ruche_id`) REFERENCES `ruche` (`id`),
  ADD CONSTRAINT `FK_9ACE40DD87DDEC63` FOREIGN KEY (`ruche_id`) REFERENCES `ruche` (`id`),
  ADD CONSTRAINT `FK_9ACE40DDCC03A059` FOREIGN KEY (`type_plancher_id`) REFERENCES `type_plancher` (`id`),
  ADD CONSTRAINT `FK_9ACE40DDEFAA01A9` FOREIGN KEY (`source_colonie_id`) REFERENCES `source_colonie` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
