<?php
class PlayerVO{
	//AtributosPlayer
	private $ULSA;
	private $Team;
	private $Birth;
	private $Number;
	private $Position;
	private $Type;
	//AtributosUser
	private $User_ID;
	private $Name;
	private $Last_Name;
	private $Mail;
	private $Pass;
	private $Salt;
	
	private $Creation;
	private $Creator;
	
	//SETUSER
	public function setIdU($v){
		$this->User_ID = $v;
	}
	public function setNameU($v){
		$this->Name = $v;
	}
	public function setLNameU($v){
		$this->Last_Name = $v;
	}
	public function setMailU($v){
		$this->Mail = $v;
	}
	public function setPassU($v){
		$this->Pass = $v;
	}

	//SETPLAYER
	public function setId($v){
		$this->ULSA = $v;
	}
	public function setTeam($v){
		$this->Team = $v;
	}
	public function setBirth($v){
		$this->Birth = $v;
	}
	public function setNumber($v){
		$this->Number = $v;
	}
	public function setPosition($v){
		$this->Position = $v;
	}
	public function setType($v){
		$this->Type = $v;
	}
	
	//SET ALL FOR VIEW
	public function setALLP($ULSA, $Team, $Birth, $Number,$Position, $Type, $Name, $Last_Name, $Mail){
		$this->ULSA = $ULSA;
		$this->Team=$Team;
		$this->Birth=$Birth;
		$this->Number=$Number;
		$this->Position=$Position;
		$this->Type=$Type;
		$this->Name=$Name;
		$this->Last_Name=$Last_Name;
		$this->Mail=$Mail;
	}
	//SET ALL FOR INSERT
	public function setJugador($ULSA_ID, $Birth_Date, $Team, $Player_Position, $Player_Number, $Name, $Last_Name, $Mail, $Pass, $Salt, $Creation_date, $Creator){
		$this->ULSA = $ULSA_ID;
		$this->Birth=$Birth_Date;
		$this->Team=$Team;
		$this->Position=$Player_Position;
		$this->Number=$Player_Number;
		$this->Name=$Name;
		$this->Last_Name=$Last_Name;
		$this->Mail=$Mail;
		$this->Pass=$Pass;
		$this->Salt=$Salt;
		$this->Creation=$Creation_date;
		$this->Creator=$Creator;
	}
	
	//SET ALL FOR UPDATE
	public function setUpdate($fecha, $usuario, $clave){
		$this->Creation=$fecha;
		$this->Creator = $usuario;
		$this->ULSA = $clave;
	}
	
	//GETPLAYER
	public function getULSA(){
		return $this->ULSA;
	}
	public function getTeam(){
		return $this->Team;
	}
	public function getBirth(){
		return $this->Birth;
	}
	public function getNum(){
		return $this->Number;
	}
	public function getPos(){
		return $this->Position;
	}
	public function getType(){
		return $this->Type;
	}
	//GETUSER
	public function getId(){
		return $this->User_ID;
	}
	public function getName(){
		return $this->Name;
	}
	public function getLName(){
		return $this->Last_Name;
	}
	public function getMail(){
		return $this->Mail;
	}
	public function getPass(){
		return $this->Pass;
	}
	
	public function getSalt(){
		return $this->Salt;
	}
	
	public function getCreation(){
		return $this->Creation;
	}
	
	public function getCreator(){
		return $this->Creator;
	}
}



?>
