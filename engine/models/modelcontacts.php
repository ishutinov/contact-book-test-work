<?php
class ModelContacts extends Model {
	#get all contacts
	public function getContacts() {
		$this->db->query('SELECT id,name,phone,description FROM contacts ORDER BY id DESC');
		$result = $this->db->resultset();
		return $result;
	}
	#get contact by id
	public function getContact($id) {
		$this->db->query('SELECT id,name,phone,description FROM contacts WHERE id = :id');
		$this->db->bind(':id', $id);
		$result = $this->db->resultset();
		return $result;
	}
	#set contact by id
	public function setContact($id,$name,$phone,$description) {
		$this->db->query('UPDATE contacts SET name = :name,phone = :phone,description = :description WHERE id = :id');
		$this->db->bind(':name', $name);
		$this->db->bind(':phone', $phone);
		$this->db->bind(':description', $description);
		$this->db->bind(':id', $id);
		$this->db->execute();
	}
	#del contact by id
	public function delContact($id) {
		$this->db->query('DELETE FROM contacts WHERE id = :id');
		$this->db->bind(':id', $id);
		$this->db->execute();
	}
	#add contact
	public function addContact($name,$phone,$description) {
		$this->db->query('INSERT INTO contacts (name,phone,description) VALUES (:name,:phone,:description)');
		$this->db->bind(':name', $name);
		$this->db->bind(':phone', $phone);
		$this->db->bind(':description', $description);
		$this->db->execute();
	}
}
