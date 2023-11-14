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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditoria`
--

LOCK TABLES `auditoria` WRITE;
/*!40000 ALTER TABLE `auditoria` DISABLE KEYS */;
INSERT INTO `auditoria` VALUES (1,'El usuario admin1 ActualizÃ³ los servicios del cliente Johel portador de la cÃ©dula 28023816 y su mascota Manchas en el Ã¡rea de mascotas *perruquerÃ­a* satisfactoriamente. Los servicios aplicados a la mascota son los siguientes:  Un servicio de corte 7f con un costo de 20$, Haciendo un total de 20$','actualizar','2023-10-01','admin1'),(2,'El usuario admin1 ActualizÃ³ los servicios del cliente Johel portador de la cÃ©dula 28023816 y su mascota Manchas en el Ã¡rea de mascotas *perruquerÃ­a* satisfactoriamente. Los servicios aplicados a la mascota son los siguientes:  Un servicio de cosas varias con un costo de 5$, Haciendo un total de 5$','actualizar','2023-10-02','admin1'),(3,'El usuario admin1 aÃ±adiÃ³ al usuario usuario con la contraseÃ±a *usuario* y el cargo: Usuario. satisfactoriamente','123','2023-10-02','admin1'),(4,'El usuario admin1 aÃ±adiÃ³ a la mascota Manchas del dueÃ±o Roger portador de la cÃ©dula 9889878 con el indice 03 en el Ã¡rea de mascotas satisfactoriamente','insertar','2023-10-03','admin1'),(5,'El usuario admin1 actualizÃ³ la informaciÃ³n de la mascota del dueÃ±o Roger Arenas portador de la cÃ©dula 9889878; anteriormente llamado *Manchas de raza Dalmata  y observaciones: ninguna* a *Manchas con la id 4, de raza: Dalmatay observaciones: ninguna* en la secciÃ³n *PerruquerÃ­a* Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(6,'El usuario admin1 actualizÃ³ la informaciÃ³n de la mascota del dueÃ±o Roger Arenas portador de la cÃ©dula 9889878; anteriormente llamado *Manchas de raza Dalmata  y observaciones: ninguna* a *Manchas con la id 4, de raza: Dalmatay observaciones: ninguna* en la secciÃ³n *PerruquerÃ­a* Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(7,'El usuario admin1 actualizÃ³ la informaciÃ³n de la mascota del dueÃ±o Johel Mujica portador de la cÃ©dula 28023816; anteriormente llamado *Manchas de raza Bengali  y observaciones: ninguna* a *Manchas con la id 2, de raza: Bengaliy observaciones: ninguna* en la secciÃ³n *PerruquerÃ­a* Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(8,'El usuario admin1 eliminÃ³ a la mascota Manchas de la raza Bengali, portador de la ID 2 del dueÃ±o Johel Mujica, portador de la cÃ©dula 28023816 en el Ã¡rea de Mascotas, secciÃ³n *perruquerÃ­a* satisfactoriamente','eliminar','2023-10-03','admin1'),(9,'El usuario  aÃ±adiÃ³ al cliente   en el Ã¡rea de clientes secciÃ³n *perruquerÃ­a* satisfactoriamente','actualizar','2023-10-03',''),(10,'El usuario  realizÃ³ una constancia de adopciÃ³n entre el anterior dueÃ±o  portador de la cÃ©dula: , adopta el cliente Johel Mujica portadorde la cÃ©dula: 28023816 la mascota a adoptar es   en el area de mascotas satisfactoriamente','actualizar','2023-10-03',''),(11,'El usuario admin1 realizÃ³ una constancia de adopciÃ³n entre el anterior dueÃ±o  portador de la cÃ©dula: , adopta el cliente Roger Arenas portadorde la cÃ©dula: 9889878 la mascota a adoptar es   en el area de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(12,'El usuario admin1 realizÃ³ una constancia de adopciÃ³n entre el anterior dueÃ±o  portador de la cÃ©dula: , adopta el cliente Johel Mujica portadorde la cÃ©dula: 28023816 la mascota a adoptar es   en el area de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(13,'El usuario admin1 realizÃ³ una constancia de adopciÃ³n entre el anterior dueÃ±o Johel Mujica portador de la cÃ©dula: 28023816, adopta el cliente Roger Arenas portadorde la cÃ©dula: 9889878 la mascota a adoptar es  de tipo  y raza  en el area de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(14,'El usuario admin1 realizÃ³ una constancia de adopciÃ³n entre el anterior dueÃ±o  portador de la cÃ©dula: , adopta el cliente Johel Mujica portadorde la cÃ©dula: 28023816 la mascota a adoptar es   en el area de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(15,'El usuario admin1 realizÃ³ una constancia de adopciÃ³n entre el anterior dueÃ±o Johel Mujica portador de la cÃ©dula: 28023816, adopta el cliente Roger Arenas portadorde la cÃ©dula: 9889878 la mascota a adoptar es Harold de tipo Perro y raza bulldog en el area de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(16,'El usuario admin1 eliminÃ³ a la mascota Harold de la raza bulldog, portador de la ID 3 del dueÃ±o Roger Arenas, portador de la cÃ©dula 9889878 en el Ã¡rea de Mascotas, secciÃ³n *perruquerÃ­a* satisfactoriamente','eliminar','2023-10-03','admin1'),(17,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *usuario , contraseÃ±a: usuario y cargo: usuario* a *admin1 , contraseÃ±a: usuario y cargo usuario* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(18,'El usuario admin1 actualizÃ³ la informaciÃ³n del usuario con la id 2, cuales datos eran: *admin1 , contraseÃ±a: usuario y cargo: usuario* a *usuario , contraseÃ±a: usuario y cargo usuario* en el Ã¡rea de mascotas satisfactoriamente','actualizar','2023-10-03','admin1'),(19,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-03 09:43:11','entrar','2023-10-03','admin1'),(20,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-03 09:45:12','salir','2023-10-03','admin1'),(21,'El usuario admin1 iniciÃ³ sesiÃ³n el 2023-10-03 09:45:18','entrar','2023-10-03','admin1'),(22,'El usuario admin1 aÃ±adiÃ³ la consulta del cliente Roger portador de la cÃ©dula 9889878 y su mascota Manchas en el Ã¡rea de mascotas *perruquerÃ­a* satisfactoriamente. Los servicios aplicados a la mascota son los siguientes:  Un servicio de corte con un costo de 5$, Un servicio de desparasitacion con un costo de 10$, Haciendo un total de 15$','123','2023-10-03','admin1'),(23,'El usuario admin1 aÃ±adiÃ³ la consulta del cliente Roger portador de la cÃ©dula 9889878 y su mascota Manchas en el Ã¡rea de mascotas *perruquerÃ­a* satisfactoriamente. Los servicios aplicados a la mascota son los siguientes:  Un servicio de corte con un costo de 2$, Un servicio de chequeo profundo con un costo de 55$, Haciendo un total de 57$','123','2023-10-03','admin1'),(24,'El usuario admin1 aÃ±adiÃ³ la consulta del cliente Roger portador de la cÃ©dula 9889878 y su mascota Manchas en el Ã¡rea de mascotas *perruquerÃ­a* satisfactoriamente. Los servicios aplicados a la mascota son los siguientes:  Un servicio de corte con un costo de 2$, Haciendo un total de 2$','123','2023-10-03','admin1'),(25,'El usuario admin1 eliminÃ³ la consulta del cliente Roger portador de la cÃ©dula 9889878 y su mascota Manchas en el Ã¡rea de mascotas satisfactoriamente','123','2023-10-03','admin1'),(26,'El usuario admin1 ActualizÃ³ los servicios del cliente Roger portador de la cÃ©dula 9889878 y su mascota Manchas en el Ã¡rea de mascotas *perruquerÃ­a* satisfactoriamente. Los servicios aplicados a la mascota son los siguientes:  Un servicio de corte con un costo de 2$, Un servicio de corte 33 con un costo de 2$, Haciendo un total de 4$','actualizar','2023-10-03','admin1'),(27,'El usuario admin1actualizÃ³ la observaciÃ³n de la consulta nÃºmero 12 a se encontraron garrapatas','actualizar','2023-10-03','admin1'),(28,'El usuario admin1 cerrÃ³ sesiÃ³n el 2023-10-04 12:29:37','salir','2023-10-04','admin1');
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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditoria_dos`
--

