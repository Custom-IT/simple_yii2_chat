<?php
	use yii\bootstrap\Html;
?>
<div class="row in-message">
	<div class="col-xs-11">
		<div>
			<span class="message-header"><?= HTML::encode($message->lastname).' '.HTML::encode($message->firstname); ?></span>
			<p class="message-content"><?= HTML::encode($message->message); ?></p>
		</div>
	</div>
</div>