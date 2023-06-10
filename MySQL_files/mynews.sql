-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 03:12 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mynews`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `parent_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `parent_id`, `created_at`) VALUES
(2, 'اجتماعی', NULL, '2023-03-25 12:46:27'),
(4, 'فوتبال', NULL, '2023-03-26 06:46:37'),
(5, 'آسیب های اجتماعی', 2, '2023-03-26 06:49:30'),
(6, 'روانشناسی', 2, '2023-03-26 06:49:30'),
(7, 'لیگ دسته یک', 4, '2023-03-26 06:52:13'),
(8, 'level3', 6, '2023-03-26 06:51:05'),
(9, 'فوتسال', 4, '2023-03-26 06:52:40'),
(11, 'level4', 8, '2023-03-26 06:55:32'),
(12, 'level5', 11, '2023-03-26 13:35:13'),
(13, 'pedram', NULL, '2023-03-29 07:04:48'),
(14, 'sayeh', 13, '2023-03-29 07:04:57');

-- --------------------------------------------------------

--
-- Table structure for table `category_news`
--

CREATE TABLE `category_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `news_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_news`
--

INSERT INTO `category_news` (`id`, `category_id`, `news_id`) VALUES
(44, 2, 13),
(45, 4, 13),
(48, 2, 14),
(49, 5, 14),
(51, 14, 15),
(52, 13, 16),
(56, 13, 18),
(57, 2, 12),
(58, 8, 19),
(59, 13, 19),
(60, 14, 19),
(61, 11, 20),
(62, 13, 20),
(63, 14, 20),
(64, 2, 21),
(65, 11, 21),
(66, 13, 21),
(67, 2, 22),
(68, 5, 22),
(69, 8, 22),
(70, 13, 22),
(71, 4, 23),
(72, 7, 23),
(73, 13, 23),
(74, 2, 24),
(75, 6, 24),
(76, 13, 24),
(77, 14, 24),
(78, 4, 25),
(79, 9, 25),
(80, 11, 25),
(81, 13, 25),
(82, 14, 25),
(83, 12, 17),
(84, 13, 17),
(85, 14, 17);

-- --------------------------------------------------------

--
-- Table structure for table `command`
--

CREATE TABLE `command` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `addres` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `command` text NOT NULL,
  `likes` int(100) NOT NULL,
  `dislike` int(100) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp(),
  `number` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='command';

--
-- Dumping data for table `command`
--

INSERT INTO `command` (`id`, `addres`, `name`, `command`, `likes`, `dislike`, `data`, `number`) VALUES
(4, '/news?id=14', 'ped', 'testtttt', 1, 0, '2023-04-03 19:29:09', 0),
(5, '/news?id=14', 'پدرام', 'تست', 1, 0, '2023-04-03 19:29:51', 0),
(6, '/news?id=14', 'hahaha', 'cvdiufvuisgvuasjkghfvasrhjkgasvhjkas\r\njsgavsrfhg\r\nsjdvoasjvjklsdfjgvklskl\r\ndfss', 2, 1, '2023-04-03 20:56:33', 0),
(7, '/news?id=16', 'oefhwe`', 'rfhhrhhrfvherjgjekr \r\nkedvkevkpe nekvl;\r\nvejkbevjvjklevklnevkvevkjb vjevve', 2, 1, '2023-04-03 23:04:41', 0),
(8, '/news?id=14', 'sayeh', 'sc sccssc', 0, 0, '0000-00-00 00:00:00', 2331234),
(9, '/news?id=13', 'ppp2', 'fdgnbd', 0, 0, '0000-00-00 00:00:00', 4444),
(10, '/news?id=13', 'pp', '4gfgdbnfg', 0, 0, '0000-00-00 00:00:00', 4444),
(11, '/news?id=13', 'dddd', 'dddd', 1, 1, '0000-00-00 00:00:00', 4444),
(12, '/news?id=13', 'dgfsegedb', 'bfdbs', 0, 0, '0000-00-00 00:00:00', 55555),
(13, '/news?id=12', 'pedram', 'i love u\r\n', 1, 3, '0000-00-00 00:00:00', 1234),
(14, '/news?id=12', 'sayeh', 'fdbsbsd', 1, 0, '2023-04-04 14:31:16', 33),
(15, '/news?id=14', 'liker', 'llllllllllllllllllllllllll', 1, 0, '2023-04-04 17:13:08', 22222),
(16, '/news?id=14', 'dghgh', 'dfh', 8, 5, '2023-04-04 17:15:43', 0),
(17, '/news?id=17', 'qwwd', 'acs', 2, 3, '2023-04-04 18:12:04', 22222),
(18, '/news?id=12', 'fgmdfj', 'gmndfmn', 0, 0, '2023-04-04 19:01:12', 22222),
(19, '/news?id=20', 'sayeh', ':)', 1, 0, '2023-04-10 21:39:07', 2331234);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `short_description`, `description`, `image`, `created_at`) VALUES
(12, 'قیمت دلار امروز 6 فروردین 1402 در مرکز مبادله', 'به گزارش اکوایران، قیمت دلار امروز 6 فروردین 1402 در مرکز مبادله ارز و طلای ایران همچنان بدون تغییر در سطح 40 هزار و 200 تومان باقی مانده است.  تنها ارزی که طی روزهای نخست سال 1402 در این مرکز با تغییرات قیمتی همراه شده، یورو است و دیگر ارزها بدون تغییر ق', 'ه گزارش اکوایران، قیمت دلار امروز 6 فروردین 1402 در مرکز مبادله ارز و طلای ایران همچنان بدون تغییر در سطح 40 هزار و 200 تومان باقی مانده است.\r\n\r\nتنها ارزی که طی روزهای نخست سال 1402 در این مرکز با تغییرات قیمتی همراه شده، یورو است و دیگc سطح 43 هزار و 316 تومان رسیده است.\r\n\r\nهمچنین قیمت درهم امارات در مرکز مبادله بدون تغییر نسبت روز گذشته در سطح 10 هزار و 946 تومان باقی مانده است.\r\n\r\nقیمت دلار و درهم در مرکز مبادله از 25 اسفند 1401 بدون تغییر باقی مانده است.\r\n\r\nنرخ حواله دلار امروز 6 فروردین ماه بدون تغییر نسبت به روز گذشته رقم 36 هزار و 600 تومان را نشان می‌دهد.\r\n\r\nنرخ حواله یورو و حواله درهم امارات هم امروز تا حوالی ساعت 13 در این مرکز به ترتیب بر روی اعداد 39 هزار و 437 تومان و 9 هزار و 966 تومان ایستاده است.\r\n\r\nقیمت توافقی ارز\r\nقیمت‌ ارزها امروز یکشنبه 6 فروردین ماه همزمان با دومین روز کاری در سال 1402 در سایت کانون صرافان، بر خلاف مرکز مبادله، با تغییر همراه بوده است.\r\n\r\nدومین قیمت دلار توافقی در سال 1402 امروز در سایت کانون صرافان تا حوالی ساعت 13 با افزایش 100 تومانی نسبت به روز گذشته رقم میانگین 42 هزار و 100 تومان را نشان می‌دهد.\r\n\r\nنکته قابل توجه این است طی دو روز نخست کاری سال جدید، صرافی‌های مجاز نسبت به ثبت قیمت‌های روز دلار اقدام نکرده‌اند، به طوری که تنها یک صرافی روز گذشته قیمت دلار را در اولین روز کاری امسال یعنی 5 فروردین به‌روز کرد.\r\n\r\nهمچنین قیمت توافقی یورو نیز بدون تغییر نسبت به روز گذشته به طور میانگین رقم 45 هزار و 766 تومان را به ثبت رسانده؛ در میان صرافی‌های مجاز، هیچ صرافی قیمت یورو را در پنجم و ششم فروردین به‌روز نکرده است.\r\n\r\nقیمت درهم امارات به صورت توافقی در صرافی‌های مجاز که در اولین روز کاری امسال (دیروز) با افزایش قابل توجه 1100 تومانی در کانال جدید 13 هزار تومانی قرار گرفته بود و افزایش قیمت دلار فردایی را محتمل‌ می‌کرد، امروز 6 فروردین ماه با کاهش تقریبا 500 تومانی به کانال قبل یعنی 12 هزار تومانی بازگشت و در سطح 12 هزار و 625 تومان قرار گرفت.\r\n\r\nقیمت سکه، نیم سکه و ربع سکه\r\nدومین قیمت‌های انواع سکه در سال 1402 در سایت کانون صرافان ایرانیان درج شد.\r\n\r\nقیمت سکه امامی امروز 6 فروردین ماه با افزایش 500 هزار تومانی نسبت به روز گذشته پس از حدود یک ماه بازهم به کانال 30 میلیون تومانی بازگشت و در سطح میانگین 30 میلیون و 350 هزار تومان قرار گرفت.\r\n\r\nهمچنین تا حوالی ساعت 13 ظهر امروز 6 فروردین ماه قیمت نیم سکه در همین سایت بر خلاف قیمت سکه امامی روند کاهشی به خود گرفته و با قرار گرفتن در یک کانال پایین‌تر در سطح 17 میلیون و 600 هزار تومان قرار گرفت که نسبت به روز گذشته 400 تومان ارزان‌تر شده است.\r\n\r\nقیمت ربع سکه نیز امروز با کاهش 200 هزار تومانی نسبت به روز گذشته به طور میانگین معادل 10 میلیون و 400 هزار تومان در سایت کانون صرافان اعلام شده است.\r\n\r\nوعده‌ عرضه ربع سکه در مرکز مبادله عملی نشد!\r\nپیرو اطلاعیه مرکز مبادله ایران، قرار بوده از امروز ششم فروردین، معاملات سکه طلای ربع بهار آزادی با نماد «ربع سکه» در سامانه معاملات مرکز مبادله ارز و طلای ایران آغاز شود، اما بر خلاف آنچه وعده داده شده تا لحظه تنظیم این گزارش اطلاعیه و خبری مبنی بر عملیاتی شدن عرضه سکه در این مرکز منتشر نشده است.', '1679830487609220.jpg', '2023-04-01 08:58:25'),
(13, 'گل کاکتوس', '', '', '167983049475117.png', '2023-03-26 11:34:54'),
(14, 'پیش بینی قیمت دلار 6 فروردین 1402 / زور افزایشی‌ها به بازار دلار چربید؟', 'قیمت دلار در نخستین روزِ‌ کاری سال 1402 در روند افزایشی باز شد. معامله‌گران معتقدند سیاست تنش‌زدایی می‌تواند در روزهای آینده قیمت دلار را در کانال‌های پایین‌تر قرار دهد.', 'ه گزارش تجارت‌نیوز آغاز به کار دلار در نخستین روز کاری سال جدید افزایشی بود. قیمت دلار امروز وارد کانال جدید شد و با قیمت کشف شده در مرکز مبادله ارز و طلا نزدیک به ۱۰ هزار تومان فاصله داشت.\r\n\r\nامروز قیمت دلار در سایت،«مدیریت بازار متشکل معاملات ارز ایران، 40 هزار و 200 تومان بود که فاصله معناداری با قیمت بازار آزاد داشت و نسبت به آخرین روز کارس سال گذشته تغییری نکرده بود!\r\n\r\n\r\nتقاضای جدید وارد بازار ارز شد\r\nمعامله‌گران اختلاف قیمت بازار آزاد و مرکز مبادله‌ای را زمینه‌ساز ورود تقاضای جدید به بازار ارز دانستند. این عده معتقدند این اختلاف قیمت بین دو بازار باعث می‌شود افراد زیادی برای کسب سود، دست به کار شوند. امروز در سامانه رسمی اعلام شده توسط بازارساز، قیمت حواله‌ای دلار نیز در کانال 36 هزار تومان قرار داشت.\r\n\r\nکارشناسان با شدت گرفتن روند قیمت دلار در نخستین ساعات معاملاتی امروز معتقد بودند که در تاریخ 5 فروردین 1402، اولین حمله افزایشی‌های بازار ارز رقم خورد.\r\n\r\nهرچند با گذشت نخستین ساعات معاملاتی، میزان فروش‌ها بیشتر شد و دلار کمی از اوج قیمتی اواسط روز فاصله گرفت؛ اما برخی فعالان باور داشتند که بازارساز اقدام به عرضه فعالانه ارز کرد و به این ترتیب، طول افزایش قیمت را کوتاه‌تر کرد.  برخی بازیگران ارزی باور دارند، تحت تاثیر عرضه بازارساز ممکن است، بازار فردا را با کاهش قیمت آغاز کند.\r\n\r\nیک آنتی ویروس قدرتمند برای محافظت از شما در فضای مجازی\r\nیک آنتی ویروس قدرتمند برای محافظت از شما در فضای مجازی\r\n\r\nپیشنهاد امروز\r\nyektanet-logo-sign\r\nسیگنال صعودیِ بازارهای همسایه به دلار تهران\r\nقیمت دلار در بازارهای همسایه نیز به دلار تهران سیگنال افزایش قیمت دادند. دلار هرات با قیمت ۵۰ هزار تومان معامله شد. قیمت دلار سلیمانیه در پله‌های انتهایی کانال ۴۰ هزار تومانی نوسان داشت و با قیمت ۴۹ هزار و ۴۵۰ تومان، امروز را به پایان رساند. قیمت درهم نیز در روند صعودی قرار گرفت و با قیمت ۱۴ هزار تومان معامله شد.\r\n\r\nسیاست تنش‌زدایی قیمت دلار را پایین می‌کشد؟\r\nدر همین راستا کامبیز افسری کارشناس اقتصادی و فعال بازار ارز با اشاره به تاثیر تورم بر بازار ارز به تجارت‌نیوز گفت:« افزایش قیمت دلار از ۲۶ هزار تومانِ ابتدای سال ۱۴۰۱ تا رسیدن به قیمت ۴۸ هزار و ۳۰۰ تومانی پایان سال نشان از واکنش معقول این اسکناس آمریکایی نسبت به تورم است. این در حالی است که در سایر بازارها تورم بالاتری را شاهد بودیم.»\r\n\r\nوی افزود:« در حالی وارد سال ۱۴۰۲ می‌شویم که به نظر می‌رسد سیاست تنش‌زدایی منطقه‌ای ایران با محوریت ماموریت‌ها و سفرهای منطقه‌ای، می‌تواند سیگنال‌های مثبتی برای بازار ارز باشد.»\r\n\r\nاین کارشناس اقتصادی خاطرنشان کرد:«سال ۱۴۰۲ را می‌توان حاصل برخورد تورم عمومی، سیاست‌های پولی و مالی دولت، مذاکرات برجامی و تنش زدایی منطقه‌ای دانست.»\r\n\r\nوی تاکید کرد:«باید دید وزنه تورم انتظاری سنگین‌تر خواهد بود یا مذاکرات برجامی. این در حالی است که روند قیمت دلار در نخستین روز کاری سال جدید در مسیر صعودی باز شد اما بسیاری از فعالان بازار چشم به سیاست‌های خارجی و روند مذاکرات در روزهای آینده دارند.»', '1679835425180673.jpg', '2023-03-26 12:57:05'),
(15, 'love', 'سایه', 'i love my banoooosa', '1680073580190549.JPG', '2023-03-29 07:06:20'),
(16, 'pedram', 'sayeh', 'pedram & sayeh', '1680073760656481.JPG', '2023-03-29 07:09:20'),
(17, 'pandarehetj', 'panda', 'panda', '1680075551961590.JPG', '2023-04-17 12:54:52'),
(18, 'ef', 'efwe', 'e', '1680075615223461.jpg', '2023-03-29 07:40:15'),
(19, 'bcvnxn', 'cxbnv', 'cvbnxcvncf', '1680618885775504.jpg', '2023-04-04 14:34:45'),
(20, 'banosa', 'banosa', 'pedram and banosa ', '1681146504420892.JPG', '2023-04-10 17:08:24'),
(21, 'p1', 'p1', 'p1', '1681294323407790.JPG', '2023-04-12 10:12:03'),
(22, 'p2', 'p2', 'p2', '1681294439403759.JPG', '2023-04-12 10:13:59'),
(23, 'p4', 'p4', 'p4', '1681294600318410.JPEG', '2023-04-12 10:16:40'),
(24, 'p3', 'p3', 'p3', '1681294667803176.JPG', '2023-04-12 10:17:47'),
(25, 'p5', 'p5', 'p55ppppp', '1681298237810129.JPG', '2023-04-12 11:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_ip` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `mobile`, `password`, `last_login`, `last_ip`, `created_at`) VALUES
(2, '09399233905', '123456', '2023-03-25 06:51:29', '127.0.0.1', '2023-03-25 06:51:29'),
(5, '09399233902', '123456', '2023-03-25 09:09:21', '', '2023-03-25 09:09:21'),
(6, '09131234567', '654321', '2023-03-25 14:11:09', '', '2023-03-25 09:13:55'),
(7, '09021467202', '123', '2023-03-29 07:04:30', '', '2023-03-29 07:04:30'),
(8, '09021467204', '123', '2023-04-04 14:33:58', '', '2023-04-04 14:33:58'),
(10, '01234567890', '123', '2023-06-10 09:57:03', '', '2023-06-10 09:57:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_ibfk_1` (`parent_id`);

--
-- Indexes for table `category_news`
--
ALTER TABLE `category_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `command`
--
ALTER TABLE `command`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `category_news`
--
ALTER TABLE `category_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `command`
--
ALTER TABLE `command`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `category_news`
--
ALTER TABLE `category_news`
  ADD CONSTRAINT `category_news_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_news_ibfk_2` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
