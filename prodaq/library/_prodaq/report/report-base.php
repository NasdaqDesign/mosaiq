<?php global $wpalchemy_media_access; ?>
<ul class="nav nav-tabs" role="tablist">
	<li role="presentation" class="active"><a href="#general" aria-controls="research" role="tab" data-toggle="tab">General</a></li>
	<li role="presentation"><a href="#methodology" aria-controls="methodology" role="tab" data-toggle="tab">Methodology</a></li>
	<li role="presentation"><a href="#themes" aria-controls="themes" role="tab" data-toggle="tab">Themes</a></li>
	<li role="presentation"><a href="#quotes" aria-controls="quotes" role="tab" data-toggle="tab">Participants &amp; Quotes</a></li>
	<li role="presentation"><a href="#images" aria-controls="images" role="tab" data-toggle="tab">Images</a></li>
	<li role="presentation"><a href="#next" aria-controls="next" role="tab" data-toggle="tab">Next Steps</a></li>
</ul>

<div class="tab-content">
	<div role="tabpanel" class="tab-pane active" id="general">
				<?php include '_general.php'; ?>
	</div>
	<div role="tabpanel" class="tab-pane" id="methodology">
				<?php include '_methodology.php'; ?>
	</div>
	<div role="tabpanel" class="tab-pane" id="themes">
				<?php include '_themes.php'; ?>
	</div>
	<div role="tabpanel" class="tab-pane" id="quotes">
				<?php include '_quotes.php'; ?>
	</div>
	<div role="tabpanel" class="tab-pane" id="images">
				<?php include '_images.php'; ?>
	</div>
	<div role="tabpanel" class="tab-pane" id="next">
				<?php include '_next.php'; ?>
	</div>
</div>
