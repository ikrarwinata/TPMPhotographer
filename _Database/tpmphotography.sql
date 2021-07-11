-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 10:29 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tpmphotography`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `jumlah_peserta` int(4) NOT NULL DEFAULT 1,
  `status` enum('Sedang diproses','Diterima') NOT NULL DEFAULT 'Sedang diproses',
  `id_transaksi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `id_produk`, `username`, `tanggal`, `jumlah_peserta`, `status`, `id_transaksi`) VALUES
(1624310445, 1, 'user1', 1624415445, 1, 'Diterima', NULL),
(1624311181, 2, 'user2', 1624329121, 4, 'Sedang diproses', NULL),
(1625628206, 9, 'novri', 1627633346, 1, 'Diterima', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `timestamps` varchar(25) NOT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `judul`, `timestamps`, `gambar`) VALUES
(1, 'Photo Personal OutDoor', '1625016047', './files/gallery/16250160471.jpg'),
(4, 'Photo Keluarga', '1625015997', './files/gallery/16250159974.jpg'),
(5, 'Photo Personal', '1625015950', './files/gallery/16250159505.jpg'),
(6, 'Paket Wedding Hemat', '1625016292', './files/gallery/1625016292.jpg'),
(7, 'Paket Wedding Murah', '1625016341', './files/gallery/1625016341.jpg'),
(8, 'Paket Wedding Kekinian', '1625016368', './files/gallery/1625016368.jpg'),
(9, 'Paket Wedding Lengkap', '1625016412', './files/gallery/1625016412.jpg'),
(10, 'Aqiqah', '1625016462', './files/gallery/1625016462.jpg'),
(11, 'BirthDay Party', '1625016490', './files/gallery/1625016490.jpg'),
(12, 'Photo Group Indoor', '1625016543', './files/gallery/1625016543.jpg'),
(13, 'Photo Group OutDoor', '1625209805', './files/gallery/162520980513.jpg'),
(14, 'Engagement', '1625016742', './files/gallery/1625016742.jpg'),
(15, 'Photo Personal OutDoor', '1625209670', './files/gallery/162520967015.jpg'),
(16, 'Pre-Wedding', '1625213082', './files/gallery/162521308216.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gambar_produk`
--

CREATE TABLE `gambar_produk` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar_produk`
--

INSERT INTO `gambar_produk` (`id`, `id_produk`, `gambar`) VALUES
(179, 1, './files/products/3006202103170912.jpg'),
(174, 2, './files/products/3006202103163522.jpg'),
(173, 2, './files/products/3006202103163521.jpg'),
(178, 1, './files/products/3006202103170911.jpg'),
(172, 2, './files/products/3006202103163520.jpg'),
(177, 1, './files/products/3006202103170910.jpg'),
(19, 13, './files/products/30062021025447130.jpg'),
(20, 13, './files/products/30062021025447131.jpg'),
(21, 13, './files/products/30062021025447132.jpg'),
(22, 13, './files/products/30062021025447133.jpg'),
(23, 13, './files/products/30062021025447134.jpg'),
(98, 12, './files/products/300620210306431211.jpg'),
(97, 12, './files/products/300620210306431210.jpg'),
(96, 12, './files/products/30062021030643129.jpg'),
(95, 12, './files/products/30062021030643128.jpg'),
(94, 12, './files/products/30062021030643127.jpg'),
(93, 12, './files/products/30062021030643126.jpg'),
(92, 12, './files/products/30062021030643125.jpg'),
(91, 12, './files/products/30062021030643124.jpg'),
(90, 12, './files/products/30062021030643123.jpg'),
(89, 12, './files/products/30062021030643122.jpg'),
(88, 12, './files/products/30062021030643121.jpg'),
(87, 12, './files/products/30062021030643120.jpg'),
(99, 11, './files/products/30062021030801110.jpg'),
(100, 11, './files/products/30062021030801111.jpg'),
(101, 11, './files/products/30062021030801112.jpg'),
(102, 11, './files/products/30062021030801113.jpg'),
(103, 11, './files/products/30062021030801114.jpg'),
(104, 11, './files/products/30062021030801115.jpg'),
(105, 11, './files/products/30062021030801116.jpg'),
(106, 11, './files/products/30062021030801117.jpg'),
(107, 11, './files/products/30062021030801118.jpg'),
(108, 10, './files/products/30062021030918100.jpg'),
(109, 10, './files/products/30062021030918101.jpg'),
(110, 10, './files/products/30062021030918102.jpg'),
(111, 10, './files/products/30062021030918103.jpg'),
(112, 10, './files/products/30062021030918104.jpg'),
(113, 10, './files/products/30062021030918105.jpg'),
(114, 9, './files/products/3006202103101490.jpg'),
(115, 9, './files/products/3006202103101491.jpg'),
(116, 9, './files/products/3006202103101492.jpg'),
(117, 9, './files/products/3006202103101493.jpg'),
(118, 9, './files/products/3006202103101494.jpg'),
(119, 9, './files/products/3006202103101495.jpg'),
(120, 9, './files/products/3006202103101496.jpg'),
(121, 9, './files/products/3006202103101497.jpg'),
(122, 9, './files/products/3006202103101498.jpg'),
(134, 7, './files/products/3006202103123375.jpg'),
(133, 7, './files/products/3006202103123374.jpg'),
(132, 7, './files/products/3006202103123373.jpg'),
(131, 7, './files/products/3006202103123372.jpg'),
(130, 7, './files/products/3006202103123371.jpg'),
(129, 7, './files/products/3006202103123370.jpg'),
(135, 7, './files/products/3006202103123376.jpg'),
(136, 7, './files/products/3006202103123377.jpg'),
(137, 7, './files/products/3006202103123378.jpg'),
(138, 7, './files/products/3006202103123379.jpg'),
(139, 6, './files/products/3006202103132160.jpg'),
(140, 6, './files/products/3006202103132161.jpg'),
(141, 6, './files/products/3006202103132162.jpg'),
(142, 6, './files/products/3006202103132163.jpg'),
(143, 6, './files/products/3006202103132164.jpg'),
(144, 6, './files/products/3006202103132165.jpg'),
(145, 6, './files/products/3006202103132166.jpg'),
(146, 6, './files/products/3006202103132167.jpg'),
(147, 6, './files/products/3006202103132168.jpg'),
(148, 5, './files/products/3006202103140850.jpg'),
(149, 5, './files/products/3006202103140851.jpg'),
(150, 5, './files/products/3006202103140852.jpg'),
(151, 5, './files/products/3006202103140853.jpg'),
(152, 5, './files/products/3006202103140854.jpg'),
(153, 5, './files/products/3006202103140855.jpg'),
(154, 5, './files/products/3006202103140856.jpg'),
(155, 5, './files/products/3006202103140857.jpg'),
(156, 5, './files/products/3006202103140958.jpg'),
(157, 4, './files/products/3006202103150440.jpg'),
(158, 4, './files/products/3006202103150441.jpg'),
(159, 4, './files/products/3006202103150442.jpg'),
(160, 4, './files/products/3006202103150443.jpg'),
(161, 4, './files/products/3006202103150444.jpg'),
(162, 4, './files/products/3006202103150445.jpg'),
(163, 4, './files/products/3006202103150446.jpg'),
(164, 3, './files/products/3006202103160330.jpg'),
(165, 3, './files/products/3006202103160331.jpg'),
(166, 3, './files/products/3006202103160332.jpg'),
(167, 3, './files/products/3006202103160333.jpg'),
(168, 3, './files/products/3006202103160334.jpg'),
(169, 3, './files/products/3006202103160335.jpg'),
(170, 3, './files/products/3006202103160336.jpg'),
(171, 3, './files/products/3006202103160337.jpg'),
(175, 2, './files/products/3006202103163523.jpg'),
(176, 2, './files/products/3006202103163524.jpg'),
(180, 1, './files/products/3006202103170913.jpg'),
(204, 8, './files/products/0207202110035785.jpg'),
(203, 8, './files/products/0207202110035784.jpg'),
(202, 8, './files/products/0207202110035783.jpg'),
(201, 8, './files/products/0207202110035782.jpg'),
(200, 8, './files/products/0207202110035781.jpg'),
(199, 8, './files/products/0207202110035780.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id`, `kategori`) VALUES
(1, 'Group/Personal Photo'),
(2, 'Prewedding Packages'),
(3, 'Wedding Packages'),
(4, 'Family Photo'),
(5, 'BirthDay Party'),
(6, 'Aqiqah Packages'),
(7, 'Engagement');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `konten` text NOT NULL,
  `gambar` text DEFAULT NULL,
  `kategori` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `judul`, `konten`, `gambar`, `kategori`) VALUES
