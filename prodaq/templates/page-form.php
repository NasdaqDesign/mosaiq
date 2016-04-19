<?php
/*
Template Name: Page - Form
*/

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="page__header">
	<div class="container">
		<h1><?php echo the_title(); ?></h1>
	</div>
</div>
<div class="form__content">

	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="form__wrapper">
					<?php echo the_content(); ?>
				</div>
			</div>
			<div class="col-md-4">
				<!--div class="form__side-col">
					<h3>Testimonials</h3>
					<ul>
						<li>
							<p><em>Art party blue bottle church-key yr selvage. Godard pug pork belly PBR&B portland. Cray PBR&B bitters, try-hard mlkshk literally gentrify williamsburg biodiesel sustainable microdosing. Occupy typewriter lumbersexual, +1 hella franzen sustainable portland.</em></p>
							<h5>Steve, from Accounting</h5>
						</li>
						<li>
							<p><em>Art party blue bottle church-key yr selvage. Godard pug pork belly PBR&B portland. Cray PBR&B bitters, try-hard mlkshk literally gentrify williamsburg biodiesel sustainable microdosing. Occupy typewriter lumbersexual, +1 hella franzen sustainable portland.</em></p>
							<h5>Janice, from upstairs</h5>
						</li>

					</ul>

				</div-->
			</div>
		</div>

	</div>

</div>
<?php endwhile; ?>
<?php get_footer(); ?>
