<?php

namespace Controllers;

class QuestionsController
{
	public static function create()
	{
		\View::make( 'question.create' );
	}
}