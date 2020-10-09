
<?php
		session_start();

		include"database.php"; 

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
		$usuario= $_SESSION['user'];
	?>

<html>
<head>
<meta charset="utf-8">
<title>Partidos programados</title>	
		<link href="estilo.css" rel="stylesheet" text="text/css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body style="background-image: url('https://www.bbva.com/wp-content/uploads/2019/03/estadio-campo-futbol-bbva-1024x577.jpg');background-repeat: no-repeat;background-attachment: fixed; background-size: cover;">
	
	<a href="admin.php" style=" border: none; color: rgb(224, 224, 224); padding: 0px; margin: 0px; position: relative; align-content: center"><i class="material-icons">home</i></a>	
	
		<h1 style=" color: rgba(46,79,47,1.00); align-self: center; text-align: center; font-family: Impact; font:bolder; font-size: 50px; opacity: 1; padding: 1px; margin: 1px;">Partidos de hoy</h1>
	<table class='table table-striped table-dark' style='width: 80%; margin: auto'>
				  <thead>
					<tr>
					  <th scope='col'>Equipo Local</th>
					  <th scope='col'>VS</th>
					  <th scope='col'>Equipo Visitante</th>
					  <th scope='col'>Fecha</th>
					</tr>
				  </thead>
		
	<?php
		$date_now = date("yy-m-d");
		$date_n = date('Y-m-d', strtotime('-1 day', strtotime($date_now)));
		
	 $sqlA="SELECT Local_Team, Visitor_Team, cast(Game_Date as date), ID_Game FROM Games where Status=1 and cast(Game_Date as date) = '$date_now'";
		
		$result = mysqli_query($conexion, $sqlA);
	
		while($row = mysqli_fetch_assoc($result)){
			$IDA=$row["Local_Team"];
			$IDB=$row["Visitor_Team"];

			$sql1="SELECT * FROM Teams WHERE ID_Team = $IDA";
			$result1 = mysqli_query($conexion, $sql1);
			$res1=mysqli_fetch_array($result1);

			$sql2="SELECT * FROM Teams WHERE ID_Team = $IDB";
			$result2 = mysqli_query($conexion, $sql2);
			$res2=mysqli_fetch_array($result2);

			$equipo1=$res1["Team_Name"];
			$foto1=$res1["Team_Logo"];

			$equipo2=$res2["Team_Name"];
			$foto2=$res2["Team_Logo"];
			echo "
				<tr>
				<td>".$equipo1."</td>
				<td> VS </td>
				<td>".$equipo2."</td>
				<td>".$row['cast(Game_Date as date)']."</td>
				<td><form  name='theForm' id='theForm' action='iniciarP.php' method='post'>
					<input type='number' style='display:none' name='gameID' value=".$row['ID_Game']." ></input>
					<button type='submit' class='btn btn-outline-warning'>Iniciar partido</button>
					</form>
					</td>			
				</tr>
				
			";
		}
	?>
		</table>
	
 
	
	<h1 style=" color: rgba(46,79,47,1.00); align-self: center; text-align: center; font-family: Impact; font:bolder; font-size: 50px; opacity: 1; padding: 1px; margin: 1px;">Proximos partidos</h1>
	<table class='table table-striped table-dark' style='width: 80%; margin: auto'>
				  <thead>
					<tr>
					  <th scope='col'>Equipo Local</th>
					  <th scope='col'>VS</th>
					  <th scope='col'>Equipo Visitante</th>
					  <th scope='col'>Fecha</th>
					</tr>
				  </thead>
	<?php
		$date_now = date("Y-m-d");
		$date_n = date('Y-m-d', strtotime('-1 day', strtotime($date_now)));
		$sqlA="SELECT Local_Team, Visitor_Team, Game_Date FROM Games WHERE Game_Date > '$date_now'";
		$result = mysqli_query($conexion, $sqlA);
		while($row = mysqli_fetch_assoc($result)){
			$IDA=$row["Local_Team"];
			$IDB=$row["Visitor_Team"];

			$sql1="SELECT * FROM Teams WHERE ID_Team = $IDA";
			$result1 = mysqli_query($conexion, $sql1);
			$res1=mysqli_fetch_array($result1);

			$sql2="SELECT * FROM Teams WHERE ID_Team = $IDB";
			$result2 = mysqli_query($conexion, $sql2);
			$res2=mysqli_fetch_array($result2);

			$equipo1=$res1["Team_Name"];
			$foto1=$res1["Team_Logo"];

			$equipo2=$res2["Team_Name"];
			$foto2=$res2["Team_Logo"];
			echo "
				<tr>
				<td>".$equipo1."</td>
				<td> VS </td>
				<td>".$equipo2."</td>
				<td>".$row['Game_Date']."</td>
				</tr>
				
			";
		}
			mysqli_close($conexion);
	?>
		</table>
	
	<script>
	
		
	</script>
	
	
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
