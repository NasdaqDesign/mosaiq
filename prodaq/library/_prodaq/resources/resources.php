<?php
$resourcesData = new WPAlchemy_MetaBox(array
(
	'id' => '_resource_data',
	'mode' => WPALCHEMY_MODE_EXTRACT,
	'prefix' => '_resource_',
	'title' => 'Resources',
	'include_template' => 'templates/page-resources.php',
	'context' => 'normal', // same as above, defaults to "normal"
	'priority' => 'high', // same as above, defaults to "high"
	'template' => get_stylesheet_directory() . '/library/_prodaq/resources/resources-base.php'
));
