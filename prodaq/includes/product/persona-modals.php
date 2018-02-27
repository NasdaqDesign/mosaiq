<?php

	if(!empty($personas)){
	// Persona modals
	foreach($personas as $persona){

		$content = get_post($persona);

		$cats = get_the_terms( $content->ID, 'persona_product' );
		$thumb = get_the_post_thumbnail($content->ID, 'persona-thumb');
		$link = get_the_permalink($content->ID);
		$goals = get_post_meta($content->ID, '_persona_goals', true);
		$painpoints = get_post_meta($content->ID, '_persona_pains', true);
		$summary = get_post_meta($content->ID, '_persona_summary', true); ?>

		<div class="modal persona-modal fade" id="<?php echo $content->post_name;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<div class="thumb-wrapper">
							<?php echo $thumb; ?>
						</div>
						<div class="persona-details">
							<h3 class="modal-title"><?php echo $content->post_title; ?></h3>
							<h4><?php echo get_post_meta($content->ID, '_persona_details_role', true); ?></h4>
							<p>
								<?php
								if(!empty( $cats )){
									foreach($cats as $cat){
										// echo '<span class="label">' . $term->name . '</span>';
										echo '<span>'. $cat->name . '</span>';
									}
								}
								 ?>
							</p>
						</div>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<!-- Nav tabs -->
					<ul class="nav modal-nav" role="tablist">
						<li role="presentation" class="active"><a href="#<?php echo $content->post_name; ?>-summary" aria-controls="summary" role="tab" data-toggle="tab">Summary</a></li>
						<li role="presentation"><a href="#<?php echo $content->post_name; ?>-goals" aria-controls="goals" role="tab" data-toggle="tab">Goals</a></li>
						<li role="presentation"><a href="#<?php echo $content->post_name; ?>-pain" aria-controls="pain" role="tab" data-toggle="tab">Pain Points</a></li>
					</ul>
					<div class="modal-body">

							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active fade in" id="<?php echo $content->post_name; ?>-summary">
									<p><?php echo wp_trim_words( $summary, 175, '...' ); ?></p>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="<?php echo $content->post_name; ?>-goals">
									<?php
									if(!empty($goals)){

										echo '<ul>';
										foreach($goals as $goal){
											echo '<li>' . $goal['goal'] . '</li>';

										}
										echo '</ul>';
									}?>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="<?php echo $content->post_name; ?>-pain">
									<?php
									if(!empty($painpoints)){

										echo '<ul>';
										foreach($painpoints as $painpoint){
											echo '<li>' . $painpoint['pain_point'] . '</li>';

										}
										echo '</ul>';
									}?>
								</div>
							</div>

					</div><?php // End Modal body ?>

					<a class="view-full" href="<?php echo $link; ?>"><i class="fa fa-user"></i> View Full Persona</a>

				</div>
			</div>
		</div>
	<?php }
	}
?>
