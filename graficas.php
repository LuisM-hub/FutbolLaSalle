<?php
include "database.php";

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Graficas</title>
	  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
	
		 <script type="text/javascript">
		  google.charts.load("current", {packages:["corechart"]});
		  google.charts.setOnLoadCallback(drawChart);
		  function drawChart() {
			var data = google.visualization.arrayToDataTable([
			  ['Posicion', 'Cantidad de Alumnos'],
			  <?php 
				$sqlP="SELECT st.Player_Position, tl.ID_Position,tl.Position_Name , COUNT(*) from Students st INNER JOIN C_Player_Position tl on st.Player_Position = tl.ID_Position GROUP BY tl.Position_Name;";
				$qer=mysqli_query($conexion,$sqlP);
				while($row=mysqli_fetch_array($qer))
				{
					echo "
					['".$row['Position_Name']."', ".$row['COUNT(*)']." ], 
					";
				}
				?>
			]);

			var options = {
			  title: 'Jugadores por Posición',
			  is3D: true,
				backgroundColor:{fill:'transparent'},
				color: 'white',
				fontName: 'Verdana',
				fontSize: 18,
				bold: false,
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
			chart.draw(data, options);
		  }
			 	 
			 
		</script>
	
			 <script type="text/javascript">
				  google.charts.load("current", {packages:["calendar"]});
				  google.charts.setOnLoadCallback(drawChart);

			   function drawChart() {
				   var dataTable = new google.visualization.DataTable();
				   dataTable.addColumn({ type: 'date', id: 'Fecha' });
				   dataTable.addColumn({ type: 'number', id: 'Partidos' });
				   dataTable.addRows([
					  
					   <?php
					  $sqlD="SELECT date_add( cast(Game_Date as date), INTERVAL -1 month), COUNT(*) FROM `Games` GROUP by date_add( cast(Game_Date as date), INTERVAL -1 month);";
					   $qerd=mysqli_query($conexion,$sqlD);
						while($row=mysqli_fetch_array($qerd))
						{					
							$date=preg_replace("/-/", " , ",$row['date_add( cast(Game_Date as date), INTERVAL -1 month)']);
							echo "
							[ new Date($date) , ".$row['COUNT(*)']." ], 
							";
						}
					   ?>
					]);

				   var chart = new google.visualization.Calendar(document.getElementById('calendar_basic'));

				   var options = {
					 title: "Partidos por fecha",
					 height: 350,
					    calendar: {
						  cellColor: {
							stroke: '#76a7fa',
							strokeOpacity: 0.5,
							strokeWidth: 1,
						  },
							dayOfWeekLabel: {
							fontName: 'Impact',
							fontSize: 12,
							color: '#1D1E1E',
							bold: false,
							italic: false,
						  },
						  dayOfWeekRightSpace: 10,
						  daysOfWeek: 'DLMMJVS',
							monthLabel: {
								fontName: 'Impact',
								fontSize: 12,
								color: '#322E2F',
								bold: false,
								italic: false
							  },
							  monthOutlineColor: {
								stroke: '#6E6C6D',
								strokeOpacity: 0.8,
								strokeWidth: 2
							  },
							  unusedMonthOutlineColor: {
								stroke: '#8A8588',
								strokeOpacity: 0.8,
								strokeWidth: 1
							  },
							  underMonthSpace: 16,
						}
					
				   };

				   chart.draw(dataTable, options);
			   }
			</script>
	
	
	 <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Jugador', 'Goles'],
           <?php 
				$sqlG="SELECT Scorer, COUNT(*) from T_Goals GROUP BY Scorer;";
				$qerg=mysqli_query($conexion,$sqlG);
				while($row=mysqli_fetch_array($qerg))
				{
					echo "
					['".$row['Scorer']."', ".$row['COUNT(*)']." ], 
					";
				}
				?>
        ]);

        var options = {
          backgroundColor:{fill:'transparent'},
          legend: { position: 'none' },
          chart: {
            title: '',
            subtitle: '',
		  
		  },
		
          axes: {
            x: {
              0: { side: 'top', label: 'Jugador'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" },
			
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
	
	 <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Jugador', 'Faltas'],
           <?php 
				$sqlF="SELECT Player, COUNT(*) from T_Faults GROUP BY Player;";
				$qerf=mysqli_query($conexion,$sqlF);
				while($row=mysqli_fetch_array($qerf))
				{
					echo "
					['".$row['Player']."', ".$row['COUNT(*)']." ], 
					";
				}
				?>
        ]);

        var options = {
         
          legend: { position: 'none' },
          chart: {
            title: '',
            subtitle: '' },
          axes: {
            x: {
              0: { side: 'top', label: 'Jugador'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" },
			backgroundColor:{fill:'transparent'},
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div2'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
	
</head>

	
	
<body style="background-image: url('https://images.pexels.com/photos/2306898/pexels-photo-2306898.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940'); overflow: auto; background-repeat: no-repeat;background-attachment: fixed; background-size: cover">

		
	<DIV style="padding: 10px;">
		<a href="admin.php" style="background-color: rgba(0,0,0,0.00); border: none; color: white; padding: 0px; margin: 0px; position: relative; align-content: center"><i class="material-icons">home</i></a>
	<h1 style=" color: rgba(255,255,255,1.00); align-self: center; text-align: center; font-family: Impact; font:bolder; font-size: 50px; opacity: 1; padding: 1px; margin: 1px;">GRAFICAS ESTADISTICAS</h1>
	
	</DIV>
	
	<div class="container" style="background-color:rgba(128,128,128,0.51);">
		 <div class="row">			
			 <div class="col-2"></div>
			  <div class="col" style="opacity: 1;">
		 		<div id="piechart_3d" style="width: 900px; height: 500px; background: rgba(0,0,0,0.00)"></div>
			  </div>
		 </div>
		 <div class="row">			
			 <div class="col-1"></div>
			  <div class="col" style="opacity: 1;">
		 		<div id="calendar_basic" style="width: 1000px; height: 350px;"></div>
			  </div>
		</div>
		 <div class="row">			 
			 <div class="col-6">
				 <label style="font-family: Impact; font-size: 20px; ">Goles por Jugador</label>
				<div id="top_x_div" style="width: 100%; height: 500px; "></div>
			</div>
			 <div class="col-6">
				 <label style="font-family: Impact; font-size: 20px; ">Faltas por Jugador</label>
				<div id="top_x_div2" style="width: 100%; height: 500px;"></div>
			 </div>
		</div>	
	</div>
	
		
		
		
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>