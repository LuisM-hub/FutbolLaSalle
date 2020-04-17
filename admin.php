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

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Menu administrador</title>
	<link href="estilo.css" rel="stylesheet" text="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">				
</head>

<body style="background-color: rgb(51, 51, 51); overflow: auto;">
	
	<DIV style="width: 80%; align-content: center; padding-left: 190px; margin-top: 40px">
		<a href="cerrar.php" style="background-color:rgb(79, 79, 79); border: none; color: rgb(224, 224, 224);">CERRAR SESION<i class="material-icons">clear</i></a>
		<div class="row row-cols-1 row-cols-md-2">
		  <div class="col mb-4">
			<div class="card">
			  <img src="https://upload.wikimedia.org/wikipedia/commons/b/b9/Football_iu_1996.jpg" class="card-img-top" alt="https://upload.wikimedia.org/wikipedia/commons/b/b9/Football_iu_1996.jpg" style="height: 207px;">
			  <div class="card-body" style="background-color: rgb(79, 79, 79); color: rgb(187, 107, 217);">
				<h5 class="card-title">Agregar Alumno</h5>
				<p class="card-text">Completar formulario para agregar un nuevo alumno.</p>
				  <a href="usuarioForm.php" style="background-color:rgb(79, 79, 79); border: none; color: rgb(224, 224, 224); padding: 0px; margin: 0px; position: relative; align-content: center"><i class="material-icons">keyboard_arrow_right</i></a>
			  </div>
			</div>
		  </div>
			  <div class="col mb-4">
			<div class="card">
			  <img src="https://conceptodefinicion.de/wp-content/uploads/2011/02/F%C3%BAtbol.jpg" class="card-img-top" alt="https://conceptodefinicion.de/wp-content/uploads/2011/02/F%C3%BAtbol.jpg" style="height: 207px;">
			  <div class="card-body" style="background-color: rgb(79, 79, 79); color: rgb(187, 107, 217);">
				<h5 class="card-title">Administrar Alumnos</h5>
				<p class="card-text">Eliminar o modificar el perfil de un alumno.</p>
				    <a href="cambio.php" style="background-color:rgb(79, 79, 79); border: none; color: rgb(224, 224, 224); padding: 0px; margin: 0px; position: relative; align-content: center"><i class="material-icons">keyboard_arrow_right</i></a>
				 
			  </div>
			</div>
		  </div>
			 <div class="col mb-4">
			<div class="card">
			  <img src="https://as01.epimg.net/us/imagenes/2016/11/04/futbol/1478221890_991119_1478355257_noticia_normal_recorte1.jpg" class="card-img-top" alt="https://as01.epimg.net/us/imagenes/2016/11/04/futbol/1478221890_991119_1478355257_noticia_normal_recorte1.jpg" style="height: 207px;">
			  <div class="card-body" style="background-color: rgb(79, 79, 79); color: rgb(187, 107, 217);">
				<h5 class="card-title">Agregar Reclutadores</h5>
				<p class="card-text">Agregar cuentas de reclutadores.</p>
				  <a href="crearRec.php" style="background-color:rgb(79, 79, 79); border: none; color: rgb(224, 224, 224); padding: 0px; margin: 0px; position: relative; align-content: center"><i class="material-icons">keyboard_arrow_right</i></a>
			  </div>
			</div>
		  </div>
		  <div class="col mb-4">
			<div class="card">
			  <img src="https://futbolenpositivo.com/wp-content/uploads/2016/05/zidane.jpg" class="card-img-top" alt="https://futbolenpositivo.com/wp-content/uploads/2016/05/zidane.jpg" style="height: 207px;">
			  <div class="card-body" style="background-color: rgb(79, 79, 79); color: rgb(187, 107, 217);">
				<h5 class="card-title">Administrar Reclutadores</h5>
				<p class="card-text">Eliminar, suspender o renovar cuentas de reclutadores.</p>
				  <a href="cambioRec.php" style="background-color:rgb(79, 79, 79); border: none; color: rgb(224, 224, 224); padding: 0px; margin: 0px; position: relative; align-content: center"><i class="material-icons">keyboard_arrow_right</i></a>
			  </div>
			</div>
		  </div>
		  <div class="col mb-4">
			<div class="card">
			  <img src="https://as01.epimg.net/showroom/imagenes/2019/08/27/portada/1566912669_925189_1566913002_noticia_normal_recorte1.jpg" class="card-img-top" alt="https://as01.epimg.net/showroom/imagenes/2019/08/27/portada/1566912669_925189_1566913002_noticia_normal_recorte1.jpg" style="height: 207px;">
			  <div class="card-body" style="background-color: rgb(79, 79, 79); color: rgb(187, 107, 217);">
				<h5 class="card-title">Nuevo partido</h5>
				<p class="card-text">Iniciar nuevo partido y anotar puntajes.</p>
			  </div>
			</div>
		  </div>
		  <div class="col mb-4">
			<div class="card">
			  <img src="https://image.freepik.com/vector-gratis/estadisticas-futbol-soccer-plantilla-marcador_7233-236.jpg" class="card-img-top" alt="https://image.freepik.com/vector-gratis/estadisticas-futbol-soccer-plantilla-marcador_7233-236.jpg" style="height: 207px;">
			  <div class="card-body" style="background-color: rgb(79, 79, 79); color: rgb(187, 107, 217);">
				<h5 class="card-title">Ver estadisticas</h5>
				<p class="card-text">Revisar y modificar las estadísticas de los jugadores.</p>
			  </div>
			</div>
		  </div>
		</div>
</DIV>
	
	
	
	
	
	
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

