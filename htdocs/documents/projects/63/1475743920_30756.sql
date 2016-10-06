-- phpMyAdmin SQL Dump
-- version 4.4.15
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-10-05 01:58:00
-- 服务器版本： 10.1.8-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- 表的结构 `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `remark` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `role`, `remark`) VALUES
(33, 'TEST3', 'TEST', 4, '组员测试账号3'),
(1, 'admin', 'admin', 1, 'helloworld'),
(56, 'TEST1', 'TEST', 2, '实验室负责人测试账号1'),
(55, 'TEST2', 'TEST', 3, '组长测试账号2');

-- --------------------------------------------------------

--
-- 表的结构 `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT '姓名',
  `tel` varchar(255) NOT NULL COMMENT '联系方式',
  `message` text NOT NULL COMMENT '留言',
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `school` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `contact`
--

INSERT INTO `contact` (`id`, `name`, `tel`, `message`, `createtime`, `school`) VALUES
(23, '小白红', '11010110101', '不错不错', '2016-09-25 11:52:51', '心理'),
(22, '小白', '120120', '哎呀好有兴趣', '2016-09-25 11:52:15', '软件工程'),
(21, '小红', '110110', '哎呀好厉害', '2016-09-25 11:50:13', '华东师范大学');

-- --------------------------------------------------------

--
-- 表的结构 `facilities`
--

CREATE TABLE IF NOT EXISTS `facilities` (
  `id` int(11) NOT NULL,
  `pic_name` varchar(255) NOT NULL,
  `facilities_name` varchar(255) NOT NULL,
  `facilities_intro` text NOT NULL,
  `up_id` int(11) NOT NULL,
  `down_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `facilities`
--

INSERT INTO `facilities` (`id`, `pic_name`, `facilities_name`, `facilities_intro`, `up_id`, `down_id`) VALUES
(13, 'u23.jpg', 'HTC VIVE', '借助精准的移动追踪和自然的操控手柄手势，体验空间定位游戏。借助前置摄像头，在需要时打量一下真实世界。无需摘下头戴装置即可打开应用程序和游戏。这是完全的沉浸式虚拟现实体验。', 14, -2),
(14, 'u20.jpg', 'LEDCube', '基于多通道LED技术的创新的光谱可调光源，可用于各种尺寸和亮度的照明环境的搭建', 15, 13),
(15, 'u24.jpg', 'Vicon V5', '准确和可靠的光学动作捕捉系统，它所提供的实时光学数据，可\r\n以被应用于实时在线或者离线的运动捕捉、分析', -1, 14);

-- --------------------------------------------------------

--
-- 表的结构 `lab_intro`
--

CREATE TABLE IF NOT EXISTS `lab_intro` (
  `id` int(1) NOT NULL,
  `lab_intro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lab_intro`
--

INSERT INTO `lab_intro` (`id`, `lab_intro`) VALUES
(1, '视觉空间实验室简介'),
(2, '实验室标语！\n这是实验室标语！\n这是实验室标语！');

-- --------------------------------------------------------

--
-- 表的结构 `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL,
  `members_name` varchar(255) NOT NULL,
  `pic_name` varchar(255) NOT NULL,
  `up_id` int(11) NOT NULL,
  `down_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `members_intro` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `members`
--

INSERT INTO `members` (`id`, `members_name`, `pic_name`, `up_id`, `down_id`, `role_id`, `members_intro`) VALUES
(13, '成员一', '1.jpg', -1, -2, 1, '年级：14级\r\n专业：软件工程\r\n主要工作：后台开发\r\n参与项目：\r\n    VR网站开发\r\n    ***网站开发\r\n联系方式：110\r\n    '),
(14, '成员二', '2.jpg', -1, -2, 4, '年级：14级\r\n专业：软件工程\r\n主要工作：后台开发\r\n参与项目：\r\n    VR网站开发\r\n    ***网站开发\r\n联系方式：110\r\n    '),
(15, '成员三', '3.jpg', 18, -2, 5, '年级：14级\r\n专业：软件工程\r\n主要工作：后台开发\r\n参与项目：\r\n    VR网站开发\r\n    ***网站开发\r\n联系方式：110\r\n    '),
(16, '成员四', '4.jpg', -1, -2, 7, '年级：14级\r\n专业：软件工程\r\n主要工作：后台开发\r\n参与项目：\r\n    VR网站开发\r\n    ***网站开发\r\n联系方式：110\r\n    '),
(17, '成员五', '5.jpg', -1, -2, 6, '年级：14级\r\n专业：软件工程\r\n主要工作：后台开发\r\n参与项目：\r\n    VR网站开发\r\n    ***网站开发\r\n联系方式：110\r\n    '),
(18, '成员六', '6.jpg', -1, 15, 5, '年级：14级\r\n专业：软件工程\r\n主要工作：后台开发\r\n参与项目：\r\n    VR网站开发\r\n    ***网站开发\r\n联系方式：110\r\n    ');

-- --------------------------------------------------------

--
-- 表的结构 `member_role`
--

CREATE TABLE IF NOT EXISTS `member_role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL COMMENT '成员身份',
  `up_id` int(11) NOT NULL,
  `down_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `member_role`
--

INSERT INTO `member_role` (`id`, `role_name`, `up_id`, `down_id`) VALUES
(1, '实验室负责人', -1, 4),
(4, '研究组组长', 1, 5),
(5, '成员', 4, 7),
(6, '已毕业成员', 7, -2),
(7, '技术组组长', 5, 6);

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(20) NOT NULL,
  `news_title` text NOT NULL,
  `news_content` text NOT NULL,
  `news_createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `news_readtimes` int(20) NOT NULL,
  `up_id` int(11) NOT NULL,
  `down_id` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`id`, `news_title`, `news_content`, `news_createtime`, `news_readtimes`, `up_id`, `down_id`) VALUES
