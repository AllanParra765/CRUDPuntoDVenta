-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 24-05-2023 a las 00:17:54
-- Versión del servidor: 5.7.39
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbProducto`
--

CREATE TABLE `tbProducto` (
  `id_producto` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `nombre_producto` varchar(100) DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `precio_proveedor` double DEFAULT NULL,
  `precio_publico` double DEFAULT NULL,
  `imagenProducto` varchar(150) DEFAULT NULL,
  `fk_idUsuario` int(11) DEFAULT NULL,
  `id_producto_codigo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbProducto`
--

INSERT INTO `tbProducto` (`id_producto`, `fecha_ingreso`, `nombre_producto`, `cantidad`, `precio_proveedor`, `precio_publico`, `imagenProducto`, `fk_idUsuario`, `id_producto_codigo`) VALUES
(1, '2022-02-12', 'lonches', 39, 20.9, 24.9, 'no tenemos', 1, '123456789098'),
(2, '2023-05-22', 'Alitas', 12, 10, 20, 'imagenProducto', 1, '1234567890102');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_loginusuario`
--

CREATE TABLE `tb_loginusuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `tipo_usuario` varchar(20) NOT NULL,
  `contrasena` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_loginusuario`
--

INSERT INTO `tb_loginusuario` (`id_usuario`, `usuario`, `tipo_usuario`, `contrasena`) VALUES
(1, 'allan', 'Administrador', '1234'),
(2, 'allan2', 'Usuario', '1234'),
(3, 'Ali', 'Administrador', '8c31b65bdecdc9f18b695d7318186fd1feed690d'),//contraseña encriptada 12345 Ali
(4, 'Allan765', 'Administrador', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbProducto`
--
ALTER TABLE `tbProducto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `tb_loginusuario`
--
ALTER TABLE `tb_loginusuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbProducto`
--
ALTER TABLE `tbProducto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_loginusuario`
--
ALTER TABLE `tb_loginusuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
