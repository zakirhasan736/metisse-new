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
	<div class="my-account-wrapper-box pt-[49px] pb-[52px]">
		<div class="custom-container-auth-area-box  custom-container-new">
			<div class="user-info-box mb-[45px]">
				<h2 class="page-title mb-4 text-[24px] font-bold font-secondary text-left leading-[1.2] text-[#131313]">My Account</h2>
				<div class="user-info-main">
					<div class="user-info">
						<p class="text-[14px] font-normal font-secondary capitalize leading-none text-[#131313]">
							<?php
							printf(
								/* translators: 1: user display name */
								esc_html__('Welcome back, %s', 'woocommerce'),
								'<strong>' . esc_html($current_user->display_name) . '</strong>'
							);
							?>
						</p>
						
					</div>

				</div>

			</div>

			<div class="my-account-wrapper-cont-box flex items-start flex-col gap-[45px] lg:gap-[80px] md:gap-[60px] sm:gap-[65px] min-h-[557px] sm:min-h-auto h-full">
				<div class="my-account-sidebar h-full w-full border-b border-b-[#DCDCDC] w-full">
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