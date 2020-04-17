<html>

<head>

  <!-- Estilos de internet -->

  <title>Ajustes</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</head>

<!-- Script en java para la confirmación de dar de baja jugador -->

<script type="text/javascript">

  function ConfirmDelete()

  {

    var respuesta = confirm("¿Estás seguro que deseas dar de baja al jugador?");

    if (respuesta == true)

      return true;

    else

      return false; 

  }
	function setName(){
		document.getElementById("clave").setAttribute("name","claveN");
		//alert("Cambio de nombre");
		
	}

</script>

<body style="background-color: #4f4f4f">



  <?php

  include("database.php");

// Utilizamos la variable global para que te traiga la clave y poder obtener todos sus datos, para ponerlos en los textbox

  //la variable $tabla_luisf es para no utilizar el nombre de la tabla y si cambias la tabla solo se cambia en el conexion.php

  session_start();

  ob_start();

  $clave = $_SESSION['clave'];

 
$sql="SELECT * FROM Students where ULSA_ID = '$clave';";
	$consulta=mysqli_query($conexion,$sql);
	$res=mysqli_fetch_array($consulta);
$sql2="SELECT * FROM Users WHERE User_ID = '$clave';";
	$consulta2=mysqli_query($conexion,$sql2);
	$res2=mysqli_fetch_array($consulta2);

 

    $clave=$res2['User_ID'];

    $nombre = $res2['Name'];

    $apellido = $res2['Last_Name'];

    $nacer = $res['Birth_Date'];

    $equipo = $res['Team'];

    $pos = $res['Player_Position'];

    $numero = $res['Player_Number'];
/*
 $sql3="SELECT * FROM C_Player_Position where ID_Position = '$pos';";
	$consulta3=mysqli_query($conexion,$sql3);
	$res3=mysqli_fetch_array($consulta3);
	$posicion =$res3[1];*/
	mysqli_close($conexion);
 

  ?>

  

<div class="row">

  <div class="col-md-4"></div>

  <div class="col-md-4">

    <center><h1 style="color: #f2c94c;">CAMBIOS EN LA INFORMACION DEL JUGADOR</h1></center>

    <!-- Los campos de la actualización o eliminar -->

    <form method="POST" action="cambio2.php" style="background-color: #f2c94c; width: 90%;margin: auto; padding: 10px;">



    <div class="form-group">

      <label for="busca">Clave ULSA</label>

      <input type="number" name="clave" class="form-control" onchange="setName();" id="clave" value="<?php echo $clave;?>" required pattern="[0-9]+">

    </div>



    <div class="form-group">

        <label for="name">Nombre</label>

        <input type="text" name="name" class="form-control" id="name" value="<?php echo $nombre;?>" required pattern="[A-Za-z]+">

    </div>



    <div class="form-group">

        <label for="last_name">Apellido </label>

        <input type="text" name="last_name" class="form-control" id="last_name"value="<?php echo $apellido;?>" required pattern="[A-Za-z]+">

    </div>

    

	<div class="form-group">

        <label for="birth_day">Fecha de Nacimiento</label>

        <input type="date" name="birth_day" class="form-control" id="birth_day" value="<?php echo $nacer;?>" required="required">

    </div>



    <div class="form-group">

        <label for="team">Equipo</label>

        <input type="text" name="team" class="form-control" id="team" value="<?php echo $equipo;?>" required pattern="[A-Za-z0-9]+">

    </div>



    <div class="form-group">

        <label for="posicion">Posición</label>
		<select class="browser-default form-control" id="posicion" name="posicion" required style="height: 30px; margin-bottom: 10px;">
						  <option value="1" <?php if ($pos == 1) echo "selected"; ?>>Delantero</option>
						  <option value="2" <?php if ($pos == 2) echo "selected"; ?>>Portero</option>
						  <option value="3" <?php if ($pos == 3) echo "selected"; ?>>Defensa</option>
						  <option value="4" <?php if ($pos == 4) echo "selected"; ?>>Mediocampo</option>
						</select>	
    </div>



    <div class="form-group">

        <label for="number">Número de Playera</label>

        <input type="text" name="number" class="form-control" id="number" value="<?php echo $numero;?>" required pattern="[0-9]+">

    </div>



    <center>

      <input type="submit" value="Atrás" class="btn btn-atras" name="btn_atras">

      <input type="submit" value="Actualizar" class="btn btn-info" name="btn_actualizar">

      <input type="submit" value="Dar de Baja" class="btn btn-danger" name="btn_eliminar" onclick="return ConfirmDelete()">

    </center>



  </form>



