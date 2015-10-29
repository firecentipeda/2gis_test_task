<?php

abstract class BaseManager {
	protected $repository;
	
	public function __construct() {
		$this->repository = static::createRepository();
	}
	
	abstract static protected function createRepository();
}