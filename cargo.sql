-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2019 at 09:35 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cargo`
--

-- --------------------------------------------------------

--
-- Table structure for table `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `unique_name` varchar(100) NOT NULL,
  `cargo_type` varchar(100) NOT NULL,
  `delivered_on` varchar(100) NOT NULL,
  `weight` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cargo`
--

INSERT INTO `cargo` (`id`, `unique_name`, `cargo_type`, `delivered_on`, `weight`, `quantity`, `status`) VALUES
(3, '00032131FXC0012', 'F1 Car Parts', '2019-05-22', 1990, 100, 1),
(4, '0032131EXC0121', 'Motor Engines', '2019-05-16', 192, 1000, 1),
(5, '0032131MXC0121M', 'IPhone', '2019-05-17', 1992, 1000, 0),
(6, '011132131EXC0121', 'V8 Car Engine', '2019-07-16', 1990, 1000, 0),
(7, '99131EXC0121', 'Chrome Laptops', '2019-04-26', 1002, 10000, 1),
(8, '0032EE3XC0121', 'HP laptops', '2019-04-22', 1002, 1000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `tracking_id` varchar(100) NOT NULL,
  `driver_id` varchar(100) NOT NULL,
  `deliver_warehouse_id` varchar(100) NOT NULL,
  `start_time` varchar(11) NOT NULL,
  `end_time` varchar(11) NOT NULL,
  `confirm_driver_receive` int(11) NOT NULL,
  `confirm_driver_deliver` int(11) NOT NULL,
  `confirm_warehouse_receive` int(11) NOT NULL,
  `confirm_warehouse_deliver` int(11) NOT NULL,
  `cargo_data_id` varchar(100) NOT NULL,
  `issued_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `issued_by` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `tracking_id`, `driver_id`, `deliver_warehouse_id`, `start_time`, `end_time`, `confirm_driver_receive`, `confirm_driver_deliver`, `confirm_warehouse_receive`, `confirm_warehouse_deliver`, `cargo_data_id`, `issued_on`, `issued_by`, `status`) VALUES
(28, 'JBKTV-76531', 'driver@app.com', 'warehouse@app.com', '20019-10-23', '2019-04-24', 1, 1, 1, 1, '00032131FXC0012', '2019-04-19 19:37:56', 'admin@app.com', 1),
(29, 'VXATD-59840', 'driver@app.com', 'warehouse@app.com', '2019-04-24', '2019-04-27', 0, 0, 0, 1, '99131EXC0121', '2019-04-19 19:32:11', 'admin@app.com', 0),
(30, 'SCQUC-23510', 'driver@app.com', 'warehouse@app.com', '2019-04-30', '2019-04-22', 0, 0, 0, 0, '0032131EXC0121', '2019-04-19 19:32:04', 'admin@app.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `drivers_job`
--

CREATE TABLE `drivers_job` (
  `id` int(11) NOT NULL,
  `tb_cargo_id` int(11) NOT NULL,
  `tracking_id` varchar(100) NOT NULL,
  `delivery_warehouse` varchar(100) NOT NULL,
  `assigned_driver` varchar(100) NOT NULL,
  `arrival_delivery` varchar(100) NOT NULL,
  `cargo_type` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `cargo_unique_name` varchar(100) NOT NULL,
  `warehouse_room` varchar(100) NOT NULL,
  `warehouse_address` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `warehouse_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers_job`
--

INSERT INTO `drivers_job` (`id`, `tb_cargo_id`, `tracking_id`, `delivery_warehouse`, `assigned_driver`, `arrival_delivery`, `cargo_type`, `quantity`, `weight`, `cargo_unique_name`, `warehouse_room`, `warehouse_address`, `status`, `warehouse_status`) VALUES
(7, 27, 'CTKBQ-26749', 'lorem', 'Kenneth Apana', '1999-12-09', 'BOXES', 90, 4565, '02-01AP', 'Lox', 'aspdapsdp', 1, 0),
(8, 28, 'JBKTV-76531', 'warehouse@app.com', 'driver@app.com', '2019-04-24', 'F1 Car Parts', 100, 1990, '00032131FXC0012', 'ENG-ROOM-1', '89 Linklin Street', 1, 1),
(10, 30, 'VXATD-59840', 'warehouse@app.com', 'driver@app.com', '2019-04-27', 'Chrome Laptops', 10000, 1002, '99131EXC0121', 'PHONES-ROOM-1', '89 Linklin Street', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `access_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `address`, `contact`, `access_level`) VALUES
(17, 'admin@app.com', 'company@app.com', 'password', 'Cargo Company', 'Cargo Management System St .19 Golden Street', '791828128380', 900),
(26, 'driver@app.com', 'driver@app.coom', 'password', 'Driver', '29 Jump Street', '793999393939', 100),
(27, 'warehouse@app.com', 'warehouse@app.com', 'password', 'Warehouse', '89 Linklin Street', '799000002899', 500);

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `room` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `username`, `room`, `type`, `time`) VALUES
(1, 'lorem', 'Lox', 'R1', '2019-04-19 17:14:11'),
(2, 'warehouse@app.com', 'ENG-ROOM-1', 'Engines', '2019-04-19 19:23:03'),
(3, 'warehouse@app.com', 'LAPTOP-ROOM-1', 'Laptops', '2019-04-19 19:23:31'),
(4, 'warehouse@app.com', 'PHONES-ROOM-1', 'Phones', '2019-04-19 19:23:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers_job`
--
ALTER TABLE `drivers_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `drivers_job`
--
ALTER TABLE `drivers_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
