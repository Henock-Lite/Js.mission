-- MySQL dump 10.13  Distrib 8.0.39, for Win64 (x86_64)
--
-- Host: localhost    Database: bibliotheque_web
-- ------------------------------------------------------
-- Server version	8.0.39

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `lecteurs`
--

DROP TABLE IF EXISTS `lecteurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lecteurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lecteurs`
--

LOCK TABLES `lecteurs` WRITE;
/*!40000 ALTER TABLE `lecteurs` DISABLE KEYS */;
INSERT INTO `lecteurs` VALUES (1,'Doe','John','john.doe@example.com'),(2,'Smith','Jane','jane.smith@example.com'),(3,'Dupont','Pierre','pierre.dupont@example.com');
/*!40000 ALTER TABLE `lecteurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `liste_lecture`
--

DROP TABLE IF EXISTS `liste_lecture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `liste_lecture` (
  `id_livre` int DEFAULT NULL,
  `id_lecteur` int DEFAULT NULL,
  `date_emprunt` date DEFAULT NULL,
  `date_retour` date DEFAULT NULL,
  KEY `fk_id_lecteur` (`id_lecteur`),
  CONSTRAINT `fk_id_lecteur` FOREIGN KEY (`id_lecteur`) REFERENCES `lecteurs` (`id`),
  CONSTRAINT `liste_lecture_ibfk_1` FOREIGN KEY (`id_lecteur`) REFERENCES `lecteurs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liste_lecture`
--

LOCK TABLES `liste_lecture` WRITE;
/*!40000 ALTER TABLE `liste_lecture` DISABLE KEYS */;
INSERT INTO `liste_lecture` VALUES (NULL,NULL,'2025-06-14','2025-06-28');
/*!40000 ALTER TABLE `liste_lecture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livres`
--

DROP TABLE IF EXISTS `livres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `livres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) DEFAULT NULL,
  `auteur` varchar(100) DEFAULT NULL,
  `description` text,
  `maison_edition` varchar(100) DEFAULT NULL,
  `nombre_exemplaire` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livres`
--

LOCK TABLES `livres` WRITE;
/*!40000 ALTER TABLE `livres` DISABLE KEYS */;
INSERT INTO `livres` VALUES (1,'Le Petit Prince','Antoine de Saint-Exup├®ry','Un conte philosophique sur un jeune prince voyageant ├á travers les plan├¿tes.','Gallimard',10),(2,'1984','George Orwell','Un roman dystopique sur un monde totalitaire et la surveillance de masse.','Secker & Warburg',15),(3,'L\'├ëtranger','Albert Camus','Un roman existentialiste explorant l\'absurde et l\'indiff├®rence.','Gallimard',12),(4,'Harry Potter ├á l\'├®cole des sorciers','J.K. Rowling','Premier tome de la saga o├╣ Harry d├®couvre qu\'il est un sorcier.','Gallimard Jeunesse',20),(5,'Les Mis├®rables','Victor Hugo','Un roman classique sur l\'injustice sociale et la r├®demption.','├ëditions Hachette',10),(6,'Le Seigneur des Anneaux','J.R.R. Tolkien','Une aventure ├®pique dans la Terre du Milieu avec des h├®ros et des cr├®atures fantastiques.','Christian Bourgois ├ëditeur',15),(7,'Crime et Ch├ótiment','Fiodor Dosto├»evski','Un roman psychologique sur la culpabilit├® et la justice.','├ëditions Actes Sud',12),(8,'Don Quichotte','Miguel de Cervantes','Les aventures d\'un noble espagnol persuad├® d\'├¬tre un chevalier.','├ëditions Flammarion',18),(9,'La Peste','Albert Camus','Un roman qui explore les r├®actions humaines face ├á une ├®pid├®mie.','Gallimard',14),(10,'Fondation','Isaac Asimov','Une saga de science-fiction sur l\'effondrement et la reconstruction d\'un empire galactique.','Deno├½l',8),(11,'Dracula','Bram Stoker','Le classique de l\'horreur qui introduit le personnage l├®gendaire du comte Dracula.','├ëditions Archipoche',10),(12,'Le Rouge et le Noir','Stendhal','Un roman sur l\'ambition et l\'ascension sociale dans la soci├®t├® fran├ºaise du XIXe si├¿cle.','├ëditions Folio',12),(13,'Les Fourmis','Bernard Werber','Un thriller scientifique fascinant sur la vie secr├¿te des fourmis.','Albin Michel',18);
/*!40000 ALTER TABLE `livres` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-16  1:43:33
