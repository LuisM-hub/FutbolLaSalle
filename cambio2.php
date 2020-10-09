
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

?>

<html>

<head>

  <!-- Estilos de internet -->

  <title>Ajustes</title>
<link href="estilo.css" rel="stylesheet" text="text/css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


	
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

<body style="background-image: url('https://images.pexels.com/photos/2306898/pexels-photo-2306898.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940'); overflow: auto; background-repeat: no-repeat;background-attachment: fixed; background-size: cover">



  <?php

  include("database.php");

// Utilizamos la variable global para que te traiga la clave y poder obtener todos sus datos, para ponerlos en los textbox

  //la variable $tabla_luisf es para no utilizar el nombre de la tabla y si cambias la tabla solo se cambia en el conexion.php
/*
  session_start();

  ob_start();
*/
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
	
	
$sqlT= "Select * from Teams";
		$result=mysqli_query($conexion,$sqlT);
/*
 $sql3="SELECT * FROM C_Player_Position where ID_Position = '$pos';";
	$consulta3=mysqli_query($conexion,$sql3);
	$res3=mysqli_fetch_array($consulta3);
	$posicion =$res3[1];*/
	mysqli_close($conexion);
 

  ?>

  



  

    <center><h1 style=" color: white; align-self: center; text-align: center; font-family: Impact; font:bolder; font-size: 50px; opacity: 1; padding: 1px; margin: 1px;">CAMBIOS EN LA INFORMACION DEL JUGADOR</h1></center>

    <!-- Los campos de la actualización o eliminar -->
<div class="container" style="margin-top: 30px;"> 
    <form method="POST" action="cambio2.php" style="background-color: rgba(128,128,128,0.51); width: 90%;margin: auto; padding: 10px; font-weight: bold; font-family: Helvetica; color: white; padding: 10px;">

<div class="row" style="margin-top: 7px;">		
	<div class="col-sm">
      <label for="busca">Clave ULSA</label>
      <input type="number" name="clave" style="color: white; background-color: rgba(0,0,0,0.00);" class="form-control" onchange="setName();" id="clave" value="<?php echo $clave;?>" required pattern="[0-9]+">

    </div>

    <div class="col-sm">
        <label for="name">Nombre</label>
        <input type="text" name="name" style="color: white; background-color: rgba(0,0,0,0.00);" class="form-control" id="name" value="<?php echo $nombre;?>" required pattern="[A-Za-z]+">

    </div>

    <div class="input-field col-sm">
        <label for="last_name">Apellido </label>
        <input type="text" name="last_name" style="color: white; background-color: rgba(0,0,0,0.00);" class="form-control" id="last_name"value="<?php echo $apellido;?>" required pattern="[A-Za-z]+">

    </div>		
</div>

    
<div class="row" style="margin-top: 12px;">
		
	<div class="col-sm">
        <label for="birth_day">Fecha de Nacimiento</label>
        <input type="date" name="birth_day" style="color: white; background-color: rgba(0,0,0,0.00);" class="form-control" id="birth_day" value="<?php echo $nacer;?>" required="required">
    </div>

    <div class="col-sm">
        <label for="team">Equipo</label>
		<select class="browser-default form-control" style="color: white; background-color: rgba(0,0,0,0.00)" id="team" name="team" required style="height: 30px; margin-bottom: 10px;">
							  <?php
								
								while($row=mysqli_fetch_assoc($result)){
										$id=$row["ID_Team"];
										$name = $row["Team_Name"];
									if($id==$equipo)
									{
										echo " <option style='background-color: rgba(128,128,128,0.51)' selected value='$id'>$name</option>";
									}
									else{
										echo " <option style='background-color: rgba(128,128,128,0.51)' value='$id'>$name</option>";
									}
									
								}
							?>
					</select>
    </div>

    <div class="col-sm">
        <label for="posicion">Posición</label>
		<select class="browser-default form-control" style="color: white; background-color: rgba(0,0,0,0.00)" id="posicion" name="posicion" required style="height: 30px; margin-bottom: 10px;">
						  <option style="background-color: rgba(128,128,128,0.51)" value="1" <?php if ($pos == 1) echo "selected"; ?>>Delantero</option>
						  <option style="background-color: rgba(128,128,128,0.51)" value="2" <?php if ($pos == 2) echo "selected"; ?>>Portero</option>
						  <option style="background-color: rgba(128,128,128,0.51)" value="3" <?php if ($pos == 3) echo "selected"; ?>>Defensa</option>
						  <option style="background-color: rgba(128,128,128,0.51)" value="4" <?php if ($pos == 4) echo "selected"; ?>>Mediocampo</option>
						</select>	
    </div>



    <div class="col-sm">
        <label for="number">Número de Playera</label>
        <input type="text" name="number" style="color: white; background-color: rgba(0,0,0,0.00);" class="form-control" id="number" value="<?php echo $numero;?>" required pattern="[0-9]+">
    </div>

</div>

    <center style="margin-top: 30px;">

      <input type="submit" value="Cancelar" class="btn btn-secondary" name="btn_atras">

      <input type="submit" value="Actualizar" class="btn btn-info" name="btn_actualizar">

      <input type="submit" value="Dar de Baja" class="btn btn-danger" name="btn_eliminar" onclick="return ConfirmDelete()">

    </center>



  </form>
	</div>


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
					session_start();
					$usuario= $_SESSION['user'];
					$fechaC = date("Y-m-d h:i:sa");
					$sql3="UPDATE Users SET User_ID='$claveN', Name='$nombre', Last_Name='$apellido', Update_date='$fechaC', Updater='$usuario' WHERE User_ID = '$clave' and Status=1 and User_Type = 2;";
						$upd=mysqli_query($conexion,$sql3);

					$sql4="UPDATE Students SET ULSA_ID='$claveN', Birth_Date='$nacer', Player_Position=$posicion ,Team='$equipo', Player_Number='$numero', Update_date='$fechaC', Updater='$usuario' WHERE ULSA_ID = '$clave';";
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
					session_start();
					$usuario= $_SESSION['user'];
					$fechaC = date("Y-m-d h:i:sa");
					$sql3="UPDATE Users SET User_ID='$claveN', Name='$nombre', Last_Name='$apellido',  Update_date='$fechaC', Updater='$usuario'  WHERE User_ID = '$clave' and Status=1 and User_Type = 2;";
					$updA=mysqli_query($conexion,$sql3);
					
					if($updA)
					{
						session_start();
						$usuario= $_SESSION['user'];
						$fechaC = date("Y-m-d h:i:sa");
						$sql4="UPDATE Students SET ULSA_ID='$claveN', Birth_Date='$nacer', Player_Position=$posicion,Team='$equipo', Player_Number='$numero',  Update_date='$fechaC', Updater='$usuario'  WHERE ULSA_ID = '$clave';";
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
			
			session_start();
			$usuario= $_SESSION['user'];
			$fechaC = date("Y-m-d h:i:sa");
        /*  $_UPDATE_SQL="UPDATE Users Set Status = '2',  Delete_date='$fechaC', Deleter='$usuario' WHERE User_ID='$clave'  and User_Type = 2"; 
          $delete=mysqli_query($conexion,$_UPDATE_SQL);
			*/
			
			include ("DAO.php");
			$dao = new UserDAO();
			$vo = new PlayerVO();
			$vo->setUpdate($fechaC,$usuario,$clave);
			$dao->Delete($vo);
			
			if($dao){
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

	
	
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>