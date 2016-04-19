<?php
/*
Template Name: Home Page Template
*/
?>

<?php get_header(); ?>

<section class="home__hero">
	<div class="home__research active">
		<a href="#" class="product-choice" data-target="research">Research</a>
		<div class="hidden__content">
			<div class="container">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php the_content();?>
				<?php endwhile; ?>
				<?php endif; ?>
				<ul>
					<li><a href="/work/campaigns" class="btn btn-white">Research Campaigns</a></li>
					<li><a href="/work/personas" class="btn btn-white">Personas</a></li>
				</ul>
			</div>
		</div>
		<div class="home__overlay"></div>
	</div>
</section>



<?php get_footer(); ?>
