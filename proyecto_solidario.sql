-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-03-2020 a las 15:02:59
-- Versión del servidor: 5.7.21
-- Versión de PHP: 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_solidario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono1` bigint(20) DEFAULT NULL,
  `telefono2` bigint(20) DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identificacion` bigint(20) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `id_usuario_izquierda` int(255) DEFAULT NULL,
  `id_usuario_derecha` int(255) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `telefono1`, `telefono2`, `direccion`, `identificacion`, `fecha_ingreso`, `fecha_pago`, `id_usuario_izquierda`, `id_usuario_derecha`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'superadministrador', 'superadmin@gmail.com', NULL, '$2y$10$YqtPDd26lYhv3SRiIcAevOmNQ/9qKqR5MUMw8.v786.DK8yhP8s8K', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sylgj8o2OrkoHD5r4S0ZPxdB7BZ9JR7hPRZyL8vSWiNNDV0G66YcgnB1aqDf', '2020-02-29 02:23:25', '2020-02-29 02:23:25'),
(7, 'Diego Gallardo', 'diegogallar12@gmail.com', NULL, NULL, 3203259689, NULL, 'pajonal', 1081594157, '2020-02-02', '2020-02-10', 17, NULL, NULL, '2020-02-29 02:24:04', '2020-03-10 06:46:16'),
(19, 'EDGAR DIAS', 'degar@gmail.com', NULL, NULL, 3423423, NULL, 'popayan', 10307016, '2020-03-10', '2020-03-18', 18, NULL, NULL, '2020-03-10 05:36:41', '2020-03-10 05:37:51'),
(18, 'JAVIER LOPEZ', 'javierq@mail.com', NULL, NULL, 3203434, NULL, 'centenario alban', 11111111, '2020-03-16', '2020-03-24', NULL, 19, NULL, '2020-03-10 05:29:41', '2020-03-10 19:44:53'),
(17, 'CARLOS LOPEZ', 'carlos@gmail.com', NULL, NULL, 323123, 12123123, 'los robles alban', 5210570, '2020-03-13', '2020-03-21', 20, 23, NULL, '2020-03-10 05:27:18', '2020-03-10 18:25:57'),
(20, 'GILMA CORDOBA', NULL, NULL, NULL, 565, NULL, 'alban', 22222222, '2020-03-10', '2020-03-18', 21, 22, NULL, '2020-03-10 18:16:31', '2020-03-10 18:18:13'),
(21, 'YADDY LOPEZ', NULL, NULL, NULL, 654654, NULL, 'alban', 33333333, '2020-03-10', '2020-03-18', NULL, NULL, NULL, '2020-03-10 18:16:58', '2020-03-10 18:16:58'),
(22, 'BLANCA LOPEZ', NULL, NULL, NULL, 45646, NULL, 'alban', 44444444, '2020-03-10', '2020-03-18', NULL, NULL, NULL, '2020-03-10 18:17:22', '2020-03-10 18:17:22'),
(23, 'ALEJANDRINA LOPEZ', NULL, NULL, NULL, 45654, NULL, 'alban', 55555555, '2020-03-10', '2020-03-18', 24, 25, NULL, '2020-03-10 18:24:43', '2020-03-10 18:26:32'),
(24, 'AMANDA LOPEZ', NULL, NULL, NULL, 4654, NULL, 'alban', 66666666, '2020-03-10', '2020-03-18', NULL, NULL, NULL, '2020-03-10 18:25:08', '2020-03-10 18:25:08'),
(25, 'LAUREANO LOPEZ', NULL, NULL, NULL, 765456, NULL, 'alban', 77777777, '2020-03-10', '2020-03-18', NULL, NULL, NULL, '2020-03-10 18:25:31', '2020-03-10 18:25:31'),
(26, 'CARLOS LOPEZ PASTO', NULL, NULL, NULL, 454, NULL, 'pasto', 88888888, '2020-03-10', '2020-03-18', NULL, NULL, NULL, '2020-03-10 19:19:48', '2020-03-10 19:19:48'),
(27, 'administrador', 'administrador@gmail.com', NULL, '$2y$10$.QjVe.sM7BNhct5hJRCKXebw8ibIM1OjN2Z7.7I4ykn2ADCBWFI66', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-10 19:47:56', '2020-03-10 19:47:56');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
