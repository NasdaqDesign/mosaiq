<?php
/*
Product List
*/
?>
<?php get_header(); ?>

<div class="page__header">
	<div class="container">
		<h1>Products</h1>
	</div>
</div>

<div class="products-list">
	<?php
	$type = 'product';
	$args=array(
		'post_type' => $type,
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'caller_get_posts'=> 1
	);

	$product_query = null;
	$product_query = new WP_Query($args);?>


	<?php if ($product_query->have_posts()) : while ($product_query->have_posts()) : $product_query->the_post(); ?>

		<?php
			//Some vars
			$description = get_post_meta($post->ID, '_product_details_description', true);
			$banner = wp_get_attachment_image_src(get_post_meta($post->ID, '_product_details_banner', true), 'full');
		?>
		<section class="products-list__product">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<p><?php echo $description; ?></p>
						<p><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">View More Details</a></p>
					</div>
				</div>

				<a href="<?php the_permalink() ?>"><img src="<?php echo $banner[0]; ?>"></a>
			</div>
		</section>

	<?php endwhile; ?>

			<?php if ( function_exists( 'bones_page_navi' ) ) { ?>
					<?php bones_page_navi(); ?>
			<?php } else { ?>
					<nav class="wp-prev-next">
							<ul class="clearfix">
								<li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'bonestheme' )) ?></li>
								<li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'bonestheme' )) ?></li>
							</ul>
					</nav>
			<?php } ?>

	<?php else : ?>

			<article id="post-not-found" class="hentry clearfix">
				<header class="article-header">
					<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
				</header>
				<section class="entry-content">
					<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
				</section>
				<footer class="article-footer">
						<p><?php _e( 'This is the error message in the custom posty type archive template.', 'bonestheme' ); ?></p>
				</footer>
			</article>

	<?php endif; ?>

</div>



<?php get_footer(); ?>
