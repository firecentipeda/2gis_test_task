<?php

function __autoload($name) {
	$folders = [
		'Model/Entity/',
		'Model/Manager/',
		'Model/MySQLRepository/',
		'WebService/',
		'Exception/',
		'./',
	];
	foreach ($folders as $folder) {
		$realFilePath = realpath(__DIR__ . '/classes/' . $folder . $name . '.php');
		if (file_exists($realFilePath)) {
			require_once $realFilePath;
			return;
		}
	}
}

require_once __DIR__ . '/config.php';

$settings = Settings::getInstance();
foreach ($config as $paramName => $paramValue) {
	$settings->set($paramName, $paramValue);
}
