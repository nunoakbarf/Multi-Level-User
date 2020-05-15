-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2020 at 04:52 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orderentry`
--

-- --------------------------------------------------------

--
-- Table structure for table `beli`
--

CREATE TABLE `beli` (
  `beli_num` int(11) DEFAULT NULL,
  `beli_date` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beli`
--

INSERT INTO `beli` (`beli_num`, `beli_date`, `id_user`) VALUES
(1, '2020-05-04 01:13:56', 1),
(2, '2020-05-04 09:01:09', 1),
(3, '2020-05-04 09:20:22', 1),
(4, '2020-05-04 09:20:59', 1),
(5, '2020-05-04 09:34:53', 1),
(6, '2020-05-04 09:46:09', 1),
(7, '2020-05-04 10:28:23', 1),
(8, '2020-05-04 18:17:23', 1),
(9, '2020-05-04 21:53:38', 1),
(10, '2020-05-05 21:04:58', 1),
(11, '2020-05-05 21:06:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `beliitems`
--

CREATE TABLE `beliitems` (
  `beli_num` int(11) DEFAULT NULL,
  `prod_name` varchar(120) DEFAULT NULL,
  `prod_id` varchar(30) DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  `prod_price` double NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beliitems`
--

INSERT INTO `beliitems` (`beli_num`, `prod_name`, `prod_id`, `quantity`, `prod_price`, `id_user`) VALUES
(1, 'Robusta Colo', '1', 4, 20000, 1),
(2, 'Robusta Colo', '1', 3, 20000, 1),
(3, 'Arabika Colo', '2', 1, 14000, 1),
(3, 'Robusta Colo', '1', 2, 20000, 1),
(4, 'Bergendal', '3', 2, 15000, 1),
(5, 'Robusta Colo', '1', 1, 20000, 1),
(6, 'Robusta Colo', '1', 1, 20000, 1),
(6, 'Papandayan', '5', 1, 15000, 1),
(7, 'Robusta Leluhur', '4', 3, 12000, 1),
(9, 'Megasari', '7', 5, 30000, 1),
(10, 'Kepahiang', '6', 7, 18000, 1),
(11, 'Arabika Colo', '2', 4, 14000, 1);

--
-- Triggers `beliitems`
--
DELIMITER $$
CREATE TRIGGER `beli_barang` AFTER INSERT ON `beliitems` FOR EACH ROW begin
update products set quantity=quantity+new.quantity
where prod_id = new.prod_id;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart_beli`
--

CREATE TABLE `cart_beli` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` double NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(0, 'Tidak Berkategori'),
(1, 'Kopi Arabika'),
(2, 'Kopi Robusta'),
(3, 'Kopi Luwak'),
(4, 'Kopi Pahit'),
(5, 'Kopi Santai');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `order_num` int(11) DEFAULT NULL,
  `prod_name` varchar(120) DEFAULT NULL,
  `prod_id` varchar(30) DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  `prod_price` double NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`order_num`, `prod_name`, `prod_id`, `quantity`, `prod_price`, `id_user`) VALUES
(1, 'Robusta Colo', '1', 2, 20000, 1),
(2, 'Robusta Colo', '1', 1, 20000, 1),
(3, 'Arabika Colo', '2', 1, 14000, 1),
(4, 'Robusta Colo', '1', 1, 20000, 3),
(5, 'Robusta Colo', '1', 3, 20000, 3),
(6, 'Robusta Colo', '1', 3, 20000, 1),
(6, 'Arabika Colo', '2', 2, 14000, 1),
(6, 'Bergendal', '3', 2, 15000, 1),
(7, 'Kepahiang', '6', 3, 18000, 2),
(7, 'Arabika Colo', '2', 2, 14000, 2),
(8, 'Megasari', '7', 2, 30000, 2),
(9, 'baru Produk Gagal', '10', 1, 10000, 1);

--
-- Triggers `orderitems`
--
DELIMITER $$
CREATE TRIGGER `jual_barang` AFTER INSERT ON `orderitems` FOR EACH ROW begin
update products set quantity=quantity-new.quantity
where prod_id = new.prod_id;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_num` int(11) DEFAULT NULL,
  `order_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_num`, `order_date`, `id_user`) VALUES
(1, '2020-05-03 00:00:00', 1),
(2, '2020-05-04 00:00:00', 1),
(3, '2020-05-04 01:06:48', 1),
(4, '2020-05-04 09:47:01', 3),
(5, '2020-05-04 10:26:46', 3),
(6, '2020-05-04 18:04:29', 1),
(7, '2020-05-04 21:49:59', 2),
(8, '2020-05-04 21:51:57', 2),
(9, '2020-05-07 16:43:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `productnotes`
--

CREATE TABLE `productnotes` (
  `note_id` char(9) DEFAULT NULL,
  `prod_id` varchar(30) DEFAULT NULL,
  `note_date` date DEFAULT NULL,
  `note_text` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(16) NOT NULL,
  `vend_id` char(11) NOT NULL,
  `prod_name` varchar(32) NOT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_desc` text,
  `prod_img` varchar(120) DEFAULT 'default.jpg',
  `cat_id` int(10) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `vend_id`, `prod_name`, `prod_price`, `prod_desc`, `prod_img`, `cat_id`, `quantity`) VALUES
(1, 'A001', 'Robusta Colo', 20000, 'Kopi robusta, merupakan keturunan dari beberapa jenis spesies kopi. Mengenai kualitas dari buah kopi, faktanya ini lebih rendah dibandingkan dengan kopi Arabika dan juga Liberika. Kopi jenis ini menguasai sekitar 30% pasar dunia. ', '1.png', 2, 30),
(2, 'A001', 'Arabika Colo', 14000, 'Kopi jenis ini tumbuh pada daerah dengan ketinggian 700-1700 mdpl. Suhu yang dimiliki adalah 16-20 °C. Yang perlu diketahui mengenai jenis kopi ini adalah mengenai aspek kepekaan terhadap jenis penyakit karat daun atau lebih dikenal dengan HV atau Hemileia Vastatrix. Ini terutama bila ditanam pada daerah yang memiliki elevasi kurang dari 700 mdpl.', '2.png', 1, 20),
(3, 'A001', 'Bergendal', 15000, 'Kopi Bergendal adalah varietas kopi arabika dari kebun petani di Bener Meriah Provinsi Aceh. Bergendal sendiri terkenal setelah dinamai oleh Belanda. Menurut cerita petani sekitar, di tempat inilah Belanda menanam kopi pertama kali di Indonesia.', '3.png', 1, 18),
(4, 'A001', 'Robusta Leluhur', 12000, 'Kopi robusta, merupakan keturunan dari beberapa jenis spesies kopi. Mengenai kualitas dari buah kopi, faktanya ini lebih rendah dibandingkan dengan kopi Arabika dan juga Liberika. Kopi jenis ini menguasai sekitar 30% pasar dunia.', '4.png', 2, 15),
(5, 'A001', 'Papandayan', 15000, 'Sesuai dengan namanya, kopi ini muncul dari Gunung Papandayan. Kopi asal Garut ini sudah mendunia dengan kopi Arabica dengan Indikasi Geografis (IG) Gunung Papandayan. Kopi yang berasal dari IG Papandayan berada di tiga kecamatan, yaitu Cisurupan, Cikajang dan Pamulihan. Proses pembudidayaannya mengacu pada elevasi pegunungan di atas 1.000 MDPL.', '5.png', 3, 20),
(6, 'A001', 'Kepahiang', 18000, 'Kopi baru', '6.png', 5, 20),
(7, 'A001', 'baru Megasari', 30000, 'Kopi baru', '7.png', 0, 20),
(8, 'A001', 'baru Patrol', 25000, 'Kopi baru', '8.png', 0, 16),
(9, 'A001', 'baru Bajawa', 26000, 'Kopi baru', '9.png', 0, 18),
(10, 'A002', 'baru Produk Gagal', 10000, 'Produk gagal', 'box-null1.png', 0, 9999);

--
-- Triggers `products`
--
DELIMITER $$
CREATE TRIGGER `hapus_barang` AFTER DELETE ON `products` FOR EACH ROW BEGIN
INSERT INTO produk_hapus
(
prod_id,
vend_id,
prod_name,
prod_price,
prod_desc,
prod_img,
cat_id,
quantity,
tgl_hapus,
user
)
VALUES
(
OLD.prod_id,
OLD.vend_id,
OLD.prod_name,
OLD.prod_price,
OLD.prod_desc,
OLD.prod_img,
OLD.cat_id,
OLD.quantity,
SYSDATE(),
CURRENT_USER
);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `produk_hapus`
--

CREATE TABLE `produk_hapus` (
  `prod_id` int(16) NOT NULL,
  `vend_id` char(11) NOT NULL,
  `prod_name` varchar(32) NOT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_desc` text,
  `prod_img` varchar(120) DEFAULT 'default.jpg',
  `cat_id` int(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `tgl_hapus` datetime DEFAULT NULL,
  `user` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_hapus`
--

INSERT INTO `produk_hapus` (`prod_id`, `vend_id`, `prod_name`, `prod_price`, `prod_desc`, `prod_img`, `cat_id`, `quantity`, `tgl_hapus`, `user`) VALUES
(10, '', '', 0, NULL, 'default.jpg', 0, 2, '2020-05-03 00:00:00', 'root@localhost'),
(11, '', 'ok', 10, '', 'default11.jpg', 0, 120, '2020-05-03 00:00:00', 'root@localhost'),
(12, '', 'iki', 120, '', 'default2.jpg', 0, 10, '2020-05-03 00:00:00', 'root@localhost'),
(13, '', 'okoko', 1010, '', 'default3.jpg', 0, 120, '2020-05-03 00:00:00', 'root@localhost'),
(10, 'A001', 'Coba', 30000, '', 'default1.jpg', 0, 100, '2020-05-04 00:00:00', 'root@localhost'),
(11, '', 'lagi', 25000, '', 'default2.jpg', 2, 20, '2020-05-04 02:30:27', 'root@localhost'),
(10, 'A001', 'Produk Gagal', 15000, 'Produk gagal', 'default1.jpg', 0, 10, '2020-05-04 15:30:29', 'root@localhost'),
(10, 'A002', 'coba', 12000, '', 'default1.jpg', 4, 123, '2020-05-07 01:29:14', 'root@localhost'),
(11, 'A002', 'Produk Gagal2', 20000, 'Gagal', 'box-null1.png', 4, 12, '2020-05-07 01:29:20', 'root@localhost');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `j_kel` varchar(11) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `uname` varchar(32) NOT NULL,
  `pw` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `alamat`, `j_kel`, `nohp`, `uname`, `pw`) VALUES
(1, 'Noor Faizin', 'faiz.jetak@gmail.com', 'Jetak Kedungdowo Rt01/05 kec.Kaliwungu, kab.Kudus, Jawa Tengah', 'Laki - Laki', '089504468800', 'noorfaizin', '9d4d4ab0dfdb72a54b895d78b90b09c7'),
(2, 'Fahrul Rohman', 'fahrul@gmail.com', 'Jetak Kedungdowo Rt01/05 kec.Kaliwungu, kab.Kudus, Jawa Tengah', 'Laki - Laki', '087654789867', 'Fahrulrohman', '9b5317575f071bdccef2175b72191004'),
(3, 'Nuno Akbar', 'nuno@gmail.com', 'Nganguk pengapon kudus', 'Laki - Laki', '089504468811', 'nunoakbar', '32e35f41e104ac0c67cfe51879d013b8');

-- --------------------------------------------------------

--
-- Table structure for table `users_admin`
--

CREATE TABLE `users_admin` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_admin`
--

INSERT INTO `users_admin` (`id_user`, `nama`, `email`, `username`, `password`) VALUES
(1, 'Noor Faizin', 'faiz.jetak@gmail.com', 'noorfaizin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vend_id` char(12) DEFAULT NULL,
  `vend_name` varchar(75) DEFAULT NULL,
  `vend_address` varchar(90) DEFAULT NULL,
  `vend_city` varchar(60) DEFAULT NULL,
  `vend_state` varchar(15) DEFAULT NULL,
  `vend_zip` varchar(21) DEFAULT NULL,
  `vend_country` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`,`email`,`uname`);

--
-- Indexes for table `users_admin`
--
ALTER TABLE `users_admin`
  ADD PRIMARY KEY (`id_user`,`email`,`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users_admin`
--
ALTER TABLE `users_admin`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
