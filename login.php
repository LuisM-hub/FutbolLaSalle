 <?php
include"database.php"; 


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
		case 3:
			header('location: rec.php');
			break;
		default:
	}
}

if(isset($_POST['u']) && isset($_POST['p']))
{
	$usuario= $conexion->real_escape_string($_POST['u']);
	$password= $conexion->real_escape_string($_POST['p']);
	
	/*
	$query = $conexion->prepare("SELECT * FROM Users WHERE user = ? AND password = ?;");
	$query->bind_param("ss", $usuario, $password);
	$query->execute();
	$result=$query->get_result();
	$res=$result->fetch_assoc();
	$stmt->close();
	echo $res;
	*/
	
	$sql="SELECT * FROM Users where User_ID = '$usuario' and Status = 1;";
	$consulta=mysqli_query($conexion,$sql);
	$res=mysqli_fetch_array($consulta);
	mysqli_close($conexion);
 	

	if($res){
		$passU=$res['Password'];
		$hashedPassword=hash("sha256",$password.$res["Salt"]);
	//echo $hashedPassword;
	if($passU == $hashedPassword)
	{
			$rol=$res[8];
			$_SESSION['rol'] = $rol;
			$_SESSION['user'] = $res[0];
			switch($_SESSION['rol']){
			case 1:
				header('location: admin.php');
				break;
			case 2:
				header('location: alumn.php');
				break;
			case 3:
				header('location: rec.php');
				break;
			default:
			}
		}
		else{
			echo '<script>
			alert("Datos incorrectos");
			window.history.go(-1);
				</script>';
			exit;
		}
	}
	else{
		echo '<script>
		alert("Datos incorrectos");
		window.history.go(-1);
			</script>';
		exit;
	}
}

 


/*
session_unset();
session_destroy();
*/
?>


