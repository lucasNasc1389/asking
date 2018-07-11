<?php

namespace Models;

class Answer extends BaseModel
{
	protected $tableName = 'answers';

	protected $id;
	protected $user_id;
	public $user; // \Models\User object
	protected $question_id;
	protected $description;
	protected $created_at;
	protected $update_at;

	public function find( $value, $field = 'id', $fieldtype = \PDO::PARAM_STR )
	{
		parent::find( $value, $field, $fieldtype )

		$this->user = new \Models\User;
		$this->user->find( $this->user_id );
	}
}

