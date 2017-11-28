-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2017 a las 05:58:49
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jornadas_deportivas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arbitro`
--

CREATE TABLE `arbitro` (
  `cedula` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `deporte` int(11) DEFAULT NULL,
  `idpartido` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `arbitro`
--

INSERT INTO `arbitro` (`cedula`, `nombre`, `apellido`, `deporte`, `idpartido`) VALUES
('1090678736', 'Mario', 'Jimenez', 1, 1),
('1090786365', 'Carlos', 'Ortega', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deporte`
--

CREATE TABLE `deporte` (
  `idDeporte` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cantidadJugadores` int(11) NOT NULL,
  `idJornada` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `deporte`
--

INSERT INTO `deporte` (`idDeporte`, `nombre`, `cantidadJugadores`, `idJornada`) VALUES
(1, 'Baloncesto', 10, 1),
(2, 'MicroFutbol', 5, 1),
(3, 'Voleibol', 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportista`
--

CREATE TABLE `deportista` (
  `codigo` varchar(7) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `edad` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `genero` varchar(1) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `idEquipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `deportista`
--

INSERT INTO `deportista` (`codigo`, `nombre`, `apellido`, `edad`, `genero`, `correo`, `idEquipo`) VALUES
('1150973', 'Bayardo', 'Pineda', '22', 'M', 'bayardo@hotmail.com', 1),
('1150976', 'Franklin', 'Vasquez', '22', 'M', 'franklin@hotmail.com', 1),
('1150982', 'Julian', 'Olarte', '22', 'M', 'julianOlarte@hotmail.com', 2),
('1150983', 'Edgar', 'Diaz', '23', 'M', 'edgar@hotmailcom', NULL),
('1150984', 'William', 'Velandia', '22', 'M', 'williamhenryvv@ufps.edu.co', NULL),
('1151021', 'Manuel', 'Gallardo', '22', 'M', 'mdario@gmail.com', 2);

--
-- Disparadores `deportista`
--
DELIMITER $$
CREATE TRIGGER `tr_deportista_equipo` AFTER INSERT ON `deportista` FOR EACH ROW UPDATE equipo e SET e.cantidadJugador= e.cantidadJugador+1
WHERE e.idEquipo = new.idEquipo
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_deportista_equipoDELETE` AFTER DELETE ON `deportista` FOR EACH ROW UPDATE equipo e SET e.cantidadJugador= e.cantidadJugador-1
WHERE e.idEquipo = old.idEquipo
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `idEquipo` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cantidadJugador` int(11) DEFAULT '0',
  `idDeporte` int(11) DEFAULT NULL,
  `puntos` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`idEquipo`, `nombre`, `cantidadJugador`, `idDeporte`, `puntos`) VALUES
(1, 'Capirusos', 2, 1, 10),
(2, 'Nullpointer', 2, 1, 5),
(3, 'Cucuta Deportivo', 0, 1, 0),
(4, 'Las Aguilas', 0, 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornadadeportiva`
--

CREATE TABLE `jornadadeportiva` (
  `idJornada` int(11) NOT NULL,
  `semestre` varchar(1) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ano` varchar(4) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaFinal` date DEFAULT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `jornadadeportiva`
--

INSERT INTO `jornadadeportiva` (`idJornada`, `semestre`, `ano`, `fechaInicio`, `fechaFinal`, `descripcion`) VALUES
(1, '2', '2017', '2017-11-06', '2017-11-13', 'Jornada Deportiva II-2017'),
(2, '1', '2018', '2018-03-05', '2018-03-12', 'Jornada Deportiva I-2018');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partido`
--

CREATE TABLE `partido` (
  `idpartido` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `lugar` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fase` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `local` int(11) NOT NULL,
  `visitante` int(11) NOT NULL,
  `puntosVisitante` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `puntosLocal` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `partido`
--

INSERT INTO `partido` (`idpartido`, `fecha`, `lugar`, `fase`, `local`, `visitante`, `puntosVisitante`, `puntosLocal`) VALUES
(1, '2017-11-07', 'Coliseo UFPS', 'grupos', 1, 2, '62', '70'),
(2, '2018-03-06', 'Coliseo UFPS', 'grupos', 2, 3, '80', '102'),
(3, '2017-11-11', 'Coliseo UFPS', 'grupos', 2, 1, '102', '92');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `codigo` varchar(7) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` varchar(1) COLLATE utf8_spanish2_ci NOT NULL,
  `asigna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `codigo`, `clave`, `tipo`, `asigna`) VALUES
(1, '1150984', '123', 'A', 0),
(2, '1151021', 'delegado1234', 'D', 1),
(3, '1150983', '123456', 'D', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arbitro`
--
ALTER TABLE `arbitro`
  ADD PRIMARY KEY (`cedula`),
  ADD KEY `IXFK_arbitro_partido` (`idpartido`),
  ADD KEY `deporte` (`deporte`);

--
-- Indices de la tabla `deporte`
--
ALTER TABLE `deporte`
  ADD PRIMARY KEY (`idDeporte`),
  ADD KEY `IXFK_deporte_jornadaDeportiva` (`idJornada`);

--
-- Indices de la tabla `deportista`
--
ALTER TABLE `deportista`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `IXFK_deportista_equipo` (`idEquipo`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`idEquipo`),
  ADD KEY `IXFK_equipo_deporte` (`idDeporte`);

--
-- Indices de la tabla `jornadadeportiva`
--
ALTER TABLE `jornadadeportiva`
  ADD PRIMARY KEY (`idJornada`);

--
-- Indices de la tabla `partido`
--
ALTER TABLE `partido`
  ADD PRIMARY KEY (`idpartido`),
  ADD KEY `FK_partido_equipoL` (`local`),
  ADD KEY `FK_partido_equipoV` (`visitante`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigo` (`codigo`),
  ADD KEY `asigna` (`asigna`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `deporte`
--
ALTER TABLE `deporte`
  MODIFY `idDeporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `idEquipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `jornadadeportiva`
--
ALTER TABLE `jornadadeportiva`
  MODIFY `idJornada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `partido`
--
ALTER TABLE `partido`
  MODIFY `idpartido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `arbitro`
--
ALTER TABLE `arbitro`
  ADD CONSTRAINT `FK_arbitro_deporte` FOREIGN KEY (`deporte`) REFERENCES `deporte` (`idDeporte`),
  ADD CONSTRAINT `FK_arbitro_partido` FOREIGN KEY (`idpartido`) REFERENCES `partido` (`idpartido`);

--
-- Filtros para la tabla `deporte`
--
ALTER TABLE `deporte`
  ADD CONSTRAINT `FK_deporte_jornadaDeportiva` FOREIGN KEY (`idJornada`) REFERENCES `jornadadeportiva` (`idJornada`);

--
-- Filtros para la tabla `deportista`
--
ALTER TABLE `deportista`
  ADD CONSTRAINT `FK_deportista_equipo` FOREIGN KEY (`idEquipo`) REFERENCES `equipo` (`idEquipo`);

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `FK_equipo_deporte` FOREIGN KEY (`idDeporte`) REFERENCES `deporte` (`idDeporte`);

--
-- Filtros para la tabla `partido`
--
ALTER TABLE `partido`
  ADD CONSTRAINT `FK_partido_equipoL` FOREIGN KEY (`local`) REFERENCES `equipo` (`idEquipo`),
  ADD CONSTRAINT `FK_partido_equipoV` FOREIGN KEY (`visitante`) REFERENCES `equipo` (`idEquipo`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_deportista` FOREIGN KEY (`codigo`) REFERENCES `deportista` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