(2, '<h3>PATUHI PROTOKOL KESEHATAN</h3>', '<p>Bagi pelanggan TPM Photography yang datang langsung ke studio, diharapkan mematuhi protokol kesehatan:</p>\r\n\r\n<ul>\r\n <li>Cuci tangan atau gunakan handsanitizer sebelum memasuki studio.</li>\r\n <li>Staff kami akan mengukur suhu tubuh Anda.</li>\r\n <li>Gunakan masker.</li>\r\n <li>Jaga jarak minimal 1 meter.</li>\r\n</ul>', './files/misc/16121648672.jpg', 'Protokol Kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` varchar(50) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `rekening` varchar(50) NOT NULL,
  `nilai transfer` float NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id` int(11) NOT NULL,
  `ip` varchar(25) NOT NULL,
  `useragent` text DEFAULT NULL,
  `tahun` int(4) NOT NULL,
  `bulan` int(2) NOT NULL,
  `timestamps` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id`, `ip`, `useragent`, `tahun`, `bulan`, `timestamps`) VALUES
(1, '127.0.0.1', 'Windows 7, Chrome 87.0.4280.141', 2021, 2, 1612155325),
(2, '127.0.0.1', 'Windows 7, Chrome 87.0.4280.141', 2021, 2, 1612164894),
(3, '127.0.0.1', 'Windows 7, Chrome 87.0.4280.141', 2021, 2, 1612189542),
(4, '127.0.0.1', 'Windows 7, Chrome 87.0.4280.141', 2021, 2, 1612232148),
(5, '127.0.0.1', 'Windows 7, Chrome 88.0.4324.182', 2021, 2, 1614182428),
(6, '::1', 'Windows 10, Chrome 91.0.4472.106', 2021, 6, 1624080630),
(7, '::1', 'Windows 10, Chrome 91.0.4472.106', 2021, 6, 1624115419),
(8, '::1', 'Windows 10, Chrome 91.0.4472.106', 2021, 6, 1624120907),
(9, '::1', 'Windows 10, Chrome 91.0.4472.106', 2021, 6, 1624121179),
(10, '::1', 'Windows 10, Chrome 91.0.4472.106', 2021, 6, 1624121335),
(11, '::1', 'Windows 10, Chrome 91.0.4472.106', 2021, 6, 1624179144),
(12, '::1', 'Windows 10, Chrome 91.0.4472.106', 2021, 6, 1624179246),
(13, '::1', 'Windows 10, Chrome 91.0.4472.106', 2021, 6, 1624179661),
(14, '::1', 'Windows 10, Chrome 91.0.4472.106', 2021, 6, 1624278813),
(15, '::1', 'Windows 10, Chrome 91.0.4472.106', 2021, 6, 1624278896),
(16, '::1', 'Windows 10, Chrome 91.0.4472.106', 2021, 6, 1624308294),
(17, '::1', 'Windows 10, Chrome 91.0.4472.106', 2021, 6, 1624309536),
(18, '::1', 'Windows 10, Chrome 91.0.4472.106', 2021, 6, 1624309563),
(19, '::1', 'Windows 10, Chrome 91.0.4472.106', 2021, 6, 1624310426),
(20, '::1', 'Windows 10, Chrome 91.0.4472.106', 2021, 6, 1624310452),
(21, '::1', 'Windows 10, Chrome 91.0.4472.106', 2021, 6, 1624311161),
(22, '::1', 'Windows 10, Chrome 91.0.4472.106', 2021, 6, 1624311185),
(23, '::1', 'Windows 10, Chrome 91.0.4472.106', 2021, 6, 1624311515),
(24, '::1', 'Windows 10, Chrome 91.0.4472.106', 2021, 6, 1624311559),
(25, '::1', 'Windows 7, Chrome 91.0.4472.114', 2021, 6, 1624436200),
(26, '::1', 'Windows 7, Chrome 91.0.4472.114', 2021, 6, 1624522672),
(27, '::1', 'Windows 7, Chrome 91.0.4472.114', 2021, 6, 1624529361),
(28, '::1', 'Windows 7, Chrome 91.0.4472.114', 2021, 6, 1624534796),
(29, '::1', 'Windows 7, Chrome 91.0.4472.114', 2021, 6, 1624590306),
(30, '::1', 'Windows 7, Chrome 91.0.4472.114', 2021, 6, 1624593589),
(31, '::1', 'Windows 7, Chrome 91.0.4472.114', 2021, 6, 1624804088),
(32, '::1', 'Windows 7, Chrome 91.0.4472.114', 2021, 6, 1624804351),
(33, '::1', 'Windows 7, Chrome 91.0.4472.114', 2021, 6, 1624804423),
(34, '::1', 'Windows 7, Chrome 91.0.4472.114', 2021, 6, 1624864720),
(35, '::1', 'Windows 7, Chrome 91.0.4472.114', 2021, 6, 1624865646),
(36, '::1', 'Windows 7, Chrome 91.0.4472.114', 2021, 6, 1624869043),
(37, '::1', 'Windows 7, Firefox 32.0', 2021, 6, 1624869173),
(38, '::1', 'Windows 7, Chrome 91.0.4472.114', 2021, 6, 1624891350),
(39, '::1', 'Windows 7, Chrome 91.0.4472.114', 2021, 6, 1624959769),
(40, '::1', 'Windows 7, Chrome 91.0.4472.114', 2021, 6, 1624960268),
(41, '::1', 'Windows 7, Chrome 91.0.4472.114', 2021, 6, 1624965725),
(42, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 6, 1625009490),
(43, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 6, 1625014342),
(44, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 6, 1625014375),
(45, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 6, 1625017189),
(46, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 6, 1625057983),
(47, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 6, 1625058060),
(48, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 6, 1625058752),
(49, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 6, 1625059303),
(50, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 6, 1625063937),
(51, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625107429),
(52, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625107727),
(53, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625208986),
(54, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625209145),
(55, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625209853),
(56, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625210810),
(57, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625211162),
(58, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625216999),
(59, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625474860),
(60, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625475121),
(61, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625627872),
(62, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625628224),
(63, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625628296),
(64, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625628338),
(65, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625628370),
(66, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625730723),
(67, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625730752),
(68, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625730842),
(69, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625732166);

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `namafield` varchar(150) NOT NULL,
  `nilai` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`namafield`, `nilai`) VALUES
