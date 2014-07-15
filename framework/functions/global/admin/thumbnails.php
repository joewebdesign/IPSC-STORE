<?php

// =============================================================================
// FUNCTIONS/GLOBAL/ADMIN/POST-THUMBNAIL-SIZES.PHP
// -----------------------------------------------------------------------------
// Sets up entry thumbnail sizes based on Customizer options.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Integrity Entry Thumbnail Width
//   02. Renew Entry Thumbnail Width
//   03. Icon Entry Thumbnail Width
//   04. Cropped Entry Thumbnail Height
// =============================================================================

// Integrity Entry Thumbnail Width
// =============================================================================

if ( ! function_exists( 'x_integrity_post_thumbnail_width' ) ) :
  function x_integrity_post_thumbnail_width() {

    //
    // 1. Subtract half of the span margin setup by the grid.
    //

    $meta_layout_content       = get_theme_mod( 'x_integrity_layout_content' );
    $meta_layout_site          = get_theme_mod( 'x_integrity_layout_site' );
    $meta_sizing_width         = get_theme_mod( 'x_integrity_sizing_site_width' );
    $meta_sizing_max_width     = get_theme_mod( 'x_integrity_sizing_site_max_width' );
    $meta_sizing_content_width = get_theme_mod( 'x_integrity_sizing_content_width' );

    $content = ( $meta_layout_content       == '' ) ? 'content-sidebar' : $meta_layout_content;
    $site    = ( $meta_layout_site          == '' ) ? 'full-width'      : $meta_layout_site;
    $s_w     = ( $meta_sizing_width         == '' ) ? 88 / 100          : $meta_sizing_width / 100;
    $max     = ( $meta_sizing_max_width     == '' ) ? 1200              : $meta_sizing_max_width;
    $c_w     = ( $meta_sizing_content_width == '' ) ? 72 - 2.463055     : $meta_sizing_content_width - 2.463055; // 1

    if ( $content == 'full-width' ) {
      if ( $site == 'full-width' ) {
        $output = $max;
      } elseif ( $site == 'boxed' ) {
        $output = $max * $s_w;
      }
    } else {
      if ( $site == 'full-width' ) {
        $output = round( $max * ( $c_w / 100 ) );
      } elseif ( $site == 'boxed' ) {
        $output = round( $max * ( $c_w / 100 ) * $s_w );
      }
    }

    if ( $site == 'full-width' ) {
      if ( $max < 979 * $s_w ) {
        $output = $max;
      } else {
        if ( $output < ( 979 * $s_w ) ) {
          $output = round( 979 * $s_w );
        }
      }
    } elseif ( $site == 'boxed' ) {
      if ( $max * $s_w < 979 * $s_w * $s_w ) {
        $output = $max * $s_w;
      } else {
        if ( $output < ( 979 * $s_w * $s_w ) ) {
          $output = round( 979 * $s_w * $s_w );
        }
      }
    }
    
    return $output;

  }
  add_action( 'customize_save', 'x_integrity_post_thumbnail_width' );
endif;


if ( ! function_exists( 'x_integrity_post_thumbnail_width_full' ) ) :
  function x_integrity_post_thumbnail_width_full() {

    $meta_layout_site      = get_theme_mod( 'x_integrity_layout_site' );
    $meta_sizing_width     = get_theme_mod( 'x_integrity_sizing_site_width' );
    $meta_sizing_max_width = get_theme_mod( 'x_integrity_sizing_site_max_width' );

    $site = ( $meta_layout_site      == '' ) ? 'full-width' : $meta_layout_site;
    $s_w  = ( $meta_sizing_width     == '' ) ? 88 / 100     : $meta_sizing_width / 100;
    $max  = ( $meta_sizing_max_width == '' ) ? 1200         : $meta_sizing_max_width;

    if ( $site == 'full-width' ) {
      $output = $max;
    } elseif ( $site == 'boxed' ) {
      $output = $max * $s_w;
    }
    
    return $output;

  }
  add_action( 'customize_save', 'x_integrity_post_thumbnail_width_full' );
endif;



// Renew Entry Thumbnail Width
// =============================================================================

