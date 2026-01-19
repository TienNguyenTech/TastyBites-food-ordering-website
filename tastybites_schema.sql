-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2026 at 07:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tastybites_schema`
--

-- --------------------------------------------------------

--
-- Table structure for table `content_blocks`
--

CREATE TABLE `content_blocks` (
  `id` int(11) NOT NULL,
  `parent` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `label` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(32) NOT NULL,
  `value` text DEFAULT NULL,
  `previous_value` text DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content_blocks`
--

INSERT INTO `content_blocks` (`id`, `parent`, `slug`, `label`, `description`, `type`, `value`, `previous_value`, `modified`) VALUES
(5, 'global', 'website-title', 'Website Title', 'Shown on the home page, as well as any tabs in the users browser.', 'text', 'Tasty Bites Kitchen', NULL, '2024-05-08 00:11:52'),
(6, 'image gallery', 'shown-image-1', 'Shown Image 1', 'The image shown in the home page image gallery.', 'image', '/content-blocks/uploads/shown-image-1.fb7f44783864f74249f24cb782e5b295.jpg', '/content-blocks/uploads/shown-image-1.806816ab4bc4e052c63088ebc26090b5.jpg', '2024-05-03 02:16:48'),
(7, 'image gallery', 'shown-image-2', 'Shown Image 2', 'The image shown in the home page image gallery.', 'image', '/content-blocks/uploads/shown-image-2.256cb0f316b09b0b11fd88db582f53f7.jpg', NULL, '2024-05-03 02:23:35'),
(8, 'image gallery', 'shown-image-3', 'Shown Image 3', 'The image shown in the home page image gallery.', 'image', '/content-blocks/uploads/shown-image-3.19be0153ad9d841f98bb431ca5b90d0d.jpg', NULL, '2024-05-03 02:23:40'),
(9, 'image gallery', 'shown-image-4', 'Shown Image 4', 'The image shown in the home page image gallery.', 'image', '/content-blocks/uploads/shown-image-4.62997f6d2d8937e38e46e0735d77152c.jpg', NULL, '2024-05-03 02:23:45'),
(10, 'home', 'copyright-message', 'Copyright Message', 'Copyright information shown at the bottom of the home page.', 'text', 'Tasty Bites Kitchen 2024', 'Copyright &copy; Tasty Bites Kitchen 2024', '2024-05-03 02:25:52'),
(11, 'home', 'banner', 'Banner', 'A banner shown at the top of the home page.', 'text', 'Celebrate Republic Day with us on the 28th May! 10% off all orders!', '25% off all menu items before May 20.', '2024-05-09 03:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `content_blocks_phinxlog`
--

CREATE TABLE `content_blocks_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_blocks_phinxlog`
--

INSERT INTO `content_blocks_phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20230402063959, 'ContentBlocksMigration', '2024-05-02 15:07:43', '2024-05-02 15:07:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `enquirys`
--

CREATE TABLE `enquirys` (
  `enquiry_id` int(11) NOT NULL,
  `enquiry_name` varchar(50) NOT NULL,
  `enquiry_email` varchar(200) NOT NULL,
  `enquiry_message` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquirys`
--

INSERT INTO `enquirys` (`enquiry_id`, `enquiry_name`, `enquiry_email`, `enquiry_message`) VALUES
(11, 'Rajesh Gurung', 'rajesh.gurung@example.com', 'Hello! I\'m interested in placing an order for your delicious Chicken Momo. Could you please provide me with more information on your delivery options and the estimated time for delivery? Thank you!'),
(12, 'Sunita Rai', 'sunita.rai@example.com', 'Namaste! I\'m a big fan of Nepalese cuisine and I\'m excited to try out your restaurant. Can you tell me about the different vegetarian options you offer on your menu? Also, do you have any special dishes for vegans? Dhanyabad!'),
(13, 'Anil Shah', 'anil.shah@example.com', 'Hi there! I\'m planning a family gathering and considering ordering catering from your restaurant. Can you provide details on your catering services, including menu options, pricing, and minimum order requirements? Looking forward to hearing from you soon.'),
(14, 'Nisha Tamang', 'nisha.tamang@example.com', 'Good day! I have a business meeting coming up and I\'d like to know if your restaurant offers a private dining area for corporate events. If yes, could you please provide details on the availability and any additional charges? Thank you!'),
(15, 'Suresh Thapa', 'suresh.thapa@example.com', 'Hello Tasty Bites Kitchen! I\'m curious about your restaurant\'s opening hours. Could you kindly let me know what time you open and close on weekdays and weekends? Appreciate your assistance!'),
(16, 'Surya Rao', 'omegashenron842@gmail.com', 'I\'d like to know about your opening hours, and when you close for the day'),
(17, 'Chrissy', 'chrissy@gmail.com', 'I need to know if your dishes are vego'),
(18, 'Surya ', 'surya@gmail.com', 'what time do you open?\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `menuitems`
--

CREATE TABLE `menuitems` (
  `menuitem_id` int(11) NOT NULL,
  `menuitem_name` varchar(50) NOT NULL,
  `menuitem_image` varchar(200) NOT NULL,
  `menuitem_desc` varchar(1000) NOT NULL,
  `menuitem_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menuitems`
--

INSERT INTO `menuitems` (`menuitem_id`, `menuitem_name`, `menuitem_image`, `menuitem_desc`, `menuitem_price`) VALUES
(11, 'Chicken Momo', 'chicken_momos.jpg', 'Delicious ground chicken mixed with red onion, ginger, coriander, and house spices, wrapped in a flour pastry', 18.5),
(13, 'Mushroom Momo', 'mushroom momo.jpg', 'A delightful blend of mushrooms, cabbage, red onion, coriander, and spices, wrapped in a delicate flour pastry', 18.5),
(14, 'Pork Momo', 'pork momo.jpg', 'Tender ground pork combined with fermented greens, red onion, ginger, and house spices, wrapped in a homemade flour pastry', 17.5),
(15, 'Brisket Momo', 'brisket momo.webp', 'Succulent free-range brisket seasoned with red onion, ginger, house spices, and coriander, served with freshly made achar of your choice', 19.5),
(16, 'Greens Salad', 'green-salad.jpg', 'A refreshing salad featuring sprouts, fermented greens, red cabbage, radish, red onion, fresh chili, and citrus mustard dressing, garnished with coriander and a lemon wedge', 14.5),
(18, 'Dahl Soup', 'dal-soup-recipe.jpg', 'A creamy lentil soup from Nepal infused with turmeric and coconut milk, served hot for a comforting experience', 10),
(20, 'Chicken Momo', 'vegie momo.webp', 'Tasty ground chicken mixed with aromatic spices, wrapped in a flour pastry, perfect for a quick and satisfying meal', 16),
(21, 'Salad', 'Roasted-Cauliflower-Salad-V2.jpg', 'A delightful salad featuring roasted cauliflower, tossed with a medley of fresh ingredients and a flavorful dressing, offering a burst of flavors in every bite', 15);

-- --------------------------------------------------------

--
-- Table structure for table `menuitems_orders`
--

CREATE TABLE `menuitems_orders` (
  `id` int(11) NOT NULL,
  `menuitem_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menuitems_orders`
--

INSERT INTO `menuitems_orders` (`id`, `menuitem_id`, `order_id`, `quantity`) VALUES
(52, 11, 48, 1),
(53, 13, 48, 1),
(54, 20, 48, 1),
(55, 13, 49, 1),
(56, 13, 50, 1),
(72, 11, 55, 1),
(73, 13, 55, 1),
(74, 14, 55, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(20) NOT NULL DEFAULT 'pending',
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_datetime`, `order_status`, `customer_name`, `customer_email`, `customer_phone`) VALUES
(48, '2024-05-08 17:17:48', 'ready', 'Ben Hetherington', 'bhet0004@student.monash.edu', '1300367070'),
(49, '2024-05-22 22:28:17', 'pending', 'William Nguyen', 'alantino0802200239@gmail.com', '0924567893'),
(50, '2024-05-22 22:29:53', 'pending', 'William Nguyen', 'alantino0802200239@gmail.com', '0924567893'),
(55, '2024-10-05 23:54:44', 'pending', 'Tien', 'tien123@gmail.com', '0435169428');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `payment_amount` int(10) NOT NULL,
  `card_number` varchar(256) NOT NULL,
  `card_expiry` varchar(256) NOT NULL,
  `card_cvc` varchar(256) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_amount`, `card_number`, `card_expiry`, `card_cvc`, `order_id`) VALUES
(18, 53, '1234562385697854', '0924', '123', 48);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nonce` varchar(255) DEFAULT NULL,
  `nonce_expiry` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_type` enum('admin','customer','staff') NOT NULL DEFAULT 'customer',
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `nonce`, `nonce_expiry`, `created`, `modified`, `user_type`, `first_name`, `last_name`) VALUES
(2, 'test@example.com', '$2y$10$w8vAXPUJYhsujavy2coHX.HirCf.BEET8ZYFyQmXaT72a6Pdf5Vai', '', NULL, '2024-04-17 15:29:57', '2024-04-17 05:47:59', 'admin', 'Test', 'Admin'),
(26, 'admin@tastybites.com', '$2y$10$JZC3PAg41jUXV7d3qpxxJuT0exc2YMAEfQfsgIgLlXW0dbxd7pO/i', NULL, NULL, '2024-05-01 17:21:34', '2024-05-01 17:21:34', 'admin', 'Tasty', 'Bites'),
(28, 'staff@tastybites.com', '$2y$10$olELPXwttHagJQC12X4EPOZrNtSF097VozJmvfzUlodeq5xrYgw2S', NULL, NULL, '2024-05-09 03:20:58', '2024-05-09 03:20:58', 'staff', 'John', 'Marston');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content_blocks`
--
ALTER TABLE `content_blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquirys`
--
ALTER TABLE `enquirys`
  ADD PRIMARY KEY (`enquiry_id`);

--
-- Indexes for table `menuitems`
--
ALTER TABLE `menuitems`
  ADD PRIMARY KEY (`menuitem_id`);

--
-- Indexes for table `menuitems_orders`
--
ALTER TABLE `menuitems_orders`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `menuitems_orders_menuitem_fk` (`menuitem_id`),
  ADD KEY `menuitems_orders_order_fk` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payment_order_fk` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enquirys`
--
ALTER TABLE `enquirys`
  MODIFY `enquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `menuitems`
--
ALTER TABLE `menuitems`
  MODIFY `menuitem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `menuitems_orders`
--
ALTER TABLE `menuitems_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payment_order_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
