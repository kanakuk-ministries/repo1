<?php /* Template Name: Login */ ?>
<?php 
/**
 * The template for displaying the login page
 */

if (kan_is_logged_in()) {
	header("Location: /my-kanakuk");
	exit;
}

get_header(); ?>

<?php
	$phone_number = get_field('contact_phone_number');
	$email = get_field('contact_email');
	$image = get_field('image');
?>
	
	<div class="content login-page-content">
	
		<div class="inner-content grid-x grid-margin-x">
	
		    <main class="main small-12 large-12 medium-12 cell login-page" role="main">
					<div class="login-outer-container">
						<div class="grid-container">
							<div class="grid-x margin-top-70">
								<div class="login-form-container medium-6 medium-offset-1 ">
									<div class="full-width text-center login-form-welcome-container">
										<h1 class="dark-blue display login-heading">Welcome Back</h1>
										<p class="dark-blue bold margin-bottom-20">Please login or create a new account</p>
									</div>
									<div class="callout warning message error-message" style="display:none"></div>
									<form method="post" action="/wp-admin/admin-post.php?action=kan_login">
										<label>
											Email Address
											<input type="text" name="username">
										</label>
										<label>
											Password
											<input type="password" name="password">
										</label>
										<input type="hidden" name="company_code" value="kukt"/>
										<div class="login-form-extras-container margin-bottom-20">
											<div class="checkbox-container">
													<input id="remember-me" name="remember_me" type="checkbox">
													<label for="remember-me">Remember Me</label>
											</div>
											<div>
												<a class="bold small-text" href="#">Forgot password?</a>
											</div>
										</div>
										<?php wp_nonce_field('kan_login'); ?>
										<!-- <input type="submit" name="kan-login" value="Submit"> -->
										<div class="login-form-button-container margin-bottom-30">
											<div class="flex-1 button-container">
												<a href="<?php echo kan_url('register', false, false); ?>" class="large button warning hollow expanded">Create Account</a>
											</div>
											<div class="flex-1 button-container">
												<button class="large button warning expanded" type="submit" name="kan-login">Login</button>
											</div>
										</div>
										<div class="text-center">
											<p class="bold small-text margin-bottom-0 dark-blue">Need help?</p>
											<p class="small-text margin-bottom-0 dark-blue">Email 
												<span><a class="dark-blue" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></span>
												 or call 
												 <span><a class="dark-blue" href="tel:<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a></span>
											</p>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="login-form-image-container">
    					<div class="right-triangle"></div>
							<?php if (isSet($image)): ?>
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/kan-login-image.png" />
							<?php else: ?>
								<img src="<?php echo $image['url']; ?>" />
							<?php endif; ?>
						</div>
					</div>
				

			</main> <!-- end #main -->

		    <?php get_sidebar(); ?>
		    
			<?php #pr($_SESSION); ?>

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

	<script type="text/javascript">
	(function($) {
		$('form').on('submit', function(e) {
			e.preventDefault();
			$(".error-message").html("").hide();
			$.post($(this).attr('action'), $(this).serialize(), function(response) {
				if (response.status === 'error') {
					$(".error-message").html(response.message).show();
				}
				else {
					window.location = response.redirect;
				}
			});
		});
	})(jQuery);
	</script>

<?php get_footer(); ?>