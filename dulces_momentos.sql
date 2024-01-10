-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2023 a las 22:42:39
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dulces_momentos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cli` char(4) NOT NULL,
  `nom_cli` varchar(30) NOT NULL,
  `Ape_cli` varchar(30) NOT NULL,
  `telf_cli` char(9) NOT NULL,
  `dni_cli` char(8) NOT NULL,
  `dir_cli` varchar(100) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` char(8) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `Categoria` varchar(30) NOT NULL,
  `Descrip` varchar(100) NOT NULL,
  `Medida` varchar(30) NOT NULL,
  `stock` int(11) NOT NULL,
  `Pre_uni` decimal(8,2) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `Categoria`, `Descrip`, `Medida`, `stock`, `Pre_uni`, `imagen`) VALUES
('1', 'Pastel de Chocolate', 'Pasteles', 'Delicioso pastel de chocolate', 'Grande', 10, 24.99, 'pastel_chocolate.png'),
('10', 'Éclairs de Café', 'Dulces', 'Éclairs rellenos de crema de café', 'Mediano', 14, 2.49, 'eclairs_cafe.png'),
('11', 'Tarta de Manzana', 'Tartas', 'Tarta de manzana casera con canela', 'Mediano', 5, 21.99, 'tarta_manzana.png'),
('12', 'Macarons Variados', 'Dulces', 'Macarons franceses en diferentes sabores', 'Pequeño', 30, 1.99, 'macarons_variados.png'),
('13', 'Rollitos de Canela', 'Panadería', 'Rollitos dulces de canela y azúcar glas', 'Pequeño', 12, 2.99, 'rollitos_canela.png'),
('14', 'Tarta de Fresa', 'Tartas', 'Tarta con fresas frescas y crema batida', 'Pequeño', 9, 26.99, 'tarta_fresa.png'),
('15', 'Cupcakes de Chocolate', 'Dulces', 'Cupcakes de chocolate con decoración divertida', 'Grande', 18, 2.49, 'cupcakes_chocolate.png'),
('16', 'Palmeras de Hojaldre', 'Panadería', 'Palmeritas de hojaldre crujientes y dulces', 'Grande', 25, 3.50, 'palmeras_hojaldre.png'),
('17', 'Cupcakes de Frambuesa', 'Dulces', 'Cupcakes de frambuesa con frosting de vainilla', 'Grande', 14, 2.99, 'cupcakes_frambuesa.png'),
('18', 'Tarta de Nuez', 'Tartas', 'Tarta de nuez con caramelo y crema batida', 'Mediano', 6, 23.99, 'tarta_nuez.png'),
('19', 'Brownies de Chocolate', 'Dulces', 'Brownies de chocolate con nueces y chocolate fundido', 'Pequeño', 20, 20.99, 'brownies_chocolate.png'),
('2', 'Cupcakes de Vainilla', 'Dulces', 'Cupcakes esponjosos de vainilla', 'Pequeño', 15, 2.99, 'cupcakes_vainilla.png'),
('20', 'Galletas de Avena y Pasas', 'Galletas', 'Galletas saludables de avena con pasas y canela', 'Mediano', 15, 1.49, 'galletas_avena_pasas.png'),
('3', 'Galletas de Mantequilla', 'Galletas', 'Galletas crujientes de mantequilla', 'Pequeño', 20, 1.99, 'galletas_mantequilla.png'),
('4', 'Tarta de Frutas', 'Tartas', 'Tarta fresca con una variedad de frutas', 'Grande', 8, 29.99, 'tarta_frutas.png'),
('5', 'Donas de Chocolate', 'Dulces', 'Donas suaves con glaseado de chocolate', 'Pequeño', 12, 1.49, 'donas_chocolate.png'),
('6', 'Croissants de Almendra', 'Panadería', 'Croissants crujientes con almendras', 'Grande', 18, 2.49, 'croissants_almendra.png'),
('7', 'Tartaleta de Limón', 'Tartas', 'Tartaleta refrescante de limón', 'Mediano', 6, 9.99, 'tartaleta_limón.png'),
('8', 'Magdalenas de Arándanos', 'Galletas', 'Magdalenas esponjosas con arándanos', 'Pequeño', 20, 3.99, 'magdalena.png'),
('9', 'Tarta de Queso', 'Tartas', 'Tarta de queso horneada con base de galleta', 'Grande', 7, 19.99, 'tarta_queso.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `user_correo` varchar(50) NOT NULL,
  `psw` varchar(30) NOT NULL,
  `admin` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `user_correo`, `psw`, `admin`) VALUES
(0, 'admin', 'superadmin', b'1'),
(1, 'usuario1', '123', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` char(8) NOT NULL,
  `nro_venta` char(8) NOT NULL,
  `fec_venta` date NOT NULL,
  `id_cli` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_deta`
--

CREATE TABLE `venta_deta` (
  `id_detalle` char(8) NOT NULL,
  `cant_producto` int(11) NOT NULL,
  `total_venta` decimal(9,2) NOT NULL,
  `id_producto` char(8) NOT NULL,
  `id_venta` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cli`),
  ADD KEY `Cliente_usuario` (`usuario_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `Venta_Cliente` (`id_cli`);

--
-- Indices de la tabla `venta_deta`
--
ALTER TABLE `venta_deta`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `Venta_deta_Producto` (`id_producto`),
  ADD KEY `Venta_deta_Venta` (`id_venta`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `Cliente_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `Venta_Cliente` FOREIGN KEY (`id_cli`) REFERENCES `cliente` (`id_cli`);

--
-- Filtros para la tabla `venta_deta`
--
ALTER TABLE `venta_deta`
  ADD CONSTRAINT `Venta_deta_Producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `Venta_deta_Venta` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
