-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 28, 2020 at 05:22 PM
-- Server version: 5.7.31-0ubuntu0.18.04.1
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `email`, `image`, `pdf`, `password`, `birth_date`, `gender`, `phone`, `city`, `country`, `created_at`, `updated_at`) VALUES
(3, 'Jolie Gonzales', 'sate@mailinator.com', 'cbfa2864-aa66-48b6-a12f-f1a49df8df83.jpg', 'dacc3cb2-6a2c-4f2d-b3f4-792d4982a74b.pdf', '$2y$10$VydBkk0TDA0zDZNq1wgZbOBWrKhA85WeUHSFIXJCTCmAQADYc0GmW', '1986-08-09', 1, '+1 (173) 363-9214', 'Dolorum amet conseq', 'A ipsa quas nemo co', '2020-08-28 11:33:44', '2020-08-28 11:34:14'),
(4, 'Beverly Franks', 'cohut@mailinator.com', '0898f072-7105-4baa-bdc0-9ae0e615c99b.png', 'a551b808-e40f-418c-85ea-5d2e49948ecf.pdf', '$2y$10$Q/c92f9CLDpJVCNKtc201OLj3cWjj7q2bHcF5MnjGCetdI/EIgNMy', '2013-12-19', 0, '+1 (566) 385-1545', 'Facere et eveniet c', 'Mollitia aliquid et', '2020-08-28 11:34:38', '2020-08-28 11:48:37'),
(5, 'himani bhatt', 'himanibhatt1212@gmail.com', '85b3ec98-0d25-4813-8653-d6d6b3ed1ffd.jpeg', '77cf5304-3d5c-4528-8f04-ac19a99468fa.pdf', '$2y$10$eyU8yPXugcu9atbBTK6Xeu29n.KP/8J9Vu50cav.by1.DX6eAKHXK', '1995-12-12', 1, '32165456', 'bhavnagar', 'india', '2020-08-28 11:47:39', '2020-08-28 11:47:39'),
(6, 'himani bhatt', 'himanibhatt121295@gmail.com', '7d139416-0196-481f-8a82-a42b3c7cd327.jpeg', '000eb84e-31dc-48c2-a15f-fe3c43ef57d4.pdf', '$2y$10$nazeoTeCZJFVgKJO0F5P0edEVJpw7BECL0/QKlRJKNxVtGNFR1WFS', '1995-12-12', 1, '32165456', 'bhavnagar', 'india', '2020-08-28 11:47:48', '2020-08-28 11:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `candidates_logs`
--

CREATE TABLE `candidates_logs` (
  `id` int(11) NOT NULL,
  `status` varchar(25) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates_logs`
--

INSERT INTO `candidates_logs` (`id`, `status`, `name`, `email`, `image`, `pdf`, `password`, `birth_date`, `gender`, `phone`, `city`, `country`, `created_at`, `updated_at`) VALUES
(1, 'Created', 'himani bhatt', 'himanibhatt1212@gmail.com', '85b3ec98-0d25-4813-8653-d6d6b3ed1ffd.jpeg', '77cf5304-3d5c-4528-8f04-ac19a99468fa.pdf', '$2y$10$eyU8yPXugcu9atbBTK6Xeu29n.KP/8J9Vu50cav.by1.DX6eAKHXK', '1995-12-12', 1, '32165456', 'bhavnagar', 'india', '2020-08-28 11:47:39', '2020-08-28 11:47:39'),
(2, 'Created', 'himani bhatt', 'himanibhatt121295@gmail.com', '7d139416-0196-481f-8a82-a42b3c7cd327.jpeg', '000eb84e-31dc-48c2-a15f-fe3c43ef57d4.pdf', '$2y$10$nazeoTeCZJFVgKJO0F5P0edEVJpw7BECL0/QKlRJKNxVtGNFR1WFS', '1995-12-12', 1, '32165456', 'bhavnagar', 'india', '2020-08-28 11:47:48', '2020-08-28 11:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `note` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `note`, `created_at`, `updated_at`) VALUES
(1, 4, 'Lorem ipsum dolor sit amet.\r\nNullam ornare ex ut nulla tincidunt consectetur sit amet nec velit', '2020-08-28 11:39:55', '2020-08-28 11:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `note_tags`
--

CREATE TABLE `note_tags` (
  `id` int(11) NOT NULL,
  `note_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `note_tags`
--

INSERT INTO `note_tags` (`id`, `note_id`, `tag_id`) VALUES
(1, 1, 1),
(2, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `label`, `name`, `value`) VALUES
(1, 'Name', 'name', 1),
(2, 'Email', 'email', 1),
(3, 'Birth Date', 'birth_date', 0),
(4, 'Phone No.', 'phone', 0),
(5, 'Gender', 'gender', 1),
(6, 'City', 'city', 0),
(7, 'Country', 'country', 0),
(8, 'Image', 'image', 1),
(9, 'PDF', 'pdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Tag one', '2020-08-28 02:20:14', '2020-08-28 02:35:21'),
(3, 'Tag Two', '2020-08-28 02:35:26', '2020-08-28 02:35:26'),
(6, 'Tag three', '2020-08-28 03:33:44', '2020-08-28 03:33:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'user@admin.com', NULL, '$2y$10$TLk3EZC2TuL3XvxbXmhus.xL1kmmQJdyxUXg7CbRRh49HF0Bj9YGa', NULL, '2020-08-26 09:07:43', '2020-08-26 09:07:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates_logs`
--
ALTER TABLE `candidates_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note_tags`
--
ALTER TABLE `note_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `candidates_logs`
--
ALTER TABLE `candidates_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `note_tags`
--
ALTER TABLE `note_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
