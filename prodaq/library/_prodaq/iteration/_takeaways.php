<div class="form-section">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<?php $mb->the_field('takeaway'); ?>
				<label>General Takeaways</label>
				<textarea id="generalNotes" class="ckeditor" rows="3" name="<?php $mb->the_name(); ?>" rows="5"><?php $mb->the_value(); ?></textarea>
			</div>
			<div class="form-group">
				<label>Supporting Quotes/Feedback</label>
				<?php
				$participants = get_post_meta( $post->ID, '_iteration_participants', true );
				if(!empty($participants)){
					$mb->the_field('quotes', WPALCHEMY_FIELD_HINT_SELECT_MULTI); ?>
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
					echo '<p><em>Please select participants in the first tab and <strong>save</strong> the report before selecting quotes.</em></p>';
				}
				?>
			</div>


		</div>
	</div>
</div>
