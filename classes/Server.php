<?php

class Server {
	private $request;
	private $serviceManager;

	public function __construct() {
		$this->serviceManager = $this->getServiceManager();
	}

	public function proccess() {
		$service = $this->serviceManager->getService($this->getRequest()->getServiceName());
		$methodName = $this->getRequest()->getServiceMethod();
		$serviceResponse = $service->$methodName($this->request);
		return $this->createSuccessResponse($serviceResponse);
	}
	
	private function getRequest() {
		if (!$this->request) {
			$this->request = new Request();
		}
		return $this->request;
	}

	private function getServiceManager() {
		return new serviceManager($this->getRequest());
	}

	public function createErrorResponse($error) {
		return $this->createResponse('error', ['errorMessage' => $error->getMessage()]);
	}
	
	public function createSuccessResponse($result) {
		return $this->createResponse('ok', $result);
	}
	
	public function createResponse($status, $result) {
		return json_encode(['status' => $status, 'result' => $result]);
	}
}