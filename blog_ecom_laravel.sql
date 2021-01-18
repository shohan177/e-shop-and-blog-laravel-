-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2021 at 04:49 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_ecom_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pub',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Course', 'course', 'pub', '2021-01-04 07:53:56', '2021-01-04 15:15:21'),
(5, 'Technology', 'technology', 'pub', '2021-01-04 07:54:17', '2021-01-04 15:15:19'),
(6, 'Food', 'food', 'pub', '2021-01-04 07:54:39', '2021-01-05 07:24:12'),
(7, 'Bangla desh', 'bangla-desh', 'pub', '2021-01-04 07:55:03', '2021-01-05 07:24:24');

-- --------------------------------------------------------

--
-- Table structure for table `catagory_post`
--

CREATE TABLE `catagory_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catagory_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catagory_post`
--

INSERT INTO `catagory_post` (`id`, `catagory_id`, `post_id`, `created_at`, `updated_at`) VALUES
(5, 3, 3, NULL, NULL),
(8, 1, 5, NULL, NULL),
(9, 2, 5, NULL, NULL),
(10, 1, 6, NULL, NULL),
(11, 2, 6, NULL, NULL),
(13, 2, 8, NULL, NULL),
(14, 1, 9, NULL, NULL),
(15, 2, 9, NULL, NULL),
(21, 1, 4, NULL, NULL),
(22, 2, 4, NULL, NULL),
(33, 2, 10, NULL, NULL),
(34, 3, 10, NULL, NULL),
(46, 2, 7, NULL, NULL),
(47, 1, 2, NULL, NULL),
(48, 2, 2, NULL, NULL),
(49, 1, 1, NULL, NULL),
(50, 2, 1, NULL, NULL),
(51, 3, 1, NULL, NULL),
(52, 2, 11, NULL, NULL),
(53, 3, 12, NULL, NULL),
(54, 1, 13, NULL, NULL),
(55, 2, 14, NULL, NULL),
(56, 2, 15, NULL, NULL),
(57, 3, 16, NULL, NULL),
(58, 2, 17, NULL, NULL),
(59, 3, 18, NULL, NULL),
(62, 7, 21, NULL, NULL),
(67, 6, 20, NULL, NULL),
(68, 7, 23, NULL, NULL),
(70, 6, 24, NULL, NULL),
(71, 4, 22, NULL, NULL),
(72, 5, 22, NULL, NULL),
(73, 4, 19, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'baby food', 'baby-food', NULL, NULL),
(2, 'vagitable', 'vagitable', NULL, NULL),
(3, 'Tools', 'tools', NULL, NULL),
(4, 'Newborn Essentials', 'newborn-essentials', NULL, NULL),
(5, 'Drinks', 'drinks', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `department_product`
--

CREATE TABLE `department_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Department_id` int(10) UNSIGNED NOT NULL,
  `Product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_product`
--

INSERT INTO `department_product` (`id`, `Department_id`, `Product_id`, `created_at`, `updated_at`) VALUES
(1, 4, 13, NULL, NULL),
(3, 4, 15, NULL, NULL),
(4, 2, 16, NULL, NULL),
(5, 2, 17, NULL, NULL),
(6, 3, 18, NULL, NULL),
(7, 3, 19, NULL, NULL),
(8, 1, 20, NULL, NULL),
(9, 1, 21, NULL, NULL),
(10, 1, 22, NULL, NULL),
(11, 2, 23, NULL, NULL),
(12, 5, 24, NULL, NULL),
(13, 5, 25, NULL, NULL),
(14, 5, 26, NULL, NULL),
(15, 5, 27, NULL, NULL),
(16, 4, 28, NULL, NULL),
(17, 3, 29, NULL, NULL),
(18, 2, 30, NULL, NULL),
(19, 4, 30, NULL, NULL),
(20, 2, 31, NULL, NULL),
(21, 3, 31, NULL, NULL),
(22, 4, 31, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_pages`
--

CREATE TABLE `home_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wwa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clients` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonials` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setup` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_pages`
--

INSERT INTO `home_pages` (`id`, `slider`, `wwa`, `vission`, `clients`, `testimonials`, `setup`, `created_at`, `updated_at`) VALUES
(1, '{\"photo1\":\"fcfeb3b01eecd490f78406496fdf9c61.jpg\",\"tilte1\":\"new new\",\"sub1\":\"new newnew newnew newnew new\",\"photo2\":\"206d3686fe1a561519f6b2a66dd244c5.jpg\",\"tilte2\":\"heloo\",\"sub2\":\"heloo heloo heloo\"}', NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-12 07:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Food', 'food', NULL, NULL),
(2, 'car', 'car', NULL, NULL),
(3, 'drinks', 'drinks', NULL, NULL),
(4, 'Baby', 'baby', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `key_product`
--

CREATE TABLE `key_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Key_id` int(10) UNSIGNED NOT NULL,
  `Product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `key_product`
--

INSERT INTO `key_product` (`id`, `Key_id`, `Product_id`, `created_at`, `updated_at`) VALUES
(1, 2, 3, NULL, NULL),
(2, 3, 3, NULL, NULL),
(3, 1, 4, NULL, NULL),
(4, 2, 4, NULL, NULL),
(5, 3, 4, NULL, NULL),
(6, 1, 5, NULL, NULL),
(7, 2, 5, NULL, NULL),
(8, 3, 5, NULL, NULL),
(9, 1, 6, NULL, NULL),
(10, 2, 6, NULL, NULL),
(11, 3, 6, NULL, NULL),
(12, 1, 7, NULL, NULL),
(13, 2, 7, NULL, NULL),
(14, 3, 7, NULL, NULL),
(15, 3, 8, NULL, NULL),
(16, 1, 9, NULL, NULL),
(17, 2, 9, NULL, NULL),
(18, 1, 10, NULL, NULL),
(19, 2, 10, NULL, NULL),
(20, 3, 10, NULL, NULL),
(21, 3, 11, NULL, NULL),
(22, 1, 12, NULL, NULL),
(23, 2, 12, NULL, NULL),
(24, 3, 12, NULL, NULL),
(25, 4, 13, NULL, NULL),
(26, 4, 14, NULL, NULL),
(27, 4, 15, NULL, NULL),
(28, 1, 16, NULL, NULL),
(29, 1, 17, NULL, NULL),
(30, 2, 18, NULL, NULL),
(31, 2, 19, NULL, NULL),
(32, 1, 20, NULL, NULL),
(33, 4, 20, NULL, NULL),
(34, 1, 21, NULL, NULL),
(35, 4, 21, NULL, NULL),
(36, 1, 22, NULL, NULL),
(37, 4, 22, NULL, NULL),
(38, 1, 23, NULL, NULL),
(39, 1, 24, NULL, NULL),
(40, 3, 24, NULL, NULL),
(41, 1, 25, NULL, NULL),
(42, 3, 25, NULL, NULL),
(43, 1, 26, NULL, NULL),
(44, 3, 26, NULL, NULL),
(45, 3, 27, NULL, NULL),
(46, 3, 28, NULL, NULL),
(47, 3, 29, NULL, NULL),
(48, 2, 30, NULL, NULL),
(49, 1, 31, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_09_115542_create_catagories_table', 1),
(5, '2020_11_16_165501_create_tags_table', 1),
(6, '2020_11_17_143217_create_posts_table', 1),
(7, '2020_11_23_144725_create_catagory_post_table', 1),
(8, '2020_11_24_203748_create_post_tag_table', 1),
(9, '2020_12_31_082408_create_products_table', 1),
(10, '2020_12_31_123541_create_departments_table', 1),
(11, '2020_12_31_125532_create__department__product_table', 1),
(12, '2021_01_01_191520_create_keys_table', 1),
(13, '2021_01_01_191928_create__key__product_table', 1),
(14, '2021_01_10_082314_create_settings_table', 2),
(15, '2021_01_10_201932_create_sliders_table', 3),
(16, '2021_01_11_173357_create_home_pages_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `contain` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `user_id`, `photo`, `status`, `contain`, `created_at`, `updated_at`) VALUES
(19, 'vue js crush course', 'vue-js-crush-course', '1', '30ba5c97ba514a3b6fade137e4e94a16.jpg', 1, '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in dadadt esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>', '2021-01-04 07:56:13', '2021-01-05 07:28:00'),
(21, 'Now Bangladesh Up growing country', 'now-bangladesh-up-growing-country', '1', '4eeba66948903bf88cc0ea12dd39239d.jpg', 1, '<h3>Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>', '2021-01-04 08:01:14', '2021-01-04 15:19:23'),
(22, 'Class start again', 'class-start-again', '1', '2c49ab78bdca18fcca675e1f67620f35.jpg', 1, '<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>', '2021-01-04 08:04:55', '2021-01-04 11:29:37'),
(24, 'Natural food good for health', 'natural-food-good-for-health', '1', '04edbe66615cee01c02ef7d9be10afba.jpg', 1, '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '2021-01-04 11:28:56', '2021-01-04 11:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(3, 3, 1, NULL, NULL),
(4, 3, 2, NULL, NULL),
(6, 5, 2, NULL, NULL),
(7, 6, 2, NULL, NULL),
(10, 8, 2, NULL, NULL),
(11, 9, 2, NULL, NULL),
(15, 4, 2, NULL, NULL),
(22, 10, 1, NULL, NULL),
(23, 10, 2, NULL, NULL),
(30, 7, 2, NULL, NULL),
(31, 2, 2, NULL, NULL),
(32, 1, 1, NULL, NULL),
(33, 11, 2, NULL, NULL),
(34, 12, 1, NULL, NULL),
(35, 13, 1, NULL, NULL),
(36, 14, 2, NULL, NULL),
(37, 15, 2, NULL, NULL),
(38, 16, 2, NULL, NULL),
(39, 17, 1, NULL, NULL),
(40, 17, 2, NULL, NULL),
(41, 18, 1, NULL, NULL),
(44, 21, 6, NULL, NULL),
(49, 20, 4, NULL, NULL),
(50, 23, 3, NULL, NULL),
(53, 24, 4, NULL, NULL),
(54, 22, 3, NULL, NULL),
(55, 19, 3, NULL, NULL),
(56, 19, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `s_price` int(10) UNSIGNED DEFAULT NULL,
  `sort_dic` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `log_dic` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `photo`, `auth`, `price`, `s_price`, `sort_dic`, `log_dic`, `created_at`, `updated_at`) VALUES
(13, 'ACI Savlon Baby Wipes (AntiBacterial)', 'ACI-Savlon-Baby-Wipes-(AntiBacterial)', 'f362678f6256438cf608f397203af13c.webp', NULL, 400, 300, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cite', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the citeContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cite', '2021-01-04 12:22:45', '2021-01-04 12:22:45'),
(15, 'Pampers Baby Dry 1 Jumbo Plus Belt Newborn 2-5 kg', 'pampers-baby-dry-1-jumbo-plus-belt-newborn-2-5-kg', '474d0d753558cacdb525a17d0b7af0e3.webp', NULL, 800, 700, 'Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin', 'Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a LatinWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a LatinWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a LatinWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin', '2021-01-04 12:29:22', '2021-01-04 12:29:22'),
(16, 'Red Tomato (Net Weight ± 10 gm)', 'red-tomato-net-weight-±-10-gm', '9f1a955446fa614e2b64972a8e03bad1.webp', NULL, 50, 45, 'The tomato is consumed in diverse ways, including raw, as an ingredient in many dishes, sauces, salads, and drinks. While it is botanically a fruit, it is considered a vegetable for culinary purposes. The fruit is rich in lycopene, which may have beneficial health effects.', 'The tomato is consumed in diverse ways, including raw, as an ingredient in many dishes, sauces, salads, and drinks. While it is botanically a fruit, it is considered a vegetable for culinary purposes. The fruit is rich in lycopene, which may have beneficial health effects.The tomato is consumed in diverse ways, including raw, as an ingredient in many dishes, sauces, salads, and drinks. While it is botanically a fruit, it is considered a vegetable for culinary purposes. The fruit is rich in lycopene, which may have beneficial health effects.', '2021-01-04 12:31:13', '2021-01-04 12:31:13'),
(17, 'Broccoli (Regular)', 'broccoli-regular', 'fe7c145239746f6de43bc26fdc059994.webp', NULL, 50, 40, '\"When it comes to great-tasting nutrition, broccoli is an all-star food with many health benefits. While low in calories, broccoli is rich in essential vitamins and minerals, in addition to fiber.\r\n\r\nBroccoli belongs to a family of vegetables called cruciferous', '\"When it comes to great-tasting nutrition, broccoli is an all-star food with many health benefits. While low in calories, broccoli is rich in essential vitamins and minerals, in addition to fiber.\r\n\r\nBroccoli belongs to a family of vegetables called cruciferous\"When it comes to great-tasting nutrition, broccoli is an all-star food with many health benefits. While low in calories, broccoli is rich in essential vitamins and minerals, in addition to fiber.\r\n\r\nBroccoli belongs to a family of vegetables called cruciferous\"When it comes to great-tasting nutrition, broccoli is an all-star food with many health benefits. While low in calories, broccoli is rich in essential vitamins and minerals, in addition to fiber.\r\n\r\nBroccoli belongs to a family of vegetables called cruciferous', '2021-01-04 12:34:17', '2021-01-04 12:34:17'),
(18, 'Forged Steel Range (300mmX12\") (China)', 'forged-steel-range-300mmx12-china', 'fe2c6a2f8ee419ecc11fb2f6445c465c.webp', NULL, 250, 200, 'Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin', 'Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a LatinWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin', '2021-01-04 12:36:03', '2021-01-04 12:36:03'),
(19, 'MRF Tyre 512 Dm', 'mrf-tyre-512-dm', 'abc2dbae9c7b21648da66929d2246718.webp', NULL, 6000, 5400, 'Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin', 'Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a LatinWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a LatinWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin', '2021-01-04 12:37:18', '2021-01-04 12:37:18'),
(20, 'Biomil 4 Follow-Up Milk Formula Powder Tin (2-3 Years)', 'biomil-4-follow-up-milk-formula-powder-tin-2-3-years', '38f0c230be55309fc1f52c21eb5e33d7.webp', NULL, 300, 250, 'Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin', 'Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a LatinWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a LatinWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin', '2021-01-04 12:39:13', '2021-01-04 12:39:13'),
(22, 'Cow & Gate Growing Up Milk 4 (From 2-3 Years)', 'cow-and-gate-growing-up-milk-4-from-2-3-years', '80855317bac9a88e58f8b797ea9c71ad.webp', NULL, 450, 350, 'Chaldal.com is an online shop in Dhaka, Bangladesh. We believe time is valuable to our fellow Dhaka residents, and that they should not have to waste hours in traffic, brave bad weather and wait in line just to buy basic necessities like eggs! This is why Chaldal delivers everything you need right at your door-step and at no additional cost.Chaldal.com is an online shop in Dhaka, Bangladesh. We believe time is valuable to our fellow Dhaka residents, and that they should not have to waste hours in traffic, brave bad weather and wait in line just to buy basic necessities like eggs! This is why Chaldal delivers everything you need right at your door-step and at no additional cost.', 'Chaldal.com is an online shop in Dhaka, Bangladesh. We believe time is valuable to our fellow Dhaka residents, and that they should not have to waste hours in traffic, brave bad weather and wait in line just to buy basic necessities like eggs! This is why Chaldal delivers everything you need right at your door-step and at no additional cost.Chaldal.com is an online shop in Dhaka, Bangladesh. We believe time is valuable to our fellow Dhaka residents, and that they should not have to waste hours in traffic, brave bad weather and wait in line just to buy basic necessities like eggs! This is why Chaldal delivers everything you need right at your door-step and at no additional cost.Chaldal.com is an online shop in Dhaka, Bangladesh. We believe time is valuable to our fellow Dhaka residents, and that they should not have to waste hours in traffic, brave bad weather and wait in line just to buy basic necessities like eggs! This is why Chaldal delivers everything you need right at your door-step and at no additional cost.Chaldal.com is an online shop in Dhaka, Bangladesh. We believe time is valuable to our fellow Dhaka residents, and that they should not have to waste hours in traffic, brave bad weather and wait in line just to buy basic necessities like eggs! This is why Chaldal delivers everything you need right at your door-step and at no additional cost.', '2021-01-04 12:41:46', '2021-01-04 12:41:46'),
(23, 'Cabbage', 'Cabbage', '5b074b6644d1e09546be2ecda79c7c40.webp', NULL, 50, 30, 'Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a LatinWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin', 'Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a LatinWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a LatinWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin', '2021-01-04 12:43:02', '2021-01-04 12:43:02'),
(24, 'Amul Kool Kesar Pet Bottle', 'amul-kool-kesar-pet-bottle', '03150ec3167e1ecc0cc51175a7c0130c.webp', NULL, 85, NULL, 'Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin', 'Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin', '2021-01-04 12:44:37', '2021-01-04 12:44:37'),
(26, 'Coke Light Can', 'coke-light-can', '69aa56401f29a6bab83a6290fdc25c5d.webp', NULL, 40, NULL, 'Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin', 'Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a LatinWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin', '2021-01-04 13:20:55', '2021-01-04 13:20:55'),
(27, 'Amul Lassi', 'amul-lassi', '7ff737f11d0225d9e2595e004fbd795c.webp', NULL, 100, NULL, 'Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin', 'Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a LatinWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin', '2021-01-04 13:25:11', '2021-01-04 13:25:11'),
(30, 'test', 'test', 'd469bbe09d8a7bc740ecd2ffa7b598f2.JPG', '1', 60, 50, 'dadada', 'dadadada', '2021-01-05 06:09:22', '2021-01-05 06:09:22'),
(31, 'test', 'test', '3141de31352dbeff9222e7531534a8cd.JPG', '1', 50, 40, 'dadadadadada', 'dadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadada', '2021-01-05 07:33:20', '2021-01-05 07:33:20');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo.png',
  `stkie_logo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'stkie__logo.png',
  `logo_width` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '100px',
  `stike_logo_width` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '100px',
  `fav_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `crt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2021 @ shohan',
  `social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clients` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feed_back` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo_name`, `stkie_logo_name`, `logo_width`, `stike_logo_width`, `fav_icon`, `crt`, `social`, `clients`, `feed_back`, `created_at`, `updated_at`) VALUES
(1, 'f6798b99eb12570eb964d0943d4349e1.png', 'dcf393f67ae004387869626992f23b1c.png', '100px', '100px', NULL, '2021 @ shohan', '{\"fb\":\"facevook.com\\/shohan\",\"tw\":\"facevook.com\\/shohan\",\"lnk\":\"facevook.com\\/jamak\",\"ins\":\"facevook.com\\/shohan\",\"web\":\"facevook.com\\/shohan\"}', NULL, NULL, NULL, '2021-01-12 07:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `json_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`json_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `json_data`, `created_at`, `updated_at`) VALUES
(13, '{\"name\":\"sarwar jahan shohan\",\"type\":\"image\",\"vedio_url\":null,\"sliders\":[{\"title\":\"Hello world\",\"sub\":\"Hello worldHello world\",\"Rendid\":\"1st\",\"btna1_name\":\"Read More\",\"btn1_url\":\"#\",\"btna2_name\":\"Contact us\",\"btn2_url\":\"0\",\"photo\":\"ef164c06544997d4eb12a94a836d2fe4.jpg\"}]}', '2021-01-14 07:25:06', '2021-01-17 09:32:31'),
(14, '{\"name\":\"sarwar jahan shohan\",\"type\":\"image\",\"vedio_url\":null,\"sliders\":[{\"title\":\"change\",\"sub\":\"sasas\",\"Rendid\":\"1st\",\"btna1_name\":\"Read More\",\"btn1_url\":\"#\",\"btna2_name\":\"Contact us\",\"btn2_url\":\"0\",\"photo\":\"a9225500e4de02a3ed1733a212d4e151.jpg\"},{\"title\":\"new new\",\"sub\":\"new change\",\"Rendid\":\"2603\",\"btna1_name\":\"Read More\",\"btn1_url\":\"#\",\"btna2_name\":\"Contact us\",\"btn2_url\":\"0\",\"photo\":\"d220ae2932862dd658a91e56c13c411b.jpg\"},{\"title\":\"add extra valu\",\"sub\":\"dada\",\"Rendid\":\"8707\",\"btna1_name\":\"dad\",\"btn1_url\":\"dad\",\"btna2_name\":\"dad\",\"btn2_url\":\"1\",\"photo\":\"14ab121a6629279db49acd96a3fbbd24.jpg\"}]}', '2021-01-15 06:42:11', '2021-01-17 08:54:06'),
(15, '{\"name\":null,\"type\":\"image\",\"vedio_url\":null,\"sliders\":[{\"title\":\"xaa\",\"sub\":\"xaxa\",\"Rendid\":\"1st\",\"btna1_name\":\"xaxa\",\"btn1_url\":\"xaxa\",\"btna2_name\":\"xaxa\",\"btn2_url\":\"xaaxx\",\"photo\":\"db16f1723e8e89319bac75e7d4987bda.jpg\"}]}', '2021-01-17 08:55:16', '2021-01-17 08:55:16'),
(16, '{\"name\":null,\"type\":\"image\",\"vedio_url\":null,\"sliders\":[{\"title\":\"fsfsf\",\"sub\":\"sfsf\",\"Rendid\":\"1st\",\"btna1_name\":\"fsf\",\"btn1_url\":\"fsfs\",\"btna2_name\":\"fsf\",\"btn2_url\":\"fsfsf\",\"photo\":\"fabea4c718eec0e42bf4d314f36ec216.jpg\"}]}', '2021-01-17 09:00:57', '2021-01-17 09:00:57'),
(17, '{\"name\":\"This is vedio slider\",\"type\":\"vedio\",\"vedio_url\":\"https:\\/\\/youtu.be\\/WhWc3b3KhnY\",\"sliders\":[{\"title\":\"this is vedio slider\",\"sub\":\"this is vedio sliderthis is vedio slider\",\"Rendid\":\"1st\",\"btna1_name\":\"Read More\",\"btn1_url\":\"#\",\"btna2_name\":\"Contact us\",\"btn2_url\":\"www.facebook.com\\/sarwar.shohan\"},{\"title\":\"The car Run Fast\",\"sub\":\"The car Run FastThe car Run Fast\",\"Rendid\":\"5654\",\"btna1_name\":\"Read More\",\"btn1_url\":\"#\",\"btna2_name\":\"Contact us\",\"btn2_url\":\"www.facebook.com\\/sarwar.shohan\"}]}', '2021-01-18 06:55:54', '2021-01-18 06:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(3, 'tech', 'tech', 'active', '2021-01-04 07:55:10', '2021-01-04 07:55:10'),
(4, 'food', 'food', 'active', '2021-01-04 07:55:15', '2021-01-04 07:55:15'),
(5, 'class', 'class', 'active', '2021-01-04 07:55:19', '2021-01-04 07:55:19'),
(6, 'bd', 'bd', 'active', '2021-01-04 07:55:23', '2021-01-04 07:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `roll`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '1', 'admin@gmail.com', NULL, '21232f297a57a5a743894a0e4a801fc3', NULL, '2021-01-02 11:54:02', '2021-01-02 11:54:02'),
(2, 'shohan', '1', 'demo@gmail.com', NULL, '$2y$10$/kTCFu.uM0tbkaVXKTv5Bet4RARyon1608Ow/7DeI5Tg4nRL7.Tdm', NULL, '2021-01-09 11:24:03', '2021-01-09 11:24:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagory_post`
--
ALTER TABLE `catagory_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_product`
--
ALTER TABLE `department_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `home_pages`
--
ALTER TABLE `home_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `key_product`
--
ALTER TABLE `key_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `catagory_post`
--
ALTER TABLE `catagory_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department_product`
--
ALTER TABLE `department_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_pages`
--
ALTER TABLE `home_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `key_product`
--
ALTER TABLE `key_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
