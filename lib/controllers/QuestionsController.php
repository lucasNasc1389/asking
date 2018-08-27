<?php

namespace Controllers;

/**
 * Controller de perguntas
 */
class QuestionsController
{
	/**
     * Formulário de criação de pergunta
     */
	public static function create()
	{
		\Auth::denyNotLoggedInUsers();
		\View::make( 'question.create' );
	}


	/**
     * Processa o formulário de criação de pergunta
     */
	public static function store()
	{
		// impede acesso a usuário não logado
		\Auth::denyNotLoggedInUsers();
		\CSRF::Check();

		$title = isset( $_POST['title'] ) ? $_POST['title'] : null;
		$description = isset( $_POST['description'] ) ? $_POST['description'] : null;

		$errors = [];

		if ( empty( $title ) )
		{
			$errors[] = 'Informe o titulo da pergunta';
		}

		if ( empty( $description ))
		{
			$errors[] = 'Informe a descrição da pergunta';
		}

		if ( count( $errors ) > 0 )
		{
			// se ocorrer erro, exibe-os e encerra o método usando return
			return \View::make( 'question.create', compact( 'errors' ));
		}

		$user = \Auth::user();
		$user_id = $user->getId();
		$now = date( 'Y-m-d H:i:s' );

		$DB = new \DB;
		$sql = "INSERT INTO questions(user_id, title, description, created_at, updated_at) VALUES(:user_id, :title, :description, :created_at, :updated_at)";
		$stmt = $DB->prepare( $sql );
		$stmt->bindParam( ':title', $title );
		$stmt->bindParam( ':description', $description );
		$stmt->bindParam( ':user_id', $user_id, \PDO::PARAM_INT );
		$stmt->bindParam( ':created_at', $now );
		$stmt->bindParam( 'updated_at', $now );

		if ( $stmt->execute() )
		{
			// busca o ID gerado na inserção
			$id = $DB->lastInsertId();

			// redireciona para a página com a pergunta criada
			redirect( getBaseURL() . '/pergunta/' . $id );
		}
		else
		{
			echo "Erro ao criar pergunta";
		}
	}



	/**
     * Exibe uma pergunta, juntamente com suas respostas
     * @param  int $id ID da pergunta
     */
	public static function show( $id )
	{
		//busca os dados da pergunta
		$question = new \Models\Question;
		$question->find( $id );

		// busca o usuário logado ( ou null se não estiver logado )
		$user = \Auth::user();

		\View::make( 'question.show', compact( 'question', 'user', 'answers' ));
	}
}