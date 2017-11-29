<?php

include ("conexion1.php");
include('clases/deporte.php');


$nombre = $_POST['nomdep'];
$numjug = $_POST['numjug'];
$jornada = $_POST['jord'];


$con = new conexion;

$deporte = new deporte($nombre,$numjug,$jornada);


$query = "INSERT INTO deporte(nombre, cantidadJugadores, idJornada) VALUES ('$nombre','$numjug','$jornada')";

$verificar_nombre = $con->consulta("SELECT * FROM deporte WHERE nombre= '$nombre'");

	
	if(mysqli_num_rows($verificar_nombre)> 0){

		echo '<script>alert("El Deporte ya esta registrado");
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

		echo '<script>alert("Deporte registrado exitosamente")</script>';
		echo "<script>window.location='./dash_adm_deportes.php';</script>";
		
	}

//cerrar conexion
	$con->cerrar();

?>