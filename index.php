<?php 
require_once 'init.php';

$app = new \Slim\App();

$app->get('/', function ()
{
	\Controllers\PagesController::home();
});

$app->run();