

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Perfil ALumno</title>
	<link href="estilo.css" rel="stylesheet" text="text/css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">				
</head>

<body style="background-color: rgb(51, 51, 51); overflow: auto;">
  <a href="cerrar.php" style="background-color:rgb(79, 79, 79); border: none; color: rgb(224, 224, 224); padding: 0px; margin: 0px; position: relative; align-content: center">CERRAR SESION<i class="material-icons">clear</i></a>
		<p style=" color: rgb(242, 153, 74);align-self: center; text-align: center; font:bolder;font-size: 20px;padding: 0px;">MI PERFIL</p>
	
       <?php
session_start();

include"database.php"; 

if(!isset($_SESSION['rol']))
{
	header('location: inicio.php');
}
else{
	if($_SESSION['rol'] != 2)
	{
		header('location: inicio.php');
	}
}
$usuario= $_SESSION['user'];

$sql="SELECT * FROM Students where ULSA_ID = '$usuario';";
	$consulta=mysqli_query($conexion,$sql);
	$res=mysqli_fetch_array($consulta);
$sql2="SELECT * FROM Users where User_ID = '$usuario';";
	$consulta2=mysqli_query($conexion,$sql2);
	$res2=mysqli_fetch_array($consulta2);


$nombre = $res2[4];
$apellido= $res2[5];
$equipo = $res[1];
$correo = $res2[3];
$naci = $res[2];
$pos = $res[4];
$clave = $res[0];
$numero = $res[3];
	
	$sql3="SELECT * FROM C_Player_Position where ID_Position = '$pos';";
	$consulta3=mysqli_query($conexion,$sql3);
	$res3=mysqli_fetch_array($consulta3);
	mysqli_close($conexion);
	$posicion =$res3[1]
?>
	 <form class="center" style="background-color: rgb(79, 79, 79); width: 600px;">
	  <table style="width: inherit; margin: 0 auto;">
		 <tr>
			 <td style="margin-left: 50px;">    
				<div>
				  <label for="nombre" class="datosAl">Nombre</label>
				</div>
				<div class="contentAl">
				  <label for="nombre" class="datosAl" value="<?= $nombre ?>"><?= $nombre ?></label>
				</div>
			 </td>
			<td>
				 <div>
				  <label for="nombre" class="datosAl">Apellido</label>
				</div>
				<div class="contentAl">
				  <label for="nombre" class="datosAl"><?= $apellido ?></label>
				</div>
			</td>
			<td>
			 <img src='https://www.turismoenchile.cl/images/iconos/perfil.svg' class='imgRedonda' />
		   </td>
		  </tr>
	   </table>
	 </form>
	
    <form class="formALum center" >
       <table class="formALum" style="width: inherit;">
			<tr>
				<td>
					<div>
					  <label for="nombre" class="datosAl">Equipo</label>
					</div>
					<div class="contentAl">
					  <label for="nombre" class="datosAl"><?= $equipo ?></label>
					</div>
				  
				</td>  
				 
				 <td>
					 <div>
					  <label for="nombre" class="datosAl">Fecha de nacimiento</label>
					</div>
					<div class="contentAl">
					  <label for="nombre" class="datosAl"><?= $naci ?></label>
					</div>	
				 </td>
				
				 <td>
					  <div>
					  <label for="nombre" class="datosAl">Clave</label>
					</div>
					<div class="contentAl">
					  <label for="nombre" class="datosAl"><?= $clave ?></label>
					</div>
				 </td>
			</tr>
			 <tr>
				 <td>
					  <div>
					  <label for="nombre" class="datosAl">Correo</label>
					</div>
					<div class="contentAl">
					  <label for="nombre" class="datosAl"><?= $correo ?></label>
					</div>
				</td>
				 
				 <td>
					 <div>
						  <label for="nombre" class="datosAl">Posición</label>
						</div>
					   <div class="contentAl">
						  <label for="nombre" class="datosAl"><?= $posicion ?></label>
						</div>
				 </td>
				 
				 <td>
					  <div>
					  <label for="nombre" class="datosAl">Número</label>
					</div>
					<div class="contentAl">
					  <label for="nombre" class="datosAl">#<?= $numero ?></label>
					</div>
				 </td>
			 </tr>
		</table>
		
    </form>
</div>
	
</body>
</html>

