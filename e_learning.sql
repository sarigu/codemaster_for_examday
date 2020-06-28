-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 29, 2020 at 01:41 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_learning`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllUserEmail` ()  BEGIN
	SELECT email  FROM user;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetCoursesLessons` ()  SELECT lesson.lesson_id as lesson_id, course.title as course_title, lesson.title as lesson_title, course.course_id as course_id
FROM lesson
LEFT JOIN course
ON lesson.course_id = course.course_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetFavourites` (IN `userID` INT)  NO SQL
SELECT uf.lesson_id, l.course_id, l.title FROM user_favourite uf 
INNER JOIN lesson l ON uf.lesson_id = l.lesson_id
WHERE uf.user_id = userID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `OneYearAnniversary` (IN `year` INT)  NO SQL
SELECT u.first_name, u.email, (SELECT EXTRACT(YEAR FROM ua.executed_time)) AS entry_year FROM user u
INNER JOIN user_added ua ON u.user_id = ua.user
WHERE ua.executed_time LIKE CONCAT(year, '%')$$

DELIMITER ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `title`, `description`, `user_id`) VALUES
(7, 'Relational database', 'Relational database is the basis for SQL and all modern database systems such as Oracle, MySQL etc. This course will introduce you to relational databases and what makes them unique.', 33),
(8, 'Database normalization', 'Normalisation is a technique that consists of a series of rules whose application eliminates redundancy in a relational design. This course teaches you about the specific states called normal forms.', 33),
(9, 'Entity relationship diagram', 'The entity relationship diagram is a graphic representation/model of entities in a database and the relationships between them. In this course we will cover how to create an ERD and what it consists of.', 33),
(10, 'CRUD data in SQL', 'SQL is a standard language for storing, manipulating and retrieving data in databases. In this course we will walk you through creating/reading/updating/deleting data using SQL. ', 33),
(11, 'Install a relational database', 'This course covers what application you need to access your database and the gui and how you create your designed relational database.', 33),
(12, 'Web Front End connection ', 'To build a website that shows data from a database you will need RDBMS database program, a server-side scripting language, SQL and HTML / CSS. This course shows you how to connect a database to a web front end step by step.', 33);

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `course_id`, `title`, `video_link`, `created_at`, `script`, `exercise_explanation`) VALUES
(16, 9, 'Entities', 'https://www.youtube.com/embed/QpdhBUYk7Kk', '2020-06-21 22:02:38', 'Entities Video\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Qui esse deleniti maxime, aut veniam expedita iure. Ad, sit doloribus nemo id, magnam neque molestiae, quos distinctio nulla ducimus et? Natus.', 'Entities. An entity is an object to be tracked in a database. Each entity is a table in a database and has attributes.'),
(17, 9, 'Primary Key', 'https://www.youtube.com/embed/-CuY5ADwn24', '2020-06-21 22:04:43', 'Primary Key Video\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Qui esse deleniti maxime, aut veniam expedita iure. Ad, sit doloribus nemo id, magnam neque molestiae, quos distinctio nulla ducimus et? Natus.', 'Primary Keys. The PK is an attribute that uniquely identifies every record in a certain table. The PK has to be never changing and can never be left blank/null. '),
(18, 8, 'First Normalization', 'https://www.youtube.com/embed/ABwD8IYByfk', '2020-06-22 22:25:31', '1NF Video\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Qui esse deleniti maxime, aut veniam expedita iure. Ad, sit doloribus nemo id, magnam neque molestiae, quos distinctio nulla ducimus et? Natus.', 'To normalize a model up to 1NF all its values must be atomic. In this exercise you will learn how a relation fulfills 1NF. '),
(19, 8, 'Second Normalization', 'https://www.youtube.com/embed/ABwD8IYByfk', '2020-06-22 22:25:31', '2NF\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Qui esse deleniti maxime, aut veniam expedita iure. Ad, sit doloribus nemo id, magnam neque molestiae, quos distinctio nulla ducimus et? Natus.', 'A relation fulfils 2NF if it fulfils 1NF and every attribute that does not belong to the PK depends on the full PK. Note, if a relation has a simple PK (only formed by one attribute) in 1NF, it automatically fulfills 2NF. '),
(20, 8, 'Third Normalization', 'https://www.youtube.com/embed/ABwD8IYByfk', '2020-06-22 22:25:31', '3NF\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Qui esse deleniti maxime, aut veniam expedita iure. Ad, sit doloribus nemo id, magnam neque molestiae, quos distinctio nulla ducimus et? Natus.', 'A relation is normalised up to 3NF, if the relation fulfils 2NF and all attributes that do not belong to the PK don’t inform about other attributes, they are independent. '),
(21, 7, 'Introduction', 'https://www.youtube.com/embed/HljkIQxq3x8', '2020-06-23 01:08:21', 'RDBS Video\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Qui esse deleniti maxime, aut veniam expedita iure. Ad, sit doloribus nemo id, magnam neque molestiae, quos distinctio nulla ducimus et? Natus.', 'RDBS Lorem Ipsum'),
(22, 10, 'Create Data', 'https://www.youtube.com/embed/53gJwDPk8WY', '2020-06-24 12:46:36', 'Create Video\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Qui esse deleniti maxime, aut veniam expedita iure. Ad, sit doloribus nemo id, magnam neque molestiae, quos distinctio nulla ducimus et? Natus.', 'SQL is a standard language for storing, manipulating and retrieving data in databases. In this course we will walk you through creating/reading/updating/deleting data using SQL statements. Creating data ..'),
(23, 10, 'Read Data', 'https://www.youtube.com/embed/ZJhGHOgm-Vo', '2020-06-24 12:46:36', 'Read Data Video\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Qui esse deleniti maxime, aut veniam expedita iure. Ad, sit doloribus nemo id, magnam neque molestiae, quos distinctio nulla ducimus et? Natus.', 'SQL is a standard language for storing, manipulating and retrieving data in databases. In this course we will walk you through creating/reading/updating/deleting data using SQL statements. Reading data ..'),
(24, 10, 'Update Data', 'https://www.youtube.com/embed/LiqvMXqXVr4', '2020-06-24 12:46:36', 'Update Data Video\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Qui esse deleniti maxime, aut veniam expedita iure. Ad, sit doloribus nemo id, magnam neque molestiae, quos distinctio nulla ducimus et? Natus.', 'SQL is a standard language for storing, manipulating and retrieving data in databases. In this course we will walk you through creating/reading/updating/deleting data using SQL statements. Updating data ..'),
(25, 10, 'Delete Data', 'https://www.youtube.com/embed/ug0MKrqIk_g', '2020-06-24 12:46:36', 'Delete Data Video\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Qui esse deleniti maxime, aut veniam expedita iure. Ad, sit doloribus nemo id, magnam neque molestiae, quos distinctio nulla ducimus et? Natus.', 'SQL is a standard language for storing, manipulating and retrieving data in databases. In this course we will walk you through creating/reading/updating/deleting data using SQL statements. Deleting data ..'),
(26, 11, 'PhpMyAdmin', 'https://www.youtube.com/embed/PFXdhYojopY', '2020-06-24 12:50:45', 'PHP My Admin Set Up Video\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Qui esse deleniti maxime, aut veniam expedita iure. Ad, sit doloribus nemo id, magnam neque molestiae, quos distinctio nulla ducimus et? Natus.', 'This course covers what application you need to access your database and the gui and how you create your designed relational database. To access PHP MyAdmin you will need Xampp or Mamp. After you started the servers you can go to PHP MyAdmin via the address line in you browser. The address line could look like this http://localhost:8888/phpMyAdmin. Once the gui is open you can start setting up your very own database.'),
(27, 12, 'MySqli', 'https://www.youtube.com/embed/7qaK1r8mOZY', '2020-06-24 12:50:45', 'Connect to Web Frontend using MySqli Video\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Qui esse deleniti maxime, aut veniam expedita iure. Ad, sit doloribus nemo id, magnam neque molestiae, quos distinctio nulla ducimus et? Natus.', 'To build a website that shows data from a database you will need RDBMS database program, a server-side scripting language, SQL and HTML / CSS. This course shows you how to connect a database to a web front end step by step.'),
(28, 12, 'PHP PDO', 'https://www.youtube.com/embed/7qaK1r8mOZY', '2020-06-24 12:50:45', 'Connect to Web Frontend using PDO Video\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Qui esse deleniti maxime, aut veniam expedita iure. Ad, sit doloribus nemo id, magnam neque molestiae, quos distinctio nulla ducimus et? Natus.', 'To build a website that shows data from a database you will need RDBMS database program, a server-side scripting language, SQL and HTML / CSS. This course shows you how to connect a database to a web front end step by step.'),
(29, 9, 'Foreign Key', 'https://www.youtube.com/embed/-CuY5ADwn24', '2020-06-24 13:36:27', 'Foreign Key Video\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Qui esse deleniti maxime, aut veniam expedita iure. Ad, sit doloribus nemo id, magnam neque molestiae, quos distinctio nulla ducimus et? Natus.adipisicing elit. Qui esse deleniti maxime, aut veniam expedita iure. Ad, sit doloribus nemo id, magnam neque molestiae, quos distinctio nulla ducimus et? Natus.', 'Foreign Keys don’t have to be unique, they can be repeated. The FK references a PK from another entity.'),
(30, 9, 'Compound Key', '  https://www.youtube.com/embed/-CuY5ADwn24', '2020-06-24 13:39:01', 'Compound Key Video\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Qui esse deleniti maxime, aut veniam expedita iure. Ad, sit doloribus nemo id, magnam neque molestiae, quos distinctio nulla ducimus et? Natus.', 'If there is no unique PK, you can take two attributes and combine them to create a unique value. Thereby the combined value won’t be repeated. Both of the combined attributes get a PK notation but it doesn’t mean there are two PK’s, it is handled as a Composite Primary Key instead. '),
(31, 9, 'Relations', 'https://www.youtube.com/embed/QpdhBUYk7Kk', '2020-06-24 13:42:19', 'Relations Video\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Qui esse deleniti maxime, aut veniam expedita iure. Ad, sit doloribus nemo id, magnam neque molestiae, quos distinctio nulla ducimus et? Natus.', 'Relationships between entities describe how they will interact with each other. For a relationship we draw a line between the entities and attach a notation to it.');

