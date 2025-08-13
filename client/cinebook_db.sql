-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2025 at 10:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinebook_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies_details`
--

CREATE TABLE `movies_details` (
  `id` int(10) NOT NULL,
  `title` varchar(20) NOT NULL,
  `language` varchar(20) NOT NULL,
  `release_date` varchar(20) NOT NULL,
  `genre` varchar(15) NOT NULL,
  `rating` float NOT NULL,
  `poster_url` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies_details`
--

INSERT INTO `movies_details` (`id`, `title`, `language`, `release_date`, `genre`, `rating`, `poster_url`, `description`) VALUES
(1, 'Jawan', 'Hindi', '07-09-2023', 'Action', 8.5, 'assets/img/movie1.jpg', 'Shah Rukh Khan takes center stage in Atlee’s high-octane action thriller Jawan, portraying a vigilante with a mysterious past. The movie features intense action sequences, emotional depth, and social commentary. It became the highest‑grossing Indian film of 2023.'),
(2, '12th Fail', 'Hindi', '27-10-2023', 'Biographical', 8.1, 'assets/img/movie2.jpg', 'This biographical drama tells the inspiring story of Manoj Sharma, who rose from poverty to become an IPS officer. The film depicts his struggles, failures, and determination to succeed against all odds.'),
(3, 'Fateh', 'Hindi', '10-01-2025', 'Action', 7.2, 'assets/img/movie3.jpg', 'Sonu Sood’s directorial debut features him as an ex-intelligence officer drawn back into action to dismantle a powerful cyber mafia. The film dives into cybercrime, identity theft, and the ethics of surveillance.'),
(4, 'Pushpa 2: The Rule', 'Hindi', '14-01-2025', 'Thriller', 8.9, 'assets/img/movie4.jpg', 'Following the massive success of Pushpa, this sequel continues the story of Pushpa Raj’s rise in the red sandalwood smuggling underworld. Featuring explosive action, intense rivalries, and strong emotional arcs, it’s one of South India\'s most anticipated thrillers.'),
(5, 'Singham Again', 'Hindi', '07-03-2025', 'Action', 8.3, 'assets/img/movie5.jpg', 'Rohit Shetty returns with another powerful entry in the Singham franchise. Ajay Devgn reprises his role as the fearless cop Bajirao Singham who takes on a new wave of crime and corruption.'),
(6, 'Chhaava', 'Hindi', '14-02-2025', 'Historical', 8.4, 'assets/img/movie6.jpg', 'Set in the era of the Maratha Empire, Chhaava is a historical drama chronicling the life of a legendary warrior. Vicky Kaushal leads the epic tale filled with valor, sacrifice, and national pride.'),
(7, 'Sky Force', 'Hindi', '24-01-2025', 'Drama', 7.1, 'assets/img/movie7.jpg', 'This patriotic drama follows a courageous Indian Air Force officer who rises to face an unprecedented aerial threat. Akshay Kumar plays the lead, combining emotional depth with thrilling air combat scenes.'),
(8, 'Sikandar', 'Hindi', '01-04-2025', 'Action', 7.3, 'assets/img/movie8.jpg', 'Salman Khan joins forces with director AR Murugadoss in this stylish action entertainer. Sikandar follows a lone warrior caught between crime, politics, and personal revenge.'),
(9, 'Toxic', 'Hindi', '10-04-2025', 'Crime', 7.2, 'assets/img/movie9.jpg', 'Yash and Nayanthara headline this intense gangster drama set in the gritty world of organized crime. With themes of loyalty, betrayal, and redemption, the film presents a raw and emotional take on the criminal underworld.'),
(10, 'Housefull 5', 'Hindi', '06-06-2025', 'Comedy', 6.5, 'assets/img/movie10.jpg', 'The fifth installment in the Housefull franchise brings back familiar faces and fresh chaos. A madcap comedy of errors involving mistaken identities, lavish weddings, and wild adventures.'),
(11, 'Raid 2', 'Hindi', '01-05-2025', 'Action', 7.8, 'assets/img/movie11.jpg', 'A direct continuation of the first film, Raid 2 once again follows the relentless Income Tax officer (Ajay Devgn) as he exposes powerful figures involved in black money scams.'),
(12, 'Dragon', 'Hindi', '21-02-2025', 'Fantasy', 7.9, 'assets/img/movie12.jpg', 'This fantasy drama set in a mythical Tamil kingdom follows a young hero with magical powers destined to save his land. Visually stunning and rich in folklore, Dragon combines drama, fantasy, and emotion.'),
(13, 'Sittare Zamin Par', 'Hindi', '15-06-2025', 'Drama', 7.7, 'assets/img/movie13.jpg', 'A sequel to Chhaava, this film continues the legacy of the warrior’s family, exploring their next-generation conflicts and loyalties. With a mix of political drama, historical emotion, and personal challenges, it’s a grand and engaging narrative that celebrates courage and tradition.'),
(14, 'War 2', 'Hindi', '14-08-2025', 'Spy', 8.1, 'assets/img/movie14.jpg', 'Hrithik Roshan returns as Kabir in the second installment of the War series, this time teaming up (or clashing) with Jr NTR. Set in the YRF Spy Universe, the movie is loaded with espionage missions, global threats, and jaw-dropping stunts.'),
(15, 'Kantara Chapter 1', 'Hindi', '02-10-2025', 'Thriller', 7.5, 'assets/img/movie15.jpg', 'A spiritual prequel to the critically acclaimed Kantara, this chapter delves into the origins of folklore, tribal conflict, and divine justice. Rishab Shetty once again leads the story with a blend of mysticism, rural realism, and intense visuals.'),
(16, 'Golmaal Again', 'Hindi', '15-08-2021', 'Comedy', 8.5, 'assets/img/movie16.jpg', 'The gang is back with even more laughter and ghostly mayhem. This time, the Golmaal team encounters a spooky mansion and mysterious occurrences that lead to hilarious situations. With Rohit Shetty’s signature style and comic timing, it’s a rollercoaster of horror-comedy chaos.');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `User_ID` int(5) NOT NULL,
  `Full_Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `User_Name` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`User_ID`, `Full_Name`, `Email`, `User_Name`, `password`) VALUES
(4, 'Manani Suraj', 'surajmanani028@gmail.com', 'user', 'user123'),
(5, 'Manani Suraj Vinodbhai ', 'surajmanani028@gmail.com', 'User1234', 'user1234'),
(20, 'urvisha manani', 'urvisha28@gmail.com', 'urvisha@28', 'urvisha_28'),
(21, 'manani harsha', 'harsha30@gmail.com', 'harsha_30', 'harsha#30'),
(22, 'Manani Suraj', 'urvisha28@gmail.com', 'user2345', 'suraj0987');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `User_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
