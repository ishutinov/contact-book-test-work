<?php
class Model extends Database {
	public function __construct() {
		try {
			$this->db = new Database();
		} catch (PDOException $e) {
			die("Database connection could not be established.");
		}
	}
}
