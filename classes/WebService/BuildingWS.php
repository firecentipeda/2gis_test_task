<?php

class BuildingWS extends BaseWS {
	static protected function createModelManager() {
		return new BuildingManager();
	}
	
	public function getList($request) {
		$limit = $this->getListSize($request->getParameter('limit', $this->maxListSize));
		return $this->modelManager->getAll($request->getParameter('offset', 0), $limit);
	}
}