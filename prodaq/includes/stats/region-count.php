<?php
$region = get_post_meta(get_the_ID(), '_participant_region', TRUE);

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
