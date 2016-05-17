<?php
$participantCount = 0;
$amersCount = 0;
$emeaCount = 0;
$apacCount = 0;
$small = 0;
$mid = 0;
$large = 0;
$mega = 0;
$not_experienced = 0;
$experienced = 0;
$very_experienced = 0;
$other_personas = array();

if(!empty($related_participants)){
	foreach($related_participants as $participant){
		$related = get_post($participant);
		$region = get_post_meta($related->ID, '_participant_region', true);
		$market = get_post_meta($related->ID, '_participant_market', true);
		$experience = get_post_meta($related->ID, '_participant_experience', true);
		$primary = get_post_meta($related->ID, '_participant_primary_persona', true);
		$participantCount ++;

		if(!empty($primary) && $primary != $post->ID){
		array_push($other_personas, $primary);
		}
		switch($experience){
		case '4':
			$not_experienced ++;
			break;
		case '5-10':
			$experienced ++;
			break;
		case '11':
			$very_experienced ++;
			break;
		}
		switch($region){
		case 'amers':
			$amersCount ++;
			break;
		case 'emea':
			$emeaCount ++;
			break;
		case 'apac':
			$apacCount ++;
			break;
		}
		switch($market){
		case 'small':
			$small ++;
			break;
		case 'medium':
			$mid ++;
			break;
		case 'large':
			$large ++;
			break;
		case 'mega':
			$mega ++;
			break;
		}
	}
}
