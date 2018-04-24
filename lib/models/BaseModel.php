<?php

namespace Models;

class BaseModel
{
	protected $tableName = null;

	public function find( $value, $field = 'id', $fieldType = \PDO::PARAM_STR )
	{
		if ( ! isset( $this->tableName ) || empty( $this->tableName ) )
		{
			return null;
		}

		$DB = new \DB;
		$sql = sprintf( "SELECT * FROM %s WHERE %s = :value", $this->tableName, $field );
		$stmt = $DB->prepare( $sql );
		$stmt->bindParam( ':value', $value, $fieldType );
		$stmt->execute();

		$rows = $stmt->fetchAll( \PDO::FETCH_ASSOC );

		if ( count( $rows ) <= 0 )
		{
			return null;
		}

		$model =$rows[0];

		foreach ( $model as $modelField => $modelValue )
		{
			$this->{$modelField} = $modelValue;	
		}

		return $this;
	}

	public function getCreatedAt()
	{
		if ( ! $this->created_at instanceof \DateTime )
		{
			$this->created_at = new \DateTime( $this->created_at );
		}

		return $this->created_at;
	}

	protected function setCreatedAt( \Datetime $created_at )
	{
		$this->created_at = $created_at;
	}

	 public function getUpdatedAt()
    {
        if ( ! $this->updated_at instanceof \DateTime )
        {
            $this->updated_at = new \DateTime( $this->updated_at );
        }
         
        return $this->updated_at;
    }
 
    protected function setUpdatedAt( \DateTime $updated_at )
    {
        $this->updated_at = $updated_at;
    }

}