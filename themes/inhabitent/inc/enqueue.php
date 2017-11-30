<?php

/**
 * Enqueue scripts and styles.
 */
function inhabitent_scripts() {
	
	wp_enqueue_style( 'red-starter-style', get_stylesheet_uri() );

	wp_enqueue_script( 'red-starter-skip-link-focus-fix', get_template_directory_uri() . '/build/js/skip-link-focus-fix.min.js', array(), '20130115', true );

	wp_enqueue_script( 'scripts.js', get_template_directory_uri() . '/build/js/scripts.min.js', array('jquery') );

	wp_enqueue_script( 'font-awesome-cdn', 'https://use.fontawesome.com/7bdfd959fe.js', array(), '4.7', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}

