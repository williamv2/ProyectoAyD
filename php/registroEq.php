<?php 


include ("conexion1.php");
include('clases/equipo.php');

$nombre = $_POST['nombreEq'];
$deporte = $_POST['deporte'];

$con = new conexion;

$equipo = new equipo($nombre,$deporte);


$query = "INSERT INTO equipo(nombre, idDeporte) VALUES ('$nombre','$deporte')";

$verificar_nombre = $con->consulta("SELECT * FROM equipo WHERE nombre= '$nombre'");

	
	if(mysqli_num_rows($verificar_nombre)> 0){

		echo '<script>alert("El nombre del Equipo ya esta registrado");
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

		echo '<script>alert("Equipo registrado exitosamente")</script>';
		echo "<script>window.location='./dash_adm.php';</script>";
		
	}

//cerrar conexion
	$con->cerrar();

?>













