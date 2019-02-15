/*
 Navicat Premium Data Transfer

 Source Server         : 本机3301
 Source Server Type    : MySQL
 Source Server Version : 50719
 Source Host           : localhost:3301
 Source Schema         : photo_manage

 Target Server Type    : MySQL
 Target Server Version : 50719
 File Encoding         : 65001

 Date: 26/01/2019 15:52:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE `admin_menu`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `permission` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_menu
-- ----------------------------
INSERT INTO `admin_menu` VALUES (1, 0, 1, 'Index', 'fa-university', '/', NULL, NULL, '2019-01-26 15:43:27');
INSERT INTO `admin_menu` VALUES (2, 0, 4, '系统管理', 'fa-tasks', NULL, NULL, NULL, '2019-01-28 12:02:47');
INSERT INTO `admin_menu` VALUES (3, 2, 5, '后台账号', 'fa-users', 'auth/users', NULL, NULL, '2019-01-28 12:02:47');
INSERT INTO `admin_menu` VALUES (4, 2, 6, '权限组', 'fa-database', 'auth/roles', NULL, NULL, '2019-01-28 12:02:47');
INSERT INTO `admin_menu` VALUES (5, 2, 7, '权限', 'fa-ban', 'auth/permissions', NULL, NULL, '2019-01-28 12:02:47');
INSERT INTO `admin_menu` VALUES (6, 2, 8, '菜单', 'fa-bars', 'auth/menu', NULL, NULL, '2019-01-28 12:02:47');
INSERT INTO `admin_menu` VALUES (7, 2, 9, '后台日志', 'fa-history', 'auth/logs', NULL, NULL, '2019-01-28 12:02:47');
INSERT INTO `admin_menu` VALUES (8, 0, 2, '用户管理', 'fa-user', NULL, NULL, '2019-01-28 11:31:54', '2019-01-28 12:02:47');
INSERT INTO `admin_menu` VALUES (9, 8, 3, '用户列表', 'fa-users', '/users', NULL, '2019-01-28 11:32:51', '2019-01-28 12:02:47');
INSERT INTO `admin_menu` VALUES (10, 0, 4, '案例管理', 'fa-file-photo-o', NULL, NULL, '2019-02-02 15:02:40', '2019-02-02 15:03:44');
INSERT INTO `admin_menu` VALUES (11, 10, 5, '案例列表', 'fa-bars', '/cases', NULL, '2019-02-02 15:03:32', '2019-02-02 15:03:44');

-- ----------------------------
-- Table structure for admin_operation_log
-- ----------------------------
DROP TABLE IF EXISTS `admin_operation_log`;
CREATE TABLE `admin_operation_log`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `admin_operation_log_user_id_index`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 87 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for admin_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_permissions`;
CREATE TABLE `admin_permissions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `http_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `admin_permissions_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_permissions
-- ----------------------------
INSERT INTO `admin_permissions` VALUES (1, '最高权限', 'superAdmin', '', '*', NULL, '2019-01-26 15:51:18');
INSERT INTO `admin_permissions` VALUES (3, '账户中心', '账户中心', '', '/auth/login\r\n/auth/logout\r\n/auth/setting\r\n/', NULL, '2019-01-26 15:49:09');
INSERT INTO `admin_permissions` VALUES (5, '系统管理', '系统管理', '', '/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs', NULL, '2019-01-26 15:48:01');

-- ----------------------------
-- Table structure for admin_role_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_menu`;
CREATE TABLE `admin_role_menu`  (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `admin_role_menu_role_id_menu_id_index`(`role_id`, `menu_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_role_menu
-- ----------------------------
INSERT INTO `admin_role_menu` VALUES (1, 2, NULL, NULL);

-- ----------------------------
-- Table structure for admin_role_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_permissions`;
CREATE TABLE `admin_role_permissions`  (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `admin_role_permissions_role_id_permission_id_index`(`role_id`, `permission_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_role_permissions
-- ----------------------------
INSERT INTO `admin_role_permissions` VALUES (1, 1, NULL, NULL);

-- ----------------------------
-- Table structure for admin_role_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_users`;
CREATE TABLE `admin_role_users`  (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `admin_role_users_role_id_user_id_index`(`role_id`, `user_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_role_users
-- ----------------------------
INSERT INTO `admin_role_users` VALUES (1, 1, NULL, NULL);

-- ----------------------------
-- Table structure for admin_roles
-- ----------------------------
DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE `admin_roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `admin_roles_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_roles
-- ----------------------------
INSERT INTO `admin_roles` VALUES (1, '最高权限', 'superadmin', '2019-01-26 11:29:28', '2019-01-26 15:51:00');

-- ----------------------------
-- Table structure for admin_user_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_user_permissions`;
CREATE TABLE `admin_user_permissions`  (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `admin_user_permissions_user_id_permission_id_index`(`user_id`, `permission_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for admin_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `admin_users_username_unique`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_users
-- ----------------------------
INSERT INTO `admin_users` VALUES (1, 'admin', '$2y$10$ozNcHgYMnaecu.LIDj7lrOX8cBo/YajTmAU7d4UkB5QIpvQwh0/Pm', 'Administrator', NULL, 'rfKdCv4f6QLdyu3EXaFwBRwQVavDfaQAwOSmO9ZvGlW0oESAjRpgqeY5hDHH', '2019-01-26 11:29:28', '2019-01-26 11:29:28');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2016_01_04_173148_create_admin_tables', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for p_users
-- ----------------------------
DROP TABLE IF EXISTS `p_users`;
CREATE TABLE `p_users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '账号',
  `password` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '登录密码',
  `nick_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '昵称',
  `phone_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '手机号码',
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '邮箱',
  `created_at` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `updated_at` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '修改时间',
  `is_forbid` tinyint(4) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否封号',
  `is_activate` tinyint(4) UNSIGNED NOT NULL COMMENT '是否激活',
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '记住密码token',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `phone`(`phone_number`) USING BTREE,
  UNIQUE INDEX `user_name`(`user_name`) USING BTREE,
  INDEX `ctime`(`created_at`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '用户表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of p_users
-- ----------------------------
INSERT INTO `p_users` VALUES (2, 'zxm123', '111111', '华源', '11111111111', '123@qq.com', 1548666042, 1548736597, 0, 1, '');
INSERT INTO `p_users` VALUES (3, 'm1', '123456', 'momo', '12345678910', 'zxm@126.com', 1548750695, 1548754320, 0, 1, '');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='影象评论表';

-- ----------------------------
-- Table structure for p_case_list
-- ----------------------------
DROP TABLE IF EXISTS `p_case_list`;
CREATE TABLE `p_case_list`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '标题',
  `keywords` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '关键词(多个，号隔开)',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '说明',
  `author` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '作者',
  `device` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '成像设备',
  `created_at` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `updated_at` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '修改时间',
  `photos` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '影像',
  `views` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '浏览数',
  `issue` tinyint(4) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否发布',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `title`(`title`) USING BTREE,
  INDEX `keywords`(`keywords`) USING BTREE,
  INDEX `utime`(`created_at`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '案例表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of p_case_list
-- ----------------------------
INSERT INTO `p_case_list` VALUES (11, 'sdf 水电费', '23', '23水电费胜多负少', '说的', '胜多负少', 1549963210, 1549963210, '', 0, 1);
INSERT INTO `p_case_list` VALUES (12, 'sdf 水电费', '23', '23水电费胜多负少', '说的', '胜多负少', 1549963254, 1549963254, '', 0, 1);
INSERT INTO `p_case_list` VALUES (13, '梵蒂冈的', '地方', '大范甘迪很反感和发过火', '23', '凡事都给对方', 1549963373, 1549963373, '', 0, 1);
INSERT INTO `p_case_list` VALUES (14, '梵蒂冈的', '地方', '大范甘迪很反感和发过火', '23', '凡事都给对方', 1549963485, 1549963485, '', 0, 1);
INSERT INTO `p_case_list` VALUES (15, '胜多负少的', '水电费少说点', '胜多负少胜多负少的胜多负少', '水电费', '2水电费', 1550047701, 1550047701, '', 0, 1);
INSERT INTO `p_case_list` VALUES (16, '豆腐干豆腐', '的电饭锅', '电饭锅电饭锅的', '地方', '电饭锅', 1550048039, 1550048039, '[\"images\\/\\u5fae\\u4fe1\\u56fe\\u7247_20190121112749.png\",\"images\\/\\u5fae\\u4fe1\\u56fe\\u7247_20190121112756.png\",\"images\\/\\u5fae\\u4fe1\\u56fe\\u7247_20190121112800.png\"]', 0, 1);

-- ----------------------------
-- Table structure for p_case_star
-- ----------------------------
DROP TABLE IF EXISTS `p_case_star`;
CREATE TABLE `p_case_star`  (
  `cid` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '案例ID',
  `uid` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户ID',
  `stars` tinyint(4) UNSIGNED NULL DEFAULT 0 COMMENT '星数',
  PRIMARY KEY (`uid`) USING BTREE,
  INDEX `cid`(`cid`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '影象星数表' ROW_FORMAT = Fixed;