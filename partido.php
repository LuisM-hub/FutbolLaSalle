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

	$sql= "Select * from Teams";
	$result=mysqli_query($conexion,$sql);
	
	$result2=mysqli_query($conexion,$sql);

	$sqlJ= "Select ULSA_ID, Team, Name, Last_Name, Player_Number from Students, Users where ULSA_ID = User_ID and Status = 1 GROUP BY ULSA_ID";
	$resultJ=mysqli_query($conexion,$sqlJ);
	$resultJ2=mysqli_query($conexion,$sqlJ);
	$resultJ3=mysqli_query($conexion,$sqlJ);
	$resultJ4=mysqli_query($conexion,$sqlJ);
	$resultJ5=mysqli_query($conexion,$sqlJ);
	$resultJ6=mysqli_query($conexion,$sqlJ);
	$resultJ7=mysqli_query($conexion,$sqlJ);
	$resultJ8=mysqli_query($conexion,$sqlJ);
	$resultJ9=mysqli_query($conexion,$sqlJ);
	$resultJ10=mysqli_query($conexion,$sqlJ);
	$resultJ11=mysqli_query($conexion,$sqlJ);

	$resultJb=mysqli_query($conexion,$sqlJ);
	$resultJ2b=mysqli_query($conexion,$sqlJ);
	$resultJ3b=mysqli_query($conexion,$sqlJ);
	$resultJ4b=mysqli_query($conexion,$sqlJ);
	$resultJ5b=mysqli_query($conexion,$sqlJ);
	$resultJ6b=mysqli_query($conexion,$sqlJ);
	$resultJ7b=mysqli_query($conexion,$sqlJ);
	$resultJ8b=mysqli_query($conexion,$sqlJ);
	$resultJ9b=mysqli_query($conexion,$sqlJ);
	$resultJ10b=mysqli_query($conexion,$sqlJ);
	$resultJ11b=mysqli_query($conexion,$sqlJ);
	
	mysqli_close($conexion);

	
	
?> 

<!doctype html>
<html>
<head>
<meta charset="utf-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	<script> 
	
	
	</script>
	<style>
	
		.game{
			width: 65%;
			margin: auto; 
			padding: 7px; 
			background: rgba(20,61,33,0.77); 
			color : white;
			align-content: center;
			
			padding: 100px;
		}
		
		select{
			background-color: rgba(0,0,0,0.75);
			color: white;
			border-radius: 3px;
			border-bottom-color: rgba(0,0,0,0.75);
		}
		button{
			background-color: rgba(0,0,0,0.75);
			color: white;
			border-radius: 3px;
			border-bottom-color: rgba(0,0,0,0.75);
		}
		input{
			background-color: rgba(0,0,0,0.75);
			color: white;
			border-radius: 3px;
			border-bottom-color: rgba(0,0,0,0.75);
		}
	</style>
<title>Nuevo partido</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
</head>

