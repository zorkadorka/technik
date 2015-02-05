<h2><?= $instance['title'] ?></h2>
<ul>
<?php 
$c = 0;
foreach ($list as $event): 
	if($c < 3 && (date_create($event->EventStartDate) >= new DateTime("now")) ) :
	$c++;
	?>
		<li>
			<?php if (is_user_logged_in() ): ?>
				<a href="<?= $event->guid ?>" class="event-item">
				<?= date_create($event->EventStartDate)->format('d. m. Y') ?> - <?= $event->post_title; ?>
				</a> 
			<?php else: ?>
			 	<?= date_create($event->EventStartDate)->format('d. m. Y') ?> - <?= $event->post_title; ?>
			<?php endif?>
		</li>
<?php 
	endif;
endforeach; 
?>
</ul>