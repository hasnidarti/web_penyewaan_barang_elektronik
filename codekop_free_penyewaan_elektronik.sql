-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Apr 2024 pada 18.49
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codekop_free_penyewaan_elektronik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

DROP TABLE IF EXISTS `booking`;

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `kode_booking` varchar(255) NOT NULL,
  `id_login` int(11) NOT NULL,
  `id_elektronik` int(11) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `konfirmasi_pembayaran` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id_booking`, `kode_booking`, `id_login`, `id_elektronik`, `ktp`, `nama`, `alamat`, `no_tlp`, `tanggal`, `lama_sewa`, `total_harga`, `konfirmasi_pembayaran`, `tgl_input`, `user_id`) VALUES
(6, '1713881788', 5, 6, '2199249283424563', 'Faujiah Decika', 'Jalan Teratai, Peruamhan Bumi Indah Blok F No.9, Batu 10', '083110060196', '2024-05-22', 2, 200000, 'Pembayaran di terima', '2024-04-23', NULL),
(7, '1713883167', 6, 9, '19281827491012', 'Amanda Dwi Mulyani', 'Jalan Kemuning, Perumahan Sri Aryani Blok K No.17, Kota Kijang', '089623092335', '2024-05-26', 2, 300000, 'Pembayaran di terima', '2024-04-23', NULL),
(8, '1713883411', 7, 9, '219292489277234', 'Khairunnisa Munawarrah', 'Jalan Ganet, Perumahan Ganet Blok J No.53, Batu 11', '081387779401', '2024-05-05', 3, 450000, 'Pembayaran di terima', '2024-04-23', NULL),
(9, '1713883594', 8, 10, '211928129182031', 'Vinandra Adam Saputra', 'Jalan Lama, Perumahan Pattimurra  Blok D No.14, Kota Kijang', '085363619829', '2024-04-30', 2, 300000, 'Pembayaran di terima', '2024-04-23', NULL),
(14, '1713890806', 9, 22, '2199249283424563', 'Ariska Dwi Ambarwati', 'Jalan Al-Baik, Perumahan Dadar Beredar Blok A No.9, Batu 8', '083184957178', '2024-06-04', 4, 600000, 'Pembayaran di terima', '2024-04-23', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `infoweb`
--

CREATE TABLE `infoweb` (
  `id` int(11) NOT NULL,
  `nama_sewa` varchar(255) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_rek` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `infoweb`
--

