<!DOCTYPE html>
<html>
<head>
	<title>Seleccion de Equipos</title>
</head>
<body>
	<h1>CONFIGURACIÓN DE LA PARTIDA</h1>
	<form class="block" method="post">
	<div>
		<select>
			<option value="">--Selecciona un equipo--</option>
		<?php
		include("database.php");
			$sql = "SELECT * FROM Teams";
			$resultados = mysqli_query($conexion,$sql);
		?>
		<?php foreach ($resultados as $equipo): ?>
		
			<option value="<?php echo $equipo['Team_Name']?>"><?php echo $equipo['Team_Name']?></option>
		<?php endforeach ?>

		</select>
		<label>VS</label>
		<select>
			<option value="">--Selecciona un equipo--</option>
		<?php
		include("database.php");
			$sql = "SELECT * FROM Teams";
			$resultados = mysqli_query($conexion,$sql);
		?>
		<?php foreach ($resultados as $equipo): ?>
		
			<option value="<?php echo $equipo['Team_Name']?>"><?php echo $equipo['Team_Name']?></option>
		<?php endforeach ?>
	</div>
	</form>
</body>
</html>