('judul_teks_depan', '<h2>Puluhan ragam paket Tersedia</h2>\r\n'),
('isi_teks_depan', '<p>We specialize photo in Prewedding, Family, Graduation, Photobooth, Children, Baby Newborn, Maternity, and Schools of Photography.</p>\r\n'),
('facebook', ''),
('alamat_perusahaan', 'Jalan Barau1, Kel. Pakuan baru, Kec. Jambi selatan, Kota Jambi'),
('tentang', '<p>TPM Photograpy merupakan studio foto di Kota Jambi dengan kapasitas hingga 20 orang, sangat cocok untuk foto Grup, Keluarga, Graduation, dll.</p>\r\n\r\n<p>memiliki lebih dari 10 Spot Foto tematik yang siap memanjakan foto anda. So, tunggu apa lagi buruan booking sebelum keduluan dengan orang lain.</p>\r\n'),
('telepon', '+62897 2415 499'),
('whatsapp1', '+62897 2415 499'),
('whatsapp2', '+62897 2415 499'),
('twitter', ''),
('instagram', 'tpmphotogfhy');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `harga` float NOT NULL,
  `jumlah_orang` int(4) NOT NULL DEFAULT 1,
  `deskripsi` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `judul`, `kategori`, `harga`, `jumlah_orang`, `deskripsi`) VALUES
