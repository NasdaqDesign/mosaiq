<div class="form-section">
	<div class="form-group">
		<div class="participants">
			<h4>Participants based on <?php echo the_title(); ?></h4>
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
						$primary = get_post_meta($post->ID, '_participant_primary_persona', true);

						// for each meeting, if a interview campaign matches this one, add to the array

						if($primary == $real_post->ID){
							$participantCount ++;
							// since this is only for search purposes, storing more complex value to hit more queries to link to campaign.. must use explode() or strtok() in order to get just name for grabbing post
							$name = $post->post_title;
							$role = get_post_meta($post->ID, '_participant_title', true);
							$company = get_post_meta($post->ID, '_participant_company', true);
							$region = get_post_meta($post->ID, '_participant_region', true);
							$years = get_post_meta($post->ID, '_participant_experience', true);
							array_push($participantArr, $post->ID);
							echo '<li>
								<a href="post.php?post=' . $post->ID . '&action=edit">' . $name . '</a>
								<p style="margin-bottom: 0;"><strong>Company: </strong>' . $company . '</p>
								<p style="margin-bottom: 0;"><strong>Experience: </strong>' . ((!empty($years))? $years :'<span style="color: red;">MISSING</span>') . '</p>
								<p style="margin-bottom: 0;"><strong>Region: </strong>' . ((!empty($region))? $region :'<span style="color: red;">MISSING</span>') . '</p>
								<p></p>
								</li>';
							if($participantCount % 20 === 0){
								echo '</ul><ul class="participants__list">';
							}
						}
					?>

					<?php	endwhile;
				}
				wp_reset_query();
				$post = $real_post;
				update_post_meta($post->ID, '_persona_participants', $participantArr);
			?>
			</ul>

		</div>
	</div>
</div>
