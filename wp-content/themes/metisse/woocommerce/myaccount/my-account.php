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
				<?php woocommerce_login_form(); ?>
			</div>

			<!-- Registration Form -->
			<div class="register-form">
				<h2><?php esc_html_e('Register', 'woocommerce'); ?></h2>
				<?php woocommerce_register_form(); ?>
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