<div class="container">
	<div class="row">
		<div class="col-md-3">
			<?php if(!empty($links[0][_name])){

				echo '<h2>Links</h2>';
				echo '<ul>';
				foreach($links as $link){

					echo '<li>';
					echo '<a href="'. $link[_url] . '">' . $link[_name] . '</a>';
					echo '</li>';
				}
				echo '</ul>';
			}
			if(!empty($competitors[0][_name])){

				echo '<h2>Market</h2>';
				echo '<ul>';
				foreach($competitors as $competitor){

					echo '<li>';
					echo '<a href="'. $competitor[_url] .'">' . $competitor[_name] . '</a>';
					echo '</li>';
				}
				echo '</ul>';
			}

			?>
		</div>
		<div class="col-md-7">

			<h2>Documentation</h2>
		</div>
	</div>
</div>
