-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-06-21 05:30:36
-- 伺服器版本: 5.6.26
-- PHP 版本： 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `reservation`
--

-- --------------------------------------------------------

--
-- 資料表結構 `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `_id` int(255) NOT NULL,
  `_sid` int(255) NOT NULL,
  `_number` int(255) NOT NULL,
  `_seat` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `booker`
--

CREATE TABLE IF NOT EXISTS `booker` (
  `_id` int(255) NOT NULL,
  `_bookid` int(255) NOT NULL,
  `_name` varchar(255) NOT NULL,
  `_phone` varchar(255) NOT NULL,
  `_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
  `_id` int(255) NOT NULL,
  `_name` varchar(255) NOT NULL,
  `_img` varchar(255) NOT NULL,
  `_video` varchar(255) NOT NULL,
  `_releasetime` int(255) NOT NULL,
  `_release_company` varchar(255) NOT NULL,
  `_language` varchar(255) NOT NULL,
  `_series` varchar(255) NOT NULL,
  `_genric` varchar(255) NOT NULL,
  `_director` varchar(255) NOT NULL,
  `_actor` varchar(255) NOT NULL,
  `_time` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `movie`
--

INSERT INTO `movie` (`_id`, `_name`, `_img`, `_video`, `_releasetime`, `_release_company`, `_language`, `_series`, `_genric`, `_director`, `_actor`, `_time`) VALUES
(1, '神力女超人', '385_big.jpg', 'https://www.youtube.com/embed/P9SzcEiAf18', 1490889600, '美商華納兄弟(遠東)股份有限公司台灣分公司 ', ' 	英語', '保護級', '', '派蒂簡金斯 Patty Jenkins', '《蝙蝠俠對超人：正義曙光》蓋兒加朵、《星際爭霸戰》克里斯潘恩', '141分'),
(2, '神鬼傳奇', '402_big.jpg', 'https://www.youtube.com/embed/ahWah8ThmoY?list=PL7Whz1JtGForDFqY4v-4zHY9EYneSl1CG', 1498665600, '美商美國環球影片股份有限公司 ', ' 	英語', '輔12級', '', '《星際爭霸戰》艾力克斯寇茲曼', '《不可能的任務：失控國度》湯姆克魯斯、《金牌特務》蘇菲亞波提拉、《安娜貝爾》安娜貝爾瓦莉絲、《侏羅紀世界》傑克強森、《醜聞風暴》考特尼凡斯', '111分'),
(3, '加勒比海盜 神鬼奇航：死無對證', '377_big.jpg', 'https://www.youtube.com/embed/LldnSzk4uD4', 1486137600, '台灣華特迪士尼股份有限公司 ', ' 	英語', '保護級', '', '《康提基號：偉大航程》喬奇姆羅寧、《康提基號：偉大航程》艾斯班山柏格', '《神鬼奇航》強尼戴普、《神鬼奇航》奧蘭多布魯、《007空降危機》哈維爾巴登、《神鬼奇航》傑佛瑞羅許、《移動迷宮》卡雅斯考達里奧、《黑魔女：沉睡魔咒》布蘭頓思懷茲', '   129分'),
(4, '變形金剛5：最終騎士', '407_big.jpg', 'https://www.youtube.com/embed/wXRqKI44n2U?list=PLqZpVnro4fTrgmZ6V09WN7FPaG7B26nqq', 1495123200, '美商美國派拉蒙影片股份有限公司 ', '英語', '輔12級', '', '麥可貝', '馬克華柏格、喬許杜漢默、伊莎貝拉莫娜', '149分'),
(5, '猩球崛起：終極決戰', '413_big.jpg', 'https://www.youtube.com/embed/wtB8MUfQxJs?list=PLG_t3kcrQftpGi0upCXRW4Xdgc67EvJeI', 1489075200, '美商二十世紀福斯影片股份有限公司 ', '英語', '未知', '', '《猩球崛起：黎明的進擊》麥特李維斯', '《飢餓遊戲》伍迪哈里遜、《星際大戰：原力覺醒》安迪瑟奇斯、《侏羅紀世界》茱蒂葛莉兒', '111分');

-- --------------------------------------------------------

--
-- 資料表結構 `movietime`
--

CREATE TABLE IF NOT EXISTS `movietime` (
  `_id` int(255) NOT NULL,
  `_sid` int(255) NOT NULL,
  `_time` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `movietime`
--

INSERT INTO `movietime` (`_id`, `_sid`, `_time`) VALUES
(1, 1, 1498788600),
(2, 1, 1498800600),
(3, 2, 1498791600),
(4, 2, 1498803000),
(5, 3, 1498802400),
(6, 3, 1498789200),
(7, 4, 1498806000),
(8, 4, 1498798200),
(9, 5, 1498809600),
(10, 5, 1498821000);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`_id`);

--
-- 資料表索引 `booker`
--
ALTER TABLE `booker`
  ADD PRIMARY KEY (`_id`);

--
-- 資料表索引 `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`_id`);

--
-- 資料表索引 `movietime`
--
ALTER TABLE `movietime`
  ADD PRIMARY KEY (`_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `book`
--
ALTER TABLE `book`
  MODIFY `_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `booker`
--
ALTER TABLE `booker`
  MODIFY `_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `movie`
--
ALTER TABLE `movie`
  MODIFY `_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `movietime`
--
ALTER TABLE `movietime`
  MODIFY `_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
