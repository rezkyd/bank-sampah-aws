-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19 Agu 2019 pada 11.11
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banksampahmlg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukutabungan`
--

CREATE TABLE `bukutabungan` (
  `no` int(11) NOT NULL,
  `noNota` varchar(5) NOT NULL,
  `username` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `kredit` double NOT NULL DEFAULT '0',
  `debet` double NOT NULL DEFAULT '0',
  `saldo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bukutabungan`
--

INSERT INTO `bukutabungan` (`no`, `noNota`, `username`, `tanggal`, `kredit`, `debet`, `saldo`) VALUES
(71, 'K002', 'I001', '2018-06-13', 27500, 0, 27500),
(74, 'K003', 'M001', '2018-07-04', 70000, 0, 70000),
(75, 'K008', 'M001', '2018-07-15', 1600, 0, 71600),
(76, 'D001', 'M001', '2018-07-17', 0, 2000, 69600),
(77, 'K009', 'M001', '2018-07-16', 18000, 0, 87600),
(78, 'K010', 'M001', '2018-07-16', 34000, 0, 121600),
(79, 'K012', 'I001', '2018-11-26', 0, 0, 27500),
(80, 'K011', 'M001', '2018-12-01', 27500, 0, 149100),
(81, 'K013', 'M001', '2018-12-05', 150000, 0, 299100),
(84, 'K014', 'M001', '2019-04-22', 21000, 0, 320100),
(85, 'K015', 'M001', '2019-04-22', 21000, 0, 341100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpenyetoran`
--

