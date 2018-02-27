<?php
	$taxonomy = 'persona_product';
	$terms = get_the_terms( $post->ID, $taxonomy );

	$description = get_post_meta($post->ID, '_product_description', true);
	$campaigns = get_post_meta($post->ID, '_product_campaigns', true);
	$personas = get_post_meta($post->ID, '_product_personas', true);

	$github = get_post_meta($post->ID, '_product_git', true);
	$basecamp = get_post_meta($post->ID, '_product_basecamp', true);
	$site = get_post_meta($post->ID, '_product_site', true);

	$banner = get_post_meta($post->ID, '_product_hero', true);

	$links = get_post_meta($post->ID, '_product_links', true);
	$competitors = get_post_meta($post->ID, '_product_market', true);

	$team = get_post_meta($post->ID, '_product_team', true);
	$screens = get_post_meta($post->ID, '_product_images', true);

?>
