
# Mosaiq
Research Asset Management Platform

## Prerequisites
This is a Wordpress theme. You will need to have a Wordpress site running to install the theme. 

## Installation
* Download and save the `prodaq/` and `prodaq-child` directories to your sites `wp-content/themes` directory.
* Activate the Prodaq Child theme
* Set permalinks to Post Name inside `Settings/Permalinks`
* Import sample data using the `resources/sample-data.xml`. You will want to use the Wordpress importer plugin for this task.
* Set the home page to be static by going to `Settings/Reading`, choosing the "A static page" radio and picking "Home" from the dropdown
* Create the main navigation by going to `Apperance/Menus`. The "Main" menu should already be in place, you just need to check the theme locations "The Main Menu" checkbox in the Menu Settings section and save.

## Customizing the Theme
To make this easy to update and add new features, we have built the theme as a child theme that inherits from a parent theme. Any customization should be made in `prodaq-child`. This will allow us to make changes to the parent `prodaq` theme without overriding your customizations.

### Your Logo
The default theme is pulling the logo files from `prodaq/library/images/newlogo.png` and `prodaq/library/images/newlogo-dark.png`. It is expecting these logos to be 120x37px. To use your logo, you may save your logo with these same dimensions and the same file names as above. Alternatively, you can alter the CSS to point to your file path instead of `newlogo.png` and `newlogo-dark.png`.

## Other Information
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

## Custom Pages

### Stats
Admin: *aggregates from participant posts*   
Page: `/templates/page-stats.php`   
A spot to begin breaking down participants by various data.
