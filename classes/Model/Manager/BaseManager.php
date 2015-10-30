<?php

abstract class BaseManager {
	protected $repository;
	
	protected $offset;
	protected $limit;
	
	public function __construct() {
		$this->repository = static::createRepository();
	}
	
	abstract static protected function createRepository();
	
	public function setLimit($limit) {
		$this->limit = $limit;
	}
	
	public function setOffset($offset) {
		$this->offset = $offset;
	}
}
