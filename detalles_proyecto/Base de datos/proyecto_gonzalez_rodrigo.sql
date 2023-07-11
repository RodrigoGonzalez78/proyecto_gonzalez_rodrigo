-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 11-07-2023 a las 23:43:20
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_gonzalez_rodrigo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `street` text NOT NULL,
  `postal_code` int(11) NOT NULL,
  `neighborhood` text NOT NULL,
  `city` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `address`
--

INSERT INTO `address` (`id`, `street`, `postal_code`, `neighborhood`, `city`) VALUES
(1, '9 de Julio', 3400, 'Centro', 'Corrientes Capital'),
(5, 'Unne 376', 3400, 'Campus', 'Corrientes Capital');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Graficas'),
(2, 'Procesadores'),
(3, 'Discos Duros'),
(4, 'Ram');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consults`
--

CREATE TABLE `consults` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  `attended` varchar(2) NOT NULL DEFAULT 'NO',
  `archived` text NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `consults`
--

INSERT INTO `consults` (`id`, `name`, `email`, `description`, `attended`, `archived`) VALUES
(1, 'Rodrigo Gonzalez', 'algo@gmail.com', 'Hace envio al interior?', 'SI', 'SI'),
(2, 'Rodrigo', 'algo2@gmail.com', 'Cuanto es el monto de envio?', 'SI', 'SI'),
(3, 'Mario', 'algo3@gmail.com', 'Hay descuento?', 'SI', 'NO'),
(4, 'Matias', 'matias@gmail.com', 'Cuanto suele demorar el envio?', 'NO', 'NO'),
(5, 'Martin', 'martin@gmail.com', 'Hace envio a cordoba?', 'NO', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float(15,2) NOT NULL,
  `stock` int(5) NOT NULL,
  `description` varchar(600) NOT NULL,
  `down` varchar(2) NOT NULL DEFAULT 'NO',
  `image` text NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `description`, `down`, `image`, `id_categorie`) VALUES
(1, 'Gigabyte RTX 3060 TI', 170000.00, 28, 'Interfaz PCI-Express 4.0.\r\nBus de memoria: 256bit.\r\nCantidad de núcleos: 4864.\r\nResolución máxima: 7680x4320.\r\nCompatible con directX y openGL.\r\nRequiere de 750W de alimentación.\r\nCon iluminación LED blanca.\r\nPermite la conexión de hasta 4 pantallas ', 'NO', '1684817550_14860736a139a60c437c.jpg', 1),
(2, 'Asus RX 6800XT', 200000.00, 2, 'Motor gráfico: AMD Radeon RX 6800 XT.\r\nEstándar de bus: PCI Express 4.0.\r\nOpenGL 4.6.\r\nMemoria de video: GDDR6 de 16 GB.\r\nReloj del motor:\r\n  Modo OC: hasta 2340 MHz (Boost Clock) / 2090 MHz (Game Clock).\r\n  Modo de juego: hasta 2310 MHz (Boost Clock) / 2065 MHz (Game Clock).\r\n   Procesadores de flujo: 4608.\r\n    Velocidad de memoria: 16 Gbps.\r\n    Interfaz de memoria: 256 bits.', 'NO', '1684887136_24a514de93b2aa31c345.jpg', 1),
(3, 'GTX 1660 Super', 120000.00, 29, 'Interfaz PCI-Express 3.0.\r\n Bus de memoria: 192bit.\r\nCantidad de núcleos: 1408.\r\n Frecuencia boost del núcleo de 1785MHz.\r\n  Resolución máxima: 7680x4320.\r\n Compatible con directX y openGL.\r\n Requiere de 450W de alimentación.\r\n Con ventiladores duales de 90 mm que mantienen la temperatura equilibrada.\r\n  Preparada para realidad virtual.\r\n  Permite la conexión de hasta 4 pantallas simultáneas.\r\n   Formatos de conexión: 3 DisplayPort 1.4, HDMI 2.0b.\r\n   Incluye: Manual.\r\n    Ideal para trabajar a alta velocidad.', 'NO', '1684887663_d3b3b9748327c7c5fd02.jpg', 1),
(4, 'RAM DDR4 32GB PATRIOT', 60000.00, 40, 'Capacidad: 32Gb (2x16Gb).\r\n Tipo: DDR4 .\r\n Frecuencia: 3200 (PC4 25600).\r\n Tiempo 18-22-22-42.\r\n Latencia CAS: 18.\r\n Voltaje: 1.35V.\r\n  RGB: Sí.\r\n Modulos: 2.', 'NO', '1684934716_eab219563d365df90e10.png', 4),
(5, 'ADATA XPG SPECTRIX 16gb', 60000.00, 35, 'Speed: DDR4 3000MHz ~ 4133MHz.\r\n Module size: 8GB ~ 32GB *8GB:8GB?16GB (8GBx2) *16GB:16GB?32GB(16GBx2).\r\n Compatibility: DDR4 2666 CL 19-19-19 at 1.2V.\r\n  Operating temperature: 0°C to 85°C.\r\n Storage temperature: -20°C to 65°C.\r\n  Operating voltage: 1.35V ~ 1.4V.\r\n  Dimensions (L x W x H): 133.35 x 45.93 x 8.4mm (±1mm). ', 'NO', '1684934893_c5d69452d65c2a3e01ad.png', 4),
(6, 'RYZEN 5 4600G 4.2GHZ ZEN2', 75000.00, 29, ' Arquitectura:\r\n\"Zen 2\".\r\nNumero de núcleos de CPU:\r\n 6.\r\n\r\nNumero de hilos:\r\n12.\r\n\r\nMáx. Reloj Boost:\r\n Hasta 4,2 GHz.\r\n\r\n Reloj base:\r\n  3,7 GHz.\r\n\r\n Caché L3:\r\n  8MB.\r\n\r\nZócalo de CPU:\r\nAM4.\r\nTipo de memoria del sistema:\r\n DDR4.\r\nCanales de memoria:\r\n 2.\r\n Máx. Memoria:\r\n 128 GB.\r\nGráficos integrados:\r\n Sí. ', 'NO', '1684935435_c72ff5bfacbcb0dca7d3.jpg', 2),
(7, 'Procesador Ruzen 5', 150000.00, 3, 'algo 5', 'SI', '1685281631_01bf369075cb68f15416.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `descrition` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `profile`
--

INSERT INTO `profile` (`id`, `descrition`) VALUES
(1, 'Administrador '),
(2, 'Usuario normal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_price` double(15,2) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id`, `id_user`, `total_price`, `date`) VALUES
(1, 6, 440000.00, '2023-06-06'),
(2, 6, 340000.00, '2023-06-06'),
(3, 6, 4440000.00, '2023-06-07'),
(4, 6, 200000.00, '2023-06-07'),
(5, 6, 240000.00, '2023-06-10'),
(6, 6, 470000.00, '2023-06-11'),
(7, 6, 430000.00, '2023-06-11'),
(8, 11, 320000.00, '2023-06-11'),
(9, 6, 445000.00, '2023-06-12'),
(10, 6, 200000.00, '2023-06-12'),
(11, 6, 120000.00, '2023-06-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salesdetails`
--

