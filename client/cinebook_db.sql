-- User Registration Table
CREATE TABLE `users` (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    username VARCHAR(20) NOT NULL,
    user_password VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Movies Details Table
CREATE TABLE `movies_details` (
    movie_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    language VARCHAR(50),
    release_date DATE,
    genre VARCHAR(50),
    rating DECIMAL(4,1),
    poster_url VARCHAR(255),
    description TEXT
);

-- Booking Table
CREATE TABLE `booking` (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    movie_id INT NOT NULL,
    show_date DATE NOT NULL,
    show_time TIME NOT NULL,
    seats INT NOT NULL,

    -- Relations
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (movie_id) REFERENCES movies_details(movie_id) ON DELETE CASCADE
);

-- Admin Login Table
CREATE TABLE `admin` (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    admin_name VARCHAR(20) NOT NULL,
    admin_password VARCHAR(20) NOT NULL
);

-- Insert Records into register Table
INSERT INTO users (fullname, email, username, user_password) 
VALUES('Manani Suraj Vinodbhai', 'surajmanani028@gmail.com', 'User_Suraj', 'User_0228');

-- Insert Records into movies_details Table
INSERT INTO movies_details 
(title, language, release_date, genre, rating, poster_url, description)
VALUES
('Jawan', 'Hindi', '2023-09-07', 'Action', 8.5, 'assets/img/movie1.jpg', 'Shah Rukh Khan takes center stage in Atlee’s high-octane action thriller Jawan, portraying a vigilante with a mysterious past. The movie features intense action sequences, emotional depth, and social commentary. It became the highest-grossing Indian film of 2023.'),
('12th Fail', 'Hindi', '2023-10-27', 'Biographical', 8.1, 'assets/img/movie2.jpg', 'This biographical drama tells the inspiring story of Manoj Sharma, who rose from poverty to become an IPS officer. The film depicts his struggles, failures, and determination to succeed against all odds.'),
('Fateh', 'Hindi', '2025-01-10', 'Action', 7.2, 'assets/img/movie3.jpg', 'Sonu Sood’s directorial debut features him as an ex-intelligence officer drawn back into action to dismantle a powerful cyber mafia. The film dives into cybercrime, identity theft, and the ethics of surveillance.'),
('Pushpa 2: The Rule', 'Hindi', '2025-01-14', 'Thriller', 8.9, 'assets/img/movie4.jpg', 'Following the massive success of Pushpa, this sequel continues the story of Pushpa Raj’s rise in the red sandalwood smuggling underworld. Featuring explosive action, intense rivalries, and strong emotional arcs.'),
('Singham Again', 'Hindi', '2025-03-07', 'Action', 8.3, 'assets/img/movie5.jpg', 'Rohit Shetty returns with another powerful entry in the Singham franchise. Ajay Devgn reprises his role as the fearless cop Bajirao Singham who takes on a new wave of crime and corruption.'),
('Chhaava', 'Hindi', '2025-02-14', 'Historical', 8.4, 'assets/img/movie6.jpg', 'Set in the era of the Maratha Empire, Chhaava is a historical drama chronicling the life of a legendary warrior. Vicky Kaushal leads the epic tale filled with valor, sacrifice, and national pride.'),
('Sky Force', 'Hindi', '2025-01-24', 'Drama', 7.1, 'assets/img/movie7.jpg', 'This patriotic drama follows a courageous Indian Air Force officer who rises to face an unprecedented aerial threat. Akshay Kumar plays the lead, combining emotional depth with thrilling air combat scenes.'),
('Sikandar', 'Hindi', '2025-04-01', 'Action', 7.3, 'assets/img/movie8.jpg', 'Salman Khan joins forces with director AR Murugadoss in this stylish action entertainer. Sikandar follows a lone warrior caught between crime, politics, and personal revenge.'),
('Toxic', 'Hindi', '2025-04-10', 'Crime', 7.2, 'assets/img/movie9.jpg', 'Yash and Nayanthara headline this intense gangster drama set in the gritty world of organized crime. With themes of loyalty, betrayal, and redemption.'),
('Housefull 5', 'Hindi', '2025-06-06', 'Comedy', 6.5, 'assets/img/movie10.jpg', 'The fifth installment in the Housefull franchise brings back familiar faces and fresh chaos. A madcap comedy of errors involving mistaken identities, lavish weddings, and wild adventures.'),
('Raid 2', 'Hindi', '2025-05-01', 'Action', 7.8, 'assets/img/movie11.jpg', 'A direct continuation of the first film, Raid 2 once again follows the relentless Income Tax officer as he exposes powerful figures involved in black money scams.'),
('Dragon', 'Hindi', '2025-02-21', 'Fantasy', 7.9, 'assets/img/movie12.jpg', 'This fantasy drama set in a mythical Tamil kingdom follows a young hero with magical powers destined to save his land. Visually stunning and rich in folklore.'),
('Sittare Zamin Par', 'Hindi', '2025-06-15', 'Drama', 7.7, 'assets/img/movie13.jpg', 'A sequel to Chhaava, this film continues the legacy of the warrior’s family, exploring their next-generation conflicts and loyalties.'),
('War 2', 'Hindi', '2025-08-14', 'Spy', 8.1, 'assets/img/movie14.jpg', 'Hrithik Roshan returns as Kabir in the second installment of the War series, this time teaming up with Jr NTR. The movie is loaded with espionage missions and global threats.'),
('Kantara Chapter 1', 'Hindi', '2025-10-02', 'Thriller', 7.5, 'assets/img/movie15.jpg', 'A spiritual prequel to the critically acclaimed Kantara, this chapter delves into the origins of folklore, tribal conflict, and divine justice.'),
('Golmaal Again', 'Hindi', '2021-08-15', 'Comedy', 8.5, 'assets/img/movie16.jpg', 'The gang is back with even more laughter and ghostly mayhem. This time, the Golmaal team encounters a spooky mansion and mysterious occurrences leading to hilarious situations.');


-- Insert Records into admin Table
INSERT INTO admin (admin_name,admin_password) 
VALUES('Admin_Suraj', 'Admin_0228');