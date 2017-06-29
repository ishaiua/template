SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `st_user`
-- ----------------------------
DROP TABLE IF EXISTS `hh_user`;
CREATE TABLE `hh_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户UID',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '用户昵称',
  `mail` varchar(20) NOT NULL COMMENT '用户邮箱',
  `password` char(32) NOT NULL DEFAULT '',
  `mask` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '1 屏蔽用户',
  `remark` varchar(100) NOT NULL COMMENT '用户备注',
  `current_login_ip` char(15) NOT NULL DEFAULT '' COMMENT '本次登录IP',
  `current_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '本次登录时间',
  `prev_login_ip` char(15) NOT NULL DEFAULT '' COMMENT '上次登录IP',
  `prev_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上次登录时间',
  `m_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '月登陆次数',
  `session` varchar(60) NOT NULL COMMENT '用户的session_id',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='后台用户表';

SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE IF NOT EXISTS `hh_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `hh_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `hh_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `hh_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
