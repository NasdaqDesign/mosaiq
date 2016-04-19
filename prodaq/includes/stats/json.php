<?php
// dont want to continuously run this. may add a button but for now just uncomment and load page to refresh the json.
if(!empty($meetings)){
	$interviewed_participants ++;
		foreach($meetings as $meeting){
			$timestamp = strtotime($meeting['meetingdate']);
			$name = get_the_title();
			$id = get_the_ID();
			$region = get_post_meta(get_the_ID(),'_participant_region',TRUE);
			$newmeeting = array(
				'campaign' => $meeting['interview_campaign'],
				'date' => $timestamp,
				'name' => $name,
				'id' => $id,
				'region' => $region
			);

			array_push($meetingArr, $newmeeting);
		}
		$json = json_encode($meetingArr);
		$filename = get_template_directory() . '/library/data/meetings.json';
		$file = fopen($filename, "w") or die("Unable to open file!");
		$txt = $json;
		fwrite($file, $txt);
		fclose($file);
}
