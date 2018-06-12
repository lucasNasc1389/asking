<?php 

class XSS
{
	public static function filter( $data )
	{
		return htmlspecialchars( $data );
	}

}
?>