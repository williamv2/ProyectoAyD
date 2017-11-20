<?php

include 'conexion.php';

$conexion = new conexion;

$semestre = $_POST['sem'];
$ano = $_POST['año'];
$fechini = $_POST['fechini'];
$fechfin = $_POST['fechfin'];
$descrip = $_POST['descrip'];


$insertar = "INSERT INTO jornadadeportiva(semestre,ano,fechaInicio,fechaFinal,descripcion) VALUES ('$semestre','$ano','$fechini','$fechfin','$descrip')";

echo $insertar;

$resultado = $conexion->consulta($insertar);

if (!$resultado) {
	
	echo "<script>alert('Error al registrar');</script>";
}
else{

	echo "<script>alert('Registro exitoso');</script>";
}

$conexion->cerrar();


  ?>