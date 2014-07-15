<?php

// =============================================================================
// FUNCTIONS/GLOBAL/STACK-DATA.PHP
// -----------------------------------------------------------------------------
// Get stack information.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Get View
//   02. Get Stack
// =============================================================================

// Get View
// =============================================================================

if ( ! function_exists( 'x_get_view' ) ) :
  function x_get_view( $stack, $base, $extension = '' ) {

    get_template_part( 'framework/views/' . $stack . '/' . $base, $extension );

  }
endif;



// Get Stack
// =============================================================================

if ( ! function_exists( 'x_get_stack' ) ) :
  function x_get_stack() {

    if ( get_theme_mod( 'x_stack' ) == '' ) {
      $stack = 'integrity';
    } else {
      $stack = get_theme_mod( 'x_stack' );
    }

    return $stack;

  }
  add_action( 'customize_save', 'x_get_stack' );
endif;