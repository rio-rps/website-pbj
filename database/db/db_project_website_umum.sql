-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Mar 2023 pada 10.35
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
-- Struktur dari tabel `access_user`
--

CREATE TABLE `access_user` (
  `id_user` int(8) NOT NULL,
  `nm_user` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `akseslevel` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `access_user`
--

INSERT INTO `access_user` (`id_user`, `nm_user`, `email`, `password`, `akseslevel`) VALUES
(1, 'Rio Pranata Saputras', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dd_slide_show`
--

CREATE TABLE `dd_slide_show` (
  `id_slide_show` int(11) NOT NULL,
  `nm_slide_show` varchar(100) NOT NULL,
  `upload_slide` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Struktur dari tabel `ref_category`
--

CREATE TABLE `ref_category` (
  `category_kd` int(8) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_information` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `ref_category`
--

INSERT INTO `ref_category` (`category_kd`, `category_name`, `category_information`) VALUES
(1, 'Tidak Ada Kategori', 'Tidak Ada Kategori'),
(63, 'Workshop', 'Workshop Berbagai Wacana'),
(64, 'Kunjungan ', 'Kunjungan Dalam Maupun Luar Daerah'),
(65, 'Pengadaan', 'Pengadaan '),
(66, 'Informasi Publik', 'Informasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `set_menu_profil`
--

CREATE TABLE `set_menu_profil` (
  `id_set_menu_profil` int(4) NOT NULL,
  `set_title` text NOT NULL,
  `set_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `set_menu_profil`
--

INSERT INTO `set_menu_profil` (`id_set_menu_profil`, `set_title`, `set_content`) VALUES
(1, 'Sambutan Kepala Sekolah', '<p><img style=\"float: left;\" src=\"/project/xsekolah_cancel/assets/private/images_profil/Capture.PNG\" width=\"339\" height=\"194\" /></p>\n<p>vccvcvcvcvc</p>\n<p>cghfhfghgfhf</p>'),
(2, 'Visi dan Misi', '<p style=\"text-align: left;\">&nbsp;Rapat Koordinas Yang melibatkan anggota yang ada d ruangan dan sebagaimana <img style=\"float: left;\" src=\"/project/sekolah/assets/private/images_profil/a1.jpg\" width=\"353\" height=\"264\" /></p>'),
(3, 'Sejarah Sekolah', ''),
(4, 'Struktur Organisasi', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `set_web`
--

CREATE TABLE `set_web` (
  `id_set_web` int(4) NOT NULL,
  `set_title` text NOT NULL,
  `set_content` text NOT NULL,
  `set_upload` text NOT NULL,
  `set_jenis` enum('1','2','3') NOT NULL COMMENT '1 = textbook/label, 2 = upload, 3= label/upload',
  `set_option` enum('1','2','3') NOT NULL COMMENT '1 = tidak ada option, 2 = gambar tampil, 3 = gambar hiddden',
  `set_ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `set_web`
--

INSERT INTO `set_web` (`id_set_web`, `set_title`, `set_content`, `set_upload`, `set_jenis`, `set_option`, `set_ket`) VALUES
(5, 'Foto Kepala Dinas (Right Content)', 'file_1615260920.jpeg', '-', '2', '2', 'Halaman Depan'),
(6, 'Nama Kepala Dinas(Right Content)', 'Marlinda Sari, S.si, Apt, M.si', '-', '1', '1', 'Halaman Depan'),
(7, 'Nip Kepala Dinas(Right Content)', '19750326 200503 2006', '-', '1', '1', 'Halaman Depan'),
(100, 'Top Header Marquee (Text Berjalan Header)', 'Selamat Datang di Website \r\n<span>DINAS KESEHATAN KAB. MUSI RAWAS UTARA</span>\r\n Ini Merupakan Situs Resmi \r\n<span>DINAS KESEHATAN KAB. MUSI RAWAS UTARA</span>', '-', '1', '1', 'Halaman Depan'),
(101, 'Logo', 'file_1614739926.jpeg', '-', '2', '2', 'Halaman Depan'),
(102, 'Follow us Facebook (Footer)', 'https://www.facebook.com/dinkes.utara', '-', '1', '1', 'Halaman Depan'),
(103, 'Follow us Twitter (Footer)', 'Twitters', '-', '1', '1', 'Halaman Depan'),
(104, 'Follow us Instagram (Footer)', 'Instagram', '-', '1', '1', 'Halaman Depan'),
(105, 'Follow us Youtobe (Footer)', 'Youtobe', '-', '1', '1', 'Halaman Depan'),
(106, 'Contact us Alamat (Footer)', 'Muara Rupit, Rupit, Kabupaten Musi Rawas, Sumatera Selatan 31654', '-', '1', '1', 'Halaman Depan'),
(107, 'Contact us E-mail (Header & Footer)', 'info@dinkes.muratara.go.id', '-', '1', '1', 'Halaman Depan'),
(108, 'Contact us Telp  (Header & Footer)', '0711-35601811 ', '-', '1', '1', 'Halaman Depan'),
(109, 'Contact us Fax (Footer)', '0711-356018 FAX', '-', '1', '1', 'Halaman Depan'),
(110, 'Location us(Footer)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3985.252299162454!2d102.89656131445236!3d-2.7413939980028896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMsKwNDQnMjkuMCJTIDEwMsKwNTMnNTUuNSJF!5e0!3m2!1sid!2sid!4v1614740013087!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '-', '1', '1', 'Halaman Depan'),
(111, 'Footer Title (Footer)', '2021 DINAS KESEHATAN KAB. MUSI RAWAS UTARA', '-', '1', '1', 'Halaman Depan'),
(112, 'Title Web (Dashboard Admin)', 'DINKES KAB. MUSI RAWAS UTARA', '-', '1', '1', 'Halaman Depan'),
(114, 'Visi dan Misi', '<p>Visi Bupati dan Wakil Bupati Muratara H. M Syarif Hidayat dan H. Devi Suhartoni adalah :</p>\n<p> <strong>“</strong><strong>Terwujudnya Kabupaten Musi Rawas Utara yang Makmur, Aman, Cerdas dan Bermartabat”</strong></p>\n<p><strong> </strong>Misi Bupati dan wakil Bupati Muratara H. M Syarif Hidayat dan H. Devi Suhartoni adalah :</p>\n<p> <strong>Mewujudkan Pendidikan Berkualitas Dan Murah</strong></p>\n<ol>\n<li><strong>Mewujudkan Optimalisasi Lahan Terlantar/Lahan Tidur</strong></li>\n<li><strong>Mewujudkan Infrastruktur Dasar yang Merata dan Berkualitas</strong></li>\n<li><strong>Mewujudkan Hilirisasi Komiditi Unggulan</strong></li>\n<li><strong>Mewujudkan Derajat Kesehatan Masyarakat yang Berkualitas</strong></li>\n<li><strong>Mewujudkan Muratara Bebas Narkoba</strong></li>\n<li><strong>Mewujudkan Tata Kelola Pemerintahan yang Baik</strong></li>\n</ol>\n<p><strong>Mewujudkan Masyarakat yang Mandiri, Santun dan Berakhlak Mulia</strong></p>', 'file_1598093501.jpg', '3', '3', 'Profil'),
(115, 'Tugas Pokok dan Fungsi', '<p>Selaku Pengguna Anggaran dan Pengguna Barang Milik Daerah mempunyai fungsi :</p>\n<ol>\n<li xss=removed>\n<ol>\n<li>Penyusunan Dokumen Pelaksanaan Anggaran (DPA);</li>\n<li>Pelaksanaan Anggaran SKPKD;</li>\n<li>Pelaksanaan pengujian atas tagihan dan memerintahkan pembayaran;</li>\n<li>Pelaksanaan ikatan/perjanjian kerjasama dengan pihak lain;</li>\n<li>Pengelola utang dan piutang yang menjadi tanggung jawab SKPKD;</li>\n<li>Pengawasan pelaksanaan anggaran SKPKD;</li>\n<li>Penyusunan dan penyampaian laporan keuangan SKPKD;</li>\n<li>Pengajuan rencana kebutuhan barang milik daerah SPPKD;</li>\n<li>Pengajuan permohonan penetapan status untuk penguasaan dan penggunaan barang milik daerah yang diperoleh dari beban APBD dan perolehan lainnya yang sah;</li>\n<li>Pelaksanaan pencataan dan inventarisasi barang milik daerah SKPKD;</li>\n<li>Penggunaan barang milik daerah SKPKD;</li>\n<li>Pengamanan dan pemeliharaan barang milik daerah SKPKD;</li>\n<li>Pelaksanaan pengawasan dan pengendalian barang milik daeah SKPKD;</li>\n<li>Penyusunan dan penyampaian laporan barang per semester dan tahunan;</li>\n<li>Pengajuan permohonan penetapan status untuk penguasaan dan penggunaan barang milik daerah yang diperoleh dari beban APBD dan perolehan lainnya yang sah kepada Gubernur melalui pengelola;</li>\n<li>Penggunaan barang milik daerah yang berada dalam penguasaannya untuk kepentingan penyelenggaraaan tugas pokok dan fungsi SKPKD;</li>\n<li>Pengajuan usul pemindahtanganan barang milik daerah berupa tanah dan/atau bangunan yang tidak memerlukan persetujuan DPRD dan barang milik daerah selain tanah dan/atau bangunan kepada Gubernur melalui pengelola;</li>\n<li>Penyerahan tanah dan bangunan yang tidak dimanfaatkan untuk kepentingan tugas pokok dan fungsi SKPKD kepada Gubernur melalui pengelola;</li>\n<li>Penyusunan dan penyampaian Laporan Barang Pengguna Semesteran (LBPS) dan Laporan Barang Pengguna Tahunan (LBPT) SKPKD; dan</li>\n<li>Pelaksanaan tugas lain yang diberikan oleh Gubernur.</li>\n</ol>\n</li>\n</ol>\n<table xss=removed border=\"0\" width=\"99%\" cellspacing=\"0\" cellpadding=\"0\"><colgroup> <col width=\"64\"></colgroup>\n<tbody>\n<tr>\n<td width=\"64\" height=\"84\"> </td>\n</tr>\n</tbody>\n</table>', 'file_1598093501.jpg', '3', '3', 'Profil'),
(116, 'Struktur Organisasi', '-', '-', '2', '2', 'Profil'),
(117, 'Kalender Akademik', 'Kalender Akademik', 'file_1599318651.png', '2', '2', 'Kalender Akademik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `set_web_more`
--

CREATE TABLE `set_web_more` (
  `id_set_web_more` int(4) NOT NULL,
  `set_title_more` text NOT NULL,
  `set_content_more` text NOT NULL,
  `set_jenis_more` enum('1','2') NOT NULL COMMENT '1 = textbook/label, 2 = upload',
  `set_code_web_more` int(4) NOT NULL COMMENT '1 = caursel (slide), 2 = link terkait'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `set_web_more`
--

INSERT INTO `set_web_more` (`id_set_web_more`, `set_title_more`, `set_content_more`, `set_jenis_more`, `set_code_web_more`) VALUES
(11, 'BAPPEDA', 'https://www.muratarakab.go.id/', '1', 2),
(12, 'BADAN KEUANGAN DAERAH', 'https://muratarakab.go.id/', '1', 2),
(13, 'DISKOMINFO', 'https://muratarakab.go.id/', '1', 2),
(14, 'SUMSEL MAJU UNTUK SEMUA SUMSEL MAJU UNTUK SEMUA SUMSEL', 'file_1597819265.jpg', '2', 1),
(15, 'Maju Untuk Semua', 'file_1597819291.jpg', '2', 1),
(21, 'CAPIL', 'https://muratarakab.go.id/', '1', 2),
(22, 'BKPSDM', 'https://muratarakab.go.id/', '1', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_bidang`
--

CREATE TABLE `ta_bidang` (
  `id_bidang` int(8) NOT NULL,
  `nm_bidang` varchar(100) NOT NULL,
  `ket_bidang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `ta_bidang`
--

INSERT INTO `ta_bidang` (`id_bidang`, `nm_bidang`, `ket_bidang`) VALUES
(2, 'Barang Milik Daerah Perwakilan Ogan Ilir Timur', '<p>aaaaaaaass</p>'),
(3, 'Barang Milik Daerah Perwakilan Ogan Ilir Selatan', ''),
(4, 'Barang Milik Daerah', ''),
(5, 'Sekretariat', '<p><strong>FISIOTERAPI</strong> adalah bentuk pelayanan kesehatan yang ditujukan kepada individu dan atau kelompok untuk mengembangkan, memelihara dan memulihkan gerak dan fungsi tubuh sepanjang daur kehidupan dengan menggunakan penanganan secara manual, peningkatan gerak, peralatan (fisik, elektroterapeutis dan mekanis), pelatihan fungsi, serta komunikasi. Fisioterapi berperan aktif dalam memberikan kontribusi terhadap upaya pencapaian derajat kesehatan yang optimal dalam mencegah, intervensi dan pemulihan gangguan gerak fungsional melalui proses fisioterapi.</p>\r\n<p align=\"JUSTIFY\"><strong>PELAYANAN FISIOTERAPI </strong>meliputi tindakan promotif, preventif, kuratif dan rehabilitatif pada berbagai kasus penyakit /gangguan kesehatan seperti : gangguan  otot dan sendi (<em>musculoskeletal</em>), gangguan saraf (neurologi), gangguan THT, gangguan pernafasan dan paru, gangguan tulang (<em>orthopaedic</em>), gangguan kandungan,  <em>pediatric</em> dan <em>geriatric</em>, paska bedah/operasi, <em>sport injury</em>, dan program kebugaran fisik dan lainnya.</p>\r\n<p align=\"JUSTIFY\"><strong>UNIT</strong> <strong>FISIOTERAPI RS JAKARTA</strong> memberikan pelayanan fisioterapi dengan kualitas global yang berorientasi pada kebutuhan pasien serta menggunakan konsep fisioterapi terkini yang didukung oleh fisioterapis yang profesional,  modalitas fisioterapi yang modern, peralatan latihan yang lengkap dan memadai,  serta program terapi yang komprehensif dan edukatif dengan harga yang terjangkau oleh masyarakat.</p>\r\n<p align=\"JUSTIFY\"><strong>JENIS TINDAKAN FISIOTERAPI</strong></p>\r\n<ol>\r\n<li>\r\n<p align=\"JUSTIFY\"><em>Short/Micro Wave Diathermy</em></p>\r\n</li>\r\n<li>\r\n<p align=\"JUSTIFY\"><em>Paraffin Bath</em></p>\r\n</li>\r\n<li>\r\n<p align=\"JUSTIFY\"><em>Ultra Sound</em></p>\r\n</li>\r\n<li>\r\n<p align=\"JUSTIFY\">Inhalasi/<em>Nebulizer/Chest Physiotherapy</em></p>\r\n</li>\r\n<li>\r\n<p align=\"JUSTIFY\"><em>TENS</em></p>\r\n</li>\r\n<li>\r\n<p align=\"JUSTIFY\"> <em>Cold Therapy</em></p>\r\n</li>\r\n<li>\r\n<p align=\"JUSTIFY\"><em>Interferential Therapy</em></p>\r\n</li>\r\n<li>\r\n<p align=\"JUSTIFY\"><em>Exercise Therapy</em></p>\r\n</li>\r\n<li>\r\n<p align=\"JUSTIFY\">Faradisasi/Galvanicasi</p>\r\n</li>\r\n<li>\r\n<p align=\"JUSTIFY\"><em>Sport Medicine</em>/ tes kebugaran fisik</p>\r\n</li>\r\n<li>\r\n<p align=\"JUSTIFY\"><em>Infra Red Radiation</em></p>\r\n</li>\r\n<li>\r\n<p align=\"JUSTIFY\"><a href=\"/project/Informasi/site/detail?module=laman&code=Mg\"><em>Fat analysis</em></a></p>\r\n</li>\r\n<li>\r\n<p align=\"JUSTIFY\">Traksi <em>Lumbal/Cervical</em></p>\r\n</li>\r\n<li>\r\n<p align=\"JUSTIFY\">Senam pencegahan asma dan osteoporosis</p>\r\n</li>\r\n<li>\r\n<p align=\"JUSTIFY\"><em>Manual therapy dan massage</em></p>\r\n</li>\r\n<li>\r\n<p align=\"JUSTIFY\">Edukasi dan konsultasi</p>\r\n</li>\r\n</ol>\r\n<p> </p>\r\n<p align=\"JUSTIFY\"><strong>Pelayanan Fisioterapi RS Jakarta</strong></p>\r\n<p align=\"JUSTIFY\">Hari : Senin-Jumat</p>\r\n<p align=\"JUSTIFY\">Waktu : 08.00 – 20.00 WIB</p>\r\n<p align=\"JUSTIFY\">Hari : Sabtu</p>\r\n<p align=\"JUSTIFY\">Waktu : 09.00 – 19.00 WIB</p>\r\n<p align=\"JUSTIFY\">Hari Minggu & hari libur nasional tutup.</p>\r\n<p>Untuk keterangan lebih lanjut, dapat menghubungi (021) 5732241 ext. 160</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_galeri`
--

CREATE TABLE `ta_galeri` (
  `id_galeri` int(8) NOT NULL,
  `tgl_upload` date NOT NULL,
  `nm_galeri` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `ta_galeri`
--

INSERT INTO `ta_galeri` (`id_galeri`, `tgl_upload`, `nm_galeri`) VALUES
(1, '2022-01-01', 'Galeri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_galeri_detail`
--

CREATE TABLE `ta_galeri_detail` (
  `id_galeri_detail` int(8) NOT NULL,
  `upload_gambar` text NOT NULL,
  `ket_galeri_detail` text NOT NULL,
  `id_galeri` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `ta_galeri_detail`
--

INSERT INTO `ta_galeri_detail` (`id_galeri_detail`, `upload_gambar`, `ket_galeri_detail`, `id_galeri`) VALUES
(1, 'file_1641027929.JPG', 'saaa', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_laman`
--

CREATE TABLE `ta_laman` (
  `id_laman` int(8) NOT NULL,
  `nm_laman` text NOT NULL,
  `ket_laman` text NOT NULL,
  `tgl_laman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `ta_laman`
--

INSERT INTO `ta_laman` (`id_laman`, `nm_laman`, `ket_laman`, `tgl_laman`) VALUES
(2, 'Data Pemda a', '<p>Rekonsiliasi dan Penyusunan  Laporan Keuangan Semester sebagai pelaksanaan kegiatan yang sudah menjadi agenda rutin pada Sub Bagian Pelaporan Keuangan Bagian Akuntansi dan Barang Milik Daerah Provinsi Sumatera Selatan yaitu Konsinyering dan Penyusunan Laporan Keuangan Tahun 2020.</p>\r\n<p><a href=\"http://bpkad.sumselprov.go.id/wp-content/uploads/2021/03/DSC_3000.jpg\"><img class=\" wp-image-1831 aligncenter\" src=\"http://bpkad.sumselprov.go.id/wp-content/uploads/2021/03/DSC_3000-300x200.jpg\" sizes=\"(max-width: 501px) 100vw, 501px\" srcset=\"http://bpkad.sumselprov.go.id/wp-content/uploads/2021/03/DSC_3000-300x200.jpg 300w, http://bpkad.sumselprov.go.id/wp-content/uploads/2021/03/DSC_3000-768x512.jpg 768w, http://bpkad.sumselprov.go.id/wp-content/uploads/2021/03/DSC_3000-1024x683.jpg 1024w, http://bpkad.sumselprov.go.id/wp-content/uploads/2021/03/DSC_3000-400x267.jpg 400w\" alt=\"\" width=\"501\" height=\"334\"></a></p>\r\n<p><a href=\"http://bpkad.sumselprov.go.id/wp-content/uploads/2021/03/DSC_2915.jpg\"><img class=\" wp-image-1832 aligncenter\" src=\"http://bpkad.sumselprov.go.id/wp-content/uploads/2021/03/DSC_2915-300x200.jpg\" sizes=\"(max-width: 501px) 100vw, 501px\" srcset=\"http://bpkad.sumselprov.go.id/wp-content/uploads/2021/03/DSC_2915-300x200.jpg 300w, http://bpkad.sumselprov.go.id/wp-content/uploads/2021/03/DSC_2915-768x512.jpg 768w, http://bpkad.sumselprov.go.id/wp-content/uploads/2021/03/DSC_2915-1024x683.jpg 1024w, http://bpkad.sumselprov.go.id/wp-content/uploads/2021/03/DSC_2915-400x267.jpg 400w\" alt=\"\" width=\"501\" height=\"334\"></a></p>\r\n<p><a href=\"http://bpkad.sumselprov.go.id/wp-content/uploads/2021/03/DSC_2944.jpg\"><img class=\" wp-image-1833 aligncenter\" src=\"http://bpkad.sumselprov.go.id/wp-content/uploads/2021/03/DSC_2944-300x200.jpg\" sizes=\"(max-width: 503px) 100vw, 503px\" srcset=\"http://bpkad.sumselprov.go.id/wp-content/uploads/2021/03/DSC_2944-300x200.jpg 300w, http://bpkad.sumselprov.go.id/wp-content/uploads/2021/03/DSC_2944-768x512.jpg 768w, http://bpkad.sumselprov.go.id/wp-content/uploads/2021/03/DSC_2944-1024x683.jpg 1024w, http://bpkad.sumselprov.go.id/wp-content/uploads/2021/03/DSC_2944-400x267.jpg 400w\" alt=\"\" width=\"503\" height=\"335\"></a></p>\r\n<p> </p>\r\n<p>Penyusunan Laporan Keuangan dan Kosenyering Data Laporan Keuangan Tahun 2020 ini berlangsung dari tanggal 23 s.d 28 Februari 2020 bertempat di Lampung.</p>\r\n<p>Acara tersebut dihadiri oleh Kepala Badan Pengelola Keuangan Aset Daerah H. A Mukhlis, SE, M.Si dan Inspektur oleh Bapak Bambang Wirawan. SE, MM., Ak., CA Provinsi Sumatera Selatan dan tim review Laporan Keuangan 2020 dan Inspektorat Provinsi Sumatera Selatan.</p>\r\n<p> </p>\r\n<p>Adapun OPD yang hadir pada saat acara konsenyering tersebut diantaranya Dinas PU Cipta Karya, Bina Marga, Dinas Kesehatan beserta BLUD, Dinas Lingkungan Hidup beserta BLUD, Dinas Pendidikan  dan Sekertaris Dewan.</p>\r\n<p> </p>\r\n<p>Dihari pertama acara dibuka dengan Rapat Konsolidasi masing masing SKPD dengan tim Review Inspektorat Provinsi Sumatera Selatan oleh Bapak Bambang Wirawan. SE, MM., Ak., CA  bersama Inspektur Daerah Pembantu Wilayah II Bapak Evan, SE.,M.M. M.Si.</p>\r\n<p> </p>\r\n<p>Dihari ke dua Rapat dipimpin langsung oleh Kepala Badan pengelola Keuangan dan Aset Daerah Provinsi Sumatera Selatan Bapak H. A  Mukhlis, SE, M.Si dan Inspektur Provinsi Sumatera Selatan Bambang Wirawan. SE, MM., Ak., CA  dengan acara  Pemaparan dari tim Penyusun Laporan Keuangan Pemerintah Provinsi Sumatera Selatan dan tim Review Inspektorat Provinsi Sumatera Selatan.</p>', '2021-03-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_post`
--

CREATE TABLE `ta_post` (
  `post_kd` int(8) NOT NULL,
  `id_user` int(8) NOT NULL,
  `post_date` date NOT NULL,
  `post_title` text NOT NULL,
  `post_foto` text NOT NULL,
  `post_content` longtext NOT NULL,
  `post_status` enum('1','2','3','4') NOT NULL COMMENT '(1=publish)(2=draf)(3=Tamp Trash)(4=Delete Permanen)',
  `post_input` datetime NOT NULL,
  `name_tbl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `ta_post`
--

INSERT INTO `ta_post` (`post_kd`, `id_user`, `post_date`, `post_title`, `post_foto`, `post_content`, `post_status`, `post_input`, `name_tbl`) VALUES
(1, 1, '2021-03-23', 'Koordinasi dan Sosialisasi', 'file_1616483866.jpg', '<p>sosialisasi di lakukan di gedung <a href=\"/project/Informasi/site/detail?module=laman&code=Mg\">pemerintahan</a> bancir megnakibatkan daerah pemerintahan <a href=\"/project/Informasi/site/detail?module=postdetail&code=Mw\">terendam</a></p>\r\n<p>asdasdasdasdsa <a href=\"/project/Informasi/site/detail?module=postdetail&code=Mw\">aaaaaaaaaaa</a></p>\r\n<p> </p>', '1', '2021-03-25 04:08:51', ''),
(2, 1, '2021-03-25', 'Permasalahan Bancir mengancam', 'file_1616648628.jpg', '<p>Banjir yang mengakibatkan longsor</p>', '1', '2022-11-30 10:01:59', ''),
(3, 1, '2021-03-25', 'aaass', 'file_1616663208.jpg', '<p>sssaaasdaas</p>', '1', '2021-03-25 04:06:48', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_post_categori_relationships`
--

CREATE TABLE `ta_post_categori_relationships` (
  `relationships_kd` int(8) NOT NULL,
  `category_kd` int(8) NOT NULL,
  `post_kd` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `ta_post_categori_relationships`
--

INSERT INTO `ta_post_categori_relationships` (`relationships_kd`, `category_kd`, `post_kd`) VALUES
(15, 65, 3),
(17, 66, 1),
(19, 66, 2),
(20, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_view_count`
--

CREATE TABLE `ta_view_count` (
  `view_count_ID` int(8) NOT NULL,
  `view_relationships_ID` int(8) NOT NULL,
  `view_date` datetime NOT NULL,
  `name_tbl` text NOT NULL,
  `view_ip` text NOT NULL,
  `view_hostname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `ta_view_count`
--

INSERT INTO `ta_view_count` (`view_count_ID`, `view_relationships_ID`, `view_date`, `name_tbl`, `view_ip`, `view_hostname`) VALUES
(1, 1, '2021-03-24 07:54:58', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(2, 1, '2021-03-24 07:56:05', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(3, 1, '2021-03-24 07:56:10', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(4, 1, '2021-03-24 16:20:50', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(5, 1, '2021-03-25 07:41:00', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(6, 1, '2021-03-25 07:42:16', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(7, 1, '2021-03-25 07:42:23', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(8, 1, '2021-03-25 07:43:52', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(9, 1, '2021-03-25 07:44:44', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(10, 1, '2021-03-25 07:46:28', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(11, 1, '2021-03-25 07:47:10', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(12, 1, '2021-03-25 07:47:59', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(13, 1, '2021-03-25 07:48:50', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(14, 1, '2021-03-25 08:11:30', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(15, 1, '2021-03-25 08:12:23', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(16, 1, '2021-03-25 08:18:18', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(17, 1, '2021-03-25 08:18:47', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(18, 1, '2021-03-25 08:18:52', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(19, 1, '2021-03-25 08:22:02', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(20, 1, '2021-03-25 08:22:07', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(21, 1, '2021-03-25 08:22:45', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(22, 1, '2021-03-25 08:22:50', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(23, 1, '2021-03-25 08:23:00', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(24, 1, '2021-03-25 11:57:30', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(25, 1, '2021-03-25 11:57:35', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(26, 1, '2021-03-25 11:57:40', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(27, 1, '2021-03-25 11:59:24', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(28, 1, '2021-03-25 12:00:45', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(29, 1, '2021-03-25 12:00:52', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(30, 1, '2021-03-25 12:01:54', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(31, 1, '2021-03-25 12:02:18', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(32, 1, '2021-03-25 12:02:35', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(33, 1, '2021-03-25 12:02:54', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(34, 1, '2021-03-25 12:03:52', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(35, 1, '2021-03-25 12:04:00', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(36, 1, '2021-03-25 12:04:59', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(37, 1, '2021-03-25 14:51:25', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(38, 1, '2021-03-25 16:08:10', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(39, 1, '2021-03-25 16:08:16', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(40, 0, '2021-03-25 16:08:18', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(41, 1, '2021-03-25 16:08:20', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(42, 3, '2021-03-25 16:08:22', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(43, 1, '2021-03-25 16:08:25', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(44, 1, '2021-03-25 16:08:53', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(45, 1, '2021-03-25 16:08:58', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(46, 3, '2021-03-25 16:09:01', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(47, 1, '2021-03-25 16:09:09', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(48, 3, '2021-03-25 16:09:14', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(49, 2, '2021-03-25 16:09:18', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(50, 1, '2021-03-25 16:09:25', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(51, 1, '2021-03-25 16:09:39', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(52, 3, '2021-03-25 16:09:41', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(53, 1, '2021-03-25 16:09:44', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(54, 1, '2021-03-25 16:09:55', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(55, 1, '2021-03-25 16:10:16', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(56, 3, '2021-03-25 16:10:33', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(57, 3, '2022-01-01 15:59:18', 'ta_post', '::1', 'DESKTOP-AV54JSG'),
(58, 3, '2022-01-01 16:01:42', 'ta_post', '::1', 'DESKTOP-AV54JSG'),
(59, 3, '2022-01-01 16:01:44', 'ta_post', '::1', 'DESKTOP-AV54JSG'),
(60, 3, '2022-01-01 16:02:34', 'ta_post', '::1', 'DESKTOP-AV54JSG'),
(61, 1, '2022-01-01 16:05:50', 'ta_post', '::1', 'DESKTOP-AV54JSG'),
(62, 1, '2022-01-01 16:06:23', 'ta_post', '::1', 'DESKTOP-AV54JSG'),
(63, 1, '2022-01-01 16:06:38', 'ta_post', '::1', 'DESKTOP-AV54JSG'),
(64, 2, '2022-01-03 23:31:00', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(65, 2, '2022-06-15 11:38:43', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(66, 3, '2022-06-15 11:38:52', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(67, 1, '2022-06-15 11:38:57', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(68, 3, '2022-06-15 11:39:01', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(69, 1, '2022-06-15 11:39:06', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(70, 3, '2022-11-30 22:00:32', 'ta_post', '127.0.0.1', 'www.techsmith.com'),
(71, 2, '2023-03-15 23:30:49', 'ta_post', '127.0.0.1', 'www.techsmith.com');

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
(1, 'admin', 'admin@gmail.com', '2023-02-25 17:44:11', '$2y$10$zzgeGTtZydNl7yy9epNOYuW6nwqxz4QUe2RNE7LrdZGs2p7Mafmf.', '1', NULL, '2023-02-25 17:44:54', '2023-02-25 17:44:54');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `access_user`
--
ALTER TABLE `access_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `dd_slide_show`
--
ALTER TABLE `dd_slide_show`
  ADD PRIMARY KEY (`id_slide_show`);

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
-- Indeks untuk tabel `ref_category`
--
ALTER TABLE `ref_category`
  ADD PRIMARY KEY (`category_kd`);

--
-- Indeks untuk tabel `set_menu_profil`
--
ALTER TABLE `set_menu_profil`
  ADD PRIMARY KEY (`id_set_menu_profil`);

--
-- Indeks untuk tabel `set_web`
--
ALTER TABLE `set_web`
  ADD PRIMARY KEY (`id_set_web`);

--
-- Indeks untuk tabel `set_web_more`
--
ALTER TABLE `set_web_more`
  ADD PRIMARY KEY (`id_set_web_more`);

--
-- Indeks untuk tabel `ta_bidang`
--
ALTER TABLE `ta_bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indeks untuk tabel `ta_galeri`
--
ALTER TABLE `ta_galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `ta_galeri_detail`
--
ALTER TABLE `ta_galeri_detail`
  ADD PRIMARY KEY (`id_galeri_detail`);

--
-- Indeks untuk tabel `ta_laman`
--
ALTER TABLE `ta_laman`
  ADD PRIMARY KEY (`id_laman`);

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
-- Indeks untuk tabel `ta_view_count`
--
ALTER TABLE `ta_view_count`
  ADD PRIMARY KEY (`view_count_ID`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dd_slide_show`
--
ALTER TABLE `dd_slide_show`
  MODIFY `id_slide_show` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT untuk tabel `ref_category`
--
ALTER TABLE `ref_category`
  MODIFY `category_kd` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `set_menu_profil`
--
ALTER TABLE `set_menu_profil`
  MODIFY `id_set_menu_profil` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `set_web`
--
ALTER TABLE `set_web`
  MODIFY `id_set_web` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT untuk tabel `set_web_more`
--
ALTER TABLE `set_web_more`
  MODIFY `id_set_web_more` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `ta_bidang`
--
ALTER TABLE `ta_bidang`
  MODIFY `id_bidang` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ta_galeri`
--
ALTER TABLE `ta_galeri`
  MODIFY `id_galeri` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ta_galeri_detail`
--
ALTER TABLE `ta_galeri_detail`
  MODIFY `id_galeri_detail` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ta_laman`
--
ALTER TABLE `ta_laman`
  MODIFY `id_laman` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ta_post`
--
ALTER TABLE `ta_post`
  MODIFY `post_kd` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ta_post_categori_relationships`
--
ALTER TABLE `ta_post_categori_relationships`
  MODIFY `relationships_kd` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `ta_view_count`
--
ALTER TABLE `ta_view_count`
  MODIFY `view_count_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
