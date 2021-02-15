<?php
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/_u/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/_u/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/_u/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/_u/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/_u/jetpack.php';
}
