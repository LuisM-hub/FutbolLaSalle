<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Reclutador</title>
	<link href="estilo.css" rel="stylesheet" text="text/css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	
	
	<style>
	.circle{
		  width: 40px;
		  height: 40px;
		  border: 1px solid #000;
		  background: #fff;
		  text-align: center;
		  border-radius: 100%;
		  font-size: 15px;
		  line-height: 16px;
		  padding-top: 14px;
		}
	</style>
	
	
</head>

<body style="background-image: url('https://img.freepik.com/free-vector/stylish-hexagonal-line-abstract-background_1017-20593.jpg?size=626&ext=jpg'); overflow: auto; background-repeat: no-repeat;background-attachment: fixed; background-size: cover">
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
	
	<a href="cerrar.php" style="border: none; color: rgba(118,114,114,1.00);"><i class="material-icons">clear</i></a>
	<h1  style=" color: rgba(118,114,114,1.00); align-self: center; text-align: center; font-family: Impact; font:bolder; font-size: 50px; opacity: 1; padding: 1px; margin: 1px;">Hola <?php echo $usuario ?></h1>
	<a href="rankin.php" style=" color: rgba(118,114,114,1.00); align-self: center; text-align: center; font-family: Impact; font:bolder; font-size: 20px; opacity: 1; padding: 1px; margin: 1px;">Ver Ranking</a>
	<h1 style="color: #27ae60 ; text-align: center;">Partidos en juego</h1>
	
	 
	
	<div style="height: 20px;"></div>
	
		
	
 
		 <?php
		$sq="select * from Games where Status=2";
		$quer=mysqli_query($conexion, $sq);
		if($quer)
		{
			while($row = mysqli_fetch_assoc($quer)){
			
			$IDA=$row["Local_Team"];
			$IDB=$row["Visitor_Team"];

			$sql1="SELECT * FROM Teams WHERE ID_Team = $IDA";
			$result1 = mysqli_query($conexion, $sql1);
			$res1=mysqli_fetch_array($result1);
			$equipo1=$res1["Team_Name"];
			$foto1=$res1["Team_Logo"];

			$sql2="SELECT * FROM Teams WHERE ID_Team = $IDB";
			$result2 = mysqli_query($conexion, $sql2);
			$res2=mysqli_fetch_array($result2);
			$equipo2=$res2["Team_Name"];
			$foto2=$res2["Team_Logo"];

			$sqlsc="SELECT Game, Team, COUNT(*) FROM T_Goals, Students WHERE Game=".$row["ID_Game"]." and ULSA_ID = Scorer GROUP by Team, Game";
				 $golL=0;
				 $golV=0;
				$quer2=mysqli_query($conexion, $sqlsc);
			 while($row2 = mysqli_fetch_assoc($quer2)){
				 if($row2["Team"]==$IDA)
				 {
					 $golL=$row2["COUNT(*)"];
				 }
				 elseif($row2["Team"]==$IDB){
					  $golV=$row2["COUNT(*)"];
				 }
					
				}
				echo "
				<form style='width:70%; margin:auto;align-content: center;' action='rec.php' method='post'>
				<input name='gameID' style='display:none;' value='".$row["ID_Game"]."'>
				<input name='team1' style='display:none;' value='".$IDA."'>
				<input name='team2' style='display:none;' value='".$IDB."'>
					<table class='table table-striped table-dark' style='width: 100%; margin: auto; text-align: center; vertical-align: middle;'>
					<tr>
					<td>$equipo1</td>
					<td>$equipo2</td>
					</tr>
					<tr>
					<td><img src='img/".$foto1."' class='imgRedonda' ></td>
					<td><img src='img/".$foto2."' class='imgRedonda' ></td>
					</tr>
					<tr>
					<td>$golL</td>
					<td>$golV</td>
					</tr>
					</table>
					<input type='submit'value='Ver' style='width:50px; margin:auto;'>
				</form>
				";
			}
		}
		else
		{
			
			echo "<label  class='center' style='color: white;'>No hay ningun partido actual</label>";
				
		}
		
		
		
		
	?>
	  	
	<div  class="container" style="position: relative">
	<div style="margin: auto; width: 67%;"> <img src="https://www.elclasicofutbol5.com/wp-content/uploads/2015/06/cancha-dimensiones-futbol.jpg" class="card-img-top" alt="https://www.elclasicofutbol5.com/wp-content/uploads/2015/06/cancha-dimensiones-futbol.jpg" style="width: 100%" ></div>
	<div id="p" class="circle" style="position: absolute; top: 205px; left: 230px; background-color: cornflowerblue"></div>
		
	<div id="def1" class="circle" style="position: absolute; top: 70px; left: 300px; background-color: cornflowerblue"></div>
	<div id="def2" class="circle" style="position: absolute; top: 170px; left: 300px; background-color: cornflowerblue"></div>
	<div id="def3" class="circle" style="position: absolute; top: 270px; left: 300px; background-color: cornflowerblue"></div>
	<div id="def4" class="circle" style="position: absolute; top: 370px; left: 300px; background-color: cornflowerblue"></div>
		
	<div id="med1" class="circle" style="position: absolute; top: 70px; left: 400px; background-color: cornflowerblue"></div>
	<div id="med2" class="circle" style="position: absolute; top: 170px; left: 400px; background-color: cornflowerblue"></div>
	<div id="med3" class="circle" style="position: absolute; top: 270px; left: 400px; background-color: cornflowerblue"></div>
	<div id="med4" class="circle" style="position: absolute; top: 370px; left: 400px; background-color: cornflowerblue"></div>
		
	<div id="del1" class="circle" style="position: absolute; top: 170px; left: 500px; background-color: cornflowerblue"></div>
	<div id="del2" class="circle" style="position: absolute; top: 270px; left: 500px; background-color: cornflowerblue"></div>
		
		
	<div id="pb" class="circle" style="position: absolute; top: 205px; left: 870px; background-color: coral"></div>
	
	<div id="def1b" class="circle" style="position: absolute; top: 70px; left: 800px; background-color: coral"></div>
	<div id="def2b" class="circle" style="position: absolute; top: 170px; left: 800px; background-color: coral"></div>
	<div id="def3b" class="circle" style="position: absolute; top: 270px; left: 800px; background-color: coral"></div>
	<div id="def4b" class="circle" style="position: absolute; top: 370px; left: 800px; background-color: coral"></div>
		
	<div id="med1b" class="circle" style="position: absolute; top: 70px; left: 700px; background-color: coral"></div>
	<div id="med2b" class="circle" style="position: absolute; top: 170px; left: 700px; background-color: coral"></div>
	<div id="med3b" class="circle" style="position: absolute; top: 270px; left: 700px; background-color: coral"></div>
	<div id="med4b" class="circle" style="position: absolute; top: 370px; left: 700px; background-color: coral"></div>
		
	<div id="del1b" class="circle" style="position: absolute; top: 170px; left: 600px; background-color: coral"></div>
	<div id="del2b" class="circle" style="position: absolute; top: 270px; left: 600px; background-color: coral"></div>
		</div>
	
	<div></div>
	<h1 style="color: #27ae60 ; text-align: center;">Alumnos</h1>
	<div class="container" >
  <div class="row">
	  
	<?php
	if(isset($_POST["gameID"]) and isset($_POST["team1"])and isset($_POST["team2"]))
	{
		$id=$_POST["gameID"];
		$t1=$_POST["team1"];
		$t2=$_POST["team2"];
		$defs=[];
		$meds=[];
		$dels=[];
		$defsb=[];
		$medsb=[];
		$delsb=[];
		$i=1;
		$x=1;
		$y=1;
		$a=1;
		$b=1;
		$c=1;
		
		$sql="select * from T_Players_per_Match where Game_ID=$id and Team=$t1";
			$query=mysqli_query($conexion, $sql);
		echo "<div class='col-sm'>
					<table class='table table-striped table-dark' style='width: 50%; margin: auto; text-align: center; vertical-align: middle;'>";
		
		while($rowP = mysqli_fetch_assoc($query)){
			$sqlAl="SELECT name, last_name, player_number from Students, Users where USER_ID = ULSA_ID and USER_ID= ".$rowP['Player_ID'].";";
			$qa = mysqli_query($conexion, $sqlAl);
			$resAl=mysqli_fetch_array($qa);
			if($rowP['Position']==2)
			{
				echo "<script>
					  document.getElementById('p').innerHTML='".$resAl["player_number"]."'
					  </script>";
				
			}
			if($rowP['Position']==3)
			{
				array_push($defs,$resAl["player_number"]);
			}
			if($rowP['Position']==1)
			{
				array_push($dels,$resAl["player_number"]);
			}
			if($rowP['Position']==4)
			{
				array_push($meds,$resAl["player_number"]);
			}
				echo "
					<tr>
					<td>".$resAl["player_number"]." ".$resAl["name"]." ".$resAl["last_name"]."</td>
					</tr>	
				";
			}
		
		foreach($defs as $pl)
		{
			echo "<script>
					  document.getElementById('def".$i."').innerHTML='$pl'
					  </script>";
			$i=$i+1;
		}
		foreach($meds as $pl)
		{
			echo "<script>
					  document.getElementById('med".$x."').innerHTML='$pl'
					  </script>";
			$x=$x+1;
		}
		foreach($dels as $pl)
		{
			echo "<script>
					  document.getElementById('del".$y."').innerHTML='$pl'
					  </script>";
			$y=$y+1;
		}
		
		echo "</table>
				</div>";
		
		
		
		$sqlb="select * from T_Players_per_Match where Game_ID=$id and Team=$t2";
			$queryb=mysqli_query($conexion, $sqlb);
		echo "<div class='col-sm'>
					<table class='table table-striped table-dark' style='width: 50%; margin: auto; text-align: center; vertical-align: middle;'>";
		while($rowP = mysqli_fetch_assoc($queryb)){	
				$sqlAl="SELECT name, last_name, player_number from Students, Users where USER_ID = ULSA_ID and USER_ID= ".$rowP['Player_ID'].";";
			$qa = mysqli_query($conexion, $sqlAl);
			$resAl=mysqli_fetch_array($qa);
			if($rowP['Position']==2)
			{
				echo "<script>
					  document.getElementById('pb').innerHTML='".$resAl["player_number"]."'
					  </script>";
			}
			if($rowP['Position']==3)
			{
				array_push($defsb,$resAl["player_number"]);
			}
			if($rowP['Position']==1)
			{
				array_push($delsb,$resAl["player_number"]);
			}
			if($rowP['Position']==4)
			{
				array_push($medsb,$resAl["player_number"]);
			}
			
				echo "
					<tr>
					<td>".$resAl["player_number"]." ".$resAl["name"]." ".$resAl["last_name"]."</td>
					</tr>	
				";
			}
		
		foreach($defsb as $pl)
		{
			echo "<script>
					  document.getElementById('def".$a."b').innerHTML='$pl'
					  </script>";
			$a=$a+1;
		}
		foreach($medsb as $pl)
		{
			echo "<script>
					  document.getElementById('med".$b."b').innerHTML='$pl'
					  </script>";
			$b=$b+1;
		}
		foreach($delsb as $pl)
		{
			echo "<script>
					  document.getElementById('del".$c."b').innerHTML='$pl'
					  </script>";
			$c=$c+1;
		}
		
		echo "</table>
				</div>";
		
	}
	?>
	  
	  
	  </div>
</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</body>
</html>
