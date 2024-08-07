<?php

/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_lost_password_form');
?>
<div class="customer-authertication-wrapper py-[130px] lg:py-[100px] md:py-[80px] min-h-[650px]">
	<div class="grid grid-cols-12 gap-[35px]" id="customer_login">
		<div class="col-span-6 sm:col-span-full">
			<div class="customer-auth-model-side flex items-center justify-center h-full">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/brand-logo-modal.svg" alt="logo brand modal">
			</div>
		</div>
		<div class="col-span-6 sm:col-span-full">
			<form method="post" class="woocommerce-ResetPassword lost_reset_password tp-woo-input-field">

				<p class=" text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px] mb-3"><?php echo apply_filters('woocommerce_lost_password_message', esc_html__('Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'metisse')); ?></p><?php // @codingStandardsIgnoreLine 
																																																																																	?>

				<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
					<label for="user_login" class="mb-[3px] text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px]"><?php esc_html_e('Username or email', 'metisse'); ?></label>
					<input class="woocommerce-Input woocommerce-Input--text input-text  text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px] !py-[16px] !px-[20px] placeholder:opacity-50 !border-2 !border-[#000]" placeholder="johndoe@domain.com" type="text" name="user_login" id="user_login" autocomplete="username" />
				</p>

				<div class="clear"></div>

				<?php do_action('woocommerce_lostpassword_form'); ?>

				<p class="woocommerce-form-row form-row mt-[20px] sm:mt-[15px]">
					<input type="hidden" name="wc_reset_password" value="true" />
					<button type="submit" class="tp-btn woocommerce-Button button !text-[14px] !text-[#fff] h-[52px] !font-primary !font-medium !bg-[#000] !py-[14px] !leading-[1.1] w-[197px]<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" value="<?php esc_attr_e('Reset password', 'metisse'); ?>"><?php esc_html_e('Reset password', 'metisse'); ?></button>
				</p>

				<?php wp_nonce_field('lost_password', 'woocommerce-lost-password-nonce'); ?>

			</form>
		</div>
	</div>
</div>
<?php
do_action('woocommerce_after_lost_password_form');
