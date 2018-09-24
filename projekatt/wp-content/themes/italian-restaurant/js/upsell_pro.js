( function ( $ ) {
    if ('undefined' !== typeof prefixL11n) {
        upsell_pro = $('<a class="prefix-pro-link"></a>')
            .attr('href', prefixL11n.prefixURL)
            .attr('target', '_blank')
            .text(prefixL11n.prefixLabel)
            .css({
                'display': 'inline-block',
                'background-color': '#ff6600',
                'color': '#fff',
                'text-transform': 'uppercase',
                'margin-top': '6px',
                'margin-left': '30px;',
                'padding': '4px 5px',
                'font-size': '9px',
                'letter-spacing': '1px',
                'line-height': '1.5',
                'clear': 'both'
            })
        ;

        setTimeout(function () {
            $('#accordion-section-header_images_settings_section h3,#accordion-section-top_bar_settings_section h3, #accordion-panel-italian_restaurant_typography_panel h3, #accordion-section-italian_restaurant_social_section h3, #accordion-section-italian_restaurant_slider_section h3, #accordion-section-italian_restaurant_page_templates_section h3, #accordion-section-italian_restaurant_copyright_section h3').append(upsell_pro);
        }, 200);


       $('.prefix-pro-link').on('click', function(e) {
           e.stopPropagation();
       });


    }

}  )( jQuery );

