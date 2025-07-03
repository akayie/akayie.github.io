<?php
/**
 * Home Page Options.
 *
 * @package Blog Mall
 */

$default = blog_mall_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'home_page_panel',
	array(
	'title'      => __( 'Blog Mall Sections', 'blog-mall' ),
	'priority'   => 130,
	'capability' => 'edit_theme_options',
	)
);

/**
* Section Customizer Options.
*/
require get_template_directory() . '/inc/customizer/home-sections/featured-slider.php';
require get_template_directory() . '/inc/customizer/home-sections/featured-posts.php';
require get_template_directory() . '/inc/customizer/home-sections/latest-posts.php';
require get_template_directory() . '/inc/customizer/home-sections/featured-gallery.php';

