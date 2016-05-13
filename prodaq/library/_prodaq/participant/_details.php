<div class="form-section">
	<div class="row">
		<div class="col-md-6">
			<h2>Company Details</h2>
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
		</div>
		<div class="col-md-6">
			<h2>Contact Details</h2>
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
		</div>

	</div>
</div>
