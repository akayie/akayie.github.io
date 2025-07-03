<?php
/**
 * Active callback functions.
 *
 * @package Blog Mall
 */

function blog_mall_featured_slider_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[enable_featured_slider_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function blog_mall_featured_slider_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_slider_content_type]' )->value();
    return ( blog_mall_featured_slider_active( $control ) && ( 'featured_slider_page' == $content_type ) );
}

function blog_mall_featured_slider_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_slider_content_type]' )->value();
    return ( blog_mall_featured_slider_active( $control ) && ( 'featured_slider_post' == $content_type ) );
}

function blog_mall_featured_posts_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[enable_featured_posts_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function blog_mall_featured_posts_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_posts_content_type]' )->value();
    return ( blog_mall_featured_posts_active( $control ) && ( 'featured_posts_page' == $content_type ) );
}

function blog_mall_featured_posts_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_posts_content_type]' )->value();
    return ( blog_mall_featured_posts_active( $control ) && ( 'featured_posts_post' == $content_type ) );
}

function blog_mall_featured_gallery_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[enable_featured_gallery_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function blog_mall_featured_gallery_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_gallery_content_type]' )->value();
    return ( blog_mall_featured_gallery_active( $control ) && ( 'featured_gallery_page' == $content_type ) );
}

function blog_mall_featured_gallery_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_gallery_content_type]' )->value();
    return ( blog_mall_featured_gallery_active( $control ) && ( 'featured_gallery_post' == $content_type ) );
}

function blog_mall_latest_posts_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[enable_latest_posts_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

/**
 * Active Callback for top bar section
 */
function blog_mall_contact_info_ac( $control ) {

    $show_contact_info = $control->manager->get_setting( 'theme_options[show_header_contact_info]')->value();
    $control_id        = $control->id;
         
    if ( $control_id == 'theme_options[header_location]' && $show_contact_info ) return true;
    if ( $control_id == 'theme_options[header_email]' && $show_contact_info ) return true;
    if ( $control_id == 'theme_options[header_phone]' && $show_contact_info ) return true;

    return false;
}

function blog_mall_social_links_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[show_header_social_links]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}