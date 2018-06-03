<?php 
require_once 'init.php';

$app = new \Slim\App();

$app->get('/', function()
{
	\Controllers\PagesController::home();
});

$app->map(['GET', 'POST'], '/login', function()
{
	\Controllers\SessionsController::login();
});

$app->get( '/logout', function()
{
	\Controllers\SessionsController::logout();
});

$app->get( '/fazer-pergunta', function()
{
	\Controllers\QuestionsController::create();
});

$app->run();