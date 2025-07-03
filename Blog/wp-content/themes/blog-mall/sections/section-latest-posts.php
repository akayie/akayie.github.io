<?php 
/**
 * Template part for displaying Blog Section
 *
 *@package Blog Mall
 */
?>
<?php 
    $latest_posts_section_title      		= blog_mall_get_option( 'latest_posts_section_title' );
	$latest_posts_category 		   			= blog_mall_get_option( 'latest_posts_category' );
	$latest_posts_number		       		= blog_mall_get_option( 'latest_posts_number' );
    $latest_posts_column             		= blog_mall_get_option( 'latest_posts_column' );
?> 
    <?php if( !empty($latest_posts_section_title) ):?>
        <div class="section-header">
            <h2 class="section-title"><?php echo esc_html($latest_posts_section_title);?></h2>
        </div><!-- .section-header -->
    <?php endif;?>

  	<div class="section-content <?php echo esc_attr($latest_posts_column); ?> clear">
	  	<?php
			$latest_posts_args = array(
				'posts_per_page' =>absint( $latest_posts_number ),				
				'post_type' => 'post',
	            'post_status' => 'publish',
	            'paged' => 1,
				);

				if ( absint( $latest_posts_category ) > 0 ) {
					$latest_posts_args['cat'] = absint( $latest_posts_category );
				}
			
			$loop = new WP_Query( $latest_posts_args );
			
			if ( $loop->have_posts() ) : 
			$i=-1; $j=0;	
				while ( $loop->have_posts() ) : $loop->the_post(); $i++; $j++; ?>    

			    <article>
			    	<div class="post-item">
				      	<?php if ( has_post_thumbnail() ) : ?>
                            <div class="featured-image">
                                <a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
                            </div><!-- .featured-image -->
                        <?php endif; ?>

				    	<div class="entry-container">
					        <header class="entry-header">
								<h2 class="entry-title">
									<a href="<?php the_permalink();?>"><?php the_title();?></a>
								</h2>
					        </header>

                            <?php blog_mall_posted_on(); ?>
				        </div><!-- .entry-container -->
				    </div><!-- .post-item -->
			    </article>
		    	<?php endwhile;?>
	    	<?php endif; ?>
		<?php wp_reset_postdata(); ?>
  	</div><!-- .section-content -->