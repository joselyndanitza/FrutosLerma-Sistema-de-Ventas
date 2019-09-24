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
	function id_numeros($id_Cliente){
		return (int)limpiarDatos($id_Cliente);
	}
		function obtener_id($conexion,$id_Cliente){
		$resultado = $conexion->query("SELECT * FROM Clientes WHERE id_Cliente = $id_Cliente LIMIT 1");
		$resultado = $resultado->fetchAll();
		return ($resultado) ? $resultado : false;
	}
?>