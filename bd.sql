--Creamos la Base de Datos "FrutosLerma"
CREATE DATABASE FRUTOSLERMA;

--Usamos nuestra base de datos "FrutosLerma"
USE FRUTOSLERMA;

/*******************************************************************************************/

--Creamos nuestra Tabla "Usuarios"
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario` 	VARCHAR(100) NOT NULL,
  `clave` 		VARCHAR(100) NOT NULL,
  `email` 		VARCHAR(100) NOT NULL,
  `rol` 			VARCHAR(100) DEFAULT 'Administrador',
  PRIMARY KEY (id_usuario));

--Insertamos un registros a nuestra tabla "Usuarios"
INSERT INTO `usuarios` (`usuario`, `clave`, `email`) VALUES
('Administrador', '123456','rsfaelto123@hotmail.com');
INSERT INTO `usuarios` (`usuario`, `clave`, `email`) VALUES
('Joselyn Condori', 'abc123','condori.cabrera.joselyn@gmail.com');
INSERT INTO `usuarios` (`usuario`, `clave`, `email`) VALUES
('rafael', 'abc123','rafael@gmail.com');

--Visualizamos la Tabla "Usuarios"
SELECT * FROM Usuarios;

/*******************************************************************************************/

--Creamos nuestra Tabla "Clientes"
CREATE TABLE IF NOT EXISTS `clientes` (
  `idCliente`  INT(11) NOT NULL AUTO_INCREMENT,
  `Nombres` 	VARCHAR(100) NOT NULL,
  `Tipo` 		VARCHAR(100) NOT NULL,
  `Documento` 	VARCHAR(100) NOT NULL,
  `Direccion` 	VARCHAR(100) NOT NULL,
  `Telefono` 	VARCHAR(100) NOT NULL,
  `Email` 		VARCHAR(100) NOT NULL,
  PRIMARY KEY (idCliente));

--Insertamos un registros a nuestra tabla "Clientes"
INSERT INTO `clientes` (`Nombres`, `Tipo`, `Documento`,`Direccion`, `Telefono`, `Email`) VALUES
('Rafael Benites Gomez', 'Persona Natural','74738027','Urb.Leoncio Prado Mz Ch1 Lote 1 - Rimac', '941442559','rsfaelto123@gmail.com');
INSERT INTO `clientes` (`Nombres`, `Tipo`, `Documento`,`Direccion`, `Telefono`, `Email`) VALUES
('Jose Benites Gomez', 'Persona Juridica','54224527','Urb.Leoncio Prado Mz Ch1 Lote 1 - Rimac', '921152235','jose@gmail.com');

--Visualizamos la Tabla "Clientes"
SELECT * FROM Clientes;

SELECT COUNT(*) FROM clientes;

/*******************************************************************************************/

--Creamos nuestra Tabla "Personal"
CREATE TABLE IF NOT EXISTS `personal` (
  `idPersonal` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombres` 	VARCHAR(100) NOT NULL,
  `Apellidos` 	VARCHAR(100) NOT NULL,
  `Dni` 			VARCHAR(100) NOT NULL,
  `Cargo` 		VARCHAR(100) NOT NULL,
  `Direccion` 	VARCHAR(100) NOT NULL,
  `Celular` 	VARCHAR(100) NOT NULL,
  `Email` 		VARCHAR(100) NOT NULL,
  PRIMARY KEY (idPersonal));

--Insertamos un registros a nuestra tabla "Clientes"
INSERT INTO `personal` (`Nombres`, `Apellidos`, `Dni`, `Cargo`, `Direccion`, `Celular`, `Email`) VALUES
('Marcos Josue', 'Morales Lazaro', '73482246', 'Vendedor', 'Urb.Los Jazmines Mz G1 Lote 3 - Los Olivos', '941442559','rsfaelto123@gmail.com');


--Visualizamos la Tabla "Personal"
SELECT * FROM Personal;

SELECT COUNT(*) FROM personal;

/*******************************************************************************************/
