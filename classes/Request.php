<?php

class Request {
	private $request;
	public function __construct() {
		$this->request = $_REQUEST;
	}

	public function getServiceName() {
		if (empty($this->request['service'])) {
			throw new Exception('service not found');
		}
		return $this->request['service'];
	}
	
	public function getServiceMethod() {
		if (empty($this->request['method'])) {
			throw new Exception('service not found');
		}
		return $this->request['method'];
	}
	
	public function getParameter($name, $defaultValue = '') {
		if (!key_exists($name, $this->request)) {
			return $defaultValue;
		}
		return $this->request[$name];
	}
}