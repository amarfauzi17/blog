-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2018 at 05:21 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hfw`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(7, 'Sepak Bola', '2018-10-13 16:06:56', '2018-10-13 16:06:56'),
(8, 'Film', '2018-10-13 16:07:16', '2018-10-13 16:07:16'),
(9, 'Sport', '2018-10-13 16:07:25', '2018-10-13 16:07:25'),
(10, 'Travel', '2018-10-13 16:12:41', '2018-10-13 16:12:41'),
(11, 'Otomotif', '2018-10-13 16:26:00', '2018-10-13 16:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` int(10) UNSIGNED NOT NULL,
  `commentable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_02_02_074527_create_posts_table', 1),
(4, '2018_02_09_044024_add_slug_to_posts', 1),
(5, '2018_02_09_064428_create_categories_table', 1),
(6, '2018_02_09_065105_add_category_id_to_posts', 1),
(11, '2018_02_13_100945_create_tags_table', 2),
(12, '2018_02_13_175827_create_post_tag_table', 2),
(13, '2018_02_26_074823_create_comments_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `visit_count` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `image`, `category_id`, `created_at`, `updated_at`, `visit_count`, `author_id`) VALUES
(28, 'U19 Indonesia vs Jordania', 'u19-indonesia-vs-jordania', '<cite>Timnas U-19 Indonesia berhasil mengalahkan timnas U-19 Jordania pada laga uji coba yang berlangsung di Stadion Wibawa Mukti, Cikarang, Sabtu (13/10/2018). Timnas U-19 Indonesia berhasil menang dengan skor 3-2. Gol Indonesia dicetak oleh Firza Andika pada menit ke-44, (74&#39;), gol bunuh diri Saif Al-Deen Anan (56&#39;). Sementara itu, gol Jordania dicetak oleh Ibrahim Sadeh (80&#39;) dan Omar Hani Ismail (86&#39;). Pada awal babak pertama, kedua tim sudah berinisiatif untuk melakukan serangan.</cite><br />\r\n<br />\r\nWitan Sulaeman mendapatkan peluang pada menit ke-10 melalui tendangannya, tetapi berhasil ditepis oleh kiper Jordania. Egy Maulana Vikri yang menjadi pemain pengganti berhasil menambah daya gedor Indonesia. Pada menit ke-39, Egy menusuk ke dalam kotak penalti. Bola lalu dikuasai oleh Saddil yang kemudian melepaskan umpan ke depan gawang. Namun, Rafli Mursalim belum berhasil memanfaatkannya karena tendangannya masih menyamping di gawang lawan. Hingga menjelang akhir babak pertama, Indonesia berhasil unggul 1-0 melalui tendangan keras Firza Andika yang gagal diantisipasi kiper Jordania pada menit ke-44. Babak pertama berakhir, skor berubah menjadi 1-0 untuk keunggulan Indonesia.<br />\r\n<br />\r\nPada babak kedua, Indonesia menambah intensitas serangan. Hal itu membuahkan hasil pada menit ke-56. Lemparan jauh dari Indra Mustafa gagal diantisipasi dengan baik oleh pemain belakang Jordania, Saif AL-Deen Anan, sehingga bola membelok dan masuk ke dalam gawang. Skor berubah menjadi 2-0 untuk keunggulan Indonesia. Pada menit ke-74, Garuda Nusantara berhasil menambah keunggulan menjadi 3-0 melalui sepakan keras Firza Andika pada menit ke-74. Tertinggal 3-0 tidak membuat Jordania menyerah. Mereka malah berhasil memperkecil keunggulan pada menit ke-80 melalui gol yang dicetak Ibrahim Sadeh dan skor berubah menjadi 3-1. Enam menit berselang, Jordania kembali menambah gol melalui Omar Hani Ismail sehingga skor berubah menjadi 3-2.', '1539472204.jpg', 7, '2018-10-13 16:10:04', '2018-10-13 16:10:29', 1, 6),
(29, 'Makanan Khas Izakaya Japan', 'makanan-khas-izakaya-japan', 'Banyak wisatawan penasaran ingin mampir ke sebuah Izakaya, tetapi ragu-ragu saat ingin mencoba makan di Izakaya. Izakaya merupakan sebuah bar juga restoran tradisional dan sangat populer di Jepang. Selain itu, ada banyak aturan yang khas di setiap negara atau suatu perusahaan, termasuk di Jepang. Hal ini sebagai wujud budaya yang berkembang di negara maupun perusahaan. Hal sama juga berlaku di Izakaya.<br />\r\n<br />\r\nHidangan Populer di Izakaya Mari kita pesan minuman. Saat orang Jepang memesan bir, biasanya mengatakan &ldquo;Toriaezu-Nama&rdquo;. Salah satu hidangan populer adalah kentang goreng (french fries). Di sebuah jaringan izakaya bernama Sakura Suisan, hidangan ini disebut &ldquo;Potato Fries&rdquo;. Tamburan kecil berwarna hijau di atas kentang goreng adalah aonari (rumput laut kering). Bumbu penyedap khas Jepang ini sangat cocok dengan rasa kentang goreng. Pilihan lain adalah Karaage atau ayam goreng. Pertama-tama ayam yang telah dipotong-potong dibalur dengan tepung gandum dan bumbu penyedap, lalu digoreng dalam minyak banyak. Ayam disajikan tanpa tulang.', '1539472536.jpg', 10, '2018-10-13 16:15:36', '2018-10-13 16:15:36', 0, 6),
(30, 'Es Krim Rasa Jamu', 'es-krim-rasa-jamu', 'iasanya es krim rasanya beraneka, seperti durian, coklat, vanila, dan lainnya. Bagaimana dengan es krim rasa jamu? Seperti serai, beras kencur, kunir asem, dan lainnya. Di Kota Semarang, Jawa Tengah, tepatnya di Jalan Gang Pinggir No. 38 Kranggan terdapat aneka jenis es krim dengan rasa jamu Makuta. Ada beras kencur, kunir asem, dan lainnya. Harga untuk es krim bervariasi ada Rp 16.000 per porsi, ada juga Rp 27.000 per porsi sesuai ukuran dan rasa.<br />\r\n<br />\r\nDari keterangan pemilik Jamu Makuta ini, Seno Budiono kepada Tribunjateng.com, ide ini termotivasi oleh perkembangan zaman. &quot;Kami kreasikan jamu ini. Anak muda jarang yang minum jamu, kalau dikreasikan menjasi es krim dan dikemas menarik tentu anak muda tertarik,&quot; tutur Seno.<br />\r\n<br />\r\nSehari-hari anaknya lah yang mengurusi operasional Makuta, yakni Alesandro Budiono. Selain es krim, bahan dasar jamu juga digunakan untuk membuat puding dan jamu lainnya. &quot;Generasi pertama jamu itu bubuk, generasi kedua jamu kapsul, nanti ke depannya kami akan menginovasikan generasi ketiga jamu dalam bentuk lainnya,&quot; kata Seno. Tempat dengan design vintage dan modern ini sangat pas digunakan untuk menghabiskan waktu bersama teman sembari menikmari es krim dengan aneka rasa.', '1539472782.jpg', 10, '2018-10-13 16:19:42', '2018-10-13 16:21:46', 3, 6),
(31, 'Kecelakaan Merenggang Nyawa', 'kecelakaan-merenggang-nyawa', 'Kecelakaan lalu lintas masih menjadi perhatian utama para pemangku kepentingan. Ini karena tingginya angka kecelakaan lalu lintas yang terjadi setiap harinya. Polda Metro Jaya (PMJ) baru saja mengeluarkan data kecelakaan lalu lintas yang tercatat di wilayahnya sejak Januari hingga September 2018. Tercatat sebanyak 4.286 kejadian kecelakaan yang terjadi di Jakarta dan sekitarnya. &quot;Dari data ini terlihat adanya peningkatan sebanyak 4 persen dibandingkan waktu yang sama tahun lalu. Pada 2017, jumlah kecelakaan yang terjadi di Januari sampai September sebanyak 4.124 peristiwa,&quot; ucap Kasubdit Bin Gakkum Ditlantas Polda Metro Jaya dalam keterangannya Jumat (12/10/2018). Data menarik lainnya adalah dari peristiwa di 2018 tercatat sebanyak 410 orang meninggal dunia, 664 luka berat, 4.079 luka ringan dengan total korban 5.153 orang. Kerugian materil selama sembilan bulan tersebut adalah Rp 10,4 miliar.Pihak PMJ juga mencatat usia korban kecelakaan lalu lintas mayoritas, adalah mereka dengan usia produktif, pada rentang usia 21 sampai 30 tahun yang tercatat 1.975 orang. Rentang usia kedua terbanyak adalah 31 sampai 40 tahun dengan jumlah 971 orang. Catatan usia pelaku lalu lintas juga tidak berbeda dengan korban yakni 21 sampai 30 tahun menjadi yang terbanyak dengan 1.338 orang. Rentang usia kedua terbanyak sebagai pelaku adalah 31 sampai 40 tahun dengan 737 orang. Sepeda motor masih memegang jenis kendaraan terbanyak yang terlibat kecelakaan dengan 3.956 unit. Angka ini meningkat 8 persen dibandingkan periode yang sama tahun lalu di angka 3.648 unit. &quot;Kendaraan yang terlibat kecelakaan masih di dominasi oleh roda dua. Kemudian ada minibus dan truk serta kontainer dan bus,&quot; ucap Budiyanto.', '1539473260.jpg', 11, '2018-10-13 16:27:40', '2018-10-13 16:27:40', 0, 4),
(32, 'Liburan ke Fukuoka', 'liburan-ke-fukuoka', 'Pecinta sejarah dan sains tidak boleh melewatkan lima museum yang ada di Fukuoka ini! Mulai dome theatre terbesar yang menjadi kebanggan Kyushu, hingga museum dinosaurus dengan koleksi spesimen dahsyatnya. Semuanya bisa membuat anak-anak hingga orang dewasa merasa antusias dan terus dipenuhi rasa penasaran dari awal hingga akhir kunjungan. Seperti dikutip dari situs panduan wisata Jepang, Ohayo Jepang (www.ohayojepang.kompas.com), salah satunya adalah Fukuoka City Science Museum. Fukuoka City Science Museum dibuka pada 2017. Mengusung konsep &ldquo;Science &amp; Creative Fukuoka&rdquo;, museum ini sering mengadakan berbagai macam eksibisi yang berhubungan dengan sains. Tidak hanya itu, Dome Theatre (planetarium) terbesar kebanggaan Kyushu ini juga menjadi salah satu fasilitas yang tersedia. Tidak hanya anak-anak, orang dewasa pun bisa saling bersentuhan dengan sains dengan menyenangkan. Di dalam dome theatre, para pengunjung dapat menikmati teknologi terbaru proyektor optik serta proyektor digital beresolusi tinggi (setara 8K) yang mampu menciptakan pemandangan langit berbintang nan indah bak aslinya. Dengan 220 kursi serta pengharum ruangan pada dinding-dinding ruangan, para pengunjung dapat merasa lebih nyaman saat berada di sini.', '1539473384.jpg', 10, '2018-10-13 16:29:44', '2018-10-13 16:35:04', 4, 4),
(33, 'Belanda Kalahkan Jerman', 'belanda-kalahkan-jerman', 'Timnas Belanda berhasil mengalahkan timnas Jerman 3-0 pada laga UEFA Nations League di Stadion Johan Cruijff ArenA, Sabtu (13/10/2018) atau Minggu dini hari WIB. Tiga gol kemenangan Belanda dicetak oleh Virgil Van Dijk pada menit ke-30, Memphis Depay (87&#39;), dan Georgini Wijanaldum pad masa injury time babak kedua. Ini adalah kali pertama sejak 1992 Belanda menang dengan margin tiga gol di kompetisi resmi atas Jerman. Hasil ini membuat Belanda kini menempati urutan kedua klasemen Liga A Grup 1 dengan koleksi empat poin. Sementara itu, Jerman berada di dasar klasemen setelah tidak pernah menang dalam dua laga atau dengan koleksi satu poin.Dikutip BolaSport.com dari situs resmi UEFA, timnas Jerman sebenarnya lebih menguasai pertandingan. Der Panzer memimpin penguasaan bola dengan 58 persen. Dari segi peluang, Jerman memiliki 13 yang 4 di antaranya mengarah tepat sasaran. Adapun timnas Belanda mempunyai 11 kesempatan, di mana 5 menuju ke gawang. Gol yang ditunggu-tunggu suporter Belanda muncul pada menit ke-30. Virgil Van Dijk mencetak gol dengan sundulan memanfaatkan bola muntah dari Ryan Babel yang membentur mistar. Skor 1-0 untuk Belanda bertahan sampai turun minum. Memasuki babak kedua, Jerman terus berupaya mengukir gol. Keasyikan menyerang, gawang Jerman justru kemasukan dua kali di lima menit akhir laga. Melalui proses serangan balik cepat, Quincy Promes mengalirkan umpan datar brilian kepada Memphis Depay.Berada di kotak penalti, Depay sangat tenang memasukkan bola ke gawang dengan tendangan kaki kanan yang terukur. Belanda menyempurnakan kemenangan pada masa injury time lewat gol Georginio Wijnaldum yang sempat mengecoh dua bek Jerman, Jerome Boateng dan Jonas Hector, sebelum melepaskan tembakan kaki kanan dari dalam kotak penalti. (Septian Tambunan) Belanda 3-0 Jerman (Virgil van Dijk 30&#39;, Memphis Depay 87&#39;, Georginio Wijnaldum 90+3&#39;) Susunan pemain Belanda versus Jerman: Belanda (4-3-3): 1-Jasper Cillessen; 5-Daley Blind, 4-Virgil van Dijk, 2-Denzel Dumfries, 3-Matthijs de Ligt; 8-Georginio Wijnaldum, 6-Marten de Roon, 7-Frenkie de Jong (15-Nathan Ake 77&#39;); 11-Ryan Babel (22-Arnaut Groeneveld 68&#39;), 10-Memphis Depay, 9-Steven Bergwijn (20-Quincy Promes 68&#39;) Pelatih: Ronald Koeman Jerman (4-1-4-1): 1-Manuel Neuer; 17-Jerome Boateng, 5-Mats Hummels, 4-Matthias Ginter, 3-Jonas Hector; 18-Joshua Kimmich; 8-Toni Kroos, 11-Emre Can (7-Julian Draxler 57&#39;), 13-Thomas Mueller (19-Leroy Sane 57&#39;), 9-Timo Werner; 23-Marc Uth (10-Julian Brandt 68&#39;)', '1539473698.jpg', 7, '2018-10-13 16:34:58', '2018-10-14 05:13:04', 4, 4),
(34, 'Terkapar di Markas Belanda, Timnas Jerman Terancam Degradasi', 'terkapar-di-markas-belanda-timnas-jerman-terancam-degradasi', 'Timnas Jerman takluk dengan skor telak 0-3 dalam laga lanjutan Liga A Grup 1 UEFA Nations League 2018, di Johan Cruijff Arena, Sabtu (13/10/2018) atau Minggu (14/10/2018) dini hari WIB.<br />\r\n<br />\r\nDie Mannschaft sebenarnya bermain lebih agresif sejak awal pertandingan. Beberapa peluang pun tercipta melalui Thomas Muller maupun Timo Werner, namun gagal menaklukkan Jasper Cillessen yang bermain gemilang di bawah mistar.Belanda yang berada dalam tekanan justru berhasil unggul 1-0 berkat gol sundulan Virgil van Dijk pada menit ke-30. Gol itu berawal dari bola muntah tandukan Ryan Babel yang menerpa mistar hasil dari sepak pojok Memphis Depay.<br />\r\n<br />\r\nDi babak kedua, Jerman mendapatkan peluang terbaik unuk menyamakan kedudukan. Namun, tembakan pemain pengganti, Leroy Sane, yang berdiri tanpa kawalan di kotak penalti masih menyamping tipis di samping kiri gawang Cillessen.<br />\r\n<br />\r\nEmpat menit jelang laga usai, Belanda memperbesar skor menjadi 2-0. Berawal dari serangan balik cepat, umpan mendatar Quincy Promes tidak disia-siakan Depay untuk menggetarkan gawang Neuer.<br />\r\n<br />\r\nDepay hampir saja mencetak gol keduanya di laga ini andai tembakannya dari dalam kotak penalti tidak menerpa mistar gawang. Beberapa menit berselang, skuat asuhan Ronald Koeman memperbesar skor menjadi 3-0 melalui gol Georginio Wijnaldum. Pergerakan individu pemain Liverpool itu diakhiri tembakan keras ke sudut kanan gawang Neuer.<br />\r\n<br />\r\nKemenangan 3-0 ini membuat Belanda mengoleksi tiga poin atau terpaut satu poin dari Prancis yang berada di puncak klasemen Grup 1. Sementara timnas Jerman semakin terpuruk di posisi juru kunci dengan mengoleksi satu poin.', '1539480270.jpg', 7, '2018-10-13 18:24:30', '2018-10-13 18:24:30', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(57, 28, 8, NULL, NULL),
(58, 28, 9, NULL, NULL),
(59, 29, 10, NULL, NULL),
(60, 29, 11, NULL, NULL),
(61, 30, 10, NULL, NULL),
(62, 30, 12, NULL, NULL),
(63, 30, 13, NULL, NULL),
(64, 31, 10, NULL, NULL),
(65, 32, 11, NULL, NULL),
(66, 33, 14, NULL, NULL),
(67, 34, 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(8, 'Timnas Indonesia', '2018-10-13 16:07:43', '2018-10-13 16:07:43'),
(10, 'Makanan', '2018-10-13 16:12:54', '2018-10-13 16:12:54'),
(11, 'Jepang', '2018-10-13 16:13:00', '2018-10-13 16:13:00'),
(12, 'Es Krim', '2018-10-13 16:18:21', '2018-10-13 16:18:21'),
(13, 'Jamu', '2018-10-13 16:18:27', '2018-10-13 16:18:27'),
(14, 'Internasional', '2018-10-13 16:32:45', '2018-10-13 16:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','author','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', '$2y$10$LSxvuUyLxTLCjhHrKiaYnuDGnSGaaZLhqCIcjmUeNO8oy8Gy2CAGO', 'admin', 'RzTSLpFGNsBxjIDYr8T09SgrQlRlB0PbHsaGdYDQdtvbmqYLzDC9EPlHMMn3', '2018-11-30 04:20:09', '2018-11-30 04:20:09'),
(2, 'author', 'author@mail.com', '$2y$10$oMBn7704lW0tIoMW0wehr.V9MRqEnfREPDka6Obm9t5zrGXeppmuW', 'author', 'iuzbWzSzAIAGyQDrXcPdbMQN7zdJdXLUZBZ1zwKbT93BVy2Ybu9VR3IYOXOd', '2018-11-30 04:20:10', '2018-11-30 07:01:13'),
(4, 'user', 'user@mail.com', '$2y$10$0iNZRixuM/dN1z51dECcE./T8yZGDGP85bE8w4VJLBQmP/716lZTe', 'user', NULL, '2018-11-30 07:02:40', '2018-11-30 07:02:40'),
(5, 'user1', 'user1@mail.com', '$2y$10$Jh7swY9RpYhccz0qnlasx.7u46MqXkKY4BjrR9BT5aY3P2AdGFOmm', 'user', NULL, '2018-11-30 08:14:14', '2018-11-30 08:14:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
