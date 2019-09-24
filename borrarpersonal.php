<?php
	$errores='';
	extract ($_REQUEST);
	try{
		$conexion = new PDO('mysql:host=localhost;dbname=FRUTOSLERMA','root','');
	}catch(PDOException $e){
		echo "Error: ". $e->getMessage();
	}
	$sql="DELETE FROM personal WHERE idPersonal = '$_REQUEST[idPersonal]'";
		$resultado = $conexion->query($sql);

	if($resultado == true){
		header('Location: personal.php');
		$errores .='Cliente eliminado correctamente';
	}else{
        $errores .='Hay un error al eliminar';
		
	}
?>