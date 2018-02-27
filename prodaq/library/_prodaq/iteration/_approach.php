<div class="form-section">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<?php $mb->the_field('approach'); ?>
				<label>Project Approach</label>
				<textarea id="projectApproach" class="ckeditor" rows="3" name="<?php $mb->the_name(); ?>" rows="5"><?php $mb->the_value(); ?></textarea>
			</div>
			<div class="form-group">
				<?php $mb->the_field('participants', WPALCHEMY_FIELD_HINT_SELECT_MULTI); ?>
				<label>Participants</label>
				<p><em>Select Participants in order to access quotes for images and takeaways.</em></p>
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
		</div>
	</div>
</div>
