<?php

include ("conexion.php");

$idpartido =$_POST['midpartido'];
$fecha = $_POST['mfech'];
$lugar = $_POST['mlugar'];
$fase = $_POST['mfase'];
//$eqlocal = $_POST['meqlocal'];
//$eqvisi = $_POST['meqvisi'];
//$pvisi = $_POST['mpvisi'];
//$plocal = $_POST['mplocal'];

$con = new conexion;
		
		$query = "UPDATE partido SET fecha = '$fecha', lugar = '$lugar', fase = '$fase' WHERE idpartido = '$idpartido'";

	//Ejecutar Consulta
	$resultado = $con->consulta($query);


	if(!$resultado){

		echo '<script>alert("Error al modificar");
		window.history.go(-1);
		</script>';
	}
	else{

		echo '<script>alert("Partido modificado exitosamente")</script>';
		echo "<script>window.location='./dash_adm_partido.php';</script>";
		
	}

//cerrar conexion
	$con->cerrar();

?>