-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2019 at 08:46 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swayamtalk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `authentication` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `name`, `password`, `authentication`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `bannerId` int(11) NOT NULL,
  `bannerPhoto` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `adminId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`bannerId`, `bannerPhoto`, `timestamp`, `adminId`) VALUES
(2, 'http://localhost/swayamtalk/assets/images/2017-10-03-13-02-55-742.jpg', '2019-08-14 10:45:00', 1),
(3, 'http://localhost/swayamtalk/assets/images/banner/7.png', '2019-08-28 10:37:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `categoryName_M` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `categoryName`, `categoryName_M`, `timestamp`) VALUES
(3, 'English', 'इंग्रजी', '2019-08-26 09:30:53'),
(4, 'Maths', 'गणित', '2019-08-26 09:34:02'),
(5, 'science', 'विद्यान', '2019-08-31 07:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactId` int(11) NOT NULL,
  `contactName` varchar(255) NOT NULL,
  `contactEmail` varchar(255) NOT NULL,
  `contactSubject` varchar(255) NOT NULL,
  `contactMessage` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventId` int(11) NOT NULL,
  `eventTitle` varchar(255) NOT NULL,
  `eventTitle_M` varchar(255) NOT NULL,
  `eventImage` varchar(255) NOT NULL,
  `eventDescription` varchar(255) NOT NULL,
  `eventDescription_M` varchar(255) NOT NULL,
  `eventAddress` varchar(255) NOT NULL,
  `locationId` int(11) NOT NULL,
  `speakerId` varchar(255) NOT NULL,
  `sponserId` varchar(255) NOT NULL,
  `adminId` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventId`, `eventTitle`, `eventTitle_M`, `eventImage`, `eventDescription`, `eventDescription_M`, `eventAddress`, `locationId`, `speakerId`, `sponserId`, `adminId`, `timestamp`) VALUES
