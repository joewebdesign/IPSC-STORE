<?php

// =============================================================================
// FUNCTIONS/GLOBAL/CLASSES.PHP
// -----------------------------------------------------------------------------
// Outputs custom classes for various elements, sometimes depending on options
// selected in the Customizer.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Body Class
//   02. Post Class
//   03. Brand Class
//   04. Masthead Class
//   05. Navbar Class
//   06. Portfolio Entry Class
// =============================================================================

// Body Class
// =============================================================================

if ( ! function_exists( 'x_body_class' ) ) :
  function x_body_class( $output ) {

    $stack              = x_get_stack();
    $entry_id           = get_the_ID();

    $one_page_nav_meta  = get_post_meta( $entry_id, '_x_page_one_page_navigation', true );
    $one_page_nav       = ( $one_page_nav_meta == '' ) ? 'Deactivated' : $one_page_nav_meta;

    $layout_site        = get_theme_mod( 'x_' . $stack . '_layout_site' );
    $layout_content     = get_theme_mod( 'x_' . $stack . '_layout_content' );

    $is_blog            = is_home();
    $blog_style         = get_theme_mod( 'x_blog_style' );
    $blog_layout        = get_theme_mod( 'x_blog_layout' );

    $is_archive         = is_archive();
    $archive_style      = get_theme_mod( 'x_archive_style' );
    $archive_layout     = get_theme_mod( 'x_archive_layout' );

    $is_post            = is_single();
    $post_layout        = get_post_meta( $entry_id, '_x_post_layout', true );
    $post_meta          = get_theme_mod( 'x_blog_enable_post_meta' );

    $is_page            = is_page();
    $disable_page_title = get_post_meta( $entry_id, '_x_entry_disable_page_title', true );

    $is_portfolio       = is_page_template( 'template-layout-portfolio.php' );
    $portfolio_layout   = get_post_meta( $entry_id, '_x_portfolio_layout', true );
    $portfolio_meta     = get_theme_mod( 'x_portfolio_enable_post_meta' );

    $is_shop            = function_exists( 'is_shop' ) && is_shop();
    $shop_layout        = get_theme_mod( 'x_woocommerce_shop_layout_content' );

    $integrity_design   = get_theme_mod( 'x_integrity_design' );
    $icon_blank_sidebar = get_post_meta( $entry_id, '_x_icon_blank_template_sidebar', true );

    $custom_class       = get_post_meta( $entry_id, '_x_entry_body_css_class', true );


    //
    // Stack.
    //

    switch ( $stack ) {
      case 'integrity' :
        if ( $integrity_design == 'dark' ) {
          $output[] .= 'x-integrity x-integrity-dark';
        } else {
          $output[] .= 'x-integrity x-integrity-light';
        }
        break;
      case 'renew' :
        $output[] .= 'x-renew';
        break;
      case 'icon' :
        $output[] .= 'x-icon';
        break;
    }


    //
    // Navbar.
    //

    if ( $one_page_nav != 'Deactivated' ) {
      $navbar_positioning = 'fixed-top';
    } else {
      $navbar_positioning = get_theme_mod( 'x_navbar_positioning' );
    }

    switch ( $navbar_positioning ) {
      case 'static-top' :
        $output[] .= 'x-navbar-static-active';
        break;
      case 'fixed-top' :
        $output[] .= 'x-navbar-fixed-top-active';
        break;
      case 'fixed-left' :
        $output[] .= 'x-navbar-fixed-left-active';
        break;
      case 'fixed-right' :
        $output[] .= 'x-navbar-fixed-right-active';
        break;
      default :
        $output[] .= 'x-navbar-static-active';
    }


    //
    // Site layout.
    //

    switch ( $layout_site ) {
      case 'boxed' :
        $output[] .= 'x-boxed-layout-active';
        break;
      case 'full-width' :
        $output[] .= 'x-full-width-layout-active';
        break;
      default :
        $output[] .= 'x-full-width-layout-active';
    }


    //
    // Content layout.
    //

    switch ( $layout_content ) {
      case 'content-sidebar' :
        $output[] .= 'x-content-sidebar-active';
        break;
      case 'sidebar-content' :
        $output[] .= 'x-sidebar-content-active';
        break;
      case 'full-width' :
        $output[] .= 'x-full-width-active';
        break;
      default :
        $output[] .= 'x-content-sidebar-active';
    }


    //
    // Blog and posts.
    //

    if ( $is_blog ) {
      if ( $blog_style == 'masonry' ) {
        $output[] .= 'x-masonry-active x-blog-masonry-active';
      } else {
        $output[] .= 'x-blog-standard-active';
      }
      if ( $blog_layout == 'full-width' ) {
        $output[] .= 'x-blog-fullwidth-active';
      }
    }

    if ( $is_post ) {
      if ( $post_layout == 'on' ) {
        $output[] .= 'x-post-fullwidth-active';
      }
    }

    if ( $post_meta == 0 ) {
      $output[] .= 'x-post-meta-disabled';
    }


    //
    // Archives.
    //

    if ( $is_archive && ! $is_portfolio && ! $is_shop ) {
      if ( $archive_style == 'masonry' ) {
        $output[] .= 'x-masonry-active x-archive-masonry-active';
      } else {
        $output[] .= 'x-archive-standard-active';
      }
      if ( $archive_layout == 'full-width' ) {
        $output[] .= 'x-archive-fullwidth-active';
      }
    }


    //
    // Pages.
    //

    if ( $is_page ) {
      if ( $disable_page_title == 'on' ) {
        $output[] .= 'x-page-title-disabled';
      }
    }


    //
    // Portfolio.
    //

    if ( $is_portfolio ) {
      if ( $portfolio_layout == 'full-width' ) {
        $output[] .= 'x-portfolio-fullwidth-active';
      }
    }

    if ( $portfolio_meta == 0 ) {
      $output[] .= 'x-portfolio-meta-disabled';
    }


    //
    // Shop.
    //

    if ( $is_shop ) {
      if ( $shop_layout == 'full-width' ) {
        $output[] .= 'x-shop-fullwidth-active';
      }
    }


    //
    // Icon.
    //

    if ( $stack == 'icon' && $icon_blank_sidebar == 'Yes' ) {
      $output[] .= 'x-blank-template-sidebar-active';
    }


    //
    // Custom.
    //

    if ( $custom_class != '' ) {
      $output[] .= $custom_class;
    }

    return $output;

  }
  add_filter( 'body_class', 'x_body_class' );
