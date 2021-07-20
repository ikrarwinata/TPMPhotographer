-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2021 pada 15.10
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `jumlah_peserta` int(4) NOT NULL DEFAULT 1,
  `uang_muka` int(11) NOT NULL DEFAULT 0,
  `bukti_pembayaran` text DEFAULT NULL,
  `status` enum('Sedang diproses','Diterima') NOT NULL DEFAULT 'Sedang diproses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id`, `id_produk`, `username`, `tanggal`, `jumlah_peserta`, `uang_muka`, `bukti_pembayaran`, `status`) VALUES
(1624310445, 1, 'user1', 1624415445, 1, 20000, 'files/pembayaran/bb_1626786288.png', 'Diterima'),
(1624311181, 2, 'user2', 1624329121, 4, 0, NULL, 'Sedang diproses'),
(1625742543, 13, 'novri', 1626019683, 1, 0, NULL, 'Diterima'),
(1626027615, 9, 'user2', 1628205555, 1, 6000000, NULL, 'Sedang diproses'),
(1626028840, 9, 'user2', 1628206840, 1, 0, NULL, 'Diterima'),
(1626131856, 8, 'user2', 1627273056, 1, 0, NULL, 'Diterima'),
(1626149406, 13, 'mega', 1627549806, 1, 0, NULL, 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `timestamps` varchar(25) NOT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `judul`, `timestamps`, `gambar`) VALUES
(4, 'Photo Keluarga', '1626307453', './files/gallery/16263074534.jpg'),
(5, 'Photo Personal InDoor', '1626307585', './files/gallery/16263074265.jpg'),
(6, 'Paket Wedding Hemat', '1626307349', './files/gallery/16263073496.jpg'),
(7, 'Paket Wedding Murah', '1626307274', './files/gallery/16263072747.jpg'),
(8, 'Paket Wedding Kekinian', '1626307253', './files/gallery/16263072538.jpg'),
(9, 'Paket Wedding Lengkap', '1626307236', './files/gallery/16263072369.jpg'),
(10, 'Aqiqah', '1626307216', './files/gallery/162630721610.jpg'),
(11, 'BirthDay Party', '1626307197', './files/gallery/162630719711.jpg'),
(12, 'Photo Group Indoor', '1626307181', './files/gallery/162630718112.jpg'),
(13, 'Photo Group OutDoor', '1626235951', './files/gallery/162623595113.jpg'),
(14, 'Engagement', '1626235749', './files/gallery/162623574914.jpg'),
(15, 'Photo Personal OutDoor', '1626236204', './files/gallery/162623620415.jpg'),
(16, 'Pre-Wedding', '1626235718', './files/gallery/162623571816.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_produk`
--

CREATE TABLE `gambar_produk` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gambar_produk`
--

INSERT INTO `gambar_produk` (`id`, `id_produk`, `gambar`) VALUES
(482, 1, './files/products/1507202101543714.jpg'),
(472, 2, './files/products/1507202101521225.jpg'),
(471, 2, './files/products/1507202101521224.jpg'),
(481, 1, './files/products/1507202101543713.jpg'),
(470, 2, './files/products/1507202101521223.jpg'),
(480, 1, './files/products/1507202101543712.jpg'),
(304, 13, './files/products/14072021060728135.jpg'),
(303, 13, './files/products/14072021060728134.jpg'),
(302, 13, './files/products/14072021060728133.jpg'),
(301, 13, './files/products/14072021060728132.jpg'),
(300, 13, './files/products/14072021060728131.jpg'),
(350, 12, './files/products/140720210616021212.jpg'),
(349, 12, './files/products/140720210616021211.jpg'),
(348, 12, './files/products/140720210616021210.jpg'),
(347, 12, './files/products/14072021061602129.jpg'),
(346, 12, './files/products/14072021061602128.jpg'),
(345, 12, './files/products/14072021061602127.jpg'),
(344, 12, './files/products/14072021061602126.jpg'),
(343, 12, './files/products/14072021061602125.jpg'),
(342, 12, './files/products/14072021061602124.jpg'),
(341, 12, './files/products/14072021061602123.jpg'),
(340, 12, './files/products/14072021061602122.jpg'),
(339, 12, './files/products/14072021061602121.jpg'),
(324, 11, './files/products/14072021061334119.jpg'),
(323, 11, './files/products/14072021061334118.jpg'),
(322, 11, './files/products/14072021061334117.jpg'),
(321, 11, './files/products/14072021061334116.jpg'),
(320, 11, './files/products/14072021061334115.jpg'),
(319, 11, './files/products/14072021061334114.jpg'),
(318, 11, './files/products/14072021061334113.jpg'),
(317, 11, './files/products/14072021061334112.jpg'),
(316, 11, './files/products/14072021061334111.jpg'),
(364, 10, './files/products/15072021013208106.jpg'),
(363, 10, './files/products/15072021013208105.jpg'),
(362, 10, './files/products/15072021013208104.jpg'),
(361, 10, './files/products/15072021013208103.jpg'),
(360, 10, './files/products/15072021013208102.jpg'),
(359, 10, './files/products/15072021013208101.jpg'),
(291, 9, './files/products/1407202106002199.jpg'),
(290, 9, './files/products/1407202106002198.jpg'),
(289, 9, './files/products/1407202106002197.jpg'),
(288, 9, './files/products/1407202106002196.jpg'),
(287, 9, './files/products/1407202106002195.jpg'),
(286, 9, './files/products/1407202106002194.jpg'),
(285, 9, './files/products/1407202106002193.jpg'),
(284, 9, './files/products/1407202106002192.jpg'),
(283, 9, './files/products/1407202106002191.jpg'),
(386, 7, './files/products/15072021013522710.jpg'),
(385, 7, './files/products/1507202101352279.jpg'),
(384, 7, './files/products/1507202101352278.jpg'),
(383, 7, './files/products/1507202101352277.jpg'),
(382, 7, './files/products/1507202101352276.jpg'),
(381, 7, './files/products/1507202101352275.jpg'),
(380, 7, './files/products/1507202101352274.jpg'),
(379, 7, './files/products/1507202101352273.jpg'),
(378, 7, './files/products/1507202101352272.jpg'),
(377, 7, './files/products/1507202101352271.jpg'),
(406, 6, './files/products/1507202101383369.jpg'),
(405, 6, './files/products/1507202101383368.jpg'),
(404, 6, './files/products/1507202101383367.jpg'),
(403, 6, './files/products/1507202101383366.jpg'),
(402, 6, './files/products/1507202101383365.jpg'),
(401, 6, './files/products/1507202101383364.jpg'),
(400, 6, './files/products/1507202101383363.jpg'),
(399, 6, './files/products/1507202101383362.jpg'),
(398, 6, './files/products/1507202101383361.jpg'),
(426, 5, './files/products/1507202101413159.jpg'),
(425, 5, './files/products/1507202101413158.jpg'),
(424, 5, './files/products/1507202101413157.jpg'),
(423, 5, './files/products/1507202101413156.jpg'),
(422, 5, './files/products/1507202101413155.jpg'),
(421, 5, './files/products/1507202101413154.jpg'),
(420, 5, './files/products/1507202101413153.jpg'),
(419, 5, './files/products/1507202101413152.jpg'),
(418, 5, './files/products/1507202101413151.jpg'),
(442, 4, './files/products/1507202101440847.jpg'),
(441, 4, './files/products/1507202101440846.jpg'),
(440, 4, './files/products/1507202101440845.jpg'),
(439, 4, './files/products/1507202101440844.jpg'),
(438, 4, './files/products/1507202101440843.jpg'),
(437, 4, './files/products/1507202101440842.jpg'),
(436, 4, './files/products/1507202101440841.jpg'),
(460, 3, './files/products/1507202101494238.jpg'),
(459, 3, './files/products/1507202101494237.jpg'),
(458, 3, './files/products/1507202101494236.jpg'),
(457, 3, './files/products/1507202101494235.jpg'),
(456, 3, './files/products/1507202101494234.jpg'),
(455, 3, './files/products/1507202101494233.jpg'),
(454, 3, './files/products/1507202101494232.jpg'),
(453, 3, './files/products/1507202101494231.jpg'),
(469, 2, './files/products/1507202101521222.jpg'),
(468, 2, './files/products/1507202101521221.jpg'),
(479, 1, './files/products/1507202101543711.jpg'),
(298, 8, './files/products/1407202106051286.jpg'),
(297, 8, './files/products/1407202106051285.jpg'),
(296, 8, './files/products/1407202106051284.jpg'),
(295, 8, './files/products/1407202106051283.jpg'),
(294, 8, './files/products/1407202106051282.jpg'),
(293, 8, './files/products/1407202106051281.jpg'),
(299, 13, './files/products/14072021060728130.jpg'),
(292, 8, './files/products/1407202106051280.jpg'),
(282, 9, './files/products/1407202106002190.jpg'),
(315, 11, './files/products/14072021061334110.jpg'),
(338, 12, './files/products/14072021061602120.jpg'),
(358, 10, './files/products/15072021013208100.jpg'),
(376, 7, './files/products/1507202101352270.jpg'),
(397, 6, './files/products/1507202101383360.jpg'),
(417, 5, './files/products/1507202101413150.jpg'),
(435, 4, './files/products/1507202101440840.jpg'),
(452, 3, './files/products/1507202101494230.jpg'),
(467, 2, './files/products/1507202101521220.jpg'),
(478, 1, './files/products/1507202101543710.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_produk`
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
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `konten` text NOT NULL,
  `gambar` text DEFAULT NULL,
  `kategori` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `judul`, `konten`, `gambar`, `kategori`) VALUES
