-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Bulan Mei 2020 pada 08.05
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_sell`
--

CREATE TABLE `item_sell` (
  `notaId` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `produkName` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `item_sell`
--

INSERT INTO `item_sell` (`notaId`, `date`, `produkName`, `price`, `quantity`, `total`, `id`) VALUES
(9, '2020-05-08 08:19:05', 'Celana Chino', '120000.00', 5, '600000.00', 1),
(10, '2020-05-08 11:48:35', 'Taro', '5000.00', 4, '20000.00', 2),
(10, '2020-05-08 11:48:35', 'Fanta', '12000.00', 2, '24000.00', 3),
(10, '2020-01-01 14:07:43', 'Taro', '5000.00', 2, '10000.00', 28),
(9, '2020-02-06 14:07:43', 'Taro', '5000.00', 4, '20000.00', 29),
(10, '2020-03-03 14:10:14', 'Taro', '5000.00', 3, '15000.00', 30),
(10, '2020-04-01 14:10:14', 'Taro', '5000.00', 5, '25000.00', 31),
(9, '2020-06-02 14:10:14', 'Taro', '5000.00', 0, '0.00', 32),
(9, '2020-07-01 14:10:14', 'Taro', '5000.00', 0, '0.00', 33),
(10, '2020-08-01 14:10:14', 'Taro', '5000.00', 0, '0.00', 34),
(9, '2020-05-09 14:10:14', 'Taro', '5000.00', 2, '10000.00', 35),
(10, '2020-09-05 14:10:14', 'Taro', '5000.00', 0, '0.00', 36),
(9, '2020-10-03 14:10:14', 'Taro', '5000.00', 0, '0.00', 37),
(10, '2020-11-07 14:10:14', 'Taro', '5000.00', 0, '0.00', 38),
(9, '2020-12-02 14:14:56', 'Taro', '5000.00', 0, '0.00', 39),
(11, '2020-05-08 22:50:27', 'Kaos Mojok', '45000.00', 3, '135000.00', 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota`
--