--
-- Dumping data for table `lesson_counter`
--

INSERT INTO `lesson_counter` (`counter_id`, `user_id`, `counter`) VALUES
(1, 69, 9),
(2, 67, 8),
(3, 70, 4);

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `avatar_img`, `status`) VALUES
(1, 'Admin', 'Admin', 'Admin@admin.com', 'admin', '', 'Admin'),
(2, 'Content', 'Writer', 'Contentwriter@gmail.com', 'content', '', 'Admin'),
(32, 'Monika', 'Puk', 'monika@kea.mail.dk', 'passA', '', 'User'),
(33, 'Ilva', 'Lamberte', 'ilva@kea.mail.dk', 'passB', '', 'User'),
(34, 'Suman', 'Magar', 'suman@kea.mail.dk', 'passC', '', 'User'),
(35, 'Sari', 'Guci', 'sari@kea.mail.dk', 'passD', '', 'User'),
(36, 'Michel', 'Hansen', 'michel@kea.mail.dk', 'passE', '', 'User'),
(59, 'Mia', 'Hansen', 'mia@stud.kea.dk', '12345', '', 'User'),
(63, 'Pia', 'Hansen', 'pia@stud.kea.dk', '12345', '', 'User'),
(67, 'wheein', 'inthemood', 'whee@in.com', '1234', '', 'User'),
(69, 'trigger', 'test', 'a@a.com', '23', '', 'User'),
(70, 'Sari', 'Guci', 'sari@test.com', '1234', '', 'User');

