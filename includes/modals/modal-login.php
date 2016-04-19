<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Login</h4>
			</div>
			<div class="modal-body">
				 <?php
					 $args = array(
						 'remember' => false,
						 'label_log_in' => __( 'Login' ),
					 );
					 wp_login_form($args); ?>
						<small>Forgot your Password? <a href="<?php echo wp_lostpassword_url(); ?>" title="Lost Password">Reset Password</a></small>
			</div>
		</div>
	</div>
</div>
