<?php

// Iframe page
$iframe = new Cuztom_Post_Type( 'page' );
if($template_file == 'templates/page-iframe.php'){
	$iframe->add_meta_box(
		'iframe_url',
		'iFrame URL',
		array(
			array(
					'name'          => 'url',
					'label'         => 'URL',
					'type'          => 'text'
			)
		)
	);
}
