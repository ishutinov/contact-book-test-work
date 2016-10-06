<?php
class View {
	private $vars = array();

	public function render($content, $vars = []) {
		if((isset($this->vars)) && (is_array($this->vars))) {
			extract($this->vars);
		}
		require('engine/views/'.SiteTemplate);
	}

	public function __set($key,$value) {
		if(!isset($this->vars[$key])) {
			$this->vars[$key] = $value;
		} else {
			trigger_error('Variable '. $key .' already defined', E_USER_WARNING);
		}
	}

	public function __get($key) {
		return $this->vars[$key];
	}
}
