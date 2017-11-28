<?php

include ("conexion.php");


$idpartido = $_REQUEST['idpartido'];
$eqlocal = $_REQUEST['eqlocal'];
$eqvisi = $_REQUEST['eqvisi'];
$pvisi = $_REQUEST['pvisi'];
$plocal = $_REQUEST['plocal'];

$con = new conexion;
	
		
		$query = "DELETE FROM partido WHERE idpartido = '$idpartido'";


	if($pvisi>$plocal){

		$puntos = "UPDATE equipo SET puntos =puntos-5 WHERE idEquipo = '$eqvisi'";
		$con->consulta($puntos);

	}
	else if($plocal>$pvisi){

		$puntos = "UPDATE equipo SET puntos =puntos-5 WHERE idEquipo = '$eqlocal'";
		$con->consulta($puntos);
	}
	else{

		$piguales = "UPDATE equipo SET puntos =puntos-2 WHERE idEquipo = '$eqvisi'";
		$con->consulta($piguales);
		$puiguales = "UPDATE equipo SET puntos =puntos-2 WHERE idEquipo = '$eqlocal'";
		$con->consulta($puiguales);

	}


	//Ejecutar Consulta
	$resultado = $con->consulta($query);


	if(!$resultado){

		echo '<script>alert("Error al eliminar");
		window.history.go(-1);
		</script>';
	}
	else{

		echo '<script>alert("Partido eliminado exitosamente")</script>';
		echo "<script>window.location='./dash_adm_partido.php';</script>";
		
	}




//cerrar conexion
	$con->cerrar();

?>