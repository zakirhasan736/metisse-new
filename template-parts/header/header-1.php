<?php

/**
 * Template part for displaying header layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package metisse
 */
?>
<?php
// Check if Elementor plugin is active
if (class_exists('Elementor\Plugin')) {
	// Insert Elementor header template
	echo '<header class="header-section">';
	echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display(47);
	
	echo '</header>';
	
}
?>


