# MovieMate Documentation

## 1. Introduction

### 1.1. Project Profile

MovieMate is a dynamic and user-centric web-based application engineered to modernize and simplify the process of booking movie tickets. The primary motivation behind this project is to address the common inconveniences associated with traditional ticket purchasing methods, such as long queues and uncertainty about seat availability. By providing a centralized online platform, MovieMate aims to offer a seamless, efficient, and enjoyable experience for all movie enthusiasts. The application is designed to be accessible from any device with an internet connection, ensuring that users can book their tickets anytime, anywhere.

The project's profile is that of a comprehensive booking management system. It is not merely a static website displaying movie times; it is a fully interactive platform. The target audience is broad, encompassing all individuals who enjoy going to the cinema. The application's core features include a detailed movie browser, real-time showtime information, a straightforward booking process, and secure user account management. The system is built with scalability in mind, allowing for the future addition of new features and the capacity to handle a growing user base.

The user journey is central to the project's design. A typical user visiting the MovieMate website is first greeted with a visually engaging homepage showcasing the latest and most popular movies. From there, the user can explore different genres, read detailed synopses, view trailers, and check ratings. Once a movie is selected, the user can see all available showtimes and theater locations. The booking process is designed to be intuitive, guiding the user through seat selection and confirmation in just a few clicks. This focus on the user experience is a key differentiator of the MovieMate project.

### 1.2. Overview of Project

Beyond the user-facing features, the MovieMate project includes a robust administrative backend. This control panel is the nerve center of the application, accessible only to authorized personnel. It provides administrators with the tools necessary to manage the entire system effectively. The need for this backend is critical, as it ensures that the content displayed to users is always accurate and up-to-date. Without this administrative functionality, the application would be impossible to maintain.

The administrative overview includes functionalities such as managing the movie database, where administrators can add new movies, update existing details, and remove films that are no longer showing. They can also manage theater and showtime information, ensuring that schedules are current. Furthermore, the admin panel provides a comprehensive view of all user bookings, allowing for monitoring and management of reservations. This level of control is essential for the smooth operation of the booking system and for providing timely customer support when needed. In essence, the project is a two-sided coin: a user-friendly frontend for customers and a powerful backend for administrators, working in tandem to deliver a complete booking solution.

## 2. Proposed System

### 2.1. Aim and Objectives

The primary aim of the MovieMate project is to develop a state-of-the-art online movie ticket booking system that is both efficient and easy to use. The system is intended to serve as a one-stop solution for moviegoers, eliminating the need to visit multiple cinema websites or stand in physical queues. The overarching goal is to create a platform that not only meets the functional requirements of a booking system but also provides a genuinely enjoyable and convenient user experience that encourages repeat use.

To achieve this aim, several key objectives have been defined. The first objective is to implement a secure user registration and login system, allowing users to create and manage their own accounts. Another primary objective is to develop a dynamic and searchable movie listing page where users can browse films based on various criteria. The system must also provide detailed information for each movie, including its synopsis, cast and crew, genre, and rating. The core objective, of course, is to build an intuitive and reliable ticket booking engine that allows users to select their desired movie, showtime, and number of seats, and to complete a booking.

On the administrative side, a key objective is to create a secure and comprehensive admin panel. This includes the functionality for administrators to perform CRUD (Create, Read, Update, Delete) operations on the movie listings. The system must also allow admins to manage showtimes and view a complete history of all bookings made through the platform. A final objective is to ensure the system is robust and scalable, with a well-designed database that can handle a significant volume of data and user traffic, and a codebase that is maintainable and can be extended with new features in the future.

### 2.2. Hardware and Software Requirements

For the successful deployment and operation of the MovieMate application, specific hardware and software components are required. On the hardware front, a web server is necessary to host the application files and make them accessible over the internet. This server should have sufficient processing power, RAM, and storage to handle concurrent user requests and store the application's data. A database server is also required to host the MySQL database. While the application can run on a single server, for larger-scale deployments, it is recommended to have a dedicated server for the database to ensure optimal performance.

