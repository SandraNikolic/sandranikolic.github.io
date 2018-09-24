<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Chili_Lite
 */ 
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
	        <div class="blog-page-area">
		        <div class="container">
		            <div class="row">  
		                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 ">
		                	<?php if(have_posts()): ?>
				                <div class="page-content-area">
				                	<?php  while(have_posts()): the_post(); 
				                		get_template_part( 'template-parts/content','page' );
										// If comments are open or we have at least one comment, load up the comment template.
										if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif;
						            endwhile; ?>
				                </div> 
			                <?php
				            else: 
				            	get_template_part( 'template-parts/content', 'none' );
				        	endif; ?>
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
