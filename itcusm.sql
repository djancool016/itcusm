-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2021 pada 06.17
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itcusm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_anggota`
--

CREATE TABLE `t_anggota` (
  `id_angt` int(5) NOT NULL,
  `id_jabatan` int(3) NOT NULL DEFAULT 6,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_img_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_anggota`
--

INSERT INTO `t_anggota` (`id_angt`, `id_jabatan`, `nama`, `email`, `password`, `profile_img_url`) VALUES
(1, 2, 'Dwi Julianto', 'dwijulianto16@gmail.com', '', 'assets/img/dwij.jpg'),
(2, 3, 'Ilham Ardiyanto', '', '', 'assets/img/ilham_profile.jpg'),
(3, 4, 'Luis Erik A', '', '', 'assets/img/luis_profile.jpg'),
(4, 5, 'Setya Ningrum', '', '', 'assets/img/setya_profile.jpg'),
(5, 7, 'Mr. Very Christioko, S.Kom, M.Kom', '', '', 'assets/img/dosen.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_anggota_jabatan`
--

CREATE TABLE `t_anggota_jabatan` (
  `id_jabatan` int(3) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_anggota_jabatan`
--

INSERT INTO `t_anggota_jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'admin'),
(2, 'ketua'),
(3, 'wakil ketua'),
(4, 'sekretaris'),
(5, 'bendahara'),
(6, 'anggota'),
(7, 'Dosen Pembimbing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_anggota_sosmed`
--

CREATE TABLE `t_anggota_sosmed` (
  `id_sismed_angt` int(3) NOT NULL,
  `id_angt` int(3) NOT NULL,
  `id_sosmed` int(3) NOT NULL,
  `url_sosmed` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_berita`
--

CREATE TABLE `t_berita` (
  `id_berita` int(5) NOT NULL,
  `title_berita` text NOT NULL,
  `subtitle_berita` text NOT NULL,
  `isi_berita` text NOT NULL,
  `id_angt` int(5) NOT NULL,
  `id_kategori_berita` int(3) NOT NULL,
  `tgl_berita` datetime NOT NULL DEFAULT current_timestamp(),
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_berita`
--

INSERT INTO `t_berita` (`id_berita`, `title_berita`, `subtitle_berita`, `isi_berita`, `id_angt`, `id_kategori_berita`, `tgl_berita`, `image`) VALUES
(2, 'Android 12 Akan Otomatis Hibernasi Aplikasi yang Jarang Dipakai', 'https://inet.detik.com/mobile-apps/d-5540775/android-12-akan-otomatis-hibernasi-aplikasi-yang-jarang-dipakai', 'Jakarta - Salah satu fitur yang diperkirakan akan hadir pada sistem operasi terbaru Android 12 adalah fitur hibernasi. Fitur ini akan mengosongkan ruang penyimpanan di smarpthone dengan menghapus file sementara dari aplikasi yang tidak digunakan.\r\nMeskipun fitur ini belum muncul di salah satu dari dua pratinjau pengembang yang tersedia untuk umum, namun menurut laporan dari XDA Developers mereka dapat mengonfirmasi bahwa kode untuk fitur tersebut ada dalam bocoran build yang baru-baru ini telah mereka peroleh.\r\n\r\nDengan dirilisnya pratinjau pengembang Android 11 3, Google menambahkan fitur izin pencabutan otomatis baru yang mencabut izin aplikasi jika aplikasi tidak digunakan selama beberapa bulan.', 2, 0, '2021-05-05 10:47:43', 'assets/img/berita/android_65978.jpeg'),
(7, 'Valuasi Perusahaan Fintech Milik Jack Ma Anjlok\r\n', 'https://tekno.kompas.com/read/2021/05/05/13180097/valuasi-perusahaan-fintech-milik-jack-ma-anjlok', 'KOMPAS.com - Pemerintah China belakangan memperketat pengawasan terhadap perusahaan teknologi raksasa di dalam negerinya dengan aturan anti-monopoli baru. Perusahaan fintech milik miliarder Jack Ma, Ant Group Co., jadi salah satu perusahaan yang jadi target. Bahkan, Regulator Keuangan China sampai memaksa perusahaan afiliasi Alibaba ini untuk merombak bisnisnya, pada akhir Desember 2020 lalu. Akibatnya, valuasi Ant Group harus anjlok. Hal ini terungkap dari dokumen pengajuan peraturan yang disampaikan oleh manajer aset AS Fidelity Investments, yang juga merupakan salah satu investor besar di belakang Ant Group. Dalam dokumen tersebut, Fidelity Investments menilai valuasi Ant Group turun hampir 50 persen, yakni di angka 144 miliar dollar AS (sekitar Rp 2.076 triliun) pada akhir Februari 2021. Padahal pada Agustus 2020, valuasi perusahaan fintech milik Jack Ma itu masih bernilai 295 miliar dollar AS atau setara dengan Rp 4.253 triliun.\r\n\r\n', 1, 0, '2021-05-05 10:47:43', 'assets/img/berita/jackma.jpg'),
(8, 'Suka Instal Aplikasi dari APKPure? Awas Ada Trojan-nya Lho...', 'https://inet.detik.com/security/d-5532243/suka-instal-aplikasi-dari-apkpure-awas-ada-trojan-nya-lho', 'Jakarta - Meski sangat tidak disarankan, salah satu tempat populer untuk mencari aplikasi Android selain Play Store adalah APKPure. Belakangan terungkap kalau situs tersebut ternyata terinfeksi dan mendistribusikan trojan.\r\nIni adalah temuan dari Kaspersky, yang menyebutkan bahwa APKPure sudah terinfeksi trojan dan juga mendistribusikan trojan lainnya. Padahal di situsnya, APKPure menyebut kalau apk yang mereka distribusikan sudah dipindai oleh Google dan dijamin aman.\r\n\r\nNamun menurut Kaspersky, kasus pada APKPure ini mirip dengan yang terjadi di CamScanner. Yaitu pengembang aplikasi menerapkan software development kit (SDK) iklan dari sumber tak terverifikasi dan ternyata berbahaya. Alhasil aplikasi APKPure ini disusupi oleh malware.\r\n\r\n\"APKPure versi 3.17.18 juga dilengkapi dengan SDK iklan, satu dengan Trojan dropper tertanam, yang dideteksi oleh solusi Kaspersky sebagai HEUR: Trojan-Dropper.AndroidOS.Triada.ap,\" tulis Igor Golovin, peneliti keamanan di Kaspersky, dalam keterangan yang diterima detikINET, Rabu (14/4/2021).', 4, 0, '2021-05-05 10:47:43', 'assets/img/berita/ilustrasi-trojan_169.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_berita_kategori`
--

CREATE TABLE `t_berita_kategori` (
  `id_kategori_berita` int(3) NOT NULL,
  `kategori_berita` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sosmed`
--

CREATE TABLE `t_sosmed` (
  `id_sosmed` int(3) NOT NULL,
  `sosmed` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_anggota`
--
ALTER TABLE `t_anggota`
  ADD PRIMARY KEY (`id_angt`);

--
-- Indeks untuk tabel `t_anggota_jabatan`
--
ALTER TABLE `t_anggota_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `t_anggota_sosmed`
--
ALTER TABLE `t_anggota_sosmed`
  ADD PRIMARY KEY (`id_sismed_angt`);

--
-- Indeks untuk tabel `t_berita`
--
ALTER TABLE `t_berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_angt` (`id_angt`);

--
-- Indeks untuk tabel `t_berita_kategori`
--
ALTER TABLE `t_berita_kategori`
  ADD PRIMARY KEY (`id_kategori_berita`);

--
-- Indeks untuk tabel `t_sosmed`
--
ALTER TABLE `t_sosmed`
  ADD PRIMARY KEY (`id_sosmed`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_anggota`
--
ALTER TABLE `t_anggota`
  MODIFY `id_angt` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `t_anggota_jabatan`
--
ALTER TABLE `t_anggota_jabatan`
  MODIFY `id_jabatan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `t_anggota_sosmed`
--
ALTER TABLE `t_anggota_sosmed`
  MODIFY `id_sismed_angt` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_berita`
--
ALTER TABLE `t_berita`
  MODIFY `id_berita` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `t_berita_kategori`
--
ALTER TABLE `t_berita_kategori`
  MODIFY `id_kategori_berita` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_sosmed`
--
ALTER TABLE `t_sosmed`
  MODIFY `id_sosmed` int(3) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_anggota`
--
ALTER TABLE `t_anggota`
  ADD CONSTRAINT `t_anggota_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `t_anggota_jabatan` (`id_jabatan`);

--
-- Ketidakleluasaan untuk tabel `t_berita`
--
ALTER TABLE `t_berita`
  ADD CONSTRAINT `t_berita_ibfk_1` FOREIGN KEY (`id_angt`) REFERENCES `t_anggota` (`id_angt`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
