-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2024 at 01:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `level_type`, `created_at`, `updated_at`, `isdeleted`) VALUES
(1, 'Beginner', '2024-08-21 18:18:43', '2024-08-21 18:18:43', 0),
(2, 'Intermediate', '2024-08-21 18:18:51', '2024-08-21 18:18:51', 0),
(3, 'Professional', '2024-08-21 18:18:59', '2024-08-21 18:19:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` bigint(11) UNSIGNED NOT NULL,
  `level_id` bigint(11) UNSIGNED NOT NULL,
  `question` longtext DEFAULT NULL,
  `op1` text DEFAULT NULL,
  `op2` text DEFAULT NULL,
  `op3` text DEFAULT NULL,
  `op4` text DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `topic_id`, `level_id`, `question`, `op1`, `op2`, `op3`, `op4`, `answer`, `created_at`, `updated_at`, `isdeleted`) VALUES
(1, 1, 1, 'Which country has won the most FIFA World Cup titles?', 'Germany', 'Brazil', 'Argentina', 'Italy', 'Op2', '2024-08-24 05:16:50', '2024-08-24 05:16:50', 0),
(2, 1, 1, 'In which sport would you perform a slam dunk?', 'Tennis', 'Volleyball', 'Basketball', 'Baseball', 'Op3', '2024-08-24 05:32:04', '2024-08-24 05:32:04', 0),
(4, 1, 1, 'Which country is famous for originating the sport of cricket?', 'Australia', 'India', 'England', 'Africa', 'Op3', '2024-08-24 05:38:03', '2024-08-24 05:38:03', 0),
(5, 1, 1, 'What is the length of an Olympic swimming pool?', '25 mt', '50 mt', '75 mt', '100 mt', 'Op2', '2024-08-24 05:38:41', '2024-08-24 05:38:41', 0),
(6, 1, 1, 'Which country won the first-ever FIFA World Cup in 1930?', 'Brazil', 'Uruguay', 'Argentina', 'Italy', 'Op2', '2024-08-24 05:40:31', '2024-08-24 05:40:31', 0),
(7, 1, 1, 'In golf, what is the term for a score of one under par on a hole?', 'Eagle', 'Birdie', 'Par', 'Bogey', 'Op2', '2024-08-24 05:41:01', '2024-08-24 05:41:01', 0),
(8, 1, 2, 'In which year did Roger Federer win his first Wimbledon title?', '2001', '2002', '2003', '2004', 'Op3', '2024-08-24 05:42:09', '2024-08-24 05:42:09', 0),
(9, 1, 2, 'In which city were the 2000 Summer Olympics held?', 'Beijing', 'Atlanta', 'Athens', 'Sydney', 'Op4', '2024-08-24 05:42:53', '2024-08-24 05:42:53', 0),
(10, 1, 2, 'Which team won the NBA Championship in 2020?', 'Golden State Warriors', 'Miami Heat', 'Los Angeles Lakers', 'Milwaukee Bucks', 'Op3', '2024-08-24 05:43:27', '2024-08-24 05:43:27', 0),
(11, 1, 2, 'In which Grand Slam tournament is the Philippe-Chatrier court the main stadium?', 'Australian Open', 'French Open', 'Wimbledon', 'US Open', 'Op2', '2024-08-24 05:44:03', '2024-08-24 05:44:03', 0),
(12, 1, 3, 'Which golfer became the youngest player to achieve a career Grand Slam by winning the 2021 U.S. Open?', 'Rory McIlroy', 'Phil Mickelson', 'Tiger Woods', 'Brooks Koepka', 'Op3', '2024-08-24 05:45:13', '2024-08-24 05:45:13', 0),
(13, 1, 3, 'Which team set the record for the most points scored in a single NFL regular season game?', 'Denver Broncos', 'New England Patriots', 'Chicago Bears', 'San Francisco 49ers', 'Op1', '2024-08-24 05:45:47', '2024-08-24 05:45:47', 0),
(14, 1, 3, 'Which Formula 1 driver holds the record for the most consecutive World Championships?', 'Lewis Hamilton', 'Sebastian Vettel', 'Michael Schumacher', 'Juan Manuel Fangio', 'Op2', '2024-08-24 05:46:22', '2024-08-24 05:46:22', 0),
(15, 1, 3, 'Who holds the record for the most home runs in a single MLB season?', 'Babe Ruth', 'Hank Aaron', 'Barry Bonds', 'Mark McGwire', 'Op3', '2024-08-24 05:46:59', '2024-08-24 05:46:59', 0),
(16, 1, 1, 'Which country won the FIFA World Cup in 2018?', 'Germany', 'Brazil', 'France', 'Argentina', 'Op3', '2024-08-24 05:56:36', '2024-08-24 05:56:36', 0),
(17, 2, 1, 'What is the chemical symbol for Gold?', 'Au', 'Ag', 'Pb', 'Fe', 'Op1', '2024-08-24 06:01:43', '2024-08-24 06:01:43', 0),
(18, 2, 1, 'What planet is known as the Red Planet?', 'Venus', 'Earth', 'Mars', 'Jupiter', 'Op3', '2024-08-24 06:01:43', '2024-08-24 06:01:43', 0),
(19, 2, 2, 'Who developed the theory of relativity?', 'Isaac Newton', 'Albert Einstein', 'Galileo Galilei', 'Nikola Tesla', 'Op2', '2024-08-24 06:01:43', '2024-08-24 06:01:43', 0),
(20, 2, 2, 'What is the powerhouse of the cell?', 'Nucleus', 'Mitochondria', 'Ribosome', 'Endoplasmic Reticulum', 'Op2', '2024-08-24 06:01:43', '2024-08-24 06:01:43', 0),
(21, 2, 3, 'What is the speed of light in a vacuum?', '3 x 10^8 m/s', '3 x 10^6 m/s', '3 x 10^7 m/s', '3 x 10^9 m/s', 'Op1', '2024-08-24 06:01:43', '2024-08-24 06:01:43', 0),
(22, 2, 1, 'What is the most common gas in Earth\'s atmosphere?', 'Oxygen', 'Carbon Dioxide', 'Nitrogen', 'Hydrogen', 'Op3', '2024-08-24 06:01:43', '2024-08-24 06:01:43', 0),
(23, 2, 1, 'Which organ is vital for pumping blood through the body?', 'Lung', 'Liver', 'Heart', 'Kidney', 'Op3', '2024-08-24 06:01:43', '2024-08-24 06:01:43', 0),
(24, 2, 2, 'Who is known as the father of modern physics?', 'Isaac Newton', 'Albert Einstein', 'Niels Bohr', 'Erwin Schrödinger', 'Op1', '2024-08-24 06:01:43', '2024-08-24 06:01:43', 0),
(25, 2, 2, 'What device is used to measure temperature?', 'Barometer', 'Thermometer', 'Hygrometer', 'Altimeter', 'Op2', '2024-08-24 06:01:43', '2024-08-24 06:01:43', 0),
(26, 2, 3, 'What is the most abundant element in the universe?', 'Hydrogen', 'Helium', 'Carbon', 'Oxygen', 'Op1', '2024-08-24 06:01:43', '2024-08-24 06:01:43', 0),
(27, 2, 1, 'What is the chemical symbol for Iron?', 'Fe', 'Ir', 'I', 'In', 'Op1', '2024-08-24 06:01:43', '2024-08-24 06:01:43', 0),
(28, 2, 1, 'What is the main function of red blood cells?', 'Carry oxygen', 'Fight infection', 'Digest food', 'Regulate hormones', 'Op1', '2024-08-24 06:01:43', '2024-08-24 06:01:43', 0),
(29, 2, 2, 'What is the boiling point of water in Fahrenheit?', '100°F', '212°F', '180°F', '98°F', 'Op2', '2024-08-24 06:01:43', '2024-08-24 06:01:43', 0),
(30, 2, 2, 'What does DNA stand for?', 'Deoxyribonucleic Acid', 'Ribonucleic Acid', 'Deoxyribonitric Acid', 'Ribonitric Acid', 'Op1', '2024-08-24 06:01:43', '2024-08-24 06:01:43', 0),
(31, 2, 3, 'What is the most abundant element in Earth’s crust?', 'Iron', 'Oxygen', 'Silicon', 'Aluminum', 'Op2', '2024-08-24 06:01:43', '2024-08-24 06:01:43', 0),
(32, 2, 1, 'What is the term for the study of stars and planets?', 'Astronomy', 'Geology', 'Biology', 'Meteorology', 'Op1', '2024-08-24 06:01:43', '2024-08-24 06:01:43', 0),
(33, 2, 1, 'What is the boiling point of water in Kelvin?', '373 K', '373°C', '100 K', '273 K', 'Op1', '2024-08-24 06:01:43', '2024-08-24 06:01:43', 0),
(34, 2, 2, 'What device is used to measure electric current?', 'Volt meter', 'Ammeter', 'Thermometer', 'Barometer', 'Op2', '2024-08-24 06:01:43', '2024-08-24 06:01:43', 0),
(35, 2, 2, 'What is the largest organ in the human body?', 'Liver', 'Heart', 'Skin', 'Lung', 'Op3', '2024-08-24 06:01:43', '2024-08-24 06:01:43', 0),
(36, 2, 3, 'What is the main component of the Earth’s core?', 'Iron', 'Nickel', 'Aluminum', 'Copper', 'Op1', '2024-08-24 06:01:43', '2024-08-24 06:01:43', 0),
(37, 3, 1, 'Who painted the Mona Lisa?', 'Vincent van Gogh', 'Leonardo da Vinci', 'Claude Monet', 'Pablo Picasso', 'Op2', '2024-08-24 06:07:02', '2024-08-24 06:07:02', 0),
(38, 3, 1, 'What is the primary medium used in sculpture?', 'Oil Paint', 'Clay', 'Charcoal', 'Digital Media', 'Op2', '2024-08-24 06:07:02', '2024-08-24 06:07:02', 0),
(39, 3, 2, 'Which artist is known for the \"Starry Night\"?', 'Vincent van Gogh', 'Salvador Dali', 'Georgia O\'Keeffe', 'Monet', 'Op1', '2024-08-24 06:07:02', '2024-08-24 06:07:02', 0),
(40, 3, 2, 'What is the main subject of Impressionism?', 'Abstract Forms', 'Nature and Light', 'Historical Events', 'Geometric Shapes', 'Op2', '2024-08-24 06:07:02', '2024-08-24 06:07:02', 0),
(41, 3, 3, 'Who created the famous sculpture \"David\"?', 'Michelangelo', 'Donatello', 'Rodin', 'Bernini', 'Op2', '2024-08-24 06:07:02', '2024-08-24 06:07:02', 0),
(42, 3, 1, 'Which artist is known for his Campbell’s Soup Cans?', 'Andy Warhol', 'Jackson Pollock', 'Wassily Kandinsky', 'Pablo Picasso', 'Op1', '2024-08-24 06:07:02', '2024-08-24 06:07:02', 0),
(43, 3, 1, 'What is the focus of Baroque art?', 'Emotional intensity and drama', 'Minimalism', 'Bright colors and abstract forms', 'Geometric precision', 'Op1', '2024-08-24 06:07:02', '2024-08-24 06:07:02', 0),
(44, 3, 2, 'Which artist is known for his \"Blue Period\"?', 'Pablo Picasso', 'Henri Matisse', 'Gustav Klimt', 'Edvard Munch', 'Op1', '2024-08-24 06:07:02', '2024-08-24 06:07:02', 0),
(45, 3, 2, 'Which famous sculpture was created by Michelangelo?', 'The Thinker', 'David', 'The Kiss', 'Venus de Milo', 'Op2', '2024-08-24 06:07:02', '2024-08-24 06:07:02', 0),
(46, 3, 3, 'Which art movement is characterized by a focus on the subconscious and dream-like scenes?', 'Surrealism', 'Impressionism', 'Realism', 'Cubism', 'Op1', '2024-08-24 06:07:02', '2024-08-24 06:07:02', 0),
(47, 3, 1, 'Which artist is famous for his Campbell’s Soup Cans?', 'Andy Warhol', 'Jackson Pollock', 'Wassily Kandinsky', 'Pablo Picasso', 'Op1', '2024-08-24 06:07:02', '2024-08-24 06:07:02', 0),
(48, 3, 1, 'What is the focus of Baroque art?', 'Emotional intensity and drama', 'Minimalism', 'Bright colors and abstract forms', 'Geometric precision', 'Op1', '2024-08-24 06:07:02', '2024-08-24 06:07:02', 0),
(49, 3, 2, 'Which artist is known for his \"Blue Period\"?', 'Pablo Picasso', 'Henri Matisse', 'Gustav Klimt', 'Edvard Munch', 'Op1', '2024-08-24 06:07:02', '2024-08-24 06:07:02', 0),
(50, 3, 2, 'Which famous sculpture was created by Michelangelo?', 'The Thinker', 'David', 'The Kiss', 'Venus de Milo', 'Op2', '2024-08-24 06:07:02', '2024-08-24 06:07:02', 0),
(51, 3, 3, 'Which art movement is characterized by a focus on the subconscious and dream-like scenes?', 'Surrealism', 'Impressionism', 'Realism', 'Cubism', 'Op1', '2024-08-24 06:07:02', '2024-08-24 06:07:02', 0),
(52, 3, 1, 'Which artist is known for the \"Creation of Adam\"?', 'Michelangelo', 'Raphael', 'Leonardo da Vinci', 'Titian', 'Op1', '2024-08-24 06:07:02', '2024-08-24 06:07:02', 0),
(53, 3, 1, 'What is the most famous sculpture by Auguste Rodin?', 'The Kiss', 'The Thinker', 'The Gates of Hell', 'The Burghers of Calais', 'Op2', '2024-08-24 06:07:02', '2024-08-24 06:07:02', 0),
(54, 3, 2, 'Which art movement focused on capturing the effects of light?', 'Impressionism', 'Surrealism', 'Cubism', 'Realism', 'Op1', '2024-08-24 06:07:02', '2024-08-24 06:07:02', 0),
(55, 3, 2, 'What term describes an artwork that uses light and shadow to create the illusion of depth?', 'Chiaroscuro', 'Pointillism', 'Foreshortening', 'Sfumato', 'Op1', '2024-08-24 06:07:02', '2024-08-24 06:07:02', 0),
(56, 3, 3, 'Who painted \"The Birth of Venus\"?', 'Sandro Botticelli', 'Leonardo da Vinci', 'Michelangelo', 'Caravaggio', 'Op1', '2024-08-24 06:07:02', '2024-08-24 06:07:02', 0),
(57, 4, 1, 'Who was the first President of the United States?', 'George Washington', 'Thomas Jefferson', 'Abraham Lincoln', 'John Adams', 'Op1', '2024-08-24 06:26:56', '2024-08-24 06:26:56', 0),
(58, 4, 1, 'What is the primary function of the executive branch of government?', 'Enforce laws', 'Interpret laws', 'Create laws', 'Amend laws', 'Op1', '2024-08-24 06:26:56', '2024-08-24 06:26:56', 0),
(59, 4, 2, 'Which document declared the independence of the American colonies from Britain?', 'The Bill of Rights', 'The Constitution', 'The Declaration of Independence', 'The Federalist Papers', 'Op3', '2024-08-24 06:26:56', '2024-08-24 06:26:56', 0),
(60, 4, 2, 'Who is the current Chancellor of Germany?', 'Angela Merkel', 'Olaf Scholz', 'Frank-Walter Steinmeier', 'Heiko Maas', 'Op2', '2024-08-24 06:26:56', '2024-08-24 06:26:56', 0),
(61, 4, 3, 'What is the primary purpose of the United Nations?', 'To promote international trade', 'To maintain international peace and security', 'To provide financial aid to developing countries', 'To oversee global elections', 'Op2', '2024-08-24 06:26:56', '2024-08-24 06:26:56', 0),
(62, 4, 1, 'Which country is known for its neutral stance in international conflicts?', 'Sweden', 'France', 'USA', 'Canada', 'Op1', '2024-08-24 06:26:56', '2024-08-24 06:26:56', 0),
(63, 4, 1, 'Who is the leader of the opposition party in the UK?', 'David Cameron', 'Keir Starmer', 'Boris Johnson', 'Jeremy Corbyn', 'Op2', '2024-08-24 06:26:56', '2024-08-24 06:26:56', 0),
(64, 4, 2, 'What is the legislative body of the United States government called?', 'Congress', 'Senate', 'Parliament', 'Assembly', 'Op1', '2024-08-24 06:26:56', '2024-08-24 06:26:56', 0),
(65, 4, 2, 'Which country has the longest-serving Prime Minister in history?', 'United Kingdom', 'Canada', 'India', 'Australia', 'Op1', '2024-08-24 06:26:56', '2024-08-24 06:26:56', 0),
(66, 4, 3, 'What is the main purpose of the International Monetary Fund (IMF)?', 'To provide military support', 'To offer financial assistance and stabilize economies', 'To regulate global internet traffic', 'To oversee international human rights', 'Op2', '2024-08-24 06:26:56', '2024-08-24 06:26:56', 0),
(67, 4, 1, 'Which US President issued the Emancipation Proclamation?', 'Abraham Lincoln', 'George Washington', 'Thomas Jefferson', 'Andrew Jackson', 'Op1', '2024-08-24 06:26:56', '2024-08-24 06:26:56', 0),
(68, 4, 1, 'What is the main function of the legislative branch of government?', 'Enforce laws', 'Interpret laws', 'Make laws', 'Administer laws', 'Op3', '2024-08-24 06:26:56', '2024-08-24 06:26:56', 0),
(69, 4, 2, 'Which country has a system of government known as a \"Federal Republic\"?', 'France', 'Germany', 'Spain', 'Italy', 'Op2', '2024-08-24 06:26:56', '2024-08-24 06:26:56', 0),
(70, 4, 2, 'Who is the current Chancellor of Germany?', 'Angela Merkel', 'Olaf Scholz', 'Frank-Walter Steinmeier', 'Heiko Maas', 'Op2', '2024-08-24 06:26:56', '2024-08-24 06:26:56', 0),
(71, 4, 3, 'What is the term for a government where power is divided between national and regional authorities?', 'Unitarianism', 'Federalism', 'Confederation', 'Monarchy', 'Op2', '2024-08-24 06:26:56', '2024-08-24 06:26:56', 0),
(72, 4, 1, 'Which document outlines the fundamental rights of citizens in the United States?', 'The Constitution', 'The Declaration of Independence', 'The Bill of Rights', 'The Federalist Papers', 'Op3', '2024-08-24 06:26:56', '2024-08-24 06:26:56', 0),
(73, 4, 1, 'What is the role of the judicial branch in the United States government?', 'Enforce laws', 'Create laws', 'Interpret laws', 'Adjudicate disputes', 'Op3', '2024-08-24 06:26:56', '2024-08-24 06:26:56', 0),
(74, 4, 2, 'Which system of government is characterized by a single ruler with absolute power?', 'Democracy', 'Monarchy', 'Autocracy', 'Oligarchy', 'Op3', '2024-08-24 06:26:56', '2024-08-24 06:26:56', 0),
(75, 4, 2, 'What is the term for a government system where power is concentrated in a small group?', 'Democracy', 'Oligarchy', 'Theocracy', 'Monarchy', 'Op2', '2024-08-24 06:26:56', '2024-08-24 06:26:56', 0),
(76, 4, 3, 'What is the purpose of the World Trade Organization (WTO)?', 'To regulate global internet standards', 'To oversee international environmental policies', 'To facilitate international trade', 'To manage global military alliances', 'Op3', '2024-08-24 06:26:56', '2024-08-24 06:26:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `topic_name`, `created_at`, `updated_at`, `isdeleted`) VALUES
(1, 'Sports', '2024-08-21 18:00:33', '2024-08-21 18:00:33', 0),
(2, 'Science & Technology', '2024-08-21 18:00:44', '2024-08-21 18:00:44', 0),
(3, 'Arts', '2024-08-21 18:01:00', '2024-08-21 18:01:00', 0),
(4, 'Politics', '2024-08-21 18:03:20', '2024-08-21 18:03:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `uid` int(11) NOT NULL,
  `uname` varchar(200) NOT NULL,
  `uemail` varchar(200) NOT NULL,
  `upass` varchar(200) NOT NULL,
  `umobileno` int(50) NOT NULL,
  `isstatus` tinyint(1) NOT NULL DEFAULT 0,
  `createdby` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `createddate` int(11) DEFAULT NULL,
  `modefiedby` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `modifieddate` date DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`uid`, `uname`, `uemail`, `upass`, `umobileno`, `isstatus`, `createdby`, `createddate`, `modefiedby`, `modifieddate`, `isdeleted`) VALUES
(1, 'jayu', 'jayu@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 0, NULL, NULL, NULL, NULL, 0),
(2, 'pradip', 'pradip@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 0, NULL, NULL, NULL, NULL, 0),
(5, 'raju', 'raju@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 0, NULL, NULL, NULL, NULL, 0),
(6, 'jaydeep', 'jaydeep@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2147483647, 0, NULL, NULL, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
