<?php
require("VO.php");
session_start();
$usuario2= $_SESSION['user'];

class UserDAO{
	private $host ="localhost";
	private $user="sepherot_sofia";
	private $password ="zueTmwnaGI3X";
	private $database="sepherot_sofiaBD";
	private $conn;

	function __construct(){
		$this->conn=$this->connectDB();
	}
	function connectDB()
	{
		$c = mysqli_connect($this->host, $this->user,$this->password,$this->database);
		return $c;
	}
	
	
	//INSERTUSER
	function insert($vo){
		//echo "llego al insert u";
		$sql="INSERT into Users (User_ID, Name, Last_Name,  Mail, Password, Salt, User_Type, Status, Creation_date, Creator) VALUES(".$vo->getULSA().",'".$vo->getName()."','".$vo->getLName()."','".$vo->getMail()."','".$vo->getPass()."','".$vo->getSalt()."',2,1,'".$vo->getCreation()."','".$vo->getCreator()."');";
		//echo $sql;
		$result = mysqli_query($this->conn,$sql);
		if($result){
			return true;
		}
		else{
			return false;
		}

	}
	//INSERTSTUDENT
	function insertS($vo){
			//echo "llego al insert s";
		$fechaC = date("Y-m-d h:i:sa");
		$sql="INSERT into Students (ULSA_ID, Team, Birth_Date,  Player_Number, Player_Position, Creation_date, Creator) VALUES('".$vo->getULSA()."','".$vo->getTeam()."','".$vo->getBirth()."',".$vo->getNum().",".$vo->getPos().",'".$vo->getCreation()."','".$vo->getCreator()."');";
		//echo $sql;
		$result = mysqli_query($this->conn,$sql);
		if($result){
			return true;
		}
		else{
			return false;
		}

	}
	//BUSQUEDACLAVE
	function busqueda($clv){
		$sql = "SELECT * FROM Students S, Users U WHERE S.ULSA_ID = U.User_ID AND S.ULSA_ID = '$clv'";
		$resultado = mysqli_query($this->conn,$sql);
		$fila = mysqli_fetch_assoc($resultado);
		$vo = new PlayerVO();
		$vo->setALLP($fila['ULSA_ID'],$fila['Team'],$fila['Birth_Date'],$fila['Player_Number'],$fila['Player_Position'],$fila['Player_Type'],$fila['Name'],$fila['Last_Name'],$fila['Mail']);
		if(!empty($vo))
			return $vo;
		else
			return false;
	}
	
	
	//VERIFICAR
	function verify($vo){
		$checkClv = "SELECT * FROM Students where ULSA_ID = ".$vo->getULSA()."";
		$result = mysqli_query($this->conn,$checkClv);
		$existClv=mysqli_fetch_assoc($result);
		if($existClv){
			return false;
		}
		else{
			return true;
			
		}
	}
	
	
	function Delete($vo){
		$_UPDATE_SQL="UPDATE Users Set Status = '2',  Delete_date='".$vo->getCreation()."', Deleter='".$vo->getCreator()."' WHERE User_ID='".$vo->getULSA()."'  and User_Type = 2";
		//echo $_UPDATE_SQL;
		$resultado = mysqli_query($this->conn,$_UPDATE_SQL);
		if($resultado)
			return true;
		else
			return false;
	}

}

?>