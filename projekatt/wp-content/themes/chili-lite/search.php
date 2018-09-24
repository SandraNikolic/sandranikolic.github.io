<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Chili_Lite
 */
 
get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main"> 
	        <div class="blog-page-area">
		        <div class="container">
		            <div class="row">  
		                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 acurate">
		                	<?php  if(have_posts()): ?>
				                <div class="all-blog-content-area">
				                	<?php 
				                		while(have_posts()): the_post(); 
					                	 	get_template_part( 'template-parts/content' );
							            endwhile; 
							        ?>
				                </div>
			                <?php
					            else: 
					            	get_template_part( 'template-parts/content', 'none' );
					        	endif;
					        ?> 
			                <div class="pagination-area">
			                	<?php get_template_part('pagination'); ?> 
			                </div>  
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
