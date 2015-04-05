<h2><a href="<?= tribe_get_listview_link() ?>"><?= $instance['title'] ?></a></h2>
<ul>
<?php 
$c = 0;
foreach ($list as $event):
	
	if($c < 3 ): 
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