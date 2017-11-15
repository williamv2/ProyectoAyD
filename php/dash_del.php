<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dashboard Administrador</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="../css/header-v6.min.css">
    <link type="text/css" rel="stylesheet" href="../css/header-v8.min.css">
    <link type="text/css" rel="stylesheet" href="../css/header.min.css">
    <link rel="stylesheet" type="text/css" href="../css/ufps.css">
    <link rel="stylesheet" type="text/css" href="../css/ufps.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<?php

  		session_start();

  		if(isset($_SESSION['user'])){

        $nombre = $_SESSION['nombre'];

            echo "";

        }
        else{

            header("location:../index.html");
        }


  		?>
    
		 <div class="ufps-navbar ufps-navbar-fixed ufps-navbar-light" id="menu">
		         <div class="ufps-container-fluid">
		             <div class="ufps-navbar-brand">
		                 <div class="ufps-btn-menu" onclick="toggleMenu('menu')">
		                     <div class="ufps-btn-menu-bar"> </div>
		                     <div class="ufps-btn-menu-bar"> </div>
		                     <div class="ufps-btn-menu-bar"> </div>
		                </div>
		                Dashboard Delegado
		             </div>
		             <div class="ufps-navbar-left">
		                 <a href="" class="ufps-navbar-btn" style="display: none;">Salir</a>
		             </div>
		             <div class="ufps-navbar-right">
		             	<a href="" class="ufps-navbar-btn"><?php echo $nombre;  ?></a>
		                <a href="./log-out.php" class="ufps-navbar-btn"><span class="glyphicon glyphicon-log-out"></span>Salir</a>
		             </div>
		             <div class="ufps-navbar-right">
		                 <div class="ufps-navbar-corporate">
		                     <img src="../img/logo_ingsistemas.png" alt="Logo ingeniería de sistemas">
		                     <img src="../img/logo_ufps_inverted.png" alt="Logo UFPS">
		                 </div>
		             </div>

		         </div>
		 </div>
        	
    


  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/ufps.min.js"></script>
  </body>
</html>