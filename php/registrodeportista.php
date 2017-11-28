<?php

include ("conexion.php");
//include('clases/deporte.php');


$codigo = $_POST['coddts'];
$nombre = $_POST['nomdts'];
$apellido = $_POST['apedts'];
$edad = $_POST['eddts'];
$genero = $_POST['gedts'];
$correo = $_POST['cordts'];
$equipo = $_POST['eqdts'];


$con = new conexion;

//$deporte = new deporte($nombre,$numjug,$jornada);


$query = "INSERT INTO deportista(codigo, nombre, apellido, edad, genero, correo, idEquipo) VALUES ($codigo ,'$nombre','$apellido','$edad','$genero','$correo','$equipo')";

$verificar_codigo = $con->consulta("SELECT * FROM deportista WHERE codigo= '$codigo'");

	
	if(mysqli_num_rows($verificar_codigo)> 0){

		echo '<script>alert("El Deportista ya esta registrado");
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

		echo '<script>alert("Deportista registrado exitosamente")</script>';
		echo "<script>window.location='./dash_adm_deportes.php';</script>";
		
	}

//cerrar conexion
	$con->cerrar();

?>