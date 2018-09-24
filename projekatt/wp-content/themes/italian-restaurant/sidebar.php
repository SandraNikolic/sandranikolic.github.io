<aside id="kt-sidebar" <?php echo (is_single() || is_front_page() ?
    'style="margin-top:60px;"' : 'style="margin-top:70px;"');
?>>
    <?php if (!dynamic_sidebar('sidebar')): ?>
        <div class="pre-widget">
            <h3><?php _e('Widgetized Sidebar', 'italian-restaurant'); ?></h3>
            <p><?php _e('This panel is active and ready for you to add
            some widgets via the WP Admin', 'italian-restaurant'); ?></p>
        </div>
    <?php endif; ?>
</aside>