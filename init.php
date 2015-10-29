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
		$realFilePath = realpath('../classes/' . $folder . $name . '.php');
		if (file_exists($realFilePath)) {
			require_once $realFilePath;
			return;
		}
	}
}

$settings = Settings::getInstance();
$settings->set('dbHost','raf.local');
$settings->set('dbName','zaytsevaav_test_base');
$settings->set('dbUser','zaytsevaav');
$settings->set('dbPassword','2UX:%cvX');