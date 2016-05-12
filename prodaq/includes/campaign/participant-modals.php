<?php
if(!empty($researchParticipants)){
	foreach($researchParticipants as $participant){
		$participant = explode(' -', $participant);
		$participantinfo = get_page_by_title($participant[0], OBJECT, 'participant');
		$participant_quotes = get_post_meta($participantinfo->ID, '_participant_quotes', TRUE);
		$participant_meetings = get_post_meta($participantinfo->ID, '_participant_meetings', TRUE);?>

	<div class="modal participant-modal fade" id="participant-<?php echo $participantinfo->ID; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<div class="thumb-wrapper">
						<?php
						if(has_post_thumbnail($participantinfo->ID)){
							echo get_the_post_thumbnail($participantinfo->ID, 'participant-thumb');
						}
						else{
							echo '<img width="100px" src="' .  get_asset_if_exists("/library/images/blank.jpg") . '">';
						}?>
					</div>
					<div class="participant-details">
						<h3 class="modal-title">
							<?php echo $participantinfo->post_title;
								$linked = get_post_meta($participantinfo->ID, '_participant_linkedin', TRUE);
								if(!empty($linked)){
								echo '<a href="'. $linked .'" target="_blank"><i class="fa fa-linkedin"></i></a>';
								}
							?>
						</h3>
						<h4><?php echo get_post_meta($participantinfo->ID, '_participant_title', TRUE) . ' at ' . get_post_meta($participantinfo->ID, '_participant_company', TRUE); ?></h4>
						<?php
						if(!empty($participant_meetings)){
							$totalMeetings = 0;
							foreach($participant_meetings as $meeting){
								if($meeting['interview_campaign'] == $post->ID){
									$totalMeetings++;
								}
							}
							if($totalMeetings == 1) { echo '<p>'. $meeting['meetingdate'] . '</p>'; }
							else if($totalMeetings > 1) { echo $totalMeetings . " Meetings"; }
						}?>
					</div>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<?php
				if(!empty($participant_meetings)){
					foreach($participant_meetings as $meeting){
						if($meeting['interview_campaign'] == $post->ID){
							echo '<div class="modal-section">';
								echo '<h4>'. $meeting['meetingdate'] . '</h4>';
								if(isset($meeting['notes'])){
									echo '<p>'. $meeting['notes'] . '</p>';
								}
								if(isset($meeting['recording'])){
									echo '<div class="recording" data-src="'. $meeting['recording'] .'"></div>';
								}
								if(isset($meeting['transcript'])){
									echo '
									<div class="modal-downloads col-md-6">
										<a href="' . $meeting['transcript'] .'">Download Transcript</a>
									</div>';
								}
								if(!isset($meeting['notes']) && !isset($meeting['recording']) && !isset($meeting['transcript']) && !isset($meeting['interview_campaign_summary'])){
									echo '<p><em>No assets currently available.</em></p>';
								}
							echo '</div>';
						}
					}
				}?>

				<div class="modal-section">
					<h4>Quotes</h4>
					<?php
					$hasquote = false;
					if(!empty($participant_quotes)){
						foreach($participant_quotes as $quote){
							if($quote['campaign'] == $post->ID){
									echo '<p>"'. $quote['quote'] . '"</p>';
									$hasquote = true;
							}
						}
						}
						if(!$hasquote){
							echo '<p><em>No quote was added.</em></p>';
						}?>
				</div>

				<a class="view-full" href="<?php echo get_permalink($participantinfo->ID); ?>">View Full Participant Profile</a>
			</div>
		</div>
	</div>
<?php }
}?>
