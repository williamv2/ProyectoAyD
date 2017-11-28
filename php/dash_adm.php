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
		                 <a href="#" class="ufps-navbar-btn">Inicio</a>
		                 <a href="./dash_adm_crono.php" class="ufps-navbar-btn">Cronograma</a>
		                 <a href="./dash_adm_deportes.php" class="ufps-navbar-btn">Deportes</a>
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
					    <button class="ufps-btn-accordion" id="inicio">Inicio</button>
					   
					    <button class="ufps-btn-accordion">Delegados</button>
					    <div class="ufps-accordion-panel">
					    	<ul class="nav nav-sidebar">

					    		<li><a role="button" id="listdeg">Listar Delegados</a></li>

					    	</ul>
					        
					    </div>
					    <button class="ufps-btn-accordion">Equipos</button>
					    <div class="ufps-accordion-panel">
					    	<ul class="nav nav-sidebar">

					    		<li><a role="button" id="listEq">Listar Equipos</a></li>

					    	</ul>
					        
					    </div>
					    
					</div>         
		 		</div>
		 		<div class="ufps-col-mobile-6 ufps-col-tablet-9">
		 			
		 			<section id="dash_ini">
                		<h1 class="page-header">Dashboard</h1>
                		<p>
                    	A continuación se presentan la cantidad de integrantes inscritos por cada deporte, los deportes escojidos y delegados a cargo.
                		</p>

            		</section>
            		<section id="dash_table">
            			
            			<h1 class="page-header">Fechas de Partidos</h1>
            			<p>
                    	A continuación se presentan las fechas de los partidos acorde al cronograma.
                		</p>
                		<table class="ufps-table ufps-table-inserted ufps-text-left">
						    <thead>
						        <th>No.</th>
						        <th>Deporte</th>
						        <th>Fecha</th>
						        <th>Equipo Visitante</th>
						        <th>Equipo Local</th>
						        <th>Hora</th>
						    </thead>
						    <tr>
						        <td>1</td>
						        <td>Futbol</td>
						        <td>12-11-2017</td>
						        <td>Java</td>
						        <td>NULL</td>
						        <td>4:00 pm</td>
						    </tr>
						   
						</table>

            		</section>


            		<section>

                    

            		<section id="dash_equi" style="display: none;">

                        <button type="button" class="btn btn-default btn-md pull-right" onclick="openModal('modalreg')" ><span class="glyphicon glyphicon-plus"></span>Agregar</button> 
            			<h1>Equipos</h1>

                        <hr>
            			<div class="table-responsive">
            				<table class="ufps-table ufps-table-inserted">
            					<thead>
            						<th>ID Equipo</th>
            						<th>Nombre</th>
            						<th>Cantidad de Jugadores</th>
            						<th>Deportes</th>
            						<th>Puntos</th>
            						<th colspan="2">Operaciones</th>
            					</thead>

            					<?php

            					include("conexion.php");

            					$consulta = "SELECT e.idEquipo, e.nombre, e.cantidadJugador, d.idDeporte, d.nombre as deporte, e.puntos FROM equipo e
            					INNER JOIN deporte d ON e.idDeporte = d.idDeporte ORDER BY e.idEquipo ASC";

            					$con = new conexion;
            					$resultado = $con->consulta($consulta);

            					while ($row = $resultado->fetch_assoc()) {
            					
            					?>

            					<tr>
            						<td><?php echo $row['idEquipo']; $idEqui = $row['idEquipo']; ?></td>
            						<td><?php echo $row['nombre']; $nom = $row['nombre']; ?></td>
            						<td><?php echo $row['cantidadJugador']; $cantj = $row['cantidadJugador']; ?></td>
            						<td><?php echo $row['deporte']; $depor = $row['idDeporte']; ?></td>
            						<td><?php echo $row['puntos']; $puntos = $row['puntos']; ?></td>

            						<td><button type="button" class="btn btn-success btn-sm" onclick="modificarequipo('<?php echo $idEqui; ?>','<?php echo $nom; ?>','<?php echo $cantj; ?>', '<?php echo $depor; ?>');openModal('modalmodifieq');"><span class="glyphicon glyphicon-eye-open"></span></button></td>
            						<td><a href="./eliminarEq.php?idequipo=<?php echo $row['idEquipo']?>&&cantju=<?php echo $row['cantidadJugador'];?>" type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>

            					</tr>

            					<?php
            				}
            					?>



            				</table>
            			</div>

            		</section>

                    <section id="dash_del" style="display: none;">

                        <button type="button" class="btn btn-default btn-md pull-right" onclick="openModal('modalrdel')" ><span class="glyphicon glyphicon-plus"></span>Agregar</button> 
                        <h1>Delegados</h1>

                        <hr>
                        <div class="table-responsive">
                            <table class="ufps-table ufps-table-inserted">
                                <thead>
                                    <th>ID</th>
                                    <th>Codigo</th>
                                    <th>Clave</th>
                                    <th>Nombre</th>
                                    <th>Jornada asignada</th>
                                    <th colspan="2">Operaciones</th>
                                </thead>

                                <?php

                                

                                $consulta = "SELECT u.id, u.codigo, u.clave, d.nombre, d.apellido, j.idJornada, j.descripcion FROM usuario u INNER JOIN deportista d ON u.codigo=d.codigo INNER JOIN jornadadeportiva j ON j.idJornada=u.asigna WHERE u.tipo='D'";

                                $con = new conexion;
                                $resultado = $con->consulta($consulta);

                                while ($row = $resultado->fetch_assoc()) {
                                
                                ?>

                                <tr>
                                    <td><?php echo $row['id']; $id = $row['id']; ?></td>
                                    <td><?php echo $row['codigo']; $cod = $row['codigo']; ?></td>
                                    <td><?php echo $row['clave']; $clv = $row['clave']; ?></td>
                                    <td><?php echo $row['nombre']." ".$row['apellido']; $nom = $row['nombre']." ".$row['apellido']; ?></td>
                                    <td><?php echo $row['descripcion']; $desc = $row['idJornada']; ?></td>

                                    <td><button type="button" class="btn btn-success btn-sm" onclick="modificardelegado('<?php echo $id; ?>','<?php echo $cod; ?>','<?php echo $clv; ?>', '<?php echo $nom; ?>','<?php echo $desc; ?>');openModal('modalmodifdel');"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                                    <td><a href="./eliminardel.php?iddelegado=<?php echo $row['id'];?>" type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>

                                </tr>

                                <?php
                            }
                                ?>



                            </table>
                        </div>

                        
                    
                    </section>

                    <div id="modalreg" class="ufps-modal">
                        <div class="ufps-modal-content">
                            <div class="ufps-modal-header">
                                <span class="ufps-modal-close">×</span>
                                <h2>Registrar Equipo</h2>
                            </div>
                            <div class="ufps-modal-body">
                                <form method="POST" action="./registroEq.php" class="from-group">
                                    <div class="from-group">
                                    <label> Nombre:</label>
                                    <input type="text" id="nombreEq" name="nombreEq" required="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label>Deporte:</label>
                                    <select class="form-control" id="deporte" name="deporte" required="true">
                                        <?php
                                            $consulta = "SELECT * FROM deporte";

                                            $con = new conexion;
                                            $resultado = $con->consulta($consulta);

                                            while ($row = $resultado->fetch_assoc()) {                                    
                                            ?>  
                                            <option value="<?php echo $row['idDeporte'] ?>"><?php echo $row['nombre']?></option>
                                            <?php
                                            }

                                        ?>
                                    </select>
                                    </div>
                                    <br>
                               
                            </div>
                            <div class="ufps-modal-footer">
                                <input type="submit" name="regEquipo" class="ufps-btn" value="Registar Equipo">
                             </div>
                            </form>
                         </div>
                    </div>


                    <div id="modalmodifieq" class="ufps-modal">
                        <div class="ufps-modal-content">
                            <div class="ufps-modal-header">
                                <span class="ufps-modal-close">×</span>
                                <h2>Modificar Equipo</h2>
                            </div>
                            <div class="ufps-modal-body">
                                <form method="POST" action="./modificarEq.php" class="from-group">
                                    <div class="from-group">
                                    <label> ID equipo:</label>
                                    <input type="number" name="mideq" id="mideq" required="true" class="form-control" disabled="true">
                                    <input type="number" id="midequi" name="midequi" required="true" class="form-control" style="display: none;">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label> Nombre:</label>
                                    <input type="text" id="mnomEq" name="mnomEq" required="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label> Cantidad Jugadores:</label>
                                    <input type="text" id="mcantju" name="mcantju" required="true" disabled="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label>Deporte:</label>
                                    <select class="form-control" id="mdeporte" name="mdeporte" required="true">
                                        <?php
                                            $consulta = "SELECT * FROM deporte";

                                            $con = new conexion;
                                            $resultado = $con->consulta($consulta);

                                            while ($row = $resultado->fetch_assoc()) {                                    
                                            ?>  
                                            <option value="<?php echo $row['idDeporte'] ?>"><?php echo $row['nombre']?></option>
                                            <?php
                                            }

                                        ?>
                                    </select>
                                    </div>
                                    <br>
                               
                            </div>
                            <div class="ufps-modal-footer">
                                <input type="submit" name="regEquipo" class="ufps-btn" value="Modificar Equipo">
                             </div>
                            </form>
                         </div>
                    </div>

                    <div id="modalrdel" class="ufps-modal">
                        <div class="ufps-modal-content">
                            <div class="ufps-modal-header">
                                <span class="ufps-modal-close">×</span>
                                <h2>Registrar Delegado</h2>
                            </div>
                            <div class="ufps-modal-body">
                                <form method="POST" action="./registrodel.php" class="from-group">
                                    <div class="from-group">
                                    <label>Deportista:</label>
                                    <select class="form-control" id="depts" name="depts" required="true">
                                        <?php
                                            $consulta = "SELECT codigo,nombre,apellido FROM deportista";

                                            $con = new conexion;
                                            $resultado = $con->consulta($consulta);

                                            while ($row = $resultado->fetch_assoc()) {                                    
                                            ?>  
                                            <option value="<?php echo $row['codigo'] ?>"><?php echo $row['nombre']." ".$row['apellido'];?></option>
                                            <?php
                                            }

                                        ?>
                                    </select>
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label>Clave:</label>
                                    <input type="password" name="delpass" id="delpass" required="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label>Jornada Asignada:</label>
                                    <select class="form-control" id="deljor" name="deljor" required="true">
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
                                <input type="submit" name="regDel" class="ufps-btn" value="Registar Delegado">
                             </div>
                            </form>
                         </div>
                    </div>

                    <div id="modalmodifdel" class="ufps-modal">
                        <div class="ufps-modal-content">
                            <div class="ufps-modal-header">
                                <span class="ufps-modal-close">×</span>
                                <h2>Modificar Delegado</h2>
                            </div>
                            <div class="ufps-modal-body">
                                <form method="POST" action="./modificardel.php" class="from-group">
                                    <div class="from-group">
                                    <label> ID delegado:</label>
                                    <input type="number" name="midde" id="midde" required="true" class="form-control" disabled="true">
                                    <input type="number" id="middel" name="middel" required="true" class="form-control" style="display: none;">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label> Codigo:</label>
                                    <input type="text" id="mcoddel" name="mcoddel" required="true" disabled="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label> Clave:</label>
                                    <input type="text" id="mclvdel" name="mclvdel" required="true" class="form-control">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label>Nombre:</label>
                                    <input class="form-control" id="mnomdel" name="mnomdel" required="true" disabled="true">
                                    </div>
                                    <br>
                                    <div class="from-group">
                                    <label>Jornada Asignada:</label>
                                    <select class="form-control" id="mjdel" name="mjdel" required="true">
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
                                <input type="submit" name="regEquipo" class="ufps-btn" value="Modificar Equipo">
                             </div>
                            </form>
                         </div>
                    </div>

            		

		 	</div>
		</div>
		
    </div>

	

		 


  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed-->
    <script src="../js/bootstrap.min.js"></script> 
    <script src="../js/ufps.min.js"></script>
    <script src="../js/main_inicio.js"></script>
    <script src="../js/modificar.js"></script>
  </body>
</html>