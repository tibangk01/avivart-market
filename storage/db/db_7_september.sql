-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 07 sep. 2021 à 11:28
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `aaammm`
--

-- --------------------------------------------------------

--
-- Structure de la table `agencies`
--

CREATE TABLE `agencies` (
  `id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `society_id` int(11) NOT NULL,
  `enterprise_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `agencies`
--

INSERT INTO `agencies` (`id`, `region_id`, `society_id`, `enterprise_id`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 2, '2021-08-31 18:03:22', '2021-08-31 18:03:27'),
(2, 5, 1, 3, '2021-08-26 15:10:16', '2021-08-27 17:43:24'),
(4, 5, 1, 8, '2021-08-27 01:38:14', '2021-08-27 15:22:18');

-- --------------------------------------------------------

--
-- Structure de la table `agency_staff`
--

CREATE TABLE `agency_staff` (
  `id` int(11) NOT NULL,
  `agency_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `agency_staff`
--

INSERT INTO `agency_staff` (`id`, `agency_id`, `staff_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-08-25 12:35:13', '2021-08-25 12:35:13');

-- --------------------------------------------------------

--
-- Structure de la table `civilities`
--

CREATE TABLE `civilities` (
  `id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `civilities`
--

INSERT INTO `civilities` (`id`, `gender_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Monsieur', NULL, NULL),
(2, 2, 'Madame', NULL, NULL),
(3, 2, 'Madamoiselle', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `conversions`
--

CREATE TABLE `conversions` (
  `id` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `conversions`
--

INSERT INTO `conversions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Unité', '2021-08-31 11:34:11', '2021-08-31 11:34:11'),
(2, 'Kilograme', '2021-08-31 11:34:11', '2021-08-31 11:34:11');

-- --------------------------------------------------------

--
-- Structure de la table `corporations`
--

CREATE TABLE `corporations` (
  `id` int(11) NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `tppcr` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Trade and Personal Property Credit Registry',
  `fiscal_code` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'nif',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `corporations`
--

INSERT INTO `corporations` (`id`, `entreprise_id`, `tppcr`, `fiscal_code`, `created_at`, `updated_at`) VALUES
(1, 9, 'Consequuntur quasi r', 'Possimus enim occae', '2021-09-01 14:35:33', '2021-09-01 14:35:33'),
(2, 10, 'Laudantium deserunt', 'Sint voluptatem ull', '2021-09-01 17:53:54', '2021-09-01 17:53:54');

-- --------------------------------------------------------

--
-- Structure de la table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'FCFA', '2021-08-31 11:33:54', '2021-08-31 11:33:54'),
(2, 'XOF', '2021-08-31 11:33:54', '2021-08-31 11:33:54'),
(3, 'EURO', '2021-08-31 11:33:54', '2021-08-31 11:33:54'),
(4, 'DOLLAR', '2021-08-31 11:33:54', '2021-08-31 11:33:54');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `person_type_id` int(11) NOT NULL,
  `person_ray_id` int(11) NOT NULL,
  `people_id` int(11) DEFAULT NULL,
  `corporation_id` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `person_type_id`, `person_ray_id`, `people_id`, `corporation_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 2, NULL, NULL, '2021-08-31 12:24:23', '2021-08-31 12:24:23'),
(2, 1, 2, NULL, 2, NULL, '2021-09-01 17:55:54', '2021-09-01 17:55:54');

-- --------------------------------------------------------

--
-- Structure de la table `developers`
--

CREATE TABLE `developers` (
  `id` int(11) NOT NULL,
  `human_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `developers`
--

INSERT INTO `developers` (`id`, `human_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-08-31 17:48:10', '2021-08-31 17:48:15');

-- --------------------------------------------------------

--
-- Structure de la table `discounts`
--

CREATE TABLE `discounts` (
  `id` int(11) NOT NULL,
  `amount` float NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `discounts`
--

INSERT INTO `discounts` (`id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 0, '2021-08-31 11:40:48', '2021-08-31 11:40:48'),
(2, 1000, '2021-08-31 11:40:48', '2021-08-31 11:40:48');

-- --------------------------------------------------------

--
-- Structure de la table `enterprises`
--

CREATE TABLE `enterprises` (
  `id` int(11) NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_corporation` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `enterprises`
--

INSERT INTO `enterprises` (`id`, `code`, `name`, `phone_number`, `website`, `email`, `address`, `is_corporation`, `created_at`, `updated_at`) VALUES
(1, '01000', 'AVIVART', '90909090', 'www.avivart.net', '', 'Cap Kégué', 0, '2021-08-22 18:12:29', '2021-08-27 20:37:49'),
(2, '01001', 'Agence 1', '787878789', NULL, '', 'Cap Kégué', 0, '2021-08-23 15:07:37', '2021-08-28 13:03:39'),
(3, '01002', 'Agence 2', '90909090', NULL, '', 'Rond Point Port', 0, '2021-08-26 15:07:37', '2021-08-26 15:07:37'),
(8, '01003', 'Agence 3', '89899228', NULL, '', 'Adéwui', 0, '2021-08-27 01:38:14', '2021-08-27 15:30:08'),
(9, '87878', 'Corporation 1', '89899228', NULL, 'test@test.xyz', 'Adéwui', 1, '2021-08-27 01:38:14', '2021-08-27 15:30:08'),
(10, '87Y56', 'Corporation 2', '89899229', NULL, 'fad@fad.cds', 'Adéwui', 1, '2021-08-27 01:38:14', '2021-08-27 15:30:08');

-- --------------------------------------------------------

--
-- Structure de la table `exercices`
--

CREATE TABLE `exercices` (
  `id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `exercices`
--

INSERT INTO `exercices` (`id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, '2021-08-24', '2022-08-31', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `genders`
--

CREATE TABLE `genders` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `genders`
--

INSERT INTO `genders` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Masculin', NULL, NULL),
(2, 'Féminin', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `humans`
--

CREATE TABLE `humans` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `work_id` int(11) NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `humans`
--

INSERT INTO `humans` (`id`, `user_id`, `work_id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Developer', '$2y$10$Uquulal5J6XXKNC4ABIUtuLoz1lqYI4JJExAc7xQznLK6gRG5AiYe', '2021-08-30 17:52:00', '2021-08-30 17:52:00'),
(2, 2, 1, 'Secretaire', '$2y$10$Uquulal5J6XXKNC4ABIUtuLoz1lqYI4JJExAc7xQznLK6gRG5AiYe', '2021-08-30 17:52:00', '2021-08-30 17:52:00'),
(3, 3, 1, 'Gérant', '$2y$10$Uquulal5J6XXKNC4ABIUtuLoz1lqYI4JJExAc7xQznLK6gRG5AiYe', '2021-08-30 17:52:00', '2021-08-30 17:52:00'),
(4, 4, 1, 'Caissier', '$2y$10$Uquulal5J6XXKNC4ABIUtuLoz1lqYI4JJExAc7xQznLK6gRG5AiYe', '2021-08-30 17:52:00', '2021-08-30 17:52:00'),
(5, 5, 1, 'Employé', '$2y$10$Uquulal5J6XXKNC4ABIUtuLoz1lqYI4JJExAc7xQznLK6gRG5AiYe', '2021-08-30 17:52:00', '2021-08-30 17:52:00'),
(7, 6, 1, 'Director', '$2y$10$Uquulal5J6XXKNC4ABIUtuLoz1lqYI4JJExAc7xQznLK6gRG5AiYe', '2021-08-30 17:52:00', '2021-08-30 17:52:00');

-- --------------------------------------------------------

--
-- Structure de la table `libraries`
--

CREATE TABLE `libraries` (
  `id` int(11) NOT NULL,
  `library_type_id` int(11) NOT NULL,
  `folder` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `local` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remote` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `libraries`
--

INSERT INTO `libraries` (`id`, `library_type_id`, `folder`, `local`, `remote`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'developers', 'profile.png', 'http://127.0.0.1:8000/images/products/default.png', NULL, '2021-08-25 10:36:34', '2021-08-25 10:36:34'),
(2, 1, 'directors', 'profile.png', 'http://127.0.0.1:8000/images/products/default.png', NULL, '2021-08-25 10:36:34', '2021-08-25 10:36:34'),
(3, 1, 'staffs', 'profile.png', 'http://127.0.0.1:8000/images/products/default.png', NULL, '2021-08-25 10:36:34', '2021-08-25 10:36:34'),
(4, 1, 'staffs', 'profile.png', 'http://127.0.0.1:8000/images/products/default.png', NULL, '2021-08-25 10:36:34', '2021-08-25 10:36:34'),
(5, 1, 'staffs', 'profile.png', 'http://127.0.0.1:8000/images/products/default.png', NULL, '2021-08-25 12:56:11', '2021-08-25 12:56:11'),
(6, 1, 'providers', 'photo.png', 'http://127.0.0.1:8000/images/products/default.png', NULL, '2021-08-25 12:56:11', '2021-08-25 12:56:11'),
(7, 1, 'customers', 'photo.png', 'http://127.0.0.1:8000/images/products/default.png', NULL, '2021-08-25 12:56:11', '2021-08-25 12:56:11'),
(8, 1, 'products', '1630519332.jpg', 'http://localhost/avivartm/public/libraries/images/products/1630519332.jpg', 'Qui culpa dicta debi', '2021-08-25 12:56:11', '2021-09-01 18:02:12'),
(11, 1, 'products', '1630499878.jpg', 'http://localhost/avivartm/public/libraries/images/products/1630499878.jpg', 'Qui culpa dicta debi', '2021-08-31 18:04:20', '2021-09-01 12:37:58'),
(12, 1, 'products', '1630519354.jpg', 'http://localhost/avivartm/public/libraries/images/products/1630519354.jpg', 'Sit veniam rerum e', '2021-08-31 20:56:28', '2021-09-01 18:02:34'),
(13, 1, 'products', 'default.png', 'http://localhost/avivartm/public/libraries//public/libraries/default.png', NULL, '2021-09-01 13:15:46', '2021-09-01 13:15:46'),
(14, 1, 'products', 'default.png', 'http://localhost/avivartm/public/libraries/images/products/default.png', NULL, '2021-09-01 13:19:23', '2021-09-01 13:19:23'),
(15, 1, 'products', 'default.png', 'http://localhost/avivartm/public/libraries/images/products/default.png', NULL, '2021-09-01 13:23:28', '2021-09-01 13:23:28');

-- --------------------------------------------------------

--
-- Structure de la table `library_types`
--

CREATE TABLE `library_types` (
  `id` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `library_types`
--

INSERT INTO `library_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Images', '2021-08-25 10:31:09', '2021-08-25 10:31:09'),
(2, 'Videos', '2021-08-25 10:31:09', '2021-08-25 10:31:09'),
(3, 'Documents', '2021-08-25 10:31:09', '2021-08-25 10:31:09'),
(4, 'Audios', '2021-09-01 12:08:22', '2021-09-01 12:08:22');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2021_08_24_132436_create_agencies_table', 1),
(3, '2021_08_24_132436_create_civilities_table', 1),
(4, '2021_08_24_132436_create_customers_table', 1),
(5, '2021_08_24_132436_create_developers_table', 1),
(6, '2021_08_24_132436_create_directors_table', 1),
(7, '2021_08_24_132436_create_employees_table', 1),
(8, '2021_08_24_132436_create_enterprises_table', 1),
(9, '2021_08_24_132436_create_exercices_table', 1),
(10, '2021_08_24_132436_create_genders_table', 1),
(11, '2021_08_24_132436_create_humans_table', 1),
(12, '2021_08_24_132436_create_owners_table', 1),
(13, '2021_08_24_132436_create_people_table', 1),
(14, '2021_08_24_132436_create_providers_table', 1),
(15, '2021_08_24_132436_create_seller_places_table', 1),
(16, '2021_08_24_132436_create_societies_table', 1),
(17, '2021_08_24_132436_create_user_types_table', 1),
(18, '2021_08_24_132436_create_users_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `vat_id` int(11) NOT NULL,
  `discount_id` int(11) NOT NULL,
  `order_state_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `vat_id`, `discount_id`, `order_state_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, '2021-08-31 12:24:42', '2021-08-31 12:24:42');

-- --------------------------------------------------------

--
-- Structure de la table `order_states`
--

CREATE TABLE `order_states` (
  `id` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `order_states`
--

INSERT INTO `order_states` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'En entente', '2021-08-31 12:43:52', '2021-08-31 12:43:52'),
(2, 'En cours de livraison', '2021-08-31 12:43:52', '2021-08-31 12:43:52'),
(3, 'Livrée', '2021-08-31 12:44:19', '2021-08-31 12:44:19'),
(4, 'Annulée', '2021-08-31 12:44:19', '2021-08-31 12:44:19');

-- --------------------------------------------------------

--
-- Structure de la table `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `people`
--

INSERT INTO `people` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 7, '2021-08-31 11:44:23', '2021-08-31 11:44:23'),
(2, 8, '2021-08-31 12:24:08', '2021-08-31 12:24:08');

-- --------------------------------------------------------

--
-- Structure de la table `person_rays`
--

CREATE TABLE `person_rays` (
  `id` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `person_rays`
--

INSERT INTO `person_rays` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Fidel(e)', '2021-08-24 17:27:03', '2021-08-24 17:27:03'),
(2, 'Potentiel', '2021-08-24 17:27:03', '2021-08-24 17:27:03');

-- --------------------------------------------------------

--
-- Structure de la table `person_types`
--

CREATE TABLE `person_types` (
  `id` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `person_types`
--

INSERT INTO `person_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Entreprise', '2021-08-24 17:27:03', '2021-08-24 17:27:03'),
(2, 'Particulier', '2021-08-24 17:27:03', '2021-08-24 17:27:03');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `library_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `conversion_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `stock_quantity` int(11) NOT NULL DEFAULT 0,
  `sold_quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `library_id`, `product_category_id`, `conversion_id`, `currency_id`, `name`, `price`, `stock_quantity`, `sold_quantity`, `created_at`, `updated_at`) VALUES
(1, 8, 2, 2, 1, 'Tomate Aicha', 150, 16, 2, '2021-08-31 11:31:28', '2021-08-31 17:19:25'),
(2, 8, 1, 1, 1, 'Maïs', 200, 12, 2, '2021-08-31 17:45:56', '2021-08-31 21:03:37'),
(4, 11, 1, 2, 1, 'Taylor Nunez', 609, 857, 792, '2021-08-31 18:04:20', '2021-08-31 18:04:20'),
(5, 12, 1, 2, 3, 'Inga Richards', 914, 428, 253, '2021-08-31 20:56:28', '2021-08-31 20:56:28'),
(6, 13, 1, 2, 2, 'Bell Fields', 564, 42, 8, '2021-09-01 13:15:46', '2021-09-01 13:15:46'),
(7, 14, 2, 1, 3, 'Felicia Mcfadden', 469, 97, 6, '2021-09-01 13:19:23', '2021-09-01 13:19:23'),
(8, 15, 2, 1, 3, 'Hermione Rhodes', 496, 363, 81, '2021-09-01 13:23:28', '2021-09-01 13:23:28');

-- --------------------------------------------------------

--
-- Structure de la table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_ray_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `product_ray_id`, `created_at`, `updated_at`) VALUES
(1, 'Céréales', 1, '2021-08-31 11:25:32', '2021-08-31 11:25:32'),
(2, 'Poissons', 1, '2021-08-31 11:25:32', '2021-08-31 11:25:32');

-- --------------------------------------------------------

--
-- Structure de la table `product_order`
--

CREATE TABLE `product_order` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `proforma_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product_proforma`
--

CREATE TABLE `product_proforma` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `proforma_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product_proforma`
--

INSERT INTO `product_proforma` (`id`, `product_id`, `proforma_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 8, '2021-08-31 12:27:11', '2021-08-31 12:27:11');

-- --------------------------------------------------------

--
-- Structure de la table `product_purchase`
--

CREATE TABLE `product_purchase` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `ordered_quantity` int(11) NOT NULL DEFAULT 0,
  `delivered_quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product_purchase`
--

INSERT INTO `product_purchase` (`id`, `product_id`, `purchase_id`, `ordered_quantity`, `delivered_quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 20, 16, '2021-08-31 11:52:21', '2021-08-31 11:52:21');

-- --------------------------------------------------------

--
-- Structure de la table `product_rays`
--

CREATE TABLE `product_rays` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product_rays`
--

INSERT INTO `product_rays` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Aliments Bio', '2021-08-31 11:23:40', '2021-08-31 11:23:40'),
(2, 'Aliments Manufacturés', '2021-08-31 11:23:40', '2021-08-31 11:23:40');

-- --------------------------------------------------------

--
-- Structure de la table `proformas`
--

CREATE TABLE `proformas` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `vat_id` int(11) NOT NULL,
  `discount_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `proformas`
--

INSERT INTO `proformas` (`id`, `customer_id`, `vat_id`, `discount_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2021-08-31 12:39:35', '2021-08-31 12:39:35');

-- --------------------------------------------------------

--
-- Structure de la table `providers`
--

CREATE TABLE `providers` (
  `id` int(11) NOT NULL,
  `person_type_id` int(11) NOT NULL,
  `person_ray_id` int(11) NOT NULL,
  `people_id` int(11) DEFAULT NULL,
  `corporation_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `providers`
--

INSERT INTO `providers` (`id`, `person_type_id`, `person_ray_id`, `people_id`, `corporation_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, 1, '2021-08-31 11:44:34', '2021-08-31 11:44:34');

-- --------------------------------------------------------

--
-- Structure de la table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `vat_id` int(11) NOT NULL,
  `discount_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `purchases`
--

INSERT INTO `purchases` (`id`, `provider_id`, `vat_id`, `discount_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2021-08-31 11:45:44', '2021-08-31 11:45:44');

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Savanes', '01', '2021-08-24 18:13:08', '2021-08-24 18:13:08'),
(2, 'Kara', '02', '2021-08-24 18:13:08', '2021-08-24 18:13:08'),
(3, 'Centrale', '03', '2021-08-24 18:13:08', '2021-08-24 18:13:08'),
(4, 'Plateaux', '04', '2021-08-24 18:13:08', '2021-08-24 18:13:08'),
(5, 'Maritime', '05', '2021-08-24 18:13:08', '2021-08-24 18:13:08');

-- --------------------------------------------------------

--
-- Structure de la table `sale_places`
--

CREATE TABLE `sale_places` (
  `id` int(11) NOT NULL,
  `agency_id` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sale_places`
--

INSERT INTO `sale_places` (`id`, `agency_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Carefour Bleu', '2021-08-27 15:43:59', '2021-08-28 13:08:02'),
(2, 2, 'AVz', '2021-08-27 16:55:21', '2021-08-27 16:55:21'),
(3, 2, 'fabien', '2021-08-27 16:56:50', '2021-08-27 16:56:50');

-- --------------------------------------------------------

--
-- Structure de la table `sale_place_staff`
--

CREATE TABLE `sale_place_staff` (
  `id` int(11) NOT NULL,
  `sale_place_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sale_place_staff`
--

INSERT INTO `sale_place_staff` (`id`, `sale_place_id`, `staff_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2021-08-25 12:37:56', '2021-08-25 12:37:56');

-- --------------------------------------------------------

--
-- Structure de la table `societies`
--

CREATE TABLE `societies` (
  `id` int(11) NOT NULL,
  `enterprise_id` int(11) NOT NULL,
  `tppcr` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Trade and Personal Property Credit Registry',
  `fiscal_code` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'nif',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `societies`
--

INSERT INTO `societies` (`id`, `enterprise_id`, `tppcr`, `fiscal_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'lorems', 'Ipsums', NULL, '2021-08-28 12:55:04');

-- --------------------------------------------------------

--
-- Structure de la table `society_staff`
--

CREATE TABLE `society_staff` (
  `id` int(11) NOT NULL,
  `society_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `society_staff`
--

INSERT INTO `society_staff` (`id`, `society_id`, `staff_id`, `created_at`, `updated_at`) VALUES
(2, 1, 2, '2021-08-26 12:01:16', '2021-08-26 12:01:16'),
(1, 1, 4, '2021-08-25 12:36:29', '2021-08-25 12:36:29');

-- --------------------------------------------------------

--
-- Structure de la table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `staff_type_id` int(11) NOT NULL,
  `human_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `staffs`
--

INSERT INTO `staffs` (`id`, `staff_type_id`, `human_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '2021-08-31 17:56:35', '2021-08-31 17:56:40'),
(2, 2, 5, '2021-08-31 17:56:43', '2021-08-31 17:56:47'),
(3, 3, 3, '2021-08-31 17:56:50', '2021-08-31 17:56:53'),
(4, 4, 7, '2021-08-26 12:00:41', '2021-08-26 12:00:41'),
(5, 5, 2, '2021-08-26 12:00:41', '2021-08-26 12:00:41');

-- --------------------------------------------------------

--
-- Structure de la table `staff_types`
--

CREATE TABLE `staff_types` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `staff_types`
--

INSERT INTO `staff_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Caissier', '2021-08-24 18:26:35', '2021-08-24 18:26:35'),
(2, 'Employé', '2021-08-25 10:53:18', '2021-08-25 10:53:18'),
(3, 'Gérant (e)', '2021-08-25 10:53:36', '2021-08-25 10:53:36'),
(4, 'Director', '2021-08-26 11:55:14', '2021-08-26 11:55:14'),
(5, 'Secrétaire', '2021-08-30 17:55:46', '2021-08-30 17:55:46');

-- --------------------------------------------------------

--
-- Structure de la table `supplies`
--

CREATE TABLE `supplies` (
  `id` int(11) NOT NULL,
  `product_purchase_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `supplies`
--

INSERT INTO `supplies` (`id`, `product_purchase_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '2021-08-31 12:13:02', '2021-08-31 12:13:02'),
(2, 1, 10, '2021-08-31 12:13:13', '2021-08-31 12:13:13');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `civility_id` int(11) NOT NULL,
  `library_id` int(11) NOT NULL,
  `first_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `user_type_id`, `civility_id`, `library_id`, `first_name`, `last_name`, `email`, `phone_number`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Fabien', 'Komlani', 'developer@developer.com', '111111111', NULL, NULL, '2021-08-31 11:42:45', '2021-08-31 11:42:45'),
(2, 2, 2, 4, 'Ama', 'Kwatcha', 'amakwatcha@avivart.net', '111111111', NULL, NULL, '2021-08-31 11:42:45', '2021-08-31 11:42:45'),
(3, 2, 1, 3, 'Gérant', 'Gérant', 'gerant@gerant.com', '33333333', NULL, NULL, '2021-08-31 11:42:45', '2021-08-31 11:42:45'),
(4, 2, 1, 1, 'Caissier', 'Caissier', 'caissier@caissier.com', '78767698', NULL, NULL, '2021-08-31 11:42:45', '2021-08-31 11:42:45'),
(5, 2, 2, 1, 'Employé', 'Employé', 'employe@employe.com', '10210200', NULL, NULL, '2021-08-31 11:42:45', '2021-08-31 11:42:45'),
(6, 2, 2, 2, 'Viva', 'Akué', 'vivaakue@avivart.com', '92726252', NULL, NULL, '2021-08-26 11:57:26', '2021-08-26 11:57:26'),
(7, 4, 2, 6, 'Provider', 'PROVIDER', NULL, NULL, NULL, NULL, '2021-08-26 11:57:26', '2021-08-26 11:57:26'),
(8, 3, 3, 7, 'Customer', 'CUSTOMER', 'examle@email.xyz', '67676768', NULL, NULL, '2021-08-26 11:57:26', '2021-08-26 11:57:26');

-- --------------------------------------------------------

--
-- Structure de la table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Developpeur', NULL, NULL),
(2, 'Staff', NULL, NULL),
(3, 'Client', NULL, NULL),
(4, 'Fournisseur', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `vats`
--

CREATE TABLE `vats` (
  `id` int(11) NOT NULL,
  `percentage` float NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vats`
--

INSERT INTO `vats` (`id`, `percentage`, `created_at`, `updated_at`) VALUES
(1, 0, '2021-08-31 11:39:48', '2021-08-31 11:39:48'),
(2, 0.18, '2021-08-31 11:39:48', '2021-08-31 11:39:48');

-- --------------------------------------------------------

--
-- Structure de la table `works`
--

CREATE TABLE `works` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `works`
--

INSERT INTO `works` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Aucun', '2021-08-31 11:15:42', '2021-08-31 11:15:42');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `society_id` (`society_id`),
  ADD KEY `enterprise_id` (`enterprise_id`),
  ADD KEY `region_id` (`region_id`);

--
-- Index pour la table `agency_staff`
--
ALTER TABLE `agency_staff`
  ADD PRIMARY KEY (`agency_id`,`staff_id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Index pour la table `civilities`
--
ALTER TABLE `civilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Index pour la table `conversions`
--
ALTER TABLE `conversions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `corporations`
--
ALTER TABLE `corporations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `societies_tppcr_unique` (`tppcr`),
  ADD UNIQUE KEY `societies_fiscal_code_unique` (`fiscal_code`),
  ADD KEY `entreprise_id` (`entreprise_id`);

--
-- Index pour la table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `people_id` (`people_id`),
  ADD KEY `person_type_id` (`person_type_id`),
  ADD KEY `person_ray_id` (`person_ray_id`),
  ADD KEY `customers_ibfk_4` (`corporation_id`);

--
-- Index pour la table `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `human_id` (`human_id`);

--
-- Index pour la table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `enterprises`
--
ALTER TABLE `enterprises`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `exercices`
--
ALTER TABLE `exercices`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `humans`
--
ALTER TABLE `humans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `humans_username_unique` (`username`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `work_id` (`work_id`);

--
-- Index pour la table `libraries`
--
ALTER TABLE `libraries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `library_type_id` (`library_type_id`);

--
-- Index pour la table `library_types`
--
ALTER TABLE `library_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `vat_id` (`vat_id`),
  ADD KEY `discount_id` (`discount_id`),
  ADD KEY `order_state_id` (`order_state_id`);

--
-- Index pour la table `order_states`
--
ALTER TABLE `order_states`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `person_rays`
--
ALTER TABLE `person_rays`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `person_types`
--
ALTER TABLE `person_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_id` (`product_category_id`),
  ADD KEY `conversion_id` (`conversion_id`),
  ADD KEY `currency_id` (`currency_id`),
  ADD KEY `library_id` (`library_id`);

--
-- Index pour la table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_ray_id` (`product_ray_id`);

--
-- Index pour la table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`product_id`,`proforma_id`),
  ADD UNIQUE KEY `id` (`id`) USING BTREE,
  ADD KEY `proforma_id` (`proforma_id`);

--
-- Index pour la table `product_proforma`
--
ALTER TABLE `product_proforma`
  ADD PRIMARY KEY (`product_id`,`proforma_id`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`) USING BTREE,
  ADD KEY `proforma_id` (`proforma_id`) USING BTREE;

--
-- Index pour la table `product_purchase`
--
ALTER TABLE `product_purchase`
  ADD PRIMARY KEY (`product_id`,`purchase_id`),
  ADD UNIQUE KEY `id` (`id`) USING BTREE,
  ADD KEY `purchase_id` (`purchase_id`);

--
-- Index pour la table `product_rays`
--
ALTER TABLE `product_rays`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `proformas`
--
ALTER TABLE `proformas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `vat_id` (`vat_id`),
  ADD KEY `discount_id` (`discount_id`);

--
-- Index pour la table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `people_id` (`people_id`),
  ADD KEY `corporation_id` (`corporation_id`),
  ADD KEY `person_type_id` (`person_type_id`),
  ADD KEY `person_ray_id` (`person_ray_id`);

--
-- Index pour la table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provider_id` (`provider_id`),
  ADD KEY `vat_id` (`vat_id`),
  ADD KEY `discount_id` (`discount_id`);

--
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `sale_places`
--
ALTER TABLE `sale_places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agency_id` (`agency_id`);

--
-- Index pour la table `sale_place_staff`
--
ALTER TABLE `sale_place_staff`
  ADD PRIMARY KEY (`sale_place_id`,`staff_id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Index pour la table `societies`
--
ALTER TABLE `societies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `societies_tppcr_unique` (`tppcr`),
  ADD UNIQUE KEY `societies_fiscal_code_unique` (`fiscal_code`),
  ADD KEY `enterprise_id` (`enterprise_id`);

--
-- Index pour la table `society_staff`
--
ALTER TABLE `society_staff`
  ADD PRIMARY KEY (`society_id`,`staff_id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Index pour la table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `human_id` (`human_id`),
  ADD KEY `staff_type_id` (`staff_type_id`);

--
-- Index pour la table `staff_types`
--
ALTER TABLE `staff_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplies_ibfk_1` (`product_purchase_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type_id` (`user_type_id`),
  ADD KEY `library_id` (`library_id`),
  ADD KEY `civility_id` (`civility_id`);

--
-- Index pour la table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vats`
--
ALTER TABLE `vats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `agency_staff`
--
ALTER TABLE `agency_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `civilities`
--
ALTER TABLE `civilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `conversions`
--
ALTER TABLE `conversions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `corporations`
--
ALTER TABLE `corporations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `developers`
--
ALTER TABLE `developers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `enterprises`
--
ALTER TABLE `enterprises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `exercices`
--
ALTER TABLE `exercices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `humans`
--
ALTER TABLE `humans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `libraries`
--
ALTER TABLE `libraries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `library_types`
--
ALTER TABLE `library_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `order_states`
--
ALTER TABLE `order_states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `person_rays`
--
ALTER TABLE `person_rays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `person_types`
--
ALTER TABLE `person_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `product_proforma`
--
ALTER TABLE `product_proforma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `product_purchase`
--
ALTER TABLE `product_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `product_rays`
--
ALTER TABLE `product_rays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `proformas`
--
ALTER TABLE `proformas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `sale_places`
--
ALTER TABLE `sale_places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `sale_place_staff`
--
ALTER TABLE `sale_place_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `societies`
--
ALTER TABLE `societies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `society_staff`
--
ALTER TABLE `society_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `staff_types`
--
ALTER TABLE `staff_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `vats`
--
ALTER TABLE `vats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `works`
--
ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `agencies`
--
ALTER TABLE `agencies`
  ADD CONSTRAINT `agencies_ibfk_1` FOREIGN KEY (`society_id`) REFERENCES `societies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agencies_ibfk_2` FOREIGN KEY (`enterprise_id`) REFERENCES `enterprises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agencies_ibfk_3` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `agency_staff`
--
ALTER TABLE `agency_staff`
  ADD CONSTRAINT `agency_staff_ibfk_1` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agency_staff_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `civilities`
--
ALTER TABLE `civilities`
  ADD CONSTRAINT `civilities_ibfk_1` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `corporations`
--
ALTER TABLE `corporations`
  ADD CONSTRAINT `corporations_ibfk_1` FOREIGN KEY (`entreprise_id`) REFERENCES `enterprises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_2` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customers_ibfk_4` FOREIGN KEY (`corporation_id`) REFERENCES `corporations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customers_ibfk_5` FOREIGN KEY (`person_type_id`) REFERENCES `person_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customers_ibfk_6` FOREIGN KEY (`person_ray_id`) REFERENCES `person_rays` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `developers`
--
ALTER TABLE `developers`
  ADD CONSTRAINT `developers_ibfk_1` FOREIGN KEY (`human_id`) REFERENCES `humans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `humans`
--
ALTER TABLE `humans`
  ADD CONSTRAINT `humans_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `humans_ibfk_2` FOREIGN KEY (`work_id`) REFERENCES `works` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `libraries`
--
ALTER TABLE `libraries`
  ADD CONSTRAINT `libraries_ibfk_1` FOREIGN KEY (`library_type_id`) REFERENCES `library_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`vat_id`) REFERENCES `vats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`order_state_id`) REFERENCES `order_states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `people_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`conversion_id`) REFERENCES `conversions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`library_id`) REFERENCES `libraries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_ibfk_1` FOREIGN KEY (`product_ray_id`) REFERENCES `product_rays` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product_order_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_order_ibfk_2` FOREIGN KEY (`proforma_id`) REFERENCES `proformas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `product_proforma`
--
ALTER TABLE `product_proforma`
  ADD CONSTRAINT `product_proforma_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_proforma_ibfk_2` FOREIGN KEY (`proforma_id`) REFERENCES `proformas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `product_purchase`
--
ALTER TABLE `product_purchase`
  ADD CONSTRAINT `product_purchase_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_purchase_ibfk_2` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `proformas`
--
ALTER TABLE `proformas`
  ADD CONSTRAINT `proformas_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proformas_ibfk_2` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proformas_ibfk_3` FOREIGN KEY (`vat_id`) REFERENCES `vats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `providers`
--
ALTER TABLE `providers`
  ADD CONSTRAINT `providers_ibfk_1` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `providers_ibfk_3` FOREIGN KEY (`corporation_id`) REFERENCES `corporations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `providers_ibfk_4` FOREIGN KEY (`person_type_id`) REFERENCES `person_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `providers_ibfk_5` FOREIGN KEY (`person_ray_id`) REFERENCES `person_rays` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`vat_id`) REFERENCES `vats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchases_ibfk_3` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sale_places`
--
ALTER TABLE `sale_places`
  ADD CONSTRAINT `sale_places_ibfk_1` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sale_place_staff`
--
ALTER TABLE `sale_place_staff`
  ADD CONSTRAINT `sale_place_staff_ibfk_1` FOREIGN KEY (`sale_place_id`) REFERENCES `sale_places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sale_place_staff_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `societies`
--
ALTER TABLE `societies`
  ADD CONSTRAINT `societies_ibfk_2` FOREIGN KEY (`enterprise_id`) REFERENCES `enterprises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `society_staff`
--
ALTER TABLE `society_staff`
  ADD CONSTRAINT `society_staff_ibfk_1` FOREIGN KEY (`society_id`) REFERENCES `societies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `society_staff_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `staffs`
--
ALTER TABLE `staffs`
  ADD CONSTRAINT `staffs_ibfk_1` FOREIGN KEY (`human_id`) REFERENCES `humans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staffs_ibfk_2` FOREIGN KEY (`staff_type_id`) REFERENCES `staff_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `supplies`
--
ALTER TABLE `supplies`
  ADD CONSTRAINT `supplies_ibfk_1` FOREIGN KEY (`product_purchase_id`) REFERENCES `product_purchase` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`library_id`) REFERENCES `libraries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`civility_id`) REFERENCES `civilities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
