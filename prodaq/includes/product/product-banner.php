
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<p><?php 	echo $description; ?></p>

			<?php if(!empty($team)){
				echo '<h3>Team</h3>
					<ul>';
					foreach($team as $member){
						echo '<li><a href="mailto:' . $member['email'] . '" target="_top"><strong>' . $member['role'] . '</strong> - ' . $member['name'] . '</a></li>';
					}
					echo '</ul>';
				}
			?>

			<?php if(!empty($campaigns)){
				echo '<h3>Research Campaigns</h3>
					<ul>';
				foreach($campaigns as $campaign){
					$page = get_post($campaign);
					$researchParticipants = get_post_meta($page->ID, '_campaign_participants', true);
					echo '<li><a href="' . get_permalink($page->ID) . '">' . $page->post_title . '</a>' . count($researchParticipants) . ' Participants</li>';

				}
				echo '</ul>';
			}?>
			</ul>
		</div>
	</div>
</div>
<img src="<?php echo $banner; ?>">
