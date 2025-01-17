<?php
/**
 * labeluk functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package labeluk
 */

if ( ! function_exists( 'labeluk_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function labeluk_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on labeluk, use a find and replace
	 * to change 'labeluk' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'labeluk', get_template_directory() . '/languages' );

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

	/*
	 * Enable support for theme logo
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'labeluk' ),
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
	add_theme_support( 'custom-background', apply_filters( 'labeluk_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'labeluk_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function labeluk_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'labeluk_content_width', 640 );
}
add_action( 'after_setup_theme', 'labeluk_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function labeluk_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'labeluk' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'labeluk' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Contact Sidebar', 'labeluk' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'labeluk' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'News Sidebar', 'labeluk' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add widgets here.', 'labeluk' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'labeluk_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function labeluk_scripts() {
	wp_enqueue_style( 'labeluk-style', get_stylesheet_uri() );
	wp_enqueue_style( 'labeluk-slickcss', get_template_directory_uri() . '/assets/slick/slick.css' );
	wp_enqueue_style( 'labeluk-slickthemecss', get_template_directory_uri() . '/assets/slick/slick-theme.css' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'fontawesome', 'https://use.fontawesome.com/a06260059d.js' );
	wp_enqueue_script( 'labeluk-slickjs', get_template_directory_uri() . '/assets/slick/slick.min.js', '', '', true );
	wp_enqueue_script( 'labeluk-base', get_template_directory_uri() . '/assets/js/base.min.js', '', '', true );

}
add_action( 'wp_enqueue_scripts', 'labeluk_scripts' );

/**
 * Add TypeKit
 */
function labeluk_typekit() {
?>
<script>
  (function(d) {
    var config = {
      kitId: 'wov6oyn',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>
<?php
}
add_action( 'wp_head', 'labeluk_typekit', '99' );

/**
 * Custom post types
 */
require get_template_directory() . '/inc/cpts.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Twitter Auth
 */
require get_template_directory() . '/inc/twitteroauth/twitteroauth.php';
