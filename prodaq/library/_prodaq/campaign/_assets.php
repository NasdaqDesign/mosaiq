<div class="form-section">
	<h2>Findings Report</h2>
	<div class="form-group">
		<?php $mb->the_field('findings_type'); ?>
		<label>Select Type</label>
		<select class="selectnice" id="findings-type" name="<?php $mb->the_name(); ?>">
			<option value=""></option>
			<option value="document"<?php $mb->the_select_state('document'); ?>>Document</option>
			<option value="report"<?php $mb->the_select_state('report'); ?>>Wordpress Report</option>
		</select>
	</div>
	<div id="findingsDocument" class="form-group upload-inline <?php if(empty($type) || !empty($type) && $type != 'document'){echo 'hidden'; } ?>">
		<?php $mb->the_field('findings'); ?>
		<?php $wpalchemy_media_access->setGroupName('clip-n'. $mb->get_the_index())->setInsertButtonLabel('Insert Report'); ?>
		<?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
		<?php echo $wpalchemy_media_access->getButton(array('label' => 'Add Asset From Library')); ?>
	</div>
	<div  id="findingsReport" class="form-group <?php if(empty($type) || !empty($type) && $type != 'report'){echo 'hidden'; } ?>">
		<?php $mb->the_field('findings_report'); ?>
		<label>Reports</label>
		<select name="<?php $mb->the_name(); ?>" class="selectnice">
			<?php
				global $post;
				$real_post = $post;
				$args = array(
					'post_type' => 'report',
					'post_status' => 'publish',
					'orderby'=> 'title',
					'order' => 'ASC',
					'posts_per_page' => -1,
					'caller_get_posts'=> 1
				);
				$my_query = null;
				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) {
					while ($my_query->have_posts()) : $my_query->the_post();
					?>
						<option value="<?php echo  $post->ID; ?>"<?php $mb->the_select_state($post->ID); ?>><?php echo $post->post_title; ?></option>
					<?php	endwhile;
				}
				wp_reset_query();
				$post = $real_post;
			?>
		</select>
	</div>
</div>

<div class="form-section">
	<h2>Other Assets</h2>
	<?php while($mb->have_fields_and_multi('docs')): ?>
	<?php $mb->the_group_open(); ?>
		<div class="asset-repeatable form-inline">
			<div class="form-group asset-repeatable__title">
				<label>Title</label>
				<?php $mb->the_field('title'); ?>
				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
			</div>
			<div class="form-group upload-inline">
				<label>File</label>
				<?php $mb->the_field('document'); ?>
				<?php $wpalchemy_media_access->setGroupName('clip-n'. $mb->get_the_index())->setInsertButtonLabel('Insert Report'); ?>
				<?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
				<?php echo $wpalchemy_media_access->getButton(array('label' => 'Add Asset From Library')); ?>
			</div>
			<a href="#" class="dodelete icon">delete</a>
		</div>
	<?php $mb->the_group_close(); ?>
	<?php endwhile; ?>

	<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-docs button">Add Asset</a></p>
</div>
