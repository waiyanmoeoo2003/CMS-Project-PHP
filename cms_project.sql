-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2022 at 07:02 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`) VALUES
(1, 'Sport'),
(2, 'Education'),
(3, 'Science'),
(5, 'WebDesign'),
(6, 'WebDevelopment'),
(7, 'Machine Learning'),
(8, 'Security'),
(9, 'Cloud'),
(10, 'Internation News');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `comment_post_id` int(100) NOT NULL,
  `comment_user` varchar(100) NOT NULL,
  `comment_email` varchar(100) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_status` int(11) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `comment_post_id`, `comment_user`, `comment_email`, `comment_text`, `comment_status`, `comment_date`) VALUES
(1, 17, 'mgmg', 'mgmg@gmail.com', 'lorem ....', 1, '2020-11-29'),
(2, 17, 'koko', 'koko@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.', 1, '2020-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(100) NOT NULL,
  `post_category_id` int(100) NOT NULL,
  `post_author` varchar(100) NOT NULL,
  `post_image` varchar(100) NOT NULL,
  `post_content` text NOT NULL,
  `post_tag` varchar(100) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_view_count` int(11) NOT NULL,
  `post_status` int(11) NOT NULL,
  `post_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_category_id`, `post_author`, `post_image`, `post_content`, `post_tag`, `post_comment_count`, `post_view_count`, `post_status`, `post_date`) VALUES
(1, '2020 CoronaVirus News', 10, 'mgmg', 'image_1.png', '<p><em>Lorem</em>&nbsp;ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero&#39;s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n', 'Internation , Health , Disease', 0, 0, 1, '2020-11-26'),
(2, '2020 FootBall News', 1, 'Erwin Smith', 'image_7.jpg', '<p><em>Lorem</em>&nbsp;ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero&#39;s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n', 'football , champion league', 0, 0, 1, '2020-11-28'),
(3, 'PHP CRUD', 6, 'KgKg', 'image_4.jpg', '<p><em>Lorem</em>&nbsp;ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero&#39;s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n', 'php , pure basic', 0, 0, 1, '2020-11-30'),
(4, 'Linux File System', 8, 'KyawSwar', 'image_10.jpg', '<p><em>Lorem</em>&nbsp;ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero&#39;s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n', 'Linux , OS', 0, 0, 1, '2020-11-27'),
(5, 'Diploma  In Computin Level 4', 2, 'Griffith', 'image_6.jpg', '<p><em>Lorem</em>&nbsp;ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero&#39;s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n', 'IT , Web , Robots ,', 0, 0, 1, '2020-11-27'),
(6, '2020 FootBall News', 1, 'Erwin Smith', 'image_7.jpg', '<p><em>Lorem</em>&nbsp;ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero&#39;s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n', 'football , champion league', 0, 0, 1, '2020-11-28'),
(7, 'PHP CRUD', 6, 'KgKg', 'image_4.jpg', '<p><em>Lorem</em>&nbsp;ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero&#39;s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n', 'php , pure basic', 0, 0, 1, '2020-11-30'),
(8, 'Linux File System', 8, 'KyawSwar', 'image_10.jpg', '<p><em>Lorem</em>&nbsp;ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero&#39;s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n', 'Linux , OS', 0, 0, 1, '2020-11-27'),
(9, 'Diploma  In Computin Level 4', 2, 'Griffith', 'image_6.jpg', '<p><em>Lorem</em>&nbsp;ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero&#39;s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n', 'IT , Web , Robots ,', 0, 0, 1, '2020-11-27'),
(10, '2020 CoronaVirus News', 10, 'mgmg', '1228564765_image_1.png', '<p><em>Lorem</em>&nbsp;ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero&#39;s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n', 'Internation , Health , Disease', 0, 0, 1, '2020-11-26'),
(11, '2020 FootBall News', 1, 'Erwin Smith', '1023654558_image_7.jpg', '<p><em>Lorem</em>&nbsp;ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero&#39;s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n', 'football , champion league', 0, 0, 1, '2020-11-28'),
(12, 'PHP CRUD', 6, 'KgKg', '1594915645_image_4.jpg', '<p><em>Lorem</em>&nbsp;ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero&#39;s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n', 'php , pure basic', 0, 0, 1, '2020-11-30'),
(13, 'Linux File System', 8, 'KyawSwar', '1197499389_image_10.jpg', '<p><em>Lorem</em>&nbsp;ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero&#39;s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n', 'Linux , OS', 0, 0, 1, '2020-11-27'),
(14, 'Diploma  In Computin Level 4', 2, 'Griffith', '47353131_image_6.jpg', '<p><em>Lorem</em>&nbsp;ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero&#39;s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n', 'IT , Web , Robots ,', 0, 0, 1, '2020-11-27'),
(15, '2020 FootBall News', 1, 'Erwin Smith', '139400985_image_7.jpg', '<p><em>Lorem</em>&nbsp;ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero&#39;s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n', 'football , champion league', 0, 0, 1, '2020-11-28'),
(16, 'PHP CRUD', 6, 'KgKg', '1760711168_image_4.jpg', '<p><em>Lorem</em>&nbsp;ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero&#39;s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n', 'php , pure basic', 0, 0, 1, '2020-11-30'),
(17, 'Linux File System', 8, 'KyawSwar', '274488531_image_10.jpg', '<p><em>Lorem</em>&nbsp;ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero&#39;s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n', 'Linux , OS', 2, 55, 1, '2020-11-27'),
(18, 'Diploma  In Computin Level 4', 2, 'Griffith', '1148161258_image_6.jpg', '<p><em>Lorem</em>&nbsp;ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero&#39;s De Finibus Bonorum et Malorum for use in a type specimen book.</p>\r\n', 'IT , Web , Robots ,', 0, 8, 1, '2020-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `useremail` varchar(100) NOT NULL,
  `userpassword` varchar(100) NOT NULL,
  `userrole` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `useremail`, `userpassword`, `userrole`) VALUES
(1, 'mgmg', 'mgmg@gmail.com', '$2y$10$djhFJm28j/0EapsUZyxwBuqd2hA2k0Vef159Neu9XydovcXEdYk7.', 'admin'),
(2, 'koko', 'koko@gmail.com', '$2y$10$QbaXvLznlzZcDKnfcys/O.GSL.ZoZS.iHMDEbNVckVjMtN0pZJZ6e', 'subscriber'),
(4, 'agag', 'koko@gmail.com', 'agag', 'subscriber'),
(5, 'username', 'john@gmail.com', '$2y$10$IOSVXWOUPKz4CIWQ/fprse7Q0VtC9lDeY8GXc79SdqV6y/j9xHWpm', 'subscriber'),
(6, 'username', 'agag@gmail.com', '$2y$10$wy/5zIsLuIwJEEIHtK9zaOAfphthFOZ/calvL4UMzbUftNFMhBp72', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
