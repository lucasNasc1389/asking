<?php 
/*
 * Este script é responsável por criar todas as rotas da 
 * aplicação, atribuindo a devida ação a cada uma delas
 */


// inclui o arquivo de inicialização
require_once 'init.php';


// instancia o Slim
$app = new \Slim\App();


/* =======================
   Rotas da Aplicação
   ===================== */


// página inicial
$app->get('/', function()
{
	\Controllers\PagesController::home();
});


// login
// GET: exibe formulário de login
// POST: processa o formulário de login
$app->map(['GET', 'POST'], '/login', function()
{
	\Controllers\SessionsController::login();
});


// logout (sair)
$app->get( '/logout', function()
{
	\Controllers\SessionsController::logout();
});


// formulário de cadastro
$app->get( '/cadastro', function()
{
	\Controllers\UsersController::create();
});


// processa o formulário de cadastro
$app->post( '/cadastro_salvar', function()
{
	\Controllers\UsersController::store();
});


// página de cadastro finalizado
$app->get( '/cadastro_finalizado', function()
{
	\View::make('user.created');
});


// painel do usuário
$app->get( '/painel-de-controle', function()
{
	\Controllers\UsersController::controlPanel();
});


// alteração de senha
$app->post( '/alterar-senha', function()
{
	\Controllers\UsersController::changePassword();
});


// formulário para cadastrar pergunta
$app->get( '/fazer-pergunta', function()
{
	\Controllers\QuestionsController::create();
});


// processa o envio da pergunta
$app->post( '/enviar-pergunta', function()
{
	\Controllers\QuestionsController::store();
});


// exibe a pergunta
$app->get( '/pergunta/{id}', function ( $request )
{
	$id = $request->getAttribute('route')->getArgument('id');
	\Controllers\QuestionsController::show( $id );
});


// executa a aplicação
$app->run();