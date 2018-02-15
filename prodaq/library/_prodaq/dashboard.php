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

	function main_documentation_widget() {?>

		<h1>Mosaiq</h1>
		<p>Research Asset Management Platform</p>
		<h2></a>Prerequisites</h2>
		<p>This is a Wordpress theme. You will need to have a Wordpress site running to install the theme.</p>
		<h2>Installation</h2>
		<ul>
		<li>Download and save the <code>prodaq/</code> and <code>prodaq-child/</code> directories to your sites <code>wp-content/themes</code> directory.</li>
		<li>Activate the Prodaq Child theme</li>
		<li>Import sample data using the <code>resources/sample-data.xml</code>. You will want to use the Wordpress importer plugin for this task.</li>
		<li>Set the home page to be static by going to <code>Settings/Reading</code>, choosing the "A static page" radio and picking "Home" from the dropdown</li>
		<li>Create the main navigation by going to <code>Apperance/Menus</code>. The "Main" menu should already be in place, you just need to check the theme locations "The Main Menu" checkbox in the Menu Settings section and save.</li>
		<li><em>OPTIONAL</em> Set permalinks to Post Name inside <code>Settings/Permalinks</code></li>
		</ul>
		<h2>Customizing the Theme</h2>
		<p>To make this easy to update and add new features, we have built the theme as a child theme that inherits from a parent theme. Any customization should be made in <code>prodaq-child</code>. This will allow us to make changes to the parent <code>prodaq</code> theme without overriding your customizations.</p>
		<h3>Your Logo</h3>
		<p>The default theme is pulling the logo files from <code>prodaq/library/images/logo.png</code> and <code>prodaq/library/images/logo-dark.png</code>. It is expecting these logos to be 120x37px. To use your logo, you may save your logo with these same dimensions and the same file names as above. Alternatively, you can alter the CSS to point to your file path instead of <code>logo.png</code> and <code>logo-dark.png</code>.</p>
		<h2>Other Information</h2>
		<ul>
		<li>All scripts and styles are registered and enqueued on a page/template basis within either <code>/library/bones.php</code> (for the boiler plate stuff) and <code>/library/_product/scripts.php</code> for all prodaq related items.</li>
		<li>The main LESS file for the theme is in <code>/library/less/prodaq/theme.less</code> (imported in <code>/library/less/style.less</code>) and the admin styles are in <code>/library/less/admin/prodaq-admin.less</code>.</li>
		</ul>
		<h2>Post Types</h2>
		<h3>Participant</h3>
		<p>Admin: <code>/library/_prodaq/participant/</code><br>
		List: <em>no archive</em><br>
		Single: <code>single-participant.php</code><br>
		LESS: <code>/library/less/prodaq/post/participant.less</code><br>
		JS: <em>no js</em><br>
		Participants are central to most of the other post types. This is where we upload meeting transcripts, recordings, quotes, and any other data we want to associate with the participants like region, role, company size, etc. We can also assign them a primary persona. The secondary personas are in there but not being used currently. On the front end, they have a small profile page that lists out most of this data and while searchable, play a larger role in the data for other post types.</p>
		<h3>Campaign</h3>
		<p>Admin: <code>/library/_prodaq/campaign/</code><br>
		List: <code>archive-campaign.php</code><br>
		Single: <code>single-campaign.php</code><br>
		LESS: <code>/library/less/prodaq/post/campaign.less</code><br>
		JS: <code>/library/js/prodaq/campaign.js</code><br>
		Campaigns include any information about a research campaign that pertains to the team, timeline, description, etc. You also select which participants have been interviewed from a list of participants in the system. The campaign displays these participants and any related transcripts, recordings, and quotes that have been entered in the participant post (each meeting or quote is associated with a campaign to correctly cross map).</p>
		<h3>Persona</h3>
		<p>Admin: <code>/library/_prodaq/persona/</code><br>
		List: <code>archive-persona.php</code><br>
		Single: <code>single-persona.php</code><br>
		Stats: <code>/templates/page-persona-stats.php</code><br>
		LESS: <code>/library/less/prodaq/post/persona.less</code><br>
		JS: <code>/library/js/prodaq/persona.js</code><br>
		Personas are always a little in flux on what information we want to record. Most importantly, we are working to cross map personas with related participants so we can begin to show variations within personas (there are 6 Rebeccas, 2 of which have Sharon responsibilities, 3 of which are located in EMEA, etc...). Selecting associated participants here checks each participant's primary persona if listed. If it matches, they're added to the primary bucket, if there is a mismatch, they are assumed to share responsibilities but their primary may be someone else. There is also a larger persona stats page where we can look at various personas organized by the data of their associated particpants.</p>
		<h2>Custom Pages</h2>
		<h3>Stats</h3>
		<p>Admin: <em>aggregates from participant posts</em><br>
		Page: <code>/templates/page-stats.php</code><br>
		A spot to begin breaking down participants by various data.</p>

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
						<li><a href="#" data-target="search">Ajax Search</a></li>
						<li><a href="#" data-target="directory">Directory</a></li>
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
					<li>_campaign_product - single</li>
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
					<li>_persona_url - single</li>
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
			<div class="documentation__pane" id="product">
				<h2>Products</h2>
				<h4>Keys</h4>
				<ul class="data-keys">
					<li>_product_description - single</li>
					<li>_product_our_goals - single</li>
					<li>_product_biz_goals - single</li>
					<li>_product_team - array
						<ul>
							<li>name - single</li>
							<li>email - single</li>
							<li>role - single</li>
							<li>current - single</li>
						</ul>
					</li>
					<li>_product_product_audience - single</li>
					<li>_product_personas - multi</li>
					<li>_product_participants - multi</li>
					<li>_product_competitors - array
						<ul>
							<li>name - single</li>
							<li>name - single</li>
						</ul>
					</li>
					<li>_product_competitor_summary - single</li>
					<li>_product_size - single</li>
					<li>_product_site - single</li>
					<li>_product_git - single</li>
					<li>_product_basecamp - single</li>
					<li>_product_images - array
						<ul>
							<li>image - single</li>
							<li>caption - single</li>
						</ul>
					</li>
					<li>_product_docs - array
						<ul>
							<li>title - single</li>
							<li>document - single</li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="documentation__pane" id="iteration">
				<h2>Iterations</h2>
				<h4>Keys</h4>
				<ul class="data-keys">
					<li>_iteration_type - single</li>
					<li>_iteration_next - single</li>
					<li>_iteration_approach - single</li>
					<li>_iteration_participants - multi</li>
					<li>_iteration_images - array
						<ul>
							<li>image - single</li>
							<li>annotation_array - array
								<ul>
									<li>id - single</li>
									<li>heading - single</li>
									<li>annotation - single</li>
									<li>xperc - single</li>
									<li>yperc - single</li>
								</ul>
							</li>
							<li>quotes - multi</li>
						</ul>
					</li>
					<li>_iteration_takeaway - single</li>
					<li>_iteration_quotes - multi</li>

				</ul>
			</div>
			<div class="documentation__pane" id="report">
				<h2>Reports</h2>
				<h4>Keys</h4>
				<ul class="data-keys">
					<li>_report_researchers - single</li>
					<li>_report_research_goals - single</li>
					<li>_report_approach - single</li>
					<li>_report_audience - single</li>
					<li>_report_methodology - single</li>
					<li>_report_themes - array
						<ul>
							<li>theme - single</li>
							<li>description - single</li>
						</ul>
					</li>
					<li>_report_participants - multi</li>
					<li>_report_quotes - multi</li>
					<li>_report_images - array
						<ul>
							<li>image - single</li>
							<li>annotation_array - array
								<ul>
									<li>id - single</li>
									<li>heading - single</li>
									<li>annotation - single</li>
									<li>xperc - single</li>
									<li>yperc - single</li>
								</ul>
							</li>
							<li>quotes - multi</li>
						</ul>
					</li>
					<li>_report_next_steps - single</li>
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
		wp_add_dashboard_widget('main_documentation_widget', 'Documentation', 'main_documentation_widget');
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
