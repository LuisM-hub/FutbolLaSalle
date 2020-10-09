
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

	include 'database.php';

if(isset($_POST["Programar"]))
{

	$portero=$_POST["playerP"];
	$def1= $_POST["playerD1"];
	$def2=$_POST["playerD2"];
	$def3=$_POST["playerD3"];
	$def4=$_POST["playerD4"];
	$medio1=$_POST["playerM1"];
	$medio2=$_POST["playerM2"];
	$medio3=$_POST["playerM3"];
	$medio4=$_POST["playerM4"];
	$del1=$_POST["playerDL1"];
	$del2=$_POST["playerDL2"];
	
	$a1=array($def1,$def2,$def3,$def4,$medio1,$medio2,$medio3,$medio4,$del1,$del2);
	$a2=array($portero,$def2,$def3,$def4,$medio1,$medio2,$medio3,$medio4,$del1,$del2);
	$a3=array($def1,$portero,$def3,$def4,$medio1,$medio2,$medio3,$medio4,$del1,$del2);
	$a4=array($def1,$def2,$portero,$def4,$medio1,$medio2,$medio3,$medio4,$del1,$del2);
	$a5=array($def1,$def2,$def3,$portero,$medio1,$medio2,$medio3,$medio4,$del1,$del2);
	$a6=array($def1,$def2,$def3,$def4,$portero,$medio2,$medio3,$medio4,$del1,$del2);
	$a7=array($def1,$def2,$def3,$def4,$medio1,$portero,$medio3,$medio4,$del1,$del2);
	$a8=array($def1,$def2,$def3,$def4,$medio1,$medio2,$portero,$medio4,$del1,$del2);
	$a9=array($def1,$def2,$def3,$def4,$medio1,$medio2,$medio3,$portero,$del1,$del2);
	$a10=array($def1,$def2,$def3,$def4,$medio1,$medio2,$medio3,$medio4,$portero,$del2);
	$a11=array($def1,$def2,$def3,$def4,$medio1,$medio2,$medio3,$medio4,$del1,$portero);
	
	$porterob=$_POST["playerPb"];
	$def1b= $_POST["playerD1b"];
	$def2b=$_POST["playerD2b"];
	$def3b=$_POST["playerD3b"];
	$def4b=$_POST["playerD4b"];
	$medio1b=$_POST["playerM1b"];
	$medio2b=$_POST["playerM2b"];
	$medio3b=$_POST["playerM3b"];
	$medio4b=$_POST["playerM4b"];
	$del1b=$_POST["playerDL1b"];
	$del2b=$_POST["playerDL2b"];
	
	$a1b=array($def1b,$def2b,$def3b,$def4b,$medio1b,$medio2b,$medio3b,$medio4b,$del1b,$del2b);
	$a2b=array($porterob,$def2b,$def3b,$def4b,$medio1b,$medio2b,$medio3b,$medio4b,$del1b,$del2b);
	$a3b=array($def1b,$porterob,$def3b,$def4b,$medio1b,$medio2b,$medio3b,$medio4b,$del1b,$del2b);
	$a4b=array($def1b,$def2b,$porterob,$def4b,$medio1b,$medio2b,$medio3b,$medio4b,$del1b,$del2b);
	$a5b=array($def1b,$def2b,$def3b,$porterob,$medio1b,$medio2b,$medio3b,$medio4b,$del1b,$del2b);
	$a6b=array($def1b,$def2b,$def3b,$def4b,$porterob,$medio2b,$medio3b,$medio4b,$del1b,$del2b);
	$a7b=array($def1b,$def2b,$def3b,$def4b,$medio1b,$porterob,$medio3b,$medio4b,$del1b,$del2b);
	$a8b=array($def1b,$def2b,$def3b,$def4b,$medio1b,$medio2b,$porterob,$medio4b,$del1b,$del2b);
	$a9b=array($def1b,$def2b,$def3b,$def4b,$medio1b,$medio2b,$medio3b,$porterob,$del1b,$del2b);
	$a10b=array($def1b,$def2b,$def3b,$def4b,$medio1b,$medio2b,$medio3b,$medio4b,$porterob,$del2b);
	$a11b=array($def1b,$def2b,$def3b,$def4b,$medio1b,$medio2b,$medio3b,$medio4b,$del1b,$porterob);
	
	$eq1 = $_POST["Local"];
	$eq2 = $_POST["Visitante"];
	$date= $_POST["fecha"];
	$fechaC = date("Y-m-d");

	if($eq1!=$eq2)
	{
		if(in_array($portero,$a1) || in_array($def1,$a2) || in_array($def2,$a3) || in_array($def3,$a4) || in_array($def4,$a5) || in_array($medio1,$a6) || in_array($medio2,$a7) || in_array($medio3,$a8) || in_array($medio4,$a9) || in_array($del1,$a10) || in_array($del2,$a11))
		   {
			   echo '<script> alert("Seleccione alumnos distintos para cada posición"); </script>';
					echo '<script> window.history.go(-1); </script>';
		   }
		else
		{
			if(in_array($porterob,$a1b) || in_array($def1b,$a2b) || in_array($def2b,$a3b) || in_array($def3b,$a4b) || in_array($def4b,$a5b) || in_array($medio1b,$a6b) || in_array($medio2b,$a7b) || in_array($medio3b,$a8b) || in_array($medio4b,$a9b) || in_array($del1b,$a10b) || in_array($del2b,$a11b))
		   {
			   echo '<script> alert("Seleccione alumnos distintos para cada posición"); </script>';
					echo '<script> window.history.go(-1); </script>';
		   }
		  else
		  {
			
			$sqlg= "INSERT into Games (Local_Team, Visitor_Team, Game_Date, Status, Creation_date, Creator) values ($eq1,$eq2,'$date',1,'$fechaC','$usuario');";

			$resultg=mysqli_query($conexion,$sqlg);


			if($resultg){
					/*echo '<script>
					alert("Partido programado");			
					</script>';
					exit; */
					//$_SESSION['eq1P']=$_POST['select_jug'];
					//$_SESSION['eq2P']=$_POST['select_jug2'];


					$querymx="SELECT * FROM Games ORDER by ID_Game DESC LIMIT 1";	
					//echo $querymx;
					$rMX=mysqli_query($conexion,$querymx);
				if($rMX){
					$rm=mysqli_fetch_array($rMX);
					$sqlP="INSERT into T_Players_per_Match (Game_ID, Player_ID, Type_of_Player, Position, Team) values ($rm[0],$portero,1,2,$eq1)";
						$rr=mysqli_query($conexion,$sqlP);	
					$sqlP2="INSERT into T_Players_per_Match (Game_ID, Player_ID, Type_of_Player, Position, Team) values ($rm[0],$porterob,1,2,$eq2)";
						$rr1=mysqli_query($conexion,$sqlP2);

					$sqlB="INSERT into T_Players_per_Match (Game_ID, Player_ID, Type_of_Player, Position, Team) values ($rm[0],$def1,1,3,$eq1)";
						$rr2=mysqli_query($conexion,$sqlB);
					$sqlB3="INSERT into T_Players_per_Match (Game_ID, Player_ID, Type_of_Player, Position, Team) values ($rm[0],$def2,1,3,$eq1)";
						$rr4=mysqli_query($conexion,$sqlB3);
					$sqlB5="INSERT into T_Players_per_Match (Game_ID, Player_ID, Type_of_Player, Position, Team) values ($rm[0],$def3,1,3,$eq1)";
						$rr6=mysqli_query($conexion,$sqlB5);
					$sqlB7="INSERT into T_Players_per_Match (Game_ID, Player_ID, Type_of_Player, Position, Team) values ($rm[0],$def4,1,3,$eq1)";
						$rr8=mysqli_query($conexion,$sqlB7);

					$sqlB2="INSERT into T_Players_per_Match (Game_ID, Player_ID, Type_of_Player, Position, Team) values ($rm[0],$def1b,1,3,$eq2)";
						$rr3=mysqli_query($conexion,$sqlB2);
					$sqlB4="INSERT into T_Players_per_Match (Game_ID, Player_ID, Type_of_Player, Position, Team) values ($rm[0],$def2b,1,3,$eq2)";
						$rr5=mysqli_query($conexion,$sqlB4);
					$sqlB6="INSERT into T_Players_per_Match (Game_ID, Player_ID, Type_of_Player, Position, Team) values ($rm[0],$def3b,1,3,$eq2)";
						$rr7=mysqli_query($conexion,$sqlB6);
					$sqlB8="INSERT into T_Players_per_Match (Game_ID, Player_ID, Type_of_Player, Position, Team) values ($rm[0],$def4b,1,3,$eq2)";
						$rr9=mysqli_query($conexion,$sqlB8);

					$sqlMC="INSERT into T_Players_per_Match (Game_ID, Player_ID, Type_of_Player, Position, Team) values ($rm[0],$medio1,1,4,$eq1)";
						$rMC=mysqli_query($conexion,$sqlMC);
					$sqlMC2="INSERT into T_Players_per_Match (Game_ID, Player_ID, Type_of_Player, Position, Team) values ($rm[0],$medio2,1,4,$eq1)";
						$rMC2=mysqli_query($conexion,$sqlMC2);
					$sqlMC3="INSERT into T_Players_per_Match (Game_ID, Player_ID, Type_of_Player, Position, Team) values ($rm[0],$medio3,1,4,$eq1)";
						$rMC3=mysqli_query($conexion,$sqlMC3);
					$sqlMC4="INSERT into T_Players_per_Match (Game_ID, Player_ID, Type_of_Player, Position, Team) values ($rm[0],$medio4,1,4,$eq1)";
						$rMC4=mysqli_query($conexion,$sqlMC4);

					$sqlMCb="INSERT into T_Players_per_Match (Game_ID, Player_ID, Type_of_Player, Position, Team) values ($rm[0],$medio1b,1,4,$eq2)";
						$rMCb=mysqli_query($conexion,$sqlMCb);
					$sqlMC2b="INSERT into T_Players_per_Match (Game_ID, Player_ID, Type_of_Player, Position, Team) values ($rm[0],$medio2b,1,4,$eq2)";
						$rMC2b=mysqli_query($conexion,$sqlMC2b);
					$sqlMC3b="INSERT into T_Players_per_Match (Game_ID, Player_ID, Type_of_Player, Position, Team) values ($rm[0],$medio3b,1,4,$eq2)";
						$rMC3b=mysqli_query($conexion,$sqlMC3b);
					$sqlMC4b="INSERT into T_Players_per_Match (Game_ID, Player_ID, Type_of_Player, Position, Team) values ($rm[0],$medio4b,1,4,$eq2)";
						$rMC4b=mysqli_query($conexion,$sqlMC4b);

					$sqlDl="INSERT into T_Players_per_Match (Game_ID, Player_ID, Type_of_Player, Position, Team) values ($rm[0],$del1,1,1,$eq1)";
						$rDl=mysqli_query($conexion,$sqlDl);
					$sqlDl2="INSERT into T_Players_per_Match (Game_ID, Player_ID, Type_of_Player, Position, Team) values ($rm[0],$del2,1,1,$eq1)";
						$rDl2=mysqli_query($conexion,$sqlDl2);

					$sqlDlb="INSERT into T_Players_per_Match (Game_ID, Player_ID, Type_of_Player, Position, Team) values ($rm[0],$del1b,1,1,$eq2)";
						$rDlb=mysqli_query($conexion,$sqlDlb);
					$sqlDl2b="INSERT into T_Players_per_Match (Game_ID, Player_ID, Type_of_Player, Position, Team) values ($rm[0],$del2b,1,1,$eq2)";
						$rDl2b=mysqli_query($conexion,$sqlDl2b);

					echo '<script>
					alert("Partido programado");	
					window.location.href = "https://nemonico.com.mx/sofia/Futbol/inicio.php";
					</script>';
					exit;
					}
					else{
						echo "algo raro";
					}			
				}
				else{
					echo '<script>
					alert("Algo salio mal, no se inserto");			
						</script>';
					exit; 
				}
			mysqli_close($conexion);
	     }
	   }
	}
	else{
			echo '<script> alert("Seleccione equipos distintos"); </script>';
					echo '<script> window.history.go(-1); </script>';
	}

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
