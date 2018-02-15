<div class="form-section">
		<div class="form-group">
			<?php $mb->the_field('participants', WPALCHEMY_FIELD_HINT_SELECT_MULTI); ?>
			<label>Participant</label>
			<select name="<?php $mb->the_name(); ?>" class="selectnice" multiple>
				<?php
					global $post;
					$real_post = $post;
					$args = array(
						'post_type' => 'participant',
						'post_status' => 'publish',
						'orderby'=> 'title',
						'order' => 'ASC',
						'posts_per_page' => -1,
						'caller_get_posts'=> 1
					);
					$my_query = null;
					$my_query = new WP_Query($args);
					if( $my_query->have_posts() ) {
						//fuck yeah. $post->ID worked and get_the_ID() and variables didn't.. took me way to long to figure out despite both being valid... perhaps one not being speicifc to global post vs this post
						while ($my_query->have_posts()) : $my_query->the_post();
						$name = $post->post_title;
						$company = get_post_meta($post->ID, '_participant_company', true);
						// since this is only for search purposes, storing more complex value to hit more queries to link to campaign.. must use explode() or strtok() in order to get just name for grabbing post
						$value = $name . ' - ' . $company;
						?>
							<option value="<?php echo $value; ?>"<?php $mb->the_select_state($value); ?>><?php echo $post->post_title; ?></option>
						<?php	endwhile;
					}
					wp_reset_query();
					$post = $real_post;
				?>
			</select>
		</div>
		<div class="form-group">

			<label>Quotes</label>
			<?php
			$participants = get_post_meta( $post->ID, '_report_participants', true );
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
				echo '<p><em>Please select participants above and <strong>save</strong> the report before selecting quotes.</em></p>';
			}
			?>
		</div>
</div>
