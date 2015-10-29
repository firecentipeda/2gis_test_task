<?php

class OrganizationManager extends BaseManager {
	private $rubricManager;
	
	public function __construct() {
		$this->rubricManager = new RubricManager();
		parent::__construct();
	}

	static protected function createRepository() {
		return new OrganizationRepository();
	}
	
	public function createFromArray($modelData) {
		foreach ($modelData['rubricsIds'] as $rubricId) {
			$modelData['rubrics'][] = $this->rubricManager->getRubricTree($rubricId);
		}
		unset($modelData['rubricsIds']);
		return $modelData;
	}
	
	public function getById($id) {
		return $this->createFromArray(reset($this->repository->getById($id)));
	}
	
	public function getByBuilding($id) {
		return $this->repository->getByBuildingId($id);
	}
	
	public function getByRubric($id) {
		return $this->repository->getByRubricId($id);
	}
	
	public function getInSquare($coordinates, $distance) {
		return $this->repository->getInSquare($coordinates, $distance);
	}
}