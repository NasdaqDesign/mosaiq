<?php
/*
Template Name: Home Page Template
*/
?>

<?php get_header(); ?>

<div class="hero__container">

	<div class="container">
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

	 <h2>WPAlchemy</h2>
	 <p><a href="http://www.farinspace.com/wpalchemy-metabox/" target="_blank">http://www.farinspace.com/wpalchemy-metabox/</a></p>
	 <p>To build out metaboxes for the custom post types, there were a number of plugin options to choose from. Unfortunately, none (at least at the time) left the flexibility of styling the back-end like the WPAlchemy PHP Class. It no longer has great support but there has been some decent contributions made that allowed some considerable tweaks, especially in regards to the media uploader. Hopefully the community continues to provide enhancements.</p>
	 <p>For each post type, we define a metabox and its corresponding template. To access the custom post fields on the front-end, we use something along the lines of <span>get_post_meta($post->ID, '_customposttype_key', true)</span> which will return either a singular value or an array of values that can be accessed in a loop. We're using <span>WPALCHEMY_MODE_EXTRACT</span> storage mode so that we can access arrays as first tier variables. <a href="http://www.farinspace.com/wpalchemy-metabox-data-storage-modes/" target="_blank">More on storage mode.</a> This means for repeating groups of fields you could can store the key and access contents with only one loop.</p>

	</div>
</div>





<?php get_footer(); ?>
