-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Des 2024 pada 10.34
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
-- Database: `health_care`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `apotek`
--

CREATE TABLE `apotek` (
  `id_apotek` int(11) NOT NULL,
  `nama_apotek` varchar(50) NOT NULL DEFAULT '',
  `lokasi` text NOT NULL,
  `nomor_telepon` varchar(50) NOT NULL DEFAULT '0',
  `jam_operasional` varchar(50) NOT NULL DEFAULT '00:00:00',
  `rating` decimal(3,1) NOT NULL DEFAULT 0.0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `apotek`
--

INSERT INTO `apotek` (`id_apotek`, `nama_apotek`, `lokasi`, `nomor_telepon`, `jam_operasional`, `rating`) VALUES
(1, 'Apotek Sehat', 'Surabaya, Jawa Timur', '082176721312', '08:00 - 21:00', 4.5),
(2, 'Apotek Maju', 'Jakarta, DKI Jakarta', '0876271675', '09:00 - 18:00', 4.2),
(3, 'Apotek Cemerlang', 'Bandung, Jawa Barat', '08761253651', '07:00 - 20:00', 4.8),
(4, 'Apotek Indah', 'Yogyakarta, DI Yogyakarta', '086725165', '08:00 - 22:00', 4.7),
(5, 'Apotek Abadi', 'Medan, Sumatera Utara', '08782618167', '08:00 - 19:00', 4.3),
(6, 'Apotek Karya', 'Bali, Denpasar', '08621563521', '10:00 - 21:00', 4.1),
(7, 'Apotek Bunga', 'Semarang, Jawa Tengah', '08625653121', '08:00 - 18:00', 4.6),
(8, 'Apotek Sejahtera', 'Makassar, Sulawesi Selatan', '0865215636512', '09:00 - 20:00', 4.4),
(9, 'Apotek Melati', 'Surabaya, Jawa Timur', '08621556123', '07:00 - 22:00', 5.0),
(10, 'Apotek Murni', 'Bandung, Jawa Barat', '08667215653', '08:00 - 20:00', 4.1),
(11, 'Apotek Bahagia', 'Palembang, Sumatera Selatan', '0872176731', '08:00 - 21:00', 4.3),
(12, 'Apotek Sumber', 'Medan, Sumatera Utara', '086526156321', '08:00 - 19:00', 4.2),
(13, 'Apotek Agung', 'Solo, Jawa Tengah', '0865261531', '07:00 - 21:00', 4.7),
(14, 'Apotek Tumbuh', 'Surakarta, Jawa Tengah', '086216535127', '09:00 - 18:00', 4.5),
(15, 'Apotek Prima', 'Pontianak, Kalimantan Barat', '08671273512', '08:00 - 20:00', 4.1),
(16, 'Apotek Jaya', 'Bandung, Jawa Barat', '085624165432', '08:00 - 19:00', 4.6),
(17, 'Apotek Bersih', 'Denpasar, Bali', '087625165123', '09:00 - 21:00', 4.4),
(18, 'Apotek Sumber Sehat', 'Surabaya, Jawa Timur', '08671253512', '07:00 - 22:00', 5.0),
(19, 'Apotek Nusantara', 'Jakarta, DKI Jakarta', '08265656512', '10:00 - 22:00', 4.3),
(20, 'Apotek Farma', 'Medan, Sumatera Utara', '08361253521', '08:00 - 20:00', 4.2),
(21, 'Apotek Ciliwung', 'Malang, Jawa Timur', '082717363', '09.00 - 19.00', 4.5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(255) NOT NULL,
  `spesialisasi` varchar(255) NOT NULL,
  `jadwal_konsul` text NOT NULL,
  `rating` decimal(3,1) DEFAULT NULL,
  `harga_konsultasi` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `spesialisasi`, `jadwal_konsul`, `rating`, `harga_konsultasi`) VALUES
(1, 'Dr. Andi Wijaya P', 'Spesialis Jantung', 'Senin - Jumat 08:00 - 16:00', 4.8, 350000),
(2, 'Dr. Siti Rahmawati', 'Spesialis Anak', 'Senin - Sabtu 10:00 - 18:00', 4.3, 250000),
(3, 'Dr. Budi Santoso', 'Spesialis Kulit dan Kelamin', 'Selasa, Kamis 08:00 - 12:00	', 4.2, 200000),
(4, 'Dr. Diah Permatasari', 'Spesialis Penyakit Dalam', 'Senin - Jumat 09:00 - 13:00', 4.0, 300000),
(5, 'Dr. Rudi Setiawan', 'Spesialis Mata', 'Senin - Jumat 11:00 - 18:00', 4.0, 220000),
(6, 'Dr. Fanny Wulandari', 'Spesialis Kandungan', 'Senin - Sabtu 09:00 - 15:00', 4.8, 400000),
(7, 'Dr. Asep Suryana', 'Spesialis THT', 'Senin - Kamis 10:00 - 14:00', 5.0, 180000),
(8, 'Dr. Maria Christina', 'Spesialis Gigi', 'Senin - Jumat 08:00 - 16:00', 4.0, 250000),
(9, 'Dr. Edwin Saputra', 'Spesialis Orthopedi', 'Selasa - Sabtu 09:00 - 17:00	', 4.5, 320000),
(10, 'Dr. Tiara Rahayu', 'Spesialis Bedah', 'Rabu - Jumat 12:00 - 16:00', 4.6, 500000),
(11, 'Dr. Yudi Haryanto', 'Spesialis Saraf', 'Senin - Jumat 09:00 - 18:00	', 4.3, 270000),
(12, 'Dr. Ana Maria', 'Spesialis Psikiatri', 'Senin - Kamis 08:00 - 12:00', 3.8, 220000),
(13, 'Dr. Lilis Kurniawati', 'Spesialis Rehabilitasi Medik', 'Senin - Jumat 09:00 - 15:00', 4.2, 280000),
(14, 'Dr. Indra Pratama	', 'Spesialis Gizi', 'Senin - Jumat 07:00 - 13:00', 4.1, 200000),
(15, 'Dr. Evelyn Tan', 'Spesialis Mata', 'Selasa - Sabtu 09:00 - 16:00', 4.3, 300000),
(16, 'Dr. Surya Budi', 'Spesialis Kanker', 'Senin - Jumat 09:00 - 18:00', 3.9, 600000),
(17, 'Dr. Farhan Kamil', 'Spesialis Gigi', 'Selasa - Kamis 08:00 - 12:00', 4.7, 240000),
(18, 'Dr. Alina Putri', 'Spesialis Anestesi', 'Senin - Jumat 08:00 - 14:00', 4.9, 350000),
(19, 'Dr. Kevin Ramadhan', 'Spesialis Urologi', 'Selasa - Jumat 09:00 - 15:00', 4.0, 280000),
(20, 'Dr. Nita Rahardjo', 'Spesialis Jantung', 'Senin - Jumat 08:00 - 16:00', 4.1, 400000),
(21, 'Dr. Tirta Kusuma', 'Spesialis Anak', 'Senin - Jumat 12:00 - 15:00', 4.2, 100000),
(22, 'Dr. Citra Lestari', 'Spesialis Anak', 'Sabtu - Senin 13.00 - 15.00', 4.8, 120000),
(23, 'Dr. Aji Winarto', 'Spesialis Gigi', 'Rabu - Jumat 13:00 - 17:00', 4.7, 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `tgl_konsultasi` date NOT NULL,
  `jenis_konsultasi` enum('Video','Chat') NOT NULL,
  `status` enum('Selesai','Proses','Dibatalkan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `konsultasi`
--

INSERT INTO `konsultasi` (`id_konsultasi`, `id_user`, `id_dokter`, `tgl_konsultasi`, `jenis_konsultasi`, `status`) VALUES
(1, 1, 1, '2024-12-02', 'Video', 'Proses'),
(2, 2, 2, '2024-12-02', 'Chat', 'Selesai'),
(3, 3, 3, '2024-12-02', 'Video', 'Proses'),
(4, 4, 4, '2024-12-02', 'Chat', 'Selesai'),
(5, 5, 5, '2024-12-02', 'Video', 'Proses'),
(6, 6, 6, '2024-12-03', 'Chat', 'Proses'),
(7, 7, 7, '2024-12-03', 'Video', 'Selesai'),
(8, 8, 8, '2024-12-03', 'Chat', 'Proses'),
(9, 9, 9, '2024-12-03', 'Video', 'Selesai'),
(10, 10, 10, '2024-12-04', 'Chat', 'Proses'),
(11, 11, 11, '2024-12-04', 'Video', 'Selesai'),
(12, 12, 12, '2024-12-04', 'Chat', 'Proses'),
(13, 13, 13, '2024-12-04', 'Video', 'Proses'),
(14, 14, 14, '2024-12-04', 'Chat', 'Selesai'),
(15, 15, 15, '2024-12-05', 'Video', 'Proses'),
(16, 16, 16, '2024-12-05', 'Chat', 'Selesai'),
(17, 17, 17, '2024-12-05', 'Video', 'Proses'),
(18, 18, 18, '2024-12-05', 'Chat', 'Selesai'),
(19, 19, 19, '2024-12-06', 'Video', 'Proses'),
(20, 20, 20, '2024-12-06', 'Chat', 'Selesai'),
(21, 21, 21, '2024-12-03', 'Chat', 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_kesehatan`
--

CREATE TABLE `log_kesehatan` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_log` date NOT NULL,
  `parameter` varchar(50) NOT NULL DEFAULT '',
  `nilai` varchar(50) NOT NULL DEFAULT '0',
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `log_kesehatan`
--

INSERT INTO `log_kesehatan` (`id_log`, `id_user`, `tgl_log`, `parameter`, `nilai`, `catatan`) VALUES
(1, 1, '2024-11-29', 'Hipertensi', '120/80 mmHg', 'Normal'),
(2, 2, '2024-12-02', 'Diabetes', '110 mg/dL', 'Normal'),
(3, 3, '2024-12-03', 'Kolesterol', '190 mg/dL', 'Normal'),
(4, 4, '2024-12-01', 'Hipertensi', '150/100 mmHg', 'Tinggi'),
(5, 5, '2024-11-29', 'Diabetes', '145 mg/dL', 'Tinggi'),
(6, 6, '2024-11-28', 'Kolesterol Tinggi', '230 mg/dL', 'Tinggi'),
(7, 7, '2024-11-27', 'Hipertensi', '110/70 mmHg', 'Normal'),
(8, 8, '2024-12-06', 'Diabetes', '80 mg/dL', 'Rendah'),
(9, 9, '2024-11-28', 'Kolesterol', '250 mg/dL', 'Tinggi'),
(10, 10, '2024-12-03', 'Hipertensi', '125/85 mmHg', 'Normal'),
(11, 11, '2024-11-29', 'Diabetes', '160 mg/dL', 'Tinggi'),
(12, 12, '2024-12-03', 'Kolesterol', '210 mg/dL', 'Tinggi'),
(13, 13, '2024-11-30', 'Hipertensi', '130/90 mmHg', 'Normal'),
(14, 14, '2024-12-01', 'Diabetes', '95 mg/dL', 'Normal'),
(15, 15, '2024-12-01', 'Kolesterol', '185 mg/dL', 'Normal'),
(16, 16, '2024-11-29', 'Hipertensi', '160/105 mmHg', 'Tinggi'),
(17, 17, '2024-11-25', 'Diabetes', '70 mg/dL', 'Rendah'),
(18, 18, '2024-11-25', 'Kolesterol', '220 mg/dL', 'Tinggi'),
(19, 19, '2024-11-28', 'Hipertensi', '135/88 mmHg', 'Normal'),
(20, 20, '2024-11-27', 'Diabetes', '50 mg/dL', 'Rendah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `nama_metode` enum('M-Banking','E-Wallet','Virtual Account','Cash') NOT NULL,
  `deskripsi` text NOT NULL,
  `biaya_transaksi` varchar(50) NOT NULL DEFAULT '0',
  `waktu_proses` varchar(50) NOT NULL DEFAULT '0',
  `status_aktif` enum('aktif','tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `metode_pembayaran`
--

INSERT INTO `metode_pembayaran` (`id_pembayaran`, `nama_metode`, `deskripsi`, `biaya_transaksi`, `waktu_proses`, `status_aktif`) VALUES
(1, 'E-Wallet', 'Pembayaran melalui mobile banking', '5000', 'Instan', 'aktif'),
(2, 'E-Wallet', 'Pembayaran melalui dompet digital (e-wallet)', '3000', 'Instan', 'aktif'),
(3, 'Virtual Account', 'Pembayaran menggunakan virtual account bank', '4000', 'Instan', 'aktif'),
(4, 'Cash', 'Pembayaran tunai saat pengiriman', '6000', 'Instan', 'aktif'),
(5, 'M-Banking', 'Pembayaran menggunakan mobile banking (contoh: BCA Mobile)', '3500', 'Instan', 'aktif'),
(6, 'E-Wallet', 'Pembayaran menggunakan dompet digital seperti OVO, DANA, GoPay', '2500', 'Instan', 'aktif'),
(7, 'Virtual Account', 'Pembayaran melalui rekening virtual untuk transfer bank', '4500', 'Instan', 'aktif'),
(8, 'Cash', 'Pembayaran tunai yang dilakukan di tempat pengiriman', '10000', 'Instan', 'aktif'),
(9, 'M-Banking', 'Pembayaran via mobile banking dengan aplikasi bank', '3000', 'Instan', 'aktif'),
(10, 'E-Wallet', 'Pembayaran dengan aplikasi e-wallet (misalnya: ShopeePay)', '2000', 'Instan', 'aktif'),
(11, 'Virtual Account', 'Pembayaran melalui virtual account untuk mempermudah transfer', '5000', 'Instan', 'aktif'),
(12, 'Cash', 'Pembayaran tunai untuk pembelian langsung', '15000', 'Instan', 'aktif'),
(13, 'M-Banking', 'Pembayaran via mobile banking yang terintegrasi dengan akun bank', '6000', 'Instan', 'aktif'),
(14, 'E-Wallet', 'Pembayaran cepat dengan saldo e-wallet', '2500', 'Instan', 'aktif'),
(15, 'Virtual Account', 'Pembayaran dengan akun virtual yang diterbitkan oleh bank', '3000', 'Instan', 'aktif'),
(16, 'Cash', 'Pembayaran menggunakan uang tunai di lokasi yang ditentukan', '20000', 'Instan', 'aktif'),
(17, 'M-Banking', 'Pembayaran dengan aplikasi mobile banking untuk transfer instan', '3500', 'Instan', 'aktif'),
(18, 'E-Wallet', 'Pembayaran dengan dompet digital yang dapat diisi ulang', '2000', 'Instan', 'aktif'),
(19, 'Virtual Account', 'Pembayaran dengan kode virtual untuk proses transfer bank', '4000', 'Instan', 'aktif'),
(20, 'Cash', 'Pembayaran tunai langsung saat transaksi', '5000', 'Instan', 'aktif'),
(21, 'Cash', 'Membayar Langsung Tunai', '20000', 'Instan', 'aktif'),
(22, 'M-Banking', 'Pembayaran TF', '20000', 'Instan', 'aktif'),
(23, 'Cash', 'Pembayaran langsung di tempat', '34000', 'Saat Pengiriman', 'aktif'),
(24, 'M-Banking', 'Transfer', '250000', 'Instan', 'aktif'),
(26, 'Virtual Account', 'Menggunakan Virtual account dana', '25000', 'Saat Pengiriman', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(50) NOT NULL DEFAULT '',
  `deskripsi_obat` text NOT NULL,
  `harga` text NOT NULL,
  `kategori` enum('Analgesik','Antibiotik','Antihistamin','Gastrointestinal','Antidiabetes','Antihipertensi','Respiratori','Kortikosteroid','Diuretik') NOT NULL,
  `stok` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `deskripsi_obat`, `harga`, `kategori`, `stok`) VALUES
(1, 'Paracetamol', 'Obat untuk mengurangi rasa sakit dan demam.', '5000', 'Analgesik', 50),
(2, 'Ibuprofen', 'Obat anti-inflamasi non-steroid untuk nyeri dan peradangan.', '15000', 'Analgesik', 80),
(3, 'Amoxicillin', 'Antibiotik untuk infeksi bakteri.', '20000', 'Antibiotik', 60),
(4, 'Cetirizine', 'Obat antihistamin untuk alergi.', '10000', 'Antihistamin', 90),
(5, 'Ranitidine', 'Obat untuk mengatasi asam lambung.', '12000', 'Gastrointestinal', 50),
(6, 'Metformin', 'Obat untuk mengontrol kadar gula darah pada diabetes.', '25000', 'Antidiabetes', 70),
(7, 'Captopril', 'Obat untuk tekanan darah tinggi.', '8000', 'Antihipertensi', 65),
(8, 'Salbutamol', 'Obat untuk mengatasi asma.', '18000', 'Respiratori', 40),
(9, 'Loperamide', 'Obat untuk mengatasi diare.', '7000', 'Gastrointestinal', 75),
(10, 'Amlodipine', 'Obat untuk tekanan darah tinggi.', '20000', 'Antihipertensi', 55),
(11, 'Clindamycin', 'Antibiotik untuk infeksi kulit dan jaringan lunak.', '30000', 'Antibiotik', 45),
(12, 'Omeprazole', 'Obat untuk mengurangi produksi asam lambung.', '15000', 'Gastrointestinal', 60),
(13, 'Diclofenac', 'Obat anti-inflamasi untuk nyeri dan peradangan.', '12000', 'Analgesik', 80),
(14, 'Azithromycin', 'Antibiotik untuk infeksi saluran pernapasan.', '35000', 'Antibiotik', 30),
(15, 'Dexamethasone', 'Obat kortikosteroid untuk peradangan.', '10000', 'Kortikosteroid', 50),
(16, 'Hydrocortisone', 'Obat untuk alergi dan peradangan kulit.', '20000', 'Kortikosteroid', 40),
(17, 'Glimepiride', 'Obat untuk diabetes tipe 2.', '15000', 'Antidiabetes', 70),
(18, 'Budesonide', 'Obat untuk asma dan alergi.', '25000', 'Respiratori', 35),
(19, 'Furosemide', 'Obat diuretik untuk mengatasi edema.', '12000', 'Diuretik', 60),
(20, 'Losartan', 'Obat untuk tekanan darah tinggi.', '18000', 'Antihipertensi', 50),
(23, 'OHT', 'Meredakan Batuk Berdahak', '12000', 'Analgesik', 29);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL DEFAULT '',
  `no_hp` varchar(50) NOT NULL DEFAULT '0',
  `tgl_lahir` varchar(50) NOT NULL,
  `riwayat` text NOT NULL,
  `alergi_obat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `nama_user`, `no_hp`, `tgl_lahir`, `riwayat`, `alergi_obat`) VALUES
(1, 'Andi Saputra', '081234567890', '1995-05-12', 'Diabetes', 'Paracetamol'),
(2, 'Budi Santoso', '082345678901', '1988-03-22', 'Hipertensi', 'Amoxicillin'),
(3, 'Citra Melati', '083456789012', '1990-10-15', 'Asma', 'Ibuprofen'),
(4, 'Dewi Lestari', '084567890123', '1987-08-07', 'Kolesterol Tinggi', 'Aspirin'),
(5, 'Eko Prasetyo', '085678901234', '1993-01-30', 'Hipertensi', 'Penicillin'),
(6, 'Fajar Setiawan', '086789012345', '1997-12-18', 'Penyakit Jantung', 'Sulfa'),
(7, 'Gita Wulandari', '087890123456', '1991-09-25', 'Asma', 'Cefalexin'),
(8, 'Hendra Wijaya', '088901234567', '1996-04-13', 'Diabetes', 'Erythromycin'),
(9, 'Ika Sari', '089012345678', '1989-06-08', 'Kolesterol Tinggi', 'Codeine'),
(10, 'Joko Susilo', '081345678912', '1992-11-21', 'Hipertensi', 'Tetracycline'),
(11, 'Kiki Andriana', '082456789013', '1998-02-14', 'Diabetes', 'None'),
(12, 'Lina Rahma', '083567890124', '1990-07-11', 'Asma', 'Metronidazole'),
(13, 'Miko Hardiansyah', '084678901235', '1985-05-09', 'Penyakit Jantung', 'Clindamycin'),
(14, 'Nina Agustin', '085789012346', '1994-10-20', 'Kolesterol Tinggi', 'Cephalexin'),
(15, 'Oka Firmansyah', '086890123457', '1986-01-05', 'Hipertensi', 'None'),
(16, 'Putri Maharani', '087901234568', '1993-03-29', 'Diabetes', 'Paracetamol'),
(17, 'Qori Ramadhani', '088012345679', '1999-12-07', 'Asma', 'Amoxicillin'),
(18, 'Rizky Pratama', '089123456780', '1992-08-19', 'Hipertensi', 'Ibuprofen'),
(19, 'Siti Hajar', '081234567891', '1988-06-03', 'Penyakit Jantung', 'Aspirin'),
(20, 'Tono Subagyo', '082345678902', '1995-11-10', 'Kolesterol Tinggi', 'Penicillin'),
(21, 'Citra Kirana', '082331867180', '2024-11-11', 'DBD', 'Tidak ada'),
(22, 'Eko Prasetyo', '08213259223', '1980-09-11', 'Diabetes', 'Tidak ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep_obat`
--

CREATE TABLE `resep_obat` (
  `id_resep` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `tgl_resep` varchar(50) NOT NULL DEFAULT '',
  `daftar_obat` varchar(50) NOT NULL DEFAULT '',
  `catatan_dokter` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `resep_obat`
--

INSERT INTO `resep_obat` (`id_resep`, `id_user`, `id_dokter`, `tgl_resep`, `daftar_obat`, `catatan_dokter`) VALUES
(1, 2, 5, '2024-12-02', 'Ciprofloxacin', 'Hindari menyentuh ujung botol ke mata.'),
(2, 9, 8, '2024-12-01', 'Ibuprofen', 'Mengurangi nyeri gigi dan peradangan.'),
(3, 4, 14, '2024-11-30', 'Suplemen Omega-3', 'Pagi dan malam setelah makan'),
(4, 10, 6, '2024-11-28', 'Asam Folat (Folic Acid)', 'Mendukung perkembangan janin, mencegah cacat tabung saraf.'),
(5, 15, 2, '2024-11-25', 'Amoxicillin', 'Antibiotik untuk infeksi'),
(6, 7, 4, '2024-11-22', 'Ranitidine', 'Untuk lambung, diminum sebelum makan'),
(7, 11, 1, '2024-11-20', 'Amlodipine', 'Untuk mengatasi hipertensi dan angina'),
(8, 12, 11, '2024-11-18', 'Diazepam', 'Dikonsumsi 1 kali sehari pada malam hari'),
(9, 13, 5, '2024-11-15', 'Erythromycin', 'Oleskan pada kelopak mata bagian dalam.'),
(10, 14, 8, '2024-11-12', 'Amoxicillin', 'Mengatasi infeksi bakteri pada gigi dan gusi.'),
(11, 16, 20, '2024-11-10', 'Simvastatin', 'Diminum 1 kali sehari malam hari'),
(12, 17, 6, '2024-11-07', 'Progesteron', 'Membantu menjaga kehamilan pada kondisi tertentu.'),
(13, 18, 2, '2024-11-05', 'Cetirizine', 'Untuk mengatasi alergi'),
(14, 19, 4, '2024-11-02', 'Metformin', 'Untuk pasien diabetes'),
(15, 20, 11, '2024-10-30', 'Amitriptyline', 'Dikonsumsi 1 kali sehari pada malam hari'),
(16, 12, 1, '2024-10-28', 'Losartan', 'Untuk mengontrol tekanan darah tinggi'),
(17, 11, 6, '2024-10-25', 'Vitamin D', 'Menjaga kesehatan tulang ibu dan perkembangan tulang janin'),
(18, 13, 8, '2024-10-22', 'Chlorhexidine Gluconate', 'Antiseptik untuk membilas mulut dan mengurangi plak.'),
(19, 14, 20, '2024-10-20', 'Bisoprolol', 'Diminum 1 kali sehari pagi hari'),
(20, 15, 5, '2024-10-18', 'Nepafenac', 'Untuk mengurangi peradangan mata.'),
(21, 4, 7, '2024-12-5', 'Amoxilin', 'Antibiotik untuk infeksi'),
(22, 5, 3, '2024-12-01', 'Paracetamol', 'untuk Flu Dan pegal sendi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_aktivitas`
--

CREATE TABLE `riwayat_aktivitas` (
  `id_aktivitas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `id_apotek` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_konsultasi` int(11) NOT NULL,
  `id_resep` int(11) NOT NULL,
  `id_log_kesehatan` int(11) NOT NULL,
  `tanggal_aktivitas` varchar(50) NOT NULL DEFAULT '',
  `jenis_aktivitas` enum('Pembelian','Konsultasi','Resep','Log Kesehatan') NOT NULL,
  `deskripsi_aktivitas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `riwayat_aktivitas`
--

INSERT INTO `riwayat_aktivitas` (`id_aktivitas`, `id_user`, `id_dokter`, `id_obat`, `id_apotek`, `id_transaksi`, `id_konsultasi`, `id_resep`, `id_log_kesehatan`, `tanggal_aktivitas`, `jenis_aktivitas`, `deskripsi_aktivitas`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, '2024-12-01', 'Pembelian', 'Pembelian obat Amlodipine'),
(2, 2, 2, 2, 1, 2, 2, 2, 2, '2024-12-02', 'Konsultasi', 'Konsultasi dengan dokter spesialis jantung terkait tekanan darah tinggi'),
(5, 5, 2, 4, 2, 5, 5, 5, 5, '2024-12-05', 'Pembelian', 'Pembelian obat Bisoprolol'),
(7, 7, 2, 3, 3, 7, 7, 7, 7, '2024-12-07', 'Konsultasi', 'Konsultasi lanjutan dengan dokter spesialis jantung'),
(9, 9, 3, 1, 1, 9, 9, 9, 9, '2024-12-09', 'Pembelian', 'Pembelian obat Amlodipine'),
(10, 10, 2, 2, 2, 10, 10, 10, 10, '2024-12-10', 'Log Kesehatan', 'Pasien mencatat log kesehatan terkait perubahan tekanan darah'),
(12, 12, 2, 3, 3, 12, 12, 12, 12, '2024-12-12', 'Resep', 'Resep diperbaharui oleh dokter spesialis jantung'),
(13, 13, 3, 4, 3, 13, 13, 13, 13, '2024-12-13', 'Pembelian', 'Pembelian obat Bisoprolol'),
(14, 3, 1, 3, 2, 3, 3, 3, 3, '2024-12-03', 'Resep', 'Resep baru diberikan oleh dokter untuk pasien terkait hipertensi'),
(15, 6, 1, 2, 3, 6, 6, 6, 6, '2024-12-06', 'Pembelian', 'Pembelian obat Losartan'),
(16, 8, 1, 3, 1, 8, 8, 8, 8, '2024-12-08', 'Resep', 'Resep tambahan diberikan oleh dokter untuk pasien'),
(17, 11, 1, 2, 2, 11, 11, 11, 11, '2024-12-11', 'Pembelian', 'Pembelian obat Losartan tambahan'),
(18, 14, 1, 4, 2, 14, 14, 14, 14, '2024-12-14', 'Log Kesehatan', 'Pencatatan efek samping penggunaan obat oleh pasien'),
(19, 16, 1, 1, 1, 16, 16, 16, 16, '2024-12-16', 'Pembelian', 'Pembelian obat Amlodipine tambahan'),
(20, 20, 1, 2, 3, 20, 20, 20, 20, '2024-12-20', 'Pembelian', 'Pembelian Losartan untuk pengobatan jangka panjang'),
(44, 17, 2, 3, 3, 17, 17, 17, 17, '2024-12-17', 'Konsultasi', 'Pasien melakukan konsultasi tambahan dengan dokter jantung'),
(55, 4, 3, 4, 2, 4, 4, 4, 4, '2024-12-04', 'Log Kesehatan', 'Log kesehatan pasien, mencatat tekanan darah harian'),
(78, 15, 2, 3, 1, 15, 15, 15, 15, '2024-12-15', 'Pembelian', 'Pembelian obat tambahan untuk hipertensi'),
(88, 19, 2, 4, 3, 19, 19, 19, 19, '2024-12-19', 'Log Kesehatan', 'Log kesehatan pasien mencatat perkembangan tekanan darah stabil'),
(99, 18, 3, 4, 1, 18, 18, 18, 18, '2024-12-18', 'Resep', 'Resep baru dikeluarkan oleh dokter untuk pasien');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pembelian`
--

CREATE TABLE `riwayat_pembelian` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `tgl_pembelian` varchar(50) NOT NULL DEFAULT '',
  `jumlah` varchar(50) NOT NULL DEFAULT '',
  `total_harga` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `riwayat_pembelian`
--

INSERT INTO `riwayat_pembelian` (`id_transaksi`, `id_user`, `id_obat`, `tgl_pembelian`, `jumlah`, `total_harga`) VALUES
(1, 1, 1, '2024-12-01', '2', '10000'),
(2, 2, 2, '2024-12-02', '1', '15000'),
(3, 3, 3, '2024-12-03', '5', '100000'),
(4, 1, 2, '2024-12-04', '3', '45000'),
(5, 2, 3, '2024-12-05', '4', '80000'),
(6, 3, 1, '2024-12-06', '6', '30000'),
(7, 1, 4, '2024-12-07', '2', '20000'),
(8, 2, 5, '2024-12-08', '1', '12000'),
(9, 3, 2, '2024-12-09', '2', '30000'),
(10, 1, 3, '2024-12-10', '3', '60000'),
(11, 2, 1, '2024-12-11', '2', '10000'),
(12, 3, 4, '2024-12-12', '1', '10000'),
(13, 1, 5, '2024-12-13', '3', '36000'),
(14, 2, 3, '2024-12-14', '2', '100000'),
(15, 3, 2, '2024-12-15', '4', '60000'),
(16, 1, 4, '2024-12-16', '1', '10000'),
(17, 2, 5, '2024-12-17', '3', '36000'),
(18, 3, 1, '2024-12-18', '5', '25000'),
(19, 1, 2, '2024-12-19', '2', '30000'),
(20, 2, 3, '2024-12-20', '2', '40000'),
(22, 3, 4, '2024-11-21', '3', '30000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `apotek`
--
ALTER TABLE `apotek`
  ADD PRIMARY KEY (`id_apotek`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`),
  ADD UNIQUE KEY `id_dokter_3` (`id_dokter`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_dokter_2` (`id_dokter`);

--
-- Indeks untuk tabel `log_kesehatan`
--
ALTER TABLE `log_kesehatan`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indeks untuk tabel `riwayat_aktivitas`
--
ALTER TABLE `riwayat_aktivitas`
  ADD PRIMARY KEY (`id_aktivitas`) USING BTREE,
  ADD KEY `ID_user` (`id_user`),
  ADD KEY `ID_Dokter` (`id_dokter`),
  ADD KEY `ID_Obat` (`id_obat`),
  ADD KEY `ID_Apotek` (`id_apotek`),
  ADD KEY `ID_Transaksi` (`id_transaksi`),
  ADD KEY `ID_Konsultasi` (`id_konsultasi`),
  ADD KEY `ID_Resep` (`id_resep`),
  ADD KEY `ID_Log_Kesehatan` (`id_log_kesehatan`);

--
-- Indeks untuk tabel `riwayat_pembelian`
--
ALTER TABLE `riwayat_pembelian`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_obat` (`id_obat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `apotek`
--
ALTER TABLE `apotek`
  MODIFY `id_apotek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `log_kesehatan`
--
ALTER TABLE `log_kesehatan`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `resep_obat`
--
ALTER TABLE `resep_obat`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `riwayat_aktivitas`
--
ALTER TABLE `riwayat_aktivitas`
  MODIFY `id_aktivitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `riwayat_pembelian`
--
ALTER TABLE `riwayat_pembelian`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `log_kesehatan`
--
ALTER TABLE `log_kesehatan`
  ADD CONSTRAINT `FK_log_kesehatan_pengguna` FOREIGN KEY (`id_user`) REFERENCES `pengguna` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
