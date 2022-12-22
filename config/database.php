<?php
class Database{
	private $host = "localhost";
	private $dbname = "jwmenu";
	private $user = "root";
	private $pass = "";
	public $db;

	//database connection
	public function getConnection(){
		$this->dbh = null;
		try{
			$this->dbh = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->pass);
			//echo "Connected";
		}
		catch(PDOException $ex){
			echo "connection Error: ".$ex->getMessage();
		}

		return $this->dbh;
	}

}
?>