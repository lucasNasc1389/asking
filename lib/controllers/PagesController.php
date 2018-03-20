<?php

namespace Controllers;

class PagesController
{
	public static function home()
	{
		\view::make( 'home' );
	}
}