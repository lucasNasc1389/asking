<?php 
/**
 * Class para proteção contra XSS
 */

class XSS
{
	/**
     * Filtra uma string para evitar XSS
     * @param  string $data String a ser filtrada
     * @return string  String filtrada
     */
	public static function filter( $data )
	{
		return htmlspecialchars( $data );
	}

}
?>