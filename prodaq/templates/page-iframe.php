<?php
/*
Template Name: Page - iFrame
*/
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php
		$iframeUrl = get_post_meta($post->ID, '_iframe_url_url', true);
	?>
	<div class="iframe-wrapper">
		<iframe width="100%" height="100%" src="<?php echo $iframeUrl; ?>"></iframe>
	</div>

<?php endwhile; ?>


<?php get_footer(); ?>