(48, '最新动态标题一', '<p><span style="font-family: 微软雅黑light, &#39;Microsoft YaHei Light&#39;; font-size: 24px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。</span></p><p><span style="font-family: 微软雅黑light, &#39;Microsoft YaHei Light&#39;; font-size: 24px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。</span></p><p><span style="font-family: 微软雅黑light, &#39;Microsoft YaHei Light&#39;; font-size: 24px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。</span></p><p><span style="font-family: 微软雅黑light, &#39;Microsoft YaHei Light&#39;; font-size: 24px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。这是测试字段。</span></p>', '2016-10-03 15:35:37', 0, -1, -2);

-- --------------------------------------------------------

--
-- 表的结构 `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content1` text NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '状态 0表示正在进行 1表示已完成 2表示已删除',
  `summary` text NOT NULL,
  `up_id` int(11) NOT NULL,
  `down_id` int(11) NOT NULL,
  `content2` text NOT NULL,
  `ctitle1` text NOT NULL,
  `ctitle2` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `projects`
--

INSERT INTO `projects` (`id`, `title`, `createtime`, `content1`, `status`, `summary`, `up_id`, `down_id`, `content2`, `ctitle1`, `ctitle2`) VALUES
(85, '项目名称1', '2016-10-03 16:28:18', '具体介绍具体介绍', 1, '项目简介', 86, -2, '具体介绍\r\n具体介绍', '细节描述1', '细节描述2'),
(86, '项目名称2', '2016-10-03 16:28:22', '具体介绍', 1, '项目简介', 87, 85, '', '细节描述1', ''),
(87, '项目名称3', '2016-10-03 16:28:26', '具体介绍', 1, '项目简介', -1, 86, '', '细节描述1', '');

-- --------------------------------------------------------

--
-- 表的结构 `projects_picture`
--

