
<div class="form-section">
	<h2>Internal Team Members</h2>
	<?php while($mb->have_fields_and_multi('team')): ?>
	<?php $mb->the_group_open(); ?>
		<div class="form-section__flex">
			<div class="form-group">
				<label>Name</label>
				<?php $mb->the_field('name'); ?>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
			</div>
			<div class="form-group">
				<label>Email</label>
				<?php $mb->the_field('email'); ?>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
			</div>
			<div class="form-group">
				<?php $mb->the_field('role'); ?>
				<label>Role</label>
				<select class="selectnice" name="<?php $mb->the_name(); ?>">
					<option value=""></option>
					<option value="Business Head"<?php $mb->the_select_state('Business Head'); ?>>Business Head</option>
					<option value="Commercial Manager"<?php $mb->the_select_state('Commercial Manager'); ?>>Commercial Manager</option>
					<option value="VP Product"<?php $mb->the_select_state('VP Product'); ?>>VP Product</option>
					<option value="Lead Product Owner"<?php $mb->the_select_state('Lead Product Owner'); ?>>Lead Product Owner</option>
					<option value="Development"<?php $mb->the_select_state('Development'); ?>>Development</option>
					<option value="Design"<?php $mb->the_select_state('Design'); ?>>Design</option>
				</select>
			</div>
			<div class="form-group">
				<div class="checkbox">
					<label>
						<?php $mb->the_field('current'); ?>
						<input type="checkbox" name="<?php $mb->the_name(); ?>" value="current"<?php $mb->the_checkbox_state('current'); ?>/>
						 Currently a team member
					</label>
				</div>
			</div>
			<a href="#" class="dodelete icon">delete</a>
		</div>
	<?php $mb->the_group_close(); ?>
	<?php endwhile; ?>

	<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-team button">Add Team Member</a></p>
</div>
<div class="form-section">
	<h2>Product Audience</h2>
	<div class="form-group">
		<?php $mb->the_field('product_audience'); ?>
		<label>Users and Audience</label>
		<p><em>What are the different types of users? What's the customer base?</em></p>
		<textarea id="competitorSummary" class="ckeditor" name="<?php $mb->the_name(); ?>" rows="5"><?php $mb->the_value(); ?></textarea>
	</div>
	<div class="form-section__flex">
		<div class="form-group">
			<?php $mb->the_field('personas', WPALCHEMY_FIELD_HINT_SELECT_MULTI); ?>
			<label>Connected Personas</label>
			<select name="<?php $mb->the_name(); ?>" class="selectnice" multiple>
				<?php
					global $post;
					$real_post = $post;
					$args = array(
						'post_type' => 'persona',
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
			<?php $mb->the_field('participants', WPALCHEMY_FIELD_HINT_SELECT_MULTI); ?>
			<label>Relevant Participants</label>
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
	</div>

</div>
<div class="form-section">
	<h2>Industry Competitors</h2>
	<?php while($mb->have_fields_and_multi('competitors')): ?>
	<?php $mb->the_group_open(); ?>
		<div class="form-section__flex">
			<div class="form-group">
				<label>Name</label>
				<?php $mb->the_field('name'); ?>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
			</div>
			<div class="form-group">
				<label>Link</label>
				<?php $mb->the_field('url'); ?>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
			</div>
			<a href="#" class="dodelete icon">delete</a>
		</div>
	<?php $mb->the_group_close(); ?>
	<?php endwhile; ?>
	<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-competitors button">Add Competitor</a></p>
	<div class="form-group">
		<?php $mb->the_field('competitor_summary'); ?>
		<label>Competitor Summary</label>
		<p><em>What features, functionalities, design, etc.. do we have that are similar to our competitors? What is the industry landscape? Are there changes and what factors are driving this change?</em></p>
		<textarea id="competitorSummary" class="ckeditor" name="<?php $mb->the_name(); ?>" rows="5"><?php $mb->the_value(); ?></textarea>
	</div>
</div>
