<?php 

	include ("conexion1.php");
	

	$cedula = $_REQUEST['cedula'];

	$con = new conexion;


	$query = "DELETE FROM arbitro WHERE cedula = '$cedula'";

	//Ejecutar Consulta
	$resultado = $con->consulta($query);


		if(!$resultado){

			echo '<script>alert("Error al eliminar");
			window.history.go(-1);
			</script>';
		}
		else{

			echo '<script>alert("Arbitro eliminado exitosamente")</script>';
			echo "<script>window.location='./dash_adm_crono.php';</script>";
			
		}
	
	//cerrar conexion
		$con->cerrar();

?>