The software requirements for the MovieMate project are based on a stack of open-source technologies. The server-side logic of the application is built using PHP (Hypertext Preprocessor), a widely-used scripting language well-suited for web development. The database management system is MySQL, a reliable and powerful relational database. On the client-side, the application relies on standard web technologies: HTML (Hypertext Markup Language) for the structure of the web pages, CSS (Cascading Style Sheets) for styling and presentation, and JavaScript for interactive elements and client-side validation. A web server software, such as Apache or Nginx, is also required to serve the PHP application.

### 2.3. Scope

The scope of the MovieMate project is clearly defined to ensure that the development process is focused and the final product is a polished and functional application. The core of the project is the online booking system, which includes all the features necessary for a user to book a movie ticket. This encompasses user account creation, login, and profile management. Users are able to view their booking history and manage their account details. The system also includes a comprehensive movie browsing experience, allowing users to search for movies and view their details.

The administrative module is also a critical part of the project's scope. This includes a secure login for administrators and a dashboard with all the necessary management tools. The scope of the admin panel covers the management of movies, theaters, and showtimes. It also includes the ability to view and manage all user bookings. The initial version of the project, however, does not include certain advanced features. For example, the integration of a real-time payment gateway is considered out of scope for the current phase, with the system simulating the payment process. Social media integration and a dedicated mobile application are also outside the current scope but are potential candidates for future development.

## 3. System Design

### 3.1. Data Flow Diagram

The system design of MovieMate is meticulously planned to ensure a robust and scalable architecture. A key component of this design is the Data Flow Diagram (DFD), which provides a visual representation of how data moves through the system. The DFD illustrates the processes, data stores, and external entities involved in the application's operation. For instance, a level 0 DFD for MovieMate would show the entire system as a single process, with users and administrators as external entities providing inputs (like booking requests and new movie data) and receiving outputs (like booking confirmations and reports).

Higher-level DFDs break down the system into more detailed processes. A level 1 DFD would show the main functions of the system, such as 'User Management', 'Movie Management', and 'Booking Management'. It would illustrate how data flows between these processes. For example, a user's registration data flows from the user entity to the 'User Management' process, which then stores the data in the 'users' data store (the database table). This level of detail is crucial for understanding the system's logic and for identifying potential bottlenecks or inefficiencies in the data flow.

The DFDs for MovieMate are designed to be a blueprint for the development team. They clarify the system's boundaries, the sources and destinations of data, and the transformations that happen to the data along the way. By mapping out the entire data journey, from a user's first click to the final record in the database, the DFDs ensure that the system is built on a solid and well-understood foundation. This structured approach to data management is essential for creating a reliable and maintainable application.

### 3.2. UML Diagram

In addition to DFDs, the system design of MovieMate is further elaborated using Unified Modeling Language (UML) diagrams. These diagrams provide a more object-oriented view of the system and are invaluable for modeling the behavior and structure of the application. Use Case diagrams, for example, are used to identify the key functionalities of the system from a user's perspective. The primary actors in MovieMate's Use Case diagram are the 'User' and the 'Administrator'. Use cases for the 'User' include 'Register', 'Login', 'Search for Movie', 'View Movie Details', and 'Book Ticket'. For the 'Administrator', use cases include 'Manage Movies', 'Manage Bookings', and 'Manage Users'.

Sequence diagrams are another crucial UML tool used in the design of MovieMate. These diagrams model the interactions between different objects in the system over time. For instance, a sequence diagram for the 'Book Ticket' use case would show the sequence of messages exchanged between the user's browser, the web server, and the database. It would illustrate the calls to different functions and methods, the queries to the database, and the data returned at each step. This level of detail is essential for developers to understand the dynamic behavior of the system and to implement the logic correctly.

By using a combination of Use Case and Sequence diagrams, the design of MovieMate captures both the 'what' and the 'how' of the system's functionality. The Use Case diagrams provide a high-level overview of the system's features, while the Sequence diagrams provide a detailed, step-by-step guide to how those features are implemented. This comprehensive approach to modeling ensures that all stakeholders have a clear understanding of the system's intended behavior and that the final product aligns with the initial requirements.

