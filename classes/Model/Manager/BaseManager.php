<?php

abstract class BaseManager {
	/**
	 *
	 * @var BaseRepository
	 */
	protected $repository;
	
	/**
	 *
	 * @var int
	 */
	protected $offset;
	/**
	 *
	 * @var int
	 */
	protected $limit;
	
	public function __construct() {
		$this->repository = static::createRepository();
	}
	
	/**
	 * @return BaseRepository
	 */
	abstract static protected function createRepository();
	
	public function setLimit($limit) {
		$this->limit = $limit;
	}
	
	public function setOffset($offset) {
		$this->offset = $offset;
	}
}
