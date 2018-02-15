
<?php while($mb->have_fields_and_multi('images')): ?>
<?php $mb->the_group_open(); ?>
	<div class="form-section">
	<?php
		$annotations = get_post_meta($post->ID, '_report_annotation_array', true);
	?>
	<div class="form-group">
		<label>Title</label>
		<?php $mb->the_field('title'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	</div>
	<div class="form-group upload-inline">
		<label>Annotation Image</label>
		<?php $mb->the_field('image'); ?>
		<?php $wpalchemy_media_access->setGroupName('clip-n'. $mb->get_the_index())->setInsertButtonLabel('Insert Image'); ?>
		<?php echo $wpalchemy_media_access->getField(array('class' => 'has-wrapper', 'name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
		<?php echo $wpalchemy_media_access->getButton(array('label' => 'Upload')); ?>

		<div class="preview-wrapper">
			<?php
			$preview_img = get_post_meta( $post->ID, '_report_image', true );
			if(!empty($preview_img)){
				echo '<img src="' . $preview_img . '" height="auto" width="100%">';
			}
			?>
		</div>

		<?php $mb->the_field('annotation_array'); ?>
		<input style="width: 100%;" class="annotationArr" readonly name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	</div>
	<div class="form-group">

		<label>Quotes</label>
		<?php
		$participants = get_post_meta( $post->ID, '_report_participants', true );
		if(!empty($participants)){
			$mb->the_field('annotation_quotes', WPALCHEMY_FIELD_HINT_SELECT_MULTI); ?>
			<select name="<?php $mb->the_name(); ?>" class="quoteFormat" multiple>

			<?php foreach($participants as $participant){
				$participant = strtok($participant, '-');
				$participantinfo = get_page_by_title($participant, OBJECT, 'participant');
				$quotes = get_post_meta($participantinfo->ID, '_participant_quotes', TRUE);

				foreach($quotes as $quote){
					$text = $quote['quote'];
					$value = $text . ' - ' . $participant;
					?>

					<option title="<?php echo $participant; ?>" value="<?php echo $value; ?>"<?php $mb->the_select_state($value); ?>><?php echo $text; ?></option>
				<?php }
			}?>
			</select>
		<?php }
		else{
			echo '<p><em>Please select participants in the participants tab and <strong>save</strong> the report before selecting quotes.</em></p>';
		}
		?>
	</div>
	<a href="#" class="dodelete icon">delete</a>
</div>
<?php $mb->the_group_close(); ?>
<?php endwhile; ?>

<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-images button">Add Image to Annotate</a></p>
