<?php

/**
 * Registaretion Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-registaretion.php.
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