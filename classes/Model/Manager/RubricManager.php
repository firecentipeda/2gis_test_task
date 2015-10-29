<?php

class RubricManager extends BaseManager {
	static protected function createRepository() {
		return new RubricRepository();
	}
	
	public function getRubricTree($rubricId) {
		$rubrics = $this->getAll();
		$rubricTree = [];
		do {
			$rubricTree[] = $rubrics[$rubricId];
			$rubricId = $rubrics[$rubricId]['parentId'];
		} while ($rubricId != 0);
		return $rubricTree;
	}
	
	public function getAll() {
		return $this->repository->getAll();
	}
}