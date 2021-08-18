-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 18, 2021 at 07:46 AM
-- Server version: 10.3.30-MariaDB-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minevers_mineversal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `name`) VALUES
(1, 'joe', 'joe@mineversal.com', '$2y$10$o9npRAu44GGH.eO26TaH8uSxTWD8Uu8beS39RPpOpK0v/im2x1oim', 'Azhar Rizky Zulma'),
(2, 'admin', 'admin@mineversal.com', '$2y$10$PKHSJFFzJo70SqKJowDxduc.jrzp4QEXlD9n8w.Z5VdnYF020vlBK', 'Admin'),
(3, 'ivana', 'ivana@mineversal.com', '$2y$10$VugVFNvgy9uoa3E1ip6cHOWMbBZa9I2OIDkUXMh5k.2H4MqxtSYUq', 'Ivana Gabriella Manurung'),
(4, 'ndyamn', 'nadiya064001900003@std.trisakti.ac.id', '$2y$10$UjgpC76Mo7JalZ6rQBmTbuZt/mplvtprkPDL8oKEFYFd6v6cjOFJu', 'Nadya Amanda'),
(5, 'zidan', 'zidan@mineversal.com', '$2y$10$65oXe96B1CNBbYSee2Z9LOpt1XJIuy3AGDOdeFaHpoe6uXnOb7h4W', 'Muhammad Zidan'),
(6, 'gading', 'gading@mineversal.com', '$2y$10$GJQIac9uBA9S./rIdToMG.mhf0TVdyFYwcoLnUTPtBcpEZWhWf7sa', 'Gading Sectio');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `comment` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `idpost` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `nama`, `comment`, `PostingDate`, `idpost`, `status`) VALUES
(1, 'Admin', 'Test komentar pertama', '2020-11-19 06:03:36', 1, 1),
(2, 'Admin', 'Test Komentar Kedua', '2020-11-20 03:16:13', 6, 0),
(3, 'Nazmudin', 'Teskomentar ke dua', '2020-11-27 12:50:50', 1, 1),
(4, 'Fiolina', 'Nice Info.', '2020-12-01 12:41:01', 13, 1),
(5, 'Yefta salma', 'Artikel yang menarik,bahasa mudah dipahami ditambah gambar yang indah,Jogja selalu punya cerita,good job.', '2020-12-02 13:14:05', 5, 1),
(6, 'fiqkri', 'nice\r\n', '2021-01-03 01:22:24', 4, 1),
(7, 'fiqkri', 'nice\r\n', '2021-01-03 01:22:38', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `feedback` longtext NOT NULL,
  `rating` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `feedback`, `rating`) VALUES
(1, 'Azhar Rizky Zulma', 'Test, Tampilan Menarik untuk home dan content menu yang juga bersifat responsif, sayangnya menu my account terlihat begitu sederhana dan juga masih terdapat banyak bugs, dan juga menu my account masih kurang terlihat responsif.', 5),
(2, 'Ando', 'Bagus dan Menarik Desainnya', 5),
(3, 'Raipan H.', 'Kolom contact us sepertinya akan lebih bagus jika ditaruh lebih ke tengah,selebihnya sudah sangat bagus', 5),
(4, 'Fahmi', 'Bagus dan Menarik Cukup Interaktif, tampilannya sangat responsif dan juga sangat baik, fungsionalitasnya juga berfungsi dengan baik', 5),
(5, 'bpk Kira Y', 'Semangat', 5),
(6, 'Raipan', 'bagus,tampilannya juga nyaman,mungkin kalau ditambahin mode web cerah lebih oke lagi', 5),
(7, 'Ahid novryan', '.', 4),
(8, 'Tes pak', 'Good, tinggal mainin UI/UX, Sukses selalu', 5),
(9, 'Anip.', 'Gaada kritik dan saran, hanya memberikan semangat...\r\n\r\nSemangat Jay !!', 5),
(10, 'Virgin Retard', 'Web ini membantu saya mengetahui tentang tempat wisata di dalam Indonesia yang belum saya ketahui,dan konsep web nya bagus. Good job well done ðŸ‘', 4),
(11, 'Acing Rawatet', 'wesbitenya sudah bagus, cuma dari saya fontnya terlalu besar dan terlalu kaku mungkin bisa dibenahi sedikit', 4),
(12, 'Nibroos', 'Saran sih untuk kasih sedikit preview atau leluasa kepada &#34;guest&#34; untuk bisa menelusuri beberapa artikel yang membuat kita jadi makin tertarik untuk menelusuri web ini. Kalau harus/wajib login dahulu untuk menelusuri, takutnya malah bikin orang males duluan dan malah cari web lain. Sekali lagi, ini hanya saran karena yang tahu tujuan pengembangan web ini adalah kalian, so semoga membantu :)', 4),
(13, 'Nazmudin', 'Bagus, kurang nya pemakaian font nya yang masih kurang dan animasi di bagian traveling terkesan mengagetkan dan terpotong sisa nya bagus', 5),
(14, 'Satria Inawan Syah', 'GOKIL BANGET KEREN PARAH', 5),
(15, 'Fiolina', 'Great Website. :)', 5),
(16, 'fiqkri', 'postingannya banyakin referensinya', 5),
(17, 'Azharsa', 'dasdasd', 5),
(18, 'asd', 'asda', 3),
(19, 'sadas', 'adsa', 3);

