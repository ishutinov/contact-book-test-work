<?php
class Database
{
	private $host = MySQLHost;
	private $user = MySQLUser;
	private $pass = MySQLPass;
	private $dbname = MySQLData;
	private $db;
	private $stmt;
	private $error;

	public function __construct() {
		$options = array(
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
			//PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			//PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
		);
		try {
			$this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname.';charset=utf8',$this->user, $this->pass, $options);
		} catch(PDOException $e) {
			$this->error = $e->getMessage();
		}
	}

	public function __destruct() {
		$this->db = null;
	}

	public function query($query) {
		$this->stmt = $this->db->prepare($query);
		//var_dump($this->lastInsertId());
		//$this->debug();
	}

	public function bind($param, $value, $type = null) {
	  if(is_null($type)) {
	    switch(true)
		{
	      case is_int($value):
	      	$type = PDO::PARAM_INT;
	        break;
	      case is_bool($value):
	        $type = PDO::PARAM_BOOL;
	      	break;
	      case is_null($value):
	        $type = PDO::PARAM_NULL;
	        break;
	      default:
	        $type = PDO::PARAM_STR;
	    }
	  }
	  $this->stmt->bindValue($param, $value, $type);
	}

	public function execute() {
    return $this->stmt->execute();
	}

	public function resultset() {
	  $this->execute();
	  return $this->stmt->fetchAll();
	}

	public function single() {
	  $this->execute();
		return $this->stmt->fetchColumn();
	  //return $this->stmt->fetch();
	}

	public function rowCount() {
	  return $this->stmt->rowCount();
	}

	public function lastInsertId() {
	  return $this->db->lastInsertId();
	}

	public function beginTransaction() {
	  return $this->db->beginTransaction();
	}

	public function endTransaction() {
	  return $this->db->commit();
	}

	public function cancelTransaction() {
	  return $this->db->rollBack();
	}

	public function debug() {
	  return $this->stmt->debugDumpParams();
	}
}
