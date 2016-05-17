<?php
/*
Template Name: Page - Form
*/

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="page__header">
	<div class="container">
		<h1><?php echo the_title(); ?></h1>
	</div>
</div>
<div class="form__content">

	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="form__wrapper">
					<?php echo the_content(); ?>
				</div>
			</div>
		</div>

	</div>

</div>
<?php endwhile; ?>
<?php get_footer(); ?>
