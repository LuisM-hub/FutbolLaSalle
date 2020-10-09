<?php
include ("database.php");

			
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ranking</title>
</head>
	 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
	
	
	<script type="text/javascript">
    google.charts.load("current", {packages:["timeline"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var container = document.getElementById('example7.1');
      var chart = new google.visualization.Timeline(container);
      var dataTable = new google.visualization.DataTable();
      dataTable.addColumn({ type: 'string', id: 'Game' });
      dataTable.addColumn({ type: 'string', id: 'Name' });
      dataTable.addColumn({ type: 'date', id: 'Start' });
      dataTable.addColumn({ type: 'date', id: 'End' });
      dataTable.addRows([
       
        <?php
		 
			  $sqlGame="SELECT * FROM Games, T_Players_per_Match WHERE ID_Game = Game_ID and Status=3 ";
			  $resultG=mysqli_query($conexion,$sqlGame);
			  while($reg=mysqli_fetch_array($resultG)){
				  
				  $cut= substr($reg['Game_Date'],11,8);
				 $START_DATE2 = preg_replace("/:/", ",", $cut);
				  $dateI="0,0,0,";
				  $dateI .=$START_DATE2;
				  
				$cut2= substr($reg['Finish'],11,8);
				 $FINISH_DATE2 = preg_replace("/:/", ",", $cut2);
				  $dateF="0,0,0,";
				  $dateF .=$FINISH_DATE2;	
				 
				  echo "
					['".$reg['ID_Game']."', '".$reg['Player_ID']."', new Date($dateI), new Date($dateF)],
				  ";
		  
		  }
		  
		  ?>
	  
	  ]);

      var options = {
        timeline: { showRowLabels: false },
        avoidOverlappingGridLines: false
      };

      chart.draw(dataTable, options);
    }

  </script>

<body style="background-image: url('https://images.pexels.com/photos/2306898/pexels-photo-2306898.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940'); overflow: auto; background-repeat: no-repeat;background-attachment: fixed; background-size: cover" >
	
	
	<a href="admin.php" style="background-color: rgba(0,0,0,0.00); border: none; color: white; padding: 0px; margin: 0px; position: relative; align-content: center"><i class="material-icons">home</i></a>
	<div></div>
	<label style=" color: rgba(255,255,255,1.00); align-self: center; text-align: center; font-family: Impact; font:bolder; font-size: 50px; opacity: 1; padding: 1px; margin: 1px;">Aquí estan los tops!</label>
	
	<div class="container"> 
	  <div class="row" style="font-family: Helvetica; font-weight: bold;">
		<div class="col-sm" style="background: rgba(74,235,202,1.00)">
			TOP GOLEADOR
			<?php
				$sqlJu="SELECT Scorer, COUNT(*) FROM T_Goals GROUP by Scorer order by COUNT(*) DESC LIMIT 1;";
				$r1=mysqli_query($conexion,$sqlJu);
				$jug=mysqli_fetch_array($r1);
			
				$sqlJu2="SELECT * from Students where ULSA_ID=$jug[0];";
				$r12=mysqli_query($conexion,$sqlJu2);
				$jug2=mysqli_fetch_array($r12);
			
				$sqlJu3="SELECT * from Users where User_ID=$jug[0];";
				$r13=mysqli_query($conexion,$sqlJu3);
				$jug3=mysqli_fetch_array($r13);
			echo "<label>".$jug3['Name']." ".$jug3['Last_Name']." ".$jug2['Player_Number']."</label>"
			?>
			<img src="https://image.flaticon.com/icons/svg/1657/1657088.svg" style="width: 30px; height: 30px;">
		  </div>
		<div class="col-sm" style="background: rgba(74,235,202,1.00)">
			TOP ARQUERO
			<?php
				$sqlA="SELECT Goalkeeper, COUNT(*) FROM T_Goals_Saved GROUP by Goalkeeper order by COUNT(*) DESC LIMIT 1";
				$r2=mysqli_query($conexion,$sqlA);
				$ar=mysqli_fetch_array($r2);
			
				$sqlA2="SELECT * from Students where ULSA_ID=$ar[0];";
				$r22=mysqli_query($conexion,$sqlA2);
				$ar2=mysqli_fetch_array($r22);
			
				$sqlA3="SELECT * from Users where User_ID=$ar[0];";
				$r23=mysqli_query($conexion,$sqlA3);
				$ar3=mysqli_fetch_array($r23);
			echo "<label>".$ar3['Name']." ".$ar3['Last_Name']." ".$ar2['Player_Number']."</label>"
			?>
						<img src="https://image.flaticon.com/icons/svg/1657/1657088.svg" style="width: 30px; height: 30px;">

		  </div>
		<div class="col-sm"  style="background: rgba(74,235,202,1.00)">
			TOP EQUIPO
			<?php
				$sqlT="SELECT Winner_Team, COUNT(*) FROM Games WHERE Status=3 GROUP by Winner_Team order by COUNT(*) DESC LIMIT 1";
				$r3=mysqli_query($conexion,$sqlT);
				$tm=mysqli_fetch_array($r3);
			
				$sqlT2="SELECT * FROM Teams WHERE ID_Team=$tm[0];";
				$r32=mysqli_query($conexion,$sqlT2);
				$tm2=mysqli_fetch_array($r32);
			echo "<label>".$tm2['Team_Name']."</label>"
			?>
						<img src="https://image.flaticon.com/icons/svg/1657/1657088.svg" style="width: 30px; height: 30px;">

		  </div>
	  </div>
	</div>
	
	<div style="height: 50px;"></div>
	
	<div class="container">
		 <div class="row">
		 <label style=" color: rgba(255,255,255,1.00); align-self: center; text-align: center; font-family: Impact; font:bolder; font-size: 50px; opacity: 1; padding: 1px; margin: 1px;">Ranking de jugadores</label>
			 </div>
			 <div class="row">
			 <label style="padding: 10px; font-size: 20px;">Según sus goles</label>
		 </div>
	 <div class="row">
	<div class="col-12">
		 <table class="table" style="padding: 10px; width: 100%; text-align: center; color: white">
			 <thead class="thead-dark">
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Número</th>
			<th>Goles Anotados</th>	
		</tr>
			 </thead>
	 <?php
			$query = "SELECT Scorer, COUNT(*) FROM T_Goals GROUP by Scorer order by COUNT(*) DESC";
			$sql = mysqli_query($conexion,$query);
			while ($x = mysqli_fetch_array($sql)) {
				$sqPlayer="SELECT * FROM Users where User_ID = $x[0]";
				$res = mysqli_query($conexion,$sqPlayer);
				$player=mysqli_fetch_array($res);
				$sqPlayer2="SELECT * FROM Students where ULSA_ID = $x[0]";
				$res2 = mysqli_query($conexion,$sqPlayer2);
				$player2=mysqli_fetch_array($res2);
					echo "
					<tr>
						<td>".$player['Name']."</td>
						<td> ".$player['Last_Name']." </td>
						<td>".$player2['Player_Number']."</td>
						<td>$x[1] <img src='https://image.flaticon.com/icons/svg/861/861512.svg' style='width:30px; height:30px;'></td>
					</tr>
					";
			} 
		 ?>
	</table>
		 </div>
		</div>
	</div>
	
	<div style="height: 50px;"></div>


	
	
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>