if ( ! function_exists( 'x_renew_post_thumbnail_width' ) ) :
  function x_renew_post_thumbnail_width() {

    //
    // 1. Subtract half of the span margin setup by the grid.
    // 2. Subtract 16px due to padding and border around featured image.
    //

    $meta_layout_content       = get_theme_mod( 'x_renew_layout_content' );
    $meta_layout_site          = get_theme_mod( 'x_renew_layout_site' );
    $meta_sizing_width         = get_theme_mod( 'x_renew_sizing_site_width' );
    $meta_sizing_max_width     = get_theme_mod( 'x_renew_sizing_site_max_width' );
    $meta_sizing_content_width = get_theme_mod( 'x_renew_sizing_content_width' );

    $content = ( $meta_layout_content       == '' ) ? 'content-sidebar' : $meta_layout_content;
    $site    = ( $meta_layout_site          == '' ) ? 'full-width'      : $meta_layout_site;
    $s_w     = ( $meta_sizing_width         == '' ) ? 88 / 100          : $meta_sizing_width / 100;
    $max     = ( $meta_sizing_max_width     == '' ) ? 1200              : $meta_sizing_max_width;
    $c_w     = ( $meta_sizing_content_width == '' ) ? 72 - 3.20197      : $meta_sizing_content_width - 3.20197; // 1
    $pad     = 16;

    if ( $content == 'full-width' ) {
      if ( $site == 'full-width' ) {
        $output = $max - $pad; // 2
      } elseif ( $site == 'boxed' ) {
        $output = $max * $s_w - $pad; // 2
      }
    } else {
      if ( $site == 'full-width' ) {
        $output = round( $max * ( $c_w / 100 ) - $pad ); // 2
      } elseif ( $site == 'boxed' ) {
        $output = round( $max * ( $c_w / 100 ) * $s_w - $pad ); // 2
      }
    }

    if ( $site == 'full-width' ) {
      if ( $max < 979 * $s_w ) {
        $output = $max - $pad; // 2
      } else {
        if ( $output < ( 979 * $s_w ) ) {
          $output = round( 979 * $s_w - $pad ); // 2
        }
      }
    } elseif ( $site == 'boxed' ) {
      if ( $max * $s_w < 979 * $s_w * $s_w ) {
        $output = $max * $s_w - $pad; // 2
      } else {
        if ( $output < ( 979 * $s_w * $s_w ) ) {
          $output = round( 979 * $s_w * $s_w - $pad ); // 2
        }
      }
    }

    return $output;

  }
  add_action( 'customize_save', 'x_renew_post_thumbnail_width' );
endif;


if ( ! function_exists( 'x_renew_post_thumbnail_width_full' ) ) :
  function x_renew_post_thumbnail_width_full() {

    //
    // 1. Subtract 16px due to padding and border around featured image.
    //

    $meta_layout_site      = get_theme_mod( 'x_renew_layout_site' );
    $meta_sizing_width     = get_theme_mod( 'x_renew_sizing_site_width' );
    $meta_sizing_max_width = get_theme_mod( 'x_renew_sizing_site_max_width' );

    $site = ( $meta_layout_site      == '' ) ? 'full-width' : $meta_layout_site;
    $s_w  = ( $meta_sizing_width     == '' ) ? 88 / 100     : $meta_sizing_width / 100;
    $max  = ( $meta_sizing_max_width == '' ) ? 1200         : $meta_sizing_max_width;
    $pad  = 16;

    if ( $site == 'full-width' ) {
      $output = $max - $pad; // 1
    } elseif ( $site == 'boxed' ) {
      $output = $max * $s_w - $pad; // 1
    }

    return $output;

  }
  add_action( 'customize_save', 'x_renew_post_thumbnail_width_full' );
endif;



// Icon Entry Thumbnail Width
// =============================================================================

