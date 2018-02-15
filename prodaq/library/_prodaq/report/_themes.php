<div class="form-section">
	<div class="row">
		<?php while($mb->have_fields_and_multi('themes')): ?>
		<?php $mb->the_group_open(); ?>
			<div class="col-md-4">
				<div class="grid-repeatable">
					<div class="form-group">
						<label>Theme</label>
						<?php $mb->the_field('theme'); ?>
						<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
					</div>
					<div class="form-group">
						<?php $mb->the_field('description'); ?>
						<label>Description</label>
						<textarea name="<?php $mb->the_name(); ?>" rows="5"><?php $mb->the_value(); ?></textarea>
					</div>
					<a href="#" class="dodelete icon">delete</a>
				</div>
			</div>
		<?php $mb->the_group_close(); ?>
		<?php endwhile; ?>

		<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-themes button">Add Theme</a></p>

	</div>
</div>
