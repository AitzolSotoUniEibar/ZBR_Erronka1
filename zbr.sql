-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2024 a las 08:16:30
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `zbr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `erabiltzaileak`
--

CREATE TABLE `erabiltzaileak` (
  `id` int(11) NOT NULL,
  `izena` varchar(50) NOT NULL,
  `abizena` varchar(50) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `erabiltzaile_izena` varchar(50) NOT NULL,
  `pasahitza` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `erabiltzaileak`
--

INSERT INTO `erabiltzaileak` (`id`, `izena`, `abizena`, `rol`, `erabiltzaile_izena`, `pasahitza`) VALUES
(5, 'aitzol', 'soto', 'bezero', 'asoto22', '$2y$10$fCQ776WSVmp0vhzi1f/UvuktvRgdv2ZyIyDp430aHT760g6Rl/BFa'),
(6, 'Haritz', 'Otero', 'bezero', 'haritzote27', '$2y$10$gYOZCSLydMu976vMHaYT5urOCKTJXJKjCQaiU0QKMsDx9Wmo6JpP2'),
(8, 'zbr', 'zbraa', 'admin', 'zbradmin', '$2y$10$8up6YGjtwFblcgioTheELutr.mF/jkAIEcAS/tNNtP/nFoYBsT64G');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eskaerak`
--

CREATE TABLE `eskaerak` (
  `id` int(11) NOT NULL,
  `bezero_id` int(11) NOT NULL,
  `produktua_id` int(11) NOT NULL,
  `kantitatea` int(11) NOT NULL,
  `eskaera_data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `eskaerak`
--

INSERT INTO `eskaerak` (`id`, `bezero_id`, `produktua_id`, `kantitatea`, `eskaera_data`) VALUES
(1, 5, 1, 2, '2024-09-04 10:55:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produktuak`
--

CREATE TABLE `produktuak` (
  `id` int(11) NOT NULL,
  `izena` varchar(100) NOT NULL,
  `prezioa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `produktuak`
--

INSERT INTO `produktuak` (`id`, `izena`, `prezioa`) VALUES
(1, 'Boli zbr', 100);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `erabiltzaileak`
--
ALTER TABLE `erabiltzaileak`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eskaerak`
--
ALTER TABLE `eskaerak`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `produktuak`
--
ALTER TABLE `produktuak`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `erabiltzaileak`
--
ALTER TABLE `erabiltzaileak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `eskaerak`
--
ALTER TABLE `eskaerak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `produktuak`
--
ALTER TABLE `produktuak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