--
-- Dumping data for table `user_added`
--

INSERT INTO `user_added` (`id`, `information`, `executed_time`, `user`) VALUES
(16, 'user added', '2020-06-21 23:24:41', 63),
(17, 'user_added', '2000-06-21 23:24:41', 12),
(18, 'user added', '2020-06-23 17:56:24', 64),
(19, 'user added', '2020-06-23 17:56:53', 65),
(20, 'user added', '2020-06-23 17:58:16', 66),
(21, 'user added', '2020-06-23 17:58:42', 67),
(23, 'user added', '2020-06-24 10:37:56', 69),
(24, 'user added', '2020-06-25 01:00:55', 70);

--
-- Dumping data for table `user_favourite`
--

INSERT INTO `user_favourite` (`user_favourite_id`, `user_id`, `lesson_id`) VALUES
(1, 35, 16),
(2, 35, 17),
(3, 35, 20),
(4, 35, 21),
(5, 33, 18),
(6, 33, 17),
(7, 67, 18),
(8, 67, 19),
(9, 67, 20),
(15, 67, 16),
(16, 67, 21),
(18, 67, 27),
(19, 69, 16),
(20, 69, 17),
(21, 69, 29),
(22, 69, 30),
(23, 67, 30),
(24, 69, 21),
(25, 70, 18),
(26, 70, 16),
(27, 70, 30);

