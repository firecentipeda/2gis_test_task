<?php

abstract class BaseWS {
	protected $maxListSize = 1000;
	protected $modelManager;
	
	public function __construct() {
		$this->modelManager = static::createModelManager();
	}
	abstract static protected function createModelManager();
	
	protected function getListSize($limit) {
		if ($limit > $this->maxListSize) {
			return $this->maxListSize;
		}
		return $limit;
	}

	public function __call($name, $arguments) {
		throw new Exception('service not found');
	}
}
