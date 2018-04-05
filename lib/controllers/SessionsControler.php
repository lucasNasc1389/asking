<?php

namespace Controllers;

class SessionsController
{
	public static function login()
	{
		if ( $_SERVER['REQUEST_METHOD'] == 'POST')
		{
			self::processLoginForm();
		}
		else
		{
			self::showLoginForm();
		}
	}

	protected static function showLoginForm()
	{
		\View::make( 'login' );
	}

	protected static function processLoginForm()
	{
		
	}
}