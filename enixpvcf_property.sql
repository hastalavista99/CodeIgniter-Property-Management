-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2025 at 11:01 AM
-- Server version: 5.7.42-log
-- PHP Version: 8.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enixpvcf_property`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `commission` int(11) NOT NULL,
  `rent` int(11) NOT NULL,
  `deposit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `billing_two`
--

CREATE TABLE `billing_two` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `commission` int(11) NOT NULL,
  `deposit` int(11) NOT NULL,
  `rent` int(11) NOT NULL,
  `service_charge` int(11) DEFAULT NULL,
  `water_deposit` int(11) DEFAULT NULL,
  `electricity_deposit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing_two`
--

INSERT INTO `billing_two` (`id`, `unit_id`, `commission`, `deposit`, `rent`, `service_charge`, `water_deposit`, `electricity_deposit`) VALUES
(1, 2, 300, 90, 400, 80, 90, 90),
(2, 4, 600, 393, 9000, 90, 890, 890),
(64, 7, 500, 400, 5000, 80, 90, 80),
(115, 0, 9000, 343, 3400, 222, 323, 223),
(116, 9, 8000, 8990, 1000, 900, 900, 900),
(117, 10, 900, 900, 900, 900, 900, 900),
(241, 15, 34234, 84834, 338, 8, 4, 8),
(242, 16, 3423, 43, 43, 43, 34, 43),
(243, 19, 400, 800, 400, 77, 77, 77),
(244, 33, 700, 800, 800, 3737, 737, 737),
(245, 37, 500, 8776, 898, 677, 7, 7),
(246, 29, 600, 444, 233, 455, 44, 555),
(247, 43, 8000, 800, 12000, 900, 900, 800),
(248, 30, 200, 650, 700, 60, 700, 400),
(249, 40, 3000, 300, 40000, 3400, 4000, 5600),
(250, 51, 300, 2000, 4000, 300, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chart_of_accounts`
--

CREATE TABLE `chart_of_accounts` (
  `id` int(11) NOT NULL,
  `account_no` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chart_of_accounts`
--

INSERT INTO `chart_of_accounts` (`id`, `account_no`, `description`, `type`) VALUES
(41, 101, 'Cash in Hand', 'Asset'),
(42, 102, 'Cash in Bank', 'Asset'),
(43, 103, 'Accounts Receivable (rent)', 'Assets'),
(44, 201, 'Accounts Payable', 'Liabilites'),
(45, 202, 'Loans Payable', 'Liabilities'),
(46, 301, 'Owner\'s Equity', 'Equity'),
(47, 401, 'Rental Income', 'Income'),
(48, 402, 'Property Sale Income', 'Income'),
(49, 501, 'Cost of Property Sold', 'Cost of Goods Sold (COGS)'),
(50, 601, 'Property Management Fees', 'Expenses'),
(51, 602, 'Maintenance ', 'Expenses'),
(52, 603, 'Property Taxes', 'Expenses'),
(53, 604, 'Insurance', 'Expenses'),
(54, 605, 'Advertising and Marketing', 'Expenses'),
(55, 606, 'Utilities', 'Expenses'),
(56, 607, 'Legal and Professional Fees', 'Expenses'),
(57, 608, 'Loan Interest', 'Expenses'),
(58, 609, 'Depreciation', 'Expenses'),
(59, 701, 'Miscellaneous Income', 'Other Income'),
(60, 801, 'Miscellaneous Expenses', 'Other Expenses');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `tenant_name` varchar(50) NOT NULL,
  `property_name` varchar(50) NOT NULL,
  `unit_name` varchar(50) NOT NULL,
  `unit_number` int(11) NOT NULL,
  `contract` varchar(20) NOT NULL,
  `rent_due` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `tenant_name`, `property_name`, `unit_name`, `unit_number`, `contract`, `rent_due`) VALUES
(7, 'Karanja Kimani', 'dishon', 'mit', 59, 'rent', 800),
(8, 'Neema Nanyama', 'dishon', 'est', 7, 'rent', 4484),
(9, 'Margaret Kitambo', 'dishon', 'wst', 8, 'rent', 200),
(10, 'Karanja Kimani', 'dishon', 'mit', 59, 'rent', 800),
(11, 'Neema Nanyama', 'dishon', 'est', 7, 'rent', 4484),
(12, 'Margaret Kitambo', 'dishon', 'wst', 8, 'rent', 200);

-- --------------------------------------------------------

--
-- Table structure for table `invoices_two`
--

