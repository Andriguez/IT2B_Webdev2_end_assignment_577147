-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Apr 14, 2024 at 08:19 PM
-- Server version: 11.2.3-MariaDB-1:11.2.3+maria~ubu2204
-- PHP Version: 8.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knowitalldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `Id` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  `answer_text` varchar(250) NOT NULL,
  `answer_explain` varchar(250) DEFAULT NULL,
  `isCorrect` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`Id`, `questionId`, `answer_text`, `answer_explain`, `isCorrect`) VALUES
(1, 1, 'Stephany', NULL, 0),
(2, 1, 'Joanne 2', NULL, 0),
(3, 1, 'Angelina', NULL, 0),
(4, 1, 'All of them', 'Lady Gaga&#039;s full name is Stephany Joanne Angelina Germanotta Italian', 1),
(5, 2, 'ARTPOP', 'Lady Gaga tweeted I don\'t remember ARTPOP in 2019 after being asked about the era', 1),
(6, 2, 'Her new', NULL, 0),
(7, 2, 'if there are 100 people in the room', NULL, 0),
(8, 3, 'Paranormal Activity', NULL, 0),
(9, 3, 'The Blair Witch Project', 'This movie had everyone believing it was real found footage for months after it\'s release. Even the actors weren\'t sure what as real or not during filming. Look it up', 1),
(10, 3, 'I know what you did last summer', NULL, 0),
(11, 4, 'Sarah Michelle Gellar', ' she starred in several horror films during the 2000s, including \"I Know What You Did Last Summer\" (1997) and its sequel, \"The Grudge\" (2004), and its sequel. Her performances in these ', 1),
(12, 4, 'Neve Campbell', NULL, 0),
(13, 4, 'Jessica Biel', NULL, 0),
(40, 8, 'Poker Face', '', 0),
(41, 8, 'Heavy Metal Lover', 'Went platinum in my house', 1),
(42, 8, 'Born this way', '', 0),
(55, 12, 'Au', 'This is the chemical symbol for gold.', 1),
(56, 12, 'Ag', NULL, 0),
(57, 12, 'Hg', NULL, 0),
(58, 13, 'Saturn', NULL, 0),
(59, 13, 'Venus', NULL, 0),
(60, 13, 'Mars', ' Mars is known as the &quot;Red Planet&quot; due to its reddish appearance.', 1),
(61, 14, 'Endoplasmic reticulum', NULL, 0),
(64, 14, 'Mitochondria', 'Mitochondria are often called the &quot;powerhouses&quot; of the cell because they produce energy.', 1),
(65, 14, 'Nucleus', NULL, 0),
(66, 15, 'Heart', NULL, 0),
(67, 15, 'Skin', 'The skin is the body&#039;s largest organ, protecting us from external threats and regulating temperature.', 1),
(68, 15, 'Brain', NULL, 0),
(69, 16, 'Nuclear Force', NULL, 0),
(70, 16, 'Magnetic Force', NULL, 0),
(71, 16, 'Gravitational Force', ' Gravity is the force that attracts objects toward each other, such as the Earth pulling objects toward its center.', 1),
(72, 17, 'Photosynthesis', 'This process occurs in plants, where they convert light energy into chemical energy to produce glucose.', 1),
(73, 17, 'Germination', NULL, 0),
(74, 17, 'Transpiration', NULL, 0),
(75, 18, 'Nitrogen', 'Nitrogen is the most abundant gas in the Earth&#039;s atmosphere, making up about 78% of the air we breathe.', 1),
(76, 18, 'Oxigen', NULL, 0),
(78, 18, 'Carbon dioxide', NULL, 0),
(83, 20, 'Quartz', NULL, 0),
(84, 20, 'Diamond', 'Diamonds are composed of carbon atoms arranged in a crystal lattice structure.', 1),
(85, 20, 'Iron', NULL, 0),
(86, 20, 'Granite', NULL, 0),
(87, 21, 'Newton', 'Sir Isaac Newton formulated the laws of motion and universal gravitation.', 1),
(88, 21, 'Watt', NULL, 0),
(89, 21, 'Ampere', NULL, 0),
(90, 22, 'Atom', '  Atoms are the basic building blocks of matter and are composed of protons, neutrons, and electrons.', 1),
(91, 22, 'Cell', '', 0),
(92, 22, 'Molecule', '', 0),
(93, 23, 'Plasma', NULL, 0),
(94, 23, 'Gas', ' Gas is one of the three states of matter, along with solid and liquid, characterized by its ability to expand and fill its container.', 1),
(95, 23, 'Solid', NULL, 0),
(96, 24, 'George Washington', 'George Washington was the first President of the United States.', 1),
(97, 25, '1914', 'World War I began in 1914 with the assassination of Archduke Franz Ferdinand of Austria-Hungary.', 1),
(99, 25, '1920', NULL, 0),
(101, 25, '1916', NULL, 0),
(102, 24, 'Thomas Jefferson', NULL, 0),
(103, 24, 'Abraham Lincoln', NULL, 0),
(105, 26, 'William Shakespeare', 'William Shakespeare is considered one of the greatest playwrights and poets in the English language.', 1),
(106, 27, 'Greece', NULL, 0),
(107, 26, 'Jane Austen', NULL, 0),
(108, 27, 'Mesopotemia', NULL, 0),
(109, 26, 'Charles Dickens', NULL, 0),
(110, 27, 'Egypt', 'The Great Pyramid of Giza is located in Egypt and is one of the Seven Wonders of the Ancient World.', 1),
(111, 28, 'Queen Victoria', 'Queen Victoria was the longest-reigning monarch in British history until Queen Elizabeth II surpassed her record.', 1),
(112, 28, 'King He', NULL, 0),
(113, 29, 'Contastinople', 'Constantinople was the capital of the Byzantine Empire and is now known as Istanbul.', 1),
(114, 28, 'King Henry VIII', NULL, 0),
(115, 29, 'Rome', NULL, 0),
(116, 28, 'Queen Elizabeth II', NULL, 0),
(117, 29, 'Alexandria', NULL, 0),
(118, 30, 'Storming of the Bastille', 'The Storming of the Bastille on July 14, 1789, marked the beginning of the French Revolution.', 1),
(119, 31, 'Rosa Parks', NULL, 0),
(120, 30, 'Battle of Waterloo', NULL, 0),
(121, 31, 'Amelia Earhart', 'Amelia Earhart was an aviation pioneer and the first female aviator to fly solo across the Atlantic Ocean.', 1),
(122, 30, ' Execution of Louis XVI', NULL, 0),
(123, 31, 'Marie Curie', NULL, 0),
(124, 32, 'I Have a dream', ' &quot;I Have a Dream&quot; is a famous speech delivered by Martin Luther ', 1),
(125, 32, 'We shall overcome', NULL, 0),
(126, 32, 'Give Me Liberty or Give Me Death', NULL, 0),
(127, 33, 'Genghis Khan', 'Genghis Khan was the founder and first Great Khan of the Mongol Empire, one of the largest empires in history.', 1),
(128, 33, 'Alexander the Great', NULL, 0),
(129, 33, 'Julius Caesar', NULL, 0),
(134, 35, 'Paul McCartney', ' Paul McCartney is a member of the legendary British band The Beatles.', 1),
(136, 35, 'Ringo Starr', NULL, 0),
(137, 35, 'George Harrison', NULL, 0),
(138, 36, 'Sex and the CIty', 'Is the best of them all', 1),
(139, 36, 'Friends', NULL, 0),
(140, 36, 'How I met your mother ', NULL, 0),
(141, 37, 'Aladdin', NULL, 0),
(142, 37, 'Toy Story', NULL, 0),
(143, 37, 'Lion King', '&quot;The Lion King&quot; is a beloved Disney animated film released in 1994.', 1),
(144, 38, 'Michael Jackson', 'Michael Jackson, known as the &quot;King of Pop,&quot; was a highly influential and successful musician.', 1),
(145, 39, 'Tom Felton', NULL, 0),
(146, 38, 'Michael Jordan', NULL, 0),
(147, 39, 'Daniel Radclief', 'Daniel Radcliffe portrayed the main character, Harry Potter, in the film adaptations of J.K. Rowling&#039;s book series.', 1),
(148, 38, 'Michael B Jordan', NULL, 0),
(149, 39, 'Emma Roberts', NULL, 0),
(150, 40, 'Michael Jackson', ' Michael Jackson&#039;s album &quot;Thriller&quot; is one of the best-selling albums of all time.', 1),
(151, 40, 'Whitney Houston', NULL, 0),
(152, 40, 'Madonna', NULL, 0),
(154, 41, 'Severus Snape', NULL, 0),
(155, 42, 'Steven Spielberg', 'Steven Spielberg is a renowned filmmaker known for directing iconic movies such as &quot;Jaws&quot; and &quot;Jurassic Park.&quot;', 1),
(156, 41, 'Hagrid', NULL, 0),
(157, 42, 'George Lucas', NULL, 0),
(158, 41, 'Harry Potter', 'Harry Potter is a series of fantasy novels written by British author J.K. Rowling.', 1),
(159, 42, 'Pedro Almodovar', NULL, 0),
(160, 43, 'The little Mermaid', NULL, 0),
(161, 43, 'Finding Nemo', '&quot;Finding Nemo&quot; is a Pixar animated film about a clownfish searching for his son.', 1),
(162, 43, 'Shrek', NULL, 0),
(163, 44, 'Seth MacFarlane', NULL, 0),
(164, 44, 'Matt Groening', 'Matt Groening is the creator of the animated television series &quot;The Simpsons.&quot;', 1),
(165, 44, 'Trey Parker', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `user_Id` int(11) NOT NULL,
  `quiz_Id` int(11) NOT NULL,
  `savedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`user_Id`, `quiz_Id`, `savedAt`) VALUES
(2, 1, '2024-03-22 21:44:37'),
(13, 1, '2024-04-14 21:06:49'),
(13, 2, '2024-04-14 20:48:24'),
(13, 5, '2024-04-14 22:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `flags`
--

CREATE TABLE `flags` (
  `Id` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `quiz_Id` int(11) NOT NULL,
  `question_Id` int(11) NOT NULL,
  `message` varchar(250) NOT NULL,
  `isSolved` tinyint(1) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flags`
--

INSERT INTO `flags` (`Id`, `user_Id`, `quiz_Id`, `question_Id`, `message`, `isSolved`, `dateTime`) VALUES
(1, 2, 1, 2, 'That\'s not the correct year. ', 0, '2024-03-22 21:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `user_Id` int(11) NOT NULL,
  `quiz_Id` int(11) NOT NULL,
  `nr_correct_answers` int(11) NOT NULL,
  `last_played` datetime NOT NULL,
  `playtime` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`user_Id`, `quiz_Id`, `nr_correct_answers`, `last_played`, `playtime`) VALUES
(2, 1, 3, '2024-04-14 20:09:49', 18),
(2, 2, 1, '2024-04-14 19:58:11', 12),
(2, 4, 6, '2024-04-14 22:07:55', 89),
(2, 6, 6, '2024-04-14 22:09:20', 70),
(13, 1, 1, '2024-04-14 20:10:45', 18),
(13, 2, 2, '2024-04-14 19:54:38', 12),
(13, 4, 9, '2024-04-14 22:12:14', 75);

-- --------------------------------------------------------

--
-- Table structure for table `player_info`
--

CREATE TABLE `player_info` (
  `userId` int(11) NOT NULL,
  `average` int(11) NOT NULL,
  `ranking` int(11) NOT NULL,
  `playtime` int(50) NOT NULL,
  `total_correct_answers` int(11) NOT NULL DEFAULT 0,
  `total_questions_answered` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `player_info`
--

INSERT INTO `player_info` (`userId`, `average`, `ranking`, `playtime`, `total_correct_answers`, `total_questions_answered`) VALUES
(2, 69, 1, 453, 51, 74),
(13, 63, 2, 210, 33, 52);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `Id` int(11) NOT NULL,
  `quizz_Id` int(11) NOT NULL,
  `question` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`Id`, `quizz_Id`, `question`) VALUES
(1, 1, 'What is Lady Gaga&#039;s real name?'),
(2, 1, 'Fill in the blank on this famous Gaga tweet: &quot;I don&#039;t remember ______&quot; newly edited again'),
(3, 2, 'Which horror movie filmed in a found footage style had everyone (including thee actors) thinking it was real? '),
(4, 2, 'Who was the most popular scream queen of this era of horror films?'),
(8, 1, 'what is the most popular Gaga song?'),
(12, 4, 'what is the chemical symbol of gold'),
(13, 4, 'Which planet is known as the red planet?'),
(14, 4, 'What is the powerhouse of the cell?'),
(15, 4, 'What is the largest Organ in the human body?'),
(16, 4, 'What force keeps the planets in orbit around the sun?'),
(17, 4, 'What is the process by which plants make their own food?'),
(18, 4, 'Which gas is most abundant in earth&#039;s atmosphere?'),
(20, 4, 'What is the hardest natural substance on Earth?'),
(21, 4, 'What is the unit of meassurement for Force?'),
(22, 4, 'Which of the following is the smallest unit of matter that retains the properties of an element?'),
(23, 4, 'what type of matter is most commonly found in the universe?'),
(24, 5, 'Who was the first President of the United States?'),
(25, 5, 'In which year did World War I begin?'),
(26, 5, 'Who wrote the famous play &quot;Romeo and Juliet&quot;?'),
(27, 5, 'Which ancient civilization built the Great Pyramids of Giza?'),
(28, 5, 'Who was the longest-reigning British monarch?'),
(29, 5, 'What was the capital of the Byzantine Empire?'),
(30, 5, 'What event marked the beginning of the French Revolution?'),
(31, 5, 'Who was the first woman to fly solo across the Atlantic Ocean?'),
(32, 5, 'Which famous speech did Martin Luther King Jr. deliver in 1963?'),
(33, 5, 'Who was the founder of the Mongol Empire?'),
(35, 6, 'Who is the lead singer of the band beatles?'),
(36, 6, 'Which TV show features a group of friends living in New York City?'),
(37, 6, 'Which movie features a young lion cub named Simba?'),
(38, 6, 'Who is known as the &quot;King of Pop&quot;?'),
(39, 6, 'Who played the role of Harry Potter in the film series?'),
(40, 6, 'Which artist released the album &quot;Thriller&quot; in 1982?'),
(41, 6, 'What is the name of the main character in the &quot;Harry Potter&quot; book series?'),
(42, 6, 'Who directed the movie &quot;Jurassic Park&quot;?'),
(43, 6, 'Which animated film features a clownfish named Nemo?'),
(44, 6, 'Who is the creator of the animated TV show &quot;The Simpsons&quot;?');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `Id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `topic` int(11) NOT NULL,
  `nr_players` int(11) NOT NULL DEFAULT 0,
  `level` int(11) NOT NULL,
  `modification_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`Id`, `name`, `topic`, `nr_players`, `level`, `modification_date`) VALUES
