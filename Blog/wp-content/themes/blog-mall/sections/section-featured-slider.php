<?php 
/**
 * Template part for displaying Slider Section
 *
 *@package Blog Mall
 */

    $featured_slider_content_type            = blog_mall_get_option( 'featured_slider_content_type' );
    $number_of_featured_slider_items         = blog_mall_get_option( 'number_of_featured_slider_items' );

    if( $featured_slider_content_type == 'featured_slider_page' ) :
        for( $i=1; $i<=$number_of_featured_slider_items; $i++ ) :
            $featured_slider_posts[] = absint( blog_mall_get_option( 'featured_slider_page_'.$i ) );
        endfor;  
    elseif( $featured_slider_content_type == 'featured_slider_post' ) :
        for( $i=1; $i<=$number_of_featured_slider_items; $i++ ) :
            $featured_slider_posts[] = absint( blog_mall_get_option( 'featured_slider_post_'.$i ) );
        endfor;
    endif;
    ?>

    <?php if( $featured_slider_content_type == 'featured_slider_page' ) : ?>
        <div class="section-content" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": false, "arrows": true, "autoplay": false, "draggable": true, "fade": true, "adaptiveHeight": true }'>
            <?php $args = array (
                'post_type'     => 'page',
                'posts_per_page' => absint( $number_of_featured_slider_items ),
                'post__in'      => $featured_slider_posts,
                'orderby'       =>'post__in',
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1;
                while ($loop->have_posts()) : $loop->the_post(); $i++;

                $class='';
                if ($i==0) {
                    $class='display-block';
                } else{
                    $class='display-none';}
                ?>        
                
                <article class="<?php echo esc_attr($class); ?>">
                    <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                        <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
                    </div><!-- .featured-image -->

                    <div class="entry-container">
                        <?php blog_mall_entry_meta(); ?>
                        
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                        </header>

                        <?php blog_mall_posted_on(); ?>
                    </div><!-- .entry-container -->
                </article>

                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- .section-content -->
    
    <?php else: ?>
        <div class="section-content" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": false, "arrows": true, "autoplay": false, "draggable": true, "fade": true, "adaptiveHeight": true }'>
            <?php $args = array (
                'post_type'     => 'post',
                'posts_per_page' => absint( $number_of_featured_slider_items ),
                'post__in'      => $featured_slider_posts,
                'orderby'       =>'post__in',
                'ignore_sticky_posts' => true,
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1;
                while ($loop->have_posts()) : $loop->the_post(); $i++;

                $class='';
                if ($i==0) {
                    $class='display-block';
                } else{
                    $class='display-none';}
                ?>            
                
                <article class="<?php echo esc_attr($class); ?>">
                    <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                        <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
                    </div><!-- .featured-image -->

                    <div class="entry-container">
                        <?php blog_mall_entry_meta(); ?>
                        
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                        </header>

                        <?php blog_mall_posted_on(); ?>
                    </div><!-- .entry-container -->
                </article>

                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- .section-content -->
    <?php endif;