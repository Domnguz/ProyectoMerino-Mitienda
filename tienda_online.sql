-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2026 a las 02:06:46
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_online`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(2, 'Polos', NULL, NULL, NULL),
(3, 'Zapatillas', NULL, NULL, NULL),
(4, 'Gorros', NULL, '2026-06-21 19:59:54', '2026-06-22 05:57:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedidos`
--

CREATE TABLE `detalle_pedidos` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_pedidos`
--

INSERT INTO `detalle_pedidos` (`id`, `pedido_id`, `producto_id`, `cantidad`, `precio`, `subtotal`) VALUES
(1, 20, 22, 1, 89.00, 89.00),
(2, 20, 21, 3, 70.00, 210.00),
(3, 20, 25, 1, 69.00, 69.00),
(4, 21, 21, 1, 70.00, 70.00),
(5, 21, 20, 1, 59.00, 59.00),
(6, 21, 23, 1, 50.00, 50.00),
(7, 22, 21, 1, 70.00, 70.00),
(8, 22, 24, 1, 29.00, 29.00),
(9, 22, 25, 1, 69.00, 69.00),
(10, 22, 31, 1, 40.00, 40.00),
(11, 23, 19, 1, 39.00, 39.00),
(12, 24, 30, 1, 199.00, 199.00),
(13, 24, 29, 4, 69.00, 276.00),
(14, 25, 24, 1, 29.00, 29.00),
(15, 25, 22, 1, 89.00, 89.00),
(16, 26, 21, 1, 70.00, 70.00),
(17, 27, 21, 2, 70.00, 140.00),
(18, 28, 25, 1, 69.00, 69.00),
(19, 28, 22, 1, 89.00, 89.00),
(20, 29, 20, 2, 59.00, 118.00),
(21, 29, 26, 2, 19.00, 38.00),
(22, 30, 30, 1, 199.00, 199.00),
(23, 30, 24, 1, 29.00, 29.00),
(24, 30, 19, 1, 39.00, 39.00),
(25, 30, 31, 2, 40.00, 80.00),
(26, 31, 30, 1, 199.00, 199.00),
(27, 32, 20, 1, 59.00, 59.00),
(28, 32, 28, 1, 39.00, 39.00),
(29, 33, 20, 1, 59.00, 59.00),
(30, 33, 19, 1, 39.00, 39.00),
(31, 34, 22, 2, 89.00, 178.00);

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
(3, '0001_01_01_000000_create_users_table', 1),
(4, '0001_01_01_000001_create_cache_table', 1),
(5, '0001_01_01_000002_create_jobs_table', 1),
(6, '2026_06_18_220626_create_categorias_table', 1),
(7, '2026_06_19_051027_create_pedidos_table', 1),
(8, '2026_06_19_051423_create_detalle_pedidos_table', 1),
(9, '2026_06_19_155756_add_foto_to_users_table', 1),
(10, '2026_06_24_025522_agregar_datos_personales_a_users_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  `total` decimal(10,2) DEFAULT NULL,
  `estado` enum('Pendiente','Pagado','Enviado','Entregado','Rechazado') DEFAULT 'Pendiente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `usuario_id`, `fecha`, `total`, `estado`, `created_at`, `updated_at`) VALUES
(1, NULL, '2026-06-21 23:21:02', 368.00, 'Rechazado', '2026-06-22 09:21:02', '2026-06-23 03:43:56'),
(2, NULL, '2026-06-21 23:21:04', 368.00, 'Rechazado', '2026-06-22 09:21:04', '2026-06-23 03:43:57'),
(3, NULL, '2026-06-21 23:21:09', 368.00, 'Rechazado', '2026-06-22 09:21:09', '2026-06-23 03:43:57'),
(4, 3, '2026-06-22 04:21:44', 368.00, 'Rechazado', '2026-06-22 09:21:44', '2026-06-23 03:43:58'),
(5, 3, '2026-06-22 04:21:46', 368.00, 'Rechazado', '2026-06-22 09:21:46', '2026-06-23 03:43:58'),
(6, 3, '2026-06-22 04:24:19', 368.00, 'Rechazado', '2026-06-22 09:24:19', '2026-06-23 03:44:00'),
(7, 3, '2026-06-22 04:24:21', 368.00, 'Rechazado', '2026-06-22 09:24:21', '2026-06-23 03:44:00'),
(8, 3, '2026-06-22 04:24:33', 368.00, 'Rechazado', '2026-06-22 09:24:33', '2026-06-23 03:44:09'),
(9, 3, '2026-06-22 04:24:35', 368.00, 'Rechazado', '2026-06-22 09:24:35', '2026-06-23 03:44:07'),
(10, 3, '2026-06-22 04:26:39', 368.00, 'Rechazado', '2026-06-22 09:26:39', '2026-06-23 03:44:07'),
(11, 3, '2026-06-22 04:26:41', 368.00, 'Rechazado', '2026-06-22 09:26:41', '2026-06-23 03:44:07'),
(12, 3, '2026-06-22 04:26:43', 368.00, 'Rechazado', '2026-06-22 09:26:43', '2026-06-23 03:44:06'),
(13, 3, '2026-06-22 04:27:05', 368.00, 'Rechazado', '2026-06-22 09:27:05', '2026-06-23 03:44:06'),
(14, 3, '2026-06-22 04:27:08', 368.00, 'Rechazado', '2026-06-22 09:27:08', '2026-06-23 03:44:05'),
(15, 3, '2026-06-22 04:28:14', 368.00, 'Rechazado', '2026-06-22 09:28:14', '2026-06-23 03:44:05'),
(16, 3, '2026-06-22 04:28:17', 368.00, 'Rechazado', '2026-06-22 09:28:17', '2026-06-23 03:44:05'),
(17, 3, '2026-06-22 04:28:35', 368.00, 'Rechazado', '2026-06-22 09:28:35', '2026-06-23 03:44:04'),
(18, 3, '2026-06-22 04:28:37', 368.00, 'Rechazado', '2026-06-22 09:28:37', '2026-06-23 03:44:04'),
(19, 3, '2026-06-22 04:31:30', 368.00, 'Rechazado', '2026-06-22 09:31:30', '2026-06-23 03:44:02'),
(20, 3, '2026-06-22 04:33:54', 368.00, 'Entregado', '2026-06-22 09:33:54', '2026-06-23 08:28:56'),
(21, 3, '2026-06-22 04:34:17', 179.00, 'Entregado', '2026-06-22 09:34:17', '2026-06-23 08:28:44'),
(22, 4, '2026-06-22 21:44:19', 208.00, 'Rechazado', '2026-06-23 02:44:19', '2026-06-23 03:44:02'),
(23, 4, '2026-06-22 21:45:17', 39.00, 'Rechazado', '2026-06-23 02:45:17', '2026-06-23 03:43:41'),
(24, 5, '2026-06-22 22:53:45', 475.00, 'Entregado', '2026-06-23 03:53:45', '2026-06-23 08:28:23'),
(25, 6, '2026-06-23 02:47:39', 118.00, 'Entregado', '2026-06-23 07:47:39', '2026-06-23 08:19:47'),
(26, 6, '2026-06-23 03:44:52', 70.00, 'Pagado', '2026-06-23 08:44:52', '2026-06-23 08:45:02'),
(27, 6, '2026-06-23 03:54:29', 140.00, 'Pendiente', '2026-06-23 08:54:29', '2026-06-23 08:54:29'),
(28, 1, '2026-06-23 16:41:33', 158.00, 'Pagado', '2026-06-23 21:41:33', '2026-06-24 05:05:06'),
(29, 1, '2026-06-24 02:14:22', 156.00, 'Rechazado', '2026-06-24 07:14:22', '2026-06-24 07:14:47'),
(30, 7, '2026-06-24 03:15:09', 347.00, 'Pendiente', '2026-06-24 08:15:09', '2026-06-24 08:15:09'),
(31, 7, '2026-06-24 03:29:27', 199.00, 'Pendiente', '2026-06-24 08:29:27', '2026-06-24 08:29:27'),
(32, 7, '2026-06-24 15:19:20', 98.00, 'Pendiente', '2026-06-24 20:19:20', '2026-06-24 20:19:20'),
(33, 7, '2026-06-25 21:41:33', 98.00, 'Pendiente', '2026-06-26 02:41:33', '2026-06-26 02:41:33'),
(34, 7, '2026-06-25 21:42:18', 178.00, 'Pagado', '2026-06-26 02:42:18', '2026-06-26 02:42:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) DEFAULT 0,
  `imagen` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `categoria_id`, `nombre`, `descripcion`, `precio`, `stock`, `imagen`, `created_at`, `updated_at`) VALUES
(19, 3, 'Zapatillas - Adidas A5 520', NULL, 39.00, 3, 'productos/cwmF7SQYCuKo90FM9mFclZmIREQ2m66xAJ4x4efw.jpg', '2026-06-19 01:49:44', '2026-06-26 02:41:34'),
(20, 3, 'Zapatillas - Adidas Hamburg', 'Nuevas zapatillas Originales', 59.00, 2, 'productos/11DM2KosRq1g1FZFnUGqLiNzy8Kmb6mIUP24eKZo.jpg', '2026-06-19 01:54:01', '2026-06-26 02:41:34'),
(21, 3, 'Zapatillas Deportivas - Adidas', 'Zapatillas Deportivas originales', 70.00, 0, 'productos/HgX2oji6lSCWfuvq8Tr9QRn6ACVMFgEp4F6kLLO2.png', '2026-06-19 01:55:07', '2026-06-23 08:54:29'),
(22, 3, 'Zapatillas Urbanas - Adidas', 'Disfruta de lo más nuevo, Zapatillas Urbanas Adidas Hombre Run', 89.00, -2, 'productos/nQI2UrSwRp8vdJBZGbbpy0BviMYmxIAyilpt8Ajm.webp', '2026-06-19 01:57:43', '2026-06-26 02:42:51'),
(23, 2, 'Camisa Azul - Adidas', NULL, 50.00, 4, 'productos/2T7jIRlf8UIbrC80fWX9GoO0lBeH5KgYBGS6qcsh.webp', '2026-06-19 02:12:00', '2026-06-19 06:09:19'),
(24, 2, 'Polo Blanco Deportivo - Adidas', NULL, 29.00, 11, 'productos/13QBAw0jhgKWVHJOxiZ5KtSZWTo6VTs2m4pQVAU1.webp', '2026-06-19 02:12:57', '2026-06-24 08:15:09'),
(25, 2, 'Polo azul - Adidas', NULL, 69.00, 1, 'productos/z9ISUXclnLhnNVuToTo0NUHnFqhyPI5N0xr8rNb4.webp', '2026-06-19 02:14:42', '2026-06-24 05:05:06'),
(26, 2, 'Polo Negro - Adidas', NULL, 19.00, 1, 'productos/Ly9umubNUklqalMhiAyeBJWvQ7nfsuVBluhD3lQI.webp', '2026-06-19 02:15:12', '2026-06-24 07:14:22'),
(27, 2, 'Polo Rojo - Adidas', NULL, 39.00, 8, 'productos/Qbatn6vPvCnqS6O0ppAKzgiA8Fjz4uDpZhsxPs07.webp', '2026-06-19 06:03:17', '2026-06-19 06:03:17'),
(28, 4, 'Gorra de Adidas con Bordado Lineal', NULL, 39.00, 5, 'productos/Rc9IbKuhWhL9aiUQayHX2npLHixzn6uHaSwg4bne.avif', '2026-06-22 05:58:25', '2026-06-24 20:19:20'),
(29, 4, 'Gorro BZRP', NULL, 69.00, -4, 'productos/0F1SlzUl2AD64v52YW2arQmNEbh1iiJEGuRn9nFP.avif', '2026-06-22 06:02:18', '2026-06-23 03:54:17'),
(30, 4, 'Gorra Merceedes - Amg Petronas F1 Team Driver', NULL, 199.00, 0, 'productos/8XNWOB4zfWElkQFv8wakY13QdEp6YOtPkSwzq0Fk.avif', '2026-06-22 06:04:40', '2026-06-24 08:29:27'),
(31, 4, 'Gorra de Béisbol Alternativa Graphic Selección Argentina 26', NULL, 40.00, 0, 'productos/cCu1uVknR89i9zqhlJDHdwWuHRydzlUPztdgR7J5.avif', '2026-06-22 06:05:40', '2026-06-24 08:15:09'),
(32, 3, 'Zapatillas Air Max - Nike', NULL, 99.00, 7, 'productos/vTMtmKKgSjOa5asmZl912vXrxvxSAf4vluUTo50i.webp', '2026-06-22 06:29:16', '2026-06-22 06:29:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `genero` enum('Masculino','Femenino') DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('admin','cliente') DEFAULT 'cliente',
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `apellidos`, `dni`, `telefono`, `genero`, `email`, `password`, `rol`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'David', 'Dominguez Valdiviezo', '60991873', '908074316', 'Masculino', 'admin@tienda.com', '$2y$12$xeMWAHaAqekoIgSItILHkeLeSrJsi5em0WnkDfSm/IYIWB.pBvb3a', 'admin', 'usuarios/SK4i8vhWd4n3RxFTN9HWqz5eZmu7CgOtk4L6RbvL.jpg', '2026-06-17 03:52:43', '2026-06-24 08:18:35'),
(3, 'Armando Shai', 'Atoche Ventura', '60998853', '984738435', 'Masculino', 'armandoshai@gmail.com', '$2y$12$ZVPkX1WnZ/3Z66NAkXYATuLyH7xIWvs/PgfJ2znJYM0o5yteivuG.', 'cliente', 'usuarios/MlzjSgc1b6vKm7r4Aj3bxv03V2kZBO23bxYWfOQC.jpg', '2026-06-19 21:33:06', '2026-06-24 08:19:03'),
(4, 'Juan Joseph', 'Yacilla Mogollon', '60998832', '94785643', 'Masculino', 'juanjoseph@tienda.com', '$2y$12$TzvcoB6lqhxoqNBJwFLr3OLu1jkF0i.dGt7zglxtDj3DGemWPb5sW', 'cliente', 'usuarios/WZhwPfZtL3nkgRlQolecrF0KozYUqYDIMIiVeRLn.webp', '2026-06-23 02:41:51', '2026-06-24 08:19:25'),
(5, 'Lleiker', 'Palacios Jimenez', '60997437', '972709593', 'Masculino', 'lleiker123@tienda.com', '$2y$12$.S.LPIWhduc5eonHAIeMneykZpZgIc/xmBd/vo5X2yeOE5FvNIOY2', 'cliente', 'usuarios/WWaZJKFBmnjmg3Mxctfmavz2L1wq0cx1m03eAOoc.webp', '2026-06-23 03:52:20', '2026-06-24 08:19:52'),
(6, 'Sami Fernanda', 'Dominguez Valdiviezo', '60332213', '908043123', 'Masculino', 'sami@tienda.com', '$2y$12$/sbceoO067od/B59gCn2RO0KcQrvIbpYRnlgbkaHsx9C516zODZhy', 'cliente', 'usuarios/iFVabrRw7Ai3fYwGPR8qIFH4BnZ8nNTEcyNa3MwC.webp', '2026-06-23 07:46:15', '2026-06-24 08:20:12'),
(7, 'Carlos', 'Ramirez Torrez', '60258194', '987654321', 'Masculino', 'carlosrramirez@tienda.com', '$2y$12$5WSV6wfaBp6ZxgMwr5yP7O3wvWseZNjolR2CX3h8eqH.jD9kdOUXS', 'cliente', 'usuarios/N7sci31jc1YmpKyl5N2Ki8AdbKhS6Uenl1NxCzPm.webp', '2026-06-24 08:14:17', '2026-06-24 08:14:17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `users_dni_unique` (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD CONSTRAINT `detalle_pedidos_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `detalle_pedidos_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
