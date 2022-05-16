-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: diplomadb
-- ------------------------------------------------------
-- Server version	8.0.22

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','admin');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `completed_lections`
--

DROP TABLE IF EXISTS `completed_lections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `completed_lections` (
  `id` int NOT NULL AUTO_INCREMENT,
  `section` varchar(45) DEFAULT NULL,
  `topic` varchar(45) DEFAULT NULL,
  `lection` varchar(45) DEFAULT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_completed_lections_user1_idx` (`user_id`),
  CONSTRAINT `fk_completed_lections_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `completed_lections`
--

LOCK TABLES `completed_lections` WRITE;
/*!40000 ALTER TABLE `completed_lections` DISABLE KEYS */;
INSERT INTO `completed_lections` VALUES (10,'oper_sys','introduction','lection_1',2),(11,'oper_sys','introduction','lection_1',3),(12,'oper_sys','introduction','lection_2',3),(13,'oper_sys','introduction','lection_3',3),(14,'oper_sys','introduction','lection_4',3),(16,'oper_sys','introduction','lection_5',3),(17,'oper_sys','machine_independ','lection_1',3),(18,'oper_sys','machine_independ','lection_2',3),(19,'oper_sys','machine_independ','lection_3',3),(20,'oper_sys','ms_dos','lection_1',3),(21,'oper_sys','ms_dos','lection_2',3),(22,'oper_sys','file_managers','lection_1',3);
/*!40000 ALTER TABLE `completed_lections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam_questions`
--

DROP TABLE IF EXISTS `exam_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exam_questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `section` varchar(45) DEFAULT NULL,
  `topic` varchar(45) DEFAULT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer_1` varchar(150) DEFAULT NULL,
  `answer_2` varchar(150) DEFAULT NULL,
  `answer_3` varchar(150) DEFAULT NULL,
  `answer_4` varchar(150) DEFAULT NULL,
  `correct_answer` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam_questions`
--

