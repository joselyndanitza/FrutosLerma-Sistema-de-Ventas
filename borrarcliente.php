<?php
	$errores='';
	extract ($_REQUEST);
	try{
		$conexion = new PDO('mysql:host=localhost;dbname=FRUTOSLERMA','root','');
	}catch(PDOException $e){
		echo "Error: ". $e->getMessage();
	}
	$sql="DELETE FROM clientes WHERE idCliente = '$_REQUEST[idCliente]'";
		$resultado = $conexion->query($sql);

	if($resultado == true){
		header('Location: clientes.php');
		$errores .='Cliente eliminado correctamente';
	}else{
        $errores .='Hay un error al eliminar';
		
	}
?>