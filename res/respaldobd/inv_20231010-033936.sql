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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adopcion`
--

LOCK TABLES `adopcion` WRITE;
/*!40000 ALTER TABLE `adopcion` DISABLE KEYS */;
INSERT INTO `adopcion` VALUES (1,2,9889878,28023816,'2023-09-30'),(2,3,28023816,9889878,'2023-10-03'),(6,3,28023816,9889878,'2023-10-03'),(8,3,28023816,9889878,'2023-10-03');
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
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditoria`
--

LOCK TABLES `auditoria` WRITE;
/*!40000 ALTER TABLE `auditoria` DISABLE KEYS */;
INSERT INTO `auditoria` VALUES (1,'El usuario admin1 ActualizÃ³ los servicios del cliente Johel portador de la cÃ©dula 28023816 y su mascota Manchas en el Ã¡rea de mascotas *perruquerÃ­a* satisfactoriamente. Los servicios aplicados a la mascota son los siguientes:  Un servicio de corte 7f con un costo de 20$, Haciendo un total de 20$','actualizar','2023-10-01','admin1'),(2,'El usuario admin1 ActualizÃ³ los servicios del cliente Johel portador de la cÃ©dula 28023816 y su mascota Manchas en el Ã¡rea de mascotas *perruquerÃ­a* satisfactoriamente. Los servicios aplicados a la mascota son los siguientes:  Un servicio de cosas varias con un costo de 5$, Haciendo un total de 5$','actualizar','2023-10-02','admin1'),(3,'El usuario admin1 aÃ±adiÃ³ al usuario usuario con la contraseÃ±a *usuario* y el cargo: Usuario. satisfactoriamente','123','2023-10-02','admin1'),(4,'El usuario admin1 aÃ±adiÃ³ a la mascota Manchas del dueÃ±o Roger portador de la cÃ©dula 9889878 con el indice 03 en el Ã¡rea de mascotas satisfactoriamente','insertar','2023-10-03','admin1'),(5,'El usuario admin1 actualizÃ³ la informaciÃ³n de la mascota del dueÃ±o Roger Arenas portador de la cÃ©dula 9889878; anteriormente llamado *Manchas de raza Dalmata  y observaciones: ninguna* a *Manchas con la id 4, de raza: Dalmatay observaciones: ninguna* en la secciÃ³n *PerruquerÃ­a* Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(6,'El usuario admin1 actualizÃ³ la informaciÃ³n de la mascota del dueÃ±o Roger Arenas portador de la cÃ©dula 9889878; anteriormente llamado *Manchas de raza Dalmata  y observaciones: ninguna* a *Manchas con la id 4, de raza: Dalmatay observaciones: ninguna* en la secciÃ³n *PerruquerÃ­a* Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(7,'El usuario admin1 actualizÃ³ la informaciÃ³n de la mascota del dueÃ±o Johel Mujica portador de la cÃ©dula 28023816; anteriormente llamado *Manchas de raza Bengali  y observaciones: ninguna* a *Manchas con la id 2, de raza: Bengaliy observaciones: ninguna* en la secciÃ³n *PerruquerÃ­a* Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(8,'El usuario admin1 eliminÃ³ a la mascota Manchas de la raza Bengali, portador de la ID 2 del dueÃ±o Johel Mujica, portador de la cÃ©dula 28023816 en el Ã¡rea de Mascotas, secciÃ³n *perruquerÃ­a* satisfactoriamente','eliminar','2023-10-03','admin1'),(9,'El usuario  aÃ±adiÃ³ al cliente   en el Ã¡rea de clientes secciÃ³n *perruquerÃ­a* satisfactoriamente','actualizar','2023-10-03',''),(10,'El usuario  realizÃ³ una constancia de adopciÃ³n entre el anterior dueÃ±o  portador de la cÃ©dula: , adopta el cliente Johel Mujica portadorde la cÃ©dula: 28023816 la mascota a adoptar es   en el area de mascotas satisfactoriamente','actualizar','2023-10-03',''),(11,'El usuario admin1 realizÃ³ una constancia de adopciÃ³n entre el anterior dueÃ±o  portador de la cÃ©dula: , adopta el cliente Roger Arenas portadorde la cÃ©dula: 9889878 la mascota a adoptar es   en el area de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(12,'El usuario admin1 realizÃ³ una constancia de adopciÃ³n entre el anterior dueÃ±o  portador de la cÃ©dula: , adopta el cliente Johel Mujica portadorde la cÃ©dula: 28023816 la mascota a adoptar es   en el area de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(13,'El usuario admin1 realizÃ³ una constancia de adopciÃ³n entre el anterior dueÃ±o Johel Mujica portador de la cÃ©dula: 28023816, adopta el cliente Roger Arenas portadorde la cÃ©dula: 9889878 la mascota a adoptar es  de tipo  y raza  en el area de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(14,'El usuario admin1 realizÃ³ una constancia de adopciÃ³n entre el anterior dueÃ±o  portador de la cÃ©dula: , adopta el cliente Johel Mujica portadorde la cÃ©dula: 28023816 la mascota a adoptar es   en el area de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(15,'El usuario admin1 realizÃ³ una constancia de adopciÃ³n entre el anterior dueÃ±o Johel Mujica portador de la cÃ©dula: 28023816, adopta el cliente Roger Arenas portadorde la cÃ©dula: 9889878 la mascota a adoptar es Harold de tipo Perro y raza bulldog en el area de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(16,'El usuario admin1 eliminÃ³ a la mascota Harold de la raza bulldog, portador de la ID 3 del dueÃ±o Roger Arenas, portador de la cÃ©dula 9889878 en el Ã¡rea de Mascotas, secciÃ³n *perruquerÃ­a* satisfactoriamente','eliminar','2023-10-03','admin1'),(17,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *usuario , contraseÃ±a: usuario y cargo: usuario* a *admin1 , contraseÃ±a: usuario y cargo usuario* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(18,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *admin1 , contraseÃ±a: usuario y cargo: usuario* a *usuario , contraseÃ±a: usuario y cargo usuario* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(19,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-03 09:43:11','entrar','2023-10-03','admin1'),(20,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-03 09:45:12','salir','2023-10-03','admin1'),(21,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-03 09:45:18','entrar','2023-10-03','admin1'),(22,'El usuario admin1 aÃ±adiÃ³ la consulta del cliente Roger portador de la cÃ©dula 9889878 y su mascota Manchas en el Ã¡rea de mascotas *perruquerÃ­a* satisfactoriamente. Los servicios aplicados a la mascota son los siguientes:  Un servicio de corte con un costo de 5$, Un servicio de desparasitacion con un costo de 10$, Haciendo un total de 15$','123','2023-10-03','admin1'),(23,'El usuario admin1 aÃ±adiÃ³ la consulta del cliente Roger portador de la cÃ©dula 9889878 y su mascota Manchas en el Ã¡rea de mascotas *perruquerÃ­a* satisfactoriamente. Los servicios aplicados a la mascota son los siguientes:  Un servicio de corte con un costo de 2$, Un servicio de chequeo profundo con un costo de 55$, Haciendo un total de 57$','123','2023-10-03','admin1'),(24,'El usuario admin1 aÃ±adiÃ³ la consulta del cliente Roger portador de la cÃ©dula 9889878 y su mascota Manchas en el Ã¡rea de mascotas *perruquerÃ­a* satisfactoriamente. Los servicios aplicados a la mascota son los siguientes:  Un servicio de corte con un costo de 2$, Haciendo un total de 2$','123','2023-10-03','admin1'),(25,'El usuario admin1 eliminÃ³ la consulta del cliente Roger portador de la cÃ©dula 9889878 y su mascota Manchas en el Ã¡rea de mascotas satisfactoriamente','123','2023-10-03','admin1'),(26,'El usuario admin1 ActualizÃ³ los servicios del cliente Roger portador de la cÃ©dula 9889878 y su mascota Manchas en el Ã¡rea de mascotas *perruquerÃ­a* satisfactoriamente. Los servicios aplicados a la mascota son los siguientes:  Un servicio de corte con un costo de 2$, Un servicio de corte 33 con un costo de 2$, Haciendo un total de 4$','actualizar','2023-10-03','admin1'),(27,'El usuario admin1actualizÃ³ la observaciÃ³n de la consulta nÃºmero 12 a se encontraron garrapatas','actualizar','2023-10-03','admin1'),(28,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-04 12:29:37','salir','2023-10-04','admin1'),(29,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-04 05:13:54','entrar','2023-10-04','admin1'),(30,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-04 05:13:59','salir','2023-10-04','admin1'),(31,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-04 05:16:38','entrar','2023-10-04','admin1'),(32,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-04 05:16:43','salir','2023-10-04','admin1'),(33,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-04 05:17:40','entrar','2023-10-04','admin1'),(34,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-04 05:17:46','salir','2023-10-04','admin1'),(35,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-04 05:18:21','entrar','2023-10-04','admin1'),(36,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-04 05:21:57','salir','2023-10-04','admin1'),(37,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-04 05:22:21','entrar','2023-10-04','admin1'),(38,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *usuario , contraseÃ±a: usuario y cargo: usuario* a *usuario , contraseÃ±a: usuario y cargo usuario* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-04','admin1'),(39,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *usuario , contraseÃ±a: usuario y cargo: usuario* a *usuario , contraseÃ±a: usuario y cargo usuario* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-04','admin1'),(40,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *usuario , contraseÃ±a: usuario y cargo: usuario* a *admin1 , contraseÃ±a: usuario y cargo administrador* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-04','admin1'),(41,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *admin1 , contraseÃ±a: usuario y cargo: administrador* a *usuario , contraseÃ±a: usuario y cargo administrador* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-04','admin1'),(42,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *usuario , contraseÃ±a: usuario y cargo: administrador* a *usuario , contraseÃ±a: usuario y cargo usuario* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-04','admin1'),(43,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-04 06:44:34','salir','2023-10-04','admin1'),(44,'El usuario usuario iniciÃ³ sesiÃ³n el 2023-10-04 06:44:49','entrar','2023-10-04','usuario'),(45,'El usuario usuario cerrÃ³ sesiÃ³n el 2023-10-04 06:44:53','salir','2023-10-04','usuario'),(46,'La cuenta del usuario usuario ha sido bloqueada por exceso de intentos, fecha :2023-10-04 06:45:13','entrar','2023-10-04',''),(47,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-04 06:45:51','entrar','2023-10-04','admin1'),(48,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *usuario , contraseÃ±a: usuario y cargo: usuario* a *usuario , contraseÃ±a: usuario y cargo usuario* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-04','admin1'),(49,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-04 06:46:13','salir','2023-10-04','admin1'),(50,'La cuenta del usuario usuario ha sido bloqueada por exceso de intentos, fecha :2023-10-04 06:46:31','entrar','2023-10-04','usuario'),(51,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-04 06:46:37','entrar','2023-10-04','admin1'),(52,'El usuario usuario iniciÃ³ sesiÃ³n el 2023-10-05 06:19:35','entrar','2023-10-05','usuario'),(53,'El usuario usuario cerrÃ³ sesiÃ³n el 2023-10-05 06:19:42','salir','2023-10-05','usuario'),(54,'La cuenta del usuario *admin1* ha sido bloqueada por exceso de intentos, fecha :2023-10-05 06:21:36','entrar','2023-10-05','admin1'),(55,'La cuenta del usuario *usuario* ha sido bloqueada por exceso de intentos, fecha :2023-10-05 06:23:33','entrar','2023-10-05','usuario'),(56,'La cuenta del usuario *usuario* ha sido bloqueada por exceso de intentos, fecha :2023-10-05 06:26:33','entrar','2023-10-05','usuario'),(57,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-05 06:26:50','entrar','2023-10-05','admin1'),(58,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *usuario , contraseÃ±a: usuario y cargo: usuario* a *usuario , contraseÃ±a: usuario y cargo administrador* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-05','admin1'),(59,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *usuario , contraseÃ±a: usuario y cargo: administrador* a *usuario , contraseÃ±a: usuario y cargo usuario* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-05','admin1'),(60,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-05 06:28:22','salir','2023-10-05','admin1'),(61,'El usuario usuario iniciÃ³ sesiÃ³n el 2023-10-05 06:28:32','entrar','2023-10-05','usuario'),(62,'El usuario usuario cerrÃ³ sesiÃ³n el 2023-10-05 06:28:36','salir','2023-10-05','usuario'),(63,'La cuenta del usuario *admin1* ha sido bloqueada por exceso de intentos, fecha :2023-10-05 06:28:43','entrar','2023-10-05','admin1'),(64,'La cuenta del usuario *usuario* ha sido bloqueada por exceso de intentos, fecha :2023-10-05 06:29:00','entrar','2023-10-05','usuario'),(65,'La cuenta del usuario *admin1* ha sido bloqueada por exceso de intentos, fecha :2023-10-05 06:30:29','entrar','2023-10-05','admin1'),(66,'La cuenta del usuario *admin1* ha sido bloqueada por exceso de intentos, fecha :2023-10-05 06:32:43','entrar','2023-10-05','admin1'),(67,'La cuenta del usuario *admin1* ha sido bloqueada por exceso de intentos, fecha :2023-10-05 06:32:53','entrar','2023-10-05','admin1'),(68,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-05 06:32:56','entrar','2023-10-05','admin1'),(69,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-05 06:33:00','salir','2023-10-05','admin1'),(70,'La cuenta del usuario *admin1* ha sido bloqueada por exceso de intentos, fecha :2023-10-05 06:33:10','entrar','2023-10-05','admin1'),(71,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-05 06:34:43','entrar','2023-10-05','admin1'),(72,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-05 06:34:47','salir','2023-10-05','admin1'),(73,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-05 06:35:01','entrar','2023-10-05','admin1'),(74,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-05 06:35:06','salir','2023-10-05','admin1'),(75,'La cuenta del usuario *admin1* ha sido bloqueada por exceso de intentos, fecha :2023-10-05 06:46:28','entrar','2023-10-05','admin1'),(76,'El usuario usuario iniciÃ³ sesiÃ³n el 2023-10-05 06:51:39','entrar','2023-10-05','usuario'),(77,'El usuario usuario cerrÃ³ sesiÃ³n el 2023-10-05 06:51:43','salir','2023-10-05','usuario'),(78,'La cuenta del usuario *usuario* ha sido bloqueada por exceso de intentos, fecha :2023-10-05 06:51:52','entrar','2023-10-05','usuario'),(79,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-05 07:09:33','entrar','2023-10-05','admin1'),(80,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-05 07:09:43','salir','2023-10-05','admin1'),(81,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-05 07:10:03','entrar','2023-10-05','admin1'),(82,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-05 07:10:14','salir','2023-10-05','admin1'),(83,'La cuenta del usuario *usuario* ha sido bloqueada por exceso de intentos, fecha :2023-10-05 07:10:27','entrar','2023-10-05','usuario'),(84,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-05 07:10:43','entrar','2023-10-05','admin1'),(85,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *usuario , contraseÃ±a: usuario y cargo: usuario* a *usuario , contraseÃ±a: usuario y cargo usuario* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-05','admin1'),(86,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-05 07:22:32','salir','2023-10-05','admin1'),(87,'La cuenta del usuario *usuario* ha sido bloqueada por exceso de intentos, fecha :2023-10-05 07:22:47','entrar','2023-10-05','usuario'),(88,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-05 07:22:52','entrar','2023-10-05','admin1'),(89,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *usuario , contraseÃ±a: usuario y cargo: usuario* a *usuario , contraseÃ±a: usuario y cargo usuario* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-05','admin1'),(90,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *usuario , contraseÃ±a: usuario y cargo: usuario* a *usuario , contraseÃ±a: usuario y cargo usuario* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-05','admin1'),(91,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-05 07:23:44','salir','2023-10-05','admin1'),(92,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-05 09:05:44','entrar','2023-10-05','admin1'),(93,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-05 05:45:19','entrar','2023-10-05','admin1'),(94,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-06 05:23:55','entrar','2023-10-06','admin1'),(95,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-06 05:24:01','salir','2023-10-06','admin1'),(96,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-06 05:25:18','entrar','2023-10-06','admin1'),(97,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-06 06:07:41','salir','2023-10-06','admin1'),(98,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-06 06:07:46','entrar','2023-10-06','admin1'),(99,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-06 06:14:39','salir','2023-10-06','admin1'),(100,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-06 06:14:47','entrar','2023-10-06','admin1'),(101,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-06 06:27:42','salir','2023-10-06','admin1'),(102,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-06 06:27:49','entrar','2023-10-06','admin1'),(103,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-06 06:32:28','salir','2023-10-06','admin1'),(104,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-06 06:32:47','entrar','2023-10-06','admin1'),(105,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-06 06:38:56','salir','2023-10-06','admin1'),(106,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-06 06:39:23','entrar','2023-10-06','admin1'),(107,'El usuario admin1 aÃ±adiÃ³ al usuario usuario con la contraseÃ±a *usuario* y el cargo: Usuario. satisfactoriamente','insertar','2023-10-06','admin1'),(108,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-06 07:25:51','salir','2023-10-06','admin1'),(109,'El usuario usuario iniciÃ³ sesiÃ³n el 2023-10-06 07:25:59','entrar','2023-10-06','usuario'),(110,'El usuario usuario cerrÃ³ sesiÃ³n el 2023-10-06 07:41:52','salir','2023-10-06','usuario'),(111,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-06 07:41:57','entrar','2023-10-06','admin1'),(112,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-06 07:45:39','salir','2023-10-06','admin1'),(113,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-06 07:45:56','entrar','2023-10-06','admin1'),(114,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 1, cuales datos eran: * , contraseÃ±a:  y cargo: * a * , contraseÃ±a:  y cargo * en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-06','admin1'),(115,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 1, cuales datos eran: * , contraseÃ±a:  y cargo: * a * , contraseÃ±a:  y cargo * en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-06','admin1'),(116,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 1, cuales datos eran: * , contraseÃ±a:  y cargo: * a * , contraseÃ±a:  y cargo * en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-06','admin1'),(117,'','actualizar','2023-10-06','admin1'),(118,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-06 08:27:00','salir','2023-10-06','admin1'),(119,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-06 08:27:08','entrar','2023-10-06','admin1'),(120,'El usuario admin1 actualizÃ³ las preguntas frecuentes del usuario con la id 1, las preguntas frecuentes ahora son; pregunta uno: color menos favorito, respuesta uno: amarillo. pregunta dos: comida favorita, respuesta dos: pan. pregunta tres: frecuencia de la, respuesta tres: 440','actualizar','2023-10-06','admin1'),(121,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-06 10:07:01','salir','2023-10-06','admin1'),(122,'El usuario usuario iniciÃ³ sesiÃ³n el 2023-10-06 10:07:10','entrar','2023-10-06','usuario'),(123,'El usuario usuario cerrÃ³ sesiÃ³n el 2023-10-06 10:07:37','salir','2023-10-06','usuario'),(124,'La cuenta del usuario *usuario* ha sido bloqueada por exceso de intentos, fecha :2023-10-06 11:34:24','entrar','2023-10-06','usuario'),(125,'El usuario usuario iniciÃ³ sesiÃ³n el 2023-10-06 08:39:32','entrar','2023-10-06','usuario'),(126,'El usuario usuario cerrÃ³ sesiÃ³n el 2023-10-06 08:39:55','salir','2023-10-06','usuario'),(127,'El usuario usuario iniciÃ³ sesiÃ³n el 2023-10-06 08:40:02','entrar','2023-10-06','usuario'),(128,'El usuario usuario cerrÃ³ sesiÃ³n el 2023-10-06 08:40:40','salir','2023-10-06','usuario'),(129,'La cuenta del usuario *usuario* ha sido bloqueada por exceso de intentos, fecha :2023-10-06 20:41:32','entrar','2023-10-06','usuario'),(130,'El usuario usuario iniciÃ³ sesiÃ³n el 2023-10-06 10:55:15','entrar','2023-10-06','usuario'),(131,'El usuario usuario cerrÃ³ sesiÃ³n el 2023-10-06 10:55:18','salir','2023-10-06','usuario'),(132,'La cuenta del usuario *usuario* ha sido bloqueada por exceso de intentos, fecha :2023-10-06 22:55:27','entrar','2023-10-06','usuario'),(133,'La cuenta del usuario *usuario* ha sido bloqueada por exceso de intentos, fecha :2023-10-06 22:58:13','entrar','2023-10-06','usuario'),(134,'El usuario usuario iniciÃ³ sesiÃ³n el 2023-10-06 11:01:32','entrar','2023-10-06','usuario'),(135,'El usuario usuario actualizÃ³ su informaciÃ³n del usuario, cuales datos eran: *usuario , contraseÃ±a: usuario* a *usu1 , contraseÃ±a: usuario* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-06','usuario'),(136,'El usuario usuario cerrÃ³ sesiÃ³n el 2023-10-06 11:22:20','salir','2023-10-06','usuario'),(137,'El usuario usu1 iniciÃ³ sesiÃ³n el 2023-10-06 11:22:26','entrar','2023-10-06','usu1'),(138,'El usuario usu1 cerrÃ³ sesiÃ³n el 2023-10-07 01:20:16','salir','2023-10-07','usu1'),(139,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-07 01:20:22','entrar','2023-10-07','admin1'),(140,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-07 10:58:36','salir','2023-10-07','admin1'),(141,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-07 09:20:41','entrar','2023-10-07','admin1'),(142,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-08 02:21:01','entrar','2023-10-08','admin1'),(143,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-08 06:15:18','salir','2023-10-08','admin1'),(144,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-09 01:25:50','entrar','2023-10-09','admin1'),(145,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-10 01:24:54','entrar','2023-10-10','admin1'),(146,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-10 03:39:35','salir','2023-10-10','admin1');
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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditoria_dos`
--

LOCK TABLES `auditoria_dos` WRITE;
/*!40000 ALTER TABLE `auditoria_dos` DISABLE KEYS */;
INSERT INTO `auditoria_dos` VALUES (1,'El usuario  eliminÃ³ la categoria ropa en el Ã¡rea de productos satisfactoriamente','eliminar','2023-09-30',''),(2,'El usuario  eliminÃ³ la categoria ropa en el Ã¡rea de productos satisfactoriamente','eliminar','2023-09-30',''),(3,'El usuario admin1 eliminÃ³ la categoria ropa en el Ã¡rea de productos satisfactoriamente','eliminar','2023-09-30','admin1'),(4,'El usuario admin1 aÃ±adiÃ³ la categoria  en el Ã¡rea de productos satisfactoriamente','insertar','2023-09-30','admin1'),(5,'El usuario admin1 aÃ±adiÃ³ la categoria  en el Ã¡rea de productos satisfactoriamente','insertar','2023-09-30','admin1'),(6,'El usuario admin1 eliminÃ³ la categoria ropa en el Ã¡rea de productos satisfactoriamente','eliminar','2023-09-30','admin1'),(7,'El usuario admin1 aÃ±adiÃ³ la categoria  en el Ã¡rea de productos satisfactoriamente','insertar','2023-09-30','admin1'),(8,'El usuario admin1 aÃ±adiÃ³ la categoria juguetes en el Ã¡rea de productos satisfactoriamente','insertar','2023-09-30','admin1'),(9,'El usuario admin1 eliminÃ³ la categoria juguetes en el Ã¡rea de productos satisfactoriamente','eliminar','2023-09-30','admin1'),(10,'El usuario admin1 aÃ±adiÃ³ la categoria *juguetes* en el Ã¡rea de productos satisfactoriamente','insertar','2023-09-30','admin1'),(11,'El usuario admin1 aÃ±adiÃ³ al proveedor Helados PP con la id: 107013403, con el nÃºmero de telefono 04140544532 en el Ã¡rea de proveedores secciÃ³n *Tienda* satisfactoriamente','124','2023-09-30','admin1'),(12,'El usuario admin1 aÃ±adiÃ³ al proveedor Amir CA con la id: 107013404, con el nÃºmero de telefono 04149879872 en el Ã¡rea de proveedores secciÃ³n *Tienda* satisfactoriamente','124','2023-09-30','admin1'),(13,'El usuario admin1 aÃ±adiÃ³ al proveedor Conos CA con la id: 107013405, con el nÃºmero de telefono 04249788910 en el Ã¡rea de proveedores secciÃ³n *Tienda* satisfactoriamente','124','2023-09-30','admin1'),(14,'El usuario admin1 aÃ±adiÃ³ al proveedor Distribuidora Almicar CA con la id: 107013409, con el nÃºmero de telefono 04147898919 en el Ã¡rea de proveedores secciÃ³n *Tienda* satisfactoriamente','124','2023-09-30','admin1'),(15,'El usuario admin1 eliminÃ³ al proveedor   con la cÃ©dula: 107013405, y el nÃºmero de telefono  en el Ã¡rea de Clientes, secciÃ³n *Tienda* satisfactoriamente','124','2023-09-30','admin1'),(16,'El usuario admin1 aÃ±adiÃ³ al proveedor Amir CA con la id: 107013404, con el nÃºmero de telefono 04142989010 en el Ã¡rea de proveedores secciÃ³n *Tienda* satisfactoriamente','124','2023-09-30','admin1'),(17,'El usuario admin1 aÃ±adiÃ³ la categoria *Comida* en el Ã¡rea de productos satisfactoriamente','insertar','2023-09-30','admin1'),(18,'El usuario admin1 aÃ±adiÃ³ el producto Comida en lata con el cÃ³digo: 001, con el precio de venta 100 la existencia: 10y en la categoria de 1, en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-09-30','admin1'),(19,'El usuario admin1 aÃ±adiÃ³ al proveedor INVERSIONES MANUEL CA con la id: 98987898, con el nÃºmero de telefono 04148910902 en el Ã¡rea de proveedores secciÃ³n *Tienda* satisfactoriamente','124','2023-09-30','admin1'),(20,'El usuario admin1 aÃ±adiÃ³ el producto Comida para gatos con el cÃ³digo: 004, con el precio de venta 15 la existencia: 10y en la categoria de 1, en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-09-30','admin1'),(21,'El usuario admin1 aÃ±adiÃ³ al cliente Paul Garcia con la cÃ©dula 18782898, con el nÃºmero de telefono 04149892782 en el Ã¡rea de clientes secciÃ³n \'Tienda\' satisfactoriamente','insertar','2023-09-30','admin1'),(22,'El usuario admin1 aÃ±adiÃ³ el producto Comida grande con el cÃ³digo: 023, con el precio de venta 100 la existencia: 10y en la categoria de 1, en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-01','admin1'),(23,'El usuario admin1 aÃ±adiÃ³ la categoria *Otros* en el Ã¡rea de productos satisfactoriamente','insertar','2023-10-02','admin1'),(24,'El usuario admin1 aÃ±adiÃ³ el producto Juguete de perro con el cÃ³digo: 056, con el precio de venta 120 la existencia: 1y en la categoria de 2, en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-02','admin1'),(25,'El usuario admin1 eliminÃ³ el producto Juguete de perro con el codigo 056, el precio de venta de 120 y tenÃ­a una existencia de: 1 en el Ã¡rea de Productos, secciÃ³n *Tienda* satisfactoriamente','124','2023-10-02','admin1'),(26,'El usuario admin1 aÃ±adiÃ³ el producto Juguete para perros con el cÃ³digo: 056, con el precio de venta 120 la existencia: 0y en la categoria de 2, en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-02','admin1'),(27,'El usuario admin1 actualizÃ³ la informaciÃ³n del producto Juguete para perros con el codigo:056 precio de venta: 120 y existencia:70 a *\r\nJuguete para gatos con el codigo: 056, el precio de venta 120 y existencia de: 70* en el Ã¡rea de productos, secciÃ³n *Tienda* satisfactoriamente','actualizar','2023-10-03','admin1'),(28,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 2 unidad o unidades de Comida para gatos en el area de Ventas, secciÃ³n Tienda satisfactoriamente.','insertar','2023-10-03',''),(29,'El usuario admin1 aÃ±adiÃ³ el producto Taza de comida med con el cÃ³digo: 097, con el precio de venta 10 la existencia: 10, en la categoria de 2,suministrado por el proveedor J-98987898 INVERSIONES MANUEL CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-03','admin1'),(30,'El usuario admin1 aÃ±adiÃ³ el producto Galleta para perros con el cÃ³digo: 076, con el precio de venta 15 la existencia: 10, en la categoria de Comida,suministrado por el proveedor J-98987898 INVERSIONES MANUEL CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-03','admin1'),(31,'El usuario admin1 actualizÃ³ la informaciÃ³n de compra del proveedor de INVERSIONES MANUEL CA , cÃ©dula 98987898. La compra consiste en:  10 unidades de Comida grande, cÃ³digo 023,  y un total de 100, en el Ã¡rea de Compras secciÃ³n \'Tienda\' satisfactoriamente','124','2023-10-03','admin1'),(32,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 8 unidad o unidades de Comida para gatos en el area de Ventas, secciÃ³n Tienda satisfactoriamente.','insertar','2023-10-03',''),(33,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 1 unidad o unidades de Comida en lata en el area de Ventas, secciÃ³n Tienda satisfactoriamente.','insertar','2023-10-03',''),(34,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 2 unidad o unidades de Comida para gatos en el area de Ventas, secciÃ³n Tienda satisfactoriamente.','insertar','2023-10-03',''),(35,'El usuario  ha reembolsado la venta del cliente Paul Garcia, portador de la cedula 18782898. El reembolso consiste en 2 unidad o unidades de Comida para gatos en el area de Ventas, secciÃ³n Tienda satisfactoriamente.','insertar','2023-10-04',''),(36,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 2 unidad o unidades de Comida para gatos en el area de Ventas, secciÃ³n Tienda satisfactoriamente.','insertar','2023-10-04',''),(37,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 3 unidad o unidades de Comida en lata en el area de Ventas, secciÃ³n Tienda satisfactoriamente. Se han reembolsado todos los productos de la venta por lo que se ha borrado el registro','insertar','2023-10-04',''),(38,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 1 unidad o unidades de Comida en lata en el area de Ventas, secciÃ³n Tienda satisfactoriamente. Se han reembolsado todos los productos de la venta por lo que se ha borrado el registro','insertar','2023-10-04',''),(39,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 1 unidad o unidades de Comida en lata en el area de Ventas, secciÃ³n Tienda satisfactoriamente.','insertar','2023-10-04',''),(40,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 4 unidad o unidades de Comida en lata en el area de Ventas, secciÃ³n Tienda satisfactoriamente. Se han reembolsado todos los productos de la venta por lo que se ha borrado el registro','insertar','2023-10-04',''),(41,'El usuario admin1 aÃ±adiÃ³ el producto ropa de perro peq con el cÃ³digo: 093, con el precio de venta 15 la existencia: 2, en la categoria de Otros, suministrado por el proveedor J-98987898 INVERSIONES MANUEL CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-04','admin1'),(42,'El usuario admin1 eliminÃ³ al proveedor INVERSIONES MANUEL CA  con la cÃ©dula: 98987898, y el nÃºmero de telefono 04148910902 en el Ã¡rea de Clientes, secciÃ³n *Tienda* satisfactoriamente','eliminar','2023-10-04','admin1'),(43,'El usuario usu1 aÃ±adiÃ³ la categoria *Comida* en el Ã¡rea de productos satisfactoriamente','insertar','2023-10-07','usu1'),(44,'El usuario usu1 aÃ±adiÃ³ el producto Comida para perros con el cÃ³digo: 088, con el precio de venta 10 en la categoria de Comida, suministrado por el proveedor J-107013404 Amir CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-07','usu1'),(45,'El usuario admin1 aÃ±adiÃ³ el producto comida con el cÃ³digo: 088, con el precio de venta 20 en la categoria de , suministrado por el proveedor J-107013404 Amir CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-07','admin1'),(46,'El usuario admin1 aÃ±adiÃ³ el producto comida canina con el cÃ³digo: 099, con el precio de venta 20 en la categoria de Comida, suministrado por el proveedor J-107013404 Amir CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-07','admin1'),(47,'El usuario admin1 aÃ±adiÃ³ el producto comida en lata con el cÃ³digo: 054, con el precio de venta 5 en la categoria de Comida, suministrado por el proveedor J-107013404 Amir CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-07','admin1'),(48,'El usuario admin1 aÃ±adiÃ³ el producto comida con el cÃ³digo: 848, con el precio de venta 49 en la categoria de Comida, suministrado por el proveedor J-107013404 Amir CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-07','admin1'),(49,'El usuario admin1 aÃ±adiÃ³ el producto comida en lata con el cÃ³digo: 343, con el precio de venta 10 en la categoria de Comida, con el stock minimo de 5 y el stock maximo de 50, suministrado por el proveedor J-107013404 Amir CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-07','admin1'),(50,'El usuario admin1 aÃ±adiÃ³ el producto comida para gatos con el cÃ³digo: 878, con el precio de venta 22 en la categoria de Comida, con el stock minimo de 4 y el stock maximo de 40, suministrado por el proveedor J-107013404 Amir CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-07','admin1'),(51,'El usuario admin1 aÃ±adiÃ³ el producto comida con el cÃ³digo: 874, con el precio de venta 3 en la categoria de Comida, con el stock minimo de 3 y el stock maximo de 30, suministrado por el proveedor J-107013404 Amir CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-07','admin1'),(52,'El usuario admin1 aÃ±adiÃ³ el producto comida en lata con el cÃ³digo: 001, con el precio de venta 20 en la categoria de Comida, con el stock minimo de 5 y el stock maximo de 50, suministrado por el proveedor J-98987898 INVERSIONES MANUEL CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamen','insertar','2023-10-07','admin1'),(53,'El usuario admin1 aÃ±adiÃ³ el producto galletas para perros con el cÃ³digo: 002, con el precio de venta 10 en la categoria de Comida, con el stock minimo de 5 y el stock maximo de 50, suministrado por el proveedor J-107013404 Amir CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-07','admin1'),(54,'El usuario admin1 actualizÃ³ la informaciÃ³n del producto comida en lata con el codigo:001 precio de venta: 20 y existencia:55 a *\r\ncomida en lata con el codigo: 001, el precio de venta 20 y existencia de: 55* en el Ã¡rea de productos, secciÃ³n *Tienda* satisfactoriamente','actualizar','2023-10-07','admin1'),(55,'El usuario admin1 actualizÃ³ la informaciÃ³n del producto comida en lata con el codigo:001 precio de venta: 20 y existencia:55 a *\r\ncomida en lata con el codigo: 001, el precio de venta 20 y existencia de: 55* en el Ã¡rea de productos, secciÃ³n *Tienda* satisfactoriamente','actualizar','2023-10-07','admin1'),(56,'El usuario admin1 aÃ±adiÃ³ el producto Comedero de mascota con el cÃ³digo: 009, con el precio de venta 15 en la categoria de Comida, con el stock minimo de 5 y el stock maximo de 15, suministrado por el proveedor J-98987898 INVERSIONES MANUEL CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactor','insertar','2023-10-07','admin1'),(57,'El usuario admin1 actualizÃ³ la informaciÃ³n de compra del proveedor de INVERSIONES MANUEL CA , cÃ©dula 98987898. La compra consiste en:  15 unidades de Comedero de mascota, cÃ³digo 009,  y un total de 75$, en el Ã¡rea de Compras secciÃ³n \'Tienda\' satisfactoriamente','actualizar','2023-10-08','admin1'),(58,'El usuario admin1 aÃ±adiÃ³ el producto ihjh con el cÃ³digo: ytr, con el precio de venta 0 en la categoria de Comida, con el stock minimo de 0 y el stock maximo de 0, suministrado por el proveedor J-98987898 INVERSIONES MANUEL CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-10','admin1'),(59,'El usuario admin1 eliminÃ³ el producto ihjh con el codigo ytr, el precio de venta de 0 y tenÃ­a una existencia de: 0 en el Ã¡rea de Productos, secciÃ³n *Tienda* satisfactoriamente','eliminar','2023-10-10','admin1'),(60,'El usuario admin1 eliminÃ³ el producto ihjh con el codigo ytr, el precio de venta de 0 y tenÃ­a una existencia de: 0 en el Ã¡rea de Productos, secciÃ³n *Tienda* satisfactoriamente','eliminar','2023-10-10','admin1');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Comida');
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra_alproveedor`
--

LOCK TABLES `compra_alproveedor` WRITE;
/*!40000 ALTER TABLE `compra_alproveedor` DISABLE KEYS */;
INSERT INTO `compra_alproveedor` VALUES (6,98987898,'2023-10-01',100),(7,107013404,'2023-10-01',35),(8,107013404,'2023-10-02',700),(10,98987898,'2023-10-08',75),(11,98987898,'2023-10-08',61);
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consulta`
--

LOCK TABLES `consulta` WRITE;
/*!40000 ALTER TABLE `consulta` DISABLE KEYS */;
INSERT INTO `consulta` VALUES (7,28023816,2,5,'2023-10-01','Si se realizaron observaciones	\r\n'),(9,9889878,4,15,'2023-10-03','se encontraron garrapatas'),(11,9889878,4,57,'2023-10-03','se encontraron manchas bajo la oreja'),(12,9889878,4,4,'2023-10-03','se encontraron garrapatas');
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consulta_detalle`
--

LOCK TABLES `consulta_detalle` WRITE;
/*!40000 ALTER TABLE `consulta_detalle` DISABLE KEYS */;
INSERT INTO `consulta_detalle` VALUES (14,7,'cosas varias',5),(17,9,'corte',5),(18,9,'desparasitacion',10),(19,11,'corte',2),(20,11,'chequeo profundo',55),(21,12,'corte',2),(23,12,'corte 33',2);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_perro`
--

LOCK TABLES `detalle_perro` WRITE;
/*!40000 ALTER TABLE `detalle_perro` DISABLE KEYS */;
INSERT INTO `detalle_perro` VALUES (1,28023816,1),(2,28023816,2),(4,9889878,3),(5,9889878,4);
/*!40000 ALTER TABLE `detalle_perro` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perro`
--

LOCK TABLES `perro` WRITE;
/*!40000 ALTER TABLE `perro` DISABLE KEYS */;
INSERT INTO `perro` VALUES (1,0,'Peter','','Golden','ninguna',1),(2,0,'Manchas','Gato','Bengali','ninguna',1),(3,0,'Harold','Perro','bulldog','ninguna',1),(4,3,'Manchas','Perro','Dalmata','ninguna',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntas_seguridad`
--

LOCK TABLES `preguntas_seguridad` WRITE;
/*!40000 ALTER TABLE `preguntas_seguridad` DISABLE KEYS */;
INSERT INTO `preguntas_seguridad` VALUES (10,1,'color menos favorito','amarillo','comida favorita','pan','frecuencia de la','440'),(13,3,'color fav','rojo','lugar fav','maracay','comida fav','pan');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto_proveedor`
--

LOCK TABLES `producto_proveedor` WRITE;
/*!40000 ALTER TABLE `producto_proveedor` DISABLE KEYS */;
INSERT INTO `producto_proveedor` VALUES (3,98987898,2),(4,107013404,1),(5,98987898,3),(6,98987898,4);
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
  `descripcion` varchar(20) NOT NULL,
  `precioVenta` int(20) NOT NULL,
  `existencia` int(4) NOT NULL DEFAULT '0',
  `id_cat` int(11) NOT NULL,
  PRIMARY KEY (`idpr`),
  KEY `id_cat` (`id_cat`),
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'001','comida en lata',20,55,1),(2,'002','galletas para perros',10,15,1),(3,'009','Comedero de mascota',15,21,1),(4,'ytr','ihjh',0,0,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos_comprados`
--

LOCK TABLES `productos_comprados` WRITE;
/*!40000 ALTER TABLE `productos_comprados` DISABLE KEYS */;
INSERT INTO `productos_comprados` VALUES (2,3,10,15,5,75),(3,2,11,5,5,25),(4,3,11,6,6,36);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos_reembolsados`
--

LOCK TABLES `productos_reembolsados` WRITE;
/*!40000 ALTER TABLE `productos_reembolsados` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos_vendidos`
--

LOCK TABLES `productos_vendidos` WRITE;
/*!40000 ALTER TABLE `productos_vendidos` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reembolso`
--

LOCK TABLES `reembolso` WRITE;
/*!40000 ALTER TABLE `reembolso` DISABLE KEYS */;
INSERT INTO `reembolso` VALUES (1,'2023-10-03',200,9779898),(2,'2023-10-03',30,9779898),(3,'2023-10-03',120,9779898),(4,'2023-10-03',100,9779898),(5,'2023-10-03',30,9779898),(6,'2023-10-04',30,18782898),(7,'2023-10-04',30,9779898),(8,'2023-10-04',300,9779898),(9,'2023-10-04',100,9779898),(10,'2023-10-04',100,9779898),(11,'2023-10-04',400,9779898);
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
INSERT INTO `stock` VALUES (1,12,50),(2,5,50),(3,5,15),(4,0,0);
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;
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
  `password` varchar(35) NOT NULL,
  `level` int(3) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin1','admin1',0,0),(3,'usu1','usuario',1,0);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
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

-- Dump completed on 2023-10-09 21:09:54
