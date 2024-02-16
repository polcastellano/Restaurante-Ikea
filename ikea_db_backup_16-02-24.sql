-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-02-2024 a las 00:06:32
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ikea_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `nombre`) VALUES
(1, 'Plato'),
(2, 'Desayuno'),
(3, 'Entrante'),
(4, 'Pizza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `ingrediente_id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes_productos`
--

CREATE TABLE `ingredientes_productos` (
  `ingrediente_producto` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `ingrediente_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `pedido_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `precio_total` double NOT NULL,
  `propinas` double DEFAULT NULL,
  `puntos` int(11) NOT NULL,
  `puntos_usados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_ingredientes`
--

CREATE TABLE `pedidos_ingredientes` (
  `pedido_ingredientes` int(11) NOT NULL,
  `ingrediente_id` int(11) NOT NULL,
  `pedido_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_productos`
--

CREATE TABLE `pedidos_productos` (
  `pedido_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_reseñas`
--

CREATE TABLE `pedidos_reseñas` (
  `pedido_id` int(11) NOT NULL,
  `reseña_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `producto_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `precio` double NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`producto_id`, `categoria_id`, `nombre`, `descripcion`, `precio`, `img`) VALUES
(1, 1, 'Plato de pasta', 'Panette con salsa de tomate ecológica', 2.99, 'plato_pasta.png'),
(2, 1, 'Filete de salmón', 'Filete de salmón con cuscús, vegetales a la parrilla y yogur', 8.49, 'filete_salmon.png'),
(3, 1, 'Alitas de pollo ración 5 uds.', 'Alitas de pollo ración 5 uds. con salsa ', 3.99, 'alitas_pollo.png'),
(4, 1, 'Albóndigas de proteína', 'Albóndigas de proteína vegetal con puré ', 2.95, 'albondigas.png'),
(5, 1, 'Fish and chips', 'Fish and chips, pescado rebozado con patatas fritas', 7.49, 'fish_chips.png'),
(6, 1, 'Codillo asado', 'Codillo asado de cerdo en su jugo con guisantes', 10.49, 'codillo_asado.png'),
(7, 2, 'Desayuno especial', 'Pan tostado, pincho de tortilla de patatas, salchichas', 3.75, 'desayuno_especial.png'),
(8, 2, 'Desayuno serrano', 'Pan tostado con jamón serrano gran reserva, aceite', 2.5, 'desayuno_serrano.png'),
(9, 2, 'Pincho de tortilla de patata', 'Pincho de tortilla de patata y café UTZ y ecológico', 1.5, 'pincho_tortilla.png'),
(10, 2, 'Desayuno tradicional', 'Pan tostado con mantequilla, mermelada y café UTZ y ecológico', 2.95, 'desayuno_tradicional.png'),
(11, 3, 'Plato de jamón de cebo ibérico', 'Plato de jamón de cebo ibérico con picos de pan', 3.99, 'plato_jamon.png'),
(12, 3, 'Canapé de gambas', 'Canapé de gambas MSC con mezcla de lechugas, mayonesa', 3.99, 'canape_gambas.png'),
(13, 3, 'Ensalada de atún', 'Bol mix de lechugas, atún MSC, tomate cherry, cebolla', 2.99, 'ensalada_atun.png'),
(14, 3, 'Ensalada de pollo', 'Bol de mix de lechugas, pollo asado en tiras, tomates cherry', 2.99, 'ensalada_pollo.png'),
(15, 4, 'Pizza al corte champiñones', 'Pizza con jamón y champiñones', 1.99, 'pizza_champiñones.png'),
(16, 4, 'Pizza al corte albacha', 'Pizza de tomate y albacha', 1.99, 'pizza_albacha.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reseñas`
--

CREATE TABLE `reseñas` (
  `reseña_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `valoracion` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `permisos` int(1) NOT NULL,
  `password` varchar(100) NOT NULL,
  `puntos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `nombre`, `email`, `permisos`, `password`, `puntos`) VALUES
(1, 'Pol Castellano', 'pol@gmail.com', 1, '$2y$10$slQJ4DdD397PyjrR259LV.GHir49dE3tBYM5QwjXPr5GqC0zcxql.', 3525),
(2, 'Adria Lasala', 'adria@gmail.com', 0, '$2y$10$Cy2oNWlRQXUDSVufsYmBwOXiOADzaQHeYTyn3Ovbip2fRP7PasUAW', 846),
(18, 'Barbara', 'barbara@gmail.com', 0, '$2y$10$7tB8rFE5ts4yn93ndOLTKuLUQFV0cizClMsteJlK9lcVGRJyX8Z56', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`ingrediente_id`);

--
-- Indices de la tabla `ingredientes_productos`
--
ALTER TABLE `ingredientes_productos`
  ADD PRIMARY KEY (`ingrediente_producto`),
  ADD KEY `FK_IN_PR_PROD_ID` (`producto_id`),
  ADD KEY `FK_IN_IN_INGR_ID` (`ingrediente_id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`pedido_id`),
  ADD KEY `FK_PE_US_USU_ID` (`usuario_id`);

--
-- Indices de la tabla `pedidos_ingredientes`
--
ALTER TABLE `pedidos_ingredientes`
  ADD PRIMARY KEY (`pedido_ingredientes`),
  ADD KEY `FK_PEIN_IN_INGR_ID` (`ingrediente_id`),
  ADD KEY `FK_PEIN_PE_PED_PRO` (`pedido_producto`);

--
-- Indices de la tabla `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  ADD KEY `FK_PEPR_PED_PED_ID` (`pedido_id`),
  ADD KEY `FK_PEPR_PRO_PROD_ID` (`producto_id`);

--
-- Indices de la tabla `pedidos_reseñas`
--
ALTER TABLE `pedidos_reseñas`
  ADD KEY `FK_PEDRES_PED_PED_ID` (`pedido_id`),
  ADD KEY `FK_PEDRES_RES_RES_ID` (`reseña_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `FK_PR_CA_CAT_ID` (`categoria_id`);

--
-- Indices de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  ADD PRIMARY KEY (`reseña_id`),
  ADD KEY `FK_RES_USU_USU_ID` (`usuario_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `pedido_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  MODIFY `reseña_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos_reseñas`
--
ALTER TABLE `pedidos_reseñas`
  ADD CONSTRAINT `FK_PEDRES_PED_PED_ID` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`pedido_id`),
  ADD CONSTRAINT `FK_PEDRES_RES_RES_ID` FOREIGN KEY (`reseña_id`) REFERENCES `reseñas` (`reseña_id`);

--
-- Filtros para la tabla `reseñas`
--
ALTER TABLE `reseñas`
  ADD CONSTRAINT `FK_RES_USU_USU_ID` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
