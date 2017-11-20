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
		       
		             <div class="ufps-navbar-brand">
		                 <div class="ufps-btn-menu" onclick="toggleMenu('menu')">
		                     <div class="ufps-btn-menu-bar"> </div>
		                     <div class="ufps-btn-menu-bar"> </div>
		                     <div class="ufps-btn-menu-bar"> </div>
		                </div>
		                Dashboard Administrador
		             </div>
		             <div class="ufps-navbar-left">
		                 <a href="./dash_adm.php" class="ufps-navbar-btn">Inicio</a>
		                 <a href="#" class="ufps-navbar-btn">Cronograma</a>
		                 <a href="" class="ufps-navbar-btn">Deportes</a>
		                 <a href="" class="ufps-navbar-btn">Partidos</a>
		             </div>
		             <div class="ufps-navbar-right">
		             	<a href="" class="ufps-navbar-btn"><span class="glyphicon glyphicon-user"></span><?php echo $nombre;  ?></a>
		                <a href="./log-out.php" class="ufps-navbar-btn"><span class="glyphicon glyphicon-log-out"></span>Salir</a>
		             </div>
		             <div class="ufps-navbar-right">
		                 <div class="ufps-navbar-corporate">
		                     <img src="../img/logo_ingsistemas.png" alt="Logo ingeniería de sistemas">
		                     <img src="../img/logo_ufps_inverted.png" alt="Logo UFPS">
		                 </div>
		             </div>
		       
	
   		</div>

   <div class="container-fluid ufps-fix-navbar-fixed">
       <div class="ufps-row">
        		<div class="ufps-col-mobile-6 ufps-col-tablet-3">
					<div class="ufps-accordion">
					   
					    <button class="ufps-btn-accordion">Cronograma</button>
					    <div class="ufps-accordion-panel">
					    	<ul class="nav nav-sidebar">
					    		<li><a role="button" id="crono">Cronogramas</a></li>
					    		<li><a role="button" id="crearcrono">Crear Cronograma</a></li>
					    		<li><a role="button" id="progfases">Programar Fases</a></li>
					    	</ul>
					        
					    </div>
					    <button class="ufps-btn-accordion">Arbitro</button>
					    <div class="ufps-accordion-panel">
					    	<ul class="nav nav-sidebar">
					    		<li><a role="button" id="asigarbitro">Asignar Arbitro</a></li>
					    	</ul>
					        
					    </div>
					    
					</div>         
		 		</div>
		 		<div class="ufps-col-mobile-6 ufps-col-tablet-9">
		 			
		 			<section id="cronoini">
                		<h1 class="page-header">Cronograma</h1>
                		<p>
                    	A continuación se muestran los cronogramas creados con las fechas definidas y los deportes que se realizan.
                		</p>

            		</section>

            		<section id="cronoregistro" style="display: none;">
            			<h1 class="page-header">Crear Cronograma</h1>
            			<br>
            		<form method="POST" action="./registrarcrono.php" class="from-group">
            			<div class="from-group">
	                    <label> Semestre:</label>
	                    <select class="form-control" type="number" id="sem" name="sem" required="true">
	                    	<option value="1">Primer Semestre</option>
	                    	<option value="2">Segundo Semestre</option>
	                    </select>
	                    </div>
	                    <br>
	                    <div class="from-group">
	                    <label>Año: </label>
	                    <select class="form-control" id="año" name="año" required="true">
	                    	<?php
	                    		$a=1980;
	                    		for ($i=0; $i <50 ; $i++) { 
	                    		 
	                    		 $a++;	
	                    		  	                       			
	                       		?>	
	                       		<option value="<?php echo $a ?>"><?php echo $a; ?></option>
	                       		<?php
	                    		}

	                    	?>
	                    </select>
	                    </div>
	                    <br>
	                    <div class="from-group">
	                    <label>Fecha Inicio:</label>	
	                    <input type="date" id="fechini" name="fechini" required="true" class="form-control">
	                    </div>
	                    <br>
	                    <div class="from-group">
	                    <label>Fecha Fin:</label>	
	                    <input type="date" id="fechfin" name="fechfin" required="true" class="form-control">
	                    </div>
	                    <br>
	                    <div class="from-group">
	                    <label>Descripcion:</label>	
	                    <textarea id="descrip" rows="3" cols="100" name="descrip" class="form-control"></textarea>
	                    </div>
	                    <br>
	                    <input type="submit" name="crcrono" class="ufps-btn" value="Crear Cronograma">
                	</form>
            		</section>
            		

		 		</div>
		</div>
		 
    </div>

	

		 


  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/ufps.min.js"></script>
    <script src="../js/main_crono.js"></script>
  </body>
</html>