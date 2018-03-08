<?php 
require_once 'vendor/autoload.php';

$app = new \Slim\App();

$app->get('/', function ()
{
	echo "<h1>home</h1>";
});

$app->run();