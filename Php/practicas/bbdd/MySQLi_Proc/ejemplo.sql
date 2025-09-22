-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-09-2023 a las 17:13:01
-- Versión del servidor: 8.0.34-0ubuntu0.22.04.1
-- Versión de PHP: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ejemplo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `dni` varchar(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `clave` int NOT NULL,
  `tfno` varchar(20) NOT NULL
) ;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`dni`, `nombre`, `clave`, `tfno`) VALUES
('05K', 'Noelia', 13, '661 022'),
('135T', 'Cristina', 123, '12894'),
('13H', 'Jose', 1234, '2389392'),
('14F', 'Jesús', 321, '2387272'),
('18U', 'Víctor', 4321, '23892'),
('19I', 'Juán', 3212, '35345'),
('1A', 'Ian', 123, '12389'),
('1E', 'Marta', 1234, '243'),
('20Z', 'Diego', 1234, '2723832'),
('2B', 'Alberto', 123, '2'),
('3C', 'Álvaro', 1234, '3'),
('4D', 'Marco', 1234, '555 8592'),
('5E', 'Jaime', 1234, '555 425423'),
('5ER', 'Antonio', 123, '5'),
('6F', 'Carlos', 1234, '6'),
('7G', 'Manuel', 1234, '7'),
('8H', 'Sergio', 123, '348738');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolesasignados`
--

CREATE TABLE `rolesasignados` (
  `idra` int NOT NULL,
  `DNIRol` varchar(10) NOT NULL,
  `idRol` int NOT NULL
) ;

--
-- Volcado de datos para la tabla `rolesasignados`
--

INSERT INTO `rolesasignados` (`idra`, `DNIRol`, `idRol`) VALUES
(1, '4D', 1),
(2, '3C', 2),
(3, '3C', 1),
(4, '2B', 1),
(5, '1A', 1),
(6, '1A', 2),
(7, '5E', 1),
(8, '5E', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rolesasignados`
--
ALTER TABLE `rolesasignados`
  ADD PRIMARY KEY (`idra`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `rolesasignados`
--
ALTER TABLE `rolesasignados`
  MODIFY `idra` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