<?php
/*
ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);
*/

    include("database.php");

      if(isset($_POST['btn_actualizar']))
      { 
		  
			$nombre = $_POST['name'];

			$apellido = $_POST['last_name']; 

			$nacer = $_POST['birth_day'];

			$equipo = $_POST['team'];

			$posicion = $_POST['posicion'];

			$numero = $_POST['number'];

			$existe =0;
		  
		  if(isset($_POST['claveN']))
		  {
			 
			  $claveN = $_POST['claveN'];
			  $sqlN= "SELECT * FROM Users WHERE User_ID = '$claveN' and Status=1";
			  $consN = mysqli_query($conexion,$sqlN);
			  $resN=mysqli_fetch_array($consN);

			if($resN){
					echo '<script>
						alert("Clave ya existe.");
						</script>';
					exit;
			}
			else {
				
				$sql= "SELECT * FROM Users WHERE User_ID = '$clave' and Status=1 and User_Type = 2";
        		$resultados = mysqli_query($conexion,$sql);
        		while($consulta = mysqli_fetch_array($resultados))  
				{
					$existe++; 
				}

				if($existe==0){
				echo '<script>
						alert("La clave no existe");
						</script>';
					exit;
				}
				else{

					$sql3="UPDATE Users SET User_ID='$claveN', Name='$nombre', Last_Name='$apellido' WHERE User_ID = '$clave' and Status=1 and User_Type = 2;";
						$upd=mysqli_query($conexion,$sql3);

					$sql4="UPDATE Students SET ULSA_ID='$claveN', Birth_Date='$nacer', Player_Position=$posicion ,Team='$equipo', Player_Number='$numero' WHERE ULSA_ID = '$clave';";
						$upd=mysqli_query($conexion,$sql4);

					mysqli_close($conexion);
					if($upd)
					{
						echo '<script>
						alert("Usuario actualizado.");
						window.location.href = "https://nemonico.com.mx/sofia/Futbol/inicio.php";
							</script>';
						exit;
					}
					else{
						echo '<script>
						alert("Error.");
							</script>';
						exit;
					}
					
				}
			}
			
		  }
		  else{
			  	$claveN = $_POST['clave'];
				$sql= "SELECT * FROM Users WHERE User_ID = '$clave' and Status=1 and User_Type = 2";
        		$resultados = mysqli_query($conexion,$sql);
        		while($consulta = mysqli_fetch_array($resultados))  
				{
					$existe++; 
				}

				if($existe==0){
				echo '<script>
						alert("El alumno no existe");
						</script>';
					exit;
				}
				else{
					$sql3="UPDATE Users SET User_ID='$claveN', Name='$nombre', Last_Name='$apellido' WHERE User_ID = '$clave' and Status=1 and User_Type = 2;";
					$updA=mysqli_query($conexion,$sql3);
					
					if($updA)
					{
						$sql4="UPDATE Students SET ULSA_ID='$claveN', Birth_Date='$nacer', Player_Position=$posicion,Team='$equipo', Player_Number='$numero' WHERE ULSA_ID = '$clave';";
						$updA=mysqli_query($conexion,$sql4);
						mysqli_close($conexion);
						
						if($updA)
						{
							echo '<script>
							alert("Usuario actualizado.");
							window.location.href = "https://nemonico.com.mx/sofia/Futbol/inicio.php";
								</script>';
							exit;
						}
						else
						{
							echo '<script>
							alert("Error.");
								</script>';
							exit;
						}
					}
					else{
						echo '<script>
						alert("Error.");
							</script>';
						exit;
					}
					
				}
		  }						
      }
	  elseif(isset($_POST['btn_atras']))
      {

        header("Location: https://nemonico.com.mx/sofia/Futbol/cambio.php");

      } 



      // No se el nombre del campo que desactivar

      if(isset($_POST['btn_eliminar']))

      {

        $clave = $_POST['clave'];

        $existe =0;

        $sql= "SELECT * FROM Users WHERE User_ID = '$clave' and Status = 1  and User_Type = 2";

        $resultados = mysqli_query($conexion,$sql);

        while($consulta = mysqli_fetch_array($resultados))

           {

            $existe++; 

           }

        if($existe==0)

			echo '<script>
					alert("El alumno no existe");
				</script>';
			

        else{
			

          $_UPDATE_SQL="UPDATE Users Set Status = '2' WHERE User_ID='$clave'  and User_Type = 2"; 
          $delete=mysqli_query($conexion,$_UPDATE_SQL);
			
			if($delete){
				echo '<script>
				alert("El alumno se elimino.");
				window.location.href = "https://nemonico.com.mx/sofia/Futbol/inicio.php";
					</script>';
				exit;
			}
			else{
				echo '<script>
				alert("Error.");
					</script>';
				exit;
			}
          

        }

      }      

   

?>

  </div>

</body>

</html>