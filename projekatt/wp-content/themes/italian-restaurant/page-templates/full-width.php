<?php
/*
 * Template Name: Full Width
 */
get_header(); ?>
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
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <main id="kt-primary">

                    <div id="kt-content" class="clearfix">

                        <?php get_template_part('framework/templates/content-page-full'); ?>

                    </div>

                </main>
            </div>
        </div>
        <!-- primary-page content ends here -->
    </div>
<?php get_footer();