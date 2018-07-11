<?php

namespace Controllers;

class UsersController
{
	/**
     * Formulário de registro de usuário
     */
	public static function create()
	{
		\View::make( 'user.create' );
	}

	/**
     * Registra o usuário
     */
	public static function store()
	{
		\CSRF::Check();

		$nickname = isset($_POST['nickname']) ? $_POST['nickname'] : null;
		$email 	  = isset($_POST['email']) ? $_POST['email'] : null;
		$password = isset($_POST['password']) ? $_POST['password'] : null;
		$passwordConfirmation = isset($_POST['password_confirmation']) ? $_POST['password_confirmation'] : null;
		$hashedPassword = \Hash::password( $password );

		$hasErrors = false;
		$errorMessages = [];

		if ( $nickname == null )
		{
			$errorMessages[] = "informe o seu apelido";
			$hasErrors = true;
		}

		if ( $email == null )
		{
			$errorMessages[] = "informe o seu email";
			$hasErrors = true;
		}

		if ( $password == null )
		{
			$errorMessages[] = "informe a sua senha";
			$hasErrors = true;
		}

		if ( $passwordConfirmation == null )
		{
			$errorMessages[] = "Confirme a sua senha";
			$hasErrors == true;
		}

		if ( $password != $passwordConfirmation )
		{
			$errorMessages[] = "Senhas não coincidem";
			$hasErrors = true;
		}

		if ( $hasErrors )
		{
			return \View::make('user.create', compact('errorMessages'));
		}

		$sql = "INSERT INTO users(name, nickname, email, password, status, admin, created_at, updated_at) VALUES(:name, :nickname, :email, :password, :status, :admin, :created_at, :updated_at)";

		$DB = new \DB;
		$stmt = $DB->prepare( $sql );
		$date = date('Y-m-d H:i:s');

		$stmt->bindParam( ':name', $name );
		$stmt->bindParam( ':nickname', $nickname );
		$stmt->bindParam( ':email', $email );
		$stmt->bindParam( ':password', $hashedPassword );
		$stmt->bindValue( ':status', \Models\User::STATUS_ACTIVE, \PDO::PARAM_INT );
		$stmt->bindValue( ':admin', 0 );
		$stmt->bindParam( ':created_at', $date );
		$stmt->bindParam( ':updated_at', $date );

		if ( $stmt->execute() )
		{
			redirect( getBaseURL() . '/cadastro_finalizado');
		}
		else
		{
			list( $error, $sgbdErrorCode, $sgbdErrorMessage ) = $stmt->errorInfo();

			if ( $sgbdErrorCode == 1062 )
			{
				// erro 1062 é o código do MySQL de violação de chave única
                // veja mais em: http://dev.mysql.com/doc/refman/5.5/en/error-messages-server.html
                if ( preg_match("/for key .?nickname/iu", $sgbdErrorMessage))
                {   
                	//nickname já em uso
                	$errorsMessages[] = "Este apelido já está em uso";
                }
                else
                {
                	//email já em uso
                	$errorsMessages[] = "Este email já está em uso";
                }
			}

			return \View::make( 'user.create', compact( 'errorMessages'));
		}
	}

	/* Painel de controle do usuário */
	public static function controlPanel()
	{
		// Restringe o acesso aos usuários logados
		\Auth::denyNotLoggedInUsers();

		$user = \Auth::user();

		\View::make( 'user.control-panel', compact('user') );

	}

	public static function changePassword()
	{	
		\Auth::denyNotLoggedInUsers();
        \CSRF::Check();

		$senhaAtual = isset( $_POST['senha_atual'] ) ? $_POST['senha_atual'] : null;
		$password1 = isset( $_POST['alt_senha'] ) ? $_POST['alt_senha'] : null;
		$password2 = isset( $_POST['conf_alt_senha'] ) ? $_POST['conf_alt_senha'] : null;

		$user = \Auth::user();

		$hashedCurrentPassword = \Hash::password( $senhaAtual );

		$errors = [];

		if ( $hashedCurrentPassword != $user->getPassword() )
		{
			$errors[] = "Senha atual incorreta"; 
		}

		if ( $password1 == null )
		{
			$errors[] = "é preciso introduzir uma nova senha";
		}

		if ( $password1 != $password2 )
		{
			$errors[] = "A confirmação da senha não coincide com a nova senha";
		}

		if ( count($errors) > 0)
		{
			return \View::make('user.control-panel', compact('user', 'errors') );
		}

		$hasChangedPassword = $user->changePassword( $password1 );

		if ( $hasChangedPassword )
		{
			$flashSuccessMessage[] = "Senha Alterada com sucesso!";
			return \View::make('user.control-panel', compact('user', 'flashSuccessMessage'));
		}
		else
		{
			$flashErrorMessage[] = "Erro ao alterar a senha!";
			return \View::make('user.control-panel', compact('user', 'flashErrorMessage'));
		}
	}
}