### 3.3. Data Dictionary

The backbone of the MovieMate application is its database, and the Data Dictionary serves as the definitive guide to this database structure. It provides a detailed description of each table and every column within it, ensuring that there is a clear and consistent understanding of the data being stored. The Data Dictionary is an essential tool for developers, database administrators, and anyone else who needs to interact with the database. It promotes data consistency and helps to prevent errors and misunderstandings.

The Data Dictionary for MovieMate, as detailed previously, includes tables for `users`, `movies_details`, `theaters`, `showtimes`, `bookings`, and `admin`. For each table, the dictionary specifies the column names, data types, and a description of the data that each column holds. It also defines the relationships between the tables. For example, the `bookings` table is linked to the `users`, `movies_details`, and `showtimes` tables via foreign keys. This relational structure is crucial for maintaining data integrity and for performing complex queries, such as retrieving all bookings for a specific user or all showtimes for a particular movie.

The level of detail in the Data Dictionary is critical for the long-term maintenance and development of the application. By clearly defining every piece of data, the dictionary makes it easier for new developers to understand the system and for existing developers to make changes without introducing unintended side effects. It is a living document that should be updated whenever the database schema is modified, ensuring that it always provides an accurate and up-to-date reference for the entire development team.

# Data Dictionary

The database for MovieMate is designed to store all the necessary information for the application's functionality. It consists of the following tables:

### `users` table
| Field         | Type           | Description                               |
|---------------|----------------|-------------------------------------------|
| `user_id`     | INT            | Primary key for the users table.          |
| `fullname`    | VARCHAR(100)   | Full name of the user.                    |
| `email`       | VARCHAR(100)   | Email address of the user (unique).       |
| `username`    | VARCHAR(50)    | Username for login (unique).              |
| `user_password`| VARCHAR(255)  | Hashed password for the user.             |
| `created_at`  | TIMESTAMP      | Timestamp of user registration.           |

### `movies_details` table
| Field          | Type           | Description                               |
|----------------|----------------|-------------------------------------------|
| `movie_id`     | INT            | Primary key for the movies table.         |
| `title`        | VARCHAR(100)   | Title of the movie.                       |
| `language`     | VARCHAR(50)    | Language of the movie.                    |
| `release_date` | DATE           | Release date of the movie.                |
| `genre`        | VARCHAR(50)    | Genre of the movie.                       |
| `rating`       | DECIMAL(3,1)   | Rating of the movie (out of 10).          |
| `poster_url`   | VARCHAR(255)   | URL of the movie poster image.            |
| `description`  | TEXT           | A brief description of the movie.         |

### `theaters` table
| Field            | Type           | Description                               |
|------------------|----------------|-------------------------------------------|
| `theater_id`     | INT            | Primary key for the theaters table.       |
| `theater_name`   | VARCHAR(100)   | Name of the theater.                      |
| `theater_location`| VARCHAR(100)  | Location of the theater.                  |
| `ticket_price`   | DECIMAL(10,2)  | Price of a ticket at the theater.         |

### `showtimes` table
| Field       | Type    | Description                               |
|-------------|---------|-------------------------------------------|
| `show_id`   | INT     | Primary key for the showtimes table.      |
| `movie_id`  | INT     | Foreign key referencing `movies_details`. |
| `theater_id`| INT     | Foreign key referencing `theaters`.       |
| `show_date` | DATE    | Date of the show.                         |
| `show_time` | TIME    | Time of the show.                         |

