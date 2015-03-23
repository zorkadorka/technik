<h2><a href="<?= tribe_get_listview_link() ?>"><?= $instance['title'] ?></a></h2>
<ul>
<?php 
$c = 0;
foreach ($list as $event):
	
	if($c < 3 ): //&& (date_create($event->EventStartDate) >= new DateTime("now")) ) :
	$c++;
	
	?>
		<li>
			<?php/* if (is_user_logged_in() ): */?>
				<a href="<?= $event->guid ?>" class="event-item">
				<?= date_create($event->EventStartDate)->format('d. m. Y') ?> - <?= $event->post_title; ?>
				</a> 
			<?php /*else: ?>
				<a href="<?php echo get_page_link(566); ?>" class="event-item" >
			 	<?= date_create($event->EventStartDate)->format('d. m. Y') ?> - <?= $event->post_title; */?>
			<?php /*endif*/?>
		</li>
<?php 
	endif;
endforeach; 
?>
</ul>