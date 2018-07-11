<div class="row">
	<h1><strong>Painel de Controle</strong></h1>
</div>

<div class="row">
	<h2><strong>Meus Dados</strong></h2>
</div>

<div class="row">
	<div class="col-md-2">
		<strong>Apelido:</strong>
	</div>

	<div class="col-md-10">
		<?php echo $user->getNickname() ?>
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		<strong>E-mail:</strong>
	</div>

	<div class="col-md-10">
		<?php echo $user->getEmail() ?>
	</div>
</div>

<div class="row">
	<h2><strong>Alterar Senha</strong></h2>

<?php if ( isset( $errors ) && count( $errors ) > 0 ): ?>
    <div class="alert alert-danger">
        <ul>
        <?php foreach ( $errors as $error ): ?>
            <li>
                <?php echo $error; ?>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="row">
	<form action="<?php echo getBaseURL() ?>/alterar-senha" method="post" class="form-horizontal">

		<div class="form-group">
			<div class="col-md-3">
				<label for="senha_atual"><strong>Senha atual:</strong></label>
			</div>
			<div class="col-md-9">
				<input type="password" name="senha_atual" id="senha_atual" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-3">
				<label for="alt_senha"><strong>Nova senha:</strong></label>
			</div>
			<div class="col-md-9">
				<input type="password" name="alt_senha" id="alt_senha" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-3">
				<label for="conf_alt_senha"><strong>Confirme a nova senha:</strong></label>
			</div>
			<div class="col-md-9">
				<input type="password" name="conf_alt_senha" id="conf_alt_senha" class="form-control">
			</div>
		</div>

		<?php echo CSRF::GenerateHiddenFormInput()?>

		<div class="form-group">
			<div class="col-md-3">
				
			</div>

			<div class="col-md-9">
				<input type="submit" class="btn btn-primary" value="Alterar senha">
			</div>
		</div>
	</form>

<?php if ( isset( $flashSuccessMessage ) && count( $flashSuccessMessage ) > 0 ): ?>
	<div class="alert alert-success">
		<?php foreach( $flashSuccessMessage as $flashSuccessMessages ): ?>
			<?php echo $flashSuccessMessages ?>
		<?php endforeach;?>
	</div>
<?php endif; ?>

<?php if ( isset ( $flashErrorMessage ) && count( $flashErrorMessage ) > 0 ): ?>
	<div class="alert alert-danger">
		<?php foreach( $flashErrorMessage as $flashErrorMessages ): ?>
			<?php echo $flashErrorMessages; ?>
		<?php endforeach; ?>
	</div>
<?php endif; ?>

</div>