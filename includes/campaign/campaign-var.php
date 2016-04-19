<?php
	$taxonomy = 'campaign_product';
	//Variables
	//Overview
	$campaignResearchers = get_post_meta($post->ID, '_campaign_researchers', true);
	$campaignModerators = get_post_meta($post->ID, '_campaign_moderators', true);
	$campaignDescription = get_post_meta($post->ID, '_campaign_description', true);

	$tags = wp_get_post_tags($post->ID);
	$goals = get_post_meta($post->ID, '_campaign_goals', true);

	$findings_type = get_post_meta($post->ID, '_campaign_findings_type', true);
		$findings = get_post_meta($post->ID, '_campaign_findings', true);
		$findings_report = get_post_meta($post->ID, '_campaign_findings_report', true);
	//Assets
	$assets = get_post_meta($post->ID, '_campaign_docs', true);

	//Other Details
	$designTeam = get_post_meta($post->ID, '_campaign_design_team', true);
	$managementTeam = get_post_meta($post->ID, '_campaign_management_team', true);
	$startDate = get_post_meta($post->ID, '_campaign_start_date', true);
	$endDate = get_post_meta($post->ID, '_campaign_end_date', true);

	//Research Participants
	$researchParticipants = get_post_meta($post->ID, '_campaign_participants', true);
