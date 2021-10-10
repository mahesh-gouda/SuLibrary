-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2021 at 08:24 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sulibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `accession_details`
--

CREATE TABLE `accession_details` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `accession_number` varchar(25) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accession_details`
--

INSERT INTO `accession_details` (`id`, `book_id`, `accession_number`, `status`) VALUES
(1, 13, '334', 0),
(2, 13, '243', 0),
(3, 13, '5', 0),
(4, 14, '432', 1),
(5, 14, '1234', 1),
(6, 14, '876', 0),
(7, 15, '4322', 1),
(8, 15, '1232', 1),
(9, 15, '8276', 1),
(10, 16, '4222', 1),
(11, 16, '12032', 0),
(12, 16, '82786', 0),
(13, 17, '42222', 0),
(14, 17, '122032', 0),
(15, 17, '822786', 0),
(16, 18, '422222', 1),
(17, 18, '1212032', 0),
(18, 18, '8226786', 0),
(19, 19, '4222222', 0),
(20, 19, '12123032', 0),
(21, 19, '82264786', 0),
(22, 20, '42322222', 0),
(23, 20, '121233032', 0),
(24, 20, '822634786', 0),
(29, 14, '2', 0),
(30, 14, '3', 0),
(31, 14, '1', 0),
(32, 14, '2', 0),
(33, 14, '3', 0),
(34, 14, '1', 0),
(35, 14, '2', 0),
(36, 14, '3', 0),
(37, 20, '2222222222222', 0),
(38, 20, '222222222', 0),
(39, 20, '3', 0),
(40, 20, '33', 0),
(41, 20, '12', 0),
(42, 20, '3', 0),
(43, 20, '33', 0),
(44, 20, '12', 0),
(45, 20, 'sf', 0),
(46, 20, 'fs', 0),
(47, 20, 'sf', 0),
(48, 20, 'sf', 0),
(49, 20, 'fs', 0),
(50, 20, 'fss', 0),
(51, 20, '1234', 0),
(52, 12, '1111', 0),
(53, 12, '1111', 0),
(54, 12, '1111', 0),
(55, 12, '1111', 0),
(56, 22, '99999999999999', 1),
(57, 23, '99999999999999', 0),
(58, 24, '99999999999999', 0),
(59, 25, '99999999999999', 0),
(60, 15, '234', 1),
(61, 15, '43234', 1),
(62, 15, '2123', 0),
(63, 22, 'werewwwww', 0),
(64, 22, 'ewee', 0),
(65, 22, 'ewe', 0),
(66, 22, 'ewewe', 0),
(67, 39, '6543', 1),
(68, 39, '2345', 1),
(69, 39, '65433', 0);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `edition` varchar(30) DEFAULT NULL,
  `author` varchar(20) NOT NULL,
  `total_stock` int(11) NOT NULL,
  `book_department` varchar(20) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `cover_photo` varchar(100) NOT NULL DEFAULT 'default_book_cover.jpg',
  `book_type` varchar(20) NOT NULL,
  `pdf` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `edition`, `author`, `total_stock`, `book_department`, `description`, `cover_photo`, `book_type`, `pdf`) VALUES
(14, 'Data Stucture using c', '3', 'james B jong', 3, 'Computer Science', '\nAlgorithms is a book written by Robert Sedgewick and Kevin Wayne. This book covers all the most important computer algorithms currently in use. The book teaches you searching, sorting, graph processi', 'SUbook4e1412132141678afe40773bde86a2a8.jpg', 'physical book', ''),
(15, 'Data Stucture and algorithm', '5', 'james B jong', 3, 'Computer Science', '\nAlgorithms is a book written by Robert Sedgewick and Kevin Wayne. This book covers all the most important computer algorithms currently in use. The book teaches you searching, sorting, graph processi', 'SUbook2d6a5ee3175151f6b6a88206f2bef6df.jpg', 'physical book', ''),
(16, 'machine learning', '5', 'james B jong', 3, 'Computer Science', '\nAlgorithms is a book written by Robert Sedgewick and Kevin Wayne. This book covers all the most important computer algorithms currently in use. The book teaches you searching, sorting, graph processi', 'SUbook1c6fd132c378be97867229a6b2b00541.jpg', 'physical book', ''),
(18, 'machine learning', '5', 'james B jong', 3, 'Computer Science', '\nAlgorithms is a book written by Robert Sedgewick and Kevin Wayne. This book covers all the most important computer algorithms currently in use. The book teaches you searching, sorting, graph processi', 'SUbook1b44252acf2a165b228a7f8967297b05.jpg', 'physical book', ''),
(19, 'machine learning python', '5', 'james B jong', 3, 'Computer Science', '\nAlgorithms is a book written by Robert Sedgewick and Kevin Wayne. This book covers all the most important computer algorithms currently in use. The book teaches you searching, sorting, graph processi', 'SUbookb6d1ba384bb28586916c0fe2ba9a6cd6.jpg', 'physical book', ''),
(20, 'Concept of oops', '5', 'james B jong', 3, 'Computer Science', '\nAlgorithms is a book written by Robert Sedgewick and Kevin Wayne. This book covers all the most important computer algorithms currently in use. The book teaches you searching, sorting, graph processi', 'SUbook76f72e13e0d6d6e674e6a43628a110eb.jpg', 'physical book', ''),
(25, 'wqr', 'wr', 'qe', 1, 'Computer Science', 'wr', 'SUbookbfecfafed62930be8ab928678141e4f6.png', 'physical book', ''),
(36, 'new pdf', '', '', 0, 'Computer Science', '', 'default_book_cover.jpg', 'e book', 'SUEbook8595adac73487d74aa4ff3fcee9a7583.pdf'),
(38, 'new pdf2', '2', 'rick', 0, 'physiotherapy', 'sfsf', 'SUbook23d1ea2c916b5fcf532411b6fa171355.jpg', 'e book', 'SUEbooka51704dca516a3245182098a07843520.pdf'),
(39, 'compiler Dsign', '4', 'james', 3, 'Computer Science', 'compiler design is a great book for learning..', 'SUbookddcb4d47e8a38f7e481742fd3a86a8e5.jpg', 'physical book', '');

-- --------------------------------------------------------

--
-- Table structure for table `books_owned`
--

CREATE TABLE `books_owned` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_number` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `user_id`, `card_number`, `status`) VALUES
(8, 5, 44, 0),
(9, 5, 1, 0),
(10, 5, 0, 0),
(11, 6, 33, 0),
(12, 6, 0, 0),
(13, 6, 3, 0),
(14, 6, 3, 0),
(15, 6, 4, 0),
(16, 6, 4, 0),
(17, 7, 42, 0),
(18, 7, 3, 0),
(19, 8, 34, 0),
(20, 7, 56, 0),
(21, 6, 33, 0),
(22, 6, 33, 0),
(23, 8, 333, 0),
(24, 9, 1234, 1),
(25, 9, 43234, 1),
(26, 9, 6543, 1),
(27, 9, 2342, 1),
(28, 10, 9872, 0),
(29, 10, 5673, 0),
(30, 10, 98765, 0),
(31, 0, 34566, 0),
(32, 0, 6485, 0),
(34, 4, 3, 0),
(35, 17, 12345, 1),
(36, 17, 54321, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `card_number` int(11) NOT NULL,
  `accession_number` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `return_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `comment` varchar(100) DEFAULT NULL,
  `returned_date` date DEFAULT NULL,
  `fine` int(11) NOT NULL DEFAULT 0,
  `aprove_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `card_number`, `accession_number`, `book_id`, `user_id`, `order_date`, `return_date`, `status`, `comment`, `returned_date`, `fine`, `aprove_time`) VALUES
