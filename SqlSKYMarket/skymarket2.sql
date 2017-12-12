-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2017 at 09:15 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skymarket2`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `id_alamat` varchar(11) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `nama_alamat` varchar(20) NOT NULL,
  `nama_penerima` varchar(40) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `id_provinsi` int(11) DEFAULT NULL,
  `provinsi` varchar(20) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `id_city` varchar(11) DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `telp_penerima` varchar(12) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`id_alamat`, `id_user`, `nama_alamat`, `nama_penerima`, `alamat`, `id_provinsi`, `provinsi`, `kota`, `id_city`, `kode_pos`, `telp_penerima`) VALUES
('AL599eb4584', 'U599e29faf3', 'Rumah Syahrul', 'Syahrul Romadhon', 'Jalan jalan ke puncakk', 9, 'Jawa Barat', 'Bogor', '78', '61151', '0808080808'),
('AL59ddb4354', 'U59ddb3eb78', 'Syahrul Rumah', 'Syshrul', 'Jalan Taman Malabar', 9, 'Jawa Barat', 'Bogor', '78', '12221', '081122121212'),
('AL598b31c54', 'U5971d83de7', 'Rumah Asep', 'Syahrul Romadhon', 'Jalan Taman Malabar no 7', 9, 'Jawa Barat', 'Bogor', '78', '61151', '0812000101'),
('AL592663c14', 'U59265f1166', 'Alamat Saya', 'Syahrul Romadhon', 'Jalan Tamman Malabar indah jaya sentosa', 9, 'Jawa Barat', 'Bandung', '22', '112333', '081881818181'),
('AL5930cc1e8', 'U5930cbbfa1', 'Rumah Asep', 'Saa', 'asagsdgfhk;\'', 9, 'Jawa Barat', 'Bogor', '78', '22222', '09765432');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(11) NOT NULL,
  `nama_barang` varchar(40) NOT NULL,
  `id_kategori` varchar(11) NOT NULL,
  `id_sub_kategori` varchar(11) NOT NULL,
  `gambar` varchar(20) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `stok` int(11) NOT NULL,
  `jumlah_penjualan` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_kategori`, `id_sub_kategori`, `gambar`, `deskripsi_produk`, `harga`, `berat`, `tanggal`, `stok`, `jumlah_penjualan`, `rating`) VALUES
