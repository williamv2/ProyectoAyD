<?php 

	include ("conexion.php");
	

	$idjornada = $_REQUEST['idjornada'];

	$con = new conexion;


	$query = "DELETE FROM jornadadeportiva WHERE idJornada = '$idjornada'";

	//Ejecutar Consulta
	$resultado = $con->consulta($query);


		if(!$resultado){

			echo '<script>alert("Error al eliminar");
			window.history.go(-1);
			</script>';
		}
		else{

			echo '<script>alert("Cronograma eliminado exitosamente")</script>';
			echo "<script>window.location='./dash_adm_crono.php';</script>";
			
		}
	
	//cerrar conexion
		$con->cerrar();

?>