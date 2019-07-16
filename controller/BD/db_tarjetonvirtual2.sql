-- MySQL dump 10.16  Distrib 10.1.36-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: db_tarjetonvirtual2
-- ------------------------------------------------------
-- Server version	10.1.36-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_complicacion`
--

use db_tarjetonvirtual2;

DROP TABLE IF EXISTS `tbl_complicacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_complicacion` (
  `id_Complicacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_Complicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_complicacion`
--

LOCK TABLES `tbl_complicacion` WRITE;
/*!40000 ALTER TABLE `tbl_complicacion` DISABLE KEYS */;
INSERT INTO `tbl_complicacion` VALUES (1,'RETINOPATÍA'),(2,'CEGUERA'),(3,'INSUFICIENCIA RENAL'),(4,'PIE DIABÉTICO'),(5,'AMPUTACIÓN'),(6,'HIPERTROFIA VENTRICULAR IZQUIERDA'),(7,'ENFERMEDAD CEREBROVASCULAR');
/*!40000 ALTER TABLE `tbl_complicacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_complicacionespacientes`
--

DROP TABLE IF EXISTS `tbl_complicacionespacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_complicacionespacientes` (
  `id_ComplicacionPac` int(11) NOT NULL AUTO_INCREMENT,
  `fechaComplicaciones` date NOT NULL,
  `Complicacion_ID` int(11) NOT NULL,
  `id_Paciente` int(11) NOT NULL,
  PRIMARY KEY (`id_ComplicacionPac`),
  KEY `Complicacion_ID` (`Complicacion_ID`),
  KEY `id_Paciente` (`id_Paciente`),
  CONSTRAINT `tbl_complicacionespacientes_ibfk_1` FOREIGN KEY (`Complicacion_ID`) REFERENCES `tbl_complicacion` (`id_Complicacion`),
  CONSTRAINT `tbl_complicacionespacientes_ibfk_2` FOREIGN KEY (`id_Paciente`) REFERENCES `tbl_paciente` (`id_Paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_complicacionespacientes`
--

LOCK TABLES `tbl_complicacionespacientes` WRITE;
/*!40000 ALTER TABLE `tbl_complicacionespacientes` DISABLE KEYS */;
INSERT INTO `tbl_complicacionespacientes` VALUES (1,'2019-06-02',6,1);
/*!40000 ALTER TABLE `tbl_complicacionespacientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_comuna`
--

DROP TABLE IF EXISTS `tbl_comuna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_comuna` (
  `id_Comuna` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_Comuna`)
) ENGINE=InnoDB AUTO_INCREMENT=347 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_comuna`
--

LOCK TABLES `tbl_comuna` WRITE;
/*!40000 ALTER TABLE `tbl_comuna` DISABLE KEYS */;
INSERT INTO `tbl_comuna` VALUES (1,'Algarrobo'),(2,'Alhué'),(3,'Alto Bío Bío'),(4,'Alto del Carmen'),(5,'Alto Hospicio'),(6,'Ancud'),(7,'Andacollo'),(8,'Angol'),(9,'Antártica'),(10,'Antofagasta'),(11,'Antuco'),(12,'Arauco'),(13,'Arica'),(14,'Aysén'),(15,'Buin'),(16,'Bulnes'),(17,'Cabildo'),(18,'Cabo de Hornos'),(19,'Cabrero'),(20,'Calama'),(21,'Calbuco'),(22,'Caldera'),(23,'Calera de Tango'),(24,'Calle Larga'),(25,'Camarones'),(26,'Camiña'),(27,'Canela'),(28,'Cañete'),(29,'Carahue'),(30,'Cartagena'),(31,'Casablanca'),(32,'Castro'),(33,'Catemu'),(34,'Cauquenes'),(35,'Cerrillos'),(36,'Cerro Navia'),(37,'Chaitén'),(38,'Chanco'),(39,'Chañaral'),(40,'Chépica'),(41,'Chiguayante'),(42,'Chile Chico'),(43,'Chillán'),(44,'Chillán Viejo'),(45,'Chimbarongo'),(46,'Chol Chol'),(47,'Chonchi'),(48,'Cisnes'),(49,'Cobquecura'),(50,'Cochamó'),(51,'Cochrane'),(52,'Codegua'),(53,'Coelemu'),(54,'Coihueco'),(55,'Coinco'),(56,'Colbún'),(57,'Colchane'),(58,'Colina'),(59,'Collipulli'),(60,'Coltauco'),(61,'Combarbalá'),(62,'Concepción'),(63,'Conchalí'),(64,'Concón'),(65,'Constitución'),(66,'Contulmo'),(67,'Copiapó'),(68,'Coquimbo'),(69,'Coronel'),(70,'Corral'),(71,'Coyhaique'),(72,'Cunco'),(73,'Curacautín'),(74,'Curacaví'),(75,'Curaco de Vélez'),(76,'Curanilahue'),(77,'Curarrehue'),(78,'Curepto'),(79,'Curicó'),(80,'Dalcahue'),(81,'Diego de Almagro'),(82,'Doñihue'),(83,'El Bosque'),(84,'El Carmen'),(85,'El Monte'),(86,'El Quisco'),(87,'El Tabo'),(88,'Empedrado'),(89,'Ercilla'),(90,'Estación Central'),(91,'Florida'),(92,'Freire'),(93,'Freirina'),(94,'Fresia'),(95,'Frutillar'),(96,'Futaleufú'),(97,'Futrono'),(98,'Galvarino'),(99,'General Lagos'),(100,'Gorbea'),(101,'Graneros'),(102,'Guaitecas'),(103,'Hijuelas'),(104,'Hualaihué'),(105,'Hualañé'),(106,'Hualpén'),(107,'Hualqui'),(108,'Huara'),(109,'Huasco'),(110,'Huechuraba'),(111,'Illapel'),(112,'Independencia'),(113,'Iquique'),(114,'Isla de Maipo'),(115,'Isla de Pascua'),(116,'Juan Fernández'),(117,'La Calera'),(118,'La Cisterna'),(119,'La Cruz'),(120,'La Estrella'),(121,'La Florida'),(122,'La Granja'),(123,'La Higuera'),(124,'La Ligua'),(125,'La Pintana'),(126,'La Reina'),(127,'La Serena'),(128,'La Unión'),(129,'Lago Ranco'),(130,'Lago Verde'),(131,'Laguna Blanca'),(132,'Laja'),(133,'Lampa'),(134,'Lanco'),(135,'Las Cabras'),(136,'Las Condes'),(137,'Lautaro'),(138,'Lebu'),(139,'Licantén'),(140,'Limache'),(141,'Linares'),(142,'Litueche'),(143,'Llanquihue'),(144,'Llay Llay'),(145,'Lo Barnechea'),(146,'Lo Espejo'),(147,'Lo Prado'),(148,'Lolol'),(149,'Loncoche'),(150,'Longaví'),(151,'Lonquimay'),(152,'Los Álamos'),(153,'Los Andes'),(154,'Los Ángeles'),(155,'Los Lagos'),(156,'Los Muermos'),(157,'Los Sauces'),(158,'Los Vilos'),(159,'Lota'),(160,'Lumaco'),(161,'Machalí'),(162,'Macul'),(163,'Máfil'),(164,'Maipú'),(165,'Malloa'),(166,'Marchigüe'),(167,'María Elena'),(168,'María Pinto'),(169,'Mariquina'),(170,'Maule'),(171,'Maullín'),(172,'Mejillones'),(173,'Melipeuco'),(174,'Melipilla'),(175,'Molina'),(176,'Monte Patria'),(177,'Mostazal'),(178,'Mulchén'),(179,'Nacimiento'),(180,'Nancagua'),(181,'Navidad'),(182,'Negrete'),(183,'Ninhue'),(184,'Nogales'),(185,'Nueva Imperial'),(186,'Ñiquén'),(187,'Ñuñoa'),(188,'O’Higgins'),(189,'Olivar'),(190,'Ollagüe'),(191,'Olmué'),(192,'Osorno'),(193,'Ovalle'),(194,'Padre Hurtado'),(195,'Padre Las Casas'),(196,'Paihuano'),(197,'Paillaco'),(198,'Paine'),(199,'Palena'),(200,'Palmilla'),(201,'Panguipulli'),(202,'Panquehue'),(203,'Papudo'),(204,'Paredones'),(205,'Parral'),(206,'Pedro Aguirre Cerda'),(207,'Pelarco'),(208,'Pelluhue'),(209,'Pemuco'),(210,'Pencahue'),(211,'Penco'),(212,'Peñaflor'),(213,'Peñalolén'),(214,'Peralillo'),(215,'Perquenco'),(216,'Petorca'),(217,'Peumo'),(218,'Pica'),(219,'Pichidegua'),(220,'Pichilemu'),(221,'Pinto'),(222,'Pirque'),(223,'Pitrufquén'),(224,'Placilla'),(225,'Portezuelo'),(226,'Porvenir'),(227,'Pozo Almonte'),(228,'Primavera'),(229,'Providencia'),(230,'Puchuncaví'),(231,'Pucón'),(232,'Pudahuel'),(233,'Puente Alto'),(234,'Puerto Montt'),(235,'Puerto Natales'),(236,'Puerto Octay'),(237,'Puerto Varas'),(238,'Pumanque'),(239,'Punitaqui'),(240,'Punta Arenas'),(241,'Puqueldón'),(242,'Purén'),(243,'Purranque'),(244,'Putaendo'),(245,'Putre'),(246,'Puyehue'),(247,'Queilén'),(248,'Quellón'),(249,'Quemchi'),(250,'Quilaco'),(251,'Quilicura'),(252,'Quilleco'),(253,'Quillón'),(254,'Quillota'),(255,'Quilpué'),(256,'Quinchao'),(257,'Quinta de Tilcoco'),(258,'Quinta Normal'),(259,'Quintero'),(260,'Quirihue'),(261,'Rancagua'),(262,'Ránquil'),(263,'Rauco'),(264,'Recoleta'),(265,'Renaico'),(266,'Renca'),(267,'Rengo'),(268,'Requínoa'),(269,'Retiro'),(270,'Rinconada'),(271,'Río Bueno'),(272,'Río Claro'),(273,'Río Hurtado'),(274,'Río Negro'),(275,'Río Negro'),(276,'Río Verde'),(277,'Romeral'),(278,'Saavedra'),(279,'Sagrada Familia'),(280,'Salamanca'),(281,'San Antonio'),(282,'San Bernardo'),(283,'San Carlos'),(284,'San Clemente'),(285,'San Esteban'),(286,'San Fabián'),(287,'San Felipe'),(288,'San Fernando'),(289,'San Gregorio'),(290,'San Ignacio'),(291,'San Javier'),(292,'San Joaquín'),(293,'San José de Maipo'),(294,'San Juan de la Costa'),(295,'San Miguel'),(296,'San Nicolás'),(297,'San Pablo'),(298,'San Pedro'),(299,'San Pedro de Atacama'),(300,'San Pedro de la Paz'),(301,'San Rafael'),(302,'San Ramón'),(303,'San Rosendo'),(304,'San Vicente de Tagua Tagua'),(305,'Santa Bárbara'),(306,'Santa Cruz'),(307,'Santa Juana'),(308,'Santa María'),(309,'Santiago'),(310,'Santo Domingo'),(311,'Sierra Gorda'),(312,'Talagante'),(313,'Talca'),(314,'Talcahuano'),(315,'Taltal'),(316,'Temuco'),(317,'Teno'),(318,'Teodoro Schmidt'),(319,'Tierra Amarilla'),(320,'Til Til'),(321,'Timaukel'),(322,'Tirúa'),(323,'Tocopilla'),(324,'Toltén'),(325,'Tomé'),(326,'Torres del Paine'),(327,'Tortel'),(328,'Traiguén'),(329,'Trehuaco'),(330,'Tucapel'),(331,'Valdivia'),(332,'Vallenar'),(333,'Valparaíso'),(334,'Vichuquén'),(335,'Victoria'),(336,'Vicuña'),(337,'Vilcún'),(338,'Villa Alegre'),(339,'Villa Alemana'),(340,'Villarrica'),(341,'Viña del Mar'),(342,'Vitacura'),(343,'Yerbas Buenas'),(344,'Yumbel'),(345,'Yungay'),(346,'Zapallar');
/*!40000 ALTER TABLE `tbl_comuna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_estado`
--

DROP TABLE IF EXISTS `tbl_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_estado` (
  `id_Estado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_Estado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_estado`
--

LOCK TABLES `tbl_estado` WRITE;
/*!40000 ALTER TABLE `tbl_estado` DISABLE KEYS */;
INSERT INTO `tbl_estado` VALUES (1,'ACTIVO'),(2,'PASIVO');
/*!40000 ALTER TABLE `tbl_estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_estado_civil`
--

DROP TABLE IF EXISTS `tbl_estado_civil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_estado_civil` (
  `id_EstadoCivil` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_EstadoCivil`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_estado_civil`
--

LOCK TABLES `tbl_estado_civil` WRITE;
/*!40000 ALTER TABLE `tbl_estado_civil` DISABLE KEYS */;
INSERT INTO `tbl_estado_civil` VALUES (1,'SOLTERO(A)'),(2,'CASADO(A)'),(3,'VIUDO(A)'),(4,'SEPARADO(A)');
/*!40000 ALTER TABLE `tbl_estado_civil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_estamento`
--

DROP TABLE IF EXISTS `tbl_estamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_estamento` (
  `id_Estamento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_Estamento`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_estamento`
