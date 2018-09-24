<?php
/**
 * Chili functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Chili_Lite
 */ 


if ( ! function_exists( 'chili_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function chili_lite_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Chili, use a find and replace
	 * to change 'chili-lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'chili-lite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );


	/*
	 * Woocommerce Support
	 */
	add_theme_support( 'woocommerce' ); 

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Main Menu', 'chili-lite' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

    /*
     * Custom Logo
     */ 
    add_theme_support( 'custom-logo', array(
       'height'      => 39,
       'width'       => 139,
       'flex-width'  => true,
       'flex-height' => true,'header-text' => array( 'logo-area' ),
    ) );

    add_theme_support( 'custom-header', array(
        'flex-width'    => true, 
        'flex-height'    => true, 
        'default-image' => get_template_directory_uri() . '/img/bennar.jpg',
    ) );
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', chili_lite_fonts_url() ) );

}
endif;
add_action( 'after_setup_theme', 'chili_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function chili_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'chili_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'chili_lite_content_width', 0 );


/**
 * fonts enqueue
 */
function chili_lite_fonts_url(){
	$chili_lite_google_fonts_url = add_query_arg( 'family', urlencode( 'Lato:400,100,300,700,900|Raleway:400,300,500,600,700,800,900' ), "https://fonts.googleapis.com/css" );
	return $chili_lite_google_fonts_url;
}


/**
 * Enqueue scripts and styles.
 */
function chili_lite_scripts() {

	/**
	 * google fonts
	 */
	wp_enqueue_style( 'chili-lite-fonts', chili_lite_fonts_url(), array(), null );

	/**
	 * LOAD CSS
	 */
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/css/bootstrap.css'); 
	wp_enqueue_style( 'jquery-ui', get_template_directory_uri() .'/css/jquery-ui.css');
	wp_enqueue_style( 'meanmenu', get_template_directory_uri() .'/css/meanmenu.css');   
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome.css');  
	wp_enqueue_style( 'chili-lite-style', get_stylesheet_uri() );
	wp_enqueue_style( 'chili-lite-responsive', get_template_directory_uri() .'/css/responsive.css');

	/**
	 * LOAD JS
	 */
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.8.3.js', array('jquery','masonry','jquery-ui-core'), '2.8.3', false );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), '3.3.5', true ); 
	wp_enqueue_script( 'meanmenu', get_template_directory_uri() . '/js/jquery.meanmenu.js', array(), '2.0.8', true );    
	wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/js/jquery.easing.js', array(), '1.3', true );	     
	wp_enqueue_script( 'chili-lite-plugins', get_template_directory_uri() . '/js/plugins.js', array(), '1.0', true );
	wp_enqueue_script( 'chili-lite-main', get_template_directory_uri() . '/js/main.js', array(), '1.0', true );

	wp_enqueue_script( 'chili-lite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'chili-lite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'chili_lite_scripts' );

/**
 * Includes Files
 */
require get_template_directory() . '/inc/custom-header.php'; 
require get_template_directory() . '/inc/template-tags.php'; 
require get_template_directory() . '/inc/extras.php'; 
require get_template_directory() . '/inc/customizer.php'; 
require get_template_directory() . '/inc/jetpack.php';
require get_template_directory() . '/inc/widget/register-widget.php'; 
require get_template_directory() . '/inc/chili-function.php';     

/**
 * Required Plugins Inclusion.
 */ 
add_action( 'tgmpa_register', 'chili_lite_recommend_plugin' );
function chili_lite_recommend_plugin() { 
    $plugins[] = array(
            'name'      => esc_html__('Redux Framework','chili-lite'),
            'slug'      => 'redux-framework',
            'required'  => false,
    ); 
    tgmpa( $plugins); 
}

// custom css
add_action( 'wp_head', 'chili_lite_lite_add_css' );
function chili_lite_lite_add_css() {

    if(is_page()){
        global $post;  
        $chili_lite_lite_hdr_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID), 'full' );
        $chili_lite_lite_hdr_img = $chili_lite_lite_hdr_img[0];
        if(empty($chili_lite_lite_hdr_img)){
            $chili_lite_lite_hdr_img = get_header_image();
        }
    }else{ 
        $chili_lite_lite_hdr_img = get_header_image();
    }
 
    $hdrtxt = get_theme_mod( 'header_textcolor' ); 
    $footer_bg_clr = get_theme_mod( 'footer_bg_color' );
    ?>
    <style type="text/css">
    	.logo-area a strong,
	    .page-header-area h1,
	    .header-area .main-menu-area ul li a{
	    	color: #<?php echo esc_attr($hdrtxt); ?>;
	    }
        .page-header-area {
            background: rgba(0, 0, 0, 0) url(<?php echo esc_url($chili_lite_lite_hdr_img); ?>) no-repeat scroll center center / cover; 
        } 
        .footer-bottom-area {
            background: <?php echo esc_attr(sanitize_hex_color($footer_bg_clr)); ?>; 
        } 
    </style>
    <?php 
}

