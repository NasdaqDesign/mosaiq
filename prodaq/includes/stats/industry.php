<?php
$industry = get_post_meta(get_the_ID(), '_participant_industry', TRUE);
$industryStr = '';

if(!empty($industry)){
	$industryCounts[$industry]++;
	$industryStr = 'ind' . $industry;
}
