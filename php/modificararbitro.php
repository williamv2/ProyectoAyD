<?php 


include ("conexion1.php");

$cedula = $_POST['mcedula'];
$nombre = $_POST['mnomarb'];
$apellido = $_POST['mapearb'];
$deporte = $_POST['mdeparb'];
$partido = $_POST['mfechpart'];

$con = new conexion;

$query = "UPDATE arbitro SET nombre='$nombre', apellido='$apellido', deporte='$deporte', idpartido='$partido' WHERE cedula ='$cedula'";

//Ejecutar Consulta
$resultado = $con->consulta($query);


	if(!$resultado){

		echo '<script>alert("Error al Modificar");
		window.history.go(-1);
		</script>';
	}
	else{

		echo '<script>alert("Arbitro modificado exitosamente")</script>';
		echo "<script>window.location='./dash_adm_crono.php';</script>";
		
	}

//cerrar conexion
	$con->cerrar();

?>