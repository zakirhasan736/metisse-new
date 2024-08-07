<?php

/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.7.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_edit_account_form'); ?>

<form class="woocommerce-EditAccountForm edit-account tp-woo-input-field" action="" method="post" <?php do_action('woocommerce_edit_account_form_tag'); ?>>

	<div class="woo-user-account-details max-w-[570px] w-full">
		<?php do_action('woocommerce_edit_account_form_start'); ?>
		<p class=" text-[24px] md:text-[20px] sm:text-[18px] font-semibold font-primary capitalize leading-none text-[#000] mb-[35px] sm:mb-[25px]">
			<?php esc_html_e('Account Details', 'metisse'); ?>
		</p>

		<div class="grid grid-cols-12  gap-x-[20px]">
			<div class="col-span-6 sm:col-span-full">
				<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first  mb-[20px] sm:mb-[12px]">
					<label class="mb-[3px] text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px]" for="account_first_name"><?php esc_html_e('First name', 'metisse'); ?>&nbsp;<span class="required">*</span></label>
					<input placeholder="First Name" type="text" class=" text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px] !py-[16px] !px-[20px] placeholder:opacity-50 !border-2 !border-[#000] woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr($user->first_name); ?>" />
				</p>
			</div>
			<div class="col-span-6 sm:col-span-full">
				<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last  mb-[20px] sm:mb-[12px]">
					<label class="mb-[3px] text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px]" for="account_last_name"><?php esc_html_e('Last name', 'metisse'); ?>&nbsp;<span class="required">*</span></label>
					<input placeholder="Last Name" type="text" class=" text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px] !py-[16px] !px-[20px] placeholder:opacity-50 !border-2 !border-[#000] woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr($user->last_name); ?>" />
				</p>
			</div>
			<div class="col-span-full">
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide  mb-[20px] sm:mb-[12px]">
					<label class="mb-[3px] text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px]" for="account_display_name"><?php esc_html_e('Display name', 'metisse'); ?>&nbsp;<span class="required">*</span></label>
					<input type="text" class=" text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px] !py-[16px] !px-[20px] placeholder:opacity-50 !border-2 !border-[#000] woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="<?php echo esc_attr($user->display_name); ?>" /> <span><em><?php esc_html_e('This will be how your name will be displayed in the account section and in reviews', 'metisse'); ?></em></span>
				</p>
			</div>
			<div class="col-span-full">
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide  mb-[20px] sm:mb-[12px]">
					<label class="mb-[3px] text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px]" for="account_email"><?php esc_html_e('Email address', 'metisse'); ?>&nbsp;<span class="required">*</span></label>
					<input type="email" class=" text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px] !py-[16px] !px-[20px] placeholder:opacity-50 !border-2 !border-[#000] woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr($user->user_email); ?>" />
				</p>
			</div>
		</div>
		<?php do_action('woocommerce_edit_account_form'); ?>

		<p>
			<?php wp_nonce_field('save_account_details', 'save-account-details-nonce'); ?>
			<button type="submit" class="!text-[14px] !text-[#fff] h-[52px] mt-[20px] sm:mt-[20px] !font-primary !font-medium !bg-[#000] !py-[14px] !leading-[1.1] w-[197px] tp-btn woocommerce-Button button<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" name="save_account_details" value="<?php esc_attr_e('Save changes', 'metisse'); ?>"><?php esc_html_e('Save changes', 'metisse'); ?></button>
			<input type="hidden" name="action" value="save_account_details" />
		</p>

	</div>
	<?php do_action('woocommerce_edit_account_form_end'); ?>
	<div class="reset-password-wrapper mt-[45px] sm:mt-[35px] max-w-[570px] w-full">
		<p class="text-[24px] md:text-[20px] sm:text-[18px] font-semibold font-primary capitalize leading-none text-[#000] mb-[35px] sm:mb-[25px]">
			<?php esc_html_e('Password change', 'metisse'); ?>
		</p>
		<div class="grid grid-cols-12 gap-x-[20px]">
			<div class="col-span-6 sm:col-span-full">
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide  mb-[20px] sm:mb-[12px]">
					<label class="mb-[3px] text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px]" for="password_current"><?php esc_html_e('Current password', 'metisse'); ?></label>
					<input placeholder="Current Password" type="password" class=" text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px] !py-[16px] !px-[20px] placeholder:opacity-50 !border-2 !border-[#000] woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off" />
				</p>
			</div>
			<div class="col-span-6 sm:col-span-full">
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide  mb-[20px] sm:mb-[12px]">
					<label class="mb-[3px] text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px]" for="password_1"><?php esc_html_e('New password', 'metisse'); ?></label>
					<input placeholder="New Password" type="password" class=" text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px] !py-[16px] !px-[20px] placeholder:opacity-50 !border-2 !border-[#000] woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off" />
				</p>
			</div>
			<div class="col-span-full">
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide  mb-[20px] sm:mb-[12px]">
					<label class="mb-[3px] text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px]" for="password_2"><?php esc_html_e('Confirm new password', 'metisse'); ?></label>
					<input placeholder="Confirm Password" type="password" class=" text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px] !py-[16px] !px-[20px] placeholder:opacity-50 !border-2 !border-[#000] woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off" />
				</p>
			</div>
		</div>
	</div>
	<div class="clear"></div>

	<?php do_action('woocommerce_edit_account_form'); ?>

	<p>
		<?php wp_nonce_field('save_account_details', 'save-account-details-nonce'); ?>
		<button type="submit" class="!text-[14px] !text-[#fff] h-[52px] mt-[20px] sm:mt-[20px] !font-primary !font-medium !bg-[#000] !py-[14px] !leading-[1.1] w-[197px] tp-btn woocommerce-Button button<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" name="save_account_details" value="<?php esc_attr_e('Save changes', 'metisse'); ?>"><?php esc_html_e('Save changes', 'metisse'); ?></button>
		<input type="hidden" name="action" value="save_account_details" />
	</p>

	<?php do_action('woocommerce_edit_account_form_end'); ?>
</form>

<?php do_action('woocommerce_after_edit_account_form'); ?>