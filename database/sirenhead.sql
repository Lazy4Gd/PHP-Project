-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2023 at 05:39 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `celyncell`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', 'admin', 'Celyn Cell');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `judul`, `deskripsi`) VALUES
(1, 'World Tour 2023 - Jakarta', 'Sirenhead will perform a concert on 21 june 2023 in Jakarta, at the Jakarta International Stadium.'),
(2, 'World Tour 2023 - Bali', 'Sirenhead will perform a concert on 22 june 2023 in Bali, at Bali International Stadium.'),
(3, 'World Tour 2023 - Paris', 'Sirenhead will perform a concert on 23 june 2023 in Paris, at the Parc de Prince.'),
(4, 'World Tour 2023 - Barcelona', 'Sirenhead will perform a concert on 23 june 2023 in Barcelona, at the Camp Nou.');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `token` int(5) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`token`, `tarif`) VALUES
(1, 2000),
(2, 2000),
(3, 1000),
(4, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(6, 'benhailpardosi@gmail.com', 'user', 'Benhail Pardosi', '081287198168', 'Bukit Cimanggu City Blok AA3 No.2');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(3, 8, 'Gabe Pardosi', 'BNI', 208000, '2022-06-23', '20220623071541Bukti-Transfer-Internet-Banking-BNI.jpg'),
(4, 9, 'Gabe Pardosi', 'BNI', 206000, '2022-06-25', '20220625073828Bukti-Transfer-Internet-Banking-BNI.jpg'),
(5, 12, 'Gabe Pardosi', 'Mandiri', 205000, '2022-06-28', '20220628064624Bukti Transfer Mandiri.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `token` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_rumah` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'Pending',
  `resi_pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `token`, `tanggal_pembelian`, `total_pembelian`, `alamat`, `tarif`, `alamat_rumah`, `status_pembelian`, `resi_pengiriman`) VALUES
(8, 2, 2, '2022-06-17', 208000, 'Cluster Kencana', 2000, '', 'lunas', 'A01B01'),
(9, 2, 3, '2022-06-17', 206000, 'Cluster GreenLaand', 1000, 'Blok AA3 No.2 Kode Pos (16165)', 'sudah bayar', ''),
(12, 2, 3, '2022-06-17', 205000, 'Cluster GreenLaand', 1000, 'Blok AA5 No.8', 'sudah bayar', ''),
(15, 4, 2, '2022-06-21', 246000, 'Cluster Kencana', 2000, 'Blok KD 2 No.4', 'Pending', ''),
(16, 2, 4, '2022-06-23', 24000, 'Cluster Charwood', 2000, 'Blok KA 10 No 2', 'Pending', ''),
(17, 1, 3, '2022-07-11', 352000, 'Cluster GreenLaand', 1000, 'Blok AA3 No.2', 'Pending', ''),
(18, 2, 3, '2022-07-12', 223000, 'Cluster GreenLaand', 1000, 'Blok AA5 No.5', 'Pending', ''),
(19, 6, 0, '2022-12-31', 200000, '', 0, '', 'Pending', ''),
(20, 6, 0, '2022-12-31', 8000, '', 0, '', 'Pending', ''),
(21, 6, 0, '2022-12-31', 8000, '', 0, '', 'Pending', ''),
(22, 6, 0, '2022-12-31', 8000, '', 0, '', 'Pending', ''),
(23, 6, 0, '2022-12-31', 8000, '', 0, '', 'Pending', ''),
(24, 6, 0, '2022-12-31', 8000, '', 0, '', 'Pending', ''),
(25, 6, 0, '2022-12-31', 8000, '', 0, '', 'Pending', ''),
(26, 6, 0, '2022-12-31', 12000, '', 0, '', 'Pending', ''),
(27, 6, 0, '2023-01-01', 3000000, '', 0, '', 'Pending', ''),
(28, 6, 0, '2023-01-02', 6000000, '', 0, '', 'Pending', ''),
(29, 6, 0, '2023-01-02', 26000000, '', 0, '', 'Pending', ''),
(30, 6, 0, '2023-01-02', 3000000, '', 0, '', 'Pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_token` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_token`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(1, 1, 1, 0, '', 0, 0, 0, 0),
(2, 1, 1, 0, '', 0, 0, 0, 0),
(3, 4, 2, 2, '', 0, 0, 0, 0),
(4, 4, 5, 1, '', 0, 0, 0, 0),
(5, 4, 3, 1, '', 0, 0, 0, 0),
(6, 5, 1, 2, '', 0, 0, 0, 0),
(7, 5, 4, 1, '', 0, 0, 0, 0),
(8, 5, 3, 1, '', 0, 0, 0, 0),
(9, 6, 3, 1, '', 0, 0, 0, 0),
(10, 7, 5, 1, 'Mizone', 5000, 1, 1, 5000),
(11, 7, 1, 1, 'Gas 12 Kilo', 200000, 12, 12, 200000),
(12, 8, 1, 1, 'Gas 12 Kilo', 200000, 12, 12, 200000),
(13, 8, 5, 1, 'Mizone', 6000, 1, 1, 6000),
(14, 9, 1, 1, 'Gas 12 Kilo', 200000, 12, 12, 200000),
(15, 9, 2, 1, 'Coca-Cola', 5000, 1, 1, 5000),
(16, 12, 1, 1, 'Gas 12 Kilo', 200000, 12, 12, 200000),
(17, 12, 3, 1, 'Coca-Cola Kaleng', 4000, 1, 1, 4000),
(18, 13, 1, 1, 'Gas 12 Kilo', 200000, 12, 12, 200000),
(19, 13, 2, 5, 'Coca-Cola', 5000, 1, 5, 25000),
(20, 14, 2, 1, 'Coca-Cola', 5000, 1, 1, 5000),
(21, 15, 1, 1, 'Gas 12 Kilo', 200000, 12, 12, 200000),
(22, 15, 4, 2, 'Gas 3 Kilo', 22000, 3, 6, 44000),
(23, 16, 2, 2, 'Coca-Cola', 5000, 1, 2, 10000),
(24, 16, 3, 3, 'Coca-Cola Kaleng', 4000, 1, 3, 12000),
(25, 17, 1, 1, 'Gas 12 Kilo', 200000, 12, 12, 200000),
(26, 17, 4, 3, 'Gas 3 Kilo', 22000, 3, 9, 66000),
(27, 17, 6, 4, 'Aqua Galon', 20000, 8, 32, 80000),
(28, 17, 8, 5, 'Cokelat Superstar', 1000, 1, 5, 5000),
(29, 18, 1, 1, 'Gas 12 Kilo', 200000, 12, 12, 200000),
(30, 18, 4, 1, 'Gas 3 Kilo', 22000, 3, 3, 22000),
(31, 19, 1, 1, 'Gas 12 Kilo', 200000, 12, 12, 200000),
(32, 0, 10, 2, 'Teh Pucuk', 4000, 1, 2, 8000),
(33, 0, 1, 2, 'Gas 12 Kilo', 200000, 12, 24, 400000),
(34, 0, 9, 2, 'Permen Kaki', 1000, 1, 2, 2000),
(35, 0, 7, 2, 'Chuba Balado', 1000, 1, 2, 2000),
(36, 0, 2, 1, 'Coca-Cola', 5000, 1, 1, 5000),
(37, 26, 5, 2, 'Mizone', 6000, 1, 2, 12000),
(38, 27, 22, 2, 'World Tour 2023 - Madrid', 1500000, 0, 0, 3000000),
(39, 28, 44, 2, 'World Tour - Jakarta', 3000000, 0, 0, 6000000),
(40, 29, 47, 2, 'World Tour - London', 13000000, 0, 0, 26000000),
(41, 30, 45, 1, 'World Tour - Balikpapan', 3000000, 0, 0, 3000000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_token` int(11) NOT NULL,
  `nama_tiket` varchar(100) NOT NULL,
  `harga_tiket` int(11) NOT NULL,
  `foto_tiket` varchar(100) NOT NULL,
  `deskripsi_tiket` text NOT NULL,
  `stok_tiket` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_token`, `nama_tiket`, `harga_tiket`, `foto_tiket`, `deskripsi_tiket`, `stok_tiket`) VALUES
(44, 'World Tour - Jakarta', 3000000, 'tiket.jpg', 'Jakarta, 05 Maret 2023\r\nGelora Bung Karno\r\n19.00 - 22.00		', 3998),
(45, 'World Tour - Balikpapan', 3000000, 'tiket.jpg', 'Balikapapan, 14 Juni 2023\r\nBatakan Stadium\r\n18.00 - 22.00', 3499),
(46, 'World Tour - Barcelona', 10000000, 'tiket.jpg', 'Barcelona, 18 Juli 2023\r\nCamp Nou\r\n15.00 - 20.00', 50000),
(47, 'World Tour - London', 13000000, 'tiket.jpg', 'London, 16 Agustus 2023\r\nWembley Stadium\r\n14.00 - 18.00', 6998);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`token`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `token` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
