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
		                 <a href="./dash_adm_crono.php" class="ufps-navbar-btn">Cronograma</a>
		                 <a href="#" class="ufps-navbar-btn">Deportes</a>
		                 <a href="./dash_adm_partido.php" class="ufps-navbar-btn">Partidos</a>
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
					   
					    <button class="ufps-btn-accordion">Deportes</button>
					    <div class="ufps-accordion-panel">
					    	<ul class="nav nav-sidebar">
					    		<li><a role="button" id="depor"> Listar Deportes</a></li>
					    	</ul>
					        
					    </div>
					    <button class="ufps-btn-accordion">Deportistas</button>
					    <div class="ufps-accordion-panel">
					    	<ul class="nav nav-sidebar">
					    		<li><a role="button" id="dep_tistas"> Listar Deportistas</a></li>
					    	</ul>
					        
					    </div>
					    
					</div>         
		 		</div>
		 		<div class="ufps-col-mobile-6 ufps-col-tablet-9">
		 			
		 			<section id="deporini">
		 				<button type="button" class="btn btn-default btn-md pull-right" onclick="openModal('modalrdeporte')" ><span class="glyphicon glyphicon-plus"></span>Agregar</button>
                		<h1 class="page-header"> Listado Deportes</h1>
                		<p>
                    	A continuación se muestran los deportes creados con la cantidad de jugadores y la jornada que se realizan.
                		</p>

            		
            		<section id="depor_dash">
            			<br>
            			<div class="table-responsive">
            				<table class="ufps-table ufps-table-inserted">
            					<thead>
            						<th>ID Deporte</th>
            						<th>Nombre</th>
            						<th>N° Jugadores</th>
            						<th>Jornada Deportiva</th>
            						<th colspan="2">Operaciones</th>
            					</thead>

            					<?php
            					include("conexion.php");
            					$consulta = "SELECT d.idDeporte, d.nombre, d.cantidadJugadores, d.idJornada, j.descripcion FROM deporte d INNER JOIN jornadadeportiva j ON j.idJornada=d.idJornada 
									ORDER BY d.idDeporte ASC";

            					$con = new conexion;
            					$resultado = $con->consulta($consulta);

            					while ($row = $resultado->fetch_assoc()) {
            					
            					?>

            					<tr>
            						<td><?php echo $row['idDeporte']; $idDeporte = $row['idDeporte']; ?></td>
            						<td><?php echo $row['nombre']; $nom = $row['nombre']; ?></td>
            						<td><?php echo $row['cantidadJugadores']; $cantJ = $row['cantidadJugadores']; ?></td>
            						<td><?php echo $row['descripcion']; $jornada = $row['idJornada']; ?></td>
            						<td><button type="button" class="btn btn-success btn-sm" onclick="modificardeporte('<?php echo $idDeporte; ?>','<?php echo $nom; ?>','<?php echo $cantJ; ?>', '<?php echo $jornada; ?>');openModal('modalmdeporte');"><span class="glyphicon glyphicon-eye-open"></span></button></td>
            						<td><a href="./eliminardeporte.php?iddeporte=<?php echo $row['idDeporte'];?>" type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>
            					</tr>

            					<?php
            				}
            					?>



            				</table>
            			</div>

            		</section>
            		</section>

            		<section id="deportistas" style="display: none;">
            			<button type="button" class="btn btn-default btn-md pull-right" onclick="openModal('modalrdeportista')" ><span class="glyphicon glyphicon-plus"></span>Agregar</button>
            			<h1 class="page-header">Listado de Deportistas</h1>
            			<p>
            				Listado de Deportistas inscritos en los diferentes equipo.
            			</p>
            			<br>

            			<div class="table-responsive">
            				<table class="ufps-table ufps-table-inserted ">
            					<thead>
            						<th>Codigo Deportista</th>
            						<th>Nombres</th>
            						<th>Apellidos</th>
            						<th>Edad</th>
            						<th>Genero</th>
            						<th>Correo</th>
            						<th>Equipo</th>
            						<th colspan="2">Operaciones</th>
            					</thead>

            					<?php
            					
            					$consulta = "SELECT d.codigo, d.nombre, d.apellido, d.edad, d.genero, d.correo, d.idEquipo, e.nombre AS equipo FROM deportista d INNER JOIN equipo e ON d.idEquipo = e.idEquipo ORDER BY d.nombre ASC";

            					$con = new conexion;
            					$resultado = $con->consulta($consulta);

            					while ($row = $resultado->fetch_assoc()) {
            					
            					?>

            					<tr>
            						<td><?php echo $row['codigo']; $codigo= $row['codigo']; ?></td>
            						<td><?php echo $row['nombre']; $nom = $row['nombre']; ?></td>
            						<td><?php echo $row['apellido']; $apell = $row['apellido']; ?></td>
            						<td><?php echo $row['edad']; $edad = $row['edad']; ?></td>
            						<td><?php echo $row['genero']; $gen= $row['genero']; ?></td>
            						<td><?php echo $row['correo']; $correo = $row['correo']; ?></td>
            						<td><?php echo $row['equipo']; $equipo = $row['idEquipo']; ?></td>
            						<td><button type="button" class="btn btn-success btn-sm" onclick="modificardeportista('<?php echo $codigo; ?>','<?php echo $nom; ?>','<?php echo $apell; ?>', '<?php echo $edad; ?>','<?php echo $gen; ?>','<?php echo $correo; ?>','<?php echo $equipo; ?>');openModal('modalmdeportista');"><span class="glyphicon glyphicon-eye-open"></span></button></td>
            						<td><a href="./eliminardeportista.php?codigo=<?php echo $row['codigo'];?>" type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>
            					</tr>

            					<?php
            				}
            					?>



            				</table>
            			</div>

            		</section>

            		<div id="modalrdeporte" class="ufps-modal">
                        <div class="ufps-modal-content">
                            <div class="ufps-modal-header">
                                <span class="ufps-modal-close">×</span>
                                <h2>Registrar Deporte</h2>
                            </div>
                            <div class="ufps-modal-body">
                                <form method="POST" action="./registrodeporte.php" class="from-group">
                                    <div class="from-group">
                                    <label> Nombre:</label>
                                    <input type="text" id="nomdep" name="nomdep" required="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label> N° Jugadores:</label>
                                    <select class="form-control" id="numjug" name="numjug" required="true">
					                    	<?php
					                    		$a=4;
					                    		for ($i=0; $i <=15 ; $i++) { 
					                    		 
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
				                    <label>Jornada Deportiva:</label>	
				                    <select class="form-control" id="jord" name="jord" required="true">
                                        <?php
                                            $consulta = "SELECT * FROM jornadadeportiva";

                                            $con = new conexion;
                                            $resultado = $con->consulta($consulta);

                                            while ($row = $resultado->fetch_assoc()) {                                    
                                            ?>  
                                            <option value="<?php echo $row['idJornada'] ?>"><?php echo $row['descripcion']?></option>
                                            <?php
                                            }

                                        ?>
                                    </select>
				                    </div>
				                    <br>
                            </div>
                            <div class="ufps-modal-footer">
                                <input type="submit" name="regdeporte" class="ufps-btn" value="Registrar Deporte">
                             </div>
                            </form>
                         </div>
                    </div>
            		
            		

            		<div id="modalmdeporte" class="ufps-modal">
                        <div class="ufps-modal-content">
                            <div class="ufps-modal-header">
                                <span class="ufps-modal-close">×</span>
                                <h2>Modificar Deporte</h2>
                            </div>
                            <div class="ufps-modal-body">
                                <form method="POST" action="./modificardeporte.php" class="from-group">
                                    <div class="from-group">
                                    <label> ID Deporte:</label>
                                    <input type="number" name="middep" id="middep" required="true" class="form-control" disabled="true">
                                    <input type="number" id="middepor" name="middepor" required="true" class="form-control" style="display: none;">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label> Nombre:</label>
                                    <input type="text" id="mnomdep" name="mnomdep" required="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label> N° Jugadores:</label>
                                    <select class="form-control" id="mnumjug" name="mnumjug" required="true">
					                    	<?php
					                    		$a=4;
					                    		for ($i=0; $i <=15 ; $i++) { 
					                    		 
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
				                    <label>Jornada Deportiva:</label>	
				                    <select class="form-control" id="mjord" name="mjord" required="true">
                                        <?php
                                            $consulta = "SELECT * FROM jornadadeportiva";

                                            $con = new conexion;
                                            $resultado = $con->consulta($consulta);

                                            while ($row = $resultado->fetch_assoc()) {                                    
                                            ?>  
                                            <option value="<?php echo $row['idJornada'] ?>"><?php echo $row['descripcion']?></option>
                                            <?php
                                            }

                                        ?>
                                    </select>
				                    </div>
				                    <br>
                            </div>
                            <div class="ufps-modal-footer">
                                <input type="submit" name="moddeporte" class="ufps-btn" value="Modificar Deporte">
                             </div>
                            </form>
                         </div>
                    </div>



                    <div id="modalrdeportista" class="ufps-modal">
                        <div class="ufps-modal-content">
                            <div class="ufps-modal-header">
                                <span class="ufps-modal-close">×</span>
                                <h2>Registrar Deportista</h2>
                            </div>
                            <div class="ufps-modal-body">
                                <form method="POST" action="./registrodeportista.php" class="from-group">
                                    <div class="from-group">
                                    <label> Codigo:</label>
                                    <input type="text" id="coddts" name="coddts" required="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label> Nombres:</label>
                                    <input type="text" id="nomdts" name="nomdts" required="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label> Apellidos:</label>
                                    <input type="text" id="apedts" name="apedts" required="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label> Edad:</label>
                                    <input type="number" class="form-control" id="eddts" name="eddts" min="15" max="40" required="true">
                                    </div>
                                    <br>
                                    <div class="from-group">
				                    <label>Genero:</label>	
				                    <select class="form-control" id="gedts" name="gedts" required="true">
                                          
                                      <option value="M">Masculino</option>
                                      <option value="F">Fenemino</option>
                                    
                                    </select>
				                    </div>
				                    <br>
				                    <div class="from-group">
                                    <label> Correo:</label>
                                    <input type="email" id="cordts" name="cordts" required="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
				                    <label>Equipo:</label>	
				                    <select class="form-control" id="eqdts" name="eqdts">
                                        <?php
                                            $consulta = "SELECT * FROM equipo";

                                            $con = new conexion;
                                            $resultado = $con->consulta($consulta);

                                            while ($row = $resultado->fetch_assoc()) {                                    
                                            ?>  
                                            <option value="<?php echo $row['idEquipo'] ?>"><?php echo $row['nombre']?></option>
                                            <?php
                                            }

                                        ?>
                                    </select>
				                    </div>
				                    <br>

                            </div>
                            <div class="ufps-modal-footer">
                                <input type="submit" name="regdeportista" class="ufps-btn" value="Registrar Deportista">
                             </div>
                            </form>
                         </div>
                    </div>
            		
            		

            		<div id="modalmdeportista" class="ufps-modal">
                        <div class="ufps-modal-content">
                            <div class="ufps-modal-header">
                                <span class="ufps-modal-close">×</span>
                                <h2>Modificar Deportista</h2>
                            </div>
                            <div class="ufps-modal-body">
                                <form method="POST" action="./modificardeportista.php" class="from-group">
                                    <div class="from-group">
                                    <label> Codigo:</label>
                                    <input type="number" name="mcodts" id="mcodts" required="true" class="form-control" disabled="true">
                                    <input type="number" id="mcoddts" name="mcoddts" required="true" class="form-control" style="display: none;">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label> Nombres:</label>
                                    <input type="text" id="mnomdts" name="mnomdts" required="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label> Apellidos:</label>
                                    <input type="text" id="mapedts" name="mapedts" required="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label> Edad:</label>
                                    <input type="number" class="form-control" id="meddts" name="meddts" min="15" max="40" required="true">
                                    </div>
                                    <br>
                                    <div class="from-group">
				                    <label>Genero:</label>	
				                    <select class="form-control" id="mgedts" name="mgedts" required="true">
                                          
                                      <option value="M">Masculino</option>
                                      <option value="F">Fenemino</option>
                                    
                                    </select>
				                    </div>
				                    <br>
				                    <div class="from-group">
                                    <label> Correo:</label>
                                    <input type="email" id="mcordts" name="mcordts" required="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
				                    <label>Equipo:</label>	
				                    <select class="form-control" id="meqdts" name="meqdts" disabled="true">
                                        <?php
                                            $consulta = "SELECT * FROM equipo";

                                            $con = new conexion;
                                            $resultado = $con->consulta($consulta);

                                            while ($row = $resultado->fetch_assoc()) {                                    
                                            ?>  
                                            <option value="<?php echo $row['idEquipo'] ?>"><?php echo $row['nombre']?></option>
                                            <?php
                                            }

                                        ?>
                                    </select>
				                    </div>
				                    <br>
                            </div>
                            <div class="ufps-modal-footer">
                                <input type="submit" name="moddeportista" class="ufps-btn" value="Modificar Deportista">
                             </div>
                            </form>
                         </div>
                    </div>

		 		</div>
		</div>
		 
    </div>

	

		 


  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/ufps.min.js"></script>
    <script src="../js/main_depor.js"></script>
    <script src="../js/modificar.js"></script>
  </body>
</html>