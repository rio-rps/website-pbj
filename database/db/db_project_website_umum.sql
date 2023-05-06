-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Bulan Mei 2023 pada 18.55
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project_website_umum`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cpar_kategori`
--

CREATE TABLE `cpar_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nm_kategori` varchar(50) NOT NULL,
  `slug_kategori` text NOT NULL,
  `ket_kategori` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `cpar_kategori`
--

INSERT INTO `cpar_kategori` (`id_kategori`, `nm_kategori`, `slug_kategori`, `ket_kategori`, `created_at`, `updated_at`) VALUES
(63, 'Workshop', 'workshop', 'Workshop Berbagai Wacana', '2023-03-22 19:50:04', '2023-05-05 06:56:35'),
(64, 'Kunjungan ', 'kunjungan ', 'Kunjungan Dalam Maupun Luar Daerah', '2023-03-22 19:50:04', '2023-03-22 19:50:04'),
(65, 'Pengadaan', 'pengadaan', 'Pengadaan ', '2023-03-22 19:50:04', '2023-03-22 19:50:04'),
(66, 'Informasi Publik', 'informasi-publik', 'Informasi', '2023-03-22 19:50:04', '2023-04-06 07:36:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cpar_kategori_pengaduan`
--

CREATE TABLE `cpar_kategori_pengaduan` (
  `id_kategori_pengaduan` int(11) NOT NULL,
  `nm_kategori_pengaduan` varchar(225) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cpar_kategori_pengaduan`
--

INSERT INTO `cpar_kategori_pengaduan` (`id_kategori_pengaduan`, `nm_kategori_pengaduan`, `no_urut`, `created_at`, `updated_at`) VALUES
(1, 'Gratifikasi', 1, '2023-04-26 09:17:25', '2023-04-26 09:17:25'),
(2, 'Penyimpangan Tugas dan Fungsi', 2, '2023-04-26 09:17:25', '2023-04-26 09:17:25'),
(3, 'Benturan Kepentingan', 3, '2023-04-26 09:17:25', '2023-04-26 09:17:25'),
(4, 'Pelanggaran Peraturan Perundangan', 4, '2023-04-26 09:17:25', '2023-04-26 09:17:25'),
(5, 'Tindak Pidana Korupsi', 5, '2023-04-26 09:17:25', '2023-04-26 09:17:25'),
(6, 'Lainnya', 6, '2023-04-26 09:17:25', '2023-04-26 09:17:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cpar_link_terkait`
--

CREATE TABLE `cpar_link_terkait` (
  `id_link` int(11) NOT NULL,
  `nm_situs` varchar(50) NOT NULL,
  `link_situs` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cpar_link_terkait`
--

INSERT INTO `cpar_link_terkait` (`id_link`, `nm_situs`, `link_situs`, `created_at`, `updated_at`) VALUES
(8, 'Badan Keuangan dan Aset Daerah', 'http://bpkad.sumselprov.go.id/', '2023-03-18 14:32:50', '2023-03-18 14:49:58'),
(9, 'SIPD Kemendagri', 'http://sumselprov.sipd.kemendagri.go.id/', '2023-03-18 14:32:55', '2023-03-18 14:50:32'),
(10, 'BKD', 'http://bkd.sumselprov.go.id', '2023-03-18 14:33:00', '2023-03-18 14:51:15'),
(11, 'Sumselprov', 'http://sumselprov.go.id', '2023-03-18 14:33:09', '2023-03-18 14:51:39'),
(12, 'JDIH', 'http://jdih.sumselprov.go.id/index.php?m=fd&d=1', '2023-03-18 14:33:20', '2023-03-18 14:52:08'),
(13, 'Esumsel', 'http://esumsel.sumselprov.go.id/', '2023-03-18 14:33:27', '2023-03-18 14:52:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cpar_slide_show`
--

CREATE TABLE `cpar_slide_show` (
  `id_slide` int(11) NOT NULL,
  `gambar_slide` text NOT NULL,
  `status_actived` enum('1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cpar_slide_show`
--

INSERT INTO `cpar_slide_show` (`id_slide`, `gambar_slide`, `status_actived`, `created_at`, `updated_at`) VALUES
(47, '230325111738.jpg', '1', '2023-03-25 16:17:38', '2023-03-25 16:17:38'),
(48, '230325111745.jpg', '1', '2023-03-25 16:17:45', '2023-03-25 16:17:45'),
(49, '230325111752.jpg', '1', '2023-03-25 16:17:52', '2023-03-25 16:17:52'),
(50, '230325111802.jpg', '1', '2023-03-25 16:18:02', '2023-03-25 16:18:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ddd_galeri_photo`
--

CREATE TABLE `ddd_galeri_photo` (
  `id_galeri_photo` int(11) NOT NULL,
  `nm_galeri_photo` text NOT NULL,
  `slug_galeri_photo` text NOT NULL,
  `tgl_galeri_photo` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `ddd_galeri_photo`
--

INSERT INTO `ddd_galeri_photo` (`id_galeri_photo`, `nm_galeri_photo`, `slug_galeri_photo`, `tgl_galeri_photo`, `created_at`, `updated_at`) VALUES
(7, 'Upacara Hari Kartini s', 'upacara-hari-kartini-s', '2023-03-01', '2023-03-18 17:07:37', '2023-05-05 07:00:34'),
(8, 'Kegiatan Senam Bersama', 'kegiatan-senam-bersama', '2023-03-10', '2023-03-19 06:36:43', '2023-05-05 07:01:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ddd_galeri_photo_detail`
--

CREATE TABLE `ddd_galeri_photo_detail` (
  `id_galeri_photo_detail` int(11) NOT NULL,
  `gambar_galeri_photo` text NOT NULL,
  `id_galeri_photo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ddd_galeri_video`
--

CREATE TABLE `ddd_galeri_video` (
  `id_galeri_video` int(11) NOT NULL,
  `judul_video` text NOT NULL,
  `link_video` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ddh_kritik_saran`
--

CREATE TABLE `ddh_kritik_saran` (
  `id_kritik_saran` int(11) NOT NULL,
  `nm_pengirim` varchar(50) NOT NULL COMMENT '1 = Form Pengaduan,\r\n3 = Form saran dan usulan\r\n4 = Form permintaan layanan\r\n5 = Form penyampaian surat',
  `email_pengirim` varchar(50) NOT NULL,
  `no_tlp_pengirim` varchar(12) NOT NULL,
  `alamat_pengirim` text NOT NULL,
  `uraian_kritik_saran` text NOT NULL,
  `nilai_pelayanan` enum('1','2','3','4') NOT NULL COMMENT '1 = buruk, \r\n2 = cukup, \r\n3 = baik, \r\n4 = sangat baik,',
  `tgl_kirim` datetime NOT NULL,
  `validasi_kritik_saran` enum('1','2','3') NOT NULL COMMENT '1 = belum di validasi,\r\n2 = sudah di validasi\r\n3 = dihapus',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ddh_kritik_saran`
--

INSERT INTO `ddh_kritik_saran` (`id_kritik_saran`, `nm_pengirim`, `email_pengirim`, `no_tlp_pengirim`, `alamat_pengirim`, `uraian_kritik_saran`, `nilai_pelayanan`, `tgl_kirim`, `validasi_kritik_saran`, `created_at`, `updated_at`) VALUES
(1, 'Alba', 'alba@gmail.com', '1231231', 'Palembang', 'bagus dan sukses', '4', '2023-05-05 13:11:13', '1', '2023-05-05 04:45:36', '2023-05-05 06:27:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ddh_pengaduan`
--

CREATE TABLE `ddh_pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `nm_pelapor` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `id_kategori_pengaduan` int(11) NOT NULL,
  `tgl_kejadian` date NOT NULL,
  `lokasi_kejadian` text NOT NULL,
  `oknum_yang_terlibat` text NOT NULL,
  `uraian` text NOT NULL,
  `upload_bukti_dukung` text NOT NULL,
  `validasi_pengaduan` enum('1','2','3') NOT NULL COMMENT '1 = belum di validasi, 2 = sudah d validasi,3 = delete',
  `tgl_kirim` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ddh_pengaduan`
--

INSERT INTO `ddh_pengaduan` (`id_pengaduan`, `nm_pelapor`, `email`, `no_hp`, `id_kategori_pengaduan`, `tgl_kejadian`, `lokasi_kejadian`, `oknum_yang_terlibat`, `uraian`, `upload_bukti_dukung`, `validasi_pengaduan`, `tgl_kirim`, `created_at`, `updated_at`) VALUES
(9, 'asd', 'daaa@gmail.com', '123', 3, '2023-03-29', '23', '123', '231', '230427095527.png', '3', '2022-04-13 00:00:00', '2023-04-27 14:55:27', '2023-04-27 15:09:34'),
(10, 'asdsa', 'rio.rps007@gmail.com', '2132', 5, '2023-04-26', 'dfs', 'fsd', 'sdf', '230427103340.jpeg', '2', '2023-04-27 22:33:40', '2023-04-27 15:33:40', '2023-04-27 15:35:05'),
(11, 'Rio Pranata Saputra', 'riopranata.sa1pu1rps@gmail.com', '901239023012', 3, '2023-05-05', 'Palembang', 'asn', 'asdasda', '230505105042.jpg', '1', '2023-05-06 00:00:00', '2023-05-05 03:50:42', '2023-05-05 03:50:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dhh_laman`
--

CREATE TABLE `dhh_laman` (
  `id_laman` int(8) NOT NULL,
  `nm_laman` text NOT NULL,
  `slug_laman` text NOT NULL,
  `isi_laman` longtext DEFAULT NULL,
  `no_urut` int(11) NOT NULL,
  `icon_laman` text NOT NULL,
  `jenis_laman` enum('1','2','3','4','5') NOT NULL COMMENT '1 = text dan upload gambar,\r\n2 = upload dokumen pdf, word, excel,\r\n3 = upload jpg, jpeg, png \r\n4 = form / data dari form\r\n5 = custom contoller',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `dhh_laman`
--

INSERT INTO `dhh_laman` (`id_laman`, `nm_laman`, `slug_laman`, `isi_laman`, `no_urut`, `icon_laman`, `jenis_laman`, `created_at`, `updated_at`) VALUES
(9, 'Kontak', 'kontak', '<figure class=\"table\" style=\"width:100%;\"><table class=\"ck-table-resized\"><colgroup><col style=\"width:9.11%;\"><col style=\"width:3.4%;\"><col style=\"width:87.49%;\"></colgroup><tbody><tr><td>ALAMAT</td><td>:</td><td>Jalan Kapten A. Rivai No. 3, Sungai Pangeran, Ilir Timur I, Sungai Pangeran, Kec. Ilir Tim. I, Kota Palembang, Sumatera Selatan 30121, Indonesia</td></tr><tr><td>TELP</td><td>:</td><td>(0711) 356-094</td></tr></tbody></table></figure><p><iframe style=\"border-width:0;\" src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.435549700578!2d104.74826901410594!3d-2.9765476978321876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b75e0ddd6be6f%3A0xa7ae187625fa2e51!2sKantor%20Gubernur%20Sumatera%20Selatan!5e0!3m2!1sid!2sid!4v1679819029983!5m2!1sid!2sid\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\" width=\"600\" height=\"450\"></iframe></p>', 111, 'fa fa-edit', '1', '2023-03-20 17:00:00', '2023-05-05 03:56:36'),
(10, 'Profil Pimpinan', 'profil-pimpinan', '<p>ini merupakan profil ok, ok</p>', 1, 'fa fa-edit', '1', '2023-03-20 17:00:00', '2023-05-03 09:14:11'),
(11, 'Motto', 'motto', '<p>moto</p>', 2, 'fa fa-edit', '1', '2023-03-20 17:00:00', '2023-05-03 14:18:07'),
(12, 'Visi & Misi', 'visi-misi', '<p>visi misi</p>', 3, 'fa fa-edit', '1', '2023-03-20 17:00:00', '2023-05-03 14:18:34'),
(13, 'Maklumat Pelayanan', 'maklumat-pelayanan', '<h4 class=\"card-title\"><strong>Maklumat Pelayanan</strong></h4>', 4, 'fa fa-edit', '1', '2023-03-20 17:00:00', '2023-05-03 14:19:28'),
(14, 'Struktur Organisasi', 'struktur-organisasi', NULL, 5, 'fa fa-edit', '3', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(16, 'Penghargaan', 'enghargaan', NULL, 7, 'fa fa-edit', '3', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(17, 'LHKPN', 'lhkpn', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(19, 'SOP Bagian Pengelolaan Pengadaan Barang dan Jasa', 'sop-bagian-pengelolaan-pengadaan-barang-dan-jasa', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(20, 'SOP Bagian Pengelolaan LPSE', 'sop-bagian-pengelolaan-lpse', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(21, 'SOP Bagian Pembinaan dan Advokasi', 'sop-bagian-pembinaan-dan-advokasi', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(22, 'Rencana Umum Pengadaan', 'rencana-umum-pengadaan', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(23, 'Rencana Aksi', 'rencana-aksi', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(24, 'Dokumen Renstra', 'dokumen-renstra', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(25, 'Dokumen Renja', 'dokumen-renja', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(26, 'Cascading', 'cascading', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(27, 'Indikator Kinerja Utama', 'indikator-kinerja-utama', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(28, 'Perjanjian Kerja', 'perjanjian-kerja', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(29, 'Instruksi Presiden', 'instruksi-presiden', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(31, 'Peraturan Gubernur', 'peraturan-gubernur', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(32, 'Keputusan Gubernur', 'keputusan-gubernur', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(33, 'Instruksi Gubernur', 'instruksi-gubernur', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(34, 'Surat Edaran Gubernur', 'surat-edaran-gubernur', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(35, 'Surat Sekda', 'surat-sekda', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(37, 'Peraturan Presiden', 'peraturan-presiden', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(38, 'Peraturan Lembaga', 'peraturan-lembaga', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(39, ' Keputusan Kepala LKPP', 'keputusan-kepala-lkpp', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(40, 'Keputusan Deputi I', 'keputusan-deputi-i', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(41, 'Keputusan Deputi II', 'keputusan-deputi-ii', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(42, 'Keputusan Deputi III', 'keputusan-deputi-iii', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(43, 'Keputusan Deputi IV', 'keputusan-deputi-iv', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(44, 'Surat Edaran Bersama', 'surat-edaran-bersama', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(45, 'Surat Edaran Deputi', 'surat-edaran-deputi', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(46, 'Surat Edaran Deputi II', 'surat-edaran-deputi-ii', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(47, 'Surat Edaran Kepala LKPP', 'surat-edaran-kepala-lkpp', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(48, 'Nota Kesepahaman', 'nota-kesepahaman', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(49, 'PUPR', 'pupr', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(50, 'Standar Layanan', 'standar-layanan', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(51, 'Produk / Jenis Pelayanan', 'produk-jenis-pelayanan', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(52, 'Form Pengaduan', 'form-pengaduan', NULL, 8, 'fa fa-edit', '4', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(53, 'Form Pertanyaan', 'form-pertanyaan', NULL, 8, 'fa fa-edit', '4', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(54, 'Form Kritik dan Saran', 'form-kritik-dan-saran', NULL, 8, 'fa fa-edit', '4', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(55, 'Form Permintaan Layanan', 'form-permintaan-layanan', NULL, 8, 'fa fa-edit', '4', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(56, 'Form Pemyampaian Surat', 'form-peyampaian-surat', NULL, 8, 'fa fa-edit', '4', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(57, 'Pelayanan', 'pelayanan', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(58, 'Pengaduan', 'pengaduan', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(59, 'Survey Kepuasan Masyarakat', 'survey-kepuasan-masyarakat', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(60, 'Kinerja', 'kinerja', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(61, 'Realisasi Pengadaan', 'realisasi-pengadaan', NULL, 8, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-21 14:16:50'),
(62, 'SKM (EKSTERNAL)', 'skm-eksternal', NULL, 13, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-26 10:56:01'),
(63, 'SKM (INTERNAL)', 'skm-internal 	', NULL, 13, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-26 10:56:01'),
(64, 'Foto', 'Photo', NULL, 13, 'fa fa-edit', '5', '2023-03-20 17:00:00', '2023-03-26 10:56:01'),
(65, 'Video', 'video', NULL, 13, 'fa fa-edit', '5', '2023-03-20 17:00:00', '2023-03-26 10:56:01'),
(66, 'Persentasi', 'persentasi', NULL, 13, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-26 10:56:01'),
(67, 'User Guide', 'user-guide', NULL, 13, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-26 10:56:01'),
(68, 'Infografis', 'infografis', NULL, 13, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-26 10:56:01'),
(69, 'FAQ', 'faq', NULL, 13, 'fa fa-edit', '2', '2023-03-20 17:00:00', '2023-03-26 10:56:01'),
(70, 'Bagian Pengelolaan Pengadaan Barang/ Jasa', 'bagian-pengelolaan-pengadaan-barang-jasa', '<figure class=\"table\" style=\"width:100%;\"><table class=\"ck-table-resized\"><colgroup><col style=\"width:3.52%;\"><col style=\"width:96.48%;\"></colgroup><tbody><tr><td colspan=\"2\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\"><strong>Bagian Pengelolaan Pengadaan Barang/Jasa, membawahi 3 (tiga) Subbagian, yaitu :&nbsp;</strong></span></span></td></tr><tr><td><p style=\"text-align:center;\">1</p></td><td><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">Subbagian Pengelolaan Strategi Pengadaan Barang/ Jasa;&nbsp;</span></span></td></tr><tr><td><p style=\"text-align:center;\">&nbsp;</p></td><td><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;mso-add-space:auto;tab-stops:1.0cm;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">a. melaksanakan inventarisasi paket pengadaan barang/ jasa;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;mso-add-space:auto;tab-stops:1.0cm;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">b. melaksanakan riset dan analisis pasar barang/jasa;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;mso-add-space:auto;tab-stops:1.0cm;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">c. melaksanakan penyusunan strategi pengadaan barang/ jasa;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;mso-add-space:auto;tab-stops:1.0cm;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">d. menyusun kebijakan dan standar prosedur pengadaan barang/ jasa; dan&nbsp;</span></span><o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;mso-add-space:auto;tab-stops:1.0cm;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">e. melaksanakan tugas kedinasan lainnya yang diberikan oleh pimpinan.</span></span></p></td></tr><tr><td><p style=\"text-align:center;\">2</p></td><td><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">Subbagian Pelaksanaan Pengadaan Barang/Jasa;&nbsp;</span></span></td></tr><tr><td><p style=\"text-align:center;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p></td><td><p class=\"MsoNormal\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;tab-stops:1.0cm 49.65pt;text-indent:-7.1pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;mso-ansi-language:EN-US;\" times=\"\" new=\"\">&nbsp; a.&nbsp;</span><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">menyiapkan dan mengelola dokurnen pemilihan beserta dokumen pendukung lainnya dan</span><span style=\"line-height:150%;mso-ansi-language:EN-US;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp;</span><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">informasi yang dibutuhkan;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoNormal\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;tab-stops:1.0cm 49.65pt;text-indent:-7.1pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; b. melaksanakan pemilihan penyedia barang/ jasa;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoNormal\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;tab-stops:1.0cm 49.65pt;text-indent:-7.1pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; c. menyusun dan mengelola katalog elektronik lokal/ sektoral;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoNormal\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;tab-stops:1.0cm 49.65pt;text-indent:-7.1pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;mso-ansi-language:EN-US;\" times=\"\" new=\"\">&nbsp; d.&nbsp;</span><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">membantu perencanaan dan pengelolaan kontrak pengadaan barang/jasa pemerintah; dan&nbsp;</span></span><o:p></o:p></p><p class=\"MsoNormal\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;tab-stops:1.0cm 49.65pt;text-indent:-7.1pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; e. melaksanakan tugas kedinasan lainnya yang diberikan oleh pimpinan.</span></span></p></td></tr><tr><td><p style=\"text-align:center;\">3</p></td><td><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">Subbagian Pemantauan dan Evaluasi PengadaanBarang/ Jasa.</span></span></td></tr><tr><td><p style=\"text-align:center;\">&nbsp;</p></td><td><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;mso-add-space:auto;tab-stops:1.0cm;text-indent:-7.1pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; a. melaksanakan pemantauan pelaksanaan pengadaan barang/jasa pemerintah;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;mso-add-space:auto;tab-stops:1.0cm;text-indent:-7.1pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; b. melaksanakan evaluasi pelaksanaan pengadaan barang/jasa pemerintah;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;mso-add-space:auto;tab-stops:1.0cm;text-indent:-7.1pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; c. memberikan masukan basil pemantauan dan evaluasi sebagai bahan penyusunan strategi pengadaan barang/ jasa;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;mso-add-space:auto;tab-stops:1.0cm;text-indent:-7.1pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; d. menyusun laporan dan tindak lanjut basil pemantauan serta evaluasi pelaksanaan pengadaan barang/ jasa; dan&nbsp;</span></span><o:p></o:p></p><p class=\"MsoListParagraphCxSpLast\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;mso-add-space:auto;tab-stops:1.0cm;text-indent:-7.1pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; e. melaksanakan tugas kedinasan lainnya yang diberikan oleh pimpinan.</span></span></p></td></tr></tbody></table></figure><p class=\"MsoListParagraphCxSpLast\" style=\"line-height:150%;margin:0cm 0cm .0001pt 42.55pt;mso-add-space:auto;tab-stops:1.0cm;text-indent:-7.1pt;\"><o:p></o:p></p>', 11, 'fa fa-edit', '1', '2023-03-20 17:00:00', '2023-03-26 10:42:19'),
(71, 'Bagian Pengelolaan Layanan Pengadaan Secara Elektronik', 'bagian-pengelolaan-layanan-pengadaan-secara-elektronik', '<figure class=\"table\" style=\"width:100%;\"><table class=\"ck-table-resized\"><colgroup><col style=\"width:3.52%;\"><col style=\"width:96.48%;\"></colgroup><tbody><tr><td colspan=\"2\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\"><strong>Bagian Pengelolaan Layanan Pengadaan Secara Elektronik, membawahi 3 (tiga) Subbagian, yaitu&nbsp;</strong></span></span></td></tr><tr><td><p style=\"text-align:center;\">1</p></td><td><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">Subbagian Pengelolaan Sistem Pengadaan Secara Elektronik;&nbsp;</span></span></td></tr><tr><td><p style=\"text-align:center;\">&nbsp; &nbsp; &nbsp; &nbsp;</p></td><td><p class=\"MsoNormal\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;text-indent:-14.2pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; &nbsp; &nbsp;a. melaksanakan pengelolaan seluruh sistem informasi pengadaan barang/jasa termasuk akun penggunaan sistem pengadaan secara elektronik dan infrastrukturnya;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoNormal\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;text-indent:-14.2pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; &nbsp; &nbsp;b. melaksanakan pelayanan pengadaan barang/jasa pemerintah secara elektronik;</span></span><o:p></o:p></p><p class=\"MsoNormal\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;text-indent:-14.2pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; &nbsp; &nbsp;c. memfasilitasi pelaksanaan registrasi dan verifikasi pengguna seluruh sistem informasi pengadaan barang/ jasa;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoNormal\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;text-indent:-14.2pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; &nbsp; &nbsp;d. memberikan pelayanan bantuan dan perbaikan gangguan teknis jaringan; dan&nbsp;</span></span><o:p></o:p></p><p class=\"MsoNormal\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;text-indent:-14.2pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; &nbsp; &nbsp;e. melaksanakan tugas kedinasan lainnya yang diberikan oleh pimpinan.</span></span><o:p></o:p></p></td></tr><tr><td><p style=\"text-align:center;\">2</p></td><td><span style=\"font-family:;\"><span style=\"line-height:107%;mso-ansi-language:IN;mso-bidi-language:AR-SA;mso-fareast-font-family:Calibri;mso-fareast-language:EN-US;mso-fareast-theme-font:minor-latin;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">Subbagian Pengembangan Sistem Informasi;</span></span></td></tr><tr><td><p style=\"text-align:center;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p></td><td><p class=\"MsoNormal\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;text-indent:-14.2pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; &nbsp; &nbsp;a. mengidentifikasi kebutuhan pengembangan sistem informasi;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoNormal\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;text-indent:-14.2pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; &nbsp; &nbsp;b. mengembangkan sistem informasi yang dibutuhkan oleh Biro;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoNormal\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;text-indent:-14.2pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; &nbsp; &nbsp;c. mengembangkan sistem aplikasi yang dibutuhkan oleh Biro;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoNormal\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;text-indent:-14.2pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; &nbsp; &nbsp;d. mengembangkan dan memelihara perangkat keras dan jaringan; dan&nbsp;</span></span><o:p></o:p></p><p class=\"MsoNormal\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;text-indent:-14.2pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; &nbsp; &nbsp;e. mela</span><span style=\"line-height:150%;mso-ansi-language:EN-US;\" times=\"\" new=\"\">l</span><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">ksanakan tugas kedinasan lainnya yang diberikan oleh pimpinan.</span></span><o:p></o:p></p></td></tr><tr><td><p style=\"text-align:center;\">3</p></td><td><p class=\"MsoListParagraph\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;mso-add-space:auto;mso-list:l0 level1 lfo1;text-indent:-21.25pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; &nbsp; &nbsp; &nbsp;Subbagian Pengelolaan Informasi Pengadaan Barang/ Jasa</span></span><o:p></o:p></p></td></tr><tr><td><p style=\"text-align:center;\">&nbsp;</p></td><td><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;mso-add-space:auto;tab-stops:1.0cm;text-indent:-7.1pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; &nbsp;a. melaksanakan pelayanan informasi pengadaan barang/jasa pemerintah kepada masyarakat luas;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;mso-add-space:auto;tab-stops:1.0cm;text-indent:-7.1pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; &nbsp;b. mengelola informasi kontrak;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoNormal\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;text-indent:-14.2pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; &nbsp; &nbsp;c. mengumpulkan dan mendokumentasikan data barang/jasa hasil pengadaan;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoNormal\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;text-indent:-14.2pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; &nbsp; &nbsp;d. mengelola informasi manajemen barang/jasa hasil pengadaan; dan&nbsp;</span></span><o:p></o:p></p><p class=\"MsoNormal\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;text-indent:-14.2pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; &nbsp; &nbsp;e. melaksanakan tugas kedinasan lainnya yang diberikan oleh pimpinan.</span></span><o:p></o:p></p></td></tr></tbody></table></figure><p class=\"MsoListParagraphCxSpLast\" style=\"line-height:150%;margin:0cm 0cm .0001pt 42.55pt;mso-add-space:auto;tab-stops:1.0cm;text-indent:-7.1pt;\"><o:p></o:p></p>', 12, 'fa fa-edit', '1', '2023-03-20 17:00:00', '2023-03-26 10:50:23'),
(72, 'Bagian Pembinaan dan Advokasi Pengadaan Barang/ Jasa', 'bagian-pembinaan-dan-advokasi-pengadaan-barang-jasa', '<figure class=\"table\" style=\"width:100%;\"><table class=\"ck-table-resized\"><colgroup><col style=\"width:3.52%;\"><col style=\"width:96.48%;\"></colgroup><tbody><tr><td colspan=\"2\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\"><strong>Bagian Pembinaan dan Advokasi Pengadaan Barang/ Jasa, membawahi 3 (tiga) Subbagian, yaitu :&nbsp;</strong></span></span></td></tr><tr><td><p style=\"text-align:center;\">1</p></td><td><p class=\"MsoListParagraph\" style=\"line-height:150%;margin:0cm 0cm .0001pt 40px;mso-add-space:auto;mso-list:l0 level1 lfo1;text-indent:-21.25pt;\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;font-size:12.0pt;\"><span style=\"line-height:150%;\" dir=\"ltr\" lang=\"IN\">Subbagian Tata Usaha dan Pembinaan Sumber Daya Manusia Pengadaan Barang/Jasa;&nbsp;</span></span><o:p></o:p></p></td></tr><tr><td><p style=\"text-align:center;\">&nbsp;</p></td><td><p class=\"MsoListParagraphCxSpFirst\" style=\"line-height:150%;margin:0cm 0cm .0001pt 40px;mso-add-space:auto;text-indent:-14.2pt;\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;font-size:12.0pt;\"><span style=\"line-height:150%;\" dir=\"ltr\" lang=\"IN\">a. melaksanakan pembinaan bagi para pe!aku pengadaan barang/jasa pemerintah, terutama para pengelola pengadaan barang/ jasa dan personil Biro;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin:0cm 0cm .0001pt 40px;mso-add-space:auto;text-indent:-14.2pt;\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;font-size:12.0pt;\"><span style=\"line-height:150%;\" dir=\"ltr\" lang=\"IN\">b. mengelola manajemen pengetahuan pengadaan barang/jasa;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin:0cm 0cm .0001pt 40px;mso-add-space:auto;text-indent:-14.2pt;\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;font-size:12.0pt;\"><span style=\"line-height:150%;\" dir=\"ltr\" lang=\"IN\">c. melaksanakan pembinaan hubungan dengan para pemangku kepentingan;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin:0cm 0cm .0001pt 40px;mso-add-space:auto;text-indent:-14.2pt;\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;font-size:12.0pt;\"><span style=\"line-height:150%;\" dir=\"ltr\" lang=\"IN\">d. melaksanakan urusan administrasi ketatausahaan, kepegawaian dan keuangan;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin:0cm 0cm .0001pt 40px;mso-add-space:auto;text-indent:-14.2pt;\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;font-size:12.0pt;\"><span style=\"line-height:150%;\" dir=\"ltr\" lang=\"IN\">e. menyusun perencanaan program kegiatan dan anggaran; dan&nbsp;</span></span><o:p></o:p></p><p class=\"MsoListParagraphCxSpLast\" style=\"line-height:150%;margin:0cm 0cm .0001pt 40px;mso-add-space:auto;text-indent:-14.2pt;\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;font-size:12.0pt;\"><span style=\"line-height:150%;\" dir=\"ltr\" lang=\"IN\">f. melaksanakan tugas kedinasan lainnya yang diberikan oleh pimpinan.</span></span><o:p></o:p></p></td></tr><tr><td><p style=\"text-align:center;\">2</p></td><td><p class=\"MsoListParagraph\" style=\"line-height:150%;margin:0cm 0cm .0001pt 40px;mso-add-space:auto;mso-list:l0 level1 lfo1;text-indent:-21.25pt;\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;font-size:12.0pt;\"><span style=\"line-height:150%;\" dir=\"ltr\" lang=\"IN\">Subbagian Pembinaan Kelembagaan Pengadaan Barang/ Jasa;</span></span></p></td></tr><tr><td><p style=\"text-align:center;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p></td><td><p class=\"MsoNormal\" style=\"line-height:150%;margin:0cm 0cm .0001pt 40px;tab-stops:1.0cm 49.65pt;text-indent:-7.1pt;\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;font-size:12.0pt;\"><span style=\"line-height:150%;\" dir=\"ltr\" lang=\"IN\">a. melaksanakan pengelolaan dan pengukuran tingkat kematangan Biro;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoNormal\" style=\"line-height:150%;margin:0cm 0cm .0001pt 40px;text-indent:-7.1pt;\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;font-size:12.0pt;\"><span style=\"line-height:150%;\" dir=\"ltr\" lang=\"IN\">b. melaksanakan analisis beban kerja Biro;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoNormal\" style=\"line-height:150%;margin:0cm 0cm .0001pt 40px;text-indent:-7.1pt;\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;font-size:12.0pt;\"><span style=\"line-height:150%;\" dir=\"ltr\" lang=\"IN\">c. mengelola personil Biro;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoNormal\" style=\"line-height:150%;margin:0cm 0cm .0001pt 40px;text-indent:-7.1pt;\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;font-size:12.0pt;\"><span style=\"line-height:150%;\" dir=\"ltr\" lang=\"IN\">d. mengembangkan sistem insentif personil Biro;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoNormal\" style=\"line-height:150%;margin:0cm 0cm .0001pt 40px;text-indent:-7.1pt;\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;font-size:12.0pt;\"><span style=\"line-height:150%;\" dir=\"ltr\" lang=\"IN\">e. memfasilitasi implementasi standarisasi layanan pengadaan secara elektronik;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoNormal\" style=\"line-height:150%;margin:0cm 0cm .0001pt 40px;text-indent:-7.1pt;\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;font-size:12.0pt;\"><span style=\"line-height:150%;\" dir=\"ltr\" lang=\"IN\">f. melaksanakan pengelolaan dan pengukuran kinerja pengadaan barang/jasa pemerintah; dan&nbsp;</span></span><o:p></o:p></p><p class=\"MsoNormal\" style=\"line-height:150%;margin:0cm 0cm .0001pt 40px;text-indent:-7.1pt;\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;font-size:12.0pt;\"><span style=\"line-height:150%;\" dir=\"ltr\" lang=\"IN\">g. melaksanakan tugas kedinasan lainnya yang diberikan oleh pimpinan.</span></span><o:p></o:p></p></td></tr><tr><td><p style=\"text-align:center;\">3</p></td><td><p class=\"MsoListParagraph\" style=\"line-height:150%;margin:0cm 0cm .0001pt 40px;mso-add-space:auto;mso-list:l0 level1 lfo1;text-indent:-21.25pt;\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;font-size:12.0pt;\"><span style=\"line-height:150%;\" dir=\"ltr\" lang=\"IN\">Subbagian Pendampingan, Konsultasi dan/atau Bimbingan Teknis Pengadaan Barang/Jasa.</span></span><o:p></o:p></p></td></tr><tr><td><p style=\"text-align:center;\">&nbsp;</p></td><td><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin:0cm 0cm .0001pt 40px;mso-add-space:auto;text-indent:-14.2pt;\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;font-size:12.0pt;\"><span style=\"line-height:150%;\" dir=\"ltr\" lang=\"IN\">a. melaksanakan bimbingan teknis, pendampingan, dan/atau konsultasi proses pengadaan barang/ jasa pemerintah di lingkungan Pemerintah Provinsi, Kabupaten/Kota, dan Desa;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin:0cm 0cm .0001pt 40px;mso-add-space:auto;text-indent:-14.2pt;\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;font-size:12.0pt;\"><span style=\"line-height:150%;\" dir=\"ltr\" lang=\"IN\">b. melaksanakan bimbingan teknis, pendampingan dan/atau konsultasi penggunaan seluruh sistem informasi pengadaan barang/jasa pemerintah;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin:0cm 0cm .0001pt 40px;mso-add-space:auto;text-indent:-14.2pt;\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;font-size:12.0pt;\"><span style=\"line-height:150%;\" dir=\"ltr\" lang=\"IN\">c. melaksanakan layanan penyelesaian seng</span><span style=\"line-height:150%;mso-ansi-language:EN-US;\">k</span><span style=\"line-height:150%;\" dir=\"ltr\" lang=\"IN\">eta kontrak melalui mediasi;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin:0cm 0cm .0001pt 40px;mso-add-space:auto;text-indent:-14.2pt;\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;font-size:12.0pt;\"><span style=\"line-height:150%;\" dir=\"ltr\" lang=\"IN\">d. melaksanakan layanan pendampingan hukurn terhadap pelaku pengadaan barang/jasa; dan&nbsp;</span></span><o:p></o:p></p><p class=\"MsoListParagraphCxSpLast\" style=\"line-height:150%;margin:0cm 0cm .0001pt 40px;mso-add-space:auto;text-indent:-14.2pt;\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;font-size:12.0pt;\"><span style=\"line-height:150%;\" dir=\"ltr\" lang=\"IN\">e. melaksanakan tugas kedinasan lainnya yang diberikan oleh pimpinan.</span></span><o:p></o:p></p></td></tr></tbody></table></figure><p class=\"MsoListParagraphCxSpLast\" style=\"line-height:150%;margin:0cm 0cm .0001pt 42.55pt;mso-add-space:auto;tab-stops:1.0cm;text-indent:-7.1pt;\"><o:p></o:p></p>', 13, 'fa fa-edit', '1', '2023-03-20 17:00:00', '2023-03-26 10:56:01'),
(111, 'Kepala Biro', 'kepala-biro', '<figure class=\"table\" style=\"width:100%;\"><table class=\"ck-table-resized\"><colgroup><col style=\"width:3.52%;\"><col style=\"width:96.48%;\"></colgroup><tbody><tr><td colspan=\"2\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\"><strong>Bagian Pengelolaan Pengadaan Barang/Jasa, membawahi 3 (tiga) Subbagian, yaitu :&nbsp;</strong></span></span></td></tr><tr><td><p style=\"text-align:center;\">1</p></td><td><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">Subbagian Pengelolaan Strategi Pengadaan Barang/ Jasa;&nbsp;</span></span></td></tr><tr><td><p style=\"text-align:center;\">&nbsp;</p></td><td><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;mso-add-space:auto;tab-stops:1.0cm;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">a. melaksanakan inventarisasi paket pengadaan barang/ jasa;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;mso-add-space:auto;tab-stops:1.0cm;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">b. melaksanakan riset dan analisis pasar barang/jasa;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;mso-add-space:auto;tab-stops:1.0cm;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">c. melaksanakan penyusunan strategi pengadaan barang/ jasa;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;mso-add-space:auto;tab-stops:1.0cm;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">d. menyusun kebijakan dan standar prosedur pengadaan barang/ jasa; dan&nbsp;</span></span><o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;mso-add-space:auto;tab-stops:1.0cm;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">e. melaksanakan tugas kedinasan lainnya yang diberikan oleh pimpinan.</span></span></p></td></tr><tr><td><p style=\"text-align:center;\">2</p></td><td><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">Subbagian Pelaksanaan Pengadaan Barang/Jasa;&nbsp;</span></span></td></tr><tr><td><p style=\"text-align:center;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p></td><td><p class=\"MsoNormal\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;tab-stops:1.0cm 49.65pt;text-indent:-7.1pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;mso-ansi-language:EN-US;\" times=\"\" new=\"\">&nbsp; a.&nbsp;</span><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">menyiapkan dan mengelola dokurnen pemilihan beserta dokumen pendukung lainnya dan</span><span style=\"line-height:150%;mso-ansi-language:EN-US;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp;</span><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">informasi yang dibutuhkan;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoNormal\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;tab-stops:1.0cm 49.65pt;text-indent:-7.1pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; b. melaksanakan pemilihan penyedia barang/ jasa;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoNormal\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;tab-stops:1.0cm 49.65pt;text-indent:-7.1pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; c. menyusun dan mengelola katalog elektronik lokal/ sektoral;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoNormal\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;tab-stops:1.0cm 49.65pt;text-indent:-7.1pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;mso-ansi-language:EN-US;\" times=\"\" new=\"\">&nbsp; d.&nbsp;</span><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">membantu perencanaan dan pengelolaan kontrak pengadaan barang/jasa pemerintah; dan&nbsp;</span></span><o:p></o:p></p><p class=\"MsoNormal\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;tab-stops:1.0cm 49.65pt;text-indent:-7.1pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; e. melaksanakan tugas kedinasan lainnya yang diberikan oleh pimpinan.</span></span></p></td></tr><tr><td><p style=\"text-align:center;\">3</p></td><td><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">Subbagian Pemantauan dan Evaluasi PengadaanBarang/ Jasa.</span></span></td></tr><tr><td><p style=\"text-align:center;\">&nbsp;</p></td><td><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;mso-add-space:auto;tab-stops:1.0cm;text-indent:-7.1pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; a. melaksanakan pemantauan pelaksanaan pengadaan barang/jasa pemerintah;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;mso-add-space:auto;tab-stops:1.0cm;text-indent:-7.1pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; b. melaksanakan evaluasi pelaksanaan pengadaan barang/jasa pemerintah;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;mso-add-space:auto;tab-stops:1.0cm;text-indent:-7.1pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; c. memberikan masukan basil pemantauan dan evaluasi sebagai bahan penyusunan strategi pengadaan barang/ jasa;&nbsp;</span></span><o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;mso-add-space:auto;tab-stops:1.0cm;text-indent:-7.1pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; d. menyusun laporan dan tindak lanjut basil pemantauan serta evaluasi pelaksanaan pengadaan barang/ jasa; dan&nbsp;</span></span><o:p></o:p></p><p class=\"MsoListParagraphCxSpLast\" style=\"line-height:150%;margin-bottom:.0001pt;margin-right:0cm;margin-top:0cm;mso-add-space:auto;tab-stops:1.0cm;text-indent:-7.1pt;\"><span style=\"font-family:;\"><span style=\"line-height:150%;\" dir=\"ltr\" times=\"\" new=\"\" lang=\"IN\">&nbsp; e. melaksanakan tugas kedinasan lainnya yang diberikan oleh pimpinan.</span></span></p></td></tr></tbody></table></figure><p class=\"MsoListParagraphCxSpLast\" style=\"line-height:150%;margin:0cm 0cm .0001pt 42.55pt;mso-add-space:auto;tab-stops:1.0cm;text-indent:-7.1pt;\"><o:p></o:p></p>', 10, 'fa fa-edit', '1', '2023-03-20 17:00:00', '2023-03-26 10:42:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `edd_upload_dokumen`
--

CREATE TABLE `edd_upload_dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `nm_dokumen` varchar(100) NOT NULL,
  `file_dokumen` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `edd_upload_dokumen`
--

INSERT INTO `edd_upload_dokumen` (`id_dokumen`, `nm_dokumen`, `file_dokumen`, `created_at`, `updated_at`) VALUES
(19, 'Pergub', '230504122619.docx', '2023-05-03 17:26:19', '2023-05-03 17:38:36'),
(20, 'perda', '230504122951.pdf', '2023-05-03 17:29:51', '2023-05-03 17:38:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `edd_upload_dokumen_laman`
--

CREATE TABLE `edd_upload_dokumen_laman` (
  `id_dokumen` int(11) NOT NULL,
  `nm_dokumen` varchar(100) NOT NULL,
  `file_dokumen` text NOT NULL,
  `ket_dokumen` text NOT NULL,
  `tahun_dokumen` int(4) NOT NULL,
  `id_laman` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `edd_upload_dokumen_laman`
--

INSERT INTO `edd_upload_dokumen_laman` (`id_dokumen`, `nm_dokumen`, `file_dokumen`, `ket_dokumen`, `tahun_dokumen`, `id_laman`, `created_at`, `updated_at`) VALUES
(19, 'Pergubss', '230504122619.docx', 'asdada', 2023, 8, '2023-05-03 17:26:19', '2023-05-03 17:26:19'),
(20, 'hhh', '230504122951.pdf', 'sdfsd', 2021, 8, '2023-05-03 17:29:51', '2023-05-03 17:29:51'),
(21, 'sad', '230504105944.pdf', 'dsa', 2016, 17, '2023-05-04 15:59:44', '2023-05-04 15:59:44'),
(22, 'aaaaaaaaa', '230504110001.pdf', 'Dalam contoh di atas, d-m-Y adalah format tanggal dengan urutan hari-bulan-tahun, sedangkan H:i adalah format waktu dalam format 24 jam.\r\nSaat pengguna mengirimkan formulir, Anda bisa menyimpan data tanggal dan waktu ke dalam', 2015, 17, '2023-05-04 16:00:01', '2023-05-05 17:17:00'),
(23, 'asd', '230505012921.pdf', 'da', 2021, 22, '2023-05-05 06:29:21', '2023-05-05 06:29:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `edd_upload_gambar_laman`
--

CREATE TABLE `edd_upload_gambar_laman` (
  `id_gambar` int(11) NOT NULL,
  `nm_gambar` varchar(225) NOT NULL,
  `file_gambar` text NOT NULL,
  `id_laman` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `edd_upload_gambar_laman`
--

INSERT INTO `edd_upload_gambar_laman` (`id_gambar`, `nm_gambar`, `file_gambar`, `id_laman`, `created_at`, `updated_at`) VALUES
(26, 'Inovasi Pelayanan Publik Tahun 2020', '230503113742.jpeg', 7, '2023-05-03 16:37:42', '2023-05-03 16:37:42'),
(27, 'asdsa', '230504122818.jpg', 5, '2023-05-03 17:28:18', '2023-05-03 17:28:18'),
(30, 'Inovasi Pelayanan Publik Tahun 2020', '230504104704.jpeg', 16, '2023-05-04 15:47:04', '2023-05-04 15:47:04'),
(31, 'Struktur Organisasi', '230504104851.jpg', 14, '2023-05-04 15:48:51', '2023-05-04 15:48:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `set_menu`
--

CREATE TABLE `set_menu` (
  `id_menu` int(11) NOT NULL,
  `kode_menu` varchar(50) NOT NULL,
  `nm_menu` varchar(225) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `status_actived` enum('1','2') NOT NULL,
  `icon_menu` varchar(225) NOT NULL,
  `level_menu` enum('1','2','3') NOT NULL,
  `id_laman` int(11) DEFAULT NULL COMMENT 'NULL = belum ada laman yang di isi/ di mapping,\r\n\r\n0 = di gunakan untuk menu dropdown level 1, ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `set_menu`
--

INSERT INTO `set_menu` (`id_menu`, `kode_menu`, `nm_menu`, `no_urut`, `status_actived`, `icon_menu`, `level_menu`, `id_laman`, `created_at`, `updated_at`) VALUES
(1, '1', 'Profil', 1, '1', 'fa fa-clone', '1', 0, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(2, '2', 'Program Kerja', 2, '1', 'fa fa-clone', '1', 0, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(3, '3', 'Regulasi', 3, '1', 'fa fa-clone', '1', 0, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(4, '4', 'Pelayanan', 5, '1', 'fa fa-clone', '1', 0, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(5, '5', 'Laporan', 6, '1', 'fa fa-clone', '1', 0, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(6, '6', 'Galeri', 7, '1', 'fa fa-clone', '1', 0, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(7, '7', 'Unduhan', 8, '1', 'fa fa-clone', '1', 0, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(8, '8', 'Tautan', 9, '2', 'fa fa-clone', '1', 0, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(9, '9', 'Kontak', 10, '1', 'fa fa-clone', '1', 9, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(10, '1.1', 'Profil Pimpinan', 1, '1', 'fa fa-clone', '2', 10, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(11, '1.2', 'Motto', 2, '1', 'fa fa-clone', '2', 11, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(12, '1.3', 'Visi & Misi', 3, '1', 'fa fa-clone', '2', 12, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(13, '1.4', 'Maklumat Pelayanan', 4, '1', 'fa fa-clone', '2', 13, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(14, '1.5', 'Struktur Organisasi', 5, '1', 'fa fa-clone', '2', 14, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(15, '1.6', 'Tugas & Fungsi', 6, '1', 'fa fa-clone', '2', 0, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(16, '1.7', 'Penghargaan', 7, '1', 'fa fa-clone', '2', 16, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(17, '1.8', 'LHKPN', 8, '1', 'fa fa-clone', '2', 17, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(18, '2.1', 'Standar Operasional Prosedur', 1, '1', 'fa fa-clone', '2', 0, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(19, '2.1.1', 'SOP Bagian Pengelolaan Pengadaan Barang dan Jasa', 1, '1', 'fa fa-clone', '3', 19, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(20, '2.1.2', 'SOP Bagian Pengelolaan LPSE', 2, '1', 'fa fa-clone', '3', 20, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(21, '2.1.3', 'SOP Bagian Pembinaan dan Advokasi', 3, '1', 'fa fa-clone', '3', 21, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(22, '2.2', 'Rencana Umum Pengadaan', 2, '1', 'fa fa-clone', '2', 22, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(23, '2.3', 'Rencana Aksi', 3, '1', 'fa fa-clone', '2', 23, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(24, '2.4', 'Dokumen Renstra', 4, '1', 'fa fa-clone', '2', 24, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(25, '2.5', 'Dokumen Renja', 5, '1', 'fa fa-clone', '2', 25, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(26, '2.6', 'Cascading', 6, '1', 'fa fa-clone', '2', 26, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(27, '2.7', 'Indikator Kinerja Utama', 7, '1', 'fa fa-clone', '2', 27, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(28, '2.8', 'Perjanjian Kerja', 8, '1', 'fa fa-clone', '2', 28, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(29, '3.1', 'Instruksi Presiden', 8, '1', 'fa fa-clone', '2', 29, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(30, '3.2', 'Daerah', 8, '1', 'fa fa-clone', '2', 0, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(31, '3.2.1', 'Peraturan Gubernur', 8, '1', 'fa fa-clone', '3', 31, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(32, '3.2.2', 'Keputusan Gubernur', 8, '1', 'fa fa-clone', '3', 32, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(33, '3.2.3', 'Instruksi Gubernur', 8, '1', 'fa fa-clone', '3', 33, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(34, '3.2.4', 'Surat Edaran Gubernur', 8, '1', 'fa fa-clone', '3', 34, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(35, '3.2.5', 'Surat Sekda', 8, '1', 'fa fa-clone', '3', 35, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(36, '3.3', 'LKPP', 8, '1', 'fa fa-clone', '2', 0, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(37, '3.3.1', 'Peraturan Presiden', 8, '1', 'fa fa-clone', '3', 37, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(38, '3.3.2', 'Peraturan Lembaga', 8, '1', 'fa fa-clone', '3', 38, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(39, '3.3.3', 'Keputusan Kepala LKPP', 8, '1', 'fa fa-clone', '3', 39, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(40, '3.3.4', 'Keputusan Deputi I', 8, '1', 'fa fa-clone', '3', 40, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(41, '3.3.5', 'Keputusan Deputi II', 8, '1', 'fa fa-clone', '3', 41, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(42, '3.3.6', 'Keputusan Deputi III', 8, '1', 'fa fa-clone', '3', 42, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(43, '3.3.7', 'Keputusan Deputi IV', 8, '1', 'fa fa-clone', '3', 43, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(44, '3.3.8', 'Surat Edaran Bersama', 8, '1', 'fa fa-clone', '3', 44, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(45, '3.3.9', 'Surat Edaran Deputi', 8, '1', 'fa fa-clone', '3', 45, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(46, '3.3.10', 'Surat Edaran Deputi II', 8, '1', 'fa fa-clone', '3', 46, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(47, '3.3.11', 'Surat Edaran Kepala LKPP', 8, '1', 'fa fa-clone', '3', 47, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(48, '3.3.12', 'Nota Kesepahaman', 8, '1', 'fa fa-clone', '3', 48, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(49, '3.4', 'PUPR', 8, '1', 'fa fa-clone', '2', 49, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(50, '4.1', 'Standar Layanan', 8, '1', 'fa fa-clone', '2', 50, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(51, '4.2', 'Produk / Jenis Pelayanan', 8, '1', 'fa fa-clone', '2', 51, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(52, '4.3', 'Form Pengaduan', 8, '1', 'fa fa-clone', '2', 52, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(53, '4.4', 'Form Pertanyaan', 8, '2', 'fa fa-clone', '2', 53, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(54, '4.5', 'Form Kritik dan Saran', 8, '1', 'fa fa-clone', '2', 54, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(55, '4.6', 'Form Permintaan Layanan', 8, '2', 'fa fa-clone', '2', 55, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(56, '4.7', 'Form Pemyampaian Surat', 8, '2', 'fa fa-clone', '2', 56, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(57, '5.1', 'Pelayanan', 8, '1', 'fa fa-clone', '2', 57, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(58, '5.2', 'Pengaduan', 8, '1', 'fa fa-clone', '2', 58, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(59, '5.3', 'Survey Kepuasan Masyarakat', 8, '1', 'fa fa-clone', '2', 59, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(60, '5.4', 'Kinerja', 8, '1', 'fa fa-clone', '2', 60, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(61, '5.5', 'Realisasi Pengadaan', 8, '1', 'fa fa-clone', '2', 61, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(62, '5.6', 'SKM (EKSTERNAL)', 8, '1', 'fa fa-clone', '2', 62, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(63, '5.7', 'SKM (INTERNAL)', 8, '1', 'fa fa-clone', '2', 63, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(64, '6.1', 'Photo', 8, '1', 'fa fa-clone', '2', 64, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(65, '6.2', 'Video', 8, '1', 'fa fa-clone', '2', 65, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(66, '7.1', 'Persentasi', 8, '1', 'fa fa-clone', '2', 66, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(67, '7.2', 'User Guide', 8, '1', 'fa fa-clone', '2', 67, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(68, '7.3', 'Infografis', 8, '1', 'fa fa-clone', '2', 68, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(69, '7.4', 'FAQ', 8, '1', 'fa fa-clone', '2', 69, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(70, '1.6.2', 'Bagian Pengelolaan Barang/ Jasa', 6, '1', 'fa fa-clone', '3', 70, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(71, '1.6.3', 'Bagian Pengelolaan Layanan Pengadaan Secara Elektronik', 6, '1', 'fa fa-clone', '3', 71, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(72, '1.6.4', 'Bagian Pembinaan dan Advokasi Pengadaan Barang/ Jasa ', 6, '1', 'fa fa-clone', '3', 72, '2023-04-28 07:49:28', '2023-04-28 07:49:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `set_menu2`
--

CREATE TABLE `set_menu2` (
  `id_menu` int(11) NOT NULL,
  `kode_menu` varchar(50) NOT NULL,
  `nm_menu` varchar(225) NOT NULL,
  `slug_menu` text NOT NULL,
  `no_urut` int(11) NOT NULL,
  `status_actived` enum('1','2') NOT NULL,
  `icon_menu` varchar(225) NOT NULL,
  `level_menu` enum('1','2','3') NOT NULL,
  `id_laman` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `set_menu2`
--

INSERT INTO `set_menu2` (`id_menu`, `kode_menu`, `nm_menu`, `slug_menu`, `no_urut`, `status_actived`, `icon_menu`, `level_menu`, `id_laman`, `created_at`, `updated_at`) VALUES
(1, '1', 'Profil', 'profil', 1, '1', 'fa fa-clone', '1', 0, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(2, '2', 'Program Kerja', 'program-kerja', 2, '1', 'fa fa-clone', '1', 0, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(3, '3', 'Regulasi', 'regulasi', 3, '1', 'fa fa-clone', '1', 0, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(4, '4', 'Pelayanan', 'pelayanan', 5, '1', 'fa fa-clone', '1', 0, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(5, '5', 'Laporan', 'laporan', 6, '1', 'fa fa-clone', '1', 0, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(6, '6', 'Galeri', 'galeri', 7, '1', 'fa fa-clone', '1', 0, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(7, '7', 'Unduhan', 'umduhan', 8, '1', 'fa fa-clone', '1', 0, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(8, '8', 'Tautan', 'tautan', 9, '1', 'fa fa-clone', '1', 0, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(9, '9', 'Kontak', 'kontak', 10, '1', 'fa fa-clone', '1', 0, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(10, '1.1', 'Profil Pimpinan', 'profil-pimpinan', 1, '1', 'fa fa-clone', '2', 1, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(11, '1.2', 'Motto', 'motto', 2, '1', 'fa fa-clone', '2', 2, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(12, '1.3', 'Visi & Misi', 'visi-misi', 3, '1', 'fa fa-clone', '2', 3, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(13, '1.4', 'Maklumat Pelayanan', 'maklumat-pelayanan', 4, '1', 'fa fa-clone', '2', 4, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(14, '1.5', 'Struktur Organisasi', 'struktur-organisasi', 5, '1', 'fa fa-clone', '2', 5, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(15, '1.6', 'Tugas & Fungsi', 'tugas-fungsi', 6, '1', 'fa fa-clone', '2', 6, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(16, '1.7', 'Penghargaan', 'penghargaan', 7, '1', 'fa fa-clone', '2', 7, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(17, '1.8', 'LHKPN', 'lhkpn', 8, '1', 'fa fa-clone', '2', 8, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(18, '2.1', 'Standar Operasional Prosedur', 'standar-operasional-prosedur', 1, '1', 'fa fa-clone', '2', 0, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(19, '2.1.1', 'SOP Bagian Pengelolaan Pengadaan Barang dan Jasa', 'sop-bagian-pengelolaan-pengadaan-barang-dan-jasa', 1, '1', 'fa fa-clone', '3', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(20, '2.1.2', 'SOP Bagian Pengelolaan LPSE', 'sop-bagian-pengelolaan-lpse', 2, '1', 'fa fa-clone', '3', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(21, '2.1.3', 'SOP Bagian Pembinaan dan Advokasi', 'sop-bagian-pembinaan-dan-advokasi', 3, '1', 'fa fa-clone', '3', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(22, '2.2', 'Rencana Umum Pengadaan', 'rencana-umum-pengadaan', 2, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(23, '2.3', 'Rencana Aksi', 'rencana-aksi', 3, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(24, '2.4', 'Dokumen Renstra', 'dokumen-renstra', 4, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(25, '2.5', 'Dokumen Renja', 'dokumen-renja', 5, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(26, '2.6', 'Cascading', 'cascading', 6, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(27, '2.7', 'Indikator Kinerja Utama', 'indikator-kinerja-utama', 7, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(28, '2.8', 'Perjanjian Kerja', 'perjanjian-kerja', 8, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(29, '3.1', 'Instruksi Presiden', 'instruksi-presiden', 8, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(30, '3.2', 'Daerah', 'daerah', 8, '1', 'fa fa-clone', '2', 0, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(31, '3.2.1', 'Peraturan Gubernur', 'peraturan-gubernur', 8, '1', 'fa fa-clone', '3', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(32, '3.2.2', 'Keputusan Gubernur', 'keputusan-gubernur', 8, '1', 'fa fa-clone', '3', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(33, '3.2.3', 'Instruksi Gubernur', 'instruksi-gubernur', 8, '1', 'fa fa-clone', '3', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(34, '3.2.4', 'Surat Edaran Gubernur', 'surat-edaran-gubernur', 8, '1', 'fa fa-clone', '3', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(35, '3.2.5', 'Surat Sekda', 'surat-sekda', 8, '1', 'fa fa-clone', '3', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(36, '3.3', 'LKPP', 'lkpp', 8, '1', 'fa fa-clone', '2', 0, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(37, '3.3.1', 'Peraturan Presiden', 'peraturan-presiden', 8, '1', 'fa fa-clone', '3', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(38, '3.3.2', 'Peraturan Lembaga', 'peraturan-lembaga', 8, '1', 'fa fa-clone', '3', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(39, '3.3.3', 'Keputusan Kepala LKPP', 'keputusan-kepala-lkpp', 8, '1', 'fa fa-clone', '3', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(40, '3.3.4', 'Keputusan Deputi I', 'keputusan-deputi-i', 8, '1', 'fa fa-clone', '3', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(41, '3.3.5', 'Keputusan Deputi II', 'keputusan-deputi-ii', 8, '1', 'fa fa-clone', '3', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(42, '3.3.6', 'Keputusan Deputi III', 'keputusan-deputi-iii', 8, '1', 'fa fa-clone', '3', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(43, '3.3.7', 'Keputusan Deputi IV', 'keputusan-deputi-iv', 8, '1', 'fa fa-clone', '3', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(44, '3.3.8', 'Surat Edaran Bersama', 'surat-edaran-bersama', 8, '1', 'fa fa-clone', '3', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(45, '3.3.9', 'Surat Edaran Deputi', 'surat-edaran-deputi', 8, '1', 'fa fa-clone', '3', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(46, '3.3.10', 'Surat Edaran Deputi II', 'surat-edaran-deputi-ii', 8, '1', 'fa fa-clone', '3', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(47, '3.3.11', 'Surat Edaran Kepala LKPP', 'surat-edaran-kepala-lkpp', 8, '1', 'fa fa-clone', '3', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(48, '3.3.12', 'Nota Kesepahaman', 'nota-kesepahaman', 8, '1', 'fa fa-clone', '3', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(49, '3.4', 'PUPR', 'pupr', 8, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(50, '4.1', 'Standar Layanan', 'standar-layanan', 8, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(51, '4.2', 'Produk / Jenis Pelayanan', 'produk-jenis-pelayanan', 8, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(52, '4.3', 'Form Pengaduan', 'form-pengaduan', 8, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(53, '4.4', 'Form Pertanyaan', 'form-pertanyaan', 8, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(54, '4.5', 'Form Saran dan Usulan', 'form-saran-dan-usulan', 8, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(55, '4.6', 'Form Permintaan Layanan', 'form-permintaan-layanan', 8, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(56, '4.7', 'Form Pemyampaian Surat', 'form-peyampaian-surat', 8, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(57, '5.1', 'Pelayanan', 'pelayanan', 8, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(58, '5.2', 'Pengaduan', 'pengaduan', 8, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(59, '5.3', 'Survey Kepuasan Masyarakat', 'survey-kepuasan-masyarakat', 8, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(60, '5.4', 'Kinerja', 'kinerja', 8, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(61, '5.5', 'Realisasi Pengadaan', 'realisasi-pengadaan', 8, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(62, '5.6', 'SKM (EKSTERNAL)', 'skm-eksternal', 8, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(63, '5.7', 'SKM (INTERNAL)', 'skm-internal', 8, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(64, '6.1', 'Foto', 'foto', 8, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(65, '6.2', 'Video', 'video', 8, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(66, '7.1', 'Persentasi', 'persentasi', 8, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(67, '7.2', 'User Guide', 'user-guide', 8, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(68, '7.3', 'Infografis', 'infografis', 8, '1', 'fa fa-clone', '2', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28'),
(69, '7.4', 'FAQ', 'faq', 8, '1', 'fa fa-clone', '3', NULL, '2023-04-28 07:49:28', '2023-04-28 07:49:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_post`
--

CREATE TABLE `ta_post` (
  `post_kd` int(8) NOT NULL,
  `post_title` text NOT NULL,
  `slug_title` text NOT NULL,
  `post_thumbnail` text NOT NULL,
  `post_content` longtext NOT NULL,
  `post_status` enum('1','2') NOT NULL COMMENT '(1=publish)(2=draf)(3=Tamp Trash)(4=Delete Permanen)',
  `tgl_terbit` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `ta_post`
--

INSERT INTO `ta_post` (`post_kd`, `post_title`, `slug_title`, `post_thumbnail`, `post_content`, `post_status`, `tgl_terbit`, `created_at`, `updated_at`) VALUES
(66, 'sosialisas kemendagri', 'sosialisas-kemendagri', '230506115157.jpg', '<p>bbb</p>', '1', '2023-03-22 13:54:00', '2023-05-05 06:54:34', '2023-05-06 04:51:57'),
(68, 'bbbbbbkkkkkksasadaaaaaaaaaaaa', 'bbbbbb', '230505115842.JPG', '<p>ddddkkkcxv</p>', '1', '2020-01-31 18:15:00', '2023-05-05 15:57:25', '2023-05-06 04:34:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_post_categori_relationships`
--

CREATE TABLE `ta_post_categori_relationships` (
  `relationships_kd` int(8) NOT NULL,
  `id_kategori` int(8) NOT NULL,
  `post_kd` int(8) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `ta_post_categori_relationships`
--

INSERT INTO `ta_post_categori_relationships` (`relationships_kd`, `id_kategori`, `post_kd`, `created_at`, `updated_at`) VALUES
(54, 63, 20, '2023-03-23 18:37:17', '2023-03-23 18:37:17'),
(55, 64, 20, '2023-03-23 18:37:17', '2023-03-23 18:37:17'),
(56, 65, 20, '2023-03-23 18:37:17', '2023-03-23 18:37:17'),
(57, 66, 20, '2023-03-23 18:37:17', '2023-03-23 18:37:17'),
(134, 66, 22, '2023-03-29 17:13:14', '2023-03-29 17:13:14'),
(135, 63, 43, '2023-03-29 18:39:49', '2023-03-29 18:39:49'),
(136, 64, 43, '2023-03-29 18:39:49', '2023-03-29 18:39:49'),
(137, 63, 44, '2023-04-07 06:04:01', '2023-04-07 06:04:01'),
(142, 63, 45, '2023-04-08 06:20:13', '2023-04-08 06:20:13'),
(144, 63, 55, '2023-04-11 18:17:55', '2023-04-11 18:17:55'),
(212, 63, 59, '2023-04-28 04:50:47', '2023-04-28 04:50:47'),
(213, 64, 59, '2023-04-28 04:50:47', '2023-04-28 04:50:47'),
(223, 63, 64, '2023-04-30 17:42:11', '2023-04-30 17:42:11'),
(224, 64, 64, '2023-04-30 17:42:11', '2023-04-30 17:42:11'),
(225, 65, 64, '2023-04-30 17:42:11', '2023-04-30 17:42:11'),
(252, 64, 66, '2023-05-05 07:45:54', '2023-05-05 07:45:54'),
(253, 66, 66, '2023-05-05 07:45:55', '2023-05-05 07:45:55'),
(271, 65, 68, '2023-05-05 16:23:45', '2023-05-05 16:23:45'),
(272, 63, 68, '2023-05-05 16:24:07', '2023-05-05 16:24:07'),
(273, 64, 68, '2023-05-05 16:24:07', '2023-05-05 16:24:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_post_histori_view_count`
--

CREATE TABLE `ta_post_histori_view_count` (
  `id` int(11) NOT NULL,
  `post_kd` int(11) NOT NULL,
  `ip_address` text NOT NULL,
  `hostname` text NOT NULL,
  `user_agent` text NOT NULL,
  `referer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `ta_post_histori_view_count`
--

INSERT INTO `ta_post_histori_view_count` (`id`, `post_kd`, `ip_address`, `hostname`, `user_agent`, `referer`, `created_at`, `updated_at`) VALUES
(1, 23, '127.0.0.1', 'DESKTOP-AV54JSG', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', 'http://localhost:8000/', '2023-03-30 02:06:12', '2023-03-30 02:06:12'),
(2, 43, '127.0.0.1', 'DESKTOP-AV54JSG', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', 'http://localhost/laravel-simulasi/public/', '2023-03-30 07:16:56', '2023-03-30 07:16:56'),
(3, 23, '127.0.0.1', 'DESKTOP-AV54JSG', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', 'http://localhost/laravel-simulasi/public/page/kontak', '2023-04-04 16:10:23', '2023-04-04 16:10:23'),
(4, 60, '127.0.0.1', 'DESKTOP-AV54JSG', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', 'http://localhost:8000/', '2023-04-28 02:22:18', '2023-04-28 02:22:18'),
(5, 59, '127.0.0.1', 'DESKTOP-AV54JSG', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', 'http://localhost:8000/', '2023-04-28 04:45:11', '2023-04-28 04:45:11'),
(6, 59, '127.0.0.1', 'DESKTOP-AV54JSG', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', 'http://localhost:8000/', '2023-04-29 07:33:01', '2023-04-29 07:33:01'),
(7, 28, '127.0.0.1', 'DESKTOP-AV54JSG', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', 'http://localhost:8000/', '2023-05-05 06:34:53', '2023-05-05 06:34:53'),
(8, 66, '127.0.0.1', 'DESKTOP-AV54JSG', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', 'http://localhost:8000/', '2023-05-05 16:59:37', '2023-05-05 16:59:37'),
(9, 66, '127.0.0.1', 'DESKTOP-AV54JSG', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', 'http://localhost:8000/', '2023-05-05 18:46:23', '2023-05-05 18:46:23'),
(10, 68, '127.0.0.1', 'DESKTOP-AV54JSG', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', 'http://localhost:8000/', '2023-05-06 04:34:23', '2023-05-06 04:34:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(5) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dev', 'dev@gmail.com', '2023-02-25 17:44:11', '$2y$10$RN4jC2K6D209YPDUyTOXPOKFGGPcBPJpU8R.EM58.Gw2CPyVko2fm', '1', NULL, '2023-02-25 17:44:54', '2023-05-06 16:49:11'),
(3, 'admin', 'admin@gmail.com', '2023-02-25 17:44:11', '$2y$10$mwkrr.d49EW2gIJOB37b7eTEBW.5nqiBkGccf5AcCAEDyKsXeXSoe', '1', NULL, '2023-02-25 17:44:54', '2023-03-21 10:47:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `zzz_histori_login`
--

CREATE TABLE `zzz_histori_login` (
  `id` int(11) NOT NULL,
  `ip_address` text NOT NULL,
  `hostname` text NOT NULL,
  `user_agent` text NOT NULL,
  `referer` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `zzz_histori_login`
--

INSERT INTO `zzz_histori_login` (`id`, `ip_address`, `hostname`, `user_agent`, `referer`, `id_user`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', 'DESKTOP-AV54JSG', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', 'http://localhost:8000/login', 1, '2023-05-04 19:18:43', '2023-05-05 19:18:43'),
(2, '127.0.0.1', 'DESKTOP-AV54JSG', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', 'http://localhost:8000/login', 1, '2023-05-05 19:19:04', '2023-05-05 19:19:04'),
(3, '127.0.0.1', 'DESKTOP-AV54JSG', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', 'http://localhost:8000/login', 1, '2023-05-06 04:17:21', '2023-05-06 04:17:21'),
(4, '127.0.0.1', 'DESKTOP-AV54JSG', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', 'http://localhost:8000/login', 1, '2023-05-06 04:53:42', '2023-05-06 04:53:42'),
(5, '127.0.0.1', 'DESKTOP-AV54JSG', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', 'http://localhost:8000/login', 1, '2023-05-06 14:53:44', '2023-05-06 14:53:44'),
(6, '127.0.0.1', 'DESKTOP-AV54JSG', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 'http://localhost:8000/login', 1, '2023-05-06 15:05:11', '2023-05-06 15:05:11'),
(7, '127.0.0.1', 'DESKTOP-AV54JSG', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', 'http://localhost:8000/login', 1, '2023-05-06 16:45:04', '2023-05-06 16:45:04'),
(8, '127.0.0.1', 'DESKTOP-AV54JSG', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', 'http://localhost:8000/login', 3, '2023-05-06 16:46:17', '2023-05-06 16:46:17'),
(9, '127.0.0.1', 'DESKTOP-AV54JSG', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', 'http://localhost:8000/login', 1, '2023-05-06 16:48:33', '2023-05-06 16:48:33'),
(10, '127.0.0.1', 'DESKTOP-AV54JSG', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', 'http://localhost:8000/login', 1, '2023-05-06 16:49:24', '2023-05-06 16:49:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `zzz_histori_pengunjung`
--

CREATE TABLE `zzz_histori_pengunjung` (
  `id` int(11) NOT NULL,
  `ip_address` text NOT NULL,
  `hostname` text NOT NULL,
  `user_agent` text NOT NULL,
  `referer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `zzz_histori_pengunjung`
--

INSERT INTO `zzz_histori_pengunjung` (`id`, `ip_address`, `hostname`, `user_agent`, `referer`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.2', 'DESKTOP-AV54JSG', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', 'http://localhost:8000/postdetail/sosialisas-kemendagri', '2023-04-05 19:02:17', '2023-05-05 19:02:17'),
(2, '127.0.0.6', 'DESKTOP-AV54JSG', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', 'http://localhost:8000/', '2023-05-05 19:02:51', '2023-05-05 19:02:51'),
(3, '127.0.0.1', 'DESKTOP-AV54JSG', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', 'http://localhost:8000/page/kontak', '2023-05-05 19:08:19', '2023-05-05 19:08:19');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cpar_kategori`
--
ALTER TABLE `cpar_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `cpar_kategori_pengaduan`
--
ALTER TABLE `cpar_kategori_pengaduan`
  ADD PRIMARY KEY (`id_kategori_pengaduan`);

--
-- Indeks untuk tabel `cpar_link_terkait`
--
ALTER TABLE `cpar_link_terkait`
  ADD PRIMARY KEY (`id_link`);

--
-- Indeks untuk tabel `cpar_slide_show`
--
ALTER TABLE `cpar_slide_show`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indeks untuk tabel `ddd_galeri_photo`
--
ALTER TABLE `ddd_galeri_photo`
  ADD PRIMARY KEY (`id_galeri_photo`);

--
-- Indeks untuk tabel `ddd_galeri_photo_detail`
--
ALTER TABLE `ddd_galeri_photo_detail`
  ADD PRIMARY KEY (`id_galeri_photo_detail`);

--
-- Indeks untuk tabel `ddd_galeri_video`
--
ALTER TABLE `ddd_galeri_video`
  ADD PRIMARY KEY (`id_galeri_video`);

--
-- Indeks untuk tabel `ddh_kritik_saran`
--
ALTER TABLE `ddh_kritik_saran`
  ADD PRIMARY KEY (`id_kritik_saran`);

--
-- Indeks untuk tabel `ddh_pengaduan`
--
ALTER TABLE `ddh_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `dhh_laman`
--
ALTER TABLE `dhh_laman`
  ADD PRIMARY KEY (`id_laman`);

--
-- Indeks untuk tabel `edd_upload_dokumen`
--
ALTER TABLE `edd_upload_dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indeks untuk tabel `edd_upload_dokumen_laman`
--
ALTER TABLE `edd_upload_dokumen_laman`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indeks untuk tabel `edd_upload_gambar_laman`
--
ALTER TABLE `edd_upload_gambar_laman`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `set_menu`
--
ALTER TABLE `set_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `set_menu2`
--
ALTER TABLE `set_menu2`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `ta_post`
--
ALTER TABLE `ta_post`
  ADD PRIMARY KEY (`post_kd`);

--
-- Indeks untuk tabel `ta_post_categori_relationships`
--
ALTER TABLE `ta_post_categori_relationships`
  ADD PRIMARY KEY (`relationships_kd`);

--
-- Indeks untuk tabel `ta_post_histori_view_count`
--
ALTER TABLE `ta_post_histori_view_count`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `zzz_histori_login`
--
ALTER TABLE `zzz_histori_login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `zzz_histori_pengunjung`
--
ALTER TABLE `zzz_histori_pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cpar_kategori`
--
ALTER TABLE `cpar_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `cpar_kategori_pengaduan`
--
ALTER TABLE `cpar_kategori_pengaduan`
  MODIFY `id_kategori_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `cpar_link_terkait`
--
ALTER TABLE `cpar_link_terkait`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `cpar_slide_show`
--
ALTER TABLE `cpar_slide_show`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `ddd_galeri_photo`
--
ALTER TABLE `ddd_galeri_photo`
  MODIFY `id_galeri_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `ddd_galeri_photo_detail`
--
ALTER TABLE `ddd_galeri_photo_detail`
  MODIFY `id_galeri_photo_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `ddd_galeri_video`
--
ALTER TABLE `ddd_galeri_video`
  MODIFY `id_galeri_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ddh_kritik_saran`
--
ALTER TABLE `ddh_kritik_saran`
  MODIFY `id_kritik_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ddh_pengaduan`
--
ALTER TABLE `ddh_pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `dhh_laman`
--
ALTER TABLE `dhh_laman`
  MODIFY `id_laman` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT untuk tabel `edd_upload_dokumen`
--
ALTER TABLE `edd_upload_dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `edd_upload_dokumen_laman`
--
ALTER TABLE `edd_upload_dokumen_laman`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `edd_upload_gambar_laman`
--
ALTER TABLE `edd_upload_gambar_laman`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `set_menu`
--
ALTER TABLE `set_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `set_menu2`
--
ALTER TABLE `set_menu2`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `ta_post`
--
ALTER TABLE `ta_post`
  MODIFY `post_kd` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `ta_post_categori_relationships`
--
ALTER TABLE `ta_post_categori_relationships`
  MODIFY `relationships_kd` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- AUTO_INCREMENT untuk tabel `ta_post_histori_view_count`
--
ALTER TABLE `ta_post_histori_view_count`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `zzz_histori_login`
--
ALTER TABLE `zzz_histori_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `zzz_histori_pengunjung`
--
ALTER TABLE `zzz_histori_pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
