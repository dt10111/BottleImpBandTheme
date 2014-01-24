<?php


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 750; /* pixels */

if ( ! function_exists( '_tk_setup' ) ) :
/**
 * Set up theme defaults and register support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function _tk_setup() {
    global $cap, $content_width;

    // This theme styles the visual editor with editor-style.css to match the theme style.
    add_editor_style();

    if ( function_exists( 'add_theme_support' ) ) {

		/**
		 * Add default posts and comments RSS feed links to head
		*/
		add_theme_support( 'automatic-feed-links' );
		
		/**
		 * Enable support for Post Thumbnails on posts and pages
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		*/
		add_theme_support( 'post-thumbnails' );
		
		/**
		 * Enable support for Post Formats
		*/
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
		
		/**
		 * Setup the WordPress core custom background feature.
		*/
		add_theme_support( 'custom-background', apply_filters( '_tk_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
	
    }

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on _tk, use a find and replace
	 * to change '_tk' to the name of your theme in all the template files
	*/
	load_theme_textdomain( '_tk', get_template_directory() . '/languages' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	*/ 
    register_nav_menus( array(
        'primary'  => __( 'Header bottom menu', '_tk' ),
    ) );

}
endif; // _tk_setup
add_action( 'after_setup_theme', '_tk_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function _tk_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', '_tk' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', '_tk_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function _tk_scripts() {
	wp_enqueue_style( '_tk-style', get_stylesheet_uri() );

	// load bootstrap css
    wp_enqueue_style('_tk-bootstrap', '//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css', false ,'3.0.2', 'all' );	  
    wp_enqueue_style('_tk-font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css', false ,'4.0.3', 'all' );	
    wp_enqueue_style('fancybox-css', get_template_directory_uri().'/includes/js/jquery.fancybox.css', false ,'1.0', 'all' );		
   // wp_enqueue_style('fancybox-buttons', get_template_directory_uri().'/includes/js/helpers/jquery.fancybox-buttons.css', false ,'1.0', 'all' );	
   // wp_enqueue_style('fancybox-thumbs', get_template_directory_uri().'/includes/js/helpers/jquery.fancybox-thumbs.css', false ,'1.0', 'all' );	
    wp_enqueue_style('core-style', get_template_directory_uri().'/includes/css/bootstrap-core.css', false ,'1.0', 'all' );	
    wp_enqueue_style('custom-style', get_template_directory_uri().'/includes/css/bottle-default.php', false ,'1.0', 'all' );	
	// load bootstrap js
      wp_enqueue_script('_tk-bootstrapjs', '//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js', array('jquery'),'3.0.2', true );
		
	// load bootstrap wp js
	wp_enqueue_script( '_tk-bootstrapwp', get_template_directory_uri() . '/includes/js/bootstrap-wp.js', array('jquery') );

	wp_enqueue_script( '_tk-skip-link-focus-fix', get_template_directory_uri() . '/includes/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'fluidvids', get_template_directory_uri() . '/includes/js/fluidvids.min.js', array(), '20130115', true );
	wp_enqueue_script( 'stickup', get_template_directory_uri() . '/includes/js/stickUp.min.js', array(), '20130115', true );
	wp_enqueue_script( 'fancybox-js', get_template_directory_uri() . '/includes/js/jquery.fancybox.js', array(), '20130115', true );	
	wp_enqueue_script( 'quovolver', get_template_directory_uri() . '/includes/js/jquery.quovolver.min.js', array(), '20130115', true );	
	wp_enqueue_script( 'songkick', '//widget.songkick.com/widget.js', array(), '20130115', true );	
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/includes/js/scripts.js', array(), '20130115', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( '_tk-keyboard-image-navigation', get_template_directory_uri() . '/includes/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', '_tk_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/bootstrap-wp-navwalker.php';

/**
 * Bottle Imp Custom.
 */
// REMOVE META BOXES FROM WORDPRESS DASHBOARD FOR ALL USERS
 
function example_remove_dashboard_widgets()
{
    // Globalize the metaboxes array, this holds all the widgets for wp-admin
    global $wp_meta_boxes;
     
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
}
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets' );
// Replace Admin Login Logo

function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/images/bottleimplogo.jpg) !important; }
    </style>';
}

add_action('login_head', 'my_custom_login_logo');

// Admin footer modification
 
function remove_footer_admin () 
{
    echo '<span id="footer-thankyou">Developed by <a href="http://danieltuttle.com" target="_blank">Daniel Tuttle</a></span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

/* 
 * Remove the WordPress Logo from the WordPress Admin Bar 
 */  
function remove_wp_logo() {  
    global $wp_admin_bar;  
    $wp_admin_bar->remove_menu('wp-logo');  
}  
add_action( 'wp_before_admin_bar_render', 'remove_wp_logo' );  

/* 
 * Add thumbnails to RSS Feed
 */  

function featured_image_in_feed( $content ) {
    global $post;
    if( is_feed() ) {
        if ( has_post_thumbnail( $post->ID ) ){
            $output = get_the_post_thumbnail( $post->ID, 'medium', array( 'style' => 'float:right; margin:0 0 10px 10px;' ) );
            $content = $output . $content;
        }
    }
    return $content;
}
add_filter( 'the_content', 'featured_image_in_feed' );

/* 
 * Add Custom Post Types to RSS Feed
 */  

function myfeed_request($qv) {
	if (isset($qv['feed']) && !isset($qv['post_type']))
		$qv['post_type'] = array('post', 'albums', 'mixes');
	return $qv;
}
add_filter('request', 'myfeed_request');

// Custom Post Types

require_once( 'Custom-Meta-Boxes/custom-meta-boxes.php' );
require_once( 'Custom-Meta-Boxes/custom-post-types.php' );
require_once( 'Custom-Meta-Boxes/bottleimp-functions.php' );

// Disable Admin Bar for everyone but administrators
if (!function_exists('df_disable_admin_bar')) {

	function df_disable_admin_bar() {
		
		if (!current_user_can('manage_options')) {
		
			// for the admin page
			remove_action('admin_footer', 'wp_admin_bar_render', 1000);
			// for the front-end
			remove_action('wp_footer', 'wp_admin_bar_render', 1000);
			
			// css override for the admin page
			function remove_admin_bar_style_backend() { 
				echo '<style>body.admin-bar #wpcontent, body.admin-bar #adminmenu { padding-top: 0px !important; }</style>';
			}	  
			add_filter('admin_head','remove_admin_bar_style_backend');
			
			// css override for the frontend
			function remove_admin_bar_style_frontend() {
				echo '<style type="text/css" media="screen">
				html { margin-top: 0px !important; }
				* html body { margin-top: 0px !important; }
				</style>';
			}
			add_filter('wp_head','remove_admin_bar_style_frontend', 99);
			
		}
  	}
}
add_action('init','df_disable_admin_bar');

function new_excerpt_length($length) {
return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');

 /* 
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */
 
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}

/*
| -------------------------------------------------------------------
| Adding Post Thumbnails and Image Sizes
| -------------------------------------------------------------------
| */
if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 160, 120 ); // 160 pixels wide by 120 pixels high
  
}

if ( function_exists( 'add_image_size' ) ) {
  add_image_size( 'photo-gallery', 400, 300, true ); // 260 pixels wide by 180 pixels high
}
