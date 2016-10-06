<?php
class Contacts extends Controller {
	public function __construct() {
		$this->model = new ModelContacts();
		$this->view = new View();
	}
	
	#show contacts list
	public function index() {
		$this->view->title = "Контакты";
		$this->view->description = "Контакты";
		$this->view->keywords = "Контакты";
		$this->view->ContactsList = $this->model->getContacts();
		$this->view->render("contacts/list");
	}
	
	#add contact
	public function add() {
		if($_SERVER["REQUEST_METHOD"] == "POST") {
			if(isset($_POST["name"]) && isset($_POST["phone"]) && isset($_POST["description"])) {
				$name = App::security($_POST["name"]);
				$phone = App::security($_POST["phone"]);
				$description = App::security($_POST["description"]);
				if(empty($name) || empty($phone) || empty($description)) {
					$this->view->msg = "FieldsIsEmpty";
				} elseif(strlen($name) < 3 || strlen($phone) < 5 || strlen($description) < 3) {
					$this->view->msg = "FieldsIsSmall";
				} elseif(strlen($name) > 50 || strlen($description) > 255) {
					$this->view->msg = "FieldsIsLimit";
				} elseif(!preg_match("/^[а-яa-z\s\.\-]+$/ui",$name)) {
					$this->view->msg = "FieldsIsNotCorrect";
				} elseif(!preg_match("/^[0-9]+$/ui",$phone)) {
					$this->view->msg = "FieldsIsNotCorrect"; 
				} else {
					$this->view->msg = "Success";
					$this->model->addContact($name, $phone, $description);
					Route::redirect("contacts");
				}
			} else {
				$this->view->msg = "FieldsIsEmpty";
			}
		} else {
			$this->view->msg = null;
		}
		$this->view->title = "Добавить новую запись";
		$this->view->description = "Добавить новую запись";
		$this->view->keywords = "Добавить новую запись";
		$this->view->render("contacts/add");
	}
	
	#delete contact by id
	public function delete($action=null) {
		if((!isset($action[3])) || ($action[3] == null)) {
			Route::error();
		}
		if(App::isAjax()) {
			if((isset($action[3])) && ($action[3] != null)) {
				if(!$this->model->delContact($action[3])) {
					Route::error();
				}
				Route::redirect("contacts");
			}
		} else {
			Route::error();
		}
	}
	
	#edit contact by id
	public function edit($action=null) {
		if((!isset($action[3])) || ($action[3] == null)) {
			Route::error();
		}
		if($_SERVER["REQUEST_METHOD"] == "POST") {
			if(isset($_POST["name"]) && isset($_POST["phone"]) && isset($_POST["description"])) {
				$id = $action[3];
				$name = App::security($_POST["name"]);
				$phone = App::security($_POST["phone"]);
				$description = App::security($_POST["description"]);
				if(empty($name) || empty($phone) || empty($description)) {
					$this->view->msg = "FieldsIsEmpty";
				} elseif(strlen($name) < 3 || strlen($phone) < 5 || strlen($description) < 3) {
					$this->view->msg = "FieldsIsSmall";
				} elseif(strlen($name) > 50 || strlen($description) > 255) {
					$this->view->msg = "FieldsIsLimit";
				} elseif(!preg_match("/^[а-яa-z\s\.\-]+$/ui",$name)) {
					$this->view->msg = "FieldsIsNotCorrect";
				} elseif(!preg_match("/^[0-9]+$/ui",$phone)) {
					$this->view->msg = "FieldsIsNotCorrect"; 
				} else {
					$this->view->msg = "Success";
					$this->model->setContact($id,$name,$phone,$description);
				}
			} else {
				$this->view->msg = "FieldsIsEmpty";
			}
		} else {
			$this->view->msg = null;
		}
		$this->view->ContactDetails = $this->model->getContact($action[3]);
		if($this->view->ContactDetails) {
			$this->view->title = "Редактирование контакта";
			$this->view->description = "Редактирование контакта";
			$this->view->keywords = "Редактирование контакта";
			$this->view->render("contacts/edit");
		} else {
			Route::error();
		}
	}
}
?>
