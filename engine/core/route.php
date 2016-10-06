<?php
class Route {
	# Parse URL
	public static function init() {
		$action = "index";
		$controller = "contacts";
		$routes = explode("/", urldecode(preg_replace("|/-$|", "", $_SERVER["REQUEST_URI"])), PHP_URL_PATH);
		//get controller name
		if(!empty($routes[1])) {
			$controller = $routes[1];
		}
		//get action name
		if(!empty($routes[2])) {
			$action = $routes[2];
		}
		if(!class_exists($controller)) {
			Route::error();
		}
		$controller = new $controller;
		if(method_exists($controller, $action)) {
			$controller->$action($routes);
		} else {
			Route::error();
		}
	}

	# Show error page
	public static function error() {
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
		header('HTTP/1.1 404 Not Found');
		header('Status: 404 Not Found');
		header('Location:'.$host.'error');
	}

	# Page Redirect
	public function redirect($url) {
		$host = "http://".$_SERVER["HTTP_HOST"]."/";
		header("HTTP/1.1 301 Moved Permanently");
		header("Status: 301 Moved Permanently");
		header("Location:".$host."$url");
	}

	# Page Refresh
	public function refresh() {
		header("Location:".$_SERVER["HTTP_REFERER"]);
	}
}