-- --------------------------------------------------------

--
-- Table structure for table `habit`
--

CREATE TABLE `habit` (
  `id_habbit` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_habbit` varchar(255) NOT NULL,
  `catatan` text NOT NULL,
  `catatan_besok` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `habit`
--

INSERT INTO `habit` (`id_habbit`, `id_user`, `nama_habbit`, `catatan`, `catatan_besok`) VALUES
(36, 35, 'make a journal', 'once a week', 'online classes');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `admin` varchar(255) DEFAULT NULL,
  `title` longtext DEFAULT NULL,
  `description` longtext CHARACTER SET utf8 DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdateDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL,
  `url` mediumtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `admin`, `title`, `description`, `PostingDate`, `UpdateDate`, `Is_Active`, `url`, `image`, `provinsi`) VALUES
(1, 'Azhar Rizky Zulma', 'Gunung Bromo', 'Gunung Bromo adalah salah satu gunung aktif di Indonesia yang saat ini menjadi salah satu destinasi wisata bagi para pendaki, masayarakat umum ataupun keluarga sekalipun untuk menghabiskan waktu ketika liburan dan juga ingin menyejukkan mata dengan pemandangan alam nan indah. Bromo merupakan salah satu gunung suci menurut warga yang tinggal di kaki gunung bromo itu sendiri (umumnya disebut sebagai suku Tengger), dikaldera bromo pun terdapat kuil pemujaan bagi masyarakat sekitar yang masih menganut paham Hindu Jawa atau Buddha Tengger, bromo dijadikan sebagai tempat ritual suci untuk pemujaan oleh warga sekitar.\r\n\r\nKaldera dari Bromo sendiri sangatlah luas yang meliputi lautan pasir didalamnya, menurut sejarah kaldera itu terbentuk ketika terjadi letusan dahsyat yang menyebabkan kaldera yang amat besar dan sekarang telah menjadi lautan pasir yang menyelimuti dan mengililingi gunung bromo itu sendiri. Pasir di kaldera tersebut juga dikategorikan sebagai pasir vulkanis. Efek yang ditimbulkan pada kesehatan jika terlalu lama menghirup debu dan pasir vulkanis tersebut ialah akan berakibat kepada saluran pernapasan. Pihak pengelola wisata kawasan bromo pun menyarankan agar pengunjung mengenakan masker saat mengunjungi daerah kaldera bromo ataupun ketika ingin mendaki ke kawah bromo.', '2020-11-13 11:09:49', '2020-11-29 10:44:52', 1, 'Gunung-Bromo', '1cac2f50a68e75cbad71817835699198.jpg', 'Jawa Timur'),
(2, 'Nadya Amanda', 'Pulau Dewata', 'Bali adalah pulau di Indonesia yang menjadi primadona pariwisata Indonesia yang sudah terkenal di seluruh dunia. Selain terkenal dengan keindahan alam, terutama pantainya, Bali juga terkenal dengan kesenian dan budayanya yang unik dan menarik. Industri pariwisata berpusat di Bali Selatan dan di beberapa daerah lainnya. Lokasi wisata yang utama adalah Kuta dan sekitarnya seperti Legian dan Seminyak, daerah timur kota seperti Sanur, pusat kota seperti Ubud, dan di daerah selatan seperti Jimbaran, Nusa Dua dan Pecatu. Bali sebagai tempat tujuan wisata yang lengkap dan terpadu memiliki banyak sekali tempat wisata menarik, antara lain: Pantai Kuta, Pura Tanah Lot, Pantai Padang - Padang, Danau Beratan Bedugul, Garuda Wisnu Kencana (GWK), Pantai Lovina dengan Lumba Lumbanya, Pura Besakih, Uluwatu, Ubud, Munduk, Kintamani, Amed, Tulamben, Pulau Menjangan dan masih banyak yang lainnya. Kini, Bali juga memiliki beberapa pusat wisata yang sarat edukasi untuk anak-anak seperti kebun binatang, museum tiga dimensi, taman bermain air, dan tempat penangkaran kura-kura.\r\n\r\nTentang nama Bali sendiri memiliki banyak sebutan atau julukan, diantaranya yaitu pulau \"Dewata\". Nama tersebut berkaitan dengan julukan Pulau Seribu Pura, yang mana hampir setiap jengkal tanah di pulau Bali terdapat bangunan pura.', '2020-11-18 02:26:05', '2020-11-29 10:45:05', 1, 'Pulau-Dewata', '733a0709589fd75a7f555dc1f6fc67fd.jpg', 'Bali'),
(3, 'Nadya Amanda', 'Raja Ampat', 'Raja Ampat merupakan Surga Petualangan Dunia di Ujung Papua. Raja Ampat terletak di ujung barat laut semenanjung Kepala Burung di Papua, pulau paling timur di kepulauan Indonesia. Papua adalah wilayah kepulauan yang terdiri dari lebih dari 1.500 pulau kecil, gundukan pasir, dan beting yang mengelilingi empat pulau utama di Indonesia yaitu Waigeo, Batanta, Salawati, dan Misool. Nama Raja Ampat sendiri diyakini berasal dari legenda lokal yang meceritakan tentang seorang wanita yang menemukan tujuh telur, empat telur di antaranya menetas dan menjadi raja dari empat pulau utama, sementara tiga telur lainnya menjadi seorang wanita, hantu dan batu.\r\n\r\nBagi para penggemar dunia bawah air, Raja Ampat selalu bisa menawarkan beberapa pengalaman bawah air kelas dunia yang menakjubkan. Wilayah dalam kepulauan Raja Ampat sangat besar, luasnya meliputi 9,8 juta hektar tanah dan laut, yang menjadi rumah bagi 540 jenis karang, lebih dari 1.000 jenis ikan karang, dan 700 jenis moluska. Ini menjadikan kepulauan Raja Ampat menjadi perpustakaan paling beragam di dunia untuk kehidupan biota laut dan terumbu karang.', '2020-11-18 02:39:51', '2020-11-29 10:45:24', 1, 'Raja-Ampat', 'd649f15ce77a0c7e8ac758d4f96806f4.jpg', 'Papua Barat'),
(4, 'Nadya Amanda', 'Labuan Bajo & Taman Nasional Komodo', 'Selain Bali, destinasi wisata di Indonesia yang populer bagi wisatawan yaitu Labuan Bajo, Nusa Tenggara Timur (NTT). Labuan Bajo termasuk dalam Kabupaten Manggarai Barat. Selain wisatawan lokal, Labuan bajo ini juga menjadi favorit wisatawan mancanegara lho! Labuan Bajo digemari wisatawan karena memiliki keindahan alam yang natural dari sisi pulaunya, pantainya sampai keindahan laut yang beragam. Dari segi keindahan pulau, kata dia, Labuan Bajo memiliki destinasi Pulau Padar, Pulau Kelor, Pulau Rinca, dan Pulau Kanawa yang memukau. Tak hanya itu, keindahan Labuan Bajo juga dapat terlihat dari beberapa pantainya yang digunakan sebagai spot diving atau snorkeling.\r\nSelain keindahan alamnya, Labuan Bajo juga terkenal sebagai rumah bagi hewan endemik Indonesia yaitu Komodo yang terdapat di Taman Nasional Komodo.', '2020-11-18 02:56:06', '2020-11-29 10:57:20', 1, 'Labuan-Bajo-&-Taman-Nasional-Komodo', '005bf8c4a763c04081cdddce3fed74c6.jpg', 'Nusa Tenggara Timur'),
(5, 'Nadya Amanda', 'Daerah Istimewa Yogyakarta', 'Popularitas Yogyakarta seakan tidak pernah pudar memancarkan pesonanya baik dalam bidang pariwisata, pendidikan ataupun kebudayaan. Kota Yogyakarta ini memang cukup punya nama besar dan bahkan bisa disejajarkan dengan popularitas Pulau Dewata (Bali). Kota Yogyakarta terletak  di bagian selatan Pulau Jawa, berbatasan dengan Provinsi Jawa Tengah dan Samudera Hindia.  Berdasarkan bentang alamnya, kota ini dibedakan menjadi empat tipikal fisiografis yaitu wilayah Gunungapi Merapi, Pegunungan Sewu, Kulon Progo dan Dataran Rendah.\r\n\"Apakah Yogyakarta Istimewa?\" Yap. Karena Yogyakarta merupakan sebuah daerah istimewa dalam Negara Kesatuan Republik Indonesia yang masih mempertahankan tata pemerintahan berbentuk kesultanan dalam pemerintahan daerahnya. \r\nBerbicara mengenai wisata di Yogyakarta, topik ini memang tidak akan pernah ada habisnya. Selalu ada yang baru dan menarik dari kota unik ini untuk ditampilkan dan menjadi sebuah daya tarik. Banyak yang menjadikan Yogyakarta sebagai tujuan wisata baik bersama keluarga ataupun perjalanan bersama teman dan sahabat. Jika dibandingkan dengan kota-kota lain di daerah pulau Jawa, maka tidak akan ada kota lain yang memiliki tempat wisata sebanyak dan semenarik di Yogyakarta. Tidak hanya satu atau dua tempat saja, kota ini bisa dikatakan sebagai surganya tempat wisata.\r\nSetidaknya ada 4 kelompok destinasi wisata yang ada di Yogyakarta, diantaranya Wisata Candi, Wisata Pantai, Wisata Goa & Wisata Alam.', '2020-11-18 05:39:55', '2020-11-29 10:57:37', 1, 'Daerah-Istimewa-Yogyakarta', 'd95650cb5a562aca26bfc6bfd36bff6c.jpg', 'Daerah Istimewa Yogyakarta'),
(6, 'Nadya Amanda', 'Ijen Blue Fire', 'Kawah Ijen, berupa danau kawah asam terbesar di dunia yang berada di Jawa Timur. Terbentuk oleh gunung api kembar dengan Gunung Merapi yang telah padam. Kawah Ijen merupakan salah satu panorama alam yang terindah di Indonesia, di dasar kawah asap belerang mengepul sehingga menjadikan aroma di sekitar kawah berbau belerang.\r\nDini hari, biasanya orang sedang asyik tidur terlelap. Namun, tidak dengan Gunung Ijen, Bondowoso, Jawa Timur. Saat dingin masih menusuk tulang, aktivitas di Gunung Ijen justru menggeliat. Para pendaki mulai bersiap mendaki ke kawah gunung ini. Blue fire. Itulah tujuan para pendaki sampai rela bersusah payah mendaki ke kawah di ketinggian 2.443 meter dari atas permukaan laut. Mereka menunggu semburan api biru yang muncul dari Kawah Ijen. Ijen adalah satu dari dua lokasi di dunia (yaitu Islandia) yang memiliki fenomena tersebut. Api berwarna biru terlihat bergoyang di puncak gunung, dari dini hari hingga menjelang fajar. Waktu terbaik untuk menyaksikannya adalah antara pukul 02.00 WIB hingga 03.00 WIB. Pesona api biru Kawah Ijen telah mendunia. Banyak wisatawan mancanegara berkunjung ke kawah yang punya kedalaman 200 meter dan luas 5.466 hektar tersebut.', '2020-11-19 04:08:44', '2020-11-29 10:57:58', 1, 'Ijen-Blue-Fire', '0acf846a1c2728c62d217370bc045ca8.jpg', 'Jawa Timur'),
(7, 'Nadya Amanda', 'Danau Kaolin', 'Danau Kaolin adalah danau yang terbentuk dari bekas penggalian kaolin yang dieksploitasi besar-besaran di kawasan Desa Air Raya Tanjung Pandan, Belitung. Danau ini memiliki pesona yang unik yaitu airnya berwarna biru muda dan dikelilingi daratan berwarna putih. Paduan warna yang menakjubkan untuk diabadikan dengan lensa kamera. Perlu diketahui, bahwa kaolin adalah sejenis mineral tanah liat yang mengandung aluminium silikat. Material ini biasa dijadikan salah satu bahan untuk membuat porselen, kain, kertas, pasta gigi, hingga kosmetik. Daratan sekitar Danau Kaolin berwarna putih, karena mengandung mineral tersebut. Di danau ini tidak ada bau belerang karena danau ini tidak terbentuk dari sebuah kawah menjadikan pengunjung betah untuk berlama-lama di danau ini. Untuk airnya pun tergolong aman, karena air disini tidaklah panas. Terbukti masih banyak aktifitas warga dan anak-anak yang menggunakan air danau atau mandi di danau. Kondisi ini menjadikan wisatawan yang berkunjung tidak hanya bisa menikmati pemandangan saja, tetapi juga bisa bermain ataupun berenang menikmati segarnya air Danau Kaolin. Sebagian besar warga mengatakan dengan air di Danau kaolin ini kulit jadi lebih halus dan lembut.', '2020-11-21 02:34:23', '2020-11-29 10:58:24', 1, 'Danau-Kaolin', '128e1baa20c479379a3eb523f011ba23.jpg', 'Bangka Belitung'),
(8, 'Nadya Amanda', 'Pulau Cinta', 'Keindahan alam Indonesia memang sudah sangat tidak diragukan lagi. Banyak sekali tempat-tempat yang mulai menjadi tujuan wisata favorit wisatawan saat ini, khususnya wisata pantai. Tidak hanya Bali dan Lombok yang terkenal dengan wisata pantainya, namun ada satu pantai cantik dan romantis bernama Pulau Cinta di Gorontalo. Sesuai dengan namanya, keunikan dari tempat ini adalah pulau yang memiliki bentuk hati. Selain memiliki bentuk unik, ternyata pantai di sekelilingnya pun sangat indah dan eksotis. Dengan kondisi ini tak heran bila pulau tersebut dijuluki Maldives island Indonesia. Pulau Cinta berlokasi di Kabupaten Boalemo yang jaraknya sekitar 2 jam dari pusat Kota Gorontalo. Terlepas dari keindahan pantai cantik ini, Pulau Cinta memiliki legenda romantis yang mewarnai asal-usul pulau berbentuk hati di Sulawesi ini. Konon, Pulo Cinta adalah tempat persembunyian rahasia Pangeran Gorontalo dan putri cantik anak pedagang Belanda yang diam-diam memadu kasih.', '2020-11-21 02:50:27', '2020-11-29 10:58:52', 1, 'Pulau-Cinta', '6f9dc64163e93109ef1d3eff23a52831.jpg', 'Gorontalo'),
(9, 'Nadya Amanda', 'Kepulauan Derawan', 'Kepulauan Derawan adalah sebuah kepulauan yang berada di Kabupaten Berau, Kalimantan Timur. Di kepulauan ini terdapat sejumlah objek wisata bahari menawan, salah satunya Taman Bawah Laut yang diminati wisatawan mancanegara terutama para penyelam kelas dunia. Di Kepulauan Derawan terdapat beberapa ekosistem pesisir dan pulau kecil yang sangat penting yaitu terumbu karang, padang lamun dan hutan bakau (hutan mangrove). Selain itu banyak spesies yang dilindungi berada di Kepulauan Derawan seperti penyu hijau, penyu sisik, paus, lumba-lumba, kima, ketam kelapa, duyung, ikan barakuda dan beberapa spesies lainnya. Di pulau ini juga tersedia berbagai opsi penginapan serta tempat makan dengan budget yang beragam. Ada banyak toko yang menjual suvenir serta toko yang menyewakan peralatan snorkeling.', '2020-11-21 03:00:24', '2020-11-29 10:59:17', 1, 'Kepulauan-Derawan', 'b42fb54b2ef05b7c40dcf6d77a05b16b.jpg', 'Kalimantan Timur'),
(10, 'Nadya Amanda', 'Pantai Semeti', 'Pantai Semeti adalah pantai yang terletak Desa Mekarsari, Kecamatan Pujut, Kabupaten Lombok Tengah. Pantai ini berjarak sekitar 85 kilometer dari Mataram, atau bisa ditempuh dalam dua jam perjalanan kendaraan roda empat. Pantai Semeti Lombok ini mulai dikenal sebagai spot wisata baru melalui unggahan di berbagai media sosial. Tidak mengherankan perlahan pantai sepanjang 500 meter yang tersembunyi di balik bukit ini mulai dilirik oleh turis domestik maupun mancanegara. Seperti pantai yang lain di Lombok Tengah, di Pantai Semeti kita akan banyak melihat aneka bentuk batu karang. Di Pantai Semeti batu karangnya berbeda dengan pantai lainnya karena batu karangnya tak hanya membentuk seperti perbukitan, tapi juga membetuk tonggakâ€“ tonggak seperti balok â€“ balok kristal.\r\nPasir di Pantai Semeti halus seperti pasir dipantai lainnya, tapi pasir didekat parkiran kasar seperti butiran merica, tapi pasirnya ini lebih halus kalau di bandingkan dengan pasir di Pantai Kuta Lombok. Air lautnya disini sangat jernih disaat pasang ataupun surut. Saat air lautnya surut, kita dapat melihat bebatuan berserakan yang lumayan besar menghadap kearah laut.', '2020-11-21 03:36:09', '2020-11-29 10:59:40', 1, 'Pantai-Semeti', '9f5253ea3aff356bb8ba047b00fbe73a.jpg', 'Nusa Tenggara Barat'),
(11, 'Nadya Amanda', 'Salju Abadi di Indonesia', 'Pegunungan Jayawijaya adalah rangkaian pegunungan yang membujur di Provinsi Papua, Indonesia. Rangkaian Pegunungan Jayawijaya juga merupakan pegunungan tertinggi di Indonesia, dengan puncak tertingginya yaitu Puncak Jaya (4.884 meter dari permukaan laut). Indonesia yang terletak di garis khatulistiwa memang memiliki iklim tropis sehingga tidak memungkinkan adanya turun salju di wilayahnya. Namun keajaiban alam muncul di Indonesia. Salah satunya yaitu salju abadi di puncak Gunung Jayawijaya.  Di puncak pegunungan Jayawijaya terdapat salju abadi yang jumlahnya semakin menipis akibat pemanasan global. Salju di Puncak Jayawijaya merupakan salah satu fenomena alam yang unik, karena es alami biasanya tidak turun di sepanjang khatulistiwa. Jika dilihat dari udara, Puncak Jayawijaya bagaikan permadani yang diselimuti tudung putih. Jika matahari sedang cerah, maka hamparan salju tersebut akan memantulkan cahaya matahari yang menyilaukan namun tetap mengagumkan. Keindahan Puncak Jayawijaya atau yang lebih dikenal para pendaki sebagai Piramida Carstenz terdaftar sebagai satu dari tujuh puncak benua (seven summit) yang sangat fenomenal dan menjadi incaran para pendaki gunung di berbagai belahan dunia. Carstenz diambil dari nama penemu pegunungan ini, Jan Carstenz yang melihat adanya puncak gunung bersalju di daerah tropis melalui sebuah kapal laut di tahun 1623.', '2020-11-21 03:47:36', '2020-11-29 10:59:52', 1, 'Salju-Abadi-di-Indonesia', '869ab5dab872a73e09480c659804f39f.jpg', 'Papua'),
(12, 'Ivana Gabriella Manurung', 'Danau Toba', 'Danau Toba adalah danau alami berukuran besar di Indonesia yang berada di kaldera Gunung Supervulkan. Danau ini memiliki panjang 100 kilometer (62 mil), lebar 30 kilometer (19 mi), dan kedalaman 505 meter (1657 ft). Danau ini terletak di tengah pulau Sumatra bagian utara dengan ketinggian permukaan sekitar 900 meter (2953 ft). Danau ini membentang dari 2.88Â°N 98.52Â°E sampai 2.35Â°N 99.1Â°E. Ini adalah danau terbesar di Indonesia dan danau vulkanik terbesar di dunia. Dulunya saat gunung ini meletus, ledakannya sangat dahsyat sehingga membuat suhu seluruh samudera turun hingga 5 derajat celcius. Letusan Gunung Toba saat itu juga membuat 60 persen populasi manusia di sekitar gunung menjadi korban. Danau Toba bukanlah danau yang kecil dan dangkal. Danau ini memiliki ukuran panjang 100 kilometer dan lebar sekitar 30 kilometer. Sedangkan untuk kedalamannya, Danau Toba memiliki kedalaman 505 meter atau 1657 kaki. Kedalaman Danau Toba yang bukan main-main membuat pencahayaan di danau ini terbatas. Di kedalaman 40 meter saja jangkauan lihatnya hanya 1,5 meter.  Pulau di tengah Danau Toba ternyata bukan hanya Pulau Samosir saja, melainkan ada beberapa pulau lain, di antaranya Pulau Tulas, Pulau Sibandang, Pulau Malau, dan Pulau Tolping. Sehingga setidaknya ada lima pulau yang ada di Danau Toba.\r\n\r\n', '2020-11-25 12:42:59', '2020-11-29 11:00:06', 1, 'Danau-Toba', '76e87a04e413ee328b79ea7396e1ed4b.jpg', 'Sumatera Utara'),
(13, 'Ivana Gabriella Manurung', 'Pantai Kuta', 'Pantai Kuta adalah sebuah tempat pariwisata yang terletak kecamatan Kuta, sebelah selatan Kota Denpasar, Bali, Indonesia. Daerah ini merupakan sebuah tujuan wisata turis mancanegara dan telah menjadi objek wisata andalan Pulau Bali sejak awal tahun 1970-an. Dulunya Pantai Kuta merupakan pelabuhan dagang di Pulau Bali dan menjadi pusat pemasaran. Seiring berjalannya tahun, Pantai Kuta menjadi destinasi yang populer dan menjadi landmark Pulau Bali. Berbagai fasilitas pun mulai dilengkapi seperti kedai-kedai, pusat perbelanjaan, dan hotel dekat Pantai Kuta dengan harga yang bervariatif. Pantai Kuta terkenal sebagai tempat yang baik untuk melihat sunset dan surga bagi peselancar pemula. Di sepanjang Pantai Kuta juga terdapat banyak pedagang souvenir yang berjejer menjajakan kain, pakaian, hingga aksesoris khas Bali.', '2020-11-25 17:56:38', '2020-11-29 11:00:25', 1, 'Pantai-Kuta', '24cbb062087f0fa8e890a4955918400e.jpg', 'Bali'),
(14, 'Azhar Rizky Zulma', 'Test Provinsi Post', 'Apakah Test Provinsi Berhasil?', '2020-12-03 08:10:52', '2020-12-03 08:13:02', 0, 'Test-Provinsi-Post', '58be64972ac89a0efc792cc01eee65e8.png', 'DKI Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `name`) VALUES
(1, 'joe', 'joe@mineversal.com', '$2y$10$P/YZLUVo..Jzjv5h2MjQPehC0CBXgNQQaMzIMbA0O4YPuvVSA6Mk2', 'Azhar Rizky Zulma'),
(2, 'admin', 'admin@mineversal.com', '$2y$10$egYTnKawZXandBjvuNFFY.IPIHd2m40/padvvJuRQbclgRXQdsUES', 'Admin'),
(3, 'staff', 'staff@mineversal.com', '$2y$10$sh/W1kYb7s1LvvHJd3pK7eXo.fR4W1TilNHIEM384HBzk0zmOH/Y2', 'Staff'),
(4, 'beauty', 'beauty@mineversal.com', '$2y$10$Z6r8mzFofcMWHXLs5DBCOexW/jpdF8lpg2tiLng1GQivfITr8LtKC', 'Beauty'),
(5, 'Anggara', 'anggarasurya5252@gmail.com', '$2y$10$YMvGZ2e.vOYw/lFE8uuuceQicJmRRphmUrGM74EqRCmI/aWHSxoRG', 'Anggara'),
(6, 'kevin21', 'kevinvalerianninia@gmail.com', '$2y$10$oIgCBhxO304eH/r5nlixDOnO7J1tpiGrN8yswmtFP3soHIQkQGl9S', 'Kevin Valerian'),
(7, 'Kharis Nugroho', 'ahmadkharisnugroho@gmail.com', '$2y$10$LsVWQ5aDHw4X/gSroDs4duntlNhw8Au0c9vN1RQjV4vTNCLjpN0RC', 'Ahmad'),
(8, 'ndyamn', 'nadyamanda@gmail.com', '$2y$10$EzzmkJNIuxHFOid.6s6sBeBC990jaUvyuGJfDLv5Le9uaP8fv9v1m', 'Nadya Amanda'),
(9, 'bima', 'Ajsk@gmail.com', '$2y$10$MIrFeG1.BwEKXlkOJXmdFOKKDsEwH.0qNZc7qa5QBqqsLhUND0oB2', 'kwwk'),
(10, 'Admin123', 'Admin@gmail.com', '$2y$10$1qWbF2RK8ZpwNhUI1I3GQOW9CodI5gpF0CgOs3gvPOHS/PiE5Xs82', 'adminmu'),
(11, 'Testing Bug', 'afif29644@gmail.com', '$2y$10$SLu2bVkH2ZGgGg4a.TlsfOse0Gae8/v1qizSa.NYx/ktd/WdivfGe', 'Testing Bug'),
(12, 'coba', 'coba@mail.com', '$2y$10$wpqYTaJ8s6gE21LeIhBhQu.fa4FAeJNIKEzuY8hWRKQ0HF0tX45Iu', 'coba'),
(13, 'nmmm', 'oppaichan9@gmail.com', '$2y$10$8XpbPJuqd3ZrDcZLG.Z2furGSx.2klXWa/fA9xbivuUhwWMzi05d.', 'Anon CUki'),
(14, 'tes', 'tes@qbc.com', '$2y$10$L0O.MxFGomSUGfhShKIgJeqMU8vYWyUOuoD0wl2ZjNBRsWr/gbS.C', 'tes'),
(15, 'pendipramana', 'packinggrill@gmail.com', '$2y$10$DHtZ77KT0kZFA3qFsAQKGuShOfVuF4PxbHeyLUn71DOmmT/4YM4zK', 'Dongkang Tonde'),
(16, 'rpan', 'ulenulen15@gmail.com', '$2y$10$GATa.E0AfwVjzIJEBO8I6eW7R3WgELNC/lxS206GJE.4257ulau/K', 'Raipan'),
(17, 'captnamy', 'yobtob7@gmail.com', '$2y$10$/f1Y1IkiEPDyA6eA/U6W3.JXYwcpFeO43LEB80t0vVC7Xn1Mb5r56', 'Ahid novryan'),
(18, 'tespak', 'tespak@gmail.com', '$2y$10$PM7m2qycEuSXfhSG/PHlLudsUG2RUz47shssRzDSSZ4cnwZ/sxgci', 'Tes pak'),
(19, 'test123', 'test123@gmail.com', '$2y$10$tgT0jU.sifFfPTYg5oWdWuAxf/518tgK7V5QTZ8xlqo17qYUVAleG', 'test'),
(20, 'amanda', 'amanda@gmail.com', '$2y$10$VZdo/tkWV169C1z4jZPnBuDmboQlAzX6nE6YnUvOhHNRWLnCHmODG', 'Amanda'),
(21, 'cobaindongdongg', 'cobain@dong.ahhh', '$2y$10$s6WQFaU1kDflzcyZomDfUeufb2sZbLrCAqM2Z1Wq46XwmCPFRAz3e', 'alert(&#34;Hello! I am an alert box!!&#34;);'),
(22, 'aaaaa', 'aaa@gmail.com', '$2y$10$3wqqJfpU9vEAutnpY25lEO1.VYkrQfrGcKNieNR6kUY8.PF.uga1i', 'Skkskwkkww'),
(23, 'bughunter', 'bughunter@gmail.com', '$2y$10$sY.N8Ht8QALQII5CFcxvxuE3o0XbDvyXote8tIzwpFyvzdexk.eg.', 'Bug Hunter'),
(24, 'virgin retard', 'virginretard@gmail.com', '$2y$10$H5FQRqHYbkbon3jxLzi3RO/f0e73MHUq5S61QHgRgkkJ6ygf8Alyq', 'Virgin Retard'),
(25, 'rzr1991', 'ivanagm1991@gmail.com', '$2y$10$K0Kcv5OapsdQialB0fmG7OmNArXUYA3qMb/gMe4yNpU1mMFDnjX5i', 'Ivana Gabriela'),
(26, 'zidan', 'aldy10ball@gmail.com', '$2y$10$Etm.p1gSnXYB0GSYa9jVmO3pSEZdV8iJD77NV.WTHb/ZY4707aU.u', 'Zidan'),
(27, 'asd', 'asd@gmail.com', '$2y$10$cYESqZPBST1ytz6XRbcT7eqmzEETZiwwnmkUuQA4YAJ5R7hHePmym', 'asd'),
(28, 'sinyoa', 'nazmudini0001@gmail.com', '$2y$10$bicF6UfwOBaFfAd7yFLpY.bo/iLNFP/EuXm8LjXMlqmQpAk7uvUXe', 'Nazmudin'),
(29, 'abc', 'abc@gmail.com', '$2y$10$U/xwDPwZmT1oo2y0c4g9eej2g8lJmKxsdFbzvKnUOiUk3NpA6Fegq', 'abc'),
(30, 'satria', 'satria223403@gmail.com', '$2y$10$4RKiv755nEVQZ4NyERjYw.ePyOF/O5O3AfPrbaLy9Ig40lvbImnEG', 'Satria Inawan Syah'),
(31, 'fiolina04', 'dickavalency303@gmail.com', '$2y$10$UEZXauxLijJDMNV7Y2Z5Uehd.p5hxtCFLcmf4WUSxtVJn7KY.Y04C', 'Fiolina'),
(32, 'rismarakhel', 'rismarakhels@gmail.com', '$2y$10$OED8FG7KUr192EjsccQsG.VgAYNR0yoXrah5sAv/3QInvJfk/9Qh6', 'RRS'),
(33, 'salmaaa', 'yeftasalma05@gmail.com', '$2y$10$HLZEd1LGzugUSFTHHneVGuoosr9XdU1.f6Wnwsst4B/N0wpg6xNuS', 'Yefta salma'),
(34, 'mrkrabb', 'muhrafi19002@gmail.com', '$2y$10$na0wTcVR2HtlTCF8IaXzveZvYQHoDNyqwEAgrwQXwmRuPRmm1TgQm', 'Muhammad Rafi'),
(36, 'dian', 'dian.pratiwi@trisakti.ac.id', '$2y$10$o9DdN5drZBIGaYID9f21PuG0BmnHXLN6Iinry.M.MLtXN3V5b/Sjq', 'Dian Pratiwi'),
(38, 'veronica', 'veronica@gmail.com', '$2y$10$6d.wHSLSCU3YQC40FA8Zf.cQAEQHZ5NUY7p0eIzsNEH0pjVnHDW6m', 'veronica'),
(39, 'rezkifebrian', 'rzkfebrian@yahoo.com', '$2y$10$3943DHyVYDQaTk1PqZv9Au0/YEgzhrUIBKpdKlGHM.Or.KI.oNuci', 'rezki'),
(40, 'james', 'james@gmail.com', '$2y$10$PdKJECHxqL83E0mELNgdKePHTq7rg.7tdfO/9nTxGSzfywnSWxK7K', 'James'),
(41, 'fikrimr22', 'fiqkrireihan10@gmail.com', '$2y$10$4sWepxqWw0IF1yGw/eayfOA1aJMLXjPpDSAPCvphvVFmZwm9X8Xgq', 'fiqkri'),
(42, 'nadyaa', 'nadyaamandariz@gmail.com', '$2y$10$uAzZPNh8E.xkaSF7er4T7eFOwKRT1BnEEM7xQ0sbywcW7KdLs6cmm', 'Nadya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `habit`
--
ALTER TABLE `habit`
  ADD PRIMARY KEY (`id_habbit`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `[username]` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `habit`
--
ALTER TABLE `habit`
  MODIFY `id_habbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
