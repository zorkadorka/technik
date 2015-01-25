<h2><?= $instance['title'] ?></h2>
<ul>
<?php foreach ($list as $event): ?>
	<li>
		<a href="<?= $event->guid ?>" class="event-item">
		<?= date_create($event->EventStartDate)->format('d. m. Y') ?> - <?= $event->post_title ?>
		</a>
	</li>
<?php endforeach; ?>
</ul>