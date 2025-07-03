<?php
/**
 * Latest Posts Options.
 *
 * @package Blog Mall
 */

$default = blog_mall_get_default_theme_options();

// Latest Posts Section
$wp_customize->add_section( 'section_latest_posts',
	array(
		'title'      => __( 'Latest Posts Section', 'blog-mall' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
	)
);

// Enable Section
$wp_customize->add_setting('theme_options[enable_latest_posts_section]', 
	array(
	'default' 			=> $default['enable_latest_posts_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'blog_mall_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_latest_posts_section]', 
	array(		
	'label' 	=> __('Enable Section', 'blog-mall'),
	'section' 	=> 'section_latest_posts',
	'settings'  => 'theme_options[enable_latest_posts_section]',
	'type' 		=> 'checkbox',	
	)
);

// Section Title
$wp_customize->add_setting('theme_options[latest_posts_section_title]', 
	array(
	'default'           => $default['latest_posts_section_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[latest_posts_section_title]', 
	array(
	'label'       => __('Section Title', 'blog-mall'),
	'section'     => 'section_latest_posts',   
	'settings'    => 'theme_options[latest_posts_section_title]',	
	'active_callback' => 'blog_mall_latest_posts_active',		
	'type'        => 'text'
	)
);

// Latest Posts Number.
$wp_customize->add_setting( 'theme_options[latest_posts_number]',
	array(
		'default'           => $default['latest_posts_number'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blog_mall_sanitize_number_range',
		)
);
$wp_customize->add_control( 'theme_options[latest_posts_number]',
	array(
		'label'       		=> __('Items (Max: 3)', 'blog-mall'),
		'section'     		=> 'section_latest_posts',
		'active_callback' 	=> 'blog_mall_latest_posts_active',		
		'type'        		=> 'number',
		'input_attrs' 		=> array( 
			'min' => 1, 
			'max' => 3, 
			'step' => 1, 
			'style' => 'width: 115px;' 
		),
	)
);

// Column
$wp_customize->add_setting('theme_options[latest_posts_column]', 
	array(
	'default' 			=> $default['latest_posts_column'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'blog_mall_sanitize_select'
	)
);

$wp_customize->add_control(new blog_mall_Image_Radio_Control($wp_customize, 'theme_options[latest_posts_column]', 
	array(		
	'label' 	=> __('Select Column', 'blog-mall'),
	'section' 	=> 'section_latest_posts',
	'settings'  => 'theme_options[latest_posts_column]',
	'type' 		=> 'radio-image',
	'active_callback' => 'blog_mall_latest_posts_active',
	'choices' 	=> array(		
		'col-1' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-1.jpg',						
		'col-2' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-2.jpg',
		'col-3' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-3.jpg',
		),	
	))
);

$latest_posts_number = blog_mall_get_option( 'latest_posts_number' );

// Setting Category.
$wp_customize->add_setting( 'theme_options[latest_posts_category]',
	array(
	'default'           => $default['latest_posts_category'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new blog_mall_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[latest_posts_category]',
		array(
		'label'    => __( 'Select Category', 'blog-mall' ),
		'section'  => 'section_latest_posts',
		'settings' => 'theme_options[latest_posts_category]',	
		'active_callback' => 'blog_mall_latest_posts_active',		
		)
	)
);