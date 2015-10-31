<?php

class OrganizationWS extends BaseWS {
	/**
	 * @return \OrganizationManager
	 */
	static protected function createModelManager() {
		return new OrganizationManager();
	}

	/**
	 * 
	 * @param Request $request
	 * @return array
	 * @throws Exception
	 */
	public function getById(Request $request) {
		if (empty((int)$request->getParameter('id'))) {
			throw new Exception('invalid parameters');
		}
		return $this->modelManager->getById($request->getParameter('id'));
	}
	
	/**
	 * 
	 * @param Request $request
	 * @return array
	 * @throws Exception
	 */
	public function getByBuilding(Request $request) {
		if (empty((int)$request->getParameter('id'))) {
			throw new Exception('invalid parameters');
		}
		return $this->modelManager->getByBuilding($request->getParameter('id'));
	}
	
	/**
	 * 
	 * @param Request $request
	 * @return array
	 * @throws Exception
	 */
	public function getByRubric(Request $request) {
		if (empty($request->getParameter('id'))) {
			throw new Exception('invalid parameters');
		}
		$this->modelManager->setLimit($request->getParameter('limit', 1000));
		$this->modelManager->setOffset($request->getParameter('offset', 0));
		return $this->modelManager->getByRubric($request->getParameter('id'));
	}
	
	/**
	 * 
	 * @param type $request
	 * @return array
	 * @throws Exception
	 */
	public function getInSquare($request) {
		if (empty($request->getParameter('long')) || empty($request->getParameter('lat'))) {
			throw new Exception('invalid parameters');
		}
		$this->modelManager->setLimit($request->getParameter('limit', 1000));
		$this->modelManager->setOffset($request->getParameter('offset', 0));
		return $this->modelManager->getInSquare(
			['longitude' => $request->getParameter('long'), 'latitude' => $request->getParameter('lat')],
			$request->getParameter('distance')
		);
	}
}