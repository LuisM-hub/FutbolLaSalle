<?php
include 'database.php';


if(isset($_POST['nombre']) && ($_POST['apellido']) && ($_POST['email']) && ($_POST['usuario']) && ($_POST['contra'])  && ($_POST['equipo']) )
{
	try{
			$nombre =  $conexion->real_escape_string($_POST["nombre"]);
			$apellido =  $conexion->real_escape_string($_POST["apellido"]);
			$correo =  $conexion->real_escape_string($_POST["email"]);
			$usuario = $conexion->real_escape_string($_POST["usuario"]);
			$contra = $conexion->real_escape_string($_POST["contra"]);
			$equipo = $conexion->real_escape_string($_POST["equipo"]);

			$varSalt = uniqid();
			$passSeguro = hash("sha256",$contra.$varSalt);

			$fechaC = date("Y-m-d h:i:sa");
		 	
				$checkEmail= "SELECT * FROM Users where Mail = '$correo' and Status = 1";
				$RUN=mysqli_query($conexion,$checkEmail);
				$existEmail=mysqli_fetch_assoc($RUN);
				if($existEmail){
					echo '<script> alert("El correo ya existe"); </script>';
					echo '<script> window.history.go(-1); </script>';
				}
				else{
					$checkUser = "SELECT * FROM Users where User_ID = '$usuario' and Status = 1";
					$RUN=mysqli_query($conexion,$checkUser);
					$existUser=mysqli_fetch_assoc($RUN);
					if($existUser)
					{
						echo '<script> alert("El usuario ya existe"); </script>';
						echo '<script> window.history.go(-1); </script>';
					}
						else
						{
							$sql3="INSERT into Users (User_ID, Password, Salt, User_Type, User_Creation_Date, Mail, Name, Last_Name, Status) VALUES('$usuario','$passSeguro','$varSalt',3,'$fechaC','$correo','$nombre','$apellido', 1);";
							$resultado = $conexion->query($sql3);
							$sql1="INSERT into Recruiters (ID_Recruiter, Associated_Club) VALUES('$usuario','$equipo');";
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
		catch(Exception $e){
			echo $e;
		}


		//Ejecutar consulta

		mysql_close($conexion);

}
else
{
	echo("ERROR");
}
?>
