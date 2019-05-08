/*
SQLyog Ultimate v8.53 
MySQL - 5.7.17 : Database - zakat_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`zakat_db` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `zakat_db`;

/*Table structure for table `account_table` */

DROP TABLE IF EXISTS `account_table`;

CREATE TABLE `account_table` (
  `accountid` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `accountlevel` tinyint(3) DEFAULT NULL,
  PRIMARY KEY (`accountid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `account_table` */

insert  into `account_table`(`accountid`,`username`,`password`,`accountlevel`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3',1),(2,'amileen','d8e81b542a49b94f634ed049f5aadef8',2),(3,'asd','7815696ecbf1c96e6894b779456d330e',2),(4,'ddd','d41d8cd98f00b204e9800998ecf8427e',2),(5,'Quinto','d41d8cd98f00b204e9800998ecf8427e',2),(6,'1','47bce5c74f589f4867dbd57e9ca9f808',3),(7,'2','47bce5c74f589f4867dbd57e9ca9f808',3),(8,'3','47bce5c74f589f4867dbd57e9ca9f808',3),(9,'4','47bce5c74f589f4867dbd57e9ca9f808',3),(11,'albert','6c5bc43b443975b806740d8e41146479',3),(12,'aaa','47bce5c74f589f4867dbd57e9ca9f808',3),(13,'mmmm','9de37a0627c25684fdd519ca84073e34',3);

/*Table structure for table `amileen_table` */

DROP TABLE IF EXISTS `amileen_table`;

CREATE TABLE `amileen_table` (
  `amileenid` int(6) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(60) DEFAULT NULL,
  `middlename` varchar(60) DEFAULT NULL,
  `lastname` varchar(60) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `accountid` int(6) DEFAULT NULL,
  PRIMARY KEY (`amileenid`),
  KEY `FK_amileen_table` (`accountid`),
  CONSTRAINT `FK_amileen_table` FOREIGN KEY (`accountid`) REFERENCES `account_table` (`accountid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `amileen_table` */

insert  into `amileen_table`(`amileenid`,`firstname`,`middlename`,`lastname`,`birthdate`,`gender`,`accountid`) values (1,'asdas1111','sdasd11','asdasd11','2005-03-05','Male',2),(4,'asdas1111','sdasd11','asdasd11','2005-03-05','Male',5);

/*Table structure for table `barangay_table` */

DROP TABLE IF EXISTS `barangay_table`;

CREATE TABLE `barangay_table` (
  `barangayid` int(6) NOT NULL AUTO_INCREMENT,
  `barangayname` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`barangayid`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `barangay_table` */

insert  into `barangay_table`(`barangayid`,`barangayname`) values (5,'Bambad'),(6,'Bual'),(7,'Dansuli'),(8,'Impao'),(9,'Kalawag I'),(10,'Kalawag II'),(11,'Kalawag III'),(12,'Kenram'),(13,'Kolambog'),(14,'Kudanding'),(15,'Lagandang'),(16,'Laguilayan'),(17,'Mapantig'),(18,'New Pangasinan'),(19,'Sampao'),(20,'Tayugo');

/*Table structure for table `collection_table` */

DROP TABLE IF EXISTS `collection_table`;

CREATE TABLE `collection_table` (
  `collectionid` int(6) NOT NULL AUTO_INCREMENT,
  `amount` double DEFAULT NULL,
  `type` varchar(60) DEFAULT NULL,
  `familyprofileid` int(6) DEFAULT NULL,
  `datepaid` date DEFAULT NULL,
  `amileenid` int(6) DEFAULT NULL,
  PRIMARY KEY (`collectionid`),
  KEY `FK_collection_table` (`familyprofileid`),
  KEY `FK_collection_table1` (`amileenid`),
  CONSTRAINT `FK_collection_table` FOREIGN KEY (`familyprofileid`) REFERENCES `familyprofile_table` (`familyprofileid`),
  CONSTRAINT `FK_collection_table1` FOREIGN KEY (`amileenid`) REFERENCES `amileen_table` (`amileenid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `collection_table` */

insert  into `collection_table`(`collectionid`,`amount`,`type`,`familyprofileid`,`datepaid`,`amileenid`) values (1,875,'Amwal',1,'2018-02-15',1),(2,200,'Fitre',1,'2018-02-15',1),(3,875,'Amwal',6,'2018-02-16',1);

/*Table structure for table `familyprofile_table` */

DROP TABLE IF EXISTS `familyprofile_table`;

CREATE TABLE `familyprofile_table` (
  `familyprofileid` int(6) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(60) DEFAULT NULL,
  `lastname` varchar(60) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(60) DEFAULT NULL,
  `profession` varchar(60) DEFAULT NULL,
  `nameofcompany` varchar(60) DEFAULT NULL,
  `salaryincome` double DEFAULT NULL,
  `householdid` int(6) DEFAULT NULL,
  `accountid` int(6) DEFAULT NULL,
  PRIMARY KEY (`familyprofileid`),
  KEY `FK_familyprofile_table` (`householdid`),
  KEY `FK_familyprofile_table3` (`accountid`),
  CONSTRAINT `FK_familyprofile_table` FOREIGN KEY (`householdid`) REFERENCES `household_table` (`householdid`),
  CONSTRAINT `FK_familyprofile_table3` FOREIGN KEY (`accountid`) REFERENCES `account_table` (`accountid`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `familyprofile_table` */

insert  into `familyprofile_table`(`familyprofileid`,`firstname`,`lastname`,`birthdate`,`gender`,`profession`,`nameofcompany`,`salaryincome`,`householdid`,`accountid`) values (1,'Kaiax','Ganzonx','1986-02-02','Male','Copy writerx','Awthentikzx',220000,1,1),(2,'Guliana','Meneses','1992-05-01','Male','Dairy scientist','Paper Cutter',50000,1,2),(4,'Jan','Riza','2017-12-31','Male','Nurse','Provincial',23000,4,3),(5,'Totoy','Laspa','1998-02-01','Male','Teacher','SKSU',50000,5,4),(6,'asdasdasdas','dasdads','1997-12-31','Male','asda','sdasd',123123123,1,13);

/*Table structure for table `household_table` */

DROP TABLE IF EXISTS `household_table`;

CREATE TABLE `household_table` (
  `householdid` int(6) NOT NULL AUTO_INCREMENT,
  `familyname` varchar(60) DEFAULT NULL,
  `purokid` int(6) DEFAULT NULL,
  PRIMARY KEY (`householdid`),
  KEY `FK_household_table` (`purokid`),
  CONSTRAINT `FK_household_table` FOREIGN KEY (`purokid`) REFERENCES `purok_table` (`purokid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `household_table` */

insert  into `household_table`(`householdid`,`familyname`,`purokid`) values (1,'Masukat',12),(4,'Midtimbang',10),(5,'Silongan',38);

/*Table structure for table `income_table` */

DROP TABLE IF EXISTS `income_table`;

CREATE TABLE `income_table` (
  `incomeid` int(6) NOT NULL AUTO_INCREMENT,
  `money` double DEFAULT NULL,
  `gold` double DEFAULT NULL,
  `silver` double DEFAULT NULL,
  `properties` double DEFAULT NULL,
  `business` double DEFAULT NULL,
  `preciousstones` double DEFAULT NULL,
  `rices` double DEFAULT NULL,
  `corns` double DEFAULT NULL,
  `householdid` int(6) DEFAULT NULL,
  `totalzakatdeduction` double DEFAULT NULL,
  PRIMARY KEY (`incomeid`),
  KEY `FK_income_table` (`householdid`),
  CONSTRAINT `FK_income_table` FOREIGN KEY (`householdid`) REFERENCES `household_table` (`householdid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `income_table` */

insert  into `income_table`(`incomeid`,`money`,`gold`,`silver`,`properties`,`business`,`preciousstones`,`rices`,`corns`,`householdid`,`totalzakatdeduction`) values (1,5000,5000,0,5000,0,0,5000,5000,1,875),(6,50000,0,0,0,0,0,0,0,4,1250),(7,0,0,100,3000,0,0,0,0,5,1250);

/*Table structure for table `purok_table` */

DROP TABLE IF EXISTS `purok_table`;

CREATE TABLE `purok_table` (
  `purokid` int(6) NOT NULL AUTO_INCREMENT,
  `purokname` varchar(60) DEFAULT NULL,
  `barangayid` int(6) DEFAULT NULL,
  PRIMARY KEY (`purokid`),
  KEY `FK_purok_table` (`barangayid`),
  CONSTRAINT `FK_purok_table` FOREIGN KEY (`barangayid`) REFERENCES `barangay_table` (`barangayid`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

/*Data for the table `purok_table` */

insert  into `purok_table`(`purokid`,`purokname`,`barangayid`) values (4,'Purok Ilang Ilang',11),(5,'Purok Waling Waling',11),(6,'Purok Bouganvilla',11),(7,'Purok Sunflower',11),(8,'Purok Hiso',11),(9,'Purok Mamantal',11),(10,'Purok Masagana',10),(11,'Purok Pagasa',10),(12,'Purok Pagkakaisa',10),(13,'PC Barracks',10),(14,'Galinato Village',10),(15,'Leonora Homes',10),(16,'Purok 1',7),(17,'Purok 2',7),(18,'Purok 3',7),(19,'Purok 4',7),(20,'Purok 5',7),(21,'Purok 6',7),(22,'Purok 7',7),(23,'Purok 8',7),(24,'Purok 9',7),(25,'Purok 10',7),(26,'Purok 1',16),(27,'Purok 2',16),(28,'Purok 3',16),(29,'Purok 4',16),(30,'Purok 5',16),(31,'Purok 6',16),(32,'Purok 7',16),(33,'Sitio Kamanga',16),(34,'Sitio Kulumpang',16),(35,'Purok 1',6),(36,'Purok 2',6),(37,'Purok 3',6),(38,'Purok 4',6),(39,'Purok 5',6),(40,'Purok 6',6),(41,'Purok 7',6),(42,'Purok 1',15),(43,'Purok 2',15),(44,'Purok 3',15),(45,'Purok 4',15),(46,'Purok 5',15),(47,'Purok 6',15),(48,'Purok Paraiso',9),(49,'Purok Bliss',9),(50,'Purok Honorata',9),(51,'Purok 2',14),(52,'Purok 3',14),(53,'Purok 4',14),(54,'Purok Arsenio A',14),(55,'Purok Arsenio B',14),(56,'Purok K.R.C.',14),(57,'Purok Santo Ni',14),(58,'Purok Melagrosa',14),(59,'Purok Sumensil',17),(60,'Purok Midtimbang',17),(61,'Purok Salaligan',17),(62,'Purok Riverside',17),(63,'Purok Maligaya',17),(64,'Purok Malipayon',17),(65,'Purok Mangga',17);

/*Table structure for table `account_view` */

DROP TABLE IF EXISTS `account_view`;

/*!50001 DROP VIEW IF EXISTS `account_view` */;
/*!50001 DROP TABLE IF EXISTS `account_view` */;

/*!50001 CREATE TABLE  `account_view`(
 `accountid` int(6) ,
 `username` varchar(60) ,
 `password` varchar(60) ,
 `accountlevel` tinyint(3) ,
 `gender` varchar(10) ,
 `birthdate` date ,
 `lastname` varchar(60) ,
 `middlename` varchar(60) ,
 `firstname` varchar(60) ,
 `amileenid` int(6) 
)*/;

/*Table structure for table `amileen_view` */

DROP TABLE IF EXISTS `amileen_view`;

/*!50001 DROP VIEW IF EXISTS `amileen_view` */;
/*!50001 DROP TABLE IF EXISTS `amileen_view` */;

/*!50001 CREATE TABLE  `amileen_view`(
 `accountid` int(6) ,
 `username` varchar(60) ,
 `password` varchar(60) ,
 `accountlevel` tinyint(3) ,
 `firstname` varchar(60) ,
 `amileenid` int(6) ,
 `middlename` varchar(60) ,
 `lastname` varchar(60) ,
 `fullname` varchar(182) ,
 `birthdate` date ,
 `gender` varchar(10) 
)*/;

/*Table structure for table `amwal_view` */

DROP TABLE IF EXISTS `amwal_view`;

/*!50001 DROP VIEW IF EXISTS `amwal_view` */;
/*!50001 DROP TABLE IF EXISTS `amwal_view` */;

/*!50001 CREATE TABLE  `amwal_view`(
 `householdid` int(6) ,
 `familyname` varchar(60) ,
 `purokid` int(6) ,
 `money` double ,
 `gold` double ,
 `silver` double ,
 `properties` double ,
 `business` double ,
 `preciousstones` double ,
 `rices` double ,
 `corns` double ,
 `totalassets` double ,
 `totalzakatdeduction` double 
)*/;

/*Table structure for table `barangay_view` */

DROP TABLE IF EXISTS `barangay_view`;

/*!50001 DROP VIEW IF EXISTS `barangay_view` */;
/*!50001 DROP TABLE IF EXISTS `barangay_view` */;

/*!50001 CREATE TABLE  `barangay_view`(
 `barangayid` int(6) ,
 `barangayname` varchar(60) 
)*/;

/*Table structure for table `familyprofile_view` */

DROP TABLE IF EXISTS `familyprofile_view`;

/*!50001 DROP VIEW IF EXISTS `familyprofile_view` */;
/*!50001 DROP TABLE IF EXISTS `familyprofile_view` */;

/*!50001 CREATE TABLE  `familyprofile_view`(
 `familyprofileid` int(6) ,
 `firstname` varchar(60) ,
 `lastname` varchar(60) ,
 `fullname` varchar(121) ,
 `birthdate` date ,
 `gender` varchar(60) ,
 `profession` varchar(60) ,
 `nameofcompany` varchar(60) ,
 `householdid` int(6) ,
 `salaryincome` double ,
 `accountid` int(6) ,
 `username` varchar(60) ,
 `password` varchar(60) ,
 `accountlevel` tinyint(3) ,
 `familyname` varchar(60) ,
 `purokid` int(6) ,
 `purokname` varchar(60) ,
 `barangayid` int(6) ,
 `barangayname` varchar(60) 
)*/;

/*Table structure for table `fitre_view` */

DROP TABLE IF EXISTS `fitre_view`;

/*!50001 DROP VIEW IF EXISTS `fitre_view` */;
/*!50001 DROP TABLE IF EXISTS `fitre_view` */;

/*!50001 CREATE TABLE  `fitre_view`(
 `familyprofileid` int(6) ,
 `firstname` varchar(60) ,
 `lastname` varchar(60) ,
 `birthdate` date ,
 `gender` varchar(60) ,
 `profession` varchar(60) ,
 `nameofcompany` varchar(60) ,
 `salaryincome` double ,
 `householdid` int(6) ,
 `familyname` varchar(60) ,
 `purokid` int(6) ,
 `totalfamilymember` bigint(21) ,
 `totalpaymentfitre` bigint(24) 
)*/;

/*Table structure for table `household_view` */

DROP TABLE IF EXISTS `household_view`;

/*!50001 DROP VIEW IF EXISTS `household_view` */;
/*!50001 DROP TABLE IF EXISTS `household_view` */;

/*!50001 CREATE TABLE  `household_view`(
 `householdid` int(6) ,
 `familyname` varchar(60) ,
 `purokid` int(6) ,
 `purokname` varchar(60) ,
 `barangayid` int(6) ,
 `barangayname` varchar(60) 
)*/;

/*Table structure for table `payment_history_view` */

DROP TABLE IF EXISTS `payment_history_view`;

/*!50001 DROP VIEW IF EXISTS `payment_history_view` */;
/*!50001 DROP TABLE IF EXISTS `payment_history_view` */;

/*!50001 CREATE TABLE  `payment_history_view`(
 `collectionid` int(6) ,
 `amount` double ,
 `type` varchar(60) ,
 `familyprofileid` int(6) ,
 `datepaid` date ,
 `amileenid` int(6) ,
 `afullname` varchar(182) ,
 `ffullname` varchar(121) ,
 `householdid` int(6) ,
 `accountid` int(6) ,
 `familyname` varchar(60) ,
 `purokid` int(6) ,
 `purokname` varchar(60) ,
 `barangayid` int(6) ,
 `barangayname` varchar(60) ,
 `money` double ,
 `gold` double ,
 `silver` double ,
 `incomeid` int(6) ,
 `properties` double ,
 `business` double ,
 `preciousstones` double ,
 `rices` double ,
 `corns` double ,
 `totalzakatdeduction` double 
)*/;

/*Table structure for table `purok_view` */

DROP TABLE IF EXISTS `purok_view`;

/*!50001 DROP VIEW IF EXISTS `purok_view` */;
/*!50001 DROP TABLE IF EXISTS `purok_view` */;

/*!50001 CREATE TABLE  `purok_view`(
 `purokid` int(6) ,
 `purokname` varchar(60) ,
 `barangayid` int(6) ,
 `barangayname` varchar(60) 
)*/;

/*Table structure for table `remittance_view` */

DROP TABLE IF EXISTS `remittance_view`;

/*!50001 DROP VIEW IF EXISTS `remittance_view` */;
/*!50001 DROP TABLE IF EXISTS `remittance_view` */;

/*!50001 CREATE TABLE  `remittance_view`(
 `collectionid` int(6) ,
 `amount` double ,
 `type` varchar(60) ,
 `familyprofileid` int(6) ,
 `datepaid` date ,
 `amileenid` int(6) ,
 `afullname` varchar(182) ,
 `ffullname` varchar(121) ,
 `householdid` int(6) ,
 `familyname` varchar(60) ,
 `purokid` int(6) ,
 `purokname` varchar(60) ,
 `barangayid` int(6) ,
 `barangayname` varchar(60) 
)*/;

/*View structure for view account_view */

/*!50001 DROP TABLE IF EXISTS `account_view` */;
/*!50001 DROP VIEW IF EXISTS `account_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `account_view` AS select `account_table`.`accountid` AS `accountid`,`account_table`.`username` AS `username`,`account_table`.`password` AS `password`,`account_table`.`accountlevel` AS `accountlevel`,`amileen_table`.`gender` AS `gender`,`amileen_table`.`birthdate` AS `birthdate`,`amileen_table`.`lastname` AS `lastname`,`amileen_table`.`middlename` AS `middlename`,`amileen_table`.`firstname` AS `firstname`,`amileen_table`.`amileenid` AS `amileenid` from (`amileen_table` join `account_table` on((`amileen_table`.`accountid` = `account_table`.`accountid`))) */;

/*View structure for view amileen_view */

/*!50001 DROP TABLE IF EXISTS `amileen_view` */;
/*!50001 DROP VIEW IF EXISTS `amileen_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `amileen_view` AS select `account_table`.`accountid` AS `accountid`,`account_table`.`username` AS `username`,`account_table`.`password` AS `password`,`account_table`.`accountlevel` AS `accountlevel`,`amileen_table`.`firstname` AS `firstname`,`amileen_table`.`amileenid` AS `amileenid`,`amileen_table`.`middlename` AS `middlename`,`amileen_table`.`lastname` AS `lastname`,concat(`amileen_table`.`firstname`,' ',`amileen_table`.`middlename`,' ',`amileen_table`.`lastname`) AS `fullname`,`amileen_table`.`birthdate` AS `birthdate`,`amileen_table`.`gender` AS `gender` from (`amileen_table` join `account_table` on((`amileen_table`.`accountid` = `account_table`.`accountid`))) */;

/*View structure for view amwal_view */

/*!50001 DROP TABLE IF EXISTS `amwal_view` */;
/*!50001 DROP VIEW IF EXISTS `amwal_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `amwal_view` AS select `household_table`.`householdid` AS `householdid`,`household_table`.`familyname` AS `familyname`,`household_table`.`purokid` AS `purokid`,`income_table`.`money` AS `money`,`income_table`.`gold` AS `gold`,`income_table`.`silver` AS `silver`,`income_table`.`properties` AS `properties`,`income_table`.`business` AS `business`,`income_table`.`preciousstones` AS `preciousstones`,`income_table`.`rices` AS `rices`,`income_table`.`corns` AS `corns`,(((((((`income_table`.`money` + `income_table`.`gold`) + `income_table`.`silver`) + `income_table`.`properties`) + `income_table`.`business`) + `income_table`.`preciousstones`) + `income_table`.`rices`) + `income_table`.`corns`) AS `totalassets`,`income_table`.`totalzakatdeduction` AS `totalzakatdeduction` from ((`familyprofile_table` join `household_table` on((`familyprofile_table`.`householdid` = `household_table`.`householdid`))) join `income_table` on((`income_table`.`householdid` = `household_table`.`householdid`))) group by `household_table`.`householdid` */;

/*View structure for view barangay_view */

/*!50001 DROP TABLE IF EXISTS `barangay_view` */;
/*!50001 DROP VIEW IF EXISTS `barangay_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barangay_view` AS select `barangay_table`.`barangayid` AS `barangayid`,`barangay_table`.`barangayname` AS `barangayname` from `barangay_table` */;

/*View structure for view familyprofile_view */

/*!50001 DROP TABLE IF EXISTS `familyprofile_view` */;
/*!50001 DROP VIEW IF EXISTS `familyprofile_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `familyprofile_view` AS select `familyprofile_table`.`familyprofileid` AS `familyprofileid`,`familyprofile_table`.`firstname` AS `firstname`,`familyprofile_table`.`lastname` AS `lastname`,concat(`familyprofile_table`.`firstname`,' ',`familyprofile_table`.`lastname`) AS `fullname`,`familyprofile_table`.`birthdate` AS `birthdate`,`familyprofile_table`.`gender` AS `gender`,`familyprofile_table`.`profession` AS `profession`,`familyprofile_table`.`nameofcompany` AS `nameofcompany`,`familyprofile_table`.`householdid` AS `householdid`,`familyprofile_table`.`salaryincome` AS `salaryincome`,`familyprofile_table`.`accountid` AS `accountid`,`account_table`.`username` AS `username`,`account_table`.`password` AS `password`,`account_table`.`accountlevel` AS `accountlevel`,`household_table`.`familyname` AS `familyname`,`household_table`.`purokid` AS `purokid`,`purok_table`.`purokname` AS `purokname`,`purok_table`.`barangayid` AS `barangayid`,`barangay_table`.`barangayname` AS `barangayname` from ((((`familyprofile_table` join `household_table` on((`familyprofile_table`.`householdid` = `household_table`.`householdid`))) join `purok_table` on((`household_table`.`purokid` = `purok_table`.`purokid`))) join `barangay_table` on((`purok_table`.`barangayid` = `barangay_table`.`barangayid`))) join `account_table` on((`familyprofile_table`.`accountid` = `account_table`.`accountid`))) */;

/*View structure for view fitre_view */

/*!50001 DROP TABLE IF EXISTS `fitre_view` */;
/*!50001 DROP VIEW IF EXISTS `fitre_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `fitre_view` AS select `familyprofile_table`.`familyprofileid` AS `familyprofileid`,`familyprofile_table`.`firstname` AS `firstname`,`familyprofile_table`.`lastname` AS `lastname`,`familyprofile_table`.`birthdate` AS `birthdate`,`familyprofile_table`.`gender` AS `gender`,`familyprofile_table`.`profession` AS `profession`,`familyprofile_table`.`nameofcompany` AS `nameofcompany`,`familyprofile_table`.`salaryincome` AS `salaryincome`,`familyprofile_table`.`householdid` AS `householdid`,`household_table`.`familyname` AS `familyname`,`household_table`.`purokid` AS `purokid`,count(`familyprofile_table`.`householdid`) AS `totalfamilymember`,(count(`familyprofile_table`.`householdid`) * 100) AS `totalpaymentfitre` from (`familyprofile_table` join `household_table` on((`familyprofile_table`.`householdid` = `household_table`.`householdid`))) group by `familyprofile_table`.`householdid` */;

/*View structure for view household_view */

/*!50001 DROP TABLE IF EXISTS `household_view` */;
/*!50001 DROP VIEW IF EXISTS `household_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `household_view` AS select `household_table`.`householdid` AS `householdid`,`household_table`.`familyname` AS `familyname`,`household_table`.`purokid` AS `purokid`,`purok_table`.`purokname` AS `purokname`,`purok_table`.`barangayid` AS `barangayid`,`barangay_table`.`barangayname` AS `barangayname` from ((`household_table` join `purok_table` on((`household_table`.`purokid` = `purok_table`.`purokid`))) join `barangay_table` on((`purok_table`.`barangayid` = `barangay_table`.`barangayid`))) */;

/*View structure for view payment_history_view */

/*!50001 DROP TABLE IF EXISTS `payment_history_view` */;
/*!50001 DROP VIEW IF EXISTS `payment_history_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `payment_history_view` AS select `collection_table`.`collectionid` AS `collectionid`,`collection_table`.`amount` AS `amount`,`collection_table`.`type` AS `type`,`collection_table`.`familyprofileid` AS `familyprofileid`,`collection_table`.`datepaid` AS `datepaid`,`collection_table`.`amileenid` AS `amileenid`,`amileen_view`.`fullname` AS `afullname`,`familyprofile_view`.`fullname` AS `ffullname`,`familyprofile_view`.`householdid` AS `householdid`,`familyprofile_view`.`accountid` AS `accountid`,`household_table`.`familyname` AS `familyname`,`household_table`.`purokid` AS `purokid`,`purok_table`.`purokname` AS `purokname`,`purok_table`.`barangayid` AS `barangayid`,`barangay_table`.`barangayname` AS `barangayname`,`income_table`.`money` AS `money`,`income_table`.`gold` AS `gold`,`income_table`.`silver` AS `silver`,`income_table`.`incomeid` AS `incomeid`,`income_table`.`properties` AS `properties`,`income_table`.`business` AS `business`,`income_table`.`preciousstones` AS `preciousstones`,`income_table`.`rices` AS `rices`,`income_table`.`corns` AS `corns`,`income_table`.`totalzakatdeduction` AS `totalzakatdeduction` from ((((((`amileen_view` join `collection_table` on((`amileen_view`.`amileenid` = `collection_table`.`amileenid`))) join `familyprofile_view` on((`collection_table`.`familyprofileid` = `familyprofile_view`.`familyprofileid`))) join `household_table` on((`familyprofile_view`.`householdid` = `household_table`.`householdid`))) join `purok_table` on((`household_table`.`purokid` = `purok_table`.`purokid`))) join `barangay_table` on((`purok_table`.`barangayid` = `barangay_table`.`barangayid`))) join `income_table` on((`income_table`.`householdid` = `household_table`.`householdid`))) */;

/*View structure for view purok_view */

/*!50001 DROP TABLE IF EXISTS `purok_view` */;
/*!50001 DROP VIEW IF EXISTS `purok_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `purok_view` AS select `purok_table`.`purokid` AS `purokid`,`purok_table`.`purokname` AS `purokname`,`purok_table`.`barangayid` AS `barangayid`,`barangay_table`.`barangayname` AS `barangayname` from (`purok_table` join `barangay_table` on((`purok_table`.`barangayid` = `barangay_table`.`barangayid`))) */;

/*View structure for view remittance_view */

/*!50001 DROP TABLE IF EXISTS `remittance_view` */;
/*!50001 DROP VIEW IF EXISTS `remittance_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `remittance_view` AS select `collection_table`.`collectionid` AS `collectionid`,`collection_table`.`amount` AS `amount`,`collection_table`.`type` AS `type`,`collection_table`.`familyprofileid` AS `familyprofileid`,`collection_table`.`datepaid` AS `datepaid`,`collection_table`.`amileenid` AS `amileenid`,`amileen_view`.`fullname` AS `afullname`,`familyprofile_view`.`fullname` AS `ffullname`,`familyprofile_view`.`householdid` AS `householdid`,`household_table`.`familyname` AS `familyname`,`household_table`.`purokid` AS `purokid`,`purok_table`.`purokname` AS `purokname`,`purok_table`.`barangayid` AS `barangayid`,`barangay_table`.`barangayname` AS `barangayname` from (((((`amileen_view` join `collection_table` on((`amileen_view`.`amileenid` = `collection_table`.`amileenid`))) join `familyprofile_view` on((`collection_table`.`familyprofileid` = `familyprofile_view`.`familyprofileid`))) join `household_table` on((`familyprofile_view`.`householdid` = `household_table`.`householdid`))) join `purok_table` on((`household_table`.`purokid` = `purok_table`.`purokid`))) join `barangay_table` on((`purok_table`.`barangayid` = `barangay_table`.`barangayid`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
