
# Research Asset Management Platform

## Prerequisites
This is a Wordpress theme. You will need to have a Wordpress site running to install the theme. 

## Installation
* Download this repository and save it to `wp-content/themes/prodaq`

(In example case, root is ndaq.pd and vhosts are all configured)

* Setup a db by going to the databases tab of ndaqpd.dev/phpmyadmin. Create a db named `ndaq` with collation set to `utf8_unicode_ci`. This is being referenced in the `wp-config.php`.
* If you named your root directory anything other than `ndaq.pd`, head to the `wp-config.php` file and update the host to the name of your root. If you named your db anything different, be sure to update that as well.
* Proceed to `ndaq.pd/work/wp-admin` to install Wordpress.
* Activate Prodaq theme if not active (should be default in /wp-includes/default-constants)
* Set permalinks to Post Name: `http://ndaq.pd/work/sample-post/` inside `Settings/Permalinks`
* Import db data via (links coming soon...)

#### Troubleshooting
* If you have trouble installing plugins, or updating Wordpress locally, there are a number of resources out there. I'll try to list some here.

## Theme Development
There is a codekit.config file inside the root folder which currently handles all LESS compilation and JS minification within `/work/wp-content/themes/prodaq`. When creating a project in codekit, just drop the root folder in and everything should be taken care of.
TODO: Get grunt working.  

* All scripts and styles are registered and enqueued on a page/template basis within either `/library/bones.php` (for the boiler plate stuff) and `/library/_product/scripts.php` for all prodaq related items.
* The main LESS file for the theme is in `/library/less/prodaq/theme.less` (imported in `/library/less/style.less`) and the admin styles are in `/library/less/admin/prodaq-admin.less`.


## Post Types

### Participant
Admin: `/library/_prodaq/participant/`  
List: *no archive*   
Single: `single-participant.php`  
LESS: `/library/less/prodaq/post/participant.less`   
JS: *no js*   
Participants are central to most of the other post types. This is where we upload meeting transcripts, recordings, quotes, and any other data we want to associate with the participants like region, role, company size, etc. We can also assign them a primary persona. The secondary personas are in there but not being used currently. On the front end, they have a small profile page that lists out most of this data and while searchable, play a larger role in the data for other post types.

### Campaign
Admin: `/library/_prodaq/campaign/`   
List: `archive-campaign.php`  
Single: `single-campaign.php`  
LESS: `/library/less/prodaq/post/campaign.less`   
JS: `/library/js/prodaq/campaign.js`   
Campaigns include any information about a research campaign that pertains to the team, timeline, description, etc. You also select which participants have been interviewed from a list of participants in the system. The campaign displays these participants and any related transcripts, recordings, and quotes that have been entered in the participant post (each meeting or quote is associated with a campaign to correctly cross map).

### Persona
Admin: `/library/_prodaq/persona/`   
List: `archive-persona.php`  
Single: `single-persona.php`  
Stats: `/templates/page-persona-stats.php`  
LESS: `/library/less/prodaq/post/persona.less`   
JS: `/library/js/prodaq/persona.js`   
Personas are always a little in flux on what information we want to record. Most importantly, we are working to cross map personas with related participants so we can begin to show variations within personas (there are 6 Rebeccas, 2 of which have Sharon responsibilities, 3 of which are located in EMEA, etc...). Selecting associated participants here checks each participant's primary persona if listed. If it matches, they're added to the primary bucket, if there is a mismatch, they are assumed to share responsibilities but their primary may be someone else. There is also a larger persona stats page where we can look at various personas organized by the data of their associated particpants.

### Product
Admin: `/library/_prodaq/product/`   
List: `archive-product.php`  
Single: `single-product.php`  
LESS: `/library/less/prodaq/post/product.less`   
JS: `/library/js/prodaq/product.js`   
This is currently in flux. There are two intended functions for this post type. For Luchas and on-boarding, we want to take note of product specific information that may help us get a better understanding of the stakeholders, timeline, history, goals, etc. For actual stakeholders, this becomes more of a marketing tool for Prodaq, case studies of the work we have done and documentation related to that work.

### Discovery Report
Admin: `/library/_prodaq/report/`   
List: *no archive*  
Single: `single-report.php`  
LESS: `/library/less/prodaq/post/reports.less`  
This is a bit half baked but its essentially a quick presentation tool for creating a discovery report. This differs from a products evolution as it usually just outlines the process and takeaways from the discovery phase of a new campaign. It does however allow image annotation and once you've selected associated participants, you can pull from relevant supporting quotes. The structure of each presentation is: Title, Research & Approach, Methodology, Participants, Themes, Quotes, Screenshots, Next Steps. TODO: I believe this is currently broken and needs to be brought in-line with the styling of Stories.

### Product Evolution
Admin: `/library/_prodaq/iteration/`   
List: `/templates/page-stories.php`  
Single: `taxonomy-story.php` redirects from `single-iteration.php`  
LESS: `/library/less/prodaq/post/iterations.less`   
JS: `/library/js/prodaq/story.js`   
Stories document the evolution of a product. This post type takes advantage of a custom taxonomy in order to properly arrange a full group of iterations. Each iteration needs to be categorized in both a story and an iteration and is either an intro slide, an element slide (documenting a single feature), or a next steps slide. They're optional if you need to create an intro for the entire presentation, for example, and so you don't need the intro slide in each iteration. The story than builds a presentation ordering the iterations like so:
* Title
* Iteration 1: Intro
* Iteration 1: Element 1 Goals and Approach
* Iteration 1: Element 1 Screenshots
* Iteration 1: Element 1 Next Steps
* Iteration 1: Element 2 Goals and Approach
* Iteration 1: Element 2 Screenshots
* Iteration 1: Element 2 Next Steps
* Iteration 1: Next Steps
* Iteration 2: Intro
* Iteration 2: Element 1 Goals and Approach...etc

On screenshot slides, any annotations created in the admin can be cycled through by hitting enter where as the slide navigation can be scrolled through or advanced using the arrow keys.

## Custom Pages

### Resources
Admin: `/library/_prodaq/resources/`   
Page: `/templates/page-resources.php`   

### Stats
Admin: *aggregates from participant posts*   
Page: `/templates/page-stats.php`   
A spot to begin breaking down participants by various data.

### Quotes
Admin: *aggregates from participant posts*   
Page: `/templates/page-quotes.php`   
A page to list executive friendly quotes. When adding quotes to a participant, there is a checkbox for whether or not it is executive friendly. We can list all those quotes here but the page has not had much attention.
