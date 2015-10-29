<?php

class BaseEntity {
	protected $data = [];
	
	public function toArray() {
		return $this->data;
	}
	
	public function __call($name, $arguments) {
		if (strpos($name, 'get') !== false) {
			$propertyName = lcfirst(str_replace('get', '', $name));
			if (array_key_exists($propertyName, $this->data)) {
				return $this->data[$propertyName];
			}
		}
		
		if (strpos($name, 'set') !== false) {
			$propertyName = lcfirst(str_replace('set', '', $name));
			$this->data[$propertyName] = reset($arguments);
		}
		return null;
	}
	
	
}