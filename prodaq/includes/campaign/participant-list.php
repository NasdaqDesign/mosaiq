<div class="container">
	<div class="participant-list__header">
		<h2 class="pull-left">Research Participants</h2>
		<input class="pull-right" placeholder="Search Participants" name="search" type="text" data-toggle="hideseek" data-list=".participant-list">
	</div>

	<ul class="row participant-list">
		<?php
		function renderAsset($assetCount, $assetTypeClass, $assetTitle) {
			if($assetCount == 0) { return; }
			if($assetCount > 1) { $assetBadge = '<span class="badge">' . $assetCount . '</span>'; }
			echo '<li data-toggle="tooltip" data-placement="bottom" data-original-title="' . $assetTitle . '"><i class="fa ' . $assetTypeClass . '"></i>' . $assetBadge . '</li>';
		}
		$itemCount = 0;
		if(!empty($researchParticipants)){
			foreach($researchParticipants as $participant){
				$participant = explode(' -', $participant); // This is so we don't trip up on hyphens but actually extract their full name (excluding company and title)
				$participantinfo = get_page_by_title($participant[0], OBJECT, 'participant');
				$participant_meetings = get_post_meta($participantinfo->ID, '_participant_meetings', TRUE);
				$itemCount ++;

				echo '<li class="col-md-3 col-sm-6">
				<div class="thumb__wrapper">
					<a class="participant-wrapper" data-toggle="modal" data-target="#participant-' . $participantinfo->ID . '" href="#">';

					if(has_post_thumbnail($participantinfo->ID)){
						echo get_the_post_thumbnail($participantinfo->ID, 'participant-thumb');
					}
					else{
						echo '<img width="100px" src="' . get_asset_if_exists("/library/images/blank.jpg") . '">';
					}
				echo '</a>
				</div>

				<div class="participant__details">
					<h3><a class="participant-wrapper" data-toggle="modal" data-target="#participant-' . $participantinfo->ID . '" href="#">' . $participantinfo->post_title . '</a></h3>
					<h4>' . get_post_meta($participantinfo->ID, '_participant_title', TRUE) . ' at ' . get_post_meta($participantinfo->ID, '_participant_company', TRUE) . '</h4>
				</div>

				<ul class="participant__assets">';
					if(!empty($participant_meetings)){
						$recordingCount = 0;
						$transcriptCount = 0;

						foreach($participant_meetings as $meeting){
							if($meeting['interview_campaign'] == $post->ID && isset($meeting['recording'])){
								$recordingCount++;
							}
							if($meeting['interview_campaign'] == $post->ID && isset($meeting['transcript'])){
								$transcriptCount++;
							}
						}
					
					renderAsset($recordingCount, 'fa-microphone', 'Recording');
					renderAsset($transcriptCount, 'fa-file-text', 'Transcript');

					}
				echo '</ul>

				</li>';
				if($itemCount % 4 === 0){
					echo '</ul><ul class="row participant-list">';
				}
			}
		}?>
	</ul>
</div>
