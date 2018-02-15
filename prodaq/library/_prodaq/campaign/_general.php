<div class="form-section">
	<div class="row">
		<div class="col-md-6">
			<h2>Overview</h2>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Start Date</label>
						<?php $mb->the_field('start_date'); ?>
						<input class="datepicker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>End Date</label>
						<?php $mb->the_field('end_date'); ?>
						<input class="datepicker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Researchers</label>
				<?php $mb->the_field('researchers'); ?>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
			</div>
			<div class="form-group">
				<label>Moderators</label>
				<?php $mb->the_field('moderators'); ?>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
			</div>
			<div class="form-group">
				<?php $mb->the_field('description'); ?>
				<label>Description</label>
				<textarea class="ckeditor" name="<?php $mb->the_name(); ?>" rows="8"><?php $mb->the_value(); ?></textarea>
			</div>

		</div>
		<div class="col-md-6">
			<h2 class="other__details">Other Details</h2>
				<?php $mb->the_field('record_show'); ?>
				<span class="show__hide-record"><input type="checkbox" name="<?php $mb->the_name(); ?>" value="active"<?php $mb->the_checkbox_state('active'); ?>/> Hide Record </span>

			<div class="form-group">
				<label>Sponsor</label>
				<?php $mb->the_field('sponsor'); ?>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
			</div>

			<div class="form-group">
				<label>Product Design Team</label>
				<?php $mb->the_field('design_team'); ?>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
			</div>
			<div class="form-group">
				<label>Product Management Team</label>
				<?php $mb->the_field('management_team'); ?>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
			</div>
			<div class="form-group">
				<?php $mb->the_field('business_unit'); ?>
				<label>Business Unit</label>
				<select name="<?php $mb->the_name(); ?>" class="selectnice">
					<option value="GCS-IR" <?php $mb->the_select_state('GCS-IR'); ?>>GCS-IR</option>
					<option value="GCS-B&L" <?php $mb->the_select_state('GCS-B&L'); ?>>GCS-B&L</option>
					<option value="GCS-Discovery" <?php $mb->the_select_state('GCS-Discovery'); ?>>GCS-Discovery</option>
					<option value="GIS-Hub" <?php $mb->the_select_state('GIS-Hub'); ?>>GIS-Hub</option>
					<option value="GIS-Discovery" <?php $mb->the_select_state('GIS-Discovery'); ?>>GIS-Discovery</option>
					<option value="GIS-eVestment" <?php $mb->the_select_state('GIS-eVestment'); ?>>GIS-eVestment</option>
					<option value="GTMS-NFF" <?php $mb->the_select_state('GTMS-NFF'); ?>>GTMS-NFF</option>
					<option value="GTMS-Smarts" <?php $mb->the_select_state('GTMS-Smarts'); ?>>GTMS-Smarts</option>
					<option value="GTMS-Discovery" <?php $mb->the_select_state('GTMS-Discovery'); ?>>GTMS-Discovery</option>
					<option value="Multiple" <?php $mb->the_select_state('Multiple'); ?>>Multiple</option>
					<option value="Other"  <?php $mb->the_select_state('Other'); ?>>Other</option>
				</select>
			</div>
			<div class="form-group">
				<?php $mb->the_field('product'); ?>
				<label>Product</label>
				<select name="<?php $mb->the_name(); ?>" class="selectnice">
					<option></option>
					<?php
						global $post;
						$real_post = $post;
						$args = array(
							'post_type' => 'product',
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
			<h2>Goals</h2>
			<?php while($mb->have_fields_and_multi('goals')): ?>
			<?php $mb->the_group_open(); ?>
			<div class="goal-repeatable">
				<div class="form-group">
					<label>Goal</label>
					<a href="#" class="dodelete icon">delete</a>
					<?php $mb->the_field('goal'); ?>
					<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
				</div>
			</div>
			<?php $mb->the_group_close(); ?>
			<?php endwhile; ?>

			<p class="add__goal"><a href="#" class="docopy-goals button">Add Goal</a></p>

		</div>
	</div>
</div>
