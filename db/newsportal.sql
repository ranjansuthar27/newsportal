-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2024 at 02:49 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `news_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `news_id`, `created_at`, `is_active`) VALUES
(12, 'RANJAN SUTHAR', 'r27suthar@gmail.com', 'FDGFGUJK', 7, '2020-04-30 16:10:48', 1),
(13, 'RANJAN SUTHAR', 'sutharranjan@gmail.com', 'check cmt', 13, '2020-04-30 17:15:37', 1),
(14, 'RANJAN SUTHAR', 'r27suthar@gmail.com', 'ertyukl', 13, '2020-04-30 17:16:03', 1),
(15, 'sharvan', 's@gmail.com', 'sfghjkl/', 13, '2020-04-30 17:17:02', 1),
(16, 'ranjan suthar', 'r27suthar@gmail.com', 'john', 10, '2020-05-01 04:54:51', 1),
(17, 'RANJAN SUTHAR', 'sutharranjan@gmail.com', 'kartik aryan', 11, '2020-05-01 04:56:53', 1),
(18, 'ranjan__suthar', 'r27suthar@gmail.com', 'delicious food', 14, '2020-05-01 06:11:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `postdetails`
--

CREATE TABLE `postdetails` (
  `id` int(11) NOT NULL,
  `postTitle` varchar(255) NOT NULL,
  `postCategory` int(11) NOT NULL,
  `postSubcategory` int(11) NOT NULL,
  `postDetails` longtext NOT NULL,
  `images` varchar(255) NOT NULL,
  `created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postdetails`
--

INSERT INTO `postdetails` (`id`, `postTitle`, `postCategory`, `postSubcategory`, `postDetails`, `images`, `created_At`, `updated_At`, `is_active`) VALUES
(1, 'film industies', 39, 21, 'The dog is a member of the genus Canis (canines), which forms part of the wolf-like canids, and is the most widely abundant terrestrial carnivore. The dog is a member of the genus Canis (canines), which forms part of the wolf-like canids, and is the most widely abundant terrestrial carnivore. The dog is a member of the genus Canis (canines), which forms part of the wolf-like canids, and is the most widely abundant terrestrial carnivore. The dog is a member of the genus Canis (canines), which forms part of the wolf-like canids, and is the most widely abundant terrestrial carnivore. The dog is a member of the genus Canis (canines), which forms part of the wolf-like canids, and is the most widely abundant terrestrial carnivore. The dog is a member of the genus Canis (canines), which forms part of the wolf-like canids, and is the most widely abundant terrestrial carnivore. The dog is a member of the genus Canis (canines), which forms part of the wolf-like canids, and is the most widely abundant terrestrial carnivore. The dog is a member of the genus Canis (canines), which forms part of the wolf-like canids, and is the most widely abundant terrestrial carnivore. ', 'dog.jpg', '2020-04-28 16:31:44', '2020-04-28 16:31:44', '1'),
(4, 'CORONA VIRUS vadodara', 36, 18, 'Protect yourself and others around you by knowing the facts and taking appropriate precautions. Follow advice provided by your local public health a', 'LUDO.png', '2020-04-28 18:24:17', '2020-04-28 18:24:17', '1'),
(5, 'CORONA VIRUS INDIA', 39, 22, 'Don’t touch your eyes, nose or mouth.', 'dog.jpg', '2020-04-28 18:25:20', '2020-04-28 18:25:20', '1'),
(7, 'ALIA BHATT', 30, 27, 'The highest-paid actress in India, as of 2019, her accolades include four Filmfare Awards.The highest-paid actress in India, as of 2019, her accolades include four Filmfare Awards.The highest-paid actress in India, as of 2019, her accolades include four Filmfare Awards.The highest-paid actress in India, as of 2019, her accolades include four Filmfare Awards.The highest-paid actress in India, as of 2019, her accolades include four Filmfare Awards.The highest-paid actress in India, as of 2019, her accolades include four Filmfare Awards.', 'alia.cms', '2020-04-29 06:20:07', '2020-04-29 06:20:07', '0'),
(8, 'ACTORS', 30, 27, 'Born into the Bhatt family, she is the daughter of filmmaker Mahesh Bhatt and actress Soni Razdan. ', 'alia.cms', '2020-04-29 18:20:32', '2020-04-29 18:20:32', '1'),
(9, 'MOVIES CATEGORY', 30, 28, 'THIS IS COMEDY MOVIES', 'dog.jpg', '2020-04-29 18:21:15', '2020-04-29 18:21:15', '1'),
(10, 'JOHN ABRAHAM', 43, 29, 'John Abraham (born 17 December 1972) is an Indian film actor, film producer and former model who appears in Hindi films. After modelling for numerous advertisements and companies, he made his film debut with Jism (2003), which earned him the Filmfare Best Debut Award nominationJohn Abraham (born 17 December 1972)[2] is an Indian film actor, film producer and former model who appears in Hindi films. After modelling for numerous advertisements and companies, he made his film debut with Jism (2003), which earned him the Filmfare Best Debut Award nominationJohn Abraham (born 17 December 1972)[2] is an Indian film actor, film producer and former model who appears in Hindi films. After modelling for numerous advertisements and companies, he made his film debut with Jism (2003), which earned him the Filmfare Best Debut Award nominationJohn Abraham (born 17 December 1972)[2] is an Indian film actor, film producer and former model who appears in Hindi films. After modelling for numerous advertisements and companies, he made his film debut with Jism (2003), which earned him the Filmfare Best Debut Award nominationJohn Abraham (born 17 December 1972)[2] is an Indian film actor, film producer and former model who appears in Hindi films. After modelling for numerous advertisements and companies, he made his film debut with Jism (2003), which earned him the Filmfare Best Debut Award nominationJohn Abraham (born 17 December 1972)[2] is an Indian film actor, film producer and former model who appears in Hindi films. After modelling for numerous advertisements and companies, he made his film debut with Jism (2003), which earned him the Filmfare Best Debut Award nominationJohn Abraham (born 17 December 1972)[2] is an Indian film actor, film producer and former model who appears in Hindi films. After modelling for numerous advertisements and companies, he made his film debut with Jism (2003), which earned him the Filmfare Best Debut Award nominationJohn Abraham (born 17 December 1972)[2] is an Indian film actor, film producer and former model who appears in Hindi films. After modelling for numerous advertisements and companies, he made his film debut with Jism (2003), which earned him the Filmfare Best Debut Award nominationJohn Abraham (born 17 December 1972)[2] is an Indian film actor, film producer and former model who appears in Hindi films. After modelling for numerous advertisements and companies, he made his film debut with Jism (2003), which earned him the Filmfare Best Debut Award nominationJohn Abraham (born 17 December 1972)[2] is an Indian film actor, film producer and former model who appears in Hindi films. After modelling for numerous advertisements and companies, he made his film debut with Jism (2003), which earned him the Filmfare Best Debut Award nomination', 'john.jpg', '2020-04-30 03:42:39', '2020-04-30 03:42:39', '0'),
(11, 'KARTIK AARYAN', 43, 29, 'Kartik Tiwari (born 22 November 1990), known professionally as Kartik Aaryan, is an Indian actor who appears in Hindi films. While pursuing an engineering degree in biotechnology, he dabbled in modelling and made attempts to start a career in film. After struggling for three years, Aaryan made his acting debut in 2011 with Pyaar Ka Punchnama, a buddy film about the romantic tribulations faced by three young men, which was directed by Luv Ranjan and co-starred Nushrat Bharucha.Kartik Tiwari (born 22 November 1990), known professionally as Kartik Aaryan, is an Indian actor who appears in Hindi films. While pursuing an engineering degree in biotechnology, he dabbled in modelling and made attempts to start a career in film. After struggling for three years, Aaryan made his acting debut in 2011 with Pyaar Ka Punchnama, a buddy film about the romantic tribulations faced by three young men, which was directed by Luv Ranjan and co-starred Nushrat Bharucha.Kartik Tiwari (born 22 November 1990), known professionally as Kartik Aaryan, is an Indian actor who appears in Hindi films. While pursuing an engineering degree in biotechnology, he dabbled in modelling and made attempts to start a career in film. After struggling for three years, Aaryan made his acting debut in 2011 with Pyaar Ka Punchnama, a buddy film about the romantic tribulations faced by three young men, which was directed by Luv Ranjan and co-starred Nushrat Bharucha.Kartik Tiwari (born 22 November 1990), known professionally as Kartik Aaryan, is an Indian actor who appears in Hindi films. While pursuing an engineering degree in biotechnology, he dabbled in modelling and made attempts to start a career in film. After struggling for three years, Aaryan made his acting debut in 2011 with Pyaar Ka Punchnama, a buddy film about the romantic tribulations faced by three young men, which was directed by Luv Ranjan and co-starred Nushrat Bharucha.Kartik Tiwari (born 22 November 1990), known professionally as Kartik Aaryan, is an Indian actor who appears in Hindi films. While pursuing an engineering degree in biotechnology, he dabbled in modelling and made attempts to start a career in film. After struggling for three years, Aaryan made his acting debut in 2011 with Pyaar Ka Punchnama, a buddy film about the romantic tribulations faced by three young men, which was directed by Luv Ranjan and co-starred Nushrat Bharucha.Kartik Tiwari (born 22 November 1990), known professionally as Kartik Aaryan, is an Indian actor who appears in Hindi films. While pursuing an engineering degree in biotechnology, he dabbled in modelling and made attempts to start a career in film. After struggling for three years, Aaryan made his acting debut in 2011 with Pyaar Ka Punchnama, a buddy film about the romantic tribulations faced by three young men, which was directed by Luv Ranjan and co-starred Nushrat Bharucha.Kartik Tiwari (born 22 November 1990), known professionally as Kartik Aaryan, is an Indian actor who appears in Hindi films. While pursuing an engineering degree in biotechnology, he dabbled in modelling and made attempts to start a career in film. After struggling for three years, Aaryan made his acting debut in 2011 with Pyaar Ka Punchnama, a buddy film about the romantic tribulations faced by three young men, which was directed by Luv Ranjan and co-starred Nushrat Bharucha.', 'KARTIK.jpg', '2020-04-30 03:47:39', '2020-04-30 03:47:39', '0'),
(13, 'MOBILE GAMES', 32, 31, 'Ludo King is a cross platform multiplayer game that supports Desktop, Android, iOS and Windows mobile platform at same time. This game also support offline mode, where player can play with Computer or, Local multiplayer Ludo King is a cross platform multiplayer game that supports Desktop, Android, iOS and Windows mobile platform at same time. This game also support offline mode, where player can play with Computer or, Local multiplayer Ludo King is a cross platform multiplayer game that supports Desktop, Android, iOS and Windows mobile platform at same time. This game also support offline mode, where player can play with Computer or, Local multiplayer Ludo King is a cross platform multiplayer game that supports Desktop, Android, iOS and Windows mobile platform at same time. This game also support offline mode, where player can play with Computer or, Local multiplayer Ludo King is a cross platform multiplayer game that supports Desktop, Android, iOS and Windows mobile platform at same time. This game also support offline mode, where player can play with Computer or, Local multiplayer Ludo King is a cross platform multiplayer game that supports Desktop, Android, iOS and Windows mobile platform at same time. This game also support offline mode, where player can play with Computer or, Local multiplayer Ludo King is a cross platform multiplayer game that supports Desktop, Android, iOS and Windows mobile platform at same time. This game also support offline mode, where player can play with Computer or, Local multiplayer ', 'LUDO.png', '2020-04-30 05:23:14', '2020-04-30 05:23:14', '0'),
(14, 'INDIAN FOOD', 44, 32, 'Flavorsome indicates good tasting, full of flavor, specifically pleasant flavor; implying delicious, tasty, appetizing, scrumptious, yummy, juicy, succulent, heavenly, inviting, luscious, mouthwatering, palatable, saporous, savory; mayFlavorsome indicates good tasting, full of flavor, specifically pleasant flavor; implying delicious, tasty, appetizing, scrumptious, yummy, juicy, succulent, heavenly, inviting, luscious, mouthwatering, palatable, saporous, savory; may be divine, toothsome, and tempting.Flavorsome indicates good tasting, full of flavor, specifically pleasant flavor; implying delicious, tasty, appetizing, scrumptious, yummy, juicy, succulent, heavenly, inviting, luscious, mouthwatering, palatable, saporous, savory; may be divine, toothsome, and tempting.Flavorsome indicates good tasting, full of flavor, specifically pleasant flavor; implying delicious, tasty, appetizing, scrumptious, yummy, juicy, succulent, heavenly, inviting, luscious, mouthwatering, palatable, saporous, savory; may be divine, toothsome, and tempting. be divine, toothsome, and tempting.', 'FOOD.jpg', '2020-05-01 05:57:36', '2020-05-01 05:57:36', '0'),
(15, 'devish', 32, 31, 'devish playing ludo', '.trashed-1676461539-IMG_20230114_205313_HDR.jpg', '2024-05-20 05:59:08', '2024-05-20 05:59:08', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'ranjan', 'ranjan27', 'sutharranjan@gmail.com', '222215');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Is_Active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Description`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(30, 'BOLLYWOOD', 'new singers', '2020-04-24 11:29:25', '2020-04-30 13:50:02', 1),
(32, 'games', 'cricket', '2020-04-24 16:52:21', '2020-04-30 11:47:59', 1),
(34, 'cricket', 'related to sports', '2020-04-24 18:17:03', '2020-04-24 18:17:03', 1),
(35, 'designer', 'designer related jobs', '2020-04-25 04:24:09', '2020-04-25 05:08:18', 1),
(36, 'coching center', 'web designer/graphics', '2020-04-25 04:46:59', '2020-04-25 04:46:59', 1),
(37, 'animals', 'name of animals', '2020-04-26 17:41:28', '2020-04-26 17:41:28', 1),
(39, 'PET DOG', 'add cat description', '2020-04-27 17:23:02', '2020-04-27 17:23:02', 1),
(40, 'corona', 'Global confirmed coronavirus cases surpassed 3 million on Monday, as the US neared the 1-million mark. Meanwhile, in India, Covid-19 has risen to 29,435. 934 patients have died so far due to the disease in India, according to health ministry. Stay with TO', '2020-04-28 18:16:58', '2020-04-28 18:16:58', 1),
(41, 'book stores', 'motivation books', '2020-04-28 18:47:55', '2020-04-28 18:47:55', 1),
(42, 'starts', 'this is stars', '2020-04-29 16:19:39', '2020-04-29 16:19:39', 1),
(43, 'ACTORS', 'BOLLYWOOD ACTORS ', '2020-04-30 03:39:46', '2020-04-30 03:39:46', 1),
(45, 'test', 'test11', '2021-01-13 04:54:34', '2024-05-16 17:49:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat_name` varchar(255) NOT NULL,
  `subcat_des` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`id`, `cat_id`, `subcat_name`, `subcat_des`, `created_at`, `updated_at`, `is_active`) VALUES
