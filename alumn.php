

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Perfil ALumno</title>
	<link href="estilo.css" rel="stylesheet" text="text/css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
	
	
	<style>
	
	.imgRedonda {
    width:100px;
    height:100px;
    border-radius:150px;
    border:1px solid rgb(242, 201, 76);
}
.contentAl{
	border-bottom-color:rgb(242, 201, 76);
	border-bottom-style: solid;
	border-bottom-width: thin;
	border-bottom-left-radius: 7px;
	border-bottom-right-radius: 7px;
	margin-top: 23px;
	margin-bottom: 10px;
}

.datosAl{
	
	color:white;
	text-align: center;
	font: bold;
	font-size: 26px;
	font-family: "Helvetica";
	margin-left: 20px;
	
}
	</style>
	
</head>

<body style="background-image: url('https://images.pexels.com/photos/2306898/pexels-photo-2306898.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940'); overflow: auto; background-repeat: no-repeat;background-attachment: fixed; background-size: cover">
  <a href="cerrar.php" style="; border: none; color: rgb(224, 224, 224); padding: 0px; margin: 0px; position: relative; align-content: center"><i class="material-icons">clear</i></a>
		<p style=" color: rgba(85,146,87,1.00); align-self: center; text-align: center; font-family: Impact; font:bolder; font-size: 50px; opacity: 1; padding: 1px; margin: 1px;">MI PERFIL</p>
	<a href="rankin.php" style=" color: rgba(85,146,87,1.00); align-self: center; text-align: center; font-family: Impact; font:bolder; font-size: 20px; opacity: 1; padding: 1px; margin: 1px;">Ver Ranking</a>
	
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

// $sql="SELECT * FROM Students where ULSA_ID = '$usuario';";
// 	$consulta=mysqli_query($conexion,$sql);
// 	$res=mysqli_fetch_array($consulta);
// $sql2="SELECT * FROM Users where User_ID = '$usuario';";
// 	$consulta2=mysqli_query($conexion,$sql2);
// 	$res2=mysqli_fetch_array($consulta2);
	

include("DAO.php");

$varDAO = new UserDAO();
$varVO = $varDAO->busqueda($usuario);



$nombre = $varVO->getName();
$apellido= $varVO->getLName();
$equi = $varVO->getTeam();
$correo = $varVO->getMail();
$naci = $varVO->getBirth();
$pos = $varVO->getPos();
$clave = $varVO->getULSA();
$numero = $varVO->getNum();

	
	$sql3="SELECT * FROM C_Player_Position where ID_Position = '$pos';";
	$consulta3=mysqli_query($conexion,$sql3);
	$res3=mysqli_fetch_array($consulta3);
	
	$sql4="SELECT * FROM Teams where ID_Team = '$equi';";
	$consulta4=mysqli_query($conexion,$sql4);
	$res4=mysqli_fetch_array($consulta4);
	mysqli_close($conexion);
	$posicion =$res3[1];
	$equipo =$res4[1];
?>
	 <form class="center" style="background-color: rgba(79,79,79,0.74); width: 600px;">
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
				<div class="contentAl" >
				  <label for="nombre" class="datosAl"><?= $apellido ?></label>
				</div>
			</td>
			<td>
			 <img src='https://www.turismoenchile.cl/images/iconos/perfil.svg' class='imgRedonda' />
		   </td>
		  </tr>
	   </table>
	 </form>
	
    <form class="formALum center" style="background-color: rgba(239,129,33,0.66);">
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
				 <td width="250px;">
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

