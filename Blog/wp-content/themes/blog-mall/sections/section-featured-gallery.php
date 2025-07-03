<?php 
/**
 * Template part for displaying Featured Gallery Section
 *
 *@package Blog Mall
 */

    $featured_gallery_content_type            = blog_mall_get_option( 'featured_gallery_content_type' );
    $number_of_featured_gallery_items         = blog_mall_get_option( 'number_of_featured_gallery_items' );
    $featured_gallery_column                  = blog_mall_get_option( 'featured_gallery_column' );

    if( $featured_gallery_content_type == 'featured_gallery_page' ) :
        for( $i=1; $i<=$number_of_featured_gallery_items; $i++ ) :
            $featured_gallery_posts[] = absint( blog_mall_get_option( 'featured_gallery_page_'.$i ) );
        endfor;  
    elseif( $featured_gallery_content_type == 'featured_gallery_post' ) :
        for( $i=1; $i<=$number_of_featured_gallery_items; $i++ ) :
            $featured_gallery_posts[] = absint( blog_mall_get_option( 'featured_gallery_post_'.$i ) );
        endfor;
    endif;
    ?>

    <?php if( $featured_gallery_content_type == 'featured_gallery_page' ) : ?>
        <div class="section-content <?php echo esc_attr($featured_gallery_column); ?> clear">
            <?php $args = array (
                'post_type'     => 'page',
                'posts_per_page' => absint( $number_of_featured_gallery_items ),
                'post__in'      => $featured_gallery_posts,
                'orderby'       =>'post__in',
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1; $j=0; 
                while ($loop->have_posts()) : $loop->the_post(); $i++; $j++; ?>             
                
                <article>
                    <div class="featured-gallery-item">
                        <div class="featured-image" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>');">
                        </div><!-- .featured-image -->

                        <div class="entry-container">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                            </header>
                        </div><!-- .entry-container -->
                    </div><!-- .featured-gallery-item -->
                </article>

                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- .section-content -->
    
    <?php else: ?>
        <div class="section-content <?php echo esc_attr($featured_gallery_column); ?> clear">
            <?php $args = array (
                'post_type'     => 'post',
                'posts_per_page' => absint( $number_of_featured_gallery_items ),
                'post__in'      => $featured_gallery_posts,
                'orderby'       =>'post__in',
                'ignore_sticky_posts' => true,
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1; $j=0; 
                while ($loop->have_posts()) : $loop->the_post(); $i++; $j++; ?>                
                
                <article>
                    <div class="featured-gallery-item">
                        <div class="featured-image" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>');">
                        </div><!-- .featured-image -->

                        <div class="entry-container">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                            </header>
                        </div><!-- .entry-container -->
                    </div><!-- .featured-gallery-item -->
                </article>

                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- .section-content -->
    <?php endif;