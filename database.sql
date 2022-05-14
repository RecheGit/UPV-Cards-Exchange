-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Dec 05, 2021 at 07:00 PM
-- Server version: 10.6.4-MariaDB-1:10.6.4+maria~focal
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `cromo`
--

CREATE TABLE `cromo` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(20) DEFAULT NULL,
  `EQUIPO` varchar(20) DEFAULT NULL,
  `ANNO` int(11) DEFAULT NULL,
  `NACIONALIDAD` varchar(20) DEFAULT NULL,
  `GOLES` int(11) DEFAULT NULL,
  `NICK_USUARIO` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cromo`
--

INSERT INTO `cromo` (`ID`, `NOMBRE`, `EQUIPO`, `ANNO`, `NACIONALIDAD`, `GOLES`, `NICK_USUARIO`) VALUES
(1, 'Messi', 'Barcelona', 2020, 'Argentina', 400, 'Kepa');

-- --------------------------------------------------------

--
-- Table structure for table `intentos`
--

CREATE TABLE `intentos` (
  `usuario` varchar(20) NOT NULL,
  `fecha` datetime NOT NULL,
  `exitoso` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `intentos`
--

INSERT INTO `intentos` (`usuario`, `fecha`, `exitoso`) VALUES
('lllllllllll', '2021-12-05 00:00:00', 0),
('llklkll', '2021-12-05 00:00:00', 0),
('Kepa', '2021-12-05 00:00:00', 0),
('Kepa', '2021-12-05 00:00:00', 0),
('Kepa', '2021-12-05 18:56:21', 0),
('Kepa', '2021-12-05 18:56:24', 0),
('Kepa', '2021-12-05 18:56:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `NICK` varchar(20) NOT NULL,
  `PASSWD` varchar(255) NOT NULL,
  `EMAIL` varchar(20) DEFAULT NULL,
  `DNI` varchar(10) DEFAULT NULL,
  `NOMBRE` varchar(10) DEFAULT NULL,
  `APELLIDOS` varchar(30) DEFAULT NULL,
  `TELEFONO` int(11) DEFAULT NULL,
  `FECHANACIMIENTO` date DEFAULT NULL,
  `CUENTABANCO` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`NICK`, `PASSWD`, `EMAIL`, `DNI`, `NOMBRE`, `APELLIDOS`, `TELEFONO`, `FECHANACIMIENTO`) VALUES
('Kepa', 'asd', 'kepaa2@email.com', '16100557M', 'Kepa', 'Reche', 123131231, '1990-10-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cromo`
--
ALTER TABLE `cromo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`NICK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cromo`
--
ALTER TABLE `cromo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
