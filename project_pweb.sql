/*
 Navicat Premium Data Transfer

 Source Server         : clone
 Source Server Type    : MySQL
 Source Server Version : 80034
 Source Host           : localhost:3306
 Source Schema         : project_pweb

 Target Server Type    : MySQL
 Target Server Version : 80034
 File Encoding         : 65001

 Date: 25/11/2024 11:28:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for buyers
-- ----------------------------
DROP TABLE IF EXISTS `buyers`;
CREATE TABLE `buyers`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of buyers
-- ----------------------------
INSERT INTO `buyers` VALUES (1, 'rara', 18, 'pppp', '2024-11-17 08:32:35', '2024-11-17 08:32:35');
INSERT INTO `buyers` VALUES (2, 'izuna', 20, 'dummy', '2024-11-18 08:32:43', '2024-11-18 08:32:43');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'makanan', '2024-11-17 06:42:10', '2024-11-17 06:42:10');
INSERT INTO `categories` VALUES (2, 'minuman', '2024-11-17 06:42:17', '2024-11-17 06:42:17');

-- ----------------------------
-- Table structure for detail_buyers
-- ----------------------------
DROP TABLE IF EXISTS `detail_buyers`;
CREATE TABLE `detail_buyers`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `qty` int NOT NULL,
  `total_price` double(8, 2) NOT NULL,
  `products_id` bigint UNSIGNED NOT NULL,
  `transactions_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `detail_buyers_products_id_foreign`(`products_id` ASC) USING BTREE,
  INDEX `detail_buyers_transactions_id_foreign`(`transactions_id` ASC) USING BTREE,
  CONSTRAINT `detail_buyers_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `detail_buyers_transactions_id_foreign` FOREIGN KEY (`transactions_id`) REFERENCES `transactions` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_buyers
-- ----------------------------

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2023_03_15_170551_create_products_table', 1);
INSERT INTO `migrations` VALUES (6, '2023_03_17_071054_create_vouchers_table', 1);
INSERT INTO `migrations` VALUES (7, '2023_03_24_084258_create_buyers_table', 1);
INSERT INTO `migrations` VALUES (8, '2023_03_24_085959_create_transactions_table', 1);
INSERT INTO `migrations` VALUES (9, '2023_03_24_091644_create_categories_table', 1);
INSERT INTO `migrations` VALUES (10, '2023_03_27_171243_create_detail_buyers', 1);
INSERT INTO `migrations` VALUES (11, '2023_04_14_131004_add_photo_to_products_table', 1);
INSERT INTO `migrations` VALUES (12, '2023_04_15_185100_create_product_details_table', 1);
INSERT INTO `migrations` VALUES (13, '2023_04_15_185353_add_relation_to_products_table', 1);
INSERT INTO `migrations` VALUES (14, '2023_04_16_094947_create_roles_table', 1);
INSERT INTO `migrations` VALUES (15, '2023_04_16_095019_create_user_roles_table', 1);
INSERT INTO `migrations` VALUES (16, '2023_04_28_112002_create_transaction_details_table', 1);
INSERT INTO `migrations` VALUES (17, '2023_04_28_113536_add_relation_to_transactions_table', 1);
INSERT INTO `migrations` VALUES (18, '2023_05_02_061239_create_posts_table', 1);
INSERT INTO `migrations` VALUES (19, '2023_05_04_100321_add_product_id_in_transaction_details_table', 1);
INSERT INTO `migrations` VALUES (20, '2023_05_04_100706_delete_date_in_transaction_details_table', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posts
-- ----------------------------

-- ----------------------------
-- Table structure for product_details
-- ----------------------------
DROP TABLE IF EXISTS `product_details`;
CREATE TABLE `product_details`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NULL DEFAULT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `product_details_product_id_foreign`(`product_id` ASC) USING BTREE,
  CONSTRAINT `product_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_details
-- ----------------------------
INSERT INTO `product_details` VALUES (1, 1, 'Ready', 'Teh Celup', '2024-11-17 07:00:51', '2024-11-17 07:34:06');
INSERT INTO `product_details` VALUES (2, 2, 'Default', 'Le Minerale', '2024-11-17 07:01:40', '2024-11-17 07:01:40');
INSERT INTO `product_details` VALUES (3, 3, 'Default', 'Milo', '2024-11-17 07:01:55', '2024-11-17 07:01:55');
INSERT INTO `product_details` VALUES (4, 4, 'Default', 'Kapal Api', '2024-11-17 07:02:12', '2024-11-17 07:02:12');
INSERT INTO `product_details` VALUES (5, 5, 'Default', 'Buah Jeruk', '2024-11-17 07:02:36', '2024-11-17 07:02:36');
INSERT INTO `product_details` VALUES (6, 6, 'Default', 'Bubur Ayam', '2024-11-17 07:03:32', '2024-11-17 07:03:32');
INSERT INTO `product_details` VALUES (7, 7, 'Default', 'Nasi Pecel', '2024-11-17 07:03:48', '2024-11-17 07:03:48');
INSERT INTO `product_details` VALUES (8, 8, 'Default', 'Nasi Soto Ayam Kuah', '2024-11-17 07:04:20', '2024-11-17 07:04:20');
INSERT INTO `product_details` VALUES (9, 9, 'Default', 'Nasi Rawon Sapi', '2024-11-17 07:04:38', '2024-11-17 07:04:38');
INSERT INTO `product_details` VALUES (10, 10, 'Default', 'Nasi Telur Sambal', '2024-11-17 07:04:54', '2024-11-17 07:04:54');
INSERT INTO `product_details` VALUES (11, 11, 'Default', 'Nasi Ayam Penyet', '2024-11-17 07:05:12', '2024-11-17 07:05:12');
INSERT INTO `product_details` VALUES (12, 12, 'Default', 'Nasi Goreng Special', '2024-11-17 07:05:31', '2024-11-17 07:05:31');
INSERT INTO `product_details` VALUES (13, 13, 'Default', 'Indomie', '2024-11-17 07:05:46', '2024-11-17 07:05:46');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stocks` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `category_id` bigint UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `products_category_id_foreign`(`category_id` ASC) USING BTREE,
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'Es Teh Manis', '3000', 3, '2024-11-17 06:43:11', '2024-11-18 08:36:48', 'products/1731825791.jpeg', 2);
INSERT INTO `products` VALUES (2, 'Air Mineral', '3000', 24, '2024-11-17 06:47:51', '2024-11-17 06:47:51', 'products/1731826071.jpeg', 2);
INSERT INTO `products` VALUES (3, 'Es Milo', '5000', 8, '2024-11-17 06:48:37', '2024-11-17 08:33:03', 'products/1731826117.jpeg', 2);
INSERT INTO `products` VALUES (4, 'Kopi', '4000', 10, '2024-11-17 06:49:14', '2024-11-17 06:49:14', 'products/1731826154.jpeg', 2);
INSERT INTO `products` VALUES (5, 'Es Jeruk', '5000', 10, '2024-11-17 06:50:17', '2024-11-17 06:50:17', 'products/1731826217.jpeg', 2);
INSERT INTO `products` VALUES (6, 'Bubur Ayam', '10000', 15, '2024-11-17 06:51:01', '2024-11-17 06:51:01', 'products/1731826261.jpeg', 1);
INSERT INTO `products` VALUES (7, 'Nasi Pecel', '10000', 10, '2024-11-17 06:51:43', '2024-11-17 06:51:43', 'products/1731826303.jpeg', 1);
INSERT INTO `products` VALUES (8, 'Nasi Soto Ayam', '15000', 15, '2024-11-17 06:52:28', '2024-11-17 06:52:28', 'products/1731826348.jpeg', 1);
INSERT INTO `products` VALUES (9, 'Nasi Rawon', '15000', 20, '2024-11-17 06:53:10', '2024-11-17 06:53:10', 'products/1731826390.jpeg', 1);
INSERT INTO `products` VALUES (10, 'Nasi Telur', '10000', 10, '2024-11-17 06:53:43', '2024-11-17 06:53:43', 'products/1731826423.jpeg', 1);
INSERT INTO `products` VALUES (11, 'Nasi Ayam Penyet', '17000', 15, '2024-11-17 06:54:30', '2024-11-17 06:54:30', 'products/1731826470.jpeg', 1);
INSERT INTO `products` VALUES (12, 'Nasi Goreng Special', '15000', 20, '2024-11-17 06:55:13', '2024-11-17 06:55:13', 'products/1731826513.jpeg', 1);
INSERT INTO `products` VALUES (13, 'Mie Kuah', '12000', 30, '2024-11-17 06:56:23', '2024-11-18 08:40:39', 'products/1731826582.jpeg', 1);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'admin', NULL, NULL);
INSERT INTO `roles` VALUES (2, 'customer', NULL, NULL);

-- ----------------------------
-- Table structure for transaction_details
-- ----------------------------
DROP TABLE IF EXISTS `transaction_details`;
CREATE TABLE `transaction_details`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `transaction_id` bigint UNSIGNED NULL DEFAULT NULL,
  `voucher_id` bigint UNSIGNED NULL DEFAULT NULL,
  `qty` int NOT NULL,
  `total` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_discount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `total_before` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `transaction_details_transaction_id_foreign`(`transaction_id` ASC) USING BTREE,
  INDEX `transaction_details_voucher_id_foreign`(`voucher_id` ASC) USING BTREE,
  INDEX `transaction_details_product_id_foreign`(`product_id` ASC) USING BTREE,
  CONSTRAINT `transaction_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `transaction_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `transaction_details_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaction_details
-- ----------------------------
INSERT INTO `transaction_details` VALUES (1, 1, NULL, 2, '6000', NULL, '6000', '2024-11-17 08:32:55', '2024-11-17 08:32:55', 1);
INSERT INTO `transaction_details` VALUES (2, 1, NULL, 2, '10000', NULL, '10000', '2024-11-17 08:32:59', '2024-11-17 08:32:59', 3);
INSERT INTO `transaction_details` VALUES (3, 2, 1, 10, '100000', '30000', '130000', '2024-11-18 08:34:35', '2024-11-18 08:35:36', 13);
INSERT INTO `transaction_details` VALUES (4, 2, NULL, 5, '15000', NULL, '15000', '2024-11-18 08:36:26', '2024-11-18 08:36:26', 1);

-- ----------------------------
-- Table structure for transactions
-- ----------------------------
DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `buyer_id` bigint UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `transactions_buyer_id_foreign`(`buyer_id` ASC) USING BTREE,
  CONSTRAINT `transactions_buyer_id_foreign` FOREIGN KEY (`buyer_id`) REFERENCES `buyers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transactions
-- ----------------------------
INSERT INTO `transactions` VALUES (1, '2024-11-17', '1', '2024-11-17 08:32:45', '2024-11-17 08:33:03', 1);
INSERT INTO `transactions` VALUES (2, '2024-11-18', '1', '2024-11-18 08:33:06', '2024-11-18 08:36:48', 2);

-- ----------------------------
-- Table structure for user_roles
-- ----------------------------
DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_roles_role_id_foreign`(`role_id` ASC) USING BTREE,
  INDEX `user_roles_user_id_foreign`(`user_id` ASC) USING BTREE,
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_roles
-- ----------------------------
INSERT INTO `user_roles` VALUES (2, 1, 2, '2024-11-17 06:37:41', '2024-11-17 06:37:41');
INSERT INTO `user_roles` VALUES (3, 2, 3, '2024-11-17 08:36:25', '2024-11-17 08:36:25');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (2, 'izuna', 'izuna@gmail.com', NULL, '$2y$10$BPXiVDZMMb1G54yoO0qJXuyKRFOoUVg3UH0SAJr.Ce5Gb1kNo/7yi', NULL, '2024-11-17 06:37:41', '2024-11-17 06:37:41');
INSERT INTO `users` VALUES (3, 'rara', 'rara@gmail.com', NULL, '$2y$10$l34lXZ7U4qi29p39rChkn.KSF7UYLZLhAr78k9kNnbXwg/SY97q6q', NULL, '2024-11-17 08:36:25', '2024-11-17 08:36:25');

-- ----------------------------
-- Table structure for vouchers
-- ----------------------------
DROP TABLE IF EXISTS `vouchers`;
CREATE TABLE `vouchers`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diskon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stocks` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `vouchers_product_id_foreign`(`product_id` ASC) USING BTREE,
  CONSTRAINT `vouchers_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vouchers
-- ----------------------------
INSERT INTO `vouchers` VALUES (1, 13, 'voucher akhir tahun', '3000', 10, '2024-11-18 08:35:05', '2024-11-18 08:35:36');

SET FOREIGN_KEY_CHECKS = 1;