CREATE TABLE `detailpenyetoran` (
  `no` int(11) NOT NULL,
  `noNota` varchar(5) DEFAULT NULL,
  `username` varchar(5) NOT NULL,
  `kodeSampah` varchar(5) NOT NULL,
  `jenisSampah` varchar(25) NOT NULL,
  `berat` double DEFAULT NULL,
  `hargaJual` double NOT NULL,
  `subTotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailpenyetoran`
--

INSERT INTO `detailpenyetoran` (`no`, `noNota`, `username`, `kodeSampah`, `jenisSampah`, `berat`, `hargaJual`, `subTotal`) VALUES
(89, 'K002', 'I001', 'P06', 'Gelas Aleale', 10, 2500, 25000),
(90, 'K002', 'I001', 'P17', 'Selang', 2, 1250, 2500),
(93, 'K003', 'M001', 'A4', 'Tutup Botol Alumunium', 20, 3500, 70000),
(94, 'K008', 'M001', 'B3', 'Botol Bensin/biji', 2, 800, 1600),
(95, 'K009', 'M001', 'P02', 'Plastik Sunlight Besar', 30, 600, 18000),
(96, 'K010', 'M001', 'K1', 'Buku Tulis', 20, 1700, 34000),
(130, 'K011', 'M001', 'P06', 'Gelas Aleale', 10, 2500, 25000),
(131, 'K013', 'M001', 'T1', 'Tembaga Biasa', 3, 50000, 150000),
(132, 'K014', 'M001', 'A1', 'Antena/Panci/Wajan', 2, 0, 0),
(134, 'K015', 'M001', 'A1', 'Antena/Panci/Wajan', 2, 10500, 21000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailstatus`
--

CREATE TABLE `detailstatus` (
  `idDetail` int(11) NOT NULL,
  `idJemput` varchar(5) NOT NULL,
  `username` varchar(6) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailstatus`
--

INSERT INTO `detailstatus` (`idDetail`, `idJemput`, `username`, `waktu`, `status`) VALUES
(84, 'J002', 'M001', '2018-07-08 15:14:57', 'Menunggu Konfirmasi'),
(85, 'J002', 'M001', '2018-07-08 15:15:34', 'Menunggu Penjemputan'),
(86, 'J002', 'M001', '2018-07-08 15:15:50', 'Menjemput Pesanan'),
(89, 'J002', 'M001', '2018-07-08 15:36:03', 'Menunggu Verifikasi'),
(91, 'J002', 'M001', '2018-07-08 15:49:51', 'Selesai'),
(92, 'J003', 'M001', '2018-07-15 16:17:25', 'Menunggu Konfirmasi'),
(93, 'J003', 'M001', '2018-07-15 16:17:41', 'Menunggu Penjemputan'),
(94, 'J003', 'M001', '2018-07-15 16:18:03', 'Menjemput Pesanan'),
(95, 'J003', 'M001', '2018-07-15 16:18:24', 'Menunggu Verifikasi'),
(96, 'J003', 'M001', '2018-07-15 16:18:51', 'Selesai'),
(97, 'J004', 'M001', '2018-07-15 16:21:05', 'Menunggu Konfirmasi'),
(98, 'J004', 'M001', '2018-07-15 16:46:51', 'Penjemputan Ditolak'),
(99, 'J005', 'M001', '2018-07-15 16:55:06', 'Menunggu Konfirmasi'),
(100, 'J005', 'M001', '2018-07-15 16:56:45', 'Penjemputan Ditolak'),
(101, 'J006', 'M001', '2018-07-16 00:26:39', 'Menunggu Konfirmasi'),
(102, 'J006', 'M001', '2018-07-16 00:26:53', 'Menunggu Penjemputan'),
(103, 'J006', 'M001', '2018-07-16 00:27:12', 'Menjemput Pesanan'),
(104, 'J006', 'M001', '2018-07-16 00:27:41', 'Menunggu Verifikasi'),
(105, 'J006', 'M001', '2018-07-16 00:28:06', 'Selesai'),
(106, 'J007', 'M001', '2018-07-16 03:56:47', 'Menunggu Konfirmasi'),
(107, 'J007', 'M001', '2018-07-16 03:57:01', 'Menunggu Penjemputan'),
(108, 'J007', 'M001', '2018-07-16 03:57:27', 'Menjemput Pesanan'),
(109, 'J007', 'M001', '2018-07-16 03:57:48', 'Menunggu Verifikasi'),
(110, 'J007', 'M001', '2018-07-16 03:58:31', 'Selesai'),
(111, 'J008', 'M001', '2018-12-01 23:59:57', 'Selesai'),
(122, 'J012', 'M001', '2018-12-05 07:08:26', 'Menunggu Konfirmasi'),
(123, 'J012', 'M001', '2018-12-05 07:08:46', 'Menunggu Penjemputan'),
(124, 'J012', 'M001', '2018-12-05 07:29:23', 'Menjemput Pesanan'),
(125, 'J012', 'M001', '2018-12-05 07:34:05', 'Menunggu Verifikasi'),
(126, 'J012', 'M001', '2018-12-05 07:35:08', 'Selesai'),
(127, 'J011', 'M001', '2018-12-06 07:36:24', 'Menjemput Pesanan'),
(128, 'J011', 'M001', '2018-12-08 05:16:28', 'Menjemput Pesanan'),
(129, 'J010', 'M001', '2018-12-08 07:00:02', 'Menunggu Verifikasi'),
(130, 'J010', 'M001', '2018-12-09 08:23:07', 'Menunggu Verifikasi'),
(131, 'J010', 'M001', '2018-12-09 09:11:54', 'Menunggu Verifikasi'),
(132, 'J013', 'M001', '2018-12-12 03:54:06', 'Menunggu Konfirmasi'),
(133, 'J013', 'M001', '2018-12-12 03:54:59', 'Menunggu Penjemputan'),
(134, 'J011', 'M001', '2019-03-03 10:26:39', 'Menjemput Pesanan'),
(135, 'J014', 'M001', '2019-03-10 04:43:47', 'Menunggu Konfirmasi'),
(136, 'J013', 'M001', '2019-03-23 06:15:02', 'Menjemput Pesanan'),
(137, 'J015', 'M001', '2019-04-22 01:03:48', 'Menunggu Konfirmasi'),
(138, 'J015', 'M001', '2019-04-22 01:04:56', 'Menunggu Penjemputan'),
(139, 'J015', 'M001', '2019-04-22 01:06:43', 'Menjemput Pesanan'),
(140, 'J015', 'M001', '2019-04-22 01:07:28', 'Menunggu Verifikasi'),
(141, 'J015', 'M001', '2019-04-22 01:07:55', 'Selesai'),
(146, 'J016', 'M001', '2019-04-22 01:41:55', 'Menunggu Konfirmasi'),
(147, 'J016', 'M001', '2019-04-22 01:42:21', 'Menunggu Penjemputan'),
(148, 'J016', 'M001', '2019-04-22 01:42:57', 'Menjemput Pesanan'),
(149, 'J016', 'M001', '2019-04-22 02:46:56', 'Menunggu Verifikasi'),
(150, 'J016', 'M001', '2019-04-22 02:47:36', 'Selesai'),
(151, 'J017', 'M001', '2019-07-18 01:29:17', 'Menunggu Konfirmasi'),
(152, 'J017', 'M001', '2019-07-18 01:56:24', 'Menunggu Penjemputan'),
(153, 'J017', 'M001', '2019-07-18 01:59:04', 'Menjemput Pesanan'),
(154, 'J018', 'M001', '2019-07-18 02:04:09', 'Menunggu Konfirmasi'),
(155, 'J018', 'M001', '2019-07-18 02:04:29', 'Menunggu Penjemputan'),
(156, 'J018', 'M001', '2019-07-18 02:05:13', 'Menjemput Pesanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jemputsampah`
--

CREATE TABLE `jemputsampah` (
  `idJemput` varchar(5) NOT NULL,
  `username` varchar(5) NOT NULL,
  `HP` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `latitude` double NOT NULL DEFAULT '0',
  `longitude` double NOT NULL DEFAULT '0',
  `tanggalJemput` date NOT NULL,
  `kloter` varchar(5) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(30) NOT NULL,
  `alasan` varchar(50) NOT NULL,
  `driver` varchar(25) NOT NULL,
  `nohpDriver` varchar(20) NOT NULL,
  `noNota` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jemputsampah`
--

INSERT INTO `jemputsampah` (`idJemput`, `username`, `HP`, `alamat`, `latitude`, `longitude`, `tanggalJemput`, `kloter`, `waktu`, `status`, `alasan`, `driver`, `nohpDriver`, `noNota`) VALUES
('J001', 'M001', '0812345678', 'Bantaran Barat', -7.918353199999999, 112.62260650000007, '2018-11-20', 'pagi', '2018-11-20 10:01:59', '', '', '', '', ''),
('J002', 'M001', '08129999999', 'Perum. Mutiara Tasikmadu Kav. G', -7.918353199999999, 112.62260650000007, '2018-07-04', 'pagi', '2018-07-09 14:55:06', 'Selesai', '', 'Bambang Hidayat', '081399778957', 'K003'),
('J003', 'M001', '081299756765', 'Perum Mutiara Tasikmadu Kav H', -7.918353199999999, 112.62260650000007, '2018-07-16', 'pagi', '2018-07-15 16:18:51', 'Selesai', '', 'Bambang Hidayat', '081399778957', 'K008'),
('J004', 'M001', '081299756765', 'Perum Mutiara ', 0, 0, '2018-07-16', 'pagi', '2018-07-15 16:46:51', 'Penjemputan Ditolak', 'Alamat Tidak Lengkap', '', '', ''),
('J005', 'M001', '081299756765', 's', 0, 0, '2018-07-04', 'pagi', '2018-07-15 16:56:45', 'Penjemputan Ditolak', '', '', '', ''),
('J006', 'M001', '081299756765', 'Perum Mutiara Tasikmadu Kav. H', -7.918353199999999, 112.62260650000007, '2018-07-16', 'pagi', '2018-07-16 00:28:06', 'Selesai', '', 'Bambang Hidayat', '081399778957', 'K009'),
('J007', 'M001', '081299756765', 'Perum Mutiara Tasikmadu Kav. H', -7.918353199999999, 112.62260650000007, '2018-07-16', 'siang', '2018-07-16 03:58:31', 'Selesai', '', 'Bambang Hidayat', '081399778957', 'K010'),
('J008', 'M001', '12345', 'gogopowerranger', 37.4220332, -122.0840813, '2018-12-01', 'Pagi', '2018-12-01 23:59:57', 'Selesai', '', 'Bambang Hidayat', '081399778957', 'K011'),
('J009', 'M001', '12131', 'gggg', -7.9469726, 112.6327597, '2018-12-03', 'Pagi', '2018-12-04 08:27:25', 'Menunggu Verifikasi', '', 'Bambang Hidayat', '081399778957', 'K012'),
('J010', 'M001', '123456', 'Jalan Apayak', -7.944869149999998, 112.6113675, '2018-12-05', 'Pagi', '2019-03-13 03:22:04', 'Menjemput Pesanan', '', 'Bambang Hidayat', '081399778957', ''),
('J011', 'M001', '0987654321', 'Opo was oleh', -7.9535517, 112.6142167, '2018-12-05', 'Siang', '2019-03-22 10:48:21', 'Menjemput Pesanan', '', 'Bambang Hidayat', '081399778957', ''),
('J012', 'M001', '12345', 'Percobaan', -7.94696, 112.6328056, '2019-03-20', 'Pagi', '2019-03-23 09:12:25', 'Menunggu Penjemputan', '', 'Bambang Hidayat', '081399778957', 'K013'),
('J013', 'M001', '1234', 'Jl. Bantaran Barat 1, No.48', -7.9493144000000004, 112.6168747, '2019-03-27', 'Siang', '2019-03-27 08:06:43', 'Menunggu Penjemputan', '', '', '', ''),
('J014', 'M001', '335566', 'Perum Mutiara Tasikmadu Kav. H', -6.9021138, 112.05364574999999, '2019-03-27', 'Pagi', '2019-03-27 08:06:49', 'Menunggu Penjemputan', '', '', '', ''),
('J015', 'M001', '081289890989', 'Jl. Bantaran Barat 1, No. 48', -7.9469562, 112.6328063, '2019-04-22', 'Pagi', '2019-04-22 01:07:55', 'Selesai', '', 'Bambang Hidayat', '081399778957', 'K014'),
('J016', 'M001', '081289890989', 'Blossom Multimedia', -7.944419749999999, 112.63789785, '2019-04-22', 'Pagi', '2019-04-22 02:47:36', 'Selesai', '', 'Bambang Hidayat', '081399778957', 'K015'),
('J017', 'M001', '081289890989', 'Jl. Bantaran Barat 1, No. 48', -7.9532303, 112.6170714, '2019-07-18', 'Pagi', '2019-07-18 01:59:04', 'Menjemput Pesanan', '', 'Bambang Hidayat', '081399778957', ''),
('J018', 'M001', '081289890989', 'Jl. Bantaran Barat 1, No. 48', -7.94700475, 112.6328145, '2019-07-18', 'Pagi', '2019-07-18 02:05:13', 'Menjemput Pesanan', '', 'Bambang Hidayat', '081399778957', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nasabah`
--

CREATE TABLE `nasabah` (
  `username` varchar(15) NOT NULL,
  `password` varchar(6) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tipeNasabah` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nohpNasabah` varchar(20) DEFAULT NULL,
  `saldo` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nasabah`
--

INSERT INTO `nasabah` (`username`, `password`, `nama`, `alamat`, `tipeNasabah`, `email`, `nohpNasabah`, `saldo`) VALUES
('I001', 'lalala', 'Laura Safitri', 'Jl. Bunga Coklat', 'Nasabah Individu', 'lala@gmail.com', '089956554344', 27500),
('I002', '909090', 'Sekar ', 'Jl. Candi Panggung', 'Nasabah Individu', 'sekar@gmail.com', '081299898871', 0),
('I003', 'WKqZlk', 'Irin', 'Griya Shanta', 'Nasabah Individu', 'irin@gmail.com', '081323234543', 0),
('I004', 'coba12', 'coba', 'coba', 'Nasabah Individu', 'c@gmail.com', '090', 0),
('IN001', 'in001', 'Pizza Hut Suhat', 'Jl. Soekarno Hatta', 'Nasabah Individu', 'phs@gmail.com', '082264561116', 0),
('M001', '121212', 'Wisnu Wardhana', 'Jl. Bantaran Barat 1, No. 48', 'Nasabah Kelompok', 'bam@gmail.com', '081289890989', 341100),
('M002', 'filkom', 'BEM FILKOM UB', 'Universitas Brawijaya', 'Nasabah Kelompok', 'bemfilkom__@ub.ac.id', '081212129090', 0),
('S001', 'f1ee32', 'SD 001', 'Malang', 'Nasabah Sekolah', 'sd@gmail.com', '(0341)74563', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penarikan`
--

CREATE TABLE `penarikan` (
  `noNota` varchar(5) NOT NULL,
  `username` varchar(5) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `debet` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penarikan`
--

INSERT INTO `penarikan` (`noNota`, `username`, `tanggal`, `debet`) VALUES
('D001', 'M001', '2018-07-17', 2000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyetoran`
--

CREATE TABLE `penyetoran` (
  `noNota` varchar(5) NOT NULL,
  `username` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `kredit` double DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyetoran`
--

INSERT INTO `penyetoran` (`noNota`, `username`, `tanggal`, `kredit`, `status`) VALUES
('K002', 'I001', '2018-06-13', 27500, 1),
('K003', 'M001', '2018-07-04', 70000, 1),
('K004', 'I003', '2018-07-10', 0, 1),
('K005', 'I004', '2018-07-18', 0, 1),
('K006', 'I004', '2018-07-04', 0, 1),
('K007', 'I003', '2018-07-04', 0, 1),
('K008', 'M001', '2018-07-15', 1600, 1),
('K009', 'M001', '2018-07-16', 18000, 1),
('K010', 'M001', '2018-07-16', 34000, 1),
('K011', 'M001', '2018-12-01', 25000, 0),
('K012', 'M001', '2018-12-04', 52500, 0),
('K013', 'M001', '2018-12-05', 150000, 1),
('K014', 'M001', '2019-04-22', 21000, 1),
('K015', 'M001', '2019-04-22', 21000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `idPetugas` int(3) NOT NULL,
  `username` varchar(10) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `password` varchar(6) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `tipe` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `nohpPetugas` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`idPetugas`, `username`, `nama`, `password`, `alamat`, `tipe`, `email`, `nohpPetugas`) VALUES
(1, 'P001', 'admin', 'admin1', 'Malang', 'Admin', 'admin@hotmail.com', '085751116277'),
(2, 'P002', 'Bambang Hidayat', '121212', 'Blimbling', 'Driver', 'chris@ymail.com', '081399778957');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sampah`
--

CREATE TABLE `sampah` (
  `kodeSampah` varchar(5) NOT NULL,
  `jenisSampah` varchar(25) NOT NULL,
  `hargaJual` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sampah`
--

INSERT INTO `sampah` (`kodeSampah`, `jenisSampah`, `hargaJual`) VALUES
('A1', 'Antena/Panci/Wajan', 10500),
('A2', 'Kaleng Alumunium', 10000),
('A3', 'Plat', 14500),
('A4', 'Tutup Botol Alumunium', 3500),
('A5', 'Perunggu', 6500),
('AK1', 'Aki Kecil', 8000),
('AK2', 'Aki Besar Tanggung', 15000),
('B1', 'Botol Marjan/biji', 100),
('B2', 'Botol Kecap/biji', 500),
('B3', 'Botol Bensin/biji', 800),
('B4', 'Botol Bir/biji', 800),
('B5', 'Botol CocaCola/biji', 250),
('K1', 'Buku Tulis', 1700),
('K2', 'HVS', 1700),
('K3', 'Koran', 2000),
('K4', 'Majalah', 650),
('K5', 'Karton/Kardus', 1500),
('P01', 'PP Bungkus Mie Instant', 400),
('P02', 'Plastik Sunlight Besar', 600),
('P03', 'PP Aqua Gelas Bersih', 6000),
('P04', 'PP Aqua Gelas Kotor', 4500),
('P05', 'Kresek', 400),
('P06', 'Gelas Aleale', 2500),
('P07', 'PET Botol Bening Bersih', 4500),
('P08', 'PET Botol Bening Kotor', 2700),
('P09', 'PET Botol Warna Bersih', 2500),
('P10', 'PET Botol Warna Kotor', 2000),
('P11', 'PP Bak Warna', 2800),
('P12', 'PP Bak Hitam', 1500),
('P13', 'Jerigen', 4000),
('P14', 'Jas Hujan', 700),
('P15', 'Kulit Kabel', 1200),
('P16', 'Tutup Aqua Galon', 2600),
('P17', 'Selang Air', 1250),
('P18', 'Galon', 3000),
('T1', 'Tembaga Biasa', 50000),
('T2', 'Tembaga Super', 53000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukutabungan`
--
ALTER TABLE `bukutabungan`
  ADD PRIMARY KEY (`no`),
  ADD KEY `username` (`username`),
  ADD KEY `noNota` (`noNota`);

--
-- Indexes for table `detailpenyetoran`
--
ALTER TABLE `detailpenyetoran`
  ADD PRIMARY KEY (`no`),
  ADD KEY `FK_kodeSampah` (`kodeSampah`),
  ADD KEY `noNota` (`noNota`);

--
-- Indexes for table `detailstatus`
--
ALTER TABLE `detailstatus`
  ADD PRIMARY KEY (`idDetail`),
  ADD KEY `FK_idJemput` (`idJemput`);

--
-- Indexes for table `jemputsampah`
--
ALTER TABLE `jemputsampah`
  ADD PRIMARY KEY (`idJemput`),
  ADD KEY `username` (`username`),
  ADD KEY `idDriver` (`driver`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `penarikan`
--
ALTER TABLE `penarikan`
  ADD PRIMARY KEY (`noNota`),
  ADD KEY `noRek` (`username`);

--
-- Indexes for table `penyetoran`
--
ALTER TABLE `penyetoran`
  ADD PRIMARY KEY (`noNota`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`idPetugas`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `sampah`
--
ALTER TABLE `sampah`
  ADD PRIMARY KEY (`kodeSampah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bukutabungan`
--
ALTER TABLE `bukutabungan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `detailpenyetoran`
--
ALTER TABLE `detailpenyetoran`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `detailstatus`
--
ALTER TABLE `detailstatus`
  MODIFY `idDetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `idPetugas` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bukutabungan`
--
ALTER TABLE `bukutabungan`
  ADD CONSTRAINT `FK_username_BT` FOREIGN KEY (`username`) REFERENCES `nasabah` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detailpenyetoran`
--
ALTER TABLE `detailpenyetoran`
  ADD CONSTRAINT `FK_kodeSampah` FOREIGN KEY (`kodeSampah`) REFERENCES `sampah` (`kodeSampah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detailpenyetoran_ibfk_1` FOREIGN KEY (`noNota`) REFERENCES `penyetoran` (`noNota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detailstatus`
--
ALTER TABLE `detailstatus`
  ADD CONSTRAINT `FK_idJemput` FOREIGN KEY (`idJemput`) REFERENCES `jemputsampah` (`idJemput`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jemputsampah`
--
ALTER TABLE `jemputsampah`
  ADD CONSTRAINT `jemputsampah_ibfk_1` FOREIGN KEY (`username`) REFERENCES `nasabah` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penarikan`
--
ALTER TABLE `penarikan`
  ADD CONSTRAINT `penarikan_ibfk_1` FOREIGN KEY (`username`) REFERENCES `nasabah` (`username`);

--
-- Ketidakleluasaan untuk tabel `penyetoran`
--
ALTER TABLE `penyetoran`
  ADD CONSTRAINT `penyetoran_ibfk_1` FOREIGN KEY (`username`) REFERENCES `nasabah` (`username`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
