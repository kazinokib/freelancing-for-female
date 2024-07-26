-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 26, 2024 at 10:36 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fff`
--

-- --------------------------------------------------------

--
-- Table structure for table `bid_details`
--

CREATE TABLE `bid_details` (
  `bid_id` int NOT NULL,
  `job_id` int NOT NULL,
  `user_id` int NOT NULL,
  `job_given_id` int NOT NULL,
  `bidding_price` int NOT NULL,
  `work_duration` int NOT NULL,
  `bidding_message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `show_notification` tinyint(1) NOT NULL DEFAULT '0',
  `bid_accepted` tinyint(1) NOT NULL DEFAULT '0',
  `job_done_freelancer` tinyint(1) NOT NULL DEFAULT '0',
  `job_done_client` tinyint(1) NOT NULL DEFAULT '0',
  `date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int NOT NULL,
  `sender_id` int NOT NULL,
  `reciever_id` int NOT NULL,
  `work_id` int NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `dict`
--

CREATE TABLE `dict` (
  `english` text NOT NULL,
  `bangla` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `gig`
--

CREATE TABLE `gig` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `gig_title` text NOT NULL,
  `city` text NOT NULL,
  `gig_category` text NOT NULL,
  `base_price_min` text NOT NULL,
  `base_price_max` int NOT NULL,
  `gig_description` text NOT NULL,
  `gig_duration` int NOT NULL,
  `gig_file` text NOT NULL,
  `accepted_gig_apply_id` int DEFAULT NULL,
  `gig_date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gig_apply`
--

CREATE TABLE `gig_apply` (
  `id` int NOT NULL,
  `gig_id` int NOT NULL,
  `user_id` int NOT NULL,
  `employee_id` int NOT NULL,
  `message` text NOT NULL,
  `proposed_duration` int NOT NULL,
  `proposed_rate` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `gig_accepted` tinyint(1) NOT NULL DEFAULT '0',
  `date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `job_title` text NOT NULL,
  `base_price_min` int NOT NULL,
  `base_price_max` int NOT NULL,
  `job_category` text NOT NULL,
  `city` text NOT NULL,
  `job_description` text NOT NULL,
  `job_file` text NOT NULL,
  `job_duration` int NOT NULL,
  `job_date` text NOT NULL,
  `job_status` tinyint(1) NOT NULL DEFAULT '0',
  `accepted_bid_id` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `job_news_update`
--

