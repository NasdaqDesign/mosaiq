<?php
/*
Template Name: Page - Ideas
*/
?>

<?php get_header(); ?>

<div class="page__header">
	<div class="container">
		<h1>Ideas</h1>
	</div>
</div>
<section class="ideas__wrapper">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="container">
				<?php echo the_content(); ?>
			</div>
		<?php endwhile; ?>
</section>



<?php get_footer(); ?>
