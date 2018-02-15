<div class="form-section">
	<div class="form-group">
		<?php $mb->the_field('campaigns', WPALCHEMY_FIELD_HINT_SELECT_MULTI); ?>
		<label>Relevant Campaigns</label>
		<select name="<?php $mb->the_name(); ?>" class="selectnice" multiple>
			<?php
				global $post;
				$real_post = $post;
				$args = array(
					'post_type' => 'campaign',
					'post_status' => 'publish',
					'orderby'=> 'title',
					'order' => 'ASC',
					'posts_per_page' => -1,
					'caller_get_posts'=> 1
				);
				$my_query = null;
				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) {
					//fuck yeah. $post->ID worked and get_the_ID() and variables didn't.. took me way to long to figure out despite both being valid... perhaps one not being speicifc to global post vs this post
					while ($my_query->have_posts()) : $my_query->the_post();?>
						<option value="<?php echo $post->ID; ?>"<?php $mb->the_select_state($post->ID); ?>><?php echo $post->post_title; ?></option>
					<?php	endwhile;
				}
				wp_reset_query();
				$post = $real_post;
			?>
		</select>
	</div>
	<div class="form-group">
		<?php $mb->the_field('stories', WPALCHEMY_FIELD_HINT_SELECT_MULTI); ?>
		<label>Product Evolutions</label>
		<select name="<?php $mb->the_name(); ?>" class="selectnice" multiple>
			<?php
				$tax_terms = get_terms('story');
				foreach($tax_terms as $term){
				// make sure we're only grabbing the parent story not the iterations within
				if(!$term->parent){ ?>
					<option value="<?php echo $term->term_id; ?>"<?php $mb->the_select_state($term->term_id); ?>><?php echo $term->name; ?></option>
				<?php }
			}?>
		</select>
	</div>

</div>
