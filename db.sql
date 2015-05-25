-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-05-22 13:43:56
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `share`
--

-- --------------------------------------------------------

--
-- 表的结构 `share_admin`
--

CREATE TABLE IF NOT EXISTS `share_admin` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(15) NOT NULL,
  `email` char(40) NOT NULL,
  `password` char(32) NOT NULL,
  `login_time` int(10) NOT NULL,
  `join_time` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0：禁止  1：正常',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `share_admin`
--

INSERT INTO `share_admin` (`id`, `username`, `email`, `password`, `login_time`, `join_time`, `status`) VALUES
(1, 'fan', 'thefrp@foxmail.com', '2c874ce5e9730fca13b3a1faf793c0aa', 1432294768, 111111111, 1);

-- --------------------------------------------------------

--
-- 表的结构 `share_comment`
--

CREATE TABLE IF NOT EXISTS `share_comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `data_id` int(11) unsigned NOT NULL COMMENT '问题id',
  `content` text NOT NULL COMMENT '回答内容',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回答时间',
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `ip` char(15) NOT NULL DEFAULT '' COMMENT 'ip地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- 表的结构 `share_data`
--

CREATE TABLE IF NOT EXISTS `share_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `data_title` varchar(255) NOT NULL COMMENT '资料标题',
  `data_detail` text COMMENT '资料描述',
  `add_time` int(10) unsigned NOT NULL COMMENT '发布时间',
  `update_time` int(10) unsigned NOT NULL COMMENT '最后更新时间',
  `published_uid` int(10) unsigned NOT NULL COMMENT '发布者id',
  `view_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '查看人数',
  `focus_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '关注总人数',
  `comment_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论总人数',
  `download_count` int(11) NOT NULL DEFAULT '0' COMMENT '下载次数',
  `data_url` varchar(255) NOT NULL COMMENT '资料地址',
  `state` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '资料状态，0私有，1公开',
  `comment_state` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '评论状态：0禁止，1允许',
  `ip` char(15) NOT NULL COMMENT 'ip地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='资料信息表' AUTO_INCREMENT=1 ;


--
-- 表的结构 `share_data_focus`
--

CREATE TABLE IF NOT EXISTS `share_data_focus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_id` int(11) unsigned NOT NULL,
  `uid` int(11) unsigned NOT NULL,
  `add_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `share_data_focus`
--

INSERT INTO `share_data_focus` (`id`, `data_id`, `uid`, `add_time`) VALUES
(1, 5, 3, 1431960381),
(2, 10, 3, 1432136307),
(3, 20, 2, 1432213707),
(5, 19, 2, 1432213833);

-- --------------------------------------------------------

--
-- 表的结构 `share_home_user`
--

CREATE TABLE IF NOT EXISTS `share_home_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '用户id',
  `add_time` int(10) NOT NULL,
  `state` tinyint(4) NOT NULL COMMENT '状态',
  `sort` int(11) NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


--
-- 表的结构 `share_topic`
--

CREATE TABLE IF NOT EXISTS `share_topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_title` varchar(64) NOT NULL DEFAULT '',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  `discuss_count` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- 表的结构 `share_topic_data`
--

CREATE TABLE IF NOT EXISTS `share_topic_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) unsigned NOT NULL,
  `data_id` int(11) unsigned NOT NULL,
  `add_time` int(10) unsigned NOT NULL,
  `uid` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- 表的结构 `share_users`
--

CREATE TABLE IF NOT EXISTS `share_users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL,
  `avatar_file` varchar(100) NOT NULL DEFAULT '/public/images/default_50.gif',
  `salt` varchar(50) NOT NULL DEFAULT '',
  `sex` char(6) NOT NULL DEFAULT '',
  `birthday` int(10) unsigned NOT NULL DEFAULT '0',
  `reg_time` int(10) unsigned NOT NULL,
  `reg_ip` char(15) NOT NULL,
  `last_login` int(10) unsigned NOT NULL,
  `last_ip` char(15) NOT NULL,
  `authority` int(11) NOT NULL DEFAULT '0' COMMENT '权限，0 不能发布资料，1 能发布资料,2 拒绝再次申请',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



--
-- 表的结构 `share_user_check`
--

CREATE TABLE IF NOT EXISTS `share_user_check` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(11) NOT NULL COMMENT '用户id',
  `username` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '用户名',
  `time` int(10) unsigned NOT NULL COMMENT '申请时间',
  `result` int(11) NOT NULL COMMENT '结果0 待审核，1 审核通过，2审核拒绝',
  `remark` varchar(256) NOT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='审核表' AUTO_INCREMENT=1 ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
