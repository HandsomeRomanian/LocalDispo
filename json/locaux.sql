-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2019 at 08:11 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `locaux`
--
CREATE DATABASE IF NOT EXISTS `locals` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `locals`;

-- --------------------------------------------------------

--
-- Table structure for table `Account`
--

DROP TABLE IF EXISTS `Account`;
CREATE TABLE `Account` (
  `accountID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `Account`:
--   `roleID`
--       `Roles` -> `roleID`
--

--
-- Dumping data for table `Account`
--

INSERT INTO `Account` (`accountID`, `email`, `password`, `roleID`) VALUES
(1, 'mat4school@gmail.com', 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Class`
--

DROP TABLE IF EXISTS `Class`;
CREATE TABLE `Class` (
  `classID` int(11) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `dayID` int(1) NOT NULL,
  `roomID` int(11) NOT NULL,
  `coursID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `groupID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `Class`:
--   `coursID`
--       `Cours` -> `coursID`
--   `groupID`
--       `Groupe` -> `groupID`
--   `roomID`
--       `Room` -> `roomID`
--   `teacherID`
--       `Teacher` -> `teacherID`
--

-- --------------------------------------------------------

--
-- Table structure for table `Cours`
--

DROP TABLE IF EXISTS `Cours`;
CREATE TABLE `Cours` (
  `coursID` int(11) NOT NULL,
  `courseName` varchar(50) NOT NULL,
  `courseCode` varchar(50) NOT NULL,
  `courseInfo` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `Cours`:
--

--
-- Dumping data for table `Cours`
--

INSERT INTO `Cours` (`coursID`, `courseName`, `courseCode`, `courseInfo`) VALUES
(1, 'Bureautique', '420-1B3-EM', NULL),
(2, 'Systèmes d\'exploitation', '420-1S6-EM', NULL),
(3, 'Programmation 1', '420-1N6-EM', NULL),
(4, 'Introduction aux bases de données', '420-1D5-EM', NULL),
(5, 'Mathématiques pour Informatique', '201-924-EM', NULL),
(6, 'Réseaux locaux', '420-2R5-EM', NULL),
(7, 'Programmation 2', '420-2N6-EM', NULL),
(8, 'Prog. Web serveur', '420-2W5-EM', NULL),
(9, 'Communiquer en milieux professionnels', '350-914-EM', NULL),
(10, 'Introduction à la cybersécurité', '420-3U4-EM', NULL),
(11, 'Programmation 3', '420-3N5-EM', NULL),
(12, 'Programmation Web transactionnelle', '420-3W6-EM', NULL),
(13, 'Méthodologie', '420-4M3-EM', NULL),
(14, 'Solutions technologiques en programmation', '420-4E4-EM', NULL),
(15, 'Bases de données et programmation Web', '420-4D5-EM', NULL),
(16, 'Applications mobiles', '420-4N6-EM', NULL),
(17, 'Programmation web orientée services', '420-4W6-EM', NULL),
(18, 'Professions et soutien aux utilisateurs', '420-5L4-EM', NULL),
(19, 'Design d\'interface', '582-905-EM', NULL),
(20, 'Analyse et conception d\'applications', '420-5Y5-EM', NULL),
(21, 'Applications mobiles avancées', '420-5N6-EM', NULL),
(22, 'Prorammation web avancée', '420-5W5-EM', NULL),
(23, 'Serveurs 1 : Services Intranet', '420-2S5-EM', NULL),
(24, 'Automatisation de tâches', '420-3A5-EM', NULL),
(35, 'Commutation et routage', '420-3R5-EM', NULL),
(26, 'Serveurs 2 : Services Internet', '420-3S6-EM', NULL),
(27, 'Cybersécurité 2 : Architecture', '420-4U5-EM', NULL),
(28, 'Solutions technologiques en réseautique', '420-4T4-EM', NULL),
(29, 'Réseaux étendus', '420-4R5-EM', NULL),
(30, 'Serveurs 3 : Administration centralisée', '420-4S6-EM', NULL),
(31, 'Cybersécurité 3 : Surveillance', '582-5U5-EM', NULL),
(32, 'Infrastructure virtuelle', '420-5V6-EM', NULL),
(33, 'Serveurs 4 : Communication et collaboration', '420-5S6-EM', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Groupe`
--

DROP TABLE IF EXISTS `Groupe`;
CREATE TABLE `Groupe` (
  `groupID` int(11) NOT NULL,
  `groupNumber` varchar(5) NOT NULL,
  `coursID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `Groupe`:
--   `coursID`
--       `Cours` -> `coursID`
--

-- --------------------------------------------------------

--
-- Table structure for table `GroupStudent`
--

DROP TABLE IF EXISTS `GroupStudent`;
CREATE TABLE `GroupStudent` (
  `studentID` int(11) NOT NULL,
  `groupID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `GroupStudent`:
--   `studentID`
--       `Student` -> `studentID`
--   `groupID`
--       `Groupe` -> `groupID`
--

-- --------------------------------------------------------

--
-- Table structure for table `Roles`
--

DROP TABLE IF EXISTS `Roles`;
CREATE TABLE `Roles` (
  `roleID` int(11) NOT NULL,
  `roleName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `Roles`:
--

--
-- Dumping data for table `Roles`
--

INSERT INTO `Roles` (`roleID`, `roleName`) VALUES
(1, 'Operator'),
(2, 'Admin'),
(3, 'Moderator'),
(4, 'Teacher'),
(5, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `Room`
--

DROP TABLE IF EXISTS `Room`;
CREATE TABLE `Room` (
  `roomID` int(11) NOT NULL,
  `wing` char(1) NOT NULL,
  `floor` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `places` int(11) NOT NULL,
  `typeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `Room`:
--   `typeID`
--       `RoomType` -> `typeID`
--

--
-- Dumping data for table `Room`
--

INSERT INTO `Room` (`roomID`, `wing`, `floor`, `number`, `places`, `typeID`) VALUES
(1, 'd', 1, 602, 24, 2),
(2, 'd', 1, 603, 24, 2),
(3, 'd', 1, 604, 24, 2),
(4, 'd', 1, 605, 24, 2),
(5, 'd', 1, 620, 20, 1),
(6, 'd', 1, 622, 20, 1),
(7, 'd', 1, 624, 24, 3),
(8, 'd', 1, 601, 24, 4);

-- --------------------------------------------------------

--
-- Table structure for table `RoomType`
--

DROP TABLE IF EXISTS `RoomType`;
CREATE TABLE `RoomType` (
  `typeID` int(11) NOT NULL,
  `typeName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `RoomType`:
--

--
-- Dumping data for table `RoomType`
--

INSERT INTO `RoomType` (`typeID`, `typeName`) VALUES
(1, 'Réseau'),
(2, 'Programmation'),
(3, 'Regulier (avec ports Ethernet)'),
(4, 'Reguiler (sans ports Ethernet)');

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

DROP TABLE IF EXISTS `Student`;
CREATE TABLE `Student` (
  `studentID` int(11) NOT NULL,
  `studentNumber` int(11) DEFAULT NULL,
  `studentName` varchar(50) NOT NULL,
  `studentFName` varchar(50) NOT NULL,
  `accountName` varchar(50) NOT NULL,
  `horaire` varchar(50) DEFAULT NULL,
  `accountID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `Student`:
--   `accountID`
--       `Account` -> `accountID`
--

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`studentID`, `studentNumber`, `studentName`, `studentFName`, `accountName`, `horaire`, `accountID`) VALUES
(1, 1765050, 'Martin', 'Matei', 'Matai', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Teacher`
--

DROP TABLE IF EXISTS `Teacher`;
CREATE TABLE `Teacher` (
  `teacherID` int(11) NOT NULL,
  `teacherName` varchar(50) NOT NULL,
  `teacherFName` varchar(50) NOT NULL,
  `accountID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `Teacher`:
--   `accountID`
--       `Account` -> `accountID`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Account`
--
ALTER TABLE `Account`
  ADD PRIMARY KEY (`accountID`),
  ADD KEY `FK_Account_roleID` (`roleID`);

--
-- Indexes for table `Class`
--
ALTER TABLE `Class`
  ADD PRIMARY KEY (`classID`),
  ADD KEY `FK_Class_roomID` (`roomID`),
  ADD KEY `FK_Class_coursID` (`coursID`),
  ADD KEY `FK_Class_teacherID` (`teacherID`),
  ADD KEY `FK_Class_groupID` (`groupID`);

--
-- Indexes for table `Cours`
--
ALTER TABLE `Cours`
  ADD PRIMARY KEY (`coursID`);

--
-- Indexes for table `Groupe`
--
ALTER TABLE `Groupe`
  ADD PRIMARY KEY (`groupID`),
  ADD KEY `FK_Groupe_coursID` (`coursID`);

--
-- Indexes for table `GroupStudent`
--
ALTER TABLE `GroupStudent`
  ADD KEY `studentID` (`studentID`),
  ADD KEY `groupID` (`groupID`);

--
-- Indexes for table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `Room`
--
ALTER TABLE `Room`
  ADD PRIMARY KEY (`roomID`),
  ADD KEY `FK_Room_typeID` (`typeID`);

--
-- Indexes for table `RoomType`
--
ALTER TABLE `RoomType`
  ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `FK_Student_accountID` (`accountID`);

--
-- Indexes for table `Teacher`
--
ALTER TABLE `Teacher`
  ADD PRIMARY KEY (`teacherID`),
  ADD KEY `FK_Teacher_accountID` (`accountID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Account`
--
ALTER TABLE `Account`
  MODIFY `accountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Class`
--
ALTER TABLE `Class`
  MODIFY `classID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Cours`
--
ALTER TABLE `Cours`
  MODIFY `coursID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `Groupe`
--
ALTER TABLE `Groupe`
  MODIFY `groupID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Roles`
--
ALTER TABLE `Roles`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Room`
--
ALTER TABLE `Room`
  MODIFY `roomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `RoomType`
--
ALTER TABLE `RoomType`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Student`
--
ALTER TABLE `Student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Teacher`
--
ALTER TABLE `Teacher`
  MODIFY `teacherID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Account`
--
ALTER TABLE `Account`
  ADD CONSTRAINT `FK_Account_roleID` FOREIGN KEY (`roleID`) REFERENCES `Roles` (`roleID`);

--
-- Constraints for table `Class`
--
ALTER TABLE `Class`
  ADD CONSTRAINT `FK_Class_coursID` FOREIGN KEY (`coursID`) REFERENCES `Cours` (`coursID`),
  ADD CONSTRAINT `FK_Class_groupID` FOREIGN KEY (`groupID`) REFERENCES `Groupe` (`groupID`),
  ADD CONSTRAINT `FK_Class_roomID` FOREIGN KEY (`roomID`) REFERENCES `Room` (`roomID`),
  ADD CONSTRAINT `FK_Class_teacherID` FOREIGN KEY (`teacherID`) REFERENCES `Teacher` (`teacherID`);

--
-- Constraints for table `Groupe`
--
ALTER TABLE `Groupe`
  ADD CONSTRAINT `FK_Groupe_coursID` FOREIGN KEY (`coursID`) REFERENCES `Cours` (`coursID`);

--
-- Constraints for table `GroupStudent`
--
ALTER TABLE `GroupStudent`
  ADD CONSTRAINT `GroupStudent_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `Student` (`studentID`),
  ADD CONSTRAINT `GroupStudent_ibfk_2` FOREIGN KEY (`groupID`) REFERENCES `Groupe` (`groupID`);

--
-- Constraints for table `Room`
--
ALTER TABLE `Room`
  ADD CONSTRAINT `FK_Room_typeID` FOREIGN KEY (`typeID`) REFERENCES `RoomType` (`typeID`);

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `FK_Student_accountID` FOREIGN KEY (`accountID`) REFERENCES `Account` (`accountID`);

--
-- Constraints for table `Teacher`
--
ALTER TABLE `Teacher`
  ADD CONSTRAINT `FK_Teacher_accountID` FOREIGN KEY (`accountID`) REFERENCES `Account` (`accountID`);


CREATE UNIQUE INDEX IX_Groupe_groupNumbercoursID
ON `Groupe`(groupNumber,coursID);

CREATE UNIQUE INDEX IX_Teacher_accountID
ON `Teacher`(accountID);
CREATE UNIQUE INDEX IX_Teacher_teacherNameFName
ON `Teacher`(teacherName,TeacherFname);

CREATE UNIQUE INDEX IX_Student_studentNumber
ON `Student`(studentNumber);
CREATE UNIQUE INDEX IX_Student_studentNameFName
ON `Student`(studentName,studentFName);
CREATE UNIQUE INDEX IX_Student_horaire
ON `Student`(horaire);
CREATE UNIQUE INDEX IX_Student_accountID
ON `Student`(accountID);
CREATE UNIQUE INDEX IX_Student_accountName
ON `Student`(accountName);
'
CREATE UNIQUE INDEX IX_RoomType_typeName
ON `RoomType`(typeName);

CREATE UNIQUE INDEX IX_Room_windfloornumber
ON `Room` ('wing','floor','number');

CREATE UNIQUE INDEX IX_Roles_roleName
ON `Roles`(roleName);

CREATE UNIQUE INDEX IX_GroupStudent_studentIDgroupID
ON `GroupStudent`(studentID,groupID);

CREATE UNIQUE INDEX IX_Cours_courseCode
ON `Cours`(courseCode);

CREATE UNIQUE INDEX IX_Class_startTimeendTimedayIDroomID
ON `Class`(startTime,endTime,dayID,roomID);
CREATE UNIQUE INDEX IX_Class_startTimeendTimedayIDgroupID
ON `Class`(startTime,endTime,dayID,groupID);
CREATE UNIQUE INDEX IX_Class_startTimeendTimedayIDteacherID
ON `Class`(startTime,endTime,dayID,teacherID);

CREATE UNIQUE INDEX IX_Account_email
ON `Account`(email);
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
