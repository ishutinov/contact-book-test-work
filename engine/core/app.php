<?php
class App {
	# Фильтрация текстовых данных
	static function security($var) {
		return htmlspecialchars(trim($var));
	}
}
?>
