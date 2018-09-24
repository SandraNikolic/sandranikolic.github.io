<?php
/**===================================== **
 * This is the main framework functions.
 * These are also theme specific functions.
 *====================================== **/
add_action( 'tgmpa_register', 'italian_restaurant_register_required_plugins' );
function italian_restaurant_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        array(
            'name' => 'Ketchup Restaurant Reservations',
            'slug' => 'ketchup-restaurant-reservations',
            'required' => false
        ),
        array(
            'name'      => 'Bootstrap 3 Shortcodes',
            'slug'      => 'bootstrap-3-shortcodes',
            'required'  => false,
        ),
        array(
            'name'      => 'Ketchup Shortcodes',
            'slug'      => 'ketchup-shortcodes-pack',
            'required'  => false,
        )

    );

    $config = array(
        'id'           => 'italian-restaurant',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.


        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'italian-restaurant' ),
            'menu_title'                      => __( 'Install Plugins', 'italian-restaurant' ),

            'installing'                      => __( 'Installing Plugin: %s', 'italian-restaurant' ),

            'updating'                        => __( 'Updating Plugin: %s', 'italian-restaurant' ),
            'oops'                            => __( 'Something went wrong with the plugin API.', 'italian-restaurant' ),
            'notice_can_install_required'     => _n_noop(

                'This theme requires the following plugin: %1$s.',
                'This theme requires the following plugins: %1$s.',
                'italian-restaurant'
            ),
            'notice_can_install_recommended'  => _n_noop(

                'This theme recommends the following plugin: %1$s.',
                'This theme recommends the following plugins: %1$s.',
                'italian-restaurant'
            ),
            'notice_ask_to_update'            => _n_noop(

                'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
                'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
                'italian-restaurant'
            ),
            'notice_ask_to_update_maybe'      => _n_noop(

                'There is an update available for: %1$s.',
                'There are updates available for the following plugins: %1$s.',
                'italian-restaurant'
            ),
            'notice_can_activate_required'    => _n_noop(

                'The following required plugin is currently inactive: %1$s.',
                'The following required plugins are currently inactive: %1$s.',
                'italian-restaurant'
            ),
            'notice_can_activate_recommended' => _n_noop(

                'The following recommended plugin is currently inactive: %1$s.',
                'The following recommended plugins are currently inactive: %1$s.',
                'italian-restaurant'
            ),
            'install_link'                    => _n_noop(
                'Begin installing plugin',
                'Begin installing plugins',
                'italian-restaurant'
            ),
            'update_link' 					  => _n_noop(
                'Begin updating plugin',
                'Begin updating plugins',
                'italian-restaurant'
            ),
            'activate_link'                   => _n_noop(
                'Begin activating plugin',
                'Begin activating plugins',
                'italian-restaurant'
            ),
            'return'                          => __( 'Return to Required Plugins Installer', 'italian-restaurant' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'italian-restaurant' ),
            'activated_successfully'          => __( 'The following plugin was activated successfully:', 'italian-restaurant' ),

            'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'italian-restaurant' ),

            'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'italian-restaurant' ),

            'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'italian-restaurant' ),
            'dismiss'                         => __( 'Dismiss this notice', 'italian-restaurant' ),
            'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'italian-restaurant' ),
            'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'italian-restaurant' ),

            'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
        ),
    );

    tgmpa( $plugins, $config );
}
/** CUSTOMIZR **/

