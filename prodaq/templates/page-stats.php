<?php
/*
Template Name: Page - Stats
*/

get_header();
?>

<div class="page__header">
	<div class="container">
		<h1>Statistics</h1>
	</div>
</div>
<section class="stats__content">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-push-2">
				<div class="bar-chart">
					
				</div>
				<?php
				// $meetingArr = array(); needed if we want json

				$participantCount = 0;
				$quarterCounts = array();
				$amersCount = 0; $emeaCount = 0; $apacCount = 0;
				$naCount = 0; $microCount = 0; $smallCount = 0; $mediumCount = 0; $largeCount = 0; $megaCount = 0;
				$lt5Count = 0; $fiveToTenCount = 0; $gt10Count = 0;
				$industryCounts = array();
				$campaignCounts = array();
				$personaCounts = array();

				// Query stuff
				$participant_args=array(
					'post_type' => 'participant',
					'post_status' => 'publish',
					'posts_per_page' => -1,
					'orderby'=> 'title',
					'order' => 'ASC',
					'caller_get_posts'=> 1
				);
				$participant_query = null;
				$participant_query = new WP_Query($participant_args);

				$campaign_args=array(
					'post_type' => 'campaign',
					'post_status' => 'publish',
					'posts_per_page' => -1,
					'caller_get_posts'=> 1
				);
				$campaign_query = null;
				$campaign_query = new WP_Query($campaign_args);
				$availableCampaigns = array();
				if ($campaign_query->have_posts()) :
					while ($campaign_query->have_posts()) : $campaign_query->the_post();
					$availableCampaigns[get_the_id()] = get_the_title();
					endwhile;
				endif;
				
				$persona_args=array(
					'post_type' => 'persona',
					'post_status' => 'publish',
					'posts_per_page' => -1,
					'caller_get_posts'=> 1
				);
				$persona_query = null;
				$persona_query = new WP_Query($persona_args);
				$availablePersonas = array();
				if ($persona_query->have_posts()) :
					while ($persona_query->have_posts()) : $persona_query->the_post();
					$availablePersonas[get_the_id()] = get_the_title();
					endwhile;
				endif;
				
				if ($participant_query->have_posts()) :
					echo '<ul class="isotope-filter row">';
					while ($participant_query->have_posts()) : $participant_query->the_post();

						// Need to access these outside the loop so update counts
						$participantCount++;
						include( get_template_directory() . '/includes/stats/region-count.php');

						include( get_template_directory() . '/includes/stats/meetings.php');
						include( get_template_directory() . '/includes/stats/market-cap.php');
						include( get_template_directory() . '/includes/stats/experience-level.php');
						include( get_template_directory() . '/includes/stats/industry.php');
						include( get_template_directory() . '/includes/stats/campaigns.php');
						include( get_template_directory() . '/includes/stats/personas.php');

						// Theres a lot going on in this file but wanted to separate it out just to clean up this screen a bit. it has a lot to do with the actual structure of the list element
						include( get_template_directory() . '/includes/stats/complete-profile.php');

						//combine region with meeting quarters into a string to add as filter
						$classStr = $primaryPersonaStr . ' ' . $campaignsStr . ' ' . $industryStr . ' ' . $marketCap . ' ' . $expLevelStr . ' ' . $region . $meetingStr;

						echo '<li class="isotope-list__item participant__stat ' . $classStr .'">';
						echo '<div class="progress-meter" id="progress-'. $participantCount . '" data-complete="'. $completeness . '">';
						echo '<a class="participant-wrapper" data-toggle="tooltip" href="/wp-admin/post.php?post='. get_the_id() . '&action=edit" title="';
						if(empty($incompleteArr)) {
							echo "Complete!";
						}
						else{
							echo 'Missing: ';
							$incompleteIndex = 0;
							foreach($incompleteArr as $item){
								if($incompleteIndex > 0) { echo ', '; }
								echo $item;
								$incompleteIndex ++;
							}
						}
						echo '">';
						if(has_post_thumbnail(get_the_ID())){
							echo get_the_post_thumbnail(get_the_ID(), 'participant-small');
							//echo '<img width="30px" src="' .  get_stylesheet_directory_uri() . '/library/images/blank.jpg">';
						}
						else{
							echo '<img width="30px" src="' .  get_stylesheet_directory_uri() . '/library/images/blank.jpg">';
						}
						echo '</a>';
						echo '</div>';
						echo '<strong>' . get_the_title() . '</strong>';
						echo '</li>';

						// don't need this right now
						//include( get_template_directory() . '/includes/stats/json.php');
					endwhile;
					echo '</ul>'; ?>
				</div>
				<div class="col-md-2 col-md-pull-10">
					<?php
					$relevantRegionTotal = $amersCount + $emeaCount + $apacCount;
					?>
					<ul class="filters stats-filters" data-filter-group="all">
						<li class="selected"><a href="#" data-total-count="<?php echo $participantCount; ?>" data-filter="*"><?php echo $participantCount; ?> Total Participants</a></li>
					</ul>
					
					<ul class="filters stats-filters" data-filter-group="quarters" data-chart-max="4">
						<li class="divider">Quarter</li>
						<?php
						krsort($quarterCounts);
						foreach($quarterCounts as $year => $quarters){
							foreach($quarters as $quarter => $numberOfMeetings){
						?>
								<li>
									<a class="quarters" data-count="<?php echo $numberOfMeetings; ?>" href="#" data-filter="<?php echo '.' . $quarter . $year;?>"><?php echo $year . ' ' . strtoupper($quarter) ?></a>
									<small>(<?php echo $numberOfMeetings; ?>)</small>
								</li>
						<?php
							}
						}
						?>
					</ul>
					<ul class="filters stats-filters" data-filter-group="region">
						<li class="divider">Region</li>
						<li>
							<a href="#" data-count="<?php echo $amersCount; ?>" data-filter=".amers">AMERS</a>
							<small>(<?php echo $amersCount; ?>)</small>
						</li>
						<li>
							<a href="#" data-count="<?php echo $emeaCount; ?>" data-filter=".emea">EMEA</a>
							<small>(<?php echo $emeaCount; ?>)</small>
						</li>
						<li>
							<a href="#" data-count="<?php echo $apacCount; ?>" data-filter=".apac">APAC</a>
							<small>(<?php echo $apacCount; ?>)</small>
						</li>
					</ul>
					<ul class="filters stats-filters">
						<li class="divider">Market Cap</li>
						<li>
							<a href="#" data-count="<?php echo $naCount; ?>" data-filter=".n-a">N/A</a>
							<small>(<?php echo $naCount; ?>)</small>
						</li>
						<li>
							<a href="#" data-count="<?php echo $microCount; ?>" data-filter=".micro">Micro</a>
							<small>(<?php echo $microCount; ?>)</small>
						</li>
						<li>
							<a href="#" data-count="<?php echo $smallCount; ?>" data-filter=".small">Small</a>
							<small>(<?php echo $smallCount; ?>)</small>
						</li>
						<li>
							<a href="#" data-count="<?php echo $mediumCount; ?>" data-filter=".medium">Medium</a>
							<small>(<?php echo $mediumCount; ?>)</small>
						</li>
						<li>
							<a href="#" data-count="<?php echo $largeCount; ?>" data-filter=".large">Large</a>
							<small>(<?php echo $largeCount; ?>)</small>
						</li>
						<li>
							<a href="#" data-count="<?php echo $megaCount; ?>" data-filter=".mega">Mega</a>
							<small>(<?php echo $megaCount; ?>)</small>
						</li>
					</ul>
					<ul class="filters stats-filters">
						<li class="divider">Experience</li>
						<li>
							<a href="#" data-count="<?php echo $lt5Count; ?>" data-filter=".lt5" data-label="< 5 Years">Less Than 5 Years</a>
							<small>(<?php echo $lt5Count; ?>)</small>
						</li>
						<li>
							<a href="#" data-count="<?php echo $fiveToTenCount; ?>" data-filter=".fiveToTen">5 - 10 Years</a>
							<small>(<?php echo $fiveToTenCount; ?>)</small>
						</li>
						<li>
							<a href="#" data-count="<?php echo $gt10Count; ?>" data-filter=".gt10" data-label="10+ Years">More Than 10 Years</a>
							<small>(<?php echo $gt10Count; ?>)</small>
						</li>
					</ul>
					<ul class="filters stats-filters">
						<li class="divider">Industry</li>
						<li>
							<select class="select2"><option></option>
							<?php
									$industryJson = file_get_contents(get_template_directory() . '/library/data/industry.json');
									$industryArr = json_decode($industryJson, true);
									$industries = $industryArr[industryCodes];
									arsort($industryCounts);
									foreach ($industryCounts as $industryKey => $industryValue) {
										foreach($industries as $industry){
											if($industry[code] == $industryKey){
												echo '<option value=".ind' . $industryKey . '" data-meetings="' . $industryValue . '">' . $industry['description']  . ' (' . $industryValue . ')</option>';
											}
										}
									}
							?>
							</select>
						</li>
					</ul>
					<ul class="filters stats-filters">
						<li class="divider">Campaigns</li>
						<li>
							<select class="select2"><option></option>
							<?php
									arsort($campaignCounts);
									foreach ($campaignCounts as $campaignKey => $campaignValue) {
										if(!empty($availableCampaigns[$campaignKey])) {
											echo '<option value=".camp' . $campaignKey . '" data-meetings="' . $campaignValue . '">' . $availableCampaigns[$campaignKey]  . ' (' . $campaignValue . ')</option>';
										}
									}
							?>
							</select>
						</li>
					</ul>
					<ul class="filters stats-filters">
						<li class="divider">Primary Persona</li>
						<li>
							<select class="select2"><option></option>
							<?php
									arsort($personaCounts);
									foreach ($personaCounts as $personaKey => $personaValue) {
										if(!empty($availablePersonas[$personaKey])) {
											echo '<option value=".pers' . $personaKey . '" data-meetings="' . $personaValue . '">' . $availablePersonas[$personaKey]  . ' (' . $personaValue . ')</option>';
										}
									}
							?>
							</select>
						</li>
					</ul>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>
