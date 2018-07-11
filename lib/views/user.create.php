<div class="row">
	<div class="text-center">
		<h1>Crie a sua conta no Asking</h1>
	</div>
</div>

<?php if( isset( $errorMessages ) && count( $errorMessages ) > 0 ): ?>
<div class="row">
	<div class="alert alert-danger">
		<ul>
			<?php foreach ( $errorMessages as $error): ?>
				<li>
					<?php echo $error ?>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
<?php endif; ?>

<div class="row">
	<div class="col-xs-12">
		<p>Preencha o formulário abaixo com seus dados para criar a sua conta</p>
	</div>
</div>

<div class="row">
	<form method="post" action="<?php echo getBaseURL() ?>/cadastro_salvar" class="form-horizontal">
		<div class="form-group">
			<div class="col-md-3">
				<label for="nickname">Apelido</label>
				<br>
				<small>Nome de exibição a ser usado no fórum</small>
			</div>
			<div class="col-md-9">
				<input type="text" name="nickname" id="nickname" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-3">
				<label for="email">Email</label>
			</div>
			<div class="col-md-9">
				<input type="email" name="email" id="email" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-3">
				<label for="password">Senha</label>
			</div>
			<div class="col-md-9">
				<input type="password" name="password" id="senha" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-3">
				<label for="confirm-password">confirme a senha</label>
			</div>
			<div class="col-md-9">
				<input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
			</div>
		</div>
		
		<?php echo \CSRF::GenerateHiddenFormInput()?>

		<div class="form-group">
			<div class="col-md-3">
				
			</div>
			<div class="col-md-9">
				<input type="submit" value="Criar Conta" class="btn btn-primary">
			</div>
		</div>	

		
	</form>
</div>