-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 11, 2023 at 11:58 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artbyyou`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `AboutID` int(11) NOT NULL,
  `HomePage` text,
  `Story` text,
  `AboutImage` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`AboutID`, `HomePage`, `Story`, `AboutImage`) VALUES
(1, 'Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut erat felis, viverra eget diam a, dictum molestie ex. Etiam lacinia ex quis fermentum luctus. Nullam vel tempus neque, sit amet sagittis mauris. Nullam placerat eleifend condimentum. Morbi porttitor nibh eu consectetur varius.', 'files\\AllArt.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `ArtistID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `ArtistImage` varchar(50) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`ArtistID`, `Name`, `ArtistImage`, `Type`, `Description`) VALUES
(1, 'Jacob Mac', 'files\\artists\\JacobMac.jpg', 'Photographer\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur et convallis dui, nec posuere massa. \r\n'),
(2, 'Helen Robert', 'files\\artists\\HelenRobert.jpg', 'Animal Lover\r\n', 'Nam mi ligula, sollicitudin id felis vulputate, vulputate condimentum eros. Quisque laoreet, urna iaculis eleifend mollis.\r\n'),
(3, 'Olivia David', 'files\\artists\\OliviaDavid.jpg', 'Photographer\r\n', 'Quisque molestie accumsan ante, at pharetra mauris maximus eu. Pellentesque gravida hendrerit eros, eget consequat nulla eleifend at.\r\n'),
(4, 'Lily Noah', 'files\\artists\\LilyNoah.jpg', 'Painter/Photographer\r\n', 'Aliquam venenatis a elit at fringilla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\r\n'),
(5, 'Tina Vax', 'files\\artists\\TinaVax.jpg', 'Pottery\r\n', 'In eget accumsan nulla, lobortis ullamcorper mauris. Sed ac erat maximus, lobortis ex ac, sagittis purus.\r\n'),
(6, 'David George', 'files\\artists\\DavidGeorge.jpg', 'Photographer\r\n', 'Donec rhoncus ornare interdum. Vestibulum nisl sem, vulputate id erat a, viverra rhoncus felis.\r\n'),
(7, 'Megan Mac', 'files\\artists\\MeganMac.jpg', 'Textiles\r\n', 'Mauris lobortis mi tortor, ut cursus leo faucibus eget. Fusce lobortis purus vitae gravida auctor.\r\n'),
(8, 'Hana William', 'files\\artists\\HanaWilliam.jpg', 'Painter\r\n', 'Vivamus laoreet ultricies purus a sollicitudin. Sed id sapien odio.\r\n'),
(10, 'John Victor', 'files/artists/JohnVictor.jpg', 'Photographer', 'I love photography. Enjoying the job.'),
(11, 'Lebron James', 'files/artists/LebronJames.jpg', 'Photographer', 'I love photography. Enjoying the job.'),
(12, 'Helen Keller', 'files/artists/helen', 'Photographer', 'I love photography. Enjoying the job.');

-- --------------------------------------------------------

--
-- Table structure for table `artwork`
--

CREATE TABLE `artwork` (
  `ArtID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `ArtImage` varchar(100) NOT NULL,
  `ThemeID` int(11) NOT NULL,
  `ArtistID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artwork`
--

INSERT INTO `artwork` (`ArtID`, `Title`, `ArtImage`, `ThemeID`, `ArtistID`) VALUES
(1, 'Multiple Birds', 'files\\Animals\\birds_Jac.jpg', 1, 1),
(2, 'Eagle', 'files\\Animals\\birds2_Jac.jpg', 1, 1),
(3, 'Toucans', 'files\\Animals\\birds3_Jac.jpg', 1, 1),
(4, 'Swan', 'files\\Animals\\birds4_Jac.jpg', 1, 1),
(5, 'Mallard', 'files\\Animals\\birds5_Jac.jpg', 1, 1),
(6, 'Wild Fox', 'files\\Animals\\dogs1_Helen.jpg', 1, 2),
(7, 'Lab', 'files\\Animals\\dogs2_Helen.jpg', 1, 2),
(8, 'Winter Puffer', 'files\\Animals\\dogs3_Helen.jpg', 1, 2),
(9, 'Christmas Dog', 'files\\Animals\\dogs4_Helen.jpg', 1, 2),
(10, 'Puppies', 'files\\Animals\\dogs5_Helen.jpg', 1, 2),
(11, 'Vintage Housing', 'files\\Architecture\\arch1_Olivia.jpg', 2, 3),
(12, 'Sky Scraper', 'files\\Architecture\\arch2_Olivia.jpg', 2, 3),
(13, 'White Wall', 'files\\Architecture\\arch3_Olivia.jpg', 2, 3),
(14, 'Beach View', 'files\\Architecture\\arch4_Olivia.jpg', 2, 3),
(15, 'Modern City', 'files\\Architecture\\arch5_Olivia.jpg', 2, 3),
(16, 'Pots', 'files\\Paintings\\paint1_Lily.jpg', 5, 4),
(17, 'Water Paint', 'files\\Paintings\\paint2_Lily.jpg', 5, 4),
(18, 'Canvas', 'files\\Paintings\\paint3_Lily.jpg', 5, 4),
(19, 'Greecy', 'files\\Paintings\\paint4_Lily.jpg', 5, 4),
(20, 'Ocean Paint', 'files\\Paintings\\paint5_Lily.jpg', 5, 4),
(21, 'Multiple Pots', 'files\\Crafts\\pottery1_Tina.jpg', 3, 5),
(22, 'Grey & White Pots', 'files\\Crafts\\pottery2_Tina.jpg', 3, 5),
(23, 'Flower Pots', 'files\\Crafts\\pottery3_Tina.jpg', 3, 5),
(24, 'Color Pots', 'files\\Crafts\\pottery4_Tina.jpg', 3, 5),
(25, 'Show Pots', 'files\\Crafts\\pottery5_Tina.jpg', 3, 5),
(26, 'General Painting', 'files\\Paintings\\paint1_David.jpg', 5, 6),
(27, 'Sunflower', 'files\\Paintings\\paint2_David.jpg', 5, 6),
(28, 'Ice Brick', 'files\\Water\\water_1.jpg', 6, 6),
(29, 'Kayaking', 'files\\Water\\water_3.jpg', 6, 6),
(30, 'Bridge', 'files\\Water\\water_5.jpg', 6, 6),
(31, 'Cultured Textile', 'files\\Crafts\\textile1_Meg.jpg', 3, 7),
(32, 'Mix Colours Textile', 'files\\Crafts\\textile2_Meg.jpg', 3, 7),
(33, 'Cotton', 'files\\Crafts\\textile3_Meg.jpg', 3, 7),
(34, 'Strips', 'files\\Crafts\\textile4_Meg.jpg', 3, 7),
(35, 'Bands', 'files\\Crafts\\textile5_Meg.jpg', 3, 7),
(36, 'Carnation', 'files\\Flowers\\flower1_Hana.jpg', 4, 8),
(37, 'Iris', 'files\\Flowers\\flower2_Hana.jpg', 4, 8),
(38, 'Tulip', 'files\\Flowers\\flower3_Hana.jpg', 4, 8),
(39, 'Sunflower Basket', 'files\\Flowers\\flower4_Hana.jpg', 4, 8),
(40, 'Price Sun', 'files\\Flowers\\flower5_Hana.jpg', 4, 8),
(42, 'killer', 'files/Water/water_2.jpg', 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `signin`
--

CREATE TABLE `signin` (
  `UserID` int(11) NOT NULL,
  `ArtistID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `signin`
--

INSERT INTO `signin` (`UserID`, `ArtistID`, `Username`, `Password`) VALUES
(1, 1, 'jmac', 'jmac123'),
(2, 2, 'hrobert', 'hrobert123'),
(3, 3, 'odavid', 'odavid123'),
(4, 4, 'lnoah', 'lnoah123'),
(5, 5, 'tvax', 'tvax123'),
(6, 6, 'dgeorge', 'dgeorge123'),
(7, 7, 'mmac', 'mmac123'),
(8, 8, 'hwilliam', 'hwilliam123'),
(11, 10, 'jvictor', 'jvictor123'),
(12, 11, 'ljames', 'Ljames&123'),
(13, 12, 'helen', '$2y$10$vjAwP7/V/wWuERzPLUqfUOLbb9shSq2wRQgKyRHkJ0Xr8KiccL3PW');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `ThemeID` int(11) NOT NULL,
  `Theme` varchar(100) NOT NULL,
  `ThemeImage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`ThemeID`, `Theme`, `ThemeImage`) VALUES
(1, 'Animals', 'files\\Animals\\birds_Jac.jpg'),
(2, 'Architecture', 'files\\Architecture\\arch1_Olivia.jpg'),
(3, 'Crafts', 'files\\Crafts\\pottery1_Tina.jpg'),
(4, 'Flowers', 'files\\Flowers\\flower1_Hana.jpg'),
(5, 'Paintings', 'files\\Paintings\\paint1_David.jpg'),
(6, 'Water', 'files\\Water\\water_1.jpg'),
(7, 'new', 'files/new/newtheme'),
(8, 'askdhb', 'files/askdhb/asdh'),
(9, 'asdasf', 'files/asdasf/kuhiuab');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`AboutID`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`ArtistID`);

--
-- Indexes for table `artwork`
--
ALTER TABLE `artwork`
  ADD PRIMARY KEY (`ArtID`);

--
-- Indexes for table `signin`
--
ALTER TABLE `signin`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`ThemeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `AboutID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `ArtistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `artwork`
--
ALTER TABLE `artwork`
  MODIFY `ArtID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `signin`
--
ALTER TABLE `signin`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `ThemeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
