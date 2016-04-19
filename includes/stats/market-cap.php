<?php
$marketCap = get_post_meta(get_the_ID(), '_participant_market', TRUE);

switch($marketCap){
	case 'n-a':
		$naCount ++;
		break;
	case 'micro':
		$microCount ++;
		break;
	case 'small':
		$smallCount ++;
		break;
	case 'medium':
		$mediumCount ++;
		break;
	case 'large':
		$largeCount ++;
		break;
	case 'mega':
		$megaCount ++;
		break;
}
