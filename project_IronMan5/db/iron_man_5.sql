-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 04:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iron_man_5`
--

-- --------------------------------------------------------

--
-- Table structure for table `iron_login`
--

CREATE TABLE `iron_login` (
  `i_id` int(11) NOT NULL,
  `i_email` varchar(256) NOT NULL,
  `i_password` varchar(256) NOT NULL,
  `i_name` varchar(128) DEFAULT NULL,
  `i_address` varchar(128) DEFAULT NULL,
  `i_zip` varchar(10) DEFAULT NULL,
  `i_province` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `iron_login`
--

INSERT INTO `iron_login` (`i_id`, `i_email`, `i_password`, `i_name`, `i_address`, `i_zip`, `i_province`) VALUES
(1, 'admin@admin.org', '$2y$10$PdlE1jyxgE00.xhu3gePTukuw/cmyy5BnrVo4CapKtjooMK1fT7Y', NULL, NULL, NULL, NULL),
(2, 'user@user.org', '$2y$10$L/8TN5MyFROscWSjC1MbsOnmzjQhmIOtpLeQBb3YIDUWXqYlBNSYy', NULL, NULL, NULL, NULL),
(3, 'rey@theforce.org', '$2y$10$xaFD6I0Y8N1JL11ftf.llOj9krj5opflK4VX8ViD1JHRsg6xuYTm6', 'Rey Skywalker', '1234 Dalhousie', 'B3L2X7', 'NS'),
(4, 'yoda@theforce.org', '$2y$10$t9z3qP.kVlM9VR7i0LxmJe6QLraITUFkDsOpwaoFwAQHBAQ7t.C6O', 'Yoda yoda', '1234 Housie Dal', 'B3L2X7', 'NS');

--
-- Indexes for table `iron_login`
--
ALTER TABLE `iron_login`
  ADD PRIMARY KEY (`i_id`),
  ADD UNIQUE KEY `i_email` (`i_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iron_login`
--
ALTER TABLE `iron_login`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- --------------------------------------------------------

--
-- Table structure for table `iron_mail`
--

CREATE TABLE `iron_mail` (
  `i_mail_id` int(11) NOT NULL,
  `i_mail_recipient_email` varchar(256) NOT NULL,
  `i_mail_sender_email` varchar(256) NOT NULL,
  `i_mail_subject` varchar(256) NOT NULL,
  `i_mail_text` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `iron_mail`
--

INSERT INTO `iron_mail` (`i_mail_id`, `i_mail_recipient_email`, `i_mail_sender_email`, `i_mail_subject`, `i_mail_text`) VALUES
(1, 'admin@admin.org', 'someUser@user.org', 'Toads', 'Pellentesque facilisis sem quis diam facilisis interdum et tempor enim. Quisque elementum ante a luctus porta. Donec sollicitudin erat massa, ac fringilla leo efficitur ac. Sed bibendum erat id libero auctor, sed venenatis arcu fermentum. Morbi sed libero quis magna porta bibendum eu sed risus.'),
(2, 'admin@admin.org', 'anotherUser@user.org', 'Glass', 'Quisque a justo accumsan, semper felis ac, lobortis mauris. Proin sit amet ultrices leo, sit amet porta mauris. Nullam ullamcorper odio ligula, in rhoncus massa maximus ut.'),
(3, 'someUser@user.org', 'admin@admin.org', 'Re:Toads', 'Suspendisse condimentum placerat elit, id pulvinar libero vulputate a. Ut feugiat hendrerit metus, eu dictum arcu sagittis id. Aenean luctus luctus placerat.'),
(4, 'anotherUser@user.org', 'admin@adming.org', 'Re:Glass', 'Aenean vulputate elit vel aliquam accumsan. Sed id purus eu massa mattis imperdiet non vitae mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sodales dolor est, non feugiat neque pretium vel.'),
(5, 'admin@admin.org', 'user@user.org', 'Topic to discuss', 'Nulla ac fermentum tellus. Donec in lacinia turpis. Vestibulum vestibulum, elit ut commodo pharetra, eros orci dignissim neque, ac tempus leo dui eu sapien.'),
(6, 'admin@admin.org', 'test@test.org', 'Just a test', 'test'),
(7, 'admin@admin.org', 'test@test.org', 'Another test', 'more test'),
(8, 'test@test.org', 'admin@admin.org', 'Re:Another test', 'received'),
(9, 'admin@admin.org', 'moreUser@user.org', 'Wax Candels', 'Donec vel magna ut metus ultricies aliquam. Duis enim orci, mattis non massa sed, condimentum venenatis dolor. In id augue lorem. Vestibulum ut lectus quam. Sed imperdiet, magna ut vestibulum accumsan, urna augue tincidunt diam, elementum tempor risus arcu eu leo.'),
(10, 'admin@admin.org', 'angryUser@user.org', 'Cusomer Complaint', 'Angry Complaint of an angry customer nor satisfied with the service received'),
(11, 'angryUser@user', 'admin@admin.org', 'Re:CusomerComplaint', 'Noted');

-- --------------------------------------------------------

--
-- Table structure for table `iron_product`
--

CREATE TABLE `iron_product` (
  `i_product_id` int(11) NOT NULL,
  `i_product_name` varchar(128) NOT NULL,
  `i_product_desc` varchar(512) NOT NULL,
  `i_product_price` int(11) NOT NULL,
  `i_product_qt` int(11) NOT NULL,
  `i_product_link` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `iron_product`
--

INSERT INTO `iron_product` (`i_product_id`, `i_product_name`, `i_product_desc`, `i_product_price`, `i_product_qt`, `i_product_link`) VALUES
(1, 'Outdoor Garden Chair', 'Wooden chair made for outdoor purposes.', 35, 50, 'Placeholder'),
(2, 'Tent', 'Outdoor ten for four people.', 115, 15, 'Placeholder'),
(3, 'Outdoor Table', 'Study metal and glass table made for the outdoors.', 75, 114, 'Placeholder'),
(4, 'Fake Grass', 'Artificial grass to put down onto your lawn, easy to maintain.', 10, 623, 'Placeholder'),
(5, 'Garden Gnomes', 'Lifelike Garden Gnomes to hide around the garden, may sometimes move from one spot to another.', 55, 44, 'Placeholder'),
(6, 'Plant Pots', 'Pots for your plants.', 70, 13, 'Placeholder'),
(7, 'Solar Powered Lamps', 'Lamps for the outdoors, are powered by solarl pannels on top of the lamp.', 17, 100, 'Placeholder'),
(8, 'Flashlights', 'Durable and dependant, battery lasts up to 6 hours.', 13, 55, 'Placeholder'),
(9, 'Backpack', '50L backpack made for adventures in the wild.', 68, 132, 'Placeholder'),
(10, 'Compass', 'Perfect for navigating the wild.', 33, 423, 'Placeholder'),
(11, 'Stainless Steel Grill', 'Propane powered stainless steel grill that is sure to withstand even the harshest weather.', 535, 31, 'Placeholder'),
(12, 'Wind Chime', '40 inches long and tuned to play seven different notes.', 128, 7, 'Placeholder'),
(13, 'Hobby Greenhouse', '8-ft by 15-ft, comes with a ramp-style threshold for easy accessability for a wheelbarrow or wheelchair.', 2155, 73, 'Placeholder');

-- --------------------------------------------------------

--
-- Table structure for table `iron_product_imgs`
--

CREATE TABLE `iron_product_imgs` (
  `i_product_id` int(11) NOT NULL,
  `i_img_path` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `iron_product_imgs`
--

INSERT INTO `iron_product_imgs` (`i_product_id`, `i_img_path`) VALUES
(1, 'example_img1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iron_login`
--
ALTER TABLE `iron_login`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `iron_mail`
--
ALTER TABLE `iron_mail`
  ADD PRIMARY KEY (`i_mail_id`);

--
-- Indexes for table `iron_product`
--
ALTER TABLE `iron_product`
  ADD PRIMARY KEY (`i_product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iron_login`
--
ALTER TABLE `iron_login`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `iron_mail`
--
ALTER TABLE `iron_mail`
  MODIFY `i_mail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `iron_product`
--
ALTER TABLE `iron_product`
  MODIFY `i_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
