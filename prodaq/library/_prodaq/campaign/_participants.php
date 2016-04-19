<div class="form-section">
	<p><em>Long story short, we still need to pull in participants here in order for campaigns to be searchable by participant.</em></p>
	<div class="form-group">
		<?php $mb->the_field('participants', WPALCHEMY_FIELD_HINT_SELECT_MULTI); ?>
		<label>Participants</label>
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
					while ($my_query->have_posts()) : $my_query->the_post();
						$name = $post->post_title;
						$company = get_post_meta($post->ID, '_participant_company', true);
						$title = get_post_meta($post->ID, '_participant_title', true);
						// since this is only for search purposes, storing more complex value to hit more queries to link to campaign.. must use explode() or strtok() in order to get just name for grabbing post
						$value = $name . ' - ' . $company . ' - ' . $title;
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
