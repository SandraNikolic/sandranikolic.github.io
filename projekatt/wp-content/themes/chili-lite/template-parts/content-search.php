<?php
/**
 * Template part for displaying search posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Chili_Lite
 */

 
?>

<article id="post-<?php the_ID(); ?>" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 masonry-entry"> 
    <div class=" padding-bottom">
        <div class="single-blog">
        	<?php if(has_post_thumbnail()): ?>
	            <div class="blog-image">
	                <a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?>
	                    <i class="fa fa-link" aria-hidden="true"></i>
	                </a>                             
	            </div>
	        <?php endif; ?>
            <div class="blog-content-area">
                <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                <div class="informations">
                    <ul>
                        <li><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time(get_option( 'date_format' )); ?></li>
                        <li><i class="fa fa-user" aria-hidden="true"></i> <?php esc_html_e('by ','chili-lite'); the_author(); ?></li>
                    </ul>
                </div>
                <p><?php chili_lite_short_text_remove_shortcode(); ?></p>                                   
            </div>
        </div>
    </div> 
</article><!-- #post-## -->
