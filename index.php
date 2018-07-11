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

$app->get( '/cadastro', function()
{
	\Controllers\UsersController::create();
});

$app->post( '/cadastro_salvar', function()
{
	\Controllers\UsersController::store();
});

$app->get( '/cadastro_finalizado', function()
{
	\View::make('user.created');
});

$app->get( '/painel-de-controle', function()
{
	\Controllers\UsersController::controlPanel();
});

$app->post( '/alterar-senha', function()
{
	\Controllers\UsersController::changePassword();
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