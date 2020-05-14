-- Generation time: Thu, 14 May 2020 11:16:54 +0200
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

INSERT INTO `a` VALUES ('1','2'); 


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

INSERT INTO `administration` VALUES ('1'); 


DROP TABLE IF EXISTS `auteur`;
CREATE TABLE `auteur` (
  `id_pers` int(6) NOT NULL,
  PRIMARY KEY (`id_pers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `auteur` VALUES ('4'); 


DROP TABLE IF EXISTS `domaine`;
CREATE TABLE `domaine` (
  `id_dom` int(6) NOT NULL AUTO_INCREMENT,
  `libelle_dom` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dom`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO `domaine` VALUES ('1','Chimie'),
('2','Astronomie'),
('3','Physique'),
('4','Sport'); 


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

INSERT INTO `expert` VALUES ('5'); 


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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO `livre` VALUES ('8','9856','9857','Rowling','J.K.','Harry Potter et la coupe de feu','0000-00-00','Fantastique','359','12','Reliure en papier','','','0'),
('9','7894','7895','Patt','Laurent','L\'astrophysique pour les nuls','0000-00-00','Tuto','98','5','Reliure en papier','','','0'); 


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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO `maison_edition` VALUES ('2','Hachette','978-2-01','Marc Dupuis','marcdp@mail.com','4','Allée des Bouquins','1000','Bruxelles',NULL),
('3','Larousse','978-2-01','Patricia Beaudart','pblarousse@mail.fr','17','Rue des Soldats','9895','Bourg-en-Bresse',''),
('4','Casterman','978-2-203','Etienne Dabats','castermanpro@hotmail.fr','89','Rue des Bourgs','95687','Reims',''); 


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
  `commentaire_pers` text DEFAULT NULL,
  `estRecenseur_pers` char(1) NOT NULL,
  `estContact_pers` char(1) NOT NULL,
  `institution_courte_pers` varchar(50) DEFAULT NULL,
  `institution_longue_pers` varchar(255) DEFAULT NULL,
  `adr_num_pers` decimal(8,0) DEFAULT NULL,
  `adr_rue_pers` varchar(255) DEFAULT NULL,
  `adr_cp_pers` varchar(25) DEFAULT NULL,
  `adr_ville_pers` varchar(255) DEFAULT NULL,
  `adr_pays_pers` varchar(50) DEFAULT NULL,
  `code_reinit_pers` varchar(200) NOT NULL,
  PRIMARY KEY (`id_pers`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO `personne` VALUES ('1','Legrand','Antoine','la188507@student.helha.be','al.antoine.legrand@gmail.com','$2y$10$8.eEuaq/O/bdJV5PplEGEenHmEDXQIeGZLJPSCqomx6xNEDFiSWMi','Consciencieux et travailleur','0','1','HEHLa','Haute Ecole Louvain en Hainaut','143','Rue Trieu Kaisin','6062','Montignies-Sur-Sambre','Belgique','8484ef673ace934e44e153b8d7de6211'),
('2','Labrecque','Brigitte','BrigitteLabrecque@jourrapide.com','BrigitteLabrecque@jourrapide.com','$2y$10$3XTcTbWqq/jkDrQJCG6bROm.6DqR573iRCWyZ8lO3QwfpxFDPlZBG','','1','0','Arba-Esa','Académie royale des Beaux-Arts de la Ville de Bruxelles','208','Rue du Chapy','9120','Haasdonk','Belgique','ntHDmlkS4VT1onukkzI3efl5PvgASVWC'),
('3','Lereau','Franck','FranckLereau@dayrep.com','FranckLereau@dayrep.com','$2y$10$XiNRkuPqHjJQYBRLFDXbfOLh9xiMuily1/AQNEaOcDUsL5URPfoca','Pas très consciencieux','0','0','ULB','Université libre de Bruxelles','22','Rue du Bienne','9200','Oudegem','Belgique','aMXzaq55WjE8IRjSvvlvOOJqpQWQR8xL'),
('4','Plante','Hugues','HuguesPlante@dayrep.com','HuguesPlante@dayrep.com',NULL,NULL,'0','1','ARBH','Athénée royal Bastogne - Houffalize','50','Rue de Berloz','5555','Cornimont','Belgique',''),
('5','Pariseau','Estelle','EstellePariseau@gmail.com','EstellePariseau@gmail.com','',NULL,'0','0','HELHa','HELHa - Tournai','238','Rue Jean Lorette','7533','Thimougies','Belgique',''); 


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `revue`;
CREATE TABLE `revue` (
  `id_rev` int(6) NOT NULL AUTO_INCREMENT,
  `numero_rev` int(6) NOT NULL,
  `special_helha_rev` tinyint(6) NOT NULL,
  PRIMARY KEY (`id_rev`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO `revue` VALUES ('1','456','1'),
('2','457','0'),
('3','458','0'),
('4','460','1'); 


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;





/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

