<?php

	function prodaq_dashboard_widget() {?>

		<div class="prodaq-widget">
			<h2>Welcome to Prodaq</h2>
			<p>Hooking up some pretty rad stuff.</p>
			<a href="post-new.php?post_type=participant" class="btn">New Participant</a>
			<a href="post-new.php?post_type=campaign" class="btn">New Campaign</a>
			<a href="post-new.php?post_type=persona" class="btn">New Persona</a>

			<div class="participant__search">
				<input id="search-participants" type="text" placeholder="Search Participants" data-toggle="hideseek" data-list=".participant-list" data-ignore=".ignore" data-nodata="No participants found">
				<ul class="participant-list">
					<?php
						global $post;
						$real_post = $post;
						$args=array(
							'post_type' => 'participant',
							'post_status' => 'publish',
							'orderby'=> 'title',
							'order' => 'ASC',
							'posts_per_page' => -1,
							'caller_get_posts'=> 1
						);
						$my_query = null;
						$my_query = new WP_Query($args);
						if( $my_query->have_posts() ) {
							while ($my_query->have_posts()) : $my_query->the_post();
								$item = get_the_title();
								echo '<li><a href="post.php?post=' . get_the_ID() . '&action=edit">' . $item . '</a></li>';
							endwhile;
						}
						wp_reset_query();
						$post = $real_post;
					?>
					<li class="ignore"><a href="edit.php?post_type=participant">View All</a></li>
				</ul>

			</div>

		</div>


	<?php }

	function prodaq_documentation_widget() {?>
		<div class="prodaq-widget">

			<ul class="prodaq-widget__nav">

				<li>
					<span>Post Types</span>
					<ul>
						<?php
						$args=array(
							'public'                => true,
							'exclude_from_search'   => false,
							'_builtin'              => false
						);
						$output = 'object'; // names or objects, note names is the default
						$post_types = get_post_types($args,$output);
						foreach ($post_types  as $post_type ) {
							if($post_type->name != 'tribe_events'){
								echo '<li><a href="#" data-target="' . $post_type->name . '">' . ucfirst($post_type->name) . 's</a></li>';
							}
						}
						?>
					</ul>
				</li>
				<li>
					<span>Data</span>
					<ul>
						<li><a href="#" data-target="wpalchemy">WPAlchemy</a></li>
					</ul>
				</li>
			</ul>
			<div class="documentation__pane active">
				<h3>Right now just listing keys for the data on different post types for reference. If need be search one in the codebase to see where it's defined and how it is accessed. - Dansel</h3>
			</div>
			<div class="documentation__pane" id="participant">
				<h2>Participants</h2>
				<h4>Keys</h4>
				<ul class="data-keys">
					<li>_participant_company - single</li>
					<li>_participant_industry - single</li>
					<li>_participant_size - single</li>
					<li>_participant_market - single</li>
					<li>_participant_experience - single</li>
					<li>_participant_city - single</li>
					<li>_participant_state - single</li>
					<li>_participant_country - single</li>
					<li>_participant_region - single</li>
					<li>_participant_experience - single</li>
					<li>_participant_title - single</li>
					<li>_participant_email - single</li>
					<li>_participant_phone - single</li>
					<li>_participant_linkedin - single</li>
					<li>_participant_primary_persona - single</li>
					<li>_participant_secondary_personas - multi</li>
					<li>_participant_meetings - array
						<ul>
							<li>meetingdate - single</li>
							<li>interview_campaign - single</li>
							<li>transcript - single</li>
							<li>recording - single</li>
							<li>notes - single</li>
						</ul>
					</li>
					<li>_participant_quotes - array
						<ul>
							<li>type - single</li>
							<li>exec - single</li>
							<li>quote - single</li>
							<li>campaign - single</li>
							<li>clip - single</li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="documentation__pane" id="campaign">
				<h2>Campaigns</h2>
				<h4>Keys</h4>
				<ul class="data-keys">
					<li>_campaign_active - single</li>
					<li>_campaign_start_date - single</li>
					<li>_campaign_end_date - single</li>
					<li>_campaign_moderators - single</li>
					<li>_campaign_researchers - single</li>
					<li>_campaign_description - single</li>
					<li>_campaign_design_team - single</li>
					<li>_campaign_management_team - single</li>
					<li>_campaign_goals - array
						<ul>
							<li>goal - single</li>
						</ul>
					</li>
					<li>_campaign_findings_type - single</li>
					<li>_campaign_findings - single</li>
					<li>_campaign_findings_report - single</li>
					<li>_campaign_docs - array
						<ul>
							<li>title - single</li>
							<li>document - single</li>
						</ul>
					</li>
					<li>_campaign_findings_participants - multi</li>
				</ul>
			</div>
			<div class="documentation__pane" id="persona">
				<h2>Personas</h2>
				<h4>Keys</h4>
				<ul class="data-keys">
					<li>_persona_role - single</li>
					<li>_persona_type - single</li>
					<li>_persona_quote - single</li>
					<li>_persona_description - single</li>
					<li>_persona_hero - single</li>
					<li>_persona_summary - single</li>
					<li>_persona_participants - multi</li>
					<li>_persona_pains - array
						<ul>
							<li>pain_point - single</li>
						</ul>
					</li>
					<li>_persona_goals - array
						<ul>
							<li>goal - single</li>
						</ul>
					</li>
					<li>_persona_activities - array
						<ul>
							<li>pain_activity - single</li>
						</ul>
					</li>
					<li>_persona_connections - single</li>
					<li>_persona_notes - single</li>
				</ul>
			</div>
			<div class="documentation__pane" id="wpalchemy">
				<h2>WPAlchemy</h2>
				<p><a href="http://www.farinspace.com/wpalchemy-metabox/" target="_blank">http://www.farinspace.com/wpalchemy-metabox/</a></p>
				<p>To build out metaboxes for the custom post types, there were a number of plugin options to choose from. Unfortunately, none (at least at the time) left the flexibility of styling the back-end like the WPAlchemy PHP Class. It no longer has great support but there has been some decent contributions made that allowed some considerable tweaks, especially in regards to the media uploader. Hopefully the community continues to provide enhancements.</p>
				<p>For each post type, we define a metabox and its corresponding template. To access the custom post fields on the front-end, we use something along the lines of <span>get_post_meta($post->ID, '_customposttype_key', true)</span> which will return either a singular value or an array of values that can be accessed in a loop. We're using <span>WPALCHEMY_MODE_EXTRACT</span> storage mode so that we can access arrays as first tier variables. <a href="http://www.farinspace.com/wpalchemy-metabox-data-storage-modes/" target="_blank">More on storage mode.</a> This means for repeating groups of fields you could can store the key and access contents with only one loop.</p>
			</div>
		</div>
	<?php }


	function add_prodaq_dashboard_widgets() {
		wp_add_dashboard_widget('prodaq_dashboard_widget', 'Site Info', 'prodaq_dashboard_widget');
		wp_add_dashboard_widget('prodaq_documentation_widget', 'Documentation', 'prodaq_documentation_widget');
	}
	add_action('wp_dashboard_setup', 'add_prodaq_dashboard_widgets');

	function remove_dashboard_meta() {
					remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
					remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
					remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
					remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
					remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
					remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
					remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
					remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
					remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
	}
	add_action( 'admin_init', 'remove_dashboard_meta' );
