<?php 
require_once 'init.php';

$app = new \Slim\App();

$app->get('/', function ()
{
	View::make( 'view-teste' );
});

$app->run();