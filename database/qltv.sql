-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: localhost    Database: qltv
-- ------------------------------------------------------
-- Server version	8.0.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `baocao`
--

DROP TABLE IF EXISTS `baocao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `baocao` (
  `mabaocao` int(11) NOT NULL AUTO_INCREMENT,
  `loinhuan` int(20) NOT NULL,
  `ngaylap` date NOT NULL,
  `manv` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`mabaocao`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `baocao`
--

LOCK TABLES `baocao` WRITE;
/*!40000 ALTER TABLE `baocao` DISABLE KEYS */;
INSERT INTO `baocao` VALUES (1,25000,'2022-03-01','41'),(2,50000,'2022-03-02','2'),(4,1230000,'2022-03-01','4');
/*!40000 ALTER TABLE `baocao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docgia`
--

DROP TABLE IF EXISTS `docgia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `docgia` (
  `madocgia` int(11) NOT NULL AUTO_INCREMENT,
  `hotendg` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachidg` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nguoidung` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkhau` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`madocgia`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docgia`
--

LOCK TABLES `docgia` WRITE;
/*!40000 ALTER TABLE `docgia` DISABLE KEYS */;
INSERT INTO `docgia` VALUES (2,'nguyễn phương chính','Hoàn Kiếm - Hà Nội','dat145','c4ca4238a0b923820dcc509a6f75849b'),(3,'Phan Trọng Nghĩa','Ba ĐÌnh - Hà Nội','user','142a3a6873030906bf23dbdede682ab5');
/*!40000 ALTER TABLE `docgia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhanvien`
--

DROP TABLE IF EXISTS `nhanvien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `nhanvien` (
  `manv` int(11) NOT NULL AUTO_INCREMENT,
  `hoten` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `sdt` int(10) NOT NULL,
  `diachi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`manv`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhanvien`
--

LOCK TABLES `nhanvien` WRITE;
/*!40000 ALTER TABLE `nhanvien` DISABLE KEYS */;
INSERT INTO `nhanvien` VALUES (1,'Trường Chinh','2001-03-01',398072144,'123 Trường Chinh'),(2,'Trần Minh Ngọc','1997-05-02',949459173,'12 Nguyễn Kiệm');
/*!40000 ALTER TABLE `nhanvien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhaxb`
--

DROP TABLE IF EXISTS `nhaxb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `nhaxb` (
  `manxb` int(11) NOT NULL AUTO_INCREMENT,
  `tennxb` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachinxb` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`manxb`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhaxb`
--

LOCK TABLES `nhaxb` WRITE;
/*!40000 ALTER TABLE `nhaxb` DISABLE KEYS */;
INSERT INTO `nhaxb` VALUES (1,'Nhà xuất bản trẻ','161B Lý Chính Thắng, Phường 7, Quận 3, TP. Hồ Chí Minh','hopthubandoc@nxbtre.com.vn','https://lib.tbtu.edu.vn/vt'),(2,'Nhà xuất bản Kim Đồng','55 Quang Trung, Hà Nội, Việt Nam','info@nxbkimdong.com.vn','http://www.hoasen.edu.vn/'),(3,'Nhà xuất bản Đại học quốc gia Hà Nội','16 Hàng Chuối, Phan Đình Hổ, Hai Bà Trưng, Hà Nội','nxb@vnu.edu.vn','http://library.hust.edu.vn');
/*!40000 ALTER TABLE `nhaxb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phieumuon`
--

DROP TABLE IF EXISTS `phieumuon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `phieumuon` (
  `mamt` int(11) NOT NULL AUTO_INCREMENT,
  `madocgia` int(11) NOT NULL,
  `ngaymuon` date NOT NULL,
  `ngaytra` date NOT NULL,
  `tien` int(11) NOT NULL,
  `tensach` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`mamt`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phieumuon`
--

LOCK TABLES `phieumuon` WRITE;
/*!40000 ALTER TABLE `phieumuon` DISABLE KEYS */;
INSERT INTO `phieumuon` VALUES (1,12,'2022-03-01','2022-03-24',25000,'Tin Học Đại Cương','1'),(14,5,'2022-05-18','2111-11-11',50000,'Tin Học Đại Cương','11'),(15,5,'2022-05-18','2111-11-11',550000,'Tin Học Đại Cương','11');
/*!40000 ALTER TABLE `phieumuon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quyentruycap`
--

DROP TABLE IF EXISTS `quyentruycap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `quyentruycap` (
  `maquyen` int(11) NOT NULL AUTO_INCREMENT,
  `tenquyen` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `web` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`maquyen`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quyentruycap`
--

LOCK TABLES `quyentruycap` WRITE;
/*!40000 ALTER TABLE `quyentruycap` DISABLE KEYS */;
INSERT INTO `quyentruycap` VALUES (1,'quanlytaikhoan','qltk.php','quản lý tài khoản'),(2,'quanlybaocao','qlbaocao.php','quản lý báo cáo'),(4,'quanlyphieumuontra','qlpmt.php','quản lý phiếu mượn trả'),(5,'quanlynhanvien','qlnv.php','quản lý nhân viên'),(6,'quanlysach','qlsach.php','quản lý sách');
/*!40000 ALTER TABLE `quyentruycap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sach`
--

DROP TABLE IF EXISTS `sach`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `sach` (
  `masach` int(11) NOT NULL AUTO_INCREMENT,
  `tensach` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `matacgia` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `matheloai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `manxb` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong` int(3) NOT NULL,
  `tienmuon` int(10) DEFAULT NULL,
  PRIMARY KEY (`masach`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sach`
--

LOCK TABLES `sach` WRITE;
/*!40000 ALTER TABLE `sach` DISABLE KEYS */;
INSERT INTO `sach` VALUES (1,'Tin Học Đại Cương','Vong Ngữ','bài giảng','Kim Đồng',157,50000),(2,'Đại Số Tuyến Tính','Nhĩ Căn','Tài liệu học tập','Kim Đồng',24,50000),(3,'Quản Lý Nhân Lực','Tam Thiên','Khoa học công nghệ – Kinh tế','NXB Trẻ',15,50000),(8,'ngục tù','Nhĩ Căn','bài giảng','Kim Đồng',123,250000);
/*!40000 ALTER TABLE `sach` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tacgia`
--

DROP TABLE IF EXISTS `tacgia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tacgia` (
  `matacgia` int(11) NOT NULL,
  `tentacgia` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`matacgia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tacgia`
--

LOCK TABLES `tacgia` WRITE;
/*!40000 ALTER TABLE `tacgia` DISABLE KEYS */;
INSERT INTO `tacgia` VALUES (1,'Trần Đình Khang','trandinhkhang@gmail.com','79 Phan Châu Trinh'),(2,'Dương Quốc Việt','duongquocviet@gmail.com','80 Phong Dinh Cang'),(3,'Shawn Smith','shawn@gmail.com','14 Wall Street');
/*!40000 ALTER TABLE `tacgia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taikhoan`
--

DROP TABLE IF EXISTS `taikhoan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `taikhoan` (
  `matk` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`matk`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taikhoan`
--

LOCK TABLES `taikhoan` WRITE;
/*!40000 ALTER TABLE `taikhoan` DISABLE KEYS */;
INSERT INTO `taikhoan` VALUES (5,'đặng minh hiếu','admin@gmail.com','c4ca4238a0b923820dcc509a6f75849b','quanli'),(51,'quantri','quantri@gmail.com','c4ca4238a0b923820dcc509a6f75849b','quantri'),(52,'thủ thư','thuthu@gmail.com','c4ca4238a0b923820dcc509a6f75849b','thuthu'),(53,'hieues','quanli@gmail.com','c4ca4238a0b923820dcc509a6f75849b','quanli'),(54,'123a','11@gmail.com','c4ca4238a0b923820dcc509a6f75849b','docgia'),(57,'docgia','docgia@gmail.com','c4ca4238a0b923820dcc509a6f75849b','docgia');
/*!40000 ALTER TABLE `taikhoan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theloai`
--

DROP TABLE IF EXISTS `theloai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `theloai` (
  `matheloai` int(11) NOT NULL AUTO_INCREMENT,
  `tentheloai` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`matheloai`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theloai`
--

LOCK TABLES `theloai` WRITE;
/*!40000 ALTER TABLE `theloai` DISABLE KEYS */;
INSERT INTO `theloai` VALUES (1,'Tin học'),(2,'Toán học'),(3,'Giáo trình'),(4,'Triết học'),(5,'Tiểu thuyết');
/*!40000 ALTER TABLE `theloai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userprivilege`
--

DROP TABLE IF EXISTS `userprivilege`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `userprivilege` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `matk` int(11) NOT NULL,
  `maquyen` int(11) NOT NULL,
  `chophep` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `them` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `xoa` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sua` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userprivilege`
--

LOCK TABLES `userprivilege` WRITE;
/*!40000 ALTER TABLE `userprivilege` DISABLE KEYS */;
INSERT INTO `userprivilege` VALUES (38,5,1,'true','true','true','true'),(39,5,2,'true','true','true','true'),(40,5,3,'true','true','true','true'),(41,5,4,'true','true','true','true'),(42,5,5,'true','true','true','true'),(43,5,6,'true','true','true','true'),(63,7,1,'true','false','true','false'),(64,7,2,'false','true','true','true'),(65,7,3,'false','false','false','false'),(66,7,4,'false','false','false','false'),(67,7,5,'false','false','false','false'),(68,31,2,'true','true','true','true'),(69,31,3,'true','true','true','true'),(70,31,4,'true','true','true','true'),(71,31,5,'true','true','true','true'),(72,31,6,'true','true','true','true'),(73,33,3,'true','true','true','true'),(74,33,6,'true','true','true','true'),(75,35,3,'false','false','false','false'),(76,35,6,'true','true','true','true'),(77,36,3,'true','false','false','false'),(78,36,6,'false','false','false','false'),(79,37,3,'true','true','true','true'),(80,37,6,'true','true','true','true'),(81,38,3,'true','true','true','true'),(82,38,6,'true','true','true','true'),(83,39,3,'true','false','false','false'),(84,39,6,'false','false','false','false'),(85,40,1,'true','true','true','true'),(86,35,1,'true','true','true','true'),(87,35,2,'true','true','true','true'),(88,35,5,'true','true','true','true'),(89,35,4,'false','false','false','false'),(90,41,3,'true','false','true','false'),(91,41,6,'true','false','true','false'),(92,41,1,'true','false','true','false'),(93,41,2,'true','false','true','false'),(94,41,5,'true','false','true','false'),(95,41,4,'true','false','true','false'),(96,42,3,'true','true','true','true'),(97,42,6,'true','true','true','true'),(100,48,3,'true','false','false','false'),(101,48,6,'false','false','false','false'),(102,49,4,'true','false','false','false'),(103,49,6,'false','false','false','false'),(104,50,4,'true','false','false','false'),(105,50,6,'true','false','false','false'),(106,51,1,'true','true','true','true'),(107,52,3,'true','false','false','false'),(108,52,6,'true','false','false','false'),(109,53,2,'true','true','true','true'),(110,53,3,'true','true','true','true'),(111,53,4,'true','true','true','true'),(112,53,5,'true','true','true','true'),(113,53,6,'true','true','true','true'),(114,54,4,'true','true','false','false'),(115,54,6,'true','false','false','false'),(116,55,3,'true','false','false','false'),(117,55,6,'true','false','false','false'),(118,56,4,'true','false','false','false'),(119,56,6,'true','false','false','false'),(120,57,4,'true','true','false','false'),(121,57,6,'true','false','false','false'),(122,52,1,'true','false','false','false'),(123,52,2,'true','false','false','false'),(124,52,4,'true','false','false','false'),(125,52,5,'true','false','false','false');
/*!40000 ALTER TABLE `userprivilege` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-21 21:48:00
