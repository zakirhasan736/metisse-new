<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.3.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_mini_cart' ); ?>

<?php if ( ! WC()->cart->is_empty() ) : ?>

	<div class="woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">
		<div class="cartmini__widget">
					
		<?php
		do_action( 'woocommerce_before_mini_cart_contents' );

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
				$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
				$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				?>
				<div class="cartmini__widget-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
					<div class="cartmini__thumb">
						<?php if ( empty( $product_permalink ) ) : ?>
						<?php echo wp_kses_post($thumbnail); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						<?php else : ?>
							<a href="<?php echo esc_url( $product_permalink ); ?>">
								<?php echo wp_kses_post($thumbnail); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							</a>
						<?php endif; ?>
					</div>
					<div class="cartmini__content">
						<h5 class="cartmini__title"><a href="<?php echo esc_url( $product_permalink ); ?>"><?php echo wp_kses_post($product_name); ?></a></h5>

						<div class="cartmini__price-wrapper">
								<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</div>
						<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>

					<div class="cartmini__dels">
					<?php
						echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							'woocommerce_cart_item_remove_link',
							sprintf(
								'<a href="%s" class="cartmini__del remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"><i class="fa-regular fa-xmark"></i></a>',
								esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
								esc_attr__( 'Remove this item', 'shofy' ),
								esc_attr( $product_id ),
								esc_attr( $cart_item_key ),
								esc_attr( $_product->get_sku() )
							),
							$cart_item_key
						);
					?>
					</div>
					
                </div>
				
				<?php
			}
		}

		do_action( 'woocommerce_mini_cart_contents' );
		?>
		</div>
		<div class="cartmini__checkout">
			<div class="cartmini__checkout-title mb-30">
				<p class="woocommerce-mini-cart__total total">
					<?php
					/**
					 * Hook: woocommerce_widget_shopping_cart_total.
					 *
					 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
					 */
					do_action( 'woocommerce_widget_shopping_cart_total' );
					?>
				</p>
			</div>
			<div class="cartmini__checkout-btn">
				<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

				<?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?>

				<?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>
			</div>
		</div>        

	</div>



<?php else : ?>

	<div class="cartmini__empty text-center">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/product/cartmini/empty-cart.png" alt="<?php echo esc_attr__('empty-cart', 'shofy'); ?>">
		<p><?php esc_html_e( 'Your Cart is empty', 'shofy' );?></p>
		<a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>" class="tp-btn"><?php esc_html_e( 'Go To Shop', 'shofy' );?></a>
	</div>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
