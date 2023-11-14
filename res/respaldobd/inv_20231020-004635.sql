-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: inv
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB

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
-- Table structure for table `adopcion`
--

DROP TABLE IF EXISTS `adopcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adopcion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_perro` int(11) NOT NULL,
  `id_dueno_uno` int(11) NOT NULL,
  `id_dueno_dos` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_perro` (`id_perro`),
  KEY `id_dueno_uno` (`id_dueno_uno`),
  KEY `id_dueno_dos` (`id_dueno_dos`),
  CONSTRAINT `adopcion_ibfk_1` FOREIGN KEY (`id_perro`) REFERENCES `perro` (`id_perro`),
  CONSTRAINT `adopcion_ibfk_2` FOREIGN KEY (`id_dueno_uno`) REFERENCES `cliente` (`id_cliente`),
  CONSTRAINT `adopcion_ibfk_3` FOREIGN KEY (`id_dueno_dos`) REFERENCES `cliente` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adopcion`
--

LOCK TABLES `adopcion` WRITE;
/*!40000 ALTER TABLE `adopcion` DISABLE KEYS */;
INSERT INTO `adopcion` VALUES (1,2,9889878,28023816,'2023-09-30'),(2,3,28023816,9889878,'2023-10-03'),(6,3,28023816,9889878,'2023-10-03'),(8,3,28023816,9889878,'2023-10-03'),(11,4,9889878,28023816,'2023-10-14');
/*!40000 ALTER TABLE `adopcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auditoria`
--

DROP TABLE IF EXISTS `auditoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auditoria` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(1000) NOT NULL,
  `evento` varchar(20) NOT NULL,
  `datetime` date NOT NULL,
  `user_res` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditoria`
--

LOCK TABLES `auditoria` WRITE;
/*!40000 ALTER TABLE `auditoria` DISABLE KEYS */;
INSERT INTO `auditoria` VALUES (1,'El usuario admin1 ActualizÃ³ los servicios del cliente Johel portador de la cÃ©dula 28023816 y su mascota Manchas en el Ã¡rea de mascotas *perruquerÃ­a* satisfactoriamente. Los servicios aplicados a la mascota son los siguientes:  Un servicio de corte 7f con un costo de 20$, Haciendo un total de 20$','actualizar','2023-10-01','admin1'),(2,'El usuario admin1 ActualizÃ³ los servicios del cliente Johel portador de la cÃ©dula 28023816 y su mascota Manchas en el Ã¡rea de mascotas *perruquerÃ­a* satisfactoriamente. Los servicios aplicados a la mascota son los siguientes:  Un servicio de cosas varias con un costo de 5$, Haciendo un total de 5$','actualizar','2023-10-02','admin1'),(3,'El usuario admin1 aÃ±adiÃ³ al usuario usuario con la contraseÃ±a *usuario* y el cargo: Usuario. satisfactoriamente','123','2023-10-02','admin1'),(4,'El usuario admin1 aÃ±adiÃ³ a la mascota Manchas del dueÃ±o Roger portador de la cÃ©dula 9889878 con el indice 03 en el Ã¡rea de mascotas satisfactoriamente','insertar','2023-10-03','admin1'),(5,'El usuario admin1 actualizÃ³ la informaciÃ³n de la mascota del dueÃ±o Roger Arenas portador de la cÃ©dula 9889878; anteriormente llamado *Manchas de raza Dalmata  y observaciones: ninguna* a *Manchas con la id 4, de raza: Dalmatay observaciones: ninguna* en la secciÃ³n *PerruquerÃ­a* Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(6,'El usuario admin1 actualizÃ³ la informaciÃ³n de la mascota del dueÃ±o Roger Arenas portador de la cÃ©dula 9889878; anteriormente llamado *Manchas de raza Dalmata  y observaciones: ninguna* a *Manchas con la id 4, de raza: Dalmatay observaciones: ninguna* en la secciÃ³n *PerruquerÃ­a* Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(7,'El usuario admin1 actualizÃ³ la informaciÃ³n de la mascota del dueÃ±o Johel Mujica portador de la cÃ©dula 28023816; anteriormente llamado *Manchas de raza Bengali  y observaciones: ninguna* a *Manchas con la id 2, de raza: Bengaliy observaciones: ninguna* en la secciÃ³n *PerruquerÃ­a* Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(8,'El usuario admin1 eliminÃ³ a la mascota Manchas de la raza Bengali, portador de la ID 2 del dueÃ±o Johel Mujica, portador de la cÃ©dula 28023816 en el Ã¡rea de Mascotas, secciÃ³n *perruquerÃ­a* satisfactoriamente','eliminar','2023-10-03','admin1'),(9,'El usuario  aÃ±adiÃ³ al cliente   en el Ã¡rea de clientes secciÃ³n *perruquerÃ­a* satisfactoriamente','actualizar','2023-10-03',''),(10,'El usuario  realizÃ³ una constancia de adopciÃ³n entre el anterior dueÃ±o  portador de la cÃ©dula: , adopta el cliente Johel Mujica portadorde la cÃ©dula: 28023816 la mascota a adoptar es   en el area de mascotas satisfactoriamente','actualizar','2023-10-03',''),(11,'El usuario admin1 realizÃ³ una constancia de adopciÃ³n entre el anterior dueÃ±o  portador de la cÃ©dula: , adopta el cliente Roger Arenas portadorde la cÃ©dula: 9889878 la mascota a adoptar es   en el area de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(12,'El usuario admin1 realizÃ³ una constancia de adopciÃ³n entre el anterior dueÃ±o  portador de la cÃ©dula: , adopta el cliente Johel Mujica portadorde la cÃ©dula: 28023816 la mascota a adoptar es   en el area de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(13,'El usuario admin1 realizÃ³ una constancia de adopciÃ³n entre el anterior dueÃ±o Johel Mujica portador de la cÃ©dula: 28023816, adopta el cliente Roger Arenas portadorde la cÃ©dula: 9889878 la mascota a adoptar es  de tipo  y raza  en el area de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(14,'El usuario admin1 realizÃ³ una constancia de adopciÃ³n entre el anterior dueÃ±o  portador de la cÃ©dula: , adopta el cliente Johel Mujica portadorde la cÃ©dula: 28023816 la mascota a adoptar es   en el area de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(15,'El usuario admin1 realizÃ³ una constancia de adopciÃ³n entre el anterior dueÃ±o Johel Mujica portador de la cÃ©dula: 28023816, adopta el cliente Roger Arenas portadorde la cÃ©dula: 9889878 la mascota a adoptar es Harold de tipo Perro y raza bulldog en el area de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(16,'El usuario admin1 eliminÃ³ a la mascota Harold de la raza bulldog, portador de la ID 3 del dueÃ±o Roger Arenas, portador de la cÃ©dula 9889878 en el Ã¡rea de Mascotas, secciÃ³n *perruquerÃ­a* satisfactoriamente','eliminar','2023-10-03','admin1'),(17,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *usuario , contraseÃ±a: usuario y cargo: usuario* a *admin1 , contraseÃ±a: usuario y cargo usuario* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(18,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *admin1 , contraseÃ±a: usuario y cargo: usuario* a *usuario , contraseÃ±a: usuario y cargo usuario* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(19,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-03 09:43:11','entrar','2023-10-03','admin1'),(20,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-03 09:45:12','salir','2023-10-03','admin1'),(21,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-03 09:45:18','entrar','2023-10-03','admin1'),(22,'El usuario admin1 aÃ±adiÃ³ la consulta del cliente Roger portador de la cÃ©dula 9889878 y su mascota Manchas en el Ã¡rea de mascotas *perruquerÃ­a* satisfactoriamente. Los servicios aplicados a la mascota son los siguientes:  Un servicio de corte con un costo de 5$, Un servicio de desparasitacion con un costo de 10$, Haciendo un total de 15$','123','2023-10-03','admin1'),(23,'El usuario admin1 aÃ±adiÃ³ la consulta del cliente Roger portador de la cÃ©dula 9889878 y su mascota Manchas en el Ã¡rea de mascotas *perruquerÃ­a* satisfactoriamente. Los servicios aplicados a la mascota son los siguientes:  Un servicio de corte con un costo de 2$, Un servicio de chequeo profundo con un costo de 55$, Haciendo un total de 57$','123','2023-10-03','admin1'),(24,'El usuario admin1 aÃ±adiÃ³ la consulta del cliente Roger portador de la cÃ©dula 9889878 y su mascota Manchas en el Ã¡rea de mascotas *perruquerÃ­a* satisfactoriamente. Los servicios aplicados a la mascota son los siguientes:  Un servicio de corte con un costo de 2$, Haciendo un total de 2$','123','2023-10-03','admin1'),(25,'El usuario admin1 eliminÃ³ la consulta del cliente Roger portador de la cÃ©dula 9889878 y su mascota Manchas en el Ã¡rea de mascotas satisfactoriamente','123','2023-10-03','admin1'),(26,'El usuario admin1 ActualizÃ³ los servicios del cliente Roger portador de la cÃ©dula 9889878 y su mascota Manchas en el Ã¡rea de mascotas *perruquerÃ­a* satisfactoriamente. Los servicios aplicados a la mascota son los siguientes:  Un servicio de corte con un costo de 2$, Un servicio de corte 33 con un costo de 2$, Haciendo un total de 4$','actualizar','2023-10-03','admin1'),(27,'El usuario admin1actualizÃ³ la observaciÃ³n de la consulta nÃºmero 12 a se encontraron garrapatas','actualizar','2023-10-03','admin1'),(28,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-04 12:29:37','salir','2023-10-04','admin1'),(29,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-04 05:13:54','entrar','2023-10-04','admin1'),(30,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-04 05:13:59','salir','2023-10-04','admin1'),(31,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-04 05:16:38','entrar','2023-10-04','admin1'),(32,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-04 05:16:43','salir','2023-10-04','admin1'),(33,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-04 05:17:40','entrar','2023-10-04','admin1'),(34,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-04 05:17:46','salir','2023-10-04','admin1'),(35,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-04 05:18:21','entrar','2023-10-04','admin1'),(36,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-04 05:21:57','salir','2023-10-04','admin1'),(37,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-04 05:22:21','entrar','2023-10-04','admin1'),(38,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *usuario , contraseÃ±a: usuario y cargo: usuario* a *usuario , contraseÃ±a: usuario y cargo usuario* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-04','admin1'),(39,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *usuario , contraseÃ±a: usuario y cargo: usuario* a *usuario , contraseÃ±a: usuario y cargo usuario* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-04','admin1'),(40,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *usuario , contraseÃ±a: usuario y cargo: usuario* a *admin1 , contraseÃ±a: usuario y cargo administrador* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-04','admin1'),(41,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *admin1 , contraseÃ±a: usuario y cargo: administrador* a *usuario , contraseÃ±a: usuario y cargo administrador* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-04','admin1'),(42,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *usuario , contraseÃ±a: usuario y cargo: administrador* a *usuario , contraseÃ±a: usuario y cargo usuario* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-04','admin1'),(43,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-04 06:44:34','salir','2023-10-04','admin1'),(44,'El usuario usuario iniciÃ³ sesiÃ³n el 2023-10-04 06:44:49','entrar','2023-10-04','usuario'),(45,'El usuario usuario cerrÃ³ sesiÃ³n el 2023-10-04 06:44:53','salir','2023-10-04','usuario'),(46,'La cuenta del usuario usuario ha sido bloqueada por exceso de intentos, fecha :2023-10-04 06:45:13','entrar','2023-10-04',''),(47,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-04 06:45:51','entrar','2023-10-04','admin1'),(48,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *usuario , contraseÃ±a: usuario y cargo: usuario* a *usuario , contraseÃ±a: usuario y cargo usuario* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-04','admin1'),(49,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-04 06:46:13','salir','2023-10-04','admin1'),(50,'La cuenta del usuario usuario ha sido bloqueada por exceso de intentos, fecha :2023-10-04 06:46:31','entrar','2023-10-04','usuario'),(51,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-04 06:46:37','entrar','2023-10-04','admin1'),(52,'El usuario usuario iniciÃ³ sesiÃ³n el 2023-10-05 06:19:35','entrar','2023-10-05','usuario'),(53,'El usuario usuario cerrÃ³ sesiÃ³n el 2023-10-05 06:19:42','salir','2023-10-05','usuario'),(54,'La cuenta del usuario *admin1* ha sido bloqueada por exceso de intentos, fecha :2023-10-05 06:21:36','entrar','2023-10-05','admin1'),(55,'La cuenta del usuario *usuario* ha sido bloqueada por exceso de intentos, fecha :2023-10-05 06:23:33','entrar','2023-10-05','usuario'),(56,'La cuenta del usuario *usuario* ha sido bloqueada por exceso de intentos, fecha :2023-10-05 06:26:33','entrar','2023-10-05','usuario'),(57,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-05 06:26:50','entrar','2023-10-05','admin1'),(58,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *usuario , contraseÃ±a: usuario y cargo: usuario* a *usuario , contraseÃ±a: usuario y cargo administrador* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-05','admin1'),(59,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *usuario , contraseÃ±a: usuario y cargo: administrador* a *usuario , contraseÃ±a: usuario y cargo usuario* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-05','admin1'),(60,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-05 06:28:22','salir','2023-10-05','admin1'),(61,'El usuario usuario iniciÃ³ sesiÃ³n el 2023-10-05 06:28:32','entrar','2023-10-05','usuario'),(62,'El usuario usuario cerrÃ³ sesiÃ³n el 2023-10-05 06:28:36','salir','2023-10-05','usuario'),(63,'La cuenta del usuario *admin1* ha sido bloqueada por exceso de intentos, fecha :2023-10-05 06:28:43','entrar','2023-10-05','admin1'),(64,'La cuenta del usuario *usuario* ha sido bloqueada por exceso de intentos, fecha :2023-10-05 06:29:00','entrar','2023-10-05','usuario'),(65,'La cuenta del usuario *admin1* ha sido bloqueada por exceso de intentos, fecha :2023-10-05 06:30:29','entrar','2023-10-05','admin1'),(66,'La cuenta del usuario *admin1* ha sido bloqueada por exceso de intentos, fecha :2023-10-05 06:32:43','entrar','2023-10-05','admin1'),(67,'La cuenta del usuario *admin1* ha sido bloqueada por exceso de intentos, fecha :2023-10-05 06:32:53','entrar','2023-10-05','admin1'),(68,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-05 06:32:56','entrar','2023-10-05','admin1'),(69,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-05 06:33:00','salir','2023-10-05','admin1'),(70,'La cuenta del usuario *admin1* ha sido bloqueada por exceso de intentos, fecha :2023-10-05 06:33:10','entrar','2023-10-05','admin1'),(71,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-05 06:34:43','entrar','2023-10-05','admin1'),(72,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-05 06:34:47','salir','2023-10-05','admin1'),(73,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-05 06:35:01','entrar','2023-10-05','admin1'),(74,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-05 06:35:06','salir','2023-10-05','admin1'),(75,'La cuenta del usuario *admin1* ha sido bloqueada por exceso de intentos, fecha :2023-10-05 06:46:28','entrar','2023-10-05','admin1'),(76,'El usuario usuario iniciÃ³ sesiÃ³n el 2023-10-05 06:51:39','entrar','2023-10-05','usuario'),(77,'El usuario usuario cerrÃ³ sesiÃ³n el 2023-10-05 06:51:43','salir','2023-10-05','usuario'),(78,'La cuenta del usuario *usuario* ha sido bloqueada por exceso de intentos, fecha :2023-10-05 06:51:52','entrar','2023-10-05','usuario'),(79,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-05 07:09:33','entrar','2023-10-05','admin1'),(80,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-05 07:09:43','salir','2023-10-05','admin1'),(81,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-05 07:10:03','entrar','2023-10-05','admin1'),(82,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-05 07:10:14','salir','2023-10-05','admin1'),(83,'La cuenta del usuario *usuario* ha sido bloqueada por exceso de intentos, fecha :2023-10-05 07:10:27','entrar','2023-10-05','usuario'),(84,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-05 07:10:43','entrar','2023-10-05','admin1'),(85,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *usuario , contraseÃ±a: usuario y cargo: usuario* a *usuario , contraseÃ±a: usuario y cargo usuario* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-05','admin1'),(86,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-05 07:22:32','salir','2023-10-05','admin1'),(87,'La cuenta del usuario *usuario* ha sido bloqueada por exceso de intentos, fecha :2023-10-05 07:22:47','entrar','2023-10-05','usuario'),(88,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-05 07:22:52','entrar','2023-10-05','admin1'),(89,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *usuario , contraseÃ±a: usuario y cargo: usuario* a *usuario , contraseÃ±a: usuario y cargo usuario* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-05','admin1'),(90,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *usuario , contraseÃ±a: usuario y cargo: usuario* a *usuario , contraseÃ±a: usuario y cargo usuario* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-05','admin1'),(91,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-05 07:23:44','salir','2023-10-05','admin1'),(92,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-05 09:05:44','entrar','2023-10-05','admin1'),(93,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-05 05:45:19','entrar','2023-10-05','admin1'),(94,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-06 05:23:55','entrar','2023-10-06','admin1'),(95,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-06 05:24:01','salir','2023-10-06','admin1'),(96,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-06 05:25:18','entrar','2023-10-06','admin1'),(97,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-06 06:07:41','salir','2023-10-06','admin1'),(98,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-06 06:07:46','entrar','2023-10-06','admin1'),(99,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-06 06:14:39','salir','2023-10-06','admin1'),(100,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-06 06:14:47','entrar','2023-10-06','admin1'),(101,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-06 06:27:42','salir','2023-10-06','admin1'),(102,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-06 06:27:49','entrar','2023-10-06','admin1'),(103,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-06 06:32:28','salir','2023-10-06','admin1'),(104,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-06 06:32:47','entrar','2023-10-06','admin1'),(105,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-06 06:38:56','salir','2023-10-06','admin1'),(106,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-06 06:39:23','entrar','2023-10-06','admin1'),(107,'El usuario admin1 aÃ±adiÃ³ al usuario usuario con la contraseÃ±a *usuario* y el cargo: Usuario. satisfactoriamente','insertar','2023-10-06','admin1'),(108,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-06 07:25:51','salir','2023-10-06','admin1'),(109,'El usuario usuario iniciÃ³ sesiÃ³n el 2023-10-06 07:25:59','entrar','2023-10-06','usuario'),(110,'El usuario usuario cerrÃ³ sesiÃ³n el 2023-10-06 07:41:52','salir','2023-10-06','usuario'),(111,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-06 07:41:57','entrar','2023-10-06','admin1'),(112,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-06 07:45:39','salir','2023-10-06','admin1'),(113,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-06 07:45:56','entrar','2023-10-06','admin1'),(114,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 1, cuales datos eran: * , contraseÃ±a:  y cargo: * a * , contraseÃ±a:  y cargo * en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-06','admin1'),(115,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 1, cuales datos eran: * , contraseÃ±a:  y cargo: * a * , contraseÃ±a:  y cargo * en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-06','admin1'),(116,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 1, cuales datos eran: * , contraseÃ±a:  y cargo: * a * , contraseÃ±a:  y cargo * en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-06','admin1'),(117,'','actualizar','2023-10-06','admin1'),(118,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-06 08:27:00','salir','2023-10-06','admin1'),(119,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-06 08:27:08','entrar','2023-10-06','admin1'),(120,'El usuario admin1 actualizÃ³ las preguntas frecuentes del usuario con la id 1, las preguntas frecuentes ahora son; pregunta uno: color menos favorito, respuesta uno: amarillo. pregunta dos: comida favorita, respuesta dos: pan. pregunta tres: frecuencia de la, respuesta tres: 440','actualizar','2023-10-06','admin1'),(121,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-06 10:07:01','salir','2023-10-06','admin1'),(122,'El usuario usuario iniciÃ³ sesiÃ³n el 2023-10-06 10:07:10','entrar','2023-10-06','usuario'),(123,'El usuario usuario cerrÃ³ sesiÃ³n el 2023-10-06 10:07:37','salir','2023-10-06','usuario'),(124,'La cuenta del usuario *usuario* ha sido bloqueada por exceso de intentos, fecha :2023-10-06 11:34:24','entrar','2023-10-06','usuario'),(125,'El usuario usuario iniciÃ³ sesiÃ³n el 2023-10-06 08:39:32','entrar','2023-10-06','usuario'),(126,'El usuario usuario cerrÃ³ sesiÃ³n el 2023-10-06 08:39:55','salir','2023-10-06','usuario'),(127,'El usuario usuario iniciÃ³ sesiÃ³n el 2023-10-06 08:40:02','entrar','2023-10-06','usuario'),(128,'El usuario usuario cerrÃ³ sesiÃ³n el 2023-10-06 08:40:40','salir','2023-10-06','usuario'),(129,'La cuenta del usuario *usuario* ha sido bloqueada por exceso de intentos, fecha :2023-10-06 20:41:32','entrar','2023-10-06','usuario'),(130,'El usuario usuario iniciÃ³ sesiÃ³n el 2023-10-06 10:55:15','entrar','2023-10-06','usuario'),(131,'El usuario usuario cerrÃ³ sesiÃ³n el 2023-10-06 10:55:18','salir','2023-10-06','usuario'),(132,'La cuenta del usuario *usuario* ha sido bloqueada por exceso de intentos, fecha :2023-10-06 22:55:27','entrar','2023-10-06','usuario'),(133,'La cuenta del usuario *usuario* ha sido bloqueada por exceso de intentos, fecha :2023-10-06 22:58:13','entrar','2023-10-06','usuario'),(134,'El usuario usuario iniciÃ³ sesiÃ³n el 2023-10-06 11:01:32','entrar','2023-10-06','usuario'),(135,'El usuario usuario actualizÃ³ su informaciÃ³n del usuario, cuales datos eran: *usuario , contraseÃ±a: usuario* a *usu1 , contraseÃ±a: usuario* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-06','usuario'),(136,'El usuario usuario cerrÃ³ sesiÃ³n el 2023-10-06 11:22:20','salir','2023-10-06','usuario'),(137,'El usuario usu1 iniciÃ³ sesiÃ³n el 2023-10-06 11:22:26','entrar','2023-10-06','usu1'),(138,'El usuario usu1 cerrÃ³ sesiÃ³n el 2023-10-07 01:20:16','salir','2023-10-07','usu1'),(139,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-07 01:20:22','entrar','2023-10-07','admin1'),(140,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-07 10:58:36','salir','2023-10-07','admin1'),(141,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-07 09:20:41','entrar','2023-10-07','admin1'),(142,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-08 02:21:01','entrar','2023-10-08','admin1'),(143,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-08 06:15:18','salir','2023-10-08','admin1'),(144,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-09 01:25:50','entrar','2023-10-09','admin1'),(145,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-10 01:24:54','entrar','2023-10-10','admin1'),(146,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-10 03:39:35','salir','2023-10-10','admin1'),(147,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-10 03:48:26','entrar','2023-10-10','admin1'),(148,'El usuario admin1 aÃ±adiÃ³ al usuario alan con la contraseÃ±a *12345* y el cargo: Usuario. satisfactoriamente','insertar','2023-10-10','admin1'),(149,'El usuario admin1 aÃ±adiÃ³ al usuario Jesus con la contraseÃ±a *1234* y el cargo: Usuario. satisfactoriamente','insertar','2023-10-10','admin1'),(150,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-10 06:17:41','salir','2023-10-10','admin1'),(151,'El usuario Jesus iniciÃ³ sesiÃ³n el 2023-10-10 06:17:52','entrar','2023-10-10','Jesus'),(152,'El usuario Jesus cerrÃ³ sesiÃ³n el 2023-10-10 06:18:39','salir','2023-10-10','Jesus'),(153,'El usuario Jesus iniciÃ³ sesiÃ³n el 2023-10-10 06:18:47','entrar','2023-10-10','Jesus'),(154,'El usuario Jesus cerrÃ³ sesiÃ³n el 2023-10-10 06:19:02','salir','2023-10-10','Jesus'),(155,'El usuario Jesus iniciÃ³ sesiÃ³n el 2023-10-10 06:19:09','entrar','2023-10-10','Jesus'),(156,'El usuario Jesus cerrÃ³ sesiÃ³n el 2023-10-10 06:19:28','salir','2023-10-10','Jesus'),(157,'El usuario Jesus iniciÃ³ sesiÃ³n el 2023-10-10 06:19:59','entrar','2023-10-10','Jesus'),(158,'El usuario Jesus cerrÃ³ sesiÃ³n el 2023-10-10 06:22:09','salir','2023-10-10','Jesus'),(159,'El usuario Jesus iniciÃ³ sesiÃ³n el 2023-10-10 06:22:17','entrar','2023-10-10','Jesus'),(160,'El usuario Jesus cerrÃ³ sesiÃ³n el 2023-10-10 06:22:21','salir','2023-10-10','Jesus'),(161,'El usuario Jesus iniciÃ³ sesiÃ³n el 2023-10-10 06:22:29','entrar','2023-10-10','Jesus'),(162,'El usuario Jesus cerrÃ³ sesiÃ³n el 2023-10-10 06:22:44','salir','2023-10-10','Jesus'),(163,'El usuario Jesus iniciÃ³ sesiÃ³n el 2023-10-10 06:22:55','entrar','2023-10-10','Jesus'),(164,'El usuario Jesus cerrÃ³ sesiÃ³n el 2023-10-10 06:24:19','salir','2023-10-10','Jesus'),(165,'El usuario alan iniciÃ³ sesiÃ³n el 2023-10-10 06:24:41','entrar','2023-10-10','alan'),(166,'El usuario alan cerrÃ³ sesiÃ³n el 2023-10-10 06:24:50','salir','2023-10-10','alan'),(167,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-10 06:26:12','entrar','2023-10-10','admin1'),(168,'El usuario admin1 aÃ±adiÃ³ al usuario pedro con la contraseÃ±a *1234* y el cargo: Usuario. satisfactoriamente','insertar','2023-10-10','admin1'),(169,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-10 06:26:29','salir','2023-10-10','admin1'),(170,'El usuario pedro iniciÃ³ sesiÃ³n el 2023-10-10 06:27:55','entrar','2023-10-10','pedro'),(171,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-10 04:21:37','entrar','2023-10-10','admin1'),(172,'El usuario admin1 aÃ±adiÃ³ a la mascota Blanco del dueÃ±o Johel portador de la cÃ©dula 28023816 con el indice 12 en el Ã¡rea de mascotas satisfactoriamente','insertar','2023-10-11','admin1'),(173,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-11 07:09:17','entrar','2023-10-11','admin1'),(174,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-11 08:58:48','entrar','2023-10-11','admin1'),(175,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-11 08:59:51','entrar','2023-10-11','admin1'),(176,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-11 09:05:44','entrar','2023-10-11','admin1'),(177,'El usuario admin1 aÃ±adiÃ³ a la mascota Dakota del dueÃ±o  portador de la cÃ©dula  con el indice 09 en el Ã¡rea de mascotas satisfactoriamente','insertar','2023-10-11','admin1'),(178,'El usuario admin1 aÃ±adiÃ³ a la mascota roger jr del dueÃ±o Roger portador de la cÃ©dula 9889878 con el indice 07 en el Ã¡rea de mascotas satisfactoriamente','insertar','2023-10-11','admin1'),(179,'El usuario admin1 aÃ±adiÃ³ a la mascota roger jr del dueÃ±o Roger portador de la cÃ©dula 9889878 con el indice 5 en el Ã¡rea de mascotas satisfactoriamente','insertar','2023-10-11','admin1'),(180,'El usuario admin1 aÃ±adiÃ³ la consulta del cliente Roger portador de la cÃ©dula 9889878 y su mascota roger jr en el Ã¡rea de mascotas *perruquerÃ­a* satisfactoriamente. Los servicios aplicados a la mascota son los siguientes:  Un servicio de corte con un costo de 2$, Haciendo un total de 2$','insertar','2023-10-11','admin1'),(181,'El usuario admin1 aÃ±adiÃ³ la consulta del cliente Johel portador de la cÃ©dula 28023816 y su mascota Blanco en el Ã¡rea de mascotas *perruquerÃ­a* satisfactoriamente. Los servicios aplicados a la mascota son los siguientes:  Un servicio de corte 7f con un costo de 6$, Haciendo un total de 6$','insertar','2023-10-11','admin1'),(182,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-11 09:37:13','entrar','2023-10-11','admin1'),(183,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-11 09:48:25','entrar','2023-10-11','admin1'),(184,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-11 09:49:28','salir','2023-10-11','admin1'),(185,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-11 09:50:27','entrar','2023-10-11','admin1'),(186,'El usuario admin1 aÃ±adiÃ³ la consulta del cliente Roger portador de la cÃ©dula 9889878 y su mascota Manchas en el Ã¡rea de mascotas *perruquerÃ­a* satisfactoriamente. Los servicios aplicados a la mascota son los siguientes:  Un servicio de iakjhgjg con un costo de 25$, Haciendo un total de 25$','insertar','2023-10-11','admin1'),(187,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-12 04:13:52','entrar','2023-10-12','admin1'),(188,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-12 04:46:04','entrar','2023-10-12','admin1'),(189,'El usuario admin1 actualizÃ³ la informaciÃ³n de la mascota del dueÃ±o Roger Arenas portador de la cÃ©dula 9889878; anteriormente llamado *Manchas de raza Dalmata  y observaciones: ninguna* a *Manchas con la id 4, de raza: Dalmata y observaciones: ninguna* en la secciÃ³n *PerruquerÃ­a* Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-12','admin1'),(190,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-12 10:51:52','salir','2023-10-12','admin1'),(191,'La cuenta del usuario *admin1* ha sido bloqueada por exceso de intentos, fecha :2023-10-12 22:52:19','entrar','2023-10-12','admin1'),(192,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-12 10:53:11','entrar','2023-10-12','admin1'),(193,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-13 08:31:33','salir','2023-10-13','admin1'),(194,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-13 08:57:29','entrar','2023-10-13','admin1'),(195,'El usuario admin1 realizÃ³ una constancia de adopciÃ³n entre el anterior dueÃ±o Roger Arenas portador de la cÃ©dula: 9889878, adopta el cliente  portadorde la cÃ©dula: <br />\r\n<b>Notice</b>:  Undefined index: id_perro in <b>C:xampp32htdocsinversionesClienteSelect.php</b> on line <b>34</b><br />\r\n. La mascota a adoptar es Manchas de tipo Perro y raza Dalmata en el area de mascotas satisfactoriamente','actualizar','2023-10-14','admin1'),(196,'El usuario admin1 realizÃ³ una constancia de adopciÃ³n entre el anterior dueÃ±o Roger Arenas portador de la cÃ©dula: 9889878, adopta el cliente  portadorde la cÃ©dula: <br />\r\n<b>Notice</b>:  Undefined index: id_perro in <b>C:xampp32htdocsinversionesClienteSelect.php</b> on line <b>34</b><br />\r\n. La mascota a adoptar es Manchas de tipo Perro y raza Dalmata en el area de mascotas satisfactoriamente','actualizar','2023-10-14','admin1'),(197,'El usuario admin1 realizÃ³ una constancia de adopciÃ³n entre el anterior dueÃ±o Roger Arenas portador de la cÃ©dula: 9889878, adopta el cliente Johel Mujica portadorde la cÃ©dula: 28023816. La mascota a adoptar es Manchas de tipo Perro y raza Dalmata en el area de mascotas satisfactoriamente','actualizar','2023-10-14','admin1'),(198,'El usuario admin1 aÃ±adiÃ³ al usuario fabian con la contraseÃ±a *1234* y el cargo: administrador. satisfactoriamente','insertar','2023-10-14','admin1'),(199,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 1, cuales datos eran: *admin1 , contraseÃ±a: admin1 y cargo: Administrador* a *admin1 , contraseÃ±a: 1234 y cargo Administrador* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-14','admin1'),(200,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 3, cuales datos eran: *usu1 , contraseÃ±a: usuario y cargo: Secretario* a *usu1 , contraseÃ±a: 1234 y cargo Secretario* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-14','admin1'),(201,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 1, cuales datos eran: *admin1 , contraseÃ±a: $2y$10$96v/Qa8LkXPQtyCcBmlRk.x5z3BmlxEUg1h8DpmZyeNGN0CDZZhQK y cargo: Administrador* a *admin1 , contraseÃ±a: 1234 y cargo Administrador* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-14','admin1'),(202,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 3, cuales datos eran: *usu1 , contraseÃ±a: $2y$10$izpw.zhj3J4uxBFki0Q5l.XH/Jf8kQPYYM85t7qEldLbR0SCz0nme y cargo: Secretario* a *usu1 , contraseÃ±a: 1234 y cargo Secretario* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-14','admin1'),(203,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 1, cuales datos eran: *admin1 , contraseÃ±a: $2y$10$u8Q6hzt4./mvZqXoV5/B.OPq8/LNcA/acCjmiD45v2bOdnAjUZONa y cargo: Administrador* a *admin1 , contraseÃ±a: 1234 y cargo Administrador* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-14','admin1'),(204,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-14 10:12:08','salir','2023-10-14','admin1'),(205,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-14 10:13:01','salir','2023-10-14','admin1'),(206,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-14 10:13:22','entrar','2023-10-14','admin1'),(207,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-14 10:13:28','salir','2023-10-14','admin1'),(208,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-14 10:13:37','entrar','2023-10-14','admin1'),(209,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-14 10:13:40','salir','2023-10-14','admin1'),(210,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-14 10:13:57','entrar','2023-10-14','admin1'),(211,'El usuario admin1 actualizÃ³ su informaciÃ³n del usuario, cuales datos eran: *admin1 , contraseÃ±a: $2y$10$6HuywuhPtCYkZQw3/76kNeWm4nIIEfcDmXaYNLxSYLuyYoZUabrly* a *admin1 , contraseÃ±a: hola* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-14','admin1'),(212,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-14 12:43:52','salir','2023-10-14','admin1'),(213,'La cuenta del usuario *admin1* ha sido bloqueada por exceso de intentos, fecha :2023-10-14 12:44:48','entrar','2023-10-14','admin1'),(214,'La cuenta del usuario *admin1* ha sido bloqueada por exceso de intentos, fecha :2023-10-14 12:45:52','entrar','2023-10-14','admin1'),(215,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-14 12:46:35','entrar','2023-10-14','admin1'),(216,'El usuario admin1 actualizÃ³ su informaciÃ³n del usuario, cuales datos eran: *admin1 , contraseÃ±a: $2y$10$qP3txQtpWznOL3GlxRYgIeTJWL3zDNfBWQhaacmp1ofqj6WFnraGi* a *admin1 , contraseÃ±a: sala* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-14','admin1'),(217,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-14 12:46:52','salir','2023-10-14','admin1'),(218,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-14 12:46:59','entrar','2023-10-14','admin1'),(219,'El usuario admin1 actualizÃ³ su informaciÃ³n del usuario, cuales datos eran: *admin1 , contraseÃ±a: $2y$10$75yt3sfaVpq9ccp10wq2lOi.I3s9zvMWovlWUtmHmo886XYWYXG4i* a *admin1 , contraseÃ±a: 1234* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-14','admin1'),(220,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-15 12:17:09','entrar','2023-10-15','admin1'),(221,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-16 06:45:53','entrar','2023-10-16','admin1'),(222,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-16 01:38:30','entrar','2023-10-16','admin1'),(223,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-16 01:50:08','salir','2023-10-16','admin1'),(224,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-16 01:52:43','entrar','2023-10-16','admin1'),(225,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-16 06:47:06','entrar','2023-10-16','admin1'),(226,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-16 07:19:48','salir','2023-10-16','admin1'),(227,'El usuario fabian iniciÃ³ sesiÃ³n el 2023-10-16 07:20:12','entrar','2023-10-16','fabian'),(228,'El usuario fabian cerrÃ³ sesiÃ³n el 2023-10-16 07:21:54','salir','2023-10-16','fabian'),(229,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-16 07:22:40','entrar','2023-10-16','admin1'),(230,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-16 07:23:32','salir','2023-10-16','admin1'),(231,'El usuario fabian iniciÃ³ sesiÃ³n el 2023-10-16 07:23:43','entrar','2023-10-16','fabian'),(232,'El usuario fabian cerrÃ³ sesiÃ³n el 2023-10-16 07:24:35','salir','2023-10-16','fabian'),(233,'La cuenta del usuario *fabian* ha sido bloqueada por exceso de intentos, fecha :2023-10-16 19:25:23','entrar','2023-10-16','fabian'),(234,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-18 12:24:13','entrar','2023-10-18','admin1'),(235,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-18 10:21:43','entrar','2023-10-18','admin1'),(236,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-18 10:32:46','entrar','2023-10-18','admin1'),(237,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-18 10:33:09','entrar','2023-10-18','admin1'),(238,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-19 06:31:24','entrar','2023-10-19','admin1'),(239,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-20 12:46:34','salir','2023-10-20','admin1');
/*!40000 ALTER TABLE `auditoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auditoria_dos`
--

DROP TABLE IF EXISTS `auditoria_dos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auditoria_dos` (
  `id_dos` int(20) NOT NULL AUTO_INCREMENT,
  `descripcion_dos` varchar(300) NOT NULL,
  `evento_dos` varchar(20) NOT NULL,
  `datetime_dos` date NOT NULL,
  `user_res_dos` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dos`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditoria_dos`
--

LOCK TABLES `auditoria_dos` WRITE;
/*!40000 ALTER TABLE `auditoria_dos` DISABLE KEYS */;
INSERT INTO `auditoria_dos` VALUES (1,'El usuario  eliminÃ³ la categoria ropa en el Ã¡rea de productos satisfactoriamente','eliminar','2023-09-30',''),(2,'El usuario  eliminÃ³ la categoria ropa en el Ã¡rea de productos satisfactoriamente','eliminar','2023-09-30',''),(3,'El usuario admin1 eliminÃ³ la categoria ropa en el Ã¡rea de productos satisfactoriamente','eliminar','2023-09-30','admin1'),(4,'El usuario admin1 aÃ±adiÃ³ la categoria  en el Ã¡rea de productos satisfactoriamente','insertar','2023-09-30','admin1'),(5,'El usuario admin1 aÃ±adiÃ³ la categoria  en el Ã¡rea de productos satisfactoriamente','insertar','2023-09-30','admin1'),(6,'El usuario admin1 eliminÃ³ la categoria ropa en el Ã¡rea de productos satisfactoriamente','eliminar','2023-09-30','admin1'),(7,'El usuario admin1 aÃ±adiÃ³ la categoria  en el Ã¡rea de productos satisfactoriamente','insertar','2023-09-30','admin1'),(8,'El usuario admin1 aÃ±adiÃ³ la categoria juguetes en el Ã¡rea de productos satisfactoriamente','insertar','2023-09-30','admin1'),(9,'El usuario admin1 eliminÃ³ la categoria juguetes en el Ã¡rea de productos satisfactoriamente','eliminar','2023-09-30','admin1'),(10,'El usuario admin1 aÃ±adiÃ³ la categoria *juguetes* en el Ã¡rea de productos satisfactoriamente','insertar','2023-09-30','admin1'),(11,'El usuario admin1 aÃ±adiÃ³ al proveedor Helados PP con la id: 107013403, con el nÃºmero de telefono 04140544532 en el Ã¡rea de proveedores secciÃ³n *Tienda* satisfactoriamente','124','2023-09-30','admin1'),(12,'El usuario admin1 aÃ±adiÃ³ al proveedor Amir CA con la id: 107013404, con el nÃºmero de telefono 04149879872 en el Ã¡rea de proveedores secciÃ³n *Tienda* satisfactoriamente','124','2023-09-30','admin1'),(13,'El usuario admin1 aÃ±adiÃ³ al proveedor Conos CA con la id: 107013405, con el nÃºmero de telefono 04249788910 en el Ã¡rea de proveedores secciÃ³n *Tienda* satisfactoriamente','124','2023-09-30','admin1'),(14,'El usuario admin1 aÃ±adiÃ³ al proveedor Distribuidora Almicar CA con la id: 107013409, con el nÃºmero de telefono 04147898919 en el Ã¡rea de proveedores secciÃ³n *Tienda* satisfactoriamente','124','2023-09-30','admin1'),(15,'El usuario admin1 eliminÃ³ al proveedor   con la cÃ©dula: 107013405, y el nÃºmero de telefono  en el Ã¡rea de Clientes, secciÃ³n *Tienda* satisfactoriamente','124','2023-09-30','admin1'),(16,'El usuario admin1 aÃ±adiÃ³ al proveedor Amir CA con la id: 107013404, con el nÃºmero de telefono 04142989010 en el Ã¡rea de proveedores secciÃ³n *Tienda* satisfactoriamente','124','2023-09-30','admin1'),(17,'El usuario admin1 aÃ±adiÃ³ la categoria *Comida* en el Ã¡rea de productos satisfactoriamente','insertar','2023-09-30','admin1'),(18,'El usuario admin1 aÃ±adiÃ³ el producto Comida en lata con el cÃ³digo: 001, con el precio de venta 100 la existencia: 10y en la categoria de 1, en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-09-30','admin1'),(19,'El usuario admin1 aÃ±adiÃ³ al proveedor INVERSIONES MANUEL CA con la id: 98987898, con el nÃºmero de telefono 04148910902 en el Ã¡rea de proveedores secciÃ³n *Tienda* satisfactoriamente','124','2023-09-30','admin1'),(20,'El usuario admin1 aÃ±adiÃ³ el producto Comida para gatos con el cÃ³digo: 004, con el precio de venta 15 la existencia: 10y en la categoria de 1, en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-09-30','admin1'),(21,'El usuario admin1 aÃ±adiÃ³ al cliente Paul Garcia con la cÃ©dula 18782898, con el nÃºmero de telefono 04149892782 en el Ã¡rea de clientes secciÃ³n \'Tienda\' satisfactoriamente','insertar','2023-09-30','admin1'),(22,'El usuario admin1 aÃ±adiÃ³ el producto Comida grande con el cÃ³digo: 023, con el precio de venta 100 la existencia: 10y en la categoria de 1, en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-01','admin1'),(23,'El usuario admin1 aÃ±adiÃ³ la categoria *Otros* en el Ã¡rea de productos satisfactoriamente','insertar','2023-10-02','admin1'),(24,'El usuario admin1 aÃ±adiÃ³ el producto Juguete de perro con el cÃ³digo: 056, con el precio de venta 120 la existencia: 1y en la categoria de 2, en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-02','admin1'),(25,'El usuario admin1 eliminÃ³ el producto Juguete de perro con el codigo 056, el precio de venta de 120 y tenÃ­a una existencia de: 1 en el Ã¡rea de Productos, secciÃ³n *Tienda* satisfactoriamente','124','2023-10-02','admin1'),(26,'El usuario admin1 aÃ±adiÃ³ el producto Juguete para perros con el cÃ³digo: 056, con el precio de venta 120 la existencia: 0y en la categoria de 2, en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-02','admin1'),(27,'El usuario admin1 actualizÃ³ la informaciÃ³n del producto Juguete para perros con el codigo:056 precio de venta: 120 y existencia:70 a *\r\nJuguete para gatos con el codigo: 056, el precio de venta 120 y existencia de: 70* en el Ã¡rea de productos, secciÃ³n *Tienda* satisfactoriamente','actualizar','2023-10-03','admin1'),(28,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 2 unidad o unidades de Comida para gatos en el area de Ventas, secciÃ³n Tienda satisfactoriamente.','insertar','2023-10-03',''),(29,'El usuario admin1 aÃ±adiÃ³ el producto Taza de comida med con el cÃ³digo: 097, con el precio de venta 10 la existencia: 10, en la categoria de 2,suministrado por el proveedor J-98987898 INVERSIONES MANUEL CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-03','admin1'),(30,'El usuario admin1 aÃ±adiÃ³ el producto Galleta para perros con el cÃ³digo: 076, con el precio de venta 15 la existencia: 10, en la categoria de Comida,suministrado por el proveedor J-98987898 INVERSIONES MANUEL CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-03','admin1'),(31,'El usuario admin1 actualizÃ³ la informaciÃ³n de compra del proveedor de INVERSIONES MANUEL CA , cÃ©dula 98987898. La compra consiste en:  10 unidades de Comida grande, cÃ³digo 023,  y un total de 100, en el Ã¡rea de Compras secciÃ³n \'Tienda\' satisfactoriamente','124','2023-10-03','admin1'),(32,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 8 unidad o unidades de Comida para gatos en el area de Ventas, secciÃ³n Tienda satisfactoriamente.','insertar','2023-10-03',''),(33,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 1 unidad o unidades de Comida en lata en el area de Ventas, secciÃ³n Tienda satisfactoriamente.','insertar','2023-10-03',''),(34,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 2 unidad o unidades de Comida para gatos en el area de Ventas, secciÃ³n Tienda satisfactoriamente.','insertar','2023-10-03',''),(35,'El usuario  ha reembolsado la venta del cliente Paul Garcia, portador de la cedula 18782898. El reembolso consiste en 2 unidad o unidades de Comida para gatos en el area de Ventas, secciÃ³n Tienda satisfactoriamente.','insertar','2023-10-04',''),(36,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 2 unidad o unidades de Comida para gatos en el area de Ventas, secciÃ³n Tienda satisfactoriamente.','insertar','2023-10-04',''),(37,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 3 unidad o unidades de Comida en lata en el area de Ventas, secciÃ³n Tienda satisfactoriamente. Se han reembolsado todos los productos de la venta por lo que se ha borrado el registro','insertar','2023-10-04',''),(38,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 1 unidad o unidades de Comida en lata en el area de Ventas, secciÃ³n Tienda satisfactoriamente. Se han reembolsado todos los productos de la venta por lo que se ha borrado el registro','insertar','2023-10-04',''),(39,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 1 unidad o unidades de Comida en lata en el area de Ventas, secciÃ³n Tienda satisfactoriamente.','insertar','2023-10-04',''),(40,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 4 unidad o unidades de Comida en lata en el area de Ventas, secciÃ³n Tienda satisfactoriamente. Se han reembolsado todos los productos de la venta por lo que se ha borrado el registro','insertar','2023-10-04',''),(41,'El usuario admin1 aÃ±adiÃ³ el producto ropa de perro peq con el cÃ³digo: 093, con el precio de venta 15 la existencia: 2, en la categoria de Otros, suministrado por el proveedor J-98987898 INVERSIONES MANUEL CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-04','admin1'),(42,'El usuario admin1 eliminÃ³ al proveedor INVERSIONES MANUEL CA  con la cÃ©dula: 98987898, y el nÃºmero de telefono 04148910902 en el Ã¡rea de Clientes, secciÃ³n *Tienda* satisfactoriamente','eliminar','2023-10-04','admin1'),(43,'El usuario usu1 aÃ±adiÃ³ la categoria *Comida* en el Ã¡rea de productos satisfactoriamente','insertar','2023-10-07','usu1'),(44,'El usuario usu1 aÃ±adiÃ³ el producto Comida para perros con el cÃ³digo: 088, con el precio de venta 10 en la categoria de Comida, suministrado por el proveedor J-107013404 Amir CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-07','usu1'),(45,'El usuario admin1 aÃ±adiÃ³ el producto comida con el cÃ³digo: 088, con el precio de venta 20 en la categoria de , suministrado por el proveedor J-107013404 Amir CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-07','admin1'),(46,'El usuario admin1 aÃ±adiÃ³ el producto comida canina con el cÃ³digo: 099, con el precio de venta 20 en la categoria de Comida, suministrado por el proveedor J-107013404 Amir CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-07','admin1'),(47,'El usuario admin1 aÃ±adiÃ³ el producto comida en lata con el cÃ³digo: 054, con el precio de venta 5 en la categoria de Comida, suministrado por el proveedor J-107013404 Amir CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-07','admin1'),(48,'El usuario admin1 aÃ±adiÃ³ el producto comida con el cÃ³digo: 848, con el precio de venta 49 en la categoria de Comida, suministrado por el proveedor J-107013404 Amir CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-07','admin1'),(49,'El usuario admin1 aÃ±adiÃ³ el producto comida en lata con el cÃ³digo: 343, con el precio de venta 10 en la categoria de Comida, con el stock minimo de 5 y el stock maximo de 50, suministrado por el proveedor J-107013404 Amir CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-07','admin1'),(50,'El usuario admin1 aÃ±adiÃ³ el producto comida para gatos con el cÃ³digo: 878, con el precio de venta 22 en la categoria de Comida, con el stock minimo de 4 y el stock maximo de 40, suministrado por el proveedor J-107013404 Amir CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-07','admin1'),(51,'El usuario admin1 aÃ±adiÃ³ el producto comida con el cÃ³digo: 874, con el precio de venta 3 en la categoria de Comida, con el stock minimo de 3 y el stock maximo de 30, suministrado por el proveedor J-107013404 Amir CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-07','admin1'),(52,'El usuario admin1 aÃ±adiÃ³ el producto comida en lata con el cÃ³digo: 001, con el precio de venta 20 en la categoria de Comida, con el stock minimo de 5 y el stock maximo de 50, suministrado por el proveedor J-98987898 INVERSIONES MANUEL CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamen','insertar','2023-10-07','admin1'),(53,'El usuario admin1 aÃ±adiÃ³ el producto galletas para perros con el cÃ³digo: 002, con el precio de venta 10 en la categoria de Comida, con el stock minimo de 5 y el stock maximo de 50, suministrado por el proveedor J-107013404 Amir CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-07','admin1'),(54,'El usuario admin1 actualizÃ³ la informaciÃ³n del producto comida en lata con el codigo:001 precio de venta: 20 y existencia:55 a *\r\ncomida en lata con el codigo: 001, el precio de venta 20 y existencia de: 55* en el Ã¡rea de productos, secciÃ³n *Tienda* satisfactoriamente','actualizar','2023-10-07','admin1'),(55,'El usuario admin1 actualizÃ³ la informaciÃ³n del producto comida en lata con el codigo:001 precio de venta: 20 y existencia:55 a *\r\ncomida en lata con el codigo: 001, el precio de venta 20 y existencia de: 55* en el Ã¡rea de productos, secciÃ³n *Tienda* satisfactoriamente','actualizar','2023-10-07','admin1'),(56,'El usuario admin1 aÃ±adiÃ³ el producto Comedero de mascota con el cÃ³digo: 009, con el precio de venta 15 en la categoria de Comida, con el stock minimo de 5 y el stock maximo de 15, suministrado por el proveedor J-98987898 INVERSIONES MANUEL CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactor','insertar','2023-10-07','admin1'),(57,'El usuario admin1 actualizÃ³ la informaciÃ³n de compra del proveedor de INVERSIONES MANUEL CA , cÃ©dula 98987898. La compra consiste en:  15 unidades de Comedero de mascota, cÃ³digo 009,  y un total de 75$, en el Ã¡rea de Compras secciÃ³n \'Tienda\' satisfactoriamente','actualizar','2023-10-08','admin1'),(58,'El usuario admin1 aÃ±adiÃ³ el producto ihjh con el cÃ³digo: ytr, con el precio de venta 0 en la categoria de Comida, con el stock minimo de 0 y el stock maximo de 0, suministrado por el proveedor J-98987898 INVERSIONES MANUEL CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-10','admin1'),(59,'El usuario admin1 eliminÃ³ el producto ihjh con el codigo ytr, el precio de venta de 0 y tenÃ­a una existencia de: 0 en el Ã¡rea de Productos, secciÃ³n *Tienda* satisfactoriamente','eliminar','2023-10-10','admin1'),(60,'El usuario admin1 eliminÃ³ el producto ihjh con el codigo ytr, el precio de venta de 0 y tenÃ­a una existencia de: 0 en el Ã¡rea de Productos, secciÃ³n *Tienda* satisfactoriamente','eliminar','2023-10-10','admin1'),(61,'El usuario admin1 eliminÃ³ el producto ihjh con el codigo ytr, el precio de venta de 0 y tenÃ­a una existencia de: 0 en el Ã¡rea de Productos, secciÃ³n *Tienda* satisfactoriamente','eliminar','2023-10-10','admin1'),(62,'El usuario admin1 registrÃ³ la compra al proveedor INVERSIONES MANUEL CA , cÃ©dula 98987898. La compra consiste en:  20 unidades de galletas para perros, cÃ³digo 002,  y un total de 800, en el Ã¡rea de Compras secciÃ³n \'Tienda\' satisfactoriamente','insertar','2023-10-10','admin1'),(63,'El usuario admin1 actualizÃ³ la informaciÃ³n del producto comida en lata con el codigo:001 precio de venta: 20 y existencia:75 a *\r\ncomida en lata con el codigo: 022, el precio de venta 20 y existencia de: 75* en el Ã¡rea de productos, secciÃ³n *Tienda* satisfactoriamente','actualizar','2023-10-12','admin1'),(64,'El usuario admin1 eliminÃ³ el producto ihjh con el codigo ytr, el precio de venta de 0 y tenÃ­a una existencia de: 0 en el Ã¡rea de Productos, secciÃ³n *Tienda* satisfactoriamente','eliminar','2023-10-12','admin1'),(65,'El usuario admin1 aÃ±adiÃ³ el producto Comida para gato con el cÃ³digo: 034, con el precio de venta 10 en la categoria de Comida, con el stock minimo de 5 y el stock maximo de 15, suministrado por el proveedor J-98987898 INVERSIONES MANUEL CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriam','insertar','2023-10-12','admin1'),(66,'El usuario admin1 actualizÃ³ la informaciÃ³n del producto Comida para gato con el codigo:034 precio de venta: 10 y existencia:0 a *\r\nComida para gato con el codigo: 034, el precio de venta 10 y existencia de: 0* en el Ã¡rea de productos, secciÃ³n *Tienda* satisfactoriamente','actualizar','2023-10-12','admin1'),(67,'El usuario admin1 actualizÃ³ la informaciÃ³n del producto Comida para gato con el codigo:034 precio de venta: 10 y existencia:0 a *\r\nComida para gato con el codigo: 032, el precio de venta 10 y existencia de: 0* en el Ã¡rea de productos, secciÃ³n *Tienda* satisfactoriamente','actualizar','2023-10-12','admin1'),(68,'El usuario admin1 actualizÃ³ la informaciÃ³n del producto Comida para gato con el codigo:032 precio de venta: 10 y existencia:0 a *\r\nComida para gato con el codigo: 031, el precio de venta 10 y existencia de: 0* en el Ã¡rea de productos, secciÃ³n *Tienda* satisfactoriamente','actualizar','2023-10-12','admin1'),(69,'El usuario admin1 aÃ±adiÃ³ la categoria *higiene perro* en el Ã¡rea de productos satisfactoriamente','insertar','2023-10-12','admin1'),(70,'El usuario admin1 actualizÃ³ la informaciÃ³n del producto comida en lata con el codigo:022 precio de venta: 20 y existencia:75 a *\r\ncomida en lata con el codigo: 022, el precio de venta 20 y existencia de: * en el Ã¡rea de productos, secciÃ³n *Tienda* satisfactoriamente','actualizar','2023-10-12','admin1'),(71,'El usuario admin1 aÃ±adiÃ³ el producto Shampoo para perros con el cÃ³digo: 721PDE, con el precio de venta 10 en la categoria de higiene perro, con el stock minimo de 5 y el stock maximo de 20, suministrado por el proveedor J-98987898 INVERSIONES MANUEL CA en el Ã¡rea de productos secciÃ³n *Tienda* s','insertar','2023-10-12','admin1'),(72,'El usuario admin1 actualizÃ³ la informaciÃ³n del producto Shampoo para perros con el codigo:721PDE precio de venta: 10 y existencia:0 a *\r\nShampoo para perros con el codigo: 556OPT, el precio de venta 10 y existencia de: * en el Ã¡rea de productos, secciÃ³n *Tienda* satisfactoriamente','actualizar','2023-10-12','admin1'),(73,'El usuario admin1 eliminÃ³ el producto Shampoo para perros con el codigo 556OPT, el precio de venta de 10 y tenÃ­a una existencia de: 0 en el Ã¡rea de Productos, secciÃ³n *Tienda* satisfactoriamente','eliminar','2023-10-12','admin1'),(74,'El usuario admin1 registrÃ³ la compra al proveedor INVERSIONES MANUEL CA , cÃ©dula 98987898. La compra consiste en:  2 unidades de galletas para perros, cÃ³digo 002,  4 unidades de Comida para gato, cÃ³digo 031,  y un total de 32, en el Ã¡rea de Compras secciÃ³n \'Tienda\' satisfactoriamente','insertar','2023-10-12','admin1'),(75,'El usuario admin1 actualizÃ³ la informaciÃ³n del producto comida en lata con el codigo:022 precio de venta: 20 y existencia:74 a *\r\ncomida en lata con el codigo: 022, el precio de venta 20 y existencia de: * en el Ã¡rea de productos, secciÃ³n *Tienda* satisfactoriamente','actualizar','2023-10-13','admin1'),(76,'El usuario admin1 registrÃ³ la compra al proveedor INVERSIONES MANUEL CA , cÃ©dula 98987898. La compra consiste en:  3 unidades de Comida para gato, cÃ³digo 031,  y un total de 18, en el Ã¡rea de Compras secciÃ³n \'Tienda\' satisfactoriamente','insertar','2023-10-15','admin1'),(77,'El usuario admin1 registrÃ³ la compra al proveedor INVERSIONES MANUEL CA , cÃ©dula 98987898. La compra consiste en:  1 unidades de Comedero de mascota, cÃ³digo 009,  y un total de 2, en el Ã¡rea de Compras secciÃ³n \'Tienda\' satisfactoriamente','insertar','2023-10-15','admin1'),(78,'El usuario admin1 registrÃ³ la compra al proveedor INVERSIONES MANUEL CA , cÃ©dula 98987898. La compra consiste en:  5 unidades de Comedero de mascota, cÃ³digo 009,  y un total de 50, en el Ã¡rea de Compras secciÃ³n \'Tienda\' satisfactoriamente','insertar','2023-10-15','admin1'),(79,'El usuario admin1 registrÃ³ la compra al proveedor INVERSIONES MANUEL CA , cÃ©dula 98987898. La compra consiste en:  1 unidades de Comedero de mascota, cÃ³digo 009,  1 unidades de Comida para gato, cÃ³digo 031,  y un total de 4, en el Ã¡rea de Compras secciÃ³n \'Tienda\' satisfactoriamente','insertar','2023-10-15','admin1'),(80,'El usuario admin1 registrÃ³ la compra al proveedor INVERSIONES MANUEL CA , cÃ©dula 98987898. La compra consiste en:  1 unidades de Comedero de mascota, cÃ³digo 009,  y un total de 2, en el Ã¡rea de Compras secciÃ³n \'Tienda\' satisfactoriamente','insertar','2023-10-15','admin1'),(81,'El usuario admin1 registrÃ³ la compra al proveedor INVERSIONES MANUEL CA , cÃ©dula 98987898. La compra consiste en:  5 unidades de Comedero de mascota, cÃ³digo 009,  y un total de 50, en el Ã¡rea de Compras secciÃ³n \'Tienda\' satisfactoriamente','insertar','2023-10-15','admin1'),(82,'El usuario admin1 registrÃ³ la compra al proveedor INVERSIONES MANUEL CA , cÃ©dula 98987898. La compra consiste en:  5 unidades de Comedero de mascota, cÃ³digo 009,  y un total de 50, en el Ã¡rea de Compras secciÃ³n \'Tienda\' satisfactoriamente','insertar','2023-10-15','admin1'),(83,'El usuario admin1 actualizÃ³ la informaciÃ³n de compra del proveedor de INVERSIONES MANUEL CA , cÃ©dula 98987898. La compra consiste en:  6 unidades de Comedero de mascota, cÃ³digo 009,  y un total de 46$, en el Ã¡rea de Compras secciÃ³n \'Tienda\' satisfactoriamente','actualizar','2023-10-15','admin1'),(84,'El usuario admin1 actualizÃ³ la informaciÃ³n de compra del proveedor de INVERSIONES MANUEL CA , cÃ©dula 98987898. La compra consiste en:  20 unidades de Comedero de mascota, cÃ³digo 009,  y un total de 100$, en el Ã¡rea de Compras secciÃ³n \'Tienda\' satisfactoriamente','actualizar','2023-10-16','admin1'),(85,'El usuario admin1 actualizÃ³ la informaciÃ³n de compra del proveedor de INVERSIONES MANUEL CA , cÃ©dula 98987898. La compra consiste en:  25 unidades de Comedero de mascota, cÃ³digo 009,  y un total de 125$, en el Ã¡rea de Compras secciÃ³n \'Tienda\' satisfactoriamente','actualizar','2023-10-16','admin1'),(86,'El usuario admin1 actualizÃ³ la informaciÃ³n de compra del proveedor de INVERSIONES MANUEL CA , cÃ©dula 98987898. La compra consiste en:  30 unidades de Comedero de mascota, cÃ³digo 009,  y un total de 150$, en el Ã¡rea de Compras secciÃ³n \'Tienda\' satisfactoriamente','actualizar','2023-10-16','admin1'),(87,'El usuario admin1 actualizÃ³ la informaciÃ³n de compra del proveedor de INVERSIONES MANUEL CA , cÃ©dula 98987898. La compra consiste en:  60 unidades de Comedero de mascota, cÃ³digo 009,  y un total de 300$, en el Ã¡rea de Compras secciÃ³n \'Tienda\' satisfactoriamente','actualizar','2023-10-16','admin1'),(88,'El usuario admin1 actualizÃ³ la informaciÃ³n de compra del proveedor de INVERSIONES MANUEL CA , cÃ©dula 98987898. La compra consiste en:  65 unidades de Comedero de mascota, cÃ³digo 009,  y un total de 325$, en el Ã¡rea de Compras secciÃ³n \'Tienda\' satisfactoriamente','actualizar','2023-10-16','admin1'),(89,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 10 unidad o unidades de galletas para perros en el area de Ventas, secciÃ³n Tienda satisfactoriamente.','insertar','2023-10-16',''),(90,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 10 unidad o unidades de galletas para perros en el area de Ventas, secciÃ³n Tienda satisfactoriamente.','insertar','2023-10-16',''),(91,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 5 unidad o unidades de comida en lata en el area de Ventas, secciÃ³n Tienda satisfactoriamente.','insertar','2023-10-16',''),(92,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 5 unidad o unidades de galletas para perros en el area de Ventas, secciÃ³n Tienda satisfactoriamente.','insertar','2023-10-16',''),(93,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 5 unidad o unidades de galletas para perros en el area de Ventas, secciÃ³n Tienda satisfactoriamente.','insertar','2023-10-16',''),(94,'El usuario admin1 aÃ±adiÃ³ la categoria ** en el Ã¡rea de productos satisfactoriamente','insertar','2023-10-18','admin1'),(95,'El usuario admin1 aÃ±adiÃ³ la categoria ** en el Ã¡rea de productos satisfactoriamente','insertar','2023-10-18','admin1'),(96,'El usuario admin1 aÃ±adiÃ³ la categoria ** en el Ã¡rea de productos satisfactoriamente','insertar','2023-10-18','admin1'),(97,'El usuario admin1 aÃ±adiÃ³ la unidad de medida para un producto: *Kilo* en el Ã¡rea de productos satisfactoriamente','insertar','2023-10-18','admin1'),(98,'El usuario admin1 aÃ±adiÃ³ la unidad de medida para un producto: *Unidad* en el Ã¡rea de productos satisfactoriamente','insertar','2023-10-18','admin1'),(99,'El usuario admin1 eliminÃ³ la categoria  en el Ã¡rea de productos satisfactoriamente','eliminar','2023-10-18','admin1'),(100,'El usuario admin1 eliminÃ³ la categoria  en el Ã¡rea de productos satisfactoriamente','eliminar','2023-10-18','admin1'),(101,'El usuario admin1 aÃ±adiÃ³ la unidad de medida para un producto: *Paquete* en el Ã¡rea de productos satisfactoriamente','insertar','2023-10-18','admin1'),(102,'El usuario admin1 aÃ±adiÃ³ el producto Bolsa de comida canina con el cÃ³digo: YTR654, con el precio de venta 20 en la categoria de Comida, con el stock minimo de 5 y el stock maximo de 15, suministrado por el proveedor J-98987898 INVERSIONES MANUEL CA en el Ã¡rea de productos secciÃ³n *Tienda* satis','insertar','2023-10-18','admin1'),(103,'El usuario admin1 actualizÃ³ la informaciÃ³n del producto Bolsa de comida cani con el codigo:YTR654 precio de venta: 20 y existencia:0 a *\r\nBolsa de comida cani con el codigo: YTR654, el precio de venta 20 y existencia de: * en el Ã¡rea de productos, secciÃ³n *Tienda* satisfactoriamente','actualizar','2023-10-18','admin1'),(104,'El usuario admin1 actualizÃ³ la informaciÃ³n del producto Bolsa de comida cani con el codigo:YTR654 precio de venta: 20 y existencia:0 a *\r\nBolsa de comida cani con el codigo: YTR654, el precio de venta 20 y existencia de: * en el Ã¡rea de productos, secciÃ³n *Tienda* satisfactoriamente','actualizar','2023-10-18','admin1');
/*!40000 ALTER TABLE `auditoria_dos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_cat` varchar(15) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Comida'),(2,'higiene perro');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id_cliente` int(55) NOT NULL,
  `nombre_cliente` varchar(99) NOT NULL,
  `apellido_cliente` varchar(20) NOT NULL,
  `telefono_cliente` varchar(19) NOT NULL,
  `c_check` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (9889878,'Roger','Arenas','04149878929',0),(28023816,'Johel','Mujica','04142978910',0);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente_venta`
--

DROP TABLE IF EXISTS `cliente_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente_venta` (
  `id_c` int(11) NOT NULL,
  `nombre_c` varchar(40) NOT NULL,
  `apellido_c` varchar(40) NOT NULL,
  `telefono_c` varchar(40) NOT NULL,
  `c_check` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_c`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente_venta`
--

LOCK TABLES `cliente_venta` WRITE;
/*!40000 ALTER TABLE `cliente_venta` DISABLE KEYS */;
INSERT INTO `cliente_venta` VALUES (9779898,'Jose','Flores','04127876761',0),(18782898,'Paul','Garcia','04149892782',0),(28023817,'Pedro','Parker','04142978910',0);
/*!40000 ALTER TABLE `cliente_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra_alproveedor`
--

DROP TABLE IF EXISTS `compra_alproveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compra_alproveedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proveedor` int(11) NOT NULL,
  `hecho` date NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `proveedor` (`proveedor`),
  CONSTRAINT `compra_alproveedor_ibfk_1` FOREIGN KEY (`proveedor`) REFERENCES `proveedor` (`id_p`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra_alproveedor`
--

LOCK TABLES `compra_alproveedor` WRITE;
/*!40000 ALTER TABLE `compra_alproveedor` DISABLE KEYS */;
INSERT INTO `compra_alproveedor` VALUES (6,98987898,'2023-10-01',100),(7,107013404,'2023-10-01',35),(8,107013404,'2023-10-02',700),(10,98987898,'2023-10-08',325),(11,98987898,'2023-10-08',46),(12,98987898,'2023-10-10',150),(13,107013404,'2023-10-10',500),(14,98987898,'2023-10-10',200),(15,98987898,'2023-10-10',400),(16,98987898,'2023-10-12',16),(17,98987898,'2023-10-15',9),(18,98987898,'2023-10-15',1),(19,98987898,'2023-10-15',25),(20,98987898,'2023-10-15',2),(21,98987898,'2023-10-15',1),(22,98987898,'2023-10-15',25),(23,98987898,'2023-10-15',25);
/*!40000 ALTER TABLE `compra_alproveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consulta`
--

DROP TABLE IF EXISTS `consulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consulta` (
  `id_consulta` int(99) NOT NULL AUTO_INCREMENT,
  `id_dueno` int(20) NOT NULL,
  `id_perro` int(20) NOT NULL,
  `precio` int(7) NOT NULL,
  `fecha` date NOT NULL,
  `observacion` varchar(2000) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_consulta`),
  KEY `id_perro` (`id_perro`),
  KEY `id_dueno` (`id_dueno`),
  CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`id_dueno`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `consulta_ibfk_3` FOREIGN KEY (`id_perro`) REFERENCES `perro` (`id_perro`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consulta`
--

LOCK TABLES `consulta` WRITE;
/*!40000 ALTER TABLE `consulta` DISABLE KEYS */;
INSERT INTO `consulta` VALUES (7,28023816,2,5,'2023-10-01','Si se realizaron observaciones	\r\n'),(9,9889878,4,15,'2023-10-03','se encontraron garrapatas'),(11,9889878,4,57,'2023-10-03','se encontraron manchas bajo la oreja'),(12,9889878,4,4,'2023-10-03','se encontraron garrapatas'),(13,9889878,8,2,'2023-10-11','No se realizaron observaciones'),(14,28023816,5,6,'2023-10-11','No se realizaron observaciones'),(16,9889878,4,25,'2023-10-11','No se realizaron observaciones');
/*!40000 ALTER TABLE `consulta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consulta_detalle`
--

DROP TABLE IF EXISTS `consulta_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consulta_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_con` int(11) NOT NULL,
  `servicio` varchar(50) NOT NULL,
  `subtotal` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_con` (`id_con`),
  CONSTRAINT `consulta_detalle_ibfk_1` FOREIGN KEY (`id_con`) REFERENCES `consulta` (`id_consulta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consulta_detalle`
--

LOCK TABLES `consulta_detalle` WRITE;
/*!40000 ALTER TABLE `consulta_detalle` DISABLE KEYS */;
INSERT INTO `consulta_detalle` VALUES (14,7,'cosas varias',5),(17,9,'corte',5),(18,9,'desparasitacion',10),(19,11,'corte',2),(20,11,'chequeo profundo',55),(21,12,'corte',2),(23,12,'corte 33',2),(24,13,'corte',2),(25,14,'corte 7f',6),(29,16,'iakjhgjg',25);
/*!40000 ALTER TABLE `consulta_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consulta_respaldo`
--

DROP TABLE IF EXISTS `consulta_respaldo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consulta_respaldo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_cliente_cr` int(8) NOT NULL,
  `nombre_cliente_cr` varchar(10) NOT NULL,
  `nombre_perro_cr` varchar(10) NOT NULL,
  `observaciones_cr` varchar(70) NOT NULL,
  `precio_cr` int(10) NOT NULL,
  `date_cr` date NOT NULL,
  `user_res_cr` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cliente_cr` (`id_cliente_cr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consulta_respaldo`
--

LOCK TABLES `consulta_respaldo` WRITE;
/*!40000 ALTER TABLE `consulta_respaldo` DISABLE KEYS */;
/*!40000 ALTER TABLE `consulta_respaldo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_perro`
--

DROP TABLE IF EXISTS `detalle_perro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_perro` (
  `id` int(99) NOT NULL AUTO_INCREMENT,
  `id_dueno` int(8) NOT NULL,
  `id_perro` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_perro` (`id_perro`),
  KEY `id_dueno` (`id_dueno`),
  CONSTRAINT `detalle_perro_ibfk_3` FOREIGN KEY (`id_dueno`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalle_perro_ibfk_4` FOREIGN KEY (`id_perro`) REFERENCES `perro` (`id_perro`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_perro`
--

LOCK TABLES `detalle_perro` WRITE;
/*!40000 ALTER TABLE `detalle_perro` DISABLE KEYS */;
INSERT INTO `detalle_perro` VALUES (1,28023816,1),(2,28023816,2),(4,9889878,3),(5,28023816,4),(6,28023816,5),(7,9889878,7),(8,9889878,8);
/*!40000 ALTER TABLE `detalle_perro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dolar`
--

DROP TABLE IF EXISTS `dolar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dolar` (
  `id_dolar` int(11) NOT NULL,
  `dolar` float NOT NULL,
  `fecha_d` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dolar`
--

LOCK TABLES `dolar` WRITE;
/*!40000 ALTER TABLE `dolar` DISABLE KEYS */;
/*!40000 ALTER TABLE `dolar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `impuesto`
--

DROP TABLE IF EXISTS `impuesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `impuesto` (
  `id` int(11) NOT NULL,
  `IVA` float NOT NULL DEFAULT '16'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `impuesto`
--

LOCK TABLES `impuesto` WRITE;
/*!40000 ALTER TABLE `impuesto` DISABLE KEYS */;
INSERT INTO `impuesto` VALUES (1,16),(1,16);
/*!40000 ALTER TABLE `impuesto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimientos`
--

DROP TABLE IF EXISTS `movimientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movimientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mov` int(11) NOT NULL,
  `movimiento` varchar(20) NOT NULL,
  `motivo` varchar(300) NOT NULL,
  `producto` varchar(30) NOT NULL,
  `stock_inicial` int(11) NOT NULL,
  `cambio` int(11) NOT NULL,
  `stock_final` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimientos`
--

LOCK TABLES `movimientos` WRITE;
/*!40000 ALTER TABLE `movimientos` DISABLE KEYS */;
INSERT INTO `movimientos` VALUES (4,20,'Entrada',' Compra de productos al proveedor J-98987898, INVERSIONES MANUEL CA','Comedero de mascota',26,1,27,'0000-00-00'),(5,20,'Entrada',' Compra de productos al proveedor J-98987898, INVERSIONES MANUEL CA','Comida para gato',7,1,8,'0000-00-00'),(6,9,'Salida',' Venta de productos al cliente V-9779898, Jose Flores','Comedero de mascota',27,2,25,'0000-00-00'),(7,23,'Entrada',' Compra de productos al proveedor J-98987898, INVERSIONES MANUEL CA','Comedero de mascota',31,5,36,'2023-10-15'),(8,11,'Salida',' GestiÃ³n de la compra con la id: 11','galletas para perros',53,3,50,'2023-10-15'),(9,1,'Entrada',' GestiÃ³n de la venta con la id: 1','comida en lata',77,1,78,'2023-10-15'),(10,1,'Salida',' GestiÃ³n de la venta con la id: 1','comida en lata',78,4,74,'2023-10-16'),(11,1,'Entrada',' GestiÃ³n de la venta con la id: 1','Comedero de mascota',50,2,52,'2023-10-16'),(12,1,'Entrada',' GestiÃ³n de la venta con la id: 1','Comedero de mascota',52,1,53,'2023-10-16'),(13,1,'Entrada',' GestiÃ³n de la venta con la id: 1','Comedero de mascota',53,5,58,'2023-10-16'),(14,1,'Entrada',' GestiÃ³n de la venta con la id: 1','Comedero de mascota',58,-8,50,'2023-10-16'),(15,1,'Entrada',' GestiÃ³n de la venta con la id: 1','Comedero de mascota',50,1,51,'2023-10-16'),(16,1,'Salida',' GestiÃ³n de la venta con la id: 1','Comedero de mascota',50,1,49,'2023-10-16'),(17,1,'Entrada',' GestiÃ³n de la venta con la id: 1','Comedero de mascota',49,-1,48,'2023-10-16'),(18,1,'Entrada',' GestiÃ³n de la venta con la id: 1','Comedero de mascota',48,6,54,'2023-10-16'),(19,1,'Entrada',' GestiÃ³n de la venta con la id: 1','Comedero de mascota',54,-3,51,'2023-10-16'),(20,1,'Entrada',' GestiÃ³n de la venta con la id: 1','galletas para perros',50,3,53,'2023-10-16'),(21,1,'Entrada',' GestiÃ³n de la venta con la id: 1','galletas para perros',53,-5,48,'2023-10-16'),(22,1,'Entrada',' GestiÃ³n de la venta con la id: 1','galletas para perros',48,6,54,'2023-10-16'),(23,1,'Entrada',' GestiÃ³n de la venta con la id: 1','galletas para perros',54,-4,50,'2023-10-16'),(24,1,'Entrada',' GestiÃ³n de la venta con la id: 1','Comedero de mascota',50,1,51,'2023-10-16'),(25,1,'Salida',' GestiÃ³n de la venta con la id: 1','comida en lata',74,3,71,'2023-10-16'),(26,1,'Salida',' GestiÃ³n de la venta con la id: 1','Comedero de mascota',51,1,50,'2023-10-16'),(27,10,'Entrada',' GestiÃ³n de la compra con la id: 10','Comedero de mascota',50,5,55,'2023-10-16'),(28,10,'Salida',' GestiÃ³n de la compra con la id: 10','Comedero de mascota',55,6,49,'2023-10-16'),(29,10,'Salida',' GestiÃ³n de la compra con la id: 10','Comedero de mascota',49,-1,50,'2023-10-16'),(30,10,'Entrada',' GestiÃ³n de la compra con la id: 10','Comedero de mascota',0,5,6,'2023-10-16'),(31,10,'Entrada',' GestiÃ³n de la compra con la id: 10','Comedero de mascota',0,5,6,'2023-10-16'),(32,10,'Entrada',' GestiÃ³n de la compra con la id: 10','Comedero de mascota',65,5,70,'2023-10-16'),(33,3,'Entrada','Reembolso  de la venta con la id: ','galletas para perros',50,5,55,'2023-10-16'),(34,10,'Salida',' Venta de productos al cliente V-9779898, Jose Flores','comida en lata',71,20,51,'2023-10-18'),(35,11,'Salida',' Venta de productos al cliente V-9779898, Jose Flores','comida en lata',51,2,49,'2023-10-18'),(36,11,'Salida',' Venta de productos al cliente V-9779898, Jose Flores','Comida para gato',8,1,7,'2023-10-18');
/*!40000 ALTER TABLE `movimientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perro`
--

DROP TABLE IF EXISTS `perro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perro` (
  `id_perro` int(20) NOT NULL AUTO_INCREMENT,
  `indice` int(11) NOT NULL,
  `nombre_perro` varchar(99) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `raza_perro` varchar(99) NOT NULL,
  `observaciones` text NOT NULL,
  `m_check` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_perro`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perro`
--

LOCK TABLES `perro` WRITE;
/*!40000 ALTER TABLE `perro` DISABLE KEYS */;
INSERT INTO `perro` VALUES (1,0,'Peter','','Golden','ninguna',1),(2,0,'Manchas','Gato','Bengali','ninguna',1),(3,0,'Harold','Perro','bulldog','ninguna',1),(4,3,'Manchas','Perro','Dalmata','ninguna',0),(5,12,'Blanco','Perro','Terrier','ninguna',0),(6,9,'Dakota','Perro','Husky','ninguna',0),(7,7,'roger jr','gato','nose','ninguna',0),(8,5,'roger jr','perro','bulldog','ninguna',0);
/*!40000 ALTER TABLE `perro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perro_fuera`
--

DROP TABLE IF EXISTS `perro_fuera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perro_fuera` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `id_perro_fuera` int(9) NOT NULL,
  `motivo` varchar(500) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perro_fuera`
--

LOCK TABLES `perro_fuera` WRITE;
/*!40000 ALTER TABLE `perro_fuera` DISABLE KEYS */;
INSERT INTO `perro_fuera` VALUES (1,1,'falleciÃ³','0000-00-00'),(2,2,'muriÃ³','0000-00-00'),(3,3,'falleciÃ³','2023-10-03');
/*!40000 ALTER TABLE `perro_fuera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preguntas_seguridad`
--

DROP TABLE IF EXISTS `preguntas_seguridad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preguntas_seguridad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `pregunta_uno` varchar(20) NOT NULL,
  `respuesta_uno` varchar(20) NOT NULL,
  `pregunta_dos` varchar(20) NOT NULL,
  `respuesta_dos` varchar(20) NOT NULL,
  `pregunta_tres` varchar(20) NOT NULL,
  `respuesta_tres` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `preguntas_seguridad_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntas_seguridad`
--

LOCK TABLES `preguntas_seguridad` WRITE;
/*!40000 ALTER TABLE `preguntas_seguridad` DISABLE KEYS */;
INSERT INTO `preguntas_seguridad` VALUES (10,1,'color menos favorito','amarillo','comida favorita','pan','frecuencia de la','440'),(13,3,'color fav','rojo','lugar fav','maracay','comida fav','pan'),(14,5,'hola','hola','hola','hola','hola','hola'),(15,4,'hola','hola','hola','hola','hola','hola'),(16,6,'hola','hola','hola','hola','hola','hola'),(17,7,'color','amarillo','comida','pan','lugar favorito','maracay');
/*!40000 ALTER TABLE `preguntas_seguridad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto_proveedor`
--

DROP TABLE IF EXISTS `producto_proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto_proveedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_prov` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_prov` (`id_prov`),
  KEY `id_prod` (`id_prod`),
  CONSTRAINT `producto_proveedor_ibfk_1` FOREIGN KEY (`id_prov`) REFERENCES `proveedor` (`id_p`),
  CONSTRAINT `producto_proveedor_ibfk_2` FOREIGN KEY (`id_prod`) REFERENCES `productos` (`idpr`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto_proveedor`
--

LOCK TABLES `producto_proveedor` WRITE;
/*!40000 ALTER TABLE `producto_proveedor` DISABLE KEYS */;
INSERT INTO `producto_proveedor` VALUES (4,107013404,1),(5,98987898,3),(6,98987898,4),(7,98987898,5),(8,107013404,2),(9,98987898,6);
/*!40000 ALTER TABLE `producto_proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `idpr` int(20) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `precioVenta` int(20) NOT NULL,
  `existencia` int(4) NOT NULL DEFAULT '0',
  `id_cat` int(11) NOT NULL,
  `pp_check` int(11) DEFAULT '0',
  `unidad` int(5) NOT NULL,
  PRIMARY KEY (`idpr`),
  KEY `id_cat` (`id_cat`),
  KEY `unidad` (`unidad`),
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`),
  CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`unidad`) REFERENCES `unidad_producto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'022','comida en lata',20,49,1,0,2),(2,'002','galletas para perros',10,50,1,0,2),(3,'009','Comedero de mascota',15,70,1,0,2),(4,'031','Comida para gato',10,7,1,0,1),(5,'556OPT','Shampoo para perros',10,0,2,1,2),(6,'YTR654','Bolsa de comida cani',20,0,1,0,1);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos_comprados`
--

DROP TABLE IF EXISTS `productos_comprados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos_comprados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioProducto` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_compra` (`id_compra`),
  KEY `producto` (`producto`),
  CONSTRAINT `productos_comprados_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `compra_alproveedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `productos_comprados_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `productos` (`idpr`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos_comprados`
--

LOCK TABLES `productos_comprados` WRITE;
/*!40000 ALTER TABLE `productos_comprados` DISABLE KEYS */;
INSERT INTO `productos_comprados` VALUES (2,3,10,65,5,325),(3,2,11,2,5,10),(4,3,11,6,6,36),(5,2,12,15,10,150),(6,1,13,50,10,500),(7,2,14,20,10,200),(8,2,15,20,20,400),(9,2,16,2,2,4),(10,4,16,4,3,12),(11,4,17,3,3,9),(12,3,18,1,1,1),(13,3,19,5,5,25),(14,3,20,1,1,1),(15,4,20,1,1,1),(16,3,21,1,1,1),(17,3,22,5,5,25),(18,3,23,5,5,25);
/*!40000 ALTER TABLE `productos_comprados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos_reembolsados`
--

DROP TABLE IF EXISTS `productos_reembolsados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos_reembolsados` (
  `id` bigint(50) NOT NULL AUTO_INCREMENT,
  `producto` int(50) NOT NULL,
  `id_venta_r` bigint(50) NOT NULL,
  `cantidad` int(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_venta_r` (`id_venta_r`),
  KEY `id_producto_r` (`producto`),
  CONSTRAINT `productos_reembolsados_ibfk_1` FOREIGN KEY (`id_venta_r`) REFERENCES `reembolso` (`id_r`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `productos_reembolsados_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `productos` (`idpr`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos_reembolsados`
--

LOCK TABLES `productos_reembolsados` WRITE;
/*!40000 ALTER TABLE `productos_reembolsados` DISABLE KEYS */;
INSERT INTO `productos_reembolsados` VALUES (1,2,12,10),(2,2,13,10),(3,1,14,5),(4,2,15,5),(5,2,16,5);
/*!40000 ALTER TABLE `productos_reembolsados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos_vendidos`
--

DROP TABLE IF EXISTS `productos_vendidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos_vendidos` (
  `idpv` int(11) NOT NULL AUTO_INCREMENT,
  `producto` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  PRIMARY KEY (`idpv`),
  KEY `id_venta` (`id_venta`),
  KEY `id_producto` (`producto`),
  CONSTRAINT `productos_vendidos_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `productos_vendidos_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `productos` (`idpr`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos_vendidos`
--

LOCK TABLES `productos_vendidos` WRITE;
/*!40000 ALTER TABLE `productos_vendidos` DISABLE KEYS */;
INSERT INTO `productos_vendidos` VALUES (1,1,1,8,160),(2,2,1,1,10),(3,2,2,5,50),(4,2,3,5,50),(5,1,4,10,200),(6,1,5,10,200),(7,1,6,5,100),(8,1,7,1,20),(9,3,8,1,15),(10,3,9,2,30),(14,3,1,1,15),(15,1,10,20,400),(16,1,11,2,40),(17,4,11,1,10);
/*!40000 ALTER TABLE `productos_vendidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor` (
  `id_p` int(40) NOT NULL,
  `nombre_p` varchar(40) NOT NULL,
  `telefono_p` varchar(40) NOT NULL,
  `p_check` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_p`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (98987898,'INVERSIONES MANUEL CA','04148910902',0),(107013404,'Amir CA','04142989010',0);
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reembolso`
--

DROP TABLE IF EXISTS `reembolso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reembolso` (
  `id_r` bigint(50) NOT NULL AUTO_INCREMENT,
  `fecha_r` date NOT NULL,
  `total_r` int(11) NOT NULL,
  `id_cliente_r` int(11) NOT NULL,
  PRIMARY KEY (`id_r`),
  KEY `id_cliente_r` (`id_cliente_r`),
  CONSTRAINT `reembolso_ibfk_1` FOREIGN KEY (`id_cliente_r`) REFERENCES `cliente_venta` (`id_c`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reembolso`
--

LOCK TABLES `reembolso` WRITE;
/*!40000 ALTER TABLE `reembolso` DISABLE KEYS */;
INSERT INTO `reembolso` VALUES (1,'2023-10-03',200,9779898),(2,'2023-10-03',30,9779898),(3,'2023-10-03',120,9779898),(4,'2023-10-03',100,9779898),(5,'2023-10-03',30,9779898),(6,'2023-10-04',30,18782898),(7,'2023-10-04',30,9779898),(8,'2023-10-04',300,9779898),(9,'2023-10-04',100,9779898),(10,'2023-10-04',100,9779898),(11,'2023-10-04',400,9779898),(12,'2023-10-16',100,9779898),(13,'2023-10-16',100,9779898),(14,'2023-10-16',100,9779898),(15,'2023-10-16',50,9779898),(16,'2023-10-16',50,9779898);
/*!40000 ALTER TABLE `reembolso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock` (
  `id_producto` int(11) NOT NULL,
  `cantidad_minima` int(2) NOT NULL,
  `cantidad_max` int(3) NOT NULL,
  PRIMARY KEY (`id_producto`),
  CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`idpr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock`
--

LOCK TABLES `stock` WRITE;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` VALUES (1,15,100),(2,5,50),(3,5,15),(4,10,15),(5,5,20),(6,5,15);
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad`
--

DROP TABLE IF EXISTS `unidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad` (
  `id_unidad` int(11) NOT NULL,
  `descripcion_unidad` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad`
--

LOCK TABLES `unidad` WRITE;
/*!40000 ALTER TABLE `unidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `unidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad_producto`
--

DROP TABLE IF EXISTS `unidad_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad_producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_u` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad_producto`
--

LOCK TABLES `unidad_producto` WRITE;
/*!40000 ALTER TABLE `unidad_producto` DISABLE KEYS */;
INSERT INTO `unidad_producto` VALUES (1,'Kilo'),(2,'Unidad'),(3,'Paquete');
/*!40000 ALTER TABLE `unidad_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(260) NOT NULL,
  `level` int(3) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin1','$2y$10$kDToaZEeS47GDy5Mmad9murMeEzP4nRDoqmOFzo.zqfaCvilxLDoe',0,0),(3,'usu1','$2y$10$qP3txQtpWznOL3GlxRYgIeTJWL3zDNfBWQhaacmp1ofqj6WFnraGi',1,0),(4,'alan','12345',1,0),(5,'Jesus','1234',1,0),(6,'pedro','1234',1,0),(7,'fabian','$2y$10$e3oJpxZ6BdaLP1jyPywj/ODxsBCPH0v.Gsf68HZPvarp2hWCnFL.6',0,0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `validar`
--

DROP TABLE IF EXISTS `validar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `validar` (
  `username_val` varchar(10) NOT NULL,
  `intentos` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `validar`
--

LOCK TABLES `validar` WRITE;
/*!40000 ALTER TABLE `validar` DISABLE KEYS */;
/*!40000 ALTER TABLE `validar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `total` int(11) NOT NULL,
  `id_cliente_venta` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cliente_venta` (`id_cliente_venta`),
  CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_cliente_venta`) REFERENCES `cliente_venta` (`id_c`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (1,'2023-10-12',185,9779898),(2,'2023-10-12',50,9779898),(3,'2023-10-12',50,9779898),(4,'2023-10-12',200,9779898),(5,'2023-10-12',200,9779898),(6,'2023-10-12',100,9779898),(7,'2023-10-12',20,18782898),(8,'2023-10-13',15,9779898),(9,'2023-10-15',30,9779898),(10,'2023-10-18',400,9779898),(11,'2023-10-18',50,9779898);
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-19 18:16:38
