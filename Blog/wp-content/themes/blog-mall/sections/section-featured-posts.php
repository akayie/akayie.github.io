<?php 
/**
 * Template part for displaying Featured Classes Section
 *
 *@package Blog Mall
 */
    $featured_posts_section_title           = blog_mall_get_option( 'featured_posts_section_title' );
    $featured_posts_column                  = blog_mall_get_option( 'featured_posts_column' );
    $featured_posts_content_type            = blog_mall_get_option( 'featured_posts_content_type' );
    $number_of_featured_posts_items         = blog_mall_get_option( 'number_of_featured_posts_items' );

    if( $featured_posts_content_type == 'featured_posts_page' ) :
        for( $i=1; $i<=$number_of_featured_posts_items; $i++ ) :
            $featured_posts_posts[] = absint( blog_mall_get_option( 'featured_posts_page_'.$i ) );
        endfor;  
    elseif( $featured_posts_content_type == 'featured_posts_post' ) :
        for( $i=1; $i<=$number_of_featured_posts_items; $i++ ) :
            $featured_posts_posts[] = absint( blog_mall_get_option( 'featured_posts_post_'.$i ) );
        endfor;
    endif;
    ?>

    <?php if( !empty($featured_posts_section_title) ):?>
        <div class="section-header">
            <h2 class="section-title"><?php echo esc_html($featured_posts_section_title);?></h2>
        </div><!-- .section-header -->
    <?php endif;?>

    <?php if( $featured_posts_content_type == 'featured_posts_page' ) : ?>
        <div class="section-content <?php echo esc_attr($featured_posts_column); ?> clear">
            <?php $args = array (
                'post_type'     => 'page',
                'posts_per_page' => absint( $number_of_featured_posts_items ),
                'post__in'      => $featured_posts_posts,
                'orderby'       =>'post__in',
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1;
                while ($loop->have_posts()) : $loop->the_post(); $i++; ?>             
                <article>
                    <div class="featured-posts-item">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="featured-image">
                                <a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
                            </div><!-- .featured-image -->
                        <?php endif; ?>

                        <div class="entry-container">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                            </header>

                            <?php blog_mall_posted_on(); ?>
                        </div><!-- .entry-container -->
                    </div><!-- .featured-posts-item -->
                </article>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- .section-content -->
    
    <?php else: ?>
        <div class="section-content <?php echo esc_attr($featured_posts_column); ?> clear">
            <?php $args = array (
                'post_type'     => 'post',
                'posts_per_page' => absint( $number_of_featured_posts_items ),
                'post__in'      => $featured_posts_posts,
                'orderby'       =>'post__in',
                'ignore_sticky_posts' => true,
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1;
                while ($loop->have_posts()) : $loop->the_post(); $i++; ?>                
                <article>
                    <div class="featured-posts-item">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="featured-image">
                                <a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
                            </div><!-- .featured-image -->
                        <?php endif; ?>

                        <div class="entry-container">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                            </header>

                            <?php blog_mall_posted_on(); ?>
                        </div><!-- .entry-container -->
                    </div><!-- .featured-posts-item -->
                </article>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- .section-content -->
    <?php endif;