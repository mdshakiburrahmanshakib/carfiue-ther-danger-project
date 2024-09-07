-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 06, 2024 at 09:33 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carfiue`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `city` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `city`, `address`, `phone`, `email`, `status`) VALUES
(1, 'Kushtia', 'Lahinipara, kumarkhali, Kushtia', '+880 1721-244430', 'mdshakiburrahman6@gmail.com', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `name`, `email`, `body`) VALUES
(1, 'shakib', 'mdshakib123741@gmail.com', 'Is it work'),
(2, 'no name', 'mdshakib123741@gmail.com', 'FAFds'),
(3, 'Mamun', 'mamunrmraju@gmail.com', 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `subtitle` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `subtitle`, `description`, `image`, `status`) VALUES
(4, 'Carfiue The Danger Project', 'Carfiue ', ' It is a Dynamic Portfolio Website. ', '17-Carfiue The Danger Project-06-09-2024-88-png', 'deactive'),
(5, 'Logo Design', 'sikhon', ' It is a logo of Shikhon Academy which is situated in Lahinipara, Kumarkhali, Kushtia. I was made it in 2023.', '17-Logo Design-06-09-2024-796-png', 'deactive');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `icon` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `icon`, `status`) VALUES
(5, 'Web Design', 'Transform your online presence with our custom web design services, delivering visually stunning, user-friendly websites that captivate and engage your audience.', 'fa fa-globe', 'active'),
(6, 'Web Development', '  Enhance your digital functionality with our web sites services, creating robust, scalable, and seamless websites tailored to your specific business needs. ', 'fa fa-database', 'active'),
(7, 'Graphics Design', ' Elevate your brands visual identity with our graphic design services, delivering creative and impactful designs that capture your message and resonate with your audience.', 'fa fa-paint-brush', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `image`, `description`, `name`, `title`, `status`) VALUES
(3, '14-Chat GPT-06-09-2024-239-png', ' [Web Developer’s Name] exceeded our expectations with a beautifully crafted, highly functional website. Their expertise and attention to detail were evident in every aspect of the project, from the design to the user experience. We’re thrilled with the outcome and would recommend them without hesitation. ', 'Chat GPT[Developer]', 'Most Famous AI Software right now', 'active'),
(4, '14-[Clients Name],-06-09-2024-86-jpeg', '[Graphics Designer’s Name] brought our vision to life with exceptional creativity and precision. Their designs not only captured our brand’s essence but also made a significant impact on our audience. We are thrilled with the results and highly recommend their expertise to anyone seeking standout visual solutions.', 'Chat GPT [Graphics]', 'Most Famous Ai Software right now.', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'default.png',
  `password` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `password`) VALUES
(1, 'lopaci', 'cykoqoca@mailinator.com', 'default.png', 'Pa$$w0rd!'),
(2, 'lopaci', 'cykoqoca@mailinator.com', 'default.png', 'Pa$$w0rd!'),
(3, 'byganywaj', 'fohumepe@mailinator.com', 'default.png', 'Pa$$w0rd!'),
(4, 'byganywaj', 'fohumepe@mailinator.com', 'default.png', 'Pa$$w0rd!'),
(5, 'zafehu', 'jokeko@mailinator.com', 'default.png', 'Pa$$w0rd!'),
(6, 'nydus', 'mude@mailinator.com', 'default.png', 'Pa$$w0rd!'),
(7, 'jedyvike', 'kesimi@mailinator.com', 'default.png', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(8, 'boxysam', 'cupucapepi@mailinator.com', 'default.png', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(9, 'xelexotu', 'zeho@mailinator.com', 'default.png', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(10, 'puduromyxe', 'hehiwohuju@mailinator.com', 'default.png', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(11, 'futyk', 'homyxugoc@mailinator.com', 'default.png', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(12, 'wifezec', 'jebicotaj@mailinator.com', '12-wifezec-06-09-2024-06-30-35am.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(13, 'afas', 'zosi@mailinator.com', 'default.png', 'da39a3ee5e6b4b0d3255bfef95601890afd80709'),
(14, 'Namechanged', 'wetemu@mailinator.com', '14-fukirudu-06-09-2024-07-07-13am.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(15, 'qowiwypijo', 'cavatybi@mailinator.com', 'default.png', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(16, 'kyxafoqil', 'licalys@mailinator.com', 'default.png', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(17, 'Md Shakibur Rahman', 'mdshakiburrahman6@gmail.com', '17-Md Shakibur Rahman-06-09-2024-09-03-43pm.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
