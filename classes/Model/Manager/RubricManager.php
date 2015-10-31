<?php

class RubricManager extends BaseManager {

	static protected function createRepository() {
		return new RubricRepository();
	}
	
	/**
	 * 
	 * @param int $rubricId
	 * @return array
	 */
	public function getRubricTree($rubricId) {
		$rubrics = $this->getAll();
		$rubricTree = [];
		do {
			$rubricTree[] = $rubrics[$rubricId];
			$rubricId = $rubrics[$rubricId]['parentId'];
		} while ($rubricId != 0);
		return $rubricTree;
	}
	
	/**
	 * @return array
	 */
	public function getAll() {
		return $this->repository->getAll();
	}
}