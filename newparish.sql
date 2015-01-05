-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2014 at 10:11 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `newparish`
--

-- --------------------------------------------------------

--
-- Table structure for table `baptism_schedule`
--

CREATE TABLE IF NOT EXISTS `baptism_schedule` (
  `id_baptism_schedule` int(11) NOT NULL AUTO_INCREMENT,
  `id_parish` int(11) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  PRIMARY KEY (`id_baptism_schedule`),
  KEY `parish_id` (`id_parish`),
  KEY `day_id` (`day`),
  KEY `time_id` (`time_start`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `baptism_schedule`
--

INSERT INTO `baptism_schedule` (`id_baptism_schedule`, `id_parish`, `day`, `time_start`, `time_end`) VALUES
(14, 3, 1, '11:11:00', '23:21:00'),
(51, 1, 4, '00:12:00', '00:12:00'),
(53, 2, 1, '11:11:00', '11:11:00'),
(54, 3, 1, '11:11:00', '11:11:00'),
(55, 2, 6, '00:31:00', '00:12:00'),
(56, 2, 1, '11:11:00', '11:11:00'),
(63, 1, 4, '11:11:00', '11:11:00'),
(65, 1, 1, '00:30:00', '11:11:00'),
(66, 1, 1, '00:12:00', '11:11:00'),
(67, 1, 1, '00:23:00', '00:43:00'),
(68, 1, 1, '00:23:00', '00:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE IF NOT EXISTS `barangay` (
  `id_barangay` int(11) NOT NULL AUTO_INCREMENT,
  `barangay` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_barangay`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`id_barangay`, `barangay`) VALUES
(1, 'Talamban'),
(2, 'Balamban'),
(3, 'Bantayan'),
(4, 'Bogo'),
(5, 'DaanBantayan'),
(6, 'Carmen'),
(7, 'Catmon'),
(8, 'Consolacion'),
(9, 'Dumanjug'),
(10, 'Lapu-Lapu'),
(11, 'Toledo'),
(12, 'Lilo-an');

-- --------------------------------------------------------

--
-- Table structure for table `confession_schedule`
--

CREATE TABLE IF NOT EXISTS `confession_schedule` (
  `id_confession_schedule` int(11) NOT NULL AUTO_INCREMENT,
  `id_parish` int(11) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  PRIMARY KEY (`id_confession_schedule`),
  KEY `idparish` (`id_parish`),
  KEY `dayid` (`day`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `confession_schedule`
--

INSERT INTO `confession_schedule` (`id_confession_schedule`, `id_parish`, `day`, `time_start`, `time_end`) VALUES
(4, 1, 1, '11:11:00', '11:11:00'),
(5, 3, 1, '11:11:00', '11:11:00'),
(6, 3, 4, '00:12:00', '00:12:00'),
(7, 2, 3, '11:11:11', '11:11:11'),
(8, 1, 1, '00:31:00', '00:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `confirmation_schedule`
--

CREATE TABLE IF NOT EXISTS `confirmation_schedule` (
  `id_confirmation_schedule` int(11) NOT NULL AUTO_INCREMENT,
  `id_parish` int(11) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  PRIMARY KEY (`id_confirmation_schedule`),
  KEY `parishid` (`id_parish`),
  KEY `id_day` (`day`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `confirmation_schedule`
--

INSERT INTO `confirmation_schedule` (`id_confirmation_schedule`, `id_parish`, `day`, `time_start`, `time_end`) VALUES
(1, 1, 1, '00:11:00', '00:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE IF NOT EXISTS `day` (
  `id_day` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_day`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`id_day`, `day`) VALUES
(1, 'Sunday'),
(2, 'Monday'),
(3, 'Tuesday'),
(4, 'Wednesday'),
(5, 'Thursday'),
(6, 'Friday'),
(7, 'Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) NOT NULL,
  `ext` varchar(10) NOT NULL,
  PRIMARY KEY (`image_id`),
  KEY `image_id` (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `filename`, `ext`) VALUES
(1, 'default', 'jpg'),
(2, 'pic2', 'jpg'),
(3, 'potato7', 'jpg'),
(4, 'pic4', 'jpg'),
(5, 'pic5', 'jpg'),
(7, 'potato', 'png'),
(33, 'f4b9b2a1079ebeb038bb5a883b6cad18', 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id_language` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_language`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id_language`, `language`) VALUES
(1, 'English'),
(2, 'Cebuano');

-- --------------------------------------------------------

--
-- Table structure for table `mass_schedule`
--

CREATE TABLE IF NOT EXISTS `mass_schedule` (
  `id_mass_schedule` int(11) NOT NULL AUTO_INCREMENT,
  `id_parish` int(11) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `language` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mass_schedule`),
  KEY `id_parish` (`id_parish`),
  KEY `idday` (`day`),
  KEY `id_language` (`language`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `mass_schedule`
--

INSERT INTO `mass_schedule` (`id_mass_schedule`, `id_parish`, `day`, `time_start`, `time_end`, `language`) VALUES
(4, 1, 3, '11:11:00', '11:11:00', 2),
(5, 4, 1, '11:11:00', '11:11:00', 1),
(6, 1, 1, '11:11:00', '11:11:00', 1),
(7, 1, 1, '11:11:00', '11:11:00', 1),
(8, 1, 6, '11:11:00', '11:11:00', 1),
(9, 1, 5, '00:45:00', '11:11:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id_news` int(11) NOT NULL AUTO_INCREMENT,
  `id_parish` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id_news`),
  KEY `id-parish` (`id_parish`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `id_parish`, `date`, `title`, `content`) VALUES
(14, 1, '2014-11-12', 'Justin Bieber visits Alliance', '<p>Iring Napandol. Natagak. Nalumos. asdsa</p>'),
(15, 1, '2014-11-03', 'Priest Scandal', '<p>Bata NAtagak sa&nbsp;bangag</p>'),
(16, 1, '2014-11-06', 'Boy friend dead near church', '<p>Boy found dead near church</p>');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `id_parish` int(11) DEFAULT NULL,
  `page_name` varchar(45) DEFAULT NULL,
  `description` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`id_page`),
  KEY `id.parish` (`id_parish`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id_page`, `id_parish`, `page_name`, `description`) VALUES
(4, 1, 'Home', '<p style="text-align:center"><span style="font-size:28px"><strong>Alliance of Two Hearts Parish</strong></span></p>\n\n<p><img alt="" src="http://localhost/parishsite/html_attrib/parishStyles/images/parish_images/twohearts/Home/588cdf2a1f86f3d46bd0b69916571168.jpg" style="height:546px; width:950px" /></p>\n\n<p style="text-align:justify">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus, eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum rutrum, est ut placerat elementum, lectus nisl aliquam velit, tempor aliquam eros nunc nonummy metus. In eros metus, gravida a, gravida sed, lobortis id, turpis. Ut ultrices, ipsum at venenatis fringilla, sem nulla lacinia telluswqq, eget aliquet turpis mauris non enim. Nam turpis. Suspendisse lacinia. Curabitur ac tortor ut ipsum egestas elementum. Nunc imperdiet gravida mauris</p>\n\n<p style="text-align:justify">&nbsp;</p>\n\n<table align="center" border="0" cellpadding="1" cellspacing="10" style="width:920px">\n	<tbody>\n		<tr>\n			<td rowspan="2" style="width:300px"><img alt="" src="http://localhost/parishsite/html_attrib/parishStyles/images/parish_images/twohearts/Home/496fd081a92983908d7f7cd74d30dd01.jpg" style="height:232px; width:300px" /></td>\n			<td rowspan="2" style="text-align:justify; width:350px">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus, eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum&nbsp;</td>\n			<td rowspan="2" style="text-align:justify; width:10px">&nbsp;</td>\n			<td style="text-align:center; vertical-align:top; width:250px">\n			<p><span style="font-size:20px">News</span></p>\n\n			<hr />\n			<p><a href="http://localhost/parishsite/index.php/parish/news/twohearts/2014-11-03/Priest%20Scandal">Priest Scandal???</a></p>\n\n			<p><a href="http://localhost/parishsite/index.php/parish/news/twohearts/2014-11-06/Boy%20friend%20dead%20near%20church">Boy found dead near Church</a></p>\n\n			<p><a href="http://localhost/parishsite/index.php/parish/news/twohearts/2014-11-12/Justin%20Bieber%20visits%20Alliance">Justin Bieber visits Alliance</a></p>\n\n			<hr />\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="text-align:center; vertical-align:top; width:250px">&nbsp;</td>\n		</tr>\n		<tr>\n			<td colspan="2" rowspan="5" style="text-align:justify; vertical-align:top">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus, eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum rutrum, est ut placerat elementum, lectus nisl aliquam velit, tempor aliquam eros nunc nonummy metus. In eros metus, gravida a, gravida sed, lobortis id, turpis. Ut ultrices, ipsum at venenatis fringilla, sem nulla lacinia telluswqq, eget aliquet turpis mauris non enim. Nam turpis. Suspendisse lacinia. Curabitur ac tortor ut ipsum egestas elementum. Nunc imperdiet gravida mauris</td>\n			<td rowspan="3">&nbsp;</td>\n			<td style="text-align:center; vertical-align:top">\n			<p><span style="font-size:20px">Events</span></p>\n\n			<hr />\n			<p>Fiesta Day</p>\n\n			<p>Celebration Day</p>\n\n			<hr />\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="text-align:center; vertical-align:top">&nbsp;</td>\n		</tr>\n		<tr>\n			<td style="text-align:center; vertical-align:top">\n			<p><span style="font-size:20px">Ministries</span></p>\n\n			<hr />\n			<p>Youth Ministry</p>\n\n			<p>Marriage Ministry</p>\n\n			<p>Family Day Ministry</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>&nbsp;</p>'),
(5, 2, 'afufu', NULL),
(12, 1, 'Services', '<p style="text-align:center"><span style="font-size:24px">Our Services!</span></p>\n\n<p>&nbsp;</p>\n\n<table align="center" border="1" cellpadding="1" cellspacing="25" style="width:920px">\n	<tbody>\n		<tr>\n			<td style="text-align:center; width:230px">\n			<p><span style="font-size:20px">Marriage</span></p>\n\n			<hr />\n			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus,&nbsp;</p>\n\n			<p>&nbsp;</p>\n			</td>\n			<td style="text-align:center; width:230px">\n			<p><span style="font-size:20px">Divorce&nbsp;</span></p>\n\n			<hr />\n			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus,&nbsp;</p>\n\n			<p>&nbsp;</p>\n			</td>\n			<td style="text-align:center; width:230px">\n			<p><span style="font-size:20px">Confirmation</span></p>\n\n			<hr />\n			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus,</p>\n\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>&nbsp;</p>\n\n<div>\n<table align="center" border="1" cellpadding="1" cellspacing="25" style="line-height:20.7999992370605px; width:920px">\n	<tbody>\n		<tr>\n			<td style="text-align:center; width:230px">\n			<p><span style="font-size:20px">Baptism</span></p>\n\n			<hr />\n			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus,&nbsp;</p>\n\n			<p>&nbsp;</p>\n			</td>\n			<td style="text-align:center; width:230px">\n			<p><span style="font-size:20px">Mass</span></p>\n\n			<hr />\n			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus,</p>\n\n			<p>&nbsp;</p>\n			</td>\n			<td style="text-align:center; width:230px">\n			<p><span style="font-size:20px">Ordination</span></p>\n\n			<hr />\n			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus,</p>\n\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n</div>\n\n<p>&nbsp;</p>'),
(13, 1, 'About Us', '<p>&nbsp;</p>\n\n<p style="text-align: justify;">A wiki is a web application which allows people to add, modify, or delete content in collaboration with others. In a typical wiki, text is written using a simplified markup language (known as &quot;wiki markup&quot;) or a rich-text editor.[1][2] While a wiki is a type of content management system, it differs from a blog or most other such systems in that the content is created without any defined owner or leader, and wikis have little implicit structure, allowing structure to emerge according to the needs of the users.[2]<br />\nThe encyclopedia project Wikipedia is the most popular wiki on the public web in terms of page views,[3] but there are many sites running many different kinds of wiki software. Wikis can serve many different purposes both public and private, including knowledge management, notetaking, community websites and intranets. Some permit control over different functions (levels of access). For example, editing rights may permit changing, adding or removing material. Others may permit access without enforcing access control. Other rules may also be imposed to organize content.<br />\nWard Cunningham, the developer of the first wiki software, WikiWikiWeb, originally described it as &quot;the simplest online database that could possibly work&quot;.[4] &quot;Wiki&quot; (pronounced [%u02C8wiki][note 1]) is a Hawaiian word meaning &quot;quick&quot;.[5][6][7]</p>\n\n<p>&nbsp;</p>'),
(14, 1, 'Contacts', '<p>You can contact us by going to our Address or by contacting the following numbers:</p>\n\n<p>- 12093812398120398<br />\n- 12093812390812082<br />\n- 12312093810298199<br />\n&nbsp;</p>\n\n<p>You can also visit our facebook page located at www.facebook.com/allianceParish</p>');

-- --------------------------------------------------------

--
-- Table structure for table `parish`
--

CREATE TABLE IF NOT EXISTS `parish` (
  `id_parish` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(100) NOT NULL,
  `parish` varchar(45) DEFAULT NULL,
  `street` int(11) DEFAULT '1',
  `barangay` int(11) DEFAULT '1',
  `towncity` int(11) DEFAULT '1',
  `tnumber` varchar(20) DEFAULT '09227638918',
  `image` int(11) DEFAULT '1',
  `url` varchar(100) DEFAULT NULL,
  `description` varchar(1000) NOT NULL DEFAULT 'Description is to be added',
  PRIMARY KEY (`id_parish`),
  KEY `id_barangay` (`barangay`),
  KEY `id_street` (`street`),
  KEY `id_town` (`towncity`),
  KEY `id_towncity` (`towncity`),
  KEY `image` (`image`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='		' AUTO_INCREMENT=9 ;

--
-- Dumping data for table `parish`
--

INSERT INTO `parish` (`id_parish`, `keyword`, `parish`, `street`, `barangay`, `towncity`, `tnumber`, `image`, `url`, `description`) VALUES
(1, 'twohearts', 'Alliance of Two Hearts Parish', 8, 11, 2, '09228076111', 33, 'http://localhost/parishsite/index.php/parish/index/twohearts/Home', 'alliance is a very great church'),
(2, 'lourdes', 'Our Lady of Lourdes Parish', 1, 1, 1, '123123123', 7, 'http://localhost/parishsite/index.php/parish/index/lourdes/afufu', 'lourdes is a place like no other'),
(3, 'guadalupearchshrine', 'Archdiocesan Shrine of Our Lady of Guadalupe', 1, 1, 1, '123123123', 3, NULL, 'guadalupe is like no other place'),
(4, 'sacredheart', 'Our Lady of the Sacred Heart Parish - Capitol', 1, 1, 1, '123123123', 4, NULL, 'sacred heart is so sacred'),
(6, 'capitol', 'capitol capitan', 1, 1, 1, '123123123', 5, NULL, 'ang captain'),
(8, 'potato', 'potato', 1, 1, 1, '12312313', 1, NULL, 'mehehehehehehehhehehe');

-- --------------------------------------------------------

--
-- Table structure for table `reading`
--

CREATE TABLE IF NOT EXISTS `reading` (
  `id_reading` int(11) NOT NULL AUTO_INCREMENT,
  `firstReading` varchar(6000) NOT NULL DEFAULT 'reading not defined',
  `psalms` varchar(6000) NOT NULL DEFAULT 'psalms not defined',
  `id_language` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_reading`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `description`) VALUES
(1, 'General Admin'),
(2, 'Parish Admin');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(45) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(11) NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('44d553b58fe2d1135bf6b05b201b8f72', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36', 1417078970, 'a:1:{s:9:"user_data";a:3:{s:8:"username";s:5:"dummy";s:9:"id_parish";s:1:"1";s:4:"role";s:1:"2";}}'),
('70b5e4c75db036003c13ba5c9dae67c8', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36', 1417090061, ''),
('ba4ead91b9c252fdd9bf4f253e9b9866', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36', 1417149670, '');

-- --------------------------------------------------------

--
-- Table structure for table `street`
--

CREATE TABLE IF NOT EXISTS `street` (
  `id_street` int(11) NOT NULL AUTO_INCREMENT,
  `street` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_street`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `street`
--

INSERT INTO `street` (`id_street`, `street`) VALUES
(1, 'Balamban'),
(2, 'Bantayan'),
(3, 'Bogo'),
(4, 'DaanBantayan'),
(5, 'Carmen'),
(6, 'Catmon'),
(7, 'Consolacion'),
(8, 'Dumanjug'),
(9, 'Lapu-Lapu'),
(10, 'Toledo'),
(11, 'Lilo-an');

-- --------------------------------------------------------

--
-- Table structure for table `towncity`
--

CREATE TABLE IF NOT EXISTS `towncity` (
  `id_towncity` int(11) NOT NULL AUTO_INCREMENT,
  `towncity` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_towncity`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `towncity`
--

INSERT INTO `towncity` (`id_towncity`, `towncity`) VALUES
(1, 'Cebu'),
(2, 'Mandaue');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `id_parish` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_role` (`role`),
  KEY `id,parish` (`id_parish`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`, `id_parish`) VALUES
(44, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 0),
(45, 'dummy', '275876e34cf609db118f3d84b799a790', 2, 1),
(46, 'lourdes', '9618df17a1d242eed1275efef4bd6681', 2, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baptism_schedule`
--
ALTER TABLE `baptism_schedule`
  ADD CONSTRAINT `day_id` FOREIGN KEY (`day`) REFERENCES `day` (`id_day`),
  ADD CONSTRAINT `parish_id` FOREIGN KEY (`id_parish`) REFERENCES `parish` (`id_parish`);

--
-- Constraints for table `confession_schedule`
--
ALTER TABLE `confession_schedule`
  ADD CONSTRAINT `dayid` FOREIGN KEY (`day`) REFERENCES `day` (`id_day`),
  ADD CONSTRAINT `idparish` FOREIGN KEY (`id_parish`) REFERENCES `parish` (`id_parish`);

--
-- Constraints for table `confirmation_schedule`
--
ALTER TABLE `confirmation_schedule`
  ADD CONSTRAINT `id_day` FOREIGN KEY (`day`) REFERENCES `day` (`id_day`),
  ADD CONSTRAINT `parishid` FOREIGN KEY (`id_parish`) REFERENCES `parish` (`id_parish`);

--
-- Constraints for table `mass_schedule`
--
ALTER TABLE `mass_schedule`
  ADD CONSTRAINT `idday` FOREIGN KEY (`day`) REFERENCES `day` (`id_day`),
  ADD CONSTRAINT `id_language` FOREIGN KEY (`language`) REFERENCES `language` (`id_language`),
  ADD CONSTRAINT `id_parish` FOREIGN KEY (`id_parish`) REFERENCES `parish` (`id_parish`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `id-parish` FOREIGN KEY (`id_parish`) REFERENCES `parish` (`id_parish`);

--
-- Constraints for table `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `id.parish` FOREIGN KEY (`id_parish`) REFERENCES `parish` (`id_parish`);

--
-- Constraints for table `parish`
--
ALTER TABLE `parish`
  ADD CONSTRAINT `id_barangay` FOREIGN KEY (`barangay`) REFERENCES `barangay` (`id_barangay`),
  ADD CONSTRAINT `id_street` FOREIGN KEY (`street`) REFERENCES `street` (`id_street`),
  ADD CONSTRAINT `id_towncity` FOREIGN KEY (`towncity`) REFERENCES `towncity` (`id_towncity`),
  ADD CONSTRAINT `parish_ibfk_1` FOREIGN KEY (`image`) REFERENCES `image` (`image_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `id_role` FOREIGN KEY (`role`) REFERENCES `role` (`id_role`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
