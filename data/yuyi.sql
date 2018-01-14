-- ----------------------------
-- Table structure for `user`
-- 用户信息
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
`id` INT(10) unsigned NOT NULL AUTO_INCREMENT,
`username` VARCHAR(100) NOT NULL,
`password` VARCHAR(100) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `user` VALUES('1','admin','21232f297a57a5a743894a0e4a801fc3');

-- ----------------------------
-- Table structure for `articles`
-- 文章信息
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `author` varchar(255) NOT NULL COMMENT '文章作者',
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章自增ID',
  `title` varchar(200) NOT NULL COMMENT '文章标题',
  `content` text NOT NULL COMMENT '文章内容',
  `create_time` DATETIME NOT NULL COMMENT '发布时间',
  `category_id` int(10) unsigned NOT NULL COMMENT '所属分类ID',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
)ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `article_tag`;
CREATE TABLE `article_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(50) unsigned NOT NULL,
  `tag_id` int(50) unsigned NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `tag`
-- 标签信息
-- ----------------------------
DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(200) NOT NULL,
  `tag_button_type` varchar(50) DEFAULT 'success',
  PRIMARY KEY (`id`,`tag_name`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `category`
-- 分类信息
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类自增ID',
  `category_name` varchar(50) NOT NULL COMMENT '分类名称',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`category_name`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- ----------------------------
-- Table structure for `version`
-- 管理后台版本信息
-- ----------------------------
DROP TABLE IF EXISTS `version`;
CREATE TABLE `version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(200) NOT NULL,
  `title` text,
  `update` text,
  `updatetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;


