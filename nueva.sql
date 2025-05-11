-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-05-2025 a las 13:45:53
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
(7, '2025-05-16', 'Fuengirola', '08:00', '2025-05-18', 'Fuengirola', '08:00', 95.00, 0, 1, 13, '2025-05-18 05:10:00', NULL),
(8, '2025-06-17', 'Fuengirola', '08:00', '2025-06-18', 'Fuengirola', '08:00', 75.00, 1, 4948, 12, NULL, NULL),
(9, '2025-05-10', 'Fuengirola', '08:00', '2025-05-15', 'Fuengirola', '08:00', 450.00, 0, 1, 10, '2025-05-15 05:02:00', NULL),
(10, '2025-05-10', 'Fuengirola', '08:00', '2025-05-12', 'Fuengirola', '08:00', 180.00, 1, 1, 10, '2025-05-10 05:10:00', NULL),
(11, '2025-05-10', 'Fuengirola', '08:00', '2025-05-11', 'Fuengirola', '08:00', 82.00, 0, 4951, 16, '2025-05-11 05:00:00', NULL),
(12, '2025-05-15', 'Fuengirola', '08:00', '2025-05-16', 'Fuengirola', '08:00', 90.00, 0, 4952, 10, NULL, NULL),
(13, '2025-05-10', 'Fuengirola', '08:00', '2025-06-30', 'Fuengirola', '08:00', 4590.00, 1, 4952, 10, NULL, NULL),
(14, '2025-05-22', 'Fuengirola', '08:00', '2025-05-24', 'Fuengirola', '08:00', 176.00, 1, 4953, 14, NULL, '2025-05-22 08:00:00'),
(15, '2025-05-12', 'Fuengirola', '08:00', '2025-05-13', 'Fuengirola', '08:00', 85.00, 0, 4951, 11, '2025-05-13 06:00:00', '2025-05-12 08:00:00'),
(16, '2025-05-13', 'Fuengirola', '08:00', '2025-05-14', 'Fuengirola', '08:00', 85.00, 1, 4951, 11, NULL, '2025-05-13 09:00:00');

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
(1, 'cliente', 'cliente', 'calle fuengirola', 'Estudiante', '1995-01-01', 'storage/cliente/1.png'),
(4946, 'clienteuno', 'clienteuno', 'sin', 'No especificado', '2000-10-10', 'storage/cliente/4946.png'),
(4947, 'prueba', 'prueba', 'prueba', 'Empleado', '2000-10-10', 'storage/cliente/4947.png'),
(4948, 'Estrella', 'Estella', 'fuengirola', 'Estudiante', '1990-08-19', 'storage/cliente/4948.png'),
(4949, 'Virginia', 'Virginia', 'Malaga', 'No especificado', '1992-05-16', 'storage/cliente/4949.png'),
(4951, 'Pedro', 'Pedro', 'Prueba', 'No especificado', '1990-10-10', '../storage/persona.png'),
(4952, 'prueba', 'prueba', 'prueba', 'No especificado', '1990-05-16', '../storage/persona.png'),
(4953, 'estrella', 'M a', 'calle', 'No especificado', '1991-01-30', '../storage/persona.png');

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
(4885, 'virginia', 'perez', 'storage/empleado/4885.png'),
(4886, 'TestdosTestdos', 'TestdosTestdos', 'storage/empleado/4886.png');

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
('x1WV9ggA0KPyjFXVo9paYQexT6bU4V9CnsMTHmLM', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieW9uSExsOE5PdGRyeG1yQTFObTBGelpsNFF6VHN6aUNVb1pKaHRWTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvdmVoaWN1bG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9', 1746963798);

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
(1, 'clientecliente', '$2y$12$5RvB7MQf.DorHHpHYbFfBOIINt.mdUscvK7cxufr5T9UpDVQqk.ry', 1, 'App\\Models\\Cliente', 'APv1EETCPfAFs0zyVJvwHGIZQ4CMfx78RmMK98CUiH4cWzNRoHKAXOMm4Ouk'),
(2, 'empleadoempleado', '$2y$12$uN9JBXy3D2P9xW/m8uRHIOUUjG882u3qRMWgPnCzhhVX33cvMKqgO', 1, 'App\\Models\\Empleado', 'YQrDpaoTWzsje3V8UrZNWmPmySTXzg7L3rC4F9LUuTwv8SSvTStCBOqvlTKq'),
(3, 'adminadmin', '$2y$12$wP95JGorgZsdJlct7ppPB.3q4K/BrxhJmf5rk6fzgnSlSDMPTmMi.', NULL, 'Admin', 'yd30OftCR2YIjI010zERIa19OfpMJjZ2rYDoAe5hvvCpERV3EW3gjvhHTKxA'),
(4981, 'Virginia1', '$2y$12$BiCI4DuvN7zoeBumJLeUx.rAVzbYIKp2c0svhTPhPbztyoSIyL7rm', 4885, 'App\\Models\\Empleado', 'QucHWOMrsHxktguFBlUXkBPDD390VZs2OKXnwUzP9y76sNX8vElZKBH35bQv'),
(4982, 'TestdosTestdos', '$2y$12$Sg57rN4884WaFgq44wOOZuOsX/uV6TCXuAXFESBRrUZTZysvVRyu6', 4886, 'App\\Models\\Empleado', '2WThcBF5SG'),
(4983, 'Clienteuno', '$2y$12$xg2RDLrCdwWqt6AH2J8lk.MvfO2C8al41LUT8nz65kR1BIZa4YAQS', 4946, 'App\\Models\\Cliente', 'HVj3QjmWYL'),
(4984, 'Prueba2025', '$2y$12$i5tl4YdARpN9TSGmtXQa4O0Ji4wSZ3vf.dWEUBYWsXK/cqxN5n3zm', 4947, 'App\\Models\\Cliente', 'T4o7ERiB2m'),
(4985, 'Estrella1', '$2y$12$Z88JL3IjWtUrK5er3NCUb.V8UK0z5Gc75HpwZKKgWaKvTI9DAAZL6', 4948, 'App\\Models\\Cliente', 'uyNOrjVvaW'),
(4986, 'Virginia12', '$2y$12$2Kk.e.X9xkrFkFvA3JEucuSWx761r6VomlnC.3H5iWi6BTZFTeL1a', 4949, 'App\\Models\\Cliente', '8QvxBROarT'),
(4988, 'Pedrouno1', '$2y$12$Trxb7JoVaubEvfTxUdc5Qug3kJS3uizj5WVB8C4BOBYIP5l85DpQ6', 4951, 'App\\Models\\Cliente', NULL),
(4989, 'Prueba43', '$2y$12$fs4P9P3yOSMtK2p0kowRnudyj29pahmGLo0F8NVNe7T2u9aI17OXS', 4952, 'App\\Models\\Cliente', NULL),
(4990, 'martinalors', '$2y$12$abbbTUv./nVSLj8/vPKnuO.rVupb7V/hT5Jts8PFy5mNGLfQcryFa', 4953, 'App\\Models\\Cliente', NULL);

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
(10, '2222AAA', 'Yaris Hybrid', 'Toyota', 'Hibrido', 'Automatico', 'Navegador', '4', '5', 600.00, 'Blanco', 'storage/vehiculo/10.png', 'El Toyota Yaris Hybrid es un coche compacto ideal para ciudad, gracias a su tamaño reducido y su eficiencia energética. Perfecto para quienes buscan comodidad, sostenibilidad y tecnología en sus desplazamientos diarios o vacaciones.', 0, '2025-04-15', '2026-04-15', 90.00, '2025-04-15 16:48:43', '2025-05-11 09:43:09', 36.5330024, -4.6241147),
(11, '2222BBB', 'Ioniq Hybrid', 'Hyundai', 'Hibrido', 'Automatico', 'Control crucero adaptativo, pantalla táctil, sensores', '5', '5', 900.00, 'Gris plata', 'storage/vehiculo/11.png', 'El Hyundai Ioniq Hybrid destaca por su eficiencia y confort, ideal para viajes largos o uso diario con bajo consumo y etiqueta ECO.', 0, '2025-04-15', '2026-04-15', 85.00, '2025-04-15 16:56:07', '2025-05-11 09:43:11', 36.5328910, -4.6239472),
(12, '3333CCC', 'Clio E-Tech', 'Renault', 'Hibrido', 'Automatico', 'Pantalla táctil, modos de conducción, sensores de aparcamiento', '5', '5', 800.00, 'Rojo', 'storage/vehiculo/12.png', 'El Renault Clio E-Tech Hybrid ofrece una conducción ágil y eficiente, ideal para quienes buscan un coche moderno, cómodo y económico.', 0, '2025-04-15', '2026-04-15', 75.00, '2025-04-15 16:58:26', '2025-05-11 09:43:12', 36.5322220, -4.6241805),
(13, '4444DDD', 'Niro Hybrid', 'Kia', 'Hibrido', 'Automatico', 'Navegador, cámara trasera, control de crucero', '5', '5', 999.00, 'Azul oscuro', 'storage/vehiculo/13.png', 'El Kia Niro Hybrid es un SUV compacto con tecnología híbrida eficiente, amplio espacio y excelente visibilidad.', 1, '2025-04-15', '2026-04-15', 95.00, '2025-04-15 17:00:58', '2025-05-11 09:43:13', 36.5317334, -4.6243522),
(14, '5555EEE', 'C-HR Hybrid', 'Toyota', 'Hibrido', 'Automatico', 'Climatizador, sensores traseros', '5', '5', 700.00, 'Negro', 'storage/vehiculo/14.png', 'El Toyota C-HR Hybrid combina diseño vanguardista con rendimiento eficiente, ideal para conductores urbanos que valoran el estilo y la tecnología.', 0, '2025-05-01', '2026-05-01', 88.00, '2025-05-07 20:48:53', '2025-05-11 09:43:14', 36.5312490, -4.6245499),
(15, '6666FFF', 'Jazz Hybrid', 'Honda', 'Hibrido', 'Automatico', 'Pantalla multimedia, cámara trasera', '5', '5', 650.00, 'Gris oscuro', 'storage/vehiculo/15.png', 'El Honda Jazz Hybrid ofrece versatilidad, consumo eficiente y amplitud, perfecto para uso diario en ciudad con etiqueta ECO.', 1, '2025-05-01', '2026-05-01', 78.00, '2025-05-07 20:48:53', '2025-05-11 09:43:15', 36.5315874, -4.6255100),
(16, '7777GGG', 'Corolla Hybrid', 'Toyota', 'Hibrido', 'Automatico', 'Asistente de carril, climatizador, pantalla táctil', '5', '5', 750.00, 'Plata', 'storage/vehiculo/16.png', 'El Toyota Corolla Hybrid ofrece un equilibrio perfecto entre eficiencia, confort y tecnología, ideal tanto para ciudad como para carretera.', 1, '2025-05-01', '2026-05-01', 82.00, '2025-05-07 20:48:53', '2025-05-11 09:43:16', 36.5318821, -4.6256376);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4954;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4887;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4991;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
