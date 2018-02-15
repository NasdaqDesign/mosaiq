<?php
	global $wpalchemy_media_access;
	global $post;
	$type = get_post_meta($post->ID, '_iteration_type', true);
?>

<div class="iteration__header">
	<div class="form-group">
		<label>Is this an element/view or the Next Steps for this iteration?</label>
		<?php $mb->the_field('type'); ?>
		<select class="selectnice" id="iteration-type" name="<?php $mb->the_name(); ?>">
			<option value=""></option>
			<option value="intro"<?php $mb->the_select_state('intro'); ?>>Introduction</option>
			<option value="element"<?php $mb->the_select_state('element'); ?>>Element</option>
			<option value="next"<?php $mb->the_select_state('next'); ?>>Next Steps</option>
		</select>
	</div>
	<a class="help" href="#" data-toggle="modal" data-target="#iteration-help"><i class="fa fa-question"></i></a>
</div>


<div class="iteration__pane iteration__element <?php if(!empty($type) && $type == 'element'){echo 'active'; } ?>">
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#approach" aria-controls="approach" role="tab" data-toggle="tab">Goals, Approach, Participants</a></li>
		<li role="presentation"><a href="#images" aria-controls="images" role="tab" data-toggle="tab">Images</a></li>
		<li role="presentation"><a href="#takeaways" aria-controls="takeaways" role="tab" data-toggle="tab">Takeaways</a></li>
	</ul>

	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="approach">
			<?php include '_approach.php'; ?>
		</div>
		<div role="tabpanel" class="tab-pane" id="images">
			<?php include '_images.php'; ?>
		</div>
		<div role="tabpanel" class="tab-pane" id="takeaways">
				<?php include '_takeaways.php'; ?>
		</div>

	</div>
</div>
<div class="iteration__pane iteration__next <?php if(!empty($type) && $type == 'next'){echo 'active'; } ?>">
	<div class="form-section">
		<h2>Next Steps</h2>
		<div class="form-group">
			<?php $mb->the_field('next'); ?>
			<textarea id="nextSteps" class="ckeditor" rows="3" name="<?php $mb->the_name(); ?>" rows="5"><?php $mb->the_value(); ?></textarea>
		</div>
	</div>
</div>
<div class="iteration__pane iteration__intro <?php if(!empty($type) && $type == 'intro'){echo 'active'; } ?>">
	<div class="form-section">
		<h2>Introduction</h2>
		<p><em>Only categorize this under the parent story, not under a specific iteration.</em></p>
		<div class="form-group">
			<?php $mb->the_field('intro'); ?>
			<textarea id="intro" class="ckeditor" rows="3" name="<?php $mb->the_name(); ?>" rows="5"><?php $mb->the_value(); ?></textarea>
		</div>
	</div>
</div>
<?php include '_iteration-help.php'; ?>