('wr01', 'Palu', 'ht', 'wr', '2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 100000, 600, '2017-03-01', 7, 18, 0),
('gt03', 'General Tools Package', 'ht', 'sk12', '4.jpg', 'qweryuiopasdfghjkl zxcvbnm, asdfghkl wertyuiop asdfghkl asdfghjhgfdfgh nvcvn hgffghk mnnvccvbn mnvccvn. qweryuiopasdfghjkl zxcvbnm, asdfghkl wertyuiop asdfghkl asdfghjhgfdfgh nvcvn hgffghk mnnvccvbn mnvccvn', 350000, 900, '2017-04-06', 10, 7, 0),
('wr04', 'Adjustable Wrench', 'ht', 'wr', '7.jpg', 'qweryuiopasdfghjkl zxcvbnm, asdfghkl wertyuiop asdfghkl asdfghjhgfdfgh nvcvn hgffghk mnnvccvbn mnvccvn. qweryuiopasdfghjkl zxcvbnm, asdfghkl wertyuiop asdfghkl asdfghjhgfdfgh nvcvn hgffghk mnnvccvbn mnvccvn', 46000, 1200, '2017-04-05', 8, 7, 0),
('HT011', 'Adjustable Wrench 2', 'ht', 'sk02', '3.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 120000, 1400, '2017-05-02', 11, 19, 0),
('HT012', 'Hand Grease Gun', 'ht', 'sk03', '2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 100000, 1200, '2017-03-01', 12, 0, 0),
('HT013', 'General Tools Package', 'ht', 'sk21', '3.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 120000, 900, '2017-04-03', 2, 2, 0),
('HT014', 'Mechanic Tools 100 PCS', 'ht', 'sk03', '2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 18000, 1400, '2017-04-03', 12, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` varchar(11) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `id_barang` varchar(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `berat_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `id_barang`, `jumlah`, `sub_total`, `berat_total`) VALUES
('CR594368d8e', 'U59265f1166', 'HT011', 1, 120000, 2000),
('CR599d68835', 'U5971d83de7', 'gt03', 1, 350000, 4000),
('CR59e1889b8', 'U59e1884565', 'gt03', 1, 350000, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` varchar(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `isi_feedback` text NOT NULL,
  `tanggal_feedback` date NOT NULL,
  `admin_read` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(11) NOT NULL,
  `nama_kategori` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('ht', 'Hand Tools'),
('mp', 'Machine Parts'),
('os', 'Office Station');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_payment` varchar(11) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `order_id` varchar(11) NOT NULL,
  `id_alamat` varchar(11) NOT NULL,
  `kurir` varchar(100) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `total_tagihan` int(11) DEFAULT NULL,
  `id_bank` varchar(20) DEFAULT NULL,
  `nama_rek` varchar(30) DEFAULT NULL,
  `no_rek` varchar(11) DEFAULT NULL,
  `bukti_bayar` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Belum',
  `tanggal` datetime DEFAULT NULL,
  `resi` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id_payment`, `id_user`, `order_id`, `id_alamat`, `kurir`, `ongkir`, `total_tagihan`, `id_bank`, `nama_rek`, `no_rek`, `bukti_bayar`, `status`, `tanggal`, `resi`) VALUES
('PY59e3153b5', 'U599e29faf3', 'ODR59e3153b', 'AL599eb4584', 'Ongkos Kirim Ekonomis', 32000, 382000, 'Bank BCA', 'aaaa', '11111111111', 'yy.png', 'Belum', '2017-10-15 09:58:51', ''),
('PY59c900cb8', 'U599e29faf3', 'ODR59c900cb', 'AL599eb4584', 'Yakin Esok Sampai', 36000, 136000, 'Bank Mandiri', 'Sayi', '23467', '1506345211fotouser4.jpg', 'Belum', '2017-09-25 15:12:43', ''),
('PY59c8ffedf', 'U599e29faf3', 'ODR59c8ffed', 'AL599eb4584', 'REGULAR SERVICE', 36000, 386000, 'Bank Mandiri', 'asdfghj', '1123456789', 'akun.png', 'Belum', '2017-09-25 15:09:01', ''),
('PY59c8feec9', 'U599e29faf3', 'ODR59c8feec', 'AL599eb4584', 'Layanan Reguler', 18000, 138000, 'Bank Mandiri', 'aaaa', '23456789', 'akun.png', 'Belum', '2017-09-25 15:04:44', ''),
('PY59c8fe983', 'U599e29faf3', 'ODR59c8fe98', 'AL599eb4584', 'Layanan Reguler', 18000, 138000, 'Bank Mandiri', 'Saya', '11111111111', 'fotouser1.jpg', 'Belum', '2017-09-25 15:03:20', ''),
('PY59c8fe3ab', 'U599e29faf3', 'ODR59c8fe3a', 'AL599eb4584', 'Ongkos Kirim Ekonomis', 16000, 62000, 'Bank Mandiri', 'Saya', '2346789', '1506344548fotouser.jpg', 'Belum', '2017-09-25 15:01:46', ''),
('PY59c8fd9c5', 'U599e29faf3', 'ODR59c8fd9c', 'AL599eb4584', 'Ongkos Kirim Ekonomis', 32000, 382000, 'Bank Mandiri', 'Syahrul', '11111111111', '1506344395fotouser2.jpg', 'Sudah', '2017-09-25 14:59:08', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment_buffer`
--

CREATE TABLE `payment_buffer` (
  `id_buffer` int(11) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `id_barang` varchar(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `berat_total` int(11) NOT NULL,
  `order_id` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_buffer`
--

INSERT INTO `payment_buffer` (`id_buffer`, `id_user`, `id_barang`, `jumlah`, `sub_total`, `berat_total`, `order_id`) VALUES
(267, 'U599e29faf3', 'wr04', 1, 46000, 1200, 'ODR59eaba1e'),
(266, 'U599e29faf3', 'HT011', 1, 120000, 1400, 'ODR59eaba1e'),
(265, 'U599e29faf3', 'wr04', 1, 46000, 1200, 'ODR59eab975'),
(264, 'U599e29faf3', 'HT011', 1, 120000, 1400, 'ODR59eab975'),
(263, 'U599e29faf3', 'HT011', 1, 120000, 1400, 'ODR59eab883'),
(262, 'U599e29faf3', 'gt03', 1, 350000, 900, 'ODR59eab883'),
(273, 'U599e29faf3', 'wr04', 1, 46000, 1200, 'ODR59eadf11'),
(272, 'U599e29faf3', 'wr01', 1, 100000, 600, 'ODR59eadf11'),
(271, 'U599e29faf3', 'wr04', 1, 46000, 1200, 'ODR59eadea4'),
(270, 'U599e29faf3', 'wr01', 1, 100000, 600, 'ODR59eadea4'),
(269, 'U599e29faf3', 'HT011', 1, 120000, 1400, 'ODR59eabd4c'),
(268, 'U599e29faf3', 'wr01', 1, 100000, 600, 'ODR59eabd4c'),
(221, 'U599e29faf3', 'wr04', 1, 46000, 2000, 'ODR59c8fe3a'),
(220, 'U599e29faf3', 'gt03', 1, 350000, 4000, 'ODR59c8fd9c');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_rating` varchar(11) NOT NULL,
  `id_barang` varchar(11) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `komentar` text NOT NULL,
  `rating` int(11) NOT NULL,
  `tanggal_rating` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id_rating`, `id_barang`, `id_user`, `komentar`, `rating`, `tanggal_rating`) VALUES
('RT59e17df5e', 'HT011', 'U599e29faf3', 'tes', 4, '2017-10-14'),
('RT599e492f3', 'HT012', 'U599e29faf3', 'bagus', 5, '2017-08-24'),
('RT599e493ad', 'HT013', 'U599e29faf3', 'bagus', 4, '2017-08-24'),
('RT599e49478', 'HT014', 'U599e29faf3', 'bagus', 4, '2017-08-24'),
('RT599e48eb1', 'HT011', 'U599e29faf3', 'bagus', 5, '2017-08-24'),
('RT599e48bfc', 'gt03', 'U599e29faf3', 'bagus', 5, '2017-08-24'),
('RT599d64d76', 'gt03', 'U5971d83de7', 'bbbbbbbbb', 4, '2017-08-23'),
('RT599e4915c', 'wr04', 'U599e29faf3', 'bagus', 5, '2017-08-24'),
('RT599e49058', 'wr01', 'U599e29faf3', 'bagus', 5, '2017-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` varchar(15) NOT NULL,
  `id_barang` varchar(15) NOT NULL,
  `judul_slider` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `id_barang`, `judul_slider`) VALUES
('1', 'gt03', 'Get these with worth it price!!'),
('2', 'HT012', 'WOW! thats so cheap');

-- --------------------------------------------------------

--
-- Table structure for table `subkategori`
--

CREATE TABLE `subkategori` (
  `id_sub_kategori` varchar(11) NOT NULL,
  `nama_sub_kategori` varchar(15) NOT NULL,
  `icon` varchar(15) NOT NULL,
  `id_kategori` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkategori`
--

INSERT INTO `subkategori` (`id_sub_kategori`, `nama_sub_kategori`, `icon`, `id_kategori`) VALUES
('wr', 'Wrench', '', 'ht'),
('sk02', 'Socket', '', 'ht'),
('sk03', 'Torque', '', 'ht'),
('sk04', 'Impact Socket', '', 'ht'),
('sk05', 'Pliers', '', 'ht'),
('sk06', 'Screw Driver', '', 'ht'),
('sk07', 'Automotive', '', 'ht'),
('sk08', 'Storage', '', 'ht'),
('sk09', 'Tray', '', 'ht'),
('sk10', 'Air Tools', '', 'ht'),
('sk11', 'Hexkey', '', 'ht'),
('sk12', 'General Tools', '', 'ht'),
('sk13', 'Special Tools', '', 'ht'),
('sk21', 'Piston', 'ikon.png', 'mp'),
('sk23', 'Paper', 'ikon.png', 'os');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` char(32) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `profile_picture` varchar(50) NOT NULL DEFAULT 'akun.png',
  `level` varchar(6) NOT NULL DEFAULT 'member',
  `tanggal_daftar` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `nama_lengkap`, `profile_picture`, `level`, `tanggal_daftar`, `status`) VALUES
('U59c78cf3c2', 'admin@skymarket.com', '69fd3e299fc6b59789eb7d8d404e5989', 'Admin', 'akun.png', 'Admin', '2017-09-24 12:46:11', 1),
('U599e29faf3', 'syahrulrmdhon@gmail.com', 'f735292e5d7e3a3a2d11d2f1085510ba', 'Syahrul', 'akun.png', 'Member', '2017-08-24 03:20:58', 1),
('U59e1884565', 'syahrulrmdhon2@gmail.com', 'f735292e5d7e3a3a2d11d2f1085510ba', 'Syahrul2', 'akun.png', 'Member', '2017-10-14 05:45:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` varchar(11) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `id_barang` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id_wishlist`, `id_user`, `id_barang`) VALUES
('WL5908de26a', 'U58d32d095e', 'gt03'),
('WL5925a854c', 'U58d32d095e', 'wr04'),
('WL5926ac103', 'U59265f1166', 'HT011'),
('WL59321e9d9', 'U5930cbbfa1', 'gt03'),
('WL598a2557c', 'U5971d83de7', 'HT014'),
('WL59ce57dc7', 'U599e29faf3', 'gt03'),
('WL59e188a66', 'U59e1884565', 'HT011');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id_alamat`),
  ADD UNIQUE KEY `id_alamat` (`id_alamat`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `id_barang` (`id_barang`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD UNIQUE KEY `id_cart` (`id_cart`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`),
  ADD UNIQUE KEY `id_payment` (`id_payment`),
  ADD UNIQUE KEY `id_payment_2` (`id_payment`);

--
-- Indexes for table `payment_buffer`
--
ALTER TABLE `payment_buffer`
  ADD PRIMARY KEY (`id_buffer`),
  ADD UNIQUE KEY `id_buffer` (`id_buffer`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `subkategori`
--
ALTER TABLE `subkategori`
  ADD PRIMARY KEY (`id_sub_kategori`),
  ADD UNIQUE KEY `id_sub_kategori` (`id_sub_kategori`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`),
  ADD UNIQUE KEY `id_wishlist` (`id_wishlist`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment_buffer`
--
ALTER TABLE `payment_buffer`
  MODIFY `id_buffer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
