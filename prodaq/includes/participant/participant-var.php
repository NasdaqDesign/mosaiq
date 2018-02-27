<?php
//Company Vars
$title = get_post_meta(get_the_ID(),'_participant_title',TRUE);
$company = get_post_meta(get_the_ID(),'_participant_company',TRUE);
$cic = get_post_meta(get_the_ID(),'_participant_cic',TRUE);
$company_size = get_post_meta(get_the_ID(),'_participant_size',TRUE);
$company_industry = get_post_meta(get_the_ID(),'_participant_industry',TRUE);
$company_market = get_post_meta(get_the_ID(),'_participant_market',TRUE);
$businessUnit = get_post_meta(get_the_ID(),'_participant_business_unit',TRUE);
$relatedCampaigns = get_post_meta(get_the_ID(),'_participant_related_campaigns',TRUE);
$recordShow = get_post_meta($post->ID, '_participant_record_show', true);


//Location
$country = get_post_meta(get_the_ID(),'_participant_country',TRUE);
$city = get_post_meta(get_the_ID(),'_participant_city',TRUE);
$state = get_post_meta(get_the_ID(),'_participant_state',TRUE);
$region = get_post_meta(get_the_ID(),'_participant_region',TRUE);

//Contact
$linkedin = get_post_meta(get_the_ID(),'_participant_linkedin',TRUE);
$phone = get_post_meta(get_the_ID(),'_participant_phone',TRUE);
$email = get_post_meta(get_the_ID(),'_participant_email',TRUE);


//Quotes
$quotes = get_post_meta(get_the_ID(),'_participant_quotes',TRUE);

//Meetings
$meetings = get_post_meta(get_the_ID(),'_participant_meetings',TRUE);

//Summary form mapping
include('summary-var.php');