### `bookings` table
| Field          | Type                               | Description                               |
|----------------|------------------------------------|-------------------------------------------|
| `booking_id`   | INT                                | Primary key for the bookings table.       |
| `user_id`      | INT                                | Foreign key referencing `users`.          |
| `movie_id`     | INT                                | Foreign key referencing `movies_details`. |
| `show_id`      | INT                                | Foreign key referencing `showtimes`.      |
| `seat_row`     | VARCHAR(5)                         | The row of the booked seat.               |
| `total_seat`   | INT                                | Total number of seats booked.             |
| `ticket_price` | DECIMAL(10,2)                      | Price per ticket for the booking.         |
| `amount`       | DECIMAL(10,2)                      | Total amount for the booking.             |
| `payment_method`| VARCHAR(50)                        | Payment method used.                     |
| `booking_status`| ENUM('Pending','Approved','Cancelled')| Status of the booking.                |
| `booking_date` | TIMESTAMP                          | Timestamp of when the booking was made.   |

### `admin` table
| Field          | Type         | Description                             |
|----------------|--------------|-----------------------------------------|
| `admin_id`     | INT          | Primary key for the admin table.        |
| `admin_name`   | VARCHAR(50)  | Username for the admin (unique).        |
| `admin_password`| VARCHAR(255) | Hashed password for the admin.         |

### 3.4. Interface Design

The user interface (UI) and user experience (UX) are paramount to the success of the MovieMate application. The interface design aims to create a visually appealing, intuitive, and responsive platform that users will find easy and enjoyable to navigate. The design philosophy is centered around clarity and simplicity, avoiding clutter and ensuring that the most important information and actions are always easily accessible. The interface is designed to be fully responsive, providing an optimal viewing experience across a wide range of devices, from desktop computers to mobile phones.

The design of the key screens has been carefully considered. The Home Page is designed to be a visually rich and engaging entry point to the application, featuring a prominent display of movie posters for new and popular releases. The Movie Details Page provides a comprehensive overview of each film, with a clean layout that presents the synopsis, cast, trailer, and other information in an easily digestible format. The Booking Page is designed as a simple, multi-step process that guides the user through selecting their showtime, and number of seats, and confirming their booking, minimizing friction and reducing the likelihood of user error.

The overall aesthetic of the interface is modern and professional, using a consistent color scheme, typography, and iconography throughout the application. The design is guided by established UI/UX principles, such as providing clear visual feedback to the user after every action and ensuring that the navigation is logical and predictable. While the initial documentation does not include the final screenshots, the design process involves creating wireframes and mockups to visualize the layout and user flow before any code is written. This ensures that the final product is not only functional but also a pleasure to use.

## 4. Testing

### 4.1. Test Cases

The testing phase is a critical component of the MovieMate project's development lifecycle, designed to ensure that the final application is robust, reliable, and free of defects. A comprehensive suite of test cases is developed to systematically verify the functionality of every part of the system. These test cases are detailed scenarios that specify the inputs, the actions to be taken, and the expected outcomes. By executing these tests, the development team can identify and rectify bugs early in the process, preventing them from impacting the end-users.

The test cases for MovieMate cover all the core functionalities of the application. For the user-facing side, this includes testing the registration process with both valid and invalid data, verifying the login functionality with correct and incorrect credentials, and ensuring that the movie search and filter options work as expected. A significant number of test cases are dedicated to the booking process, covering scenarios such as booking a single seat, booking multiple seats, attempting to book more seats than are available, and canceling a booking.

### Validations: 
To ensure the application is secure and reliable, "Plant Nursery" uses a multi-layered validation strategy. This serves as the primary method of system testing and is broken down into three layers. 
 
### 4.1 Frontend (Client-Side) Validation: 
This validation happens in the user's browser to provide immediate feedback and improve user experience. 
 
What it checks: 
Validation is a critical aspect of ensuring data integrity and providing a good user experience. In the MovieMate application, this is handled on two fronts: the frontend and the backend. Frontend (Client-Side) Validation, which is handled by JavaScript files like `register.js` and `booking.js`, provides immediate feedback to the user. This includes checks to ensure that forms are not submitted with empty fields, that email addresses are in a valid format, and that passwords match. This prevents users from submitting incomplete or invalid data, improving the usability of the site. 
 
### 4.2 Backend (Server-Side) Validation: 
This is the most critical validation layer, protecting the database from invalid or malicious data. 
 
