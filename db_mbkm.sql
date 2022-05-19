/*
 Navicat Premium Data Transfer

 Source Server         : Sql
 Source Server Type    : MySQL
 Source Server Version : 100422
 Source Host           : localhost:3306
 Source Schema         : db_mbkm

 Target Server Type    : MySQL
 Target Server Version : 100422
 File Encoding         : 65001

 Date: 19/05/2022 11:11:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for daftar_peserta
-- ----------------------------
DROP TABLE IF EXISTS `daftar_peserta`;
CREATE TABLE `daftar_peserta`  (
  `id_mhs` int NULL DEFAULT NULL,
  `id_program` int NULL DEFAULT NULL,
  `sks_ditukar` int NULL DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  INDEX `id mahasiswa`(`id_mhs` ASC) USING BTREE,
  INDEX `id program`(`id_program` ASC) USING BTREE,
  CONSTRAINT `id mahasiswa` FOREIGN KEY (`id_mhs`) REFERENCES `mahasiswa` (`id_mhs`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `id program` FOREIGN KEY (`id_program`) REFERENCES `program` (`id_program`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of daftar_peserta
-- ----------------------------

-- ----------------------------
-- Table structure for mahasiswa
-- ----------------------------
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa`  (
  `id_mhs` int NOT NULL AUTO_INCREMENT,
  `nim` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `semester` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_mhs`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mahasiswa
-- ----------------------------

-- ----------------------------
-- Table structure for program
-- ----------------------------
DROP TABLE IF EXISTS `program`;
CREATE TABLE `program`  (
  `id_program` int NOT NULL AUTO_INCREMENT,
  `nama_program` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_program`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of program
-- ----------------------------
INSERT INTO `program` VALUES (1, 'Kampus Mengajar');
INSERT INTO `program` VALUES (2, 'Magang / Praktik Kerja');
INSERT INTO `program` VALUES (3, 'Membangun Desa');
INSERT INTO `program` VALUES (4, 'Pertukaran Mahasiswa Merdeka');
INSERT INTO `program` VALUES (5, 'Riset atau Penelitian');
INSERT INTO `program` VALUES (6, 'Studi Independen');
INSERT INTO `program` VALUES (7, 'Bangkit by Google, Goto, dan Traveloka');
INSERT INTO `program` VALUES (8, 'Indonesian International Student Mobility Awards');
INSERT INTO `program` VALUES (9, 'Kementrian ESDM - GERILYA');
INSERT INTO `program` VALUES (10, 'Pejuang Muda Kampus Merdeka');
INSERT INTO `program` VALUES (11, 'Proyek Kemanusiaan');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `authority` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
