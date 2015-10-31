<?php

class BuildingWS extends BaseWS {
	/**
	 * @return \BuildingManager
	 */
	static protected function createModelManager() {
		return new BuildingManager();
	}
	
	/**
	 * @param Request $request
	 * @return array
	 */
	public function getList($request) {
		$limit = $this->getListSize($request->getParameter('limit', $this->maxListSize));
		return $this->modelManager->getAll($request->getParameter('offset', 0), $limit);
	}
}