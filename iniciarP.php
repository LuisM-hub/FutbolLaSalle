<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Partido</title>
</head>
	<link href="estilo.css" rel="stylesheet" text="text/css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	
	<style>
	
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  margin: auto;
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: rgba(92,152,244,0.9);
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 50%;
}

/* The Close Button */
.close {
  color: #3F3F3F;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
		select{
			border-radius: 5px;
			background: rgba(98,98,98,1.00);
		}
	</style>
	
<body style="background: rgba(176,228,239,1.00)">
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
	
	if(isset( $_POST["gameID"]))
	{
		echo $_SESSION['eq1P'];
		echo $_SESSION['eq2P'];
		
		$ID=$_POST["gameID"];
		include"database.php"; 
		
		$sqlA="SELECT * FROM Games WHERE ID_Game = $ID";
		$result = mysqli_query($conexion, $sqlA);
		$res=mysqli_fetch_array($result);
	
		$IDA=$res["Local_Team"];
		$IDB=$res["Visitor_Team"];
		
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
		$fechaT = date("Y-m-d h:i:sa");
		$fechau = date("Y-m-d");
		$sqlUp="UPDATE Games set Status=2, Game_Date='".$fechaT."', Update_date='$fechau', Updater='$usuario' WHERE ID_Game = $ID";
		$resultU = mysqli_query($conexion, $sqlUp);
		
		$e1="SELECT Player_ID, Name, Last_Name FROM T_Players_per_Match, Users where Player_ID=USER_ID and Game_ID = $ID and Team=$IDA";
		$e1n="SELECT ULSA_ID, Name, Last_Name FROM Students, Users WHERE ULSA_ID=USER_ID and  Team=1 and ULSA_ID NOT IN (SELECT Player_ID FROM T_Players_per_Match where Game_ID = $ID and Team=$IDA);";

		$re1= mysqli_query($conexion, $e1);
		$re12= mysqli_query($conexion, $e1);
		$re13= mysqli_query($conexion, $e1);
		$re14= mysqli_query($conexion, $e1);
		$re1n=mysqli_query($conexion, $e1n);
		
		
		$e2="SELECT Player_ID, Name, Last_Name FROM T_Players_per_Match, Users where Player_ID=USER_ID and Game_ID = $ID and Team=$IDB";
		$e2n="SELECT ULSA_ID, Name, Last_Name FROM Students, Users WHERE ULSA_ID=USER_ID and Team=2 and ULSA_ID NOT IN (SELECT Player_ID FROM T_Players_per_Match where Game_ID = $ID and Team=$IDB);";
		$re2=mysqli_query($conexion, $e2);
		$re22=mysqli_query($conexion, $e2);
		$re23=mysqli_query($conexion, $e2);
		$re24=mysqli_query($conexion, $e2);
		$re2n=mysqli_query($conexion, $e2n);
		
		$goles1="SELECT Game, Team, COUNT(*) FROM T_Goals, Students WHERE Game=$ID and ULSA_ID = Scorer GROUP by Team, Game";
		$quer2=mysqli_query($conexion, $goles1);
			 while($row2 = mysqli_fetch_assoc($quer2)){
				 if($row2["Team"]==$IDA)
				 {
					 $golL=$row2["COUNT(*)"];
				 }
				 elseif($row2["Team"]==$IDB){
					  $golV=$row2["COUNT(*)"];
				 }
					
				}
		
			}
	else{
		echo "error";
	}
	?>
	
		<label style="display: none" id="gameID"><?php echo $ID ?></label>
		<label style="display: none" id="EQ1"><?php echo $IDA ?></label>
		<label style="display: none" id="EQ2"><?php echo $IDB ?></label>
	
	<div class="card-group" style="width: 30%; margin: auto; border-radius: 5px;">
  <div class="card">
    <img src="img/<?=$foto1?>" class="card-img-top" style="width: 150px; height: 200px; margin: auto; border-radius: 10px;" alt="...">
    <div class="card-body">
      <h5 class="card-title" style="text-align: center;"><?= $equipo1 ?></h5>
		
      <p id="gols1" class="card-text" style="font-size: 50px; text-align: center;"><?= $golL ?></p>
    </div>
    <div class="card-footer">
     	 <button type="button" id="goleq1" disabled class="btnsmall btn btn-outline-success btn-sm">Gol</button>
		 <button type="button" id="cambeq1" disabled class="btnsmall  btn btn-outline-primary btn-sm">Cambio</button>
		 <button type="button" id="atajeq1" disabled class="btnsmall  btn btn-outline-info btn-sm" style="margin-right: 7px;">Atajo</button>
		 <button type="button" id="falteq1" disabled class="btnsmall  btn btn-outline-danger btn-sm">Falta</button>
    </div>
  </div>
		

	<div id="golmod1" class="modal">
	  <!-- Modal content -->
	  <div class="modal-content">
		<span id="close1" class="close">&times;</span>
		  <h1>ANOTE UN GOL</h1>
		  <label>Seleccione al jugador que anoto gol</label>
		  <form action="iniciarP.php" method="post">
		  	<select class="browser-default" id="jugEq1Gol" name="jugEq1Gol" required>
						<option disabled selected value> -- select an option -- </option>
							  <?php
								while($row=mysqli_fetch_assoc($re1)){
										$idPl=$row["Player_ID"];
										$name=$row["Name"];
										$lname=$row["Last_Name"];
									echo " <option value='$idPl'>$name $lname</option>";
								}
							?>
					</select>
			  <input type=text value="<?php echo $ID ?>" style="display: none" name="gameID">
			  <button class="btn btn-info" type="submit" name="golT1" >GOOOOOL!</button>
			  
		  </form>
		  
		  
	  </div>
	</div>
	
	<div id="cabmod1" class="modal">
	  <!-- Modal content -->
	  <div class="modal-content">
		<span id="close2" class="close">&times;</span>
		  <h1>ANOTE UN CAMBIO</h1>
		  <label>Seleccione al jugador que salio</label>
		  <form action="iniciarP.php" method="post">
		  <select class="browser-default" id="jugEq1cab" name="jugEq1cab" required>
						<option disabled selected value> -- select an option -- </option>
							  <?php
								while($row=mysqli_fetch_assoc($re12)){
										$idPl=$row["Player_ID"];
										$name=$row["Name"];
										$lname=$row["Last_Name"];
									echo " <option value='$idPl'>$name $lname</option>";
								}
							?>
					</select>	
		  
		  <label>Seleccione al jugador que entra</label>
		   <select class="browser-default" name="jugEq1cab2" id="jugEq1cab2" required>
						<option disabled selected value> -- select an option -- </option>
							  <?php
								while($row=mysqli_fetch_assoc($re1n)){
										$idPl=$row["ULSA_ID"];
								    	$name=$row["Name"];
										$lname=$row["Last_Name"];
									echo " <option value='$idPl'>$name $lname</option>";
								}
							?>
					</select>	
			  <input type=text value="<?php echo $ID ?>" style="display: none" name="gameID">
		  <button class="btn btn-info" type="submit" name="cambT1">CAMBIO</button>
			  
			  </form>
	  </div>
	</div>
		
	<div id="atjmod1" class="modal">
	  <!-- Modal content -->
	  <div class="modal-content">
		<span id="close3" class="close">&times;</span>
		  <h1>ANOTE UNA ATAJADA</h1>
		  <label>Seleccione al jugador que atajo</label>
		  <form action="iniciarP.php" method="post">
		  <select class="browser-default" name="jugEq1atj" id="jugEq1atj" required>
						<option disabled selected value> -- select an option -- </option>
							  <?php
								while($row=mysqli_fetch_assoc($re13)){
										$idPl=$row["Player_ID"];
										$name=$row["Name"];
										$lname=$row["Last_Name"];
									echo " <option value='$idPl'>$name $lname</option>";
								}
							?>
					</select>
			      <input type=text value="<?php echo $ID ?>" style="display: none" name="gameID">
		  <button class="btn btn-info" type="submit" name="atjT1" >ATAJADA</button>
			
			  </form>
	  </div>
	</div>
		
	<div id="falmod1" class="modal">
	  <!-- Modal content -->
	  <div class="modal-content">
		<span id="close4" class="close">&times;</span>
		  <h1>ANOTE UNA FALTA</h1>
		  <label>Seleccione al jugador que cometio infraccion</label>
		  <form action="iniciarP.php" method="post">
		  <select class="browser-default" name="jugEq1fal" id="jugEq1fal" required>
						<option disabled selected value> -- select an option -- </option>
							  <?php
								while($row=mysqli_fetch_assoc($re14)){
									$idPl=$row["Player_ID"];
										$name=$row["Name"];
										$lname=$row["Last_Name"];
									echo " <option value='$idPl'>$name $lname</option>";
								}
							?>
					</select>
			  <input type=text value="<?php echo $ID ?>" style="display: none" name="gameID">
		  <button class="btn btn-info" type="submit" name="faltT1" >FALTA!</button>
			  </form>
	  </div>
	</div>

		
		
  <div class="card">
    <img src="img/<?=$foto2?>" class="card-img-top" style="width: 150px; height: 200px; margin: auto; border-radius: 10px;" alt="...">
    <div class="card-body">
      <h5 class="card-title" style="text-align: center"><?= $equipo2 ?></h5>
      <p class="card-text" id="gols2" style="font-size: 50px; text-align: center;"><?= $golV ?></p>
    </div>
    <div class="card-footer">
      	 <button type="button" id="goleq2" disabled class="btnsmall btn btn-outline-success btn-sm">Gol</button>
		 <button type="button" id="cambeq2" disabled class="btnsmall  btn btn-outline-primary btn-sm">Cambio</button>
		 <button type="button" id="atajeq2" disabled class="btnsmall  btn btn-outline-info btn-sm" style="margin-right: 7px;">Atajo</button>
		 <button type="button" id="falteq2" disabled class="btnsmall  btn btn-outline-danger btn-sm">Falta</button>
    </div>
  </div>
		
		
	<div id="golmod2" class="modal">
	  <!-- Modal content -->
	  <div class="modal-content">
		<span id="close1" class="close">&times;</span>
		  <h1>ANOTE UN GOL</h1>
		  <label>Seleccione al jugador que anoto gol</label>
		  <form action="iniciarP.php" method="post">
		  	<select class="browser-default" name="jugEq2Gol" id="jugEq2Gol" required>
						<option disabled selected value> -- select an option -- </option>
							  <?php
								while($row=mysqli_fetch_assoc($re2)){
										$idPl=$row["Player_ID"];
										$name=$row["Name"];
										$lname=$row["Last_Name"];
									echo " <option value='$idPl'>$name $lname</option>";
								}
							?>
					</select>	
			  <input type=text value="<?php echo $ID ?>" style="display: none" name="gameID">
		  <button class="btn btn-info" type="submit" name="golT2">GOOOOOL!</button>
			  </form>
	  </div>
	</div>
	
	<div id="cabmod2" class="modal">
	  <!-- Modal content -->
	  <div class="modal-content">
		<span id="close2" class="close">&times;</span>
		  <h1>ANOTE UN CAMBIO</h1>
		  <label>Seleccione al jugador que salio</label>
		  <form action="iniciarP.php" method="post">
		  <select class="browser-default" name="jugEq2cab" id="jugEq2cab" required>
						<option disabled selected value> -- select an option -- </option>
							  <?php
								while($row=mysqli_fetch_assoc($re22)){
										$idPl=$row["Player_ID"];
										$name=$row["Name"];
										$lname=$row["Last_Name"];
									echo " <option value='$idPl'>$name $lname</option>";
								}
							?>
					</select>	
		 
		  <label>Seleccione al jugador que entra</label> 
		  <select class="browser-default" id="jugEq2cab2" name="jugEq2cab2" required>
						<option disabled selected value> -- select an option -- </option>
							  <?php
								while($row=mysqli_fetch_assoc($re2n)){
										$idPl=$row["ULSA_ID"];
										$name=$row["Name"];
										$lname=$row["Last_Name"];
									echo " <option value='$idPl'>$name $lname</option>";
								}
							?>
					</select>	
		  <button class="btn btn-info" type="submit" name="cambT2">CAMBIO</button>
			    <input type=text value="<?php echo $ID ?>" style="display: none" name="gameID">
			  </form>
	  </div>
	</div>
		
	<div id="atjmod2" class="modal">
	  <!-- Modal content -->
	  <div class="modal-content">
		<span id="close3" class="close">&times;</span>
		  <h1>ANOTE UNA ATAJADA</h1>
		  <label>Seleccione al jugador que atajo</label>
		  <form action="iniciarP.php" method="post">
		    <select class="browser-default" name="jugEq2atj" id="jugEq2atj" required>
						<option disabled selected value> -- select an option -- </option>
							  <?php
								while($row=mysqli_fetch_assoc($re23)){
										$idPl=$row["Player_ID"];
										$name=$row["Name"];
										$lname=$row["Last_Name"];
									echo " <option value='$idPl'>$name $lname</option>";
								}
							?>
					</select>		 
		  <button class="btn btn-info" type="submit" name="atjT2">ATAJADA</button>
			    <input type=text value="<?php echo $ID ?>" style="display: none" name="gameID">
			  </form>
	  </div>
	</div>
		
	<div id="falmod2" class="modal">
	  <!-- Modal content -->
	  <div class="modal-content">
		<span id="close4" class="close">&times;</span>
		  <h1>ANOTE UNA FALTA</h1>
		  <label>Seleccione al jugador que cometio infraccion</label>
		  <form action="iniciarP.php" method="post">
		  <select class="browser-default" name="jugEq2fal" id="jugEq2fal" required>
						<option disabled selected value> -- select an option -- </option>
							  <?php
								while($row=mysqli_fetch_assoc($re24)){
									$idPl=$row["Player_ID"];
										$name=$row["Name"];
										$lname=$row["Last_Name"];
									echo " <option value='$idPl'>$name $lname</option>";
								}
							?>
					</select>	
		  <button class="btn btn-info" type="submit" name="faltT2" >FALTA!</button>
			    <input type=text value="<?php echo $ID ?>" style="display: none" name="gameID">
			  </form>
	  </div>
	</div>
  
</div>
	
		<div style="margin: auto; width: 30%;" class="crono_wrapper">
			<h2 id='crono' style="text-align: center">00:00:00</h2>
			<input type="button" value="Empezar" id="boton" class="btn btn-outline-dark" onclick="empezarDetener(this);">
		</div>
	<div >
		<form action="partidoInsert.php" method="post" id="cointT">
		
		</form>
	</div>

	<script>
	//POP UPS
	var modal = document.getElementById("golmod1");
		// Get the button that opens the modal
		var btn = document.getElementById("goleq1");
		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];
		// When the user clicks the button, open the modal 
		btn.onclick = function() {
		  modal.style.display = "block";
		}
		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		  modal.style.display = "none";
		}

		
		
		var modal2 = document.getElementById("cabmod1");
		// Get the button that opens the modal
		var btn2 = document.getElementById("cambeq1");
		// Get the <span> element that closes the modal
		var span2 = document.getElementsByClassName("close")[1];
		// When the user clicks the button, open the modal 
		btn2.onclick = function() {
		  modal2.style.display = "block";
		}
		// When the user clicks on <span> (x), close the modal
		span2.onclick = function() {
		  modal2.style.display = "none";
		}
		
		
		var modal3 = document.getElementById("falmod1");
		// Get the button that opens the modal
		var btn3 = document.getElementById("falteq1");
		// Get the <span> element that closes the modal
		var span3 = document.getElementsByClassName("close")[3];
		// When the user clicks the button, open the modal 
		btn3.onclick = function() {
		  modal3.style.display = "block";
		}
		// When the user clicks on <span> (x), close the modal
		span3.onclick = function() {
		  modal3.style.display = "none";
		}
		
		
		var modal4 = document.getElementById("atjmod1");
		// Get the button that opens the modal
		var btn4 = document.getElementById("atajeq1");
		// Get the <span> element that closes the modal
		var span4 = document.getElementsByClassName("close")[2];
		// When the user clicks the button, open the modal 
		btn4.onclick = function() {
		  modal4.style.display = "block";
		}
		// When the user clicks on <span> (x), close the modal
		span4.onclick = function() {
		  modal4.style.display = "none";
		}
		
		var modal5 = document.getElementById("golmod2");
		// Get the button that opens the modal
		var btn5 = document.getElementById("goleq2");
		// Get the <span> element that closes the modal
		var span5 = document.getElementsByClassName("close")[4];
		// When the user clicks the button, open the modal 
		btn5.onclick = function() {
		  modal5.style.display = "block";
		}
		// When the user clicks on <span> (x), close the modal
		span5.onclick = function() {
		  modal5.style.display = "none";
		}

		
		
		var modal6 = document.getElementById("cabmod2");
		// Get the button that opens the modal
		var btn6 = document.getElementById("cambeq2");
		// Get the <span> element that closes the modal
		var span6 = document.getElementsByClassName("close")[5];
		// When the user clicks the button, open the modal 
		btn6.onclick = function() {
		  modal6.style.display = "block";
		}
		// When the user clicks on <span> (x), close the modal
		span6.onclick = function() {
		  modal6.style.display = "none";
		}
		
		
		var modal7 = document.getElementById("falmod2");
		// Get the button that opens the modal
		var btn7 = document.getElementById("falteq2");
		// Get the <span> element that closes the modal
		var span7 = document.getElementsByClassName("close")[7];
		// When the user clicks the button, open the modal 
		btn7.onclick = function() {
		  modal7.style.display = "block";
		}
		// When the user clicks on <span> (x), close the modal
		span7.onclick = function() {
		  modal7.style.display = "none";
		}
		
		
		var modal8 = document.getElementById("atjmod2");
		// Get the button that opens the modal
		var btn8 = document.getElementById("atajeq2");
		// Get the <span> element that closes the modal
		var span8 = document.getElementsByClassName("close")[6];
		// When the user clicks the button, open the modal 
		btn8.onclick = function() {
		  modal8.style.display = "block";
		}
		// When the user clicks on <span> (x), close the modal
		span8.onclick = function() {
		  modal8.style.display = "none";
		}
		

		//CRONO
		
		 var inicio=0;
			var timeout=0;

			function empezarDetener(elemento)
			{
				if(timeout==0)
				{
					// empezar el cronometro
					<?php
					
					$_SESSION["gol1"] = 0;
					?>
					elemento.value="Detener";
					document.getElementById("goleq1").disabled=false;
					document.getElementById("cambeq1").disabled=false;
					document.getElementById("atajeq1").disabled=false;
					document.getElementById("falteq1").disabled=false;

					document.getElementById("goleq2").disabled=false;
					document.getElementById("cambeq2").disabled=false;
					document.getElementById("atajeq2").disabled=false;
					document.getElementById("falteq2").disabled=false;

					// Obtenemos el valor actual
					inicio=new Date().getTime();

					// Guardamos el valor inicial en la base de datos del navegador
					localStorage.setItem("inicio",inicio);

					// iniciamos el proceso
					funcionando();
				}else{
					// detemer el cronometro

					//elemento.value="Empezar";

					clearTimeout(timeout);
					
					var elem=document.getElementById("cointT");

				
					var idG=document.createElement("input");
					idG.type="text";
					idG.name="GID";
					var id= document.getElementById("gameID").innerHTML;
					idG.value=id;
					idG.style.display="none";
					
					var idW=document.createElement("input");
					idW.type="text";
					idW.name="Win";
					idW.style.display="none";
					var p1=parseInt(document.getElementById("gols1").innerHTML);
					var p2=parseInt(document.getElementById("gols2").innerHTML);
						
					if(p1>p2)
						{
							idW.value=document.getElementById("EQ1").innerHTML;
						}
					else if(p2>p1)
						{
							idW.value=document.getElementById("EQ2").innerHTML;
						}
					else{
							idW.value="0";
						}
					elem.appendChild(idG);
					elem.appendChild(idW);
					
					var bt=document.createElement("input");
					bt.type="submit";
					bt.name="btnTest"
					bt.class="btn btn-outline-dark";
					bt.innerHTML="Confirmar";
					elem.appendChild(bt);
					
					elemento.style.display="none";

					// Eliminamos el valor inicial guardado
					localStorage.removeItem("inicio");
					timeout=0;
				}
			}

			function funcionando()
			{
				// obteneos la fecha actual
				var actual = new Date().getTime();

				// obtenemos la diferencia entre la fecha actual y la de inicio
				var diff=new Date(actual-inicio);

				// mostramos la diferencia entre la fecha actual y la inicial
				var result=LeadingZero(diff.getUTCHours())+":"+LeadingZero(diff.getUTCMinutes())+":"+LeadingZero(diff.getUTCSeconds());
				document.getElementById('crono').innerHTML = result;

				// Indicamos que se ejecute esta función nuevamente dentro de 1 segundo
				timeout=setTimeout("funcionando()",1000);
			}

			/* Funcion que pone un 0 delante de un valor si es necesario */
			function LeadingZero(Time)
			{
				return (Time < 10) ? "0" + Time : + Time;
			}

			window.onload=function()
			{
				if(localStorage.getItem("inicio")!=null)
				{
					// Si al iniciar el navegador, la variable inicio que se guarda
					// en la base de datos del navegador tiene valor, cargamos el valor
					// y iniciamos el proceso.
					inicio=localStorage.getItem("inicio");
					document.getElementById("boton").value="Detener";
					funcionando();
					document.getElementById("goleq1").disabled=false;
					document.getElementById("cambeq1").disabled=false;
					document.getElementById("atajeq1").disabled=false;
					document.getElementById("falteq1").disabled=false;

					document.getElementById("goleq2").disabled=false;
					document.getElementById("cambeq2").disabled=false;
					document.getElementById("atajeq2").disabled=false;
					document.getElementById("falteq2").disabled=false;
				}
			}
	
		
		
			
	</script>
	
	
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

