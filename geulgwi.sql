-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 21-11-26 18:02
-- 서버 버전: 10.4.17-MariaDB
-- PHP 버전: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `geulgwi`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `liketable`
--

CREATE TABLE `liketable` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `code` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `liketable`
--

INSERT INTO `liketable` (`id`, `user_id`, `code`) VALUES
(2, 'asd', '1');

-- --------------------------------------------------------

--
-- 테이블 구조 `list`
--

CREATE TABLE `list` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(400) NOT NULL,
  `copy` varchar(50) NOT NULL,
  `cate` varchar(100) NOT NULL,
  `tag` varchar(200) DEFAULT NULL,
  `writer` varchar(50) NOT NULL,
  `writedate` datetime NOT NULL DEFAULT current_timestamp(),
  `viewcnt` int(10) NOT NULL DEFAULT 0,
  `sug` int(10) NOT NULL DEFAULT 0,
  `recnt` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `list`
--

INSERT INTO `list` (`id`, `title`, `content`, `copy`, `cate`, `tag`, `writer`, `writedate`, `viewcnt`, `sug`, `recnt`) VALUES
(1, 'test', 'test', '신이선', '시', '', 'zxc', '2021-10-27 17:15:32', 209, 1, 2),
(2, 'asd', 'zxczxczxczxc', '신이선', '책', 'asd', 'asd', '2021-10-28 19:03:36', 95, 0, 1),
(3, 'asd1', 'zxczxczxczxc', '신이선', '책', '', 'asd', '2021-10-28 19:03:36', 5, 0, 0),
(4, 'asd2', 'zxczxczxczxc', '신이선', '책', '', 'asd', '2021-10-28 19:03:36', 77, 0, 3),
(5, 'asd3', 'zxczxczxczxc', '신이선', '책', '', 'asd', '2021-10-28 19:03:36', 2, 0, 0),
(6, 'asd4', 'zxczxczxczxc', '신이선', '책', '', 'asd', '2021-10-28 19:03:36', 2, 0, 0),
(7, 'asd5', 'zxczxczxczxc', '신이선', '책', '', 'asd', '2021-10-28 19:03:36', 3, 0, 0),
(8, 'ㅅㄷㄴㅅ', 'ㅁㄴㅇㅁㄴㅇㅁㄴㅇㅁㄴㅇ', 'ㅅㄷㄴㅅ', '책', '', 'asd', '2021-11-21 02:53:41', 1, 0, 0),
(9, 'catetest', '내용을 입력해', 'my', '책', '', 'asd', '2021-11-23 20:17:17', 2, 0, 0),
(12, '태그', '1231231233213213231231231111111111111111111111111111111111111231231233213213231231231111111111111111111111111111111111111231231233213213231231231111111111111111111111111111111111111231231233213213231231231111111111111111111111111111111111111231231233213213231231231111111111111111111111111111111111111231231233213213231231231111111111111111111111111111111111111231231233213213231231231111111111111111', '123', '책', '', 'asd', '2021-11-25 18:27:19', 11, 0, 0),
(13, 'ㄴㅁㅇ', '책은 지적인 사람으로 보이고 싶은\r\n책은 지적인 사람으로 보이고 싶은책은 지적인 사람으로 보이고 싶은', 'ㅁㄴㅇ', '책', '', 'asd', '2021-11-25 18:50:36', 20, 0, 0),
(14, 'xorm', 'xorm', 'xorm', '책', '책, 성공, 꿈', 'img1', '2021-11-27 00:43:51', 1, 0, 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `review`
--

INSERT INTO `review` (`id`, `user_id`, `text`, `code`) VALUES
(1, 'asd', 'asdasd', '1'),
(2, 'asd', 'asdasd', '4'),
(3, 'asd', 'zxcxczxczxzc', '4'),
(4, 'img1', 'asdasdasdasd', '4'),
(5, 'zxc', 'asdasdasdzxc', '2'),
(6, 'img1', 'sadddddddddddddddddddddddddddddddddddddddsdsdsdsdsdsdsdsdssdsdsd', '1');

-- --------------------------------------------------------

--
-- 테이블 구조 `savetable`
--

CREATE TABLE `savetable` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 테이블 구조 `user`
--

CREATE TABLE `user` (
  `id` varchar(150) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `cate` varchar(150) DEFAULT NULL,
  `profile` varchar(1000) NOT NULL DEFAULT 'profile.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `user`
--

INSERT INTO `user` (`id`, `pass`, `cate`, `profile`) VALUES
('asd', 'asdasd123', '', 'profile.png'),
('img', 'q1w2e3r4', NULL, 'profile.png'),
('img1', 'q1w2e3r4', '책', '1637679916165a40b02cd134c0d.png'),
('sun_0430', 'tlsdltjs0430', '', 'profile.png'),
('test', 'q1w2e3r4', 'temp1,temp12,temp13,temp17', 'profile.png'),
('zxc', 'zxczxc123', '', 'profile.png');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `liketable`
--
ALTER TABLE `liketable`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `savetable`
--
ALTER TABLE `savetable`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `liketable`
--
ALTER TABLE `liketable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 테이블의 AUTO_INCREMENT `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 테이블의 AUTO_INCREMENT `savetable`
--
ALTER TABLE `savetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