(2, '<h3>PATUHI PROTOKOL KESEHATAN</h3>', '<p>Bagi pelanggan TPM Photography yang datang langsung ke studio, diharapkan mematuhi protokol kesehatan:</p>\r\n\r\n<ul>\r\n <li>Cuci tangan atau gunakan handsanitizer sebelum memasuki studio.</li>\r\n <li>Staff kami akan mengukur suhu tubuh Anda.</li>\r\n <li>Gunakan masker.</li>\r\n <li>Jaga jarak minimal 1 meter.</li>\r\n</ul>', './files/misc/16121648672.jpg', 'Protokol Kesehatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
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
-- Dumping data untuk tabel `pengunjung`
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
(69, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625732166),
(70, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625734340),
(71, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625734340),
(72, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625741152),
(73, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625741390),
(74, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625742218),
(75, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625789010),
(76, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625789011),
(77, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625791684),
(78, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625791684),
(79, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625791866),
(80, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625794031),
(81, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625800101),
(82, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625800208),
(83, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625814369),
(84, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625814369),
(85, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625815403),
(86, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1625815461),
(87, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626015832),
(88, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626015833),
(89, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626016770),
(90, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626017800),
(91, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626017800),
(92, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626024054),
(93, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626029459),
(94, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626131651),
(95, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626131868),
(96, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626136889),
(97, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626136896),
(98, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626149322),
(99, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626149324),
(100, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626149333),
(101, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626149667),
(102, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626149674),
(103, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626187340),
(104, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626187341),
(105, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626232946),
(106, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626232947),
(107, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626232956),
(108, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626234453),
(109, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626234476),
(110, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626234476),
(111, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626234946),
(112, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626305428),
(113, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626305456),
(114, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626307720),
(115, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626307726),
(116, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626492446),
(117, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626492446),
(118, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626493172),
(119, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626493850),
(120, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626493850),
(121, '::1', 'Windows 7, Chrome 91.0.4472.124', 2021, 7, 1626495178),
(122, '::1', 'Windows 10, Chrome 91.0.4472.124', 2021, 7, 1626766842),
(123, '::1', 'Windows 10, Chrome 91.0.4472.124', 2021, 7, 1626783108),
(124, '::1', 'Windows 10, Chrome 91.0.4472.124', 2021, 7, 1626786298),
(125, '::1', 'Windows 10, Chrome 91.0.4472.124', 2021, 7, 1626786612);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `namafield` varchar(150) NOT NULL,
  `nilai` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perusahaan`
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
-- Struktur dari tabel `produk`
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
-- Dumping data untuk tabel `produk`
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
-- Stand-in struktur untuk tampilan `produk_view`
-- (Lihat di bawah untuk tampilan aktual)
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
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `tempatlahir`, `tanggallahir`, `jenis_kelamin`, `hp`, `alamat`, `level`) VALUES
('999999999999999', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', '01-01-1997', 'Pria', NULL, NULL, 'admin'),
('1234567890', 'user1', '202cb962ac59075b964b07152d234b70', 'user1', 'Jambi', '05-06-2021', 'Pria', '909090090090', 'aaaaa', 'user'),
('1234567891', 'user2', '202cb962ac59075b964b07152d234b70', 'user2', 'Jambi', '17-06-2021', 'Pria', '909090090090', 'asd', 'user'),
('12345678901234', 'mega', '202cb962ac59075b964b07152d234b70', 'mega', 'mexico', '21-06-1994', 'Wanita', '0852123456', 'jambi', 'user'),
('3451345678', 'novri', '202cb962ac59075b964b07152d234b70', 'novri', 'jambi', '15-06-1993', 'Pria', '08523456431', 'jambi', 'user');

-- --------------------------------------------------------

--
-- Struktur untuk view `produk_view`
--
DROP TABLE IF EXISTS `produk_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `produk_view`  AS   (select `produk`.`id` AS `id`,`produk`.`judul` AS `judul`,`produk`.`kategori` AS `kategori`,`produk`.`harga` AS `harga`,`produk`.`jumlah_orang` AS `jumlah_orang`,`produk`.`deskripsi` AS `deskripsi`,`gambar_produk`.`gambar` AS `gambar` from (`produk` left join `gambar_produk` on(`produk`.`id` = `gambar_produk`.`id_produk`)))  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gambar_produk`
--
ALTER TABLE `gambar_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategori` (`kategori`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`namafield`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `gambar_produk`
--
ALTER TABLE `gambar_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=483;

--
-- AUTO_INCREMENT untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
