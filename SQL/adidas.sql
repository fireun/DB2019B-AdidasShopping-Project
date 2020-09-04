-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2020 at 03:58 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adidas`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderlist`
--

CREATE TABLE `orderlist` (
  `orderid` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `goodsId` varchar(255) NOT NULL,
  `goodsName` varchar(255) NOT NULL,
  `goodsImage` varchar(255) NOT NULL,
  `goodsPrice` double(10,2) NOT NULL,
  `goodsColor` varchar(255) NOT NULL,
  `goodsSize` int(2) NOT NULL,
  `quantity` int(10) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderlist`
--

INSERT INTO `orderlist` (`orderid`, `userid`, `username`, `goodsId`, `goodsName`, `goodsImage`, `goodsPrice`, `goodsColor`, `goodsSize`, `quantity`, `status`) VALUES
('5de778d496358', '5de0b66a681e9', 'aaa', 'L1001', 'CONTINENTAL 80 SHOES', 'CONTINENTAL 80 SHOES.jpg', 450.00, 'white', 35, 1, 1),
('5df2665487c83', '5df265a06e963', 'woonxun', 'R1005', 'ALPHAEDGE 4D SHOES', 'Rwomen/Run2Black.jpg', 1200.00, 'black', 35, 1, 1),
('5e4aa7659a348', '5e42c02b3361a', 'ali', 'R1005', 'ALPHAEDGE 4D SHOES', 'Rwomen/Run2Black.jpg', 1200.00, 'black', 40, 1, 0),
('5e5bad1791f12', '5df265a06e963', 'woonxun', 'B1011', 'MARQUEE BOOST SHOES', 'Basket2Whitemen.jpg', 650.00, 'white', 45, 1, 0),
('5e7b26472870c', '5df265a06e963', 'woonxun', 'B1020', 'ADIDAS D ROSE 7', 'Basket4Bluewomen.jpg', 850.00, 'blue', 45, 1, 0),
('5ec4c825ad9ba', '5ddff89847507', 'MULI', 'B1004', 'DAME 5 SHOES', 'Basket1Whitemen.jpg', 500.00, 'white', 35, 1, 0),
('5ec4c82d852fe', '5ddff89847507', 'MULI', 'T1001', 'ALPHABOUNCE 1 PARLEY SHOES', 'TrainingKidsBoyAlphabounce1Parley.jpg', 294.00, 'black', 35, 1, 0),
('5ec4c9384843a', '5ddff89847507', 'MULI', 'B1006', 'PRO ADVERSARY 2019 SHOES', 'Basket2Blackgirls.jpg', 260.00, 'black', 35, 1, 0),
('5f0bc2e6c2ebd', '5de0b66a681e9', 'aaa', 'B1004', 'DAME 5 SHOES', 'Basket1Whitemen.jpg', 500.00, 'white', 35, 1, 1),
('5f17cdf247fef', '5f17cdac91eb1', 'Tom', 'L1002', 'CONTINENTAL 80 SHOES', 'CONTINENTAL 80 SHOES black.jpg', 450.00, 'black', 35, 1, 1),
('5f17cdfc671e5', '5f17cdac91eb1', 'Tom', 'R1002', 'ADIZERO PRIME SHOES', 'Rwomen/Run1Black.jpg', 720.00, 'black', 35, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `paybil`
--

CREATE TABLE `paybil` (
  `paidID` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `totalPrice` double(10,2) NOT NULL,
  `cardnumber` int(16) NOT NULL,
  `month` int(2) NOT NULL,
  `year` year(4) NOT NULL,
  `ccv` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paybil`
--

INSERT INTO `paybil` (`paidID`, `username`, `totalPrice`, `cardnumber`, `month`, `year`, `ccv`) VALUES
('5ddf692438693', 'ddddd', 1363.50, 12, 1, 2019, 0),
('5de09b5c92818', 'RAMSA', 454.50, 1212121212, 1, 2019, 111),
('5df1de9f6bf1f', 'aaa', 454.50, 123213, 1, 2019, 3213),
('5df2667338e40', 'woonxun', 1212.00, 103321, 1, 2019, 231),
('5f0bc2fc10c54', 'aaa', 505.00, 2147483647, 1, 2019, 2222),
('5f17cddbe5486', 'Tom', 656.50, 2147483647, 6, 2019, 111111),
('5f17ce08c5640', 'Tom', 1181.70, 2147483647, 9, 2027, 1111);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL,
  `style` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `image`, `color`, `quantity`, `style`, `title`, `description`) VALUES
