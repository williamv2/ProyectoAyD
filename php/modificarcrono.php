<?php 


include ("conexion.php");

$idjornada = $_POST['midcrono'];
$semestre = $_POST['msem'];
$ano = $_POST['mano'];
$fechini = $_POST['mfechini'];
$fechfin = $_POST['mfechfin'];
$desc = $_POST['mdescrip'];

$con = new conexion;

$query = "UPDATE jornadadeportiva SET semestre='$semestre', ano='$ano', fechaInicio='$fechini', fechaFinal='$fechfin', descripcion='$desc' WHERE idJornada ='$idjornada'";

//Ejecutar Consulta
$resultado = $con->consulta($query);


	if(!$resultado){

		echo '<script>alert("Error al Modificar");
		window.history.go(-1);
		</script>';
	}
	else{

		echo '<script>alert("Cronograma modificado exitosamente")</script>';
		echo "<script>window.location='./dash_adm_crono.php';</script>";
		
	}

//cerrar conexion
	$con->cerrar();

?>