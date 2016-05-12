<?php if(!empty($findings_type) || !empty($assets)){ ?>
	<div class="container">
		<?php
			echo '<div class="findings">';

			if(!empty($findings_type)){
				if($findings_type == 'document'){
					echo '<a href="' . $findings . '"><span class="file-icon file-icon-s" data-type="pdf"></span> Research Findings and Report</a>';
				}
				else{
					$report = get_post($findings_report);
					echo '<a href="' . get_permalink($findings_report) . '"><i class="icon">link</i> ' . $report->post_title . ' Report</a>';
				}

			}
			else{
				echo '<p><em>Findings report not yet available.</em></p>';
			}
			echo '</div><div class="other-assets">';
		if(!empty($assets)){
				echo '<ul>';
				$docCount = 0;
				foreach($assets as $asset){
					$ext = pathinfo($asset['document'], PATHINFO_EXTENSION);
					if($ext == 'jpg' || $ext == 'png'){
						$icon = 'image';
					}
					else if($ext == 'docx' ){
						$icon = 'docx';
					}
					else if($ext == 'pdf' ){
						$icon = 'pdf';
					}
					else if($ext == 'xlsx'){
						$icon = 'xlsx';
					}
					else if($ext == 'zip'){
						$icon = 'zip';
					}
					else if($ext == 'pptx'){
						$icon = 'pptx';
					}
					echo '<li>
						<a href="' . $asset['document'] . '"><span class="file-icon file-icon-s" data-type="'. $icon .'"></span> ' . $asset['title'] . '</a>
					</li>';
				}
				echo '</ul>';
			}
			echo '</div>';
			?>

	</div>
<?php } ?>
