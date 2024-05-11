-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 07:28 PM
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
-- Database: `blog_posts`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `restaurant` varchar(30) CHARACTER SET utf16 COLLATE utf16_estonian_ci NOT NULL,
  `date` date NOT NULL,
  `Hinnang` varchar(25) CHARACTER SET utf16 COLLATE utf16_estonian_ci NOT NULL,
  `img` text DEFAULT NULL,
  `comment` text CHARACTER SET utf16 COLLATE utf16_estonian_ci DEFAULT NULL,
  `Author` varchar(50) CHARACTER SET utf16 COLLATE utf16_estonian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_estonian_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `restaurant`, `date`, `Hinnang`, `img`, `comment`, `Author`) VALUES
(1, 'Hitomaki', '2024-02-24', '10/10', 'http://localhost/13.05.2024%20Blogile%20funktsionaalsus%20PDO/img/ramen.jpeg', 'Lorem ipsum dolor sit amet consectetur dolores molestias ipsam, expedita doloremque error placeat, officiis nisi voluptas dolor accusantium enim! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate saepe provident laborum consequuntur inventore odit aperiam unde quo amet iusto impedit excepturi ullam, magni eaque tempora iste perferendis, nisi quod!', 'Toit Maitsev, ToitMaitsev@hotmail.com'),
(3, 'Farm Burger', '2024-03-24', '3/10', 'http://localhost/13.05.2024%20Blogile%20funktsionaalsus%20PDO/img/kebab_fries.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae officiis velit, fugiat maiores quis commodi fuga temporibus consequuntur exercitationem? Sunt molestiae corporis quisquam aspernatur libero dolores possimus similique unde Lorem ipsum dolor sit amet consectetur adipisicing elit. At eius natus, quisquam nulla esse dignissimos? Doloribus facilis sapiente iste unde optio odit praesentium vero minima, incidunt vel tempore ut reprehenderit.', 'Toit Maitsev, ToitMaitsev@hotmail.com'),
(4, 'Päikseloojangu võre', '2024-03-24', '2/10', 'http://localhost/13.05.2024%20Blogile%20funktsionaalsus%20PDO/img/pasta.jpg', 'Lorem ipsum dolor sit amet exercitationem? Sunt molestiae corporis quisquam aspernatur libero dolores possimus similique unde', 'Toit Maitsev, ToitMaitsev@hotmail.com'),
(5, 'Alpide Nautingud', '2024-03-24', '8/10', 'http://localhost/13.05.2024%20Blogile%20funktsionaalsus%20PDO/img/salad.jpeg', 'Lorem ipsum dolor sit amet consectetur aes quis commodi fuga temr exercitationem? libero dolores possimus similique unde', 'Toit Maitsev, ToitMaitsev@hotmail.com'),
(6, 'Linna Maitsed', '2024-03-24', '6/10', 'http://localhost/13.05.2024%20Blogile%20funktsionaalsus%20PDO/img/chickenbreast.jpeg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae officiis velit, fugiat maiores quis commodi fuga temporibus consequuntur exercitationem? Sunt molestiae corporis quisquam aspernatur libero dolores possimus similique unde', 'Toit Maitsev, ToitMaitsev@hotmail.com'),
(7, 'Näljane tiiger', '2024-03-04', '9/10', 'http://localhost/13.05.2024%20Blogile%20funktsionaalsus%20PDO/img/chicken_gravy.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti et officiis culpa repudiandae ipsum aliquam, vel esse natus. Tempora numquam mollitia cumque obcaecati iste beatae pariatur. Voluptatum consectetur sit ducimus.', 'Toit Maitsev, ToitMaitsev@hotmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
