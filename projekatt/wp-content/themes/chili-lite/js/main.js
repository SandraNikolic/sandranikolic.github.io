/*!
 *  Chili LIte Main: v1.0
 *   
 */


(function ($) {
 "use strict";
 
 // post grid
  if ( $('#masonry-loop').length ) {
      //set the container that Masonry will be inside of in a var
      var container = document.querySelector('#masonry-loop');
      //create empty var msnry
      var msnry;
      // initialize Masonry after all images have loaded
      imagesLoaded( container, function() {
          msnry = new Masonry( container, {
              itemSelector: '.masonry-entry'
          });
      });
  } 

  $(".header-right .search-form .search-field").unwrap();
  $(".header-right .search-form span").remove();
  $(".header-right .search-form input.search-submit").remove();
  $(".header-right .search-form input").toggleClass("search-field search-text");
  $(".header-right .search-form").prepend("<i class=\"fa fa-search search-button\" aria-hidden=\"true\"></i>");

  $('body.single-post').addClass('single-news-page');

  $("div.pagination-area h2").unwrap().remove();
  $( ".widget_search label, .no-results.not-found .search-form label" ).append( $( '<i class="fa fa-search"></i>' ) );
   
  $('.widget_archive ul li').contents().filter(function () {
    return this.nodeType === 3;
  }).wrap('<span></span>');
  $('.widget_categories ul li').contents().filter(function () {
    return this.nodeType === 3;
  }).wrap('<span></span>');

  /*----------------------------
   jQuery MeanMenu
  ------------------------------ */
  if($('#dropdown').length){
    jQuery('nav#dropdown').meanmenu();  
  }

  /*----------------------------
   Masonry
  ------------------------------ */
  jQuery(window).on('load', function(){
  var $container = $('.all-blog-content-area');
      $container.masonry({ 
            itemSelector: '.col-md-6'
      });
  });
       
  /*--------------------------
   scrollUp
  ---------------------------- */	
	$.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });
   /*------------------------------------
   jquery Serch Box activation code 
   --------------------------------------*/
   $(".search-button").on('click', function(){
      $(".search-text").slideToggle('slow');
  });  
  //Sticky Header
  $(window).on('scroll', function(){
      if( $(window).scrollTop()>100 ){
           $('#sticker').addClass('stick');
      } else {
          $('#sticker').removeClass('stick');
      }
  });
   
})(jQuery); 