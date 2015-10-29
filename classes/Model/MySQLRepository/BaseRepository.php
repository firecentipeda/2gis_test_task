<?php

class BaseRepository {
	private $db;

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
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public function GetError() {
		return ['code' => $this->db->errorInfo()[0], 'message' => $this->db->errorInfo()[2]];
	}
}