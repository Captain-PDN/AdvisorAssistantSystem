
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Create Database
DROP SCHEMA IF EXISTS databaseAll;
CREATE SCHEMA databaseAll;
USE databaseAll;
SET AUTOCOMMIT=0;

-- Create Table Admin
DROP TABLE IF EXISTS `Admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Admin` (
  `ID` CHAR(10) NOT NULL DEFAULT '',
  `Username` CHAR(35) NOT NULL DEFAULT '',
  `Password` CHAR(35) NOT NULL DEFAULT '',
  `Name` CHAR(35) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4080 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO `Admin` VALUES ('0000000000','Admin','Admin','Administrator');

-- Create Table Teacher
DROP TABLE IF EXISTS `Teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Teacher` (
  `ID` CHAR(10) NOT NULL DEFAULT '',
  `Email` CHAR(35) NOT NULL DEFAULT '',
  `Name` CHAR(35) NOT NULL DEFAULT '',
  `Lastname` CHAR(35) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4080 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

-- Create Table Student
DROP TABLE IF EXISTS `Student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Student` (
  `ID` CHAR(10) NOT NULL DEFAULT '',
  `Email` CHAR(35) NOT NULL DEFAULT '',
  `Name` CHAR(35) NOT NULL DEFAULT '',
  `Lastname` CHAR(35) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4080 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

-- Create Table Student Behavior
DROP TABLE IF EXISTS `StudentBehavior`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `StudentBehavior` (
  `StudentID` CHAR(10) NOT NULL DEFAULT '',
  `BehaviorLevel` INT(2) NOT NULL DEFAULT 0,
  `Behavior` CHAR(100) NOT NULL DEFAULT '',
  `Anomaly` CHAR(100) NOT NULL DEFAULT '',
  `Recorder` CHAR(35) NOT NULL DEFAULT '',
  FOREIGN KEY (`StudentID`) REFERENCES `Student` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4080 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

-- Create Table Course information
DROP TABLE IF EXISTS `CourseInfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CourseInfo` (
  `CourseID` CHAR(8) NOT NULL DEFAULT '',
  `Name` CHAR(35) NOT NULL DEFAULT '',
  `Credit` INT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`CourseID`)
) ENGINE=InnoDB AUTO_INCREMENT=4080 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

-- Create Table Course for teacher
DROP TABLE IF EXISTS `TeachCourse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TeachCourse` (
  `CourseID` CHAR(8) NOT NULL DEFAULT '',
  `TeacherID` CHAR(10) NOT NULL DEFAULT '',
  FOREIGN KEY (`CourseID`) REFERENCES `CourseInfo` (`CourseID`),
  FOREIGN KEY (`TeacherID`) REFERENCES `Teacher` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4080 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

-- Create Table Course for student
DROP TABLE IF EXISTS `TakeCourse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TakeCourse` (
  `CourseID` CHAR(8) NOT NULL DEFAULT '',
  `StudentID` CHAR(10) NOT NULL DEFAULT '',
  FOREIGN KEY (`CourseID`) REFERENCES `CourseInfo` (`CourseID`),
  FOREIGN KEY (`StudentID`) REFERENCES `Student` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4080 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

-- Create Table Prerequisite
DROP TABLE IF EXISTS `Prerequisite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Prerequisite` (
  `CourseID` CHAR(8) NOT NULL DEFAULT '',
  `PreCourseID` CHAR(8) NOT NULL DEFAULT '',
  FOREIGN KEY (`CourseID`) REFERENCES `CourseInfo` (`CourseID`),
  FOREIGN KEY (`PreCourseID`) REFERENCES `CourseInfo` (`CourseID`)
) ENGINE=InnoDB AUTO_INCREMENT=4080 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

-- Create Table Course grade
DROP TABLE IF EXISTS `CourseGrade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CourseGrade` (
  `CourseID` CHAR(8) NOT NULL DEFAULT '',
  `StudentID` CHAR(10) NOT NULL DEFAULT '',
  `Grade` CHAR(2) NOT NULL DEFAULT '',
  FOREIGN KEY (`CourseID`) REFERENCES `CourseInfo` (`CourseID`),
  FOREIGN KEY (`StudentID`) REFERENCES `Student` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4080 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

-- Create Table Course score
DROP TABLE IF EXISTS `CourseScore`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CourseScore` (
  `CourseID` CHAR(8) NOT NULL DEFAULT '',
  `StudentID` CHAR(10) NOT NULL DEFAULT '',
  `Topic` CHAR(20) NOT NULL DEFAULT '',
  `Score` INT(3) NOT NULL DEFAULT 0,
  FOREIGN KEY (`CourseID`) REFERENCES `CourseInfo` (`CourseID`),
  FOREIGN KEY (`StudentID`) REFERENCES `Student` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4080 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

-- Create Table Course topic weigh
DROP TABLE IF EXISTS `CourseTopic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CourseTopic` (
  `CourseID` CHAR(8) NOT NULL DEFAULT '',
  `Topic` CHAR(20) NOT NULL DEFAULT '',
  `Weigh` INT(3) NOT NULL DEFAULT 0,
  `MaxScore` INT(3) NOT NULL DEFAULT 0,
  `ScoreAnnounceDate` Date NULL,
  FOREIGN KEY (`CourseID`) REFERENCES `CourseInfo` (`CourseID`)
) ENGINE=InnoDB AUTO_INCREMENT=4080 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

SET AUTOCOMMIT=1;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2010-09-30 11:01:37