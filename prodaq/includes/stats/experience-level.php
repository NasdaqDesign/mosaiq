<?php
$expLevel = get_post_meta(get_the_ID(), '_participant_experience', TRUE);
$expLevelStr = '';

// JD - Should think about fixing this but didnt want to mess with the database right now 20160318
switch($expLevel){
	case '4':
		$lt5Count ++;
		$expLevelStr = 'lt5';
		break;
	case '5-10':
		$fiveToTenCount ++;
		$expLevelStr = 'fiveToTen';
		break;
	case '11':
		$gt10Count ++;
		$expLevelStr = 'gt10';
		break;
}
