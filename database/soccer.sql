-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2023 at 11:50 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
(1, 'Ronaldo Grounded', 'Cristiano Ronaldo successfully captained Portugal to victory in France at the Euro 2016 football tournament. He is recognised as one of the world\'s best players and it was his time at Manchester United that provided the foundation for his success as a player. The early days at the club were, however, far from easy, but there are some powerful lessons around success and mentorship that we can all learn.', 'neon-_ex-XkuYjdVF7Fo-unsplash.jpg', '', 1, '2023-08-13'),
(2, 'Rain During the Match', 'The match was paused after four minutes 17 seconds, representing the time the first earthquake struck Turkey and Syria at 04:17 on 6 February.\r\n\r\nThe fans then began throwing the toys, which will be given to children in Turkey and Syria, from the stands.\r\n\r\nIt was accompanied by anti-government chants by the home supporters.\r\n\r\nMore than 50,000 people have died following the earthquakes.\r\n\r\n\"Our fans organised a meaningful event called \'This toy is my friend\' during the match in order to give morale to the children affected by the earthquake,\" Besiktas said.\r\n\r\n\"The fans threw scarves, berets and plush toys to be given as a gift to the children in the earthquake region.\"', 'michael-lee-GxNrtQRAPwA-unsplash.jpg', '', 1, '2023-08-13'),
(3, 'Empty  Stadium kick out', 'Qatar’s World Cup organisers have again been exposed making things up after a laughable claim for the opening contest of Matchday 4.\r\n\r\nNew York Times reporter Tariq Panja shared a photo of the crowd at the Al Bayt Stadium for Morocco’s clash with Croatia to open up Group F, which he described as “half-empty”.\r\n\r\n“Morocco fans making decent sound in Al Khor even though stadium is about half full/empty for this game,” he tweeted.', 'dmitry-tomashek-pH7_hVJ65ss-unsplash.jpg', '', 1, '2023-08-13');

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
  `additional_info` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`match_id`, `match_name`, `date`, `time`, `competition`, `team_id_1`, `team_id_2`, `additional_info`) VALUES
(1, 'ghfdg', '2023-08-02', '08:26:26', '1', 1, 2, 'grfgfgfdgfgfdg');

-- --------------------------------------------------------

--
-- Table structure for table `merchandise`
--

CREATE TABLE `merchandise` (
  `merchandise_id` int(11) NOT NULL,
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

INSERT INTO `merchandise` (`merchandise_id`, `name`, `description`, `mrp`, `price`, `image_1`, `image_2`, `image_3`, `sale_status`, `p_status`, `date`) VALUES
(6, 'jacket', 'gtfdhgfjfgfduyhtfhtfiujthtyhtytyt', '1000000', '2444', 'product01.jpg', 'product02.jpg', 'product03.jpg', 1, 1, '2023-08-10 02:21:32');

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
(2, 'taha_98', 6, '1', '2023-08-12 00:40:05', 0),
(3, 'fazan45', 6, '2', '2023-08-13 13:41:56', 0);

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
(2, '2', 'mt532567890@gmail.com', 0);

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
  `contact` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `about`, `contact`) VALUES
(1, 'The SSC Soccer Club stands as a testament to the spirit of camaraderie, dedication, and passion for the beautiful game. Established with a vision to foster a community united by their love for soccer, the club has grown into a vibrant hub where players, fans, and enthusiasts converge.\r\n\r\nAt the heart of SSC Soccer Club lies a deep commitment to excellence both on and off the field. With a rich history spanning several years, the club has consistently provided a platform for players of all ages to hone their skills, compete, and experience the joy of the sport. Through rigorous training, strategic coaching, and a culture of continuous improvement, SSC has produced exceptional players who carry their experience and learning forward.\r\n\r\nBeyond the field, SSC Soccer Club has become a symbol of unity and belonging. Fans from diverse backgrounds come together to support their favorite teams, sharing in the thrill of victories and the lessons in defeats. The club\'s events, matches, and community outreach initiatives promote a sense of togetherness that extends beyond the boundaries of the game.\r\n\r\nSSC Soccer Club\'s success lies in its commitment to values that transcend the sport itself – discipline, teamwork, and sportsmanship. These values inspire players to strive for greatness, respect their opponents, and contribute positively to society. The club\'s impact goes beyond trophies and titles; it instills character and life skills that players carry with them in their journey both on and off the field.\r\n\r\nAs the club continues to evolve, SSC Soccer Club remains a beacon of passion, unity, and excellence in the world of soccer. Its legacy continues to shape players, fans, and the community at large, reflecting the power of sports to bring people together and create lasting memories.', 'Thank you for your interest in connecting with us. Whether you have inquiries, feedback, or would like to get involved, we welcome the opportunity to hear from you. Feel free to reach out using the information provided below:\r\n\r\n');

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
(2, 'taha_98', 'Muhammad taha  ', 'laf', '03153678107', '75010', 'sindh', 'Karachi gulshan-e-hadeed', '2023-08-12 03:39:01'),
(7, 'fazan45', 'Muhammad Faizan', 'A22 phase 2', '03152773880', '75010', 'sindh', 'Karachi gulshan-e-hadeed', '2023-08-13 00:09:01');

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
(1, 'MSG - 360 Combat', 'msg360combat@info.com', 'Soccer_Admin', '12345', '763284632486324', '2023-08-09 04:06:39', 786, 786),
(23, 'Muhammad taha  ', 'mt532567890@gmail.com', 'taha_98', '12345', '03153678107', '2023-08-13 01:52:45', 1, 1),
(27, 'Muhammad Faizan', 'alltimeinpc@gmail.com', 'fazan45', '12345', '03152773880', '2023-08-13 00:08:40', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `verification_code`
--

CREATE TABLE `verification_code` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verification_code`
--

INSERT INTO `verification_code` (`id`, `user_id`, `email`, `verification_code`, `date_time`) VALUES
(1, '', 'mt532567890@gmail.com', '00477b', '2023-08-12 14:05:26'),
(2, '', 'mt532567890@gmail.com', 'fd6b05', '2023-08-13 13:43:37'),
(3, '', 'mt532567890@gmail.com', '033843', '2023-08-13 13:43:54');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merchandise`
--
ALTER TABLE `merchandise`
  MODIFY `merchandise_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping_details`
--
ALTER TABLE `shipping_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `verification_code`
--
ALTER TABLE `verification_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
