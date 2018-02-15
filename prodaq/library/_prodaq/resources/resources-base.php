<?php global $wpalchemy_media_access; ?>
<ul class="nav nav-tabs" role="tablist">
	<li role="presentation" class="active"><a href="#reading" aria-controls="reading" role="tab" data-toggle="tab">Reading</a></li>
	<li role="presentation"><a href="#discover" aria-controls="discover" role="tab" data-toggle="tab">Discover</a></li>
	<li role="presentation"><a href="#plan" aria-controls="plan" role="tab" data-toggle="tab">Plan</a></li>
	<li role="presentation"><a href="#design" aria-controls="design" role="tab" data-toggle="tab">Design</a></li>
	<li role="presentation"><a href="#validate" aria-controls="validate" role="tab" data-toggle="tab">Validate</a></li>
</ul>

<div class="tab-content">
	<div role="tabpanel" class="tab-pane active" id="reading">
			<?php include( '_reading.php' ); ?>
	</div>

	<div role="tabpanel" class="tab-pane" id="discover">
			<?php include( '_discover.php' ); ?>
	</div>
	<div role="tabpanel" class="tab-pane" id="plan">
			<?php include( '_plan.php' ); ?>
	</div>

	<div role="tabpanel" class="tab-pane" id="design">
			<?php include( '_design.php' ); ?>
	</div>
	<div role="tabpanel" class="tab-pane" id="validate">
			<?php include( '_validate.php' ); ?>
	</div>
</div>
