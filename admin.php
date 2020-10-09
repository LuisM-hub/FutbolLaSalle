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

<body style="background-image: url('https://img.freepik.com/free-vector/stylish-hexagonal-line-abstract-background_1017-20593.jpg?size=626&ext=jpg'); overflow: auto; background-repeat: no-repeat;background-attachment: fixed; background-size: cover">
	
	<a href="cerrar.php" style="border: none; color: rgba(118,114,114,1.00);"><i class="material-icons">clear</i></a>
	<DIV style="width: 80%; align-content: center; margin: auto; margin-top: 30px;">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 50%; float: left; border-radius: 5px;">
		  <ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="3"></li> 
		  </ol>
		  <div class="carousel-inner">
			<div class="carousel-item active">
			  <img class="d-block w-100" src="https://upload.wikimedia.org/wikipedia/commons/b/b9/Football_iu_1996.jpg" alt="First slide" style="height: 300px; opacity: 1; border-radius: 5px;">
				<div class="carousel-caption d-none d-md-block">
					<h2>Agregar Alumno</h2>
					<p>Completar formulario para agregar un nuevo alumno.</p>
					 <a href="usuarioForm.php" style=" border: none; color: rgb(224, 224, 224); padding: 0px; margin: 0px; position: relative; align-content: center"><img src="img/football.png" style="width: 40px; height: 40px;"></a>
				  </div>
			</div>
			<div class="carousel-item">
			  <img class="d-block w-100" src="https://as01.epimg.net/us/imagenes/2016/11/04/futbol/1478221890_991119_1478355257_noticia_normal_recorte1.jpg" alt="Second slide" style="opacity: 1; height: 300px; border-radius: 5px;">
				<div class="carousel-caption d-none d-md-block">
					<h2>Agregar Reclutadores</h2>
					<p>Completar formulario para agregar un reclutador.</p>
					<a href="crearRec.php" style=" border: none; color: rgb(224, 224, 224); padding: 0px; margin: 0px; position: relative; align-content: center"><img src="img/football.png" style="width: 40px; height: 40px;"></a>
				  </div>
			</div>
			<div class="carousel-item">
			  <img class="d-block w-100" src="https://as01.epimg.net/showroom/imagenes/2019/08/27/portada/1566912669_925189_1566913002_noticia_normal_recorte1.jpg" alt="Third slide" style="opacity: 1; height: 300px; border-radius: 5px;">
				<div class="carousel-caption d-none d-md-block">
					<h2>Nuevo partido</h2>
					<p>Programar un nuevo partido.</p>
					<a href="partido.php" style=" border: none; color: rgb(224, 224, 224); padding: 0px; margin: 0px; position: relative; align-content: center"><img src="img/football.png" style="width: 40px; height: 40px;"></a>
				  </div>
			</div>
			<div class="carousel-item">
			  <img class="d-block w-100" src="https://4.bp.blogspot.com/-UjeJIZnRs7s/VBCUzmCws_I/AAAAAAAASak/cRFAXQRZFPY/s1600/futbol.jpg" style="height: 300px; opacity: 1; border-radius: 5px;" alt="Fourth slide slide">
				<div class="carousel-caption d-none d-md-block">
					<h2>Partidos programados</h2>
					<p>Ver partidos programados e iniciar.</p>
					<a href="programados.php" style=" border: none; color: rgb(224, 224, 224); padding: 0px; margin: 0px; position: relative; align-content: center"><img src="img/football.png" style="width: 40px; height: 40px;"></a>
				  </div>
			</div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		  </a>
		</div>
		
		<div style="float: left; width: 50%; height: 300px;">
		<table style="color: darkgray;">
			<tr>
				<td style="width: 50%">
					<div class="card bg-dark text-white">
					  <img class="card-img" src="https://conceptodefinicion.de/wp-content/uploads/2011/02/F%C3%BAtbol.jpg" alt="Card image" style="height: 298px;  opacity: 0.5; width: 100%;">
					  <div class="card-img-overlay">
						<h2 class="card-title">Administrar Alumnos</h2>
						<p class="card-text">Eliminar o modificar el perfil de un alumno.</p>
						<a href="cambio.php" style=" border: none; color: rgb(224, 224, 224); padding: 0px; margin: 0px; position: relative; align-content: center"><img src="img/football.png" style="width: 40px; height: 40px;"></a>
					  </div>
					</div>
				</td>	
				<td style="width: 50%">
					<div class="card bg-dark text-white"  >
					  <img class="card-img" src="https://futbolenpositivo.com/wp-content/uploads/2016/05/zidane.jpg" alt="Card image" style="height: 298px;  opacity: 0.5; width: 100%;">
					  <div class="card-img-overlay">
						<h2 class="card-title">Administrar Reclutadores</h2>
						<p class="card-text">Eliminar o modificar cuentas de reclutadores.</p>
						<a href="cambioRec.php" style=" border: none; color: rgb(224, 224, 224); padding: 0px; margin: 0px; position: relative; align-content: center"><img src="img/football.png" style="width: 40px; height: 40px;"></a>
					  </div>
					</div>
				</td>
			</tr>
		</table>
		 </div>
			<table>
				<tr>
					<td  style="width: 50%;">
						<div class="card bg-dark text-white" style="width: 100%;">
						  <img class="card-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcShGtqREJS0T39HWp6ThoAQExZNtgZnKSeVKYOcSaFhbIK_pIO7&usqp=CAU" alt="Card image" style="height: 150px; opacity: 0.5; width: 100%;">
						  <div class="card-img-overlay">
							<h2 class="card-title">Ver estadisticas</h2>
							<p class="card-text">Revisar las estadísticas de los equipos.</p>
							 <a href="graficas.php" style=" border: none; color: rgb(224, 224, 224); padding: 0px; margin: 0px; position: relative; align-content: center"><img src="img/football.png" style="width: 40px; height: 40px;"></a>
						  </div>
						</div>
					</td>
					<td  style="width: 50%;">
						<div class="card bg-dark text-white" style="width: 100%;">
						  <img class="card-img" src="https://i2.wp.com/www.thepublisheronline.com/wp-content/uploads/2018/12/FIFA-World-Ranking.jpg?fit=696%2C385&ssl=1" alt="Card image" style="height: 150px;  opacity: 0.5;">
						  <div class="card-img-overlay">
							<h2 class="card-title">Ranking</h2>
							<p class="card-text">Visualizar rankings.</p>
							<a href="rankin.php" style=" border: none; color: rgb(224, 224, 224); padding: 0px; margin: 0px; position: relative; align-content: center"><img src="img/football.png" style="width: 40px; height: 40px;"></a>
						  </div>
						</div>
					</td>
				</tr>
		</table>
	
		
</DIV>
	
	
	
	
	
	
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

