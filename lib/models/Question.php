<?php

namespace Models;

class Question extends BaseModel
{
	protected $tableName = 'questions';

	protected $id;
	protected $user_id;
	public $user; // \Models\User object
	protected $title;
	protected $description;
	protected $created_at;
	protected $updated_at;

	public function find( $value, $field = 'id', $fieldtype = \PDO::PARAM_STR )
	{
		parent::find( $value, $field, $fieldtype);

		$this->user = new \Models\User;
		$this->user->find( $this->user_id );
	}

	public static function all() 
	{
		$DB = new \DB;
		$sql =  "SELECT u.nickname, q.id, q.title, q.description, q.created_at FROM users u INNER JOIN questions q ON q.user_id = u.id ORDER BY q.created_at DESC";
		$stmt = $DB->prepare( $sql );
		$stmt->execute();

		$rows = $stmt->fetchAll( \PDO::FETCH_OBJ );

		foreach ( $rows as $row )
		{
			$row->user = new \Models\User;
			$row->user->setNickname( $row->nickname );
		}

		return $rows;
	}


	/**
	 * Gets the value of id
	 *
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Sets the value of id
	 *
	 * @param int $id the id
	 */
	protected function setId( $id )
	{
		$this->id = $id;
	}

	/**
	 * Gets the value of user_id
	 *
	 * @return int
	 */
	public function getUserId()
	{
		return $this->user_id;
	}

	/**
	 * Sets the value of user_id
	 *
	 * @param int $user_id the user id
	 */
	protected function setUserId( $user_id )
	{
		$this->user_id = $user_id;
	}


	/**
	 * Gets the value of title
	 *
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Sets the value of title
	 *
	 * @param string $title the title
	 */
	protected function setTitle( $title )
	{
		$this->tilte = $title;
	}

	/**
	 * Gets the value of description
	 *
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Sets the value of description
	 *
	 * @param string $descripition the description
	 */
	protected function setDescription( $description )
	{
		$this->description = $description;
	}
}