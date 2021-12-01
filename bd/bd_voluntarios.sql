-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2021 a las 17:14:24
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_voluntarios`
--
CREATE DATABASE IF NOT EXISTS `bd_voluntarios` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_voluntarios`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `nombre_admin` varchar(50) NOT NULL,
  `apellido_admin` varchar(50) NOT NULL,
  `correo_admin` varchar(50) NOT NULL,
  `pass_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nombre_admin`, `apellido_admin`, `correo_admin`, `pass_admin`) VALUES
(1, 'Diego', 'Soledispa', 'diegosoledispa@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'Cristian', 'Guerrero', 'cristianguerrero@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_evento`
--

CREATE TABLE `tbl_evento` (
  `id_evento` int(11) NOT NULL,
  `nombre_evento` varchar(50) NOT NULL,
  `lugar_evento` varchar(50) NOT NULL,
  `fecha_inicio_evento` date NOT NULL,
  `fecha_final_evento` date NOT NULL,
  `descripcion` text NOT NULL,
  `disponibilidad_evento` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_evento`
--

INSERT INTO `tbl_evento` (`id_evento`, `nombre_evento`, `lugar_evento`, `fecha_inicio_evento`, `fecha_final_evento`, `descripcion`, `disponibilidad_evento`) VALUES
(3, 'Campaña recogida alimentos', 'Ermita Bellvitge', '2021-11-25', '2021-11-28', 'Campaña recogida alimentos 2021', 1),
(4, 'Cursa solidaria', 'Feixa Llarga', '2021-11-26', '2021-11-29', 'Cursa solidaria 2021', 1),
(5, 'Campaña donacion sangre', 'Av europa', '2021-11-27', '2021-12-01', 'Campaña donacion sangre 2021', 0),
(8, 'Algo', 'Bellvitge', '2021-12-04', '2021-12-11', '2345', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_evento_voluntario`
--

CREATE TABLE `tbl_evento_voluntario` (
  `id_evento_voluntario` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `id_voluntario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_evento_voluntario`
--

INSERT INTO `tbl_evento_voluntario` (`id_evento_voluntario`, `id_evento`, `id_voluntario`) VALUES
(1, 8, 4),
(2, 5, 8),
(3, 5, 26),
(4, 5, 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_voluntario`
--

CREATE TABLE `tbl_voluntario` (
  `id_voluntario` int(11) NOT NULL,
  `nombre_voluntario` varchar(50) NOT NULL,
  `apellido_voluntario` varchar(50) NOT NULL,
  `correo_voluntario` varchar(50) NOT NULL,
  `dni_voluntario` varchar(9) NOT NULL,
  `edad_voluntario` int(3) NOT NULL,
  `telf_voluntario` int(9) NOT NULL,
  `habilitado_voluntario` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_voluntario`
--

INSERT INTO `tbl_voluntario` (`id_voluntario`, `nombre_voluntario`, `apellido_voluntario`, `correo_voluntario`, `dni_voluntario`, `edad_voluntario`, `telf_voluntario`, `habilitado_voluntario`) VALUES
(1, 'Carlos', 'Piedras', 'carlospiedras@gmail.com', '42757394V', 21, 646735753, 1),
(2, 'Miquel', 'Gras', 'miquelgras@gmail.com', '42757386R', 20, 646739453, 1),
(3, 'Pepe', 'Garcia', 'pepegarcia@gmail.com', '57846735N', 50, 743456324, 1),
(4, 'prueba', 'prueba', 'prueba@gmail.com', '46488728P', 22, 678356976, 1),
(8, 'Javi', 'Calderon', 'javicalderon@gmail.com', '57846735N', 22, 654345654, 1),
(26, 'Carla', 'Ortega', 'carlaortega@gmail.com', '47663672L', 23, 675876543, 1),
(27, 'Pedro', 'Lopez', 'pedrolopez@gmail.com', '46478765J', 40, 675876354, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `tbl_evento`
--
ALTER TABLE `tbl_evento`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indices de la tabla `tbl_evento_voluntario`
--
ALTER TABLE `tbl_evento_voluntario`
  ADD PRIMARY KEY (`id_evento_voluntario`),
  ADD KEY `fk_tbl_evento_tbl_voluntario` (`id_evento`),
  ADD KEY `fk_tbl_voluntario_tbl_evento` (`id_voluntario`);

--
-- Indices de la tabla `tbl_voluntario`
--
ALTER TABLE `tbl_voluntario`
  ADD PRIMARY KEY (`id_voluntario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_evento`
--
ALTER TABLE `tbl_evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_evento_voluntario`
--
ALTER TABLE `tbl_evento_voluntario`
  MODIFY `id_evento_voluntario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_voluntario`
--
ALTER TABLE `tbl_voluntario`
  MODIFY `id_voluntario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_evento_voluntario`
--
ALTER TABLE `tbl_evento_voluntario`
  ADD CONSTRAINT `fk_tbl_evento_tbl_voluntario` FOREIGN KEY (`id_evento`) REFERENCES `tbl_evento` (`id_evento`),
  ADD CONSTRAINT `fk_tbl_voluntario_tbl_evento` FOREIGN KEY (`id_voluntario`) REFERENCES `tbl_voluntario` (`id_voluntario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
