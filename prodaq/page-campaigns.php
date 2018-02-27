<?php
/*
Campaign List
*/

/* Vars */

$type = 'campaign';

function generateCampaign($campaignPost) {
		//Some vars
		$researchParticipants = get_post_meta($campaignPost->ID, '_campaign_participants', true);
		$startDate = get_post_meta($campaignPost->ID, '_campaign_start_date', true);
		$terms = get_the_terms($campaignPost->ID, 'campaign_product');
		$campaignDescription = get_post_meta($campaignPost->ID, '_campaign_description', true);
		$campaignResearchers = get_post_meta($campaignPost->ID, '_campaign_researchers', true);
		$campaignModerators = get_post_meta($campaignPost->ID, '_campaign_moderators', true);
		$tags = wp_get_post_tags($campaignPost->ID);
		$goals = get_post_meta($campaignPost->ID, '_campaign_goals', true);
		$findings_type = get_post_meta($campaignPost->ID, '_campaign_findings_type', true);
		$findings = get_post_meta($campaignPost->ID, '_campaign_findings', true);
		$findings_report = get_post_meta($campaignPost->ID, '_campaign_findings_report', true);
		$assets = get_post_meta($campaignPost->ID, '_campaign_docs', true);
		$designTeam = get_post_meta($campaignPost->ID, '_campaign_design_team', true);
		$sponsor = get_post_meta($campaignPost->ID, '_campaign_sponsor', true);
		$interviewNumber = get_post_meta($campaignPost->ID, '_campaign_interviewNumber', true);
		$managementTeam = get_post_meta($campaignPost->ID, '_campaign_management_team', true);
		$archive = get_post_meta($campaignPost->ID, '_campaign_archive', true);
		$recordShow = get_post_meta($campaignPost->ID, '_campaign_record_show', true);
		$termsString = ""; //initialize the string that will contain the terms

		if(!empty( $terms )){
			foreach ( $terms as $term ) { // for each term
			$termsString .= $term->slug.' '; //create a string that has all the slugs
			}
		}
		?>
		<section class="isotope-list__item campaigns-list__item col-md-6 <?php echo $termsString; ?> <?php if(!empty($recordShow)){echo '--hide';} ?>">

			<div class="item-wrapper">

				<h1><?php wp_trim_words(the_title(), 5, '...')  ?></h1>

				<?php if(!empty($findings_type) || !empty($assets)){ ?>
					<?php
						if(!empty($findings_type)){
							if($findings_type == 'document'){
								echo '<a class="btn right" href="' . $findings . '"> Download Report</a>';
							}
						}
						?>
				<?php } ?>

				<div class="clear-both"></div>

				<?php if(!empty($campaignDescription)){ ?>
					<?php echo '<span><strong>Description</strong></span>' ?>
					<?php echo '<p>' . wp_trim_words($campaignDescription, 40, '...') .'</p>'; ?>
				<?php }
				else {
					 echo '<div class="empty-space"><p>Campaign needs description.</p></div>';
				}?>

				<?php
					if(!empty($goals[0]['goal'])){ ?>
					<span><strong>Goals</strong></span><br/>
					<ol>
						<?php
						$i = 0;
						foreach($goals as $goal){
							echo '<li>' . $goal['goal'] . '</li>';
							if(++$i > 2) break;
						}?>
					</ol>
				<?php }
				else {
					 echo '<div class="empty-space"><p>Campaign needs goals.</p></div>';
				}
				 ?>

				<div class="row">
					<?php if(!empty($startDate)){ ?>
					<div class="col-md-4">
							<?php echo '<span><strong>Findings to Date</strong></span>' ?>
							<?php echo '<p>' . wp_trim_words($startDate, 40, '...') .'</p>'; ?>
					</div>
					<?php }?>
					<?php if(!empty($researchParticipants)){ ?>
					<div class="col-md-4">
							<?php echo '<span><strong># of Interviews</strong></span>' ?>
							<?php echo '<p>' .count($researchParticipants).'</p>'; ?>
					</div>
					<?php }?>
					<?php if(!empty($sponsor)){ ?>
					<div class="col-md-4">
							<?php echo '<span><strong>Sponsor</strong></span>' ?>
							<?php echo '<p>' . wp_trim_words($sponsor, 3, '...') .'</p>'; ?>
					</div>
					<?php }?>
				</div>
				<div class="row">
					<?php if(!empty($researchParticipants)){ ?>
					<div class="col-md-4">
							<?php echo '<span><strong>Participants</strong></span>' ?>
							<?php echo '<p>'.count($researchParticipants).'</p>'; ?>
					</div>
					<?php }?>
					<?php if(!empty($campaignResearchers)){ ?>
					<div class="col-md-4">
							<?php echo '<span><strong>Researchers</strong></span>' ?>
							<?php echo '<p>'. $campaignResearchers .'</p>'; ?>
					</div>
					<?php }?>
					<?php if(!empty($managementTeam)){ ?>
					<div class="col-md-4">
							<?php echo '<span><strong>Product Management</strong></span>' ?>
							<?php echo '<p>'. $managementTeam .'</p>'; ?>
					</div>
					<?php }?>
				</div>


				<?php
				if(!empty($researchParticipants)){
					echo '<ul class="participant__list">';
					$inum = 0;
					$participantNum = count($researchParticipants);
					$countParticipants = $participantNum - 10;
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
						echo '</li>' ;
						if(++$inum > 10) break;
					}
					if(++$participantNum > 10) {
						echo '<li class="participant__count">+'.$countParticipants.'</li>';
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
			<a target="_blank" class="view__full-link" href="<?php the_permalink() ?>">View Full Campaign</a>
		</section>
<?php
}
?>

<?php get_header(); ?>

<header class="prodaq-header prodaq-header--sm">
	<div class="prodaq-header__title">
		<div class="container">
			<h1>Campaigns</h1>
		</div>
	</div>
</header>

<section class="prodaq-main">
	<div class="tabs">
		<div class="container row__tabs">
			<div class="row">
				<div class="col-md-12">
					<ul class="nav-tabs">
						<li class="active"><a href="#recentlyConcluded" data-toggle="tab">Recently Concluded</a></li>
						<li><a href="#activeCampaigns" data-toggle="tab">Active Campaigns</a></li>
						<li><a href="#archivedCampaigns" data-toggle="tab">Archived Campaigns</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="tab-content">
			<div class="tab-pane active" id="recentlyConcluded">
				<?php wp_reset_query();?>
				<?php
				$inactiveArgs=array(
					'post_type' => $type,
					'post_status' => 'publish',
					'posts_per_page' => -1,
					'caller_get_posts'=> 1,
					'posts_per_page' => 6,
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
								<div class="col-md-12">
									<article class="row">
										<h2 class="campaign-list__title">Recently Concluded</h2>
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

			</div>
			<div class="tab-pane" id="activeCampaigns">

				<?php
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
								<div class="col-md-12">
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

			</div>
			<div class="tab-pane" id="archivedCampaigns">

				<?php wp_reset_query();?>
				<?php
				$inactiveArgs=array(
					'post_type' => $type,
					'post_status' => 'publish',
					'posts_per_page' => -1,
					'offset' => 6,
					'meta_query' => array(
						array(
							'key' => '_campaign_active',
							'compare' => 'NOT EXISTS',
							'offset' => 6
						)
					)
				);
				$inactive_campaign_query = null;
				$inactive_campaign_query = new WP_Query($inactiveArgs); ?>
				<?php if ($inactive_campaign_query->have_posts()) : ?>
					<div class="campaigns-list campaigns-list--inactive">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<article class="row">
										<h2 class="campaign-list__title">Archived Campaigns</h2>
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

			</div><!-- archived campaigns -->
		</div>
	</div>
</section>

<?php get_footer(); ?>
