<?php
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
<div class="row">
    <div class="col-md-12">
        <main id="kt-primary" role="main">

            <div id="kt-content" class="clearfix">
                <div id="error-404" class="text-center">
                    <i id="error-icon" class="fa fa-thumbs-down fa-5x"></i>
                    <h4><?php echo __('Well, this page does not exist. Maybe search
                    something else?','italian-restaurant'); ?></h4>
                    <?php echo get_search_form(); ?>
                </div>

            </div>

        </main>
    </div>
</div>
<!-- primary-page content ends here -->
<?php get_footer();
