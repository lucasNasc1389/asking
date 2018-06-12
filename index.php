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

$app->post( '/enviar-pergunta', function()
{
	\Controllers\QuestionsController::store();
});

$app->get( '/pergunta/{id}', function ( $request )
{
	$id = $request->getAttribute('route')->getArgument('id');
	\Controllers\QuestionsController::show( $id );
});

$app->run();