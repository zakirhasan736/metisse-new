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
				<h2><?php esc_html_e('Login', 'woocommerce'); ?></h2>
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
			</div>

			<!-- Registration Form -->
			<div class="register-form">
				<h2><?php esc_html_e('Register', 'woocommerce'); ?></h2>
				<?php do_action('woocommerce_register_form'); ?>

				<p class="woocommerce-form-row form-row">
					<?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
					<button type="submit" class="tp-login-btn woocommerce-Button woocommerce-button button<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?> woocommerce-form-register__submit" name="register" value="<?php esc_attr_e('Register', 'metisse'); ?>"><?php esc_html_e('Register', 'metisse'); ?></button>
				</p>

				<?php do_action('woocommerce_register_form_end'); ?>
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