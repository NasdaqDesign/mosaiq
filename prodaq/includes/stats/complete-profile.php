<?php
// Array of fields we want to include in "completeness"
$participantFields = array('Company', 'City', 'Country', 'Region');
$incompleteArr = array();
$totalFields = 0;
$complete = 0;

foreach ($participantFields as $fieldKey => &$field) {
	$totalFields ++;
	$fieldValue = get_post_meta(get_the_ID(), '_participant_' . strtolower($field), TRUE);
	if(!empty($fieldValue)){
		$complete ++;
		if($field == "Country" && $fieldValue == "US"){
			array_push($participantFields, 'State'); // only push the state as a required field if the country is the US
		}
	}
	else{
		// so we know what's missing
		array_push($incompleteArr, $field);
	}
}

// Meeting Data
$meetingData = get_post_meta(get_the_ID(), '_participant_' . 'meetings', TRUE);
$meetingFields = array('Meeting Date', 'Recording');

$totalFields += 2; // we are going to be checking two new fields so update the total
if(!empty($meetingData)){ // make sure we have some meeting data
	$isMissingDate = false;
	$isMissingRecording = false;
	
	foreach ($meetingData as $meeting) { // loop through all this participants meetings
		if(empty($meeting)){
			// there is a meeting but it has no data
			// a meeting without data is therefore missing both of these
			$isMissingDate = $isMissingRecording = true;
		}
		else {
			if(!array_key_exists('meetingdate', $meeting)){
				// checking to see if this meeting has a date
				// if we are here then it doesnt exist and it's an incomplete record
				$isMissingDate = true;
			}
			
			if(!array_key_exists('recording', $meeting)){
				// checking to see if this meeting has a recording
				// if we are here then it doesnt exist and it's an incomplete record
				$isMissingRecording = true;
			}
		}
		
		if($isMissingDate && $isMissingRecording){
			// when both of these are true, there is no sense in checking any more
			// if one meeting is missing these, we report it as incomplete
			// we can break out of the for loop
			break;
		}
	}
	
	if($isMissingDate){
		// if any meetings are missing a date, add it to the incomplete array
		array_push($incompleteArr, 'Meeting Date');
	}
	else {
		// otherwise add it as complete
		$complete ++;
	}
	if($isMissingRecording){
		// if any meetings are missing a recording, add it to the incomplete array
		array_push($incompleteArr, 'Recording');
	}
	else {
		// otherwise add it as complete
		$complete ++;
	}
}
else {
	// a meeting has been added but it is totally empty of data therefore both are missing
	array_push($incompleteArr, 'Meeting Date', 'Recording');
}

$completeness = $complete/$totalFields;
