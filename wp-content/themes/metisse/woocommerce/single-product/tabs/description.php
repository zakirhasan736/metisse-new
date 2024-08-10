<?php
/**
 * Description tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.1
 */

defined( 'ABSPATH' ) || exit;

global $post;

$heading = apply_filters( 'woocommerce_product_description_heading', __( ' ', 'metisse' ) );

?>

<?php
// Get the ACF WYSIWYG editor field value
$acf_wysiwyg_field = get_field('product_details_description'); 

// Convert newlines to HTML line breaks
$plain_text_content_with_br = nl2br($acf_wysiwyg_field);

// Output the content with preserved line breaks
echo $plain_text_content_with_br;
?>

