<?php

class serviceManager {
	public function callService($request) {
		$service = $this->getService($request->getServiceName());
		switch ($request->serviceName()) {
			case 'organization':
				switch ($this->getMethodName()) {
					case 'getById':
						return $service->getById($request->getParameters()['id']);
					case 'getByBuilding':
						return $service->getByBuilding($request->getParameters()['id']);
					case 'getInSquare':
						return $service->getInSquare($request->getParameters()['coordinates'],$request->getParameters()['distance']);
				}
				break;
			case 'building':
				break;
			default:
				throw new Exception('service not found');
		}
	}
	
	public function getService($serviceName) {
		switch ($serviceName) {
			case 'organization':
				return new OrganizationWS();
			case 'building':
				return new BuildingWS();
			default:
				throw new Exception('service not found');
		}
	}
}