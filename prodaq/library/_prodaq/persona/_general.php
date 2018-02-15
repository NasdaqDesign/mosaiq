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
				<?php $mb->the_field('business_unit'); ?>
				<label>Business Unit</label>
				<select name="<?php $mb->the_name(); ?>" class="selectnice">
					<option value="GCS-IR">GCS-IR</option>
					<option value="GCS-B&L">GCS-B&L</option>
					<option value="GCS-Discovery">GCS-Discovery</option>
					<option value="GIS-Hub">GIS-Hub</option>
					<option value="GIS-Discovery">GIS-Discovery</option>
					<option value="GIS-eVestment">GIS-eVestment</option>
					<option value="GTMS-NFF">GTMS-NFF</option>
					<option value="GTMS-Smarts">GTMS-Smarts</option>
					<option value="GTMS-Discovery">GTMS-Discovery</option>
					<option value="Multiple">Multiple</option>
					<option value="Other">Other</option>
				</select>
			</div>
			<div class="form-group">
				<?php $mb->the_field('related_campaigns'); ?>
				<label>Related Campaigns</label>
				<select name="<?php $mb->the_name(); ?>" class="selectnice">
					<option></option>
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
				<label>Original URL</label>
				<?php $mb->the_field('url'); ?>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
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
			<h2 class="persona__information">Persona Summary</h2>
			<?php $mb->the_field('record_show'); ?>
			<span class="show__hide-record"><input type="checkbox" name="<?php $mb->the_name(); ?>" value="active"<?php $mb->the_checkbox_state('active'); ?>/> <span class="hide__text">Hide Record</span> </span>
			<div class="form-group">
				<?php $mb->the_field('summary'); ?>
				<textarea class="ckeditor" id="personaSummary" name="<?php $mb->the_name(); ?>" rows="15"><?php $mb->the_value(); ?></textarea>
			</div>
		</div>
	</div>
</div>
