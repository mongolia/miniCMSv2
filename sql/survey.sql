/*
 Navicat Premium Data Transfer

 Source Server         : minicms.az.mn
 Source Server Type    : MySQL
 Source Server Version : 50163
 Source Host           : ns5.mng.cc
 Source Database       : azmn_minicmsaz

 Target Server Type    : MySQL
 Target Server Version : 50163
 File Encoding         : utf-8

 Date: 08/04/2012 19:24:24 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `mbm_survey`
-- ----------------------------
DROP TABLE IF EXISTS `mbm_survey`;
CREATE TABLE `mbm_survey` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `lang` varchar(2) DEFAULT 'mn',
  `code` varchar(255) DEFAULT '0',
  `question` text,
  `st` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `session_id` varchar(255) DEFAULT NULL,
  `session_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Records of `mbm_survey`
-- ----------------------------
BEGIN;
INSERT INTO `mbm_survey` VALUES ('1', 'mn', 'code1', 'ÐÑÑƒÑƒÐ»Ñ‚ Ð½ÑÐ³ ÑˆÒ¯Ò¯', '0', '', '1344066262');
COMMIT;

-- ----------------------------
--  Table structure for `mbm_survey_answers`
-- ----------------------------
DROP TABLE IF EXISTS `mbm_survey_answers`;
CREATE TABLE `mbm_survey_answers` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `survey_id` int(11) unsigned NOT NULL DEFAULT '0',
  `answer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Records of `mbm_survey_answers`
-- ----------------------------
BEGIN;
INSERT INTO `mbm_survey_answers` VALUES ('1', '1', 'Ñ…Ð°Ñ€Ð¸ÑƒÐ» 1'), ('2', '1', 'Ñ…Ð°Ñ€Ð¸ÑƒÐ»Ñ‚ 2'), ('3', '1', 'Ñ…Ð°Ñ€Ð¸ÑƒÐ»Ñ‚ 3');
COMMIT;

-- ----------------------------
--  Table structure for `mbm_survey_results`
-- ----------------------------
DROP TABLE IF EXISTS `mbm_survey_results`;
CREATE TABLE `mbm_survey_results` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `survey_id` int(9) unsigned NOT NULL DEFAULT '0',
  `survey_answer_id` int(9) unsigned NOT NULL DEFAULT '0',
  `date_added` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(100) DEFAULT NULL,
  `pcname` varchar(100) DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `session_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Records of `mbm_survey_results`
-- ----------------------------
BEGIN;
INSERT INTO `mbm_survey_results` VALUES ('1', '1', '3', '1344075618', '182.160.24.28', null, '70f0fdce258103044253be201a4d9e02', '1344075618'), ('2', '1', '3', '1344075700', '182.160.24.28', null, '70f0fdce258103044253be201a4d9e02', '1344075700'), ('3', '1', '2', '1344075785', '182.160.24.28', null, '70f0fdce258103044253be201a4d9e02', '1344075785'), ('4', '1', '2', '1344075916', '182.160.24.28', null, '70f0fdce258103044253be201a4d9e02', '1344075916'), ('5', '1', '1', '1344075994', '182.160.24.28', null, '70f0fdce258103044253be201a4d9e02', '1344075994'), ('6', '1', '2', '1344076134', '182.160.24.28', null, '70f0fdce258103044253be201a4d9e02', '1344076134'), ('7', '1', '1', '1344076200', '182.160.24.28', null, '70f0fdce258103044253be201a4d9e02', '1344076200'), ('8', '1', '2', '1344076387', '182.160.24.28', null, '70f0fdce258103044253be201a4d9e02', '1344076387');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
