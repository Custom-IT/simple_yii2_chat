<?php foreach ($messages as $message): ?>
	<?php if ($message->session === Yii::$app->session->id): ?>
		<?= $this->render("outmessage", [
			"message" => $message,
		]); ?>
	<?php else: ?>
		<?= $this->render("inmessage", [
			"message" => $message,
		]); ?>
	<?php endif ?>
<?php endforeach ?>
<div style="height: 11px"></div>
