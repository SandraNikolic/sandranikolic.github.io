jQuery(window).load(function () {
    jQuery('.site-loader').fadeOut('slow');
});
function italian_restaurant_responsive_menu_add() {
    jQuery('#kt-navigation').slicknav({
        label: ''
    });
}
function italian_restaurant_same_height() {
    jQuery('.matchHeight').matchHeight();
}
function italian_restaurant_add_lightbox_to_galleries() {
    jQuery('.gallery').magnificPopup({
        delegate: '.gallery-item > div > a',
        type: 'image',
        gallery: {
            enabled: true
        }
    });
}
function italian_restaurant_line_height(){
    var logo_area_height = jQuery('#kt-logo-container').height();
    
    jQuery('#kt-navigation').css('margin-top',logo_area_height/2+'px');
}
jQuery(document).ready(function($) {

    'use-strict';
    italian_restaurant_responsive_menu_add();
    italian_restaurant_same_height();
    italian_restaurant_add_lightbox_to_galleries();
    italian_restaurant_line_height();

});