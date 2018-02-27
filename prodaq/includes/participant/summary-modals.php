<?php
	if(!empty($meetings)){
	 foreach($meetings as $meeting){
	if(isset($meeting['interview_campaign_summary'])){

		$meetingSummaries = $meeting['interview_campaign_summary'];
		if(is_array($meetingSummaries)){
			foreach($meetingSummaries as $summary){
				$entry = GFAPI::get_entry($summary);

			?>
			<div class="modal participant-modal fade" id="summary<?php echo $summary; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<div class="participant-details">
								<h3 class="modal-title">
									Notes Taken By: <?=$entry[$interviewSummary['firstName']] . ' ' . $entry[$interviewSummary['lastName']];?>
								</h3>
								<h4><?=$entry[$interviewSummary['satisfaction']];?></h4>
							</div>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						</div>
						<div class="modal-section">
							<h4>Interview Participant's Name</h4>
							<p><?=$entry[$interviewSummary['participantName']];?></p>
						</div>
						<div class="modal-section">
							<h4>Participant's Background</h4>
							<p><?=$entry[$interviewSummary['participantBackground']];?></p>
						</div>
						<div class="modal-section">
							<h4>What were the biggest takeaways from this interview?</h4>
							<p><?=$entry[$interviewSummary['takeaways']];?></p>
						</div>
						<div class="modal-section">
							<h4>What elements are most important to the participant?</h4>
							<p><?=$entry[$interviewSummary['mostImportant']];?></p>
						</div>
						<div class="modal-section">
							<h4>What are the participants' pain points, if any?</h4>
							<p><?=$entry[$interviewSummary['painPoints']];?></p>
						</div>
						<div class="modal-section">
							<h4>Please provide a quote from the participant. If no quote available, note that here.</h4>
							<p><?=$entry[$interviewSummary['quote']];?></p>
						</div>
						<div class="modal-section">
							<h4>Additional comments?</h4>
							<p><?=$entry[$interviewSummary['comments']];?></p>
						</div>
					</div>
				</div>
			</div>
			<?php }
		}
		else{
			$entry = GFAPI::get_entry($meetingSummaries);

			?>
			<div class="modal participant-modal fade" id="summary<?php echo $meetingSummaries; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<div class="participant-details">
								<h3 class="modal-title">
									Notes Taken By: <?=$entry[$interviewSummary['firstName']] . ' ' . $entry[$interviewSummary['lastName']];?>
								</h3>
								<h4><?=$entry[$interviewSummary['satisfaction']];?></h4>
							</div>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						</div>
						<div class="modal-section">
							<h4>Interview Participant's Name</h4>
							<p><?=$entry[$interviewSummary['participantName']];?></p>
						</div>
						<div class="modal-section">
							<h4>Participant's Background</h4>
							<p><?=$entry[$interviewSummary['participantBackground']];?></p>
						</div>
						<div class="modal-section">
							<h4>What were the biggest takeaways from this interview?</h4>
							<p><?=$entry[$interviewSummary['takeaways']];?></p>
						</div>
						<div class="modal-section">
							<h4>What elements are most important to the participant?</h4>
							<p><?=$entry[$interviewSummary['mostImportant']];?></p>
						</div>
						<div class="modal-section">
							<h4>What are the participants' pain points, if any?</h4>
							<p><?=$entry[$interviewSummary['painPoints']];?></p>
						</div>
						<div class="modal-section">
							<h4>Please provide a quote from the participant. If no quote available, note that here.</h4>
							<p><?=$entry[$interviewSummary['quote']];?></p>
						</div>
						<div class="modal-section">
							<h4>Additional comments?</h4>
							<p><?=$entry[$interviewSummary['comments']];?></p>
						</div>
					</div>
				</div>
			</div>

			<?php
		}

	}
	}
}?>