('B1004', 'DAME 5 SHOES', 500.50, 'A1002.jpg', 'white', 10, 'basketball', '', ''),
('B1005', 'ADIDAS D LILLARD 2', 600.00, 'Basket1Whitewomen.jpg', 'white', 10, 'basketball', '', 'Humbled by each win and starved by each defeat, Damian Lillard’s style of play is the major inspiration for these basketball sneakers. The D Lillard 2 has a supportive FUSEDMESH upper for a secure lockdown as you break to the basket. Bounce delivers energized cushioning through the clutch. The tread pattern pays tribute to his roots and is inspired by the first courts to see his greatness.\r\nThe Adidas D Lillard 2 is built to showcase all of Dame’s elite skills. Scoring, passing, and lockdown defense; the Dame 2 helps you do it all on the court.'),
('B1006', 'PRO ADVERSARY 2019 SHOES', 260.00, 'Basket2Blackgirls.jpg', 'black', 10, 'basketball', 'DURABLE B-BALL SHOES BUILT FOR COMFORT AND SUPPORT.', 'Get buckets in comfort all season long. These durable basketball shoes feature a soft heel pillow and a foam midsole for enhanced cushioning and Achilles support as you move up and down the court. The herringbone outsole provides extra grip on the blacktop.'),
('B1007', 'MARQUEE BOOST SHOES', 650.00, 'Basket2Gredmen.jpg', 'grey', 10, 'basketball', 'A CLASSIC B-BALL STYLE DESIGNED FOR EXTRA COMFORT ON THE HARDWOOD.', 'A classic look gets upgraded with modern details. These basketball shoes are built for quickness and agility on the hardwood. They have a moulded ankle collar with a cushioned heel for support and comfort. A responsive midsole returns energy on every jumper while the herringbone outsole provides extra grip as you stop and go on a dime.'),
('B1008', 'ADIDAS D LILLARD 3', 700.00, 'Basket2Greenwomen.jpg', 'green', 10, 'basketball', '', 'Humbled by each win and starved by each defeat, Damian Lillard’s style of play is the major inspiration for these basketball sneakers. The D Lillard 3 has a supportive FUSEDMESH upper for a secure lockdown as you break to the basket. Bounce delivers energized cushioning through the clutch. The tread pattern pays tribute to his roots and is inspired by the first courts to see his greatness.\r\nThe Adidas D Lillard 3 is built to showcase all of Dame’s elite skills. Scoring, passing, and lockdown defense; the Dame 3 helps you do it all on the court.'),
('B1009', 'HARDEN VOL.3 SHOES', 440.00, 'Basket2Redboys.jpg', 'red', 10, 'basketball', 'B-BALL SHOES INSPIRED BY THE CREATIVITY BEHIND JAMES HARDENS STYLE.\r\n', 'Slow down fast. These basketball shoes are inspired by the free-flowing creativity and movement of James Hardens game. The leather upper provides a stable locked-down feel that supports quick changes of direction. A responsive midsole returns energy on every Euro step, and the herringbone outsole gives you extra traction so you can start and stop on a dime.'),
('B1010', 'PRO ADVERSARY 2019 SHOES', 260.00, 'Basket2Redgirls.jpg', 'red', 10, 'basketball', 'DURABLE B-BALL SHOES BUILT FOR COMFORT AND SUPPORT.', 'Get buckets in comfort all season long. These durable basketball shoes feature a soft heel pillow and a foam midsole for enhanced cushioning and Achilles support as you move up and down the court. The herringbone outsole provides extra grip on the blacktop.'),
('B1011', 'MARQUEE BOOST SHOES', 650.00, 'Basket2Whitemen.jpg', 'white', 10, 'basketball', 'A CLASSIC B-BALL STYLE DESIGNED FOR EXTRA COMFORT ON THE HARDWOOD.', 'A classic look gets upgraded with modern details. These basketball shoes are built for quickness and agility on the hardwood. They have a moulded ankle collar with a cushioned heel for support and comfort. A responsive midsole returns energy on every jumper while the herringbone outsole provides extra grip as you stop and go on a dime.'),
('B1012', 'PRO VISION SHOES', 320.00, 'Basket3Blackgirls.jpg', 'black', 10, 'basketball', 'STREETBALL-INSPIRED B-BALL SHOES DESIGNED FOR A LOCKED-DOWN FEEL.', 'These basketball shoes combine a streetball-inspired look with modern details. Designed with a midfoot cage for a locked-down feel, theyre built with flexible midsole cushioning for soft comfort as you attack the paint. The rubber outsole provides extra grip for quick cuts and pivots on the blacktop.'),
('B1013', 'N3XT L3V3L SHOES', 780.00, 'Basket3Blackmen.jpg', 'black', 10, 'basketball', 'LACELESS B-BALL SHOES DESIGNED FOR A LOCKED-DOWN FEEL.', 'Change directions on a dime. These basketball shoes feature a sock-like construction with a laceless knit upper for a premium locked-down feel. Theyre built with super light Lightstrike cushioning that helps you generate explosive speed for decisive moves up and down the court. A TPU banking barrier offers lateral support for quick side-to-side movement. The herringbone outsole provides extra grip on cuts and pivots.'),
('B1014', 'ADIDAS EXPLOSIVE BOUNCE', 550.00, 'Basket3Redwomen.jpg', 'red', 10, 'basketball', '', 'Explode to the basket with the Adidas Explosive Bounce. The shoes feature a breathable mesh upper and molded heel piece that keep the foot stable while driving and cutting to the hoop. The energy return of Bounce cushioning helps you push the pace while the clock winds down.'),
('B1015', 'N3XT L3V3L SHOES', 780.00, 'Basket3Whitemen.jpg', 'white', 10, 'basketball', 'LACELESS B-BALL SHOES DESIGNED FOR A LOCKED-DOWN FEEL.', 'Change directions on a dime. These basketball shoes feature a sock-like construction with a laceless knit upper for a premium locked-down feel. Theyre built with super light Lightstrike cushioning that helps you generate explosive speed for decisive moves up and down the court. A TPU banking barrier offers lateral support for quick side-to-side movement. The herringbone outsole provides extra grip on cuts and pivots.'),
('B1016', 'PRO SPARK 2018 SHOES', 200.00, 'Basket4Blackgirls.jpg', 'black', 10, 'basketball', 'SHOES DESIGNED FOR SEASON-LONG COMFORT AND DURABILITY.', 'Built to keep you comfortable as you hit clutch shots down the stretch, these kids shoes feature a cushioned midsole and a padded heel for exceptional comfort. The breathable upper and synthetic toe overlay offer durability and lockdown as you suffocate opposition ball handlers with side-to-side movement on every possession.'),
('B1017', 'PRO BOUNCE MADNESS LOW 2019 SHOES', 480.00, 'Basket4Blackmen.jpg', 'black', 10, 'basketball', 'LOW TOP B-BALL SHOES DESIGNED FOR AGILITY AND QUICKNESS.', 'Shake defenders all through the game long. Built for agility, these basketball shoes have a textile upper with a cushioned collar for enhanced ankle support. Responsive cushioning in the midsole lets you hustle up and down the court in comfort. A TPU overlay offers lateral stability for quick side-to-side movement. The herringbone outsole provides extra grip as you cut and pivot to the basket.'),
('B1018', 'MARVELS CAPTAIN MARVEL | PRO', 380.00, 'Basket4Blueboys.jpg', 'blue', 10, 'basketball', 'STREETBALL-INSPIRED B-BALL SHOES DESIGNED FOR A LOCKED-DOWN FEEL.', 'These junior boys basketball shoes mix a streetball-inspired look with modern details. Designed with a midfoot cage for a locked-down feel, they are built with flexible midsole cushioning for soft comfort as you attack the paint. The rubber outsole provides extra grip for quick cuts and pivots on the blacktop.'),
('B1019', 'PRO SPARK 2018 SHOES', 200.00, 'Basket4Bluegirls.jpg', 'blue', 10, 'basketball', 'LOW TOP B-BALL SHOES DESIGNED FOR AGILITY AND QUICKNESS.', 'Shake defenders all through the game long. Built for agility, these basketball shoes have a textile upper with a cushioned collar for enhanced ankle support. Responsive cushioning in the midsole lets you hustle up and down the court in comfort. A TPU overlay offers lateral stability for quick side-to-side movement. The herringbone outsole provides extra grip as you cut and pivot to the basket.'),
('B1020', 'ADIDAS D ROSE 7', 850.00, 'Basket4Bluewomen.jpg', 'blue', 10, 'basketball', '', 'The Adidas D Rose 7 is the third signature shoe of Derrick Rose to have Boost technology in the midsole. It delivers impact protection like no other. The traction of the shoe features a herringbone pattern, letting the player do multidirectional footwork without slipping.\r\nHigh-top basketball shoes are said to provide more ankle support to hoopers. However, there are those who prefer low-top basketball sneakers because of the increased mobility that they afford. At the same price of $140, wearers may try the low-collared Boost-equipped Harden Vol 3. If mid-top shoes are an alternative, the Adidas Dame 5 is a great go.'),
('B1021', 'PRO SPARK 2018 SHOES', 200.00, 'Basket4Gredgirls.jpg', 'grey', 10, 'basketball', 'LOW TOP B-BALL SHOES DESIGNED FOR AGILITY AND QUICKNESS.', 'Shake defenders all through the game long. Built for agility, these basketball shoes have a textile upper with a cushioned collar for enhanced ankle support. Responsive cushioning in the midsole lets you hustle up and down the court in comfort. A TPU overlay offers lateral stability for quick side-to-side movement. The herringbone outsole provides extra grip as you cut and pivot to the basket.'),
('B1022', 'PRO BOUNCE MADNESS LOW 2019 SHOES', 480.00, 'Basket4Gredmen.jpg', 'grey', 10, 'basketball', 'LOW TOP B-BALL SHOES DESIGNED FOR AGILITY AND QUICKNESS.', 'Shake defenders all through the game long. Built for agility, these basketball shoes have a textile upper with a cushioned collar for enhanced ankle support. Responsive cushioning in the midsole lets you hustle up and down the court in comfort. A TPU overlay offers lateral stability for quick side-to-side movement. The herringbone outsole provides extra grip as you cut and pivot to the basket.'),
('B1023', 'PRO BOUNCE MADNESS LOW 2019 SHOES', 480.00, 'Basket4Whitemen.jpg', 'white', 10, 'basketball', 'LOW TOP B-BALL SHOES DESIGNED FOR AGILITY AND QUICKNESS.', 'Shake defenders all through the game long. Built for agility, these basketball shoes have a textile upper with a cushioned collar for enhanced ankle support. Responsive cushioning in the midsole lets you hustle up and down the court in comfort. A TPU overlay offers lateral stability for quick side-to-side movement. The herringbone outsole provides extra grip as you cut and pivot to the basket.'),
('B1024', 'HARDEN VOL.3 SHOES', 440.00, 'Basket5Blackmen.jpg', 'black', 10, 'basketball', 'B-BALL SHOES INSPIRED BY THE CREATIVITY BEHIND JAMES HARDENS STYLE.', 'Slow down fast. These basketball shoes are inspired by the free-flowing creativity and movement of James Hardens game. The leather upper provides a stable locked-down feel that supports quick changes of direction. A responsive midsole returns energy on every Euro step, and the herringbone outsole gives you extra traction so you can start and stop on a dime.'),
('B1025', 'ADIDAS D ROSE 6 BOOST', 650.00, 'Basket5Blackwomen.jpg', 'black', 10, 'basketball', '', 'The Adidas D Rose 6 Boost is a sneaker packed with Boost technology in the midsole for impact absorption. Something new with the design of this shoe is the external strap on the heel counter. It cups the ankle to make sure the feet is not moving around. Another would be the StableFrame in the midsole that cradles the Boost technology.\r\nBoost is a must-have for most basketball hoopers. James Harden’s third Adidas basketball shoe features the exposed full-length Boost for cushioning. Unlike the Boost in the D Rose 6, the Boost in James Hardens signature basketball shoes are bouncier.'),
('B1026', 'MARQUEE BOOST SHOES', 352.00, 'Basket5Bluegirls.jpg', 'blue', 10, 'basketball', 'CLASSIC B-BALL SHOES DESIGNED FOR AGILITY ON THE COURT.', 'Updating a classic look with modern details, these low-cut basketball shoes are built for quickness and agility on the hardwood. They feature a molded ankle collar with a cushioned heel for support and comfort. A responsive midsole returns energy on every jumper. The herringbone outsole provides extra grip as you stop and go on a dime.\r\nEndless energyEndless energy\r\nBoost is our most responsive cushioning ever, delivering incredible energy return: The more energy you give, the more you get\r\nEnhanced traction\r\nThe zonal herringbone outsole adds extra grip on the court\r\nPadded support\r\nThe molded, padded ankle collar offers enhanced comfort'),
('B1027', 'EXPLOSIVE IGNITE 2018 WIDE SHOES', 250.00, 'Basket5Gredboys.jpg', 'grey', 10, 'basketball', 'COMFORTABLE SHOES BUILT WITH EXTRA MIDFOOT STABILITY.', 'These kids shoes are built to help little ones improve their game in comfort. A wider fit offers extra comfort and stability for side-to-side movement, while enhanced cushioning in the midsole and sockliner lets them work on their game all day long. A lightweight upper adds durability to power through the entire season.'),
('B1028', 'HARDEN VOL.3 SHOES', 650.00, 'Basket5Gredmen.jpg', 'grey', 10, 'basketball', 'B-BALL SHOES FOR STOP-AND-START MOVES IN JAMES HARDENS STYLE.', 'Slow down fast. Inspired by his ability to change speed and create space from defenders, these basketball shoes are designed for James Hardens signature style. They are built with a leather upper for a locked-down feel that supports quick changes of direction. A responsive midsole returns energy on every Euro step. The herringbone outsole provides extra traction as you start and stop on a dime.'),
('B1029', 'MARQUEE BOOST SHOES', 352.00, 'Basket5Redgirls.jpg', 'red', 10, 'basketball', 'CLASSIC B-BALL SHOES DESIGNED FOR AGILITY ON THE COURT.', 'Updating a classic look with modern details, these low-cut basketball shoes are built for quickness and agility on the hardwood. They feature a molded ankle collar with a cushioned heel for support and comfort. A responsive midsole returns energy on every jumper. The herringbone outsole provides extra grip as you stop and go on a dime.\r\nEndless energyEndless energy\r\nBoost is our most responsive cushioning ever, delivering incredible energy return: The more energy you give, the more you get\r\nEnhanced traction\r\nThe zonal herringbone outsole adds extra grip on the court\r\nPadded support\r\nThe molded, padded ankle collar offers enhanced comfort'),
('B1030', 'EXPLOSIVE IGNITE 2018 WIDE SHOES', 250.00, 'Basket5Gredboys.jpg', 'grey', 10, 'basketball', 'COMFORTABLE SHOES BUILT WITH EXTRA MIDFOOT STABILITY.', 'These kids shoes are built to help little ones improve their game in comfort. A wider fit offers extra comfort and stability for side-to-side movement, while enhanced cushioning in the midsole and sockliner lets them work on their game all day long. A lightweight upper adds durability to power through the entire season.'),
('e3', 'AAAA', 450.00, 'southern.PNG', 'asdasd', 10, 'lifestyle', '', ''),
('F1002', 'X TANGO 18.4 INDOOR BOOTS', 198.00, 'Fmen/Foot1White.jpg', 'white', 10, 'football', 'BULLET SPEED, SCULPTED FOR THE SPEED MERCHANT.', 'Sculpted for speed, these lightweight football boots are optimised for indoor play. A synthetic upper offers a snug, supportive fit, while the rubber outsole provides superb traction on flat surfaces. \r\nSupportive comfort \r\nSnug fit keeps the foot supported and comfortable \r\nIndoor traction \r\nSupreme traction from a rubber outsole optimised for flat and indoor surfaces '),
('F1003', 'X TANGO 18.4 INDOOR BOOTS', 198.00, 'Fmen/Foot1Yellow.jpg', 'yellow', 10, 'football', 'BULLET SPEED, SCULPTED FOR THE SPEED MERCHANT.', 'If you know which strings will have your rivals dancing to your tune, you are ready to lace up Predator. Built for precision on indoor surfaces, these junior is football boots have a supportive synthetic upper that wraps around your foot, locking you in for total control. Embossing on the surface adds confidence to every touch.'),
('F1004', 'X 18.2 FIRM GROUND BOOTS', 850.00, 'Fmen/Foot2Black.jpg', 'black', 10, 'football', 'LIGHTWEIGHT BOOTS RESERVED FOR PLAYERS WHO RUN ON FEARLESSNESS.', 'If you can supercharge your game while your rivals are running on empty, you are cleared to fly in X. The thin mesh upper on these ultralight football boots delivers a minimal feel and a natural touch. The outsole has two different stud shapes to assist with quick stops and starts on firm ground. A snug, supportive fit and low-cut collar combine to lock you in for the ride. \r\n\r\nMade to move \r\nA minimal feel and more direct touch from a lightweight mesh upper engineered for high acceleration \r\n\r\nLockdown fit \r\nPremium sock-like construction for adaptive support, super-light comfort and ease of entry; Low-cut silhouette with signature Clawcollar shape locks your foot into the boot for match-long stability and support \r\n\r\nFly on firm ground \r\nLightweight TPU outsole offers the best balance between high speed and traction; Arrowhead forefoot studs combined with round heel studs enable quick starts and stops on firm ground '),
('F1005', 'ADIDAS X 17.1 FIRM GROUND', 600.00, 'Fwomen/Foot2Black.jpg', 'black', 10, 'football', '', 'Following the “do not fix what is not broken” approach, the Adidas X 17.1 has similar tech specs as its predecessor, the Adidas X 16.1. Because of its one-piece construction, the touch on the ball and thickness across the entire upper is consistent. \r\n\r\nThe Adidas X 17.1 Firm Ground features a TechFit compression upper that molds to the shape of the foot, giving it a second-skin fit. The heightened TechFit collar and the curved design at the back also offer flexible ankle support. \r\n\r\nFurthermore, this soccer cleat uses the Non-Stop Grip (NSG) technology that enhances the grip on the ball. \r\n\r\nThe Adidas X 17.1 Firm Ground has the lightweight SprintFrame outsole as well. This TPU plastic material is flexible and moves nicely with the foot. '),
('F1006', 'X 18.2 FIRM GROUND BOOTS', 850.00, 'Fmen/Foot2White.jpg', 'white', 10, 'football', 'LIGHTWEIGHT BOOTS RESERVED FOR PLAYERS WHO RUN ON FEARLESSNESS.', 'If you can supercharge your game while your rivals are running on empty, you are cleared to fly in X. The thin mesh upper on these ultralight football boots delivers a minimal feel and a natural touch. The outsole has two different stud shapes to assist with quick stops and starts on firm ground. A snug, supportive fit and low-cut collar combine to lock you in for the ride. \r\n\r\nMade to move \r\nA minimal feel and more direct touch from a lightweight mesh upper engineered for high acceleration \r\n\r\nLockdown fit \r\nPremium sock-like construction for adaptive support, super-light comfort and ease of entry; Low-cut silhouette with signature Clawcollar shape locks your foot into the boot for match-long stability and support \r\n\r\nFly on firm ground \r\nLightweight TPU outsole offers the best balance between high speed and traction; Arrowhead forefoot studs combined with round heel studs enable quick starts and stops on firm ground '),
('F1007', 'X 18.2 FIRM GROUND BOOTS', 850.00, 'Fmen/Foot2Yellow.jpg', 'yellow', 10, 'football', 'LIGHTWEIGHT BOOTS RESERVED FOR PLAYERS WHO RUN ON FEARLESSNESS.', 'If you can supercharge your game while your rivals are running on empty, you are cleared to fly in X. The thin mesh upper on these ultralight football boots delivers a minimal feel and a natural touch. The outsole has two different stud shapes to assist with quick stops and starts on firm ground. A snug, supportive fit and low-cut collar combine to lock you in for the ride. \r\n\r\nMade to move \r\nA minimal feel and more direct touch from a lightweight mesh upper engineered for high acceleration \r\n\r\nLockdown fit \r\nPremium sock-like construction for adaptive support, super-light comfort and ease of entry; Low-cut silhouette with signature Clawcollar shape locks your foot into the boot for match-long stability and support \r\n\r\nFly on firm ground \r\nLightweight TPU outsole offers the best balance between high speed and traction; Arrowhead forefoot studs combined with round heel studs enable quick starts and stops on firm ground'),
('F1008', 'X TANGO 18.1 TRAINERS', 300.00, 'Fmen/Foot3Blue.jpg', 'blue', 10, 'football', 'LIVE LIFE AT LIGHT SPEED.', 'Sculpted for speed, fashioned for the street. These football trainers share the lightweight comfort and distinctive silhouette of their on-pitch counterparts. The thin mesh upper is fully breathable, and a layer of responsive cushioning charges every stride to keep you one step ahead. '),
('F1009', 'ADIDAS ACE 17.1 FIRM GROUND', 650.00, 'Fwomen/Foot3Blue.jpg', 'blue', 10, 'football', 'ADIDAS ACE 17.1 FIRM GROUND', 'Building from the previous football boot model, there were several changes showcased into the Adidas Ace 17.1 Firm Ground football boots. This model features a women and men’s version as well. \r\n\r\nStarting with the upper of the men’s version of these cleats; instead of having a full PrimeKnit cover like its predecessor, this model fused it with a new technology called ControlSkin - this material has been primarily placed in the midfoot while the PrimeKnit covers the toe-box. For women, the Adidas Ace 17.1 features a Kangaroo leather forefoot with a PrimeMesh on the quarter. \r\n\r\nBeing the only model featuring a lacing system in the Adidas Ace 17 silo, the Adidas Ace 17.1 men’s model features three lace holes above the toe box to create more stability to the boot. The women’s version features a traditional lacing system. \r\n\r\nWhile the tongue is non-existent for the men’s version, it has a PureCut control fit collar which is elasticated and helps the foot slide in and out of the boot. A pull-tab on the heel is also available to slip into the boots with ease. \r\n\r\nThe inside of these firm ground football cleats features a synthetic leather liner that adds comfort when worn. \r\n\r\nThe soleplate utilizes the SprintFrame technology which was also used in the Adidas Ace 16 line. '),
('F1010', 'X TANGO 18.1 TRAINERS', 300.00, 'Fmen/Foot3White.jpg', 'white', 10, 'football', 'LIVE LIFE AT LIGHT SPEED.', 'Sculpted for speed, fashioned for the street. These football trainers share the lightweight comfort and distinctive silhouette of their on-pitch counterparts. The thin mesh upper is fully breathable, and a layer of responsive cushioning charges every stride to keep you one step ahead. '),
('F1011', 'X TANGO 18.1 TRAINERS', 300.00, 'Fmen/Foot3Yellow.jpg', 'yellow', 10, 'football', 'LIVE LIFE AT LIGHT SPEED.', 'Sculpted for speed, fashioned for the street. These football trainers share the lightweight comfort and distinctive silhouette of their on-pitch counterparts. The thin mesh upper is fully breathable, and a layer of responsive cushioning charges every stride to keep you one step ahead. '),
('F1012', 'PUREBOOST GO SHOES', 500.00, 'Fmen/Foot4Blue.jpg', 'blue', 10, 'football', 'ADAPTIVE RUNNING SHOES MADE FOR CITY STREETS.', 'Built to handle curbs, corners and uneven sidewalks, these natural running shoes have an expanded landing zone and a heel plate for added stability. A lightweight and stretchy knit upper supports your native stride. Energised cushioning works with the flexible outsole to give you a smooth and comfortable ride. '),
('F1013', 'PUREBOOST GO SHOES', 500.00, 'Fmen/Foot4Gred.jpg', 'gred', 10, 'football', 'ADAPTIVE RUNNING SHOES MADE FOR CITY STREETS.', 'Built to handle curbs, corners and uneven sidewalks, these natural running shoes have an expanded landing zone and a heel plate for added stability. A lightweight and stretchy knit upper supports your native stride. Energised cushioning works with the flexible outsole to give you a smooth and comfortable ride. '),
('F1014', 'PUREBOOST GO SHOES', 500.00, 'Fmen/Foot4White.jpg', 'white', 10, 'football', 'ADAPTIVE RUNNING SHOES MADE FOR CITY STREETS.', 'Built to handle curbs, corners and uneven sidewalks, these natural running shoes have an expanded landing zone and a heel plate for added stability. A lightweight and stretchy knit upper supports your native stride. Energised cushioning works with the flexible outsole to give you a smooth and comfortable ride. '),
('F1015', 'ADIDAS NEMEZIZ 17.3 FIRM GROUND', 400.00, 'Fwomen/Foot4White.jpg', 'white', 10, 'football', 'ADAPTIVE RUNNING SHOES MADE FOR CITY STREETS.', 'The Adidas Nemeziz 17.1 FG features the new Agility Bandage on the upper as well as the Dual Lock Collar construction around the ankle to provide good lockdown. The 360 Torsion Tape molds with the shape of the foot providing comfort right out of the box. \r\n\r\nThis football boot also uses the new Agility Knit 2.0 on the forefoot and the heel areas. This soft, adaptive material offers additional responsiveness to the shoe. \r\n\r\nThe upper is equipped with the Non-Stop Grip (NSG) technology that acts as a wet control element. It is also seen in other Adidas models such as the Adidas Predator 18.1 Firm Ground and the Adidas Predator 18+ Firm Ground. \r\n\r\nThe lightweight Torsion Frame outsole with the Torsion Ribs follows the movement of the foot nicely. '),
('F1016', 'X 18.1 FIRM GROUND BOOTS', 900.00, 'Fmen/Foot5Red.jpg', 'red', 10, 'football', 'LIGHTWEIGHT BOOTS RESERVED FOR PLAYERS WHO RUN ON FEARLESSNESS.', 'If you can supercharge your game while your rivals are running on empty, you are cleared to fly in X. The thin mesh upper on these ultralight football boots delivers a minimal feel and a natural touch, while the outsole is perforated to shed weight. A low-cut collar and moulded heel combine to lock you in for the ride. '),
('F1017', 'X 18.1 FIRM GROUND BOOTS', 900.00, 'Fmen/Foot5White.jpg', 'white', 10, 'football', 'LIGHTWEIGHT BOOTS RESERVED FOR PLAYERS WHO RUN ON FEARLESSNESS.', 'If you can supercharge your game while your rivals are running on empty, you are cleared to fly in X. The thin mesh upper on these ultralight football boots delivers a minimal feel and a natural touch, while the outsole is perforated to shed weight. A low-cut collar and moulded heel combine to lock you in for the ride. '),
('F1018', 'ADIDAS NEMEZIZ 17.1 FIRM GROUND', 750.00, 'Fwomen/Foot5White.jpg', 'white', 10, 'football', '', 'The Adidas Nemeziz 17.3 features a synthetic upper material called the Agility Mesh. This soft and flexible mesh-based material is covered by a thin layer of polyurethane similar to other models of the Nemeziz line. \r\n\r\nThis soccer cleat also has a Dual Lock collar construction that keeps the ankle locked in place while running and striking. \r\n\r\nThe sole of the Adidas Nemeziz 17.3, which is made of TPU plastic, is fairly flexible allowing the players to move around without discomfort.'),
('F1019', 'X 18.3 FIRM GROUND BOOTS', 320.00, 'Fmen/Foot6Red.jpg', 'red', 10, 'football', 'LIGHTWEIGHT BOOTS RESERVED FOR PLAYERS WHO RUN ON FEARLESSNESS.', 'If you can supercharge your game while your rivals are running on empty, you are cleared to fly in X. The thin mesh upper on these ultralight football boots delivers a minimal feel and a natural touch, while the outsole is perforated to shed weight. A low-cut collar and moulded heel combine to lock you in for the ride. '),
('F1020', 'X 18.3 FIRM GROUND BOOTS', 320.00, 'Fmen/Foot6White.jpg', 'white', 10, 'football', 'LIGHTWEIGHT BOOTS RESERVED FOR PLAYERS WHO RUN ON FEARLESSNESS.', 'If you can supercharge your game while your rivals are running on empty, you are cleared to fly in X. The thin mesh upper on these ultralight football boots delivers a minimal feel and a natural touch, while the outsole is perforated to shed weight. A low-cut collar and moulded heel combine to lock you in for the ride. '),
('F1021', 'ADIDAS ACE 17.3 FIRM GROUND', 320.00, 'Fwomen/Foot6White.jpg', 'white', 10, 'football', '', 'Similar to its lower tier predecessors, the Adidas Ace 17.3 Firm Ground utilizes PrimeMesh in its upper. Although it almost looks identical with the Ace 17.2, the 17.3 model made a few tweaks in its upper configuration. Combining the PrimeMesh with synthetic neoprene material, the football boot aims to provide that sock-like fit and that superior touch that allows for great ball control. \r\n\r\nAnother feature of the football boot is its Primecut silhouette, which is specifically designed to provide a streamlined fit around the ankle. This version of the Adidas Ace 17 allows players to test out how this style of collared boots performs without necessarily breaking the bank. \r\n\r\nThe boot is outsole is configured with the Total Control alignment to give players the stability and traction they need to power up their play. These studs work impressively on firm ground as well as on artificial grass, allowing for efficient, high-speed plays. '),
('F1022', 'X TANGO 18.3 INDOOR BOOTS', 320.00, 'Fmen/Foot7Black.jpg', 'black', 10, 'football', 'LIGHTWEIGHT BOOTS RESERVED FOR PLAYERS WHO RUN ON FEARLESSNESS.', 'If you can supercharge your game while your rivals are running on empty, you are cleared to fly in X. The thin mesh upper on these ultralight football boots delivers a minimal feel and a natural touch, while the outsole is perforated to shed weight. A low-cut collar and moulded heel combine to lock you in for the ride. '),
('F1023', 'ADIDAS NERMEZIZ 17+ 360 AGILITY FIRM GROUND', 320.00, 'Fwomen/Foot7Black.jpg', 'black', 10, 'football', '', 'The upper of the Adidas Nemeziz 17+ 360 Agility uses the new Agility Knit 2.0 in the forefoot and heel areas. It is an interlocking yarn structure that provides a soft touch on the ball. \r\n\r\nAnother interesting feature of this football shoe’s upper is the 360 Agility Bandage system. It is made up of several Torsion Tapes sewn together to deliver an excellent fit and barefoot feel. \r\n\r\nThis football boot also features the TorsionFrame technology on the sole plate. This lightweight, flexible material adapts to the movements of the foot easily. \r\n\r\nThe stud pattern is composed of 11 half-moon-shaped studs with the flat sides facing inwards. They are angled in such a way so that they give more bite when changing directions compared to the traditional conical studs.'),
('F1024', 'X TANGO 18.3 INDOOR BOOTS', 320.00, 'Fmen/Foot7White.jpg', 'white', 10, 'football', 'LIGHTWEIGHT BOOTS RESERVED FOR PLAYERS WHO RUN ON FEARLESSNESS.', 'If you can supercharge your game while your rivals are running on empty, you are cleared to fly in X. The thin mesh upper on these ultralight football boots delivers a minimal feel and a natural touch, while the outsole is perforated to shed weight. A low-cut collar and moulded heel combine to lock you in for the ride. '),
('F1025', 'ADIDAS X 17.2 FIRM GROUND', 320.00, 'Fwomen/Foot8Black.jpg', 'black', 10, 'football', '', 'The Adidas X 17.2 features the TechFit construction upper. This soft material provides a snug fit and comfortable feel right out of the box. \r\n\r\nAdidas incorporated a knitted top workpiece to offer a sock-like construction on the ankle for excellent lockdown. \r\n\r\nThis football boot also features a flexible soleplate and stud pattern that are designed primarily for dry, natural grass. The sole plate is made of TPU (Thermoplastic Polyurethane) plastic material that adapts to the movement of the foot. '),
('F1026', 'X 17.2 FIRM GROUND BOOTS', 420.00, 'Fmen/Foot8White.jpg', 'white', 10, 'football', 'EXPLOSIVE QUICKNESS FOR THE SPEED DEMON', 'Make your speed the opposition is worst enemy in these lightweight football boots. A supportive four-way-stretch upper fits like a sock, while the mid-cut design delivers stability at high speeds. Breathable mesh helps you stay cool when you are flying around the pitch. The outsole is geared for explosive acceleration on firm ground. '),
('F1027', 'ADIDAS NEMEZIZ 17.4 FIRM GROUND', 600.00, 'Fwomen/Foot9Blue.jpg', 'blue', 10, 'football', '', 'Living up to the Messi name, the Nemeziz 17.4 Firm Ground is meant to deliver unstoppable agility to the playground. Equipped with innovative technologies that make it unique on the pitch, this football boot is ready to give the competition a run for their money. \r\n\r\nOne of the features of this football boot is a soft, synthetic Agility Mesh upper that offers a responsive touch on the ball. The upper is also equipped with an Agility Touch Skin that wraps perfectly around the foot at first wear. It also gives a locked-in fit for a more secure run on the pitch. \r\n\r\nCompared to its flagship model that debuted in a laceless design, this take-down version utilizes a standard lace-up closure that offers an adaptive fit. It also wears a basic tongue that showcases the Adidas logo. \r\n\r\nAnother feature of this football boot is its Agility outsole. It is meant to deliver explosive speed and excellent traction on natural grass pitches through its triangular studs. '),
('F1028', 'X TANGO 17.3 TURF BOOTS', 245.00, 'Fmen/Foot9Gold.jpg', 'gold', 10, 'football', 'EXPLOSIVE QUICKNESS FOR THE SPEED DEMON', 'Make your speed the opposition is worst enemy in these lightweight football boots. A supportive four-way-stretch upper fits like a sock, while the mid-cut design delivers stability at high speeds. Breathable mesh helps you stay cool when you are flying around the pitch. The outsole is geared for explosive acceleration on firm ground. '),
('L1001', 'CONTINENTAL 80 SHOES', 450.00, 'CONTINENTAL 80 SHOES.jpg', 'white', 10, 'lifestyle', '', ''),
('L1002', 'CONTINENTAL 80 SHOES', 450.00, 'CONTINENTAL 80 SHOES black.jpg', 'black', 10, 'lifestyle', '', ''),
('L1003', 'NITE JOGGER SHOES', 650.00, 'NITE JOGGER SHOES.jpg', 'grey', 10, 'lifestyle', '', ''),
('L1004', 'NITE JOGGER SHOES', 650.00, 'NITE JOGGER SHOES white.jpg', 'white', 10, 'lifestyle', '', ''),
('L1005', 'POD-S3.1 SHOES', 630.00, 'POD-S3.1 SHOES.jpg', 'white', 10, 'lifestyle', '', ''),
('L1006', 'POD-S3.1 SHOES', 630.00, 'POD-S3.1 SHOES black.jpg', 'black', 10, 'lifestyle', '', ''),
('L1007', '3MC VULC SHOES', 280.00, '3MC VULC SHOES.jpg', 'grey', 10, 'lifestyle', '', ''),
('L1009', 'SUPERCOURT SHOES', 500.00, 'SUPERCOURT SHOES.jpg', 'black', 10, 'lifestyle', '', ''),
('L1010', 'SUPERCOURT SHOES', 280.00, 'SUPERCOURT SHOES white.jpg', 'white', 10, 'lifestyle', '', ''),
('L1011', 'LITE RACER CLN SHOES', 260.00, 'LITE RACER CLN SHOES.jpg', 'blue', 10, 'lifestyle', '', ''),
('L1012', 'LITE RACER CLN SHOES', 260.00, 'LITE RACER CLN SHOES maroon.jpg', 'maroon', 10, 'lifestyle', '', ''),
('L1013', 'YUNG-96 SHOES', 480.00, 'YUNG-96 SHOES.jpg', 'silver', 10, 'lifestyle', '', ''),
('L1014', 'YUNG-96 SHOES', 480.00, 'YUNG-96 SHOES clear brown.jpg', 'clear brown', 10, 'lifestyle', '', ''),
('L1015', 'NMD_R1 SHOES', 650.00, 'NMD_R1 SHOES.jpg', 'brown', 10, 'lifestyle', '', ''),
('L1016', 'NMD_R1 SHOES', 650.00, 'NMD_R1 SHOES black.jpg', 'black', 10, 'lifestyle', '', ''),
('L1017', 'I-5923 SHOES', 550.00, 'I-5923 SHOES.jpg', 'black', 10, 'lifestyle', '', ''),
('L1018', 'I-5923 SHOES', 550.00, 'I-5923 SHOES scarlet.jpg', 'scarlet', 10, 'lifestyle', '', ''),
('L1019', 'ARKYN SHOES', 600.00, 'ARKYN SHOES.jpg', 'blue', 10, 'lifestyle', '', ''),
('L1020', 'ARKYN SHOES', 600.00, 'ARKYN SHOES pink.jpg', 'pink', 10, 'lifestyle', '', ''),
('L1023', 'ULTIMAMOTION SHOES', 330.00, 'ULTIMAMOTION SHOES.jpg', 'black', 10, 'lifestyle', '', ''),
('L1024', 'ULTIMAMOTION SHOES', 330.00, 'ULTIMAMOTION SHOES.jpg', 'white', 10, 'lifestyle', '', ''),
('L1027', 'PROPHERE SHOES', 520.00, 'PROPHERE SHOES.jpg', 'white', 10, 'lifestyle', '', ''),
('L1028', 'PROPHERE SHOES', 520.00, 'PROPHERE SHOES black.jpg', 'black', 10, 'lifestyle', '', ''),
('L1031', 'STAN SMITH SHOES', 420.00, 'STAN SMITH SHOES.jpg', 'white', 10, 'lifestyle', '', ''),
('L1032', 'STAN SMITH SHOES', 420.00, 'STAN SMITH SHOES white and green.jpg', 'white and green', 10, 'lifestyle', '', ''),
('L1033', 'QUESTAR FLOW SHOES', 350.00, 'QUESTAR FLOW SHOES.jpg', 'black', 10, 'lifestyle', '', ''),
('L1034', 'QUESTAR FLOW SHOES', 350.00, 'QUESTAR FLOW SHOES grey.jpg', 'grey', 10, 'lifestyle', '', ''),
('L1035', 'FALCON SHOES', 480.00, 'FALCON SHOES.jpg', 'purple', 10, 'lifestyle', '', ''),
('L1036', 'FALCON SHOES', 480.00, 'FALCON SHOES periwinkle.jpg', 'periwinkle', 10, 'lifestyle', '', ''),
('R1001', 'ALPHAEDGE 4D SHOES', 1400.00, 'Rmen/Run1Black.jpg', 'black', 10, 'running', 'LIGHTWEIGHT RUNNING SHOES DESIGNED TO GIVE ATHLETES AN EDGE.', 'Push yourself further, faster, in running shoes that deliver tuned energy to every stride. A breathable mesh upper features zoned areas of support for added lateral stability. Carbon 4D technology in the midsole offers a snappy ride and controlled energy return. The durable rubber outsole provides superior grip.'),
('R1002', 'ADIZERO PRIME SHOES', 720.00, 'Rwomen/Run1Black.jpg', 'black', 10, 'running', 'LIGHTWEIGHT RUNNING SHOES WITH ENERGY-RETURNING CUSHIONING', 'Built for fast training and racing, these neutral running shoes have a lightweight knit upper that offers long-lasting support and comfort. A custom lacing system locks down the fit. A flexible outsole works with the responsive midsole cushioning to give you a smooth ride. '),
('R1003', 'ALPHAEDGE 4D SHOES', 1400.00, 'Rmen/Run1White.jpg', 'white', 10, 'running', 'LIGHTWEIGHT RUNNING SHOES DESIGNED TO GIVE ATHLETES AN EDGE.\r\n', 'Push yourself further, faster, in running shoes that deliver tuned energy to every stride. A breathable mesh upper features zoned areas of support for added lateral stability. Carbon 4D technology in the midsole offers a snappy ride and controlled energy return. The durable rubber outsole provides superior grip. '),
('R1004', 'ULTRABOOST 19 SHOES', 850.00, 'Rmen/Run2Black.jpg', 'black', 10, 'running', 'SHOES WITH ENDLESS ENERGY FOR LONG CITY RUNS.', 'Push yourself further, faster, in running shoes that deliver tuned energy to every stride. A breathable mesh upper features zoned areas of support for added lateral stability. Carbon 4D technology in the midsole offers a snappy ride and controlled energy return. The durable rubber outsole provides superior grip. '),
('R1005', 'ALPHAEDGE 4D SHOES', 1200.00, 'Rwomen/Run2Black.jpg', 'black', 10, 'running', 'LIGHTWEIGHT RUNNING SHOES DESIGNED TO GIVE ATHLETES AN EDGE.', 'Push yourself further, faster, in running shoes that deliver tuned energy to every stride. A breathable mesh upper features zoned areas of support for added lateral stability. Carbon 4D technology in the midsole offers a snappy ride and controlled energy return. The durable rubber outsole provides superior grip. '),
('R1006', 'ULTRABOOST 19 SHOES', 850.00, 'Rmen/Run2Blue.jpg', 'blue', 10, 'running', 'SHOES WITH ENDLESS ENERGY FOR LONG CITY RUNS', 'Push yourself further, faster, in running shoes that deliver tuned energy to every stride. A breathable mesh upper features zoned areas of support for added lateral stability. Carbon 4D technology in the midsole offers a snappy ride and controlled energy return. The durable rubber outsole provides superior grip. '),
('R1007', 'ULTRABOOST 19 SHOES', 850.00, 'Rmen/Run2Red.jpg', 'red', 10, 'running', 'SHOES WITH ENDLESS ENERGY FOR LONG CITY RUNS', 'Push yourself further, faster, in running shoes that deliver tuned energy to every stride. A breathable mesh upper features zoned areas of support for added lateral stability. Carbon 4D technology in the midsole offers a snappy ride and controlled energy return. The durable rubber outsole provides superior grip. '),
('R1008', 'ULTRABOOST 19 SHOES', 850.00, 'Rmen/Run2White.jpg', 'white', 10, 'running', 'SHOES WITH ENDLESS ENERGY FOR LONG CITY RUNS', 'Push yourself further, faster, in running shoes that deliver tuned energy to every stride. A breathable mesh upper features zoned areas of support for added lateral stability. Carbon 4D technology in the midsole offers a snappy ride and controlled energy return. The durable rubber outsole provides superior grip. '),
('R1010', 'ULTRABOOST SHOES', 750.00, 'Rmen/Run3Blue.jpg', 'blue', 10, 'running', 'ADAPTIVE RUNNING SHOES WITH ENERGISED CUSHIONING.', 'Built for comfort and performance. These men is running shoes have a breathable knit upper with ventilation in key sweat zones to help keep feet cool and dry. A flexible outsole moves in harmony with responsive cushioning for a smooth, energy-filled ride. '),
('R1011', 'ADIZERO PRIME LTD SHOES', 720.00, 'Rwomen/Run3Blue.jpg', 'blue', 10, 'running', 'ENERGY-RETURNING SHOES FOR FAST TRAINING.', 'Made for fast training on the road or the track, these neutral running shoes have a lightweight knit upper that adapts to the shape of your foot as you run. The dual-lacing system allows you to personalise the fit for precise lockdown. Responsive cushioning keeps your stride energised. '),
('R1012', 'SOLABOOST 19 SHOES', 650.00, 'Rmen/Run4Black.jpg', 'black', 10, 'running', 'STABILITY RUNNING SHOES WITH TARGETED SUPPORT AND DUAL-DENSITY CUSHIONING.', 'There is no such thing as an ordinary run. These men is stability shoes provide targeted support and optimal comfort for everyday long-distance running. Inspired by NASA technology, the mesh upper has stitched-in areas of reinforcement for precisely calibrated support. Dual-density cushioning is firmer on the medial side to guide your foot for a smooth, confident ride. \r\n\r\nPrecision support \r\nTailored Fibre Placement offers stitched-in reinforcement for targeted support at the midfoot \r\n\r\nEndless energy \r\nDual-density Boost cushioning on the medial side provides energised stability for a smooth, responsive ride \r\n\r\nStability rail \r\nSolar Propulsion Rail helps to support and guide the foot '),
('R1013', 'SOLABOOST 19 SHOES', 650.00, 'Rmen/Run4White.jpg', 'white', 10, 'running', 'STABILITY RUNNING SHOES WITH TARGETED SUPPORT AND DUAL-DENSITY CUSHIONING.', 'MThere is no such thing as an ordinary run. These men is stability shoes provide targeted support and optimal comfort for everyday long-distance running. Inspired by NASA technology, the mesh upper has stitched-in areas of reinforcement for precisely calibrated support. Dual-density cushioning is firmer on the medial side to guide your foot for a smooth, confident ride. \r\n\r\nPrecision support \r\nTailored Fibre Placement offers stitched-in reinforcement for targeted support at the midfoot \r\n\r\nEndless energy \r\nDual-density Boost cushioning on the medial side provides energised stability for a smooth, responsive ride \r\n\r\nStability rail \r\nSolar Propulsion Rail helps to support and guide the foot'),
('R1015', 'SENSEBOOST GO SHOES', 500.00, 'Rmen/Run5Black.jpg', 'black', 10, 'running', 'FORM-FITTING RUNNING SHOES FOR EVERYDAY PRACTICE AND PLAY.', 'Built for a locked-down feel, these junior is running shoes feature a form-fitting textile upper that offers support in key zones as you move. The cushioned Boost midsole provides energy return with each stride. A soft rubber outsole offers superior grip on the track.'),
('R1016', 'SENSEBOOST GO SHOES', 500.00, 'Rmen/Run5Blue.jpg', 'blue', 10, 'running', 'FORM-FITTING RUNNING SHOES FOR EVERYDAY PRACTICE AND PLAY.', 'Built for a locked-down feel, these junior is running shoes feature a form-fitting textile upper that offers support in key zones as you move. The cushioned Boost midsole provides energy return with each stride. A soft rubber outsole offers superior grip on the track.'),
('R1017', 'SENSEBOOST GO SHOES', 500.00, 'Rmen/Run5White.jpg', 'white', 10, 'running', 'FORM-FITTING RUNNING SHOES FOR EVERYDAY PRACTICE AND PLAY.', 'Built for a locked-down feel, these junior is running shoes feature a form-fitting textile upper that offers support in key zones as you move. The cushioned Boost midsole provides energy return with each stride. A soft rubber outsole offers superior grip on the track.'),
('R1018', 'AM 4 RTN', 600.00, 'Rwomen/Run5White.jpg', 'white', 10, 'running', 'CLOUDFOAM RACER TR SHOES', 'Inspired by trail runners, ready for the playground. These kids shoes are built for fun adventures, with a two-tone knit upper and a rugged look. cloudfoam cushioning adds comfort.'),
('R1019', 'ALPHABOUNCE+RUN PARLEY SHOES', 450.00, 'Rmen/Run6Black.jpg', 'black', 10, 'running', 'RUNNING SHOES MADE WITH YARN SPUN FROM RECYCLED PLASTIC.', 'Choose to be better every day. These running shoes feature forging in key areas to deliver reinforcement and an unrestricted fit. A wide forefoot platform supports multidirectional movement. The shoes are made with Parley Ocean Plastic™ yarn thats sourced from recycled plastic.'),
('R1021', 'ULTRABOOST S&L SHOES', 750.00, 'Rmen/Run7Blue.jpg', 'blue', 10, 'running', 'LEATHER RUNNING SHOES WITH ENERGISED CUSHIONING.', 'Ultraboost comfort and performance in premium leather. These womens running shoes are designed with a soft leather upper. A flexible outsole moves in harmony with responsive cushioning for a smooth, energy-filled ride.'),
('R1022', 'ULTRABOOST 9 SHOES', 720.00, 'Rwomen/Run7Blue.jpg', 'blue', 10, 'running', 'SHOES WITH ENDLESS ENERGY FOR LONG CITY RUNS.', 'Running reinvented. These high-performance neutral running shoes deliver unrivalled comfort and energy return. The lightweight and propulsive shoes have a seamless knit upper thats engineered with motion weave technology to provide stretch while also holding your foot in place while you run. The second-skin fit follows the shape of your foot to reduce pressure points. '),
('R1023', 'ULTRABOOST S&L SHOES', 750.00, 'Rmen/Run7Gred.jpg', 'gred', 10, 'running', 'LEATHER RUNNING SHOES WITH ENERGISED CUSHIONING.', 'Ultraboost comfort and performance in premium leather. These womens running shoes are designed with a soft leather upper. A flexible outsole moves in harmony with responsive cushioning for a smooth, energy-filled ride. '),
('R1024', 'ULTRABOOST 9 SHOES', 720.00, 'Rwomen/Run7Pink.jpg', 'pink', 10, 'running', 'SHOES WITH ENDLESS ENERGY FOR LONG CITY RUNS.', 'Running reinvented. These high-performance neutral running shoes deliver unrivalled comfort and energy return. The lightweight and propulsive shoes have a seamless knit upper thats engineered with motion weave technology to provide stretch while also holding your foot in place while you run. The second-skin fit follows the shape of your foot to reduce pressure points. '),
('R1025', 'SOLAR DRIVE 19 SHOES', 450.00, 'Rmen/Run8Black.jpg', 'black', 10, 'running', 'BREATHABLE RUNNING SHOES WITH A STABLE FEEL.', 'Feel confident on your daily run. These womens shoes have a breathable mesh upper thats designed for an irritation-free fit. A Solar Propulsion Rail helps to guide the foot from touchdown to toe-off. Responsive cushioning returns energy to your stride. \r\n\r\nEndless energy \r\nBoost is our most responsive cushioning ever, delivering incredible energy return: The more energy you give, the more you get \r\n\r\nStability rail \r\nSolar Propulsion Rail helps to support and guide the foot '),
('R1026', 'DURAMO 9 SHOES', 260.00, 'Rwomen/Run8Black.jpg', 'black', 10, 'running', 'CUSHIONED RUNNING SHOES WITH A BREATHABLE MESH UPPER.', 'These mens versatile running shoes are ideal for the treadmill or the trail. They feature a two-layer mesh upper for breathability and a seamless print overlay for additional support. Pillow-soft Cloudfoam cushions every stride, while the durable outsole provides long-lasting wear. '),
('R1027', 'SOLAR DRIVE 19 SHOES', 450.00, 'Rmen/Run8Blue.jpg', 'blue', 10, 'running', 'BREATHABLE RUNNING SHOES WITH A STABLE FEEL.', 'Feel confident on your daily run. These womens shoes have a breathable mesh upper thats designed for an irritation-free fit. A Solar Propulsion Rail helps to guide the foot from touchdown to toe-off. Responsive cushioning returns energy to your stride. \r\n\r\nEndless energy \r\nBoost is our most responsive cushioning ever, delivering incredible energy return: The more energy you give, the more you get \r\n\r\nStability rail \r\nSolar Propulsion Rail helps to support and guide the foot '),
('R1029', 'PUREBOOST DPR SHOES', 600.00, 'Rmen/Run9Black.jpg', 'black', 10, 'running', 'LIGHTWEIGHT RUNNING SHOES WITH ENERGISED CUSHIONING.', 'City running means constantly adjusting to changing conditions. These shoes are designed with a close-to-the-ground feel to help you stay in tune with your surroundings. An expanded landing zone increases stability during lateral movements. The knit upper adapts to the shape of your foot as you run, and responsive cushioning keeps you energised. \r\n\r\nEndless energy \r\nBoost is our most responsive cushioning ever, delivering incredible energy return: The more energy you give, the more you get \r\n\r\nNatural fit \r\nFitcounter moulded heel counter provides a natural fit that allows optimal movement of the Achilles '),
('R1030', 'PUREBOOST DPR SHOES', 600.00, 'Rmen/Run9Gred.jpg', 'gred', 10, 'running', 'LIGHTWEIGHT RUNNING SHOES WITH ENERGISED CUSHIONING.', 'City running means constantly adjusting to changing conditions. These shoes are designed with a close-to-the-ground feel to help you stay in tune with your surroundings. An expanded landing zone increases stability during lateral movements. The knit upper adapts to the shape of your foot as you run, and responsive cushioning keeps you energised. \r\n\r\nEndless energy \r\nBoost is our most responsive cushioning ever, delivering incredible energy return: The more energy you give, the more you get \r\n\r\nNatural fit \r\nFitcounter moulded heel counter provides a natural fit that allows optimal movement of the Achilles '),
('R1031', 'ULTRABOOST X 3D SHOES', 920.00, 'Rwomen/Run9Red.jpg', 'red', 10, 'running', 'RUNNING SHOES WITH A WOMEN S-SPECIFIC DESIGN AND RESPONSIVE CUSHIONING.', 'These shoes were created using motion capture technology to meet the needs of the female runner. A women s-specific arch offers a uniquely supportive feel. The stretchy knit upper adapts to the changing shape of your foot as you run, and responsive cushioning delivers a smooth and energised ride. ');
INSERT INTO `product` (`id`, `name`, `price`, `image`, `color`, `quantity`, `style`, `title`, `description`) VALUES
('R1032', 'PUREBOOST DPR SHOES', 600.00, 'Rmen/Run9Gred.jpg', 'gred', 10, 'running', 'LIGHTWEIGHT RUNNING SHOES WITH ENERGISED CUSHIONING.', 'City running means constantly adjusting to changing conditions. These shoes are designed with a close-to-the-ground feel to help you stay in tune with your surroundings. An expanded landing zone increases stability during lateral movements. The knit upper adapts to the shape of your foot as you run, and responsive cushioning keeps you energised. \r\n\r\nEndless energy \r\nBoost is our most responsive cushioning ever, delivering incredible energy return: The more energy you give, the more you get \r\n\r\nNatural fit \r\nFitcounter moulded heel counter provides a natural fit that allows optimal movement of the Achilles '),
('R1033', 'PUREBOOST DPR SHOES', 600.00, 'Rmen/Run9White.jpg', 'white', 10, 'running', 'LIGHTWEIGHT RUNNING SHOES WITH ENERGISED CUSHIONING.', 'City running means constantly adjusting to changing conditions. These shoes are designed with a close-to-the-ground feel to help you stay in tune with your surroundings. An expanded landing zone increases stability during lateral movements. The knit upper adapts to the shape of your foot as you run, and responsive cushioning keeps you energised. \r\n\r\nEndless energy \r\nBoost is our most responsive cushioning ever, delivering incredible energy return: The more energy you give, the more you get \r\n\r\nNatural fit \r\nFitcounter moulded heel counter provides a natural fit that allows optimal movement of the Achilles '),
('T1001', 'ALPHABOUNCE 1 PARLEY SHOES', 294.00, 'TrainingKidsBoyAlphabounce1Parley.jpg', 'black', 10, 'training', 'CUSHIONED SHOES MADE WITH PARLEY OCEAN PLASTIC™ YARN.', 'These juniors running shoes are designed with a seamless mesh upper that supports and flexes with your foot through the gait cycle. Underfoot, Bounce provides comfortable cushioning.\r\nadidas is dedicated to creating products in ways that minimise their environmental impact. This product is created with yarn made in collaboration with Parley for the Oceans. Some of the yarn features Parley Ocean Plastic™ which is made from recycled waste, intercepted from beaches and coastal communities before it reaches the ocean.'),
('T1002', 'PUREBOOST GO SHOES', 440.00, 'TrainingKidsBoyPureboostGo.jpg', 'grey', 10, 'training', 'LIGHTWEIGHT, SUPPORTIVE SHOES FOR CITY RUNNING.', 'Designed for the uneven sidewalks, rain-slick pavement and unexpected obstacles of urban running. These juniors neutral shoes have a wider forefoot platform and higher heel for increased stability. A lightweight knit upper hugs and supports the foot. Responsive cushioning returns energy with every stride.'),
('T1003', 'RAPIDARUN KNIT SHOES', 226.00, 'TrainingKidsBoyRapidunKnit.jpg', 'black', 10, 'training', 'CUSHIONING RUNNING SHOES FOR A COMFORTABLE RIDE.', 'These juniors shoes offer performance with every stride. The adaptive knit upper moves naturally with every footstrike, while a Cloudfoam midsole offers pillow-soft cushioning for long-lasting comfort. A running-specific outsole and targeted support in key areas round out the design.'),
('T1004', 'RAPIDARUN LACELESS SHOES', 300.00, 'TrainingKidsBoyRapidunLaceles.jpg', 'black', 10, 'training', 'LIGHTWEIGHT, SUPPORTIVE SHOES FOR CITY RUNNING.', 'Designed for the uneven sidewalks, rain-slick pavement and unexpected obstacles of urban running. These juniors neutral shoes have a wider forefoot platform and higher heel for increased stability. A lightweight knit upper hugs and supports the foot. Responsive cushioning returns energy with every stride.'),
('T1005', 'ULTRABOOST SHOES', 800.00, 'TrainingKidsBoyUltraboost.jpg', 'grey', 10, 'training', 'JUNIORS RUNNING SHOES FOR RESPONSIVE ENERGY RETURN.', 'Whether you are sprinting past competitors or hanging with the pack, these juniors running shoes are designed to help you reach your goals. They have responsive cushioning for endless energy return. The knit upper wraps around your foot for a supportive feel while the grippy rubber outsole delivers traction on unpredictable surfaces.'),
('T1006', 'ALPHABOUNCE BEYOND SHOES', 300.00, 'TrainingKidsGirlAlphabounceBeyond.jpg', 'blue', 10, 'training', 'NEUTRAL RUNNING SHOES WITH A SOCK-LIKE FIT AND CUSHIONED COMFORT.', 'With the smooth construction of a Forgedmesh upper, these juniors running shoes deliver a comfortable, foot-hugging fit. Bounce cushioning provides flexible comfort for leaps and sprints during after-school sports.'),
('T1007', 'ALPHABOUNCE INSTINCT SHOES', 259.00, 'TrainingKidsGirlAlphabounceInstint.jpg', 'grey', 10, 'training', 'VERSATILE RUNNING SHOES WITH TARGETED SUPPORT.', 'Made for cross training, these juniors neutral running shoes have a seamless, supportive mesh upper. Strategic zones of reinforcement support lateral as well as linear movement. The flexible midsole offers enhanced cushioning and allows the foot to move naturally.'),
('T1008', '24/7 SHOES', 360.00, 'TrainingWomen24shoes.jpg', 'grey', 10, 'training', 'LIGHTWEIGHT TRAINING SHOES WITH STEP-IN COMFORT.', 'Made for cross training, these juniors neutral running shoes have a seamless, supportive mesh upper. Strategic zones of reinforcement support lateral as well as linear movement. The flexible midsole offers enhanced cushioning and allows the foot to move naturally.'),
('T1009', '24/7 SHOES', 360.00, 'TrainingWomen24shoes1.jpg', 'black', 10, 'training', 'LIGHTWEIGHT TRAINING SHOES WITH STEP-IN COMFORT.', 'Made for cross training, these juniors neutral running shoes have a seamless, supportive mesh upper. Strategic zones of reinforcement support lateral as well as linear movement. The flexible midsole offers enhanced cushioning and allows the foot to move naturally.'),
('T1010', 'CRAZYTRAIN ELITE SHOES', 455.00, 'TrainingWomenCrazyTrainElite.jpg', 'black', 10, 'training', 'MULTISPORT TRAINING SHOES WITH RESPONSIVE CUSHIONING.', 'These shoes have a training-specific design that supports multidirectional movement. The lightweight mesh upper hugs the foot with a sock-like fit. Built-in midfoot support provides stability, and forefoot flex gives you a wide range of motion. Responsive cushioning returns energy to your stride.'),
('T1011', 'CRAZYTRAIN LT SHOES', 140.00, 'TrainingWomenCrazyTrainLT1.jpg', 'red', 10, 'training', 'LIGHTWEIGHT TURF SHOES MADE FOR CROSS TRAINING.', 'Push past plateaus in these men or women turf training shoes. Dual-density Bounce for energised comfort and a lightweight build with a breathable mesh upper helps keep you going. The PU overlays and rubber outsole add stability and traction for quick direction changes.'),
('T1012', 'EDGEBOUNCE SHOES', 266.00, 'TrainingWomenCrazyTrainPro.jpg', 'black', 10, 'training', 'INSPIRED BY CREATORS, DESIGNED TO STAND OUT, CURATED FOR YOU.', 'Part of a statement collection inspired by Stella McCartney, these neutral running shoes are geared for gym floors or pavement. The womens-specific design features a wider forefoot and heel platform to deliver stability while cross training. The shoes have a stretch mesh upper that offers foot-cradling comfort.'),
('T1013', 'EDGEBOUNCE SHOES', 266.00, 'TrainingWomenEdgebounce1.jpg', 'white', 10, 'training', 'INSPIRED BY CREATORS, DESIGNED TO STAND OUT, CURATED FOR YOU.', 'Part of a statement collection inspired by Stella McCartney, these neutral running shoes are geared for gym floors or pavement. The womens-specific design features a wider forefoot and heel platform to deliver stability while cross training. The shoes have a stretch mesh upper that offers foot-cradling comfort.'),
('T1014', 'PUREBOOST X TR 3.0 LL SHOES', 280.00, 'TrainingWomenPureboostXTR3.0LL1.jpg', 'blue', 10, 'training', 'LACELESS HIGH CUTS WITH A WOMENS-SPECIFIC ARCH DESIGN.\r\n', 'Made for the athlete who likes to mix it up, these shoes have a progressive design, with a womens-specific arch that cradles the foot for a unique compression fit. The slip-on shoes have a knit upper with wraparound bands that hug the foot for support and stretch in any direction.');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffId` varchar(255) NOT NULL,
  `staffName` varchar(255) NOT NULL,
  `staffPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffId`, `staffName`, `staffPass`) VALUES
('1', 'Amin', '5566'),
('2', 'Jason', '2321');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `email`, `address`, `password`, `image`) VALUES
('5ddff89847507', 'MULI', 102, 'ramsa@gmail.com', 'Jalan Selang , Taman Selang', '1212', 'TrainingWomenPureboostXTR3.0LL1.jpg'),
('5de0b66a681e9', 'aaa', 12345678, 'aaa54@gmail.com', 'NO11,', '1', 'A1001.jpg'),
('5df265a06e963', 'woonxun', 198765432, 'wozx24@gmail.com', 'No1,Tman Selantan,Jalan Selantan,82000,Johor', '0620', 'man1.jpeg'),
('5e24d5a50dec3', 'long', 2147483647, 'long@gmail.com', '', 'long123', 'pexels1.jpeg'),
('5e42c02b3361a', 'ali', 198765432, 'ali@gmail.com', '', '11111', 'man1.jpeg'),
('5f17cdac91eb1', 'Tom', 12213123, 'wwe@gmail.com', '23123we', '1111', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `paybil`
--
ALTER TABLE `paybil`
  ADD PRIMARY KEY (`paidID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
