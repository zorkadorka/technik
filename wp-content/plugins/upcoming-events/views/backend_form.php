<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Nadpis:'); ?></label>
	<input id="<?php echo $this->get_field_id('title'); ?>" 
		   name="<?php echo $this->get_field_name('title'); ?>" 
	   	   type="text"
	   	   value="<?php echo esc_attr($title); ?>">

	<br>

 <input id="<?php echo $this->get_field_id('type') ?>" 
 				type="radio" 
				name="<?php echo $this->get_field_name('type'); ?>" 
				value="vystupenie"
				<?php if ($type == 'vystupenie') echo "checked";?>
				> Vystúpenia
 <br>
 <input id="<?php echo $this->get_field_id('type') ?>" 
 				type="radio" 
 				name="<?php echo $this->get_field_name('type'); ?>" 
 				value="trening"
 				<?php if ($type == 'trening') echo "checked"; ?>
 				> Tréningy

 	<br>
 	<input type="checkbox"
 				id="<?php echo $this->get_field_id('logged_only') ?>" 
 				name="<?php echo $this->get_field_name('logged_only'); ?>" 
 				value="true"
 				<?php if ($logged_only == 'true') echo "checked"; ?>> Iba pre prihlásených
</p>