--
-- Dumping data for table `user_learning`
--

INSERT INTO `user_learning` (`user_learning_id`, `user_id`, `lesson_id`, `lesson_status`) VALUES
(1, 67, 16, 1),
(3, 67, 21, 1),
(5, 67, 18, 1),
(6, 67, 19, 1),
(35, 67, 17, 1),
(36, 69, 16, 1),
(37, 69, 21, 1),
(38, 69, 18, 1),
(39, 69, 19, 1),
(40, 69, 20, 1),
(41, 69, 17, 1),
(42, 67, 20, 1),
(43, 67, 26, 0),
(44, 67, 27, 1),
(45, 67, 28, 0),
(46, 67, 22, 0),
(47, 67, 23, 1),
(48, 67, 24, 0),
(49, 67, 25, 0),
(50, 69, 26, 1),
(51, 69, 27, 1),
(52, 69, 28, 0),
(53, 69, 22, 1),
(54, 69, 23, 0),
(55, 67, 31, 0),
(56, 70, 21, 0),
(57, 70, 18, 0),
(58, 70, 26, 0),
(59, 70, 23, 0),
(60, 70, 30, 1),
(61, 70, 31, 1),
(62, 70, 29, 1),
(63, 70, 22, 0),
(64, 70, 25, 0),
(65, 70, 19, 0),
(66, 70, 17, 1),
(67, 70, 16, 0),
(68, 69, 30, 0);

-- --------------------------------------------------------

--
-- Structure for view `admins`
--
DROP TABLE IF EXISTS `admins`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admins`  AS  select `user`.`email` AS `email`,`user`.`password` AS `password` from `user` where (`user`.`status` = 'Admin') ;

-- --------------------------------------------------------

--
-- Structure for view `finished_classes`
--
DROP TABLE IF EXISTS `finished_classes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `finished_classes`  AS  select `ul`.`user_id` AS `user_id`,`ul`.`lesson_id` AS `lesson_id`,`ul`.`lesson_status` AS `lesson_status`,`l`.`title` AS `title` from (`user_learning` `ul` join `lesson` `l` on((`ul`.`lesson_id` = `l`.`lesson_id`))) where (`ul`.`lesson_status` = 1) ;

-- --------------------------------------------------------

--
-- Structure for view `started_courses`
--
DROP TABLE IF EXISTS `started_courses`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `started_courses`  AS  select distinct `ul`.`user_id` AS `user_id`,`c`.`course_id` AS `course_id`,`c`.`title` AS `title` from ((`user_learning` `ul` join `lesson` `l` on((`ul`.`lesson_id` = `l`.`lesson_id`))) join `course` `c` on((`l`.`course_id` = `c`.`course_id`))) order by `ul`.`user_id` ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
