<?php
/**
 * Personal Info by SpiderBuzz functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Personal_Info_by_SpiderBuzz
 */

if ( ! function_exists( 'personal_info_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function personal_info_setup() {
	/*
	 * Make theme available for translation.
	*/
	load_theme_textdomain( 'personal-info', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	//Add the Editer style
	add_theme_support('editor_style');

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	add_theme_support( 'custom-logo' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'personal-info' ),
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

	

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'perosnal_info_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	
}
endif;
add_action( 'after_setup_theme', 'personal_info_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function perosnal_info_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'perosnal_info_content_width', 640 );
}
add_action( 'after_setup_theme', 'perosnal_info_content_width', 0 );

/**
 * Register widget area.
 */
function perosnal_info_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'personal-info' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'personal-info' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	//Add the Social Links

}
add_action( 'widgets_init', 'perosnal_info_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function perosnal_info_scripts() {
	wp_enqueue_style( 'perosnal-info-style', get_stylesheet_uri() );
	wp_enqueue_style('personal-info-stylesheet',get_template_directory_uri().'/css/all.css');
	wp_enqueue_style('font-awesome', get_template_directory_uri().'/css/css/font-awesome.min.css');

	wp_enqueue_script( 'perosnal-info-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'perosnal-info-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'perosnal_info_scripts' );

//Admin Css enque
function perosnal_info_load_custom_wp_admin_style(){
    wp_register_style( 'perosnal_info_custom_wp_admin_css', get_template_directory_uri('stylesheet_directory') . '/css/admin.css', false, '1.0.0' );
    wp_enqueue_style( 'perosnal_info_custom_wp_admin_css' );
}

add_action('admin_enqueue_scripts', 'perosnal_info_load_custom_wp_admin_style');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Plugins TGM
 */
 require get_template_directory() ."/inc/class-tgm-plugin-activation.php";

 /**
 * Demo Import Options
 */
require get_template_directory() ."/inc/demo-import/demo-import.php";


/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


add_action( 'init', 'perosnal_info_add_editor_styles' );
/**
 * Apply theme's stylesheet to the visual editor.
 */
function perosnal_info_add_editor_styles() {
 add_editor_style( get_stylesheet_uri() );
}
add_action( 'after_setup_theme', 'perosnal_info_add_editor_styles' );


/**
 * check blog page
 **/
function perosnal_info_is_blog () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

add_action( 'tgmpa_register', 'perosnal_info_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 */
function perosnal_info_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 */
	$plugins = array(
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Menu Image',
			'slug'      => 'menu-image',
			'required'  => false,
		),
		array(
			'name'      => 'Meta box',
			'slug'      => 'meta-box',
			'required'  => true,
		),
		array(
            'name' => esc_attr__( 'One Click Demo Import', 'personal-info'),
            'slug' => 'one-click-demo-import',
            'required' => true,
        ),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	*/
	$config = array(
		'id'           => 'personal-info',                 
		'default_path' => '',                      
		'menu'         => 'tgmpa-install-plugins', 
		'has_notices'  => true,                    
		'dismissable'  => true,                    
		'dismiss_msg'  => '',                       
		'is_automatic' => false,                   
		'message'      => '',                      
		
	);

	tgmpa( $plugins, $config );
}

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(is_plugin_active( 'meta-box/meta-box.php' ))
{
	require get_template_directory().'/inc/meta-box/init.php';
}
