<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Asking</title>

	<!-- Boostrap -->
	
	<link href="<?php getBaseURL() ?>/css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" href="<?php getBaseURL() ?>/css/style.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"  data-target="#navbar" aria-expanded="false" >
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button> 			
				<a class="navbar-brand" href="<?php echo getBaseURL(); ?>">Asking</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo getBaseURL(); ?>">Página Inicial</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				<?php if ( ( $user = Auth::user() ) != null): ?>
					<li><a href="<?php echo getBaseURL() ?>/painel-de-controle">Painel de Controle</a></li>

					<li><a href="<?php echo getBaseURL() ?>/logout">Sair</a></li>
				<?php else: ?>
					<li><a href="<?php echo getBaseURL() ?>/login">Login</a></li>

					<li><a href="<?php echo getBaseURL() ?>/cadastro">Cadastre-se</a></li>
				<?php endif; ?>
				</ul>
				
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	
	<div class="container">
		
		<?php 
			if ( isset( $viewName ) )
			{
				$path = viewsPath() . $viewName . '.php';
				if ( file_exists( $path ) )
				{
					require_once $path;
				}
			}
		 ?>
	</div><!-- /.container -->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php getBaseURL() ?>/js/bootstrap.min.js"></script>
</body>
</html>