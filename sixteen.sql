-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Po 18.Dec 2023, 11:37
-- Verzia serveru: 10.4.14-MariaDB
-- Verzia PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `sixteen`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `admin`
--

CREATE TABLE `admin` (
                         `id` int(11) NOT NULL,
                         `username` varchar(30) NOT NULL,
                         `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
    (1, 'bpiatrik', '123');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `contact`
--

CREATE TABLE `contact` (
                           `full_name` varchar(64) NOT NULL,
                           `email` varchar(32) NOT NULL,
                           `subject` varchar(32) NOT NULL,
                           `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `contact`
--

INSERT INTO `contact` (`full_name`, `email`, `subject`, `msg`) VALUES
                                                                   ('asd', 'asd', 'asd', 'asd'),
                                                                   ('helo', 'asd', 'fasz ', 'aaaaa');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `nav`
--

CREATE TABLE `nav` (
                       `id` int(11) NOT NULL,
                       `name` varchar(30) NOT NULL,
                       `url` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `nav`
--

INSERT INTO `nav` (`id`, `name`, `url`) VALUES
                                            (1, 'Home', 'index.php'),
                                            (2, 'Our Products', 'products.php'),
                                            (3, 'About Us', 'about.php'),
                                            (4, 'Contact Us', 'contact.php');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `products`
--

CREATE TABLE `products` (
                            `id` int(11) NOT NULL,
                            `name` varchar(30) NOT NULL,
                            `price` decimal(10,2) NOT NULL,
                            `properties` text NOT NULL,
                            `stars` int(5) NOT NULL,
                            `img_src` varchar(126) NOT NULL,
                            `featured` tinyint(4) DEFAULT NULL,
                            `flash_deal` tinyint(4) DEFAULT NULL,
                            `last_minute` tinyint(4) DEFAULT NULL,
                            `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `properties`, `stars`, `img_src`, `featured`, `flash_deal`, `last_minute`, `date`) VALUES
                                                                                                                                      (1, 'Hiking Shoes', '39.99', 'Durable, grippy hiking shoes for superior traction and comfort on rugged trails. Ready for any adventure.', 4, 'assets/images/product_01.jpg', 1, 0, 0, '2023-12-10 20:28:44'),
                                                                                                                                      (2, 'Knitted Wool Cap', '9.99', 'Cozy wool hat, providing warmth and style for chilly days with a touch of comfort and fashion.', 3, 'assets/images/product_02.jpg', 0, 0, 0, '2023-12-10 20:39:51'),
                                                                                                                                      (3, 'Headscarf', '15.99', 'Elegant headscarf offering style and versatility, perfect for adding a touch of flair to any outfit.', 5, 'assets/images/product_03.jpg', 0, 1, 0, '2023-12-10 20:31:12'),
                                                                                                                                      (4, 'Snowmen', '24.99', 'Adorable snowmen plushies, soft and cuddly, bring winter joy with their charming smiles and warmth.', 4, 'assets/images/product_04.jpg\r\n', 0, 0, 1, '2023-12-18 08:06:35'),
                                                                                                                                      (5, 'Cozy grey/blue sweater', '39.99', 'An essential for colder days. Its soft knit and versatile hues offer both comfort and timeless style, effortlessly elevating your winter wardrobe.', 4, 'assets/images/product_05.jpg', 1, 0, 0, '2023-12-18 08:06:35'),
                                                                                                                                      (6, 'Xmas decor', '9.99', 'Charming snowman figures and festive characters, crafted with love, adding personalized warmth to your tree.\r\n\r\n\r\n\r\n\r\n\r\n', 3, 'assets/images/product_01.jpg', 0, 0, 0, '2023-12-18 08:09:40');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `services`
--

CREATE TABLE `services` (
                            `id` int(11) NOT NULL,
                            `name` varchar(30) NOT NULL,
                            `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `services`
--

INSERT INTO `services` (`id`, `name`, `description`) VALUES
                                                         (1, 'Product Management', 'Crafting excellence from concept to creation, orchestrating innovation for products that resonate and inspire.'),
                                                         (2, 'Customer Relations', 'Our dedicated team ensures personalized care, building lasting connections with every inquiry, concern, or commendation.'),
                                                         (3, 'Global Collection', 'A curated ensemble of diverse styles, uniting fashion from around the world to redefine your wardrobe.');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `team`
--

CREATE TABLE `team` (
                        `id` int(11) NOT NULL,
                        `full_name` varchar(30) NOT NULL,
                        `position` varchar(30) NOT NULL,
                        `description` text NOT NULL,
                        `img_src` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `team`
--

INSERT INTO `team` (`id`, `full_name`, `position`, `description`, `img_src`) VALUES
                                                                                 (1, 'Johnny William', 'CO-Founder', 'Williams, co-founder of a sixteen clothing webshop, curates timeless fashion for your distinctive style journey', '	 assets/images/team_01.jpg'),
                                                                                 (2, 'Karry Pitcher', 'Product Expert', 'Guiding you through curated selections with expert insights and passion.', '	 assets/images/team_02.jpg'),
                                                                                 (3, 'Michael Soft', 'Chief Marketing', 'Our Chief Marketing Officer, crafts compelling campaigns that elevate our brand and captivate audiences.', '	 assets/images/team_03.jpg'),
                                                                                 (4, 'Mary Cool', 'Product Specialist', 'Our Product Specialist, brings expertise and flair to ensure you discover standout selections effortlessly.', '	 assets/images/team_04.jpg'),
                                                                                 (5, 'George Walker', 'Product Photographer', 'Our Product Photographer, captures the essence of style, transforming every detail into visual perfection.', '	 assets/images/team_05.jpg'),
                                                                                 (6, 'Kate Town', 'General Manager', 'Our General Manager, orchestrates seamless operations, ensuring a superb experience for all our valued customers.', '	 assets/images/team_06.jpg');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `admin`
--
ALTER TABLE `admin`
    ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `nav`
--
ALTER TABLE `nav`
    ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `products`
--
ALTER TABLE `products`
    ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `services`
--
ALTER TABLE `services`
    ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `team`
--
ALTER TABLE `team`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `admin`
--
ALTER TABLE `admin`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pre tabuľku `nav`
--
ALTER TABLE `nav`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pre tabuľku `products`
--
ALTER TABLE `products`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pre tabuľku `services`
--
ALTER TABLE `services`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pre tabuľku `team`
--
ALTER TABLE `team`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
