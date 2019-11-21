-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 02, 2018 at 04:21 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_prime_pizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `att_size`
--

DROP TABLE IF EXISTS `att_size`;
CREATE TABLE IF NOT EXISTS `att_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `att_size`
--

INSERT INTO `att_size` (`id`, `value`) VALUES
(1, 'Small'),
(3, 'Medium'),
(4, 'Large');

-- --------------------------------------------------------

--
-- Table structure for table `att_toppings`
--

DROP TABLE IF EXISTS `att_toppings`;
CREATE TABLE IF NOT EXISTS `att_toppings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) DEFAULT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `att_toppings`
--

INSERT INTO `att_toppings` (`id`, `value`, `price`) VALUES
(1, 'BBQ Chicken', 1.99),
(2, 'Black Olives', 2.49),
(3, 'Capsicum', 1.49),
(4, 'Chicken Bacon', 0.99),
(5, 'Chicken Ham', 1.99),
(6, 'Chicken Sausage', 2.99),
(7, 'Jalapeno', 2.99);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(8) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Rice'),
(2, 'Pizza'),
(3, 'Drinks');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_amount` float DEFAULT NULL,
  `order_note` text NOT NULL,
  `customer` varchar(255) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `customer` (`customer`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_amount`, `order_note`, `customer`) VALUES
(1, 22, '', 'johndoe');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_item_name` varchar(255) DEFAULT NULL,
  `order_item_quantity` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_item_id`),
  KEY `product_id` (`product_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_item_name`, `order_item_quantity`, `order_id`, `product_id`) VALUES
(68, 'Coca-Cola 750ML', 2, 2, 18),
(67, 'Devilled Chicken', 1, 1, 12),
(66, 'Thick Mango Magic', 1, 1, 17),
(65, 'Coca-Cola 750ML', 1, 1, 18),
(64, 'Baked Rice - Veggie', 1, 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `price` float DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `featured_image`, `quantity`, `cat_id`) VALUES
(18, 'Coca-Cola 750ML', 'Coca-Cola 750ml', 3, 'http://localhost:8080/prime-pizza/content/uploads/coca-cola.png', 5, 3),
(19, 'Chicken Birizza', 'Deliciously fragrant biriyani rice covered in a crust, served with chunks of chicken, spicy gravy and crunchy salad.', 5, 'http://localhost:8080/prime-pizza/content/uploads/Chicken-Birizza.png', 21, 1),
(16, 'Baked Rice - Veggie', 'Rice with sautÃ©ed vegetables and creamy potatoes', 8, 'http://localhost:8080/prime-pizza/content/uploads/Baked-Rice-Veggie.png', 5, 1),
(17, 'Thick Mango Magic', 'Refreshing taste to cool you downâ€¦', 2, 'http://localhost:8080/prime-pizza/content/uploads/thick-mango-magic.png', 5, 3),
(13, 'Cheese & Tomato', 'Fresh tomato with a double layer of mozzarella cheese.', 8, 'http://localhost:8080/prime-pizza/content/uploads/cheese-and-tomato.png', 5, 2),
(14, 'Cheesy Onion', 'Crispy onions with a double layer of mozzarella cheese.', 13, 'http://localhost:8080/prime-pizza/content/uploads/cheesy-onion.png', 5, 2),
(12, 'Devilled Chicken', 'Devilled chicken in spicy sauce with a double layer of mozzarella cheese.', 9, 'http://localhost:8080/prime-pizza/content/uploads/devilled-chicken.png', 5, 2),
(15, 'Veggie Supreme', 'Mushrooms, tomatoes, onions, black olives and bell peppers with a double layer of mozzarella cheese.', 14, 'http://localhost:8080/prime-pizza/content/uploads/veggie-supreme.png', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `cat_id`) VALUES
(1, 'Indian', 2),
(2, 'Italian', 2),
(7, 'Sri Lankan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `author_image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `title`, `description`, `author_image`) VALUES
(1, 'Peter A.', 'Service is excellent. As usual I wanted to try the Super Supreme, and they didn\'t fail to satisfy. And all the other meals are good too. Highly recommended!!', '/prime-pizza/content/uploads/avatar.png'),
(2, 'Eric Taylor', 'Prime Pizza pizzas are so nice I like the meat balls chili pizza with bread cheese. But the salad was not good and I think better if they can make that hot instead of giving it as soon as get it from the fridge', '/prime-pizza/content/uploads/avatar.png'),
(3, 'Kevin T.', 'Visited with my family..Nice place to dine too..located in facing to the galle road. Easy access..friendly staff and quick service..can recommended to any type of visitors !!!!!', '/prime-pizza/content/uploads/avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(14) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip_code` int(8) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `first_name`, `last_name`, `password`, `user_role`, `email`, `phone`, `address`, `city`, `zip_code`) VALUES
('shanka', 'John', 'Doe', 'pass', 'customer', 'johndoe@example.com', 98394812, '1st Street', 'Colombo', 10234),
('johndoe', 'John', 'Doe', 'myaccount', 'customer', 'johndoe@example.com', 98394812, '1st Street', 'Colombo', 10234),
('admin', 'Site', 'Admin', 'pass', 'administrator', 'admin@localhost.host', 7876362, '1st Street', 'Moratuwa', 10400);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
