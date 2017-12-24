<?php
/**
 * MVP custom functions, support, custom post types and more.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @since 1.0
 */

require get_template_directory() . '/includes/setup.php';
require get_template_directory() . '/includes/navigation.php';
require get_template_directory() . '/includes/custom-post-type.php';
require get_template_directory() . '/includes/json-api.php';
require get_template_directory() . '/includes/mvp-nav-walker.php';
require get_template_directory() . '/includes/acf.php';



// require get_template_directory() . '/includes/acf-module-loader.php';
require get_template_directory() . '/includes/editor.php';


	
// add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );