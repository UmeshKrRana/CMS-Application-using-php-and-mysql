-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2018 at 06:28 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_profile`
--

CREATE TABLE `admin_profile` (
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `profile_img` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_profile`
--

INSERT INTO `admin_profile` (`first_name`, `middle_name`, `last_name`, `email`, `mobile`, `city`, `address`, `profile_img`) VALUES
('Umesh', 'Kumar', 'Rana', 'umesh.rana0269@gmail.com', 7631200530, 'New Delhi', 'Virender Nagar, Janakpuri', 'upload/image.png');

-- --------------------------------------------------------

--
-- Table structure for table `admin_registration`
--

CREATE TABLE `admin_registration` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mobile` bigint(15) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_registration`
--

INSERT INTO `admin_registration` (`first_name`, `last_name`, `email`, `password`, `mobile`, `city`, `address`) VALUES
('Umesh', 'Rana', 'umesh.rana0269@gmail.com', 'umesh', 7631200530, 'New Delhi', 'Virender Nagar');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `parent_category` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `parent_category`, `description`) VALUES
(1, 'Java', 'None', 'This is Java Category. This category will consist the java tutorials related to the basic to advanced level. this is the certain tutorial. This is very basic ..\r\n\r\n'),
(4, 'Web Development', 'None', 'This is web development tutorial.');

-- --------------------------------------------------------

--
-- Table structure for table `header_menu`
--

CREATE TABLE `header_menu` (
  `menu_name` varchar(100) NOT NULL,
  `menu_item` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header_menu`
--

INSERT INTO `header_menu` (`menu_name`, `menu_item`) VALUES
('header_menu', 'Java'),
('header_menu', 'Web Development');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `tag` varchar(200) NOT NULL,
  `featured_image` varchar(200) NOT NULL,
  `author` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `category`, `description`, `tag`, `featured_image`, `author`, `date`, `time`, `status`) VALUES
(1, 'Decision Making Statement in Java with Example', 'Java', '<p>We always need a form for the users where they can submit their details. This type of form is called the&nbsp;<strong>Registration Form</strong>. So in this tutorial, I will be dealing with the advance Registration form in ASP.NET using Bootstrap and the validation controls. In every website, there has the signup form (registration form). The form mainly defines the kind of the authorization for the users before accessing the resources. So, in this tutorial, I will let you know how to create a registration form using bootstrap. It is very necessary to validate the user&rsquo;s data to the form before submitting it. The validation is a type of the authentic data from the client side which specifies that all the details are in proper format. In the previous tutorial, we learned the dropdown filtration on the selection of another dropdown.</p>\r\n\r\n<h2>Registration Form in ASP.NET</h2>\r\n\r\n<p>In the Registration form tutorial, we will accept the user&rsquo;s data after the validation, then we will store it in the database. We will use the various controls like&nbsp;<strong>Label</strong>,&nbsp;<strong>TextBox</strong>,&nbsp;<strong>DropDown</strong>,&nbsp;<strong>RadioButton</strong>&nbsp;etc. So, let&rsquo;s start with creating a new project in Visual Studio.</p>\r\n\r\n<ul>\r\n	<li>In the&nbsp;<strong>Visual C#</strong>&nbsp;tab, select the&nbsp;<strong>Web</strong>&nbsp;category then choose the&nbsp;<strong>ASP.NET Web Application</strong></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', 'Java,Decision Making Statement', 'upload/22.jpg', 'Umesh Rana', '2018-12-26', '02:12:24', 1),
(2, 'OOPs Concept in PHP', 'PHP', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'OOPs,PHP', 'upload/1.jpg', 'Umesh Rana', '2018-12-20', '07:12:11', 0),
(3, 'OOPs Concept in PHP with Example', 'PHP', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do\r\n\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,&lt;br /&gt;<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non&lt;br /&gt;<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p></p>\r\n\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod&lt;br /&gt;<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam <br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse&lt;br /&gt;<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non&lt;br /&gt;<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;</p>\r\n\r\n<p>&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod&lt;br /&gt;<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,&lt;br /&gt;<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo&lt;br /&gt;<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse&lt;br /&gt;<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non&lt;br /&gt;<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;<br />\r\n&nbsp;</p>\r\n', 'PHP,oops,database', 'upload/orion-nebula-11107_1920.jpg', 'Umesh Rana', '2018-12-20', '08:12:27', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_profile`
--
ALTER TABLE `admin_profile`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `admin_registration`
--
ALTER TABLE `admin_registration`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `header_menu`
--
ALTER TABLE `header_menu`
  ADD PRIMARY KEY (`menu_item`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
