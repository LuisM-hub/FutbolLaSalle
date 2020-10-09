<?php
include 'database.php';

session_start();
$usuario= $_SESSION['user'];

if(isset($_POST['nombre']) && ($_POST['apellido']) && ($_POST['email']) && ($_POST['clave']) && ($_POST['fecha'])  && ($_POST['contra'])  && ($_POST['equipo'])  && ($_POST['num'])  && ($_POST['posicion']))
{
	try{
			$nombre =  $conexion->real_escape_string($_POST["nombre"]);
			$apellido =  $conexion->real_escape_string($_POST["apellido"]);
			$correo =  $conexion->real_escape_string($_POST["email"]);
			$clave = $conexion->real_escape_string($_POST["clave"]);
			$fecha = $conexion->real_escape_string($_POST["fecha"]);
			$contra = $conexion->real_escape_string($_POST["contra"]);
			//$user = $conexion->real_escape_string($_POST["usuario"]);
			$equipo = $conexion->real_escape_string($_POST["equipo"]);
			$num = $conexion->real_escape_string($_POST["num"]);
			$pos = $conexion->real_escape_string($_POST["posicion"]);	
			 
			if($num<1){
				echo '<script> alert("El numero debe ser positivo"); </script>';
					echo '<script> window.history.go(-1); </script>';
			}
			else{
				if($clave<1||strlen($clave)<5)
				{
					echo '<script> alert("Revise la clave ULSA"); </script>';
							echo '<script> window.history.go(-1); </script>';
				}
				else{
					$varSalt = uniqid();
					$seed="MiSecreto100";
					//$passSeguro =bycript(hash("sha256",$contra.$varSalt),$seed);
					$passSeguro = hash("sha256",$contra.$varSalt.$seed);
					
					$fechaC = date("Y-m-d h:i:sa");
					$date_now = date("Y-m-d"); // this format is string comparable

					if ('2003-01-01' < $fecha) {
						echo '<script> alert("Debe ser mayor de 18. Fecha limite(2003-01-01)"); </script>';
						echo '<script> window.history.go(-1); </script>';
					}else{
						$checkEmail= "SELECT * FROM Users where Mail = '$correo'";
						$RUN=mysqli_query($conexion,$checkEmail);
						$existEmail=mysqli_fetch_assoc($RUN);
						if($existEmail){
							echo '<script> alert("El correo ya existe"); </script>';
							echo '<script> window.history.go(-1); </script>';
						}
						else{
							
							include ("DAO.php");
							$varDAO = new UserDAO();
							$vo = new PlayerVO();
							$vo->setJugador($clave, $fecha, $equipo, $pos , $num , $nombre, $apellido, $correo, $passSeguro, $varSalt, $fechaC, $usuario);
							$varVO = $varDAO->verify($vo);
							
							if(!$varVO)
							{
								echo '<script> alert("El usuario ya existe"); </script>';
								echo '<script> window.history.go(-1); </script>';
							}
							else
							{
								$varVO2= $varDAO->insert($vo);
								$varVO3= $varDAO->insertS($vo);
								
								if($varVO2 and $varVO3)
								{
									echo '<script> alert("Se creo el usuario"); </script>';
								echo '<script> window.history.go(-1); </script>';
								}
								else
								{
									echo "error";
								}
								
							}
						}	
					}
				}

			

			}
			
		}
		catch(Exception $e){
			
		}


		//Ejecutar consulta

		mysql_close($conexion);

}
else
{
	echo("ERROR");
}
?>