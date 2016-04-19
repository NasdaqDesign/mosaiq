<?php
//Work with us page
$wwu = new Cuztom_Post_Type('page');
if($template_file == 'templates/page-work.php'){
	$wwu->add_meta_box(
		'slides',
		'Page Slides',
		array(
			'bundle',
			array(
				array(
						'name'          => 'title',
						'label'         => 'Title',
						'description'		=> 'Needed for Slide Navigation',
						'type'          => 'text'
				),
				array(
						'name'          => 'content',
						'label'         => 'Content',
						'type'          => 'wysiwyg'
				),
				array(
						'name'          => 'image',
						'label'         => 'Background Image',
						'description'   => 'Should be high rez',
						'type'          => 'image'
				)
			)
		)
	);
}
