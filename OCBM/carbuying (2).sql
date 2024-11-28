-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2024 at 04:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carbuying`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `doc` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `doc`, `title`, `description`, `created_on`, `updated_on`) VALUES
(6, 'goal.jpg', 'Our Goal', 'Our goal to provide you a best car so that you can buy your dream car . we will stay with you forever . we will provide you best services The goal is that, when they call your dealership or come visit your showroom, they already have some sense of what they want, what makes your dealership unique, and what the next steps should be. Know that you have the right content to produce well-informed buyers.', '2024-03-06 16:18:55', '2024-03-06 16:18:55'),
(7, 'WORK.jpg', 'Our Work', 'Our work is to construct a complete ecosystem for consumers and car manufacturers, dealers and related businesses such that consumers have easy and complete access to not only buying and selling cars, but also manage their entire ownership experience, be it accessories, tyres, batteries, insurance or roadside assistance.', '2024-03-06 16:22:11', '2024-03-06 16:22:11'),
(12, 'passion.jpg', 'Our Passion', 'Integer Dapibus, Est Vel Dapibus Mattis, Sem Mauris Luctus Leo, Ac Pulvinar Quam Tortor A Velit. Praesent Ultrices Erat Ante, In Ultricies Augue Ultricies Faucibus. Nam Tellus Nibh, Ullamcorper At Mattis Non, Rhoncus Sed Massa. Cras Quis Pulvinar Eros. Orci Varius Natoque Penatibus Et Magnis Dis Parturient Montes, Nascetur Ridiculus Mus. Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Doloremque Ut Accusantium Cum! Ad Quisquam, Aut Praesentium Magni Pariatur Ipsa! Soluta Deserunt Accusantium Repellendus Ratione Quam Hic Facere, Cupiditate Iste Obcaecati A, Officiis Ipsum Aspernatur In?', '2024-03-14 18:33:07', '2024-03-14 18:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `sno` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sno`, `username`, `password`, `dt`) VALUES
(2, 'r', '$2y$10$Ge23HUq3IPzaHuFJvUdQeeoMepiQzuTU3QMvnyVO8nsHN8lSWq0/e', '2024-03-05 11:28:37'),
(3, 'rn', '$2y$10$UGG9lMgvr/U41bav.cErdeM05pPwUcAHMmFL7/8Y4IwLCerMWgTB.', '2024-03-05 11:32:01'),
(13, 'x', '$2y$10$OJsunVDz5CAyqaV6Uo5.HOIQdw.2CI/7peWWE5jvAtJ/iV2T/WqOy', '2024-03-05 12:04:19'),
(20, 'Riya ', '$2y$10$7qKkD8WZXKwbC6dEwMX.YeQ1ESYTbrUcYPE6xXL.Y.9TEOBSKUhN6', '2024-03-05 12:20:56'),
(24, 'g', '$2y$10$Y7mNHicrTusrRfxD9.7LDurXKP93fpnkcEIJLpy7dp56BdoDT3QRO', '2024-03-06 12:27:34'),
(25, 'asfvb', '$2y$10$pS4WWiKjkWgUNsaEFnasVORw0sYuMIQPxdbxa44iD34lwmPJ9oSfi', '2024-03-06 12:28:07'),
(26, 'd', '$2y$10$myRjoCEV04XcVMrydn.dOe5PvoxveJHaI8IlQsH9gU3qPNyPLSSRy', '2024-03-06 16:50:18'),
(27, 'q', '$2y$10$OgLfrs/zDLuR4ijGNAVLSedygyvhGlYS.BGJy7tsLdbzPDFHZR8Du', '2024-03-08 22:30:19'),
(28, 'sakshi', '$2y$10$HGVHWXVUW04sQQnMpTEmWevNTsct0i9C7MVwFFh8mtPYKn6U6NgJK', '2024-03-17 22:36:57'),
(29, 'manya_gupta', '$2y$10$k0SzeGRiyFolAUggjM7FR.a53sS45hw1NYvN0jKHb3YT1QuV46Avi', '2024-11-26 22:53:47');

-- --------------------------------------------------------

--
-- Table structure for table `adminimage`
--

