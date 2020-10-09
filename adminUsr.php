<?php
include"database.php"; 

	$contra="Password1";
	$varSalt = uniqid();
	$passSeguro = hash("sha256",$contra.$varSalt);
	$fechaC = date("Y-m-d h:i:sa");

	$sql3="INSERT into Users (User_ID, Password, Salt, User_Type, User_Creation_Date, Mail, Name, Last_Name, Status) 		VALUES('Admin','$passSeguro','$varSalt',1,'$fechaC','futbolsalle1@gmail.com','Administrador','Administrador', 1);";
	$resultado = $conexion->query($sql3);
	if($resultado){
		echo '<script> alert("Se agregó el usuario."); </script>';
		echo '<script> window.history.go(-1); </script>';
	 }
	else{
		echo '<script> alert("No se agrego, revise datos."); </script>';
		echo '<script> window.history.go(-1); </script>';
	}

?>