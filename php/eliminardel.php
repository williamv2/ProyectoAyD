<?php 

	include ("conexion1.php");
	

	$iddel = $_REQUEST['iddelegado'];

	$con = new conexion;


	$query = "DELETE FROM usuario WHERE id = '$iddel'";

	//Ejecutar Consulta
	$resultado = $con->consulta($query);


		if(!$resultado){

			echo '<script>alert("Error al eliminar");
			window.history.go(-1);
			</script>';
		}
		else{

			echo '<script>alert("Delegado eliminado exitosamente")</script>';
			echo "<script>window.location='./dash_adm.php';</script>";
			
		}
	
	//cerrar conexion
		$con->cerrar();

?>