function italian_restaurant_customizer($wp_customize)
{

    /** TOP BAR SECTION */
    $wp_customize->add_section(
        'top_bar_settings_section',
        array(
            'title' => __('Top Bar Settings', 'italian-restaurant'),
            'description' => __('General Settings for the top bar.', 'italian-restaurant'),
            'priority' => 9,
        )
    );


    $wp_customize->add_setting(
        'italian_restaurant_enable_top_bar',
        array(
            'default' => '0',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_top_address',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_top_telephone',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    /** Top Bar Controls */

    $wp_customize->add_control(
        'italian_restaurant_enable_top_bar',
        array(
            'type' => 'radio',
            'label' => __('Enable/Disable the top bar area',
                'italian-restaurant'),
            'section' => 'top_bar_settings_section',
            'settings' => 'italian_restaurant_enable_top_bar',
            'choices' => array(
                '0' => __('Disabled', 'italian-restaurant'),
                '1' => __('Enabled', 'italian-restaurant')
            )
        ));

    $wp_customize->add_control(
        'italian_restaurant_top_address',
        array(
            'type' => 'text',
            'label' => __('Top address', 'italian-restaurant'),
            'section' => 'top_bar_settings_section',
            'settings' => 'italian_restaurant_top_address'
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_top_telephone',
        array(
            'type' => 'text',
            'label' => __('Top telephone', 'italian-restaurant'),
            'section' => 'top_bar_settings_section',
            'settings' => 'italian_restaurant_top_telephone'
        )
    );

    /** GENERAL SECTION Options**/

    $wp_customize->add_section(
        'general_settings_section',
        array(
            'title' => __('General Settings', 'italian-restaurant'),
            'description' => __('General Settings for this theme.', 'italian-restaurant'),
            'priority' => 10,
        )
    );

    /** Register Settings **/


    $wp_customize->add_setting(
        'italian_logo_upload',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_currency_sign',
        array(
            'default' => '$',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );


    $wp_customize->add_setting(
        'italian_restaurant_blog_posts_number',
        array(
            'default' => '10',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_disable_og',
        array(
            'default' => '0',
            'sanitize_callback' => 'absint'
        )
    );

    /** Register Controls **/



    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'italian_logo_upload',
            array(
                'label' => __('Upload a logo - Premium Only', 'italian-restaurant'),
                'section' => 'general_settings_section',
                'settings' => 'italian_logo_upload',
            )
        )
    );


    $wp_customize->add_control(
        'italian_restaurant_currency_sign',
        array(
            'type' => 'text',
            'label' => __('Currency sign - Premium Only', 'italian-restaurant'),
            'section' => 'general_settings_section',
            'settings' => 'italian_restaurant_currency_sign'
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_blog_posts_number',
        array(
            'type' => 'select',
            'label' => __('Blog page  - Posts per page -Premium Only', 'italian-restaurant'),
            'section' => 'general_settings_section',
            'settings' => 'italian_restaurant_blog_posts_number',
            'choices' => array(
                '6' => __('6', 'italian-restaurant'),
                '10' => __('10', 'italian-restaurant'),
                '14' => __('14', 'italian-restaurant'),
                '16' => __('16', 'italian-restaurant'),
                '18' => __('18', 'italian-restaurant'),
                '20' => __('20', 'italian-restaurant'),
                '22' => __('22', 'italian-restaurant'),
                '26' => __('26', 'italian-restaurant'),
            )
        ),

        $wp_customize->add_control(
            'italian_restaurant_disable_og',
            array(
                'type' => 'select',
                'label' => __('Disable OpenGraph Tags', 'italian-restaurant'),
                'section' => 'general_settings_section',
                'settings' => 'italian_restaurant_disable_og',
                'choices' => array(
                    '0' => __('No', 'italian-restaurant'),
                    '1' => __('Yes', 'italian-restaurant'),
                )
            ))
    );

    /** HEADER IMAGES **/

    $wp_customize->add_section(
        'header_images_settings_section',
        array(
            'title' => __('Header Images', 'italian-restaurant'),
            'description' => __('The header images that are visible in specific pages like
            category, archive, tag, etc.',
                'italian-restaurant'),
            'priority' => 11,
        )
    );

    /** Settings **/
    $wp_customize->add_setting(
        'italian_restaurant_blog_header_image',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    /** Settings **/
    $wp_customize->add_setting(
        'italian_restaurant_category_header_image',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_tag_header_image',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_archive_header_image',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_search_header_image',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );


    /** Controls **/

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'italian_restaurant_blog_header_image',
            array(
                'label' => __('Blog Template Header Image ', 'italian-restaurant'),
                'section' => 'header_images_settings_section',
                'settings' => 'italian_restaurant_blog_header_image',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'italian_restaurant_category_header_image',
            array(
                'label' => __('Category Header Image ', 'italian-restaurant'),
                'section' => 'header_images_settings_section',
                'settings' => 'italian_restaurant_category_header_image',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'italian_restaurant_tag_header_image',
            array(
                'label' => __('Tag Header Image ', 'italian-restaurant'),
                'section' => 'header_images_settings_section',
                'settings' => 'italian_restaurant_tag_header_image',
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'italian_restaurant_archive_header_image',
            array(
                'label' => __('Archive Header Image ', 'italian-restaurant'),
                'section' => 'header_images_settings_section',
                'settings' => 'italian_restaurant_archive_header_image',
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'italian_restaurant_search_header_image',
            array(
                'label' => __('Search Header Image ', 'italian-restaurant'),
                'section' => 'header_images_settings_section',
                'settings' => 'italian_restaurant_search_header_image',
            )
        )
    );

    /** STYLING OPTIONS  **/

    $wp_customize->add_panel('italian_restaurant_typography_panel', array(
        'priority' => 12,
        'title' => __('Styling', 'italian-restaurant'),
        'description' => __('Description of what this panel does.', 'italian-restaurant'),
    ));

    /** STYLING SECTIONS **/

    $wp_customize->add_section(
        'social_icon_styles',
        array(
            'title' => __('Social Icon Styles.', 'italian-restaurant'),
            'description' => __('CSS styles of the social icons.',
                'italian-restaurant'),
            'priority' => 11,
            'panel' => 'italian_restaurant_typography_panel'
        )
    );

    $wp_customize->add_section(
        'navigation_styles',
        array(
            'title' => __('Navigation Styles.', 'italian-restaurant'),
            'description' => __('CSS styles of the navigation menus.Change link colors,
            hovers, sub-menu colors.',
                'italian-restaurant'),
            'priority' => 12,
            'panel' => 'italian_restaurant_typography_panel'
        )
    );

    $wp_customize->add_section(
        'general_styles',
        array(
            'title' => __('General Element Styles.', 'italian-restaurant'),
            'description' => __('CSS styles of the general elements like body colors,
            paragraph colors', 'italian-restaurant'),
            'priority' => 13,
            'panel' => 'italian_restaurant_typography_panel'
        )
    );

    $wp_customize->add_section(
        'comment_styles',
        array(
            'title' => __('Comment Styles.', 'italian-restaurant'),
            'description' => __('CSS styles of the comment section.',
                'italian-restaurant'),
            'priority' => 14,
            'panel' => 'italian_restaurant_typography_panel'
        )
    );

    $wp_customize->add_section(
        'sidebars_styles',
        array(
            'title' => __('Sidebar Styles.', 'italian-restaurant'),
            'description' => __('CSS styles of the main sidebar styles.',
                'italian-restaurant'),
            'priority' => 15,
            'panel' => 'italian_restaurant_typography_panel'
        )
    );

    $wp_customize->add_section(
        'specific_widget_styles',
        array(
            'title' => __('Specific Widget styles.', 'italian-restaurant'),
            'description' => __('CSS styles of specific widgets.',
                'italian-restaurant'),
            'priority' => 16,
            'panel' => 'italian_restaurant_typography_panel'
        )
    );

    $wp_customize->add_section(
        'footer-area',
        array(
            'title' => __('Footer Area.', 'italian-restaurant'),
            'description' => __('CSS style of the footer.',
                'italian-restaurant'),
            'priority' => 17,
            'panel' => 'italian_restaurant_typography_panel'
        )
    );

    $wp_customize->add_section(
        'footer_widget_styles',
        array(
            'title' => __('Footer widget styles.', 'italian-restaurant'),
            'description' => __('CSS styles of the footer styles.',
                'italian-restaurant'),
            'priority' => 18,
            'panel' => 'italian_restaurant_typography_panel'
        )
    );

    $wp_customize->add_section(
        'copyright_styles',
        array(
            'title' => __('Copyright styles.', 'italian-restaurant'),
            'description' => __('CSS styles of the copyright area.',
                'italian-restaurant'),
            'priority' => 19,
            'panel' => 'italian_restaurant_typography_panel'
        )
    );

    $wp_customize->add_section(
        'other_styles',
        array(
            'title' => __('Other Styles.', 'italian-restaurant'),
            'description' => __('CSS styles other elements.',
                'italian-restaurant'),
            'priority' => 20,
            'panel' => 'italian_restaurant_typography_panel'
        )
    );


    /** STYLING SETTINGS **/

    /** Social Icons */
    $wp_customize->add_setting(
        'italian_restaurant_social_icon_color',
        array(
            'default' => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_social_icon_background_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_social_icon_hover_color',
        array(
            'default' => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_social_icon_background_hover_color',
        array(
            'default' => '#cab479',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );


    /** Navigation Styles Control  **/

    $wp_customize->add_setting(
        'italian_restaurant_current_menu_color',
        array(
            'default' => '#cab479',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_menu_link_color',
        array(
            'default' => '#cab479',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_menu_link_hover_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_submenu_background',
        array(
            'default' => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_submenu_hover_background',
        array(
            'default' => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_submenu_links_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_submenu_links_hover_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    /** Main Elements Styling **/

    $wp_customize->add_setting(
        'italian_restaurant_headings_color',
        array(
            'default' => '#7bcbd2',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_links_color',
        array(
            'default' => '#7bcbd2',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_setting(
        'italian_restaurant_links_hover_color',
        array(
            'default' => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_main_color',
        array(
            'default' => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    /*** Comment STYLES **/

    $wp_customize->add_setting(
        'italian_restaurant_comment_headings_color',
        array(
            'default' => '#cab479',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_comment_links_color',
        array(
            'default' => '#cab479',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_comment_links_hover_color',
        array(
            'default' => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_comment_button_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_comment_button_text_color',
        array(
            'default' => '#cab479',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_comment_button_hover_color',
        array(
            'default' => '#cab479',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_comment_button_text_hover_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    /** SIDEBARS Styles **/

    $wp_customize->add_setting(
        'italian_restaurant_widget_headings',
        array(
            'default' => '#7bcbd2',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_widget_links_color',
        array(
            'default' => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_widget_links_hover_color',
        array(
            'default' => '#CAB479',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_widget_body_color',
        array(
            'default' => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    /** Specific Widget Settings **/

    $wp_customize->add_setting(
        'italian_restaurant_tag_bg_color',
        array(
            'default' => '#CAB479',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_tag_text_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_tag_bg_hover_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_tag_text_hover_color',
        array(
            'default' => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_calendar_header_color',
        array(
            'default' => '#CAB479',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_calendar_header_text_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_calendar_link_backrground_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_calendar_link_hover_backrground_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );


    /*** Footer Area  ***/

    $wp_customize->add_setting(
        'italian_restaurant_footer_background_color',
        array(
            'default' => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    /** Footer Widgets **/

    $wp_customize->add_setting(
        'italian_restaurant_footerwidget_headings',
        array(
            'default' => '#CAB479',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_footerwidget_links_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_footerwidget_links_hover_color',
        array(
            'default' => '#CAB479',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_footerwidget_body_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_footer_tag_bg_color',
        array(
            'default' => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_footer_tag_text_color',
        array(
            'default' => '#CAB479',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_footer_tag_bg_hover_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_footer_tag_text_hover_color',
        array(
            'default' => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );


    /** Copyright settings **/

    $wp_customize->add_setting(
        'italian_restaurant_copyright_background_color',
        array(
            'default' => '#e0e0e0',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_copyright_links_color',
        array(
            'default' => '#9c9c9c',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_copyright_links_hover_color',
        array(
            'default' => '#cab749',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_copyright_text_color',
        array(
            'default' => '#e9e9e9',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );


    /*** Other Style settings **/

    $wp_customize->add_setting(
        'italian_restaurant_slide_title_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );


    /*************************
     * STYLING CONTROLS
     *************************/

    /** Social Icons Widget **/

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_social_icon_color
            ',
            array(
                'label' => __('Color of the social icon.', 'italian-restaurant'),
                'section' => 'social_icon_styles',
                'settings' => 'italian_restaurant_social_icon_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_social_icon_background_color',
            array(
                'label' => __('Background color of the icon.', 'italian-restaurant'),
                'section' => 'social_icon_styles',
                'settings' => 'italian_restaurant_social_icon_background_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_social_icon_hover_color',
            array(
                'label' => __('Icon color - hover state.', 'italian-restaurant'),
                'section' => 'social_icon_styles',
                'settings' => 'italian_restaurant_social_icon_hover_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_social_icon_background_hover_color',
            array(
                'label' => __('Background color - hover state.', 'italian-restaurant'),
                'section' => 'social_icon_styles',
                'settings' => 'italian_restaurant_social_icon_background_hover_color',
            )
        )
    );

    /** Main Navigation Controls  **/

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_current_menu_color',
            array(
                'label' => __('Current Menu item color.', 'italian-restaurant'),
                'section' => 'navigation_styles',
                'settings' => 'italian_restaurant_current_menu_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_menu_link_color',
            array(
                'label' => __('Menu link color.', 'italian-restaurant'),
                'section' => 'navigation_styles',
                'settings' => 'italian_restaurant_menu_link_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_menu_link_hover_color',
            array(
                'label' => __('Menu link color - hover state.', 'italian-restaurant'),
                'section' => 'navigation_styles',
                'settings' => 'italian_restaurant_menu_link_hover_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_submenu_background',
            array(
                'label' => __('Submenu background color.', 'italian-restaurant'),
                'section' => 'navigation_styles',
                'settings' => 'italian_restaurant_submenu_background',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_submenu_hover_background',
            array(
                'label' => __('Submenu background color - hover state.',
                    'italian-restaurant'),
                'section' => 'navigation_styles',
                'settings' => 'italian_restaurant_submenu_hover_background',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_submenu_links_color',
            array(
                'label' => __('Submenu link color.',
                    'italian-restaurant'),
                'section' => 'navigation_styles',
                'settings' => 'italian_restaurant_submenu_links_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_submenu_links_hover_color',
            array(
                'label' => __('Submenu link color - hover color',
                    'italian-restaurant'),
                'section' => 'navigation_styles',
                'settings' => 'italian_restaurant_submenu_links_hover_color',
            )
        )
    );

    /** Main elements **/

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_headings_color',
            array(
                'label' => __('H1-H6 heading color',
                    'italian-restaurant'),
                'section' => 'general_styles',
                'settings' => 'italian_restaurant_headings_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_links_color',
            array(
                'label' => __('Applies to page links',
                    'italian-restaurant'),
                'section' => 'general_styles',
                'settings' => 'italian_restaurant_links_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_links_hover_color',
            array(
                'label' => __('Applies to page links - hover state',
                    'italian-restaurant'),
                'section' => 'general_styles',
                'settings' => 'italian_restaurant_links_hover_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_main_color',
            array(
                'label' => __('Applies to main body text',
                    'italian-restaurant'),
                'section' => 'general_styles',
                'settings' => 'italian_restaurant_main_color',
            )
        )
    );


    /** Comment Controls */

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_comment_headings_color',
            array(
                'label' => __('Headings in comment section',
                    'italian-restaurant'),
                'section' => 'comment_styles',
                'settings' => 'italian_restaurant_comment_headings_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_comment_links_color',
            array(
                'label' => __('Links in comment section',
                    'italian-restaurant'),
                'section' => 'comment_styles',
                'settings' => 'italian_restaurant_comment_links_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_comment_links_hover_color',
            array(
                'label' => __('Links in comment section - Hover state',
                    'italian-restaurant'),
                'section' => 'comment_styles',
                'settings' => 'italian_restaurant_comment_links_hover_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_comment_button_color',
            array(
                'label' => __('Submit comment button background',
                    'italian-restaurant'),
                'section' => 'comment_styles',
                'settings' => 'italian_restaurant_comment_button_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_comment_button_text_color',
            array(
                'label' => __('Submit comment button text color.',
                    'italian-restaurant'),
                'section' => 'comment_styles',
                'settings' => 'italian_restaurant_comment_button_text_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_comment_button_hover_color',
            array(
                'label' => __('Submit comment button background color - hover state.',
                    'italian-restaurant'),
                'section' => 'comment_styles',
                'settings' => 'italian_restaurant_comment_button_hover_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_comment_button_text_hover_color',
            array(
                'label' => __('Submit comment button text color - hover state.',
                    'italian-restaurant'),
                'section' => 'comment_styles',
                'settings' => 'italian_restaurant_comment_button_text_hover_color',
            )
        )
    );


    /** Sidebar Styles **/

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_widget_headings',
            array(
                'label' => __('Widget headings color.',
                    'italian-restaurant'),
                'section' => 'sidebars_styles',
                'settings' => 'italian_restaurant_widget_headings',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_widget_links_color',
            array(
                'label' => __('Widget link color.',
                    'italian-restaurant'),
                'section' => 'sidebars_styles',
                'settings' => 'italian_restaurant_widget_links_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_widget_links_hover_color',
            array(
                'label' => __('Widget link color - hover state',
                    'italian-restaurant'),
                'section' => 'sidebars_styles',
                'settings' => 'italian_restaurant_widget_links_hover_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_widget_body_color',
            array(
                'label' => __('Widget text body color',
                    'italian-restaurant'),
                'section' => 'sidebars_styles',
                'settings' => 'italian_restaurant_widget_body_color',
            )
        )
    );

    /*** Specific Widgets ***/

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_tag_bg_color',
            array(
                'label' => __('Tagcloud tag background color.',
                    'italian-restaurant'),
                'section' => 'specific_widget_styles',
                'settings' => 'italian_restaurant_tag_bg_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_tag_text_color',
            array(
                'label' => __('Tagcloud text color.',
                    'italian-restaurant'),
                'section' => 'specific_widget_styles',
                'settings' => 'italian_restaurant_tag_text_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_tag_bg_hover_color',
            array(
                'label' => __('Tagcloud background color - hover',
                    'italian-restaurant'),
                'section' => 'specific_widget_styles',
                'settings' => 'italian_restaurant_tag_bg_hover_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_tag_text_hover_color',
            array(
                'label' => __('Tagcloud text color - hover.',
                    'italian-restaurant'),
                'section' => 'specific_widget_styles',
                'settings' => 'italian_restaurant_tag_text_hover_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_calendar_header_color',
            array(
                'label' => __('Calendar widget header background color.',
                    'italian-restaurant'),
                'section' => 'specific_widget_styles',
                'settings' => 'italian_restaurant_calendar_header_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_calendar_header_text_color',
            array(
                'label' => __('Calendar widget header text color.',
                    'italian-restaurant'),
                'section' => 'specific_widget_styles',
                'settings' => 'italian_restaurant_calendar_header_text_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_calendar_link_backrground_color',
            array(
                'label' => __('Calendar widget link background color.',
                    'italian-restaurant'),
                'section' => 'specific_widget_styles',
                'settings' => 'italian_restaurant_calendar_link_backrground_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_calendar_link_hover_backrground_color',
            array(
                'label' => __('Calendar widget link hover background color.',
                    'italian-restaurant'),
                'section' => 'specific_widget_styles',
                'settings' => 'italian_restaurant_calendar_link_hover_backrground_color',
            )
        )
    );

    /** Footer Area **/

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_footer_background_color',
            array(
                'label' => __('Footer Background color.',
                    'italian-restaurant'),
                'section' => 'footer-area',
                'settings' => 'italian_restaurant_footer_background_color',
            )
        )
    );

    /** Footer Widgets  **/

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_footerwidget_headings',
            array(
                'label' => __('Footer widget heading color.',
                    'italian-restaurant'),
                'section' => 'footer_widget_styles',
                'settings' => 'italian_restaurant_footerwidget_headings',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_footerwidget_links_color',
            array(
                'label' => __('Footer widget links color.',
                    'italian-restaurant'),
                'section' => 'footer_widget_styles',
                'settings' => 'italian_restaurant_footerwidget_links_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_footerwidget_links_hover_color',
            array(
                'label' => __('Footer widget links color - hover state.',
                    'italian-restaurant'),
                'section' => 'footer_widget_styles',
                'settings' => 'italian_restaurant_footerwidget_links_hover_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_footerwidget_body_color',
            array(
                'label' => __('Footer widget body text color.',
                    'italian-restaurant'),
                'section' => 'footer_widget_styles',
                'settings' => 'italian_restaurant_footerwidget_body_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_footer_tag_bg_color',
            array(
                'label' => __('Footer widget tagcloud background color.',
                    'italian-restaurant'),
                'section' => 'footer_widget_styles',
                'settings' => 'italian_restaurant_footer_tag_bg_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_footer_tag_text_color',
            array(
                'label' => __('Footer widget tagcloud text color.',
                    'italian-restaurant'),
                'section' => 'footer_widget_styles',
                'settings' => 'italian_restaurant_footer_tag_text_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_footer_tag_bg_hover_color_control',
            array(
                'label' => __('Footer widget tagcloud background color. hover state',
                    'italian-restaurant'),
                'section' => 'footer_widget_styles',
                'settings' => 'italian_restaurant_footer_tag_bg_hover_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_footer_tag_text_hover_color',
            array(
                'label' => __('Footer widget tagcloud text color - hover state',
                    'italian-restaurant'),
                'section' => 'footer_widget_styles',
                'settings' => 'italian_restaurant_footer_tag_text_hover_color',
            )
        )
    );


    /** Copyright area **/

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_copyright_background_color',
            array(
                'label' => __('Copyright area background color.',
                    'italian-restaurant'),
                'section' => 'copyright_styles',
                'settings' => 'italian_restaurant_copyright_background_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_copyright_links_color',
            array(
                'label' => __('Copyright area links color.',
                    'italian-restaurant'),
                'section' => 'copyright_styles',
                'settings' => 'italian_restaurant_copyright_links_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_copyright_links_hover_color',
            array(
                'label' => __('Copyright area links color - hover state.',
                    'italian-restaurant'),
                'section' => 'copyright_styles',
                'settings' => 'italian_restaurant_copyright_links_hover_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_copyright_text_color',
            array(
                'label' => __('Copyright area text color - hover state.',
                    'italian-restaurant'),
                'section' => 'copyright_styles',
                'settings' => 'italian_restaurant_copyright_text_color',
            )
        )
    );

    /** Other style controls */

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italian_restaurant_slide_title_color',
            array(
                'label' => __('Slide title color.',
                    'italian-restaurant'),
                'section' => 'other_styles',
                'settings' => 'italian_restaurant_slide_title_color',
            )
        )
    );

    /*** Social Networks ***/

    $wp_customize->add_section(
        'italian_restaurant_social_section',
        array(
            'title' => __('Social Networks', 'italian-restaurant'),
            'description' => __('Add your social networks.',
                'italian-restaurant'),
            'priority' => 13,
        )
    );

    /** Social Settings **/

    $wp_customize->add_setting(
        'italian_restaurant_facebook_url',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_twitter_url',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_google_plus_url',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_pinterest_url',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_linkedin_url',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_rss_url',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_stumbleupon_url',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_instagram_url',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_youtube_url',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_vimeo_url',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );


    /** Social Controls **/
    $wp_customize->add_control(
        'italian_restaurant_facebook_url',
        array(
            'label' => __('Facebook URL', 'italian-restaurant'),
            'section' => 'italian_restaurant_social_section',
            'settings' => 'italian_restaurant_facebook_url',
            'type' => 'text'
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_twitter_url',
        array(
            'label' => __('Twitter URL', 'italian-restaurant'),
            'section' => 'italian_restaurant_social_section',
            'settings' => 'italian_restaurant_twitter_url',
            'type' => 'text'
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_google_plus_url',
        array(
            'label' => __('Google plus URL', 'italian-restaurant'),
            'section' => 'italian_restaurant_social_section',
            'settings' => 'italian_restaurant_google_plus_url',
            'type' => 'text'
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_pinterest_url',
        array(
            'label' => __('Pinterest URL', 'italian-restaurant'),
            'section' => 'italian_restaurant_social_section',
            'settings' => 'italian_restaurant_pinterest_url',
            'type' => 'text'
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_linkedin_url',
        array(
            'label' => __('Linkedin URL', 'italian-restaurant'),
            'section' => 'italian_restaurant_social_section',
            'settings' => 'italian_restaurant_linkedin_url',
            'type' => 'text'
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_rss_url',
        array(
            'label' => __('RSS URL', 'italian-restaurant'),
            'section' => 'italian_restaurant_social_section',
            'settings' => 'italian_restaurant_rss_url',
            'type' => 'text'
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_stumbleupon_url',
        array(
            'label' => __('Stumbleupon URL', 'italian-restaurant'),
            'section' => 'italian_restaurant_social_section',
            'settings' => 'italian_restaurant_stumbleupon_url',
            'type' => 'text'
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_instagram_url_control',
        array(
            'label' => __('Instagram URL', 'italian-restaurant'),
            'section' => 'italian_restaurant_social_section',
            'settings' => 'italian_restaurant_instagram_url',
            'type' => 'text'
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_youtube_url',
        array(
            'label' => __('Youtube URL', 'italian-restaurant'),
            'section' => 'italian_restaurant_social_section',
            'settings' => 'italian_restaurant_youtube_url',
            'type' => 'text'
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_vimeo_url',
        array(
            'label' => __('Vimeo URL', 'italian-restaurant'),
            'section' => 'italian_restaurant_social_section',
            'settings' => 'italian_restaurant_vimeo_url',
            'type' => 'text'
        )
    );


    /*** Slider Section **/

    $wp_customize->add_section(
        'italian_restaurant_slider_section',
        array(
            'title' => __('Slider Settings', 'italian-restaurant'),
            'description' => __('Slider Settings.',
                'italian-restaurant'),
            'priority' => 14,
        )
    );


    /** Slider Settings **/
    $wp_customize->add_setting(
        'italian_restaurant_slider_disable',
        array(
            'default' => '1',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_slides_number',
        array(
            'default' => '5',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_slider_show_pager',
        array(
            'default' => '0',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_slider_show_arrows',
        array(
            'default' => '1',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_slider_transition',
        array(
            'default' => 'fade',
            'sanitize_callback' => 'wp_kses_post'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_slide_speed',
        array(
            'default' => '800',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_slide_pause',
        array(
            'default' => '3000',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_slider_autoplay',
        array(
            'default' => '1',
            'sanitize_callback' => 'absint'
        )
    );


    $wp_customize->add_control(
        'italian_restaurant_slider_disable',
        array(
            'type' => 'radio',
            'label' => __('Disable Slider', 'italian-restaurant'),
            'section' => 'italian_restaurant_slider_section',
            'settings' => 'italian_restaurant_slider_disable',
            'choices' => array(
                '1' => __('Yes', 'italian-restaurant'),
                '0' => __('No', 'italian-restaurant')
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'italian_restaurant_slides_number',
            array(
                'label' => __('Slides Number', 'italian-restaurant'),
                'section' => 'italian_restaurant_slider_section',
                'settings' => 'italian_restaurant_slides_number',
                'type' => 'text'
            )
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_slider_show_pager',
        array(
            'type' => 'radio',
            'label' => __('Show pager?', 'italian-restaurant'),
            'section' => 'italian_restaurant_slider_section',
            'settings' => 'italian_restaurant_slider_show_pager',
            'choices' => array(
                '0' => __('No', 'italian-restaurant'),
                '1' => __('Yes', 'italian-restaurant')
            )
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_slider_show_arrows',
        array(
            'type' => 'radio',
            'label' => __('Show arrow navigation ?', 'italian-restaurant'),
            'section' => 'italian_restaurant_slider_section',
            'settings' => 'italian_restaurant_slider_show_arrows',
            'choices' => array(
                '0' => __('No', 'italian-restaurant'),
                '1' => __('Yes', 'italian-restaurant')
            )
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_slider_transition',
        array(
            'type' => 'select',
            'label' => __('Transition Type ?', 'italian-restaurant'),
            'section' => 'italian_restaurant_slider_section',
            'settings' => 'italian_restaurant_slider_transition',
            'choices' => array(
                'fade' => __('Fade', 'italian-restaurant'),
                'horizontal' => __('Horizontal', 'italian-restaurant'),
                'vertical' => __('Vertical', 'italian-restaurant'),
            )
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_slide_speed',
        array(
            'type' => 'text',
            'label' => __('Slide speed ?', 'italian-restaurant'),
            'section' => 'italian_restaurant_slider_section',
            'settings' => 'italian_restaurant_slide_speed'
        )
    );


    $wp_customize->add_control(
        'italian_restaurant_slide_pause',
        array(
            'type' => 'text',
            'label' => __('Pause between slides ?', 'italian-restaurant'),
            'section' => 'italian_restaurant_slider_section',
            'settings' => 'italian_restaurant_slide_pause'
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_slider_autoplay',
        array(
            'type' => 'radio',
            'label' => __('Autoplay?', 'italian-restaurant'),
            'section' => 'italian_restaurant_slider_section',
            'settings' => 'italian_restaurant_slider_autoplay',
            'choices' => array(
                '0' => __('No', 'italian-restaurant'),
                '1' => __('Yes', 'italian-restaurant')
            )
        )
    );


    /*** PAGE TEMPLATE SECTION **/

    $wp_customize->add_section(
        'italian_restaurant_page_templates_section',
        array(
            'title' => __('Contact Page', 'italian-restaurant'),
            'description' => __('Settings for page templates in this theme.',
                'italian-restaurant'),
            'priority' => 15,
        )
    );


    /*** PAGE TEMPLATE SETTINGS **/

    $wp_customize->add_setting(
        'italian_restaurant_contact_google_map',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_contact_form_title',
        array(
            'default' => 'Send Enquiry',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_contact_form_shortcode',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_contact_details_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_contact_details_address',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_contact_details_phone',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_contact_details_email',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_email'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_monday_time',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_tuesday_time',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_wednesday_time',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_thursday_time',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_friday_time',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_saturday_time',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_sunday_time',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );


    $wp_customize->add_control(
        'italian_restaurant_contact_google_map',
        array(
            'type' => 'textarea',
            'label' => __('Google Map . Please write only the source (src) of the iframe',
                'italian-restaurant'),
            'section' => 'italian_restaurant_page_templates_section',
            'settings' => 'italian_restaurant_contact_google_map'
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_contact_form_title',
        array(
            'type' => 'text',
            'label' => __('Contact Form title.',
                'italian-restaurant'),
            'section' => 'italian_restaurant_page_templates_section',
            'settings' => 'italian_restaurant_contact_form_title'
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_contact_form_shortcode',
        array(
            'type' => 'text',
            'label' => __('Contact Form shortcode.Paste the shortcode from the  "Contact form
             7"
            plugin.',
                'italian-restaurant'),
            'section' => 'italian_restaurant_page_templates_section',
            'settings' => 'italian_restaurant_contact_form_shortcode'
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_contact_details_title',
        array(
            'type' => 'text',
            'label' => __('Contact details title.',
                'italian-restaurant'),
            'section' => 'italian_restaurant_page_templates_section',
            'settings' => 'italian_restaurant_contact_details_title'
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_contact_details_address',
        array(
            'type' => 'text',
            'label' => __('Write your address',
                'italian-restaurant'),
            'section' => 'italian_restaurant_page_templates_section',
            'settings' => 'italian_restaurant_contact_details_address'
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_contact_details_phone',
        array(
            'type' => 'text',
            'label' => __('Write your phone',
                'italian-restaurant'),
            'section' => 'italian_restaurant_page_templates_section',
            'settings' => 'italian_restaurant_contact_details_phone'
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_contact_details_email',
        array(
            'type' => 'text',
            'label' => __('Write your email',
                'italian-restaurant'),
            'section' => 'italian_restaurant_page_templates_section',
            'settings' => 'italian_restaurant_contact_details_email'
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_monday_time',
        array(
            'type' => 'text',
            'label' => __('Monday Working hours',
                'italian-restaurant'),
            'section' => 'italian_restaurant_page_templates_section',
            'settings' => 'italian_restaurant_monday_time'
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_tuesday_time',
        array(
            'type' => 'text',
            'label' => __('Tuesday Working hours',
                'italian-restaurant'),
            'section' => 'italian_restaurant_page_templates_section',
            'settings' => 'italian_restaurant_tuesday_time'
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_wednesday_time',
        array(
            'type' => 'text',
            'label' => __('Wednesday Working hours',
                'italian-restaurant'),
            'section' => 'italian_restaurant_page_templates_section',
            'settings' => 'italian_restaurant_wednesday_time'
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_thursday_time',
        array(
            'type' => 'text',
            'label' => __('Thursday Working hours',
                'italian-restaurant'),
            'section' => 'italian_restaurant_page_templates_section',
            'settings' => 'italian_restaurant_thursday_time'
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_friday_time',
        array(
            'type' => 'text',
            'label' => __('Friday Working hours',
                'italian-restaurant'),
            'section' => 'italian_restaurant_page_templates_section',
            'settings' => 'italian_restaurant_friday_time'
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_saturday_time',
        array(
            'type' => 'text',
            'label' => __('Saturday Working hours',
                'italian-restaurant'),
            'section' => 'italian_restaurant_page_templates_section',
            'settings' => 'italian_restaurant_saturday_time'
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_sunday_time',
        array(
            'type' => 'text',
            'label' => __('Sunday Working hours',
                'italian-restaurant'),
            'section' => 'italian_restaurant_page_templates_section',
            'settings' => 'italian_restaurant_sunday_time'
        )
    );


    /*** COPYRIGHT SECTION **/

    $wp_customize->add_section(
        'italian_restaurant_copyright_section',
        array(
            'title' => __('Copyright Text', 'italian-restaurant'),
            'description' => __('Add your copyright. You can use HTML.',
                'italian-restaurant'),
            'priority' => 16,
        )
    );

    $wp_customize->add_setting(
        'italian_restaurant_copyright_text',
        array(
            'default' => '',
            'sanitize_callback'=>'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'italian_restaurant_copyright_text',
        array(
            'type' => 'textarea',
            'label' => __('Copyright Area text',
                'italian-restaurant'),
            'section' => 'italian_restaurant_copyright_section',
            'settings' => 'italian_restaurant_copyright_text'
        )
    );


}

add_action('customize_register', 'italian_restaurant_customizer');
if (version_compare($GLOBALS['wp_version'], '4.1', '<')) :
    function italian_wp_title($title,
                              $sep)
    {
        if (is_feed()) {
            return $title;
        }
        global $page, $paged;

        $title .= get_bloginfo('name', 'display');

        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page())) {
            $title .= " $sep $site_description";
        }
        if (($paged >= 2 || $page >= 2) && !is_404()) {
            $title .= " $sep " . sprintf(__('Page %s', 'italian-restaurant'), max($paged, $page));
        }
        return $title;
    }

    add_filter('wp_title', 'italian_wp_title', 10, 2);

endif;

/*== Add 'nextpage' quicktag in WordPress Editor ==**/
if (!function_exists('italian_restaurant_editor')):
    function italian_restaurant_editor($mce_buttons)
    {
        $pos = array_search('wp_more', $mce_buttons, true);
        if ($pos !== false) {
            $tmp_buttons = array_slice($mce_buttons, 0, $pos + 1);
            $tmp_buttons[] = 'wp_page';
            $mce_buttons = array_merge($tmp_buttons, array_slice($mce_buttons, $pos + 1));
        }
        return $mce_buttons;
    }
endif;
add_filter('mce_buttons', 'italian_restaurant_editor');
/**=== Get logo or text for the logo container ===**/

function italian_restaurant_get_logo2(){
        $logo_item = '<h1 class="h3"><a href="' . esc_url(home_url()) . '">' . get_bloginfo('name') . '</a></h1>';
        $logo_item .= '<h4 class="h5">' . get_bloginfo('description') . '</h4>';

    return $logo_item;

}
/**=== Get the header image if is any ===**/

if (!function_exists('italian_restaurant_get_header_image')):
    function italian_restaurant_get_header_image()
    {
        $html = '';
        if (get_header_image() != ''):
            $html .= '<img class="img-responsive" src="' . get_header_image() . '" height="' . get_custom_header()->height . '" width="' . get_custom_header()->width . '" alt=""/>';
        else:
            return false;
        endif;
        return $html;
    }
endif;

/** == Check active sidebar  ==*/
if (!function_exists('italian_restaurant_check_active_sidebar')):
    function italian_restaurant_check_active_sidebar($active_sidebar_id)
    {

        $is_active = is_active_sidebar($active_sidebar_id);
        if ($is_active):
            return 'col-md-8';
        else:
            return 'col-md-12';
        endif;
    }
endif;

/**== Numeric pagination ==**/
if (!function_exists('italian_restaurant_custom_pagination')):
    function italian_restaurant_custom_pagination($numpages = '',
                                                $pagerange = '',
                                                $paged = '')
    {

        if (empty($pagerange)) {
            $pagerange = 2;
        }
        global $paged;
        if (empty($paged)) {
            $paged = 1;
        }
        if ($numpages == '') {
            global $wp_query;
            $numpages = $wp_query->max_num_pages;
            if (!$numpages) {
                $numpages = 1;
            }
        }

        if (is_front_page()):
            $paged = 'page';
        else:
            $paged = 'paged';
        endif;

        $pagination_args = array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => 'page/%#%',
            'total' => $numpages,
            'current' => max(1, get_query_var($paged)),
            'show_all' => False,
            'end_size' => 1,
            'mid_size' => $pagerange,
            'prev_next' => True,
            'prev_text' => __('&laquo;', 'italian-restaurant'),
            'next_text' => __('&raquo;', 'italian-restaurant'),
            'type' => 'plain',
            'add_args' => false,
            'add_fragment' => ''
        );

        $paginate_links = paginate_links($pagination_args);

        if ($paginate_links) {
            echo "<nav class='custom-pagination'>";
            //echo "<span class='page-numbers page-num'>".__('Page ','italian-restaurant') . $paged .
            " of
" . $numpages . "</span> ";
            echo $paginate_links;
            echo "</nav>";
        }

    }
endif;

/**=== Footer Functions ===**/

if (!function_exists('italian_has_active_footer')):
    function italian_has_active_footer()
    {
        $active_footer_sidebars = 0;
        $active_sidebars = array();

        for ($i = 1; $i < 5; $i++) {
            if (is_active_sidebar('italian_footer_' . $i . '_sidebar')):
                $active_footer_sidebars++;
            endif;
        }

        if ($active_footer_sidebars == 0):
            return false;

        elseif ($active_footer_sidebars == 1):

            $active_sidebars['class'] = 'col-md-12';
            $active_sidebars['sidebars_count'] = 1;
            return $active_sidebars;

        elseif ($active_footer_sidebars == 2):

            $active_sidebars['class'] = 'col-md-6';
            $active_sidebars['sidebars_count'] = 2;
            return $active_sidebars;

        endif;

    }
endif;