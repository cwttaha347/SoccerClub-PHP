-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2025 at 01:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soccer`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `des` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `video` varchar(355) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `des`, `image`, `video`, `status`, `date`) VALUES
(1, 'Biggest Match of Soccer', 'The 2023 Major League Soccer season is the 28th season of Major League Soccer (MLS), the top professional soccer league in the United States and Canada. Furthermore, being the 45th season overall, of a national first-division league in the United States. The league will have 29 clubs following the addition of St. Louis City SC as an expansion team in the Western Conference, with Nashville SC moving back to the Eastern Conference. The regular season began on February 25, 2023, and ends on October 21; it will then be followed by the playoffs. The regular schedule was released on December 20, 2022.', 'stadium-with-purple-roof-lights-that-says-world-cup-it.jpg', '', 1, '2023-08-16'),
(2, 'Messi Heavy Goal', 'Lionel Andrés Messi ( born 24 June 1987), also known as Leo Messi, is an Argentine professional footballer who plays as a forward for and captains both Major League Soccer club Inter Miami and the Argentina national team. Widely regarded as one of the greatest players of all time, Messi has won a record seven Ballon d\'Or awards and a record six European Golden Shoes, and in 2020 he was named to the Ballon d\'Or Dream Team. Until leaving the club in 2021, he had spent his entire professional career with Barcelona, where he won a club-record 35 trophies, including ten La Liga titles, seven Copa del Rey titles and the UEFA Champions League four times.[note 3] With his country, he won the 2021 Copa América and the 2022 FIFA World Cup. A prolific goalscorer and creative playmaker, Messi holds the records for most goals in La Liga (474), most hat-tricks in La Liga (36) and the UEFA Champions League (eight), and most assists in La Liga (192) and the Copa América (17). He also has the most international goals by a South American male (103). Messi has scored over 800 senior career goals for club and country, and has the most goals by a player for a single club (672).', 'male-beauty-concept-portrait-fashionable-young-man-with-stylish-haircut-wearing-trendy-suit-posing-red-wall.jpg', '', 1, '2023-08-16'),
(3, 'Ronaldo', 'Cristiano Ronaldo dos Santos Aveiro GOIH ComM (Portuguese pronunciation: [kɾiʃˈtjɐnu ʁɔˈnaldu]; born 5 February 1985) is a Portuguese professional footballer who plays as a forward for and captains both Saudi Pro League club Al Nassr and the Portugal national team. Widely regarded as one of the greatest players of all time, Ronaldo has won five Ballon d\'Or awards,[note 3] a record three UEFA Best Player in Europe, and four European Golden Shoes, the most by a European player. He has won 34 trophies in his career, including seven league titles, five UEFA Champions Leagues, the UEFA European Championship and the UEFA Nations League. Ronaldo holds the records for most appearances (183), goals (140) and assists (42) in the Champions League, goals in the European Championship (14), international goals (123) and international appearances (200). He is one of the few players to have made over 1,100 professional career appearances, and has scored over 800 official senior career goals for club and country, making him the highest goalscorer of all time.', 'download (1).jfif', '', 1, '2023-08-16');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `merchandise_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `ip`, `merchandise_id`, `quantity`) VALUES
(14, '182.180.190.196', 8, 4),
(17, '103.84.150.78', 8, 2),
(19, '::1', 9, 5);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `status`, `date_created`) VALUES
(1, 'Shoes', 1, '2023-08-17 20:54:42'),
(2, 'sports', 1, '2023-08-30 11:32:03');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `subject`, `comment`) VALUES
(1, 'taha', 'fdgd@gfg.com', '43463456', 'gfdgdfghfdgdfg', 'dsfsdfsdfsdf'),
(2, 'taha', 'fdgd@gfg.com', '43463456', 'gfdgdfghfdgdfg', 'dsfsdfsdfsdf'),
(3, 'taha', 'fdgd@gfg.com', '43463456', 'gfdgdfghfdgdfg', 'dsfsdfsdfsdf'),
(4, 'taha', 'fdgd@gfg.com', '43463456', 'gfdgdfghfdgdfg', 'dsfsdfsdfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `submision_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `live_scores`
--

CREATE TABLE `live_scores` (
  `live_score_id` int(11) NOT NULL,
  `match_id` int(11) DEFAULT NULL,
  `team1_score` int(11) DEFAULT NULL,
  `team2_score` int(11) DEFAULT NULL,
  `match_status` varchar(50) DEFAULT NULL,
  `match_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `live_scores`
--

INSERT INTO `live_scores` (`live_score_id`, `match_id`, `team1_score`, `team2_score`, `match_status`, `match_date`) VALUES
(0, 1, 5, 2, '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `match_id` int(11) NOT NULL,
  `match_name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `competition` varchar(255) DEFAULT NULL,
  `team_id_1` int(11) DEFAULT NULL,
  `team_id_2` int(11) DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`match_id`, `match_name`, `date`, `time`, `competition`, `team_id_1`, `team_id_2`, `additional_info`, `status`) VALUES
(1, 'ghfdg', '2023-08-02', '08:26:26', '1', 1, 2, 'grfgfgfdgfgfdg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `merchandise`
--

CREATE TABLE `merchandise` (
  `merchandise_id` int(11) NOT NULL,
  `p_cat_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `mrp` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image_1` varchar(255) NOT NULL,
  `image_2` varchar(255) NOT NULL,
  `image_3` varchar(255) NOT NULL,
  `sale_status` int(11) NOT NULL,
  `p_status` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `merchandise`
--

INSERT INTO `merchandise` (`merchandise_id`, `p_cat_id`, `name`, `description`, `mrp`, `price`, `image_1`, `image_2`, `image_3`, `sale_status`, `p_status`, `date`) VALUES
(9, 2, 'Soccer', '5000 ki soccer lelo', '0', '5000', '10601489_41932.jpg', '2071687_266535-P5LFMH-448.jpg', '10601489_41932.jpg', 1, 1, '2023-12-15 02:07:01');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `merchandise_id` int(11) NOT NULL,
  `quantity` varchar(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `merchandise_id`, `quantity`, `order_date`, `status`) VALUES
(9, 'seaker', 9, '2', '2025-03-01 22:02:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `player_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `career_statistics` varchar(255) NOT NULL,
  `achivements` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `playing_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`player_id`, `team_id`, `name`, `dob`, `career_statistics`, `achivements`, `images`, `playing_role`) VALUES
(2, 1, 'Messi', '2012-04-12', 'margya', 'khatam tata bye bye gud bye gya', 'download.jfif', 'goal keeper');

-- --------------------------------------------------------

--
-- Table structure for table `player_statistics`
--

CREATE TABLE `player_statistics` (
  `statistics_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `goals` varchar(255) NOT NULL,
  `assists` varchar(255) NOT NULL,
  `shots_on_target` varchar(255) NOT NULL,
  `yellow_card` varchar(255) NOT NULL,
  `red_card` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `player_statistics`
--

INSERT INTO `player_statistics` (`statistics_id`, `player_id`, `goals`, `assists`, `shots_on_target`, `yellow_card`, `red_card`) VALUES
(2, 2, '16', '16', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `id` int(11) NOT NULL,
  `match_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`id`, `match_id`, `email`, `status`) VALUES
(1, '2', 'mt532567890@gmail.com', 0),
(2, '2', 'mt532567890@gmail.com', 0),
(3, '1', 'noreply@ecommerce.com', 0),
(4, '1', 'marcodesolutions@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `name` varchar(355) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date_commented` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `blog_id`, `name`, `email`, `comment`, `date_commented`) VALUES
(1, 1, 'taha', 'taha@gmail.com', 'acha', '2023-08-12 05:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `about` mediumtext NOT NULL,
  `contact` mediumtext NOT NULL,
  `categories_status` int(11) NOT NULL,
  `facebook_link` varchar(355) NOT NULL,
  `twitter_link` varchar(355) NOT NULL,
  `behance_link` varchar(355) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `about`, `contact`, `categories_status`, `facebook_link`, `twitter_link`, `behance_link`) VALUES
(1, 'The SSC Soccer Club stands as a testament to the spirit of camaraderie, dedication, and passion for the beautiful game. Established with a vision to foster a community united by their love for soccer, the club has grown into a vibrant hub where players, fans, and enthusiasts converge.\r\n\r\nAt the heart of SSC Soccer Club lies a deep commitment to excellence both on and off the field. With a rich history spanning several years, the club has consistently provided a platform for players of all ages to hone their skills, compete, and experience the joy of the sport. Through rigorous training, strategic coaching, and a culture of continuous improvement, SSC has produced exceptional players who carry their experience and learning forward.\r\n\r\nBeyond the field, SSC Soccer Club has become a symbol of unity and belonging. Fans from diverse backgrounds come together to support their favorite teams, sharing in the thrill of victories and the lessons in defeats. The club\'s events, matches, and community outreach initiatives promote a sense of togetherness that extends beyond the boundaries of the game.\r\n\r\nSSC Soccer Club\'s success lies in its commitment to values that transcend the sport itself – discipline, teamwork, and sportsmanship. These values inspire players to strive for greatness, respect their opponents, and contribute positively to society. The club\'s impact goes beyond trophies and titles; it instills character and life skills that players carry with them in their journey both on and off the field.\r\n\r\nAs the club continues to evolve, SSC Soccer Club remains a beacon of passion, unity, and excellence in the world of soccer. Its legacy continues to shape players, fans, and the community at large, reflecting the power of sports to bring people together and create lasting memories.', 'Thank you for your interest in connecting with us. Whether you have inquiries, feedback, or would like to get involved, we welcome the opportunity to hear from you. Feel free to reach out using the information provided below:\r\n\r\n', 1, 'facebook.com/MuhammadTaha', 'twitter.com/@taha', 'https://786-tech.000webhostapp.com');

-- --------------------------------------------------------

--
-- Table structure for table `shipped`
--

CREATE TABLE `shipped` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `provice` varchar(255) NOT NULL,
  `merch` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `mrp` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `subtotal` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipped`
--

INSERT INTO `shipped` (`id`, `order_id`, `invoice`, `fullname`, `address`, `city`, `provice`, `merch`, `qty`, `mrp`, `price`, `subtotal`, `grand_total`, `date`) VALUES
(3, 6, 'INV3785', 'Muhammad taha  ', 'A22 phase 2', 'Karachi gulshan-e-hadeed', 'sindh', 'Spiderman Shoes', 2, '200', '10000', '400', '20180', '2023-08-31 19:26:00'),
(4, 9, 'INV4218', 'Muhammad taha', 'A22 phase 2, K-E-S-C Colony', 'Karachi', 'sindh', 'Soccer', 2, '0', '5000', '0', '10180', '2025-03-01 22:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_details`
--

CREATE TABLE `shipping_details` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `procvice` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping_details`
--

INSERT INTO `shipping_details` (`id`, `username`, `fullname`, `address`, `contact`, `postal_code`, `procvice`, `city`, `date_added`) VALUES
(2, 'taha_98', 'Muhammad taha  ', 'A22 phase 2', '03153678107', '75010', 'sindh', 'Karachi gulshan-e-hadeed', '2023-08-16 20:30:52'),
(7, 'fazan45', 'Muhammad Faizan', 'A22 phase 2', '03152773880', '75010', 'sindh', 'Karachi gulshan-e-hadeed', '2023-08-13 00:09:01'),
(8, 'taha_0981', 'Muhammad taha', 'A22 phase 2, K-E-S-C Colony', '03153678107', '75010', 'sindh', 'Karachi', '2023-08-17 14:22:10'),
(9, 'seaker', 'Muhammad taha', 'A22 phase 2, K-E-S-C Colony', '123456', '75010', 'sindh', 'Karachi', '2023-12-15 02:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `soccer_info`
--

CREATE TABLE `soccer_info` (
  `id` int(11) NOT NULL,
  `tricks` text NOT NULL,
  `facts` text NOT NULL,
  `information` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soccer_info`
--

INSERT INTO `soccer_info` (`id`, `tricks`, `facts`, `information`) VALUES
(1, 'No one knows exactly when soccer was created, but the earliest versions of the game can be traced back 3,000 years. Soccer is the most popular game in the world. In many countries it is known as “football”. In England, soccer was formed when several clubs formed the Football Association about 150 years ago.', 'No one knows exactly when soccer was created, but the earliest versions of the game can be traced back 3,000 years. Soccer is the most popular game in the world. In many countries it is known as “football”. In England, soccer was formed when several clubs formed the Football Association about 150 years ago.', 'No one knows exactly when soccer was created, but the earliest versions of the game can be traced back 3,000 years. Soccer is the most popular game in the world. In many countries it is known as “football”. In England, soccer was formed when several clubs formed the Football Association about 150 years ago.');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `name`, `logo`, `status`, `date_created`) VALUES
(1, 'argentina', 'ARG.png', 1, '2023-08-11 18:38:27'),
(2, 'Brazil', 'images.png', 1, '2023-08-13 00:45:46');

-- --------------------------------------------------------

--
-- Table structure for table `team_statistics`
--

CREATE TABLE `team_statistics` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `matches_played` varchar(255) NOT NULL,
  `matches_win` varchar(255) NOT NULL,
  `matched_lost` varchar(255) NOT NULL,
  `matches_tie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_statistics`
--

INSERT INTO `team_statistics` (`id`, `team_id`, `matches_played`, `matches_win`, `matched_lost`, `matches_tie`) VALUES
(1, 1, '55', '45', '8', '2'),
(2, 2, '34', '654', '546', '2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `username`, `password`, `contact`, `date_created`, `status`, `role`) VALUES
(1, 'MSG - 360 Combat', 'msg360combat@info.com', 'Soccer_Admin', '12345', '763284632486324', '2023-08-09 04:06:39', 786, 786);

-- --------------------------------------------------------

--
-- Table structure for table `verification_code`
--

CREATE TABLE `verification_code` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `live_scores`
--
ALTER TABLE `live_scores`
  ADD PRIMARY KEY (`live_score_id`),
  ADD KEY `match_id` (`match_id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`match_id`),
  ADD KEY `team_id_1` (`team_id_1`),
  ADD KEY `team_id_2` (`team_id_2`);

--
-- Indexes for table `merchandise`
--
ALTER TABLE `merchandise`
  ADD PRIMARY KEY (`merchandise_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`player_id`);

--
-- Indexes for table `player_statistics`
--
ALTER TABLE `player_statistics`
  ADD PRIMARY KEY (`statistics_id`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipped`
--
ALTER TABLE `shipped`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_details`
--
ALTER TABLE `shipping_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `soccer_info`
--
ALTER TABLE `soccer_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `team_statistics`
--
ALTER TABLE `team_statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `verification_code`
--
ALTER TABLE `verification_code`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merchandise`
--
ALTER TABLE `merchandise`
  MODIFY `merchandise_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `player_statistics`
--
ALTER TABLE `player_statistics`
  MODIFY `statistics_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipped`
--
ALTER TABLE `shipped`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shipping_details`
--
ALTER TABLE `shipping_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team_statistics`
--
ALTER TABLE `team_statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `verification_code`
--
ALTER TABLE `verification_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `live_scores`
--
ALTER TABLE `live_scores`
  ADD CONSTRAINT `live_scores_ibfk_1` FOREIGN KEY (`match_id`) REFERENCES `matches` (`match_id`);

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`team_id_1`) REFERENCES `teams` (`team_id`),
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`team_id_2`) REFERENCES `teams` (`team_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
