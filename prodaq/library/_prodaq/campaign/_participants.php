<div class="form-section">
	<h4>Participants interviewed in  <?php echo the_title(); ?></h4>
	<div class="participants">
		<ul class="participants__list">

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
			$participantArr = array();
			$participantCount = 0;


			if( $my_query->have_posts() ) {
				while ($my_query->have_posts()) : $my_query->the_post();
					$meetings = get_post_meta($post->ID, '_participant_meetings', true);

					// for each meeting, if a interview campaign matches this one, add to the array
					foreach($meetings as $meeting){
						if($meeting['interview_campaign'] == $real_post->ID){

							// since this is only for search purposes, storing more complex value to hit more queries to link to campaign.. must use explode() or strtok() in order to get just name for grabbing post
							$name = $post->post_title;
							$company = get_post_meta($post->ID, '_participant_company', true);
							$title = get_post_meta($post->ID, '_participant_title', true);
							$value = $name . ' - ' . $company . ' - ' . $title;
							if(!(in_array($value, $participantArr))){
								array_push($participantArr, $value);
								$participantCount ++;

								echo '<li>
									<a href="post.php?post=' . $post->ID . '&action=edit">' . $name . '</a>
									<p>' . $company . ' - ' . $title . '</p>
									</li>';
								if($participantCount % 20 === 0){
									echo '</ul><ul class="participants__list">';
								}
							}
						}
					}
				?>

				<?php	endwhile;
			}
			wp_reset_query();
			$post = $real_post;
			update_post_meta($post->ID, '_campaign_participants', $participantArr);
		?>
		</ul>
	</div>
</div>
