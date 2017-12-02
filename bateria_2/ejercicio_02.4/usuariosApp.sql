/**
 * Author:  Gonza
 * Created: 19-nov-2017
 */

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

# Creación de la base de datos usuariosApp
CREATE DATABASE usuariosApp;

# Estructura de tabla para la tabla cuadros
CREATE TABLE `cuadros` (
    `idCuadro` int(3) AUTO_INCREMENT PRIMARY KEY,
    `nombreCuadro` varchar(50) CHARACTER SET latin1 NOT NULL,
    `idPintor` varchar(50) CHARACTER SET latin1 NOT NULL,
    `ruta` varchar(50) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

# Volcado de datos para la tabla cuadros
INSERT INTO `cuadros` (`nombreCuadro`, `idPintor`, `ruta`) VALUES
    ('La rendición de Breda', '1', 'imagenes/rendicion_de_breda.jpg'),
    ('Las meninas', '1', 'imagenes/las_meninas.jpg'),
    ('La fragua de Vulcano', '2', 'imagenes/fragua_de_vulcano.jpg'),
    ('La familia de Carlos IV', '2', 'imagenes/familia_carlos_iv.jpg'),
    ('Autorretrato', '3', 'imagenes/autoretrato.jpg'),
    ('Ronda de noche', '3', 'imagenes/ronda_de_noche.jpg');

# Estructura de tabla para la tabla pintores
CREATE TABLE `pintores` (
    `idPintor` int(3) AUTO_INCREMENT PRIMARY KEY,
    `nombrePintor` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

# Volcado de datos para la tabla pintores
INSERT INTO `pintores` (`nombrePintor`) VALUES 
    ('Velazquez'), ('Goya'), ('Rembrand');

# Estructura de tabla para la tabla usuarios
CREATE TABLE `usuarios` (
    `idUsuario` int(3) AUTO_INCREMENT PRIMARY KEY,
    `nombre` varchar(20) CHARACTER SET latin1 NOT NULL,
    `clave` int(4) NOT NULL,
    `email` varchar(50) CHARACTER SET latin1 NOT NULL,
    `nombrePintor` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
