<?php

// =============================================================================
// FUNCTIONS/GLOBAL/CONTENT.PHP
// -----------------------------------------------------------------------------
// Functions pertaining to excerpt and content output.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Link Pages
//   02. Excerpt Length
//   03. Excerpt More String
//   04. Content More String
//   05. Custom <title> Output
//   06. Site Icons
// =============================================================================

// Link Pages
// =============================================================================

if ( ! function_exists( 'x_link_pages' ) ) :
  function x_link_pages() {

    wp_link_pages( array(
      'before' => '<div class="page-links">' . __( 'Pages:', '__x__' ),
      'after'  => '</div>'
    ) );

  }
endif;



// Excerpt Length
// =============================================================================

if ( ! function_exists( 'x_excerpt_length' ) ) :
  function x_excerpt_length( $length ) {

    $the_length = get_theme_mod( 'x_blog_excerpt_length' );
    $the_output = ( $the_length == '' ) ? 60 : $the_length;

    return $the_output;

  }
  add_filter( 'excerpt_length', 'x_excerpt_length' );
endif;



// Excerpt More String
// =============================================================================

if ( ! function_exists( 'x_excerpt_string' ) ) :
  function x_excerpt_string( $more ) {
    
    $stack = x_get_stack();

    if ( $stack == 'integrity' ) {
      return ' ... <div><a href="' . get_permalink() . '" class="more-link">' . __( 'Read More', '__x__' ) . '</a></div>';
    } else if ( $stack == 'renew' ) {
      return ' ... <a href="' . get_permalink() . '" class="more-link">' . __( 'Read More', '__x__' ) . '</a>';
    } else if ( $stack == 'icon' ) {
      return ' ...';
    }

  }
  add_filter( 'excerpt_more', 'x_excerpt_string' );
endif;



// Content More String
// =============================================================================

if ( ! function_exists( 'x_content_string' ) ) :
  function x_content_string( $more ) {
    
    $stack = x_get_stack();

    if ( $stack == 'integrity' ) {
      return '<a href="' . get_permalink() . '" class="more-link">' . __( 'Read More', '__x__' ) . '</a>';
    } else if ( $stack == 'renew' ) {
      return '<a href="' . get_permalink() . '" class="more-link">' . __( 'Read More', '__x__' ) . '</a>';
    } else if ( $stack == 'icon' ) {
      return '<a href="' . get_permalink() . '" class="more-link">' . __( 'Read More', '__x__' ) . '</a>';
    }

  }
  add_filter( 'the_content_more_link', 'x_content_string' );
endif;



// Custom <title> Output
// =============================================================================

if ( ! function_exists( 'x_wp_title' ) ) :
  function x_wp_title( $title ) {

    if ( is_front_page() ) {
      return get_bloginfo( 'name' ) . ' | ' . get_bloginfo( 'description' );
    } elseif ( is_page_template( 'template-layout-portfolio.php' ) ) {
      return get_the_title() . ' | ' . get_bloginfo( 'description' );
    } else {
      return trim( $title ) . ' | ' . get_bloginfo( 'name' ); 
    }

    return $title;

  }
  add_filter( 'wp_title', 'x_wp_title' );
endif;



// Site Icons
// =============================================================================

if ( ! function_exists( 'x_site_icons' ) ) :
  function x_site_icons() {

    $icon_favicon       = get_theme_mod( 'x_icon_favicon' );
    $icon_touch         = get_theme_mod( 'x_icon_touch' );
    $icon_tile          = get_theme_mod( 'x_icon_tile' );
    $icon_tile_bg_color = get_theme_mod( 'x_icon_tile_bg_color' );

    if ( $icon_favicon != '' ) {
      echo '<link rel="shortcut icon" href="' . $icon_favicon . '">';
    }

    if ( $icon_touch != '' ) {
      echo '<link rel="apple-touch-icon-precomposed" href="' . $icon_touch . '">';
    }

    if ( $icon_tile != '' ) {
      echo '<meta name="msapplication-TileColor" content="' . $icon_tile_bg_color . '">';
      echo '<meta name="msapplication-TileImage" content="' . $icon_tile . '">';
    }

  }
  add_action( 'wp_head', 'x_site_icons' );
endif;