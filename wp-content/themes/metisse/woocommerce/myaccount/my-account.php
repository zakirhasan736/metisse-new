<?php

/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined('ABSPATH') || exit;
?>
<div class="my-account-main-cont-wrapper">
	<div class="my-account-banner py-[29px] bg-[#0000000d]">
		<div class="custom-container-new">
			<h1 class="my-account-title text-left sm:text-center text-[34px] md:text-[28px] sm:text-[24px] text-[#000] font-primary font-normal leading-[1.1]">Account</h1>
		</div>
	</div>
	<div class="my-account-wrapper-box pt-[49px] pb-[52px]">
		<div class="custom-container-auth-area-box  custom-container-new">
			<div class="my-account-wrapper-cont-box flex items-start sm:flex-col gap-[119px] lg:gap-[80px] md:gap-[60px] sm:gap-[65px] min-h-[557px] sm:min-h-auto h-full">
				<div class="my-account-sidebar h-full min-h-[557px] sm:min-h-[100%] max-w-[230px] sm:max-w-[100%] w-full">
					<?php
					/**
					 * My Account navigation.
					 *
					 * @since 2.6.0
					 */
					do_action('woocommerce_account_navigation'); ?>
				</div>
				<div class="my-account-woo-main-cont w-full">
					<div class="woocommerce-MyAccount-content tp-woo-myaccount-content">
						<?php
						/**
						 * My Account content.
						 *
						 * @since 2.6.0
						 */
						do_action('woocommerce_account_content');
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>