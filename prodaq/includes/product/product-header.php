<header class="product__header page__header">
	<div class="container">
			<h1 class="pull-left"><?php echo get_the_title(); ?></h1>
			<ul class="pull-right">
				<?php if(!empty($site)){
					echo '<li><a data-toggle="tooltip" title="Prototype" data-placement="top" href="' . $site . '"><i class="fa fa-chrome"></i></a></li>';
				}
				if(!empty($github)){
					echo '<li><a data-toggle="tooltip" title="Github" data-placement="top" href="' . $github . '"><i class="fa fa-github-alt"></i></a></li>';
				}
				if(!empty($basecamp)){
					echo '<li><a data-toggle="tooltip" title="Basecamp" data-placement="top" href="' . $basecamp . '"><i class="fa fa-trello"></i></a></li>';
				}?>

			</ul>
	</div>
	<div class="overlay"></div>
</header>
