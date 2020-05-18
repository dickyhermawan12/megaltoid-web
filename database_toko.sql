
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `database_toko`
--

CREATE SCHEMA IF NOT EXISTS database_toko CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE database_toko;

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `banner_id` int NOT NULL,
  `barang_id` int NOT NULL,
  `banner` varchar(100) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `link` varchar(500) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `barang_id` int NOT NULL,
  `kategori_id` int NOT NULL,
  `nama_barang` varchar(250) NOT NULL,
  `spesifikasi` text NOT NULL,
  `gambar` varchar(300) NOT NULL,
  `harga` int NOT NULL,
  `stok` tinyint(1) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kategori_id` int NOT NULL,
  `kategori` varchar(150) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_pembayaran`
--

CREATE TABLE IF NOT EXISTS `konfirmasi_pembayaran` (
  `konfirmasi_id` int NOT NULL,
  `pesanan_id` int NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_account` varchar(150) NOT NULL,
  `total_pembayaran` int NOT NULL,
  `tanggal_transfer` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `kota_id` int NOT NULL,
  `kota` varchar(150) NOT NULL,
  `tarif` int NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE IF NOT EXISTS `pesanan` (
  `pesanan_id` int NOT NULL,
  `kota_id` int NOT NULL,
  `user_id` int NOT NULL,
  `nama_penerima` varchar(150) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `tanggal_pemesanan` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_detail`
--

CREATE TABLE IF NOT EXISTS `pesanan_detail` (
  `pesanan_id` int NOT NULL,
  `barang_id` int NOT NULL,
  `quantity` tinyint(2) NOT NULL,
  `harga` int NOT NULL
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL,
  `level` varchar(30) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(160) NOT NULL,
  `alamat` varchar(400) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(300) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB;


INSERT INTO `kota` (`kota_id`, `kota`, `tarif`, `status`) VALUES
(1, 'Sumedang', 13000, 'on'),
(2, 'Bandung', 12000, 'on'),
(3, 'Bekasi', 7000, 'on'),
(4, 'Bogor', 8500, 'on'),
(5, 'Semarang', 20000, 'on'),
(6, 'Surabaya', 35000, 'on');

INSERT INTO `kategori` (`kategori_id`, `kategori`, `status`) VALUES
(2, 'Nendoroid', 'on'),
(3, 'Figure', 'on'),
(4, 'Model Kit', 'on'),
(5, 'Manga', 'on'),
(6, 'Digital Album', 'on');

INSERT INTO `barang` (`barang_id`, `kategori_id`, `nama_barang`, `spesifikasi`, `gambar`, `harga`, `stok`, `status`) VALUES
(3, 2, 'Nendoroid Ant-Man - Endgame Ver.', '<p><em><strong>&quot;Antman&quot; from &quot;Avengers: End Game&quot;</strong></em><br />\r\nFrom the blockbuster movie &quot;The Avengers: End Game&quot; comes a Nendoroid of &quot;Antman&quot;. This product, which is fully movable, can reproduce both the mask and bare face. In addition, since the reduced Ant-Man and Wasp are included, you can enjoy using the special props to recreate the battle scene.</p>\r\n', '58821-nendoroid-ant-man-endgame-ver.jpg', 560000, 8, 'on'),
(4, 2, 'Nendoroid Marisa Kirisame 2.0', '<p><strong>Marisa is back, now in a 2.0 version!</strong><br />\r\nFrom Team Shanghai Alice&#39;s popular &quot;Touhou Project&quot; game series comes a 2.0 Nendoroid of Marisa Kirisame! She comes with a standard expression, a combat expression and a cute toothy smiling expression.<br />\r\n<br />\r\nShe comes with her broom, spellbook and mini-Hakkero as optional parts. An effect part to recreate her Master Spark attack is included as well! She also comes with interchangeable sitting parts and a teacup so you can display her taking a break and relaxing. Finally, attachment parts to display her riding her broom are included too! Have fun displaying Marisa in all kinds of poses! Be sure to add her to your collection!</p>\r\n', '58816-nendoroid-marisa-kirisame-20.jpg', 480000, 10, 'on'),
(5, 3, 'PVC Figure 1/7 Asuna - GGO Ver.', '<p>Specifications Pre-painted Complete Figure<br />\r\n<strong>Scale:</strong> 1/7<br />\r\n<strong>Size:</strong> Approx. H260mm, Approx. L280mm (including weapon)<br />\r\n<strong>Material:</strong>&nbsp;PVC &amp; ABS<br />\r\n<br />\r\n<strong>[Set Contents]</strong></p>\r\n\r\n<ul>\r\n	<li>Main figure</li>\r\n	<li>Base</li>\r\n</ul>\r\n\r\n<p><strong>Details Sculptor:</strong> Touji Tanaka<br />\r\n<strong>Cooperation:</strong> Alter<br />\r\n<strong>Paintwork:</strong> DUTCH</p>\r\n', '57930-pvc-figure-17-asuna-ggo-ver.jpg', 2450000, 3, 'on'),
(6, 3, 'PVC Figure 1/7 Yoshino Yorita - Wadatsumi no Michibikite Ver.', '<p>Specifications Pre-painted Complete Figure<br />\r\n<strong>Scale:</strong> 1/7<br />\r\n<strong>Size:</strong> Approx. H240mm (including base)<br />\r\n<strong>Material:</strong> ABS&amp;ATBC-PVC<br />\r\n<br />\r\n<strong>[Set Contents]</strong></p>\r\n\r\n<ul>\r\n	<li>Main figure</li>\r\n	<li>Base</li>\r\n</ul>\r\n\r\n<p><strong>Details Sculptor:</strong> Mamoru Manzoku (Knead)<br />\r\n<strong>Paintwork:</strong> Kawamo (Revolve)<br />\r\n<strong>Cooperation:</strong> Alice Glint</p>\r\n', '57932-pvc-figure-17-yoshino-yorita-wadatsumi-no-michibikite-ver.jpg', 2765000, 4, 'on'),
(8, 2, 'Nendoroid Doll Alice (Re-Release)', '<p><strong>The Nendoroid Doll original character Alice is back!</strong><br />\r\nIntroducing the Nendoroid Doll series - an addition to the Nendoroid series which features the same Nendoroid heads, but an alternate doll-like body that is highly articulated and can easily be dressed-up into different outfits while still remaining a palm-sized action figure!<br />\r\n<br />\r\nThe original character Alice, a kind girl full of curiosity, is rejoining the Nendoroid Doll series. Her cute one-piece dress and white apron make for an adorable, girly costume. The head part of the Nendoroid can easily be switched with previously released Nendoroids allowing you to dress-up your favorite characters in an all new outfit!<br />\r\n<br />\r\n*Please note that some Nendoroids may not be compatible depending on their individual specifications.<br />\r\n<br />\r\n- Set Contents -<br />\r\n<br />\r\nFigure</p>\r\n\r\n<ul>\r\n	<li>Hair Accessory</li>\r\n	<li>Striped One-piece Dress with Ribbon</li>\r\n	<li>Apron</li>\r\n	<li>Pannier</li>\r\n	<li>Striped Tights</li>\r\n	<li>Shoes (With Magnets in Soles)</li>\r\n	<li>Interchangeable Hand Parts (Closed Hands / Peace Hands)</li>\r\n	<li>Magnetic Base</li>\r\n	<li>Articulated Stand</li>\r\n</ul>\r\n', '57056-nendoroid-doll-alice-re-release.jpg', 520000, 6, 'on'),
(9, 2, 'Nendoroid Doll Ruler / Jeanne d Arc - Casual Ver.', '<p><strong>Ruler is now a Nendoroid Doll!</strong><br />\r\nFrom the anime series &quot;Fate/Apocrypha&quot; comes a Nendoroid Doll of Ruler, the mediator of the Great Holy Grail War summoned by the Holy Grail, in her casual outfit! Nendoroid Dolls feature the same Nendoroid heads, but an alternate doll-like body that is highly articulated and can easily be dressed-up into different outfits while still remaining a palm-sized action figure! Be sure to add Ruler in her faithfully recreated outfit to your collection!<br />\r\n<br />\r\n*Skin tone of this Nendoroid Doll is a special color to match that of the original character.<br />\r\n<br />\r\nSet Contents:</p>\r\n\r\n<ul>\r\n	<li>Figure</li>\r\n	<li>Jacket</li>\r\n	<li>Top</li>\r\n	<li>Shorts</li>\r\n	<li>Knee-High Socks</li>\r\n	<li>Loafers (with Magnets in Soles)</li>\r\n	<li>Interchangeable Hand Parts (Closed Hands (Left/Right) / Pointing Hands (Left/Right))</li>\r\n	<li>Magnetic Base (For Magnetic Soled Shoes)</li>\r\n	<li>Articulated Stand</li>\r\n</ul>\r\n', '57619-nendoroid-doll-ruler-jeanne-darc-casual-ver.jpg', 540000, 6, 'on'),
(10, 6, '[Digital Album] Irui - Feryquitous', '<p><strong>Feryquitous 3rd Solo Album</strong></p>\r\n\r\n<p>Tracks:</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>1.</td>\r\n			<td>Feryquitous - 命</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2.</td>\r\n			<td>Feryquitous - 働き者の国 / 優しい街</td>\r\n		</tr>\r\n		<tr>\r\n			<td>3.</td>\r\n			<td>Feryquitous - 社会の国 / 孤独と雑光</td>\r\n		</tr>\r\n		<tr>\r\n			<td>4.</td>\r\n			<td>Feryquitous - 荒廃した国 / 残された音</td>\r\n		</tr>\r\n		<tr>\r\n			<td>5.</td>\r\n			<td>Feryquitous - 窓</td>\r\n		</tr>\r\n		<tr>\r\n			<td>6.</td>\r\n			<td>Feryquitous - 祠 / ある監視の視点</td>\r\n		</tr>\r\n		<tr>\r\n			<td>7.</td>\r\n			<td>Feryquitous - 機械の国 / 犠牲の塔</td>\r\n		</tr>\r\n		<tr>\r\n			<td>8.</td>\r\n			<td>Feryquitous(Vo.Sennzai) - 鳴石碑</td>\r\n		</tr>\r\n		<tr>\r\n			<td>9.</td>\r\n			<td>Feryquitous - 禊 幽世への儀</td>\r\n		</tr>\r\n		<tr>\r\n			<td>10.</td>\r\n			<td>Feryquitous - 最初の国 / 喉の淵</td>\r\n		</tr>\r\n		<tr>\r\n			<td>11.</td>\r\n			<td>Feryquitous(Vo.Sennzai) - 声</td>\r\n		</tr>\r\n		<tr>\r\n			<td>12.</td>\r\n			<td>Feryquitous - 君へ触れる</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '60001-feryquitous-irui.jpg', 28000, 15, 'on'),
(11, 2, 'Nendoroid Cocoa / Kokoa (Re-Release)', '<p><em><strong>&quot;Just leave it to your big sister!&quot;</strong></em><br />\r\nFrom the popular anime &quot;Is the Order a Rabbit??&quot; comes a rerelease of the Nendoroid of the Rabbit House caf&eacute;&#39;s employee, Cocoa! She comes with three face plates including a cheerful standard face, a smiling face with closed eyes as well as a determined expression beaming with confidence.<br />\r\n<br />\r\nOptional accessories include caf&eacute;&#39;s items such as a coffee cup and tray, as well as the rabbit Tippy and a digital camera. The Nendoroid also includes the dog ears and tail that featured in the series! Be sure to display her together with Nendoroid Chino who is being rereleased at the same time! Is the order two Nendoroids?</p>\r\n', '56376-nendoroid-cocoa-kokoa-re-release.jpg', 530000, 7, 'on'),
(12, 2, 'Nendoroid Shinnosuke Nohara / Shinchan', '<p><strong>Shinchan joins the Nendoroid series!</strong><br />\r\nFrom the popular anime series &quot;Crayon Shinchan&quot; comes a Nendoroid of the curious 5-year-old Shinnosuke Nohara! He comes with three face plates including a standard expression, an exhausted expression and an excited expression. His eyebrows are articulated and interchangeable, allowing you to display him with all kinds of different expressions!<br />\r\n<br />\r\nHis dog Shiro and his favorite snack Chocobi are included as optional parts! Interchangeable parts to recreate his appearance as the &quot;Butt Alien&quot; are also included! Various hand parts are included too, so you can recreate all kinds of poses. Be sure to add him to your collection!</p>\r\n', '57054-nendoroid-shinnosuke-nohara.jpg', 610000, 7, 'on'),
(13, 5, 'Manga Laid-Back Camp Vol. 8', '<p>Original From UK (English Language)</p>\r\n', '56060-manga-laid-back-camp-vol-8.jpg', 170000, 8, 'on'),
(14, 4, 'HG 1/300 Gran Saurer', '<p><strong>Specifications:</strong> Plastic Model<br />\r\nDetails Accessory:</p>\r\n\r\n<ul>\r\n	<li>Big Lancer x1</li>\r\n	<li>Tricera Shield x1</li>\r\n	<li>King Blade x1</li>\r\n	<li>Combining part for King Go Saurer x1 set</li>\r\n	<li>Foiled sticker x1</li>\r\n</ul>\r\n', '53893-hg-1300-gran-saurer.jpg', 700000, 2, 'on'),
(15, 5, 'Manga Our Last Crusade or the Rise of a New World Vol. 2', '<p>Original From UK (English Language)</p>\r\n', '54575-manga-our-last-crusade-or-the-rise-of-a-new-world-vol-2.jpg', 190000, 0, 'on'),
(16, 6, '[Digital Album] Clearly -AD:HOUSE BEST-', '<p><strong>Diverse System AD:House Special Compilation</strong></p>\r\n\r\n<h3><strong>DISC 1</strong></h3>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>01</td>\r\n			<td>INTO THE LIGHT</td>\r\n			<td>Hiroshi Okubo (nanosounds.jp) feat. SAK.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>02</td>\r\n			<td>Count on you</td>\r\n			<td>ag feat. 倉先</td>\r\n		</tr>\r\n		<tr>\r\n			<td>03</td>\r\n			<td>Someday</td>\r\n			<td>Iris (as Lvndr) feat. Kiri T</td>\r\n		</tr>\r\n		<tr>\r\n			<td>04</td>\r\n			<td>Get On The Floor</td>\r\n			<td>good-cool</td>\r\n		</tr>\r\n		<tr>\r\n			<td>05</td>\r\n			<td>I Got Trolled</td>\r\n			<td>TFON_Scarlet</td>\r\n		</tr>\r\n		<tr>\r\n			<td>06</td>\r\n			<td>THE BLUE AND YOU</td>\r\n			<td>Nush</td>\r\n		</tr>\r\n		<tr>\r\n			<td>07</td>\r\n			<td>Aqua Fairy</td>\r\n			<td>BlackY</td>\r\n		</tr>\r\n		<tr>\r\n			<td>08</td>\r\n			<td>Follow Me</td>\r\n			<td>ag feat. 倉先</td>\r\n		</tr>\r\n		<tr>\r\n			<td>09</td>\r\n			<td>Clear Memories</td>\r\n			<td>Hiroshi Okubo (nanosounds.jp)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>10</td>\r\n			<td>What You Are</td>\r\n			<td>naotyu- feat. Aizdean</td>\r\n		</tr>\r\n		<tr>\r\n			<td>11</td>\r\n			<td>Altusanima</td>\r\n			<td>Disciples</td>\r\n		</tr>\r\n		<tr>\r\n			<td>12</td>\r\n			<td>Poivron</td>\r\n			<td>Blacklolita</td>\r\n		</tr>\r\n		<tr>\r\n			<td>13</td>\r\n			<td>Paradiso</td>\r\n			<td>mossari</td>\r\n		</tr>\r\n		<tr>\r\n			<td>14</td>\r\n			<td>Moonlight Scent</td>\r\n			<td>ハム</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>DISC 2</strong></h3>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>01</td>\r\n			<td>ララルトゥタ</td>\r\n			<td>sweez / Meine Meinung</td>\r\n		</tr>\r\n		<tr>\r\n			<td>02</td>\r\n			<td>Soleil</td>\r\n			<td>Powerless</td>\r\n		</tr>\r\n		<tr>\r\n			<td>03</td>\r\n			<td>BELOVED</td>\r\n			<td>Nardis</td>\r\n		</tr>\r\n		<tr>\r\n			<td>04</td>\r\n			<td>Secret Love</td>\r\n			<td>Kenichi Chiba feat. EVO+</td>\r\n		</tr>\r\n		<tr>\r\n			<td>05</td>\r\n			<td>Heart and Soul</td>\r\n			<td>Hiroshi Okubo (nanosounds.jp) feat. SAK.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>06</td>\r\n			<td>Nonsense Spring</td>\r\n			<td>good-cool feat. Sana</td>\r\n		</tr>\r\n		<tr>\r\n			<td>07</td>\r\n			<td>Footsteps in Summer</td>\r\n			<td>KO3</td>\r\n		</tr>\r\n		<tr>\r\n			<td>08</td>\r\n			<td>夏恋 feat. Kanae Asaba</td>\r\n			<td>Takahiro Eguchi + Tomohiko Togashi</td>\r\n		</tr>\r\n		<tr>\r\n			<td>09</td>\r\n			<td>Shining Girl, Shyness Love</td>\r\n			<td>Yamajet feat. TEA</td>\r\n		</tr>\r\n		<tr>\r\n			<td>10</td>\r\n			<td>Over the Azure</td>\r\n			<td>Powerless</td>\r\n		</tr>\r\n		<tr>\r\n			<td>11</td>\r\n			<td>Iris</td>\r\n			<td>Ym1024</td>\r\n		</tr>\r\n		<tr>\r\n			<td>12</td>\r\n			<td>Fruits Cake Fly High</td>\r\n			<td>Takahiro Eguchi + Tomohiko Togashi</td>\r\n		</tr>\r\n		<tr>\r\n			<td>13</td>\r\n			<td>Our Passion</td>\r\n			<td>100-200+tanigon</td>\r\n		</tr>\r\n		<tr>\r\n			<td>14</td>\r\n			<td>PHOENIX (Part.1)</td>\r\n			<td>roop</td>\r\n		</tr>\r\n		<tr>\r\n			<td>15</td>\r\n			<td>Finale</td>\r\n			<td>削除</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>DISC 3</strong></h3>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>01</td>\r\n			<td>BANG!</td>\r\n			<td>Shoichiro Hirata feat.Sana</td>\r\n		</tr>\r\n		<tr>\r\n			<td>02</td>\r\n			<td>Paradero</td>\r\n			<td>Dirty Androids</td>\r\n		</tr>\r\n		<tr>\r\n			<td>03</td>\r\n			<td>dreamland</td>\r\n			<td>Kenichi Chiba feat. EVO+</td>\r\n		</tr>\r\n		<tr>\r\n			<td>04</td>\r\n			<td>Saturday Night Groove</td>\r\n			<td>good-cool</td>\r\n		</tr>\r\n		<tr>\r\n			<td>05</td>\r\n			<td>Without You</td>\r\n			<td>Dirty Androids</td>\r\n		</tr>\r\n		<tr>\r\n			<td>06</td>\r\n			<td>Lift Me Up</td>\r\n			<td>good-cool</td>\r\n		</tr>\r\n		<tr>\r\n			<td>07</td>\r\n			<td>0 Game</td>\r\n			<td>kors k</td>\r\n		</tr>\r\n		<tr>\r\n			<td>08</td>\r\n			<td>Miamian</td>\r\n			<td>Atomic</td>\r\n		</tr>\r\n		<tr>\r\n			<td>09</td>\r\n			<td>Cross Talk</td>\r\n			<td>Shoichiro Hirata</td>\r\n		</tr>\r\n		<tr>\r\n			<td>10</td>\r\n			<td>D For You</td>\r\n			<td>tigerlily</td>\r\n		</tr>\r\n		<tr>\r\n			<td>11</td>\r\n			<td>Summer Slumber</td>\r\n			<td>Ryunosuke Kudo</td>\r\n		</tr>\r\n		<tr>\r\n			<td>12</td>\r\n			<td>Overflow</td>\r\n			<td>only</td>\r\n		</tr>\r\n		<tr>\r\n			<td>13</td>\r\n			<td>Goodbye Summernight</td>\r\n			<td>くるぶっこちゃん</td>\r\n		</tr>\r\n		<tr>\r\n			<td>14</td>\r\n			<td>Without You</td>\r\n			<td>月代 彩</td>\r\n		</tr>\r\n		<tr>\r\n			<td>15</td>\r\n			<td>海と、山と、空と、、、</td>\r\n			<td>masaki kawasaki</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'ADHB_ol-e1539323692911.png', 60000, 5, 'on');

INSERT INTO `banner` (`banner_id`, `barang_id`, `banner`, `gambar`, `link`, `status`) VALUES
(2, 11, 'Banner Nendoroid Cocoa / Kokoa (Re-Release)', 'b_259.jpg', 'index.php?page=detail&barang_id=11', 'on'),
(3, 12, 'Banner Nendoroid Shinnosuke Nohara / Shinchan', 'b_262.jpg', 'index.php?page=detail&barang_id=12', 'on'),
(4, 16, 'Banner Clearly -AD:HOUSE BEST-', 'b_300.png', 'index.php?page=detail&barang_id=16', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD PRIMARY KEY (`konfirmasi_id`),
  ADD KEY `pesanan_id` (`pesanan_id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`kota_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`pesanan_id`),
  ADD KEY `kota_id` (`kota_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD KEY `pesanan_id` (`pesanan_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  MODIFY `konfirmasi_id` int NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `kota_id` int NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `pesanan_id` int NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `banner_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`barang_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD CONSTRAINT `konfirmasi_pembayaran_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`pesanan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`kota_id`) REFERENCES `kota` (`kota_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD CONSTRAINT `pesanan_detail_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`pesanan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_detail_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`barang_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
