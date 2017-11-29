<?php

include ("conexion1.php");
include('clases/jornada.php');

$semestre = $_POST['sem'];
$ano = $_POST['año'];
$fechaini = $_POST['fechini'];
$fechafin = $_POST['fechfin'];
$descripcion = $_POST['descrip'];

$con = new conexion;

$jornada = new jornada($semestre,$ano,$fechaini,$fechafin,$descripcion);


$query = "INSERT INTO jornadadeportiva(semestre, ano, fechaInicio, fechaFinal, descripcion) VALUES ('$semestre','$ano','$fechaini','$fechafin','$descripcion')";

$verificar_semestre = $con->consulta("SELECT * FROM jornadadeportiva WHERE semestre= '$semestre'");
$verificar_año = $con->consulta("SELECT * FROM jornadadeportiva WHERE ano ='$ano'");
	
	if(mysqli_num_rows($verificar_semestre)> 0 && mysqli_num_rows($verificar_año)> 0){

		echo '<script>alert("El Cronograma ya esta registrado");
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

		echo '<script>alert("Cronograma registrado exitosamente")</script>';
		echo "<script>window.location='./dash_adm_crono.php';</script>";
		
	}

//cerrar conexion
	$con->cerrar();

?>