-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2025 a las 17:50:44
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nueva`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquiler`
--

CREATE TABLE `alquiler` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fechaRecogida` date NOT NULL,
  `lugarRecogida` varchar(100) NOT NULL,
  `horaRecogida` varchar(5) NOT NULL,
  `fechaEntrega` date NOT NULL,
  `lugarEntrega` varchar(100) NOT NULL,
  `horaEntrega` varchar(5) NOT NULL,
  `importe` decimal(9,2) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `clienteID` bigint(20) UNSIGNED NOT NULL,
  `vehiculoID` bigint(20) UNSIGNED NOT NULL,
  `fechaDevolucion` timestamp NULL DEFAULT NULL,
  `fechaRecogidaReal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `alquiler`
--

INSERT INTO `alquiler` (`id`, `fechaRecogida`, `lugarRecogida`, `horaRecogida`, `fechaEntrega`, `lugarEntrega`, `horaEntrega`, `importe`, `activo`, `clienteID`, `vehiculoID`, `fechaDevolucion`, `fechaRecogidaReal`) VALUES
(8, '2025-06-17', 'Fuengirola', '08:00', '2025-06-18', 'Fuengirola', '08:00', 75.00, 1, 4948, 12, NULL, NULL),
(11, '2025-05-10', 'Fuengirola', '08:00', '2025-05-11', 'Fuengirola', '08:00', 82.00, 0, 4951, 16, '2025-05-11 05:00:00', '2025-05-10 08:00:00'),
(15, '2025-05-12', 'Fuengirola', '08:00', '2025-05-13', 'Fuengirola', '08:00', 85.00, 0, 4951, 11, '2025-05-13 06:00:00', '2025-05-12 08:00:00'),
(16, '2025-05-13', 'Fuengirola', '08:00', '2025-05-14', 'Fuengirola', '08:00', 85.00, 0, 4951, 11, '2025-05-14 06:05:00', '2025-05-13 09:00:00'),
(19, '2025-05-20', 'Fuengirola', '08:00', '2025-05-22', 'Fuengirola', '08:00', 180.00, 0, 4951, 10, '2025-05-22 07:00:00', '2025-05-20 09:00:00'),
(21, '2025-05-27', 'Fuengirola', '08:00', '2025-05-30', 'Fuengirola', '08:00', 270.00, 0, 4951, 10, '2025-05-30 08:05:00', '2025-05-27 07:05:00'),
(22, '2025-06-03', 'Fuengirola', '08:00', '2025-06-04', 'Fuengirola', '08:00', 88.00, 0, 4946, 29, '2025-06-04 06:00:00', '2025-06-03 08:00:00'),
(23, '2025-06-09', 'Fuengirola', '08:00', '2025-06-10', 'Fuengirola', '08:00', 90.00, 0, 4957, 10, '2025-06-10 05:50:00', '2025-06-09 08:05:00'),
(24, '2025-06-05', 'Fuengirola', '08:00', '2025-06-06', 'Fuengirola', '08:00', 90.00, 0, 4957, 10, '2025-06-06 08:00:00', '2025-06-05 10:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `domicilio` varchar(50) NOT NULL,
  `ocupacion` varchar(30) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellidos`, `domicilio`, `ocupacion`, `fechaNacimiento`, `foto`) VALUES
(4946, 'clienteuno', 'clienteuno', 'sin', 'No especificado', '2000-10-10', 'storage/cliente/4946.png'),
(4947, 'prueba', 'prueba', 'prueba', 'Empleado', '2000-10-10', 'storage/cliente/4947.png'),
(4948, 'Estrella', 'Estella', 'fuengirola', 'Estudiante', '1990-08-19', 'storage/cliente/4948.png'),
(4949, 'Virginia', 'Virginia', 'Malaga', 'No especificado', '1992-05-16', 'storage/cliente/4949.png'),
(4951, 'Pedro', 'Pedro', 'Prueba', 'No especificado', '1990-10-10', '../storage/persona.png'),
(4957, 'clientecliente', 'cliente', 'fuengirola', 'Estudiante', '1992-05-16', 'storage/cliente/4957.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `nombre`, `apellidos`, `foto`) VALUES
(1, 'empleado', 'empleado', 'storage/empleado/1.png'),
(4885, 'virginia', 'perez', 'storage/empleado/4885.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_04_04_163124_create_usuario_table', 1),
(2, '2025_04_04_163351_create_cliente_table', 1),
(3, '2025_04_04_163459_create_empleado_table', 1),
(4, '2025_04_04_163525_create_vehiculo_table', 1),
(5, '2025_04_04_163547_create_alquiler_table', 1),
(6, '2025_04_04_163619_create_sessions_table', 1),
(7, '2025_04_16_132924_add_disponible_to_vehiculo_table', 1),
(8, '2025_05_07_224236_add_lat_lng_to_vehiculo_table', 1),
(9, '2025_05_09_172840_add_fecha_devolucion_to_alquileres_table', 2),
(10, '2025_05_11_103654_add_fecha_recogida_real_to_alquileres_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2HBrSUCN34k5heog0i7kkEZrGwQdQxDp7SGbPw0D', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieVdjNUZaMkN6d0tNd2xKVzdOWWhxaDgxU3h1ZlA5bzlFYnRtWEttdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749584037);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `utenteable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `utenteable_type` varchar(25) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `password`, `utenteable_id`, `utenteable_type`, `remember_token`) VALUES
(2, 'empleadoempleado', '$2y$12$uN9JBXy3D2P9xW/m8uRHIOUUjG882u3qRMWgPnCzhhVX33cvMKqgO', 1, 'App\\Models\\Empleado', 'qsUpnJcabpRRhC8LJzpigtHwQUuzUlR19YSTszt04JF69zjl73QEwQXqvVm7'),
(3, 'adminadmin', '$2y$12$wP95JGorgZsdJlct7ppPB.3q4K/BrxhJmf5rk6fzgnSlSDMPTmMi.', NULL, 'Admin', 'LcngTFupMRVcrfPZJwJWx5tjBC8HufHKvpRwON4UHc1LtDknKm4cvo1DvC1h'),
(4981, 'Virginia1', '$2y$12$BiCI4DuvN7zoeBumJLeUx.rAVzbYIKp2c0svhTPhPbztyoSIyL7rm', 4885, 'App\\Models\\Empleado', 'QucHWOMrsHxktguFBlUXkBPDD390VZs2OKXnwUzP9y76sNX8vElZKBH35bQv'),
(4983, 'Clienteuno', '$2y$12$xg2RDLrCdwWqt6AH2J8lk.MvfO2C8al41LUT8nz65kR1BIZa4YAQS', 4946, 'App\\Models\\Cliente', 'hxWQV041SJPDxVnSg2lkDaKcMXffO4mdNi3xUxbmGnWzlttMNeMUSYz5CNPl'),
(4984, 'Prueba2025', '$2y$12$i5tl4YdARpN9TSGmtXQa4O0Ji4wSZ3vf.dWEUBYWsXK/cqxN5n3zm', 4947, 'App\\Models\\Cliente', 'vBFyfpBaU1G5IlUDk3JVcEXDe0qduYaW3Ozt95PHiwdykUAcW7z0BzmM6o0j'),
(4985, 'Estrella1', '$2y$12$Z88JL3IjWtUrK5er3NCUb.V8UK0z5Gc75HpwZKKgWaKvTI9DAAZL6', 4948, 'App\\Models\\Cliente', 'GgopyeDvK4P4vdOPGzsksprmWbmuACt4VksyRl59TAUou9G5ptzA8Cln758E'),
(4986, 'Virginia12', '$2y$12$2Kk.e.X9xkrFkFvA3JEucuSWx761r6VomlnC.3H5iWi6BTZFTeL1a', 4949, 'App\\Models\\Cliente', 'QEycUufIQTMdxmYaPArLPdBuBlOLgCbluYIH8hJguKdQRr4S7xgPPY0tDHVy'),
(4988, 'Pedrouno1', '$2y$12$Trxb7JoVaubEvfTxUdc5Qug3kJS3uizj5WVB8C4BOBYIP5l85DpQ6', 4951, 'App\\Models\\Cliente', NULL),
(4996, 'clientecliente', '$2y$12$CFvcrhpH8orWVrw.HTdKR.AyNxT32Ee7fQtLXSQWhHpYBIh8S3m4y', 4957, 'App\\Models\\Cliente', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matricula` char(7) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `motor` varchar(20) NOT NULL,
  `cambio` varchar(20) NOT NULL,
  `equipamiento` varchar(100) NOT NULL,
  `puertas` varchar(10) NOT NULL,
  `asientos` char(1) NOT NULL,
  `autonomia` decimal(8,2) NOT NULL,
  `color` varchar(30) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `disponible` tinyint(1) NOT NULL DEFAULT 1,
  `emision` date NOT NULL,
  `vencimiento` date NOT NULL,
  `costoDiario` decimal(6,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lat` decimal(10,7) DEFAULT NULL,
  `lng` decimal(10,7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id`, `matricula`, `modelo`, `marca`, `motor`, `cambio`, `equipamiento`, `puertas`, `asientos`, `autonomia`, `color`, `foto`, `descripcion`, `disponible`, `emision`, `vencimiento`, `costoDiario`, `created_at`, `updated_at`, `lat`, `lng`) VALUES
(10, '2222AAA', 'Yaris Hybrid', 'Toyota', 'Hibrido', 'Automatico', 'Navegador', '4', '5', 600.00, 'Blanco', 'storage/vehiculo/10.png', 'El Toyota Yaris Hybrid es un coche compacto ideal para ciudad, gracias a su tamaño reducido y su eficiencia energética. Perfecto para quienes buscan comodidad, sostenibilidad y tecnología en sus desplazamientos diarios o vacaciones.', 1, '2025-04-15', '2026-04-15', 90.00, '2025-04-15 16:48:43', '2025-06-10 17:32:50', 36.5330024, -4.6241147),
(11, '2222BBB', 'Ioniq Hybrid', 'Hyundai', 'Hibrido', 'Automatico', 'Control crucero adaptativo, pantalla táctil, sensores', '5', '5', 900.00, 'Gris plata', 'storage/vehiculo/11.png', 'El Hyundai Ioniq Hybrid destaca por su eficiencia y confort, ideal para viajes largos o uso diario con bajo consumo y etiqueta ECO.', 1, '2025-04-15', '2026-04-15', 85.00, '2025-04-15 16:56:07', '2025-06-10 17:31:00', 36.5328910, -4.6239472),
(12, '3333CCC', 'Clio E-Tech', 'Renault', 'Hibrido', 'Automatico', 'Pantalla táctil, modos de conducción, sensores de aparcamiento', '5', '5', 800.00, 'Rojo', 'storage/vehiculo/12.png', 'El Renault Clio E-Tech Hybrid ofrece una conducción ágil y eficiente, ideal para quienes buscan un coche moderno, cómodo y económico.', 0, '2025-04-15', '2026-04-15', 75.00, '2025-04-15 16:58:26', '2025-06-10 17:31:01', 36.5322220, -4.6241805),
(13, '4444DDD', 'Niro Hybrid', 'Kia', 'Hibrido', 'Automatico', 'Navegador, cámara trasera, control de crucero', '5', '5', 999.00, 'Azul oscuro', 'storage/vehiculo/13.png', 'El Kia Niro Hybrid es un SUV compacto con tecnología híbrida eficiente, amplio espacio y excelente visibilidad.', 1, '2025-04-15', '2026-04-15', 95.00, '2025-04-15 17:00:58', '2025-06-10 17:31:02', 36.5317334, -4.6243522),
(15, '6666FFF', 'Jazz Hybrid', 'Honda', 'Hibrido', 'Automatico', 'Pantalla multimedia, cámara trasera', '5', '5', 650.00, 'Gris oscuro', 'storage/vehiculo/15.png', 'El Honda Jazz Hybrid ofrece versatilidad, consumo eficiente y amplitud, perfecto para uso diario en ciudad con etiqueta ECO.', 1, '2025-05-01', '2026-05-01', 78.00, '2025-05-07 20:48:53', '2025-06-10 17:31:04', 36.5315874, -4.6255100),
(16, '7777GGG', 'Corolla Hybrid', 'Toyota', 'Hibrido', 'Automatico', 'Asistente de carril, climatizador, pantalla táctil', '5', '5', 750.00, 'Plata', 'storage/vehiculo/16.png', 'El Toyota Corolla Hybrid ofrece un equilibrio perfecto entre eficiencia, confort y tecnología, ideal tanto para ciudad como para carretera.', 1, '2025-05-01', '2026-05-01', 82.00, '2025-05-07 20:48:53', '2025-06-10 17:31:05', 36.5318821, -4.6256376),
(29, '5555EEE', 'TOYOTA - C-HR HYBRID', 'TOYOTA', 'Hibrido', 'Automatico', 'Climatizador, sensores traseros', '5', '5', 500.00, 'Negro', 'storage/vehiculo/29.png', 'El Toyota C-HR Hybrid combina diseño vanguardista con rendimiento eficiente, ideal para conductores urbanos que valoran el estilo y la tecnología.', 1, '2025-05-26', '2026-05-26', 88.00, '2025-05-26 18:18:49', '2025-06-02 06:45:09', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alquiler_clienteid_foreign` (`clienteID`),
  ADD KEY `alquiler_vehiculoid_foreign` (`vehiculoID`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_username_unique` (`username`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehiculo_matricula_unique` (`matricula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4959;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4891;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5000;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD CONSTRAINT `alquiler_clienteid_foreign` FOREIGN KEY (`clienteID`) REFERENCES `cliente` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alquiler_vehiculoid_foreign` FOREIGN KEY (`vehiculoID`) REFERENCES `vehiculo` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
