<?php
/*
	Verifica se o ambiente atual é de desenvolvimento
  	@return boolean Retorna TRUE se for ambiente de desenvolvimento, FALSE caso contrário
*/

  	function isDevEnv() {
  		return ENV == 'dev';
  	}


 /*
   Retorna o caminho para o diretório com as views
   @return string caminho para o diretório com as views
 */ 

 function viewsPath() {
 	return APP_ROOT_PATH . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR;
 }

/**
   Retorna o caminho para o diretório de logs
   @return string caminho para o diretório de logs
 */
function logsPath() {
	return APP_ROOT_PATH . DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR; 
}

/**
   Retorna a URL base da aplicação
   @return string URL base da aplicação
 */

   function getBaseURL() {
   	return sprintf(
   		"%s://%s%s",
   		isset( $_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
   		$_SERVER['SERVER-NAME'],
   		$SERVER['SERVER-PORT'] == 80 ? '' : ':' . $SERVER['SERVER_PORT']
   	 );	
   }


/**
   Retorna a URL atual
   @return string URL atual
 */

function getCurrentURL() {
	return getBaseURL() . $_SERVER['REQUEST_URI'];
}

/**
   Função de redirecionamento HTTP
   @param  string $url URL de destino
 */
function redirect( $url ) {
	header( 'Location: ' . $url);
	exit;
}
