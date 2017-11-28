<?php


if ( ! function_exists( 'inhabitent_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   */
  function Inhabitent_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
  
    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );
  
    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );
  
    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
      'primary' => esc_html( 'Primary Menu' ),
    ) );
  
    // Switch search form, comment form, and comments to output valid HTML5.
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );
  
  }
  endif; // inhabitent_setup