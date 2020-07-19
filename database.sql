CREATE DATABASE IF NOT EXISTS `sampledb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8MB4_general_ci;
USE `sampledb`;

-- -----------------------------------------------------------

--
-- TABLE STRUCTURE FOR TABLE `estudiante`


CREATE TABLE `estudiante` (
    `id` int(11) NOT NULL,
    `identificacion` varchar(50) NOT NULL,
    `nombre` varchar(50) NOT NULL,
    `curso` varchar(50) NOT NULL,
    `nota1` float NOT NULL,
    `nota2` float NOT NULL,
    `nota3` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;