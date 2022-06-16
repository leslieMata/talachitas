-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: helpdesk
-- ------------------------------------------------------
-- Server version	8.0.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `t_asignar`
--

DROP TABLE IF EXISTS `t_asignar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_asignar` (
  `id_asignar` int NOT NULL AUTO_INCREMENT,
  `id_persona` int NOT NULL,
  `id_equipo` int NOT NULL,
  `marca` varchar(245) NOT NULL,
  `modelo` varchar(245) NOT NULL,
  `color` varchar(245) NOT NULL,
  `descripcion` varchar(245) NOT NULL,
  `memoria` varchar(245) NOT NULL,
  `disco_duro` varchar(245) NOT NULL,
  `procesador` varchar(245) NOT NULL,
  PRIMARY KEY (`id_asignar`),
  KEY `fjPersona_idx` (`id_persona`),
  KEY `fkequipoAsinacion_idx` (`id_equipo`),
  CONSTRAINT `fkequipoAsinacion` FOREIGN KEY (`id_equipo`) REFERENCES `t_cat_equipos` (`id_equipo`),
  CONSTRAINT `fkPersonaAsignacion` FOREIGN KEY (`id_persona`) REFERENCES `t_persona` (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_asignar`
--

LOCK TABLES `t_asignar` WRITE;
/*!40000 ALTER TABLE `t_asignar` DISABLE KEYS */;
INSERT INTO `t_asignar` VALUES (1,2,2,'Hp','Notebook HP 15-dy1005la','Plata','No tiene batería y tiene rayaduras en la parte trasera','8 GB','512 GB ','Core i5'),(3,1,2,'Lenovo','ideapad3','azul metalico','rayadura en la parte trasera de la tapa','12 GB','256 GB','Core i5'),(4,1,8,'Patito','FZ580','Plata','','','',''),(5,1,7,'Steren','7851K','Gris','','','',''),(6,1,6,'Bose','MD4875','Azul','','','',''),(7,4,2,'hp','zbook','negro','esta vieja','12 gb','256 gb','core i7');
/*!40000 ALTER TABLE `t_asignar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_cat_equipos`
--

DROP TABLE IF EXISTS `t_cat_equipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_cat_equipos` (
  `id_equipo` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(245) NOT NULL,
  `descripcion` varchar(245) DEFAULT NULL,
  PRIMARY KEY (`id_equipo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_cat_equipos`
--

LOCK TABLES `t_cat_equipos` WRITE;
/*!40000 ALTER TABLE `t_cat_equipos` DISABLE KEYS */;
INSERT INTO `t_cat_equipos` VALUES (1,'Pc','fas fa-desktop'),(2,'Laptop','fas fa-laptop'),(3,'Mouse','fas fa-computer-mouse-scrollwheel'),(4,'Teclado','fas fa-keyboard'),(5,'Monitor','fas fa-display'),(6,'Bocinas','fas fa-headphones'),(7,'Microfono','fas fa-microphone'),(8,'Proyector','fad fa-projector');
/*!40000 ALTER TABLE `t_cat_equipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_cat_roles`
--

DROP TABLE IF EXISTS `t_cat_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_cat_roles` (
  `id_rol` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(245) NOT NULL,
  `descripcion` varchar(245) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_cat_roles`
--

LOCK TABLES `t_cat_roles` WRITE;
/*!40000 ALTER TABLE `t_cat_roles` DISABLE KEYS */;
INSERT INTO `t_cat_roles` VALUES (1,'cliente','Es un cliente'),(2,'admin','Es Admin');
/*!40000 ALTER TABLE `t_cat_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_persona`
--

DROP TABLE IF EXISTS `t_persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_persona` (
  `id_persona` int NOT NULL AUTO_INCREMENT,
  `paterno` varchar(245) NOT NULL,
  `materno` varchar(245) NOT NULL,
  `nombre` varchar(245) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` varchar(2) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(245) NOT NULL,
  `fechaInsert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_persona`
--

LOCK TABLES `t_persona` WRITE;
/*!40000 ALTER TABLE `t_persona` DISABLE KEYS */;
INSERT INTO `t_persona` VALUES (1,'Martínez','Mata','Leslie Ithadui','1996-11-27','F','5539626923','lesliemarx1@gmail.com','2022-05-31 08:19:02'),(2,'Lima','López','Angel','2000-10-19','M','5547601941','angellima200@hotmail.com','2022-06-03 11:27:32'),(3,'De la Cruz','Cruz','Juan Alberto','1997-08-10','M','5566778899','juandlc@gmail.com','2022-06-03 22:10:47'),(4,'Aquino','Segura','Roldan','1990-04-01','M','555555555','roldan@gmail.com','2022-06-08 09:57:46'),(5,'De la Cruz','Cruz','Juan Alberto','1997-08-10','M','5548792320','corre@gmail.com','2022-06-10 20:23:14');
/*!40000 ALTER TABLE `t_persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_reportes`
--

DROP TABLE IF EXISTS `t_reportes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_reportes` (
  `id_reporte` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `id_equipo` int NOT NULL,
  `id_usuario_tecnico` int DEFAULT NULL,
  `descripcion_problema` text NOT NULL,
  `solucion_problema` text,
  `estatus` int NOT NULL DEFAULT '1',
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_reporte`),
  KEY `fkUsuarioReporte_idx` (`id_usuario`),
  KEY `fkEquipoReporte_idx` (`id_equipo`),
  CONSTRAINT `fkEquipoReporte` FOREIGN KEY (`id_equipo`) REFERENCES `t_cat_equipos` (`id_equipo`),
  CONSTRAINT `fkUsuarioReporte` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_reportes`
--

LOCK TABLES `t_reportes` WRITE;
/*!40000 ALTER TABLE `t_reportes` DISABLE KEYS */;
INSERT INTO `t_reportes` VALUES (2,2,7,NULL,'No se escucha','Vamos a tirar tu equipo, porque no sirve',1,'2022-06-10 08:47:12'),(4,5,2,NULL,'El disco duro no funciona','Se cambio el disco duro por un SSD',0,'2022-06-13 07:54:46');
/*!40000 ALTER TABLE `t_reportes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_usuarios`
--

DROP TABLE IF EXISTS `t_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `id_rol` int NOT NULL,
  `id_persona` int NOT NULL,
  `usuario` varchar(245) NOT NULL,
  `password` varchar(245) NOT NULL,
  `ubicacion` varchar(245) NOT NULL,
  `activo` int NOT NULL DEFAULT '1',
  ` fecha_insert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol_idx` (`id_rol`),
  KEY `id_persona_idx` (`id_persona`),
  CONSTRAINT `id_persona` FOREIGN KEY (`id_persona`) REFERENCES `t_persona` (`id_persona`),
  CONSTRAINT `id_rol` FOREIGN KEY (`id_rol`) REFERENCES `t_cat_roles` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_usuarios`
--

LOCK TABLES `t_usuarios` WRITE;
/*!40000 ALTER TABLE `t_usuarios` DISABLE KEYS */;
INSERT INTO `t_usuarios` VALUES (1,2,1,'admin','d033e22ae348aeb5660fc2140aec35850c4da997','Modulo 1',1,'2022-05-31 08:20:36'),(2,1,1,'cliente','d94019fd760a71edf11844bb5c601a4de95aacaf','Modulo 1',1,'2022-05-31 08:20:36'),(3,1,2,'Angel','060f8e048c4c3d6cb09ca9c60dd0022a202af4b5','Cubículo 3',1,'2022-06-03 11:27:32'),(5,1,4,'roldan','cb8e57cc927df541bb4868245dfd76da3416bf85','ITMAII',1,'2022-06-08 09:57:46');
/*!40000 ALTER TABLE `t_usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-16 10:21:14
