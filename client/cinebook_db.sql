-- Users Table
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    username VARCHAR(50) NOT NULL UNIQUE,
    user_password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Movies Table
CREATE TABLE movies_details (
    movie_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    language VARCHAR(50),
    release_date DATE,
    genre VARCHAR(50),
    rating DECIMAL(3,1) CHECK (rating >= 0 AND rating <= 10),
    poster_url VARCHAR(255),
    description TEXT
);

-- Theaters Table
CREATE TABLE theaters (
    theater_id INT AUTO_INCREMENT PRIMARY KEY,
    theater_name VARCHAR(100) NOT NULL,
    theater_location VARCHAR(100),
    ticket_price DECIMAL(10,2) NOT NULL DEFAULT 200
);

-- Showtimes Table
CREATE TABLE showtimes (
    show_id INT AUTO_INCREMENT PRIMARY KEY,
    movie_id INT NOT NULL,
    theater_id INT NOT NULL,
    show_date DATE NOT NULL,
    show_time TIME NOT NULL,
    FOREIGN KEY (movie_id) REFERENCES movies_details(movie_id) ON DELETE CASCADE,
    FOREIGN KEY (theater_id) REFERENCES theaters(theater_id) ON DELETE CASCADE
);

-- Booking Table
CREATE TABLE bookings (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    movie_id INT NOT NULL,
    show_id INT NOT NULL,
    seat_row VARCHAR(5) NOT NULL,
    total_seat INT NOT NULL,
    ticket_price DECIMAL(10,2) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    payment_method VARCHAR(50) NOT NULL,
    booking_status ENUM('Pending','Approved','Cancelled') DEFAULT 'Pending',
    booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (movie_id) REFERENCES movies_details(movie_id),
    FOREIGN KEY (show_id) REFERENCES showtimes(show_id)
);
-- Admin Table
CREATE TABLE admin (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    admin_name VARCHAR(50) NOT NULL UNIQUE,
    admin_password VARCHAR(255) NOT NULL
);

-- Insert Records into register Table
INSERT INTO `users` (`user_id`, `fullname`, `email`, `username`, `user_password`, `created_at`) VALUES
(1, 'Manani Suraj Vinodbhai', 'surajmanani028@gmail.com', 'User_Suraj', 'User_0228', '2025-08-15 08:29:35');

-- Insert Records into movies_details Table
INSERT INTO `movies_details` (`movie_id`, `title`, `language`, `release_date`, `genre`, `rating`, `poster_url`, `description`) VALUES
(1, 'Jawan', 'Hindi', '2023-09-07', 'Action', 7.2, 'assets/img/movie1.jpg', 'Shah Rukh Khan takes center stage in Atlee’s high-octane action thriller Jawan, portraying a vigilante with a mysterious past. The movie features intense action sequences, emotional depth, and social commentary. It became the highest-grossing Indian film of 2023.'),
(2, '12th Fail', 'Hindi', '2023-10-27', 'Biographical', 8.1, 'assets/img/movie2.jpg', 'This biographical drama tells the inspiring story of Manoj Sharma, who rose from poverty to become an IPS officer. The film depicts his struggles, failures, and determination to succeed against all odds.'),
(3, 'Fateh', 'Hindi', '2025-01-10', 'Action', 7.2, 'assets/img/movie3.jpg', 'Sonu Sood’s directorial debut features him as an ex-intelligence officer drawn back into action to dismantle a powerful cyber mafia. The film dives into cybercrime, identity theft, and the ethics of surveillance.'),
(4, 'Pushpa 2: The Rule', 'Hindi', '2025-01-14', 'Thriller', 8.9, 'assets/img/movie4.jpg', 'Following the massive success of Pushpa, this sequel continues the story of Pushpa Raj’s rise in the red sandalwood smuggling underworld. Featuring explosive action, intense rivalries, and strong emotional arcs.'),
(5, 'Singham Again', 'Hindi', '2025-03-07', 'Action', 8.3, 'assets/img/movie5.jpg', 'Rohit Shetty returns with another powerful entry in the Singham franchise. Ajay Devgn reprises his role as the fearless cop Bajirao Singham who takes on a new wave of crime and corruption.'),
(6, 'Chhaava', 'Hindi', '2025-02-14', 'Historical', 8.4, 'assets/img/movie6.jpg', 'Set in the era of the Maratha Empire, Chhaava is a historical drama chronicling the life of a legendary warrior. Vicky Kaushal leads the epic tale filled with valor, sacrifice, and national pride.'),
(7, 'Sky Force', 'Hindi', '2025-01-24', 'Drama', 7.1, 'assets/img/movie7.jpg', 'This patriotic drama follows a courageous Indian Air Force officer who rises to face an unprecedented aerial threat. Akshay Kumar plays the lead, combining emotional depth with thrilling air combat scenes.'),
(8, 'Sikandar', 'Hindi', '2025-04-01', 'Action', 7.3, 'assets/img/movie8.jpg', 'Salman Khan joins forces with director AR Murugadoss in this stylish action entertainer. Sikandar follows a lone warrior caught between crime, politics, and personal revenge.'),
(9, 'Toxic', 'Hindi', '2025-04-10', 'Crime', 7.2, 'assets/img/movie9.jpg', 'Yash and Nayanthara headline this intense gangster drama set in the gritty world of organized crime. With themes of loyalty, betrayal, and redemption.'),
(10, 'Housefull 5', 'Hindi', '2025-06-06', 'Comedy', 6.5, 'assets/img/movie10.jpg', 'The fifth installment in the Housefull franchise brings back familiar faces and fresh chaos. A madcap comedy of errors involving mistaken identities, lavish weddings, and wild adventures.'),
(11, 'Raid 2', 'Hindi', '2025-05-01', 'Action', 7.8, 'assets/img/movie11.jpg', 'A direct continuation of the first film, Raid 2 once again follows the relentless Income Tax officer as he exposes powerful figures involved in black money scams.'),
(12, 'Dragon', 'Hindi', '2025-02-21', 'Fantasy', 7.9, 'assets/img/movie12.jpg', 'This fantasy drama set in a mythical Tamil kingdom follows a young hero with magical powers destined to save his land. Visually stunning and rich in folklore.'),
(13, 'Sittare Zamin Par', 'Hindi', '2025-06-15', 'Drama', 7.7, 'assets/img/movie13.jpg', 'A sequel to Chhaava, this film continues the legacy of the warrior’s family, exploring their next-generation conflicts and loyalties.'),
(14, 'War 2', 'Hindi', '2025-08-14', 'Spy', 8.1, 'assets/img/movie14.jpg', 'Hrithik Roshan returns as Kabir in the second installment of the War series, this time teaming up with Jr NTR. The movie is loaded with espionage missions and global threats.'),
(15, 'Kantara Chapter 1', 'Hindi', '2025-10-02', 'Thriller', 7.5, 'assets/img/movie15.jpg', 'A spiritual prequel to the critically acclaimed Kantara, this chapter delves into the origins of folklore, tribal conflict, and divine justice.'),
(16, 'Golmaal Again', 'Hindi', '2021-08-15', 'Comedy', 8.5, 'assets/img/movie16.jpg', 'The gang is back with even more laughter and ghostly mayhem. This time, the Golmaal team encounters a spooky mansion and mysterious occurrences leading to hilarious situations.'),
(17, 'Cars', 'Hindi', '2016-06-14', 'Animation', 8.9, 'assets/img/movie17.jpg', 'Cars is a 2006 American animated sports comedy film produced by Pixar Animation Studios for Walt Disney Pictures. The film was directed by John Lasseter, co-directed by Joe Ranft.');

