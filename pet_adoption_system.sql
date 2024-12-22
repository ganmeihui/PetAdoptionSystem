-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 07:39 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pet_adoption_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_role`) VALUES
(1, 'superadmin', 'superadmin@gmail.com', 'superadmin', 'Superadmin'),
(2, 'admin1', 'admin1@gmail.com', 'admin1', 'Superadmin'),
(3, 'Alice Tan', 'alicetan@gmail.com', 'alicetan', 'Admin'),
(4, 'admin2', 'admin2@gmail.com', 'admin2', 'Admin'),
(5, 'admin3', 'admin3@gmail.com', 'admin3', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_created_date`) VALUES
(1, 'Cat', '2024-05-30 05:21:34'),
(2, 'Dog', '2024-05-30 05:21:49'),
(3, 'Rabbit', '2024-05-30 05:31:07'),
(4, 'Hamster', '2024-05-30 05:47:50'),
(5, 'Bird', '2024-07-03 02:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `pet_id` int(10) NOT NULL,
  `pet_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `species` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `vaccination_status` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` blob NOT NULL,
  `intake_date` date NOT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`pet_id`, `pet_name`, `gender`, `age`, `species`, `breed`, `vaccination_status`, `description`, `image`, `intake_date`, `created_date`) VALUES
(1, 'Mimi', 'Male', '3 years old', 'Cat', 'American Shorthair', 'No', 'Mimi is a lovely cat and very playful. She has been living with me all the time. Very playful and affectionate. Mimi likes dry food and is not allergic to anything. She doesn’t like loud noise but fine with everything else.', 0x636174312e6a7067, '2024-05-03', '2024-05-13'),
(2, 'Lucky', 'Male', '6 years old', 'Cat', 'Siamese', 'Yes', 'Siamese cat', 0x636174322e6a7067, '2024-05-04', '2024-05-13'),
(3, 'Casper', 'Male', '5 years old', 'Cat', 'Mixed Breed', 'Yes', 'mixed breed, naughty', 0x636174342e6a7067, '2024-05-04', '2024-05-13'),
(4, 'Bob', 'Male', '4 years old', 'Dog', 'Husky', 'No', 'husky', 0x646f6730312e6a7067, '2024-05-04', '2024-05-13'),
(5, 'Gorgeous ', 'Female', '8 years old', 'Dog', 'Bull', 'Yes', 'Bull dog', 0x646f6730322e6a7067, '2024-05-30', '2024-07-02'),
(6, 'Minion', 'Male', '2 year old', 'Dog', 'Poddle', 'No', 'Playful, toy size', 0x706f64646c652e6a706567, '2024-06-06', '2024-07-02'),
(7, 'Orange', 'Female', '3 years old', 'Cat', 'British Shorthair', 'Yes', 'Orange has a round face with chubby cheeks, and dense, plush coat. ', 0x45786f7469632053686f7274686169722e6a706567, '2024-07-01', '2024-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `apply_id` int(11) NOT NULL,
  `Q1` text NOT NULL,
  `Q2` text NOT NULL,
  `Q3` text NOT NULL,
  `Q4` text NOT NULL,
  `Q5` text NOT NULL,
  `adopter_name` varchar(255) NOT NULL,
  `adoptpet_id` int(11) NOT NULL,
  `apply_date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`apply_id`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `adopter_name`, `adoptpet_id`, `apply_date`, `status`) VALUES
(1, 'Yes', 'Yes', 'No', 'No', 'reason', 'test@gmail.com', 1, '2024-06-24', 'Rejected'),
(2, 'Yes', 'Yes', 'Yes', 'No', 'reduce feelings of loneliness', 'test@gmail.com', 4, '2024-06-24', 'Approved'),
(3, 'Yes', 'Yes', 'Yes', 'Yes', 'Hope to contribute to animal welfare', 'yan@gmail.com', 2, '2024-07-02', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `gender`, `DOB`, `mobile`, `email`, `password`) VALUES
(1, 'Test', 'Male', '2000-06-07', '0112233444', 'test@gmail.com', 'f925916e2754e5e03f75dd58a5733251'),
(2, 'Try', 'Female', '1998-01-03', '0111333388', 'try@gmail.com', '52a4e4a94cee5e653586ba6ce7f0a044'),
(3, 'Yan', 'Female', '2000-02-27', '0126115709', 'yan@gmail.com', 'a6e75bc8370aa4370460f2d2c2c7a686');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`pet_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`apply_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `pet_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `apply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
