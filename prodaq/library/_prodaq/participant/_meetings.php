<div class="form-section">
	<?php while($mb->have_fields_and_multi('meetings')): ?>
	<?php $mb->the_group_open(); ?>
		<div class="ndaq-repeatable">
			<div class="ndaq-repeatable__header">
				<h2 class="report">Meeting</h2>
				<?php $mb->the_field('meetingdate');?>
				<input class="datepicker" data-format="DD, M dd yy" placeholder="Meeting Date" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
				<a href="#" class="dodelete icon">delete</a>
			</div>

			<div class="ndaq-repeatable__body">
				<div class="row">

					<div class="col-md-5">
						<div class="form-group">
							<?php $mb->the_field('interview_campaign'); ?>
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
							<label>Recording File</label>
							<?php $mb->the_field('recording'); ?>
							<?php $wpalchemy_media_access->setGroupName('clip-n'. $mb->get_the_index())->setInsertButtonLabel('Insert Recording'); ?>
							<?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
							<?php echo $wpalchemy_media_access->getButton(array('label' => 'Add Asset From Library')); ?>
						</div>
						<div class="form-group">
							<label>Vimeo Link</label>
							<p><small>Please make sure the privacy settings are only set to play on nasdaqproductdesign.com.</small></p>
							<?php $mb->the_field('vimeo'); ?>
							<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
						</div>
						<div class="form-group upload-inline">
							<label>Transcript</label>
							<?php $mb->the_field('transcript'); ?>
							<?php $wpalchemy_media_access->setGroupName('clip-n'. $mb->get_the_index())->setInsertButtonLabel('Insert Transcript'); ?>
							<?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
							<?php echo $wpalchemy_media_access->getButton(array('label' => 'Add Asset From Library')); ?>
						</div>
						<div class="form-group">
							<?php $mb->the_field('interview_campaign_summary', WPALCHEMY_FIELD_HINT_SELECT_MULTI); ?>
							<label>Interview Summary</label>
							<select name="<?php $mb->the_name(); ?>" class="selectnice" multiple>
								<option></option>
								<?php
									//Summary form mapping
									include(TEMPLATEPATH . '/includes/participant/summary-var.php');

									$my_query = GFAPI::get_entries($interviewSummary['id']);

									foreach ($my_query as $entry) {
										global $post;
										$real_post = $post;
										$selectedCampaign = get_post($entry[$interviewSummary['campaignId']]);
									?>
										<option value="<?=$entry['id']?>"<?php $mb->the_select_state($entry['id']); ?>><?=$entry[$interviewSummary['participantName']] . " | " . $selectedCampaign->post_title?></option>
									<?php
										wp_reset_query();
										$post = $real_post;
									}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-7">
						<div class="form-group">
							<?php $mb->the_field('notes'); ?>
							<label>Notes</label>
							<textarea class="ckeditor-repeatable" name="<?php $mb->the_name(); ?>" rows="8"><?php $mb->the_value(); ?></textarea>
						</div>
					</div>
				</div>
			</div>

		</div>
		<?php $mb->the_group_close(); ?>
		<?php endwhile; ?>

	<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-meetings button">Add Meeting</a></p>
</div>