--

LOCK TABLES `tbl_estamento` WRITE;
/*!40000 ALTER TABLE `tbl_estamento` DISABLE KEYS */;
INSERT INTO `tbl_estamento` VALUES (1,'MEDICO'),(2,'ENFERMERA'),(3,'NUTRICIONISTA'),(4,'KINESIOLOGO');
/*!40000 ALTER TABLE `tbl_estamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_factorderiesgo`
--

DROP TABLE IF EXISTS `tbl_factorderiesgo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_factorderiesgo` (
  `id_FactorDeRiesgo` int(11) NOT NULL AUTO_INCREMENT,
  `insuficienciaRenal` int(11) NOT NULL,
  `IAM` int(11) NOT NULL,
  `ACV` int(11) NOT NULL,
  `Tarjeton_ID` int(11) NOT NULL,
  PRIMARY KEY (`id_FactorDeRiesgo`),
  KEY `Tarjeton_ID` (`Tarjeton_ID`),
  CONSTRAINT `tbl_factorderiesgo_ibfk_1` FOREIGN KEY (`Tarjeton_ID`) REFERENCES `tbl_tarjeton` (`id_Tarjeton`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_factorderiesgo`
--

LOCK TABLES `tbl_factorderiesgo` WRITE;
/*!40000 ALTER TABLE `tbl_factorderiesgo` DISABLE KEYS */;
INSERT INTO `tbl_factorderiesgo` VALUES (1,2,2,2,1);
/*!40000 ALTER TABLE `tbl_factorderiesgo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_listadoexamen`
--

DROP TABLE IF EXISTS `tbl_listadoexamen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_listadoexamen` (
  `id_ListaExamen` int(11) NOT NULL AUTO_INCREMENT,
  `nombreExamen` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_ListaExamen`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_listadoexamen`
--

LOCK TABLES `tbl_listadoexamen` WRITE;
/*!40000 ALTER TABLE `tbl_listadoexamen` DISABLE KEYS */;
INSERT INTO `tbl_listadoexamen` VALUES (1,'HEMOGLOBINA GLICOSILADA'),(2,'GLICEMIA'),(3,'CREATININEMIA'),(4,'COLESTEROL T./HDL'),(5,'COLESTEROL HDL'),(6,'COLESTEROL LDL'),(7,'COLESTEROL VLDL'),(8,'TRIGLICÉRIDOS'),(9,'MAU/CREAT(RAC)'),(10,'VFG'),(11,'PAUTA ERC'),(12,'HORMONA TIROESTIMULANTE(TSH)'),(13,'HORMONA TIROXINA LIBRE(T4L)'),(14,'RPR'),(15,'HEMOGRAMA'),(16,'HEMATOCRITO'),(17,'NITRÓGENO UREICO'),(18,'ACIDO URICO'),(19,'HEMOGLOBINA CORPUSCULAR MEDIA');
/*!40000 ALTER TABLE `tbl_listadoexamen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_log`
--

DROP TABLE IF EXISTS `tbl_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_log` (
  `id_Log` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombres` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombreUsuario` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `suceso` int(11) NOT NULL,
  PRIMARY KEY (`id_Log`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_log`
--

LOCK TABLES `tbl_log` WRITE;
/*!40000 ALTER TABLE `tbl_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_observacion`
--

DROP TABLE IF EXISTS `tbl_observacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_observacion` (
  `id_Observacion` int(11) NOT NULL AUTO_INCREMENT,
  `observacion` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Tarjeton_ID` int(11) NOT NULL,
  PRIMARY KEY (`id_Observacion`),
  KEY `Tarjeton_ID` (`Tarjeton_ID`),
  CONSTRAINT `tbl_observacion_ibfk_1` FOREIGN KEY (`Tarjeton_ID`) REFERENCES `tbl_tarjeton` (`id_Tarjeton`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_observacion`
--

LOCK TABLES `tbl_observacion` WRITE;
/*!40000 ALTER TABLE `tbl_observacion` DISABLE KEYS */;
INSERT INTO `tbl_observacion` VALUES (1,'Este es un paciente prueba',1);
/*!40000 ALTER TABLE `tbl_observacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_paciente`
--

DROP TABLE IF EXISTS `tbl_paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_paciente` (
  `id_Paciente` int(11) NOT NULL AUTO_INCREMENT,
  `run_Paciente` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombres` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidoPaterno` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidoMaterno` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `sexo` bit(1) NOT NULL,
  `participacionSocial` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `estudio` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `actividadLaboral` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `direccionParticular` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `sector` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `estadoCivil_ID` int(11) NOT NULL,
  `comuna_ID` int(11) NOT NULL,
  `estado_ID` int(11) NOT NULL,
  PRIMARY KEY (`id_Paciente`),
  KEY `estadoCivil_ID` (`estadoCivil_ID`),
  KEY `estado_ID` (`estado_ID`),
  KEY `comuna_ID` (`comuna_ID`),
  CONSTRAINT `tbl_paciente_ibfk_1` FOREIGN KEY (`estadoCivil_ID`) REFERENCES `tbl_estado_civil` (`id_EstadoCivil`),
  CONSTRAINT `tbl_paciente_ibfk_2` FOREIGN KEY (`estado_ID`) REFERENCES `tbl_estado` (`id_Estado`),
  CONSTRAINT `tbl_paciente_ibfk_3` FOREIGN KEY (`comuna_ID`) REFERENCES `tbl_comuna` (`id_Comuna`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_paciente`
--

LOCK TABLES `tbl_paciente` WRITE;
/*!40000 ALTER TABLE `tbl_paciente` DISABLE KEYS */;
INSERT INTO `tbl_paciente` VALUES (1,'17504702-6','DEMIS ADAMO','VIDAL ','ARRIAZA','1990-05-07','','IGLESIA','ENSEÃ‘ANZA INSTITUTO PROFESIONAL','TÃ‰CNICO EN INFORMÃTICA','PEDRO PRADO #1046 - SANTA CRUZ DE TRIANA','VERDE',2,261,1),(2,'18646752-3','MARIA JOSE','RUZ','VIDELA','1994-05-20','','IGLESIA','ENSEÃ‘ANZA INSTITUTO PROFESIONAL','TÃ‰CNICO EN CONTABILIDAD GENERAL','PEDRO PRADO #1046 - SANTA CRUZ DE TRIANA','AMARILLO',2,261,1);
/*!40000 ALTER TABLE `tbl_paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pacientediabetico`
--

DROP TABLE IF EXISTS `tbl_pacientediabetico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pacientediabetico` (
  `id_PacienteDiabetico` int(11) NOT NULL AUTO_INCREMENT,
  `fechaEvalPieDiabetico` date NOT NULL,
  `ptjePieDiabetico` int(11) NOT NULL,
  `fechaQualidiab` date NOT NULL,
  `qualidiab` bit(1) NOT NULL,
  `fechaFondoOjo` date NOT NULL,
  `resultadoFondoOjo` bit(1) NOT NULL,
  `enalapril` bit(1) NOT NULL,
  `losartan` bit(1) NOT NULL,
  `retinopatiaDiabetica` bit(1) NOT NULL,
  `amputacion` bit(1) NOT NULL,
  `Tarjeton_ID` int(11) NOT NULL,
  PRIMARY KEY (`id_PacienteDiabetico`),
  KEY `Tarjeton_ID` (`Tarjeton_ID`),
  CONSTRAINT `tbl_pacientediabetico_ibfk_1` FOREIGN KEY (`Tarjeton_ID`) REFERENCES `tbl_tarjeton` (`id_Tarjeton`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pacientediabetico`
--

LOCK TABLES `tbl_pacientediabetico` WRITE;
/*!40000 ALTER TABLE `tbl_pacientediabetico` DISABLE KEYS */;
INSERT INTO `tbl_pacientediabetico` VALUES (1,'2016-03-01',1,'2015-11-01','\0','2016-01-03','\0','\0','','','',1);
/*!40000 ALTER TABLE `tbl_pacientediabetico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_parametrosclinicos`
--

DROP TABLE IF EXISTS `tbl_parametrosclinicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_parametrosclinicos` (
  `id_ParametrosClinicos` int(11) NOT NULL AUTO_INCREMENT,
  `peso` float NOT NULL,
  `talla` float NOT NULL,
  `IMC` float NOT NULL,
  `diagnosticoNutricional` int(11) NOT NULL,
  `paSistolica` int(11) NOT NULL,
  `paDistolica` int(11) NOT NULL,
  `circunferenciaCintura` int(11) NOT NULL,
  `Tarjeton_ID` int(11) NOT NULL,
  PRIMARY KEY (`id_ParametrosClinicos`),
  KEY `Tarjeton_ID` (`Tarjeton_ID`),
  CONSTRAINT `tbl_parametrosclinicos_ibfk_1` FOREIGN KEY (`Tarjeton_ID`) REFERENCES `tbl_tarjeton` (`id_Tarjeton`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_parametrosclinicos`
--

LOCK TABLES `tbl_parametrosclinicos` WRITE;
/*!40000 ALTER TABLE `tbl_parametrosclinicos` DISABLE KEYS */;
INSERT INTO `tbl_parametrosclinicos` VALUES (3,83,1,28,6,130,64,102,1);
/*!40000 ALTER TABLE `tbl_parametrosclinicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_patologia`
--

DROP TABLE IF EXISTS `tbl_patologia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_patologia` (
  `id_Patologia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_Patologia`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_patologia`
--

LOCK TABLES `tbl_patologia` WRITE;
/*!40000 ALTER TABLE `tbl_patologia` DISABLE KEYS */;
INSERT INTO `tbl_patologia` VALUES (1,'DIABETES MELLITUS'),(2,'HIPERTENSION ARTERIAL'),(3,'DISLIPIDEMIAS'),(4,'EPOC'),(5,'EPILEPSIA'),(6,'HIPOTIROIDISMO'),(7,'ARTROSIS DE RODILLAS'),(8,'ARTROSIS DE CADERAS'),(9,'INTOLERANCIA A LA GLUCOSA'),(10,'PARKINSON');
/*!40000 ALTER TABLE `tbl_patologia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_patologiaspacientes`
--

DROP TABLE IF EXISTS `tbl_patologiaspacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_patologiaspacientes` (
  `id_PatPacientes` int(11) NOT NULL AUTO_INCREMENT,
  `fechaPatologias` date NOT NULL,
  `Patologia_ID` int(11) NOT NULL,
  `id_Paciente` int(11) NOT NULL,
  PRIMARY KEY (`id_PatPacientes`),
  KEY `Patologia_ID` (`Patologia_ID`),
  KEY `id_Paciente` (`id_Paciente`),
  CONSTRAINT `tbl_patologiaspacientes_ibfk_1` FOREIGN KEY (`Patologia_ID`) REFERENCES `tbl_patologia` (`id_Patologia`),
  CONSTRAINT `tbl_patologiaspacientes_ibfk_2` FOREIGN KEY (`id_Paciente`) REFERENCES `tbl_paciente` (`id_Paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_patologiaspacientes`
--

LOCK TABLES `tbl_patologiaspacientes` WRITE;
/*!40000 ALTER TABLE `tbl_patologiaspacientes` DISABLE KEYS */;
INSERT INTO `tbl_patologiaspacientes` VALUES (1,'2008-08-30',6,1),(2,'2011-01-02',2,1),(3,'2011-06-09',1,1),(4,'2007-01-04',10,2),(5,'2007-03-22',9,2),(6,'2010-08-04',3,2);
/*!40000 ALTER TABLE `tbl_patologiaspacientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_profesional`
--

DROP TABLE IF EXISTS `tbl_profesional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_profesional` (
  `id_Profesional` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `estamento_ID` int(11) NOT NULL,
  PRIMARY KEY (`id_Profesional`),
  KEY `estamento_ID` (`estamento_ID`),
  CONSTRAINT `tbl_profesional_ibfk_1` FOREIGN KEY (`estamento_ID`) REFERENCES `tbl_estamento` (`id_Estamento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_profesional`
--

LOCK TABLES `tbl_profesional` WRITE;
/*!40000 ALTER TABLE `tbl_profesional` DISABLE KEYS */;
INSERT INTO `tbl_profesional` VALUES (1,'JORGE VASQUEZ',1),(2,'PATRICIA VILLEGAS',1),(3,'NORMA RODRIGUEZ',2);
/*!40000 ALTER TABLE `tbl_profesional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tarjeton`
--

DROP TABLE IF EXISTS `tbl_tarjeton`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tarjeton` (
  `id_Tarjeton` int(11) NOT NULL AUTO_INCREMENT,
  `fechaAtencion` date NOT NULL,
  `id_Paciente` int(11) NOT NULL,
  `profesional_ID` int(11) NOT NULL,
  `estado_ID` int(11) NOT NULL,
  PRIMARY KEY (`id_Tarjeton`),
  KEY `id_Paciente` (`id_Paciente`),
  KEY `estado_ID` (`estado_ID`),
  KEY `profesional_ID` (`profesional_ID`),
  CONSTRAINT `tbl_tarjeton_ibfk_1` FOREIGN KEY (`id_Paciente`) REFERENCES `tbl_paciente` (`id_Paciente`),
  CONSTRAINT `tbl_tarjeton_ibfk_2` FOREIGN KEY (`estado_ID`) REFERENCES `tbl_estado` (`id_Estado`),
  CONSTRAINT `tbl_tarjeton_ibfk_3` FOREIGN KEY (`profesional_ID`) REFERENCES `tbl_profesional` (`id_Profesional`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tarjeton`
--

LOCK TABLES `tbl_tarjeton` WRITE;
/*!40000 ALTER TABLE `tbl_tarjeton` DISABLE KEYS */;
INSERT INTO `tbl_tarjeton` VALUES (1,'2019-05-06',1,1,1),(2,'2019-06-03',1,3,1);
/*!40000 ALTER TABLE `tbl_tarjeton` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_telefono`
--

DROP TABLE IF EXISTS `tbl_telefono`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_telefono` (
  `id_Telefono` int(11) NOT NULL AUTO_INCREMENT,
  `fono` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Paciente_ID` int(11) NOT NULL,
  PRIMARY KEY (`id_Telefono`),
  KEY `id_Paciente` (`Paciente_ID`),
  CONSTRAINT `tbl_telefono_ibfk_1` FOREIGN KEY (`Paciente_ID`) REFERENCES `tbl_paciente` (`id_Paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_telefono`
--

LOCK TABLES `tbl_telefono` WRITE;
/*!40000 ALTER TABLE `tbl_telefono` DISABLE KEYS */;
INSERT INTO `tbl_telefono` VALUES (1,'+56954199353',1),(2,'+56981668348',2);
/*!40000 ALTER TABLE `tbl_telefono` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tipoexamenes`
--

DROP TABLE IF EXISTS `tbl_tipoexamenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tipoexamenes` (
  `id_TipoExamenes` int(11) NOT NULL AUTO_INCREMENT,
  `id_ListaExamen` int(11) NOT NULL,
  `fechaExamen` date NOT NULL,
  `valor` float NOT NULL,
  `Tarjeton_ID` int(11) NOT NULL,
  PRIMARY KEY (`id_TipoExamenes`),
  KEY `ListaExamen_ID` (`id_ListaExamen`),
  KEY `Tarjeton_ID` (`Tarjeton_ID`),
  CONSTRAINT `tbl_tipoexamenes_ibfk_1` FOREIGN KEY (`id_ListaExamen`) REFERENCES `tbl_listadoexamen` (`id_ListaExamen`),
  CONSTRAINT `tbl_tipoexamenes_ibfk_2` FOREIGN KEY (`Tarjeton_ID`) REFERENCES `tbl_tarjeton` (`id_Tarjeton`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tipoexamenes`
--

LOCK TABLES `tbl_tipoexamenes` WRITE;
/*!40000 ALTER TABLE `tbl_tipoexamenes` DISABLE KEYS */;
INSERT INTO `tbl_tipoexamenes` VALUES (1,1,'2016-07-01',9,1),(2,3,'2016-07-01',1,1),(3,4,'2016-07-01',137,1),(4,5,'2016-07-01',47,1),(5,6,'2016-07-01',156,1),(6,8,'2016-07-01',156,1),(7,9,'2016-07-01',1,1),(10,10,'2016-07-01',78,1),(11,11,'2016-07-01',2,1);
/*!40000 ALTER TABLE `tbl_tipoexamenes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tratamientocardiaco`
--

DROP TABLE IF EXISTS `tbl_tratamientocardiaco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tratamientocardiaco` (
  `id_TTOCardiaco` int(11) NOT NULL AUTO_INCREMENT,
  `estatinas` bit(1) NOT NULL,
  `AAS_100` bit(1) NOT NULL,
  `Tarjeton_ID` int(11) NOT NULL,
  PRIMARY KEY (`id_TTOCardiaco`),
  KEY `Tarjeton_ID` (`Tarjeton_ID`),
  CONSTRAINT `tbl_tratamientocardiaco_ibfk_1` FOREIGN KEY (`Tarjeton_ID`) REFERENCES `tbl_tarjeton` (`id_Tarjeton`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tratamientocardiaco`
--

LOCK TABLES `tbl_tratamientocardiaco` WRITE;
/*!40000 ALTER TABLE `tbl_tratamientocardiaco` DISABLE KEYS */;
INSERT INTO `tbl_tratamientocardiaco` VALUES (1,'','\0',1);
/*!40000 ALTER TABLE `tbl_tratamientocardiaco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuarioadultomayor`
--

DROP TABLE IF EXISTS `tbl_usuarioadultomayor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_usuarioadultomayor` (
  `id_UsuAdultoMayor` int(11) NOT NULL AUTO_INCREMENT,
  `autovalente` bit(1) NOT NULL,
  `autovalenteConRiesgo` bit(1) NOT NULL,
  `riesgoDependencia` bit(1) NOT NULL,
  `dependencia` bit(1) NOT NULL,
  `Tarjeton_ID` int(11) NOT NULL,
  PRIMARY KEY (`id_UsuAdultoMayor`),
  KEY `Tarjeton_ID` (`Tarjeton_ID`),
  CONSTRAINT `tbl_usuarioadultomayor_ibfk_1` FOREIGN KEY (`Tarjeton_ID`) REFERENCES `tbl_tarjeton` (`id_Tarjeton`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuarioadultomayor`
--

LOCK TABLES `tbl_usuarioadultomayor` WRITE;
/*!40000 ALTER TABLE `tbl_usuarioadultomayor` DISABLE KEYS */;
INSERT INTO `tbl_usuarioadultomayor` VALUES (1,'\0','','\0','\0',1);
/*!40000 ALTER TABLE `tbl_usuarioadultomayor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-15 20:41:21
