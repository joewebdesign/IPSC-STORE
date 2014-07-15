<?php

// =============================================================================
// FUNCTIONS/GLOBAL/ADMIN/WIDGETS.PHP
// -----------------------------------------------------------------------------
// Sets up the default widget areas for X.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Widget Area Count
//   02. Register Widget Areas
// =============================================================================

// Widget Area Count
// =============================================================================

if ( ! function_exists( 'x_header_widget_areas_count' ) ) :

  function x_header_widget_areas_count() {

    $option = get_theme_mod( 'x_header_widget_areas' );
    $output = ( $option == '' ) ? 2 : $option;

    return $output;

  }

endif;

if ( ! function_exists( 'x_footer_widget_areas_count' ) ) :

  function x_footer_widget_areas_count() {

    $option = get_theme_mod( 'x_footer_widget_areas' );
    $output = ( $option == '' ) ? 3 : $option;

    return $output;

  }

endif;



// Register Widget Areas
// =============================================================================

//
// 1. Default sidebar.
// 2. Widgetbar.
// 3. Footer.
//

if ( ! function_exists( 'x_widgets_init' ) ) :
  function x_widgets_init() {

    register_sidebar( array( // 1
      'name'          => __( 'Main Sidebar', '__x__' ),
      'id'            => 'sidebar-main',
      'description'   => __( 'Appears on posts and pages that include the sidebar.', '__x__' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h4 class="h-widget">',
      'after_title'   => '</h4>',
    ) );

    $i = 0;
    $n = x_header_widget_areas_count();
    while ( $i < $n ) : $i++;
      register_sidebar( array( // 2
        'name'          => __( 'Header ', '__x__' ) . $i,
        'id'            => 'header-' . $i,
        'description'   => __( 'Widgetized header area.', '__x__' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="h-widget">',
        'after_title'   => '</h4>',
      ) );
    endwhile;

    $i = 0;
    $n = x_footer_widget_areas_count();
    while ( $i < $n ) : $i++;
      register_sidebar( array( // 3
        'name'          => __( 'Footer ', '__x__' ) . $i,
        'id'            => 'footer-' . $i,
        'description'   => __( 'Widgetized footer area.', '__x__' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="h-widget">',
        'after_title'   => '</h4>',
      ) );
    endwhile;

  }
  add_action( 'widgets_init', 'x_widgets_init' );
endif;