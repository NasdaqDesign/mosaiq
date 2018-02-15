<?php
	global $wpalchemy_media_access;
	global $post;
?>
<ul class="nav nav-tabs" role="tablist">
	<li role="presentation" class="active"><a href="#general" aria-controls="home" role="tab" data-toggle="tab">General</a></li>
	<li role="presentation"><a href="#goals" aria-controls="goals" role="tab" data-toggle="tab">Goals &amp; Pain Points</a></li>
	<li role="presentation"><a href="#activities" aria-controls="activities" role="tab" data-toggle="tab">Activities &amp; Connections</a></li>
	<li role="presentation"><a href="#notes" aria-controls="notes" role="tab" data-toggle="tab">Additional Notes</a></li>
	<li role="presentation"><a href="#participants" aria-controls="notes" role="tab" data-toggle="tab">Participants</a></li>
</ul>

<div class="tab-content">
	<div role="tabpanel" class="tab-pane active" id="general">
			<?php include('_general.php'); ?>
	</div>

	<div role="tabpanel" class="tab-pane" id="goals">
			<?php include('_goals.php'); ?>
	</div>
	<div role="tabpanel" class="tab-pane" id="activities">
			<?php include('_activities.php'); ?>
	</div>
	<div role="tabpanel" class="tab-pane" id="notes">
			<?php include('_notes.php'); ?>
	</div>
	<div role="tabpanel" class="tab-pane" id="participants">
			<?php include('_participants.php'); ?>
	</div>

</div>
