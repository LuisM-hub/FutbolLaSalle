<?php
include 'database.php';


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
				if($clave<1||strlen($clave)<7)
				{
					echo '<script> alert("Revise la clave ULSA"); </script>';
							echo '<script> window.history.go(-1); </script>';
				}
				else{
					$varSalt = uniqid();
					$passSeguro = hash("sha256",$varPassword.$varSalt);

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
							$checkUser = "SELECT * FROM Users where User_ID = '$clave' ";
							$RUN=mysqli_query($conexion,$checkUser);
							$existUser=mysqli_fetch_assoc($RUN);
							if($existUser)
							{
								echo '<script> alert("El usuario ya existe"); </script>';
								echo '<script> window.history.go(-1); </script>';
							}
							else{
								$checkClv = "SELECT * FROM Students where ULSA_ID = '$clave'";
								$RUN=mysqli_query($conexion,$checkClv);
								$existClv=mysqli_fetch_assoc($RUN);
								if($existClv)
								{
									echo '<script> alert("La clave ULSA ya existe"); </script>';
									echo '<script> window.history.go(-1); </script>';
								}
								else
								{
									$sql3="INSERT into Users (User_ID, Password, Salt, User_Type, User_Creation_Date, Mail, Name, Last_Name, Status) VALUES('$clave','$passSeguro','$varSalt',2,'$fechaC','$correo','$nombre','$apellido', 1);";
									$resultado = $conexion->query($sql3);
									$sql1="INSERT into Students (ULSA_ID, Birth_Date, Team, Player_Position, Player_Number) VALUES($clave,'$fecha','$equipo',$pos,$num);";
									$resultado = $conexion->query($sql1);
									if($resultado){
										echo '<script> alert("Se agregó el usuario."); </script>';
										echo '<script> window.history.go(-1); </script>';
									   }
									else{
										echo '<script> alert("No se agrego, revise datos."); </script>';
										echo '<script> window.history.go(-1); </script>';
									}
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