LOCK TABLES `exam_questions` WRITE;
/*!40000 ALTER TABLE `exam_questions` DISABLE KEYS */;
INSERT INTO `exam_questions` VALUES (1,'oper_sys','introduction','В какой форме и в какой среде работала первая версия Windows','как 32-битовая ОС','как графическая оболочка win в среде MS-DOS','как утилита в среде MacOS','как приложение к Microsoft Office','как графическая оболочка win в среде MS-DOS'),(2,'oper_sys','introduction','Какая серверная ОС семейства Windows положила начало современной линии Windows 2000/XP/2003/Vista/2008/7','Windows NT','Windows 3.1','Windows 3.11','Windows for workgroups','Windows NT'),(3,'oper_sys','introduction','В каких клиентских ОС семейства Windows был реализован улучшенный GUI, расширенные мультимедийные возможности и механизм Plug-and-Play','Windows XP','Windows NT','Windows 95/98','Windows Embedded','Windows 95/98'),(4,'oper_sys','introduction','Какова основная цель проектирования Windows 2000','переносимость','безопасность','совместимость с POSIX, 16-битовыми Windows и MS DOS','поддержка мобильных устройств','совместимость с POSIX, 16-битовыми Windows и MS DOS'),(10,'oper_sys','introduction','На каком языке написана Windows 2000','Pascal','C','LISP','Python','C'),(11,'oper_sys','introduction','Что такое hardware abstraction layer','API, инкапсулирующий код Windows, зависящий от процессора','универсальный процессор','сервис Windows','виртуальная машина','API, инкапсулирующий код Windows, зависящий от процессора'),(12,'oper_sys','introduction','Какой компонент Windows 2000 работает в защищенном режиме','FAT-32','Pascal','Executive','подсистемы окружения','Executive'),(13,'oper_sys','introduction','Что такое executive','чиновник высшего уровня','исполнительная подсистема ядра Windows 2000, реализующая основные системные сервисы','диспетчер Windows','менеджер управления памятью Windows','исполнительная подсистема ядра Windows 2000, реализующая основные системные сервисы'),(14,'oper_sys','introduction','Какую функцию выполняет executive','менеджер обработки','менеджер виртуальной памяти','менеджер ресурсов','менеджер сетевых устройств','менеджер виртуальной памяти'),(15,'oper_sys','introduction','Какие системные объекты использует ядро Windows','объекты-диспетчеры','объекты-подсистемы','объекты-процессоры','объекты-браузеры','объекты-диспетчеры'),(16,'oper_sys','introduction','В каком состоянии поток в Windows не может находиться','ready','standby','running','spoofing','spoofing'),(17,'oper_sys','introduction','Каким процессам отдается предпочтение при планировании в Windows','real-time','old-time','пакетным','долгим','real-time'),(18,'oper_sys','introduction','Какой механизм используется для обработки ошибок в Windows','включения','сигналы','сообщения','прерывания','прерывания'),(19,'oper_sys','introduction','Какой механизм синхронизации используют процессы ядра Windows','семафоры','мониторы','Spin locks','мьютексы','Spin locks'),(20,'oper_sys','introduction','Какие сущности используются для управления всеми сервисами Windows','переменные','объекты','процедуры','сообщения','объекты'),(21,'oper_sys','introduction','Какая схема организации виртуальной памяти реализована в Windows','сетментная','страничная одноуровневая','страничная двухуровневая','сегментно-страничная','страничная двухуровневая'),(22,'oper_sys','introduction','Каков размер страницы в Windows','4 KB','8 KB','16 KB','32 KB','4 KB'),(23,'oper_sys','introduction','Какой механизм взаимодействия между клиентскими и серверными процессами используется в Windows','локальный вызов процедуры (LPC)','удаленный вызов процедуры (RPC)','удаленный вызов метода (RMI)','TCP/IP','локальный вызов процедуры (LPC)'),(24,'oper_sys','introduction','Какие функции менеджер ввода-вывода Windows не выполняет','управление файловыми системами','управление кэш-памятью ввода-вывода','управление драйверами устройст','управление виртуальной памятью','управление виртуальной памятью'),(25,'oper_sys','introduction','Какая системная структура используется для защиты файла в Windows','атрибуты','системные вызовы','список управления доступом','брандмауэр','список управления доступом'),(26,'oper_sys','introduction','Какая системная информация используется для авторизации процесса в Windows','атрибуты','маркер безопасности процесса','логин и пароль','номер процесса','маркер безопасности процесса'),(27,'oper_sys','introduction','Совместимость с какими ОС и стандартами подсистемы окружения Windows не обеспечивают','MS DOS','16-битовая Windows','POSIX','MacOS','MacOS'),(28,'oper_sys','introduction','Какая информация используется для аутентификации пользователей в Windows','логин и пароль','имя пользователя и имя группы','сертификат','атрибуты','логин и пароль'),(29,'oper_sys','introduction','Какой метод аутентификации используется в Windows','Kerberos','.NET','Java','Microsoft Passport','Kerberos');
/*!40000 ALTER TABLE `exam_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `progress`
--

DROP TABLE IF EXISTS `progress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `progress` (
  `id` int NOT NULL AUTO_INCREMENT,
  `completed_lections` int DEFAULT NULL,
  `completed_tests` int DEFAULT NULL,
  `section` varchar(45) DEFAULT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_progress_user1_idx` (`user_id`),
  CONSTRAINT `fk_progress_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `progress`
--

LOCK TABLES `progress` WRITE;
/*!40000 ALTER TABLE `progress` DISABLE KEYS */;
INSERT INTO `progress` VALUES (1,6,6,'oper_sys',2),(2,12,3,'osn_arch',2),(3,2,4,'oper_sys',6),(4,20,4,'osn_arch',6),(6,11,1,'oper_sys',3);
/*!40000 ALTER TABLE `progress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_results`
--

DROP TABLE IF EXISTS `test_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `test_results` (
  `id` int NOT NULL AUTO_INCREMENT,
  `section` varchar(45) DEFAULT NULL,
  `topic` varchar(45) DEFAULT NULL,
  `topic_full_name` varchar(140) DEFAULT NULL,
  `mark` int DEFAULT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_test_results_user1_idx` (`user_id`),
  CONSTRAINT `fk_test_results_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_results`
--

LOCK TABLES `test_results` WRITE;
/*!40000 ALTER TABLE `test_results` DISABLE KEYS */;
INSERT INTO `test_results` VALUES (2,'oper_sys','unix','Опер. система UNIX',4,2),(3,'oper_sys','linux','Опер. система Linux',3,2),(4,'oper_sys','org_unix','Организация UNIX-систем и...',2,2),(5,'oper_sys','solaris_9','Администрирование ОС Solaris 9',NULL,2),(6,'osn_arch','introduction','Введение',4,2),(7,'osn_arch','topic2','Архитектура ПК',2,2),(8,'osn_arch','topic3','Работа с дисками',5,2),(9,'osn_arch','topic4','Интерфейсы',3,2),(10,'osn_arch','topic5','Сборка ПК',NULL,2),(11,'oper_sys','introduction','Введение',2,2),(13,'oper_sys','introduction','Введение',4,3);
/*!40000 ALTER TABLE `test_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `stud_group` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'Никита','Милиньков','П-31','test@mail.ru','asdqwerty123'),(3,'Алексей','Аннюк','П-31','annuk@gmail.com','zxasqw12'),(6,'Дмитрий','Шутов','П-21','dshutov@mail.ru','shutovd4321'),(13,'Никита','Литвинков','П-32','litvinkov@gmail.com','zasxqwer321'),(24,'Егор','Харалдин','П-22','egor228@gmail.com','egorka_228'),(25,'Евгения','Санникова','П-32','sannikova@gmail.com','sanevg0908');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-24  9:33:23
