<?php

/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

?>

<div class="customer-authentication-wrapper h-[636px]">
	<div class="grid grid-cols-12 sm:grid-cols-6 h-full" id="customer_login">
		<?php
		do_action('woocommerce_before_customer_login_form');

		$woocommerce_enable_myaccount_registration = get_option('woocommerce_enable_myaccount_registration');
		?>

		<?php if ('yes' === $woocommerce_enable_myaccount_registration) : ?>
			<div class="col-span-6 sm:col-span-6 h-full">
				<div class="tp-woo-input-field h-full tp-woo-form-login tp-woo-myaccount-register registaretion-forms">
					<div class="h-full registaretion-area-form-box pt-[145px]">
						<div class="auth-screen-title-box mb-10">
							<h2 class="tp-woo-myaccount-login-title mb-[8px] text-[274px] !text-[#131313] font-secondary font-bold capitalize md:text-[20px] sm:text-[18px] tracking-[.24px] leading-[1.2]"><?php esc_html_e('New here? Create an account', 'metisse'); ?></h2>
							<p class="suth-screen-desc text-[12px] text-left font-normal font-secondary leading-[1.5]">Set up an account so we can remember your details and speed up your next visit.</p>
						</div>
						<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?>>

							<?php do_action('woocommerce_register_form_start'); ?>

							<?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

								<!-- <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mb-[30px] sm:mb-[15px]">
									<label for="reg_username" class="text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px]"><?php esc_html_e('Username', 'metisse'); ?>&nbsp;<span class="required">*</span></label>
									<input placeholder="Username" type="text" class="woocommerce-Input woocommerce-Input--text input-text text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px] !py-[16px] !px-[20px] placeholder:opacity-50 !border-2 !border-[#000]" name="username" id="reg_username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" />
								</p> -->

							<?php endif; ?>
							<div class="user-email-pass-box">
								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mb-[30px] sm:mb-[15px]">
									<!-- <label for="reg_email" class="text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px]"><?php esc_html_e('Email address', 'metisse'); ?>&nbsp;<span class="required">*</span></label> -->
									<input placeholder="johndoe@domain.com" type="email" class="woocommerce-Input woocommerce-Input--text input-text text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px] !py-[16px] !px-[20px] placeholder:opacity-50 !border-2 !border-[#000]" name="email" id="reg_email" autocomplete="email" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" />
								</p>

								<?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>

									<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mb-[30px] sm:mb-[15px]">
										<!-- <label for="reg_password" class="text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px]"><?php esc_html_e('Password', 'metisse'); ?>&nbsp;<span class="required">*</span></label> -->
										<input placeholder="Password" type="password" class="woocommerce-Input woocommerce-Input--text input-text text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px] !py-[16px] !px-[20px] placeholder:opacity-50 !border-2 !border-[#000]" name="password" id="reg_password" autocomplete="new-password" />
									</p>

								<?php else : ?>

									<p><?php esc_html_e('A link to set a new password will be sent to your email address.', 'metisse'); ?></p>

								<?php endif; ?>
							</div>


							<p class="woocommerce-form-row form-row">
								<?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
								<button type="submit" class="tp-login-btn woocommerce-Button woocommerce-button button !text-[14px] !text-[#fff] h-[52px] !font-primary !font-medium !bg-[#000] !py-[14px] !leading-[1.1] w-[197px] sm:w-full<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?> woocommerce-form-register__submit" name="register" value="<?php esc_attr_e('Register', 'metisse'); ?>"><?php esc_html_e('Register', 'metisse'); ?></button>
							</p>

							<?php do_action('woocommerce_register_form'); ?>
							<?php do_action('woocommerce_register_form_end'); ?>

						</form>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<div class="col-span-6 sm:col-span-6 h-full">
			<div class="tp-woo-input-field h-full tp-woo-form-login login-forms">
				<div class="h-full login-area-fomr-box pt-[145px]">
					<div class="auth-screen-title-box mb-19">
						<h2 class="tp-woo-myaccount-login-title mb-[8px] text-[274px] !text-[#131313] font-secondary font-bold capitalize md:text-[20px] sm:text-[18px] tracking-[.24px] leading-[1.2]"><?php esc_html_e('Welcome back!', 'metisse'); ?></h2>
						<p class="suth-screen-desc text-[12px] text-left font-normal font-secondary leading-[1.5]">Login to manage your account and see your order history.</p>
					</div>
					<form class="woocommerce-form woocommerce-form-login login" method="post">

						<?php do_action('woocommerce_login_form_start'); ?>

						<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-row-first mb-[30px] sm:mb-[15px]">
							<!-- <label for="username" class="mb-[3px] text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px]"><?php esc_html_e('Email address', 'metisse'); ?>&nbsp;<span class="required">*</span></label> -->
							<input type="text" class="woocommerce-Input woocommerce-Input--text input-text text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px] !py-[16px] !px-[20px] placeholder:opacity-50 !border-2 !border-[#000]" placeholder="johndoe@domain.com" name="username" id="username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" />
						</p>
						<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-row-last">
							<!-- <label for="password" class="mb-[3px] text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px]"><?php esc_html_e('Password', 'metisse'); ?>&nbsp;<span class="required">*</span></label> -->
							<input class="woocommerce-Input woocommerce-Input--text input-text text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px] !py-[16px] !px-[20px] placeholder:opacity-50 !border-2 !border-[#000]" placeholder="••••••••••" type="password" name="password" id="password" autocomplete="current-password" />
						</p>

						<?php do_action('woocommerce_login_form'); ?>

						<p class="form-row mt-[30px] sm:mt-[20px]">
							<?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
						<div class="auth-submit flex items-center justify-between md:flex-col md:gap-[15px]">
							<button type="submit" class="woocommerce-button button woocommerce-form-login__submit !text-[14px] !text-[#fff] h-[52px] !font-primary !font-medium !bg-[#000] !py-[14px] !leading-[1.1] w-[197px]<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" name="login" value="<?php esc_attr_e('Log in', 'metisse'); ?>"><?php esc_html_e('Log in', 'metisse'); ?></button>

							<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme flex items-center gap-[10px] cursor-pointer !font-primary !font-medium" for="rememberme">
								<input class="woocommerce-form__input woocommerce-form__input-checkbox woocommerce-form-login__input-checkbox !h-[18px] !w-[18px] cursor-pointer border-[2px] border-solid border-[rgba(6, 11, 38, 0.1)] bg-[rgba(6, 11, 38, 0.04)] rounded-sm" name="rememberme" type="checkbox" id="rememberme" value="forever" />
								<span class="text-[14px] leading-[14px] text-[#1a1b1f] capitalize font-primary font-medium"><?php esc_html_e('Remember me', 'metisse'); ?></span>
							</label>

							<p class="woocommerce-LostPassword lost_password text-[14px] leading-[14px] capitalize font-primary font-medium underline"><a href="<?php echo esc_url(wp_lostpassword_url()); ?>" class="text-[inherit]"><?php esc_html_e('Forgot your password?', 'metisse'); ?></a></p>
						</div>
						</p>

						<?php do_action('woocommerce_login_form_end'); ?>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php do_action('woocommerce_after_customer_login_form'); ?>