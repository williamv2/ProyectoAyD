<?php 

	include ("conexion1.php");
	

	$codigo = $_REQUEST['codigo'];

	$con = new conexion;


	$query = "DELETE FROM deportista WHERE codigo = '$codigo'";

	//Ejecutar Consulta
	$resultado = $con->consulta($query);


		if(!$resultado){

			echo '<script>alert("Error al eliminar");
			window.history.go(-1);
			</script>';
		}
		else{

			echo '<script>alert("Deportista eliminado exitosamente")</script>';
			echo "<script>window.location='./dash_adm_deportes.php';</script>";
			
		}
	
	//cerrar conexion
		$con->cerrar();

?>