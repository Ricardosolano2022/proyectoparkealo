-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2023 a las 14:02:34
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parquealo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_clientes` int(11) NOT NULL,
  `nombres` varchar(30) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `cedula` int(11) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `placa_vehiculo` varchar(10) DEFAULT NULL,
  `id_tipo_vehiculo` int(11) NOT NULL,
  `id_perfiles` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_clientes`, `nombres`, `apellidos`, `cedula`, `telefono`, `placa_vehiculo`, `id_tipo_vehiculo`, `id_perfiles`) VALUES
(1, 'Alexandra', 'Hurtado Dorado', 34565438, '3214569885', 'fgt-658', 1, 1),
(2, 'Esmeral', 'Prado', 34562535, '3224569874', 'rty-045', 2, 1),
(3, 'Tatiana', 'Giron Timana', 34562634, '3102564578', 'tro-456', 5, 1),
(4, 'Carol Johana', 'Lopez Valdez', 1061710359, '3230025672', 'poi-124', 1, 1),
(5, 'Carlos Alberto', 'Obando Jojoa', 1061712432, '30004569852', 'ghj-078', 2, 1),
(6, 'Edith Soraima', 'Bonilla', 1061712722, '3125263587', 'ter-789', 5, 1),
(7, 'Fernando', 'Ulchur', 1061717260, '3110234563', NULL, 6, 1),
(8, 'Andres Eduardo', 'Gomez', 4628357, '3214562541', 'lkj-123', 3, 1),
(9, 'Andreina', 'Ojeda Lugo', 9731152, '3110024566', 'bnn-345', 2, 1),
(10, 'Edgar', 'Cruz Delgado', 10291003, '3012354565', 'gff-555', 1, 1),
(11, 'Fabian Andres', 'Vivas Ordoñez', 10291681, '3024563600', 'wer-003', 5, 1),
(12, 'Mauricio', 'Imbachi Zemanate', 10292273, '3034152544', 'qwe-336', 2, 1),
(13, 'Fredy Wilinton', 'Castro Piamba', 10293141, '3142360215', 'bvv-789', 4, 1),
(14, 'Osvaldo  Antonio', 'Orozco Correa', 10293184, '3133216522', 'fgg-232', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `nombres` varchar(30) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `cedula` int(11) DEFAULT NULL,
  `id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `nombres`, `apellidos`, `telefono`, `cedula`, `id_perfil`) VALUES
(1, 'Ricardo', 'Solano Vasquez', '3162980353', 94474030, 4),
(2, 'Jhon Edison', 'Peña Manquillo', '3105986085', 1061806992, 4),
(3, 'Alejandra Claudia', 'Palacio Galindez', '3008609160', 11, 4),
(4, 'Juan David', 'Solano Bolaños', '3105565523', 1002820056, 3),
(5, 'Yilver', 'Garzon Cordoba', '3152365689', 10295730, 2),
(6, 'Carlos Arturo', 'Moreno', '3015556988', 10296341, 2),
(7, 'Mario Efrain', 'Campo', '3002561235', 10303740, 2),
(8, 'Jhon', 'Buitron Benavides', '3214867852', 10301549, 2),
(9, 'Hugo Hernan', 'Vivas Cachez', '3162653655', 10548242, 2),
(10, 'Roberto', 'Perez', '3215663650', 10566734, 2),
(11, 'Luiz Alberto', 'Grande', '3032512332', 10591897, 3),
(12, 'Jesus David', 'Davila Hurtado', '3180023212', 10754009, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `cedula` int(11) DEFAULT NULL,
  `clave` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id_login`, `cedula`, `clave`) VALUES
