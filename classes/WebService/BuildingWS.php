<?php

class BuildingWS extends BaseWS {
	private $maxListSize = 1000;
	private $buildingManager;
	
	public function __construct() {
		$this->buildingManager = new BuildingManager();
	}
	
	public function getList($request) {
		$limit = $request->getParameter('limit', $this->maxListSize) <= $this->maxListSize ? 
			$request->getParameter('limit', $this->maxListSize) : $this->maxListSize;
		return $this->buildingManager->getAll($request->getParameter('offset', 0), $limit);
	}
}