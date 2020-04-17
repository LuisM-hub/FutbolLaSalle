<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Crear nuevo alumno</title>
	<link href="estilo.css" rel="stylesheet" text="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
</head>

<body style="background-color: rgb(79, 79, 79);  overflow: auto;">
	<p style=" color: rgb(111, 207, 151);align-self: center; text-align: center; font:bolder;font-size: 20px;padding: 0px;">CREAR ALUMNO</p>
	<a href="admin.php" style=" border: none; color: rgb(224, 224, 224); padding: 0px; margin: 0px; position: relative; align-content: center"><i class="material-icons">home</i></a>		
<div class="row" style="align-content: center; align-items: center; text-align: center;">
	
		<form action="crearJug.php" method="post" class="col s9" style="background-color: rgb(111, 207, 151); margin: auto;  margin-left: 170px; padding: 30px;"> 
		  <div class="row">
			  <div class="input-field col s2"></div>
			   <div class="input-field col s4">
				  <input id="nombre" type="text" class="validate" name="nombre" pattern="[A-Za-z]{1,30}" style="color: white; border-color: rgb(51, 51, 51);" required>
				  <label for="nombre" style="color: white;">Nombre</label>
				</div>
				<div class="input-field col s4">
				  <input id="apellido" name ="apellido" type="text" class="validate" pattern="[A-Za-z]{1,30}" style="color: white; border-color: rgb(51, 51, 51);" required >
				  <label for="apellido" style="color: white;">Apellido</label>
				</div>
		  </div>
		  <div class="row">
			  <div class="input-field col s2"></div>
				<div class="input-field col s4">
				  <input id="contra" name="contra" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,11}"
 			 title="Debe contener 1 número, una mayúscula y una minúscula. Longitud entre 8 a 11 caracteres." class="validate" style="color: white; border-color: rgb(51, 51, 51);" required>
				  <label for="contra" style="color: white;">Contraseña</label>
				</div>	
		  </div>
		   <div class="row">
			   <div class="input-field col s2"></div>
				<div class="input-field col s4">
				  <input id="email" name="email" type="email" class="validate" style="color: white; border-color: rgb(51, 51, 51);" required>
				  <label for="email" style="color: white;">Email</label>
				</div>
				<div class="input-field col s4">
				    <input type ="number"  id = "clave" name="clave" pattern="[0-9]+{8,10}" class = "validate" required  style="color: white; border-color: rgb(51, 51, 51);" >
					<label for="clave" style="color: white;">Clave ulsa</label>
				</div>
		     </div>
			 <div class="row">
				 <div class="input-field col s2"></div>
					 <div class="input-field col s4">
						 <input type = "date" id = "fecha" name="fecha" class = "fecha" required style="color: white; border-color: rgb(51, 51, 51);" >
						 <label for="fecha" style="color: white;">Fecha de nacimiento</label>
					 </div>
					<div class="input-field col s4">
						<input type	= "text" id = "equipo" name="equipo" class = "validate" required style="color: white; border-color: rgb(51, 51, 51);" >
 						 <label for="equipo" style="color: white;">Equipo</label>
					 </div>
			  </div>
				 <div class="row">
					 <div class="input-field col s2"></div>
					 <div class="input-field col s4">
						<div><label for="posicion" style="color: white;">Posición</label></div>
						<select class="browser-default" id="posicion" name="posicion" required style="height: 30px; background-color:  rgb(111, 207, 151); color: white; border-color: rgb(51, 51, 51); margin-bottom: 10px;">
						  <option disabled selected value> -- select an option -- </option>
						  <option value="1">Delantero</option>
						  <option value="2">Portero</option>
						  <option value="3">Defensa</option>
						  <option value="4">Mediocampo</option>
						</select>	 
						
					 </div>
					  <div class="input-field col s4">
						<input type	= "number" id = "num" name="num" class = "validate" pattern="[0-9]+{1,2}" required style="color: white; border-color: rgb(51, 51, 51);" >			 
						<label for="num" style="color: white;">Numero del jugador</label>
					</div>
				 </div> 
		  				
				<input type	= "submit" value = "Registrar" class="btn-registro">
		</form>
	
  </div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

