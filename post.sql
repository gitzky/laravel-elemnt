/*
Navicat MySQL Data Transfer

Source Server         : zky
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : post

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2019-04-01 18:31:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `tid` int(100) NOT NULL,
  `cid` int(100) NOT NULL,
  `sid` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `goodsname` varchar(255) NOT NULL,
  `goodscode` varchar(255) NOT NULL,
  `goodsprice` int(100) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default.jpg',
  PRIMARY KEY (`id`),
  UNIQUE KEY `userName` (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comments
-- ----------------------------

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(10) NOT NULL,
  `label` char(10) NOT NULL,
  `path` char(255) NOT NULL,
  `icon` char(255) DEFAULT NULL,
  `axis` char(255) DEFAULT NULL,
  `sort` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '首页', '首页', '/admin/index', null, '', '1');
INSERT INTO `menu` VALUES ('2', '1', '1', '1', '1', '', '1');

-- ----------------------------
-- Table structure for notice
-- ----------------------------
DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of notice
-- ----------------------------
INSERT INTO `notice` VALUES ('1', '', '<p><img src=\"/uploads/image/20190323/1553306587225372.jpg\" title=\"1553306587225372.jpg\" alt=\"t_15102312395a044cc7488f9.jpg\"/></p>');

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `newsName` text,
  `newsAuthor` varchar(100) DEFAULT NULL,
  `newsTime` date DEFAULT NULL,
  `newsKey` varchar(255) DEFAULT NULL,
  `newsIntro` text,
  `newsIntroImg` varchar(255) DEFAULT NULL,
  `newsContent` text,
  `newsType` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES ('1', 'ES6 Promise', '小元元', '2018-10-06', '6', 'Promise 是异步编程的一种解决方案，比传统的解决方案——回调函数和事件——更合理和更强大。它由社区最早提出和实现，ES6 将其写进了语言标准，统一了用法，原生提供了Promise对象。\n所谓Promise，简单说就是一个容器，里面保存着某个未来才会结束的事件（通常是一个异步操作）的结果。从语法上说，Promise 是一个对象，从它可以获取异步操作的消息。Promise 提供统一的 API，各种异步操作都可以用同样的方法进行处理。', '/img/uploads/1538763318.jpg', '4', '6');
INSERT INTO `posts` VALUES ('2', '这是一个测试文章', '小元元', '2018-10-06', '1,4,5,6', '这是一个测试文章', '/img/uploads/1538766910.jpg', '3', '1');
INSERT INTO `posts` VALUES ('3', 'Vue 爬坑之路（一）—— 使用 vue-cli 搭建项目', '小元元', '2018-11-04', '', '一、 安装 node.js\n\n首先需要安装node环境，可以直接到中文官网http://nodejs.cn/下载安装包。\n\n只是这样安装的 node 是固定版本的，如果需要多版本的 node，可以使用 nvm 安装http://blog.csdn.net/s8460049/article/details/52396399', '/img/uploads/1541338273.jpg', '2', '6');
INSERT INTO `posts` VALUES ('4', '测试', '小元元', '2018-11-18', '1', '测试AAAAA', '/img/uploads/1542548768.jpg', '1', '1');

-- ----------------------------
-- Table structure for post_detaile
-- ----------------------------
DROP TABLE IF EXISTS `post_detaile`;
CREATE TABLE `post_detaile` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `tid` int(100) NOT NULL,
  `cid` int(100) NOT NULL,
  `sid` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `goodsname` varchar(255) NOT NULL,
  `goodscode` varchar(255) NOT NULL,
  `goodsprice` int(100) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `stock` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userName` (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of post_detaile
-- ----------------------------

-- ----------------------------
-- Table structure for post_type
-- ----------------------------
DROP TABLE IF EXISTS `post_type`;
CREATE TABLE `post_type` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `class` varchar(255) NOT NULL,
  `in` enum('n','y') NOT NULL DEFAULT 'y',
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of post_type
-- ----------------------------
INSERT INTO `post_type` VALUES ('1', 'layui-btn  title-btn layui-btn-warm', 'y', 'PHP');
INSERT INTO `post_type` VALUES ('2', 'layui-btn  title-btn layui-btn-danger', 'y', 'JAVA');
INSERT INTO `post_type` VALUES ('3', 'layui-btn  title-btn layui-btn-warm', 'y', 'JSON');
INSERT INTO `post_type` VALUES ('4', 'layui-btn  title-btn layui-btn-primary', 'y', 'HTML5');
INSERT INTO `post_type` VALUES ('5', 'layui-btn  title-btn layui-btn-danger', 'y', 'CSS3');
INSERT INTO `post_type` VALUES ('6', 'layui-btn  title-btn layui-btn-normal', 'y', 'javascript');
INSERT INTO `post_type` VALUES ('7', 'layui-btn  title-btn layui-btn-primary', 'y', 'jQuery');
INSERT INTO `post_type` VALUES ('8', 'layui-btn  title-btn layui-btn-danger', 'y', 'Python');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userName` char(20) NOT NULL,
  `password` char(33) NOT NULL DEFAULT '123456',
  `userEmail` char(25) NOT NULL,
  `userSex` enum('男','女') DEFAULT NULL,
  `userGrade` char(10) NOT NULL DEFAULT '0',
  `userStatus` char(10) NOT NULL DEFAULT '1',
  `linksDesc` text,
  `userEndTime` datetime DEFAULT NULL,
  `img` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userName` (`userName`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '1234', 'admin@qq.com', '男', '正常使用', '超级管理员', '小元元', '2019-04-01 14:57:21', '/img/001.png');
INSERT INTO `user` VALUES ('2', 'zhangsan1', '123456', '1io57@qq.com', '女', '正常使用', '注册会员', '我是张三1号', '2009-12-26 03:25:05', '/img/default.png');
INSERT INTO `user` VALUES ('3', 'zhangsan2', '123456', '4f3g4@qq.com', '男', '限制用户', '超级会员', '我是张三2号', '2011-09-01 07:19:50', '/img/default.png');
INSERT INTO `user` VALUES ('4', 'zhangsan3', '123456', 'qaic7@qq.com', '女', '正常使用', '注册会员', '我是张三3号', '2014-09-21 13:27:49', '/img/default.png');
INSERT INTO `user` VALUES ('5', 'zhangsan4', '123456', 'fd4ag@qq.com', '女', '正常使用', '中级会员', '我是张三4号', '1994-12-16 07:02:53', '/img/default.png');
INSERT INTO `user` VALUES ('6', 'zhangsan5', '123456', '1fi4n@qq.com', '男', '限制用户', '超级会员', '我是张三5号', '2013-10-26 19:51:39', '/img/default.png');
INSERT INTO `user` VALUES ('7', 'zhangsan6', '123456', 'jiheg@qq.com', '女', '限制用户', '注册会员', '我是张三6号', '2002-11-07 14:31:38', '/img/default.png');
INSERT INTO `user` VALUES ('8', 'zhangsan7', '123456', 'kjjp0@qq.com', '女', '正常使用', '中级会员', '我是张三7号', '1994-10-10 15:45:37', '/img/default.png');

-- ----------------------------
-- Table structure for userdetail
-- ----------------------------
DROP TABLE IF EXISTS `userdetail`;
CREATE TABLE `userdetail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `nickName` char(50) NOT NULL,
  `realName` char(25) DEFAULT NULL,
  `sex` enum('男','女') NOT NULL,
  `phone` char(20) DEFAULT NULL,
  `birthday` char(20) DEFAULT NULL,
  `address` char(50) DEFAULT NULL,
  `email` char(25) NOT NULL,
  `hobby` char(255) DEFAULT NULL,
  `introduce` text,
  `photo` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of userdetail
-- ----------------------------
INSERT INTO `userdetail` VALUES ('1', '1', 'admin', '小元元', '男', '18888888888', '1991-01-10', '北京市,海淀区,中关村', '927926261@qq.com', 'PHP', 'aaa', '1.jpg');
