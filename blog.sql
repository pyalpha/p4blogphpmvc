-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2018 at 12:50 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `author`, `comment`, `comment_date`, `post_id`) VALUES
(3, 'testo', 'merci pour cet article', '2018-05-26 16:01:06', 31),
(4, 'admin', 'Merci', '2018-05-26 23:52:05', 31),
(5, 'admin', 'un autre commentaire', '2018-05-26 23:58:16', 31);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(31, 'Chapitre 1 : Lorem ipsum dolor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac est velit. Aenean eget nisl porttitor, eleifend nunc eget, finibus ligula. Duis ut risus nec urna aliquet pulvinar et eget sapien. Aenean aliquet lacus ut elit sagittis, vitae aliquet augue posuere. Etiam facilisis turpis bibendum erat consectetur, a gravida dolor aliquet. Aliquam pellentesque lorem eu massa facilisis finibus. Integer sodales commodo mi vitae scelerisque. In vel lorem cursus, rhoncus mauris venenatis, posuere lorem. Nunc tristique dolor et massa varius euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vitae tortor at enim vulputate vestibulum euismod ut ipsum. Integer pretium vehicula tellus quis faucibus. Donec porta rhoncus urna sed vestibulum. Fusce sed semper mauris, tempus convallis dui. Fusce tempor magna justo, ut aliquam urna sollicitudin id.\r\n\r\n', '2018-05-26 13:58:57'),
(32, 'Chapitre 2 : Etiam tincidunt ipsum', 'Etiam tincidunt ipsum quis arcu malesuada faucibus. Proin dui mi, pretium ac ligula sit amet, tempus vestibulum libero. Donec lobortis sapien in tortor consequat efficitur. Mauris sit amet facilisis mi. Fusce euismod elit vel accumsan pretium. Integer ut lacinia augue. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus sollicitudin nulla sit amet maximus imperdiet.\r\n\r\n', '2018-05-26 13:59:37'),
(33, 'Chapitre 3 : In euismod pretium', 'In euismod pretium feugiat. Curabitur vitae est purus. Aliquam mi ligula, eleifend a odio in, placerat egestas massa. Quisque mattis purus et erat pulvinar, id pharetra leo porttitor. Fusce quis dapibus felis. Cras venenatis egestas nisl, id luctus diam dictum ut. Proin iaculis mauris tellus, sit amet efficitur urna fringilla at. Quisque scelerisque facilisis ante, quis feugiat justo. Ut pellentesque consequat nisi, at elementum est rhoncus quis.\r\n\r\n', '2018-05-26 13:59:54'),
(34, 'Chapitre 4 : Morbi eleifend sit', 'Morbi eleifend sit amet nibh non vestibulum. Praesent varius porttitor felis nec fringilla. Aliquam sagittis, nisi sit amet sodales sollicitudin, sapien erat tincidunt mauris, cursus varius justo mauris ut odio. Aliquam mauris risus, dictum at metus et, commodo malesuada erat. Aliquam metus neque, fringilla a sapien eu, mollis porttitor mauris. Nam sed rhoncus magna. Sed mattis orci quis porta feugiat. Quisque sit amet orci lobortis enim ullamcorper viverra eget imperdiet tellus. Integer vitae elementum tortor. Nulla ut mi iaculis, bibendum elit sit amet, lobortis magna. Donec sit amet facilisis augue. Aliquam nec varius purus. Nullam varius et elit ac aliquet. Phasellus blandit velit nibh, vel fermentum quam mollis sit amet. Nullam aliquet arcu et hendrerit consequat. Nam sit amet ultrices risus.\r\n\r\n', '2018-05-26 14:00:10'),
(35, 'Chapitre 5 : Morbi ut dignissim', 'Morbi ut dignissim nulla. Donec pellentesque consectetur urna non varius. Pellentesque malesuada nec lectus in malesuada. Proin volutpat lacinia metus, non elementum felis cursus eget. Etiam nec libero vitae nulla venenatis elementum ut sit amet massa. Curabitur non diam quis lectus varius varius in nec felis. Morbi ut ullamcorper libero, quis venenatis mi. Pellentesque metus felis, euismod nec laoreet vitae, eleifend id libero. Sed dictum convallis elit, ac ultrices tellus finibus dignissim. Fusce lorem massa, lobortis consectetur enim sit amet, faucibus accumsan justo. In hac habitasse platea dictumst. Nam in cursus nulla. Maecenas convallis lacus ac nulla tempus dignissim. Nulla vel enim nibh.\r\n\r\n', '2018-05-26 14:00:30'),
(36, 'Chapitre 6 : Nullam neque arcu', 'Nullam neque arcu, vulputate sed ex ut, iaculis fermentum massa. Morbi mollis eleifend velit et eleifend. Donec consequat porta sollicitudin. Curabitur at augue quis sapien egestas tristique nec et ante. Aenean commodo id felis in laoreet. Donec viverra lacus purus, sed dictum turpis consectetur non. Nullam laoreet orci sit amet velit euismod tincidunt. Duis eleifend nibh quis mauris cursus tempus. Vivamus facilisis maximus auctor. Proin viverra lectus justo, tempor sagittis tortor dictum sed. In aliquet augue non purus suscipit commodo. Nulla sit amet turpis arcu.\r\n\r\n', '2018-05-26 14:00:51'),
(37, 'Chapitre 7 : Sed tincidunt suscipit', 'Sed tincidunt suscipit dolor, a elementum elit cursus ac. Proin facilisis odio eget leo pretium, ultrices rhoncus purus interdum. Aenean finibus facilisis metus et rhoncus. Phasellus ultricies tortor at aliquet tempus. Donec molestie dignissim neque, vitae mattis nibh condimentum at. Etiam sapien quam, lobortis a est vel, lacinia hendrerit orci. Nam urna dui, vestibulum eu auctor a, ornare et urna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent semper velit id arcu elementum commodo. Sed pretium nisi rutrum, fermentum lorem ac, efficitur ipsum. In sodales sit amet arcu egestas maximus. Donec vel lobortis mi. Mauris facilisis ac dui accumsan accumsan. Mauris dignissim lacus lacus, in pharetra dolor condimentum eget. Mauris eget rutrum augue, non ultricies augue. Etiam fringilla non libero non ultricies.\r\n\r\n', '2018-05-26 14:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `reported_comments`
--

CREATE TABLE `reported_comments` (
  `comment_id` int(11) NOT NULL,
  `report_date` datetime NOT NULL,
  `reported_by` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reported_comments`
--

INSERT INTO `reported_comments` (`comment_id`, `report_date`, `reported_by`, `reason`) VALUES
(2, '2018-05-19 01:32:40', 'admin', 'comme ça'),
(4, '2018-05-27 01:45:36', 'admin', 'test de report');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sign_up_date` datetime NOT NULL,
  `rank` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `sign_up_date`, `rank`) VALUES
(4, 'admin', '$2y$10$wXgOzWmwlw8MgeoAOnri4ugI8NTxgFJWyidKUHX7YsLcBkZUnXUDK', 'bowow007@gmail.com', '2018-05-17 15:28:46', 'admin'),
(6, 'demo', '$2y$10$B8M27OrRCI4fVaMv6UAWh.oD0wYLTqkFft/aJLI8sl5nfvQEQhbI.', 'toutdown@gmail.com', '2018-05-19 01:54:30', 'default_user'),
(9, 'testo', '$2y$10$J4RjfWo8tvipuboJ.aIKje6tgodbV21QmUJYBMbBSq5yGt5B8rGEa', 'teq@gmail.com', '2018-05-26 15:58:48', 'default_user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reported_comments`
--
ALTER TABLE `reported_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `reported_comments`
--
ALTER TABLE `reported_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
