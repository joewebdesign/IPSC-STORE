<?php

// =============================================================================
// FUNCTIONS/GLOBAL/BREADCRUMBS.PHP
// -----------------------------------------------------------------------------
// Sets up the breadcrumb navigation for the theme.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Breadcrumbs
// =============================================================================

// Breadcrumbs
// =============================================================================

if ( ! function_exists( 'x_breadcrumbs' ) ) :
  function x_breadcrumbs() {

    if ( get_theme_mod( 'x_breadcrumb_display' ) ) {

      //
      // 1. Delimiter between crumbs.
      // 2. Output text for the "Home" link.
      // 3. Link to the home page.
      // 4. 1 = show / 0 = don't show.
      // 5. Tag before the current crumb.
      // 6. Tag after the current crumb.
      // 7. Get page title.
      // 8. Get blog title.
      // 9. Get shop title.
      //

      GLOBAL $post;

      $stack           = x_get_stack();
      $delimiter       = '<span class="delimiter"><i class="x-icon-angle-right"></i></span>';                   // 1
      $home            = '<span class="home"><i class="x-icon-home"></i> ' . __( 'Home', '__x__' ) . '</span>'; // 2
      $home_link       = home_url();                                                                            // 3
      $show_current    = 1;                                                                                     // 4
      $before          = '<span class="current">';                                                              // 5
      $after           = '</span>';                                                                             // 6
      $page_title      = get_the_title();                                                                       // 7
      $blog_title      = get_the_title( get_option( 'page_for_posts', true ) );                                 // 8
      $shop_page_title = get_theme_mod( 'x_' . $stack . '_shop_title' );                                        // 9
      if ( function_exists( 'woocommerce_get_page_id' ) ) {
        $shop_page_url  = get_permalink( woocommerce_get_page_id( 'shop' ) );
        $shop_page_link = '<a href="'. $shop_page_url .'">' . $shop_page_title . '</a> ';
      }
     
      if ( is_front_page() ) {
        echo '<div class="x-breadcrumbs">' . $before . $home . $after . '</div>';
      } elseif ( is_home() ) {
        echo '<div class="x-breadcrumbs"><a href="' . $home_link . '">' . $home . '</a> ' . $delimiter . ' ' . $before . $blog_title . $after . '</div>';
      } else {
        echo '<div class="x-breadcrumbs"><a href="' . $home_link . '">' . $home . '</a> ' . $delimiter . ' ';
        if ( is_category() ) {
          $the_cat = get_category( get_query_var( 'cat' ), false );
          if ( $the_cat->parent != 0 ) echo get_category_parents( $the_cat->parent, TRUE, ' ' . $delimiter . ' ' );
          echo $before . single_cat_title( '', false ) . $after;
        } elseif ( function_exists( 'is_product_category' ) && is_product_category() ) {
          echo $shop_page_link . $delimiter . ' ' . $before . single_cat_title( '', false ) . $after;
        } elseif ( function_exists( 'is_product_tag' ) && is_product_tag() ) {
          echo $shop_page_link . $delimiter . ' ' . $before . single_tag_title( '', false ) . $after;
        } elseif ( is_search() ) {
          echo $before . __( 'Search Results for ', '__x__' ) . '&#8220;' . get_search_query() . '&#8221;' . $after;
        } elseif ( is_singular( 'post' ) ) {
          if ( get_option( 'page_for_posts' ) == is_front_page() ) {
            echo ' ' . $before . $page_title . $after;
          } else {
            echo '<a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '" title="' . esc_attr( __( 'See All Posts', '__x__' ) ) . '">' . $blog_title . '</a> ' . $delimiter . ' ' . $before . $page_title . $after;
          }
        } elseif ( is_page_template( 'template-layout-portfolio.php' ) ) {
          echo $before . get_the_title() . $after;
        } elseif ( is_singular( 'x-portfolio' ) ) {
          $parent_id = ( get_post_meta( $post->ID, '_x_portfolio_parent', true ) ) ? get_post_meta( $post->ID, '_x_portfolio_parent', true ) : 'Default';
          $link   = ( $parent_id != 'Default' ) ? get_permalink( $parent_id ) : x_get_first_portfolio_page_link();
          $title  = ( $parent_id != 'Default' ) ? get_the_title( $parent_id ) : x_get_first_portfolio_page_title();
          echo '<a href="' . $link . '" title="' . esc_attr( __( 'See All Posts', '__x__' ) ) . '">' . $title . '</a> ' . $delimiter . ' ' . $before . $page_title . $after;
        } elseif ( function_exists( 'is_product' ) && is_product() ) {
          echo $shop_page_link . $delimiter . ' ' . $before . $page_title . $after;
        } elseif ( is_page() && ! $post->post_parent ) {
          if ( $show_current == 1 ) echo $before . $page_title . $after;
        } elseif ( is_page() && $post->post_parent ) {
          $parent_id   = $post->post_parent;
          $breadcrumbs = array();
          while ( $parent_id ) {
            $page          = get_page( $parent_id );
            $breadcrumbs[] = '<a href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a>';
            $parent_id     = $page->post_parent;
          }
          $breadcrumbs = array_reverse( $breadcrumbs );
          for ( $i = 0; $i < count( $breadcrumbs ); $i++ ) {
            echo $breadcrumbs[$i];
            if ( $i != count( $breadcrumbs ) -1 ) echo ' ' . $delimiter . ' ';
          }
          if ( $show_current == 1 ) echo ' ' . $delimiter . ' ' . $before . $page_title . $after;
        } elseif ( is_tag() ) {
          echo $before . single_tag_title( '', false ) . $after;
        } elseif ( is_author() ) {
          GLOBAL $author;
          $userdata = get_userdata( $author );
          echo $before . __( 'Posts by ', '__x__' ) . '&#8220;' . $userdata->display_name . $after . '&#8221;';
        } elseif ( is_404() ) {
          echo $before . __( '404 (Page Not Found)', '__x__' ) . $after;
        } elseif ( is_archive() ) {
          if ( function_exists( 'is_shop' ) && is_shop() ) {
            echo $before . $shop_page_title . $after;
          } else {
            echo $before . __( 'Archives ', '__x__' ) . $after;
          }
        }
        if ( get_query_var( 'paged' ) ) {
          if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
          echo '<span class="current" style="white-space: nowrap;">(' . __( 'Page', '__x__' ) . ' ' . get_query_var( 'paged' ) . ')</span>';
          if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }
        echo '</div>';
      }

    }

  }
endif;