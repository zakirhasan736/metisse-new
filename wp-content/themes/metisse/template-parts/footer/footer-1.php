<?php

/**
 * Template part for displaying footer layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package metisse
 */
?>
<?php

// Check if Elementor plugin is active
if (class_exists('Elementor\Plugin')) {
    // Insert Elementor footer template
    echo '<footer class="footer-section">';
    echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display(55); 
    echo '</footer>';
}
?>