<?php
if(isset($_POST["golT1"]))
{
	$fecha= date("yy-m-d");
	$player=$_POST["jugEq1Gol"];
	$sql="INSERT INTO T_Goals ( Game, Scorer, Minute, Creation_date, Creator) values($ID,$player,'00:00:00','$fecha','$usuario')";
	$result = mysqli_query($conexion, $sql);
	
}
if(isset($_POST["golT2"]))
{
	$fecha= date("yy-m-d");
	$player=$_POST["jugEq2Gol"];
	$sql="INSERT INTO T_Goals ( Game, Scorer, Minute, Creation_date, Creator) values($ID,$player,'00:00:00','$fecha','$usuario')";
	//echo $sql;
	$result = mysqli_query($conexion, $sql);
}
if(isset($_POST["cambT1"]))
{
	$player1=$_POST["jugEq1cab"];
	$player2=$_POST["jugEq1cab2"];
	$fecha= date("yy-m-d");
	$sql="INSERT INTO T_Changes (IN_Player, OUT_Player, Game, Minute, Creation_date, Creator) values($player1,$player2,$ID,'00:00:00','$fecha','$usuario')";
	$result = mysqli_query($conexion, $sql);
}
if(isset($_POST["cambT2"]))
{
	$player1=$_POST["jugEq2cab"];
	$player2=$_POST["jugEq2cab2"];
	$fecha= date("yy-m-d");
	$sql="INSERT INTO T_Changes (IN_Player, OUT_Player, Game, Minute, Creation_date, Creator) values($player1,$player2,$ID,'00:00:00','$fecha','$usuario')";
	$result = mysqli_query($conexion, $sql);
}
if(isset($_POST["atjT1"])){
	$player = $_POST["jugEq1atj"];
	$fecha= date("yy-m-d");
	$sql="INSERT INTO T_Goals_Saved (Game, Goalkeeper, Minute, Creation_date, Creator) values($ID,$player,'00:00:00','$fecha','$usuario');";
	$result = mysqli_query($conexion, $sql);
}
if(isset($_POST["atjT2"])){
	$player = $_POST["jugEq2atj"];
	$fecha= date("yy-m-d");
	$sql="INSERT INTO T_Goals_Saved (Game, Goalkeeper, Minute, Creation_date, Creator) values($ID,$player,'00:00:00','$fecha','$usuario');";
	$result = mysqli_query($conexion, $sql);
}
if(isset($_POST["faltT1"])){
	$player = $_POST["jugEq1fal"];
	$fecha= date("yy-m-d");
	$sql="INSERT INTO T_Faults ( Game, Player, Minute, Creation_date, Creator) values($ID,$player,'00:00:00','$fecha','$usuario');";
	$result = mysqli_query($conexion, $sql);
}
if(isset($_POST["faltT2"])){
	$player = $_POST["jugEq2fal"];
	$fecha= date("yy-m-d");
	$sql="INSERT INTO T_Faults ( Game, Player, Minute, Creation_date, Creator) values($ID,$player,'00:00:00','$fecha','$usuario');";
	$result = mysqli_query($conexion, $sql);
}



?>

