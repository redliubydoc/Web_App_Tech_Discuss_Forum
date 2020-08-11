-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 14, 2020 at 09:42 PM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answer_id` int(10) NOT NULL,
  `answer_thread_id` int(10) NOT NULL,
  `answer_user_id` int(10) NOT NULL,
  `answer_answer` text NOT NULL,
  `answer_creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answer_id`, `answer_thread_id`, `answer_user_id`, `answer_answer`, `answer_creation_time`) VALUES
(1, 1, 1, '1. Open terminal\r\n2. Type $sudo apt-get install python3 && -y\r\n3. It will prompt your admin password\r\n4. Type your admin password and hit enter\r\n5. It will automatically download all packages and will install python in your device\r\n6. After everything is done type $python3 to run python 3 shell', '2020-07-14 13:16:18'),
(2, 1, 29, 'you can algo use software manager of Linix Mint to install Python interpreater graphically', '2020-07-14 13:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(500) NOT NULL,
  `category_creation_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `category_creation_time`, `category_user_id`) VALUES
(1, 'Python', 'Python is an interpreted, high-level, general-purpose programming language. Created by Guido van Rossum and first released in 1991, Python\'s design philosophy emphasizes code readability with its notable use of significant whitespace.', '2020-07-10 00:01:16', 1),
(2, 'Java', 'Java is a general-purpose programming language that is class-based, object-oriented, and designed to have as few implementation dependencies as possible', '2020-07-10 00:03:15', 1),
(3, 'Javascript', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. JavaScript is high-level, often just-in-time compiled, and multi-paradigm. It has curly-bracket syntax, dynamic typing, prototype-based object-orientation, and first-class functions.', '2020-07-10 00:04:23', 1),
(4, 'C programming', 'C is a general-purpose, procedural computer programming language supporting structured programming, lexical variable scope, and recursion, with a static type system. By design, C provides constructs that map efficiently to typical machine instructions.', '2020-07-11 12:42:57', 1),
(5, 'C++', 'C++ is a general-purpose programming language created by Bjarne Stroustrup as an extension of the C programming language, or &quot;C with Classes&quot;.', '2020-07-14 20:25:12', 29),
(10, 'PHP', 'PHP is a popular general-purpose scripting language that is especially suited to web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994; the PHP reference implementation is now produced by The PHP Group.', '2020-07-14 20:42:23', 29);

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(10) NOT NULL,
  `thread_category_id` int(10) NOT NULL,
  `thread_user_id` int(10) NOT NULL,
  `thread_topic` varchar(500) NOT NULL,
  `thread_description` text,
  `thread_creation_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_category_id`, `thread_user_id`, `thread_topic`, `thread_description`, `thread_creation_time`) VALUES
(1, 1, 1, 'Install Python', 'I use Linux Mint 19.2, how can I install python3 in it using terminal', '2020-07-12 18:36:12'),
(2, 1, 1, 'How to install pip3', 'How to install pip3 in linux mint using terminal', '2020-07-12 18:58:57'),
(18, 1, 1, 'How to install pandas', 'how to install pandas in Python3', '2020-07-12 23:35:16'),
(19, 2, 1, 'why java is called both interpreted and compiled language', 'why java is called both interpreted and compiled language?', '2020-07-12 23:36:12'),
(20, 5, 1, 'C++ : C with classes', 'why C++ is called C with classes? ', '2020-07-12 23:41:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_email_id` varchar(500) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_creation_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email_id`, `user_password`, `user_creation_time`) VALUES
(1, 'raj', 'admin@admin.com', '$2y$10$tnwWc7ID0xsjbUqQWf4Wz.flHIIXhE8vGIsgbbWO7viUXKroFyrcS', '2020-07-14 18:19:12'),
(29, 'ritam', 'ritam@gmail.com', '$2y$10$wsPq8u6VNk8kPxWvptH2EO0yzT9ZmLLtoD5cTFTI6fm9HrhQwcuaG', '2020-07-14 19:22:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_topic` (`thread_topic`,`thread_description`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
