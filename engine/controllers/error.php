<?php
class Error extends Controller {
	public function index() {
		$this->view->title = "Страница не существует";
		$this->view->description = "Страница не существует";
		$this->view->keywords = "Страница не существует";
		$this->view->render("error");
	}
}
?>
