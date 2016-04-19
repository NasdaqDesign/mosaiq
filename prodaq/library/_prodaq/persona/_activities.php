<div class="form-section">
	<div class="row">
		<div class="col-md-6">
			<h2>Activities</h2>
			<?php while($mb->have_fields_and_multi('activities')): ?>
			<?php $mb->the_group_open(); ?>
			<div class="goal-repeatable">
				<div class="form-group">
					<label>Activity</label>
					<a href="#" class="dodelete icon">delete</a>
					<?php $mb->the_field('activity'); ?>
					<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
				</div>
			</div>
			<?php $mb->the_group_close(); ?>
			<?php endwhile; ?>

			<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-activities button">Add Activity</a></p>
		</div>
		<div class="col-md-6">
			<h2>Connections</h2>
			<div class="form-group">
				<?php $mb->the_field('connections'); ?>
				<textarea class="ckeditor-repeatable" id="personaConnections" name="<?php $mb->the_name(); ?>" rows="3"><?php $mb->the_value(); ?></textarea>
			</div>

		</div>
	</div>
</div>
