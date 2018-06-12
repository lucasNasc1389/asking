<div class="row">
	<h1><?php echo \XSS::filter( $question->getTitle() ) ?></h1>
</div>

<div class="row">
	<br><br>
	<p><em>Pergunta feita por <?php echo \XSS::filter( $question->user->getNickname() ) ?>, em <?php echo $question->getCreatedAt()->format( 'd/m/Y') ?></em></p>
</div>

<div class="row">
	<br><br>
	<?php echo nl2br( \XSS::filter( $question->getDescription() ) ) ?>
</div>