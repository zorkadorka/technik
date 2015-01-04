
<h1><?= $instance['title'] ?></h1>
<ul>
<?php foreach ($list as $event): ?>
	<li>
		<?= date_create($event->EventStartDate)->format('d. m. Y') ?> - <?= $event->post_title ?>
	</li>
<?php endforeach; ?>
</ul>