<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Reclutador</title>
	<link href="estilo.css" rel="stylesheet" text="text/css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body style="background-color:rgb(79, 79, 79);">
	<?php
		session_start();

		include"database.php"; 

		if(!isset($_SESSION['rol']))
		{
			header('location: inicio.php');
		}
		else{
			if($_SESSION['rol'] != 3)
			{
				header('location: inicio.php');
			}
		}
		$usuario= $_SESSION['user'];
	?>
	
	<a href="cerrar.php" style="background-color:rgb(79, 79, 79); border: none; color: rgb(224, 224, 224); padding: 0px; margin: 0px; position: relative; align-content: center">CERRAR SESION<i class="material-icons">clear</i></a>
	<h1 style="color: white;">Hola <?php echo $usuario ?></h1>
	
	<h1 style="color: #27ae60 ; text-align: center;">Partido actual</h1>
	 <form class="center" style="background-color: #333333; width: 600px; padding: 10px; margin-bottom: 10px;">
	  	<label  class="center" style="color: white;">No hay ningun partido actual</label>
		 <table class="center" style="color: white; width: inherit;">
			 <tr class="center"><th>Equipo 1</th><th>Equipo 2</th></tr>
			 <tr class="center"><td>0</td><td>0</td></tr>
		 </table>
	 </form>
	<div style="margin: auto; width: 67%;"> <img src="https://www.elclasicofutbol5.com/wp-content/uploads/2015/06/cancha-dimensiones-futbol.jpg" class="card-img-top" alt="https://www.elclasicofutbol5.com/wp-content/uploads/2015/06/cancha-dimensiones-futbol.jpg" style="width: 100%" ></div>
	<div style="height: 20px;"></div>
	
		<h1 style="color: #27ae60 ; text-align: center;">Alumnos</h1>
	<table class='table table-striped table-dark' style='width: 80%; margin: auto'>
				  <thead>
					<tr>
					  <th scope='col'>#</th>
					  <th scope='col'>Nombre</th>
					  <th scope='col'>Apellido</th>
					  <th scope='col'>Número</th>
					  <th scope='col'>Posición</th>
					  <th scope='col'>Contacto</th>
					</tr>
				  </thead>
	<?php
	 $sqlA="SELECT Name, Last_Name, Team, Player_Number, Mail, ULSA_ID, Position_Name FROM Students, Users, C_Player_Position WHERE ULSA_ID = User_ID and ID_Position = Player_Position GROUP BY ULSA_ID, Player_Position";
		$result = mysqli_query($conexion, $sqlA);
		while($row = mysqli_fetch_assoc($result)){
			echo "
				<tr>
				<td>".$row['ULSA_ID']."</td>
				<td>".$row['Name']."</td>
				<td>".$row['Last_Name']."</td>
				<td>".$row['Player_Number']."</td>
				<td>".$row['Position_Name']."</td>
				<td>".$row['Mail']."</td>
				</tr>
				
			";
		}
	?>
		</table>
	
 
	
	<div></div>
	
	
	
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</body>
</html>