(12, 'sadassdd', 'adsss', 'http://localhost/swayamtalk/assets/images/events/713.png', 'sdfsdf', 'zxczxc', '', 6, '2,1', '', 1, '2019-09-02 18:08:38'),
(13, 'dsfhsjh', 'bshfhsd', 'http://localhost/swayamtalk/assets/images/events/714.png', 'bsidhfuisd', 'gusgdcusy', '', 6, '2,1', '1', 1, '2019-09-02 18:13:08'),
(14, 'ganpati', 'गणपति', 'http://localhost/swayamtalk/assets/images/events/ejw.png', 'dhsgfdsgg', 'क्न्ज्बक्स्च्ब ', '', 6, '1', '2,1', 1, '2019-09-02 18:41:36'),
(15, 'event', 'इवेंट', 'http://localhost/swayamtalk/assets/images/events/715.png', 'event description', 'इवेंट डिस्क्रिप्शन', '', 5, '2', '4', 1, '2019-09-03 12:10:34'),
(16, 'xzsda', 'tyfyf', 'http://localhost/swayamtalk/assets/images/events/ac.png', 'yi', 'yfy', '', 5, '2,1', '4,3', 1, '2019-09-03 12:13:12'),
(17, 'sds', 'zczs', 'http://localhost/swayamtalk/assets/images/events/ejw1.png', 'fyfy', 'gyvgh', 'vhvj', 5, '2', '3', 1, '2019-09-03 12:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faqId` int(11) NOT NULL,
  `question` varchar(5000) NOT NULL,
  `answer` varchar(5000) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faqId`, `question`, `answer`, `timestamp`) VALUES
(3, 'mno', 'pqr', '2019-08-14 10:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(500) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `galleryimage`
--

CREATE TABLE `galleryimage` (
  `galleryImageId` int(11) NOT NULL,
  `galleryTitleId` int(11) NOT NULL,
  `galleryImage` varchar(255) NOT NULL,
  `galleryImageName` varchar(255) NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galleryimage`
--

INSERT INTO `galleryimage` (`galleryImageId`, `galleryTitleId`, `galleryImage`, `galleryImageName`, `timestamp`) VALUES
(1, 1, 'http://localhost/swayamtalk/assets/images/gallery/72.png', 'modak', '2019-08-31 10:59:53'),
(2, 1, 'http://localhost/swayamtalk/assets/images/gallery/contact.jpg', 'contact', '2019-08-31 10:59:53'),
(3, 2, 'http://localhost/swayamtalk/assets/images/gallery/controls.png', 'controls', '2019-08-31 11:00:55'),
(4, 2, 'http://localhost/swayamtalk/assets/images/gallery/g5.jpg', 'home', '2019-08-31 11:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `gallerytitle`
--

CREATE TABLE `gallerytitle` (
  `galleryTitleId` int(11) NOT NULL,
  `galleryTitle` varchar(255) NOT NULL,
  `galleryType` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallerytitle`
--

INSERT INTO `gallerytitle` (`galleryTitleId`, `galleryTitle`, `galleryType`, `timestamp`) VALUES
(1, 'Ganapati', 'Swayam Gallery', '2019-08-31 10:59:53'),
(2, 'Devi', 'Swayam Gallery', '2019-08-31 11:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `historyId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `videoId` int(11) NOT NULL,
  `waitingTime` varchar(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `locationId` int(11) NOT NULL,
  `locationName` varchar(255) NOT NULL,
  `locationName_M` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`locationId`, `locationName`, `locationName_M`, `timestamp`) VALUES
(5, 'Aurangabad', 'औरंगाबाद', '2019-08-26 09:38:28'),
(6, 'Mumbai', 'मुंबई', '2019-08-26 09:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `myfavourate`
--

CREATE TABLE `myfavourate` (
  `favourateId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `videoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `speaker`
--

CREATE TABLE `speaker` (
  `speakerId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_M` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `referance1` varchar(255) NOT NULL,
  `referance2` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `about_M` varchar(255) NOT NULL,
  `awards` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `speaker`
--

INSERT INTO `speaker` (`speakerId`, `name`, `name_M`, `mobile`, `email`, `dob`, `website`, `referance1`, `referance2`, `about`, `about_M`, `awards`, `profile`, `timestamp`) VALUES
(1, 'shubham', '', '9856321047', 'shubham@gmail.com', '1996-01-02', 'a', 'a', 'a', 'a', 'padampura', 'a', 'http://localhost/swayamtalk/assets/images/IMG_20160713_162018.jpg', '2019-08-23 15:51:41'),
(2, 'kshitija', '', '8563214562', 'kshitija@gmail.com', '1991-08-06', 'b', 'b', 'b', 'b', 'ramnagar', 'b', 'http://localhost/swayamtalk/assets/images/7d80fdba-bb53-4098-968a-679e70df799d6.jpg', '2019-08-23 15:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `sponser`
--

CREATE TABLE `sponser` (
  `sponserId` int(11) NOT NULL,
  `sponserName` varchar(255) NOT NULL,
  `sponserImage` varchar(255) NOT NULL,
  `locationId` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sponser`
--

INSERT INTO `sponser` (`sponserId`, `sponserName`, `sponserImage`, `locationId`, `timestamp`) VALUES
(1, 'abc', 'http://localhost/swayamtalk/assets/images/sponser/ac1.png', 6, '2019-09-02 17:04:56'),
(2, 'def', 'http://localhost/swayamtalk/assets/images/sponser/ejw.png', 6, '2019-09-02 18:40:06'),
(3, 'sds', 'http://localhost/swayamtalk/assets/images/sponser/fw.png', 5, '2019-09-02 18:42:37'),
(4, 'adsad', 'http://localhost/swayamtalk/assets/images/sponser/fw1.png', 5, '2019-09-02 18:42:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `name`, `password`, `mobile`, `photo`, `token`, `timestamp`) VALUES
(1, 'kshitija', 'shubham', '8552080132', 'http://localhost/swayamtalk/assets/images/users/7.png', '1234', '2019-08-28 13:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `videoId` int(11) NOT NULL,
  `videoName` varchar(255) NOT NULL,
  `videoName_M` varchar(255) NOT NULL,
  `videoPath` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `videoDescription` varchar(255) NOT NULL,
  `videoDescription_M` varchar(255) NOT NULL,
  `speakerId` int(11) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `locationId` int(11) NOT NULL,
  `videoType` varchar(255) NOT NULL,
  `adminId` int(11) NOT NULL,
  `videoViews` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`videoId`, `videoName`, `videoName_M`, `videoPath`, `photo`, `videoDescription`, `videoDescription_M`, `speakerId`, `keywords`, `categoryId`, `locationId`, `videoType`, `adminId`, `videoViews`, `timestamp`) VALUES
(1, 'kshitu', 'kshitu', 'kvnidd', 'http://localhost/swayamtalk/assets/images/videos/78.png', 'ncnv', 'hdfhvxd', 2, 'nchnz', 4, 6, 'Swayam Talks', 1, 25, '2019-08-30 15:09:40'),
(2, 'kshitu', 'kshitu', 'kvnidd', 'http://localhost/swayamtalk/assets/images/videos/78.png', 'ncnv', 'hdfhvxd', 2, 'nchnz', 5, 6, 'Swayam Talks', 1, 30, '2019-08-30 15:09:40'),
(3, 'kshitu', 'kshitu', 'kvnidd', 'http://localhost/swayamtalk/assets/images/videos/78.png', 'ncnv', 'hdfhvxd', 2, 'nchnz', 3, 6, 'Swayam Talks', 1, 15, '2019-08-30 15:09:40'),
(4, 'kshitu', 'kshitu', 'kvnidd', 'http://localhost/swayamtalk/assets/images/videos/78.png', 'ncnv', 'hdfhvxd', 2, 'nchnz', 5, 6, 'Swayam Talks', 1, 45, '2019-08-30 15:09:40'),
(5, 'kshitu', 'kshitu', 'kvnidd', 'http://localhost/swayamtalk/assets/images/videos/78.png', 'ncnv', 'hdfhvxd', 2, 'nchnz', 3, 6, 'Swayam Talks', 1, 15, '2019-08-30 15:09:40'),
(6, 'kshitu', 'kshitu', 'kvnidd', 'http://localhost/swayamtalk/assets/images/videos/78.png', 'ncnv', 'hdfhvxd', 2, 'nchnz', 4, 6, 'Swayam Talks', 1, 25, '2019-08-30 15:09:40'),
(7, 'kshitu', 'kshitu', 'kvnidd', 'http://localhost/swayamtalk/assets/images/videos/78.png', 'ncnv', 'hdfhvxd', 2, 'nchnz', 5, 6, 'Swayam Talks', 1, 30, '2019-08-30 15:09:40'),
(8, 'kshitu', 'kshitu', 'kvnidd', 'http://localhost/swayamtalk/assets/images/videos/78.png', 'ncnv', 'hdfhvxd', 2, 'nchnz', 5, 6, 'Swayam Talks', 1, 45, '2019-08-30 15:09:40'),
(9, 'kshitu', 'kshitu', 'kvnidd', 'http://localhost/swayamtalk/assets/images/videos/78.png', 'ncnv', 'hdfhvxd', 2, 'nchnz', 3, 6, 'Swayam Talks', 1, 15, '2019-08-30 15:09:40'),
(10, 'kshitu', 'kshitu', 'kvnidd', 'http://localhost/swayamtalk/assets/images/videos/78.png', 'ncnv', 'hdfhvxd', 2, 'nchnz', 3, 6, 'Swayam Talks', 1, 15, '2019-08-30 15:09:40'),
(11, 'kshitu', 'kshitu', 'kvnidd', 'http://localhost/swayamtalk/assets/images/videos/78.png', 'ncnv', 'hdfhvxd', 2, 'nchnz', 4, 6, 'Swayam Talks', 1, 25, '2019-08-30 15:09:40'),
(12, 'kshitu', 'kshitu', 'kvnidd', 'http://localhost/swayamtalk/assets/images/videos/78.png', 'ncnv', 'hdfhvxd', 2, 'nchnz', 4, 6, 'Swayam Talks', 1, 25, '2019-08-30 15:09:40'),
(13, 'kshitu', 'kshitu', 'kvnidd', 'http://localhost/swayamtalk/assets/images/videos/78.png', 'ncnv', 'hdfhvxd', 2, 'nchnz', 5, 6, 'Swayam Talks', 1, 30, '2019-08-30 15:09:40'),
(14, 'kshitu', 'kshitu', 'kvnidd', 'http://localhost/swayamtalk/assets/images/videos/78.png', 'ncnv', 'hdfhvxd', 2, 'nchnz', 5, 6, 'Swayam Talks', 1, 30, '2019-08-30 15:09:40'),
(15, 'kshitu', 'kshitu', 'kvnidd', 'http://localhost/swayamtalk/assets/images/videos/78.png', 'ncnv', 'hdfhvxd', 2, 'nchnz', 5, 6, 'Swayam Talks', 1, 45, '2019-08-30 15:09:40'),
(16, 'kshitu', 'kshitu', 'kvnidd', 'http://localhost/swayamtalk/assets/images/videos/78.png', 'ncnv', 'hdfhvxd', 2, 'nchnz', 5, 6, 'Swayam Talks', 1, 45, '2019-08-30 15:09:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`bannerId`),
  ADD KEY `banner_ibfk_1` (`adminId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactId`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventId`),
  ADD KEY `events_ibfk_1` (`adminId`),
  ADD KEY `locationId` (`locationId`),
  ADD KEY `sponserId` (`sponserId`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faqId`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackId`);

--
-- Indexes for table `galleryimage`
--
ALTER TABLE `galleryimage`
  ADD PRIMARY KEY (`galleryImageId`),
  ADD KEY `galleryTitleId` (`galleryTitleId`);

--
-- Indexes for table `gallerytitle`
--
ALTER TABLE `gallerytitle`
  ADD PRIMARY KEY (`galleryTitleId`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`historyId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `videoId` (`videoId`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locationId`);

--
-- Indexes for table `myfavourate`
--
ALTER TABLE `myfavourate`
  ADD PRIMARY KEY (`favourateId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `videoId` (`videoId`);

--
-- Indexes for table `speaker`
--
ALTER TABLE `speaker`
  ADD PRIMARY KEY (`speakerId`);

--
-- Indexes for table `sponser`
--
ALTER TABLE `sponser`
  ADD PRIMARY KEY (`sponserId`),
  ADD KEY `locationId` (`locationId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`videoId`),
  ADD KEY `videos_ibfk_2` (`categoryId`),
  ADD KEY `videos_ibfk_3` (`locationId`),
  ADD KEY `videos_ibfk_4` (`speakerId`),
  ADD KEY `videos_ibfk_1` (`adminId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `bannerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faqId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `galleryimage`
--
ALTER TABLE `galleryimage`
  MODIFY `galleryImageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `gallerytitle`
--
ALTER TABLE `gallerytitle`
  MODIFY `galleryTitleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `historyId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `locationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `myfavourate`
--
ALTER TABLE `myfavourate`
  MODIFY `favourateId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `speaker`
--
ALTER TABLE `speaker`
  MODIFY `speakerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sponser`
--
ALTER TABLE `sponser`
  MODIFY `sponserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `videoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `banner_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `admin` (`adminId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `admin` (`adminId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`locationId`) REFERENCES `location` (`locationId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `galleryimage`
--
ALTER TABLE `galleryimage`
  ADD CONSTRAINT `galleryimage_ibfk_1` FOREIGN KEY (`galleryTitleId`) REFERENCES `gallerytitle` (`galleryTitleId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`videoId`) REFERENCES `videos` (`videoId`);

--
-- Constraints for table `myfavourate`
--
ALTER TABLE `myfavourate`
  ADD CONSTRAINT `myfavourate_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `myfavourate_ibfk_2` FOREIGN KEY (`videoId`) REFERENCES `videos` (`videoId`);

--
-- Constraints for table `sponser`
--
ALTER TABLE `sponser`
  ADD CONSTRAINT `sponser_ibfk_2` FOREIGN KEY (`locationId`) REFERENCES `location` (`locationId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `admin` (`adminId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `videos_ibfk_2` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `videos_ibfk_3` FOREIGN KEY (`locationId`) REFERENCES `location` (`locationId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `videos_ibfk_4` FOREIGN KEY (`speakerId`) REFERENCES `speaker` (`speakerId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
