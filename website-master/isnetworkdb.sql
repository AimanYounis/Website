-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2017 at 09:24 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isnetworkdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cID`, `userID`, `postID`, `description`, `date`) VALUES
(1, 1, 1, 'dude wheres my car ?', '2017-01-26 13:36:31'),
(2, 4, 1, 'i have it', '2017-01-26 13:36:39'),
(3, 2, 2, 'hayyyy wazaaaaaaaaaaaaap :D', '2017-01-26 13:36:50'),
(9, 1, 2, 'okk', '2017-02-01 17:01:13'),
(13, 1, 2, 'aaaa', '2017-02-05 14:02:55'),
(17, 1, 16, 'helloooo', '2017-02-05 14:48:36'),
(18, 3, 20, 'asdasdas', '2017-02-06 17:19:52'),
(19, 1, 2, 'sadasdsa', '2017-02-12 20:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `company` text NOT NULL,
  `yearnum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`ID`, `userID`, `company`, `yearnum`) VALUES
(1, 1, 'Apple', 5),
(2, 1, 'Microsoft', 5);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `userID` int(11) NOT NULL,
  `friendID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`userID`, `friendID`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 18),
(2, 3),
(3, 5),
(3, 6),
(8, 1),
(8, 6);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `ID` int(11) NOT NULL,
  `address` text NOT NULL,
  `company` text NOT NULL,
  `description` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`ID`, `address`, `company`, `description`, `email`) VALUES
(1, 'Haifa', 'HP', 'VP Position for Haifa branch', 'work@hp.com'),
(2, 'Haifa', 'Intel', 'Hardware Sales-man', 'jobs@intel.com'),
(3, 'Haifa', 'Intel', 'Software developer', 'jobs@intel.com'),
(4, 'Tel-Aviv', 'HP', 'Product manager', 'work@hp.com');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `friendID` int(11) NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`ID`, `userID`, `friendID`, `description`, `date`) VALUES
(1, 3, 1, 'Foad : Good luck !', '2017-02-12 08:55:09'),
(2, 2, 1, 'Amjad : Hii how are you ?', '2017-02-12 08:55:09'),
(3, 1, 3, 'Aiman : aaaaaaaaaaa', '2017-02-12 08:55:09'),
(4, 8, 6, 'Abbas : wazaaaaaaaaaaaaaaaap ?', '2017-02-12 08:55:09'),
(5, 8, 1, 'Abbas : aaaaa', '2017-02-12 08:55:09'),
(6, 8, 1, 'Abbas : yoooooooooo', '2017-02-12 08:55:09'),
(7, 8, 1, 'Abbas : aaads', '2017-02-12 08:55:09'),
(8, 8, 1, 'Abbas : woooot', '2017-02-12 08:55:09'),
(9, 2, 1, 'Amjad : wadddaap ?', '2017-02-12 08:55:09'),
(10, 1, 3, 'Aiman : hiiiiii', '2017-02-12 09:07:05'),
(11, 1, 3, 'Aiman : bbbbbb', '2017-02-12 09:08:39'),
(12, 1, 2, 'Aiman : hello', '2017-02-12 09:33:24'),
(22, 1, 18, 'Aiman : whyyyy ', '2017-02-12 18:39:26'),
(23, 1, 2, 'Aiman : ayyyyyyyyyy', '2017-02-12 20:00:50'),
(24, 1, 6, 'Aiman : asdsadas', '2017-02-12 20:01:44');

-- --------------------------------------------------------

--
-- Table structure for table `notifacations`
--

CREATE TABLE `notifacations` (
  `ID` int(11) NOT NULL,
  `friendID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifacations`
--

INSERT INTO `notifacations` (`ID`, `friendID`, `userID`, `description`, `date`) VALUES
(1, 2, 1, 'tried to call you', '2017-02-05 13:40:24'),
(2, 3, 1, 'it''s his Birthday', '2017-02-05 13:40:42'),
(3, 1, 3, 'Commented on one of your posts', '2017-02-05 14:02:55'),
(4, 3, 1, 'Liked one of your posts', '2017-02-05 14:54:37'),
(5, 1, 2, 'Liked one of your posts', '2017-02-05 15:01:25'),
(6, 3, 1, 'Liked one of your posts', '2017-02-06 16:37:33'),
(7, 3, 1, 'Liked one of your posts', '2017-02-06 16:44:59'),
(8, 3, 1, 'Liked one of your posts', '2017-02-06 17:00:25'),
(9, 3, 1, 'Commented on one of your posts', '2017-02-06 17:19:52'),
(10, 2, 1, 'Liked one of your posts', '2017-02-11 21:07:17'),
(11, 2, 1, 'Liked one of your posts', '2017-02-11 21:07:21'),
(12, 2, 3, 'Liked one of your posts', '2017-02-11 21:07:27'),
(14, 1, 18, 'Added you as a friend', '2017-02-12 18:27:22'),
(15, 1, 2, 'Liked one of your posts', '2017-02-12 20:00:36'),
(16, 1, 6, 'Added you as a friend', '2017-02-12 20:01:27'),
(17, 1, 3, 'Commented on one of your posts', '2017-02-12 20:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `description` text NOT NULL,
  `likes` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`ID`, `userID`, `description`, `likes`, `date`) VALUES
(1, 2, 'this is my post in your news feed :P :D:D:D', 2, '2017-02-05 12:35:51'),
(2, 3, 'waaaaaaaaazaaaaaaaaaaap', 3, '2017-01-25 18:35:35'),
(16, 1, 'hii', 3, '2017-02-05 12:35:56'),
(20, 1, 'ddddasdadasdsadsadsa', 3, '2017-02-05 14:31:45'),
(21, 6, 'aaaaaaaaaa', 0, '2017-02-12 20:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `postlikes`
--

CREATE TABLE `postlikes` (
  `userID` int(11) NOT NULL,
  `postID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postlikes`
--

INSERT INTO `postlikes` (`userID`, `postID`) VALUES
(1, 1),
(1, 2),
(1, 20),
(2, 2),
(2, 16),
(2, 20),
(3, 1),
(3, 2),
(3, 16),
(3, 20),
(5, 16);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `Job1` text NOT NULL,
  `Job2` text NOT NULL,
  `Date` date NOT NULL,
  `usernameid` text NOT NULL,
  `password` text NOT NULL,
  `Skills` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `firstname`, `lastname`, `Job1`, `Job2`, `Date`, `usernameid`, `password`, `Skills`) VALUES
(1, 'Aiman', 'Younis', 'Samsung Selling Manger', 'LG NOC', '1993-04-25', 'Admin', 'Admin', 'Java,C++,CSS/HTML development'),
(2, 'Amjad', 'Nassar', 'Samsung Selling Manger', 'LG NOC', '1992-10-21', 'asd', 'asd', 'Java,C++,CSS/HTML development'),
(3, 'Foaad', 'Dahoud', 'Samsung Selling Manger', 'LG NOC', '1993-04-25', 'abcd', '1234', 'Java,C++,CSS/HTML development'),
(4, 'Andrei', 'Nassar', 'Samsung Selling Manger', 'LG NOC', '1989-08-21', 'Andreinas', '1234', 'Java,C++,CSS/HTML development'),
(5, 'Shadi', 'Jazi', 'Samsung Selling Manger', 'LG NOC', '1993-02-25', 'shadi', 'shadi', 'Java,C++,CSS/HTML development'),
(6, 'Will', 'Smith', 'Samsung Selling Manger', 'LG NOC', '1998-05-05', 'will', 'will', 'Java,C++,CSS/HTML development'),
(8, 'Abbas', 'Khateeb', '', '', '0000-00-00', 'abed', '1234', ''),
(18, 'a', 'a', '', '', '1992-12-12', 'a', 'a', 'aaaaaaaa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cID`),
  ADD KEY `userID` (`userID`,`postID`),
  ADD KEY `postID` (`postID`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `expuserid` (`userID`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`userID`,`friendID`),
  ADD KEY `friendID` (`friendID`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `friendID` (`friendID`);

--
-- Indexes for table `notifacations`
--
ALTER TABLE `notifacations`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `friendID` (`friendID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `postuserid` (`userID`);

--
-- Indexes for table `postlikes`
--
ALTER TABLE `postlikes`
  ADD PRIMARY KEY (`userID`,`postID`),
  ADD KEY `postID` (`postID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `notifacations`
--
ALTER TABLE `notifacations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`postID`) REFERENCES `post` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`friendID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`friendID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifacations`
--
ALTER TABLE `notifacations`
  ADD CONSTRAINT `notifacations_ibfk_1` FOREIGN KEY (`friendID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifacations_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `postlikes`
--
ALTER TABLE `postlikes`
  ADD CONSTRAINT `postlikes_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `postlikes_ibfk_2` FOREIGN KEY (`postID`) REFERENCES `post` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
