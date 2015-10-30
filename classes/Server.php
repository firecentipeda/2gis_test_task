<?php

class Server {
	/**
	 *
	 * @var Request 
	 */
	private $request;
	/**
	 *
	 * @var serviceManager 
	 */
	private $serviceManager;

	public function __construct() {
		$this->serviceManager = $this->getServiceManager();
	}

	/**
	 * @return string
	 */
	public function proccess() {
		$service = $this->serviceManager->getService($this->getRequest()->getServiceName());
		$methodName = $this->getRequest()->getServiceMethod();
		$serviceResponse = $service->$methodName($this->request);
		return $this->createSuccessResponse($serviceResponse);
	}
	
	/**
	 * 
	 * @return Request
	 */
	private function getRequest() {
		if (!$this->request) {
			$this->request = new Request();
		}
		return $this->request;
	}

	/*
	 * @return serviceManager
	 */
	private function getServiceManager() {
		return new serviceManager($this->getRequest());
	}

	/**
	 * 
	 * @param Exception $error
	 * @return string
	 */
	public function createErrorResponse($error) {
		return $this->createResponse('error', ['errorMessage' => $error->getMessage()]);
	}
	
	/**
	 * 
	 * @param array $result
	 * @return string
	 */
	public function createSuccessResponse($result) {
		return $this->createResponse('ok', $result);
	}
	
	/**
	 * 
	 * @param string $status
	 * @param array $result
	 * @return string
	 */
	public function createResponse($status, $result) {
		return json_encode(['status' => $status, 'result' => $result]);
	}
}