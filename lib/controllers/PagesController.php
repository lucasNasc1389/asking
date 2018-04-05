<?php

namespace Controllers;

class PagesController
{
	public static function home()
	{
		\View::make( 'home' );
	}
}