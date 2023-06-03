-- phpMyAdmin SQL Dump
-- version 5.1.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql-artemisa.alwaysdata.net
-- Generation Time: Jun 03, 2023 at 02:00 PM
-- Server version: 10.6.11-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artemisa_eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(255) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Power'),
(2, 'Progressive'),
(3, 'Industrial'),
(8, 'Grunge'),
(9, 'Hard Rock'),
(10, 'Nu Metal'),
(11, 'Trash');

-- --------------------------------------------------------

--
-- Table structure for table `lineas_pedidos`
--

CREATE TABLE `lineas_pedidos` (
  `id` int(255) NOT NULL,
  `pedido_id` int(255) NOT NULL,
  `producto_id` int(255) NOT NULL,
  `unidades` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lineas_pedidos`
--

INSERT INTO `lineas_pedidos` (`id`, `pedido_id`, `producto_id`, `unidades`) VALUES
(1, 3, 6, 2),
(2, 3, 9, 1),
(3, 4, 6, 2),
(4, 4, 9, 1),
(5, 5, 6, 2),
(6, 5, 9, 1),
(7, 6, 6, 2),
(8, 6, 9, 1),
(9, 7, 6, 2),
(10, 7, 9, 1),
(11, 8, 6, 2),
(12, 8, 9, 1),
(13, 9, 6, 2),
(14, 9, 9, 1),
(15, 10, 6, 2),
(16, 10, 9, 1),
(17, 11, 6, 2),
(18, 11, 9, 1),
(19, 12, 9, 1),
(20, 13, 9, 1),
(21, 14, 6, 2),
(22, 14, 9, 2),
(23, 15, 9, 5),
(24, 15, 8, 3),
(25, 16, 8, 3),
(26, 16, 6, 5),
(27, 17, 9, 1),
(28, 18, 9, 4),
(29, 18, 6, 3),
(30, 19, 20, 2),
(31, 19, 13, 1),
(32, 20, 24, 2),
(33, 20, 22, 1),
(34, 21, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(255) NOT NULL,
  `usuario_id` int(255) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `costo` float(200,2) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pedidos`
--

INSERT INTO `pedidos` (`id`, `usuario_id`, `provincia`, `localidad`, `direccion`, `costo`, `estado`, `fecha`, `hora`) VALUES
(3, 8, 'CIUDAD AUTONOMA DE Bs As', 'liniers', 'moreno 2345', 13400.00, 'confirmado', '2023-04-13', '17:54:37'),
(4, 8, 'CIUDAD AUTONOMA DE Bs As', 'liniers', 'moreno 2345', 13400.00, 'confirmado', '2023-04-13', '18:22:55'),
(5, 8, 'FORMOSA', 'tryrt', 'moreno', 13400.00, 'confirmado', '2023-04-13', '18:24:51'),
(6, 8, 'LA RIOJA', 'vcxxcv', 'vxcxv', 13400.00, 'confirmado', '2023-04-13', '18:26:00'),
(7, 8, 'LA RIOJA', 'vcxxcv', 'vxcxv', 13400.00, 'confirmado', '2023-04-13', '18:26:46'),
(8, 8, 'RIO NEGRO', 'liniers', 'moreno', 13400.00, 'confirmado', '2023-04-13', '18:27:08'),
(9, 8, 'LA RIOJA', 'dsf', 'moreno', 13400.00, 'confirmado', '2023-04-13', '18:29:10'),
(10, 8, 'LA PAMPA', 'tryrt', 'sdf', 13400.00, 'confirmado', '2023-04-13', '18:31:15'),
(11, 8, 'LA PAMPA', 'tryrt', 'tryrt', 13400.00, 'confirmado', '2023-04-13', '18:31:59'),
(12, 8, 'SALTA', 'liniers', 'moreno', 4000.00, 'listo', '2023-04-14', '16:33:20'),
(13, 8, 'MENDOZA', 'tryrt', 'moreno', 4000.00, 'enviado', '2023-04-17', '18:02:37'),
(14, 8, 'LA RIOJA', 'liniers', 'moreno 2345', 17400.00, 'confirmado', '2023-04-22', '10:13:34'),
(15, 8, 'LA RIOJA', 'liniers', 'moreno 2345', 30710.00, 'confirmado', '2023-05-06', '10:58:11'),
(16, 8, 'BUENOS AIRES', 'Buenos Aires', 'Villegas 2377', 34210.00, 'confirmado', '2023-05-08', '19:43:51'),
(17, 8, 'BUENOS AIRES', 'Buenos Aires', 'Villegas 2377', 4000.00, 'confirmado', '2023-05-08', '19:51:32'),
(18, 8, 'BUENOS AIRES', 'Buenos Aires', 'Villegas 2377', 30100.00, 'preparacion', '2023-05-08', '19:55:21'),
(19, 10, 'CIUDAD AUTONOMA DE Bs As', 'San Martin', 'Irala 3476', 17100.00, 'preparacion', '2023-05-18', '17:54:52'),
(20, 10, 'CIUDAD AUTONOMA DE Bs As', 'Munro', 'Marcon 123456', 17600.00, 'confirmado', '2023-05-18', '23:30:39'),
(21, 13, 'BUENOS AIRES', 'Lomas del Mirador', 'colon 2194', 5900.00, 'confirmado', '2023-05-22', '21:02:36');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(255) NOT NULL,
  `categoria_id` int(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` float(100,2) NOT NULL,
  `stock` int(255) NOT NULL,
  `oferta` varchar(2) DEFAULT NULL,
  `fecha` date NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `categoria_id`, `nombre`, `descripcion`, `precio`, `stock`, `oferta`, `fecha`, `imagen`) VALUES
(6, 11, 'Camiseta Slayer', 'Color Negra, estamapada en rojo', 4700.00, 1000, NULL, '2023-03-28', 'slayer.jpeg'),
(8, 10, 'Camiseta Deftones', 'Color Negro, estampado en Blanco', 3570.00, 1000, NULL, '2023-03-28', 'deftones.jpg'),
(9, 9, 'Camiseta Ozzy', 'Negra, estampada ', 4000.00, 1000, NULL, '2023-03-28', 'ozzy2.jpg'),
(10, 11, 'Camiseta Metallica', 'Manga Corta Estampada', 6500.00, 1000, NULL, '2023-05-18', 'metallica.jpg'),
(11, 11, 'Camiseta Megadeth', 'Manga Corta Estampada', 6800.00, 1200, NULL, '2023-05-18', 'megadeth.jpg'),
(12, 11, 'Camiseta Testament', 'Manga corta Estampada', 5200.00, 900, NULL, '2023-05-18', 'testament.jpg'),
(13, 9, 'Camiseta AC/DC', 'Manga Corta, Estamapada', 5900.00, 1398, NULL, '2023-05-18', 'acdc.jpg'),
(14, 10, 'Camiseta Slipknot', 'Manga Corta, Estampada', 4800.00, 800, NULL, '2023-05-18', 'slipknot.jpg'),
(15, 10, 'Camiseta System', 'Manga corta, Estampada Negra', 8200.00, 450, NULL, '2023-05-18', 'system.jpg'),
(16, 9, 'Camiseta Motorhead', 'Manga Corta, Estampada', 4600.00, 650, NULL, '2023-05-18', 'motorhead.jpg'),
(17, 9, 'Camiseta Maiden', 'Manga Corta, Estampada', 6800.00, 850, NULL, '2023-05-18', 'maiden2.jpg'),
(18, 8, 'Camiseta Nirvana', 'Manga Corta, Estampada', 6200.00, 980, NULL, '2023-05-18', 'nirvana.jpg'),
(19, 8, 'Camiseta Alice', 'Manga Corta, Estampada', 6300.00, 740, NULL, '2023-05-18', 'alice.jpg'),
(20, 8, 'Camiseta Pearl Jam', 'Manga Corta, Estampada', 5600.00, 638, NULL, '2023-05-18', 'pearljam.jpg'),
(21, 3, 'Camiseta Rammstein', 'Manga Corta, Estampada', 7500.00, 350, NULL, '2023-05-18', 'rammstein.jpg'),
(22, 2, 'Camiseta Tool', 'Manga Corta, Estampada', 4800.00, 849, NULL, '2023-05-18', 'tool.jpg'),
(23, 2, 'Camiseta Zeppelin', 'Manga Corta, Estampada', 8300.00, 350, NULL, '2023-05-18', 'zepelin.jpg'),
(24, 2, 'Camiseta Pink Floyd', 'Manga Corta, Estampada', 6400.00, 698, NULL, '2023-05-18', 'pinkfloyd.jpg'),
(25, 1, 'Camiseta Kamelot', 'Manga Corta, Estampada Negra', 3800.00, 320, NULL, '2023-05-18', 'kamelot.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(20) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `rol`, `imagen`) VALUES
(2, 'Pepe', 'Pandolfo', 'pepe@hotmail.com', '$2y$04$UTvY2cK0IUrcpBarfsMxve5/TzH9mdQqeEdyhbwViTSvvU0Dw0lFa', 'user', 'null'),
(5, 'fgdfgdf', 'dfgdfg', 'dsfdsgds@fgdfg.com', '$2y$04$k8TaCNEZL0lf6wqHZRzSfuN3Zxc.bx2xOWn.4GdU4cFs/x9bDJBcm', 'user', 'null'),
(7, 'pepe', 'parada', 'pepe@pepe.com', '$2y$04$1BXtViIlup9lx8MnAIIvee5FzMLgDQOUi4YeFngemLdx7KpVcM22O', 'user', 'null'),
(8, 'Hernan', 'San Martin', 'her_san_martin@hotmail.com', '$2y$04$fmPe56HjO3l/8SePHBKn6O742iv/EQu6nLVri98Ji0DY4ABf5uNDe', 'admin', 'null'),
(9, 'User', 'User', 'user@user.com', '$2y$04$kEvnbnbipNjJrcJnb9S3d.VwEzHwneWrIgH54juK0igx95Uk5lWWy', 'user', 'null'),
(10, 'Romina', 'Diaz', 'romi@hotmail.com', '$2y$04$4nI.c7/UPofVNPaFQ5juSOS7vRS.QAWYCz2fIUKoGOZs.LV7E5VMu', 'user', 'null'),
(12, 'Admin', 'Admin', 'admin@admin.com', '$2y$04$lIhJ8VdSzJm3TSuZ7JIwk.cj6xM7u.7Z3Jm7AkR/..FICBJc/vWfy', 'admin', 'null'),
(13, 'Rosa', 'Meltrozo', 'santy_tapia@yahoo.com.ar', '$2y$04$403LPjcrCvo737DM6M.Y2.S6pCWp4Df3HMNvp4O.G3KxPyBi2VSbO', 'user', 'null');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lineas_pedidos`
--
ALTER TABLE `lineas_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_linea_pedido` (`pedido_id`),
  ADD KEY `fk_linea_roducto` (`producto_id`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pedido_usuario` (`usuario_id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_producto_categoria` (`categoria_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `lineas_pedidos`
--
ALTER TABLE `lineas_pedidos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lineas_pedidos`
--
ALTER TABLE `lineas_pedidos`
  ADD CONSTRAINT `fk_linea_pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `fk_linea_roducto` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Constraints for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedido_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
