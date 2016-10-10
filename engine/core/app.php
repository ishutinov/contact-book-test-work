<?php
class App {
	# Фильтрация текстовых данных
	static function security($var) {
		return htmlspecialchars(trim($var));
	}
	# Check AJAX request
	static function isAjax()
	{
	  return(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest');
	}
}
?>