CREATE TABLE `salesdetails` (
  `id` int(11) NOT NULL,
  `id_sale` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `price` double(15,2) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `salesdetails`
--

INSERT INTO `salesdetails` (`id`, `id_sale`, `count`, `price`, `id_product`) VALUES
(1, 1, 1, 200000.00, 2),
(2, 1, 2, 120000.00, 3),
(3, 2, 2, 170000.00, 1),
(4, 3, 2, 120000.00, 3),
(5, 3, 21, 200000.00, 2),
(6, 4, 1, 200000.00, 2),
(7, 5, 2, 120000.00, 3),
(8, 6, 1, 200000.00, 2),
(9, 6, 1, 60000.00, 5),
(10, 6, 2, 75000.00, 6),
(11, 6, 1, 60000.00, 4),
(12, 7, 1, 200000.00, 2),
(13, 7, 1, 170000.00, 1),
(14, 7, 1, 60000.00, 4),
(15, 8, 1, 200000.00, 2),
(16, 8, 1, 60000.00, 4),
(17, 8, 1, 60000.00, 5),
(18, 9, 1, 200000.00, 2),
(19, 9, 1, 170000.00, 1),
(20, 9, 1, 75000.00, 6),
(21, 10, 1, 200000.00, 2),
(22, 11, 1, 120000.00, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `down` text NOT NULL DEFAULT 'NO',
  `id_address` int(11) DEFAULT NULL,
  `id_profile` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `password`, `down`, `id_address`, `id_profile`) VALUES
(4, 'Rodrigo', 'Gonzalez', 'gonzlrodrigo@gmail.com', '$2y$10$PhBmcNrhO.iGSw4wgkqe7eKZvKIONsKdJCZeS/xz1f67HxoVwltLy', 'NO', NULL, 1),
(6, 'Maria', 'Montiels', 'maria@gmail.com', '$2y$10$Y2wAWUb4TUtdI8aWn3ialen8eLJxWLhlFhXPVGz7WgWZsqgmtFUPa', 'NO', 1, 2),
(7, 'Mario', 'Ramirez', 'mario@gmail.com', '$2y$10$qo6JXxAEXfQrDKMRTlAgaeU0o6swRoOx2GL6tnQudOpg4qfd2wC1.', 'NO', NULL, 2),
(8, 'Matias', 'Rodrigues', 'matias@gmail.com', '$2y$10$wqie7p2NbeMfIdJ2o4/tbu8H7QpFoKEdvpEcT5gOWeGJj7pXgWApe', 'NO', NULL, 1),
(9, 'Javier', 'Alonso', 'javier@gmail.com', '$2y$10$3gVBV1EoRXDyldVqKVIRy.7s6mLpf5aT8b99b9Fr2tyci7g8FzcCy', 'SI', NULL, 2),
(10, 'Mariela', 'Ruiz', 'algo@gmail.com', '$2y$10$d5c0hb0MsjbYMKwKF80/Key9VC8QmSzNtWDpGn/E.Q7XATot2uZKS', 'NO', NULL, 2),
(11, 'Oslvados', 'Lionel', 'lionel@gmail.com', '$2y$10$PJpLIcx77ZkycGW7nIRa2eEPCn7JkFwa9MY6KmYdmzxWBr2oUNWoS', 'NO', 5, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consults`
--
ALTER TABLE `consults`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Indices de la tabla `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `salesdetails`
--
ALTER TABLE `salesdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sale` (`id_sale`),
  ADD KEY `id_product` (`id_product`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access` (`id_profile`),
  ADD KEY `id_address` (`id_address`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `consults`
--
ALTER TABLE `consults`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `salesdetails`
--
ALTER TABLE `salesdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id`);

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `salesdetails`
--
ALTER TABLE `salesdetails`
  ADD CONSTRAINT `salesdetails_ibfk_1` FOREIGN KEY (`id_sale`) REFERENCES `sales` (`id`),
  ADD CONSTRAINT `salesdetails_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_profile`) REFERENCES `profile` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_address`) REFERENCES `address` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
