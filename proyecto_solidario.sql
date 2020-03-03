-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 03-03-2020 a las 13:46:59
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
  `id_usuario_izquierda` int(255) DEFAULT NULL,
  `id_usuario_derecha` int(255) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `telefono1`, `telefono2`, `direccion`, `identificacion`, `fecha_ingreso`, `id_usuario_izquierda`, `id_usuario_derecha`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'superadministrador', 'superadmin@gmail.com', NULL, '$2y$10$YqtPDd26lYhv3SRiIcAevOmNQ/9qKqR5MUMw8.v786.DK8yhP8s8K', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-29 02:23:25', '2020-02-29 02:23:25'),
(7, 'Diego Gallardo', 'diegogallar12@gmail.com', NULL, NULL, 3203259689, NULL, 'pajonal', 1081594157, NULL, 8, 9, NULL, '2020-02-29 02:24:04', '2020-02-29 02:34:36'),
(8, 'Juanito Perez', 'juanito@gmail.com', NULL, NULL, 122415, NULL, 'calle 5', 88888888, NULL, 10, 11, NULL, '2020-02-29 02:31:54', '2020-03-03 18:04:10'),
(9, 'Pepito lopez', 'pepito@gmail.com', NULL, NULL, 25656, NULL, 'alguna', 77777777, NULL, NULL, NULL, NULL, '2020-02-29 02:32:21', '2020-02-29 02:32:21'),
(10, 'Juanita Muñoz', NULL, NULL, NULL, 3203259689, NULL, 'cra 1 # 23-4', 11111111, NULL, NULL, NULL, NULL, '2020-03-03 17:50:33', '2020-03-03 17:50:33'),
(11, 'Marly Lopez', NULL, NULL, NULL, 3203259689, NULL, 'cra 1 # 23-4', 22222222, NULL, NULL, NULL, NULL, '2020-03-03 18:03:46', '2020-03-03 18:03:46');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
