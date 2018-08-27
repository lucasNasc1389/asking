<?php
/**
 * Classe estendida da classe PDO para manipulação do banco de dados
 */

class DB extends \PDO
{
	/**
     * Sobrescreve o construtor da classe PDO, para usar 
     * MySQL, com as configurações definidas em config/
     * database.php
     */
	public function __construct( $dsn = null, $username = null, $password = null, $options = array() )
	{
		$dsn = ( $dsn != null ) ? $dsn : sprintf('mysql:dbname=%s;host=%s', MYSQL_DBNAME, MYSQL_HOST );
		$username = ( $username != null ) ? $username : MYSQL_USER;
		$password = ( $password != null ) ? $password : MYSQL_PASS;

		parent::__construct( $dsn, $username, $password, $options );

	} 

}