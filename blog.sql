-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2015 at 09:02 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_entries`
--

CREATE TABLE IF NOT EXISTS `blog_entries` (
`e_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `summary` text NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `author` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_entries`
--

INSERT INTO `blog_entries` (`e_id`, `u_id`, `title`, `summary`, `content`, `date`, `author`) VALUES
(9, 1, 'Programming!', 'A programming language is a formal constructed language designed to communicate instructions to a machine, particularly a computer.', 'Programming languages can be used to create programs to control the behavior of a machine or to express algorithms.', '2015-10-07 16:10:50', 'mh'),
(10, 1, 'Movie Martian', 'The Martian is a 2015 American[nb 1] science fiction film directed by Ridley Scott and starring Matt Damon.', 'he film is based on Andy Weir''s 2011 novel The Martian, which was adapted into a screenplay by Drew Goddard. Damon stars as an astronaut who is incorrectly presumed dead and left behind on the planet Mars, and who then fights to survive. The film also features Jessica Chastain, Kristen Wiig, Jeff Daniels, Michael Peña, Kate Mara, Sean Bean, Sebastian Stan, Aksel Hennie, and Chiwetel Ejiofor in supporting roles.\r\n\r\nProducer Simon Kinberg began developing the film after 20th Century Fox optioned the novel in March 2013. Drew Goddard adapted the novel into a screenplay and was initially attached to direct, but the film did not move forward. Ridley Scott replaced Goddard, and with Damon in place as the main character, production was green-lit.', '2015-10-07 16:12:14', 'gm'),
(11, 9, 'whatever', 'whatever', 'whatever', '2015-10-07 00:00:00', 'maddy'),
(12, 10, 'wow', 'meaning', 'i don''t knw', '2015-10-06 00:00:00', 'vmh'),
(13, 9, 'test', 'test again', 'test again', '2015-10-07 00:00:00', 'hvm'),
(14, 8, 'test', 'test', 'test', '2015-10-07 00:45:00', 'hvm'),
(15, 1, 'Test', 'Test', 'testkjsdknkdfg', '2015-10-08 10:28:32', ''),
(16, 1, 'test3', 'testagain', 'testjhgjhghhj hgchgvh\r\njvgjgvj\r\nhgvgjvjgvjg', '2015-10-08 10:35:40', 'test3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `password`, `email`) VALUES
(1, 'test', 'test', 'test', 'test@gmail.com'),
(6, 'madhulika', 'mh', 'mh', 'hmadhulika@gmail.com'),
(7, 'madhulika', 'mh', 'mg', 'hmadhulika@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_entries`
--
ALTER TABLE `blog_entries`
 ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_entries`
--
ALTER TABLE `blog_entries`
MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
