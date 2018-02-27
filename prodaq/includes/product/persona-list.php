
<?php if(!empty($personas)){
	echo '<div class="container">
	<div class="persona-list__header">
		<h2>Personas</h2>
	</div>
	<ul class="personas row">';

	foreach($personas as $persona){
		$content = get_post($persona);?>
		<li class="col-md-3 col-sm-6">
			<div class="thumb__wrapper">
				<a data-target="#<?php echo $content->post_name; ?>" data-toggle="modal" href="#"><?php echo get_the_post_thumbnail($content->ID); ?></a>
			</div>
			<h3><a data-target="#<?php echo $content->post_name; ?>" data-toggle="modal" href="#"><?php echo $content->post_title; ?></a></h3>
			<h4><?php echo get_post_meta($content->ID, '_persona_role', true); ?></h4>
		</li>
	<?php }
	echo '</ul></div>';
}?>
