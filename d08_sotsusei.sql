-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 6 月 24 日 13:59
-- サーバのバージョン： 10.4.19-MariaDB
-- PHP のバージョン: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `d08_sotsusei`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `area` varchar(20) NOT NULL,
  `likes` varchar(200) NOT NULL,
  `created_date` date NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `user_table`
--

INSERT INTO `user_table` (`id`, `name`, `area`, `likes`, `created_date`, `updated_date`) VALUES
(2, 'クリスポール', 'フェニックス', 'pass', '2021-06-21', '2021-06-21'),
(3, 'レブロンジェームズ', 'レイカーズ', 'everything', '2021-06-21', '2021-06-21'),
(4, 'メロ', 'ブレイザーズ', 'shoot', '2021-06-21', '2021-06-21'),
(5, 'デイミアンリラード', 'ブレイザーズ', 'clutchshoot', '2021-06-21', '2021-06-21'),
(6, 'aaa', 'Cali', 'Act', '2021-06-22', '2021-06-22'),
(7, 'aaa', 'Fukuoka', 'Hike', '2021-06-22', '2021-06-22'),
(8, 'test', 'testtest', 'rest', '2021-06-23', '2021-06-23'),
(9, '渡隆人', '福岡県', 'Array', '2021-06-23', '2021-06-23'),
(10, 'AB', 'AB', 'Array', '2021-06-24', '2021-06-24');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
