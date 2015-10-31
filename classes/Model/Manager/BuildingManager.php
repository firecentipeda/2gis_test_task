<?php

class BuildingManager extends BaseManager {
	
	static protected function createRepository() {
		return new BuildingRepository();
	}
	
	/**
	 * 
	 * @param int $offset
	 * @param int $limit
	 * @return array
	 */
	public function getAll($offset, $limit) {
		return $this->repository->getAll($offset, $limit);
	}
}