// main menu
function chili_lite_main_menu(){
	wp_nav_menu( array(
		'theme_location'    => 'primary',
		'depth'             => 4,
		'container'         => false,
		'menu_id'        	=> 'nav',
		'menu_class'        => '',
		'fallback_cb'       => 'chili_lite_default_menu',
		// 'walker'            => new chili_lite_Nav_Walker()
	));
}
// main menu
function chili_lite_mobile_menu(){
	wp_nav_menu( array(
		'theme_location'    => 'primary',
		'depth'             => 4,
		'container'         => false,
		'menu_id'        	=> '',
		'menu_class'        => '',
		'fallback_cb'       => 'chili_lite_default_menu',
		// 'walker'            => new chili_lite_Nav_Walker()
	));
}

// main menu
function chili_lite_breadcrumb(){
	if(!is_front_page() && !is_home()){  
		$chili_lite_blog_title=  esc_html__('Blog','chili-lite');;
		 
		$chili_lite_ptitle=  get_the_title( get_option('page_for_posts', true) );
		if(is_front_page() && is_home()){ echo esc_html($chili_lite_blog_title); }elseif(is_home()){ echo esc_html($chili_lite_ptitle);}elseif(is_search()){ printf( '<span>' . get_search_query() . '</span>' );}elseif(is_category() || is_tag()) { single_cat_title("", true); }elseif(is_archive()){ if ( class_exists('WooCommerce' ) ){ if(is_shop() || is_product_category() || is_product_tag() ){ woocommerce_page_title(); }else{ echo get_the_date('F Y'); } }else{ echo get_the_date('F Y'); } }elseif(is_404()){ esc_html_e('404 Error','chili-lite');}else{ the_title();}
	}
}
 
// comment box title change
add_filter( 'comment_form_defaults', 'chili_lite_remove_comment_form_allowed_tags' );
function chili_lite_remove_comment_form_allowed_tags( $defaults ) {
	$defaults['comment_notes_after'] = '';
	$defaults['comment_notes_before'] = '';
	return $defaults;

}

function chili_lite_comment_reform ($arg) {
 $commenter = wp_get_current_commenter();
	$arg['title_reply'] = esc_html__('Leave Comments','chili-lite');
	$arg['label_submit'] = esc_html__('Send Message','chili-lite');
	$arg['comment_field'] = '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="77" rows="8" placeholder="'. esc_attr("Message", "chili-lite").'" aria-required="true"></textarea></p>';

	return $arg;
}
add_filter('comment_form_defaults','chili_lite_comment_reform');


function chili_lite_modify_comment_form_fields($fields){
	$commenter = wp_get_current_commenter();
	$req	   = get_option( 'require_name_email' );
	$fields['author'] = '<p class="comment-form-author"><input id="author" name="author" type="text" value="'. esc_attr( $commenter['comment_author'] ) .'" size="30" maxlength="245" aria-required="true"  placeholder="'. esc_attr("Name *", "chili-lite").'" required="required"></p>';
	$fields['email'] = '<p class="comment-form-email"><input id="email" name="email" type="email" value="'. esc_attr( $commenter['comment_author_email'] ) .'" placeholder="'. esc_attr("E-mail *", "chili-lite").'" size="30" maxlength="100" aria-describedby="email-notes" aria-required="true" ></p>';
	$fields['url'] = ' ';
	return $fields;
}
add_filter('comment_form_default_fields','chili_lite_modify_comment_form_fields');
 
/**
 * chili comment list modify
 */ 
function chili_lite_comments($comment, $args, $depth) { ?>
	<div <?php comment_class('media main-comments'); ?> id="comment-<?php comment_ID(); ?>">
	    <a class="pull-left" href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
	        <?php echo get_avatar( $comment, 100 ); ?>
	      </a>
	      <div class="media-body comments-body">
	        <h4 class="media-heading"><?php comment_author() ?></h4>
	        <p><?php echo get_comment_date(); ?> <?php esc_html_e('at','chili-lite'); ?> <?php echo get_comment_time('g:i a'); ?></p>
			<?php if ($comment->comment_approved == '0') : ?>
				<p><em><?php esc_html_e('Your comment is awaiting moderation.','chili-lite'); ?></em></p>
			<?php endif; ?>
	        <?php comment_text(); ?>   
	        <div class="replay-area"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></div>
	    </div>
<?php } 

 
/**
 * menu fallback
 */ 
if(is_user_logged_in()):
	function chili_lite_default_menu() {
		?>
	    <ul class="nav">                  
	    	<li><a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>"><?php esc_html_e( 'Add Menu', 'chili-lite' ); ?></a></li>
		</ul>
		<?php
	}
endif;


// remove vc shortcode
function chili_lite_short_text_remove_shortcode($start=0,$end=140){
	global $post;
	/* Get Post congtent */
	$content = $post->post_content;
	/* Remove visual composer shortcode like [vc_row] link that */
	$desc = strip_tags(do_shortcode($post->post_content));
	/* Remove empty spaces */
	$desc = trim(preg_replace('/\s+/',' ', $desc ));
	/* Get content with limit */
	$desc = mb_strimwidth($desc, $start, $end, '');
	$desc = substr($desc,0,strrpos($desc,' '));
	echo esc_textarea($desc);
}

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function chili_lite_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url(get_bloginfo( 'pingback_url' )) );
	}
}
add_action( 'wp_head', 'chili_lite_pingback_header' );
