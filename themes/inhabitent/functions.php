<?php
/**
 * inhabitent Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package inhabitent_Theme
 */

require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/enqueue.php';
require_once get_template_directory() . '/inc/template-tags.php';
require_once get_template_directory() . '/inc/extras.php';

 /**
	* Hooks actions & filters
	*/
add_action( 'wp_enqueue_scripts', 'inhabitent_scripts' );
add_action( 'wp_enqueue_scripts', 'inhabitent_dynamic_css' );
add_action( 'after_setup_theme', 'inhabitent_setup' );
add_action( 'after_setup_theme', 'inhabitent_content_width', 0 );
add_action( 'widgets_init', 'inhabitent_widgets_init' );
add_filter( 'stylesheet_uri', 'inhabitent_minified_css', 10, 2 );
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
add_action( 'pre_get_posts', 'rc_modify_query_limit_posts' );
add_filter('get_search_form', 'my_search_form');
add_filter('request', 'change_wp_search_size');


function wpdocs_custom_excerpt_length( $length ) {
	return 50;
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function inhabitent_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'inhabitent_content_width', 640 );
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function inhabitent_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html( 'Sidebar' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}


/**
 * Filter the stylesheet_uri to output the minified CSS file.
 */
function inhabitent_minified_css( $stylesheet_uri, $stylesheet_dir_uri ) {
	if ( file_exists( get_template_directory() . '/build/css/style.min.css' ) ) {
		$stylesheet_uri = $stylesheet_dir_uri . '/build/css/style.min.css';
	}

	return $stylesheet_uri;
}


//Limit search to 10 results.
function change_wp_search_size($queryVars) {
	if ( isset($_REQUEST['s']) ) // Make sure it is a search page
		$queryVars['posts_per_page'] = 10; // Change 10 to the number of posts you would like to show
	return $queryVars; // Return our modified query variables
}



//Show 16 products on shop page.
function rc_modify_query_limit_posts( $query ) {

 if( ! is_admin() && $query->is_main_query() ) {

	 $query->set('posts_per_page', '16');
 }
}

//Change 404 search bar
function my_search_form($html)
{
    return str_replace('Type and hit enter', 'Type and hit enter ', $html);
}


