-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-01-2024 a las 16:49:33
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
-- Base de datos: `universidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `id` int(11) NOT NULL,
  `asignatura` varchar(50) DEFAULT NULL,
  `profesor_id` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`id`, `asignatura`, `profesor_id`) VALUES
(3, 'Ingles', 'David Andres'),
(45, 'fisicam', ''),
(52, 'ssssaaaa', NULL),
(53, 'nueva clase ', NULL),
(59, 'fisicaaaaaaa', NULL),
(60, 'Inglesss', NULL),
(61, 'nueva clase x', NULL),
(63, 'xxxxxxxxxxxxxxxxxxxx', NULL),
(65, 'prueba mil', NULL),
(66, 'Canto', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `estado`) VALUES
(1, 'activo'),
(2, 'inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'administrador'),
(2, 'profesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `direccion` varchar(150) NOT NULL,
  `nacimiento` date NOT NULL,
  `rol_id` int(11) NOT NULL,
  `asignatura_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `estado`, `direccion`, `nacimiento`, `rol_id`, `asignatura_id`) VALUES
(99, 'David Andres', 'Ortega Pajaro', 'rotcarriaaallo_8@hotmail.com               ', '$2y$10$XjnHQ0Fri6Q8ayFiUINabuehwBRud0ejvdDGRtR2xAYCoSrcCYZTe', 1, 'prueba', '2023-12-27', 2, 60),
(100, 'Rotsen', 'xxx', 'a@gmail.com  ', '$2y$10$kbOELCqle/pzHNA4GAV7Ue5kCsid7IHCqAyDJ1t7qb3a2uH7.ZlT.', 1, 'prueba', '2023-12-13', 1, 45),
(101, 'derek', 'mmm', 'javy@mailinator.com', '$2y$10$pciVRlWEK0nEvFsPODoq..Slt.ceKUel6wG4sF5ajRez9QUiFfi9O', 1, 'prueba', '2023-12-27', 2, 59),
(102, 'aron', 'concha', 'asdasssssd@gmail.com', '$2y$10$UTHoy1aQu/Sr59sa3/5mt.vfQ8vZyYbnzGvoZpEv2EDMB8g.m1z4y', 0, 'prueba', '2024-01-05', 2, 65),
(103, 'nuevo usuario ', 'con clase', 'azzzz@gmail.com', '$2y$10$eYQkoi3msz/FHck.PIux1e9maf.oAZZQI9tT1oSJOXyHvYwLOgFne', 1, 'prueba', '2023-12-09', 2, 53),
(104, 'xxxx', 'xxxx', 'accc@gmail.com  ', '$2y$10$P2P7dn67qPijm0Y31QfF4eqSYtdMfwxEcQXbbidCnkpMm1X7Hy4Ge', 1, 'prueba', '2024-01-02', 2, 63),
(107, 'David Andres', 'Ortega Pajaro', 'david.ortega.pajaro1@gmail.com', '$2y$10$jfalu5XOEQO8smNGqiuHe.D4lcHuINkY5pR8x3OL5DB836T8gAJey', 1, 'prueba', '2023-12-27', 1, NULL),
(108, 'master', 'master', 'maestro@maestro', '$2y$10$DbgnAE7Wo45KWYj7roUDZ.gFHOtoDnFgIyHECh7TtTCQWqJSaDeKW', 1, 'La Consolata', '2024-01-01', 2, 61),
(111, 'xasda', 'aaaaaa', 'x@x', '$2y$10$lf/JlwOlAUB2Eh27ZVHPr.EU71T7Y3CI5GRFYT/oH0d.KFQnw/llO', 1, 'prueba', '2024-01-03', 2, NULL),
(114, 'Et ipsam ipsum aut ', 'Iste enim tempora au', 'kafaw@mailinator.com', '$2y$10$IH/v/t5sOcdWliY/Rekf9esK4ETzZbrwtcKGPhmqgNwFE9R4wSp.q', 1, 'Deleniti irure bland', '2020-10-11', 2, 52),
(115, 'Rotsen', 'Estefanel', 'rotcarrillo_8@hotmail.com ', '$2y$10$lvdojZuB2gQDvKnmEJVNSOOEQTIXPFxgX5QBZXHNxRUQNLhw.NFDq', 1, 'La Consolata', '2023-12-31', 2, 59),
(116, 'Yunis', 'Baron', 'yun@yun ', '$2y$10$7IVPs7Ycrc0fPjRZD7DJquwNHsEdhf02gSgg4k9Et4eqIY8dhZcRi', 0, 'varsovia', '2024-01-02', 2, 66),
(117, 'asd', 'xxx', 'adminaaa@admin', '$2y$10$47rOtoiAQmSOgfBIKUwRteZ3Ey.n6s3JMwyIcCq3/Vyn0niWv8hbO', 1, 'prueba', '2024-01-04', 2, NULL),
(118, 'David Andres', 'Ortega Pajaro', 'admin@admin', '$2y$10$nmdy5aRz1RV5HgrgHIcFUOaCaZKMm7jsWxdUF1lCxcpeaIKsalETK', 1, 'prueba', '2024-01-04', 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `asignatura` (`asignatura`),
  ADD UNIQUE KEY `asignatura_2` (`asignatura`),
  ADD UNIQUE KEY `asignatura_3` (`asignatura`),
  ADD UNIQUE KEY `asignatura_4` (`asignatura`),
  ADD KEY `profesor_id` (`profesor_id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estado` (`estado`),
  ADD KEY `estado_2` (`estado`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `usuario_roles_fk` (`rol_id`),
  ADD KEY `usuario_asignatura_fk` (`asignatura_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuario_asignatura_fk` FOREIGN KEY (`asignatura_id`) REFERENCES `asignaturas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_roles_fk` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
