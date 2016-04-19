<div class="form-section">
	<div class="row">
		<div class="col-md-6">
			<h2>Company Information</h2>
			<div class="form-group">
				<label>Company Name</label>
				<?php $mb->the_field('company'); ?>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
			</div>
			<div class="form-group">
				<?php $mb->the_field('industry'); ?>
				<label>Industry</label>
				<!-- codes taken from https://developer.linkedin.com/docs/reference/industry-codes -->
				<select class="selectnice" name="<?php $mb->the_name(); ?>">
					<option value=""></option>

				<?php
					$industryJson = file_get_contents(get_template_directory() . '/library/data/industry.json');
					$industryArr = json_decode($industryJson, true);
					$industries = $industryArr[industryCodes];
					foreach($industries as $industry){?>
						<option value="<?php echo $industry[code]; ?>"<?php $mb->the_select_state($industry[code]); ?>><?php echo $industry[description]; ?></option>
					<?php } ?>

			 </select>
			</div>
			<div class="form-group">
				<?php $mb->the_field('size'); ?>
				<label>Company Size</label>
				<!-- codes taken from https://developer.linkedin.com/docs/reference/company-size-codes -->
				<select class="selectnice" name="<?php $mb->the_name(); ?>">
					<option value=""></option>

					<?php
						$sizeJson = file_get_contents(get_template_directory() . '/library/data/company-size.json');
						$sizeArr = json_decode($sizeJson, true);
						$sizes = $sizeArr[companySizes];
						foreach($sizes as $size){?>
							<option value="<?php echo $size[code]; ?>"<?php $mb->the_select_state($size[code]); ?>><?php echo $size[description]; ?></option>
						<?php } ?>

				</select>
			</div>



			<div class="form-group">
				<?php $mb->the_field('market'); ?>
				<label>Market Cap</label>
				<select class="selectnice" name="<?php $mb->the_name(); ?>">
					<option value=""></option>
					<option value="n-a"<?php $mb->the_select_state('n-a'); ?>>N/A</option>
					<option value="micro"<?php $mb->the_select_state('micro'); ?>>Micro</option>
					<option value="small"<?php $mb->the_select_state('small'); ?>>Small</option>
					<option value="medium"<?php $mb->the_select_state('medium'); ?>>Mid</option>
					<option value="large"<?php $mb->the_select_state('large'); ?>>Large</option>
					<option value="mega"<?php $mb->the_select_state('mega'); ?>>Mega</option>
				</select>
			</div>
			<div class="form-group">
				<?php $mb->the_field('experience'); ?>
				<label>Experience Level</label>
				<!-- codes taken from https://developer.linkedin.com/docs/reference/company-size-codes -->
				<select class="selectnice" name="<?php $mb->the_name(); ?>">
					<option value=""></option>
					<option value="4"<?php $mb->the_select_state('4'); ?>>Less than 5 years</option>
					<option value="5-10"<?php $mb->the_select_state('5-10'); ?>>5-10 years</option>
					<option value="11"<?php $mb->the_select_state('11'); ?>>More than 10 years</option>
				</select>
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
				<!-- codes taken from https://developer.linkedin.com/docs/reference/industry-codes -->
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
				<!-- codes taken from https://developer.linkedin.com/docs/reference/industry-codes -->
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

		</div>
		<div class="col-md-6">
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
</div>
