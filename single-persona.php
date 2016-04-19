<?php
/**
 * The Template for displaying all single personas
 *
 * @package WordPress
 * @subpackage Prodaq
 */

get_header(); ?>

<div class="persona__content">
<?php while ( have_posts() ) : the_post(); ?>

  <?php include(TEMPLATEPATH . '/includes/persona/persona-var.php'); ?>

  <header class="persona__header" style="background-image: url(<?php echo $hero; ?>)">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-xs-12">

          <div class="persona__summary">
            <div class="visible-xs thumb">
              <span class="thumb__wrapper"><?php echo $thumb; ?></span>
            </div>
			<?php if(isset($quote) && !empty($quote)) {?>
            <blockquote class="persona__quote--header"><?php echo $quote; ?></blockquote>
			<?php } ?>
            <h1 class="persona__name"><?php echo the_title(); ?> </h1>
            <h2 class="persona__role"><?php echo $role; ?></h2>
          </div>

        </div>
      </div>
    </div>
  </header>

  <section class="persona__content">
    <div class="container">
      <div class="col-md-8">
        <h4>
          <?php echo $description; ?>
        </h4>
      </div>
      <div class="col-md-4">
        <div class="product__metadata">
          <?php
          if(!empty( $terms )){
            foreach($terms as $term){
              echo '<span class="label">' . $term->name . '</span>';
            }
          }
           ?>
          <p>
            <?php echo $type; ?>
          </p>
        </div>
      </div>

      <div class="col-md-8">
        <article class="persona__article">
          <h2>Summary</h2>
          <?php echo $summary; ?>
          <?php if(!empty($activities[0])){
            echo '<h3>Activities</h3>';
            echo '<ul>';
            foreach($activities as $activity){
              echo '<li>' . $activity['activity'] . '</li>';
            }
            echo '</ul>';
          }?>
          <?php if(!empty($connections)){
            echo '<h3>Connections</h3>';
            echo $connections;
          }?>
        </article>
      </div>
      <div class="col-md-4">
        <aside class="persona__sidebar">

          <?php
          if(!empty($goals[0]['goal'])){
            echo '<h3>Goals</h3>';
            echo '<ul>';
            foreach($goals as $goal){
              echo '<li>' . $goal['goal'] . '</li>';

            }
            echo '</ul>';
          }?>

          <?php
          if(!empty($painpoints[0]['pain_point'])){
            echo '<h3>Pain Points</h3>';
            echo '<ul>';
            foreach($painpoints as $painpoint){
              echo '<li>' . $painpoint['pain_point'] . '</li>';

            }
            echo '</ul>';
          }?>


        </aside>
      </div>
    </div>
  </section>
  <section class="persona__participants">
    <div class="container">
      <h2>Research Data</h2>
      <?php include(TEMPLATEPATH . '/includes/persona/persona-counts.php'); ?>
      <div class="row">
        <div class="col-md-6">
          <div class="primary">
            <div class="primary__thumb">
              <?php echo $thumb; ?>
            </div>
            <div class="primary__details">
              <?php if($participantCount === 0){
                echo '<h3>No participants mapped</h3>';
              } else{ ?>
              <h3><?php echo $participantCount . ' ' . pluralize($participantCount, 'Interview'); ?></h3>
              <?php $firstname = explode(' ',trim(get_the_title())); ?>
              <p>with <?php echo $firstname[0]; ?>s</p>
              <?php } ?>
            </div>
          </div>
          <div class="secondary__list">

            <?php
              if(!empty($other_personas[0])){

                echo '<h3>Including</h3>
                  <span class="dotted"></span>';
                $other_personas_count = array_count_values($other_personas);
                foreach($other_personas_count as $key => $val){
                  $related_persona = get_post($key);
                  $related_persona_name = $related_persona->post_title;
                  $related_persona_thumb = get_the_post_thumbnail($related_persona->ID, 'thumbnail');?>
                  <div class="secondary">

                    <div class="thumbs__wrapper">
                      <span class="under-thumb"><?php echo $thumb; ?></span>
                      <span class="over-thumb"><?php echo $related_persona_thumb; ?></span>
                    </div>
                    <div class="secondary__details">
                      <?php
                        echo '<h3>' . $val . ' ' . pluralize($val, $firstname[0]) . '</h3>';
                        echo '<p>with ' . $related_persona_name . ' responsibilities</p>'; ?>
                    </div>
                  </div>
                <?php }
              }
            ?>
          </div>

        </div>
        <div class="col-md-6">
          <div class="persona__participants-market">

          </div>
          <div class="persona__participants-experience">
            <div class="stat--region <?php if($not_experienced == 0): echo inactive; endif ?>">
              <label>Less Than 5 Years</label>
              <p><?php echo $not_experienced; ?></p>
            </div>
            <div class="stat--region <?php if($experienced == 0): echo inactive; endif ?>">
              <label>5-10 Years</label>
              <p><?php echo $experienced; ?></p>
            </div>
            <div class="stat--region <?php if($very_experienced == 0): echo inactive; endif ?>">
              <label>10+ Years</label>
              <p><?php echo $very_experienced; ?></p>
            </div>
          </div>
          <div class="persona__participants-map">
            <span class="region-count" data-amers="<?php echo $amersCount; ?>" data-emea="<?php echo $emeaCount; ?>" data-apac="<?php echo $apacCount; ?>"></span>
            <?php include( get_template_directory() . '/library/svg/dottedmap.svg'); ?>
          </div>
        </div>

      </div>
    </div>
  </section>

<?php endwhile; ?>
</div>

<?php get_footer(); ?>