<body style="background-image: url('https://www.bbva.com/wp-content/uploads/2019/03/estadio-campo-futbol-bbva-1024x577.jpg'); overflow: auto; background-repeat: no-repeat;background-attachment: fixed; background-size: cover">
	
	<a href="admin.php" style=" border: none; color: white; padding: 0px; margin: 0px; position: relative; align-content: center"><i class="material-icons">home</i></a>	
	
	<h1 style=" color: rgba(46,79,47,1.00); align-self: center; text-align: center; font-family: Impact; font:bolder; font-size: 50px; opacity: 1; padding: 1px; margin: 1px;">Programar Partido</h1>
		
	<form class="game" action="partidoJuego.php" method="post">
		
	  <div class="form-row">
		  <div class="form-group col-md-1"></div>
	   		<div class="form-group col-md-6 col-lg-6">
				 <div> <label for="Visitante">Equipo Local</label></div>
					<select class="browser-default" id="Eq1" name="Local" required  >
						 <option disabled selected value> -- seleccione un equipo -- </option>
							  <?php
								while($row=mysqli_fetch_assoc($result)){
										$id=$row["ID_Team"];
										$name = $row["Team_Name"];
									echo " <option value='$id'>$name</option>";
								}
							?>
					</select>	
			</div>
			<div class="form-group col-md-4">
				 <div> <label for="Visitante">Equipo Visitante</label></div>
					<select class="browser-default" id="Eq2" name="Visitante" required >
							  <option disabled selected value> -- seleccione un equipo -- </option>
								<?php
									while($row2=mysqli_fetch_assoc($result2)){
											$id=$row2["ID_Team"];
											$name = $row2["Team_Name"];
										echo " <option value='$id'>$name</option>";
									}
								?>
					</select>	
			</div>
	  </div>
		<div class="form-row">
			<div class="form-group col-md-3"></div>
			<input type="datetime-local" name="fecha" required><!input type="time" name="hora" required>
		</div>
		<div class="form-row"></div>
		<div class="form-row">
			<div class="form-group col-md-1"></div>
			<img src="img/seleccionj.jpg" style="width: 200px; height: 120px;">
			<div class="form-group col-md-2"></div>
			<img src="img/seleccionj.jpg" style="width: 200px; height: 120px;">
		</div>
		
	<div class="form-row">
		<div class="form-group col-md-1"></div>
		   <div class="form-group col-md-6">
					<div><label style="background-color:rgba(108,188,239,1.00); width: 30px; text-align: center; color: white;">PT</label><select name="playerP" id="playerP" required>
			  <?php
							while($rowJ=mysqli_fetch_assoc($resultJ)){
								$id=$rowJ["ULSA_ID"];
								$name = $rowJ["Name"];
								$lastN = $rowJ["Last_Name"];
								$team = $rowJ["Team"];
								$num = $rowJ["Player_Number"];
								echo "<option  name='$team' value='$id'>$name $lastN $num</option> ";
							}
							?> 
			 </select></div>
			   <div><label style="background-color:rgba(213,219,18,1.00); width: 30px; text-align: center; color: white;">DF</label><select id="playerD1" required name="playerD1">
			  <?php
							while($rowJ=mysqli_fetch_assoc($resultJ2)){
								$id=$rowJ["ULSA_ID"];
								$name = $rowJ["Name"];
								$lastN = $rowJ["Last_Name"];
								$team = $rowJ["Team"];
								$num = $rowJ["Player_Number"];
								echo "<option  name='$team' value='$id'>$name $lastN $num</option> ";
							}
							?> 
			 </select></div>
			    <div><label style="background-color:rgba(213,219,18,1.00); width: 30px; text-align: center; color: white;">DF</label><select id="playerD2" required name="playerD2">
			  <?php
							while($rowJ=mysqli_fetch_assoc($resultJ3)){
								$id=$rowJ["ULSA_ID"];
								$name = $rowJ["Name"];
								$lastN = $rowJ["Last_Name"];
								$team = $rowJ["Team"];
								$num = $rowJ["Player_Number"];
								echo "<option  name='$team' value='$id'>$name $lastN $num</option> ";
							}
							?> 
			 </select></div>
			    <div><label style="background-color:rgba(213,219,18,1.00); width: 30px; text-align: center; color: white;">DF</label><select id="playerD3" required name="playerD3">
			  <?php
							while($rowJ=mysqli_fetch_assoc($resultJ4)){
								$id=$rowJ["ULSA_ID"];
								$name = $rowJ["Name"];
								$lastN = $rowJ["Last_Name"];
								$team = $rowJ["Team"];
								$num = $rowJ["Player_Number"];
								echo "<option  name='$team' value='$id'>$name $lastN $num</option> ";
							}
							?> 
			 </select></div>
			    <div><label style="background-color:rgba(213,219,18,1.00); width: 30px; text-align: center; color: white;">DF</label><select id="playerD4" required name="playerD4">
			  <?php
							while($rowJ=mysqli_fetch_assoc($resultJ5)){
								$id=$rowJ["ULSA_ID"];
								$name = $rowJ["Name"];
								$lastN = $rowJ["Last_Name"];
								$team = $rowJ["Team"];
								$num = $rowJ["Player_Number"];
								echo "<option  name='$team' value='$id'>$name $lastN $num</option> ";
							}
							?> 
			 </select></div>
			   <div><label style="background-color:rgba(38,219,17,1.00); width: 30px; text-align: center; color: white;">MC</label><select id="playerM1" required name="playerM1">
			  <?php
							while($rowJ=mysqli_fetch_assoc($resultJ6)){
								$id=$rowJ["ULSA_ID"];
								$name = $rowJ["Name"];
								$lastN = $rowJ["Last_Name"];
								$team = $rowJ["Team"];
								$num = $rowJ["Player_Number"];
								echo "<option  name='$team' value='$id'>$name $lastN $num</option> ";
							}
							?> 
			 </select></div>
			    <div><label style="background-color:rgba(38,219,17,1.00); width: 30px; text-align: center; color: white;">MC</label><select id="playerM2" required name="playerM2">
			  <?php
							while($rowJ=mysqli_fetch_assoc($resultJ7)){
								$id=$rowJ["ULSA_ID"];
								$name = $rowJ["Name"];
								$lastN = $rowJ["Last_Name"];
								$team = $rowJ["Team"];
								$num = $rowJ["Player_Number"];
								echo "<option  name='$team' value='$id'>$name $lastN $num</option> ";
							}
							?> 
			 </select></div>
			    <div><label style="background-color:rgba(38,219,17,1.00); width: 30px; text-align: center; color: white;">MC</label><select id="playerM3" required name="playerM3">
			  <?php
							while($rowJ=mysqli_fetch_assoc($resultJ8)){
								$id=$rowJ["ULSA_ID"];
								$name = $rowJ["Name"];
								$lastN = $rowJ["Last_Name"];
								$team = $rowJ["Team"];
								$num = $rowJ["Player_Number"];
								echo "<option  name='$team' value='$id'>$name $lastN $num</option> ";
							}
							?> 
			 </select></div>
			    <div><label style="background-color:rgba(38,219,17,1.00); width: 30px; text-align: center; color: white;">MC</label><select id="playerM4" required name="playerM4">
			  <?php
							while($rowJ=mysqli_fetch_assoc($resultJ9)){
								$id=$rowJ["ULSA_ID"];
								$name = $rowJ["Name"];
								$lastN = $rowJ["Last_Name"];
								$team = $rowJ["Team"];
								$num = $rowJ["Player_Number"];
								echo "<option  name='$team' value='$id'>$name $lastN $num</option> ";
							}
							?> 
			 </select></div>
			     <div><label style="background-color:rgba(235,34,34,1.00); width: 30px; text-align: center; color: white;">MC</label><select id="playerDL1" required name="playerDL1">
			  <?php
							while($rowJ=mysqli_fetch_assoc($resultJ10)){
								$id=$rowJ["ULSA_ID"];
								$name = $rowJ["Name"];
								$lastN = $rowJ["Last_Name"];
								$team = $rowJ["Team"];
								$num = $rowJ["Player_Number"];
								echo "<option  name='$team' value='$id'>$name $lastN $num</option> ";
							}
							?> 
			 </select></div>
			     <div><label style="background-color:rgba(235,34,34,1.00); width: 30px; text-align: center; color: white;">MC</label><select id="playerDL2" required name="playerDL2">
			  <?php
							while($rowJ=mysqli_fetch_assoc($resultJ11)){
								$id=$rowJ["ULSA_ID"];
								$name = $rowJ["Name"];
								$lastN = $rowJ["Last_Name"];
								$team = $rowJ["Team"];
								$num = $rowJ["Player_Number"];
								echo "<option  name='$team' value='$id'>$name $lastN $num</option> ";
							}
							?> 
			 </select></div>
			   
			   
				   <!button type="button" value="Confirmar" id="botC1" name="botC1" onClick="verif1();"><!/button>
				   <input type="text"  value="NO" id="conf1" name="conf1" style="display: none">
				</fieldset> 
			</div>
		 <div class="form-group col-md-5">
			   <div><label style="background-color:rgba(108,188,239,1.00); width: 30px; text-align: center; color: white;">PT</label><select id="playerPb" required name="playerPb">
			  <?php
							while($rowJ=mysqli_fetch_assoc($resultJb)){
								$id=$rowJ["ULSA_ID"];
								$name = $rowJ["Name"];
								$lastN = $rowJ["Last_Name"];
								$team = $rowJ["Team"];
								$num = $rowJ["Player_Number"];
								echo "<option  name='$team' value='$id'>$name $lastN $num</option> ";
							}
							?> 
			 </select></div>
			   <div><label style="background-color:rgba(213,219,18,1.00); width: 30px; text-align: center; color: white;">DF</label><select id="playerD1b" required name="playerD1b">
			  <?php
							while($rowJ=mysqli_fetch_assoc($resultJ2b)){
								$id=$rowJ["ULSA_ID"];
								$name = $rowJ["Name"];
								$lastN = $rowJ["Last_Name"];
								$team = $rowJ["Team"];
								$num = $rowJ["Player_Number"];
								echo "<option  name='$team' value='$id'>$name $lastN $num</option> ";
							}
							?> 
			 </select></div>
			    <div><label style="background-color:rgba(213,219,18,1.00); width: 30px; text-align: center; color: white;">DF</label><select id="playerD2b" required name="playerD2b">
			  <?php
							while($rowJ=mysqli_fetch_assoc($resultJ3b)){
								$id=$rowJ["ULSA_ID"];
								$name = $rowJ["Name"];
								$lastN = $rowJ["Last_Name"];
								$team = $rowJ["Team"];
								$num = $rowJ["Player_Number"];
								echo "<option  name='$team' value='$id'>$name $lastN $num</option> ";
							}
							?> 
			 </select></div>
			    <div><label style="background-color:rgba(213,219,18,1.00); width: 30px; text-align: center; color: white;">DF</label><select id="playerD3b" required name="playerD3b">
			  <?php
							while($rowJ=mysqli_fetch_assoc($resultJ4b)){
								$id=$rowJ["ULSA_ID"];
								$name = $rowJ["Name"];
								$lastN = $rowJ["Last_Name"];
								$team = $rowJ["Team"];
								$num = $rowJ["Player_Number"];
								echo "<option  name='$team' value='$id'>$name $lastN $num</option> ";
							}
							?> 
			 </select></div>
			    <div><label style="background-color:rgba(213,219,18,1.00); width: 30px; text-align: center; color: white;">DF</label><select id="playerD4b" required name="playerD4b">
			  <?php
							while($rowJ=mysqli_fetch_assoc($resultJ5b)){
								$id=$rowJ["ULSA_ID"];
								$name = $rowJ["Name"];
								$lastN = $rowJ["Last_Name"];
								$team = $rowJ["Team"];
								$num = $rowJ["Player_Number"];
								echo "<option  name='$team' value='$id'>$name $lastN $num</option> ";
							}
							?> 
			 </select></div>
			   <div><label style="background-color:rgba(38,219,17,1.00); width: 30px; text-align: center; color: white;">MC</label><select id="playerM1b" required name="playerM1b">
			  <?php
							while($rowJ=mysqli_fetch_assoc($resultJ6b)){
								$id=$rowJ["ULSA_ID"];
								$name = $rowJ["Name"];
								$lastN = $rowJ["Last_Name"];
								$team = $rowJ["Team"];
								$num = $rowJ["Player_Number"];
								echo "<option  name='$team' value='$id'>$name $lastN $num</option> ";
							}
							?> 
			 </select></div>
			    <div><label style="background-color:rgba(38,219,17,1.00); width: 30px; text-align: center; color: white;">MC</label><select id="playerM2b" required name="playerM2b">
			  <?php
							while($rowJ=mysqli_fetch_assoc($resultJ7b)){
								$id=$rowJ["ULSA_ID"];
								$name = $rowJ["Name"];
								$lastN = $rowJ["Last_Name"];
								$team = $rowJ["Team"];
								$num = $rowJ["Player_Number"];
								echo "<option  name='$team' value='$id'>$name $lastN $num</option> ";
							}
							?> 
			 </select></div>
			    <div><label style="background-color:rgba(38,219,17,1.00); width: 30px; text-align: center; color: white;">MC</label><select id="playerM3b" required name="playerM3b">
			  <?php
							while($rowJ=mysqli_fetch_assoc($resultJ8b)){
								$id=$rowJ["ULSA_ID"];
								$name = $rowJ["Name"];
								$lastN = $rowJ["Last_Name"];
								$team = $rowJ["Team"];
								$num = $rowJ["Player_Number"];
								echo "<option  name='$team' value='$id'>$name $lastN $num</option> ";
							}
							?> 
			 </select></div>
			    <div><label style="background-color:rgba(38,219,17,1.00); width: 30px; text-align: center; color: white;">MC</label><select id="playerM4b" required name="playerM4b">
			  <?php
							while($rowJ=mysqli_fetch_assoc($resultJ9b)){
								$id=$rowJ["ULSA_ID"];
								$name = $rowJ["Name"];
								$lastN = $rowJ["Last_Name"];
								$team = $rowJ["Team"];
								$num = $rowJ["Player_Number"];
								echo "<option  name='$team' value='$id'>$name $lastN $num</option> ";
							}
							?> 
			 </select></div>
			     <div><label style="background-color:rgba(235,34,34,1.00); width: 30px; text-align: center; color: white;">MC</label><select id="playerDL1b" required name="playerDL1b">
			  <?php
							while($rowJ=mysqli_fetch_assoc($resultJ10b)){
								$id=$rowJ["ULSA_ID"];
								$name = $rowJ["Name"];
								$lastN = $rowJ["Last_Name"];
								$team = $rowJ["Team"];
								$num = $rowJ["Player_Number"];
								echo "<option  name='$team' value='$id'>$name $lastN $num</option> ";
							}
							?> 
			 </select></div>
			     <div><label style="background-color:rgba(235,34,34,1.00); width: 30px; text-align: center; color: white;">MC</label><select id="playerDL2b" required name="playerDL2b">
			  <?php
							while($rowJ=mysqli_fetch_assoc($resultJ11b)){
								$id=$rowJ["ULSA_ID"];
								$name = $rowJ["Name"];
								$lastN = $rowJ["Last_Name"];
								$team = $rowJ["Team"];
								$num = $rowJ["Player_Number"];
								echo "<option  name='$team' value='$id'>$name $lastN $num</option> ";
							}
							?> 
			 </select></div>
					<!button type="button" value="Confirmar" id="botC2" name="botC2" onClick="verif2();"><!/button>  
				   <input type="text" value="NO" id="conf2" name="conf2" style="display: none">
				</fieldset> 
			</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-5"></div>
		<input type="submit" value="Programar" name="Programar" >  
		</div>