INSERT INTO `infoweb` (`id`, `nama_sewa`, `telp`, `alamat`, `email`, `no_rek`, `updated_at`) VALUES
(1, 'ElectraFlex.com', '081298669897', 'Jalan Politeknik, Senggarang, Kilometer 24, Kota Tanjungpinang, Provinsi Kepulauan Riau', 'electraflex46@gmail.com', 'BRI A/N Hanisa 123123213123', '2022-01-24 04:57:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_login`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'Admin', 'admin', 'fe01ce2a7fbac8fafaed7c982a04e229', 'admin'),
(5, 'Faujiah Decika', 'cika', '9e4ff7e88c62b1591ec2c536ad818c1f', 'pengguna'),
(6, 'Amanda Dwi Mulyani', 'amanda', '6209804952225ab3d14348307b5a4a27', 'pengguna'),
(7, 'Khairunnisa Munawarrah', 'nisa', '5fad30428811fe378fd389cd7659a33c', 'pengguna'),
(8, 'Vinandra Adam Saputra', 'apin', '939bfe7148d7170617383d742c882eec', 'pengguna'),
(9, 'Ariska Dwi Ambarwati', 'ariska', '37c923621d7655456942c1f8b613e6c6', 'pengguna');

-- --------------------------------------------------------

--
-- Struktur dari tabel `elektronik`
--

CREATE TABLE `elektronik` (
  `id_elektronik` int(11) NOT NULL,
  `no_plat` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `elektronik`
--

INSERT INTO `elektronik` (`id_elektronik`, `no_plat`, `merk`, `harga`, `deskripsi`, `status`, `gambar`) VALUES
(6, 'N34231FR12S', 'ASUS S400C', 100000, 'Prosesor Intel Core i3-3217U 1.8ghz RAM 4 GB DDR3 Graphics Intel HD Graphics, Storage SSD 256GB, Size14inch Touchscreen, Windows 10 64bit, Metal Body, Warna Silver, Performa Unit Normal, LCD Bersih white spot', 'Tersedia', '1719145987.JPG'),
(7, 'A19200H129', 'Huawei Matebook D16', 150000, 'Screen-to-body Ratio · 90% ; Resolution · 1920 x 1200 pixels ; OS · Windows 11 Home 64 Bit ; Camera: 720 AI Camera', 'Tersedia', '1719051657.JPG'),
(8, '11A128109HJ', 'Iphone 11', 120000, 'Layar Liquid Retina HD LCD 6,1 inci(1), Tahan air dan debu (2 meter hingga selama 30 menit, IP68)(1)   • Sistem kamera ganda dengan kamera Ultra Wide dan Wide 12 MP; mode Malam, mode Potret, dan video 4K hingga 60 fps   • Kamera depan TrueDepth 12 MP deng', 'Tersedia', '1719052189.JPG'),
(9, 'HJ9029IA10I', 'MSI Modern 14', 150000, '- Processor : Intel Core i5 Speed 2.5 GHz (turbo boost up to 3.1 GHz) - Memory : 4GB/8GB/16GB DDR3 - Display : 13.3 Inchi LED 1280 x 800 - Graphic : Intel HD Graphics 4000 - Storage : HDD 500GB/SSD128/SSD256 - Port : 2 x USB 3.0 , LAN, SDXC Card lot, Audi', 'Tersedia', '1719146343.JPG'),
(10, 'JK212AI81928', 'Macbook Pro 2012', 150000, 'Spesifikasi - Processor : Quard-Core i7 Speed 2.3 GHz (Turbo Boost up to 3.3 GHz) - Display : 15.4” inch LED-backlit 2880 by 1800 - Dual VGA : Intel HD Graphics 4000 + NVIDIA GeForce GT 650M with 1GB - Memory : 8GB DDR3 - Storage : SSD 128GB - Port : 2x U', 'Tersedia', '1719146580.JPG'),
(11, 'O1298AJ021D', 'Iphone 7 Plus', 50000, 'Merek: Apple Kapasitas Penyimpanan: 128GB Ukuran Layar: 5.5inches Resolusi Kamera Utama: 12MP Masa Garansi: 1 Bulan Jumlah Slot Kartu SIM: 1 Jumlah Kamera Utama: 2 Tipe Handphone: Smartphone Jaringan: LTE Sistem Operasi yang Didukung: iOS Tipe SIM: Nano R', 'Tersedia', '1719147015.JPG'),
(12, 'KU1802GA2810', 'Iphone 12', 180000, 'Merek: iPhone Apple Kapasitas Penyimpanan: 128GB Resolusi Kamera Utama: 12MP RAM: 4GB Jumlah Slot Kartu SIM: 1 Jumlah Kamera Utama: 2 Fitur Handphone: GPS, NFC, Wi-Fi Tipe Handphone: Smartphone Sistem Operasi yang Didukung: iOS Tipe Kabel Seluler: Type C ', 'Tersedia', '1719147274.JPG'),
(13, 'O219IEH13H12', 'Realme 3 Pro', 70000, 'Layar Penuh Dewdrop Ukuran: 16cm(6.3 inci) Rasio Layar: 90.8% Rasio Aspek: 19.5 : 9 Resolusi: FHD+ 2340 x 1080 piksel Proteksi: Gorilla Glass 5 Night display: Color temperature adjustment  Baterai 4045mAh Mendukung Pengisian Daya 5V4A ', 'Tersedia', '1719147515.JPG'),
(14, 'Y192BG2101KL', 'Xiaomi Pocopohone F1', 70000, ' Pocophone F1 tAm (BEKAS) • Dual Sim / 2 SIM • RAM 6 GB • ROM 64 GB • Snapdragon 845 • Batt 4000 mAh • ex Garansi Resmi Indonesia  ??????? ???? : • Fisik 9.9 / 10 • Second terawat dan mulus • LCD Normal , No Shadow, No Dead Pixel • Software - Hardware ber', 'Tersedia', '1719147946.JPG'),
(15, 'I219JA2354OD', 'Camera Sony A6000', 200000, '24.3MP APS-C Exmor APS HD CMOS Sensor BIONZ X Image Processor Tru-Finder 0.39\" 1,440k-Dot OLED EVF 3.0\" 921k-Dot Xtra Fine Tilting LCD Full HD 1080p XAVC S Video at 24/60 fps Built-In Wi-Fi Connectivity with NFC Fast Hybrid AF & 179 Phase-Detect Points Up', 'Tersedia', '1719148210.JPG'),
(16, 'U207H438SIF', 'Mouse Logitech M235', 20000, 'Teknologi sensor Penelusuran optik yang mulus DPI (Min./Maks.): 1000 Tombol Jumlah tombol: 3 (Klik Kiri/Kanan, Klik Tengah) Scrolling Pengguliran baris demi baris Scroll Wheel: Ya Baterai Baterai: 12 bulan Informasi Baterai: 1 X AA (disertakan) Konektivit', 'Tersedia', '1719148479.JPG'),
(17, 'I21JG734634KU', 'Mouse Ultrathin Wireless', 20000, 'Bluetooth Wireless Mouse Menggunakan 2 jenis cara untuk penggunaan mulai darikoneksi bluetooth 5.0 dengan jarak hingga 10 m. Baterai Isi Ulang Hadir dengan baterai berkapasitas 500 mAh. Kompatibel dengan berbagai OS terbaru seperti Windows 8/10 dan juga M', 'Tersedia', '1719148650.JPG'),
(18, 'FH18103XYE379', 'Mouse Robot M390', 30000, 'Dimensions: 107.56 mm x 60.93 mm x 29.40 mm  Battery: AA alkaline battery x 1  Bluetooth: Supported  Battery Life:12 months on non-glass surfaces, 8 months on glass surfaces (Test data from Huawei labs)  Buttons: Left button Right button Scroll wheel + Mi', 'Tersedia', '1719148966.JPG'),
(19, 'LU32057HA32', 'Keyboard Mini Dell', 30000, '- Switch travel: 4.0 +0.3mm - Peak force : 55+10g - Keycap pull up force : 1 kg min - Switch life : 10 million life cycles  Working Volt : 5.0+0.25Vdc Working consumption : 30mA max Power Consumption : 0.5Watt max', 'Tersedia', '1719149365.JPG'),
(20, 'IH128IT8HEN93', 'Powerbank Vivan 10000mAh ', 25000, 'Li Battery Energy: 10000mAh /37Wh Mirco Input: DC 5V/2A ,9V2A Type-C Input: DC 5V/3A ;9V2A OUT/Type-C Output: DC 5V/3A,9V/2A ,12V/1.5A OUT+type-C Output: DC 5V/3A', 'Tersedia', '1719149591.JPG'),
(21, 'IY2812G721FD', 'Powerbank Robot 10000mAh', 25000, '- Color : White, Green & Purple - Capacity : 10.000mAh - Micro Input : DC5V,2A - Type-C Input : DC5V/2A - USB Output : DC 5V/2.1A', 'Tersedia', '1719149660.JPG'),
(22, 'I189HU891BT', 'Iphone 11 ProMax', 150000, 'Spesifikasi iPhone 11 Pro Max dibekali dengan prosesor Apple A13 Bionic (7 nm+). Dari segi RAM, iPhone 11 Pro Max juga sudah didukung RAM 4GB. iPhone 11 Pro Max dilengkapi dengan kapasitas baterai 3969 mAh dengan fitur fast charging.', 'Tersedia', '1719160802.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_booking` int(255) NOT NULL,
  `no_rekening` int(255) NOT NULL,
  `nama_rekening` varchar(255) NOT NULL,
  `nominal` int(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_booking`, `no_rekening`, `nama_rekening`, `nominal`, `tanggal`) VALUES
(7, 6, 2129192822, 'Faujiah Decika', 200000, '2024-05-21'),
(8, 7, 128012801, 'Amanda Dwi Mulyani', 300000, '2024-05-25'),
(9, 8, 1920193031, 'Khairunnisa Munawarrah', 450000, '2024-05-04'),
(10, 9, 19029137, 'Vinandra Adam Saputra', 300000, '2024-04-29'),
(13, 14, 212122323, 'Ariska Dwi Ambarwati', 600000, '2024-06-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `kode_booking` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `denda` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `elektronik`
  ADD PRIMARY KEY (`id_elektronik`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `elektronik`
  MODIFY `id_elektronik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
