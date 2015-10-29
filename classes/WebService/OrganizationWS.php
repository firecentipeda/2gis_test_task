<?php

class OrganizationWS extends BaseWS {
	private $organizationManager;
	
	public function __construct() {
		$this->organizationManager = new OrganizationManager();
	}

	public function getById(Request $request) {
		if (empty((int)$request->getParameter('id'))) {
			throw new Exception('invalid parameters');
		}
		return $this->organizationManager->getById($request->getParameter('id'));
	}
	
	public function getByBuilding(Request $request) {
		if (empty((int)$request->getParameter('id'))) {
			throw new Exception('invalid parameters');
		}
		return $this->organizationManager->getByBuilding($request->getParameter('id'));
	}
	
	public function getByRubric(Request $request) {
		if (empty($request->getParameter('id'))) {
			throw new Exception('invalid parameters');
		}
		return $this->organizationManager->getByRubric($request->getParameter('id'));
	}
	
	public function getInSquare($request) {
		if (empty($request->getParameter('long')) || empty($request->getParameter('lat'))) {
			throw new Exception('invalid parameters');
		}
		return $this->organizationManager->getInSquare(
			['longitude' => $request->getParameter('long'), 'latitude' => $request->getParameter('lat')],
			$request->getParameter('distance')
		);
	}
}