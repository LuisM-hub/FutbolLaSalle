<?php

session_start();

if(isset($_SESSION['rol']))
{
	switch($_SESSION['rol']){
		case 1:
			header('location: admin.php');
			break;
		case 2:
			header('location: alumn.php');
			break;
		default:
	}
}



?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>LogIn Page</title>
	<link href="estilo.css" rel="stylesheet" text="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="background-image: url('https://ep01.epimg.net/economia/imagenes/2020/01/16/actualidad/1579196525_489238_1579272049_noticia_normal.jpg');
	background-repeat: no-repeat;
	background-attachment: fixed; 
	background-size: cover">
	
	<div class="login">
	<h1>INICIAR SESIÓN</h1>
		<form action="login.php" method="POST">	
	       <input style="margin-top: 7px;" type="text" name="u" placeholder="Usuario" pattern="[A-Za-z0-9]{5,11}"  title="Solo se permiten minúsculas y números del 0 al 9. Longitud entre 8 a 11 caracteres." required="required">
	       <input style="margin-top: 7px;" type="password" name="p" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,11}"
 			 title="Debe contener 1 número, una mayúscula y una minúscula. Longitud entre 8 a 11 caracteres." placeholder="Contraseña" required="required">
			<button style="margin-top: 7px;" type="submit" class="btnMy"> Ingresar </button>			
		</form>
<!-- Button trigger modal -->
<button type="button" style="width: 99px; height: 20px; font-size: 9px;" class="pop btn btn-secondary btn-sm" data-toggle="modal" data-target="#exampleModal" >
  Olvide mi contraseña
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content col-xl-11">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recuperación de contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        	<form method="post" action="send_link.php">
      <p>Ingrese email para recibir link</p>
      <input type="text" name="email">
      <input type="submit" class="btnMy" name="submit_email">
    </form>
      </div>
    </div>
  </div>
</div>
	</div>	
	
	
	
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

