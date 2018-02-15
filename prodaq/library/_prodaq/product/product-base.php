<?php
	global $wpalchemy_media_access;
	global $post;
	$product_size = get_post_meta($post->ID, '_product_size', true);
?>
<ul class="nav nav-tabs" role="tablist">
	<li role="presentation" class="active"><a href="#what" aria-controls="what" role="tab" data-toggle="tab">What</a></li>
	<li role="presentation"><a href="#who" aria-controls="who" role="tab" data-toggle="tab">Who</a></li>
	<li role="presentation"><a href="#research" aria-controls="research" role="tab" data-toggle="tab">Research</a></li>
	<li role="presentation"><a href="#display" aria-controls="display" role="tab" data-toggle="tab">Display</a></li>
	<li role="presentation"><a href="#docs" aria-controls="docs" role="tab" data-toggle="tab">Documentation</a></li>
</ul>

<div class="tab-content">
	<div role="tabpanel" class="tab-pane active" id="what">
		<?php include('_what.php'); ?>
	</div>
	<div role="tabpanel" class="tab-pane" id="who">
		<?php include('_who.php'); ?>
	</div>
	<div role="tabpanel" class="tab-pane" id="research">
		<?php include('_research.php'); ?>
	</div>
	<div role="tabpanel" class="tab-pane" id="display">
		<?php include('_display.php'); ?>
	</div>

	<div role="tabpanel" class="tab-pane" id="docs">
		<div class="daq__control">
			<?php include('_documentation.php'); ?>
		</div>
	</div>


</div>
