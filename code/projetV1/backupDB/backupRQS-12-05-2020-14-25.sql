-- Generation time: Tue, 12 May 2020 14:25:10 +0200
-- Host: localhost
-- DB name: rqs
/*!40030 SET NAMES UTF8 */;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `a`;
CREATE TABLE `a` (
  `id_pers` int(6) NOT NULL,
  `id_perm` int(6) NOT NULL,
  PRIMARY KEY (`id_perm`,`id_pers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `action`;
CREATE TABLE `action` (
  `id_act` int(6) NOT NULL AUTO_INCREMENT,
  `memo_act` varchar(255) NOT NULL,
  PRIMARY KEY (`id_act`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `administration`;
CREATE TABLE `administration` (
  `id_pers` int(6) NOT NULL,
  PRIMARY KEY (`id_pers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `auteur`;
CREATE TABLE `auteur` (
  `id_pers` int(6) NOT NULL,
  PRIMARY KEY (`id_pers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `domaine`;
CREATE TABLE `domaine` (
  `id_dom` int(6) NOT NULL AUTO_INCREMENT,
  `libelle_dom` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dom`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

INSERT INTO `domaine` VALUES ('5','ezef'),
('14','fee'),
('33','z'); 


DROP TABLE IF EXISTS `ecrit`;
CREATE TABLE `ecrit` (
  `id_pers` int(6) NOT NULL,
  `id_pub` int(6) NOT NULL,
  PRIMARY KEY (`id_pers`,`id_pub`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `edite`;
CREATE TABLE `edite` (
  `id_liv` int(6) NOT NULL,
  `id_mai` int(6) NOT NULL,
  PRIMARY KEY (`id_liv`,`id_mai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `etat_livre`;
CREATE TABLE `etat_livre` (
  `id_etat_livre` int(6) NOT NULL AUTO_INCREMENT,
  `libelle_etat_livre` varchar(255) NOT NULL,
  PRIMARY KEY (`id_etat_livre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `etat_publication`;
CREATE TABLE `etat_publication` (
  `id_etat_pub` int(6) NOT NULL AUTO_INCREMENT,
  `libelle_etat_pub` varchar(255) NOT NULL,
  PRIMARY KEY (`id_etat_pub`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `expert`;
CREATE TABLE `expert` (
  `id_pers` int(6) NOT NULL,
  PRIMARY KEY (`id_pers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `expertise`;
CREATE TABLE `expertise` (
  `id_pers` int(6) NOT NULL,
  `id_pub` int(6) NOT NULL,
  `reponse_exp` char(1) NOT NULL,
  PRIMARY KEY (`id_pers`,`id_pub`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `livre`;
CREATE TABLE `livre` (
  `id_liv` int(6) NOT NULL AUTO_INCREMENT,
  `isbn_liv` varchar(50) NOT NULL,
  `isbn_numerique_liv` varchar(50) NOT NULL,
  `nom_auteur_liv` varchar(255) NOT NULL,
  `prenom_auteur_liv` varchar(255) NOT NULL,
  `titre_liv` varchar(255) NOT NULL,
  `annee_liv` date NOT NULL,
  `collection_liv` varchar(255) NOT NULL,
  `pages_liv` decimal(5,0) NOT NULL,
  `prix_liv` float NOT NULL,
  `brochure_liv` varchar(255) NOT NULL,
  `responsabilite_edition_pub` varchar(255) DEFAULT NULL,
  `responsabilite_traduction_pub` varchar(255) DEFAULT NULL,
  `id_etat_livre` int(6) NOT NULL,
  PRIMARY KEY (`id_liv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `maison_edition`;
CREATE TABLE `maison_edition` (
  `id_mai` int(6) NOT NULL AUTO_INCREMENT,
  `nom_mai` varchar(255) NOT NULL,
  `nom_classement_mai` varchar(255) NOT NULL,
  `nom_correspondant_mai` varchar(255) DEFAULT NULL,
  `mail_correspondant_mai` varchar(255) DEFAULT NULL,
  `adr_adr_numero` decimal(8,0) DEFAULT NULL,
  `adr_adr_rue` varchar(255) DEFAULT NULL,
  `adr_adr_cp` varchar(25) DEFAULT NULL,
  `adr_adr_ville` varchar(255) DEFAULT NULL,
  `adr_adr_pays` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_mai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id_mess` int(6) NOT NULL AUTO_INCREMENT,
  `sujet_mess` varchar(255) NOT NULL,
  `contenu_mess` text NOT NULL,
  PRIMARY KEY (`id_mess`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `operation`;
CREATE TABLE `operation` (
  `id_op` int(6) NOT NULL AUTO_INCREMENT,
  `libelle_op` varchar(255) NOT NULL,
  `obligatoire_op` char(1) NOT NULL,
  PRIMARY KEY (`id_op`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `permission`;
CREATE TABLE `permission` (
  `id_perm` int(6) NOT NULL AUTO_INCREMENT,
  `libelle_perm` varchar(255) NOT NULL,
  PRIMARY KEY (`id_perm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO `permission` VALUES ('1','GESTIONNAIRE'),
('2','ADMINISTRATEUR'); 


DROP TABLE IF EXISTS `personne`;
CREATE TABLE `personne` (
  `id_pers` int(6) NOT NULL AUTO_INCREMENT,
  `nom_pers` varchar(255) NOT NULL,
  `prenom_pers` varchar(255) NOT NULL,
  `mail_contact_pers` varchar(255) DEFAULT NULL,
  `mail_connexion_pers` varchar(255) DEFAULT NULL,
  `mdp_pers` varchar(255) DEFAULT NULL,
  `commentaire_pers` text,
  `estRecenseur_pers` char(1) NOT NULL,
  `estContact_pers` char(1) NOT NULL,
  `institution_courte_pers` varchar(50) DEFAULT NULL,
  `institution_longue_pers` varchar(255) DEFAULT NULL,
  `adr_adr_numero` varchar(6) DEFAULT NULL,
  `adr_adr_rue` varchar(255) DEFAULT NULL,
  `adr_adr_cp` varchar(25) DEFAULT NULL,
  `adr_adr_ville` varchar(255) DEFAULT NULL,
  `adr_adr_pays` varchar(50) DEFAULT NULL,
  `code_reinit_pers` varchar(200) NOT NULL,
  PRIMARY KEY (`id_pers`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO `personne` VALUES ('3','jean','charle','jeancharle@hotmail.com','jeancharle@hotmail.com','jeancharle','il est cool','Y','N','InstiCourte','InstiLongue','10','Corbeau','zef','Charleroi','Belgique','1000'),
('5','jean1','charle21','jean1charle@hotmail.com','jeanchar1le@hotmail.com','jeancharle1','il est cool1','n','y','InstiCourte1','InstiLongue1','1','Corbeaui','zefg','Charleroif','Belgiquen','10001'),
('6','jean3','charle3','jeancharle@hotmail.com','jeancharle@hotmail.com','jeancharle','il est cool','Y','N','InstiCourte','InstiLongue','10','Corbeau','zef','Charleroi','Belgique','1000'); 


DROP TABLE IF EXISTS `porte`;
CREATE TABLE `porte` (
  `id_op` int(6) NOT NULL,
  `id_pub` int(6) NOT NULL,
  `date_op` date NOT NULL,
  `date_echeance_op` date DEFAULT NULL,
  PRIMARY KEY (`id_op`,`id_pub`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `possede`;
CREATE TABLE `possede` (
  `id_pers` int(6) NOT NULL,
  `id_dom` int(6) NOT NULL,
  PRIMARY KEY (`id_pers`,`id_dom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `possede2`;
CREATE TABLE `possede2` (
  `id_dom` int(6) NOT NULL,
  `id_pub` int(6) NOT NULL,
  PRIMARY KEY (`id_pub`,`id_dom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `publication`;
CREATE TABLE `publication` (
  `id_pub` int(6) NOT NULL AUTO_INCREMENT,
  `titre_pub` varchar(255) DEFAULT NULL,
  `resume_pub` text NOT NULL,
  `lieu_pub` varchar(10) NOT NULL,
  `date_pub` date NOT NULL,
  `plagiat_pub` varchar(255) DEFAULT NULL,
  `id_pub_ref` int(6) DEFAULT NULL,
  `id_etat_pub` int(6) NOT NULL,
  `id_type` int(6) NOT NULL,
  `id_rev` int(6) DEFAULT NULL,
  PRIMARY KEY (`id_pub`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO `publication` VALUES ('1','publication 1','résumé publication 1','lieux pub','2020-05-12','Plagiat pub 1','1','3','5','2'); 


DROP TABLE IF EXISTS `revue`;
CREATE TABLE `revue` (
  `id_rev` int(6) NOT NULL AUTO_INCREMENT,
  `numero_rev` int(6) NOT NULL,
  `special_helha_rev` tinyint(6) NOT NULL,
  PRIMARY KEY (`id_rev`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO `revue` VALUES ('3','5','1'),
('4','2','1'),
('5','0','0'),
('6','3','0'),
('7','7','0'); 


DROP TABLE IF EXISTS `tient`;
CREATE TABLE `tient` (
  `id_act` int(6) NOT NULL,
  `id_pers` int(6) NOT NULL,
  `date_act` date DEFAULT NULL,
  PRIMARY KEY (`id_act`,`id_pers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `traite`;
CREATE TABLE `traite` (
  `id_liv` int(6) NOT NULL,
  `id_pub` int(6) NOT NULL,
  PRIMARY KEY (`id_liv`,`id_pub`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `type_publication`;
CREATE TABLE `type_publication` (
  `id_type` int(6) NOT NULL AUTO_INCREMENT,
  `libelle_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO `type_publication` VALUES ('1','Articles'),
('2','Analyses critiques'),
('3','Comptes rendus'),
('4','Divers'),
('5','Spéciale HELHA'); 




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

