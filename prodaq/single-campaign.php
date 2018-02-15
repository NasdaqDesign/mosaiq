<?php
/**
 * The Template for displaying all single campaigns
 *
 * @package WordPress
 */

get_header(); ?>

<header class="prodaq-header prodaq-header--sm prodaq-header__campaign">
	<div class="prodaq-header__title">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h1><?php echo get_the_title(); ?></h1>
				</div>
				<div class="col-md-4">
					<div class="campaign__meta">
						<p><em><?php the_modified_date( $d, 'Last Updated '); ?> </em></p>
						<?php if (is_user_logged_in()) {
							echo '<a href="' . admin_url() . 'post.php?post='. get_the_id() . '&action=edit">Edit</a>';
						} ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

<div class="campaign__content">
<?php while ( have_posts() ) : the_post(); ?>

	<div class="campaign">
			<!-- custom stuff here -->
			<?php include(TEMPLATEPATH . '/includes/campaign/campaign-var.php'); ?>

			<section class="campaign__overview">
				<div class="container">

					<?php if(!empty($findings_type) || !empty($assets)){ ?>
						<?php
							if(!empty($findings_type)){
								if($findings_type == 'document'){
									echo '<a class="btn-primary right" href="' . $findings . '">Download Findings Report</a>';
								}
							}
							?>
					<?php } ?>

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

								<h4>Team</h4>

								<?php if(!empty($campaignResearchers)){ ?>
									 <p><strong>Researchers</strong></p>
									 <p><?php echo $campaignResearchers; ?></p>
								<?php }?>

								<?php if(!empty($designTeam)){ ?>
									 <p><strong>Product Design Team</strong></p>
									 <p><?php echo $designTeam; ?></p>
								<?php }?>

								<?php if(!empty($managementTeam)){ ?>
										<p><strong>Product Management Team</strong></p>
										<p><?php echo $managementTeam; ?></p>
								<?php }?>
						</div>

						<div class="col-md-6">

							<?php if(!empty($startDate)){ ?>
								<h4>Dates</h4>
								<p><?php echo $startDate; if(!empty($endDate)) : echo ' - ' . $endDate; endif?></p>
							<?php }?>

							<h4>Interview Script and Files</h4>
							<?php if(!empty($findings_type) || !empty($assets)){ ?>
							<ul class="script__files_list">
								<?php
									echo '<li>';

									if(!empty($findings_type)){
										if($findings_type == 'document'){
											echo '<a href="' . $findings . '">Research Findings and Report</a> <br />' . $startDate
										;
										}
										else{
											$report = get_post($findings_report);
											echo '<a href="' . get_permalink($findings_report) . '' . $report->post_title . ' Report</a>';
										}

									}
									else{
										echo '<p><em>Findings report not yet available.</em></p>';
									}
									echo '</li>';
								if(!empty($assets)){
										$docCount = 0;
										foreach($assets as $asset){
											$ext = pathinfo($asset['document'], PATHINFO_EXTENSION);
											if($ext == 'jpg' || $ext == 'png'){
												$icon = 'image';
											}
											else if($ext == 'docx' ){
												$icon = 'docx';
											}
											else if($ext == 'pdf' ){
												$icon = 'pdf';
											}
											else if($ext == 'xlsx'){
												$icon = 'xlsx';
											}
											else if($ext == 'zip'){
												$icon = 'zip';
											}
											else if($ext == 'pptx'){
												$icon = 'pptx';
											}
											echo '<li>
												<a href="' . $asset['document'] . '">' . $asset['title'] . '</a>' . '<br />' . $startDate .
											'</li>';
										}
									}
									?>
							</div>
							<?php } ?>
						</div>

						<div class="clear-both"></div>

						<h4>Participants</h4>
						<table class="table">
							<thead>
								<tr>
									<th>Participant and Title</th>
									<th>Role</th>
									<th>Recordings</th>
									<th>Transcript</th>
									<th>Summary</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
								<?php
								function renderAsset($assetCount, $assetTypeClass, $assetTitle) {
									if($assetCount == 0) return;
									if($assetCount > 1) $assetBadge = '<span class="badge">' . $assetCount . '</span>';
									echo '<li data-toggle="tooltip" data-placement="bottom" data-original-title="' . $assetTitle . '"><i class="fa ' . $assetTypeClass . '"></i>' . $assetBadge . '</li>';
								}
								$itemCount = 0;
									foreach($researchParticipants as $participant){
										$participant = explode(' -', $participant); // This is so we don't trip up on hyphens but actually extract their full name (excluding company and title)
										$participantinfo = get_page_by_title($participant[0], OBJECT, 'participant');
										$participant_meetings = get_post_meta($participantinfo->ID, '_participant_meetings', TRUE);
										$recordShow = get_post_meta($post->ID, '_participant_record_show', true);
										$participantImg = get_the_post_thumbnail($participantinfo->ID, 'participant-thumb');
										$company_size = get_post_meta($participant->ID,'_participant_size',TRUE);
										$title = get_post_meta($participantinfo->ID,'_participant_title',TRUE);
										$quotes = get_post_meta($participantinfo->ID,'_participant_quotes',TRUE);
										$meetings = get_post_meta($participantinfo->ID,'_participant_meetings',TRUE);
										$recordShow = get_post_meta($participantinfo->ID,'_participant_record_show',TRUE);
										$itemCount ++;
										?>
										<tr <?php if(!empty( $recordShow )){ echo 'class="--hide"'; } ?>>
											<td>

												<div class="row">
													<div class="col-md-4">
														<div class="thumb__wrapper">
															<?php echo'<a class="participant-wrapper" data-toggle="modal" data-target="#participant-' . $participantinfo->ID . '" href="#">';  ?>
																<?php if(!empty(get_the_post_thumbnail($participantinfo->ID))) {
																	echo get_the_post_thumbnail($participantinfo->ID);
																}
																else {
																	echo '<img width="100px" src="' . get_asset_if_exists("/library/images/blank.jpg") . '">';
																}
																?>
															</a>
														</div>
													</div>
													<div class="col-md-7">
														<p>
															<?php echo $participantinfo->post_title;
																$linked = get_post_meta($participantinfo->ID, '_participant_linkedin', TRUE);
															?>
														</p>
													</div>
												</div>
											</td>
											<td>
												<p><?php echo $title; ?></p>
											</td>
											<td>
												<?php if(!empty($meetings)) {
													$groupedMeetings = array();
													foreach($meetings as $meeting){
														if(!array_key_exists($meeting['interview_campaign'], $groupedMeetings)){
															$groupedMeetings[$meeting['interview_campaign']] = array();
														}
														array_push($groupedMeetings[$meeting['interview_campaign']], $meeting);
													}
													foreach($groupedMeetings as $meetingGroup){
														$campaign_id = $meetingGroup[0]['interview_campaign'];
														$campaign = get_post($campaign_id); ?>

															<?php
															foreach($meetingGroup as $meeting){
																if(!empty($meeting['recording'])){
																	echo '<i class="icon blue">check</i>';
																}
															}
													} // foreach $groupedMeetings
												} // if $meetings
												?>
											</td>
											<td>
												<?php
													foreach($participant_meetings as $meeting){
														if($meeting['interview_campaign'] == $post->ID){
															if(isset($meeting['transcript'])){
																echo '<i class="icon blue">check</i>';
															}
														}
													}
												?>
											</td>
											<td>
												<?php
													foreach($participant_meetings as $meeting){
														if($meeting['interview_campaign'] == $post->ID){
															if(isset($meeting['interview_campaign_summary'])){
																echo '<i class="icon blue">check</i>';
															}
														}
													}
												?>
											</td>
											<td>
												<?php
												if(!empty($participant_meetings)){
													foreach($participant_meetings as $meeting){
														if($meeting['interview_campaign'] == $post->ID){
																echo '<p>'. $meeting['meetingdate'] . '</p>';
														}
													}
												}?>
											</td>
										</tr>
									<?php
										}
									?>
							</tbody>
						</table>
				</div>

			</section>
	</div>
	<?php include(TEMPLATEPATH . '/includes/campaign/participant-modals.php'); ?>
<?php endwhile; ?>
</div>



<?php get_footer(); ?>