-- Insert Records into Theaters Table
INSERT INTO `theaters` (`theater_id`, `theater_name`, `ticket_price`, `theater_location`) VALUES
(1, 'INOX Raj Imperial', 250.00, 'Surat - Piplod'),
(2, 'PVR RahulRaj Mall', 280.00, 'Surat - Dumas Road'),
(3, 'Valentine Multiplex', 220.00, 'Surat - Dumas Road'),
(4, 'Cinemax VR Mall', 300.00, 'Surat - VR Mall'),
(5, 'INOX Reliance Mall', 240.00, 'Surat - Varachha'),
(6, 'Rajhans Cinemas', 200.00, 'Surat - Adajan'),
(7, 'Time Cinema', 180.00, 'Surat - Ring Road');

-- Insert Records into Show Time Table
INSERT INTO `showtimes` (`movie_id`, `theater_id`, `show_date`, `show_time`) VALUES
(1, 1, '2025-08-20', '10:00:00'),
(1, 2, '2025-08-20', '14:00:00'),
(1, 4, '2025-08-20', '19:00:00'),

(2, 3, '2025-08-21', '11:30:00'),
(2, 5, '2025-08-21', '20:30:00'),
(2, 6, '2025-08-27', '22:00:00'),

(3, 2, '2025-08-21', '09:45:00'),
(3, 6, '2025-08-22', '15:00:00'),
(3, 4, '2025-08-22', '21:00:00'),

(4, 7, '2025-08-20', '12:30:00'),
(4, 1, '2025-08-23', '17:30:00'),
(4, 2, '2025-08-23', '21:15:00'),

(5, 5, '2025-08-22', '13:30:00'),
(5, 3, '2025-08-24', '18:00:00'),
(5, 7, '2025-08-28', '15:30:00'),

(6, 6, '2025-08-22', '16:00:00'),
(6, 7, '2025-08-24', '20:00:00'),

(7, 1, '2025-08-23', '10:30:00'),
(7, 3, '2025-08-23', '19:30:00'),

(8, 4, '2025-08-21', '18:00:00'),
(8, 6, '2025-08-24', '21:30:00'),

(9, 2, '2025-08-23', '15:00:00'),
(9, 5, '2025-08-25', '20:00:00'),
(9, 3, '2025-08-28', '18:30:00'),

(10, 7, '2025-08-24', '11:00:00'),
(10, 1, '2025-08-25', '16:00:00'),

(11, 3, '2025-08-24', '14:30:00'),
(11, 4, '2025-08-25', '19:00:00'),

(12, 5, '2025-08-23', '12:00:00'),
(12, 2, '2025-08-25', '21:00:00'),

(13, 6, '2025-08-24', '13:00:00'),
(13, 7, '2025-08-26', '18:00:00'),
(13, 4, '2025-08-28', '20:00:00'),

(14, 1, '2025-08-25', '09:30:00'),
(14, 3, '2025-08-26', '17:30:00'),

(15, 2, '2025-08-25', '14:00:00'),
(15, 5, '2025-08-26', '20:30:00'),

(16, 4, '2025-08-26', '12:30:00'),
(16, 6, '2025-08-27', '19:30:00'),

(17, 7, '2025-08-25', '16:30:00'),
(17, 1, '2025-08-27', '21:00:00'),
(17, 2, '2025-08-28', '22:30:00'); 

-- Insert Records into admin Table
INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`) VALUES
(1, 'Admin_Suraj', 'Admin_0228');