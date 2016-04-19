<nav role="navigation">
	<div class="navbar navbar-inverse navbar-fixed-top navbar-main">


		<div class="container">
			<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<a class="navbar-brand" href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="homepage">

				</a>

			</div>

			<div class="navbar-collapse collapse navbar-responsive-collapse">
				<?php bones_main_nav(); ?>
			</div>

		</div>
	</div>

</nav>
