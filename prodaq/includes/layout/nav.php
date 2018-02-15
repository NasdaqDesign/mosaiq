<nav class="prodaq-nav">
	<div class="container">
		<div class="prodaq-nav__wrap">
			<a class="brand" href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>">
				<div class="mark_container">
					<h1>MOSAIQ</h1>
				</div>
			</a>

			<div class="prodaq-nav__selector">
				<div class="btn-group dropdown">
					<button class="btn dropdown-toggle" data-toggle="dropdown">Product Research <span class="caret"></span></button>
					<ul class="dropdown-menu">
						<li><a href="http://charts.nasdaqdesign.com">Charting Library</a></li>
						<li><a href="http://ui.nasdaqdesign.com">UI Guidelines</a></li>
						<li><a href="http://nasdaqproductdesign.com/work">Product Research</a></li>
					</ul>
				</div>
			</div>

			<div class="prodaq-nav__site-nav">
				<?php bones_main_nav(); ?>
			</div>

			<ul class="prodaq-nav__links sign__in">
				<li>
					<div class="search search-toggle">
						<span class="search-icon icon">Search</span>
						<input type="search" placeholder="Search Participants, Companies, Titles" class="search__field" /><span class="search__icon" data-icon="search"></span>
					</div>
				</li>
				<li>
					<a href="./work/request-research" class="request">Request Research</a>

				</li>
			</ul>

		</div>
	</div>
</nav>