CREATE TABLE `nota` (
  `id` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `total` decimal(20,2) NOT NULL,
  `ppn` decimal(5,0) NOT NULL,
  `tagihan` decimal(20,2) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `jenis_faktur` varchar(100) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `nama_pegawai` varchar(100) DEFAULT NULL,
  `status_transaksi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nota`
--

INSERT INTO `nota` (`id`, `tanggal`, `total`, `ppn`, `tagihan`, `id_customer`, `nama_customer`, `jenis_faktur`, `id_pegawai`, `nama_pegawai`, `status_transaksi`) VALUES
(1, '2020-05-08 06:32:22', '0.00', '10', '0.00', 3, 'lazu', 'penjualan', NULL, NULL, 'success'),
(2, '2020-05-08 06:32:22', '31000.00', '10', '34100.00', 3, 'lazu', 'penjualan', NULL, NULL, 'success'),
(3, '2020-05-08 06:32:22', '16000.00', '10', '17600.00', 3, 'lazu', 'penjualan', NULL, NULL, 'success'),
(4, '2020-05-08 06:32:22', '24000.00', '10', '26400.00', 3, 'lazu', 'penjualan', NULL, NULL, 'success'),
(5, '2020-05-08 06:32:22', '136000.00', '10', '149600.00', 3, 'lazu', 'penjualan', NULL, NULL, 'success'),
(6, '2020-05-08 06:32:22', '48000.00', '10', '52800.00', 3, 'lazu', 'penjualan', NULL, NULL, 'success'),
(7, '2020-05-08 06:32:22', '377000.00', '10', '414700.00', 3, 'lazu', 'penjualan', NULL, NULL, 'success'),
(8, '2020-05-08 06:32:49', '250000.00', '10', '275000.00', 3, 'lazu', 'penjualan', NULL, NULL, 'success'),
(9, '2020-05-08 07:07:03', '600000.00', '10', '660000.00', 3, 'lazu', 'penjualan', NULL, NULL, 'success'),
(10, '2020-05-08 11:48:04', '44000.00', '10', '48400.00', 3, 'lazu', 'penjualan', NULL, NULL, 'success'),
(11, '2020-05-08 22:50:16', '135000.00', '10', '148500.00', 3, 'lazu', 'penjualan', NULL, NULL, 'success');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kategori`
--

CREATE TABLE `t_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_kategori`
--

INSERT INTO `t_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'Kaos'),
(4, 'Celana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_keranjang`
--

CREATE TABLE `t_keranjang` (
  `nama_produk` varchar(100) NOT NULL,
  `harga_satuan` decimal(10,2) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `nota_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `t_keranjang`
--
DELIMITER $$
CREATE TRIGGER `item_trigger` AFTER DELETE ON `t_keranjang` FOR EACH ROW BEGIN 
   INSERT INTO item_sell (notaId, 
   produkName,
   price,
   quantity,
   total)
   
   VALUES
   ( OLD.nota_id,
    OLD.nama_produk,
    OLD.harga_satuan,
    OLD.kuantitas,
    OLD.subtotal);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_menu`
--

CREATE TABLE `t_menu` (
  `id` int(11) NOT NULL,
  `nama` varchar(65) NOT NULL,
  `url` varchar(65) NOT NULL,
  `t_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_produk`
--

CREATE TABLE `t_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(65) NOT NULL,
  `harga` varchar(65) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tgl_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_produk`
--

INSERT INTO `t_produk` (`id_produk`, `nama_produk`, `harga`, `stok`, `id_kategori`, `id_supplier`, `foto`, `tgl_masuk`) VALUES
(1, 'Oreo', '8000', 1000, 1, 1, '/assets/produk/oreo.jpg', '2020-04-06'),
(2, 'Taro', '5000', 2500, 1, 2, '/assets/produk/taro.jpg', '2020-03-03'),
(3, 'Sprite', '12000', 450, 2, 2, '/assets/produk/sprite.jpg', '2020-04-20'),
(4, 'Fanta', '12000', 200, 2, 2, '/assets/produk/fanta.jpg', '2020-04-04'),
(6, 'Kaos Mojok', '45000', 200, 3, 3, '/assets/produk/kaos.jpg', '2020-03-27'),
(7, 'Celana Chino', '120000', 300, 4, 3, '/assets/produk/celana.jpg', '2020-04-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_role`
--

CREATE TABLE `t_role` (
  `id` int(11) NOT NULL,
  `nama` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_role`
--

INSERT INTO `t_role` (`id`, `nama`) VALUES
(1, 'manager'),
(2, 'employee'),
(3, 'member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_supplier`
--

CREATE TABLE `t_supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `email_supplier` varchar(255) NOT NULL,
  `no_supplier` varchar(255) NOT NULL,
  `kecamatan_supplier` varchar(255) NOT NULL,
  `kota_supplier` varchar(255) NOT NULL,
  `provinsi_supplier` varchar(255) NOT NULL,
  `kodepos_supplier` varchar(255) NOT NULL,
  `alamat_supplier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_supplier`
--

INSERT INTO `t_supplier` (`id_supplier`, `nama_supplier`, `email_supplier`, `no_supplier`, `kecamatan_supplier`, `kota_supplier`, `provinsi_supplier`, `kodepos_supplier`, `alamat_supplier`) VALUES
(1, 'PT. Maju Mapan', 'maju@gmail.com', '086655422144', 'Ngunut', 'Tulungagung', 'Jawa Timur', '66292', 'Jalan Raya Ngunut no.12'),
(2, 'CV. Makmur Abadi', 'abadi@gmail.com', '0845561233345', 'Jabon', 'Sidoarjo', 'Jawa Timur', '64225', 'Jalan Mangga no. 1'),
(3, 'PT. Berkah Jaya', 'berkah@gmail.com', '081223665447', 'Banyumanik', 'Semarang', 'Jawa Tengah', '55487', 'Jalan Anggrek no. 23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(65) NOT NULL,
  `email` varchar(65) NOT NULL,
  `password` varchar(65) NOT NULL,
  `alamat` varchar(65) NOT NULL,
  `hp` varchar(65) NOT NULL,
  `status` varchar(65) NOT NULL,
  `t_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `nama_user`, `email`, `password`, `alamat`, `hp`, `status`, `t_role_id`) VALUES
(1, 'ekas', 'ekas@gmail.com', '12345', 'Bojonegoro', '081247777777', 'manager', 1),
(2, 'ivan', 'ivan@gmail.com', '12345', 'Tulungagung', '089765432123', 'employee', 2),
(3, 'lazu', 'lazu@gmail.com', '12345', 'Kediri', '08322146578', 'member', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `item_sell`
--
ALTER TABLE `item_sell`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indeks untuk tabel `t_kategori`
--
ALTER TABLE `t_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `t_keranjang`
--
ALTER TABLE `t_keranjang`
  ADD PRIMARY KEY (`nota_id`,`produk_id`),
  ADD KEY `nota_id` (`nota_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indeks untuk tabel `t_menu`
--
ALTER TABLE `t_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_t_menu_t_role` (`t_role_id`) USING BTREE;

--
-- Indeks untuk tabel `t_produk`
--
ALTER TABLE `t_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `produk_kategori` (`id_kategori`) USING BTREE,
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indeks untuk tabel `t_role`
--
ALTER TABLE `t_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_supplier`
--
ALTER TABLE `t_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_t_user_t_role` (`t_role_id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `item_sell`
--
ALTER TABLE `item_sell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `nota`
--
ALTER TABLE `nota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `t_kategori`
--
ALTER TABLE `t_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `t_menu`
--
ALTER TABLE `t_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_produk`
--
ALTER TABLE `t_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `t_role`
--
ALTER TABLE `t_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_supplier`
--
ALTER TABLE `t_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_keranjang`
--
ALTER TABLE `t_keranjang`
  ADD CONSTRAINT `t_keranjang_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `t_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_keranjang_ibfk_3` FOREIGN KEY (`nota_id`) REFERENCES `nota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_menu`
--
ALTER TABLE `t_menu`
  ADD CONSTRAINT `t_menu_ibfk_1` FOREIGN KEY (`t_role_id`) REFERENCES `t_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_produk`
--
ALTER TABLE `t_produk`
  ADD CONSTRAINT `t_produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `t_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_produk_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `t_supplier` (`id_supplier`);

--
-- Ketidakleluasaan untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD CONSTRAINT `t_user_ibfk_1` FOREIGN KEY (`t_role_id`) REFERENCES `t_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
