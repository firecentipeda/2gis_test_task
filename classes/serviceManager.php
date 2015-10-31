<?php

class serviceManager {
	/**
	 * @param string $serviceName
	 * @return \OrganizationWS|\BaseWS
	 * @throws Exception
	 */
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