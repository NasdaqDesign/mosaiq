<?php
/**
 * The Template for displaying all single participants
 *
 * @package WordPress
 */

get_header(); ?>

<div class="participant__content">
<?php while ( have_posts() ) : the_post(); ?>
  <?php include(TEMPLATEPATH . '/includes/participant/participant-var.php'); ?>
  <header class="participant__header page__header">
  <!-- no need for anything here other than bg -->
  </header>
  <div class="participant">
    <div class="container">
      <div class="row">
        <div class="col-md-3">

          <div class="participant__thumb">
            <?php if(has_post_thumbnail($participantinfo->ID)){
              echo get_the_post_thumbnail($participantinfo->ID, 'participant-thumb');
            }
            else{
              echo '<img width="130px" src="' .  get_stylesheet_directory_uri() . '/library/images/blank.jpg">';
            } ?>
          </div>
          <?php include(TEMPLATEPATH . '/includes/participant/participant-details.php'); ?>

        </div>
        <div class="col-md-6">
          <?php include(TEMPLATEPATH . '/includes/participant/participant-meetings.php'); ?>


        </div>

      </div>
    </div>
  </div>






<?php endwhile; ?>
</div>
<?php get_footer(); ?>