(31, 112, 1234, 6543, 39, 9, '2021-08-30', '2021-09-19', -1, 'ff', NULL, 0, '13:41:00'),
(32, 113, 12345, 432, 14, 17, '2021-08-30', '2021-09-19', -1, 'you collect your book from us', NULL, 0, '14:40:27'),
(33, 114, 54321, 2147483647, 25, 17, '2021-08-30', '2021-09-19', 20, 'erryy', NULL, 0, '13:43:13'),
(34, 115, 43234, 4322, 15, 9, '2021-08-30', '2021-09-19', 20, 'you got 2 hours to collect', NULL, 0, '12:57:36'),
(35, 116, 6543, 422222, 18, 9, '2021-08-30', '2021-09-19', 0, NULL, NULL, 0, NULL),
(36, 117, 2342, 1232, 15, 9, '2021-08-30', '2021-09-19', 0, NULL, NULL, 0, NULL),
(37, 118, 0, 1234, 14, 22, '2021-10-10', '2021-10-30', 3, 'tt', '2021-10-10', 0, '13:37:35'),
(38, 119, 0, 8276, 15, 22, '2021-10-10', '0000-00-00', -1, '', NULL, 0, '13:43:33'),
(39, 120, 0, 4222, 16, 22, '2021-10-10', '0000-00-00', -1, '', NULL, 0, '13:43:36'),
(40, 121, 0, 2345, 39, 22, '2021-10-10', '0000-00-00', -1, 'tt', NULL, 0, '13:43:42'),
(41, 122, 0, 43234, 15, 22, '2021-10-10', '0000-00-00', 0, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pending_aproval`
--

CREATE TABLE `pending_aproval` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `registration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pending_aproval`
--

INSERT INTO `pending_aproval` (`id`, `user_id`, `registration_date`) VALUES
(7, 11, '2021-08-30'),
(8, 12, '2021-08-30'),
(9, 13, '2021-08-30'),
(10, 14, '2021-08-30'),
(11, 15, '2021-08-30'),
(12, 16, '2021-08-30'),
(14, 18, '2021-08-30'),
(15, 20, '2021-10-08'),
(18, 23, '2021-10-10'),
(19, 24, '2021-10-10'),
(20, 25, '2021-10-10'),
(21, 26, '2021-10-10'),
(22, 27, '2021-10-10'),
(23, 28, '2021-10-10'),
(24, 29, '2021-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`id`, `username`, `password`, `name`, `email`) VALUES
(1, 'professor', '1234', 'professor', 'professor@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `reserved`
--

CREATE TABLE `reserved` (
  `reservation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `accession_number` varchar(50) NOT NULL,
  `reservation_date` date NOT NULL,
  `issue_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `phone` bigint(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `course` varchar(20) DEFAULT NULL,
  `regno` varchar(20) DEFAULT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(20) NOT NULL,
  `exipry_date` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `phone`, `email`, `course`, `regno`, `password`, `role`, `exipry_date`, `status`) VALUES
(1, 'ee', 'sdkjf', 0, '2333333333334', 'mca', '3', '32', 'student', NULL, 0),
(2, 'ee', 'sdkjf', 0, '343', 'mca', '345', '32', 'student', NULL, 0),
(3, 'ee', 'sdkjf', 2323, 'agent@gmail.coms', 'mca', '3333', '32', 'student', NULL, 0),
(4, 'df', 'sdkjf', 3434, 'q@q.c', 'mca', '3456', '32', 'student', NULL, 0),
(5, 'qwe', 'qw', 123, 'agent@gmail.com', 'mba', '1234', '32', 'student', NULL, 0),
(6, 'gfd', 'sdf', 23, 'a@a.com', 'mca', '2', '32', 'student', NULL, 0),
(9, 'mahesh', 'gouda', 9538923365, 'maheshgouda130@gmail.com', 'mca', '3su19mc811', 'mahesh@98', 'student', NULL, 0),
(10, 'rohit', 'naik', 1234567890, 'abc@abc.com', 'mca', '3453', '1234', 'student', NULL, 0),
(12, 'df', 'sdkjf', 1234567833, 'abc@abc.comss', 'bca', '345ssse', '1234', 'student', NULL, 0),
(13, 'ee', 'sdkjf', 3333333333, 'abc@abc.comsw', 'mba', '34532', '1234', 'student', NULL, 0),
(14, 'ee', 'qw', 3333332242, 'agent@gmail.cs', 'mca', '345s3', '32s', 'student', NULL, 0),
(15, 'dfs', 'qw', 3333332298, 'abc@abc.s', 'mba', '345324', '1234', 'student', NULL, 0),
(16, 'sdfs', 'sfsf', 12345678933, 'abc@abc.coms', 'mba', '3453242', 'sdf', 'student', NULL, 0),
(18, 'user', '', 2345678901, 'user@gamil.com', 'mca', '32', '1234', 'student', '2023-01-12', 0),
(19, 'librarian', 'su', 1234567890, 'lib@su.com', '', NULL, 'su@1234', 'librarian', NULL, 1),
(20, 'pp', 'pp', 1234567890, 'lib@gmail.com', 'mca', NULL, '1234', 'student', '0000-00-00', 0),
(21, 'ppppppppp', 'ppppppppppppp', 9876543210, 'abc@abc.comde', 'mca', '', '1234', 'professor', '0000-00-00', 1),
(22, '123', 'qwe', 8876543432, 'abc12@abc.com', 'mca', NULL, '1234', 'professor', NULL, 0),
(23, 'ganesh', 'ganesh', 9876543210, 'ganeshnayakhdk@gmail.com', 'mba', '12345', '1234', 'student', '2023-02-22', 0),
(28, 'mahesh', 'gouda', 1234567894, 'maheshgouda133@gmail.com', 'mba', '1234s3', '1234', 'student', '2023-06-02', 0),
(29, 'user', '', 7631983472, 'sda@gmail.com', 'mba', '213w21', '2134', 'student', '2022-08-06', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accession_details`
--
ALTER TABLE `accession_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `books_owned`
--
ALTER TABLE `books_owned`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_aproval`
--
ALTER TABLE `pending_aproval`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserved`
--
ALTER TABLE `reserved`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accession_details`
--
ALTER TABLE `accession_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `books_owned`
--
ALTER TABLE `books_owned`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `pending_aproval`
--
ALTER TABLE `pending_aproval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reserved`
--
ALTER TABLE `reserved`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
