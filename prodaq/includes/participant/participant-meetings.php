<?php if(!empty($meetings)) {
	$groupedMeetings = array();
	foreach($meetings as $meeting){
		if(!array_key_exists($meeting['interview_campaign'], $groupedMeetings)){
			$groupedMeetings[$meeting['interview_campaign']] = array();
		} 
		array_push($groupedMeetings[$meeting['interview_campaign']], $meeting);
	}
	
	foreach($groupedMeetings as $meetingGroup){
		$campaign_id = $meetingGroup[0]['interview_campaign'];
		$campaign = get_post($campaign_id);
		echo '<h2><a href="' . get_permalink($campaign_id) . '">' . $campaign->post_title . '</a></h2>'; ?>

		<h3>Meetings</h3>
		<ul class="participant__meetings">	
			<?php
			foreach($meetingGroup as $meeting){
				echo '<li>';
				if(!empty($meeting['meetingdate'])){
					echo '<h4>' . $meeting['meetingdate'] . '</h4>';
				}
				if(!empty($meeting['recording'])){
					echo '<div class="meeting__recording">
						<audio controls>
							<source src="'. $meeting['recording'] .'" type="audio/mpeg">
						Your browser does not support the audio element.
						</audio>
					</div>';
				}
				echo '<div class="participant__assets-container">';
					if(!empty($meeting['recording'])){
						echo '<a data-toggle="tooltip" data-placement="left" title="Download Recording" href="' . $meeting['transcript'] . '"><i class="fa fa-microphone"></i></a>';
					}
					if(!empty($meeting['transcript'])){
						echo '<a data-toggle="tooltip" data-placement="left" title="Download Transcript" href="' . $meeting['transcript'] . '"><i class="fa fa-file-text"></i></a>';
					}
				echo '</div>';
				
				$theNotes = "<em>No notes currently available.</em>";
				if(!empty($meeting['notes'])){
					$theNotes = $meeting['notes'];
				}
				echo '<h5>Notes</h5><p>' . $theNotes . '</p>';
				echo '</li>';
			}?>
		</ul>
		<?php 
		if(!empty($quotes)){
			echo '<h3>Quotes</h3>';
				foreach($quotes as $quote){
				if($quote['campaign'] == $campaign_id){
					echo '<p class="quote">' . $quote['quote'] . '</p>';
				}
			}
		}
	} // foreach $groupedMeetings
} // if $meetings
?>