</form>
	
	<script>  
		
		function verif2()
		{
			var selec = document.getElementById('cant2').innerHTML;
			if(selec!=11)
				{
					alert("Debe seleccionar 11 jugadores");
					return false;
				}
			else{
				alert("listo");
				document.getElementById("botC2").disabled=true;
				document.getElementById("conf2").value="Listo";
			}
		}
		
		function verif1()
		{
			var selec = document.getElementById('cant1').innerHTML;
			if(selec!=11)
				{
					alert("Debe seleccionar 11 jugadores");
					return false;
				}
			else{
				alert("listo");
				document.getElementById("botC1").disabled=true;
				document.getElementById("conf1").value="Listo";
			}
		}
		
		function ValidateJug()  
		{  
			var check=document.getElementById("conf1").value;
	
			var checkboxes = document.getElementsByName("select_jug[]");  
			var numberOfCheckedItems = 0;  
			for(var i = 0; i < checkboxes.length; i++)  
			{  
				if(checkboxes[i].checked)  
					numberOfCheckedItems++; 
					document.getElementById('cant1').innerHTML = numberOfCheckedItems;
			}  
			if(numberOfCheckedItems > 11)  
			{  
				alert("No puede seleccionar más de 11 jugadores");  
				document.getElementById('cant1').innerHTML="11";
				return false;  
			}
			if(check == "Listo")
				{
					alert("No puede cambiar datos confirmados");  
					return false; 
				}
		}  
		
		function ValidateJug2()  
		{   var check=document.getElementById("conf2").value;
			var checkboxes = document.getElementsByName("select_jug2[]");  
			var numberOfCheckedItems = 0;  
			for(var i = 0; i < checkboxes.length; i++)  
			{  
				if(checkboxes[i].checked)  
					numberOfCheckedItems++; 
					document.getElementById('cant2').innerHTML = numberOfCheckedItems;
			}  
			if(numberOfCheckedItems > 11)  
			{  
				alert("No puede seleccionar más de 11 jugadores");  
				return false;  
			}
		 	if(check == "Listo")
				{
					alert("No puede cambiar datos confirmados");  
					document.getElementById('cant2').innerHTML="11";
					return false; 
				}
		} 
	</script>	

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	<script>	

		
	//EQUIPO 1	
		
		//PORTERO
		$(document).ready(function() {
  $('#Eq1').change(function() {
    var filter = $(this).val();
    $('#playerP option').each(function() {
      if ($(this).attr('name') == filter) {
        $(this).show();
      } else {
        $(this).hide();
      }
      $('#playerP').val(filter);
    })
  })
})
		
		//DEFENSA
	
				$(document).ready(function() {
  $('#Eq1').change(function() {
    var filter = $(this).val();
    $('#playerD1 option').each(function() {
      if ($(this).attr('name') == filter) {
        $(this).show();
      } else {
        $(this).hide();
      }
      $('#playerD1').val(filter);
    })
  })
})
		
				$(document).ready(function() {
  $('#Eq1').change(function() {
    var filter = $(this).val();
    $('#playerD2 option').each(function() {
      if ($(this).attr('name') == filter) {
        $(this).show();
      } else {
        $(this).hide();
      }
      $('#playerD2').val(filter);
    })
  })
})
		
				$(document).ready(function() {
  $('#Eq1').change(function() {
    var filter = $(this).val();
    $('#playerD3 option').each(function() {
      if ($(this).attr('name') == filter) {
        $(this).show();
      } else {
        $(this).hide();
      }
      $('#playerD3').val(filter);
    })
  })
})
		
				$(document).ready(function() {
  $('#Eq1').change(function() {
    var filter = $(this).val();
    $('#playerD4 option').each(function() {
      if ($(this).attr('name') == filter) {
        $(this).show();
      } else {
        $(this).hide();
      }
      $('#playerD4').val(filter);
    })
  })
})
		
		//MEDIOCAMPOS
	
				$(document).ready(function() {
  $('#Eq1').change(function() {
    var filter = $(this).val();
    $('#playerM1 option').each(function() {
      if ($(this).attr('name') == filter) {
        $(this).show();
      } else {
        $(this).hide();
      }
      $('#playerM1').val(filter);
    })
  })
})
		
				$(document).ready(function() {
  $('#Eq1').change(function() {
    var filter = $(this).val();
    $('#playerM2 option').each(function() {
      if ($(this).attr('name') == filter) {
        $(this).show();
      } else {
        $(this).hide();
      }
      $('#playerM2').val(filter);
    })
  })
})
		
				$(document).ready(function() {
  $('#Eq1').change(function() {
    var filter = $(this).val();
    $('#playerM3 option').each(function() {
      if ($(this).attr('name') == filter) {
        $(this).show();
      } else {
        $(this).hide();
      }
      $('#playerM3').val(filter);
    })
  })
})
		
				$(document).ready(function() {
  $('#Eq1').change(function() {
    var filter = $(this).val();
    $('#playerM4 option').each(function() {
      if ($(this).attr('name') == filter) {
        $(this).show();
      } else {
        $(this).hide();
      }
      $('#playerM4').val(filter);
    })
  })
})
		
		//DELANTERO
		
				$(document).ready(function() {
  $('#Eq1').change(function() {
    var filter = $(this).val();
    $('#playerDL1 option').each(function() {
      if ($(this).attr('name') == filter) {
        $(this).show();
      } else {
        $(this).hide();
      }
      $('#playerDL1').val(filter);
    })
  })
})
		
					$(document).ready(function() {
  $('#Eq1').change(function() {
    var filter = $(this).val();
    $('#playerDL2 option').each(function() {
      if ($(this).attr('name') == filter) {
        $(this).show();
      } else {
        $(this).hide();
      }
      $('#playerDL2').val(filter);
    })
  })
})
		
		
		
		
//EQUIPO 2	
		
		//PORTERO
		$(document).ready(function() {
  $('#Eq2').change(function() {
    var filter = $(this).val();
    $('#playerPb option').each(function() {
      if ($(this).attr('name') == filter) {
        $(this).show();
      } else {
        $(this).hide();
      }
      $('#playerPb').val(filter);
    })
  })
})
		
		//DEFENSA
	
				$(document).ready(function() {
  $('#Eq2').change(function() {
    var filter = $(this).val();
    $('#playerD1b option').each(function() {
      if ($(this).attr('name') == filter) {
        $(this).show();
      } else {
        $(this).hide();
      }
      $('#playerD1b').val(filter);
    })
  })
})
		
				$(document).ready(function() {
  $('#Eq2').change(function() {
    var filter = $(this).val();
    $('#playerD2b option').each(function() {
      if ($(this).attr('name') == filter) {
        $(this).show();
      } else {
        $(this).hide();
      }
      $('#playerD2b').val(filter);
    })
  })
})
		
				$(document).ready(function() {
  $('#Eq2').change(function() {
    var filter = $(this).val();
    $('#playerD3b option').each(function() {
      if ($(this).attr('name') == filter) {
        $(this).show();
      } else {
        $(this).hide();
      }
      $('#playerD3b').val(filter);
    })
  })
})
		
				$(document).ready(function() {
  $('#Eq2').change(function() {
    var filter = $(this).val();
    $('#playerD4b option').each(function() {
      if ($(this).attr('name') == filter) {
        $(this).show();
      } else {
        $(this).hide();
      }
      $('#playerD4b').val(filter);
    })
  })
})
		
		//MEDIOCAMPOS
	
				$(document).ready(function() {
  $('#Eq2').change(function() {
    var filter = $(this).val();
    $('#playerM1b option').each(function() {
      if ($(this).attr('name') == filter) {
        $(this).show();
      } else {
        $(this).hide();
      }
      $('#playerM1b').val(filter);
    })
  })
})
		
				$(document).ready(function() {
  $('#Eq2').change(function() {
    var filter = $(this).val();
    $('#playerM2b option').each(function() {
      if ($(this).attr('name') == filter) {
        $(this).show();
      } else {
        $(this).hide();
      }
      $('#playerM2b').val(filter);
    })
  })
})
		
				$(document).ready(function() {
  $('#Eq2').change(function() {
    var filter = $(this).val();
    $('#playerM3b option').each(function() {
      if ($(this).attr('name') == filter) {
        $(this).show();
      } else {
        $(this).hide();
      }
      $('#playerM3b').val(filter);
    })
  })
})
		
				$(document).ready(function() {
  $('#Eq2').change(function() {
    var filter = $(this).val();
    $('#playerM4b option').each(function() {
      if ($(this).attr('name') == filter) {
        $(this).show();
      } else {
        $(this).hide();
      }
      $('#playerM4b').val(filter);
    })
  })
})
		
		//DELANTERO
		
				$(document).ready(function() {
  $('#Eq2').change(function() {
    var filter = $(this).val();
    $('#playerDL1b option').each(function() {
      if ($(this).attr('name') == filter) {
        $(this).show();
      } else {
        $(this).hide();
      }
      $('#playerDL1b').val(filter);
    })
  })
})
		
					$(document).ready(function() {
  $('#Eq2').change(function() {
    var filter = $(this).val();
    $('#playerDL2b option').each(function() {
      if ($(this).attr('name') == filter) {
        $(this).show();
      } else {
        $(this).hide();
      }
      $('#playerDL2b').val(filter);
    })
  })
})		
		
		
</script>
		
	
	
	
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>




