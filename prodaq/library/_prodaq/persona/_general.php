<div class="form-section">
	<div class="row">
		<div class="col-md-5">
			<h2>Persona Information</h2>
			<div class="row">
				<div class="col-md-7">
					<div class="form-group">
						<label>Role</label>
						<?php $mb->the_field('role'); ?>
						<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label>Persona Type</label>
						<?php $mb->the_field('type'); ?>
						<select class="selectnice" placeholder="Select Nature" name="<?php $mb->the_name(); ?>">
							<option value="primary"<?php $mb->the_select_state('primary'); ?>>Primary</option>
							<option value="secondary"<?php $mb->the_select_state('secondary'); ?>>Secondary</option>
							<option value="tertiary"<?php $mb->the_select_state('tertiary'); ?>>Tertiary</option>
						</select>
					</div>
				</div>
			</div>

			<div class="form-group">
				<?php $mb->the_field('quote'); ?>
				<label>Quote</label>
				<textarea name="<?php $mb->the_name(); ?>" rows="3"><?php $mb->the_value(); ?></textarea>
			</div>
			<div class="form-group">
				<?php $mb->the_field('description'); ?>
				<label>Description</label>
				<textarea name="<?php $mb->the_name(); ?>" rows="3"><?php $mb->the_value(); ?></textarea>
			</div>
			<div class="form-group upload-inline">
				<label>Hero Upload</label>
				<?php $mb->the_field('hero'); ?>
				<?php $wpalchemy_media_access->setGroupName('clip-n'. $mb->get_the_index())->setInsertButtonLabel('Insert Image'); ?>
				<?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
				<?php echo $wpalchemy_media_access->getButton(array('label' => 'Upload')); ?>
				<div class="preview-wrapper">
					<?php
					$preview_img = get_post_meta( $post->ID, '_persona_hero', true );
					if(!empty($preview_img)){
						echo '<img src="' . $preview_img . '" width="100%">';
					}
					?>
				</div>
			</div>
		</div>
		<div class="col-md-7">
			<h2>Persona Summary</h2>
			<div class="form-group">
				<?php $mb->the_field('summary'); ?>
				<textarea class="ckeditor" id="personaSummary" name="<?php $mb->the_name(); ?>" rows="15"><?php $mb->the_value(); ?></textarea>
			</div>
			<div class="form-group">
				<?php $mb->the_field('participants', WPALCHEMY_FIELD_HINT_SELECT_MULTI); ?>
				<label>Associated Participant</label>
				<select name="<?php $mb->the_name(); ?>" class="selectnice" multiple>
					<?php
						global $post;
						$real_post = $post;
						$args = array(
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
							while ($my_query->have_posts()) : $my_query->the_post();?>
								<option value="<?php echo $post->ID; ?>"<?php $mb->the_select_state($post->ID); ?>><?php echo $post->post_title; ?></option>
							<?php	endwhile;
						}
						wp_reset_query();
						$post = $real_post;
					?>
				</select>
			</div>
		</div>

	</div>
</div>
