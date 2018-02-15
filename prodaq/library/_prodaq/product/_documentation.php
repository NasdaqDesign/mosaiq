<h2>Documentation</h2>
<?php while($mb->have_fields_and_multi('docs')): ?>
<?php $mb->the_group_open(); ?>
	<div class="asset-repeatable form-inline">
		<div class="form-group asset-repeatable__title">
			<label>Title</label>
			<?php $mb->the_field('title'); ?>
			<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		</div>
		<div class="form-group upload-inline">
			<label>File</label>
			<?php $mb->the_field('document'); ?>
			<?php $wpalchemy_media_access->setGroupName('clip-n'. $mb->get_the_index())->setInsertButtonLabel('Insert Report'); ?>
			<?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
			<?php echo $wpalchemy_media_access->getButton(array('label' => 'Add Asset From Library')); ?>
		</div>
		<a href="#" class="dodelete icon">delete</a>
	</div>
<?php $mb->the_group_close(); ?>
<?php endwhile; ?>

<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-docs button">Add Asset</a></p>
