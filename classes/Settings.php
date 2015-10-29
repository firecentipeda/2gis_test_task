<?php

class Settings {
	private $settings = [];
	private static $_instance = null;
	private function __construct() {}
	
	private function __clone() {}
	
	static public function getInstance() {
		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	
	public function set($name, $value) {
		$this->settings[$name] = $value;
	}
	
	public function get($name) {
		if (key_exists($name, $this->settings)) {
			return $this->settings[$name];
		}
		return null;
	}
}