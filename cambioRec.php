<html>

<head>

  <title>Ajustes</title>

  <!-- Estilos de internet -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">		
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</head>

<body style="background-color:#2f61a3">



<div class="row">

  <div class="col-md-4"></div>

  <div class="col-md-4">

    <center><h1>CAMBIOS EN LA INFORMACION DE RECLUTADORES</h1></center>

<!-- Formulario con metodo POST con un solo botón para confirmar que existe o no la clave -->
	 <a href="admin.php" style=" border: none; color: black; padding: 0px; margin: 0px; position: relative; align-content: center"><i class="material-icons">home</i></a>
    <form method="POST" action="cambioRec.php" >

    <div class="form-group">

      <label for="busca">BUSCA LA CLAVE</label>

      <input type="text" name="claveR" class="form-control" id="clave" required>

    </div>

    <center>

    	<input type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">

    </center>

  </form>

<!-- Inicia php -->

<?php

    include("database.php");



      if(isset($_POST['btn_consultar']))

      { 

      	$claveR = $_POST['claveR'];

        //Aqui inicio sesion para una variable global que se utiliza en cambio 2

        session_start();

        ob_start();
		
        $_SESSION['claveR']= $claveR;

		 // echo $_SESSION['claveR'];
		  
      	$existe =0;

      	$sql= "SELECT * FROM Users WHERE User_ID = '$claveR' and Status = 1 and User_Type = 3";

      	$resultados = mysqli_query($conexion,$sql);

		while($consulta = mysqli_fetch_array($resultados))

		  {
        //variable que te dice si existe o no la clave, si nunca entra a este while, es porque no existe en la BD
			$existe++;
			header("Location:https://nemonico.com.mx/sofia/Futbol/cambioRec2.php");
		  }

		  if($existe==0){echo '<script>
			alert("El reclutador no existe");
				</script>';
			exit;}

      }

   

?>

  </div>

</body>

</html>