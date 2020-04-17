<?php
/*
ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);
*/

    include("database.php");

      if(isset($_POST['btn_actualizar']))
      {
		  echo "Actualizar";

      	$clave = $_POST['clave'];

        $nombre = $_POST['name'];

        $apellido = $_POST['last_name'];

        $nacer = $_POST['birth_day'];

        $equipo = $_POST['team'];

        $posicion = $_POST['position'];

        $numero = $_POST['number'];

        $existe =0;
		  echo $clave;

        $sql= "SELECT * FROM Users WHERE User_ID = '$clave'";

        $resultados = mysqli_query($conexion,$sql);

        while($consulta = mysqli_fetch_array($resultados))

           {

            $existe++; 

           }

        if($existe==0)
          echo "La clave ".$clave." no existe";

        else{

          $_UPDATE_SQL="UPDATE Users Set

              User_ID='$clave',

              Name='$nombre',

              Last_Name='$apellido',

              WHERE clv='$clave'"; 

          mysqli_query($conexion,$_UPDATE_SQL);
			
			 $_UPDATE_SQL2="UPDATE Students Set

              ULSA_ID='$clave',

              Birth_Date='$nacer',
			  
			  Team='$equipo', 

              Player_Number='$apellido',

              WHERE ULSA_ID='$clave'"; 

         mysqli_query($conexion,$_UPDATE_SQL2);
          echo "Acualización con éxito";

        }

      }
	  elseif(isset($_POST['btn_atras']))
      {

        header("Location: https://nemonico.com.mx/sofia/Futbol/cambio.php");

      } 



      /* No se el nombre del campo que desactivar

      if(isset($_POST['btn_eliminar']))

      {

        $clave = $_POST['clave'];

        $existe =0;

        $sql= "SELECT * FROM $tabla_luisf WHERE clv = '$clave'";

        $resultados = mysqli_query($conexion,$sql);

        while($consulta = mysqli_fetch_array($resultados))

           {

            $existe++; 

           }

        if($existe==0)

          echo "La clave ".$clave." no existe";

        else{

          $_UPDATE_SQL="UPDATE C_User_Status Set

              User_Status_Name = '0'

              WHERE clv='$clave'"; 



          mysqli_query($conexion,$_UPDATE_SQL);

          echo "Acualización con éxito";

        }

      } */      

   

?>