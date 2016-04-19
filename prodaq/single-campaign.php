<?php
/**
 * The Template for displaying all single campaigns
 *
 * @package WordPress
 */

get_header(); ?>

<div class="campaign__content">
<?php while ( have_posts() ) : the_post(); ?>

	<div class="campaign">
			<!-- custom stuff here -->
			<?php include(TEMPLATEPATH . '/includes/campaign/campaign-var.php'); ?>

			<?php include(TEMPLATEPATH . '/includes/campaign/campaign-header.php'); ?>

			<section class="campaign__overview">
				<div class="container">
					<h2>Overview</h2>
					<div class="row">
						<div class="col-md-6">
							<?php if(!empty($campaignDescription)){ ?>

								<h4>Description</h4>
								<?php echo '<p>' . $campaignDescription .'</p>'; ?>

							<?php }?>
							<?php
									if(!empty($goals[0]['goal'])){ ?>
										<h4>Goals</h4>
										<ol>
											<?php
											foreach($goals as $goal){
												echo '<li>' . $goal['goal'] . '</li>';

											}?>
										</ol>
								<?php } ?>
						</div>
						<div class="col-md-6">
							<div class="row">
								<?php if(!empty($startDate)){ ?>
								<div class="col-md-6">
									<h4>Dates</h4>
									<p><?php echo $startDate; if(!empty($endDate)) : echo ' - ' . $endDate; endif?></p>
								</div>
								<?php }?>
								<?php if(!empty($campaignResearchers)){ ?>
								<div class="col-md-6">
									 <h4>Researchers</h4>
									 <p><?php echo $campaignResearchers; ?></p>
								</div>
								<?php }?>

								<?php if(!empty($designTeam)){ ?>
								<div class="col-md-6">
									 <h4>Product Design Team</h4>
									 <p><?php echo $designTeam; ?></p>
								</div>
								<?php }?>

								<?php if(!empty($managementTeam)){ ?>
								<div class="col-md-6">
										<h4>Product Management Team</h4>
										<p><?php echo $managementTeam; ?></p>
								</div>
								<?php }?>
							</div>
						</div>

					</div>
				</div>
			</section>
			<section class="campaign__assets">
				<?php include(TEMPLATEPATH . '/includes/campaign/campaign-assets.php'); ?>
			</section>
			<section class="campaign__participants">
				<?php include(TEMPLATEPATH . '/includes/campaign/participant-list.php'); ?>
			</section>


	</div>
	<?php include(TEMPLATEPATH . '/includes/campaign/participant-modals.php'); ?>
<?php endwhile; ?>
</div>



<?php get_footer(); ?>
