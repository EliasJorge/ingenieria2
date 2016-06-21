-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2016 a las 18:40:38
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `couchinn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donaciones`
--

CREATE TABLE `donaciones` (
  `id_donacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fecha_donacion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(11) NOT NULL,
  `id_publicacion` int(11) NOT NULL,
  `imagen` mediumblob NOT NULL,
  `tipo_imagen` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_localidades`
--

CREATE TABLE `lista_localidades` (
  `id` int(11) NOT NULL,
  `relacion` int(11) NOT NULL,
  `localidad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_provincias`
--

CREATE TABLE `lista_provincias` (
  `id` int(10) NOT NULL,
  `provincia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id_publicacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `id_provincia` int(11) NOT NULL,
  `id_localidad` int(11) NOT NULL,
  `capacidad` int(10) NOT NULL,
  `disp_desde` varchar(255) NOT NULL,
  `disp_hasta` varchar(255) NOT NULL,
  `id_talojamiento` int(11) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `id_reportes` int(11) NOT NULL,
  `id_publicacion` int(11) NOT NULL,
  `comentario` varchar(100) NOT NULL DEFAULT 'Sin comentarios'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_reservas` int(11) NOT NULL,
  `id_publicacion` int(11) NOT NULL,
  `id_usuario` int(10) NOT NULL COMMENT 'El que hizo la reserva',
  `estado` varchar(20) NOT NULL COMMENT 'Estado de la reserva(activo/rechazado/aceptado/cancelado)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_alojamiento`
--

CREATE TABLE `tipo_alojamiento` (
  `id_talojamiento` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contrasenia` varchar(60) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `foto` mediumblob NOT NULL,
  `tipo_foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD PRIMARY KEY (`id_donacion`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`,`id_publicacion`);

--
-- Indices de la tabla `lista_localidades`
--
ALTER TABLE `lista_localidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lista_provincias`
--
ALTER TABLE `lista_provincias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id_publicacion`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id_reportes`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reservas`);

--
-- Indices de la tabla `tipo_alojamiento`
--
ALTER TABLE `tipo_alojamiento`
  ADD PRIMARY KEY (`id_talojamiento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  MODIFY `id_donacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `lista_localidades`
--
ALTER TABLE `lista_localidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `lista_provincias`
--
ALTER TABLE `lista_provincias`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id_publicacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id_reportes` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reservas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_alojamiento`
--
ALTER TABLE `tipo_alojamiento`
  MODIFY `id_talojamiento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
