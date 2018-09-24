<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="site-loader"></div>
<header id="masthead" class="site-header clearfix">
    <?php
    if (italian_restaurant_get_header_image() != false && is_front_page()): ?>
        <div id="italian_header_area">
            <?php echo italian_restaurant_get_header_image(); ?>
            
            
            <!-- Name and Navigation are ON the header image -->
            
            <div id="single-kt-header-area">
            <div class="container">
            
                <div class="row">
                
                    <div class="col-md-4" id="kt-logo-area">
                        <div id="kt-logo-container">
                            <?php echo italian_restaurant_get_logo2(); ?>
                        </div>
                    </div>
                    
                    <div class="col-md-8">
                        <nav role="navigation" class="clearfix"
                             id="kt-main-navigation">

                            <?php
        
                            $italian_menu_args = array(
                                'theme_location' => 'main',
                                'fallback_cb' => 'italian_restaurant_fallback_menu',
                                'container' => false,
                                'menu_id' => 'kt-navigation',
                                'menu_class'=>'fixed-nav',
                                'echo' => true);
                            wp_nav_menu($italian_menu_args);
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        </div>


    <?php endif; ?>
    <!-- header image ends here -->

</header>
<!-- Header ends -->