<?php
/*
Campaign List
*/
function generateCampaign($campaignPost) {
		//Some vars
		$researchParticipants = get_post_meta($campaignPost->ID, '_campaign_participants', true);
		$startDate = get_post_meta($campaignPost->ID, '_campaign_start_date', true);
		$terms = get_the_terms($campaignPost->ID, 'campaign_product');
		$termsString = ""; //initialize the string that will contain the terms
		if(!empty( $terms )){
			foreach ( $terms as $term ) { // for each term
			$termsString .= $term->slug.' '; //create a string that has all the slugs
			}
		}
		?>
		<section class="isotope-list__item campaigns-list__item col-md-3 col-xs-12 <?php echo $termsString; ?>">
			<div class="item-wrapper">
				<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<p><?php if(!empty($startDate)) : echo  $startDate; endif ?></p>
				<?php if(!empty($researchParticipants)){
					echo '<ul>';
					foreach($researchParticipants as $participant){
						$participant = strtok($participant, '-');
						$participantinfo = get_page_by_title($participant, OBJECT, 'participant');
						echo '<li>';
						if(has_post_thumbnail($participantinfo->ID)){
							echo get_the_post_thumbnail($participantinfo->ID, 'participant-small');
						}
						else{
							echo '<img width="36px" src="' . get_asset_if_exists("/library/images/blank.jpg") . '">';
						}
						echo '</li>';
					}
					echo '</ul>';
				} ?>

				<?php if(!empty( $terms )){
					echo '<p class="product-tags">';
					foreach($terms as $term){
						echo '<span>' . $term->name . '</span>';
					}
					echo '</p>';
				}?>
			</div>
		</section>
<?php
}
?>

<?php get_header(); ?>

<div class="page__header">
	<div class="container">
		<div class="row">
			<h1>Research Campaigns</h1>
		</div>
	</div>
</div>
<?php
$type = 'campaign';
$activeArgs=array(
	'post_type' => $type,
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'caller_get_posts'=> 1,
	'meta_query' => array(
		array(
			'key' => '_campaign_active',
			'value' => 'active'
		)
	)
);

$active_campaign_query = null;
$active_campaign_query = new WP_Query($activeArgs);

if ($active_campaign_query->have_posts()) : ?>
	<div class="campaigns-list campaigns-list--active">
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<ul class="filters hidden-xs">
						<li><a href="#" data-filter="*" class="selected">All Categories</a></li>
						<?php
							$terms = get_terms('campaign_product');
							$count = count($terms); //How many are they?
							if ( $count > 0 ){  //If there are more than 0 terms
								foreach ( $terms as $term ) {  //for each term:
									echo "<li><a href='#' class='persona-filter' data-filter='.".$term->slug."'>" . $term->name . "</a></li>\n";
									//create a list item with the current term slug for sorting, and name for label
								}
							}
						?>
					</ul>
					<select class="filters visible-xs">
						<option data-filter="*" class="selected">All Categories</option>
						<?php
							$terms = get_terms('campaign_product');
							$count = count($terms); //How many are they?
							if ( $count > 0 ){  //If there are more than 0 terms
								foreach ( $terms as $term ) {  //for each term:
									echo "<option value='.".$term->slug."'>" . $term->name . "</option>";
									//create a list item with the current term slug for sorting, and name for label
								}
							}
						?>
					</select>
				</div>
				<div class="col-md-10">
					<article class="row">
						<h2 class="campaign-list__title">Active Campaigns</h2>
						<div class="isotope-filter">
							<?php while ($active_campaign_query->have_posts()) : $active_campaign_query->the_post(); ?>
								<?php generateCampaign($post); ?>
							<?php endwhile; ?>
						</div> <!-- isotope-filter -->
						<div class="campaign-list__empty">There are currently no active campaigns.</div>
					</article>
				</div>
			</div> <!-- last one -->
		</div>
	</div>
<?php endif; ?>
<?php wp_reset_query();?>
<?php
$inactiveArgs=array(
	'post_type' => $type,
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'caller_get_posts'=> 1,
	'meta_query' => array(
		array(
			'key' => '_campaign_active',
			'compare' => 'NOT EXISTS'
		)
	)
);

$inactive_campaign_query = null;
$inactive_campaign_query = new WP_Query($inactiveArgs); ?>
<?php if ($inactive_campaign_query->have_posts()) : ?>
	<div class="campaigns-list campaigns-list--inactive">
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					
				</div>
				<div class="col-md-10">
					<article class="row">
						<h2 class="campaign-list__title">Inactive Campaigns</h2>
						<div class="isotope-filter">
							<?php while ($inactive_campaign_query->have_posts()) : $inactive_campaign_query->the_post(); ?>
								<?php generateCampaign($post); ?>
							<?php endwhile; ?>
						</div> <!-- isotope-filter -->
						<div class="campaign-list__empty">There are currently no active campaigns.</div>
					</article>
				</div>
			</div> <!-- last one -->
		</div>
	</div>
<?php endif; ?>

<?php get_footer(); ?>
