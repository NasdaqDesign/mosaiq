
<header class="prodaq-header prodaq-header--sm prodaq-header__campaign">
	<div class="prodaq-header__title">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h1><?php echo get_the_title(); ?></h1>
				</div>
				<div class="col-md-4">
					<div class="campaign__meta">
						<p><em><?php the_modified_date( $d, 'Last Updated '); ?> </em></p>
						<?php if (is_user_logged_in()) {
							echo '<a href="' . admin_url() . 'post.php?post='. get_the_id() . '&action=edit">Edit</a>';
						} ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