(7, 34, 'matchessss', 'world cupsss', '2020-04-24 18:17:38', '2020-04-30 05:24:18', 0),
(8, 35, 'web designerss', 'html/css', '2020-04-25 04:25:18', '2020-04-29 16:15:34', 0),
(12, 34, 'matchessss', 'world cupsss', '2020-04-25 08:46:03', '2020-04-30 05:24:18', 0),
(13, 36, 'vadodara', 'tops technology', '2020-04-25 17:03:55', '2020-04-25 17:03:55', 0),
(16, 37, 'pet animals', 'like dogs /birds/cat', '2020-04-26 17:42:08', '2020-04-29 06:24:13', 0),
(18, 36, 'web designer', 'kjghyughjg', '2020-04-26 18:25:00', '2020-04-26 18:25:00', 0),
(19, 34, 'matchessss', 'world cupsss', '2020-04-26 18:25:27', '2020-04-30 05:24:18', 0),
(21, 39, 'add sub cat', 'add des related to sub cat', '2020-04-27 17:23:28', '2020-04-27 17:23:28', 1),
(22, 39, 'add second', 'second des', '2020-04-27 17:24:43', '2020-04-27 17:24:43', 1),
(23, 40, 'Covid-19 death', 'Covid in numbers: Latest data on cases and deaths in India', '2020-04-28 18:18:45', '2020-04-30 06:01:30', 1),
(24, 40, 'Covid-19 death', 'Covid in numbers: Latest data on cases and deaths in India', '2020-04-28 18:23:36', '2020-04-30 06:01:30', 1),
(26, 42, 'HOLLYWOOD STARS', 'HOLLYWOOD STARTS HOLLYWOOD STARTS HOLLYWOOD STARTS ', '2020-04-29 16:19:57', '2020-04-30 06:16:39', 1),
(27, 30, 'animated movies', 'ANGRY BIRDS', '2020-04-29 18:18:31', '2020-04-29 18:18:31', 1),
(28, 30, 'COMEDY MOVIES', 'PHIR HERA PHERI', '2020-04-29 18:19:10', '2020-04-29 18:19:10', 1),
(29, 42, 'HOLLYWOOD STARS', 'HOLLYWOOD STARTS HOLLYWOOD STARTS HOLLYWOOD STARTS ', '2020-04-30 03:40:55', '2020-04-30 06:16:39', 1),
(30, 32, 'ludo king', 'Ludo King is a cross platform multiplayer game', '2020-04-30 05:20:05', '2020-04-30 05:20:05', 1),
(31, 32, 'ludo king', 'Ludo King is a cross platform multiplayer game that supports Desktop', '2020-04-30 05:22:59', '2020-04-30 05:22:59', 1),
(32, 44, 'SPICY', ' heavenly, inviting, luscious, mouthwatering, palatable, saporous, savory; may be divine, toothsome, and tempting', '2020-05-01 05:51:53', '2020-05-01 05:53:22', 1),
(33, 45, 'test2', 'test2', '2021-01-13 04:54:52', '2021-01-13 04:54:52', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postdetails`
--
ALTER TABLE `postdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `postdetails`
--
ALTER TABLE `postdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
