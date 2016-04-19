<?php
	global $wpalchemy_media_access;
	global $post;
	$type = get_post_meta($post->ID, '_campaign_findings_type', true);
?>
<ul class="nav nav-tabs" role="tablist">
	<li role="presentation" class="active"><a href="#general" aria-controls="home" role="tab" data-toggle="tab">General</a></li>
	<li role="presentation"><a href="#assets" aria-controls="assets" role="tab" data-toggle="tab">Campaign Assets</a></li>
	<li role="presentation"><a href="#participants" aria-controls="participants" role="tab" data-toggle="tab">Participants</a></li>
	<li class="pull-right">
		<div class="checkbox">
			<label>
				<?php $mb->the_field('active'); ?>
				<input type="checkbox" name="<?php $mb->the_name(); ?>" value="active"<?php $mb->the_checkbox_state('active'); ?>/>
				Campaign is Active
			</label>
		</div>
	</li>
</ul>

<div class="tab-content">
	<div role="tabpanel" class="tab-pane active" id="general">
			<?php include '_general.php'; ?>
	</div>

	<div role="tabpanel" class="tab-pane" id="assets">
			<?php include '_assets.php'; ?>
	</div>

	<div role="tabpanel" class="tab-pane" id="participants">
			<?php include '_participants.php'; ?>
	</div>
</div>
