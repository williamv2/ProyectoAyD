<?php 

	include ("conexion.php");
	

	$idEq = $_REQUEST['idequipo'];
	$cantj = $_REQUEST['cantju'];

	$con = new conexion;


	$query = "DELETE FROM equipo WHERE idEquipo = '$idEq'";

	if ($cantj>0) {
		echo '<script>alert("No se puede eliminar, aun hay jugadores en el equipo");
			window.history.go(-1);
			</script>';
			
	}
	else{
	//Ejecutar Consulta
	$resultado = $con->consulta($query);


		if(!$resultado){

			echo '<script>alert("Error al eliminar");
			window.history.go(-1);
			</script>';
		}
		else{

			echo '<script>alert("Equipo eliminado exitosamente")</script>';
			echo "<script>window.location='./dash_adm.php';</script>";
			
		}
	}
	//cerrar conexion
		$con->cerrar();

?>