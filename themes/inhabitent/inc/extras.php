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