What it checks: 
It’s performed by PHP scripts in the `controllers` directory, serves as a second line of defense. Since client-side validation can be bypassed, the server must re-validate all incoming data before it is saved to the database. For example, `register-process.php` checks if all required fields are filled and if the passwords match. This is crucial for maintaining the integrity of the database and preventing invalid data from being stored.

### 4.3 Authentication & Authorization Validation: 
This layer ensures that only authenticated and authorized users can access protected resources. 
 
Authentication: It is the process of verifying a user's identity, which is handled by the login forms for both regular users and administrators. The “login-process.php” scripts check the submitted username and password against the records in the database. Testing this involves attempting to log in with valid and invalid credentials to ensure that only registered users can gain access. It's also important to test the “Remember Me” functionality, which uses cookies to keep a user logged in. 
 
Authorization : It ensures that users can only access the pages and features they are permitted to. For example, after logging in, a user should be able to access their `profile.php` and `my-booking.php` pages, but not the admin dashboard. Conversely, an administrator should have access to pages like `manage_movies.php` and `manage_users.php`. Testing authorization involves trying to access restricted pages without being logged in, or as a user with insufficient privileges, to confirm that access is correctly denied. 
 
### 4.4 Manual Testing: 
Manual testing is the process of manually using the application to find any issues or bugs, and to ensure that the user experience is smooth and intuitive. For the MovieMate application, a manual testing plan would cover all the main user journeys. This starts with the registration process, where a tester would create a new account, ensuring that all input fields work as expected and that any errors are clearly communicated. Next, the tester would log in and browse the available movies, using the search and filter functions. 

## 5. Future Enhancements

The current version of the MovieMate application provides a solid foundation for a comprehensive movie ticket booking system. However, the project has significant potential for growth and can be enhanced with a variety of new features to further improve the user experience and expand its functionality. The modular design of the application allows for these enhancements to be integrated in future development cycles, ensuring that the platform can evolve and adapt to the changing needs of its users.

One of the most significant future enhancements planned for MovieMate is the integration of a real-time payment gateway. While the current system simulates the payment process, integrating a secure payment gateway such as Stripe, PayPal, or a local equivalent would allow users to pay for their tickets directly through the application. This would complete the booking cycle within the platform and provide a more seamless and professional experience for users. The implementation of this feature would involve working with the payment gateway's API and ensuring that all transactions are handled securely and reliably.
 
### 5.1 Enhanced User Interaction and Engagement: 
To foster a more dynamic and interactive community around the MovieMate platform, several features can be introduced. A user rating and review system would allow customers to share their opinions on movies, helping others make informed decisions. Integrating social media sharing would enable users to easily share the movies they are excited about or have recently booked, which also serves as organic marketing for the platform. Additionally, implementing a notification system, either through email or in-app alerts, could inform users about upcoming movie releases, showtime reminders, and exclusive offers, keeping them engaged and encouraging repeat bookings. 
 
### 5.2 Advanced Content Management: 
For the administrative side of MovieMate, a more sophisticated content management system would streamline operations and provide valuable insights. This could include an advanced movie management module where administrators can add more details like movie trailers, cast and crew information, and multiple genre tags. A graphical showtime management interface, such as a drag-and-drop calendar view, would make scheduling shows across different theaters more intuitive. Furthermore, a comprehensive analytics dashboard could provide key metrics at a glance, such as the most popular movies, peak booking times, and revenue reports, enabling data-driven decisions for movie programming and marketing efforts. 
 
### 5.3 Improved User Experience and Personalization: 
To elevate the user experience, personalization can be a key differentiator. A movie recommendation engine could suggest films to users based on their past booking history and ratings, making content discovery more personalized and engaging. A "watchlist" or "favorites" feature would allow users to save movies they are interested in, with optional notifications for when tickets become available. The user interface could also be enhanced with a more modern design, including richer visuals and smoother transitions. Streamlining the booking process with features like saved payment methods and a one-page checkout would reduce friction and make booking tickets even faster and more convenient. 


