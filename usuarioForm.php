<?php

session_start();
if(!isset($_SESSION['rol']))
{
	header('location: inicio.php');
}
else{
	if($_SESSION['rol'] != 1)
	{
		header('location: inicio.php');
	}
}

include 'database.php';

	$sql= "Select * from Teams";
	$result=mysqli_query($conexion,$sql);
	mysqli_close($conexion);

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Crear nuevo alumno</title>
	<link href="estilo.css" rel="stylesheet" text="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
</head>

<body>
<div style="background-image: url('https://www.bbva.com/wp-content/uploads/2019/03/estadio-campo-futbol-bbva-1024x577.jpg');background-repeat: no-repeat;background-attachment: fixed; background-size: cover; height: 130%; opacity: 0.8">
	
	<a href="admin.php" style=" border: none; color: white; padding: 0px; margin: 0px; position: relative; align-content: center"><i class="material-icons">home</i></a>		
	<p style=" color: rgba(46,79,47,1.00); align-self: center; text-align: center; font-family: Impact; font:bolder; font-size: 50px; opacity: 1; padding: 1px; margin: 1px;">CREAR ALUMNO</p> 
	
<div class="row" style="align-content: center; align-items: center; text-align: center;">
	
		<form action="crearJug.php" method="post" class="col s9" style="background-color: rgba(46,79,47,1.00); margin: auto;  margin-left: 170px; padding: 30px; padding-top: 0px; opacity: 1;"> 
		  <div class="row">
			  <div class="input-field col s2"></div>
			   <div class="input-field col s4">
				  <input id="nombre" type="text" class="validate" name="nombre" pattern="[A-Za-z]{1,30}" style="color: white; border-color: white;" required>
				  <label for="nombre" style="color: white;">Nombre</label>
				</div>
				<div class="input-field col s4">
				  <input id="apellido" name ="apellido" type="text" class="validate" pattern="[A-Za-z]{1,30}" style="color: white; border-color:white;" required >
				  <label for="apellido" style="color: white;">Apellido</label>
				</div>
		  </div>
		  <div class="row">
			  <div class="input-field col s2"></div>
				<div class="input-field col s4">
				  <input id="contra" name="contra" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,11}"
 			 title="Debe contener 1 número, una mayúscula y una minúscula. Longitud entre 8 a 11 caracteres." class="validate" style="color: white; border-color: white;" required>
				  <label for="contra" style="color: white;">Contraseña</label>
				</div>	
		  </div>
		   <div class="row">
			   <div class="input-field col s2"></div>
				<div class="input-field col s4">
				  <input id="email" name="email" type="email" class="validate" style="color: white; border-color: white;" required>
				  <label for="email" style="color: white;">Email</label>
				</div>
				<div class="input-field col s4">
				    <input type ="number"  id = "clave" name="clave" pattern="[0-9]+{8,10}" class = "validate" required  style="color: white; border-color: white;" >
					<label for="clave" style="color: white;">Clave ulsa</label>
				</div>
		     </div>
			 <div class="row">
				 <div class="input-field col s2"></div>
					 <div class="input-field col s4">
						 <input type = "date" id = "fecha" name="fecha" class = "fecha" required style="color: white; border-color: white;" >
						 <label for="fecha" style="color: white;">Fecha de nacimiento</label>
					 </div>
					<div class="input-field col s4">
						<div> <label for="equipo" style="color: white;">Equipo </label></div>
					<select style="height: 30px; background-color: rgba(46,79,47,1.00); color: white; border-color: white; margin-bottom: 10px;" class="browser-default" id="equipo" name="equipo" required <?php if(isset($_POST['btn_iniciar'])) {?> disabled="disabled"  <?php } else{ ?> enabled="enabled" <?php } ?> >
						<option disabled selected value> -- select an option -- </option>
							  <?php
								while($row=mysqli_fetch_assoc($result)){
										$id=$row["ID_Team"];
										$name = $row["Team_Name"];
									echo " <option value='$id'>$name</option>";
								}
							?>
					</select>	
					 </div>
			  </div>
				 <div class="row">
					 <div class="input-field col s2"></div>
					 <div class="input-field col s4">
						<div><label for="posicion" style="color: white;">Posición</label></div>
						<select class="browser-default" id="posicion" name="posicion" required style="height: 30px; background-color:  rgba(46,79,47,1.00); color: white; border-color: white; margin-bottom: 10px;">
						  <option disabled selected value> -- select an option -- </option>
						  <option value="1">Delantero</option>
						  <option value="2">Portero</option>
						  <option value="3">Defensa</option>
						  <option value="4">Mediocampo</option>
						</select>	 
						
					 </div>
					  <div class="input-field col s4">
						<input type	= "number" id = "num" name="num" class = "validate" pattern="[0-9]+{1,2}" required style="color: white; border-color: white;" >			 
						<label for="num" style="color: white;">Numero del jugador</label>
					</div>
				 </div> 
		  				
				<input type	= "submit" value = "Registrar" class="btn-registro">
		</form>
	
  </div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	
	
	</div>
</body>
</html>

