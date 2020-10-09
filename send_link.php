<?php

include"database.php";
if(isset($_POST['submit_email']) && $_POST['email'])
{
	
	$to= htmlspecialchars($_POST['email']);
	$sql="SELECT * FROM Users where Mail = '$to';";
    $consulta=mysqli_query($conexion,$sql);
    $res=mysqli_fetch_array($consulta);

	
if($res){
	$subject="Recuperación de cuenta";
	// message
	$random=mt_rand(100000, 999999);
	$message = "
	<html>
	<head>
	  <title>Test Mail</title>
	</head>
	<body>
		<p>Tu codigo de validación es: $random.</p><br>
		<p>Dale click a este <a href='https://nemonico.com.mx/sofia/Futbol/cambioContra.html'>Link</a> para recuperar tu contraseña.</p><br>
		<p>Si tu no solicitaste este cambio, te recomendamos que de todos modos cambias tu contraseña ya que alguien esta intentado acceder a tu cuenta.</p>
	</body>
	</html>
	";
		$sql2="UPDATE Users SET help = $random WHERE Mail = '$to';";
		mysqli_query($conexion,$sql2);
		mysqli_close($conexion);

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: Futbol Salle <futbolsalle1@gmail.com>' . "\r\n";	
	
	
    mail($to, $subject, $message, $headers);
	echo '<script>
	alert("Correo enviado");
	window.history.go(-1);
		</script>';
	exit;
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
?>
