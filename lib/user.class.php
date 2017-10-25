<?php 	

class User {

	protected $db;
	private $UsersList; //returns all users in array

	public function __construct($db) 
	{
		$this->db = $db->getConn(); 
	}

	public function GetNames()
	{
		$q = "SELECT user FROM users";
		$sql = $this->db->prepare($q);
		$sql->execute();
		
		$row = $sql->fetchALL(PDO::FETCH_ASSOC);
		$this->UsersList = $row;
	
	}

	public function Users()
	{
		$this->GetNames();
		return $this->UsersList;
	}


}












 ?>