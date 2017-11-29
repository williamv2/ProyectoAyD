<?php

include("conexion1.php");

$user = $_POST['username'];
$pass = $_POST['pwd'];

$admi = new conexion;
$admi->login($user,$pass);
$admi->cerrar();



?>