CREATE TABLE `invoices_two` (
  `id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoices_two`
--

INSERT INTO `invoices_two` (`id`, `tenant_id`, `property_id`, `unit_id`) VALUES
(1, 9, 6, 7),
(2, 10, 4, 10),
(3, 11, 8, 15),
(4, 7, 8, 15),
(5, 10, 8, 16),
(6, 13, 9, 19),
(7, 13, 9, 19),
(8, 5, 9, 19),
(9, 11, 4, 9),
(10, 6, 9, 19),
(11, 14, 11, 33),
(12, 15, 12, 37),
(13, 5, 5, 29),
(14, 7, 6, 7),
(15, 18, 9, 19),
(16, 19, 6, 7),
(17, 20, 19, 51);

-- --------------------------------------------------------

--
-- Table structure for table `landlords`
--

CREATE TABLE `landlords` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `landlords`
--

INSERT INTO `landlords` (`id`, `name`, `phone_number`, `email`) VALUES
(4, 'kimani kimanino', '075355533', 'kimani@gmail.com'),
(5, 'charles omollo', '0735353535', 'omollo@gmail.com'),
(6, 'Peter Kilonzo', '07464646464', 'kllonxff@gmail.com'),
(7, 'Joseph Kamau', '07645454533', 'kamau@gmail.com'),
(8, 'mit Persona', '074646464', 'persona@gmail.com'),
(9, 'toitan toiran', '076665653', 'torona@gmail.com'),
(10, 'Jsckdkdk kakakak', '9494884854', 'jack@mitit.com'),
(11, 'Emmanuel Kinai', '08383838', 'kinai@gmail.com'),
(12, 'Winfred Mutuku', '0734343343', 'mutuku@gmail.com'),
(13, 'Kimaniiiiiiiii', '0764646464', 'kim@gmail.com'),
(15, 'shiwa Shiwa ', '075555555', 'shiwa@gmail.com'),
(17, 'kazan kazan', '0838383838', 'kazan@gmail.com'),
(18, 'mushsts shtua', '0999998', 'shtus@gmail.com'),
(20, 'Ian Ianoh', '9999999', 'ian@gmail.com'),
(21, 'Zeu Matan', '07888888', 'matan@gmail.com'),
(22, 'Kenya Kenya', '0722222', 'kenya@gmail.com'),
(23, 'Joyce', '0799999999', 'joyce@example.com'),
(24, 'Faith Kimathi', '0799999999', 'kima@gmail.com'),
(25, 'John Stones', '0788888888', 'sotnety@example.com'),
(26, 'Makatiani', '07225253368', 'maka@gmail.com'),
(27, 'Rockland', '0724306770', 'exmapl@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_rent`
--

CREATE TABLE `monthly_rent` (
  `id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `month` varchar(2) NOT NULL,
  `year` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rent_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monthly_rent`
--

INSERT INTO `monthly_rent` (`id`, `tenant_id`, `month`, `year`, `time`, `rent_amount`) VALUES
(1, 10, '2', '2024', '2024-03-15 12:49:40', 4000),
(2, 11, '3', '2024', '2024-03-15 15:33:50', 3434),
(3, 11, '3', '2024', '2024-03-20 14:04:20', 4),
(4, 11, '3', '2024', '2024-03-20 14:04:20', 5),
(5, 11, '3', '2024', '2024-03-21 13:10:09', 4),
(6, 11, '3', '2024', '2024-03-21 13:10:09', 5),
(7, 11, '3', '2024', '2024-03-21 13:11:32', 4),
(8, 11, '3', '2024', '2024-03-21 13:11:32', 5),
(9, 11, '3', '2024', '2024-03-21 13:13:20', 4),
(10, 11, '3', '2024', '2024-03-21 13:13:20', 5),
(11, 11, '3', '2024', '2024-03-21 13:14:52', 4000),
(12, 11, '3', '2024', '2024-03-21 13:14:52', 5000),
(13, 11, '3', '2024', '2024-03-21 13:24:17', 4),
(14, 11, '3', '2024', '2024-03-21 13:24:17', 5),
(15, 11, '3', '2024', '2024-03-21 13:25:14', 4000),
(16, 11, '3', '2024', '2024-03-21 13:25:14', 5000),
(17, 11, '3', '2024', '2024-03-21 13:44:53', 4000),
(18, 11, '3', '2024', '2024-03-21 13:45:27', 4000),
(19, 11, '3', '2024', '2024-03-21 13:53:22', 5000),
(20, 11, '3', '2024', '2024-03-21 14:36:26', 6000),
(21, 10, '3', '2024', '2024-03-21 14:36:26', 75700),
(22, 11, '3', '2024', '2024-03-21 14:43:32', 5000),
(23, 10, '3', '2024', '2024-03-21 14:43:41', 3483),
(24, 11, '3', '2024', '2024-03-21 15:09:35', 34344),
(25, 10, '3', '2024', '2024-03-21 15:12:31', 343434),
(26, 10, '3', '2024', '2024-03-21 15:13:18', 34344);

-- --------------------------------------------------------

--
-- Table structure for table `monthly_utilities`
--

CREATE TABLE `monthly_utilities` (
  `id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monthly_utilities`
--

INSERT INTO `monthly_utilities` (`id`, `tenant_id`, `amount`, `month`, `year`, `time`) VALUES
(1, 11, 232, '2', '2024', '2024-03-15 13:14:50'),
(2, 11, 3233, '3', '2024', '2024-03-15 15:33:50'),
(3, 11, 3000, '3', '2024', '2024-03-20 09:43:45'),
(4, 11, 300, '3', '2024', '2024-03-26 07:37:46'),
(5, 11, 5, '3', '2024', '2024-03-26 07:37:46'),
(6, 10, 848, '3', '2024', '2024-03-26 07:37:46'),
(7, 11, 4, '3', '2024', '2024-03-26 07:37:46'),
(8, 10, 3, '3', '2024', '2024-03-26 07:37:46'),
(9, 11, 3, '3', '2024', '2024-03-26 07:37:46'),
(10, 10, 3, '3', '2024', '2024-03-26 07:37:46'),
(11, 10, 3, '3', '2024', '2024-03-26 07:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `type_payment` enum('cash','cheque','bank_transfer') NOT NULL,
  `cheque_no` varchar(50) DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `buyer_id` int(11) NOT NULL,
  `paid` enum('Yes','No') NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `amount`, `type_payment`, `cheque_no`, `bank_name`, `buyer_id`, `paid`, `date`) VALUES
(4, 600000, 'cash', '', '', 6, 'Yes', '2024-01-05 10:19:13'),
(5, 800000, 'cash', '', '', 7, 'Yes', '2024-01-05 10:22:27'),
(6, 90000, 'cash', '', '', 8, 'Yes', '2024-01-05 10:32:24'),
(7, 800000, 'cash', '', '', 9, 'Yes', '2024-01-05 10:34:12'),
(8, 900000, 'cash', '', '', 10, 'Yes', '2024-01-05 10:35:55'),
(9, 100000, 'cash', '', '', 11, 'Yes', '2024-01-05 10:41:50'),
(10, 1500000, 'cash', '', '', 14, 'Yes', '2024-01-06 14:56:11'),
(12, 1500000, 'cash', '', '', 16, 'Yes', '2024-01-09 07:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `pending_transactions`
--

CREATE TABLE `pending_transactions` (
  `id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `transaction_type` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `landlord_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `active_status` enum('active','inactive') DEFAULT NULL,
  `number_of_units` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `name`, `location`, `landlord_id`, `type_id`, `active_status`, `number_of_units`) VALUES
(4, 'dishon', 'wote', 4, 2, 'inactive', NULL),
(5, 'Kilo Apartments', 'Kitengela', 6, 1, 'active', NULL),
(6, 'Kahska', 'Kabete', 5, 5, 'active', NULL),
(7, 'Kitale Flats', 'Kitale', 5, 3, 'inactive', NULL),
(8, 'Irman House', 'Kitengela', 8, 1, 'active', NULL),
(9, 'Cemak', 'Kitengela', 8, 1, 'active', NULL),
(11, 'eagles', 'roadblock', 11, 1, 'active', NULL),
(12, 'Naivas', 'Kitengela', 12, 1, 'active', NULL),
(13, 'Quickmatt', 'Kitengela', 12, 1, 'active', NULL),
(14, 'Olloooosl', 'Noonkopir', 7, 1, 'active', NULL),
(15, 'Montevideo', 'Skyline', 18, 1, 'active', NULL),
(17, 'Baraka apartments', 'Kitengela', 20, 1, 'active', NULL),
(18, 'Crystal Building', 'Kisaju', 21, 1, 'active', NULL),
(19, 'Modern Center', 'Kitengela', 22, 1, 'active', NULL),
(20, 'Sheila Apartments', 'Athi River', 22, 1, 'active', NULL),
(21, 'Kanjiru Gardens', 'Kiambu', 22, 1, 'active', NULL),
(22, 'Promoters Heaven', 'Kisaju', 22, 2, 'active', NULL),
(23, 'Goshen Gardens', 'Kimau', 22, 2, 'active', NULL),
(24, 'Kilondu', 'Kitengela', 22, 4, 'active', NULL),
(25, 'Atori Apartments', 'Korompoi', 21, 1, 'active', NULL),
(26, 'Briannnna', 'Westlands', 21, 2, 'active', NULL),
(27, 'Marion Heigths', 'Mlolongo', 21, 1, 'active', NULL),
(28, 'Kirwa', 'Kisaju', 21, 1, 'active', NULL),
(29, 'Shirzz', 'Irman', 21, 1, 'active', NULL),
(30, 'Kalonje', 'Utawala', 21, 1, 'active', NULL),
(33, 'Chichi', 'Kitale', 25, 1, 'active', NULL),
(34, 'Montevideo', 'Kitengela', 25, 1, NULL, NULL),
(35, 'Tena Hse', 'Kyangombe', 26, 1, 'active', NULL),
(36, 'Kajiado', 'Kitengela', 27, 1, 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_sale`
--

CREATE TABLE `property_sale` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `landlord_id` int(11) NOT NULL,
  `no_of_units` int(11) NOT NULL DEFAULT '0',
  `location` varchar(50) NOT NULL,
  `image` mediumblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_sale`
--

INSERT INTO `property_sale` (`id`, `name`, `landlord_id`, `no_of_units`, `location`, `image`) VALUES
(1, 'Dykan', 5, 1, 'Kisaju', ''),
(2, 'lichen', 8, 3, 'kitengela', ''),
(3, 'steelfarm', 6, 2, 'Athi River', ''),
(4, 'Irman', 6, 1, 'Athi River', 0x6c616e64322e6a706567),
(5, 'Kimas', 5, 2, 'Kitengela', ''),
(6, 'Trokas', 7, 3, 'Mlolongo', ''),
(7, 'KAG', 12, 4, 'Korompoi', ''),
(8, 'Kisaju', 20, 2, 'Kitengela', ''),
(9, 'Kimalat', 21, 1, 'Kitengela', ''),
(10, 'Skylar', 21, 2, 'Athi River', 0x647261676f6e2e6a7067),
(11, 'Beuland', 22, 2, 'Kitengela', ''),
(12, 'JonJon', 25, 0, 'kitengela', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE `property_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`id`, `name`) VALUES
(1, 'flat'),
(2, 'mansion'),
(3, 'bungalow'),
(4, 'villa'),
(5, 'townhouse');

-- --------------------------------------------------------

--
-- Table structure for table `rent_receivable`
--

CREATE TABLE `rent_receivable` (
  `id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rent_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent_receivable`
--

INSERT INTO `rent_receivable` (`id`, `tenant_id`, `month`, `year`, `time`, `rent_amount`) VALUES
(9, 11, '3', '2024', '2024-03-04 14:20:06', 3434),
(10, 10, '3', '2024', '2024-03-04 14:20:06', 232424),
(11, 11, '3', '2024', '2024-03-06 05:47:06', 30000),
(12, 10, '3', '2024', '2024-03-06 05:47:06', 4000),
(13, 11, '6', '2024', '2024-06-26 15:26:42', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `booked` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`id`, `name`, `email`, `mobile`, `unit_id`, `date`, `booked`) VALUES
(6, 'Charles', 'charlie@gmail.com', '0383939', 6, '2023-12-13 10:37:32', 'Yes'),
(7, 'Gregory', 'greg@gmail.com', '08484848', 7, '2023-12-15 07:05:44', 'Yes'),
(8, 'Zeu Matan', 'zeu@gmail.com', '07555555', 5, '2024-01-05 10:28:09', 'Yes'),
(9, 'Kionzo kionzo', 'kionzo@gmail.com', '0766666', 4, '2024-01-05 10:33:57', 'Yes'),
(10, 'Jenepha', 'jen@gmail.com', '0711111', 9, '2024-01-05 10:35:44', 'Yes'),
(11, 'Kimeu Kimatu', 'kimeu@gmail.com', '09999999', 10, '2024-01-05 10:41:30', 'Yes'),
(14, 'Jenepha Gesare', 'jen@gmail.com', '0733333', 11, '2024-01-06 14:55:36', 'Yes'),
(16, 'Wycliffe', 'wyc@gmail.com', '07888888', 13, '2024-01-09 07:37:44', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mpesa`
--

CREATE TABLE `tbl_mpesa` (
  `mp_id` int(11) NOT NULL,
  `mp_name` varchar(200) NOT NULL,
  `TransactionType` varchar(50) NOT NULL,
  `TransID` varchar(50) NOT NULL,
  `TransTime` varchar(50) NOT NULL,
  `TransAmount` varchar(20) NOT NULL,
  `ShortCode` varchar(20) NOT NULL,
  `BillRefNumber` varchar(50) NOT NULL,
  `InvoiceNumber` varchar(50) DEFAULT NULL,
  `ThirdPartyTransID` varchar(50) DEFAULT NULL,
  `MSISDN` varchar(50) NOT NULL,
  `mp_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `auth_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mpesa`
--

INSERT INTO `tbl_mpesa` (`mp_id`, `mp_name`, `TransactionType`, `TransID`, `TransTime`, `TransAmount`, `ShortCode`, `BillRefNumber`, `InvoiceNumber`, `ThirdPartyTransID`, `MSISDN`, `mp_date`, `auth_id`) VALUES
(203, 'JACKSON', 'Pay Bill', 'SD93M8PEY5', '20240409110859', '1', '4115729', 'REG0742753579', '', '', '2547 ***** 573', '2024-04-11 07:13:54', 0),
(204, 'JACKSON', 'Pay Bill', 'SD93M8PEY5', '20240409110859', '1', '4115729', 'REG0742753578', '', '', '2547 ***** 573', '2024-04-11 07:14:09', 0),
(205, 'JACKSON', 'Pay Bill', 'SD93M8PEY5', '20240409110859', '1', '4115729', '0742753573', '', '', '2547 ***** 573', '2024-04-23 07:16:33', 0),
(206, 'JACKSON', 'Pay Bill', 'SD93M8PEY5', '20240409110859', '1', '4115729', '0742753573', '', '', '2547 ***** 573', '2024-04-23 07:17:07', 0),
(207, 'JACKSON', 'Pay Bill', 'SD93M8PEY5', '20240409110859', '1', '4115729', '0742753573', '', '', '2547 ***** 573', '2024-04-23 07:17:57', 0),
(208, 'JACKSON', 'Pay Bill', 'SD93M8PEY5', '20240409110859', '1', '4115729', '0742753573', '', '', '2547 ***** 573', '2024-04-23 07:18:03', 0),
(209, 'JACKSON', 'Pay Bill', 'SD93M8PEY5', '20240409110859', '1', '4115729', '0742753573', '', '', '2547 ***** 573', '2024-04-23 07:18:26', 0),
(210, 'JACKSON', 'Pay Bill', 'SD93M8PEY5', '20240409110859', '1', '4115729', '0742753573', '', '', '2547 ***** 573', '2024-04-24 12:36:31', 0),
(211, 'JACKSON', 'Pay Bill', 'SD93M8PEY5', '20240409110859', '1', '4115729', '0742753573', '', '', '2547 ***** 573', '2024-04-24 12:37:02', 0),
(212, 'JACKSON', 'Pay Bill', 'SD93M8PEY5', '20240409110859', '1', '4115729', '0742753573', '', '', '2547 ***** 573', '2024-04-24 12:37:17', 0),
(213, 'JACKSON', 'Pay Bill', 'SD93M8PEY5', '20240409110859', '1111', '4115729', '0742753573', '', '', '2547 ***** 573', '2024-04-24 12:37:33', 0),
(214, 'JACKSON', 'Pay Bill', 'SD93M8PEY5', '20240409110859', '1111', '4115729', '0742753573', '', '', '2547 ***** 573', '2024-05-20 10:24:39', 0),
(215, 'JACKSON', 'Pay Bill', 'SD93M8PEY5', '20240409110859', '1111', '4115729', '0742753573', '', '', '2547 ***** 573', '2024-05-20 10:30:13', 0),
(216, 'JACKSON', 'Pay Bill', 'SD93M8PEY5', '20240409110859', '1111', '4115729', '0759580403', '', '', '2547 ***** 573', '2024-05-20 10:31:05', 0),
(217, 'JACKSON', 'Pay Bill', 'SD93M8PEY5', '20240409110859', '22', '4115729', '0742753573', '', '', '2547 ***** 573', '2024-07-25 07:40:37', 0),
(218, 'JACKSON', 'Pay Bill', 'SD93M8PEY5', '20240409110859', '22.00', '4115729', '0742753573', '', '', '2547 ***** 573', '2024-07-25 07:54:37', 0),
(219, 'JACKSON', 'Pay Bill', 'SGR0YTI9TQ', '20240727083932', '1.00', '919616', '0742753573', '', '', 'fbf24461c9d1166b3304a6907a328ad12f71e1ec24ffe99a47', '2024-07-27 05:39:33', 0),
(220, 'KEVIN', 'Pay Bill', 'SH22NEHK2G', '20240802092819', '1.00', '919616', '0721819488', '', '', '07b61bdd456f1390e5d139d26ec9e7cc39f00b2f25684adf8b', '2024-08-02 06:28:21', 0),
(221, 'JACKSON', 'Pay Bill', 'SH25ORO8P7', '20240802152319', '1.00', '919616', '0742753573', '', '', 'fbf24461c9d1166b3304a6907a328ad12f71e1ec24ffe99a47', '2024-08-02 12:23:21', 0),
(222, 'JACKSON', 'Pay Bill', 'SH21OS1L3J', '20240802152559', '1.00', '919616', '0742753573', '', '', 'fbf24461c9d1166b3304a6907a328ad12f71e1ec24ffe99a47', '2024-08-02 12:26:00', 0),
(223, 'PETER', 'Pay Bill', 'SH5623SA80', '20240805165401', '10.00', '919616', '0722522258', '', '', 'fb4e98f9d5eb2bf39a9c9fb1be600bc0877294164659096398', '2024-08-05 13:54:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `id_number` varchar(20) NOT NULL,
  `property_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `tenant_status` enum('unassigned','assigned') NOT NULL,
  `tenant_contract` enum('rent','lease','hire') NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `name`, `email`, `phone_number`, `id_number`, `property_id`, `unit_id`, `tenant_status`, `tenant_contract`, `date`) VALUES
(4, 'Kimanxo manid', 'manid@gmail.con', '04844949', '99444', 5, 13, 'assigned', 'rent', NULL),
(5, 'Jakckck Njototo', 'njo@gaild.com', '07474442', '4848844', 7, 18, 'assigned', 'rent', NULL),
(6, 'Hileayt kjkeid', 'kskj@gmail.com', '0748484484', '66747', 6, 14, 'assigned', 'rent', NULL),
(7, 'kirangks kdkkdjjd', 'jdjd@gmail.com', '0746446464', '8484848', 5, 17, 'unassigned', 'rent', NULL),
(8, 'Kimolo omolo', 'om@dkd.com', '04049', '8484848', 6, 14, '', 'rent', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tenants_two`
--

CREATE TABLE `tenants_two` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `id_number` varchar(20) NOT NULL,
  `contract` enum('rent','lease','hire') DEFAULT NULL,
  `tenant_status` enum('unassigned','assigned') NOT NULL,
  `property_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `billing_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenants_two`
--

INSERT INTO `tenants_two` (`id`, `name`, `email`, `phone_number`, `id_number`, `contract`, `tenant_status`, `property_id`, `unit_id`, `billing_id`) VALUES
(5, 'Greg Omondi', 'omondi@gmail.com', '08474747', '84848', 'rent', 'assigned', 8, 16, NULL),
(6, 'Karanja Kimani', 'karan@gmail.com', '07353535', '847474', 'rent', 'unassigned', NULL, NULL, NULL),
(7, 'Neema Nanyama', 'neema@gmail.com', '0742273727', '334734', 'rent', 'unassigned', NULL, NULL, NULL),
(8, 'Margaret Kitambo', 'kitambo@gmail.com', '07423838383', '99939', 'rent', 'unassigned', NULL, NULL, NULL),
(9, 'kevin kevin', 'kevin@gmail.com', '0303003', '00303', 'rent', 'unassigned', NULL, NULL, NULL),
(10, 'Joseph Ngugi', 'ngugi@gmail.com', '07333333', '444444', 'rent', 'assigned', 8, 16, NULL),
(11, 'Kalonzo Mwale', 'mwale@gmail.com', '07363636', '44646', 'rent', 'assigned', 4, 9, NULL),
(12, 'Charles Ninja', 'ninja@gmail.com', '0377477474', '77474', NULL, 'unassigned', NULL, NULL, NULL),
(13, 'Sidian Kimatu', 'kimatu@gmail.com', '2452523325', '22353', 'rent', 'unassigned', NULL, NULL, NULL),
(14, 'Gregory Omonci', 'omondi@gmail.com', '0734343', '535335', 'rent', 'assigned', 11, 33, NULL),
(15, 'eueeueue eueueu', 'ee@gmail.com', '049848', '84848', 'rent', 'assigned', 12, 37, NULL),
(16, 'Rae Sremmurd', '0999999', 'drum@gmail.com', '99999', NULL, 'unassigned', NULL, NULL, NULL),
(17, 'Jon Jon', '000000', 'jon@gmail.com', '88888', NULL, 'unassigned', NULL, NULL, NULL),
(18, 'John Kimani', '078888888', 'ian@gmail.com', '775745', 'rent', 'unassigned', NULL, NULL, NULL),
(19, 'Joel Mutanu', '0733333', 'mutanu@gmail.com', '3676766', 'rent', 'unassigned', NULL, NULL, NULL),
(20, 'Titus Omolo', '07555555', 'omosh@gmail.com', '4424223', 'rent', 'assigned', 19, 51, NULL),
(21, 'Kevin Ochwangi', 'test@gmail.com', '0721819488', '754555521', NULL, 'unassigned', NULL, NULL, NULL),
(22, 'Jackson Njung\'e', '123@mail.com', '0742753573', '36760735', 'rent', 'assigned', 36, 54, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tenant _assign`
--

CREATE TABLE `tenant _assign` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tenant_auth`
--

CREATE TABLE `tenant_auth` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenant_auth`
--

INSERT INTO `tenant_auth` (`id`, `role`, `user_name`, `user_password`, `created_at`) VALUES
(1, 'tenant', 'David Kiamba', '$2y$10$3N2DXpbiU5zujKK0CT7UN.kHOkvzeE9qDruvBnt5RcxeBtjrmEPE6', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `unaitas`
--

CREATE TABLE `unaitas` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `unit_name` varchar(40) NOT NULL,
  `unit_number` varchar(40) NOT NULL,
  `description` varchar(255) NOT NULL,
  `available` varchar(40) NOT NULL,
  `reserved` varchar(40) NOT NULL,
  `occupied` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `unit_number` varchar(20) NOT NULL,
  `floor_number` int(11) NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `balconies` int(11) NOT NULL,
  `commission` varchar(50) NOT NULL,
  `rent` varchar(50) NOT NULL,
  `deposit` varchar(50) NOT NULL,
  `available` enum('Yes','No') NOT NULL,
  `reserved` enum('Yes','No') NOT NULL,
  `is_occupied` enum('Yes','No') NOT NULL,
  `availability_date` date NOT NULL,
  `unit_description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `property_id`, `name`, `unit_number`, `floor_number`, `bedrooms`, `bathrooms`, `balconies`, `commission`, `rent`, `deposit`, `available`, `reserved`, `is_occupied`, `availability_date`, `unit_description`) VALUES
(10, 5, '', '0025', 0, 3, 2, 2, '5700', '65000', '5200', 'No', 'Yes', 'Yes', '2023-12-08', ''),
(13, 7, '', '1', 0, 1, 1, 1, '32432', '4332', '2431', 'No', 'Yes', 'Yes', '2023-11-23', ''),
(14, 6, '', '1', 0, 1, 1, 1, '334', '43', '434', 'Yes', 'Yes', 'Yes', '2023-11-30', ''),
(16, 6, '', '1', 0, 1, 1, 1, '25555', '62', '584', 'Yes', 'No', 'Yes', '2023-11-30', ''),
(17, 6, '', '1', 0, 11, 1, 1, '561321', '321', '212', 'No', 'No', 'Yes', '2023-11-30', ''),
(18, 6, '', '5', 0, 5, 5, 5, '4654', '6456', '554', 'Yes', 'No', 'No', '2023-11-30', ''),
(32, 8, 'mit59', '59', 0, 1, 1, 1, '3434', '343', '43', 'Yes', 'No', 'No', '2023-11-25', ''),
(33, 8, 'clsa89', '34', 0, 1, 1, 1, '343', '3434', '433', 'No', 'No', 'Yes', '2023-11-30', ''),
(34, 7, 'moji', '1', 0, 2, 22, 2, '225', '555', '55', 'No', 'No', 'Yes', '0000-00-00', ''),
(35, 7, 'look', '9', 0, 3, 2, 2, '54454', '545', '5454', 'No', 'Yes', 'No', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `units_sale`
--

CREATE TABLE `units_sale` (
  `id` int(11) NOT NULL,
  `property_sale_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `commission` int(11) NOT NULL,
  `deposit` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `booked` enum('No','Yes') NOT NULL DEFAULT 'No',
  `sold` enum('No','Yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units_sale`
--

INSERT INTO `units_sale` (`id`, `property_sale_id`, `name`, `description`, `commission`, `deposit`, `price`, `booked`, `sold`) VALUES
(1, 2, 'A1', '', 353333, 35353, 5323532, 'No', 'No'),
(2, 4, 'A059', '50*100', 2323, 434234, 434343, 'No', 'No'),
(3, 2, 'A02', '', 5345, 545, 454, 'No', 'No'),
(4, 3, 'B01', '', 3333, 535355, 53533533, 'No', 'Yes'),
(5, 5, 'z01', '', 8888, 8888, 8888, 'Yes', 'No'),
(6, 6, 'Mit59', '', 433, 4343, 43343, 'Yes', 'Yes'),
(7, 7, 'A03', '50*100', 8, 8, 7788, 'Yes', 'No'),
(8, 6, 'J7', '50*100', 3434, 353, 600000, 'No', 'No'),
(9, 7, 'Mile', '1 acre', 34434, 53433, 900000, 'Yes', 'Yes'),
(10, 7, 'B5', '50*100', 23243, 324, 100000, 'Yes', 'Yes'),
(11, 8, 'Q9', '50*100', 6000, 70000, 1500000, 'Yes', 'Yes'),
(12, 10, 'H6', '1/8 acre', 3000, 140000, 1600000, 'No', 'No'),
(13, 11, '131682', '50*100\r\n', 3000, 4004, 1500000, 'Yes', 'Yes'),
(14, 2, 'AQ11', '50*100', 232, 333, 442222, 'No', 'No');

--
-- Triggers `units_sale`
--
DELIMITER $$
CREATE TRIGGER `after_unit_delete` AFTER DELETE ON `units_sale` FOR EACH ROW BEGIN
    UPDATE property_sale
    SET no_of_units = no_of_units - 1
    WHERE id = OLD.property_sale_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_unit_insert` AFTER INSERT ON `units_sale` FOR EACH ROW BEGIN
    UPDATE property_sale
    SET no_of_units = no_of_units + 1
    WHERE id = NEW.property_sale_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `units_two`
--

CREATE TABLE `units_two` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `unit_name` varchar(50) NOT NULL,
  `unit_number` varchar(20) DEFAULT NULL,
  `description` varchar(2000) NOT NULL,
  `available` enum('No','Yes') NOT NULL,
  `reserved` enum('No','Yes') NOT NULL,
  `occupied` enum('No','Yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units_two`
--

INSERT INTO `units_two` (`id`, `property_id`, `unit_name`, `unit_number`, `description`, `available`, `reserved`, `occupied`) VALUES
(2, 6, 'shop', '001', '3500 sq ft', 'No', 'No', 'Yes'),
(4, 4, 'mit', '059', '', 'No', 'No', 'Yes'),
(7, 6, 'kaka', '048', '', 'Yes', 'No', 'No'),
(9, 4, 'est', '007', '', 'No', 'No', 'Yes'),
(10, 4, 'wst', '008', '', 'Yes', 'No', 'No'),
(15, 8, 'free', '005', '', 'Yes', 'No', 'No'),
(16, 8, 'salon', '002', '', 'No', 'No', 'Yes'),
(19, 9, 'g01', '001', '', 'Yes', 'No', 'No'),
(29, 5, 'a1', '099', '', 'No', 'No', 'Yes'),
(30, 8, 'shiran', '058', '', 'Yes', 'No', 'No'),
(33, 11, 'shop', '008', '', 'No', 'No', 'Yes'),
(37, 12, 'Q01', '004', 'shop', 'No', 'No', 'Yes'),
(40, 13, 'D02', '002', '', 'Yes', 'No', 'No'),
(42, 14, 'shop', '009', '', 'Yes', 'No', 'No'),
(43, 17, 'Shop', '001', '', 'Yes', 'No', 'No'),
(50, 18, 'stall ', '009', '100 sq ft', 'Yes', 'No', 'No'),
(51, 19, 'Beula', '001', '1200 sq ft', 'No', 'No', 'Yes'),
(52, 33, 'Floor shop', '001', '', 'Yes', 'No', 'No'),
(53, 35, 'Unit 1', '001', '', 'Yes', 'No', 'No'),
(54, 36, '001', '001', '', 'No', 'No', 'Yes'),
(55, 36, '002', '002', '', 'Yes', 'No', 'No'),
(56, 36, '003', '003', '', 'Yes', 'No', 'No'),
(57, 36, '004', '004', '', 'Yes', 'No', 'No'),
(58, 36, '005', '005', '', 'Yes', 'No', 'No'),
(59, 36, '006', '006', '', 'Yes', 'No', 'No'),
(60, 36, '007', '007', '', 'Yes', 'No', 'No');

--
-- Triggers `units_two`
--
DELIMITER $$
CREATE TRIGGER `after_units_delete` AFTER DELETE ON `units_two` FOR EACH ROW BEGIN
    UPDATE properties
    SET number_of_units = number_of_units - 1
    WHERE id = OLD.property_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_units_insert` AFTER INSERT ON `units_two` FOR EACH ROW BEGIN
    UPDATE properties
    SET number_of_units = number_of_units + 1
    WHERE id = NEW.property_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` enum('admin','user','tenant','staff','super') NOT NULL,
  `name` varchar(30) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `user_name`, `user_email`, `user_password`, `user_mobile`) VALUES
(1, 'user', '', 'debbie', 'jack@gmail.com', '$2y$10$PtNf0Xw.1PGrGGHQIDB0kOU7ksVGo4OPSDZ5LrHXN5p6DRL6V0WCi', ''),
(7, 'user', '', 'Greg', 'greg@gmail.com', '1234', ''),
(8, 'admin', '', 'Peter', 'peter@gmail.com', '12345', ''),
(9, 'admin', '', 'John', 'john@gmail.com', '12345', ''),
(10, 'user', '', 'Kanya', 'kanya@gmail.com', '$2y$10$8L0A91TPjeVaBlsGnFIjN.joipTr9Y/nljCCx2/17RU', ''),
(11, 'user', '', 'James', 'jamie@gmail.com', '12345', ''),
(12, 'user', '', 'Charles', 'charlie@gmail.com', '1234', ''),
(13, 'user', '', 'Ian', 'ian@gmail.com', '1234', ''),
(14, 'super', '', 'Jack', 'jack@gmail.com', '123456', ''),
(17, 'admin', 'Jackson', 'Jackson', 'jack@example.com', '$2y$10$6rAjihayx0rN58OqHHH8QOO0g68Jd50eHFdN6Qo2357cDoB50b5O2', ''),
(18, 'user', '', 'Faith', 'faith@example.com', '$2y$10$qvA0TUvPQQ3x26UAoMm/ru0gbqy9dt8OwB3wdRJlsui6/.W3DXVRy', ''),
(19, 'admin', 'Peter Chumo', 'chumo', 'chumzp@gmail.com', '$2y$10$PmWqBNeUlD5AWtZmSZZRXOHX8vkYxkVbGdggEiKjqMrSiboCaX6wm', ''),
(20, '', 'Rockland', 'rockland', 'exmapl@gmail.com', '$2y$10$RMBnvLeu2/ZFwzFfY99wROmJ9f3.pcxfASSj.LxSM8beBv1LCLnVu', '0724306770'),
(21, 'tenant', 'Jackson Njung\'e', 'jacksonnjung\'e', '123@mail.com', '$2y$10$e2v/ERR8r7KYa62FOk48m.WeISXGMwRQW.9WC8Wql.GeUu2rs3e0q', '0742753573');

-- --------------------------------------------------------

--
-- Table structure for table `utilities`
--

CREATE TABLE `utilities` (
  `id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilities`
--

INSERT INTO `utilities` (`id`, `tenant_id`, `amount`, `month`, `year`, `time`) VALUES
(1, 11, 3434, '3', '2024', '2024-03-04 14:20:06'),
(2, 10, 2323, '3', '2024', '2024-03-04 14:20:06'),
(3, 11, 23323, '3', '2024', '2024-03-06 05:47:06'),
(4, 10, 3434, '3', '2024', '2024-03-06 05:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `vacate`
--

CREATE TABLE `vacate` (
  `id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  `comment` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vacate`
--

INSERT INTO `vacate` (`id`, `tenant_id`, `unit_id`, `property_id`, `comment`, `date`) VALUES
(1, 5, 19, 9, '', '2023-12-08 13:34:58'),
(2, 7, NULL, NULL, 'hhhdhdhd', '2024-01-04 07:50:01'),
(3, 6, NULL, NULL, 'lllllll', '2024-01-04 07:50:21'),
(4, 8, NULL, NULL, 'sfsfdfdfsdf', '2024-01-04 10:38:51'),
(5, 7, NULL, NULL, 'theft', '2024-01-05 12:09:26'),
(6, 18, NULL, NULL, 'theft', '2024-01-06 14:49:17'),
(7, 19, NULL, NULL, 'theft', '2024-01-08 09:22:57'),
(8, 5, NULL, NULL, 'Theft of Property', '2024-06-08 13:49:55'),
(9, 5, NULL, NULL, 'Theft of Property', '2024-06-08 13:51:11'),
(10, 5, NULL, NULL, 'Theft of Property', '2024-06-08 13:54:09');

-- --------------------------------------------------------

--
-- Table structure for table `verify_otp`
--

CREATE TABLE `verify_otp` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `otp` longtext NOT NULL,
  `expiry` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verify_otp`
--

INSERT INTO `verify_otp` (`id`, `username`, `otp`, `expiry`) VALUES
(1, 'Jackson', '$2y$10$QF0gjMdE7ADyDRaEqmdKOOM0t5n/ChT8FwNack5i8mvJ1iFHeHMl2', '1723470704'),
(2, 'Jackson', '$2y$10$7LT93pvU8KFawWJ2QI/zbul35V5eN3lbQeMSuKJ9yykaJOwKyL8FS', '1723471634'),
(3, 'Jackson', '$2y$10$Ze0wZqf9iK7m1pkzLGEb8OXKA4yFY4u5GjBT/xJE1RUQmsxG17nXi', '1723546185'),
(4, 'Jackson', '$2y$10$jPbvdlzMeqzhbHfP5ueRC.M.LDYFxBw0RIeSAmF9/xmc1/z4P.0cq', '1723546593');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billing_ibfk_3` (`unit_id`);

--
-- Indexes for table `billing_two`
--
ALTER TABLE `billing_two`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chart_of_accounts`
--
ALTER TABLE `chart_of_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices_two`
--
ALTER TABLE `invoices_two`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenant_id` (`tenant_id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `landlords`
--
ALTER TABLE `landlords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_rent`
--
ALTER TABLE `monthly_rent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenant_id` (`tenant_id`);

--
-- Indexes for table `monthly_utilities`
--
ALTER TABLE `monthly_utilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenant_id` (`tenant_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buyer_id` (`buyer_id`);

--
-- Indexes for table `pending_transactions`
--
ALTER TABLE `pending_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `landlord_id` (`landlord_id`);

--
-- Indexes for table `property_sale`
--
ALTER TABLE `property_sale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `landlord_id` (`landlord_id`);

--
-- Indexes for table `property_types`
--
ALTER TABLE `property_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent_receivable`
--
ALTER TABLE `rent_receivable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenant_id` (`tenant_id`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `tbl_mpesa`
--
ALTER TABLE `tbl_mpesa`
  ADD PRIMARY KEY (`mp_id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id_ten` (`property_id`),
  ADD KEY `unit_id_ten` (`unit_id`);

--
-- Indexes for table `tenants_two`
--
ALTER TABLE `tenants_two`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `tenants_two_ibfk_3` (`billing_id`);

--
-- Indexes for table `tenant _assign`
--
ALTER TABLE `tenant _assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenant_auth`
--
ALTER TABLE `tenant_auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unaitas`
--
ALTER TABLE `unaitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `units_sale`
--
ALTER TABLE `units_sale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_sale_id` (`property_sale_id`);

--
-- Indexes for table `units_two`
--
ALTER TABLE `units_two`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `utilities`
--
ALTER TABLE `utilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenant_id` (`tenant_id`);

--
-- Indexes for table `vacate`
--
ALTER TABLE `vacate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `tenant_id` (`tenant_id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `verify_otp`
--
ALTER TABLE `verify_otp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billing_two`
--
ALTER TABLE `billing_two`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `chart_of_accounts`
--
ALTER TABLE `chart_of_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `invoices_two`
--
ALTER TABLE `invoices_two`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `landlords`
--
ALTER TABLE `landlords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `monthly_rent`
--
ALTER TABLE `monthly_rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `monthly_utilities`
--
ALTER TABLE `monthly_utilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pending_transactions`
--
ALTER TABLE `pending_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `property_sale`
--
ALTER TABLE `property_sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rent_receivable`
--
ALTER TABLE `rent_receivable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_mpesa`
--
ALTER TABLE `tbl_mpesa`
  MODIFY `mp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tenants_two`
--
ALTER TABLE `tenants_two`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tenant _assign`
--
ALTER TABLE `tenant _assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tenant_auth`
--
ALTER TABLE `tenant_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unaitas`
--
ALTER TABLE `unaitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `units_sale`
--
ALTER TABLE `units_sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `units_two`
--
ALTER TABLE `units_two`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `utilities`
--
ALTER TABLE `utilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vacate`
--
ALTER TABLE `vacate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `verify_otp`
--
ALTER TABLE `verify_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`),
  ADD CONSTRAINT `billing_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `units_two` (`id`),
  ADD CONSTRAINT `billing_ibfk_3` FOREIGN KEY (`unit_id`) REFERENCES `units_two` (`id`);

--
-- Constraints for table `invoices_two`
--
ALTER TABLE `invoices_two`
  ADD CONSTRAINT `invoices_two_ibfk_1` FOREIGN KEY (`tenant_id`) REFERENCES `tenants_two` (`id`),
  ADD CONSTRAINT `invoices_two_ibfk_2` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `invoices_two_ibfk_3` FOREIGN KEY (`unit_id`) REFERENCES `units_two` (`id`);

--
-- Constraints for table `monthly_rent`
--
ALTER TABLE `monthly_rent`
  ADD CONSTRAINT `monthly_rent_ibfk_1` FOREIGN KEY (`tenant_id`) REFERENCES `tenants_two` (`id`);

--
-- Constraints for table `monthly_utilities`
--
ALTER TABLE `monthly_utilities`
  ADD CONSTRAINT `monthly_utilities_ibfk_1` FOREIGN KEY (`tenant_id`) REFERENCES `tenants_two` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `sell` (`id`);

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_ibfk_1` FOREIGN KEY (`landlord_id`) REFERENCES `landlords` (`id`),
  ADD CONSTRAINT `properties_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `property_types` (`id`),
  ADD CONSTRAINT `properties_ibfk_3` FOREIGN KEY (`landlord_id`) REFERENCES `landlords` (`id`);

--
-- Constraints for table `property_sale`
--
ALTER TABLE `property_sale`
  ADD CONSTRAINT `property_sale_ibfk_1` FOREIGN KEY (`landlord_id`) REFERENCES `landlords` (`id`);

--
-- Constraints for table `rent_receivable`
--
ALTER TABLE `rent_receivable`
  ADD CONSTRAINT `rent_receivable_ibfk_1` FOREIGN KEY (`tenant_id`) REFERENCES `tenants_two` (`id`);

--
-- Constraints for table `sell`
--
ALTER TABLE `sell`
  ADD CONSTRAINT `sell_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `units_sale` (`id`);

--
-- Constraints for table `tenants`
--
ALTER TABLE `tenants`
  ADD CONSTRAINT `tenants_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `tenants_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);

--
-- Constraints for table `tenants_two`
--
ALTER TABLE `tenants_two`
  ADD CONSTRAINT `tenants_two_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `tenants_two_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `units_two` (`id`),
  ADD CONSTRAINT `tenants_two_ibfk_3` FOREIGN KEY (`billing_id`) REFERENCES `billing_two` (`id`);

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `units_ibfk_2` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`);

--
-- Constraints for table `units_sale`
--
ALTER TABLE `units_sale`
  ADD CONSTRAINT `units_sale_ibfk_1` FOREIGN KEY (`property_sale_id`) REFERENCES `property_sale` (`id`),
  ADD CONSTRAINT `units_sale_ibfk_2` FOREIGN KEY (`property_sale_id`) REFERENCES `property_sale` (`id`);

--
-- Constraints for table `units_two`
--
ALTER TABLE `units_two`
  ADD CONSTRAINT `units_two_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `units_two_ibfk_2` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`);

--
-- Constraints for table `utilities`
--
ALTER TABLE `utilities`
  ADD CONSTRAINT `utilities_ibfk_1` FOREIGN KEY (`tenant_id`) REFERENCES `tenants_two` (`id`);

--
-- Constraints for table `vacate`
--
ALTER TABLE `vacate`
  ADD CONSTRAINT `vacate_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `units_two` (`id`),
  ADD CONSTRAINT `vacate_ibfk_2` FOREIGN KEY (`tenant_id`) REFERENCES `tenants_two` (`id`),
  ADD CONSTRAINT `vacate_ibfk_3` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
