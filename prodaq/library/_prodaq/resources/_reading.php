<div class="form-section">
	<h2>Reading</h2>
	<div class="form-group">
		<label>Summary</label>
		<?php $mb->the_field('reading_summary'); ?>
		<textarea class="ckeditor" name="<?php $mb->the_name(); ?>" rows="3"><?php $mb->the_value(); ?></textarea>
	</div>
	<?php while($mb->have_fields_and_multi('readings')): ?>
	<?php $mb->the_group_open(); ?>
		<div class="ndaq-repeatable">
			<div class="ndaq-repeatable__header">
				<div class="form-group">
					<?php $mb->the_field('title'); ?>
					<input placeholder="Title" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
				</div>

				<a href="#" class="dodelete icon">delete</a>
			</div>
			<div class="ndaq-repeatable__body">
				<div class="form-group">
					<label>Description</label>
					<?php $mb->the_field('description'); ?>
					<textarea name="<?php $mb->the_name(); ?>" rows="5"><?php $mb->the_value(); ?></textarea>
				</div>

				<div class="form-group upload-inline">
					<label>File or URL</label>
					<?php $mb->the_field('link'); ?>
					<?php $wpalchemy_media_access->setGroupName('clip-n'. $mb->get_the_index())->setInsertButtonLabel('Insert Asset'); ?>
					<?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
					<?php echo $wpalchemy_media_access->getButton(array('label' => 'Add Asset From Library')); ?>
				</div>
			</div>
		</div>
	<?php $mb->the_group_close(); ?>
	<?php endwhile; ?>

	<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-readings button">Add Reading</a></p>
</div>
