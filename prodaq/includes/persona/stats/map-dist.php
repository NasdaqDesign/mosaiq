<div class="map-dist">
	<div class="container">

		<div class="map-dist__map">
			<span class="region-count" data-amers="<?php echo count($amers); ?>" data-emea="<?php echo count($emea); ?>" data-apac="<?php echo count($apac); ?>"></span>

			<?php include( get_template_directory() . '/library/svg/dottedmap.svg'); ?>
		</div>

	</div>
</div>
