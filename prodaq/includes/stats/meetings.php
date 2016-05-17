<?php
$meetings = get_post_meta(get_the_ID(), '_participant_meetings', TRUE);
// so we can add a string of classes to the list item for filtering
$meetingStr = '';

if(!empty($meetings)){

	foreach($meetings as $meeting){
		$timestamp = strtotime($meeting['meetingdate']);
		$meetingYear = date('Y', $timestamp);
		$meetingMonth = date('n', $timestamp);
		
		if($meetingMonth >= 1 && $meetingMonth < 4){
			//Q1
			$meetingStr = $meetingStr . ' q1' . $meetingYear;
			$quarterCounts[$meetingYear]['q1']++;
		}
		else if($meetingMonth >= 4 && $meetingMonth < 7){
			$meetingStr = $meetingStr . ' q2' . $meetingYear;
			$quarterCounts[$meetingYear]['q2']++;
		}
		else if($meetingMonth >= 7 && $meetingMonth < 10){
			$meetingStr = $meetingStr . ' q3' . $meetingYear;
			$quarterCounts[$meetingYear]['q3']++;
		}
		else if($meetingMonth >= 10){
			$meetingStr = $meetingStr . ' q4' . $meetingYear;
			$quarterCounts[$meetingYear]['q4']++;
		}
	}

}
