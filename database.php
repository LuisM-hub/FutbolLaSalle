<?php
$servername="localhost";
$username="sepherot_sofia";
$password="zueTmwnaGI3X";
$dbname="sepherot_sofiaBD";

$conexion=new mysqli($servername,$username,$password,$dbname);
	/*
	if (!$conexion){
		die("Connection failed: " . mysqli_connect_error());
	} else{
	echo 'conectado';
	return $conexion;
}
*/

if($conexion->connect_error) {
  exit('Error connecting to database'); //Should be a message a typical user could understand in production
}
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conexion->set_charset("utf8mb4");

?>
