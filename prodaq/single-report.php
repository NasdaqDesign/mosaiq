<?php
/**
 * The Template for displaying all single reports
 *
 * @package WordPress
 * @subpackage Prodaq
 */

get_header(); ?>

<div class="report__content">
	<a href="#" class="fp__menu-toggle"><i class="fa fa-bars"></i></a>
	<span class="fp__logo">
		<img src="<?php bloginfo('template_directory'); ?>/library/images/newlogo-lg.png">
	</span>
	<?php while ( have_posts() ) : the_post(); ?>

		<div id="report-wrapper">
			<?php
			include( get_template_directory() . '/includes/reports/report-var.php');

			include( get_template_directory() . '/includes/reports/report-title.php');

			if(!empty($research)){
				include( get_template_directory() . '/includes/reports/report-research.php');
			}
			if(!empty($methodology)){
				include( get_template_directory() . '/includes/reports/report-methodology.php');
			}
			if(!empty($participants)){
				include( get_template_directory() . '/includes/reports/report-participants.php');
			}
			if(!empty($themes)){
				include( get_template_directory() . '/includes/reports/report-themes.php');
			}
			if(!empty($quotes)){
				include( get_template_directory() . '/includes/reports/report-quotes.php');
			}
			if(!empty($images)){
				include( get_template_directory() . '/includes/reports/report-images.php');
			}
			if(!empty($next)){
				include( get_template_directory() . '/includes/reports/report-next-steps.php');
			} ?>


		</div><!-- end wrapper -->


	<?php endwhile; ?>
</div>

<?php get_footer(); ?>
