<?php
$meetings = get_post_meta(get_the_ID(), '_participant_meetings', TRUE);
$campaignsStr = '';

if(!empty($meetings)){
	foreach ($meetings as $meeting) {
		$campaignId = $meeting['interview_campaign'];
		if(!empty($campaignId)) {
			$campaignCounts[$campaignId]++;
			if($campaignsStr != '') $campaignsStr .= ' ';
			$campaignsStr .= 'camp' . $campaignId;
		}
	}
}