(1, 'Photo Personal InDoor', 'Group/Personal Photo', 100000, 1, '<ul>\r\n <li>15 Photo Tanpa Cetak</li>\r\n <li>5 Photo Editing</li>\r\n <li>15 File Photo Dimasukan ke Dalam FlashDisk</li>\r\n <li>15 Pose (gaya)</li>\r\n</ul>'),
(2, 'Photo Keluarga', 'Family Photo', 500000, 4, '<p><strong>BASIC  FAMILY</strong></p>\r\n\r\n<ul>\r\n <li>15 Photo Tanpa Cetak</li>\r\n <li>5 Photo Editing</li>\r\n <li>15 File Photo Dimasukan ke Dalam FlashDisk</li>\r\n <li>15 Pose (gaya)</li>\r\n <li>1 Photo Edit & Cetak 20x30 (tanpa frame)</li>\r\n</ul>\r\n\r\n<p>*Note : Jika menggunakan Frame = Tambah Biaya .</p>\r\n\r\n<p>Mengabadikan momen bersama orang – orang yang kita cintai seperti foto keluarga dengan latar background studio yang menarik kini tengah menjadi tren. Baik untuk foto family, foto wisuda, foto group, maupun foto maternity. Foto studio yang baik tidak hanya karena backgroundnya studionya saja yang menarik atau karena hasil jepretan si fotografer yang bagus namun kostum atau wardrobe yang digunakan juga sangat berpengaruh pada hasil foto keluarga yang di hasilkan.</p>'),
(3, 'Paket Wedding Murah', 'Wedding Packages', 2000000, 0, '<ul>\r\n <li>Photo 2 Roll (1 Roll = 36 Photo)</li>\r\n <li>Video 1 Disc (1 Disc = 1 Jam)</li>\r\n</ul>\r\n\r\n<p> *Note : Jika jumlah Roll sudah habis, Client bisa menambah Roll pada saat acara berlangsung dan melakukan pelunasan pada akhir acara selesai (1 Roll = 250.000) </p>'),
(4, 'Paket Wedding Hemat', 'Wedding Packages', 2500000, 0, '<ul>\r\n <li>Photo Unlimited</li>\r\n <li>Video 2 Disc (1 Disc = 1 Jam)</li>\r\n <li>Cinematic (5 Menit)</li>\r\n</ul>\r\n\r\n<p> *Note : Photo yang dicetak hanya 3 Roll yang akan di pilih oleh Client, sisa Foto akan dimasukkan kedalam FlashDisk </p>'),
(5, 'Paket Wedding Kekinian', 'Wedding Packages', 4000000, 0, '<ul>\r\n <li>Photo Unlimited</li>\r\n <li>Video 2 Disc (1 Disc = 1 Jam)</li>\r\n <li>Cinematic (5 Menit)</li>\r\n <li>Free Photo 24R</li>\r\n</ul>\r\n\r\n<p> *Note : Photo yang dicetak hanya 3 Roll yang akan di pilih oleh Client, sisa Foto akan dimasukkan kedalam FlashDisk </p>'),
(6, 'Aqiqah', 'Aqiqah Packages', 1500000, 0, '<ul>\r\n <li>Photo 2 Roll (1 Roll = 36 Photo)</li>\r\n <li>10 Photo Editing</li>\r\n <li>36 File Photo Dimasukan ke Dalam FlashDisk</li>\r\n <li>Free Photo 24R</li>\r\n</ul>'),
(7, 'BirthDay Party', 'BirthDay Party', 2000000, 0, '<ul>\r\n <li>Photo Unlimited</li>\r\n <li>15 Photo Editing</li>\r\n <li>Semua File Photo Dimasukan ke Dalam FlashDisk</li>\r\n <li>Free Photo 10R Sebanyak 5 Frame</li>\r\n</ul>\r\n\r\n<p> </p>\r\n\r\n<p> </p>'),
(8, 'Pre-Wedding', 'Prewedding Packages', 700000, 0, '<ul>\r\n <li>Photo 2 Roll (1 Roll = 36 Photo)</li>\r\n <li>15 File Photo Editing</li>\r\n <li>72 File Photo Dimasukan ke Dalam FlashDisk</li>\r\n</ul>'),
(9, 'Paket Wedding Lengkap', 'Wedding Packages', 6000000, 0, '<ul>\r\n <li>Pre-Wedding and Wedding</li>\r\n <li>Photo 3 Roll (1 Roll = 36 Photo)</li>\r\n <li>Video 2 Disc ( 1 Disc = 1 Jam)</li>\r\n <li>Cinematic (5 Menit)</li>\r\n <li>Free Photo 24R</li>\r\n <li>Video Live</li>\r\n</ul>\r\n\r\n<p> *Note : Jika jumlah Roll sudah habis, Client bisa menambah Roll pada saat acara berlangsung dan melakukan pelunasan pada akhir acara selesai (1 Roll = 250.000) </p>'),
(10, 'Photo Group Indoor', 'Group/Personal Photo', 350000, 1, '<ul>\r\n <li>Maksimal 10 Orang</li>\r\n <li>20 Photo Tanpa Cetak</li>\r\n <li>5  Photo Editing </li>\r\n <li>20 File Photo Dimasukan ke Dalam Flashdisk</li>\r\n <li>2 BackGround Photo</li>\r\n <li>Maksimal 2 Pakaian</li>\r\n</ul>'),
(11, 'Photo Group OutDoor', 'Group/Personal Photo', 300000, 1, '<ul>\r\n <li>Maksimal 10 Orang</li>\r\n <li>20 Photo Tanpa Cetak</li>\r\n <li>5  Photo Editing </li>\r\n <li>20 File Photo Dimasukan ke Dalam Flashdisk</li>\r\n <li>Maksimal 2 Pakaian</li>\r\n</ul>'),
(12, 'Photo Personal OutDoor', 'Group/Personal Photo', 100000, 1, '<ul>\r\n <li>15 Photo Tanpa Cetak</li>\r\n <li>5 Photo Editing</li>\r\n <li>15 File Photo Dimasukan ke Dalam FlashDisk</li>\r\n <li>15 Pose (gaya)</li>\r\n</ul>'),
(13, 'Engagement', 'Engagement', 1000000, 1, '<ul>\r\n <li>Photo 2 Roll (1 Roll = 36 Photo)</li>\r\n <li>Video 1 Disc (1 Disc = 1 Jam)</li>\r\n</ul>\r\n\r\n<p> *Note : Jika jumlah Roll sudah habis, Client bisa menambah Roll pada saat acara berlangsung dan melakukan pelunasan pada akhir acara selesai (1 Roll = 250.000)</p>');

