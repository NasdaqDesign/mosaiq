<?php
/*
Template Name: Page - Persona Stats
*/
?>

<?php get_header(); ?>

<div class="page__header">
	<div class="container">
		<h1>Persona Stats</h1>
	</div>
</div>
<section class="stats__content">
<?php
	$personaCount = 0;
	$amers = array();
	$emea = array();
	$apac = array();
	$small_cap = array();
	$medium_cap = array();
	$large_cap = array();
	$mega_cap = array();
	$persona_args=array(
		'post_type' => 'persona',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'orderby'=> 'title',
		'order' => 'ASC',
		'caller_get_posts'=> 1
	);
	$persona_query = null;
	$persona_query = new WP_Query($persona_args);

	if ($persona_query->have_posts()) : ?>
	<div class="persona-counts">
		<div class="container">
				<ul class="row persona-list">
				<?php while ($persona_query->have_posts()) : $persona_query->the_post();

				$related_participants = get_post_meta(get_the_ID(), '_persona_participants', TRUE);
				if(!empty($related_participants)){

					include( get_template_directory() . '/includes/persona/stats/counts.php');
					$firstname = explode(' ',trim(get_the_title()));
					?>

					<li class="col-md-4 col-sm-6">
						<div class="thumb__wrapper">
							<a data-toggle="modal" href="<?php echo get_the_permalink(); ?>"><?php echo get_the_post_thumbnail(); ?></a>
						</div>
						<h3><a data-toggle="modal" href="<?php echo get_the_permalink(); ?>"><?php echo $firstname[0] ?></a></h3>
						<p><?php echo get_post_meta($post->ID, '_persona_description', true); ?></p>
						<h3><strong><?php echo $participantCount; ?></strong> Interviews</h3>
					</li>
					<?php
						if($personaCount % 3 == 0){
							echo '</ul><ul class="row persona-list">';
						}
				}

				endwhile;
				endif; ?>
			</ul>
		</div>
	</div>
	<?php include( get_template_directory() . '/includes/persona/stats/market-size.php'); ?>
	<?php include( get_template_directory() . '/includes/persona/stats/map-dist.php'); ?>
</section>


<?php get_footer(); ?>
