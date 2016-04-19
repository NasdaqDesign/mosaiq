<header class="campaign__header page__header">
	<div class="container">
		<div class="row">

			<div class="col-md-8">
				<h1><?php echo get_the_title(); ?></h1>
			</div>
			<div class="col-md-4">
				<div class="campaign__meta">
					<p><em><?php the_modified_date( $d, 'Last Updated '); ?> </em></p>
					<p>
					<?php foreach($tags as $tag){
						echo '<a class="tag" href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a> ';
					}
					?></p>
				</div>
			</div>
		</div>
	</div>
</header>
