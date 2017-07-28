-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2016 at 04:18 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wardrobebd`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cartid` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL,
  `date` date NOT NULL,
  `delivery_address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`cartid`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `status`, `date`, `delivery_address`, `email`) VALUES
(1, 0, '2016-05-22', 'DU', '2hin2222@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

DROP TABLE IF EXISTS `catagory`;
CREATE TABLE IF NOT EXISTS `catagory` (
  `catagoryid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` varchar(10) NOT NULL,
  `parent_cat` int(11) NOT NULL,
  `cat_status` int(11) NOT NULL,
  PRIMARY KEY (`catagoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`catagoryid`, `name`, `description`, `parent_cat`, `cat_status`) VALUES
(1, 'Men', 'Clothing ', 0, 1),
(2, 'Women', 'Clothing', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `email` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `pin` int(12) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`email`, `status`, `name`, `password`, `address`, `gender`, `pin`) VALUES
('2hin1234@gmail.com', 0, 'Tuhin', '147', 'Du', 'male', 30302),
('2hin2222@gmail.com', 1, 'Md. Muidul Alam', '123', 'Shahidulla Hall , University o', 'Male', 23977),
('2hin@gmail.com', 1, 'Tuhin', '147', 'Dhaka', 'Male', 20734);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `productid` int(11) NOT NULL,
  `cartid` int(11) NOT NULL,
  PRIMARY KEY (`productid`,`cartid`),
  KEY `cartid_fk` (`cartid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`productid`, `cartid`) VALUES
(11, 2),
(12, 2),
(14, 2),
(16, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `productid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `Price` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sold` int(11) NOT NULL,
  PRIMARY KEY (`productid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `name`, `Price`, `image`, `Description`, `quantity`, `sold`) VALUES
(2, 'tshirt', 175, 'a1.png', 'Black tshirt with "mood swing alert!" written accross the front.', 100, 5),
(3, 'tshirt1', 125, 'a3.png', 'Plain grey female tshirt', 100, 25),
(4, 'cardigan', 250, 'a4.png', 'Blood red cardigan with full sleeve and a round neck', 50, 30),
(5, 'prom dress', 750, 'a7.png', 'A red sleveless prom dress with knee height length', 15, 3),
(6, 'summer tshirt', 125, 'a5.png', 'Summer round neck plain tshirt with short sleeves. Available in two colors: Black and grey.', 500, 290),
(7, 'party top', 500, 'a6.png', 'Grayish black party tank top with large round neck', 20, 15),
(8, 'Palazzo', 500, 'pi3.png', 'A red  long women''s trouser cut with a loose, extremely wide leg that flares out from the waist.', 150, 143),
(9, 'sweatpant', 175, 'pi1.png', 'A black sweatpant with white print accross its surface.', 200, 173),
(10, 'Geans', 700, 'pi7.png', 'A blue denim with fashionabe slit at the knee.', 50, 47),
(11, 'Black suit', 2550, 'a2.png', 'A black suit suited for any ocassion.', 50, 35),
(12, 'Gray suit', 2500, 'a8.png', 'A grey suit suited for all occassion', 50, 37),
(14, 'male tshirt', 250, 'mw2.png', 'A baby pink round neck tshirt', 100, 27),
(15, 'Running shoe', 1400, 'd2.jpg', 'Blue running shoe for everyday use.', 20, 17),
(16, 'Sunglass', 450, 'men3.jpg', 'Cool shades for men of all age.', 15, 9),
(18, 'Pant', 1500, 'pi12.png', 'A gray pant for men suited for all ocassion.', 50, 37);

-- --------------------------------------------------------

--
-- Table structure for table `pro_cat`
--

DROP TABLE IF EXISTS `pro_cat`;
CREATE TABLE IF NOT EXISTS `pro_cat` (
  `productid` int(11) NOT NULL,
  `catagoryid` int(11) NOT NULL,
  PRIMARY KEY (`productid`,`catagoryid`),
  KEY `catagoryid_fk` (`catagoryid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pro_cat`
--

INSERT INTO `pro_cat` (`productid`, `catagoryid`) VALUES
(11, 1),
(12, 1),
(14, 1),
(15, 1),
(16, 1),
(18, 1),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `email_fk` FOREIGN KEY (`email`) REFERENCES `customer` (`email`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `productid_fk` FOREIGN KEY (`productid`) REFERENCES `product` (`productid`);

--
-- Constraints for table `pro_cat`
--
ALTER TABLE `pro_cat`
  ADD CONSTRAINT `catagoryid_fk` FOREIGN KEY (`catagoryid`) REFERENCES `catagory` (`catagoryid`),
  ADD CONSTRAINT `product_fk2` FOREIGN KEY (`productid`) REFERENCES `product` (`productid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
