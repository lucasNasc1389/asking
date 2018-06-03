<?php

class Auth
{
	public static function user()
	{
		if ( ( $data = \Controllers\SessionsController::extractCookieInfo() ) != null)
			{
				$user = new \Models\User;
				$user->find( $data[ 'id '] );

				return $user;
			}

			return null;
	}

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
}