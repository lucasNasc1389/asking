<?php 

class Hash
{
	protected static $passwordHashAlg = 'sha512';

	public static function password( $str )
	{
		// concatenando o salt à string original
		$str .= PASSWORD_SALT;

		return hash( static::$passwordHashAlg, $str );
	}
}