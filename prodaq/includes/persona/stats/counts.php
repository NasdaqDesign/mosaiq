<?php
$personaCount ++;
$participantCount = 0;
foreach($related_participants as $participant){
	$participantCount ++;
	$related = get_post($participant);
	$region = get_post_meta($related->ID, '_participant_region', true);
	$market = get_post_meta($related->ID, '_participant_market', true);

	switch($region){
		case 'amers':
			array_push($amers, $related->post_title);
			break;
		case 'emea':
			array_push($emea, $related->post_title);
			break;
		case 'apac':
			array_push($apac, $related->post_title);
			break;
	}
	switch($market){
		case 'small':
			array_push($small_cap, $related->post_title);
			break;
		case 'medium':
			array_push($medium_cap, $related->post_title);
			break;
		case 'large':
			array_push($large_cap, $related->post_title);
			break;
		case 'mega':
			array_push($mega_cap, $related->post_title);
			break;
	}
}
