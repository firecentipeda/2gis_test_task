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
		$organizations = [];
		$this->repository->setOffset($this->offset);
		$this->repository->setLimit($this->limit);
		foreach ($this->repository->getByBuildingId($id) as $one) {
			$organizations[] = $this->createFromArray($one);
		}
		return $organizations;
	}
	
	public function getByRubric($id) {
		$organizations = [];
		$this->repository->setOffset($this->offset);
		$this->repository->setLimit($this->limit);
		foreach ($this->repository->getByRubricId($id) as $one) {
			$organizations[] = $this->createFromArray($one);
		}
		return $organizations;
	}
	
	public function getInSquare($coordinates, $distance) {
		$this->repository->setOffset($this->offset);
		$this->repository->setLimit($this->limit);
		return $this->repository->getInSquare($coordinates, $distance);
	}
}