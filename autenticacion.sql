SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


-- Base de Datos: 'autenticacion'

CREATE TABLE `rol` (
  `idRol` bigint(20) NOT NULL,
  `descripcionRol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `usuario` (
  `idUsuario` bigint(20) NOT NULL,
  `usNombre` varchar(50) NOT NULL,
  `usPass` varchar(50) NOT NULL,  
  `usMail` varchar(50) NOT NULL,
  `usDeshabilitado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `usuarioRol` (
  `idUsuario` bigint(20) NOT NULL,
  `idRol` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`),
  ADD UNIQUE KEY `idRol` (`idRol`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `idUsuario` (`idUsuario`);

ALTER TABLE `usuarioRol`
  ADD PRIMARY KEY (`idUsuario`,`idRol`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idRol` (`idRol`);

ALTER TABLE `rol`
  MODIFY `idRol` bigint(20) NOT NULL AUTO_INCREMENT;

ALTER TABLE `usuario`
  MODIFY `idUsuario` bigint(20) NOT NULL AUTO_INCREMENT;

ALTER TABLE `usuarioRol`
  ADD CONSTRAINT `fkmovimiento_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuariorol_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- CARGA DE TABLAS

INSERT INTO `rol`( `descripcionRol`) VALUES ('Administracion');
INSERT INTO `rol`( `descripcionRol`) VALUES ('Editor');
INSERT INTO `rol`( `descripcionRol`) VALUES ('Lector');

INSERT INTO `usuario`(`usNombre`, `usPass`, `usMail`) VALUES ('Sonia.J','7aad599a7e30c1d7832a114cdd86bc69','S.J@mail.com');
INSERT INTO `usuario`(`usNombre`, `usPass`, `usMail`) VALUES ('Daniel.C','91cb5699c1a036050040b4f7451fc6df','D.C@mail.com');
INSERT INTO `usuario`(`usNombre`, `usPass`, `usMail`) VALUES ('Luis.V','72ede98b2623f48a8c4d24600dea2edb','L.S@mail.com');

INSERT INTO `usuariorol`(`idUsuario`, `idRol`) VALUES ('1','1');
INSERT INTO `usuariorol`(`idUsuario`, `idRol`) VALUES ('2','3');
INSERT INTO `usuariorol`(`idUsuario`, `idRol`) VALUES ('3','2');

-- Us: Sonia.J pass: sj1234
-- Us: Luis.V pass: lv2222
-- Us: Daniel.C pass: dc1111


