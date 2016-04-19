<?php
/*
Template Name: Page - Quotes
*/
?>

<?php get_header(); ?>

<div class="page__header">
	<div class="container">
		<h1>Quotes</h1>
	</div>
</div>
<section class="quotes__content">
	<div class="container">
		<div class="col-md-6">

	<?php


	$args=array(
		'post_type' => 'participant',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'caller_get_posts'=> 1
	);
	$participant_query = null;
	$participant_query = new WP_Query($args);?>

	<?php if ($participant_query->have_posts()) :
		while ($participant_query->have_posts()) : $participant_query->the_post();


		$quotes = get_post_meta(get_the_ID(),'_participant_quotes',TRUE);
		if(!empty($quotes)){
			$exec = false;

			foreach($quotes as $quote){
				if($quote[exec] === 'friendly'){
					$exec = true;
				}
			}
			if($exec){
				echo '<div class="row">';
				echo '<div class="col-md-4">';
				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					the_post_thumbnail();
				}
				echo '</div>';
				echo '<div class="col-md-8">';
				foreach($quotes as $quote){
					if($quote[exec] === 'friendly'){
							echo '<em>' . $quote[quote] . '</em>';
							echo '<br>';
							echo '<br>';
					}
				}
				echo the_title() . ' - '. get_post_meta(get_the_ID(),'_participant_company',TRUE);
				echo '<br>';
				echo '</div>';
				echo '</div>';
			}


		}


		?>



	<?php endwhile; ?>
	<?php endif; ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>
