-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2026 at 02:03 PM
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
-- Database: `courier_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `agent_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `from_location` varchar(50) DEFAULT NULL,
  `to_location` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`agent_id`, `user_id`, `city`, `branch`, `from_location`, `to_location`) VALUES
(1, 3, 'karachi', 'nn', NULL, NULL),
(2, 5, 'karachi', 'nazimabad', NULL, NULL),
(3, 6, 'karachi', 'nazimabad', NULL, NULL),
(4, 8, 'karachi', 'nazimabad', NULL, NULL),
(5, 10, 'karachi', 'nazimabad', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `bill_id` int(11) NOT NULL,
  `courier_id` int(11) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_mode` varchar(50) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `payment_status` enum('PAID','UNPAID') DEFAULT 'UNPAID',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`bill_id`, `courier_id`, `amount`, `payment_mode`, `created_by`, `payment_status`, `created_at`) VALUES
(1, 3, '2000.00', 'CASH', 1, 'PAID', '2026-01-19 12:17:35'),
(2, 2, '5000.00', 'CASH', 1, 'UNPAID', '2026-01-19 12:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `couriers`
--

CREATE TABLE `couriers` (
  `courier_id` int(11) NOT NULL,
  `tracking_number` varchar(50) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_name` varchar(100) DEFAULT NULL,
  `receiver_phone` varchar(15) DEFAULT NULL,
  `receiver_address` text DEFAULT NULL,
  `courier_type` varchar(50) DEFAULT NULL,
  `courier_company` varchar(50) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `expected_delivery` date DEFAULT NULL,
  `status` enum('BOOKED','IN_TRANSIT','DELIVERED') DEFAULT 'BOOKED',
  `created_by` int(11) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `couriers`
--

INSERT INTO `couriers` (`courier_id`, `tracking_number`, `sender_id`, `receiver_name`, `receiver_phone`, `receiver_address`, `courier_type`, `courier_company`, `booking_date`, `expected_delivery`, `status`, `created_by`, `branch`) VALUES
(1, 'TRKD16FAD9C11', 1, 'talha', '123456', 'north nazimabad', 'parcel', 'cargonest', '2026-01-12', '2026-01-22', 'BOOKED', 3, 'nn'),
(2, 'TRK20260114123645796', 1, 'Subhan Khurram', '12345678990', 'Ghouri palace north nazimabad block h karachi', 'parcel', 'none', NULL, '2026-01-20', 'BOOKED', 1, NULL),
(3, 'TRK20260119131124297', 3, 'testreceiver', '0123456789', 'Ghouri palace north nazimabad block h karachi', 'parcel', 'none', NULL, '2026-01-30', 'BOOKED', 1, NULL),
(4, 'TRK2858D12F4F', 4, 'Subhan Khurram', '03161054058', 'Ghouri palace north nazimabad block h karachi', 'parcel', 'none', '2026-01-19', '2026-01-31', 'BOOKED', 3, 'nn'),
(5, 'TRKE54AE5F01B', 5, 'Subhan Khurram', '031610540528', 'Ghouri palace north nazimabad block h karachi', 'parcel', 'none', '2026-01-19', '0000-00-00', 'BOOKED', 3, 'nn');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `phone`, `email`, `address`, `created_at`) VALUES
(1, 'Subhan Khurram', '1234567890', 'subhankhurram0316@gmail.com', NULL, '2026-01-12 10:37:06'),
(2, 'sameer', '123456', 'sameerss804@gmail.com', '123', '2026-01-19 11:01:39'),
(3, 'testuserclass', '03216545678', 'testuserclass@mailinator.com', NULL, '2026-01-19 11:12:18'),
(4, 'testusertwoclass', '01234567891', 'testuser2class@mailinator.com', 'Testuser2', '2026-01-19 11:50:56'),
(5, 'talha', '0321456799', 'talha@gmail.com', NULL, '2026-01-19 12:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `shipment_tracking`
--

CREATE TABLE `shipment_tracking` (
  `tracking_id` int(11) NOT NULL,
  `courier_id` int(11) NOT NULL,
  `status` enum('BOOKED','IN_TRANSIT','DELIVERED') DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipment_tracking`
--

INSERT INTO `shipment_tracking` (`tracking_id`, `courier_id`, `status`, `location`, `remarks`, `updated_at`) VALUES
(1, 1, 'BOOKED', 'nn', 'Courier Booked', '2026-01-12 10:42:42'),
(2, 4, 'BOOKED', 'nn', 'Courier Booked', '2026-01-19 12:40:54'),
(3, 5, 'BOOKED', 'nn', 'Courier Booked', '2026-01-19 12:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `sms_logs`
--

CREATE TABLE `sms_logs` (
  `sms_id` int(11) NOT NULL,
  `courier_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `sent_to` varchar(15) DEFAULT NULL,
  `sent_by` int(11) DEFAULT NULL,
  `sent_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `role` enum('ADMIN','AGENT','CUSTOMER') NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role`, `name`, `email`, `phone`, `password`, `city`, `branch`, `status`, `created_at`) VALUES
(1, 'ADMIN', 'admin', 'admin@gmail.com', '123456', '$2y$10$rOFhbvsWRq4HQeXZp5CkgujfOf5b27u4nmPKu987T8lCFN6g81qRa', 'karachi', 'admin', 1, '2026-01-12 10:35:46'),
(2, 'CUSTOMER', 'Subhan Khurram', 'subhankhurram0316@gmail.com', '1234567890', '$2y$10$m/lvVjaPu6pmR0oqSX.yOuXuWVfIg/rymlwbjc.NJGP09hNfrmfGG', '-- Select --', NULL, 1, '2026-01-12 10:37:06'),
(3, 'AGENT', 'talha khan', 'talha@123gmail.com', '1234567890', '$2y$10$XOWtCjUIgkgZkeANs8wNheUJvuT6AXknhvoJTFvZvOgaiB4mTzVqu', 'karachi', 'nn', 1, '2026-01-12 10:40:24'),
(4, 'CUSTOMER', 'testuserclass', 'testuserclass@mailinator.com', '03216545678', '$2y$10$mvKX5WjyK2x/8XzBG0AFv.3D.mE4J.137VZF7aaVNnrYxyovuQ07O', 'karachi', NULL, 1, '2026-01-19 11:12:18'),
(5, 'AGENT', 'testagentclass', 'testagentclass@mailinator.com', '03698521470', '$2y$10$13.JTtlB3moVl36K0VY/ee1ArgOiVn7znf6MIFkB4qj/EPfjIdopa', 'karachi', 'nazimabad', 1, '2026-01-19 11:55:02'),
(6, 'AGENT', 'testagenttwoclass', 'testagenttwoclass@mailinator.com', '03698521470', '$2y$10$vc.D/YFv.VQquLH/3zH9Fe3jdSw/ejt.14dlLf3gbDvRfdWyIL3ye', 'karachi', 'nazimabad', 1, '2026-01-19 11:56:34'),
(8, 'AGENT', 'testagenthreeclass', 'testagenthreeclass@mailinator.com', '03698521470', '$2y$10$gItn9NzX7v/QxNsr37dJreYScNpVCIJkOiYWqvJTyESFhSeTmiXzG', 'karachi', 'nazimabad', 1, '2026-01-19 11:59:48'),
(9, 'CUSTOMER', 'talha', 'talha@gmail.com', '0321456799', '$2y$10$hExOyyvidLxHKl7sT2lhRuaclOYqRUX2a4rmrAVJqUhUBiNyPdWPe', 'karachi', NULL, 1, '2026-01-19 12:47:12'),
(10, 'AGENT', 'testuserthree', 'testuserthree@ailinator.com', '0147896325123', '$2y$10$XnH3bUB37U1mIOUuJF/Jt.C/5utK9QS8lTdYIMHqiU5sM1sJyw3KO', 'karachi', 'nazimabad', 1, '2026-01-19 12:49:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`agent_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `courier_id` (`courier_id`);

--
-- Indexes for table `couriers`
--
ALTER TABLE `couriers`
  ADD PRIMARY KEY (`courier_id`),
  ADD UNIQUE KEY `tracking_number` (`tracking_number`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `idx_tracking_number` (`tracking_number`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_branch` (`branch`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `shipment_tracking`
--
ALTER TABLE `shipment_tracking`
  ADD PRIMARY KEY (`tracking_id`),
  ADD KEY `courier_id` (`courier_id`);

--
-- Indexes for table `sms_logs`
--
ALTER TABLE `sms_logs`
  ADD PRIMARY KEY (`sms_id`),
  ADD KEY `courier_id` (`courier_id`),
  ADD KEY `sent_by` (`sent_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `couriers`
--
ALTER TABLE `couriers`
  MODIFY `courier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shipment_tracking`
--
ALTER TABLE `shipment_tracking`
  MODIFY `tracking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sms_logs`
--
ALTER TABLE `sms_logs`
  MODIFY `sms_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agents`
--
ALTER TABLE `agents`
  ADD CONSTRAINT `agents_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`courier_id`) REFERENCES `couriers` (`courier_id`);

--
-- Constraints for table `couriers`
--
ALTER TABLE `couriers`
  ADD CONSTRAINT `couriers_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `couriers_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `shipment_tracking`
--
ALTER TABLE `shipment_tracking`
  ADD CONSTRAINT `shipment_tracking_ibfk_1` FOREIGN KEY (`courier_id`) REFERENCES `couriers` (`courier_id`);

--
-- Constraints for table `sms_logs`
--
ALTER TABLE `sms_logs`
  ADD CONSTRAINT `sms_logs_ibfk_1` FOREIGN KEY (`courier_id`) REFERENCES `couriers` (`courier_id`),
  ADD CONSTRAINT `sms_logs_ibfk_2` FOREIGN KEY (`sent_by`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