LOCK TABLES `auditoria_dos` WRITE;
/*!40000 ALTER TABLE `auditoria_dos` DISABLE KEYS */;
INSERT INTO `auditoria_dos` VALUES (1,'El usuario  eliminÃ³ la categoria ropa en el Ã¡rea de productos satisfactoriamente','eliminar','2023-09-30',''),(2,'El usuario  eliminÃ³ la categoria ropa en el Ã¡rea de productos satisfactoriamente','eliminar','2023-09-30',''),(3,'El usuario admin1 eliminÃ³ la categoria ropa en el Ã¡rea de productos satisfactoriamente','eliminar','2023-09-30','admin1'),(4,'El usuario admin1 aÃ±adiÃ³ la categoria  en el Ã¡rea de productos satisfactoriamente','insertar','2023-09-30','admin1'),(5,'El usuario admin1 aÃ±adiÃ³ la categoria  en el Ã¡rea de productos satisfactoriamente','insertar','2023-09-30','admin1'),(6,'El usuario admin1 eliminÃ³ la categoria ropa en el Ã¡rea de productos satisfactoriamente','eliminar','2023-09-30','admin1'),(7,'El usuario admin1 aÃ±adiÃ³ la categoria  en el Ã¡rea de productos satisfactoriamente','insertar','2023-09-30','admin1'),(8,'El usuario admin1 aÃ±adiÃ³ la categoria juguetes en el Ã¡rea de productos satisfactoriamente','insertar','2023-09-30','admin1'),(9,'El usuario admin1 eliminÃ³ la categoria juguetes en el Ã¡rea de productos satisfactoriamente','eliminar','2023-09-30','admin1'),(10,'El usuario admin1 aÃ±adiÃ³ la categoria *juguetes* en el Ã¡rea de productos satisfactoriamente','insertar','2023-09-30','admin1'),(11,'El usuario admin1 aÃ±adiÃ³ al proveedor Helados PP con la id: 107013403, con el nÃºmero de telefono 04140544532 en el Ã¡rea de proveedores secciÃ³n *Tienda* satisfactoriamente','124','2023-09-30','admin1'),(12,'El usuario admin1 aÃ±adiÃ³ al proveedor Amir CA con la id: 107013404, con el nÃºmero de telefono 04149879872 en el Ã¡rea de proveedores secciÃ³n *Tienda* satisfactoriamente','124','2023-09-30','admin1'),(13,'El usuario admin1 aÃ±adiÃ³ al proveedor Conos CA con la id: 107013405, con el nÃºmero de telefono 04249788910 en el Ã¡rea de proveedores secciÃ³n *Tienda* satisfactoriamente','124','2023-09-30','admin1'),(14,'El usuario admin1 aÃ±adiÃ³ al proveedor Distribuidora Almicar CA con la id: 107013409, con el nÃºmero de telefono 04147898919 en el Ã¡rea de proveedores secciÃ³n *Tienda* satisfactoriamente','124','2023-09-30','admin1'),(15,'El usuario admin1 eliminÃ³ al proveedor   con la cÃ©dula: 107013405, y el nÃºmero de telefono  en el Ã¡rea de Clientes, secciÃ³n *Tienda* satisfactoriamente','124','2023-09-30','admin1'),(16,'El usuario admin1 aÃ±adiÃ³ al proveedor Amir CA con la id: 107013404, con el nÃºmero de telefono 04142989010 en el Ã¡rea de proveedores secciÃ³n *Tienda* satisfactoriamente','124','2023-09-30','admin1'),(17,'El usuario admin1 aÃ±adiÃ³ la categoria *Comida* en el Ã¡rea de productos satisfactoriamente','insertar','2023-09-30','admin1'),(18,'El usuario admin1 aÃ±adiÃ³ el producto Comida en lata con el cÃ³digo: 001, con el precio de venta 100 la existencia: 10y en la categoria de 1, en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-09-30','admin1'),(19,'El usuario admin1 aÃ±adiÃ³ al proveedor INVERSIONES MANUEL CA con la id: 98987898, con el nÃºmero de telefono 04148910902 en el Ã¡rea de proveedores secciÃ³n *Tienda* satisfactoriamente','124','2023-09-30','admin1'),(20,'El usuario admin1 aÃ±adiÃ³ el producto Comida para gatos con el cÃ³digo: 004, con el precio de venta 15 la existencia: 10y en la categoria de 1, en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-09-30','admin1'),(21,'El usuario admin1 aÃ±adiÃ³ al cliente Paul Garcia con la cÃ©dula 18782898, con el nÃºmero de telefono 04149892782 en el Ã¡rea de clientes secciÃ³n \'Tienda\' satisfactoriamente','insertar','2023-09-30','admin1'),(22,'El usuario admin1 aÃ±adiÃ³ el producto Comida grande con el cÃ³digo: 023, con el precio de venta 100 la existencia: 10y en la categoria de 1, en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-01','admin1'),(23,'El usuario admin1 aÃ±adiÃ³ la categoria *Otros* en el Ã¡rea de productos satisfactoriamente','insertar','2023-10-02','admin1'),(24,'El usuario admin1 aÃ±adiÃ³ el producto Juguete de perro con el cÃ³digo: 056, con el precio de venta 120 la existencia: 1y en la categoria de 2, en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-02','admin1'),(25,'El usuario admin1 eliminÃ³ el producto Juguete de perro con el codigo 056, el precio de venta de 120 y tenÃ­a una existencia de: 1 en el Ã¡rea de Productos, secciÃ³n *Tienda* satisfactoriamente','124','2023-10-02','admin1'),(26,'El usuario admin1 aÃ±adiÃ³ el producto Juguete para perros con el cÃ³digo: 056, con el precio de venta 120 la existencia: 0y en la categoria de 2, en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-02','admin1'),(27,'El usuario admin1 actualizÃ³ la informaciÃ³n del producto Juguete para perros con el codigo:056 precio de venta: 120 y existencia:70 a *\r\nJuguete para gatos con el codigo: 056, el precio de venta 120 y existencia de: 70* en el Ã¡rea de productos, secciÃ³n *Tienda* satisfactoriamente','actualizar','2023-10-03','admin1'),(28,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 2 unidad o unidades de Comida para gatos en el area de Ventas, secciÃ³n Tienda satisfactoriamente.','insertar','2023-10-03',''),(29,'El usuario admin1 aÃ±adiÃ³ el producto Taza de comida med con el cÃ³digo: 097, con el precio de venta 10 la existencia: 10, en la categoria de 2,suministrado por el proveedor J-98987898 INVERSIONES MANUEL CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-03','admin1'),(30,'El usuario admin1 aÃ±adiÃ³ el producto Galleta para perros con el cÃ³digo: 076, con el precio de venta 15 la existencia: 10, en la categoria de Comida,suministrado por el proveedor J-98987898 INVERSIONES MANUEL CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-03','admin1'),(31,'El usuario admin1 actualizÃ³ la informaciÃ³n de compra del proveedor de INVERSIONES MANUEL CA , cÃ©dula 98987898. La compra consiste en:  10 unidades de Comida grande, cÃ³digo 023,  y un total de 100, en el Ã¡rea de Compras secciÃ³n \'Tienda\' satisfactoriamente','124','2023-10-03','admin1'),(32,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 8 unidad o unidades de Comida para gatos en el area de Ventas, secciÃ³n Tienda satisfactoriamente.','insertar','2023-10-03',''),(33,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 1 unidad o unidades de Comida en lata en el area de Ventas, secciÃ³n Tienda satisfactoriamente.','insertar','2023-10-03',''),(34,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 2 unidad o unidades de Comida para gatos en el area de Ventas, secciÃ³n Tienda satisfactoriamente.','insertar','2023-10-03',''),(35,'El usuario  ha reembolsado la venta del cliente Paul Garcia, portador de la cedula 18782898. El reembolso consiste en 2 unidad o unidades de Comida para gatos en el area de Ventas, secciÃ³n Tienda satisfactoriamente.','insertar','2023-10-04',''),(36,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 2 unidad o unidades de Comida para gatos en el area de Ventas, secciÃ³n Tienda satisfactoriamente.','insertar','2023-10-04',''),(37,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 3 unidad o unidades de Comida en lata en el area de Ventas, secciÃ³n Tienda satisfactoriamente. Se han reembolsado todos los productos de la venta por lo que se ha borrado el registro','insertar','2023-10-04',''),(38,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 1 unidad o unidades de Comida en lata en el area de Ventas, secciÃ³n Tienda satisfactoriamente. Se han reembolsado todos los productos de la venta por lo que se ha borrado el registro','insertar','2023-10-04',''),(39,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 1 unidad o unidades de Comida en lata en el area de Ventas, secciÃ³n Tienda satisfactoriamente.','insertar','2023-10-04',''),(40,'El usuario  ha reembolsado la venta del cliente Jose Flores, portador de la cedula 9779898. El reembolso consiste en 4 unidad o unidades de Comida en lata en el area de Ventas, secciÃ³n Tienda satisfactoriamente. Se han reembolsado todos los productos de la venta por lo que se ha borrado el registro','insertar','2023-10-04',''),(41,'El usuario admin1 aÃ±adiÃ³ el producto ropa de perro peq con el cÃ³digo: 093, con el precio de venta 15 la existencia: 2, en la categoria de Otros, suministrado por el proveedor J-98987898 INVERSIONES MANUEL CA en el Ã¡rea de productos secciÃ³n *Tienda* satisfactoriamente','insertar','2023-10-04','admin1'),(42,'El usuario admin1 eliminÃ³ al proveedor INVERSIONES MANUEL CA  con la cÃ©dula: 98987898, y el nÃºmero de telefono 04148910902 en el Ã¡rea de Clientes, secciÃ³n *Tienda* satisfactoriamente','eliminar','2023-10-04','admin1');
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
INSERT INTO `categoria` VALUES (1,'Comida'),(2,'Otros');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra_alproveedor`
--

LOCK TABLES `compra_alproveedor` WRITE;
/*!40000 ALTER TABLE `compra_alproveedor` DISABLE KEYS */;
INSERT INTO `compra_alproveedor` VALUES (6,98987898,'2023-10-01',100),(7,107013404,'2023-10-01',35),(8,107013404,'2023-10-02',700);
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
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
  `existencia` int(20) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `prov` int(11) NOT NULL,
  PRIMARY KEY (`idpr`),
  KEY `id_cat` (`id_cat`),
  KEY `prov` (`prov`),
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`),
  CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`prov`) REFERENCES `proveedor` (`id_p`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'001','Comida en lata',100,81,1,107013404),(2,'004','Comida para gatos',15,8,1,107013404),(3,'023','Comida grande',100,32,1,98987898),(5,'056','Juguete para gatos',120,70,2,107013404),(6,'097','Taza de comida med',10,10,2,98987898),(7,'076','Galleta para perros',15,10,1,98987898),(8,'093','ropa de perro peq',15,2,2,98987898);
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
  `subtotal` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_compra` (`id_compra`),
  KEY `producto` (`producto`),
  CONSTRAINT `productos_comprados_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `compra_alproveedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `productos_comprados_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `productos` (`idpr`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos_comprados`
--

LOCK TABLES `productos_comprados` WRITE;
/*!40000 ALTER TABLE `productos_comprados` DISABLE KEYS */;
INSERT INTO `productos_comprados` VALUES (8,3,6,10,100),(9,1,7,2,20),(10,2,7,3,15),(11,5,8,70,700);
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos_reembolsados`
--

LOCK TABLES `productos_reembolsados` WRITE;
/*!40000 ALTER TABLE `productos_reembolsados` DISABLE KEYS */;
INSERT INTO `productos_reembolsados` VALUES (1,1,1,2),(2,2,2,2),(3,2,3,8),(4,1,4,1),(5,2,5,2),(6,2,6,2),(7,2,7,2),(8,1,8,3),(9,1,9,1),(10,1,10,1),(11,1,11,4);
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
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
INSERT INTO `proveedor` VALUES (98987898,'INVERSIONES MANUEL CA','04148910902',1),(107013404,'Amir CA','04142989010',0);
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
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` bigint(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(35) NOT NULL,
  `level` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin1','admin1',0),(2,'usuario','usuario',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
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

-- Dump completed on 2023-10-03 17:59:38
