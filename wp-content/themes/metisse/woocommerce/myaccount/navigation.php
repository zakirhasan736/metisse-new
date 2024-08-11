<?php

/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if (!defined('ABSPATH')) {
	exit;
}

do_action('woocommerce_before_account_navigation');

if (class_exists('WPCleverWoosw')) {
	$wishlist_data = new WPCleverWoosw();
	$key        = $wishlist_data::get_key();
}

$exclude_nav_items = array('downloads', 'compare', 'wishlist');

?>

<div class="my-account-navigation-woo-wrapper h-full">
	<nav class="woocommerce-MyAccount-navigation">
		<ul class="flex  sm:flex-nowrap gap-3 sm:overflow-x-auto sm:pb-[10px] sm:overflow-y-hidden">
			<?php foreach (wc_get_account_menu_items() as $endpoint => $label) : ?>
				<?php if (!in_array($endpoint, $exclude_nav_items)) : ?>
					<li class="<?php echo wc_get_account_menu_item_classes($endpoint); ?> py-[7px] px-[14px] sm:pb-[15px] relative woo-my-account-navigation-items">

						<?php if ('wishlist' === $endpoint) : ?>
							<a href="<?php echo home_url($endpoint) . '/' . $key; ?>" class="sm:whitespace-nowrap text-center text-[11px] text-[#717171] font-primary font-normal tracking-[1.1px] uppercase leading-[1.2]"><?php echo esc_html($label); ?></a>
						<?php else :  ?>
							<?php
							// Rename "Order" to "Order History" and "Dashboard" to "Profile"
							if ($endpoint === 'orders') {
								$label = esc_html__('Orders', 'woocommerce');
							} elseif ($endpoint === 'dashboard') {
								$label = esc_html__('Profile', 'woocommerce');
							}
							?>
							<a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?> " class="sm:whitespace-nowrap text-center text-[11px] text-[#000] font-primary font-normal tracking-[1.1px] uppercase leading-[1.2]"><?php echo esc_html($label); ?></a>
						<?php endif; ?>
					</li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>
	</nav>
</div>

<?php do_action('woocommerce_after_account_navigation'); ?>