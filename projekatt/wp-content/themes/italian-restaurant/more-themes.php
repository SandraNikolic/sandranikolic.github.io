<?php
/** This page contains the submenu item and the Themes from the WordPress.org **/

/***
* Add Submenu Page
**/
function italian_restaurant_add_more_themes_page() {
    $page = add_theme_page(
        __('More Themes','italian-restaurant'),
        __('More Themes','italian-restaurant'),
        'administrator',
        'ketchupthemes-more-themes',
        'italian_restaurant_display_more_themes'
    );
}

add_action( 'admin_menu', 'italian_restaurant_add_more_themes_page' );

/** Add CSS Styles **/
function italian_restaurant_more_themes_styles($hook) {
    if ( 'appearance_page_ketchupthemes-more-themes' != $hook ) {
        return;
    }
    
    wp_enqueue_style( 'italian-restaurant-admin-bootstrap', get_template_directory_uri()
        .'/css/admin-bootstrap.min.css','','','all' );
        
    wp_enqueue_style( 'more-themes-page-css', get_template_directory_uri().'/css/more-themes-page.css','','','all');
    
    wp_enqueue_script('italian-restaurant-admin-matchHeight', get_template_directory_uri()
        .'/js/jquery.matchHeight-min.js',
        array('jquery'),'',true);
        
        wp_enqueue_script('italian-restaurant-admin-js', get_template_directory_uri()
        .'/js/admin-js.js',
        array('jquery'),'',true); 
     
}
add_action( 'admin_enqueue_scripts', 'italian_restaurant_more_themes_styles' );

/** Render Page **/

function italian_restaurant_display_more_themes(){
    ?>
    <div class="wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                
                    <a href="<?php echo esc_url('http://ketchupthemes.com/'); ?>" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/banner.jpg" class="img-responsive" id="more-themes-banner"/>
                    </a>
                
                </div>
            </div>
            
            <!-- Themes Container -->

            <div class="row">
                <div class="col-md-12">
                    <div id="themes-container-area">
                    <h1><?php _e('Have a look at our themes !','italian-restaurant'); ?></h1>
                    </div>
                    
                    <!-- Set themes arguments and API calls -->
                    
                    <?php 
                    $theme_args =  array('author'=>'alexitsios');
                    $request = array(
                        'body' => array(
                            'action'  => 'query_themes',
                            'request' => serialize( (object)$theme_args )
                        )
                    );
                    
                    $our_themes = italian_more_themes_api($request);
                    $get_active_theme = wp_get_theme()->get( 'Name' );
                    ?>
                    
                    <div class="row">
                        <div id="themes-container">    
                            <?php foreach($our_themes->themes as $theme): 
                            if ( $get_active_theme != $theme->name ):?>
                            <div class="col-md-4 matchHeight">
                                <div class="single-theme">
                                <?php //print_r($theme); ?>
                                     <div class="theme-name">
                                        <h2><?php echo $theme->name; ?></h2>
                                    </div>
                                
                                    <div class="theme-screenshot">
                                        <img src="<?php echo $theme->screenshot_url; ?>" class="img-responsive"/>
                                    </div>
                                    
                                    <div class="theme_actions">
                                    <?php 
                                    $theme_uri = add_query_arg( array(
                                                'action' => 'install-theme',
                                                'theme'  => $theme->slug,
                                            ), self_admin_url( 'update.php' ) );
                                    ?>
                                    
                                    <?php $theme_slug = wp_get_theme( $theme->slug );
                                    if ( !$theme_slug->exists()): ?>
                                
                                    <a class="button-primary" target="_blank" 
                                    href="<?php echo esc_url( wp_nonce_url( $theme_uri, 'install-theme_' . $theme->slug ) ); ?>">
                                    <?php echo __('Install Theme','italian-restaurant'); ?></a>
                                    
                                    <?php endif; ?>
                            
                                    <a class="button-primary" target="_blank" href="<?php echo esc_url($theme->preview_url); ?>"><?php echo __('Live Preview','italian-restaurant'); ?></a>
                                    
                                    </div>
                                
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                    
                        </div>
                    </div>
                    
                </div>
            </div>
            
            
        </div>
    </div>
    
<?php }

//*** Api call ***/
function italian_more_themes_api( $request ) {
    
    $key = 'ketchupthemes_more_themes' . md5( serialize( $request ) );
    if ( false === ( $themes = get_transient( $key ) ) ) {

        $response = wp_remote_post( 'http://api.wordpress.org/themes/info/1.0/', $request );

        if ( !is_wp_error( $response ) ) {

            $themes = unserialize( wp_remote_retrieve_body( $response ) );

            if ( !is_object( $themes ) && !is_array( $themes ) ) {
                return new WP_Error( 'theme_api_error', 'Error..' );
            }
            set_transient( $key, $themes, 60 * 60 * 12 );
        }
        else {
            return $response;
        }
    }

    return $themes;
}