-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2020 a las 05:41:35
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `estetica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(200) NOT NULL,
  `direccion_cliente` varchar(200) NOT NULL,
  `localidad_cliente` varchar(200) NOT NULL,
  `telefono_cliente` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `direccion_cliente`, `localidad_cliente`, `telefono_cliente`) VALUES
(25, 'damian', 'tuns', 'chim', '9994-65-45-34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `descripcion_producto` varchar(200) NOT NULL,
  `precio` int(11) NOT NULL,
  `id_promocion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `descripcion_producto`, `precio`, `id_promocion`) VALUES
(1, 'Tinte', 'Tinte color, marca', 150, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `id_promocion` int(11) NOT NULL,
  `Descuento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`id_promocion`, `Descuento`) VALUES
(1, 10),
(2, 20),
(3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_prov` int(11) NOT NULL,
  `nombre_prov` varchar(100) NOT NULL,
  `direccion_prov` varchar(100) NOT NULL,
  `telefono_prov` int(11) NOT NULL,
  `email_prov` varchar(100) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_prov`, `nombre_prov`, `direccion_prov`, `telefono_prov`, `email_prov`, `id_producto`) VALUES
(1, 'nombre', 'direccion', 99999, 'gmail', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'Dueña'),
(2, 'Encargada'),
(3, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicios` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `tipo_servicio` varchar(100) NOT NULL,
  `fecha_servicio` datetime NOT NULL,
  `precio_servicio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicios`, `id_cliente`, `tipo_servicio`, `fecha_servicio`, `precio_servicio`) VALUES
(32, 25, 'wqjwh', '2020-11-23 17:31:00', '12'),
(33, 25, 'corte 2', '2020-11-23 19:09:00', '120');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(200) NOT NULL,
  `contraseña_usuario` varchar(200) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `contraseña_usuario`, `id_rol`) VALUES
(1, 'damian', 'admin', 1),
(2241, 'js', 'js', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventaproductos`
--

CREATE TABLE `ventaproductos` (
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_producto` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventaproductos`
--

INSERT INTO `ventaproductos` (`id_venta`, `id_producto`, `cantidad_producto`, `total`, `id_cliente`, `fecha`) VALUES
(15, 1, 4, 540, 25, '2020-11-24 19:10:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_promocion` (`id_promocion`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`id_promocion`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicios`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `ventaproductos`
--
ALTER TABLE `ventaproductos`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_producto` (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `id_promocion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2242;

--
-- AUTO_INCREMENT de la tabla `ventaproductos`
--
ALTER TABLE `ventaproductos`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_promocion`) REFERENCES `promociones` (`id_promocion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventaproductos`
--
ALTER TABLE `ventaproductos`
  ADD CONSTRAINT `ventaproductos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventaproductos_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
