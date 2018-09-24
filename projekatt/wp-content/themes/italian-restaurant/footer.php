<?php if (italian_has_active_footer() != false): ?>
    <footer id="kt-footer">
        <?php

        $italian_restaurant_footer_info = italian_has_active_footer();
        $italian_restaurant_footer_class = $italian_restaurant_footer_info['class'];
        $italian_restaurant_sidebars_count = $italian_restaurant_footer_info['sidebars_count'];
        ?>
        <div class="container">
            <div class="row">
                <div id="kt-footer-area">
                    <?php for ($i = 1; $i < $italian_restaurant_sidebars_count + 1; $i++): ?>

                        <div
                            class="<?php echo $italian_restaurant_footer_class; ?> kt-footer-sidebar">
                            <?php if (!dynamic_sidebar('italian_footer_' . $i . '_sidebar')): ?>
                                <div class="pre-widget">

                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endfor; ?>

                    <?php if (has_nav_menu('footer')): ?>
                        <div class="col-md-12">
                            <?php
                            $italian_menu_args = array(
                                'theme_location' => 'footer',
                                'container' => false,
                                'menu_id' => 'kt-footer-navigation');
                            wp_nav_menu($italian_menu_args);
                            ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </footer>
<?php endif; // if which checks active footer sidebars ?>
<section id="kt-copyright">
    <div class="container">
        <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        <a rel="nofollow" href="<?php echo esc_url(__(
                            'http://ketchupthemes.com/italian-restaurant-theme/',
                            'italian-restaurant')); ?>">
                            <small><?php printf(__('Ketchupthemes.com', 'italian-restaurant'));
                                ?></small>
                        </a>,
                        <small><?php echo __('&copy;', 'italian-restaurant') . date('Y'); ?></small>
                        <small><?php bloginfo('name'); ?></small>

                    </p>
                </div>
        </div>
    </div>
</section>
<?php wp_footer(); ?>
</body>
</html>