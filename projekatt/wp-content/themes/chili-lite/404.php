<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Chili_Lite
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="error-page-area">
	            <div class="container">
	                <div class="row">
	                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                        <div class="error-page">
	                            <h1><?php esc_html_e( '404', 'chili-lite' ); ?></h1>
	                            <p><?php esc_html_e( 'Page not Found', 'chili-lite' ); ?></p>
	                        </div>
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                        <div class="error-page-message">                        
	                            <p><?php esc_html_e( 'The page you are looking is not available or has been removed.Try going to Home Page by using the button below.', 'chili-lite' ); ?></p>
	                            <div class="home-page">
	                                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e( 'Go to Home Page', 'chili-lite' ); ?></a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div> 
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
