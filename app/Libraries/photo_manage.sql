/*
Navicat MySQL Data Transfer

Source Server         : OA
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : photo_manage

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2019-06-01 16:18:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE `admin_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of admin_menu
-- ----------------------------
INSERT INTO `admin_menu` VALUES ('1', '0', '1', 'Index', 'fa-university', '/', null, null, '2019-01-26 15:43:27');
INSERT INTO `admin_menu` VALUES ('2', '0', '4', '系统管理', 'fa-tasks', null, null, null, '2019-01-28 12:02:47');
INSERT INTO `admin_menu` VALUES ('3', '2', '5', '后台账号', 'fa-users', 'auth/users', null, null, '2019-01-28 12:02:47');
INSERT INTO `admin_menu` VALUES ('4', '2', '6', '权限组', 'fa-database', 'auth/roles', null, null, '2019-01-28 12:02:47');
INSERT INTO `admin_menu` VALUES ('5', '2', '7', '权限', 'fa-ban', 'auth/permissions', null, null, '2019-01-28 12:02:47');
INSERT INTO `admin_menu` VALUES ('6', '2', '8', '菜单', 'fa-bars', 'auth/menu', null, null, '2019-01-28 12:02:47');
INSERT INTO `admin_menu` VALUES ('7', '2', '9', '后台日志', 'fa-history', 'auth/logs', null, null, '2019-01-28 12:02:47');
INSERT INTO `admin_menu` VALUES ('8', '0', '2', '用户管理', 'fa-user', null, null, '2019-01-28 11:31:54', '2019-01-28 12:02:47');
INSERT INTO `admin_menu` VALUES ('9', '8', '3', '用户列表', 'fa-users', '/users', null, '2019-01-28 11:32:51', '2019-01-28 12:02:47');
INSERT INTO `admin_menu` VALUES ('10', '0', '4', '案例管理', 'fa-file-photo-o', null, null, '2019-02-02 15:02:40', '2019-02-02 15:03:44');
INSERT INTO `admin_menu` VALUES ('11', '10', '5', '案例列表', 'fa-bars', '/cases', null, '2019-02-02 15:03:32', '2019-02-02 15:03:44');

-- ----------------------------
-- Table structure for admin_operation_log
-- ----------------------------
DROP TABLE IF EXISTS `admin_operation_log`;
CREATE TABLE `admin_operation_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `admin_operation_log_user_id_index` (`user_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of admin_operation_log
-- ----------------------------

-- ----------------------------
-- Table structure for admin_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_permissions`;
CREATE TABLE `admin_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `http_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `admin_permissions_name_unique` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of admin_permissions
-- ----------------------------
INSERT INTO `admin_permissions` VALUES ('1', '最高权限', 'superAdmin', '', '*', null, '2019-01-26 15:51:18');
INSERT INTO `admin_permissions` VALUES ('3', '账户中心', '账户中心', '', '/auth/login\r\n/auth/logout\r\n/auth/setting\r\n/', null, '2019-01-26 15:49:09');
INSERT INTO `admin_permissions` VALUES ('5', '系统管理', '系统管理', '', '/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs', null, '2019-01-26 15:48:01');

-- ----------------------------
-- Table structure for admin_roles
-- ----------------------------
DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE `admin_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `admin_roles_name_unique` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of admin_roles
-- ----------------------------
INSERT INTO `admin_roles` VALUES ('1', '最高权限', 'superadmin', '2019-01-26 11:29:28', '2019-01-26 15:51:00');

-- ----------------------------
-- Table structure for admin_role_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_menu`;
CREATE TABLE `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of admin_role_menu
-- ----------------------------
INSERT INTO `admin_role_menu` VALUES ('1', '2', null, null);

-- ----------------------------
-- Table structure for admin_role_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_permissions`;
CREATE TABLE `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of admin_role_permissions
-- ----------------------------
INSERT INTO `admin_role_permissions` VALUES ('1', '1', null, null);

-- ----------------------------
-- Table structure for admin_role_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_users`;
CREATE TABLE `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of admin_role_users
-- ----------------------------
INSERT INTO `admin_role_users` VALUES ('1', '1', null, null);

-- ----------------------------
-- Table structure for admin_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `admin_users_username_unique` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of admin_users
-- ----------------------------
INSERT INTO `admin_users` VALUES ('1', 'admin', '$2y$10$ozNcHgYMnaecu.LIDj7lrOX8cBo/YajTmAU7d4UkB5QIpvQwh0/Pm', 'Administrator', null, 'rfKdCv4f6QLdyu3EXaFwBRwQVavDfaQAwOSmO9ZvGlW0oESAjRpgqeY5hDHH', '2019-01-26 11:29:28', '2019-01-26 11:29:28');

-- ----------------------------
-- Table structure for admin_user_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_user_permissions`;
CREATE TABLE `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of admin_user_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2016_01_04_173148_create_admin_tables', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for p_case_comment
-- ----------------------------
DROP TABLE IF EXISTS `p_case_comment`;
CREATE TABLE `p_case_comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '案例ID',
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `content` varchar(500) CHARACTER SET utf8mb4 NOT NULL COMMENT '评论',
  `created_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '评论时间',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='影象评论表';

-- ----------------------------
-- Records of p_case_comment
-- ----------------------------
INSERT INTO `p_case_comment` VALUES ('1', '16', '13', '撒旦法开始对你搜房胡搜我和覅肯定是开发还能看到防守打法水电费水电费水电费水电费水电费水电费水电费水电费水电费萨达萨达萨达萨达水电费萨达发送的发生过框架的风华高科如何通过地方过的痕迹', '1556995600');
INSERT INTO `p_case_comment` VALUES ('2', '16', '14', 'asdfsadfsd', '1556985600');
INSERT INTO `p_case_comment` VALUES ('3', '15', '1', 'sfgdgdfkjhglkdf', '1556985600');
INSERT INTO `p_case_comment` VALUES ('4', '14', '5', 'sadfsdafadsds', '1556985600');
INSERT INTO `p_case_comment` VALUES ('8', '16', '13', '哈哈哈哈哈哈 你傻了吧', '1558340121');
INSERT INTO `p_case_comment` VALUES ('17', '17', '13', 'asdf', '1559115559');
INSERT INTO `p_case_comment` VALUES ('18', '14', '13', '哈？', '1559370332');
INSERT INTO `p_case_comment` VALUES ('19', '14', '13', '哈？', '1559370996');
INSERT INTO `p_case_comment` VALUES ('20', '13', '13', '水电费水电费', '1559372432');
INSERT INTO `p_case_comment` VALUES ('21', '11', '13', '电饭锅', '1559372548');
INSERT INTO `p_case_comment` VALUES ('22', '11', '13', '德萨', '1559373306');

-- ----------------------------
-- Table structure for p_case_list
-- ----------------------------
DROP TABLE IF EXISTS `p_case_list`;
CREATE TABLE `p_case_list` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '发布用户id',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `keywords` varchar(100) NOT NULL DEFAULT '' COMMENT '关键词(多个，号隔开)',
  `content` text NOT NULL COMMENT '说明',
  `author` varchar(100) NOT NULL DEFAULT '' COMMENT '作者',
  `device` varchar(100) NOT NULL DEFAULT '' COMMENT '成像设备',
  `created_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  `photos` varchar(500) NOT NULL DEFAULT '' COMMENT '影像',
  `views` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '浏览数',
  `issue` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否发布',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `title` (`title`) USING BTREE,
  KEY `keywords` (`keywords`) USING BTREE,
  KEY `utime` (`created_at`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='案例表';

-- ----------------------------
-- Records of p_case_list
-- ----------------------------
INSERT INTO `p_case_list` VALUES ('17', '13', '血常规社认为', 'sdf,sdf,sdf', '是大佛is几点封山的', '水电费水电费', '胜多负少的', '1550910462', '1555324761', '[\"upload\\\\images\\\\user\\\\e9287986045f8d1eb848d987a50d0838.png\",\"upload\\\\images\\\\user\\\\e928798605f8d1eb848d987a50d0838.png\"]', '0', '0');
INSERT INTO `p_case_list` VALUES ('11', '14', 'sdf 水电费', '23', '23水电费胜多负少', '说的', '胜多负少', '1549963210', '1555324645', '[\"upload\\\\images\\\\user\\\\e9287986045f8d1eb848d987a50d0838.png\",\"upload\\\\images\\\\user\\\\e928798545f8d1eb848d987a50d0838.png\"]', '0', '1');
INSERT INTO `p_case_list` VALUES ('12', '13', 'sdf 水电费', '23', '23水电费胜多负少', '说的', '胜多负少', '1549963254', '1555324645', '[\"upload\\\\images\\\\user\\\\e9287986045f8d1eb848d987a50d0838.png\",\"upload\\\\images\\\\user\\\\e9287986045f8d1eb848d987a50d0838.png\"]', '0', '1');
INSERT INTO `p_case_list` VALUES ('13', '13', '梵蒂冈的', '地方', '大范甘迪很反感和发过火', '23', '凡事都给对方', '1549963373', '1555324645', '[\"upload\\\\images\\\\user\\\\e9287986045f8d1eb848d987a50d0838.png\",\"upload\\\\images\\\\user\\\\e9287986045f8d1eb848d987a50d0838.png\"]', '0', '1');
INSERT INTO `p_case_list` VALUES ('14', '14', '梵蒂冈的sadfsdfsdf', '地方', '大范甘迪很反感和发过火', '23', '凡事都给对方', '1549963485', '1555324645', '[\"upload\\\\images\\\\user\\\\e9287986045f8d1eb848d987a50d08377.png\",\"upload\\\\images\\\\user\\\\e9287986045f8d1eb848d987a50d0838.png\"]', '0', '1');
INSERT INTO `p_case_list` VALUES ('15', '13', '胜多负少的', '水电费少说点', '胜多负少胜多负少的胜多负少', '水电费', '2水电费', '1550047701', '1555324761', '[\"upload\\\\images\\\\user\\\\e9287986045f8d1eb848d987a50d0838.png\",\"upload\\\\images\\\\user\\\\e9287986045f8d1eb848d987a50d0838.png\"]', '0', '0');
INSERT INTO `p_case_list` VALUES ('16', '14', '豆腐干豆腐', '的电饭锅', '电饭锅电饭锅的', '地方', '电饭锅', '1550048039', '1555324761', '[\"upload\\\\images\\\\user\\\\e9287986045f8d1eb848d987a50d0838.png\",\"upload\\\\images\\\\user\\\\e928716045f8d1eb848d987a50d0838.png\"]', '0', '0');

-- ----------------------------
-- Table structure for p_case_photo
-- ----------------------------
DROP TABLE IF EXISTS `p_case_photo`;
CREATE TABLE `p_case_photo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL DEFAULT '0' COMMENT '案例ID',
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '图片路径',
  `views` int(11) NOT NULL DEFAULT '0' COMMENT '浏览次数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of p_case_photo
-- ----------------------------
INSERT INTO `p_case_photo` VALUES ('1', '1', '../../../img.jpg', '10');
INSERT INTO `p_case_photo` VALUES ('2', '2', '../../../img1.jpg', '1');
INSERT INTO `p_case_photo` VALUES ('3', '1', '../../../img1.jpg', '5');

-- ----------------------------
-- Table structure for p_case_star
-- ----------------------------
DROP TABLE IF EXISTS `p_case_star`;
CREATE TABLE `p_case_star` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '案例ID',
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `stars` tinyint(4) unsigned DEFAULT '0' COMMENT '星数',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED COMMENT='影象星数表';

-- ----------------------------
-- Records of p_case_star
-- ----------------------------
INSERT INTO `p_case_star` VALUES ('1', '16', '1', '4');
INSERT INTO `p_case_star` VALUES ('2', '15', '2', '4');
INSERT INTO `p_case_star` VALUES ('3', '3', '16', '4');
INSERT INTO `p_case_star` VALUES ('5', '1', '13', '5');
INSERT INTO `p_case_star` VALUES ('6', '0', '13', '3');
INSERT INTO `p_case_star` VALUES ('7', '17', '13', '4');
INSERT INTO `p_case_star` VALUES ('8', '14', '13', '4');
INSERT INTO `p_case_star` VALUES ('9', '14', '13', '4');
INSERT INTO `p_case_star` VALUES ('10', '13', '13', '1');
INSERT INTO `p_case_star` VALUES ('11', '11', '13', '1');
INSERT INTO `p_case_star` VALUES ('12', '11', '13', '1');

-- ----------------------------
-- Table structure for p_users
-- ----------------------------
DROP TABLE IF EXISTS `p_users`;
CREATE TABLE `p_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) NOT NULL COMMENT '账号',
  `password` varchar(255) NOT NULL DEFAULT '' COMMENT '登录密码',
  `nick_name` varchar(200) CHARACTER SET utf8mb4 DEFAULT '' COMMENT '昵称',
  `phone_number` varchar(20) NOT NULL DEFAULT '' COMMENT '手机号码',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '邮箱',
  `position` varchar(200) CHARACTER SET utf8mb4 DEFAULT '' COMMENT '职称',
  `hosipital` varchar(200) CHARACTER SET utf8mb4 DEFAULT '' COMMENT '医院',
  `created_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  `is_forbid` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否封号',
  `is_activate` tinyint(4) unsigned NOT NULL DEFAULT '1' COMMENT '是否激活',
  `remember_token` varchar(100) NOT NULL DEFAULT '' COMMENT '记住密码token',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `phone` (`phone_number`) USING BTREE,
  UNIQUE KEY `user_name` (`user_name`) USING BTREE,
  KEY `ctime` (`created_at`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='用户表';

-- ----------------------------
-- Records of p_users
-- ----------------------------
INSERT INTO `p_users` VALUES ('14', 'nu', '123', 'aaaaa', '13631782416', 'asd@qq.com', '', '', '0', '0', '0', '1', '');
INSERT INTO `p_users` VALUES ('13', 'cnine', '$2y$10$fXfTvKMyMLEYQh0gQKm9C.ktdmPkyV9IiHi4JNGB.Dr4PMqpIyhRm', 'hahah', '13631784557', 'sad@qq.com', 'adsf', 'asd', '1556596756', '1556596756', '0', '1', 'eyetdHaf2Va5dsmWYP9d5jUu0Ebwb7XwL04CnEPVtTBHksWOZjaTaIjYj2o7');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `users_email_unique` (`email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
