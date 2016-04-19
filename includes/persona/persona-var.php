<?php
	$taxonomy = 'persona_product';
	$terms = get_the_terms( $post->ID, $taxonomy );

	$hero = get_post_meta($post->ID, '_persona_hero', true);

	$thumb = get_the_post_thumbnail($content->ID, 'persona-thumb');

	$quote = get_post_meta($post->ID, '_persona_quote', true);
	$role = get_post_meta($post->ID, '_persona_role', true);
	$summary = get_post_meta($post->ID, '_persona_summary', true);
	$description = get_post_meta($post->ID, '_persona_description', true);
	$type = get_post_meta($post->ID, '_persona_persona_type', true);

	$goals = get_post_meta($post->ID, '_persona_goals', true);
	$painpoints = get_post_meta($post->ID, '_persona_pains', true);
	$activities = get_post_meta($post->ID, '_persona_activities', true);
	$connections = get_post_meta($post->ID, '_persona_connections', true);
	$related_participants = get_post_meta($post->ID, '_persona_participants', true);
