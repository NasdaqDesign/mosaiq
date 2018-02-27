<div class="form-section">


	<div class="row">
		<div class="col-md-5">
			<div class="form-group">
				<?php $mb->the_field('size'); ?>
				<label>Primary Screen Size</label>
				<p><em>Please specify the device type for this product. It will impact how the template renders the hero on the product homepage. Download the template and upload the finished image as the featured image of this post.</em></p>
				<select class="selectnice" id="product-size" name="<?php $mb->the_name(); ?>">
					<option value=""></option>
					<option value="desktop"<?php $mb->the_select_state('desktop'); ?>>Desktop</option>
					<option value="tablet"<?php $mb->the_select_state('tablet'); ?>>Tablet</option>
					<option value="mobile"<?php $mb->the_select_state('mobile'); ?>>Mobile</option>
				</select>
				<ul class="download-template">
					<li id="desktop" <?php if(!empty($product_size) && $product_size == 'desktop'){echo 'class="active"'; } ?>>
						<img height="75px" src="<?php bloginfo('stylesheet_directory'); ?>/library/images/psd/displayTemplate.png">
						<a href="<?php bloginfo('stylesheet_directory'); ?>/library/images/psd/displayTemplate.psd">
							<i class="fa fa-download"></i> Download Desktop Template
						</a>
					</li>
					<li id="tablet" <?php if(!empty($product_size) && $product_size == 'tablet'){echo 'class="active"'; } ?>>
						<img height="75px" src="<?php bloginfo('stylesheet_directory'); ?>/library/images/psd/ipadTemplate.png">
						<a href="<?php bloginfo('stylesheet_directory'); ?>/library/images/psd/ipadTemplate.psd">
							<i class="fa fa-download"></i> Download Tablet Template
						</a>
					</li>
					<li id="mobile" <?php if(!empty($product_size) && $product_size == 'mobile'){echo 'class="active"'; } ?>>
						<img height="75px" src="<?php bloginfo('stylesheet_directory'); ?>/library/images/psd/i6Template.png">
						<a href="<?php bloginfo('stylesheet_directory'); ?>/library/images/psd/i6Template.psd">
							<i class="fa fa-download"></i> Download Mobile Template
						</a>
					</li>
				</ul>
			</div>

		</div>
		<div class="col-md-7">
			<div class="form-group">
				<label>Site/Prototype</label>
				<?php $mb->the_field('site'); ?>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
			</div>
			<div class="form-group">
				<label>Github</label>
				<?php $mb->the_field('git'); ?>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
			</div>
			<div class="form-group">
				<label>Basecamp</label>
				<?php $mb->the_field('basecamp'); ?>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
			</div>
		</div>
	</div>

</div>
<div class="form-section">
	<h2>Images</h2>
	<?php while($mb->have_fields_and_multi('images')): ?>
	<?php $mb->the_group_open(); ?>
	<div class="row row-with-thumb">
		<div class="col-md-3">
			<div class="form-group hidden-input">
				<label>File</label>
				<?php $mb->the_field('image'); ?>
				<?php $wpalchemy_media_access->setGroupName('clip-n'. $mb->get_the_index())->setInsertButtonLabel('Insert Image'); ?>
				<?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
				<?php echo $wpalchemy_media_access->getButton(array('label' => 'Add Asset From Library')); ?>
				<div class="preview-wrapper">

				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="form-group asset-repeatable__title">
				<label>Caption</label>
				<?php $mb->the_field('caption'); ?>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

			</div>
		</div>
	</div>

	<?php $mb->the_group_close(); ?>
	<?php endwhile; ?>

	<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-images button">Add Asset</a></p>
</div>
