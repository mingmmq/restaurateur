<?php 
/**
 * Template Name: Alt_HomePage, with Static Slider
 * Description: An alternative homepage that displays a image slider and static content.
 */
get_header(); ?>

    <div id="content" class="clearfix">
        
        <div id="main" class="clearfix sldr" role="main">
		
        	<div id="slide-wrap">
			  
			<?php if ( have_posts() ) : ?>
            
            <div id="load-cycle"></div>
              <div class="cycle-slideshow alt-static" <?php 
				  	if ( get_theme_mod('restaurateur_slider_effect') ) {
						echo 'data-cycle-fx="' . wp_kses_post( get_theme_mod('restaurateur_slider_effect') ) . '" data-cycle-tile-count="10"';
					} else {
						echo 'data-cycle-fx="scrollHorz"';
					}
				  ?> data-cycle-slides="div.slides" <?php
                  	if ( get_theme_mod('restaurateur_slider_timeout') ) {
						$slider_timeout = wp_kses_post( get_theme_mod('restaurateur_slider_timeout') );
						echo 'data-cycle-timeout="' . $slider_timeout . '000"';
					} else {
						echo 'data-cycle-timeout="3000"';
					}
				  ?> >
            
            <div class="cycle-pager"></div>
            <?php while ( have_posts() ) : the_post(); ?>
            
			<?php if ( has_shortcode( $post->post_content, 'gallery' ) )  : ?>
            
				<?php 
                $gallery = get_post_gallery( $post, false );
                $ids = explode( ",", $gallery['ids'] );
                $hasgallery = 1;
                
                foreach( $ids as $id ) {
                    $title = get_post_field('post_title', $id);
                    $meta = get_post_field('post_excerpt', $id);
                    $link = wp_get_attachment_url( $id );
                    $image  = wp_get_attachment_image( $id, array( 1000, 640 ));	
                ?>
                
                <div class="slides">
                
                  <div id="post-<?php the_ID(); ?>" <?php post_class('post-theme'); ?>>
                  
                      <div class="slide-thumb"><?php echo $image; ?></div>
                        
                  </div>
                
                </div><!-- .slides -->  
                
                <?php } ?>
            
            <?php else : ?>
            
			<?php
			   $args = array(
			   'post_type' => 'attachment',
			   'numberposts' => -1,
			   'post_status' => null,
			   'post_parent' => $post->ID,
			   'orderby' => 'menu_order', 
			   'order' => 'ASC'
			  );
			
			  $attachments = get_posts( $args );
				 if ( $attachments ) {
					foreach ( $attachments as $attachment ) { ?>
                    <div class="slides">
                      <div id="post-<?php the_ID(); ?>" <?php post_class('post-theme'); ?>>
                    	<div class="slide-thumb"><?php echo wp_get_attachment_image( $attachment->ID, array( 1000, 640 ), false, '' ); ?></div>
					   						
                      </div>
                    </div>
					  <?php }
				 } else {
					 ?>
                     <div class="no-slide-image"><?php _e('Images added to this page will appear here', 'restaurateur'); ?></div>
                     <?php
				 } ?>
                 
            <?php endif; ?> 
                 
 			<?php endwhile; ?>

            </div>
            <?php endif; ?> 

            </div>
            
            <?php $content = restaurateur_content(9999); ?>
			<?php $content = preg_replace(array('{<a[^>]*><img}','{/></a>}'), array('<img','/>'), $content); ?>
            <?php $content = preg_replace('/<img[^>]+./', '', $content); ?>
            <?php $content = preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content); ?>             
			<div class="intro-content">
				<?php echo $content; ?>
            </div>

        </div> <!-- end #main -->

    </div> <!-- end #content -->
    
<?php get_sidebar('home'); ?>
        
<?php get_footer(); ?>