-- --------------------------------------------------------

--
-- Stand-in structure for view `produk_view`
-- (See below for the actual view)
--
CREATE TABLE `produk_view` (
`id` int(11)
,`judul` varchar(150)
,`kategori` varchar(100)
,`harga` float
,`jumlah_orang` int(4)
,`deskripsi` text
,`gambar` text
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempatlahir` varchar(25) NOT NULL,
  `tanggallahir` varchar(15) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `hp` varchar(25) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `level` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `tempatlahir`, `tanggallahir`, `jenis_kelamin`, `hp`, `alamat`, `level`) VALUES
('999999999999999', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', '01-01-1997', 'Pria', NULL, NULL, 'admin'),
('1234567890', 'user1', '202cb962ac59075b964b07152d234b70', 'user1', 'Jambi', '05-06-2021', 'Pria', '909090090090', 'aaaaa', 'user'),
('1234567891', 'user2', '202cb962ac59075b964b07152d234b70', 'user2', 'Jambi', '17-06-2021', 'Pria', '909090090090', 'asd', 'user'),
('12345678901234', 'mega', '202cb962ac59075b964b07152d234b70', 'mega', 'mexico', '21-06-1994', 'Wanita', '0852123456', 'jambi', 'user'),
('3451345678', 'novri', '202cb962ac59075b964b07152d234b70', 'novri', 'jambi', '15-06-1993', 'Pria', '08523456431', 'jambi', 'user');

-- --------------------------------------------------------

--
-- Structure for view `produk_view`
--
DROP TABLE IF EXISTS `produk_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `produk_view`  AS  (select `produk`.`id` AS `id`,`produk`.`judul` AS `judul`,`produk`.`kategori` AS `kategori`,`produk`.`harga` AS `harga`,`produk`.`jumlah_orang` AS `jumlah_orang`,`produk`.`deskripsi` AS `deskripsi`,`gambar_produk`.`gambar` AS `gambar` from (`produk` left join `gambar_produk` on(`produk`.`id` = `gambar_produk`.`id_produk`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gambar_produk`
--
ALTER TABLE `gambar_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategori` (`kategori`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`namafield`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `gambar_produk`
--
ALTER TABLE `gambar_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
