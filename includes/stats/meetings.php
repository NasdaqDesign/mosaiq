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
			//if($timestamp > strtotime('01/01/15') && $timestamp < strtotime('03/31/15')){
			$meetingStr = $meetingStr . ' q1' . $meetingYear;
			$quarterCounts[$meetingYear]['q1']++;
		}
		else if($meetingMonth >= 4 && $meetingMonth < 7){
			//else if($timestamp > strtotime('04/01/15') && $timestamp < strtotime('06/30/15')){
			$meetingStr = $meetingStr . ' q2' . $meetingYear;
			$quarterCounts[$meetingYear]['q2']++;
		}
		else if($meetingMonth >= 7 && $meetingMonth < 10){
			//else if($timestamp > strtotime('07/01/15') && $timestamp < strtotime('09/30/15')){
			$meetingStr = $meetingStr . ' q3' . $meetingYear;
			$quarterCounts[$meetingYear]['q3']++;
		}
		else if($meetingMonth >= 10){
			//else if($timestamp > strtotime('10/01/15') && $timestamp < strtotime('12/31/15')){
			$meetingStr = $meetingStr . ' q4' . $meetingYear;
			$quarterCounts[$meetingYear]['q4']++;
		}
		else{

		}
	}

}
