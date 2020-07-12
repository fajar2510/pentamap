-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2020 at 11:14 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sie_bankdarah`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_group`
--

CREATE TABLE `blood_group` (
  `id` int(11) NOT NULL,
  `group_name` varchar(3) NOT NULL,
  `information` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_group`
--

INSERT INTO `blood_group` (`id`, `group_name`, `information`) VALUES
(1, 'A', 'Antigen B'),
(2, 'B', 'Antigen A'),
(3, 'AB', '-'),
(4, 'O', 'Antigen A/B');

-- --------------------------------------------------------

--
-- Table structure for table `blood_order`
--

CREATE TABLE `blood_order` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `date` date NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `blood_group` varchar(20) NOT NULL,
  `blood_type` varchar(20) NOT NULL,
  `room` int(11) NOT NULL,
  `source` enum('PMI','Hospital','Donor') NOT NULL,
  `total` int(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_order`
--

INSERT INTO `blood_order` (`id`, `user`, `date`, `doctor`, `blood_group`, `blood_type`, `room`, `source`, `total`, `status`) VALUES
(33, 1, '2020-04-26', '1', '4', '1', 6, 'Hospital', 7, 2),
(34, 1, '2020-04-26', '3', '1', '1', 6, 'PMI', 20, 2),
(35, 1, '2020-04-26', '1', '2', '2', 9, 'Donor', 10, 2),
(36, 1, '2020-04-26', '1', '1', '3', 7, 'Hospital', 8, 2),
(37, 1, '2020-04-26', '4', '1', '1', 7, 'Hospital', 5, 2),
(38, 1, '2020-04-26', '1', '3', '1', 10, 'Hospital', 4, 2),
(39, 1, '2020-04-26', '4', '2', '1', 6, 'Donor', 11, 2),
(40, 1, '2020-04-26', '4', '4', '3', 17, 'PMI', 5, 2),
(41, 1, '2020-04-26', '3', '3', '3', 11, 'PMI', 4, 3),
(42, 1, '2020-04-26', '10', '3', '2', 11, 'PMI', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blood_pressure`
--

CREATE TABLE `blood_pressure` (
  `id` int(11) NOT NULL,
  `level` varchar(20) NOT NULL,
  `details` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_pressure`
--

INSERT INTO `blood_pressure` (`id`, `level`, `details`) VALUES
(1, 'low(hipotensi)', '<120/80 mmHg'),
(2, 'normal', '120/80 mmHg'),
(3, 'pra-hipertension', '139/89 mmHg'),
(4, 'hipertension level 1', '40/90 mmHG'),
(5, 'hipertension level 2', 'more 160/100 mmHG');

-- --------------------------------------------------------

--
-- Table structure for table `blood_type`
--

CREATE TABLE `blood_type` (
  `id` int(11) NOT NULL,
  `category_name` varchar(188) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_type`
--

INSERT INTO `blood_type` (`id`, `category_name`) VALUES
(1, 'PRC(PackedRedCell)'),
(2, 'WB(WholeBlood)'),
(3, 'TC(ThrombocyteConcent)');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `specialist` varchar(25) NOT NULL,
  `contact` varchar(35) NOT NULL,
  `address` varchar(30) NOT NULL,
  `age` int(2) NOT NULL,
  `work_unit_office` varchar(25) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `specialist`, `contact`, `address`, `age`, `work_unit_office`, `image`) VALUES
(1, 'Sheila Nalia, Sp.PD', 'Penyakit Dalam', '081329493505', 'Ngawi', 26, 'RSI Surabaya', ''),
(3, 'Liliek Murtiningsih, Sp.JP', 'Jantung', '08912389231', 'Surabaya', 51, 'RSI Surabaya', ''),
(4, 'Andrianto, Sp.JP', 'Jantung', '08232379923', 'Kediri', 45, 'RSI Surabaya', ''),
(5, 'Effendi, Sp. PD', 'Penyakit Dalam', '08232379923', 'Kampus lTS, Gedung 8PS, Sukoli', 56, 'RSI Surabaya', ''),
(6, 'Amie Vidyani, Sp. PD', 'Penyakit Dalam', '0897914223', 'Jln. Ketintang Baru no.54', 46, 'RSI Surabaya', ''),
(7, 'Adityo Rahmat Ardhany, Sp. PD', 'Penyakit Dalam', '08979142231', 'Gedhengan no.12', 39, 'RSI Surabaya', ''),
(8, 'Intan Komalasari, Sp.JP, FIHA', 'Jantung', '0823281711', 'Sidoarjo', 44, 'RSI Surabaya', ''),
(9, 'Abdul Mukti, Sp.P', 'Paru', '08512372312', 'Wonokromo ,Surabaya', 58, 'RSI Surabaya', ''),
(10, 'Nur Indah Sawitri, Sp.P', 'Paru', '08122328385', 'Surabaya', 42, 'RSI Surabaya', ''),
(11, 'Muh. Dikman A, Sp.OG', 'Kandungan', '089737878321', 'Malang', 60, 'RSI Surabaya - RSI Malang', ''),
(12, 'Bambang Tri J, Sp.OG', 'Kandungan dan Kebidanan', '08123231412', 'Pasuruan', 57, 'RSI Surabaya', ''),
(13, 'Hartatiek Nila Karmila, Sp.OG', 'Kandungan dan Kebidanan', '0851232351', 'Jombang', 35, 'RSI Surabaya', ''),
(14, 'Ichyan Amri, Sp.B. FINACS', 'Bedah', '08923125123', 'Surabaya', 54, 'RSI Surabaya', ''),
(15, 'Dayu Satria, Sp.B', 'Bedah', '08241252132', 'Mojokerto', 32, 'RSI Surabaya', ''),
(16, 'Yuanita Safitri Dianti, Sp. BP', 'Bedah', '081232123', 'Ngawi', 27, 'RSI Surabaya', ''),
(17, 'Hanik Badriyah, Sp.S', 'Saraf', '08212421523', 'Jakarta', 37, 'RSI Surabaya', ''),
(18, 'Dyah Yuniati, Sp.S', 'Saraf', '0821521321', 'Ponorogo', 43, 'RSI Surabaya', ''),
(19, 'Riska Indriani Waluyo', 'Dokter Umum', '08924123123', 'Surabaya', 36, 'RSI Surabaya', ''),
(20, 'Hj. RR. Enny Laraswati', 'Dokter Umum', '0812312151231', 'Sampang', 48, 'RSI Surabaya', ''),
(21, 'H. Dlorifuddin Zuhri', 'Dokter Umum', '08321512323', 'Jogjakarta', 55, 'RSI Surabaya', ''),
(22, 'Wisnu Laksmana, Sp.U', 'Urologi', '08923124123', 'Bandung', 36, 'RSI Surabaya', '');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `region_name` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `region_name`, `area`) VALUES
(9, 'Tegalsari', 'Surabaya Pusat'),
(10, 'Simokerto', 'Surabaya Pusat'),
(11, 'Genteng', 'Surabaya Pusat'),
(12, 'Bubutan', 'Surabaya Pusat'),
(13, 'Gubeng', 'Surabaya Timur'),
(14, 'Gunung Anyar', 'Surabaya Timur'),
(15, 'Sukolilo', 'Surabaya Timur'),
(16, 'Tambaksari', 'Surabaya Timur'),
(17, 'Mulyorejo', 'Surabaya Timur'),
(18, 'Rungkut', 'Surabaya Timur'),
(19, 'Tenggilis Mejoyo', 'Surabaya Timur'),
(20, 'Benowo', 'Surabaya Barat'),
(21, 'Pakal', 'Surabaya Barat'),
(22, 'Asemrowo', 'Surabaya Barat'),
(23, 'Sukomanunggal', 'Surabaya Barat'),
(24, 'Tandes', 'Surabaya Barat'),
(25, 'Sambikerep', 'Surabaya Barat'),
(26, 'Lakarsantri', 'Surabaya Barat'),
(27, 'Bulak', 'Surabaya Utara'),
(28, 'Kenjeran', 'Surabaya Utara'),
(29, 'Semampir', 'Surabaya Utara'),
(30, 'Pabean Cantian', 'Surabaya Utara'),
(31, 'Krembangan', 'Surabaya Utara'),
(32, 'Wonokromo', 'Surabaya Selatan'),
(33, 'Wonocolo', 'Surabaya Selatan'),
(34, 'Wiyung', 'Surabaya Selatan'),
(35, 'Karang Pilang', 'Surabaya Selatan'),
(36, 'Jambangan', 'Surabaya Selatan'),
(37, 'Gayungan', 'Surabaya Selatan'),
(38, 'Dukuh Pakis', 'Surabaya Selatan'),
(39, 'Sawahan', 'Surabaya Selatan'),
(40, 'Luar daerah Surabaya', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `specific_room`
--

CREATE TABLE `specific_room` (
  `id` int(11) NOT NULL,
  `room_name` varchar(128) NOT NULL,
  `function` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specific_room`
--

INSERT INTO `specific_room` (`id`, `room_name`, `function`, `type`) VALUES
(6, 'ICU', 'Intensive Care Unit', 'One Bed Full'),
(7, 'IGD', 'Instalasi Gawat Darurat', 'Double Bed'),
(8, 'Thaif 1', 'Regular', 'Quadra Bed | Half'),
(9, 'Thaif 2', 'Intensive', 'Double Bed | Half'),
(10, 'Thaif 3', 'Observasion', 'Triple Bed | One Observation'),
(11, 'Madinah VVIP', 'VIP', 'One Bed Full'),
(12, 'Madinah VIP', 'VIP', 'Double Bed'),
(13, 'Madinah 1', 'Intensive', 'Double Bed | Half'),
(14, 'Madinah 2', 'Observation', 'Quadra Bed | Half'),
(15, 'Makkah VVIP', 'VVIP', 'One Bed Full'),
(16, 'Makkah VIP', 'VIP', 'Double Bed'),
(17, 'Makkah 1', 'Intensive', 'Double Bed | Half'),
(18, 'Makkah 2', 'Observation', 'Quadra Bed | Half');

-- --------------------------------------------------------

--
-- Table structure for table `status_order`
--

CREATE TABLE `status_order` (
  `id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_order`
--

INSERT INTO `status_order` (`id`, `status`) VALUES
(1, 'PROCESS'),
(2, 'ACCEPTED'),
(3, 'CANCELED');

-- --------------------------------------------------------

--
-- Table structure for table `tranfusion`
--

CREATE TABLE `tranfusion` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `user` int(11) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `gender` enum('Male','Female','','') NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `region` int(11) NOT NULL,
  `doctor_name` int(11) NOT NULL,
  `blood_group` int(11) NOT NULL,
  `blood_type` int(11) NOT NULL,
  `blood_pressure` int(11) NOT NULL,
  `historical` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tranfusion`
--

INSERT INTO `tranfusion` (`id`, `date`, `user`, `patient_name`, `gender`, `age`, `address`, `region`, `doctor_name`, `blood_group`, `blood_type`, `blood_pressure`, `historical`) VALUES
(14, '2020-04-26', 1, 'Dita Aghata', 'Female', 21, 'Gunung Anyar gg III no 17', 14, 1, 4, 2, 1, 'Anemia, di sarankan untuk banyak mengonsumsi daging'),
(15, '2020-04-26', 1, 'Irfan Farras', 'Male', 42, 'Gubeng Kertajaya 9 Raya no 19 A', 13, 3, 1, 1, 4, 'terus berolahraga dan makan bergizi'),
(16, '2020-04-26', 1, 'Ashifa Satara', 'Female', 36, 'Perum ITS Jalan matematika B17', 15, 4, 2, 2, 2, 'sehat'),
(17, '2020-04-26', 1, 'Azmi Jaisyu', 'Male', 61, 'Semolowaru Indah I T-2', 29, 1, 1, 2, 5, 'kadar gula tinggi'),
(18, '2020-04-26', 1, 'Farah Firdausi', 'Female', 32, 'Petemon kali gang 4 no 12B', 39, 1, 3, 2, 2, 'sehat'),
(19, '2020-04-26', 1, 'Kandias Radista Wardhana', 'Male', 27, 'Sukolilo Park Regency G-8', 15, 3, 4, 1, 3, 'kurang istirahat'),
(20, '2020-04-26', 1, 'Aninditya Prameswari', 'Female', 40, 'Citra medayu residence E-4', 18, 3, 3, 1, 1, 'kurang istirahat'),
(21, '2020-04-26', 1, 'Muhammad Aqil Al Fatih', 'Male', 33, 'Tambak wedi baru gg 2 no 28B', 28, 4, 2, 1, 4, 'terus berolahraga'),
(22, '2020-04-26', 1, 'Najwa Kayla Syamsudin', 'Female', 31, 'Perum bumi marina emas utara blok F 76', 28, 1, 1, 3, 3, 'kurang istirahat'),
(23, '2020-04-26', 1, 'Khonsa Afifah', 'Female', 25, 'YKP pandugo I PE-4', 18, 4, 2, 3, 5, 'kadar gula tinggi'),
(24, '2020-04-26', 1, 'Ridho Achsyani', 'Male', 19, 'Kedinding tengah 8A no 22', 28, 1, 3, 3, 1, 'Anemia, di sarankan untuk banyak mengonsumsi daging'),
(25, '2020-04-26', 1, 'Muhammad  Wafiudin', 'Male', 35, 'mulyosari perum bhaskara no 40/6', 17, 3, 4, 3, 2, 'sehat'),
(26, '2020-04-26', 1, 'Evi Fadhillah', 'Female', 23, 'kejawan putih tambak BMA no 22', 17, 4, 1, 2, 5, 'kadar gula tinggi'),
(27, '2020-04-26', 1, 'audi naura', 'Female', 41, 'bratang gedhe IE/4', 32, 1, 2, 2, 4, 'terus berolahraga'),
(28, '2020-04-26', 1, '\'azmi aunillah', 'Female', 20, 'gubeng kertajaya 4c no 19', 13, 1, 4, 2, 2, 'sehat'),
(29, '2020-04-26', 1, 'Harminah', 'Female', 71, 'gubeng kertajaya 7A no 18', 13, 4, 3, 2, 5, 'kadar gula tinggi'),
(30, '2020-04-26', 1, 'Fadjar Rinanto', 'Male', 55, 'mojo gang III no 29 B', 13, 3, 4, 1, 2, 'sehat'),
(31, '2020-04-26', 1, 'Yusuf darmawan', 'Male', 28, 'jojoran I no 5', 13, 3, 3, 1, 3, 'kurang istirahat'),
(32, '2020-04-26', 1, 'Faris Huda', 'Male', 36, 'manyar 1 no 17 komplek bea cukai', 17, 1, 2, 1, 4, 'terus berolahraga dan makan bergizi'),
(33, '2020-04-26', 1, 'doohan abi', 'Male', 44, 'juwingan no 16', 13, 3, 1, 1, 5, 'kadar gula tinggi'),
(34, '2020-04-26', 1, 'Puri Zhalia Ulfa', 'Female', 45, 'Manukan Kulon 18C/17', 24, 13, 1, 3, 1, 'kurang istirahat'),
(35, '2020-04-26', 1, 'Ryan Hidayatullah', 'Male', 32, 'Sutorejo Tengah 3 no 1', 17, 19, 2, 3, 2, 'sehat'),
(36, '2020-04-26', 1, 'Bagas Abirawa', 'Male', 25, 'Rungkut Menanggal Harapan Z/17', 14, 1, 3, 3, 3, 'kurang istirahat'),
(37, '2020-04-26', 1, 'Muhammad Fikri', 'Male', 18, 'Ngagel Mulyo IX/12', 32, 9, 4, 3, 1, 'Anemia, di sarankan untuk banyak mengonsumsi daging'),
(38, '2020-04-26', 1, 'Ajie Dibyo', 'Male', 19, 'Kenjeran Perum Pantai Mentari F-33', 28, 19, 1, 2, 2, 'sehat'),
(39, '2020-04-26', 1, 'Pramudyo Aula Rahman', 'Male', 20, 'medayu selatan I/27', 14, 21, 2, 2, 3, 'terus berolahraga'),
(40, '2020-04-26', 1, 'Ahdan Yusni', 'Male', 21, 'Pandugo 2 blok O-9', 18, 10, 3, 2, 3, 'terus berolahraga dan makan bergizi'),
(41, '2020-04-26', 1, 'Afidatul Ummah', 'Female', 22, 'Gunung Anyar Tambak 1/23', 14, 5, 4, 2, 2, 'sehat'),
(42, '2020-04-26', 1, 'Aulia Alfiana', 'Female', 27, 'Semampir Tengah I no. 8', 29, 18, 4, 2, 2, 'sehat'),
(43, '2020-04-26', 1, 'Junestia Vianjaningrum', 'Female', 45, 'Ngagel wasana G no 23', 32, 8, 4, 1, 2, 'terus berolahraga dan makan bergizi'),
(44, '2020-04-26', 1, 'Adhyra Widyanti', 'Female', 34, 'Gubeng Kertajaya 9G no 25', 13, 11, 4, 1, 2, 'terus berolahraga'),
(45, '2020-04-26', 1, 'Adine Inara', 'Female', 23, 'Mulyosari Utara 6/34', 13, 13, 4, 2, 2, 'sehat'),
(46, '2020-04-26', 1, 'Joshua Jedith', 'Male', 70, 'Kalijudan Taruna U no 60', 17, 8, 4, 2, 4, 'kadar gula tinggi'),
(47, '2020-04-26', 1, 'Fadli Hakim', 'Male', 63, 'Griya Pabean I i/18', 40, 7, 2, 1, 3, 'terus berolahraga dan makan bergizi'),
(48, '2020-04-26', 1, 'Achmad fajar alam', 'Male', 67, 'Asem Payung no 46 BLK', 15, 15, 2, 1, 3, 'terus berolahraga dan makan bergizi'),
(49, '2020-04-26', 1, 'Cordelia Calista', 'Female', 64, 'Saliman no 4 komplek TNI-AL', 28, 22, 2, 1, 2, 'sehat'),
(50, '2020-04-26', 1, 'Karima M.Z', 'Female', 61, 'Tambak deres 1/15', 27, 8, 4, 2, 1, 'Anemia, di sarankan untuk banyak mengonsumsi daging'),
(51, '2020-04-26', 1, 'Hayyu Norma', 'Female', 33, 'Durian V h298 Pondok Candra Indah', 40, 20, 2, 2, 2, 'sehat'),
(52, '2020-04-26', 1, 'Bonny Audrian', 'Male', 32, 'Baruk Utara 17/BE-13', 18, 9, 1, 3, 1, 'kurang istirahat'),
(53, '2020-04-26', 1, 'Jihan Aldila', 'Female', 36, 'Pacar Kembang 3 no 60', 16, 14, 4, 3, 5, 'kadar gula tinggi'),
(54, '2020-04-26', 1, 'Putu Hiroko', 'Female', 37, 'Manggis XI/785 Pondok candra', 40, 13, 3, 2, 1, 'sehat'),
(55, '2020-04-26', 1, 'Dandy Nataliel', 'Male', 70, 'Galaxy Bumi permai m3-10', 15, 8, 4, 2, 5, 'kadar gula tinggi'),
(56, '2020-04-26', 1, 'Sobrina afifah', 'Female', 71, 'Kutisari Selatan IX no 8a', 19, 6, 2, 1, 3, 'terus berolahraga dan makan bergizi'),
(57, '2020-04-26', 1, 'M. Rozzan Prananda', 'Male', 72, 'Graha Santoso Regency C/8', 18, 7, 2, 1, 1, 'Anemia'),
(58, '2020-04-26', 1, 'Jelita Ayu', 'Female', 63, 'Perum Pondok Tanjung Permai II blok D no 10', 18, 22, 4, 1, 3, 'terus berolahraga dan makan bergizi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `image` varchar(256) NOT NULL,
  `email` varchar(128) NOT NULL,
  `bio` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `image`, `email`, `bio`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Eva Istianah', '808637.png', 'evaistianah@gmail.com', 'suka nge-drakor dan baperan hehehee love bapake', '81dc9bdb52d04dc20036dbd8313ed055', 2, 1, 1587455351),
(2, 'Fajar Abdurrohman', '_20160515_1814451.JPG', 'sepertiseharusnyafajar@gmail.com', 'mencari ujung pelangi', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1, 1587455351),
(3, 'Septian Reri Winarto', 'animemusix.jpg', 'asep@gmail.com', 'menyayi adalah jalan ninjaku', '81dc9bdb52d04dc20036dbd8313ed055', 3, 1, 1587455351),
(4, 'Rendy Rahardian', 'default.png', 'rendyahardian@gmail.com', 'terbang di angkasa pakai pesawat kertas', '$2y$10$bTHpwEMiVTOPqq0mOYsp9.j2F3nXpATW9RUlmS46luzvPsnF1bKw.', 2, 1, 1587455351);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(6, 1, 5),
(39, 1, 99),
(43, 2, 100),
(44, 3, 101),
(45, 2, 98),
(46, 3, 98),
(47, 1, 98),
(48, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_credential`
--

CREATE TABLE `user_credential` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `verification_file` varchar(256) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(4, 'data master'),
(98, 'user'),
(99, 'menu'),
(100, 'nurse'),
(101, 'executive');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'SuperAdmin'),
(2, 'Admin/Perawat'),
(3, 'Eksekutif');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 98, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 98, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 99, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 99, 'SubMenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(9, 1, 'Role Access', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(10, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(11, 4, 'User', 'datamaster/user', 'fas  fa-fw fa-users', 1),
(12, 4, 'Specific Room', 'datamaster/specific_room', 'fas fa-fw fa-person-booth', 1),
(13, 4, 'Blood Group', 'datamaster/blood_group', 'fas fa-fw fa-eye-dropper', 1),
(19, 2, 'Details Information', 'user/details', 'fas fa-fw fa-info-circle', 0),
(23, 4, 'Blood Type', 'datamaster/blood_type', 'fas fa-fw fa-tint', 1),
(24, 4, 'Doctor', 'datamaster/doctor', 'fas fa-fw fa-user-md', 1),
(26, 100, 'Transfusion Reaction', 'tranfusion', 'fas fa-fw fa-vials', 1),
(27, 100, 'Receive Blood', 'receive', 'fas fa-fw fa-clipboard-check', 0),
(28, 100, 'Order Blood', 'order', 'fas fa-fw fa-shopping-cart', 1),
(29, 100, 'Canceled Order', 'canceled', 'fas fa-fw fa-ban', 0),
(30, 101, 'Stock Report', 'graphic_stock', 'fas  fa-fw fa-layer-group', 1),
(31, 101, 'Trans-React Report', 'graphic_tranfusion', 'fas fa-fw fa-vials', 1),
(32, 101, 'Order Report', 'graphic_order', 'fas  fa-fw fa-money-check-alt', 1),
(33, 101, 'Acceptance Report', 'graphic_accept', 'fas fa-fw fa-check-double', 0),
(34, 101, 'Canceled Report', 'graphic_canceled', 'fas fa-fw fa-ban', 0),
(36, 4, 'Region', 'datamaster/region', 'fas fa-fw fa-map-marked-alt', 1),
(37, 98, 'Change Password', 'user/changePassword', 'fas fa-fw fa-unlock-alt', 1),
(38, 4, 'Blood Pressure', 'datamaster/pressure', 'fas fa-fw fa-thermometer-three-quarters', 1),
(39, 101, 'Region Report', 'graphic_region', 'fas fa-fw fa-map-marked-alt', 1),
(40, 101, 'Source Report', 'graphic_source', 'fas fa-fw fa-user-injured ', 1),
(41, 101, 'Yearly Order Report', 'graphic_yearly', 'far  fa-fw fa-calendar-alt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'sepertiseharusnyafajar@gmail.com', 'aYbwojvn1JYMhmJg2ja8P+vdORdtrG27QyD9AnZOgm0=', 1568910048),
(6, 'sepertiseharusnyafajar@gmail.com', '8RuE9VmALvY1DBtlq5KDbquW1LGpvwYO22fh5/OWXsE=', 1568911499),
(7, 'sepertiseharusnyafajar@gmail.com', 'bINtV9IqUYOD38ASpBZ1wqC5ff4kx3eJwJaNKo1mxjk=', 1568912440),
(8, 'alhamdulillah084@gmail.com', 'qD0QXqp8TiQ3oekbLkntVfySztbmu61tRdomLQ8m0uY=', 1570076603);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_group`
--
ALTER TABLE `blood_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_order`
--
ALTER TABLE `blood_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_pressure`
--
ALTER TABLE `blood_pressure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_type`
--
ALTER TABLE `blood_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specific_room`
--
ALTER TABLE `specific_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_order`
--
ALTER TABLE `status_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tranfusion`
--
ALTER TABLE `tranfusion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_credential`
--
ALTER TABLE `user_credential`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_group`
--
ALTER TABLE `blood_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blood_order`
--
ALTER TABLE `blood_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `blood_pressure`
--
ALTER TABLE `blood_pressure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blood_type`
--
ALTER TABLE `blood_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `specific_room`
--
ALTER TABLE `specific_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `status_order`
--
ALTER TABLE `status_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tranfusion`
--
ALTER TABLE `tranfusion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user_credential`
--
ALTER TABLE `user_credential`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
