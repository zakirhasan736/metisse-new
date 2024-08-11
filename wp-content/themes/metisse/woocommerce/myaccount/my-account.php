<?php

/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined('ABSPATH') || exit;

if (!is_user_logged_in()) : ?>

	<div class="my-account-login-register">
		<div class="login-register-forms">

			<!-- Login Form -->
			<div class="login-form">
				<?php
				do_action('woocommerce_before_customer_login_form');


				$woocommerce_enable_myaccount_registration = get_option('woocommerce_enable_myaccount_registration');
				$form_col = get_option('woocommerce_enable_myaccount_registration') === 'yes' ? 'col-lg-6' : 'col-lg-6';
				$form_row = get_option('woocommerce_enable_myaccount_registration') === 'yes' ? '' : 'justify-content-center';

				?>



				<div class="customer-authertication-wrapper py-[130px] lg:py-[100px] md:py-[80px] min-h-[650px]">
					<div class="grid grid-cols-12 gap-[35px] sm:grid-cols-6" id="customer_login">
						<div class="col-span-6 sm:col-span-6">
							<div class="customer-auth-model-side flex items-center justify-center h-full">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/brand-logo-modal.svg" class="sm:w-[200px]" alt="logo brand modal">
							</div>
						</div>
						<div class="col-span-6 sm:col-span-6">
							<div class="tp-woo-input-field tp-woo-form-login">
								<h2 class="tp-woo-myaccount-login-title mb-[53px] sm:mb-[30px] text-[34px] !text-[#000] font-primary font-normal capitalize md:text-[28px] sm:text-[24px]"><?php esc_html_e('Login', 'metisse'); ?></h2>
								<form class="woocommerce-form woocommerce-form-login login" method="post">

									<?php do_action('woocommerce_login_form_start'); ?>

									<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-row-first mb-[30px] sm:mb-[15px]">
										<label class="mb-[3px] text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px]" for="username"><?php esc_html_e('email address', 'metisse'); ?>&nbsp;<span class="required">*</span></label>
										<input type="text" class="woocommerce-Input woocommerce-Input--text input-text text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px] !py-[16px] !px-[20px] placeholder:opacity-50 !border-2 !border-[#000]" placeholder="johndoe@domain.com" name="username" id="username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
																																																																																																																?>
									</p>
									<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-row-last">
										<label class="mb-[3px] text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px]" for="password"><?php esc_html_e('Password', 'metisse'); ?>&nbsp;<span class="required">*</span></label>
										<input class="woocommerce-Input woocommerce-Input--text input-text text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px] !py-[16px] !px-[20px] placeholder:opacity-50 !border-2 !border-[#000]" placeholder="••••••••••" type="password" name="password" id="password" autocomplete="current-password" />
									</p>

									<?php do_action('woocommerce_login_form'); ?>

									<p class="form-row mt-[30px] sm:mt-[20px]">
										<?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
									<div class="auth-submite flex items-center justify-between md:flex-col md:gap-[15px]">
										<button type="submit" class="woocommerce-button button woocommerce-form-login__submit !text-[14px] !text-[#fff] h-[52px] !font-primary !font-medium !bg-[#000] !py-[14px] !leading-[1.1] w-[197px]<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" name="login" value="<?php esc_attr_e('Log in', 'metisse'); ?>"><?php esc_html_e('Login', 'metisse'); ?></button>
										<p class="woocommerce-LostPassword">
											<a href="/signup/" class="text-[16px] sm:text-[12px] font-medium font-primary !text-black !underline hover:!text-black"><?php esc_html_e('Create an account', 'metisse'); ?></a>
										</p>
									</div>
									</p>

									<p class="woocommerce-LostPassword mt-[35px]">
										<a href="<?php echo esc_url(wp_lostpassword_url()); ?>" class="text-[16px] sm:text-[12px] font-medium font-primary !text-black !underline hover:!text-black"><?php esc_html_e('Forgot password?', 'metisse'); ?></a>
									</p>

									<?php do_action('woocommerce_login_form_end'); ?>

								</form>
							</div>
						</div>

					</div>
				</div>


				<?php do_action('woocommerce_after_customer_login_form'); ?>
			</div>

			<!-- Registration Form -->
			<div class="register-form">
				<?php
				do_action('woocommerce_before_customer_login_form');

				$woocommerce_enable_myaccount_registration = get_option('woocommerce_enable_myaccount_registration');
				$form_col = get_option('woocommerce_enable_myaccount_registration') === 'yes' ? 'col-lg-6' : 'col-lg-6';
				$form_row = get_option('woocommerce_enable_myaccount_registration') === 'yes' ? '' : 'justify-content-center';
				?>
				<div class="customer-authertication-wrapper register-auth">
					<div class="grid grid-cols-12 gap-[35px] sm:grid-cols-6" id="customer_login">
						<div class="col-span-6 sm:col-span-6">
							<div class="customer-auth-model-side flex items-center justify-center h-full">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/brand-logo-modal.svg" class="sm:w-[200px]" alt="logo brand modal">
							</div>
						</div>
						<?php if ('yes' === $woocommerce_enable_myaccount_registration) : ?>
							<div class="col-span-6 sm:col-span-6">
								<div class="tp-woo-input-field tp-woo-form-login tp-woo-myaccount-register">
									<h2 class="tp-woo-myaccount-login-title  mb-[53px] sm:mb-[30px] text-[34px] !text-[#000] font-primary font-normal capitalize md:text-[28px] sm:text-[24px]"><?php esc_html_e('Register', 'metisse'); ?></h2>

									<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?>>

										<?php do_action('woocommerce_register_form_start'); ?>

										<?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

											<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mb-[30px] sm:mb-[15px]">
												<label for="reg_username" class="text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px]" for="username"><?php esc_html_e('Username', 'metisse'); ?>&nbsp;<span class="required">*</span></label>
												<input placeholder="Username" type="text" class="woocommerce-Input woocommerce-Input--text input-text  text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px] !py-[16px] !px-[20px] placeholder:opacity-50 !border-2 !border-[#000]" name="username" id="reg_username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
																																																																																																																	?>
											</p>

										<?php endif; ?>

										<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mb-[30px] sm:mb-[15px]">
											<label for="reg_email" class=" text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px]" for="username"><?php esc_html_e('Email address', 'metisse'); ?>&nbsp;<span class="required">*</span></label>
											<input placeholder="johndoe@domain.com" type="email" class="woocommerce-Input woocommerce-Input--text input-text  text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px] !py-[16px] !px-[20px] placeholder:opacity-50 !border-2 !border-[#000]" name="email" id="reg_email" autocomplete="email" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
																																																																																																															?>
										</p>

										<?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>

											<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mb-[30px] sm:mb-[15px]">
												<label for="reg_password" class=" text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px]" for="username"><?php esc_html_e('Password', 'metisse'); ?>&nbsp;<span class="required">*</span></label>
												<input placeholder="Password" type="password" class="woocommerce-Input woocommerce-Input--text input-text  text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px] !py-[16px] !px-[20px] placeholder:opacity-50 !border-2 !border-[#000]" name="password" id="reg_password" autocomplete="new-password" />
											</p>

										<?php else : ?>

											<p><?php esc_html_e('A link to set a new password will be sent to your email address.', 'metisse'); ?></p>

										<?php endif; ?>
										<p class="woocommerce-form-row form-row">
											<?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
											<button type="submit" class="tp-login-btn woocommerce-Button woocommerce-button button !text-[14px] !text-[#fff] h-[52px] !font-primary !font-medium !bg-[#000] !py-[14px] !leading-[1.1] w-[197px] sm:w-full<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?> woocommerce-form-register__submit" name="register" value="<?php esc_attr_e('Register', 'metisse'); ?>"><?php esc_html_e('Register', 'metisse'); ?></button>
										</p>
										<?php do_action('woocommerce_register_form'); ?>

										<?php do_action('woocommerce_register_form_end'); ?>

									</form>
								</div>
							</div>
						<?php endif; ?>

					</div>
				</div>


				<?php do_action('woocommerce_after_customer_login_form'); ?>
			</div>

		</div>
	</div>

<?php else : ?>

	<div class="my-account-main-cont-wrapper">
		<div class="my-account-banner py-[29px] bg-[#0000000d]">
			<div class="custom-container">
				<h1 class="my-account-title text-left sm:text-center text-[34px] md:text-[28px] sm:text-[24px] text-[#000] font-primary font-normal leading-[1.1]">Account</h1>
			</div>
		</div>
		<div class="my-account-wrapper-box pt-[49px] pb-[52px]">
			<div class="custom-container">
				<div class="my-account-wrapper-cont-box flex items-start sm:flex-col gap-[119px] lg:gap-[80px] md:gap-[60px] sm:gap-[65px] min-h-[557px] sm:min-h-auto h-full">
					<div class="my-account-sidebar h-full min-h-[557px] sm:min-h-[100%] max-w-[230px] sm:max-w-[100%] w-full">
						<?php do_action('woocommerce_account_navigation'); ?>
					</div>
					<div class="my-account-woo-main-cont w-full">
						<div class="woocommerce-MyAccount-content tp-woo-myaccount-content">
							<?php do_action('woocommerce_account_content'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>