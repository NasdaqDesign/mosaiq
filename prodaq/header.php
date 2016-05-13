<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php if (is_front_page()) { bloginfo('name'); } else { wp_title(''); } ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="robots" content="noindex">

		<link rel="apple-touch-icon" sizes="57x57" href="<?=get_asset_if_exists('/library/images/favicons/apple-touch-icon-57x57.png');?>">
		<link rel="apple-touch-icon" sizes="60x60" href="<?=get_asset_if_exists('/library/images/favicons/apple-touch-icon-60x60.png');?>">
		<link rel="apple-touch-icon" sizes="72x72" href="<?=get_asset_if_exists('/library/images/favicons/apple-touch-icon-72x72.png');?>">
		<link rel="apple-touch-icon" sizes="76x76" href="<?=get_asset_if_exists('/library/images/favicons/apple-touch-icon-76x76.png');?>">
		<link rel="apple-touch-icon" sizes="114x114" href="<?=get_asset_if_exists('/library/images/favicons/apple-touch-icon-114x114.png');?>">
		<link rel="apple-touch-icon" sizes="120x120" href="<?=get_asset_if_exists('/library/images/favicons/apple-touch-icon-120x120.png');?>">
		<link rel="apple-touch-icon" sizes="144x144" href="<?=get_asset_if_exists('/library/images/favicons/apple-touch-icon-144x144.png');?>">
		<link rel="apple-touch-icon" sizes="152x152" href="<?=get_asset_if_exists('/library/images/favicons/apple-touch-icon-152x152.png');?>">
		<link rel="apple-touch-icon" sizes="180x180" href="<?=get_asset_if_exists('/library/images/favicons/apple-touch-icon-180x180.png');?>">
		<link rel="icon" type="image/png" href="<?=get_asset_if_exists('/library/images/favicons/favicon-32x32.png');?>" sizes="32x32">
		<link rel="icon" type="image/png" href="<?=get_asset_if_exists('/library/images/favicons/android-chrome-192x192.png');?>" sizes="192x192">
		<link rel="icon" type="image/png" href="<?=get_asset_if_exists('/library/images/favicons/favicon-96x96.png');?>" sizes="96x96">
		<link rel="icon" type="image/png" href="<?=get_asset_if_exists('/library/images/favicons/favicon-16x16.png');?>" sizes="16x16">
		<link rel="manifest" href="<?=get_asset_if_exists('/library/images/favicons/manifest.json');?>">
		<link rel="mask-icon" href="<?=get_asset_if_exists('/library/images/favicons/safari-pinned-tab.svg');?>" color="#5bbad5">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="msapplication-TileImage" content="<?=get_asset_if_exists('/library/images/favicons/mstile-144x144.png');?>">
		<meta name="theme-color" content="#ffffff">

		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?>>
		<?php include 'includes/layout/search.php'; ?>


				<header class="header">

					<?php include 'includes/layout/nav.php'; ?>

				</header>
