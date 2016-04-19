		<footer class="main">

			<div id="sub-floor">
				<div class="container">
					<div class="row">
						<div class="col-md-4 copyright">
							&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>
						</div>
					</div> <!-- end .row -->
				</div>
			</div>

		</footer> <!-- end footer -->

		<?php
			// if ( is_user_logged_in()==false ) :
				include (TEMPLATEPATH . '/includes/modals/modal-login.php');
			// endif;
		?>
		<!-- all js scripts are loaded in library/bones.php -->
		<?php wp_footer(); ?>

		<!-- Hello? Doctor? Name? Continue? Yesterday? Tomorrow?  -->

	</body>

</html> <!-- end page. what a ride! -->
