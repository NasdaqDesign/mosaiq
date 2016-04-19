<div class="form-section">
	<?php while($mb->have_fields_and_multi('quotes')): ?>
	<?php $mb->the_group_open(); ?>
		<div class="ndaq-repeatable">

			<div class="ndaq-repeatable__header">
				<h2 class="pull-left">Quote</h2>
				<div class="form-group pull-left">
					<?php $mb->the_field('type'); ?>
					<select placeholder="Select Nature" name="<?php $mb->the_name(); ?>">
						<option></option>
						<option value="positive"<?php $mb->the_select_state('positive'); ?>>Positive</option>
						<option value="pain"<?php $mb->the_select_state('pain'); ?>>Pain Point</option>
						<option value="feedback"<?php $mb->the_select_state('feedback'); ?>>Feedback</option>
					</select>
				</div>
				<div class="form-group pull-left">
					<div class="checkbox">
						<label>
							<?php $mb->the_field('exec'); ?>
							<input type="checkbox" name="<?php $mb->the_name(); ?>" value="friendly"<?php $mb->the_checkbox_state('friendly'); ?>/>
							Quote is executive friendly
						</label>
					</div>
				</div>
				<a href="#" class="dodelete icon">delete</a>
			</div>

			<div class="ndaq-repeatable__body">
				<div class="row">
					<div class="col-md-7">
						<div class="form-group">
							<?php $mb->the_field('quote'); ?>
							<label>Quote</label>
							<textarea name="<?php $mb->the_name(); ?>" rows="5"><?php $mb->the_value(); ?></textarea>
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<?php $mb->the_field('campaign'); ?>
							<label>Campaign</label>
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
										while ($my_query->have_posts()) : $my_query->the_post();?>
											<option value="<?php echo $post->ID; ?>"<?php $mb->the_select_state($post->ID); ?>><?php echo $post->post_title; ?></option>
										<?php	endwhile;
									}
									wp_reset_query();
									$post = $real_post;
								?>
							</select>
						</div>
						<div class="form-group upload-inline">
							<label>Audio Clip</label>
							<?php $mb->the_field('clip'); ?>
							<?php $wpalchemy_media_access->setGroupName('clip-n'. $mb->get_the_index())->setInsertButtonLabel('Insert Clip'); ?>
							<?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
							<?php echo $wpalchemy_media_access->getButton(array('label' => 'Add Asset From Library')); ?>
						</div>

					</div>
				</div>

			</div>



		</div><!-- end repeatable -->

		<?php $mb->the_group_close(); ?>
		<?php endwhile; ?>

	<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-quotes button">Add Quote</a></p>
</div>
