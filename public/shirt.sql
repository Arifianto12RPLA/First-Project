-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2021 at 02:25 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shirt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `email`, `password`) VALUES
(3, 'Ari', 'arifiantogik@gmail.com', 'admin'),
(24, 'Jimmy Root', 'rootjimmy@gmail.com', 'admin'),
(25, 'Ebenz', 'ebenbkhc@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `id_produk` int(100) NOT NULL,
  `deskripsi_cart` text NOT NULL,
  `jumlah` int(100) NOT NULL,
  `subtotal` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `id_produk`, `deskripsi_cart`, `jumlah`, `subtotal`) VALUES
(9, 2, 12, 'warna : merah ukuran : S', 5, 600000),
(18, 2, 1, 'warna : hitam ukuran : m', 2, 360000),
(29, 1, 1, 'warna : hitam ukuran : L', 1, 180000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(100) NOT NULL,
  `id_transaksi` int(100) NOT NULL,
  `id_produk` int(100) NOT NULL,
  `deskripsi_det` text NOT NULL,
  `jumlah` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_produk`, `deskripsi_det`, `jumlah`) VALUES
(8, 8, 10, 'warna : hitam ukuran : M', 4),
(9, 8, 12, 'warna : hitam ukuran : L', 2),
(10, 9, 10, 'warna : hitam ukuran : M', 4),
(11, 9, 12, 'warna : hitam ukuran : L', 2),
(12, 10, 9, 'warna : hitam ukuran : L', 3),
(13, 11, 1, 'warna : hitam ukuran : L', 1),
(14, 11, 10, 'warna : Hitam ukuran : M', 3),
(15, 12, 3, 'warna : hitam ukuran : m', 2),
(16, 13, 12, 'warna : hitam ukuran : M', 2),
(17, 14, 9, 'warna : hitam ukuran : M', 2),
(20, 17, 13, 'warna : hitam ukuran : s', 5);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `Harga` int(100) NOT NULL,
  `id_admin` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `Harga`, `id_admin`) VALUES
(1, 'Hoodie', 120000, 3),
(2, 'T-shirt', 90000, 24);

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id_model` int(100) NOT NULL,
  `nama_model` varchar(100) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `harga` int(100) NOT NULL,
  `id_admin` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id_model`, `nama_model`, `gambar`, `harga`, `id_admin`) VALUES
(1, 'model 1', '1602816203_3f82da66c9685c5ede84.jpg', 20000, 3),
(3, 'model 2', '1602817059_14c25cef606d5355d7e2.jpg', 10000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id_operator` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email_op` varchar(250) NOT NULL,
  `password_op` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `id_admin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id_operator`, `nama`, `email_op`, `password_op`, `telepon`, `alamat`, `id_admin`) VALUES
(7, 'sadasd', 'arifi@gmail.com', 'sadsdad', '(+62)384-5637-2893', 'sdsadasd', 3),
(8, 'burhan', 'burhandzaky75@gmail.com', 'operae 33', '(+62)827-2727-2727', 'heheheh', 3),
(10, 'wkwk', 'jonathan@gmail.com', 'operator', '(+62)822-5799-9276', 'OWAKWOAKOWK', 3),
(11, 'arifianto', 'arif@gmail.com', 'operator', '(+62)896-8356-1396', 'kota mbatoe', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `id_model` int(20) NOT NULL,
  `id_kategori` int(25) NOT NULL,
  `gambar1` varchar(100) NOT NULL,
  `gambar2` varchar(100) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(64) NOT NULL,
  `alamat` text NOT NULL,
  `subtotal` int(100) NOT NULL,
  `ongkir` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `jasa` varchar(225) NOT NULL,
  `metode` varchar(10) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `id_model`, `id_kategori`, `gambar1`, `gambar2`, `deskripsi`, `tanggal`, `jumlah`, `alamat`, `subtotal`, `ongkir`, `total`, `jasa`, `metode`, `status`) VALUES
(1, 2, 1, 2, '1606932578_a58083245e71e0e46d7e.jpg', '', 'putih, L', '2020-12-02', 2, 'Bali, Denpasar, asdasdasdas', 220000, 38000, 258000, 'YES', 'BRI', 2),
(4, 4, 1, 2, '1607046294_2f14cb62e9abe1ccff11.jpg', '', 'putih, L', '2020-12-03', 2, 'Jawa Timur, Blitar, asdsadasdsa', 220000, 7000, 227000, 'REG', 'BCA', 3),
(5, 5, 3, 2, '1607487467_28b4cdb8789e9b7ea518.jpg', '', 'hitam, L', '2020-12-08', 1, 'Bali, Denpasar, qwqwqwq', 100000, 38000, 138000, 'YES', 'Mandiri', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(100) NOT NULL,
  `stok` int(10) NOT NULL,
  `gambar` varchar(64) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `id_admin` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `judul`, `deskripsi`, `harga`, `stok`, `gambar`, `id_kategori`, `id_admin`) VALUES
(1, 'jaket slipknot', 'warna tersedia : hitam, putih\r\nukuran tersedia :s,m,l,xl\r\n\r\n', 180000, 12, 'hoodie_slipknot.jpg', 1, 24),
(2, 'kaos BK Adamantine', 'Warna tersedia: merah, biru, hitam, putih\r\nukuran tersedia: s,m,l,xl', 95000, 10, 'burgerkill_shirt.jpg', 2, 25),
(3, 'seringai seperi api', 'warna tersedia : hitam ukuran tersedia :s,m,l,xl', 90000, 20, '1602321680_cf09a0b19362e4f08597.jpg', 2, 3),
(9, 'Jaket BMTH', 'Ukuran : S, M, L, XL\r\nWarna : Hitam, Biru Tua', 160000, 200, '1605221780_2ae7b50f5f62bf5ff196.jpg', 1, 3),
(10, 'Kaos Jasad Band', 'Warna : Hitam \r\nUkuran : S, M, L, XL', 100000, 100, '1605221895_2b5c2a374773be93b1a2.jpg', 2, 3),
(11, 'Kaos Bring Me the Horizon', 'Warna : Hitam\r\nUkuran : S, M, L, XL', 95000, 40, '1605222082_bb269a5be8ca217da283.jpg', 2, 3),
(12, 'Jaket Superman is Dead', 'Warna : hitam, Merah\r\nUkuran : S, M, L, XL', 120000, 50, '1605222157_789060963dfd1a6a5b1a.jpg', 1, 3),
(13, 'Jaket Iron Maiden', 'Warna : Hitam\r\nUkuran : S, M, L, XL', 160000, 70, '1605222212_f49ab76e7080f62d5ebb.jpg', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `subtotal` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `ongkir` int(100) NOT NULL,
  `jasa` varchar(225) NOT NULL,
  `metode` varchar(100) NOT NULL,
  `status` int(100) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `tanggal`, `subtotal`, `total`, `ongkir`, `jasa`, `metode`, `status`, `alamat`) VALUES
(8, 3, '2020-12-03', 640000, 655000, 15000, 'REG', 'BRI', 3, 'DI Yogyakarta, Sleman, asdasd'),
(9, 3, '2020-12-03', 640000, 655000, 15000, 'REG', 'BRI', 1, 'DI Yogyakarta, Sleman, asdasd'),
(10, 4, '2020-12-03', 480000, 558000, 78000, 'REG', 'BRI', 1, 'Gorontalo, Gorontalo Utara, sdasdas'),
(11, 5, '2020-12-08', 480000, 487000, 7000, 'OKE', 'BCA', 1, 'Jawa Timur, Lamongan, asd'),
(12, 1, '2021-02-28', 180000, 200000, 20000, 'REG', 'BRI', 2, 'Bali, Denpasar, sdsdsdasdwdasda'),
(13, 1, '2021-02-28', 240000, 256000, 16000, 'OKE', 'BCA', 2, 'Banten, Serang, sadasda'),
(14, 3, '2021-02-28', 320000, 336000, 16000, 'OKE', 'BRI', 2, 'Jawa Tengah, Grobogan, sadsdasdasdsdasdsa'),
(17, 1, '2021-02-28', 800000, 847000, 47000, 'REG', 'BRI', 2, 'Jambi, Sarolangun, adsadds');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat_us` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telepon` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `alamat_us`, `email`, `password`, `telepon`) VALUES
(1, 'Hellfrog', 'Bandoeng', 'hellfrog@gmail.com', 'member', '(+62)896-8366-1396'),
(2, 'Humaima', 'mbatu', 'tsania@gmail.com', 'member', '(+62)896-8356-1396'),
(3, 'ari', 'asdsad', 'Arf@gmail.com', 'member', '123123'),
(4, 'asdsada', 'sadasd', 'coba@gmail.com', 'member', '9808089'),
(5, 'Andika', 'Kajang', 'andika281203@gmail.com', 'member', '1321321213');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id_model`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_operator`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `model` (`id_model`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id_model` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id_operator` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `kategori`
--
ALTER TABLE `kategori`
  ADD CONSTRAINT `kategori_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `operator`
--
ALTER TABLE `operator`
  ADD CONSTRAINT `operator_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_model`) REFERENCES `model` (`id_model`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
