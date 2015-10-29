<?php
require_once __DIR__ . '/../init.php';

$server = new Server();
try {
	echo $server->proccess();
} catch (DBException $e) {
	echo $server->createErrorResponse(new Exception('server error'));
} catch (Exception $e) {
	echo $server->createErrorResponse($e);
}