CREATE TABLE `adminimage` (
  `sno` int(11) NOT NULL,
  `doc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminimage`
--

INSERT INTO `adminimage` (`sno`, `doc`) VALUES
(1, 'IMG20240203110146.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin_detail`
--

CREATE TABLE `admin_detail` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `birthday` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_detail`
--

INSERT INTO `admin_detail` (`id`, `username`, `first_name`, `last_name`, `email`, `phone`, `birthday`) VALUES
(1, '_____r_i_a_____', 'Riya', 'Gupta', 'Riya@gmail.com', '9301089985', '24-08-2000');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `sno` int(11) NOT NULL,
  `title1` varchar(255) NOT NULL,
  `desc1` longtext NOT NULL,
  `title2` varchar(255) NOT NULL,
  `desc2` longtext NOT NULL,
  `title3` varchar(255) NOT NULL,
  `desc3` longtext NOT NULL,
  `title4` varchar(255) NOT NULL,
  `desc4` longtext NOT NULL,
  `title5` varchar(255) NOT NULL,
  `desc5` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`sno`, `title1`, `desc1`, `title2`, `desc2`, `title3`, `desc3`, `title4`, `desc4`, `title5`, `desc5`) VALUES
(3, 'Now You Can Buy Your Dream Car1', 'BEST CAR DEALER IN YOUR TOWN!', 'FEATURED CARS', 'A Car Is A Means Of Transport Used For Traveling From One Place To Another. This Is A Four-Wheeler Used By Individuals Or Family Members. We All Use Cars In Our Daily Lives To Go From One Place To Another For Work. A Car Is A Beautiful Vehicle That Has Comfortable Seats, AC, And Windows. It Is Basically Used To Reduce Travel Distance And Time.', 'READ ABOUT US', 'CarDealer.Com Is A Leading Digital Marketplace And Solutions Provider For The Automotive Industry That Connects Car Shoppers With Sellers.', 'SEND US A MESSAGE', 'Feel Free To Send Us A Message', 'READ OUR TESTIMONIALS', 'People Believe Us Because We Are Always With Them');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `car_id` int(11) NOT NULL,
  `doc` varchar(255) NOT NULL,
  `car_name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`car_id`, `doc`, `car_name`, `description`, `status`, `created_on`, `updated_on`) VALUES
(7, 'audi.jpg', 'Audi11', 'Audi cars of that era were luxurious cars equipped with special bodywork. In 1932, Audi merged with Horch, DKW, and Wanderer, to form Auto Union AG, Chemnitz. It was during this period that the company offered the Audi Front that became the first European car to combine a six-cylinder engine with front-wheel drive.', 1, '2024-03-07 16:03:18', '2024-03-07 16:03:18'),
(8, 'ford.jpg', 'Ford', 'Since 1903, Ford Motor Company has put the world on wheels. From the moving assembly line and the $5 workday, to soy foam seats and aluminum truck bodies, Ford has a long heritage of progress. Learn more about the automobiles, innovations and manufacturing that have made the blue oval known around the world.', 1, '2024-03-07 16:06:58', '2024-03-07 16:06:58'),
(9, 'kia.webp', 'KIA', 'Kia Corporation was founded in May 1944 and is koreas oldest manufacturer of moter vehicles. From humble origins making bicycles and motorcycles Kia has grown  as part of the dynamic global Hyundai  Kia Automotive Group to become the worlds fifth largest vehicle manufacturer', 1, '2024-03-07 16:09:38', '2024-03-07 16:09:38'),
(10, 'maruti.jpg', 'Maruti Suzukii', 'Maruti Suzuki India Limited  a subsidiary of Suzuki Motor Corporation Japan  is Indias largest passenger car maker. Maruti Suzuki is credited with having ushered in the automobile revolution in the country. The Company is engaged in the business of manufacturing and sale of passenger vehicles in India.', 1, '2024-03-07 16:12:28', '2024-03-07 16:12:28'),
(11, 'hyundai.webp', 'Hyundai', 'Hyundai Motor Company has served as the trailblazer of Koreas automobile industry since rolling out its Pony  developed with its own exclusive technology. Hyundai Motor Company has risen as a globally recognized automobile manufacturer that exports its branded vehicles to over 200 countries.', 1, '2024-03-07 16:12:53', '2024-03-07 16:12:53'),
(18, 'bmw.webp', 'BMW', 'BMW was firmly established as a premium automobile brand by the end of the 20th century. In a failed attempt to gain market share as a sport-utility vehicle company, BMW purchased the Rover Group in 1994 but lost roughly $4 billion before selling the Land Rover brand to Ford in 2000.', 1, '2024-03-11 10:10:13', '2024-03-11 10:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `carmodel`
--

CREATE TABLE `carmodel` (
  `id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `doc` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `year` int(15) NOT NULL,
  `color` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carmodel`
--

INSERT INTO `carmodel` (`id`, `car_id`, `doc`, `name`, `year`, `color`, `price`, `status`, `created_on`, `updated_on`) VALUES
(3, 7, 'Q7.jpeg', 'Audi - Q7', 2024, 'Black', '30000', 1, '2024-03-08 10:13:50', '2024-03-08 10:13:50'),
(28, 7, 'audi rs5.jpeg', 'Audi rs5', 2023, 'Brown', '8000', 1, '2024-03-12 10:16:09', '2024-03-12 10:16:09'),
(29, 7, 'Audi Q5.webp', 'Audi Q5', 2020, 'Blue', '50000', 1, '2024-03-12 10:16:55', '2024-03-12 10:16:55'),
(30, 7, 'Audi q3.webp', 'Audi Q3 ', 2021, 'orange', '200000', 1, '2024-03-12 10:17:21', '2024-03-12 10:17:21'),
(31, 7, 'Audi A4.jpg', 'Audi A4', 2024, 'white', '60000', 1, '2024-03-12 10:18:03', '2024-03-12 10:18:03'),
(32, 7, 'audi A6.jpg', 'Audi A6', 2019, 'White', '40000', 1, '2024-03-12 10:35:19', '2024-03-12 10:35:19'),
(34, 8, 'ecosport ford.webp', 'Ford-Ecosport', 2018, 'Brown', '70000', 1, '2024-03-12 11:18:18', '2024-03-12 11:18:18'),
(35, 8, 'ford -falkan.webp', 'Ford - Falkan', 2021, 'SkyBlue', '70000', 1, '2024-03-12 11:19:01', '2024-03-12 11:19:01'),
(36, 8, 'ford escort.avif', 'Ford-Escort', 2021, 'Red', '5000', 1, '2024-03-12 11:19:30', '2024-03-12 11:19:30'),
(37, 8, 'ford-aspire2018.webp', 'Ford-Aspire2018', 2018, 'Black', '6000', 1, '2024-03-12 11:19:58', '2024-03-12 11:19:58'),
(38, 8, 'endevaour fords.jpg', 'Ford-Endevaour', 2019, 'White', '70000', 1, '2024-03-12 11:21:06', '2024-03-12 11:21:06'),
(40, 8, 'ford fiesta.jpeg', 'Ford -Fiesta', 2022, 'Light Green', '70000', 1, '2024-03-12 11:23:47', '2024-03-12 11:23:47'),
(41, 9, 'kia seltos.jpeg', 'KIA - Seltos', 2019, 'Red', '50000', 1, '2024-03-12 11:34:34', '2024-03-12 11:34:34'),
(42, 9, 'kia ev6].webp', 'KIA -EV6', 2021, 'Black', '50000', 1, '2024-03-12 11:35:06', '2024-03-12 11:35:06'),
(43, 9, 'kia carner.jpeg', 'KIA- Carner', 2023, 'Dark Blue', '50000', 1, '2024-03-12 11:35:50', '2024-03-12 11:35:50'),
(44, 9, 'evs kia.jpg', 'KIA- EVS', 2024, 'Grey', '50000', 1, '2024-03-12 11:36:24', '2024-03-12 11:36:24'),
(45, 9, 'sonet-kia.webp', 'KIA- Sonet', 2024, 'Red', '50000', 1, '2024-03-12 11:37:29', '2024-03-12 11:37:29'),
(46, 9, 'newcarnivalKia.jpeg', 'KIA- carnival', 2021, 'Grey', '50000', 1, '2024-03-12 11:40:07', '2024-03-12 11:40:07'),
(47, 10, 'ignismaruti.jpeg', 'Maruti -Ignis', 2024, 'orange', '30000', 1, '2024-03-12 11:51:09', '2024-03-12 11:51:09'),
(48, 10, 'maruti echo.jpeg', 'Maruti-Echo', 2020, 'White', '30000', 1, '2024-03-12 11:51:41', '2024-03-12 11:51:41'),
(49, 10, 'maruti celerio.jpeg', 'Maruti- Celerio', 2019, 'Black', '30000', 1, '2024-03-12 11:52:14', '2024-03-12 11:52:14'),
(50, 10, 'wagnormaruti.webp', 'Maruti- Wagnoar', 2023, 'Light Blue', '30000', 1, '2024-03-12 11:52:52', '2024-03-12 11:52:52'),
(51, 10, 'maruti alto k10.jpeg', 'Maruti - Alto k10', 2021, 'Blue', '30000', 1, '2024-03-12 11:53:24', '2024-03-12 11:53:24'),
(52, 10, 's presso.webp', 'Maruti- Spresso', 2023, 'Red', '30000', 1, '2024-03-12 11:54:02', '2024-03-12 11:54:02'),
(53, 11, 'venue hundai.jpeg', 'Hyundai - Venue', 2021, 'White', '80000', 1, '2024-03-12 11:59:30', '2024-03-12 11:59:30'),
(54, 11, 'hyundai varna.jpg', 'Hyundai - Verna', 2024, 'Royle Black', '1000000', 1, '2024-03-12 12:00:22', '2024-03-12 12:00:22'),
(55, 11, 'hyundai creta .webp', 'Hyundai- Creta', 2024, 'Black', '80000', 1, '2024-03-12 12:00:53', '2024-03-12 12:00:53'),
(56, 11, 'exter hyundai.jpeg', 'Hyundai- Exter', 2023, 'Light green', '80000', 1, '2024-03-12 12:01:34', '2024-03-12 12:01:34'),
(57, 11, 'centro hyundai.webp', 'Hyundai Centro', 2021, 'Cream', '50000', 1, '2024-03-12 12:02:14', '2024-03-12 12:02:14'),
(58, 11, 'i20.jpg', 'Hyundai - i20', 2024, 'Navy Blue', '80000', 1, '2024-03-12 12:02:59', '2024-03-12 12:02:59'),
(59, 18, 'X5-BMW.jpeg', 'BMW- X5', 2024, 'Green', '90000', 1, '2024-03-12 12:07:44', '2024-03-12 12:07:44'),
(60, 18, 'x1BMW.webp', 'BMW- X1', 2023, 'White', '90000', 1, '2024-03-12 12:08:08', '2024-03-12 12:08:08'),
(61, 18, 'i7BMW.webp', 'BMW- i7', 2022, 'Grey', '90000', 1, '2024-03-12 12:08:31', '2024-03-12 12:08:31'),
(62, 18, 'BMWXM.jpg', 'BMW- XM', 2021, 'Blue', '90000', 1, '2024-03-12 12:09:00', '2024-03-12 12:09:00'),
(63, 18, 'bmwx7.jpeg', 'BMW- X7', 2024, 'Black', '90000', 1, '2024-03-12 12:09:44', '2024-03-12 12:09:44'),
(64, 18, 'BMW-Z4.webp', 'BMW- Z4', 2021, 'Purple', '90000', 1, '2024-03-12 12:11:31', '2024-03-12 12:11:31');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `sno` int(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`sno`, `name`, `phone`, `email`, `address`) VALUES
(1, 'Riya Gupta', '9301089985', 'Riya.Tanvi0824@Gmail.Com', 'Navrangpura, Ahmedabad');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(13) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `role_id`, `customer_name`, `customer_phone`, `customer_address`, `customer_email`, `customer_password`, `deleted`, `created_on`, `updated_on`) VALUES
(12, 2, 'Riya', '9874563215', 'Dabra', 'riya@gmail.com', '123', 0, '2024-03-06 13:27:10', '2024-03-06 13:27:10'),
(13, 2, 'shiva', '5556662228', 'indore', 'shiva@gmail.com', '$2y$10$ZFHEUqgnk.Og.VccMmP2mu5dzmSSFsCR2HvoYB88G74jVWCVEi1zy', 0, '2024-03-06 13:29:21', '2024-03-06 13:29:21'),
(14, 2, 'Riya Gupta', '09301089985', 'Zone-II Maharana Pratap Nagar', 'riya.tanvi0824@gmail.com', '$2y$10$mij2DWJVZuFP08if4rUinuaJedwH/FnGbYhD5uUMyfADOgOg7mdpu', 0, '2024-03-14 22:46:47', '2024-03-14 22:46:47'),
(15, 2, 'Riya Gupta1', '09301089985', 'Zone-II Maharana Pratap Nagar', 'shivani.riya2426@gmail.com', '$2y$10$q.IukZmyGLWfKkSAbGpNfOFQzthl6834/uUw2vV13B/q/vbTJoDI2', 0, '2024-03-17 22:50:57', '2024-03-17 22:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `detail_car`
--

CREATE TABLE `detail_car` (
  `detail_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `doc` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `mileage` varchar(255) NOT NULL,
  `enginesize` varchar(255) NOT NULL,
  `gearbox` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `fuel` varchar(255) NOT NULL,
  `power` varchar(255) NOT NULL,
  `seat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_car`
--

INSERT INTO `detail_car` (`detail_id`, `id`, `doc`, `description`, `mileage`, `enginesize`, `gearbox`, `type`, `fuel`, `power`, `seat`) VALUES
(1, 3, 'Q7.jpeg', 'Audi Q7 is a 7 seater Luxury car with AWD option. Audi Q7 Price starts from ₹ 86.92 Lakh & top model price goes upto ₹ 94.45 Lakh. This model is available with 2995 cc engine option. The model is equipped with 3.0L V6 TFSI engine that produces 335.25bhp@5200-6400rpm and 500Nm@1370-4500 of torque.', '150000 km', '1500 cc', 'manual', 'new car', 'petrol', '56hp', 4),
(2, 28, 'audi rs5.jpeg', 'Audi RS 5 Price: The 2021 RS 5 is priced at Rs 1.04 crore (introductory, ex-showroom). Audi RS 5 Engine and Transmission: It comes with the same 2.9-litre twin-turbo V6 petrol engine (450PS/600Nm), mated to an 8-speed automatic transmission as the pre-facelift model.', '14000 km', '1200cc', 'manual', 'used car', 'petrol', '45hp', 5),
(3, 29, 'Audi Q5.webp', 'The price of Audi Q5, a 5 seater SUV, ranges from Rs. 65.18 - 70.45 Lakh. It is available in 2 variants, with an engine of 1984 cc and a choice of 1 transmission: Automatic. Q5 has an NCAP rating of 5 stars and comes with 8 airbags.', '13000 km', '1200cc', 'manual', 'used-vehical', 'Diesal', '67hp', 6),
(4, 30, 'Audi q3.webp', 'Q3 car is available in 3 versions and 1 fuel options - petrol. Q3 petrol models comes with 1984cc engine which generates a peak power of 192 bhp @ 4200-6000 rpm . The new Audi Q3, a SUV from Audi, was launched in India in Aug 2022. Q3 has received a 94% rating score from our users.', '34000 km', '1500cc', 'manual', 'new car', 'petrol', '89hp', 6),
(5, 31, 'Audi A4.jpg', 'The Audi A4 is a line of luxury compact executive cars produced since 1994 by the German car manufacturer Audi, a subsidiary of the Volkswagen Group. The A4 has been built in five generations and is based on the Volkswagen Group B platform. The first generation A4 succeeded the Audi 80.', '120000 km', '1200cc', 'Manual', 'new car', 'Diesal', '56hp', 8),
(6, 32, 'audi A6.jpg', 'The Audi A6 is only available in the 45TFSI trim, which is powered by a 2.0-litre four-cylinder turbo-petrol engine. It produces 241bhp and 370Nm of torque. This mill comes mated to a seven-speed dual-clutch automatic transmission sending power to the front wheels.', '34000 km', '1200cc', 'Manual', 'used Vehicle', 'petrol', '89hp', 7),
(7, 34, 'ecosport ford.webp', 'The Ford EcoSport (pronounced Eh-koh-sport) is a subcompact crossover SUV (B-segment) manufactured by Ford between 2003 and 2023. The first-generation model was developed and built in Brazil by Ford Brazil since 2003, at the Camaçari plant.', '46000km', '2500cc', 'manual', 'new car', 'petrol', '56hp', 6),
(8, 35, 'ford -falkan.webp', 'The Ford Falcon is a model line of cars that was produced by Ford from the 1960 to 1970 model years. Though preceded by the Rambler American the Falcon was the first compact car marketed by the Big Three American manufacturers.', '46000km', '2500cc', 'manual', 'used Vehicle', 'Diesal', '56hp', 6),
(9, 36, 'ford escort.avif', 'Escort petrol models comes with 1597cc engine which generates a peak power of 865500 . The Ford Escort, a Sedan from Ford, was launched in India in Feb 2014. Escort competes with Mercedes-Benz A-Class Limousine, Maruti Suzuki Ciaz and BMW 3 Series Gran Limousine in India.', '36000km', '2500cc', 'manual', 'used Vehicle', 'petrol', '48hp', 4),
(10, 37, 'ford-aspire2018.webp', 'Ford Aspire is a 5 seater Compact Sedan with the last recorded price of Rs. 5.99 - 9.11 Lakh. It is available in 22 variants, 1194 to 1499 cc engine options and 2 transmission options : Manual and Automatic. Other key specifications of the Aspire include a ground clearance of 174 mm.', '14000 km', '1100cc', 'manual', 'new car', 'petrol', '34hp', 4),
(11, 38, 'endevaour fords.jpg', 'Ford Endeavour is expected to be launched in India in March 2025 with an estimated price of ₹ 50 Lakh. Check Endeavour Specs, see images, colour and more.', '14000 km', '2500cc', 'manual', 'used Vehicle', 'Diesal', '48hp', 4),
(12, 40, 'ford fiesta.jpeg', 'The Ford Fiesta is a supermini car that was marketed by Ford from 1976 to 2023 over seven generations. Over the years the Fiesta has mainly been developed and manufactured by Fords European operations and had been positioned below the Escort (later the Focus).', '23000 km', '1200cc', 'manual', 'used Vehicle', 'Diesal', '89hp', 7),
(13, 41, 'kia seltos.jpeg', 'The Ford Fiesta is a supermini car that was marketed by Ford from 1976 to 2023 over seven generations. Over the years the Fiesta has mainly been developed and manufactured by Fords European operations, and had been positioned below the Escort (later the Focus).', '36000km', '1200cc', 'manual', 'new car', 'Diesal', '85hp', 6),
(14, 42, 'kia ev6].webp', 'The Kia EV6 has 1 Electric Engine on offer. It is available with the Automatic transmission. The EV6 is a 5 seater and has length of 4695 mm width of 1890 mm and a wheelbase of 3095', '14000 km', '1100cc', 'manual', 'used Vehicle', 'petrol', '89hp', 9),
(15, 43, 'kia carner.jpeg', 'Kia Carens Price starts from ₹ 10.45 Lakh & top model price goes upto ₹ 19.45 Lakh. It offers 23 variants in the 1482 cc & 1497 cc engine options. The model is equipped with 1.5L TGDI Smartstream engine that produces 157.81bhp@5500rpm and 253Nm@1500-3500rpm of torque. It delivers a top speed of 174 kmph.', '23000 km', '1100cc', 'manual', 'new car', 'Diesal', '95hp', 7),
(16, 44, 'evs kia.jpg', 'An EV includes both a vehicle that can only be powered by an electric motor that draws electricity from a battery (all-electric vehicle) and a vehicle that can be powered by an electric motor that draws electricity from a battery and by an internal combustion engine (plug-in hybrid electric vehicle).', '46000km', '1200cc', 'manual', 'used Vehicle', 'Diesal', '48hp', 4),
(17, 45, 'sonet-kia.webp', 'It is the third model from Kia in India after the Seltos and the Carnival. In the Indian market, the Sonet occupies the sub-4-metre SUV category with its 3995 mm (157.3 in) length dimension benefitting from the Indian tax benefits for cars shorter than 4 meters.', '14000 km', '2500cc', 'manual', 'used Vehicle', 'petrol', '89hp', 4),
(18, 46, 'kia carner.jpeg', 'Kia Carnival is a 6 seater MUV with the last recorded price of Rs 25.48 - 35.48 Lakh. It is available in 7 variants 2199 cc engine option and 1 transmission option  Automatic. Other key specifications of the Carnival include a ground clearance of 180 mm. and The Carnival is available in 3 colours.', '14000 km', '1100cc', 'manual', 'used Vehicle', 'petrol', '89hp', 6),
(19, 47, 'ignismaruti.jpeg', 'Ignis is a compact urban car with a high SUV-like stance that lets you drive through the packed streets of the city with ease. The host of features offered the cars capability and its tough & sporty design makes it the perfect urban city car ready and toughened for any city challenge.', '14000 km', '2500cc', 'manual', 'new car', 'Diesal', '35hp', 8),
(20, 48, 'maruti echo.jpeg', 'Maruti Eeco is a 5 7 seater Minivan car. Maruti Eeco Price starts from ₹ 5.32 Lakh & top model price goes upto ₹ 6.58 Lakh. This model is available with 1197 cc engine option. This car is available in Petrol and CNG options with Manual transmission.', '14000 km', '1100cc', 'manual', 'used Vehicle', 'Diesal', '85hp', 8),
(21, 49, 'maruti celerio.jpeg', 'It is available in 8 variants with an engine of 998 cc and a choice of 2 transmissions: Manual and Automatic. Celerio comes with 2 airbags. Maruti Celerio has a ground clearance of 170 mm and is available in 7 colours. Users have reported a mileage of 25.17 to 34.43 kmpl for Celerio.', '46000km', '1100cc', 'manual', 'used Vehicle', 'petrol', '85hp', 4),
(22, 50, 'wagnormaruti.webp', 'It is available in 12 variants, with engine options ranging from 998 to 1197 cc and a choice of 2 transmissions Manual and Automatic. Wagon R has an NCAP rating of 1 stars. Maruti Wagon R is available in 9 colours. Users have reported a mileage of 23.56 to 34.05 kmpl for Wagon R.', '14000 km', '2500cc', 'manual', 'used Vehicle', '', '34hp', 8),
(23, 51, 'maruti alto k10.jpeg', 'Maruti Alto K10 VXi (O) is available in Manual transmission and offered in 6 colours: Metallic Granite Grey Metallic Speedy Blue Premium Earth Gold, Metallic Sizzling Red, Metallic Silky Silver and Solid White.', '46000km', '1200cc', 'manual', 'new car', 'petrol', '89hp', 6),
(24, 52, 's presso.webp', 'The price of Maruti S-Presso a 4 seater Hatchback, ranges from Rs. 4.26 - 6.11 Lakh. It is available in 8 variants with an engine of 998 cc and a choice of 2 transmissions: Manual and Automatic. S-Presso has an NCAP rating of 0 stars and comes with 2 airbags.', '14000 km', '1200cc', 'manual', 'used Vehicle', 'Diesal', '85hp', 8),
(25, 53, 'venue hundai.jpeg', 'It is available in 24 variants with engine options ranging from 998 to 1493 cc and a choice of 2 transmissions Manual and Automatic Venue comes with 6 airbags. Hyundai Venue has a ground clearance of 195 mm and is available in 7 colors. Users have reported a mileage of 17.5 to 23.4 kmpl for Venue', '14000 km', '1100cc', 'manual', 'used Vehicle', 'petrol', '35hp', 5),
(26, 54, 'hyundai varna.jpg', 'The Hyundai Verna has 2 Petrol Engine on offer. The Petrol engine is 1497 cc and 1482 cc . It is available with Manual & Automatic transmission. Depending upon the variant and fuel type the Verna has a mileage of 18.6 to 20.6 kmpl . The Verna is a 5 seater.', '14000 km', '2500cc', 'manual', 'used Vehicle', 'Diesal', '85hp', 5),
(27, 55, 'hyundai creta .webp', 'The Diesel engine is 1493 cc while the Petrol engine is 1497 cc and 1482 cc . It is available with Manual & Automatic transmission. Depending upon the variant and fuel type the Creta has a mileage of 17.4 to 21.8 kmpl & Ground clearance of Creta is 190 mm. The Creta is a 5 seater.', '14000 km', '2500cc', 'manual', 'new car', 'Diesal', '56hp', 5),
(28, 56, 'exter hyundai.jpeg', 'Hyundai Exter is a 5 seater SUV car with FWD option. Hyundai Exter Price starts from ₹ 6.13 Lakh & top model price goes upto ₹ 10.28 Lakh. This model is available with 1197 cc engine option. This car is available in Petrol and CNG options with both Manual & Automatic transmission.', '36000km', '2500cc', 'manual', 'new car', 'Diesal', '85hp', 5),
(29, 57, 'centro hyundai.webp', 'Hyundai Santro is a 5 seater Hatchback with the last recorded price of Rs. 3.91 - 6.45 Lakh. It is available in 25 variant 1086 cc engine option and 2 transmission options : Manual and Automatic. The Santro is available in 5 colours.', '14000 km', '1100cc', 'manual', 'used Vehicle', 'petrol', '85hp', 5),
(30, 58, 'i20.jpg', 'i20 car is available in 12 variants and 1 fuel options - petrol. i20 petrol models comes with 1197cc engine which generates a peak power of 82 bhp @ 6000 rpm . The new Hyundai i20 a Hatchback from Hyundai, was launched in India in Sep 2023. i20 has received a 93% rating score from our users.', '46000km', '2500cc', 'manual', 'used Vehicle', 'petrol', '85hp', 5),
(31, 59, 'X5-BMW.jpeg', 'The BMW X5 is a mid-size luxury crossover SUV produced by BMW. The X5 made its debut in 1999 as the E53 model. It was BMWs first SUV. At launch it featured all-wheel drive and was available with either a manual or automatic gearbox.', '14000 km', '2500cc', 'manual', 'used Vehicle', 'petrol', '35hp', 8),
(32, 60, 'x1BMW.webp', 'X1 car is available in 2 versions and 2 fuel options - petrol and diesel. X1 petrol models comes with 1499cc engine which generates a peak power of 134 bhp @ 4400-6500 rpm . The new BMW X1 a SUV from BMW was launched in India in Jan 2023. X1 has received a 89% rating score from our users.', '14000 km', '1100cc', 'manual', 'new car', 'Diesal', '89hp', 5),
(33, 61, 'i7BMW.webp', 'The car also gets adaptive steering for more precision driving while the rear-wheel steering can turn up to 3.5 degrees. The all-electric BMW i7 xDrive60 model comes with two electric motors drawing power from a 101.7 kWh battery pack. The motor belt out 536 bhp and 744 Nm with 0-100 kmph coming up in 4.5 seconds.', '14000 km', '1100cc', 'manual', 'new car', 'Diesal', '89hp', 8),
(34, 62, 'BMWXM.jpg', 'It only beats the Ferrari Purosangue which has a 473-litre boot. From launch  the plug-in hybrid XM will come with a 4.4-litre twin-turbocharged V8 paired with an electric motor developing 653hp and 800Nm of torque. The sprint from 0-60mph takes just 4.3 seconds and it can reach a limited top speed of 155mph.', '23000 km', '1200cc', 'manual', 'used Vehicle', 'petrol', '89hp', 5),
(35, 63, 'bmwx7.jpeg', 'BMW X7 is a 6 seater hybrid Luxury car with 4WD option. BMW X7 Price starts from ₹ 1.27 Cr & top model price goes upto ₹ 1.30 Cr. It offers 3 variants in the 2993 cc & 2998 cc engine options. that produces 335.25bhp@4400rpm and 700Nm@1750-2250rpm of torque.', '46000km', '1200cc', 'manual', 'used Vehicle', 'Diesal', '85hp', 7),
(36, 64, 'BMW-Z4.webp', 'It is available in 1 variant with an engine of 2998 cc and a choice of 1 transmission: Automatic. Z4 has an NCAP rating of 5 stars and comes with 4 airbags. BMW Z4 has a ground clearance of 114 mm and is available in 6 colors. Users have reported a mileage of 12.09 kmpl for Z4.', '14000 km', '1100cc', '', 'used Vehicle', 'Diesal', '85hp', 5);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `sno` int(11) NOT NULL,
  `ques` varchar(255) NOT NULL,
  `ans` longtext NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`sno`, `ques`, `ans`, `created_on`, `updated_on`) VALUES
(1, ' What should I look for when I test drive a car?', 'When You Test Drive A New Or Pre-Owned Toyota Vehicle At Schaumburg Toyota, We Recommend That You Keep A Checklist Of Items Like Comfort, Utility, Functionality, Ease Of Use With Tech Features, And The General Driving Experience. This Will Help You Get A Better Sense Of Whether The Model Matches Your Driving Style And Buying Criteria.', '2024-03-13 12:24:25', '2024-03-13 00:00:00'),
(2, 'Is there a day of the month that’s best for purchasing a new car?', 'While an ideal time to buy varies on factors like the model of interest, your budget, and availability, we might recommend stopping by during a weekday since weekends tend to be a busy time for car shoppers. We also encourage you to check in to see when new models arrive at our dealership and stay up to date about deals and incentives that might work to create an ideal buying time for you.', '2024-03-13 12:31:39', '2024-03-13 12:31:39'),
(3, 'Why should I choose your dealership?', 'We’re Illinois Toyota dealers who care about each of our customers having the most personalized experience possible. You won’t be another number to us. Instead, you can trust our experienced staff to provide the attentive and individual service you deserve for your automotive needs.', '2024-03-13 12:31:43', '2024-03-13 12:31:43'),
(4, 'What kind of financing services do you offer?', 'You’ll find a number of leasing and financing options for every budget and credit history at our car finance center in Schaumburg, IL. Contact our team with questions or to get started with the process by using our online form, calling (877) 232-7530, or stopping by in person.', '2024-03-13 12:31:48', '2024-03-13 12:31:48');

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `sno` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `value_1` varchar(255) NOT NULL,
  `value_2` varchar(255) NOT NULL,
  `value_3` varchar(255) NOT NULL,
  `value_4` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`sno`, `title`, `value_1`, `value_2`, `value_3`, `value_4`, `created_on`, `updated_on`) VALUES
(2, 'Our Popular Par', 'BMW', 'Audi', 'Ford', 'Kia', '2024-03-06 18:55:27', '2024-03-06 18:55:27'),
(6, 'Popular Model', 'X7 BMW', 'Q7 Audi', 'Aspire Ford', 'EVS Kia', '2024-03-06 19:14:17', '2024-03-06 19:14:17'),
(12, 'New Car', 'Xm BMW', 'Q5 Audi', 'Escort Ford', 'Seltos Kia', '2024-03-07 11:03:02', '2024-03-07 11:03:02'),
(30, '54', '45', '5', '45', '45', '2024-03-15 17:11:17', '2024-03-15 17:11:17');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_on`, `updated_on`) VALUES
(9, 'Riya Gupta', 'riya@gmail.com', '9369852145', 'About Buying Audi', 'I want to buy Audi And I want to know which model is best now a time', '2024-03-11 12:37:19', '2024-03-11 12:37:19'),
(10, 'aerg', 'aqg@gmail.com', '9874563215', 'qerf', 'qwerf', '2024-03-13 09:40:52', '2024-03-13 09:40:52');

-- --------------------------------------------------------

--
-- Table structure for table `order_manager`
--

CREATE TABLE `order_manager` (
  `Order_Id` int(100) NOT NULL,
  `Full_Name` text NOT NULL,
  `Phone_No` bigint(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Pay_Mode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_manager`
--

INSERT INTO `order_manager` (`Order_Id`, `Full_Name`, `Phone_No`, `Address`, `Pay_Mode`) VALUES
(8, 'Riya Gupta', 9584712307, 'Dabra', 'COD'),
(9, 'Shiva Sharma', 5556667778, 'Dabra', 'COD'),
(10, 'sourav gupta', 7896541235, 'Dabra', 'COD'),
(11, 'Jaya Dubey', 5646787912, 'Ahmedabad', 'COD'),
(12, 'Riyan', 7896541235, 'Dabra', 'COD'),
(13, 'erth', 7857857857, 'etdyjn', 'COD'),
(14, 'sakshi', 9874563215, 'harda', 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `doc` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `doc`, `position`, `name`, `description`, `created_on`, `updated_on`) VALUES
(62, 'girl.avif', 'Manager', 'Riya Gupta', 'I play a pivotal role in the smooth functioning of a dealership. They are responsible for leading the sales team, ensuring customer satisfaction, and maintaining profitable sales figures.', '2024-03-11 10:06:48', '2024-03-11 10:06:48'),
(63, 'viira.avif', 'Customer Support', 'Veena Rajput', 'Automobiles are a major long term investment  and the cash outlay continues long after the initial  payment. From insurance to maintenance to loans having a car can get expensive. ', '2024-03-11 11:48:58', '2024-03-11 11:48:58'),
(64, 'jiya.jpg', 'Management ', 'Jiya Khan', 'To perform this job successfully, an individual must be able to perform each essential duty satisfactorily. The requirements listed below are representative of the knowledge skill and/or ability required.', '2024-03-11 11:50:24', '2024-03-11 11:50:24'),
(65, 'jesh.avif', 'Customer support', 'Ayush Jain', 'Automobiles Are A Major Long Term Investment And The Cash Outlay Continues Long After The Initial Payment. From Insurance To Maintenance To Loans Having A Car Can Get Expensive.', '2024-03-11 11:51:33', '2024-03-11 11:51:33'),
(66, 'team5jpeg', 'Car Deatiler', 'Jay Sharma', 'My responsibilities include cleaning vehicles according to the needs of our customers by performing detailed inspections, washing, and buffing to restore the appearance of the vehicle to company standards.', '2024-03-15 16:21:43', '2024-03-15 16:21:43'),
(67, 'team10.jpg', 'HR Consultant', 'Maaya Faruki', 'Being responsible for human resource management in the automotive industry can be considered a full-time job in itself. HR support to help you make sense of it all while doing the heavy lifting by taking care of the more laborious HR tasks.', '2024-03-15 16:31:14', '2024-03-15 16:31:14'),
(68, 'team7.jpg', ' Sales Manager', 'Navya Sharma', 'Maintains an accurate daily log that reflects all sales activities in the dealership. Ensures proper follow-up of all potential buyers by developing, implementing, and monitoring a prospecting and sales control system.', '2024-03-15 16:33:09', '2024-03-15 16:33:09'),
(69, 'team8.jpg', 'Finance Manager', 'Abhinav Mishra', 'An auto finance manager coordinates the financing for customers buying new or used vehicles. They act as the intermediary between the customer and the banks and make sure to maintain positive relationships with both.', '2024-03-15 16:35:01', '2024-03-15 16:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `sno` int(11) NOT NULL,
  `qu` varchar(255) NOT NULL,
  `an` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`sno`, `qu`, `an`) VALUES
(1, 'Annual Percentage Rate (APR):', 'Also Called A Finance Rate, This Is The Interest Rate On A Loan; A Percentage Of The Amount Borrowed That A Lender Charges Annually For The Use Of Its Money.'),
(3, 'Acquisition Fee:', 'A fee charged by the dealer for initiating a lease; ostensibly covers the costs of processing the lease—credit reports and insurance verification, for example—but is in actuality pure profit. Although many fees associated with a lease are negotiable, this one is generally unavoidable.'),
(4, 'Dealer Incentives:', 'Special offers from car manufacturers to their dealers—which are usually passed on to the customer—to encourage sales in a slow market or when excess inventory builds up'),
(5, 'Buy Rate:', 'The rate at which a car dealer acquires financing. The dealer can profit by offering the financing to a consumer at a higher cost (Sell Rate) and keeping the difference (Spread).');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `sno` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` longtext NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`sno`, `name`, `desc`, `created_on`, `updated_on`) VALUES
(1, 'Shreya Gupta', 'If your looking to buy a car, Jon with Car Dealer is your guy. Riya has been helping me and my family for years with BMW and Audi. Best service in town! Best value in town!', '2024-03-01 15:08:47', '2024-03-01 15:08:47'),
(2, 'Shivani Sharma', 'I would definitely recommend  Riya. Not only did we get a great deal, he was very easy to work with and made the process simple and fast.', '2024-03-01 15:26:06', '2024-03-01 15:26:06'),
(8, 'Manya Gupta', 'Highly Recommend! Riya Went Above And Beyond To Make Everything Go Smoothly! Car Is Amazing!', '2024-03-11 11:54:22', '2024-03-11 11:54:22'),
(9, 'Shimpi Gupta', 'I Was Very Nervous Before Buying Car When I Saw With Best Car Dealer Website I Feel So Happy  Its Really Good To Buy Second Hand Car', '2024-03-11 11:54:39', '2024-03-11 11:54:39'),
(11, 'Shivaye Sharma', 'I’ve Purchased Many Cars Over The Years - Jon Is By Far The Easiest And Most Knowledgeable Person To Work With. His Passion Is The Car Industry And It Shows - He Doesn’t Mess Around With Cars That Have Any Red Flags Or Cut Corners When It Comes To Selling High Quality, Solid Cars At A Good Price. I Felt He Had My Best Interests In Mind, Wasn’t Pushy Or Aggressive Whatsoever. Highly Recommend Working With Jon To Buy Your Next Vehicle!', '2024-03-15 16:06:51', '2024-03-15 16:06:51'),
(12, 'Jiya Verma', 'This was the fastest and easiest car purchase I have ever experienced. Jon was very knowledgeable about the car I was buying. I already came in with my car salesman filter but I didnt feel like Jon was trying to sell me on anything making me very comfortable. He was upfront and honest which I knew because I had already done my own research on the car and price. Thanks Riya.', '2024-03-15 16:07:29', '2024-03-15 16:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `Order_Id` int(100) NOT NULL,
  `Item_Name` varchar(100) NOT NULL,
  `Price` int(100) NOT NULL,
  `Quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`Order_Id`, `Item_Name`, `Price`, `Quantity`) VALUES
(6, 'Audi rs5', 8000, 1),
(6, 'Audi A6', 40000, 3),
(7, 'Maruti -Ignis', 30000, 1),
(7, 'Audi rs5', 8000, 1),
(8, 'Audi Q3 ', 200000, 2),
(8, 'Audi rs5', 8000, 2),
(8, 'Audi A6', 40000, 2),
(9, 'BMW- X1', 90000, 1),
(9, 'Audi Q5', 50000, 1),
(9, 'Ford-Ecosport', 70000, 1),
(10, 'KIA -EV6', 50000, 1),
(11, 'Ford-Endevaour', 70000, 1),
(12, 'KIA- carnival', 50000, 1),
(13, 'Audi rs5', 8000, 1),
(14, 'KIA -EV6', 50000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_name`, `active`, `created_on`) VALUES
(1, 'admin', 0, '2024-02-20 14:46:38'),
(2, 'customer', 0, '2024-02-20 14:46:56'),
(3, 'superadmin', 0, '2024-02-20 14:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_tab`
--

CREATE TABLE `user_tab` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tab`
--

INSERT INTO `user_tab` (`user_id`, `role_id`, `name`, `phone`, `email`, `password`, `deleted`, `created_on`, `updated_on`) VALUES
(1, 1, 'Shivani', '9301089985', 'shivani24@gmail.com', '456123', 0, '2024-02-21 11:27:18', '2024-02-21 11:27:18'),
(2, 2, 'sourav', '7894561235', 'Sourav@gmail.com', '123', 0, '2024-02-21 11:37:46', '2024-02-21 11:37:46'),
(3, 2, 'wertuyhwe', '123456795', 'owegf@gmail.com', '23', 0, '2024-02-21 11:44:47', '2024-02-21 11:44:47'),
(4, 2, 'qwrt', '4561234561', 'Sourav@gmail.com', '123', 0, '2024-02-21 11:46:53', '2024-02-21 11:46:53'),
(5, 2, 'qwrgvsdfgbvsdfg', '7894561235', 'webh@gmail.com', '12', 0, '2024-02-21 12:51:37', '2024-02-21 12:51:37'),
(6, 2, 'Riya', '9301089985', 'riya@gmail.com', '1234', 0, '2024-03-01 09:13:06', '2024-03-01 09:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `adminimage`
--
ALTER TABLE `adminimage`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `admin_detail`
--
ALTER TABLE `admin_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `carmodel`
--
ALTER TABLE `carmodel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `foreign key` (`role_id`);

--
-- Indexes for table `detail_car`
--
ALTER TABLE `detail_car`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_manager`
--
ALTER TABLE `order_manager`
  ADD PRIMARY KEY (`Order_Id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user_tab`
--
ALTER TABLE `user_tab`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `adminimage`
--
ALTER TABLE `adminimage`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_detail`
--
ALTER TABLE `admin_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `carmodel`
--
ALTER TABLE `carmodel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `sno` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `detail_car`
--
ALTER TABLE `detail_car`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_manager`
--
ALTER TABLE `order_manager`
  MODIFY `Order_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_tab`
--
ALTER TABLE `user_tab`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carmodel`
--
ALTER TABLE `carmodel`
  ADD CONSTRAINT `carmodel_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `car` (`car_id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `foreign key` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`role_id`);

--
-- Constraints for table `detail_car`
--
ALTER TABLE `detail_car`
  ADD CONSTRAINT `detail_car_ibfk_1` FOREIGN KEY (`id`) REFERENCES `carmodel` (`id`);

--
-- Constraints for table `user_tab`
--
ALTER TABLE `user_tab`
  ADD CONSTRAINT `user_tab_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
