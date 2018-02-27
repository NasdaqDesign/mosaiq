
<?php
/**
 * Reports Page
 *
 * @package WordPress
 */
get_header(); ?>
<?php $totalPosts = 14; ?>
<?php
function generateCampaign($campaignPost) {
		$researchParticipants = get_post_meta($campaignPost->ID, '_campaign_participants', true);
		$startDate = get_post_meta($campaignPost->ID, '_campaign_start_date', true);
		$findings_type = get_post_meta($campaignPost->ID, '_campaign_findings_type', true);
		$findings = get_post_meta($campaignPost->ID, '_campaign_findings', true);
		$findings_report = get_post_meta($campaignPost->ID, '_campaign_findings_report', true);
		$assets = get_post_meta($campaignPost->ID, '_campaign_docs', true);
		$designTeam = get_post_meta($campaignPost->ID, '_campaign_design_team', true);
		$sponsor = get_post_meta($campaignPost->ID, '_campaign_sponsor', true);
		$product = get_post_meta($campaignPost->ID, '_campaign_product', true);
		$businessUnit = get_post_meta($campaignPost->ID, '_campaign_business_unit', true);
		$recordShow = get_post_meta($campaignPost->ID, '_campaign_record_show', true);
		?>
		<?php if(!empty($findings_type)){ ?>
		<tr data-toggle="report" class="<?php if(!empty($recordShow)){echo '--hide';} ?>">
			<td><?php wp_trim_words(the_title(), 5, '...')  ?></td>
			<td><?php echo $businessUnit ?></td>
			<td><?php echo $sponsor ?></td>
			<td><?php echo get_the_title($product) ?></td>
			<td><?php echo $startDate ?></td>
			<td>
				<?php if(!empty($findings_type) || !empty($assets)){ ?>
					<?php
						if(!empty($findings_type)){
							if($findings_type == 'document'){
								echo '<a target="_blank" class="btn" href="' . $findings . '">Download Report</a>';
							}
						}
						?>
				<?php } ?>
			</td>
		</tr>
		<?php } ?>
<?php
}
?>


<header class="prodaq-header prodaq-header--sm prodaq-header--participant">
	<!-- no need for anything here other than bg -->
</header>
<div class="report__container">
	<div class="inner__container">
		<div class="row">
			<div class="col-md-12">
				<?php
				$type = 'campaign';
				$args=array(
					'post_type' => $type,
					'post_status' => 'publish',
					'posts_per_page' => -1,
					'caller_get_posts'=> 1
				);
				$persona_query = null;
				$persona_query = new WP_Query($args);?>
				<?php $countTotal = 0; ?>
				<?php if ($persona_query->have_posts()) : ?>
					<?php while ($persona_query->have_posts()) : $persona_query->the_post(); ?>
					<?php $findings_type = get_post_meta($post->ID, '_campaign_findings_type', true);?>
					 <?php if(!empty($findings_type)){ ?>
						<?php $countTotal++ ?>
					 <?php } ?>
					<?php endwhile; ?>
				<?php endif; ?>
				<h1><?php echo $countTotal; ?> Reports</h1>
				<table class="table">
					<thead>
						<tr>
							<th>
								Research Campaign
								<a href="#"><span data-toggle="sort-campaigns" class="sort-icon icon" data-icon="&#x25BE;"></span></a>
							</th>
							<th>
								Business Unit
								<a href="#"><span data-toggle="sort-business-unit" class="sort-icon icon" data-icon="&#x25BE;"></span></a>
							</th>
							<th>
								Business Sponsor
								<a href="#"><span data-toggle="sort-business-sponsor" class="sort-icon icon" data-icon="&#x25BE;"></span></a>
							</th>
							<th>
								Products
								<a href="#"><span data-toggle="sort-products" class="sort-icon icon" data-icon="&#x25BE;"></span></a>
							</th>
							<th>
								Date Completed
								<a href="#"><span data-toggle="sort-date" class="sort-icon icon" data-icon="&#x25BE;"></span></a>
							</th>
							<th>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php wp_reset_query();?>
						<?php
						$inactiveArgs=array(
							'post_type' => 'campaign',
							'posts_per_page' => -1
						);
						$inactive_campaign_query = null;
						$inactive_campaign_query = new WP_Query($inactiveArgs); ?>
						<?php if ($inactive_campaign_query->have_posts()) : ?>
							<?php while ($inactive_campaign_query->have_posts()) : $inactive_campaign_query->the_post(); ?>
								<?php generateCampaign($post); ?>
							<?php endwhile; ?>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div><!-- end report__container -->
<?php echo '<script src="' . get_template_directory_uri() . '/library/js/prodaq/report.js"></script>'; ?>
<?php get_footer(); ?>
