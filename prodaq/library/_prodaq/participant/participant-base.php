<?php global $wpalchemy_media_access; ?>
<ul class="nav nav-tabs" role="tablist">
	<li role="presentation" class="active"><a href="#general" aria-controls="home" role="tab" data-toggle="tab">General</a></li>
	<li role="presentation"><a href="#details" aria-controls="details" role="tab" data-toggle="tab">Details</a></li>
	<li role="presentation"><a href="#meetings" aria-controls="meetings" role="tab" data-toggle="tab">Meetings</a></li>
	<li role="presentation"><a href="#quotes" aria-controls="quotes" role="tab" data-toggle="tab">Quotes</a></li>
</ul>

<div class="tab-content">
	<div role="tabpanel" class="tab-pane active" id="general">
		<?php include( '_general.php' ); ?>
	</div>

	<div role="tabpanel" class="tab-pane" id="details">
		<?php include( '_details.php' ); ?>
	</div>

	<div role="tabpanel" class="tab-pane" id="meetings">
		<?php include( '_meetings.php' ); ?>
	</div>

	<div role="tabpanel" class="tab-pane" id="quotes">
		<?php include( '_quotes.php' ); ?>
	</div>
</div>
