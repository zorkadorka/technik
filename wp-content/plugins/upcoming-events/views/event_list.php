<h2><?= $instance['title'] ?></h2>
<ul>
<?php 
$c = 0;
foreach ($list as $event): 
	if($c < 3 && (date_create($event->EventStartDate) >= new DateTime("now")) ) :
	$c++;
	?>
		<li>
			<a href="<?= $event->guid ?>" class="event-item">
			<?= date_create($event->EventStartDate)->format('d. m. Y') ?> - <?= $event->post_title; ?>
			</a>
		</li>
<?php 
	endif;
endforeach; 
?>
</ul>