CREATE TABLE `job_news_update` (
  `id` int NOT NULL,
  `mask` text NOT NULL,
  `serial_number` int NOT NULL,
  `job_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_news_update`
--

INSERT INTO `job_news_update` (`id`, `mask`, `serial_number`, `job_id`) VALUES
(1, 'tel:A#3B439skM+An05u/Ipq/KOFc2cWhsxJXKXXnu5/TO7t933mE8bPdVsmciZlXfLLqzr3YEkbNR2nOrf0JsRHZKZPucA==', 1, 1),
(2, 'tel:A#3B439skM+An05u/Ipq/KOFc2cWhsxJXKXXnu5/TO7t933mE8bPdVsmciZlXfLLqzr3YEkbNR2nOrf0JsRHZKZPucA==', 2, 3),
(3, 'tel:A#3B439skM+An05u/Ipq/KOFc2cWhsxJXKXXnu5/TO7t933mE8bPdVsmciZlXfLLqzr3YEkbNR2nOrf0JsRHZKZPucA==', 3, 4),
(4, 'tel:A#3B439skM+An05u/Ipq/KOFc2cWhsxJXKXXnu5/TO7t933mE8bPdVsmciZlXfLLqzr3YEkbNR2nOrf0JsRHZKZPucA==', 4, 5),
(5, 'tel:A#3B439skM+An05u/Ipq/KOFc2cWhsxJXKXXnu5/TO7t933mE8bPdVsmciZlXfLLqzr3YEkbNR2nOrf0JsRHZKZPucA==', 5, 6),
(6, 'tel:A#3B439skM+An05u/Ipq/KOFc2cWhsxJXKXXnu5/TO7t933mE8bPdVsmciZlXfLLqzr3YEkbNR2nOrf0JsRHZKZPucA==', 1, 1),
(7, 'tel:A#3B439skM+An05u/Ipq/KOFc2cWhsxJXKXXnu5/TO7t933mE8bPdVsmciZlXfLLqzr3YEkbNR2nOrf0JsRHZKZPucA==', 2, 3),
(8, 'tel:A#3B439skM+An05u/Ipq/KOFc2cWhsxJXKXXnu5/TO7t933mE8bPdVsmciZlXfLLqzr3YEkbNR2nOrf0JsRHZKZPucA==', 3, 4),
(9, 'tel:A#3B439skM+An05u/Ipq/KOFc2cWhsxJXKXXnu5/TO7t933mE8bPdVsmciZlXfLLqzr3YEkbNR2nOrf0JsRHZKZPucA==', 4, 5),
(10, 'tel:A#3B439skM+An05u/Ipq/KOFc2cWhsxJXKXXnu5/TO7t933mE8bPdVsmciZlXfLLqzr3YEkbNR2nOrf0JsRHZKZPucA==', 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `job_post`
--

CREATE TABLE `job_post` (
  `id` int NOT NULL,
  `mobile` text NOT NULL,
  `description` text NOT NULL,
  `category` text NOT NULL,
  `sub_category` text NOT NULL,
  `image` text NOT NULL,
  `price` text NOT NULL,
  `location` text NOT NULL,
  `job_duration` int NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int NOT NULL,
  `rating_from` int NOT NULL,
  `rating_to` int NOT NULL,
  `job_id` int DEFAULT NULL,
  `gig_id` int DEFAULT NULL,
  `given_rating` int NOT NULL,
  `given_review` text NOT NULL,
  `rated_as` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int NOT NULL,
  `user_id` int NOT NULL,
  `job_id` int DEFAULT NULL,
  `gig_id` int DEFAULT NULL,
  `given_rating` int NOT NULL,
  `rated_as` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int NOT NULL,
  `cat_name` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `cat_image` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `cat_name`, `cat_image`) VALUES
(1, 'Felt-Baby-Booties', 'images/Felt-Baby-Booties.jpg'),
(2, 'hand-made-products', 'images/hand-made-products-business.jpg'),
(3, 'Maxres', 'images/maxresdefault.jpg'),
(4, 'NaksheKatha', 'images/NaksheKatha.jpg'),
(5, 'Ornaments', 'images/Ornaments.jpg'),
(6, 'Mini-Pallet-with-Plants', 'images/Mini-Pallet-with-Plants.jpg'),
(7, 'may_tren_dan', 'images/home.png'),
(8, 'Mini-Pallet-with-Plants', 'images/money.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `city` text NOT NULL,
  `email` text NOT NULL,
  `mobile_number` text NOT NULL,
  `password` text NOT NULL,
  `mask` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `otp` int NOT NULL,
  `rating` float DEFAULT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `account_verified` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `city`, `email`, `mobile_number`, `password`, `mask`, `otp`, `rating`, `joining_date`, `account_verified`) VALUES
(3, 'XYZ', 'chittagong', 'robi@gmail.com', '01845318601', '1234', '', 2078, 0, '2019-04-22 10:38:17', 1),
(6, 'Mir Reaz Uddin', 'Select City', 'nokibevon7@gmail.com', '01815528228', '12345', '', 8952, 0, '2019-04-22 11:25:14', 1),
(7, 'zzxc', '', 'mirreaz@gmail.com', '', '1234', '', 0, 0, '2019-04-22 13:17:17', 0),
(10, 'August Turner', 'manitoba', 'kazinokib7@gmail.com', '01845318609', '1234', NULL, 5557, NULL, '2024-07-24 16:24:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ussd_user`
--

CREATE TABLE `ussd_user` (
  `id` int NOT NULL,
  `mask` text NOT NULL,
  `mobile_number` text NOT NULL,
  `category` text,
  `step` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ussd_user`
--

INSERT INTO `ussd_user` (`id`, `mask`, `mobile_number`, `category`, `step`) VALUES
(1, 'tel:A#3B439skM+An05u/Ipq/KOFc2cWhsxJXKXXnu5/TO7t933mE8bPdVsmciZlXfLLqzr3YEkbNR2nOrf0JsRHZKZPucA==', '01845318609', 'Textile', '3.1'),
(2, 'tel:A#3B48Q2ckr00CKrg37ok5So0p3bWARMNnipt5Cs+AV2zyR5xHQSjQVVBvcGf3ltVPwd/kJlbD6EOuZCgE1Kqmof/gA==', '01815528228', 'Textile', '3.1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bid_details`
--
ALTER TABLE `bid_details`
  ADD PRIMARY KEY (`bid_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `gig`
--
ALTER TABLE `gig`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gig_apply`
--
ALTER TABLE `gig_apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_news_update`
--
ALTER TABLE `job_news_update`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_post`
--
ALTER TABLE `job_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ussd_user`
--
ALTER TABLE `ussd_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mask` (`mask`(300));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bid_details`
--
ALTER TABLE `bid_details`
  MODIFY `bid_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gig`
--
ALTER TABLE `gig`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gig_apply`
--
ALTER TABLE `gig_apply`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `job_news_update`
--
ALTER TABLE `job_news_update`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `job_post`
--
ALTER TABLE `job_post`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ussd_user`
--
ALTER TABLE `ussd_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