if ( ! function_exists( 'x_icon_post_thumbnail_width' ) ) :
  function x_icon_post_thumbnail_width() {

    //
    // 1. Subtract 16px due to padding around featured image.
    //

    $meta_layout_content   = get_theme_mod( 'x_icon_layout_content' );
    $meta_layout_site      = get_theme_mod( 'x_icon_layout_site' );
    $meta_sizing_width     = get_theme_mod( 'x_icon_sizing_site_width' );
    $meta_sizing_max_width = get_theme_mod( 'x_icon_sizing_site_max_width' );

    $content = ( $meta_layout_content   == '' ) ? 'content-sidebar' : $meta_layout_content;
    $site    = ( $meta_layout_site      == '' ) ? 'full-width'      : $meta_layout_site;
    $s_w     = ( $meta_sizing_width     == '' ) ? 88 / 100          : $meta_sizing_width / 100;
    $max     = ( $meta_sizing_max_width == '' ) ? 1200              : $meta_sizing_max_width;
    $pad     = 16;

    if ( $content == 'full-width' ) {
      if ( $site == 'full-width' ) {
        $output = $max - $pad; // 1
      } elseif ( $site == 'boxed' ) {
        $output = $max * $s_w - $pad; // 1
      }
    } else {
      if ( $site == 'full-width' ) {
        $output = round( $max - $pad ); // 1
      } elseif ( $site == 'boxed' ) {
        $output = round( $max * $s_w - $pad ); // 1
      }
    }

    if ( $site == 'full-width' ) {
      if ( $max < 979 * $s_w ) {
        $output = $max - $pad; // 1
      } else {
        if ( $output < ( 979 * $s_w ) ) {
          $output = round( 979 * $s_w - $pad ); // 1
        }
      }
    } elseif ( $site == 'boxed' ) {
      if ( $max * $s_w < 979 * $s_w * $s_w ) {
        $output = $max * $s_w - $pad; // 1
      } else {
        if ( $output < ( 979 * $s_w * $s_w ) ) {
          $output = round( 979 * $s_w * $s_w - $pad ); // 1
        }
      }
    }

    return $output;

  }
  add_action( 'customize_save', 'x_icon_post_thumbnail_width' );
endif;


if ( ! function_exists( 'x_icon_post_thumbnail_width_full' ) ) :
  function x_icon_post_thumbnail_width_full() {

    //
    // 1. Subtract 16px due to padding around featured image.
    //

    $meta_layout_site      = get_theme_mod( 'x_icon_layout_site' );
    $meta_sizing_width     = get_theme_mod( 'x_icon_sizing_site_width' );
    $meta_sizing_max_width = get_theme_mod( 'x_icon_sizing_site_max_width' );

    $site = ( $meta_layout_site      == '' ) ? 'full-width' : $meta_layout_site;
    $s_w  = ( $meta_sizing_width     == '' ) ? 88 / 100     : $meta_sizing_width / 100;
    $max  = ( $meta_sizing_max_width == '' ) ? 1200         : $meta_sizing_max_width;
    $pad  = 16;

    if ( $site == 'full-width' ) {
      $output = $max - $pad; // 1
    } elseif ( $site == 'boxed' ) {
      $output = $max * $s_w - $pad; // 1
    }

    return $output;

  }
  add_action( 'customize_save', 'x_icon_post_thumbnail_width_full' );
endif;



// Cropped Entry Thumbnail Height
// =============================================================================

if ( ! function_exists( 'x_post_thumbnail_height' ) ) :
  function x_post_thumbnail_height( $stack ) {

    if ( $stack == 'integrity' ) {
      $output = round( x_integrity_post_thumbnail_width() * 0.558823529 );
    } elseif ( $stack == 'renew' ) {
      $output = round( x_renew_post_thumbnail_width() * 0.558823529 );
    } elseif ( $stack == 'icon' ) {
      $output = round( x_icon_post_thumbnail_width() * 0.558823529 );
    }

    return $output;

  }
  add_action( 'customize_save', 'x_post_thumbnail_height' );
endif;


if ( ! function_exists( 'x_post_thumbnail_height_full' ) ) :
  function x_post_thumbnail_height_full( $stack ) {

    if ( $stack == 'integrity' ) {
      $output = round( x_integrity_post_thumbnail_width_full() * 0.558823529 );
    } elseif ( $stack == 'renew' ) {
      $output = round( x_renew_post_thumbnail_width_full() * 0.558823529 );
    } elseif ( $stack == 'icon' ) {
      $output = round( x_icon_post_thumbnail_width_full() * 0.558823529 );
    }

    return $output;

  }
  add_action( 'customize_save', 'x_post_thumbnail_height_full' );
endif;