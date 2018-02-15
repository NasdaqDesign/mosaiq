<div class="form-section">
	<div class="row">
		<div class="col-md-6">
			<?php $mb->the_field('cic'); ?>
			<p><input type="checkbox" name="<?php $mb->the_name(); ?>" value="active"<?php $mb->the_checkbox_state('active'); ?>/> Member of the Customer Insights Council</p>

			<h2>Company Information</h2>
			<div class="form-group">
				<label>Company Name</label>
				<?php $mb->the_field('company'); ?>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
			</div>

			<h2>Location</h2>
			<div class="form-group">
				<label>City</label>
				<?php $mb->the_field('city'); ?>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
			</div>

			<div class="form-group">
				<?php $mb->the_field('state'); ?>
				<label>State</label>
				<select class="selectnice" name="<?php $mb->the_name(); ?>">
					<option value=""></option>

				<?php
					$stateJson = file_get_contents(get_template_directory() . '/library/data/states.json');
					$stateArr = json_decode($stateJson, true);
					$states = $stateArr[states];
					foreach($states as $state){?>
						<option value="<?php echo $state[code]; ?>"<?php $mb->the_select_state($state[code]); ?>><?php echo $state[name]; ?></option>
					<?php } ?>

			 </select>
			</div>
			<div class="form-group">
				<?php $mb->the_field('country'); ?>
				<label>Country</label>
				<select class="selectnice" name="<?php $mb->the_name(); ?>">
					<option value=""></option>

				<?php
					$countryJson = file_get_contents(get_template_directory() . '/library/data/countries.json');
					$countryArr = json_decode($countryJson, true);
					$countries = $countryArr[countries];
					foreach($countries as $country){?>
						<option value="<?php echo $country[code]; ?>"<?php $mb->the_select_state($country[code]); ?>><?php echo $country[name]; ?></option>
					<?php } ?>

			 </select>
			</div>

			<div class="form-group">
				<?php $mb->the_field('region'); ?>
				<label>Region</label>
				<select class="selectnice" name="<?php $mb->the_name(); ?>">
					<option value="">Select Region</option>
					<option value="amers"<?php $mb->the_select_state('amers'); ?>>AMERS</option>
					<option value="emea"<?php $mb->the_select_state('emea'); ?>>EMEA</option>
					<option value="apac"<?php $mb->the_select_state('apac'); ?>>APAC</option>
				</select>
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

		</div>

		<div class="col-md-6">

			<?php $mb->the_field('record_show'); ?>
			<span class="show__hide-record"><input type="checkbox" name="<?php $mb->the_name(); ?>" value="active"<?php $mb->the_checkbox_state('active'); ?>/> Hide Record </span>

			<h2>Contact Information</h2>
			<div class="form-group">
				<label>Title</label>
				<?php $mb->the_field('title'); ?>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
			</div>
			<div class="form-group">
				<label>LinkedIn</label>
				<?php $mb->the_field('linkedin'); ?>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
			</div>
			<div class="form-group">
				<label>Contact Email</label>
				<?php $mb->the_field('email'); ?>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
			</div>
			<div class="form-group">
				<label>Contact Phone Number</label>
				<?php $mb->the_field('phone'); ?>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
			</div>
			<h2>Other</h2>
			<p><em>Primary Personas would be helpful but secondary personas not necessary at this stage.</em></p>
			<div class="form-group">
				<label>Primary Persona</label>
				<?php $mb->the_field('primary_persona'); ?>
				<select name="<?php $mb->the_name(); ?>" class="selectnice">
					<option></option>
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
				<?php $mb->the_field('secondary_personas', WPALCHEMY_FIELD_HINT_SELECT_MULTI); ?>
				<label>Secondary Personas</label>
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
