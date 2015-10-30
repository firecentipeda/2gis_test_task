<?php

class BaseRepository {
	private $db;
	
	protected $offset = 0;
	protected $limit = 1000;

	public function __construct() {
		$dbSettings = Settings::getInstance();
		try {
		    $this->db = new PDO(
			    'mysql:host=' . $dbSettings->get('dbHost') . ';dbname=' . $dbSettings->get('dbName'),
			    $dbSettings->get('dbUser'),
			    $dbSettings->get('dbPassword'),
			    []
		    );
		} catch (Exception $e) {
		    throw new DBException('DB error: ' . $e->getMessage());
		}
	}
	protected function query($query) {
		$stm = $this->db->query($query);
		if (!$stm) {
			throw new DBException('DB error: ' . $this->getError()['message']);
		};
		return $stm;
	}
	
	public function fetchAll($query) {
		return $this->query($query)->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function GetError() {
		return ['code' => $this->db->errorInfo()[0], 'message' => $this->db->errorInfo()[2]];
	}
	
	public function setLimit($limit) {
		$this->limit = $limit;
	}
	
	public function setOffset($offset) {
		$this->offset = $offset;
	}
}