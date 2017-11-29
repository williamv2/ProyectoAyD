<?php

include ("conexion1.php");
include('clases/arbitro.php');

$cedula = $_POST['ced'];
$nombre = $_POST['nomarb'];
$apellido = $_POST['apearb'];
$deporte = $_POST['deparb'];
$partido = $_POST['fechpart'];

$con = new conexion;

$arbitro = new arbitro($cedula,$nombre,$apellido,$deporte,$partido);


$query = "INSERT INTO arbitro(cedula, nombre, apellido, deporte, idpartido) VALUES ('$cedula','$nombre','$apellido','$deporte','$partido')";

$verificar_arbitro = $con->consulta("SELECT * FROM arbitro WHERE cedula= '$cedula'");

	
	if(mysqli_num_rows($verificar_arbitro)> 0){

		echo '<script>alert("El Arbitro ya esta registrado");
		window.history.go(-1);
		</script>';
		exit;
	}

//Ejecutar Consulta
$resultado = $con->consulta($query);


	if(!$resultado){

		echo '<script>alert("Error al registrase");
		window.history.go(-1);
		</script>';
	}
	else{

		echo '<script>alert("Arbitro registrado exitosamente")</script>';
		echo "<script>window.location='./dash_adm_crono.php';</script>";
		
	}

//cerrar conexion
	$con->cerrar();

?>