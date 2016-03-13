-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013-11-21 03:59:50
-- 服务器版本: 5.5.33a-MariaDB-log
-- PHP 版本: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `archnote`
--

-- --------------------------------------------------------

--
-- 表的结构 `archnote_contents`
--

CREATE TABLE IF NOT EXISTS `archnote_contents` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `alias` varchar(200) DEFAULT NULL,
  `category` int(10) unsigned NOT NULL DEFAULT '0',
  `created` int(10) unsigned DEFAULT '0',
  `authorId` int(10) unsigned DEFAULT '0',
  `type` varchar(16) DEFAULT 'post',
  `text` text,
  `allowComment` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`cid`),
  KEY `slug` (`alias`),
  KEY `created` (`created`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `archnote_contents`
--

INSERT INTO `archnote_contents` (`cid`, `title`, `alias`, `category`, `created`, `authorId`, `type`, `text`, `allowComment`) VALUES
(1, '讨论', 'talk', 0, 1326473463, 1, 'page', '<p>临渊羡鱼，不如退而结网。</p>', 1),
(3, '关于', '', 0, 1332325556, 1, 'page', '<p><span style="text-decoration:underline;"><strong>关于本博客:</strong></span><br />本博客主要记录自己学习中遇到的问题和对学习到的东西进行总结,大部分内容为原创,转载请注明出处,我同样也会保留文章出处(可能非原始出处,如果发现有问题请联系本人).</p><p>在博客中你可能会找到包含这些关键词的内容：Delphi,PHP,Linux,<span style="white-space:normal;">Windows,</span>生活.如果博客文章对你有一些帮助你可以通过RSS来订阅.</p>', 0),
(17, 'test1', NULL, 1, 1371852513, 1, 'post', 'test', 0),
(18, 'test2', NULL, 1, 1371852555, 1, 'post', 'test2', 0),
(19, 'test3', NULL, 1, 1371852596, 1, 'post', 'test3', 1),
(22, '这是一篇测试文章', NULL, 1, 1372445042, 1, 'post', '这是一篇测试文章', 1);

-- --------------------------------------------------------

--
-- 表的结构 `archnote_metas`
--

CREATE TABLE IF NOT EXISTS `archnote_metas` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `alias` varchar(200) DEFAULT NULL,
  `type` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`mid`),
  KEY `alias` (`alias`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `archnote_metas`
--

INSERT INTO `archnote_metas` (`mid`, `name`, `alias`, `type`) VALUES
(0, '未分类', 'none', 'category'),
(2, 'test', 'test', 'tag'),
(3, 'test2', 'test2', 'tag');

-- --------------------------------------------------------

--
-- 表的结构 `archnote_options`
--

CREATE TABLE IF NOT EXISTS `archnote_options` (
  `name` varchar(32) NOT NULL,
  `value` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `archnote_options`
--

INSERT INTO `archnote_options` (`name`, `value`) VALUES
('cache', '0'),
('description', 'test'),
('keyword', 'test,test2,test3'),
('post_list', '5'),
('site_url', 'http://l/archnote/'),
('theme', 'twentyten'),
('title', 'bstaint的博客');

-- --------------------------------------------------------

--
-- 表的结构 `archnote_relationships`
--

CREATE TABLE IF NOT EXISTS `archnote_relationships` (
  `rid` int(10) unsigned NOT NULL,
  `mid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`rid`,`mid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `archnote_relationships`
--

INSERT INTO `archnote_relationships` (`rid`, `mid`) VALUES
(19, 2),
(22, 0),
(22, 2),
(22, 3);

-- --------------------------------------------------------

--
-- 表的结构 `archnote_user`
--

CREATE TABLE IF NOT EXISTS `archnote_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `mail` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `archnote_user`
--

INSERT INTO `archnote_user` (`uid`, `name`, `password`, `mail`) VALUES
(1, 'admin', '9bceaf72dfcab23cd21bdc066b7f60e2', 'test@test.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