## 6. Bibliography

The development of the MovieMate project has been informed and guided by a variety of resources from the world of web development and software engineering. The foundational technologies used in this project are well-documented, and their official documentation has been an indispensable resource. The PHP manual, the MySQL documentation, and the resources provided by the Mozilla Developer Network (MDN) for HTML, CSS, and JavaScript have served as the primary references for the core development work.

In addition to the official documentation, various online learning platforms and community forums have been instrumental in solving specific technical challenges and in understanding best practices. Websites like Stack Overflow, with its vast community of developers, have provided invaluable support for troubleshooting and for finding solutions to complex coding problems. Tutorials and articles from websites such as W3Schools, and SitePoint have also been a great help in learning and implementing different features of the application.

### 6.1 Limitation 
One of the most critical limitations of the MovieMate application is its security. The current implementation is highly vulnerable to SQL injection attacks. The PHP code constructs database queries by directly embedding user-provided data into the SQL strings. An attacker could easily manipulate these inputs to execute arbitrary SQL commands, potentially leading to data theft, modification, or deletion. Furthermore, user passwords are stored in the database as plain text, which is a major security risk. If the database were to be compromised, all user passwords would be exposed. The application's feature set, while functional, is quite basic. The booking process, for instance, allows users to select the number of seats but does not provide an interactive seat map, which is a standard feature in modern cinema booking systems. The search and filtering options for movies are limited, and there is no functionality for users to customize their profiles beyond the initial registration data. The admin panel also lacks advanced features, such as analytics on ticket sales or user activity, which would be essential for business operations. 
 
From a technical perspective, the project's architecture and codebase present challenges for scalability and maintainability. The application does not follow a modern design pattern like Model-View-Controller (MVC), which makes the code harder to read, debug, and extend. The reliance on including files directly (`require`) can lead to a complex web of dependencies that is difficult to manage as the application grows. This lack of a structured framework would make it challenging to add new features or to have multiple developers working on the project simultaneously. 
  	 
### 6.2 Future Scope 
Addressing the security vulnerabilities should be the top priority for the future development of MovieMate. This involves refactoring the database queries to use prepared statements with either the `mysqli` or `PDO` extension, which would effectively eliminate the risk of SQL injection. Implementing Cross-Site Scripting (XSS) protection by properly sanitizing user inputs would also be a crucial step. 
 
The feature set of the application can be greatly expanded to enhance the user experience. A key feature to add would be an interactive seat map for the booking process, allowing users to select their exact seats. The movie browsing experience could be improved with advanced search and filtering options, such as by genre, language, and showtime. A user profile section could be enhanced to include booking history, saved payment methods, and profile picture uploads. For the admin panel, a dashboard with analytics on sales, popular movies, and user demographics would provide valuable business insights. For the long-term growth of the platform, a more robust deployment and infrastructure strategy should be considered. This could involve moving the application to a cloud hosting provider like AWS, Google Cloud, or Azure, which would offer better scalability, reliability, and security. Implementing a CI/CD (Continuous Integration/Continuous Deployment) pipeline would automate the testing and deployment process, allowing for faster and more reliable updates. Containerizing the application using Docker would also simplify the development and deployment process by ensuring that the application runs in a consistent environment. 
 
### 6.3 Conclusion 
The MovieMate application, in its current state, serves as a solid proofof-concept for a web-based movie ticket booking system. It successfully implements the core functionalities, allowing users to browse movies, register for an account, and book tickets. The inclusion of a separate admin panel for managing movies and bookings demonstrates a good understanding of the requirements for such a system. It is a functional prototype that lays the groundwork for a more comprehensive and feature-rich platform. 
 
In conclusion, the MovieMate project is a valuable learning experience and a commendable effort in building a full-stack web application. It successfully demonstrates the fundamental principles of web development with PHP and MySQL. While it is not without its flaws, it has a strong foundation upon which a secure, scalable, and engaging movie booking platform can be built. With further development and a focus on security and user experience, MovieMate has the potential to become a successful and popular application. 
