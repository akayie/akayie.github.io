<?php
/**
 * Default theme options.
 *
 * @package Blog Mall
 */

if ( ! function_exists( 'blog_mall_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function blog_mall_get_default_theme_options() {

	$defaults = array();

	// Top Bar
	$defaults['show_header_contact_info'] 				= false;
    $defaults['show_header_social_links'] 				= false;
    $defaults['header_social_links']					= array();

    // Front Page Content
	$defaults['enable_frontpage_content'] 				= true;

	// Slider Section	
	$defaults['enable_featured_slider_section']		    = false;
	$defaults['number_of_featured_slider_items']	    = 3;
	$defaults['featured_slider_content_type']		    = 'featured_slider_post';

	// Featured Posts Section	
	$defaults['enable_featured_posts_section']			= false;
	$defaults['featured_posts_section_title']			= esc_html__( 'Featured Posts', 'blog-mall' );
	$defaults['number_of_featured_posts_items']			= 3;
	$defaults['featured_posts_column']					= 'col-3';
	$defaults['featured_posts_content_type']			= 'featured_posts_post';

	// Gallery Section	
	$defaults['enable_featured_gallery_section']		= false;
	$defaults['number_of_featured_gallery_items']		= 5;
	$defaults['featured_gallery_column']				= 'col-5';
	$defaults['featured_gallery_content_type']			= 'featured_gallery_post';

	// Latest Posts Section
	$defaults['enable_latest_posts_section']			= false;
	$defaults['latest_posts_section_title']	    		= esc_html__( 'Latest Articles', 'blog-mall' );
	$defaults['latest_posts_category']	   	    		= 0; 
	$defaults['latest_posts_number']					= 3;
	$defaults['latest_posts_column']					= 'col-3';

	// Theme Options
	$defaults['show_header_image']		    			= 'header-image-enable';
	$defaults['show_page_title']		    			= 'page-title-enable';
	$defaults['layout_options_blog']					= 'no-sidebar';
	$defaults['layout_options_archive']					= 'no-sidebar';
	$defaults['layout_options_page']					= 'no-sidebar';	
	$defaults['layout_options_single']					= 'right-sidebar';	
	$defaults['excerpt_length']							= 25;
	$defaults['your_latest_posts_title']				= esc_html__('Blog','blog-mall');

	//Footer section 		
	$defaults['copyright_text']							= esc_html__( 'Copyright &copy; All rights reserved.', 'blog-mall' );

	// Pass through filter.
	$defaults = apply_filters( 'blog_mall_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'blog_mall_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function blog_mall_get_option( $key ) {

		$default_options = blog_mall_get_default_theme_options();
		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;