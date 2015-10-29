<?php

class BaseWS {
	public function __call($name, $arguments) {
		throw new Exception('service not found');
	}
}
