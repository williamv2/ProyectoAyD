<?php 

	include ("conexion1.php");
	

	$iddeporte = $_REQUEST['iddeporte'];

	$con = new conexion;


	$query = "DELETE FROM deporte WHERE idDeporte = '$iddeporte'";

	//Ejecutar Consulta
	$resultado = $con->consulta($query);


		if(!$resultado){

			echo '<script>alert("Error al eliminar");
			window.history.go(-1);
			</script>';
		}
		else{

			echo '<script>alert("Deporte eliminado exitosamente")</script>';
			echo "<script>window.location='./dash_adm_deportes.php';</script>";
			
		}
	
	//cerrar conexion
		$con->cerrar();

?>