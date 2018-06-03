<?php

namespace Models;

class User extends BaseModel
{
	const STATUS_ACTIVE = 1;
	const STATUS_INACTIVE = 2;

	protected $tableName = 'users';

	protected $id;
	protected $name;
	protected $nickname;
	protected $email;
	protected $password;
	protected $token;
	protected $admin;
	protected $status;
	protected $created_at;
	protected $updated_at;

	public function generateToken()
	{
		$string = sprintf("%d%s%s", $this->id, $this->password, microtime( true ));
		$token  = md5( $string );

		$this->updateToken( $token );

		return $token;
	}


	public function updateToken( $token )
	{
		$this->token = $token;
		$now = date( 'Y-m-d H:i:s');

		$DB = new \DB;
		$sql = "UPDATE users SET token = :token, updated_at = :now WHERE id = :id";
		$stmt = $DB->prepare( $sql );
		$stmt->bindParam( ":token", $token );
		$stmt->bindParam( ":now", $now );
		$stmt->bindParam( ":id", $this->id, \PDO::PARAM_INT );

		$stmt->execute();
	}

	/**
	 *	Gets the value of nickname.
	 *	@return string	
	 */
		public function getNickname()
		{
			return $this->nickname;
		}

	/**
	 *	Sets the value of nickname.
	 *  @param string $nickname The nickname
	 */	
		public function setNickname($nickname)
		{
			$this->nickname = $nickname;
		}

	/**
	 * Gets the value of email.
	 *
	 *	@return string
	 */

	    public function getEmail()
	    {
	    	return $this->email;
	    }

	/**
	 * Sets the value of email.
	 * 
	 * @param string $email the email
	 */
       private function _setEmail($email)
       {
       		$this->email = $email;
       }

     /**
     * Gets the value of token.
     *
     * @return string
     */
       public function getToken()
    {
        return $this->token;
    }
 
    /**
     * Sets the value of token.
     *
     * @param string $token the token
     */
    private function _setToken($token)
    {
        $this->token = $token;
    }

    /**
     * Gets the vlue of admin
     *
     * @return bool
     */
    public function isAdmin()
    {
    	return (bool) $this->admin;
    }

    /**
     * Sets the value of admin.
     *
     * @param bool $admin the admin
     */
    private function _setAdmin($admin)
    {
    	$this->admin = $admin == 1 ? true : false;
    }

    /**
     * Gets the value of created_at.
     *
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }
 
    /**
     * Sets the value of created_at.
     *
     * @param DateTime $created_at the created at
     */
    private function _setCreatedAt(DateTime $created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * Gets the value of updated_at.
     *
     * @return DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
 
    /**
     * Sets the value of updated_at.
     *
     * @param DateTime $updated_at the updated at
     */
    private function _setUpdatedAt(DateTime $updated_at)
    {
        $this->updated_at = $updated_at;
    }
 
    /**
     * Gets the value of id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
 
    /**
     * Sets the value of id.
     *
     * @param int $id the id
     */
    private function _setId($id)
    {
        $this->id = (int) $id;
    }
 
    public function getPassword()
    {
        return $this->password;
    }
 
 
    /**
     * Gets the value of name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
 
    /**
     * Sets the value of name.
     *
     * @param string $name the name
     */
    private function _setName($name)
    {
        $this->name = $name;
    }
 
    /**
     * Gets the value of status.
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }
 
    /**
     * Sets the value of status.
     *
     * @param int $status the status
     */
    private function _setStatus($status)
    {
        $this->status = (int) $status;
    }









}