<?php
/**
 * riverside functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package riverside
 */

if ( ! function_exists( 'riverside_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function riverside_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on riverside, use a find and replace
	 * to change 'riverside' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'riverside', get_template_directory() . '/languages' );

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
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'room_slide', 600, 655, true );
	add_image_size( 'room_overview', 430, 430, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'riverside' ),
		'sub-footer' => esc_html__( 'Sub Footer Menu', 'riverside' ),
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
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

}
endif; // riverside_setup
add_action( 'after_setup_theme', 'riverside_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function riverside_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'riverside_content_width', 640 );
}
add_action( 'after_setup_theme', 'riverside_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function riverside_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'riverside' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'riverside_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function riverside_scripts() {
	wp_enqueue_style( 'fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );

	wp_enqueue_style( 'slick-css', get_template_directory_uri().'/slick/slick.css' );
	wp_enqueue_style( 'slick-thmee', get_template_directory_uri().'/slick/slick-theme.css' );

	//wp_enqueue_style( 'jquery-ui-css', get_template_directory_uri().'/jquery-ui/jquery-ui.css' );
	//wp_enqueue_style( 'jquery-ui-structure', get_template_directory_uri().'/jquery-ui/jquery-ui.structure.css' );
	//wp_enqueue_style( 'jquery-ui-theme', get_template_directory_uri().'/jquery-ui/jquery-ui.theme.css' );

	wp_enqueue_style( 'dp-css', get_template_directory_uri() . '/datepicker/compressed/themes/default.css' );
	wp_enqueue_style( 'dp-css-date', get_template_directory_uri() . '/datepicker/compressed/themes/default.date.css' );

	wp_enqueue_style( 'riverside-style', get_stylesheet_uri() );

	wp_enqueue_script('jquery');

	wp_enqueue_script( 'dp-js', get_template_directory_uri() . '/datepicker/compressed/picker.js', array(), '', true );
	wp_enqueue_script( 'dp-legacy', get_template_directory_uri() . '/datepicker/compressed/legacy.js', array(), '', true );
	wp_enqueue_script( 'dp-date', get_template_directory_uri() . '/datepicker/compressed/picker.date.js', array(), '', true );

	wp_enqueue_script( 'gmap', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', '', '', true );

	//wp_enqueue_script('jquery-ui', '//code.jquery.com/ui/1.11.4/jquery-ui.js');
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/slick/slick.min.js', array(), '', true );
	wp_enqueue_script( 'app', get_template_directory_uri() . '/js/app.js', array(), '', true );
	wp_enqueue_script( 'navigation', get_template_directory_uri() . '/js/navigation.js', array(), '', true );
	wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'riverside_scripts' );

function add_typekit() {
?><script>
  (function(d) {
    var config = {
      kitId: 'nwk1xit',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script><?php 
}
add_action( 'wp_head', 'add_typekit', 20 );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom post types
 */
require get_template_directory() . '/inc/post-types.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
