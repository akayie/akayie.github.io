<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog Mall
 */
/**
* Hook - blog_mall_action_doctype.
*
* @hooked blog_mall_doctype -  10
*/
do_action( 'blog_mall_action_doctype' );
?>
<head>
<?php
/**
* Hook - blog_mall_action_head.
*
* @hooked blog_mall_head -  10
*/
do_action( 'blog_mall_action_head' );
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>

<?php

/**
* Hook - blog_mall_action_before.
*
* @hooked blog_mall_page_start - 10
*/
do_action( 'blog_mall_action_before' );

/**
*
* @hooked blog_mall_header_start - 10
*/
do_action( 'blog_mall_action_before_header' );

/**
*
*@hooked blog_mall_site_branding - 10
*@hooked blog_mall_header_end - 15 
*/
do_action('blog_mall_action_header');

/**
*
* @hooked blog_mall_content_start - 10
*/
do_action( 'blog_mall_action_before_content' );

/**
 * Banner start
 * 
 * @hooked blog_mall_banner_header - 10
*/
do_action( 'blog_mall_banner_header' );  
