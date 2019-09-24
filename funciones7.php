<?php
	function conexion(){
		try{
			$conexion = new PDO('mysql:host=localhost;dbname=FRUTOSLERMA','root','');
			return $conexion;
		}catch(PDOException $e){
			return false;
		}
	}
	function limpiarDatos($datos){
		$datos = trim($datos);
		$datos = stripslashes($datos);
		$datos = htmlspecialchars($datos);
		return $datos;
	}
	function id_numeros($idPersonal){
		return (int)limpiarDatos($idPersonal);
	}
		function obtener_id($conexion,$idPersonal){
		$resultado = $conexion->query("SELECT * FROM Personal WHERE idPersonal = $idPersonal LIMIT 1");
		$resultado = $resultado->fetchAll();
		return ($resultado) ? $resultado : false;
	}
?>