(1, 'Lady Gaga facts', 1, 28, 3, '2024-04-14 22:14:30'),
(2, '00\'s Horror films', 2, 27, 2, '2024-03-22 21:19:02'),
(4, 'Science Quest: Unravel the Universe!', 16, 2, 2, '2024-04-14 21:40:09'),
(5, 'Time Traveler&#039;s Trivia: Explore the Past!', 17, 0, 3, '2024-04-14 21:54:17'),
(6, ' Dive into Pop Culture!', 18, 1, 1, '2024-04-14 22:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_level`
--

CREATE TABLE `quiz_level` (
  `Id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_level`
--

INSERT INTO `quiz_level` (`Id`, `name`) VALUES
(1, 'easy'),
(2, 'moderate'),
(3, 'difficult');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_topics`
--

CREATE TABLE `quiz_topics` (
  `Id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_topics`
--

INSERT INTO `quiz_topics` (`Id`, `name`) VALUES
(1, 'Music'),
(2, 'Movies'),
(16, 'Science'),
(17, 'History'),
(18, 'Entertainment');

-- --------------------------------------------------------

--
-- Table structure for table `UIText`
--

CREATE TABLE `UIText` (
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `usertype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `name`, `username`, `password`, `usertype`) VALUES
(1, 'Andy Rodriguez', 'admin', '$2y$10$CYo8NBSKwmPX6ui2xyi8WepuQWJLoVtbb/XaU5HQYWCOHtVFbAK4O', 1),
(2, 'Carmen Mac', 'carmen3101', '$2y$10$1XVC7oH7vqpBiqm25JA7Cuh29.G5DAggmn2xnxDoM9WmJje2UnBni', 2),
(13, 'Jane Smith', 'newnewjane', '$2y$10$5.qYTIPfzvI9JyqvLWdxUus35cmDhIU1el03Kf7f.BLtHuKMmT7cO', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `Id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`Id`, `name`) VALUES
(1, 'admin'),
(2, 'player');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_questionId` (`questionId`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`user_Id`,`quiz_Id`) USING BTREE,
  ADD KEY `Quiz_Id_FK` (`quiz_Id`);

--
-- Indexes for table `flags`
--
ALTER TABLE `flags`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_quizId` (`quiz_Id`),
  ADD KEY `FK_user` (`user_Id`),
  ADD KEY `FK_question` (`question_Id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`user_Id`,`quiz_Id`),
  ADD KEY `Quiz_FK` (`quiz_Id`);

--
-- Indexes for table `player_info`
--
ALTER TABLE `player_info`
  ADD KEY `FK_User_Id` (`userId`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_quizzId` (`quizz_Id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_topic` (`topic`),
  ADD KEY `FK_level` (`level`);

--
-- Indexes for table `quiz_level`
--
ALTER TABLE `quiz_level`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `quiz_topics`
--
ALTER TABLE `quiz_topics`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `UIText`
--
ALTER TABLE `UIText`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `FK_usertype` (`usertype`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `flags`
--
ALTER TABLE `flags`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quiz_level`
--
ALTER TABLE `quiz_level`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `quiz_topics`
--
ALTER TABLE `quiz_topics`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `UIText`
--
ALTER TABLE `UIText`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `FK_questionId` FOREIGN KEY (`questionId`) REFERENCES `questions` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `FK_userId` FOREIGN KEY (`user_Id`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Quiz_Id_FK` FOREIGN KEY (`quiz_Id`) REFERENCES `quizzes` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flags`
--
ALTER TABLE `flags`
  ADD CONSTRAINT `FK_question` FOREIGN KEY (`question_Id`) REFERENCES `questions` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_quizId` FOREIGN KEY (`quiz_Id`) REFERENCES `quizzes` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_Id`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `Quiz_FK` FOREIGN KEY (`quiz_Id`) REFERENCES `quizzes` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `User_FK` FOREIGN KEY (`user_Id`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `player_info`
--
ALTER TABLE `player_info`
  ADD CONSTRAINT `FK_User_Id` FOREIGN KEY (`userId`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `FK_quizzId` FOREIGN KEY (`quizz_Id`) REFERENCES `quizzes` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `FK_level` FOREIGN KEY (`level`) REFERENCES `quiz_level` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_topic` FOREIGN KEY (`topic`) REFERENCES `quiz_topics` (`Id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_usertype` FOREIGN KEY (`usertype`) REFERENCES `user_types` (`Id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
