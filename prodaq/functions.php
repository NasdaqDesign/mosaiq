<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

require_once( 'library/navwalker.php' ); // needed for bootstrap navigation

// REDUX.  Needed for custom admin panel
// https://github.com/ReduxFramework/ReduxFramework
// WIP

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/library/admin/ReduxCore/framework.php' ) ) {
  require_once( dirname( __FILE__ ) . '/library/admin/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/library/option-config.php' ) ) {
  require_once( dirname( __FILE__ ) . '/library/option-config.php' );
}

/* library/bones.php (functions specific to BREW)
  - navwalker
  - Redux framework
  - Read more > Bootstrap button
  - Bootstrap style pagination
  - Bootstrap style breadcrumbs
*/
require_once( 'library/brew.php' ); // if you remove this, BREW will break
/*
1. library/bones.php
  - head cleanup (remove rsd, uri links, junk css, ect)
  - enqueueing scripts & styles
  - theme support functions
  - custom menu output & fallbacks
  - related post function
  - page-navi function
  - removing <p> from around images
  - customizing the post excerpt
  - custom google+ integration
  - adding custom fields to user profiles
*/
require_once( 'library/bones.php' ); // if you remove this, bones will break



/* --------------------------------------------------- */
require_once( 'library/prodaq.php' );
// if you remove this, PRODAQ will break -- all prodaq related functions
/* --------------------------------------------------- */

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );
add_image_size( 'post-featured', 750, 300, true );
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
  register_sidebar(array(
    'id' => 'sidebar1',
    'name' => __( 'Sidebar 1', 'bonestheme' ),
    'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));


// add footer widgets

  register_sidebar(array(
    'id' => 'footer-1',
    'name' => __( 'Footer Widget 1', 'bonestheme' ),
    'description' => __( 'The first footer widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget widgetFooter %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'footer-2',
    'name' => __( 'Footer Widget 2', 'bonestheme' ),
    'description' => __( 'The second footer widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget widgetFooter %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'footer-3',
    'name' => __( 'Footer Widget 3', 'bonestheme' ),
    'description' => __( 'The third footer widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget widgetFooter %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

    register_sidebar(array(
    'id' => 'footer-4',
    'name' => __( 'Footer Widget 4', 'bonestheme' ),
    'description' => __( 'The fourth footer widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget widgetFooter %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

} // don't remove this bracket!





/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <li <?php comment_class(); ?>>
    <article id="comment-<?php comment_ID(); ?>" class="clearfix comment-container">
      <div class="comment-author vcard">
        <?php
        /*
          this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
          echo get_avatar($comment,$size='32',$default='<path_to_url>' );
        */
        ?>
        <?php // custom gravatar call ?>
        <?php
          // create variable
          $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=64" class="load-gravatar avatar avatar-48 photo" height="64" width="64" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
        <?php // end custom gravatar call ?>
      </div>
      <div class="comment-content">
        <?php printf(__( '<cite class="fn">%s</cite>', 'bonestheme' ), get_comment_author_link()) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>
        <?php edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ?>
        <?php if ($comment->comment_approved == '0') : ?>
          <div class="alert alert-info">
            <p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
          </div>
        <?php endif; ?>
        <section class="comment_content clearfix">
          <?php comment_text() ?>
        </section>
        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div> <!-- END comment-content -->
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!

/*************** PINGS LAYOUT **************/

function list_pings( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment; ?>
  <li id="comment-<?php comment_ID(); ?>">
    <span class="pingcontent">
      <?php printf(__('<cite class="fn">%s</cite> <span class="says"></span>'), get_comment_author_link()) ?>
      <?php comment_text(); ?>
    </span>
  </li>
<?php } // end list_pings

// First, create a function that includes the path to your favicon
function add_favicon() {
  echo '
  <link rel="apple-touch-icon" sizes="57x57" href="' . get_asset_if_exists('/library/images/favicons/apple-touch-icon-57x57.png') . '">
  <link rel="apple-touch-icon" sizes="60x60" href="' . get_asset_if_exists('/library/images/favicons/apple-touch-icon-60x60.png') . '">
  <link rel="apple-touch-icon" sizes="72x72" href="' . get_asset_if_exists('/library/images/favicons/apple-touch-icon-72x72.png') . '">
  <link rel="apple-touch-icon" sizes="76x76" href="' . get_asset_if_exists('/library/images/favicons/apple-touch-icon-76x76.png') . '">
  <link rel="apple-touch-icon" sizes="114x114" href="' . get_asset_if_exists('/library/images/favicons/apple-touch-icon-114x114.png') . '">
  <link rel="apple-touch-icon" sizes="120x120" href="' . get_asset_if_exists('/library/images/favicons/apple-touch-icon-120x120.png') . '">
  <link rel="apple-touch-icon" sizes="144x144" href="' . get_asset_if_exists('/library/images/favicons/apple-touch-icon-144x144.png') . '">
  <link rel="apple-touch-icon" sizes="152x152" href="' . get_asset_if_exists('/library/images/favicons/apple-touch-icon-152x152.png') . '">
  <link rel="apple-touch-icon" sizes="180x180" href="' . get_asset_if_exists('/library/images/favicons/apple-touch-icon-180x180.png') . '">
  <link rel="icon" type="image/png" href="' . get_asset_if_exists('/library/images/favicons/favicon-32x32.png') . '" sizes="32x32">
  <link rel="icon" type="image/png" href="' . get_asset_if_exists('/library/images/favicons/android-chrome-192x192.png') . '" sizes="192x192">
  <link rel="icon" type="image/png" href="' . get_asset_if_exists('/library/images/favicons/favicon-96x96.png') . '" sizes="96x96">
  <link rel="icon" type="image/png" href="' . get_asset_if_exists('/library/images/favicons/favicon-16x16.png') . '" sizes="16x16">
  <link rel="manifest" href="' . get_asset_if_exists('/library/images/favicons/manifest.json') . '">
  <link rel="mask-icon" href="' . get_asset_if_exists('/library/images/favicons/safari-pinned-tab.svg') . '" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-TileImage" content="' . get_asset_if_exists('/library/images/favicons/mstile-144x144.png') . '">
  <meta name="theme-color" content="#ffffff">';
}
  
// Now, just make sure that function runs when you're on the login page and admin pages  
add_action('login_head', 'add_favicon');
add_action('admin_head', 'add_favicon');
?>
