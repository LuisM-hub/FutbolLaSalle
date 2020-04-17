<?php
include"database.php";
if(isset($_POST['correo']) && ($_POST['validar']) && ($_POST['contra']) && ($_POST['contra2']))
{
	
	$email =$_POST['correo'];
	$clv = $_POST['validar'];
	$cont = $_POST['contra'];
	$cont2=$_POST['contra2'];
	
	if($cont==$cont2)
	{
		$sql="SELECT * from Users where Mail = '$email';";
		$consulta=mysqli_query($conexion,$sql);
		$res=mysqli_fetch_array($consulta);
		if($res)
		{
			$codigo=$res['help'];
			
			if($clv==$codigo)
			{	$varSalt = uniqid();
				$passSeguro = hash("sha256",$cont.$varSalt);

				$sql3="UPDATE Users SET help = 0, Password='$passSeguro', Salt='$varSalt' WHERE Mail = '$email';";
				mysqli_query($conexion,$sql3);
				mysqli_close($conexion);
				
				echo '<script>
				alert("Contraseña actualizada.");
				window.location.href = "https://nemonico.com.mx/sofia/Futbol/inicio.php";
					</script>';
				exit;
				
			}
			else{
				echo '<script>
				alert("Codigo erroneo.");
				window.history.go(-1);
					</script>';
				exit;
			}
		}
		else
		{
			echo '<script>
			alert("Su correo no esta registrado");
			window.history.go(-1);
				</script>';
			exit;
		}
		
	}
	else
	{
		echo '<script>
		alert("Error. Las contraseñas no son iguales.");
		window.history.go(-1);
			</script>';
		exit;
	}
	
}
else
{
	echo 'error';
}
?>
