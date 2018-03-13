<?php 
 require_once "init.php";

 $name 	       = 'Administrador Geral';
 $nickname     = 'Asking Admin';
 $email    	   = 'admin@asking.com.br';
 $password 	   = 'admin';
 $passwordHash = Hash::password( $password );
 $status       = 1;
 $admin        = 1;
 $date 		   = date( 'Y-m-d H:i:s' );

 $sql = "INSERT INTO users(name, nickname, email, password, status, admin, created_at, updated_at) VALUES(:name, :nickname, :email, :password, :status, :admin, :created_at, :updated_at)";

 $DB = new DB;
 $stmt = $DB->prepare( $sql );

 $stmt->bindParam( ':name', $name );
 $stmt->bindParam( ':nickname', $nickname );
 $stmt->bindParam( ':email', $email );
 $stmt->bindParam( ':password', $passwordHash );
 $stmt->bindParam( ':status', $status, PDO::PARAM_INT );
 $stmt->bindParam( ':admin', $admin );
 $stmt->bindParam( ':created_at', $date );
 $stmt->bindParam( ':updated_at', $date );

 if ( $stmt->execute() ) {
 	echo "Usuário criado com sucesso";
 
 }else {
 	echo "Erro ao criar usuário admin";
 	echo "<br><br>";
 	$error = $stmt->errorInfo();
 	echo $error[2];
 }
