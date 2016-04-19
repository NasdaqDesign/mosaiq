<ul class="participant__meetings">
	<h2>Meetings</h2>
	<?php if(!empty($meetings)){

		foreach($meetings as $meeting){
			$campaign_id = $meeting['interview_campaign'];
			$campaign = get_post($campaign_id);
			echo '<li>';
			if(!empty($meeting['meetingdate'])){
				echo '<p>' . $meeting['meetingdate'] . '</p>';
			}

			echo '<h4><a href="' . get_permalink($campaign_id) . '">' . $campaign->post_title . '</a></h4>';
			if(!empty($meeting['recording'])){
				echo '<div class="meeting__recording">
					<audio controls>
						<source src="'. $meeting['recording'] .'" type="audio/mpeg">
					Your browser does not support the audio element.
					</audio>
				</div>';
				echo '<a data-toggle="tooltip" data-placement="left" title="Download Recording" class="download-recording" href="' . $meeting['transcript'] . '"><i class="fa fa-microphone"></i></a>';
			}
			if(!empty($meeting['transcript'])){
				echo '<a data-toggle="tooltip" data-placement="left" title="Download Transcript" class="download-transcript" href="' . $meeting['transcript'] . '"><i class="fa fa-file"></i></a>';
			}
			if(!empty($meeting['notes'])){
				echo '<h5>Notes</h5><p>' . $meeting['notes'] . '</p>';
			}
			echo '<h5>Quotes</h5>';
			if(!empty($quotes)){
				foreach($quotes as $quote){
					if($quote['campaign'] == $campaign_id){
						echo '<p class="quote">' . $quote['quote'] . '</p>';
					}
				}
			}
			echo '</li>';
		}


	}?>
</ul>