CREATE TABLE IF NOT EXISTS `projects_picture` (
  `pic_id` int(11) NOT NULL,
  `projects_id` int(11) NOT NULL,
  `pic_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1表示图片区1，2表示图片区2',
  `old_pic_name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `projects_picture`
--

INSERT INTO `projects_picture` (`pic_id`, `projects_id`, `pic_name`, `status`, `old_pic_name`) VALUES
(138, 87, '1475511969_13707.mp4', 0, '釜山行_201692210125.mp4'),
(139, 87, '1475512500_17775.jpg', 1, 'u20.jpg'),
(140, 87, '1475512510_4732.jpg', 1, 'u22.jpg'),
(141, 87, '1475512521_22277.jpg', 2, 'u24.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, '实验室负责人'),
(3, '组长'),
(4, '组员');

-- --------------------------------------------------------

--
-- 表的结构 `teambuild`
--

CREATE TABLE IF NOT EXISTS `teambuild` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `creatime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `up_id` int(11) NOT NULL,
  `down_id` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `teambuild`
--

INSERT INTO `teambuild` (`id`, `title`, `content`, `creatime`, `up_id`, `down_id`) VALUES
(14, '10余省份景区门票欲涨价 禁涨期已走完听证流程', '<p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">原标题：&quot;禁涨期&quot;沦为&quot;备涨期&quot; 10余省份景区门票跃跃欲试涨价</p><p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">　　新华社北京10月3日电 题：“禁涨期”沦为“备涨期” 10余省份景区门票跃跃欲试涨价</p><p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">　　新华社“新华视点”记者程迪、罗鑫、周蕊</p><p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">　　国家发展改革委、国家旅游局去年9月下发通知，在全国开展为期一年的景区门票价格专项整治工作。其间，各地原则上不出台新的上调景区门票价格方案。</p><p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">　　但是，“新华视点”记者日前调查发现，全国超过10个省份的景区今年以来启动门票调价程序或已提出调价意向，“禁涨期”沦为多地景区的“备涨期”。一些景区听证会还存在新设“园中园”变相涨价、公示期“缩水”、超幅度涨价等涉嫌违规行为。</p><p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">　　<strong>门票“一年不涨”禁令到期 多地景区提前“备涨”</strong></p><p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">　　国家发展改革委、国家旅游局去年下发《关于开展景区门票价格专项整治工作的通知》提出，自2015年9月至2016年8月，在全国开展为期一年的景区门票价格专项整治工作。专项整治期间，各地原则上不出台新的上调景区门票价格方案。</p><p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">　　据不完全统计，湖北、吉林、广东、福建、云南等至少10个省份的景区，自今年以来开启门票调价程序或已提出调价意向。记者注意到，一些景区今年上半年已走过门票价格调整听证会公告、召开听证会、形成新价格方案等流程，抢占“备涨”先机。</p><p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">　　比如，湖北十堰市郧西县五龙河景区今年4月举行听证会，拟从现行价格80元／人次调整到100元／人次。湖北十堰市旅游局有关负责人表示，这个调整是基于景区扩容，由此前沿岸3．5公里扩大到10公里，并增加了游船、小木屋等项目。“目前县政府还未批复，批复后公示半年执行。”</p><p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">　　个别景区不仅走过了上述流程，还“光速”完成公示并执行上调后的票价。广东5Ａ级大角湾景区今年5月18日发布景区门票价格听证会公告，6月中旬开听证会，7月18日已正式上调票价。</p><p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">　　值得注意的是，另一些景区则将听证会时间确定在8月下旬至9月“集中冲刺”，有的就定在“禁涨令”结束后的第二天。记者在福建武夷山市政府网站看到，武夷山市物价局9月1日召开门票价格调整听证会，拟将大安源景区泰平洋水上广场门票价格由原来的30元／人次调整为40元／人次。</p><p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">　　还有多地景区此前发布听证会预告，事实上已进入价格调整程序。比如，内蒙古满洲里将在10月中旬召开呼伦湖旅游景区门票价格听证会、山东省烟台市将在11月召开东炮台海滨旅游风景区和毓璜顶公园古建筑群的门票价格听证会。</p><p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">　　<strong>“园中园”、幅度超限、公示“缩水” 部分拟调涨景区涉嫌违规</strong></p><p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">　　记者调查发现，一些景区听证会存在新设“园中园”变相涨价、公示时间不足、超幅度涨价等行为。</p><p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">　　－－景区内“大门票”套“小门票”，新设“园中园”有变相涨价之嫌。吉林省物价局7月15日召开东北虎园熊猫馆门票价格听证会，拟将东北虎园内的熊猫馆门票定价为40元／人次。熊猫馆有关负责人称，熊猫是从别处租借三年，只是临时行为，所以申请制定独立门票。物价局评估每人次成本核算为42．87元。而记者了解到，熊猫馆去年7月试运行以来已收费一年多。东北虎园位于5Ａ级景区长春净月潭国家森林公园内，熊猫馆位于东北虎园内，要看熊猫至少要买两道门票。</p><p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">　　吉林省物价局相关负责人回应称，大熊猫以阶段性借养模式落户东北虎园，有其特殊性。按照此前出台的《游览参观点门票价格管理办法》第十二条“游览参观点内举办临时展览原则免费，对确有观赏价值且投入较大的，游览参观点可以按价格管理权限申报制定临时展览门票价格”的规定，开展熊猫馆门票价格制定工作。</p><p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">　　多位旅游业内专家认为，熊猫馆可单设别处，东北虎园内再建熊猫馆收门票，无论是否是临时项目，都属新设“园中园”，有变相涨价之嫌。</p><p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">　　－－公示期大幅“缩水”。根据旅游法第四十四条规定，“景区提高门票价格应当提前六个月公布。”广东省发展改革委、广东省旅游局《关于开展景区门票价格专项整治工作的通知》中也明确提出，“各地要主动对照价格法、旅游法及国家有关政策要求，检查定调价行为是否依法履行了定价程序、符合国家有关景区门票价格调整频率、幅度和公示时间的规定，对不符合规定的，要立即予以纠正。”</p><p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">　　然而，记者在广东阳江市发展和改革局官网看到，《大角湾景区门票价格调整社会稳定风险评估－－公众参与公告》的公示有效期仅7天。大角湾景区从6月中旬开听证会到7月18日上调票价，公示期远未达到六个月，涉嫌违规；此外，吉林省物价局官网显示，7月15日召开东北虎园熊猫馆门票价格听证会，7月19日物价局下文即日起执行票价。吉林省物价局有关负责人回应说，听证会上定价方案一致通过，根据国家听证管理有关规定可直接印发。“这是制定门票价格而不是调整，调整不但有6个月公示期，还有逢节假日前一个月内不能调，所以一年没有几天能调价。新制定门票价格则没有公示要求。”</p><p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">　　－－拟调涨幅度超上限。根据安徽省合肥市庐江县物价局官方公告显示，5月26日召开庐江县冶父山风景门票价格调整听证会，县物价局提交的听证方案是：将进山门票价格由10元／人次调整为20元／人次。记者核算发现，拟调涨幅度高达100％，而国家发改委明确规定“50元以下的景区，一次提价幅度不得超过原票价的35％”。</p><p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">　　<strong>各地对中央文件执行不一 谨防“擦边球”式调价</strong></p><p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">　　“禁涨令”期间究竟是否可以启动调价程序？业内专家认为，对于通知中“原则上”的理解，各地出现了差异。多地景区虽没正式上调价格，但在此期间启动门票调价程序并制定门票价格方案。对于这种打“擦边球”式涨价的行为，有关部门应予以重视和规范。</p><p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">　　记者在调查中还发现，一些省区市在控制景区门票涨价方面做出了有益探索。有的地区要求辖内景区一定年限内不能涨价，还有的知名景区门票价格不涨反降。</p><p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">　　记者从江西省旅发委了解到，江西省2013年10月承诺全省景区、景点5年内不涨价，至今3年来全省无一景区涨价。据江苏省物价局服务价格处调研员赵楠介绍，去年9月以来，对实行政府定价管理的8家景区实施免费开放，约谈4家景区并要求降价。“按年度测算，以上景区降价总额约为1230万元。”</p><p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">　　湖北5Ａ级景区神农架则在去年和今年两度下调门票。神旅集团行政部高级主管向祖行介绍，神农架景区联票价格两度下调，去年3月举办听证会由319元调到299元，今年3月又举办听证会由299元下调到269元，该联票还可以让游客在5天之内多次进出景区，以“慢旅游”的方式拉长了消费链。</p><p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">　　华东师范大学旅游系主任楼嘉军说，根据国家发展改革委、国家旅游局有关规定，实行政府定价、政府指导价管理的景区，应严格执行价格政策，不得以任何名义、任何形式擅自提高或变相提高门票价格。</p><p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">　　去年9月，国家发展改革委通报依法查处了8起景区门票违规收费案件，这些景区因存在不执行政府定价、捆绑销售、自立收费项目或不执行门票优惠政策等原因受到查处，其中秦皇岛老龙头、湖南天门山等著名景点包含在内。</p><p style="margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">　　楼嘉军说，对通过违规设置、强制销售“园中园”门票、临时门票、不同景区联票等形式变相提高门票价格等违反国家有关规定的行为，应立即纠正，并由价格主管部门依法予以处罚。（参与记者潘晔、孟含琪）</p><p class="article-editor" style="margin-top: 15px; margin-bottom: 15px; padding: 0px; text-align: right; line-height: 2em; font-family: &#39;Microsoft YaHei&#39;, u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53; white-space: normal;">责任编辑：郑汉星</p><p><br/></p>', '2016-10-03 16:37:45', -1, -2);

-- --------------------------------------------------------

--
-- 表的结构 `teambuild_photo`
--

CREATE TABLE IF NOT EXISTS `teambuild_photo` (
  `id` int(11) NOT NULL,
  `pic_name` text NOT NULL,
  `content` text NOT NULL,
  `up_id` int(11) NOT NULL,
  `down_id` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `teambuild_photo`
--

INSERT INTO `teambuild_photo` (`id`, `pic_name`, `content`, `up_id`, `down_id`) VALUES
(9, '6835836_115116793000_2.jpg', '春风十里', 10, -2),
(10, '13559303_233732580000_2.jpg', '绿意盎然', 11, 9),
(11, 'u=3211314641,1153375401&fm=21&gp=0.jpg', '碧海蓝天', -1, 10);

-- --------------------------------------------------------

--
-- 表的结构 `techniques`
--

CREATE TABLE IF NOT EXISTS `techniques` (
  `id` int(11) NOT NULL,
  `pic_name` varchar(255) NOT NULL,
  `techniques_name` varchar(255) NOT NULL,
  `techniques_intro` text NOT NULL,
  `up_id` int(11) NOT NULL,
  `down_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `techniques`
--

INSERT INTO `techniques` (`id`, `pic_name`, `techniques_name`, `techniques_intro`, `up_id`, `down_id`) VALUES
(9, 'u85.png', '技术一', '技术介绍一', 10, -2),
(10, 'u85 - 副本.png', '技术二', '技术介绍二', 11, 9),
(11, 'u85 - 副本 (2).png', '技术三', '技术介绍三', -1, 10);

-- --------------------------------------------------------

--
-- 表的结构 `wheel_pic`
--

CREATE TABLE IF NOT EXISTS `wheel_pic` (
  `id` int(11) NOT NULL,
  `pic_name` varchar(255) NOT NULL COMMENT '文件名',
  `up_id` int(11) NOT NULL,
  `down_id` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wheel_pic`
--

INSERT INTO `wheel_pic` (`id`, `pic_name`, `up_id`, `down_id`) VALUES
(49, '20504616_5.jpg', -1, 47),
(47, 'test3.jpg', 49, -2);

-- --------------------------------------------------------

--
-- 表的结构 `workshops`
--

CREATE TABLE IF NOT EXISTS `workshops` (
  `id` int(11) NOT NULL,
  `workshops_title` varchar(255) NOT NULL COMMENT '工作坊标题',
  `workshops_content` text NOT NULL COMMENT '工作坊信息内容',
  `workshops_createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `up_id` int(11) NOT NULL,
  `down_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `workshops`
--

INSERT INTO `workshops` (`id`, `workshops_title`, `workshops_content`, `workshops_createtime`, `up_id`, `down_id`) VALUES
(42, '工作坊一', '<p>工作坊一介绍</p>', '2016-10-03 15:49:32', -1, 44),
(43, '工作坊三', '<p>工作坊三介绍</p>', '2016-10-03 15:49:53', 44, -2),
(44, '工作坊二', '<p>工作坊二介绍</p>', '2016-10-03 15:49:43', 42, 43);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_intro`
--
ALTER TABLE `lab_intro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_role`
--
ALTER TABLE `member_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects_picture`
--
ALTER TABLE `projects_picture`
  ADD PRIMARY KEY (`pic_id`),
  ADD KEY `projects_id` (`projects_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `teambuild`
--
ALTER TABLE `teambuild`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teambuild_photo`
--
ALTER TABLE `teambuild_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `techniques`
--
ALTER TABLE `techniques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wheel_pic`
--
ALTER TABLE `wheel_pic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workshops`
--
ALTER TABLE `workshops`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `member_role`
--
ALTER TABLE `member_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `projects_picture`
--
ALTER TABLE `projects_picture`
  MODIFY `pic_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `teambuild`
--
ALTER TABLE `teambuild`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `teambuild_photo`
--
ALTER TABLE `teambuild_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `techniques`
--
ALTER TABLE `techniques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `wheel_pic`
--
ALTER TABLE `wheel_pic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `workshops`
--
ALTER TABLE `workshops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- 限制导出的表
--

--
-- 限制表 `projects_picture`
--
ALTER TABLE `projects_picture`
  ADD CONSTRAINT `tmp` FOREIGN KEY (`projects_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