(1, 94474030, 'Riso@2023'),
(2, 1061806992, 'Jhon@2023'),
(3, 1061781152, 'Aleja@2023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfiles` int(11) NOT NULL,
  `nombre_perfil` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfiles`, `nombre_perfil`) VALUES
(1, 'Usuario'),
(2, 'Basico'),
(3, 'Supervisor'),
(4, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_vehiculo`
--

CREATE TABLE `reg_vehiculo` (
  `id_reg_vehiculo` int(11) NOT NULL,
  `nom_clientes` varchar(30) DEFAULT NULL,
  `ape_clientes` varchar(30) DEFAULT NULL,
  `ced_clientes` int(11) DEFAULT NULL,
  `tel_clientes` int(11) DEFAULT NULL,
  `placa_veh_clientes` varchar(10) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_tipo_vehiculo` int(11) NOT NULL,
  `id_placa_vehiculo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reg_vehiculo`
--

INSERT INTO `reg_vehiculo` (`id_reg_vehiculo`, `nom_clientes`, `ape_clientes`, `ced_clientes`, `tel_clientes`, `placa_veh_clientes`, `fecha_registro`, `id_tipo_vehiculo`, `id_placa_vehiculo`) VALUES
(7, 'Juancito David', 'dsfds1', 24231, 2342341, 'adasd1', '2023-05-26 05:07:49', 6, 1),
(13, 'David', 'Hurtado Delgado', 1061745, 123443, 'LMV50D', '2023-05-26 04:13:47', 3, 3),
(14, 'Maryory', 'Bolaños Patiño', 25277739, 2147483647, 'DJY049', '2023-05-26 04:28:24', 1, 7),
(15, 'Heiber', 'Ceballos', 10292564, 2147483647, 'dfg321', '2023-05-26 04:44:01', 2, 7),
(16, 'Monica', 'Bolaños', 1023464, 2147483647, 'blanca', '2023-05-26 08:48:06', 6, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vehiculo`
--

CREATE TABLE `tipo_vehiculo` (
  `id_tipo_vehiculo` int(11) NOT NULL,
  `tipo_vehiculo` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_vehiculo`
--

INSERT INTO `tipo_vehiculo` (`id_tipo_vehiculo`, `tipo_vehiculo`) VALUES
(1, 'Automovil'),
(2, 'Camioneta'),
(3, 'Microbus'),
(4, 'Furgon'),
(5, 'Moto'),
(6, 'Bicicleta');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_clientes`),
  ADD KEY `id_perfiles` (`id_perfiles`),
  ADD KEY `id_tipo_vehiculo` (`id_tipo_vehiculo`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfiles`);

--
-- Indices de la tabla `reg_vehiculo`
--
ALTER TABLE `reg_vehiculo`
  ADD PRIMARY KEY (`id_reg_vehiculo`),
  ADD KEY `id_tipo_vehiculo` (`id_tipo_vehiculo`),
  ADD KEY `id_placa_vehiculo` (`id_placa_vehiculo`);

--
-- Indices de la tabla `tipo_vehiculo`
--
ALTER TABLE `tipo_vehiculo`
  ADD PRIMARY KEY (`id_tipo_vehiculo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_clientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfiles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `reg_vehiculo`
--
ALTER TABLE `reg_vehiculo`
  MODIFY `id_reg_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tipo_vehiculo`
--
ALTER TABLE `tipo_vehiculo`
  MODIFY `id_tipo_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_perfiles`) REFERENCES `perfiles` (`id_perfiles`),
  ADD CONSTRAINT `clientes_ibfk_2` FOREIGN KEY (`id_tipo_vehiculo`) REFERENCES `tipo_vehiculo` (`id_tipo_vehiculo`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfiles`);

--
-- Filtros para la tabla `reg_vehiculo`
--
ALTER TABLE `reg_vehiculo`
  ADD CONSTRAINT `reg_vehiculo_ibfk_1` FOREIGN KEY (`id_tipo_vehiculo`) REFERENCES `tipo_vehiculo` (`id_tipo_vehiculo`),
  ADD CONSTRAINT `reg_vehiculo_ibfk_2` FOREIGN KEY (`id_placa_vehiculo`) REFERENCES `clientes` (`id_clientes`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
