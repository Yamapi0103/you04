-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018 年 12 月 08 日 09:16
-- 伺服器版本: 10.1.36-MariaDB
-- PHP 版本： 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `u04`
--

-- --------------------------------------------------------

--
-- 資料表結構 `active_categories`
--

CREATE TABLE `active_categories` (
  `id` int(11) NOT NULL,
  `active_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `active_categories`
--

INSERT INTO `active_categories` (`id`, `active_name`) VALUES
(1, '請選擇活動類型'),
(2, '部落格'),
(3, 'Youtube'),
(5, 'instagram'),
(6, 'facebook'),
(8, 'twitch'),
(9, '其它');

-- --------------------------------------------------------

--
-- 資料表結構 `bsmember`
--

CREATE TABLE `bsmember` (
  `BS_sid` int(11) NOT NULL,
  `BS_email` varchar(255) NOT NULL,
  `BS_password` varchar(255) NOT NULL,
  `BS_photo` varchar(255) DEFAULT NULL,
  `BS_name` varchar(255) DEFAULT NULL,
  `BS_type` varchar(255) DEFAULT NULL,
  `BS_phone` varchar(255) DEFAULT NULL,
  `BS_link` varchar(255) DEFAULT NULL,
  `BS_info` varchar(500) DEFAULT NULL,
  `BS_create_at` datetime DEFAULT NULL,
  `BS_case` varchar(255) DEFAULT NULL,
  `BS_point` int(255) DEFAULT NULL,
  `BS_billing` varchar(255) DEFAULT NULL,
  `BS_status` varchar(255) NOT NULL DEFAULT '啟用中'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `bsmember`
--

INSERT INTO `bsmember` (`BS_sid`, `BS_email`, `BS_password`, `BS_photo`, `BS_name`, `BS_type`, `BS_phone`, `BS_link`, `BS_info`, `BS_create_at`, `BS_case`, `BS_point`, `BS_billing`, `BS_status`) VALUES
(1, 'BSI0001@u04.com', 'BSI0001PS', 'BSI0001PS', 'INCEPTION啟藝', '展覽', '3294539', 'https://www.facebook.com/inceptionltd/', '1232113', '2018-11-29 16:57:10', '', 3300, '', '啟用中'),
(2, 'BSI0002@u04.com', 'BSI0002PS', '', '德國在台協會', '公家機關', '3281972', 'https://taipei.diplo.de/', '', '0000-00-00 00:00:00', '', 1000, '', '停權'),
(3, 'BSI0003@u04.com', 'BSI0003PS', '', '楓樹 韓國烤肉', '店家', '20485423', 'https://www.facebook.com/mapletreehouse', '', '0000-00-00 00:00:00', '', 4800, '', '啟用中'),
(4, 'BSI0004@u04.com', 'BSI0004PS', '', '肌膚之鑰', '店家', '20357795', 'https://www.cledepeau-beaute.com/ta/', '', '0000-00-00 00:00:00', '', 1400, '', '啟用中'),
(5, 'BSI0005@u04.com', 'BSI0005PS', '', '技嘉', '運動╱文教', '2048094242424242', 'https://www.gigabyte.com/tw/', '', '2018-11-29 17:21:08', '', 1500, '', '啟用中'),
(6, 'BSI0006@u04.com', 'BSI0006PS', '', '康橋國際學校', '公家機關', '20472804', 'http://www.kcis.ntpc.edu.tw/', '', '0000-00-00 00:00:00', '', 0, '', '啟用中'),
(7, 'BSI0007@u04.com', 'BSI0007PS', '', '雷蛇', '科技公司', '3284112', 'https://www.razer.com/hk-zh', '', '0000-00-00 00:00:00', '', 0, '', '啟用中'),
(8, 'BSI0008@u04.com', 'BSI0008PS', '', '羅技', '科技公司', '20142197', 'https://www.logitech.com/zh-tw', '', '0000-00-00 00:00:00', '', 0, '', '啟用中'),
(9, 'BSI0009@u04.com', 'BSI0009PS', '', '品木宣言', '店家', '20427432', 'https://www.origins.com.tw/', '', '0000-00-00 00:00:00', '', 0, '', '啟用中'),
(10, 'BSI0010@u04.com', 'BSI0010PS', '', '倩碧', '店家', '20100960', 'https://www.clinique.com.tw/', '', '0000-00-00 00:00:00', '', 0, '', '啟用中'),
(11, 'BSI0011@u04.com', 'BSI0011PS', '', '任天堂', '科技公司', '20514968', 'http://www.nintendo.tw/index.html', '', '0000-00-00 00:00:00', '', 0, '', '啟用中'),
(12, 'BSI0012@u04.com', 'BSI0012PS', '', '松本清', '店家', '20122768', 'https://www.matsumotokiyoshi-tw.com/', '', '0000-00-00 00:00:00', '', 0, '', '啟用中'),
(13, 'BSI0013@u04.com', 'BSI0013PS', '', '台中監獄', '公家機關', '3295103', 'http://www.tcp.moj.gov.tw/mp048.html', '', '0000-00-00 00:00:00', '', 0, '', '啟用中'),
(14, 'BSI0014@u04.com', 'BSI0014PS', '', '網彈WebZen', '科技公司', '20308561', 'http://www.webzen.com/', '', '0000-00-00 00:00:00', '', 0, '', '啟用中'),
(15, 'BSI0015@u04.com', 'BSI0015PS', '', '我的美麗日記', '店家', '20415244', 'https://www.beautydiary.com.tw/', '', '0000-00-00 00:00:00', '', 0, '', '啟用中'),
(16, 'BSI0016@u04.com', 'BSI0016PS', '', '宇峻奧汀', '科技公司', '20131382', 'https://www.uj.com.tw/', '', '0000-00-00 00:00:00', '', 0, '', '啟用中'),
(17, 'BSI0017@u04.com', 'BSI0017PS', '', '中天電視', '媒體', '20470353', 'http://www.ctitv.com.tw/', '', '0000-00-00 00:00:00', '', 0, '', '啟用中'),
(18, 'BSI0018@u04.com', 'BSI0018PS', '', 'Anna Sui', '店家', '20360367', 'https://annasui.com/', '', '0000-00-00 00:00:00', '', 0, '', '啟用中'),
(19, 'BSI0019@u04.com', 'BSI0019PS', '', 'Asus', '科技公司', '20037372', 'https://www.asus.com/tw/', '', '0000-00-00 00:00:00', '', 0, '', '啟用中'),
(20, 'BSI0020@u04.com', 'BSI0020PS', '', 'Bobbi Brown', '店家', '3282608', 'www.bobbibrowncosmetics.com.tw/', '', '0000-00-00 00:00:00', '', 2000, '', '啟用中'),
(21, 'BSI0021@u04.com', 'BSI0021PS', '', 'CATiSS', '店家', '3255962', 'https://www.catiss.com/', '', '0000-00-00 00:00:00', '', 0, '', '啟用中'),
(22, 'BSI0022@u04.com', 'BSI0022PS', '', 'Dr.Wu', '店家', '20173236', 'https://www.drwu.com/', '', '0000-00-00 00:00:00', '', 0, '', '啟用中'),
(23, 'BSI0023@u04.com', 'BSI0023PS', '', 'Jo Malone', '店家', '3288483', 'http://www.jomalone.com.tw/ch-TW/', '', '0000-00-00 00:00:00', '', 0, '', '啟用中'),
(24, 'BSI0024@u04.com', 'BSI0024PS', '', 'Kiehl\'s', '店家', '20130653', 'https://www.kiehls.com.tw/home', '', '0000-00-00 00:00:00', '', 0, '', '啟用中'),
(25, 'BSI0025@u04.com', 'BSI0025PS', '', 'SEGA', '科技公司', '20205034', 'https://www.segataiwan.com.tw/', '', '0000-00-00 00:00:00', '', 0, '', '啟用中'),
(26, 'BSI0026@u04.com', 'BSI0026PS', '', 'Tt曜越', '科技公司', '22965551', 'https://store.ttesports.com.tw/', '', '0000-00-00 00:00:00', '', 0, '', '啟用中'),
(27, 'BSI0027@u04.com', 'BSI0027PS', '', 'U2電影院', '店家', '80315552', 'http://www.u2mtv.com/', '', '0000-00-00 00:00:00', '', 0, '', '啟用中'),
(28, 'BSI0028@u04.com', 'BSI0028PS', '', 'Ubisoft', '科技公司', '26611197', 'https://store.ubi.com/sea/home?lang=zh_TW', '', '0000-00-00 00:00:00', '', 0, '', '啟用中'),
(29, 'tommy6300167@gmail.com', 'aa', NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-22 17:41:46', NULL, NULL, NULL, '啟用中'),
(30, 'test', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '啟用中');

-- --------------------------------------------------------

--
-- 資料表結構 `bs_case`
--

CREATE TABLE `bs_case` (
  `BScase_sid` int(11) NOT NULL,
  `BScase_name` varchar(255) NOT NULL,
  `BScase_photo` varchar(255) DEFAULT NULL,
  `BScase_ask_people` varchar(255) DEFAULT NULL,
  `BScase_pay` varchar(255) DEFAULT NULL,
  `BScase_location` varchar(255) DEFAULT NULL,
  `BScase_time_limit` date DEFAULT NULL,
  `BScase_fans` varchar(255) DEFAULT NULL,
  `BScase_active` varchar(255) DEFAULT NULL,
  `BScase_info` varchar(255) DEFAULT NULL,
  `BScase_publish_at` datetime DEFAULT NULL,
  `industry_name` varchar(255) DEFAULT NULL,
  `BS_sid` int(255) NOT NULL,
  `BS_state` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `bs_case`
--

INSERT INTO `bs_case` (`BScase_sid`, `BScase_name`, `BScase_photo`, `BScase_ask_people`, `BScase_pay`, `BScase_location`, `BScase_time_limit`, `BScase_fans`, `BScase_active`, `BScase_info`, `BScase_publish_at`, `industry_name`, `BS_sid`, `BS_state`) VALUES
(1, '(1) U2電影院', 'bscimg001', '1', '120000', '台北市', '2018-10-01', '500~1000', '2', '環境舒適', '2018-10-01 12:50:11', '2', 2, 0),
(2, '(2) 德國在台協會', 'bscimg002', '11', '30000', '新加坡', '2018-10-01', '100~500', '2', '交通便利', '2018-10-01 13:12:53', '3', 1, 1),
(3, '(3) 台中監獄', 'bscimg003', '8', '15000', '香港', '2018-11-29', '500~1000', '3', '市區中心', '2018-10-01 18:32:36', '3', 2, 1),
(4, '(4) 技嘉', 'bscimg004', '8', '10000', '台中市', '2018-11-30', '500~1000', '2', '河岸第一排', '2018-10-01 18:33:33', '4', 1, 1),
(5, '(5) 中天電視', 'bscimg005', '5', '35000', '新北市', '2018-10-02', '1000~2000', '3', '視野寬闊', '2018-10-02 14:31:08', '4', 1, 1),
(6, '(6) 松本清', 'bscimg006', '12', '35000', '台北市', '2018-10-02', '1000~2000', '4', '附停車位', '2018-10-02 14:31:08', '4', 5, 0),
(18, 'AAAA', '', '1', '', '', '2018-12-20', '', '3', '', '2018-12-05 15:03:42', '3', 1, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `bs_case_detail`
--

CREATE TABLE `bs_case_detail` (
  `sid` int(11) NOT NULL,
  `BScase_sid` varchar(200) NOT NULL,
  `ICmember_sid` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `bs_case_detail`
--

INSERT INTO `bs_case_detail` (`sid`, `BScase_sid`, `ICmember_sid`) VALUES
(5, '1', '42'),
(6, '2', '42'),
(7, '4', '45'),
(8, '2', '50'),
(9, '6', '42'),
(10, '18', '55');

-- --------------------------------------------------------

--
-- 資料表結構 `bs_favor`
--

CREATE TABLE `bs_favor` (
  `BF_sid` int(100) NOT NULL,
  `BS_sid` varchar(100) DEFAULT NULL,
  `IC_sid` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `bs_favor`
--

INSERT INTO `bs_favor` (`BF_sid`, `BS_sid`, `IC_sid`) VALUES
(24, '5', '4'),
(26, '5', '6'),
(28, '5', '3'),
(33, '2', '6'),
(34, '2', '4'),
(36, '2', '5'),
(37, NULL, '3'),
(38, '3', '1'),
(39, '1', '3'),
(40, '1', '4'),
(43, '20', '47'),
(46, '5', '54'),
(49, '1', '46'),
(50, '1', '45'),
(51, '1', '48'),
(52, '1', '50'),
(53, '1', '57'),
(54, '1', '43');

-- --------------------------------------------------------

--
-- 資料表結構 `bs_order`
--

CREATE TABLE `bs_order` (
  `BO_sid` int(11) NOT NULL,
  `BS_email` varchar(255) NOT NULL,
  `BO_amount` int(255) NOT NULL,
  `BO_point` int(255) NOT NULL,
  `BO_date` datetime NOT NULL,
  `BO_method` varchar(255) NOT NULL,
  `BO_re_name` varchar(255) NOT NULL,
  `BO_re_email` varchar(255) NOT NULL,
  `BO_receipt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `bs_order`
--

INSERT INTO `bs_order` (`BO_sid`, `BS_email`, `BO_amount`, `BO_point`, `BO_date`, `BO_method`, `BO_re_name`, `BO_re_email`, `BO_receipt`) VALUES
(1, '', 300, 1500, '2018-11-27 16:54:30', 'Credit', '王大明', 'aaa@hotmail.com', 'donation_receipt'),
(2, '', 500, 3000, '2018-11-27 17:04:29', 'ATM', '王大明', 'aaa@hotmail.com', 'edit_receipt'),
(3, '', 750, 5000, '2018-11-27 17:09:37', 'Credit', '王大明', 'aaa@hotmail.com', 'phone_barcode'),
(4, '', 300, 1500, '2018-11-27 17:11:29', 'Credit', '王大明', 'aaa@hotmail.com', 'donation_receipt'),
(5, 'BSI0001@u04.com', 300, 1500, '2018-11-27 17:18:15', 'Credit', '王大明', 'aaa@hotmail.com', 'by_you04'),
(6, '', 500, 3000, '2018-11-27 17:32:12', 'Credit', '王大明', 'aaa@hotmail.com', 'donation_receipt'),
(7, '', 750, 5000, '2018-11-27 17:41:53', 'Credit', '王大明', 'aaa@hotmail.com', 'donation_receipt'),
(8, '', 300, 1500, '2018-11-27 17:44:00', 'Credit', '王大明', 'aaa@hotmail.com', 'phone_barcode'),
(9, 'BSI0001@u04.com', 300, 1500, '2018-11-27 17:46:12', 'Credit', '黃小花', 'aaa@hotmail.com', 'edit_receipt'),
(10, 'BSI0001@u04.com', 100, 500, '2018-11-27 17:49:06', 'Credit', '王大明', 'aaa@hotmail.com', 'phone_barcode'),
(11, 'BSI0001@u04.com', 300, 1500, '2018-11-27 17:53:31', 'Credit', '王大明', 'aaa@hotmail.com', 'donation_receipt'),
(12, 'BSI0001@u04.com', 100, 500, '2018-11-27 17:56:49', 'CVS', '王大明', 'aaa@hotmail.com', 'donation_receipt'),
(13, 'BSI0001@u04.com', 750, 5000, '2018-11-28 11:26:27', 'Credit', '王花花', 'aaa@hotmail.com', 'edit_receipt'),
(14, 'BSI0001@u04.com', 500, 3000, '2018-11-28 11:32:34', 'Credit', '王大明', 'aaa@hotmail.com', 'donation_receipt'),
(15, 'BSI0001@u04.com', 300, 1500, '2018-11-28 14:01:39', 'CVS', '王花花', 'aaa@hotmail.com', 'donation_receipt'),
(16, 'BSI0005@u04.com', 100, 500, '2018-11-28 15:42:12', 'Credit', '你好', 'eeee@gmail.com', 'donation_receipt'),
(17, 'BSI0005@u04.com', 300, 1500, '2018-11-28 15:43:52', 'Credit', 'sssss', 'sss@gmail.com', 'by_you04'),
(18, 'BSI0002@u04.com', 100, 500, '2018-11-29 12:28:00', 'ATM', '阿呆', '123@gmail.com', 'donation_receipt'),
(19, 'BSI0002@u04.com', 300, 1500, '2018-11-29 12:34:55', 'CVS', 'wwww', 'wwww@gmail.com', 'by_you04'),
(20, 'BSI0003@u04.com', 750, 5000, '2018-11-29 12:36:03', 'Credit', 'sss', 'ssss@gmail.com', 'by_you04'),
(21, 'BSI0001@u04.com', 300, 1500, '2018-11-29 17:25:05', 'ATM', 'ssss', 'sssss@gmail.com', 'Natural_barcode'),
(22, 'BSI0001@u04.com', 300, 1500, '2018-11-29 17:26:21', 'Credit', 'xxx', 'xxxxx@y04.com', 'by_you04'),
(23, 'BSI0004@u04.com', 100, 500, '2018-11-30 15:05:21', 'Credit', 'sss', 'sss@gmail.com', 'by_you04'),
(24, 'BSI0004@u04.com', 300, 1500, '2018-11-30 15:16:43', 'Credit', '333', '333@gmail.com', 'by_you04');

-- --------------------------------------------------------

--
-- 資料表結構 `bs_talk`
--

CREATE TABLE `bs_talk` (
  `sid` int(11) NOT NULL,
  `talk_sid` int(11) NOT NULL,
  `BS_content` varchar(500) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `bs_talk`
--

INSERT INTO `bs_talk` (`sid`, `talk_sid`, `BS_content`, `time`) VALUES
(1, 7, '安安我是起意', '2018-12-06 15:46:38'),
(2, 6, 'hi阿杰', '2018-12-06 15:48:17'),
(3, 8, '!', '2018-12-06 16:07:22'),
(4, 8, 'ad', '2018-12-06 16:31:48'),
(5, 6, '好啊請', '2018-12-06 17:09:09'),
(6, 6, '?\n', '2018-12-06 17:09:17'),
(7, 6, '?\n\n\n\n', '2018-12-06 17:09:21'),
(8, 6, '媽的講話啊', '2018-12-06 17:09:33'),
(9, 6, '', '2018-12-06 17:16:16'),
(10, 6, '123', '2018-12-06 17:30:57'),
(11, 6, '456', '2018-12-06 18:41:43'),
(12, 7, '1', '2018-12-06 18:56:43'),
(13, 7, '2', '2018-12-06 18:58:02'),
(14, 6, '789', '2018-12-06 18:59:12'),
(15, 7, '', '2018-12-06 18:59:36'),
(16, 9, '安安阿杰', '2018-12-06 20:45:04'),
(17, 9, '', '2018-12-06 21:11:33'),
(18, 9, '近來可好', '2018-12-06 21:16:54'),
(19, 10, 'Gina hello 您在嬤~~~', '2018-12-06 21:36:41'),
(20, 7, '4', '2018-12-06 21:42:50'),
(21, 10, '', '2018-12-07 10:11:31'),
(22, 6, '45\n', '2018-12-07 10:12:56'),
(23, 6, '', '2018-12-07 10:13:03'),
(24, 6, '', '2018-12-07 10:13:04'),
(25, 7, '', '2018-12-07 10:13:32'),
(26, 7, '', '2018-12-07 10:14:35'),
(27, 7, '安~萊斯', '2018-12-07 11:08:03'),
(28, 8, '00', '2018-12-07 11:29:48');

-- --------------------------------------------------------

--
-- 資料表結構 `chat`
--

CREATE TABLE `chat` (
  `bssid` int(11) NOT NULL,
  `icsid` int(11) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `chat`
--

INSERT INTO `chat` (`bssid`, `icsid`, `content`, `time`) VALUES
(1, 2, 'hello', '2018-11-16 09:49:29');

-- --------------------------------------------------------

--
-- 資料表結構 `contact_us`
--

CREATE TABLE `contact_us` (
  `sid` int(11) NOT NULL,
  `cu_name` varchar(100) NOT NULL,
  `cu_usertype` varchar(100) NOT NULL,
  `cu_content` varchar(500) NOT NULL,
  `cu_email` varchar(150) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `cu_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `contact_us`
--

INSERT INTO `contact_us` (`sid`, `cu_name`, `cu_usertype`, `cu_content`, `cu_email`, `status`, `cu_time`) VALUES
(4, '外省林', '廠商', '沒有什麼啦  無聊留個言', 'ttotoooto@gmamail.com', 1, '2018-12-06 22:37:43'),
(5, '測試小冰', '廠商', '我只是測試用的東西', 'test@gkkk.com.tt', 1, '2018-12-06 22:38:46'),
(6, '測試小網紅', '網紅', '測試用  不給差', 'teesssst@00fdkdk.com', 1, '2018-12-06 22:38:46'),
(7, '林老師的問題', '網紅', '我只是來留言冊數據', 'jhkjhk@gmak.colmm', 1, '2018-12-07 13:56:21');

-- --------------------------------------------------------

--
-- 資料表結構 `icmember`
--

CREATE TABLE `icmember` (
  `IC_sid` int(11) NOT NULL,
  `IC_email` varchar(255) NOT NULL,
  `IC_password` varchar(255) NOT NULL,
  `IC_photo` varchar(255) DEFAULT NULL,
  `IC_name` varchar(255) DEFAULT NULL,
  `IC_gender` varchar(255) DEFAULT NULL,
  `IC_media` varchar(255) DEFAULT NULL,
  `IC_price` int(255) DEFAULT NULL,
  `IC_case` varchar(255) DEFAULT NULL,
  `IC_yt` varchar(255) DEFAULT NULL,
  `IC_ytfans` varchar(255) DEFAULT NULL,
  `IC_fb` varchar(255) DEFAULT NULL,
  `IC_fbfans` varchar(255) DEFAULT NULL,
  `IC_ig` varchar(255) DEFAULT NULL,
  `IC_igfans` varchar(255) DEFAULT NULL,
  `IC_web` varchar(255) DEFAULT NULL,
  `IC_create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `icmember`
--

INSERT INTO `icmember` (`IC_sid`, `IC_email`, `IC_password`, `IC_photo`, `IC_name`, `IC_gender`, `IC_media`, `IC_price`, `IC_case`, `IC_yt`, `IC_ytfans`, `IC_fb`, `IC_fbfans`, `IC_ig`, `IC_igfans`, `IC_web`, `IC_create_at`) VALUES
(42, 'ICI0001@u04.com', 'ICI0001PS', '', '阿杰實況', '男', 'YouTube', 1, '50~100', 'https://www.youtube.com/channel/UCjzelMo2UzgQKXdxyPD15Gg', '500~1,000', 'https://www.facebook.com/jayplaygame/', '10~50', '', '', '', '2018-12-05 15:13:18'),
(43, 'ICI0002@u04.com', 'ICI0002PS', '', '阿心Liao', '女', 'Facebook', 3, '100~200', 'https://www.youtube.com/channel/UCscRCnRkxjTfaJSqNOH7YBQ', '100~500', 'https://www.facebook.com/hsinliao12345/', '10~50', 'https://www.instagram.com/jui0121', '100~500', '', '0000-00-00 00:00:00'),
(44, 'ICI0003@u04.com', 'ICI0003PS', '', '鬼鬼', '女', 'Instgram', 5, '100~200', 'https://www.youtube.com/channel/UC7SHHIlKiJs_-ORerKPL1kA', '500~1,000', 'https://www.facebook.com/RelaxOnityan/', '100~500', '', '', '', '0000-00-00 00:00:00'),
(45, 'ICI0004@u04.com', 'ICI0004PS', '', '萊斯Lice', '女', 'YouTube', 10, '300~500', 'https://www.youtube.com/channel/UC9WiXJEyHMGRqL-__3FIBEw', '100~500', 'https://www.facebook.com/Lice0424/', '10~50', '', '', '', '0000-00-00 00:00:00'),
(46, 'ICI0005@u04.com', 'ICI0005PS', '', '木曜4超玩', '團體', 'YouTube', 300, '200~300', 'https://www.youtube.com/channel/UCLW_SzI9txZvtOFTPDswxqg', '1,000~2,000', 'https://www.facebook.com/Muyao4/', '100~500', '', '', '', '0000-00-00 00:00:00'),
(47, 'ICI0006@u04.com', 'ICI0006PS', '', '諾斯Nox', '男', 'Facebook', 50, '100~200', 'https://www.youtube.com/channel/UCM_edhbKF1tGaDnkKC--yLA', '10~50', 'https://www.facebook.com/Hypnox9980922/', '1~5', '', '', '', '0000-00-00 00:00:00'),
(48, 'ICI0007@u04.com', 'ICI0007PS', '', '千千進食中', '女', 'YouTube', 100, '50~100', 'https://www.youtube.com/channel/UC9i2Qgd5lizhVgJrdnxunKw', '500~1', 'https://www.facebook.com/Chienseating/', '100~500', 'https://www.instagram.com/khshu_/', '100~500', '', '0000-00-00 00:00:00'),
(49, 'ICI0008@u04.com', 'ICI0008PS', '', '球球Lilballz', '男', 'Facebook', 300, '50~100', 'https://www.youtube.com/channel/UCqN5R22XDqgE9Z6V91TzynQ', '10~50', 'https://www.facebook.com/lilballzLoL/', '100~500', '', '', '', '0000-00-00 00:00:00'),
(50, 'ICI0009@u04.com', 'ICI0009PS', '', '聖結石', '男', 'YouTube', 1, '20~50', 'https://www.youtube.com/channel/UCIdhd_1spj49unBWx1fjS2A', '1,000~2,000', 'https://www.facebook.com/ShenJieShiSaint/', '500~1000', 'https://www.instagram.com/qoop1113', '100~500', '', '0000-00-00 00:00:00'),
(51, 'ICI0010@u04.com', 'ICI0010PS', '', '孫安佐', '男', 'Facebook', 3, '1~20', '', '', 'https://www.facebook.com/profile.php?id=100005600172890', '1~5', '', '', '', '0000-00-00 00:00:00'),
(52, 'ICI0011@u04.com', 'ICI0011PS', '', '星培', '男', 'Instgram', 5, '50~100', 'https://www.youtube.com/channel/UCRevYqA7N-NrSCGSm5k-KlA', '500~1,000', 'https://www.facebook.com/KingJasperHu/', '500~1,000', 'https://www.instagram.com/cba024538/', '100~500', '', '0000-00-00 00:00:00'),
(53, 'ICI0012@u04.com', 'ICI0012PS', '', '瑀熙Yuci', '女', 'Facebook', 10, '50~100', 'https://www.youtube.com/channel/UCjL1yWauBeI6WoQNVLyxwqQ', '100~500', 'https://www.facebook.com/yuci7001/', '100~500', 'https://www.instagram.com/uccu0323/', '100~500', '', '0000-00-00 00:00:00'),
(54, 'ICI0013@u04.com', 'ICI0013PS', '', 'Aries艾瑞絲', '女', 'Instgram', 30, '1~20', 'https://www.youtube.com/channel/UC3rrCl8CcCFDCI9Ti2rHsnw', '50~100', 'https://www.facebook.com/aries8248/', '100~500', 'https://www.instagram.com/aries_8248/', '100~500', '', '0000-00-00 00:00:00'),
(55, 'ICI0014@u04.com', 'ICI0014PS', '', 'Gina hello', '女', 'Blog', 50, '50~100', 'https://www.youtube.com/channel/UCSR9CHNMIg7YoNezbv4bh0A', '500~1,000', 'https://www.facebook.com/Gina.Hello/', '10~50', 'https://www.instagram.com/ginachiki/', '100~500', 'http://www.ginahello.com/', '0000-00-00 00:00:00'),
(56, 'ICI0015@u04.com', 'ICI0015PS', '', 'howhow', '男', 'Facebook', 100, '300~500', 'https://www.youtube.com/channel/UCxUzQ3wu0oJP_8YLWt71WgQ', '50~100', 'https://www.facebook.com/howfunofficial/', '100~500', 'https://www.instagram.com/howhowhasfriends/?hl=zh-tw', '100~500', '', '0000-00-00 00:00:00'),
(57, 'ICI0016@u04.com', 'ICI0016PS', '', 'Joeman', '男', 'YouTube', 300, '300~500', 'https://www.youtube.com/channel/UCPRWWKG0VkBA0Pqa4Jr5j0Q', '1,000~2,000', 'https://www.facebook.com/JoemanStation/', '100~500', 'https://www.instagram.com/joemanweng/', '100~500', '', '0000-00-00 00:00:00'),
(58, 'ICI0017@u04.com', 'ICI0017PS', '', 'the劉沛', '男', 'Instgram', 1, '100~200', 'https://www.youtube.com/channel/UCK3Ycl9dcHk0qz8yoN-6phA', '500~1,000', 'https://www.facebook.com/PierreLiuPei/', '100~500', 'https://www.instagram.com/pierreliupei/', '100~500', '', '0000-00-00 00:00:00'),
(59, 'ICI0018@u04.com', 'ICI0018PS', '', 'WACKYBOYS', '團體', 'Blog', 3, '200~300', 'https://www.youtube.com/channel/UCEfetJrzg6OcXWWuX8uhdhw', '1,000~2,000', 'https://www.facebook.com/Wackyboys.Fans/', '500~1,000', 'https://www.instagram.com/wackyboys520/', '100~500', '', '0000-00-00 00:00:00'),
(60, 'ICI0019@u04.com', 'ICI0019PS', '', '張瑋瑋', '女', 'Instgram', 5, '50~100', '', '', 'https://www.facebook.com/vianneFB/', '10~50', 'https://www.instagram.com/vnchang/', '50~100', '', '0000-00-00 00:00:00'),
(61, 'ICI0020@u04.com', 'ICI0020PS', '', 'Joyce Wu', '女', 'Blog', 10, '100~200', '', '', 'https://www.facebook.com/joycewu1120/', '100~500', 'https://www.instagram.com/joycewu1120/', '50~100', 'https://joycelohas.com/author/joycewu1120/', '0000-00-00 00:00:00'),
(62, 'ICI0017@u05.com', 'ICI0021PS', '', '湯舒雯', '女', 'Facebook', 30, '50~100', '', '', 'https://www.facebook.com/tang.s.wen.7', '10~50', '', '', '', '0000-00-00 00:00:00'),
(63, 'ICI0018@u05.com', 'ICI0022PS', '', '陳雪', '女', 'Facebook', 50, '20~50', '', '', 'https://www.facebook.com/profile.php?id=1660030768', '100~500', '', '', '', '0000-00-00 00:00:00'),
(64, 'ICI0019@u05.com', 'ICI0023PS', '', '徐展元', '男', 'Facebook', 100, '1~20', '', '', 'https://www.facebook.com/tesl.anchor/', '1~5', '', '', '', '0000-00-00 00:00:00'),
(65, 'ICI0020@u05.com', 'ICI0024PS', '', '蔡阿嘎', '男', 'Instgram', 300, '50~100', 'https://www.youtube.com/channel/UCtcaZ5FUqaNXGX6xhpiGPQA', '50~100', 'https://www.facebook.com/WithGaLoveTaiwan/', '100~500', 'https://www.instagram.com/yga0721/', '50~100', '', '0000-00-00 00:00:00'),
(66, 'ICI0017@u06.com', 'ICI0025PS', '', '仆街少女', '女', 'Facebook', 30, '50~100', '', '', 'https://www.facebook.com/pkgirls/', '100~500', '', '', '', '0000-00-00 00:00:00'),
(67, 'ICI0018@u06.com', 'ICI0026PS', '', '鄧佳華', '男', 'YouTube', 50, '1~20', 'https://www.youtube.com/channel/UCxhWOeqxIX9xgaGeXbC5gSQ', '50~100', 'https://www.facebook.com/profile.php?id=100011920206358', '100~500', '', '', '', '0000-00-00 00:00:00'),
(68, 'ICI0019@u06.com', 'ICI0027PS', '', '王世堅', '男', 'Facebook', 100, '50~100', '', '', 'https://www.facebook.com/shihchien888/', '100~500', '', '', '', '0000-00-00 00:00:00'),
(69, 'ICI0020@u06.com', 'ICI0028PS', '', '上班不要看', '團體', 'YouTube', 300, '300~500', 'https://www.youtube.com/channel/UCj_z-Zeqk8LfwVxx0MUdL-Q', '100~500', 'https://www.facebook.com/nsfwstudio/', '500~1,000', '', '', '', '0000-00-00 00:00:00'),
(70, 'ICI0017@u07.com', 'ICI0029PS', '', '愛蜜。樂芙愛美麗', '女', 'Blog', 1, '300~500', '', '', 'https://www.facebook.com/luv2beauty/', '10~50', '', '', 'http://luv2beauty.com/blog', '0000-00-00 00:00:00'),
(71, 'ICI0018@u07.com', 'ICI0030PS', '', '寧寧愛美遊樂園', '女', 'Blog', 3, '50~100', '', '', 'https://www.facebook.com/nikkie860625/', '100~500', '', '', 'http://kk9442001.pixnet.net/blog', '0000-00-00 00:00:00'),
(72, 'ICI0019@u07.com', 'ICI0031PS', '', '阿元的及樂世界', '女', 'Blog', 5, '20~50', '', '', 'https://www.facebook.com/yuanx2liang/', '10~50', '', '', 'http://yuanx2liang.pixnet.net/blog', '0000-00-00 00:00:00'),
(73, 'ICI0020@u07.com', 'ICI0032PS', '', '77涵', '女', 'Blog', 10, '1~20', '', '', 'https://www.facebook.com/love77han/', '100~500', '', '', 'http://eyes198877.pixnet.net/blog/', '0000-00-00 00:00:00'),
(74, 'ICI0017@u08.com', 'ICI0033PS', '', 'Ami 芽芽', '女', 'Blog', 30, '50~100', '', '', 'https://www.facebook.com/gogoami1986', '1~5', '', '', 'http://gogoami.pixnet.net/blog', '0000-00-00 00:00:00'),
(75, 'ICI0018@u08.com', 'ICI0034PS', '', 'PHAT G 恬寶', '女', 'Blog', 50, '50~100', '', '', 'https://www.facebook.com/tientien7575', '100~500', '', '', 'http://tientien7575.pixnet.net/blog', '0000-00-00 00:00:00'),
(76, 'ICI0019@u08.com', 'ICI0035PS', '', '蘇花猴愛敗家', '女', 'Blog', 100, '1~20', '', '', 'https://www.facebook.com/benshee.su', '100~500', '', '', 'http://benshee1005.pixnet.net/blog', '0000-00-00 00:00:00'),
(77, 'ICI0020@u08.com', 'ICI0036PS', '', '伊梓帆', '團體', 'YouTube', 300, '50~100', 'https://www.youtube.com/channel/UCj-DwSCVCo4Tdq9aQ09omvQ', '100~500', 'https://www.facebook.com/Love.Yibi.Chloe.Fan/', '500~1,000', '', '', '', '0000-00-00 00:00:00'),
(78, 'ICI0017@u09.com', 'ICI0037PS', '', '白癡公主', '女', 'YouTube', 1, '300~500', 'https://www.youtube.com/user/ATienDai/channels', '50~100', 'http://www.facebook.com/BaiChiGongZhu', '10~50', '', '', '', '0000-00-00 00:00:00'),
(79, 'ICI0018@u09.com', 'ICI0038PS', '', '阿滴英文', '團體', 'YouTube', 3, '300~500', '', '', 'https://www.facebook.com/RayDuEnglish', '100~500', 'https://www.instagram.com/rayduenglish/', '50~100', '', '0000-00-00 00:00:00'),
(80, 'ICI0019@u09.com', 'ICI0039PS', '', '那個女生 Kiki', '女', 'Instgram', 5, '50~100', 'https://www.youtube.com/channel/UCuggN8RzbtpxFSd6LHCeXew', '50~100', '', '', 'https://www.instagram.com/minikiki_0529/', '100~500', '', '0000-00-00 00:00:00'),
(81, 'ICI0020@u09.com', 'ICI0040PS', '', '古娃娃WawaKu', '女', 'Instgram', 10, '20~50', 'https://www.youtube.com/user/mincow', '100~500', 'https://www.facebook.com/Dulcieku/', '100~500', 'https://www.instagram.com/wawawaku/', '50~100', '', '0000-00-00 00:00:00'),
(82, 'ICI0017@u10.com', 'ICI0041PS', '', '三原 JAPAN', '男', 'YouTube', 30, '1~20', 'https://www.youtube.com/channel/UCCBq7s8VOCyek275uvq5lYQ', '50~100', 'https://www.facebook.com/MiharaKeigo/', '1~5', 'https://www.instagram.com/sanyuan_japan/', '100~500', '', '0000-00-00 00:00:00'),
(83, 'ICI0018@u10.com', 'ICI0042PS', '', '吃心絕對', '男', 'Blog', 50, '50~100', '', '', 'https://www.facebook.com/ksdelicacy/', '1~5', '', '', 'http://ksdelicacy.pixnet.net/blog', '0000-00-00 00:00:00'),
(84, 'ICI0019@u10.com', 'ICI0043PS', '', '大口老師的走跳學堂', '男', 'Blog', 100, '50~100', '', '', 'https://www.facebook.com/zine1314/', '100~500', '', '', 'https://zineblog.com.tw/', '0000-00-00 00:00:00'),
(85, 'ICI0020@u10.com', 'ICI0044PS', '', '鄭小柔Charlene', '女', 'Blog', 300, '1~20', '', '', 'https://www.facebook.com/Charlene520/', '100~500', '', '', 'http://mei30530.pixnet.net/blog', '0000-00-00 00:00:00'),
(86, 'ICI0017@u11.com', 'ICI0045PS', '', '飛天璇', '女', 'Blog', 1, '50~100', '', '', 'https://www.facebook.com/flyinghsuan/', '500~1,000', '', '', 'http://flyblog.cc/blog', '0000-00-00 00:00:00'),
(87, 'ICI0018@u11.com', 'ICI0046PS', '', '黃書庭', '女', 'Instgram', 3, '300~500', '', '', '', '', 'https://www.instagram.com/vivibabier/', '50~100', '', '0000-00-00 00:00:00'),
(88, 'ICI0019@u11.com', 'ICI0047PS', '', '黃珮涵', '女', 'Instgram', 5, '20~50', '', '', '', '', 'https://www.instagram.com/hph0117/', '100~500', '', '0000-00-00 00:00:00'),
(89, 'ICI0020@u11.com', 'ICI0048PS', '', '許路兒LureHsu', '女', 'Instgram', 10, '50~100', '', '', '', '', 'https://www.instagram.com/lurehsu/', '50~100', '', '0000-00-00 00:00:00'),
(90, 'ICI0017@u12.com', 'ICI0049PS', '', '聖嫂嘟嘟', '女', 'Instgram', 30, '20~50', 'https://www.youtube.com/channel/UC8MQLq2uFUa-HXHCVjHlc-Q', '100~500', '', '', 'https://www.instagram.com/natalie83917/', '100~500', '', '0000-00-00 00:00:00'),
(91, 'ICI0018@u12.com', 'ICI0050PS', '', 'Hello Catie', '女', 'Blog', 50, '1~20', 'https://www.youtube.com/channel/UCxls4ftUSbEcrDR1zQWIwfA', '50~100', 'https://www.instagram.com/hellocatie45/', '1~5', '', '', 'http://hellocatie.pixnet.net/blog', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `ic_favor`
--

CREATE TABLE `ic_favor` (
  `sid` int(11) NOT NULL,
  `BScase_sid` varchar(200) NOT NULL,
  `ICmember_sid` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `ic_favor`
--

INSERT INTO `ic_favor` (`sid`, `BScase_sid`, `ICmember_sid`) VALUES
(3, '3', '1'),
(4, '1', '1'),
(5, '2', '1'),
(6, '1', '42'),
(7, '2', '42'),
(8, '3', '42'),
(9, '6', '42');

-- --------------------------------------------------------

--
-- 資料表結構 `ic_talk`
--

CREATE TABLE `ic_talk` (
  `sid` int(11) NOT NULL,
  `talk_sid` int(11) NOT NULL,
  `IC_content` varchar(500) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `ic_talk`
--

INSERT INTO `ic_talk` (`sid`, `talk_sid`, `IC_content`, `time`) VALUES
(1, 7, '哈摟技嘉 我是萊斯', '2018-12-06 15:46:21'),
(2, 6, '哈摟我是阿杰', '2018-12-06 15:47:49'),
(3, 9, '安安 松本清 我是阿杰', '2018-12-06 16:17:32'),
(4, 9, '有人嗎', '2018-12-06 16:18:15'),
(5, 6, '想問你德國的事', '2018-12-06 16:29:07'),
(6, 9, '松本清您好 我是阿杰', '2018-12-06 16:29:24'),
(7, 6, '幹等等', '2018-12-06 17:11:21'),
(8, 9, 'say something!!', '2018-12-06 19:14:01'),
(9, 6, '10', '2018-12-06 20:41:53'),
(10, 9, 'a', '2018-12-06 20:42:06'),
(11, 6, '11', '2018-12-06 20:42:09'),
(12, 6, '12', '2018-12-06 21:52:21'),
(13, 9, '還不錯啊 您ㄋ?', '2018-12-06 21:52:35'),
(14, 9, '', '2018-12-06 21:52:54'),
(15, 10, '早安AAA', '2018-12-07 09:21:00'),
(16, 6, '講話~', '2018-12-07 11:34:02');

-- --------------------------------------------------------

--
-- 資料表結構 `industry_categories`
--

CREATE TABLE `industry_categories` (
  `id` int(11) NOT NULL,
  `industry_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `industry_categories`
--

INSERT INTO `industry_categories` (`id`, `industry_name`) VALUES
(1, '請選擇產業類型'),
(2, '化妝品'),
(3, '時尚'),
(4, '遊戲電競'),
(5, '店家餐廳'),
(6, '政府單位'),
(7, '３Ｃ用品'),
(8, '其它');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `active_categories`
--
ALTER TABLE `active_categories`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `bsmember`
--
ALTER TABLE `bsmember`
  ADD PRIMARY KEY (`BS_sid`),
  ADD UNIQUE KEY `BS_email` (`BS_email`);

--
-- 資料表索引 `bs_case`
--
ALTER TABLE `bs_case`
  ADD PRIMARY KEY (`BScase_sid`);

--
-- 資料表索引 `bs_case_detail`
--
ALTER TABLE `bs_case_detail`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `bs_favor`
--
ALTER TABLE `bs_favor`
  ADD PRIMARY KEY (`BF_sid`);

--
-- 資料表索引 `bs_order`
--
ALTER TABLE `bs_order`
  ADD PRIMARY KEY (`BO_sid`);

--
-- 資料表索引 `bs_talk`
--
ALTER TABLE `bs_talk`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `icmember`
--
ALTER TABLE `icmember`
  ADD PRIMARY KEY (`IC_sid`);

--
-- 資料表索引 `ic_favor`
--
ALTER TABLE `ic_favor`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `ic_talk`
--
ALTER TABLE `ic_talk`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `industry_categories`
--
ALTER TABLE `industry_categories`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `bsmember`
--
ALTER TABLE `bsmember`
  MODIFY `BS_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- 使用資料表 AUTO_INCREMENT `bs_case`
--
ALTER TABLE `bs_case`
  MODIFY `BScase_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 使用資料表 AUTO_INCREMENT `bs_case_detail`
--
ALTER TABLE `bs_case_detail`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表 AUTO_INCREMENT `bs_favor`
--
ALTER TABLE `bs_favor`
  MODIFY `BF_sid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- 使用資料表 AUTO_INCREMENT `bs_order`
--
ALTER TABLE `bs_order`
  MODIFY `BO_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- 使用資料表 AUTO_INCREMENT `bs_talk`
--
ALTER TABLE `bs_talk`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- 使用資料表 AUTO_INCREMENT `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表 AUTO_INCREMENT `icmember`
--
ALTER TABLE `icmember`
  MODIFY `IC_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- 使用資料表 AUTO_INCREMENT `ic_favor`
--
ALTER TABLE `ic_favor`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表 AUTO_INCREMENT `ic_talk`
--
ALTER TABLE `ic_talk`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
