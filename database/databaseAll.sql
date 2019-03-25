-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for databaseall
CREATE DATABASE IF NOT EXISTS `databaseall` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `databaseall`;

-- Dumping structure for table databaseall.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `ID` char(10) NOT NULL DEFAULT '',
  `Username` char(35) NOT NULL DEFAULT '',
  `Password` char(255) NOT NULL DEFAULT '',
  `Name` char(35) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table databaseall.admin: ~1 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`ID`, `Username`, `Password`, `Name`) VALUES
	('0000000000', 'Admin', '$2y$10$.dW20wtg.F8V/tI8gAYsnORpSX54Hqin/8daqK5Xh4NOUBNT/BgzO', 'Administrator');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table databaseall.coursegrade
CREATE TABLE IF NOT EXISTS `coursegrade` (
  `CourseID` char(8) NOT NULL DEFAULT '',
  `StudentID` char(10) NOT NULL DEFAULT '',
  `Grade` char(2) NOT NULL DEFAULT '',
  KEY `CourseID` (`CourseID`),
  KEY `StudentID` (`StudentID`),
  CONSTRAINT `coursegrade_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `courseinfo` (`CourseID`),
  CONSTRAINT `coursegrade_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `student` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table databaseall.coursegrade: ~0 rows (approximately)
/*!40000 ALTER TABLE `coursegrade` DISABLE KEYS */;
/*!40000 ALTER TABLE `coursegrade` ENABLE KEYS */;

-- Dumping structure for table databaseall.courseinfo
CREATE TABLE IF NOT EXISTS `courseinfo` (
  `CourseID` char(8) NOT NULL DEFAULT '',
  `Name` char(35) NOT NULL DEFAULT '',
  `Credit` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`CourseID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table databaseall.courseinfo: ~3 rows (approximately)
/*!40000 ALTER TABLE `courseinfo` DISABLE KEYS */;
INSERT INTO `courseinfo` (`CourseID`, `Name`, `Credit`) VALUES
	('01418114', 'Introduction to Computer Science', 4),
	('01418390', 'Cooperative Education Preparation', 1),
	('01418497', 'Seminar', 1);
/*!40000 ALTER TABLE `courseinfo` ENABLE KEYS */;

-- Dumping structure for table databaseall.coursescore
CREATE TABLE IF NOT EXISTS `coursescore` (
  `CourseID` char(8) NOT NULL DEFAULT '',
  `StudentID` char(10) NOT NULL DEFAULT '',
  `Topic` char(20) NOT NULL DEFAULT '',
  `Score` int(3) NOT NULL DEFAULT '0',
  KEY `CourseID` (`CourseID`),
  KEY `StudentID` (`StudentID`),
  CONSTRAINT `coursescore_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `courseinfo` (`CourseID`),
  CONSTRAINT `coursescore_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `student` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table databaseall.coursescore: ~0 rows (approximately)
/*!40000 ALTER TABLE `coursescore` DISABLE KEYS */;
/*!40000 ALTER TABLE `coursescore` ENABLE KEYS */;

-- Dumping structure for table databaseall.coursetopic
CREATE TABLE IF NOT EXISTS `coursetopic` (
  `CourseID` char(8) NOT NULL DEFAULT '',
  `Topic` char(20) NOT NULL DEFAULT '',
  `Weight` int(3) NOT NULL DEFAULT '0',
  `MaxScore` int(3) NOT NULL DEFAULT '0',
  `ScoreAnnounceDate` date DEFAULT NULL,
  KEY `CourseID` (`CourseID`),
  CONSTRAINT `coursetopic_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `courseinfo` (`CourseID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table databaseall.coursetopic: ~0 rows (approximately)
/*!40000 ALTER TABLE `coursetopic` DISABLE KEYS */;
/*!40000 ALTER TABLE `coursetopic` ENABLE KEYS */;

-- Dumping structure for table databaseall.prerequisite
CREATE TABLE IF NOT EXISTS `prerequisite` (
  `CourseID` char(8) NOT NULL DEFAULT '',
  `PreCourseID` char(8) NOT NULL DEFAULT '',
  KEY `CourseID` (`CourseID`),
  KEY `PreCourseID` (`PreCourseID`),
  CONSTRAINT `prerequisite_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `courseinfo` (`CourseID`),
  CONSTRAINT `prerequisite_ibfk_2` FOREIGN KEY (`PreCourseID`) REFERENCES `courseinfo` (`CourseID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table databaseall.prerequisite: ~0 rows (approximately)
/*!40000 ALTER TABLE `prerequisite` DISABLE KEYS */;
/*!40000 ALTER TABLE `prerequisite` ENABLE KEYS */;

-- Dumping structure for table databaseall.student
CREATE TABLE IF NOT EXISTS `student` (
  `ID` char(10) NOT NULL DEFAULT '',
  `Email` char(35) NOT NULL DEFAULT '',
  `Name` char(35) NOT NULL DEFAULT '',
  `Lastname` char(35) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table databaseall.student: ~4 rows (approximately)
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` (`ID`, `Email`, `Name`, `Lastname`) VALUES
	('5910400213', 'arisa.k@ku.th', 'Arisa', 'Khwanon'),
	('5910400312', 'witsuta.o@ku.th', 'Witsuta', 'Onampai'),
	('5910401149', 'ratchanon.bua@ku.th', 'Ratchanon', 'Bualeesonsakun'),
	('5910406191', 'nalinee.phu@ku.th', 'Nalinee', 'Phuangkhiaw');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;

-- Dumping structure for table databaseall.studentbehavior
CREATE TABLE IF NOT EXISTS `studentbehavior` (
  `StudentID` char(10) NOT NULL DEFAULT '',
  `BehaviorLevel` char(50) NOT NULL DEFAULT '0',
  `Behavior` char(255) NOT NULL DEFAULT '',
  `Recorder` char(50) NOT NULL DEFAULT '',
  KEY `StudentID` (`StudentID`),
  CONSTRAINT `studentbehavior_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table databaseall.studentbehavior: ~3 rows (approximately)
/*!40000 ALTER TABLE `studentbehavior` DISABLE KEYS */;
INSERT INTO `studentbehavior` (`StudentID`, `BehaviorLevel`, `Behavior`, `Recorder`) VALUES
	('5910401149', 'Very Good', 'OK', 'Faltzner'),
	('5910400213', 'Good', 'OK', 'Faltzner'),
	('5910406191', 'Normal', 'Best', 'Faltzner');
/*!40000 ALTER TABLE `studentbehavior` ENABLE KEYS */;

-- Dumping structure for table databaseall.takecourse
CREATE TABLE IF NOT EXISTS `takecourse` (
  `CourseID` char(8) NOT NULL DEFAULT '',
  `StudentID` char(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`StudentID`),
  KEY `CourseID` (`CourseID`),
  CONSTRAINT `takecourse_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `courseinfo` (`CourseID`),
  CONSTRAINT `takecourse_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `student` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table databaseall.takecourse: ~4 rows (approximately)
/*!40000 ALTER TABLE `takecourse` DISABLE KEYS */;
INSERT INTO `takecourse` (`CourseID`, `StudentID`) VALUES
	('01418390', '5910400213'),
	('01418390', '5910400312'),
	('01418390', '5910401149'),
	('01418390', '5910406191');
/*!40000 ALTER TABLE `takecourse` ENABLE KEYS */;

-- Dumping structure for table databaseall.teachcourse
CREATE TABLE IF NOT EXISTS `teachcourse` (
  `CourseID` char(8) NOT NULL DEFAULT '',
  `TeacherID` char(10) NOT NULL DEFAULT '',
  KEY `CourseID` (`CourseID`),
  KEY `TeacherID` (`TeacherID`),
  CONSTRAINT `teachcourse_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `courseinfo` (`CourseID`),
  CONSTRAINT `teachcourse_ibfk_2` FOREIGN KEY (`TeacherID`) REFERENCES `teacher` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table databaseall.teachcourse: ~3 rows (approximately)
/*!40000 ALTER TABLE `teachcourse` DISABLE KEYS */;
INSERT INTO `teachcourse` (`CourseID`, `TeacherID`) VALUES
	('01418390', 'D1499'),
	('01418497', 'D1499'),
	('01418114', 'D1499');
/*!40000 ALTER TABLE `teachcourse` ENABLE KEYS */;

-- Dumping structure for table databaseall.teacher
CREATE TABLE IF NOT EXISTS `teacher` (
  `ID` char(10) NOT NULL DEFAULT '',
  `Email` char(35) NOT NULL DEFAULT '',
  `Name` char(35) NOT NULL DEFAULT '',
  `Lastname` char(35) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
