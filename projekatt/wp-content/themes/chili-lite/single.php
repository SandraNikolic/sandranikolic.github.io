<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Chili_Lite
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main"> 

            <div class="blog-page-area">
              <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    	<?php while(have_posts()): the_post(); 
                    		get_template_part('template-parts/content','single');
    						// If comments are open or we have at least one comment, load up the comment template.
    						if ( comments_open() || get_comments_number() ) :
    							comments_template();
    						endif;
                    	endwhile; ?>
                    </div> 

                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="page-sidebar-area">   
                    	<?php get_sidebar(); ?>
                    </div>
                  </div>              
                </div>
              </div>
            </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
