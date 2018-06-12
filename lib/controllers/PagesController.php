<?php

namespace Controllers;

class PagesController
{
	public static function home()
	{
		//busca o usuário logado ( ou null se não estiver logado)
		$user = \Auth::user();

		//busca lista de perguntas
		$questions = \Models\Question::all();
		
		\View::make( 'home', compact( 'user', 'questions') );
	}
}