<?php
/*
Persona List
*/
?>
<?php get_header(); ?>
<div class="page__header">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Personas</h1>
      </div>
    </div>
  </div>
</div>

<div class="personas-list">
  <div class="container">
    <div class="row">

      <div class="col-md-2 scrollspy">
        <ul class="filters hidden-xs" data-spy="affix">

          <li><a href="#" data-filter="*" class="selected">All Categories</a></li>
          <?php
            $terms = get_terms('persona_product');
            $count = count($terms); //How many are they?
            if ( $count > 0 ){  //If there are more than 0 terms
              foreach ( $terms as $term ) {  //for each term:
                echo "<li><a href='#' class='persona-filter' data-filter='.".$term->slug."'>" . $term->name . "</a></li>\n";
                //create a list item with the current term slug for sorting, and name for label
              }
            }
          ?>
        </ul>

        <select class="filters visible-xs">
          <option data-filter="*" class="selected">All Categories</option>
          <?php
            $terms = get_terms('persona_product');
            $count = count($terms); //How many are they?
            if ( $count > 0 ){  //If there are more than 0 terms
              foreach ( $terms as $term ) {  //for each term:
                echo "<option value='.".$term->slug."'>" . $term->name . "</option>";
                //create a list item with the current term slug for sorting, and name for label
              }
            }
          ?>
        </select>
      </div>

      <div class="col-md-10">
        <div class="row">

          <?php
          $type = 'persona';
          $args=array(
            'post_type' => $type,
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'caller_get_posts'=> 1
          );

          $persona_query = null;
          $persona_query = new WP_Query($args);?>


          <?php if ($persona_query->have_posts()) : ?>
          <div class="isotope-filter">
            <?php while ($persona_query->have_posts()) : $persona_query->the_post(); ?>

            <?php
              //Some vars
              $terms = get_the_terms($post->ID, 'persona_product');
              $termsString = ""; //initialize the string that will contain the terms
              if(!empty($terms)){
                foreach ( $terms as $term ) { // for each term
                  $termsString .= $term->slug.' '; //create a string that has all the slugs
                }
                $count ++;
              }
              $role = get_post_meta($post->ID, '_persona_role', true);
              $participants = get_post_meta($post->ID, '_persona_participants', true);

            ?>

            <section class="isotope-list__item personas-list__item col-md-3 col-xs-12 <?php echo $termsString; ?>">
              <div class="thumb-wrapper">
                <?php if(has_post_thumbnail($participantinfo->ID)){ ?>
                  <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo the_post_thumbnail(); ?></a>
                <?php }
                else{ ?>
                  <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><img width="125px" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/blank.jpg"></a>';
                <?php } ?>
              </div>
              <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
              <?php if(isset($role)) : echo '<h4>' . $role . '</h4>'; endif ?>
              <?php if(!empty($participants)){
                echo '<p>' . count($participants) . ' Interviews</p>';
              }?>
              <?php if(!empty( $terms )){
                echo '<p class="product-tags">';
                foreach($terms as $term){
                  echo '<span>' . $term->name . '</span>';
                }
                echo '</p>';
              }?>
            </section>

            <?php
              // if ( 0 == $count%4 ) {
              // 	echo '</div><div class="row">';
              // }
            ?>

          <?php endwhile; ?>
          </div>
          <?php wp_reset_query();?>


          <?php else : ?>

              <article id="post-not-found" class="hentry clearfix">
                <header class="article-header">
                  <h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
                </header>
                <section class="entry-content">
                  <p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
                </section>
                <footer class="article-footer">
                    <p><?php _e( 'This is the error message in the custom posty type archive template.', 'bonestheme' ); ?></p>
                </footer>
              </article>

          <?php endif; ?>
        </div>
      </div>


    </div>
  </div>
</div>




<?php get_footer(); ?>
