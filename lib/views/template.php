<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Ask?ng</title>

	<!-- Boostrap -->
	<link rel="stylesheet" href="<?php getBaseURL() ?>/css/bootstrap.min.css">

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
				<button type="button" class="navbar-toggle collapsed" data-toggle="#navbar" aria-controls="navbar">
					<span class="sr-only">Togge navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="<?php echo"getBaseURL();" ?>" class="navbar-brand">Ask?ng</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navber-nav">
					<li><a href="<?php echo getBaseURL(); ?>Página Inicial"></a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo getBaseURL()?>/login">Login</a></li>
					<li><a href="<?php echo getBaseURL()?>/cadastro">Cadastre-se</a></li>
				</ul>
				
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	
	<div class="container">
		
		<?php 
			if ( isset( $viewName ) )
			{
				$path = viewPath() . $viewName . '.php';
				if ( file_exists( $path ) )
				{
					require_once $path;
				}
			}
		 ?>
	</div><!-- /.container -->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php getBaseURL() ?>/js/jquery-1.11.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php getBaseURL() ?>/js/bootstrap.min.js"></script>
</body>
</html>