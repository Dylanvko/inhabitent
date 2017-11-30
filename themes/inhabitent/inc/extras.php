<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package RED_Starter_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function red_starter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'red_starter_body_classes' );

// Change WP logo on wp-admin login

function inhabitent_login_logo() {
	echo '<style type="text/css">                                                                   
			#login h1 a { background-image:url('.get_stylesheet_directory_uri().'/images/logos/inhabitent-logo-text-dark.svg) !important; 
			background-size: 280px 60px;
			height: 60px;
			width: 280px;
		}                            
	</style>';
}
add_action('login_head', 'inhabitent_login_logo');


// Change WP url to inhabitent

function inhabitent_replace_url( $url ) {
	return get_bloginfo( 'url' ); //insert url here
}
add_filter( 'login_headerurl', 'inhabitent_replace_url' );


// Change url title
function inhabitent_logo_url_title(){
	return 'inhabitent';
}
add_filter('login_headertitle', 'inhabitent_logo_url_title');

// About hero image
function inhabitent_dynamic_css() {

	if ( ! is_page_template( 'about.php') ) {
		return;
	}

	$image = CFS()->get( 'about_header_image' );

	if (! $image ) {
		return;
	}

	$hero_css = ".page-template-about .custom-hero {
		height: 100vh;
		width: auto;
		background:
			linear-gradient( to bottom, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.4) 100% ),
			url({$image}) no-repeat center bottom;
		background-size: cover, cover; 
	}";

	wp_add_inline_style( 'red-starter-style', $hero_css );

}