endif;


if ( ! function_exists( 'x_body_class_info' ) ) :
  function x_body_class_info( $output ) {

    $theme    = wp_get_theme( basename( get_template_directory() ) );
    $version  = str_replace( '.', '_', $theme['Version'] );
    $is_child = is_child_theme();

    $output[] = 'x-v' . $version;

    if ( $is_child ) {
      $output[] = 'x-child-theme-active';
    }

    return $output;

  }
  add_filter( 'body_class', 'x_body_class_info', 10000 );
endif;



// Post Class
// =============================================================================

if ( ! function_exists( 'x_post_class' ) ) :
  function x_post_class( $output ) {

    switch ( has_post_thumbnail() ) {
      case true :
        $output[] = 'has-post-thumbnail';
        break;
      case false :
        $output[] = 'no-post-thumbnail';
        break;
    }

    return $output;

  }
  add_filter( 'post_class', 'x_post_class' );
endif;



// Brand Class
// =============================================================================

if ( ! function_exists( 'x_brand_class' ) ) :
  function x_brand_class() {

    switch ( get_theme_mod( 'x_logo' ) ) {
      case '' :
        $output = 'x-brand text';
        break;
      default :
        $output = 'x-brand img';
        break;
    }

    echo $output;

  }
  add_action( 'customize_save', 'x_brand_class' );
endif;



// Masthead Class
// =============================================================================

if ( ! function_exists( 'x_masthead_class' ) ) :
  function x_masthead_class() {

    $navbar_position   = get_theme_mod( 'x_navbar_positioning' );
    $logo_nav_layout   = get_theme_mod( 'x_logo_navigation_layout' );
    $one_page_nav_meta = get_post_meta( get_the_ID(), '_x_page_one_page_navigation', true );
    $one_page_nav      = ( $one_page_nav_meta == '' ) ? 'Deactivated' : $one_page_nav_meta;

    if ( ( $navbar_position == 'static-top' || $navbar_position == 'fixed-top' || $one_page_nav != 'Deactivated' ) && $logo_nav_layout == 'stacked' ) :
      $output = 'masthead masthead-stacked';
    else :
      $output = 'masthead masthead-inline';
    endif;

    echo $output;

  }
  add_action( 'customize_save', 'x_masthead_class' );
endif;



// Navbar Class
// =============================================================================

if ( ! function_exists( 'x_navbar_class' ) ) :
  function x_navbar_class() {

    $one_page_nav_meta = get_post_meta( get_the_ID(), '_x_page_one_page_navigation', true );
    $one_page_nav      = ( $one_page_nav_meta == '' ) ? 'Deactivated' : $one_page_nav_meta;

    if ( $one_page_nav != 'Deactivated' ) {
      $navbar_positioning = 'fixed-top';
    } else {
      $navbar_positioning = get_theme_mod( 'x_navbar_positioning' );
    }

    switch ( $navbar_positioning ) {
      case 'fixed-left' :
        $output = 'x-navbar x-navbar-fixed-left';
        break;
      case 'fixed-right' :
        $output = 'x-navbar x-navbar-fixed-right';
        break;
      default :
        $output = 'x-navbar';
        break;
    }

    echo $output;

  }
  add_action( 'customize_save', 'x_navbar_class' );
endif;



// Portfolio Entry Class
// =============================================================================

if ( ! function_exists( 'x_portfolio_entry_classes' ) ) :
  function x_portfolio_entry_classes( $classes ) {

    GLOBAL $post;
    $terms = wp_get_object_terms( $post->ID, 'portfolio-category' );
    foreach ( $terms as $term ) {
      $classes[] = 'x-portfolio-' . md5( $term->slug );
    }
    return $classes;

  }
  add_filter( 'post_class', 'x_portfolio_entry_classes' );
endif;