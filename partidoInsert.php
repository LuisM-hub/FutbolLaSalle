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
		$usuario= $_SESSION['user'];

include"database.php"; 

	if(isset($_POST["btnTest"]))
	{
		if(isset($_POST["GID"]) and isset($_POST["Win"]))
			$ID =$_POST["GID"];
		 	$W=$_POST["Win"];
			$fechaT = date("Y-m-d h:i:sa");
			$sqlUp="UPDATE Games set Status=3, Winner_Team=$W, Finish='".$fechaT."' WHERE ID_Game = $ID";
			//echo $sqlUp;
			$resultU = mysqli_query($conexion, $sqlUp);
		if($resultU){
		//	echo "LO HICIMOS";
			echo '<script>
					alert("Partido Terminado.");
					window.location.href = "https://nemonico.com.mx/sofia/Futbol/inicio.php";
					</script>';	
		   exit;
		}
		else{
			echo "OH NO";
		}
			
	}else
	{
		echo "ERROR: SIN DATOS";
	}
	?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
</body>
</html>
