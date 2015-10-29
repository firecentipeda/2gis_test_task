<?php

class BuildingManager extends BaseManager {
	
	static protected function createRepository() {
		return new BuildingRepository();
	}
	
	public function getAll($offset, $limit) {
		return $this->repository->getAll($offset, $limit);
	}
	
	
}