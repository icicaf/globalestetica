CREATE DATABASE  IF NOT EXISTS `sys_med` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `sys_med`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: sys_med
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.32-MariaDB

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
-- Table structure for table `sys_menus`
--

DROP TABLE IF EXISTS `sys_menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_menus` (
  `sys_menu_ID` int(11) NOT NULL AUTO_INCREMENT,
  `sys_modulos_sys_modulo_ID` int(11) NOT NULL,
  `sys_menu_nombre` varchar(200) NOT NULL,
  `sys_menu_descripcion` varchar(200) DEFAULT NULL,
  `sys_menu_orden` int(11) NOT NULL,
  PRIMARY KEY (`sys_menu_ID`),
  KEY `fk_sys_menus_sys_modulos_idx` (`sys_modulos_sys_modulo_ID`),
  CONSTRAINT `fk_sys_menus_sys_modulos` FOREIGN KEY (`sys_modulos_sys_modulo_ID`) REFERENCES `sys_modulos` (`sys_modulo_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_menus`
--

LOCK TABLES `sys_menus` WRITE;
/*!40000 ALTER TABLE `sys_menus` DISABLE KEYS */;
INSERT INTO `sys_menus` VALUES (1,1,'Gestor de cuentas','',10);
/*!40000 ALTER TABLE `sys_menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_modulos`
--

DROP TABLE IF EXISTS `sys_modulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_modulos` (
  `sys_modulo_ID` int(11) NOT NULL AUTO_INCREMENT,
  `sys_modulo_nombre` varchar(200) NOT NULL,
  `sys_modulo_descripcion` varchar(200) DEFAULT NULL,
  `sys_modulo_orden` int(11) NOT NULL,
  PRIMARY KEY (`sys_modulo_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_modulos`
--

LOCK TABLES `sys_modulos` WRITE;
/*!40000 ALTER TABLE `sys_modulos` DISABLE KEYS */;
INSERT INTO `sys_modulos` VALUES (1,'Administración','Gestión del sistema',10);
/*!40000 ALTER TABLE `sys_modulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_permisos`
--

DROP TABLE IF EXISTS `sys_permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_permisos` (
  `sys_permiso_ID` int(11) NOT NULL AUTO_INCREMENT,
  `sys_usuarios_sys_usuario_ID` int(11) NOT NULL,
  `sys_tipo_permiso_sys_tipo_permiso_ID` int(11) NOT NULL,
  `sys_submenu_sys_submenu_ID` int(11) NOT NULL,
  PRIMARY KEY (`sys_permiso_ID`),
  KEY `fk_sys_permisos_sys_usuarios1_idx` (`sys_usuarios_sys_usuario_ID`),
  KEY `fk_sys_permisos_sys_tipo_permiso1_idx` (`sys_tipo_permiso_sys_tipo_permiso_ID`),
  KEY `fk_sys_permisos_sys_submenu1_idx` (`sys_submenu_sys_submenu_ID`),
  CONSTRAINT `fk_sys_permisos_sys_submenu1` FOREIGN KEY (`sys_submenu_sys_submenu_ID`) REFERENCES `sys_submenus` (`sys_submenu_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sys_permisos_sys_tipo_permiso1` FOREIGN KEY (`sys_tipo_permiso_sys_tipo_permiso_ID`) REFERENCES `sys_tipo_permiso` (`sys_tipo_permiso_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sys_permisos_sys_usuarios1` FOREIGN KEY (`sys_usuarios_sys_usuario_ID`) REFERENCES `sys_usuarios` (`sys_usuario_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_permisos`
--

LOCK TABLES `sys_permisos` WRITE;
/*!40000 ALTER TABLE `sys_permisos` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_submenus`
--

DROP TABLE IF EXISTS `sys_submenus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_submenus` (
  `sys_submenu_ID` int(11) NOT NULL AUTO_INCREMENT,
  `sys_menus_sys_menu_ID` int(11) NOT NULL,
  `sys_submenu_urlControlador` varchar(200) DEFAULT NULL,
  `sys_submenu_nombre` varchar(200) NOT NULL,
  `sys_submenu_descripcion` varchar(200) DEFAULT NULL,
  `sys_submenu_orden` int(11) NOT NULL,
  PRIMARY KEY (`sys_submenu_ID`),
  KEY `fk_sys_submenu_sys_menus1_idx` (`sys_menus_sys_menu_ID`),
  CONSTRAINT `fk_sys_submenu_sys_menus1` FOREIGN KEY (`sys_menus_sys_menu_ID`) REFERENCES `sys_menus` (`sys_menu_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_submenus`
--

LOCK TABLES `sys_submenus` WRITE;
/*!40000 ALTER TABLE `sys_submenus` DISABLE KEYS */;
INSERT INTO `sys_submenus` VALUES (1,1,'ModuloAdministracion/CgestorCuentas/get_gestion_usuario/1','Crear Usuario',NULL,10);
/*!40000 ALTER TABLE `sys_submenus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_tipo_permiso`
--

DROP TABLE IF EXISTS `sys_tipo_permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_tipo_permiso` (
  `sys_tipo_permiso_ID` int(11) NOT NULL AUTO_INCREMENT,
  `sys_tipo_permiso_nombre` varchar(45) NOT NULL,
  `sys_tipo_permiso_orden` int(11) NOT NULL,
  PRIMARY KEY (`sys_tipo_permiso_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_tipo_permiso`
--

LOCK TABLES `sys_tipo_permiso` WRITE;
/*!40000 ALTER TABLE `sys_tipo_permiso` DISABLE KEYS */;
INSERT INTO `sys_tipo_permiso` VALUES (1,'administrador',10);
/*!40000 ALTER TABLE `sys_tipo_permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_usuarios`
--

DROP TABLE IF EXISTS `sys_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_usuarios` (
  `sys_usuario_ID` int(11) NOT NULL AUTO_INCREMENT,
  `sys_usuario_usuario` varchar(45) NOT NULL,
  `sys_usuario_clave` varchar(40) NOT NULL,
  `sys_usuario_nombre` varchar(200) NOT NULL,
  `sys_usuario_correoElectronico` varchar(200) DEFAULT NULL,
  `sys_usuario_estadoUsuario` int(11) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NULL DEFAULT,
  PRIMARY KEY (`sys_usuario_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_usuarios`
--

LOCK TABLES `sys_usuarios` WRITE;
/*!40000 ALTER TABLE `sys_usuarios` DISABLE KEYS */;
INSERT INTO `sys_usuarios` VALUES (1,'admin','admin','admin','admin@',1,'2019-08-26 04:50:57','2019-08-26 04:50:57');
/*!40000 ALTER TABLE `sys_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'sys_med'
--

--
-- Dumping routines for database 'sys_med'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-26  2:20:01
