<div class="form-section">
	<h2>Additional Notes</h2>
	<div class="form-group">
		<?php $mb->the_field('notes'); ?>
		<textarea class="ckeditor" id="additionalNotes" name="<?php $mb->the_name(); ?>" rows="3"><?php $mb->the_value(); ?></textarea>
	</div>
</div>
