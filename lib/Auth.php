<?php
/**
 * Class para verificação de usuário logado e restrições de 
 * acesso
 */
class Auth
{
	/**
     * Retorna o usuário logado ou null se não estiver logado
     * @return mixed Objeto \Models\User do usuário logado ou 
     * null se não estiver logado
     */
	public static function user()
	{
		if ( ( $data = \Controllers\SessionsController::extractCookieInfo() ) != null)
			{
				$user = new \Models\User;
				$user->find( $data['id'] );

				return $user;
			}

			return null;
	}


 	/**
     * Caso exista o cookie de autenticação, verifica se o 
     * token é válido
     */
	public static function checkUser()
	{
		$user = self::user();

		if ( $user == null )
		{
			//remove o cookie
			\Controllers\SessionsController::destroySessionCookie();
		}
		else
		{
			$data = \Controllers\SessionsController::extractCookieInfo();

			$cookieToken = isset( $data['token']) ? $data['token'] : null;
			$dbToken = $user->getToken();

			if( $data == null || $cookieToken != $dbToken )
			{
				//remove o cookie
				\Controllers\SessionsController::destroySessionCookie();

				redirect( getBaseURL() );
			}
		}
	}


	/**
     * Se o usuário não estiver logado, redireciona para a 
     * página de erro
     */
	public static function denyNotLoggedInUsers()
	{
		if ( ( $user = self::user() ) == null )
		{
			redirect( getBaseURL() );
		}
	}
}