<?php
/**
 * Classe para proteção contra CSRF
 */
class CSRF
{
	/**
     * Nome do campo oculto do formulário que receberá o 
     * token gerado
     */
	const HIDDEN_FORM_INPUT_NAME = "_token";

	/**
     * Nome da variável de sessão onde será armazenado o 
     * token gerado
     */
	const SESSION_KEY_NAME = "_csrf_token";

	/**
     * Gera um token
     */
	public static function GenerateToken() 
	{
		$token = md5( uniqid(microtime( true ) ) );

		if ( isset( $_SESSION ) )
		{
			$_SESSION[self::SESSION_KEY_NAME] = $token;
		}

		return $token;
	}


	/**
     * Gera o HTML do campo oculto do formulário, com um 
     * valor válido para o token
     * @return string String HTML do campo oculto
     */
	public static function GenerateHiddenFormInput()
	{
		$token = self::GenerateToken();

		$input = '<input type="hidden" name="' . self::HIDDEN_FORM_INPUT_NAME . '" value="'. $token . '">';

		return $input;
	}


	/**
     * Compara os tokens da sessão e do POST. Se forem 
     * diferentes, é uma tentativa de ataque CSRF.
     */
	public static function Check()
	{
		$postedToken = isset( $_POST[self::HIDDEN_FORM_INPUT_NAME] ) ? $_POST[self::HIDDEN_FORM_INPUT_NAME] : null;
		$SessionToken =  isset( $_SESSION[self::SESSION_KEY_NAME] ) ? $_SESSION[self::SESSION_KEY_NAME] : null;

		// remove o token da sessão, pois só deve ser usado uma vez
        $_SESSION[self::SESSION_KEY_NAME] = null;

        if ( $postedToken != $SessionToken )
        {
            echo "Tentativa de ataque por CSRF";
            exit;
        }
	}

}