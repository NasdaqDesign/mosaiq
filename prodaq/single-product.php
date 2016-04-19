<?php
/**
 * The Template for displaying all single products
 *
 * @package WordPress
 * @subpackage Prodaq
 */

get_header(); ?>

<div class="product__content">
	<?php while ( have_posts() ) : the_post(); ?>
	<div class="product">
		<?php include(TEMPLATEPATH . '/includes/product/product-var.php'); ?>

		<?php include(TEMPLATEPATH . '/includes/product/product-header.php'); ?>

		<section class="product__banner">
			<?php include(TEMPLATEPATH . '/includes/product/product-banner.php'); ?>
		</section>

		<section class="product__screens">
			<?php include(TEMPLATEPATH . '/includes/product/product-screens.php'); ?>
		</section>

		<section class="product__details">
			<?php include(TEMPLATEPATH . '/includes/product/product-details.php'); ?>
		</section>

		<section class="product__personas">
			<?php include(TEMPLATEPATH . '/includes/product/persona-list.php'); ?>
		</section>





	</div>
	<?php include(TEMPLATEPATH . '/includes/product/persona-modals.php'); ?>

	<?php endwhile; ?>
</div>

<?php get_footer(); ?>
