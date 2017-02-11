<?php
/**
 * The Template for displaying all single participants
 *
 * @package WordPress
 */

get_header(); ?>

<div class="participant__content">
<?php while ( have_posts() ) : the_post(); ?>
	<?php include(TEMPLATEPATH . '/includes/participant/participant-var.php'); ?>
	<header class="participant__header page__header">
	<!-- no need for anything here other than bg -->
	</header>
	<div class="participant">
		<div class="container">
			<div class="row">
				<div class="col-md-3">

					<div class="participant__thumb">
						<?php if(has_post_thumbnail(get_the_ID())){
							echo get_the_post_thumbnail(get_the_ID(), 'participant-thumb');
						}
						else{
							echo '<img width="130px" src="' . get_asset_if_exists("/library/images/blank.jpg") . '">';
						} ?>
					</div>
					<?php if (is_user_logged_in()) {
						echo '<a class="btn btn--edit" href="' . admin_url() . 'post.php?post='. get_the_id() . '&action=edit">Edit</a>';
					} ?>
					<?php include(TEMPLATEPATH . '/includes/participant/participant-details.php'); ?>

				</div>
				<div class="col-md-6">
					<?php include(TEMPLATEPATH . '/includes/participant/participant-meetings.php'); ?>


				</div>

			</div>
		</div>
	</div>

<?php endwhile; ?>
</div>
<?php get_footer(); ?>
