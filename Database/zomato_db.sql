-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2024 at 09:28 AM
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
-- Database: `zomato_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `image_url`) VALUES
(2, 'Juicy Burger', 'A juicy burger with a sesame seed bun, savory beef patty, melted cheese, crispy bacon, fresh lettuce, tomatoes, pickles, and a drizzle of tangy sauce, served with golden fries for the ultimate meal!', 'https://files.oaiusercontent.com/file-VrJyjZaiALMxNeuunGX8S2?se=2024-11-22T22%3A34%3A32Z&sp=r&sv=2024-08-04&sr=b&rscc=max-age%3D604800%2C%20immutable%2C%20private&rscd=attachment%3B%20filename%3Ddbe8cb32-97e4-407e-af44-7dc9f4ce5c81.webp&sig=PndSis1VUpI5KhFTN3EYJkg0pKZb7Sbo2Hc7Lnk0ANo%3D'),
(3, 'Paneer Tikka Wrap', 'Paneer Tikka Wrap: Soft tortilla stuffed with grilled paneer, crunchy veggies, and a tangy mint chutney.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmbUyTIK7wOhywAJ3MpDeYZKQKP8b0xVGwTA&s'),
(4, 'Vegetable Biryani', 'Aromatic basmati rice cooked with mixed vegetables, fragrant spices, and served with raita.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0brUP7M08wjQPCOZHRi69Zy-8Q-VUlX9ryA&s'),
(5, 'Spinach and Corn Sandwich', 'Freshly toasted bread filled with creamy spinach and sweet corn filling.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRC6vyUzdod7pN9dGRkCPNHuWMqeAhThrg6Gw&s'),
(6, 'Vegetable Manchurian', 'Vegetable Manchurian: Crispy vegetable balls tossed in a spicy, tangy Indo-Chinese sauce.\r\n\r\n', 'https://media.istockphoto.com/id/1208083887/photo/freshly-prepared-veg-manchurian-with-a-bowl-of-fried-rice.jpg?s=612x612&w=0&k=20&c=nTtgKk-SSQAh1E0Pz8SnpGjqMRSIIXM6XiDHIsd5LDQ='),
(7, 'Pasta Primavera', 'Pasta Primavera: Penne pasta cooked with a medley of colorful vegetables in a creamy white sauce.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWfltfU_1CCKLqBqRxxVLFdwHuAlSI4Vjntw&s'),
(8, 'Hummus and Pita Platter', 'Smooth chickpea hummus served with warm pita bread and fresh veggie sticks.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRaMPTvwYiZDW9wG1f-4pmoxdqbl75bH7ccQA&s'),
(9, 'Paneer Butter Masla', 'A rich and creamy North Indian curry made with soft paneer cubes simmered in a luscious tomato-based gravy, flavored with butter, aromatic spices, and garnished with fresh cream and coriander leaves. Perfectly paired with naan or steamed rice for a wholesome meal!', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTiFC3gGrhb08jFJV7mmBNNazXpTIEVxWJIRA&s'),
(37, 'Fresh Garden Salad', 'A colorful mix of crisp lettuce, juicy cherry tomatoes, sliced cucumbers, crunchy bell peppers, shredded carrots, and red onions, topped with a light olive oil dressing and a sprinkle of herbs. Perfect as a refreshing and healthy choice!', 'https://img.freepik.com/premium-photo/3d-illustration-plate-with-vegan-food-generative-ai_170984-5098.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `restaurant_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_url` text NOT NULL,
  `rating` float NOT NULL,
  `price_per_person` varchar(50) NOT NULL,
  `delivery_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `restaurant_name`, `description`, `image_url`, `rating`, `price_per_person`, `delivery_time`) VALUES
(1, 'Burger King', 'Burger, Fast Food, Desserts, Shake\r\nSector 63, Noida', 'https://b.zmtcdn.com/data/pictures/chains/8/310078/5f22edaa3391108ad75776b4cbce296e.jpg?fit=around|771.75:416.25&crop=771.75:416.25;*,*', 3.9, '199 Rs', '25 minutes '),
(3, 'Subway', 'Healthy Food, Sandwich, Fast Food, Wraps, Salad, Beverages', 'https://b.zmtcdn.com/data/pictures/chains/7/147/b89546e26e25b8b55857ff5183c637e2.jpg?fit=around|771.75:416.25&crop=771.75:416.25;*,*', 4, '299 Rs', '35 minutes '),
(6, 'Wraps Kathi Rolls', 'Rolls, Wraps, Momos, Shawarma, Biryani', 'https://b.zmtcdn.com/data/pictures/2/20842822/dcb94f9a89089da3028c79117086d647_o2_featured_v2.jpg?output-format=webp&fit=around|771.75:416.25&crop=771.75:416.25;*,*', 4.1, '99 Rs', '40 minutes'),
(16, 'Cafe Coffee Day', 'Cafe, Bakery, Tea, Shake, Beverages, Sandwich, Desserts', 'https://b.zmtcdn.com/data/pictures/chains/3/593/f956ddd8f1f2536e2fcbaaf526e95426.jpg?fit=around|771.75:416.25&crop=771.75:416.25;*,*', 4.4, '299 Rs', '30 minutes');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `date`) VALUES
(1, 'a', 'sd', 'sd', '2024-11-24 23:02:37'),
(2, 'test', 'test@test.com', 'test', '2024-11-24 23:06:11'),
(5, 'admin', 'admin@gmail.com', 'admin123', '2024-11-25 00:42:30'),
(6, 'manayav', 'manayav@gmail.com', 'manayav@123', '2024-11-25 01:18:36'),
(7, 'akarsh09', 'akarsh0@gmail.com', 'qwerty1234', '2024-11-25 02:01:15'),
(8, 'suckcham', 'suckcham@gmail.com', '1234', '2024-11-25 05:02:13'),
(9, 'deepanshu', 'deep@gmail.com', '12345', '2024-11-25 11:23:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `restaurant_name` (`restaurant_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
