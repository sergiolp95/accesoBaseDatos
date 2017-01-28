-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-11-2016 a las 22:58:11
-- Versión del servidor: 5.6.31
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestionCursos`
--
CREATE DATABASE IF NOT EXISTS `gestionCursos` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `gestionCursos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
  `id_alumno` int(20) NOT NULL,
  `nombre_alumno` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_alumno` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_alumno` date NOT NULL,
  `sexo_alumno` int(11) NOT NULL,
  `direccion_alumno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_curso` int(20) NOT NULL,
  `edad_alumno` int(3) NOT NULL,
  `telefono_alumno` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `nombre_alumno`, `apellido_alumno`, `fecha_alumno`, `sexo_alumno`, `direccion_alumno`, `id_curso`, `edad_alumno`, `telefono_alumno`) VALUES
(2, 'Paco', 'Perez', '1996-02-29', 1, 'C/Olmedo nº23', 1, 20, 912266380),
(3, 'Andres', 'Garcia', '1995-06-13', 1, 'C/Ciruelita nº36', 2, 21, 911627739),
(4, 'Pilar', 'Rubio', '1992-10-17', 2, 'C/Luisiana', 1, 20, 914354774),
(5, 'Jaime', 'Rodriguez', '1993-02-14', 1, 'C/Virtudes nº263', 4, 19, 912735491),
(12, 'Josete', 'Sarmiento', '1994-10-13', 1, 'C/Fuji', 3, 19, 914354231);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE IF NOT EXISTS `asignaturas` (
  `id_asignatura` int(20) NOT NULL,
  `nombre_asignatura` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_asignatura` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `duracion_asignatura` int(4) NOT NULL,
  `id_profesor` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`id_asignatura`, `nombre_asignatura`, `descripcion_asignatura`, `duracion_asignatura`, `id_profesor`) VALUES
(1, 'Fol', 'Formacion y Orientacion Laboral', 150, 1),
(2, 'Web', 'Programacion Web', 300, 1),
(3, 'Interfaces', 'Diseño de interfaces', 300, 2),
(4, 'Nano-biotecnologia av', 'Biotecnologia avanzada ', 450, 3),
(8, 'Gastronomia', 'Elaboracion Gastronomica', 250, 9),
(9, 'Mecánica', 'Arreglo interno de maquinaria', 400, 11),
(10, 'Decoracion Interiores', 'Aprende a decorar interiores', 125, 10),
(11, 'Robótica', 'Programación del hardware', 650, 11),
(12, 'Equitacion', 'Montar a caballo', 50, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `id_curso` int(20) NOT NULL,
  `nombre_curso` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `imagen_curso` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nombre_curso`, `imagen_curso`) VALUES
(1, 'Office', 'office.jpg'),
(2, 'Imagen y sonido', 'sonido.jpg'),
(3, 'Diseño 3D', '3d.jpg'),
(4, 'Unity', 'unity.jpg'),
(5, 'Ingenieria Mecánica', 'curso_5.jpg'),
(6, 'Danza', 'curso_6.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_asignaturas`
--

CREATE TABLE IF NOT EXISTS `cursos_asignaturas` (
  `id_curso` int(20) NOT NULL,
  `id_asignatura` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cursos_asignaturas`
--

INSERT INTO `cursos_asignaturas` (`id_curso`, `id_asignatura`) VALUES
(1, 1),
(3, 1),
(4, 1),
(1, 2),
(2, 3),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 8),
(5, 9),
(6, 10),
(5, 11),
(6, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE IF NOT EXISTS `profesores` (
  `id_profesor` int(20) NOT NULL,
  `nombre_profesor` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_profesor` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `calle_profesor` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `numero_profesor` int(5) NOT NULL,
  `cp_profesor` int(5) NOT NULL,
  `localidad_profesor` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `provincia_profesor` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_profesor` date NOT NULL,
  `sexo_profesor` int(1) NOT NULL,
  `sueldo_profesor` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id_profesor`, `nombre_profesor`, `apellido_profesor`, `calle_profesor`, `numero_profesor`, `cp_profesor`, `localidad_profesor`, `provincia_profesor`, `fecha_profesor`, `sexo_profesor`, `sueldo_profesor`) VALUES
(1, 'Luis', 'Perez', 'C/Caoba', 13, 28046, 'Madrid', 'Madrid', '1965-10-23', 1, 1250),
(2, 'Mayte', 'Perez', 'C/Esmeralda', 45, 28065, 'Madrid', 'Madrid', '1969-10-12', 2, 1100),
(3, 'Pedrito', 'Martos', 'C/Walabi', 132, 28023, 'Madrid', 'Madrid', '1960-06-06', 1, 1500),
(9, 'Antonia', 'de la Vega', 'C/Hensu', 6, 28756, 'Madrid', 'Madrid', '1960-11-02', 2, 1050),
(10, 'Paquita', 'Velazquez', 'C/Florentina', 31, 23045, 'Sevilla', 'Sevilla', '1958-06-09', 2, 1350),
(11, 'Carlos', 'Bustamante', 'C/Igualadora', 235, 24875, 'Sevilla', 'Sevilla', '1962-02-12', 1, 1500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `nombre_usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contraseña_usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_usuario` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre_usuario`, `contraseña_usuario`, `id_usuario`) VALUES
('admin', 'admin', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumno`,`id_curso`),
  ADD KEY `fk_alumnos_cursos` (`id_curso`);

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`id_asignatura`,`id_profesor`),
  ADD KEY `fk_asignaturas_profesores` (`id_profesor`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `cursos_asignaturas`
--
ALTER TABLE `cursos_asignaturas`
  ADD PRIMARY KEY (`id_curso`,`id_asignatura`),
  ADD KEY `fk_cursos_asignaturas2` (`id_asignatura`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id_profesor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`,`nombre_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumno` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `id_asignatura` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id_profesor` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `fk_alumnos_cursos` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`);

--
-- Filtros para la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD CONSTRAINT `fk_asignaturas_profesores` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id_profesor`);

--
-- Filtros para la tabla `cursos_asignaturas`
--
ALTER TABLE `cursos_asignaturas`
  ADD CONSTRAINT `fk_cursos_asignaturas` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_cursos_asignaturas2` FOREIGN KEY (`id_asignatura`) REFERENCES `asignaturas` (`id_asignatura`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
