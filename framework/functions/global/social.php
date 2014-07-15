<?php

// =============================================================================
// FUNCTIONS/GLOBAL/SOCIAL.PHP
// -----------------------------------------------------------------------------
// Various social functions.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Social Output
//   02. Google Authorship Meta
//   03. Google Authorship Author
// =============================================================================

// Social Output
// =============================================================================

if ( ! function_exists( 'x_social_global' ) ) :
  function x_social_global( $position = 'topbar' ) {

    $facebook    = get_theme_mod( 'x_social_facebook' );
    $twitter     = get_theme_mod( 'x_social_twitter' );
    $google_plus = get_theme_mod( 'x_social_googleplus' );
    $linkedin    = get_theme_mod( 'x_social_linkedin' );
    $foursquare  = get_theme_mod( 'x_social_foursquare' );
    $youtube     = get_theme_mod( 'x_social_youtube' );
    $vimeo       = get_theme_mod( 'x_social_vimeo' );
    $instagram   = get_theme_mod( 'x_social_instagram' );
    $pinterest   = get_theme_mod( 'x_social_pinterest' );
    $dribbble    = get_theme_mod( 'x_social_dribbble' );
    $behance     = get_theme_mod( 'x_social_behance' );
    $rss         = get_theme_mod( 'x_social_rss' );

    if ( $position == 'topbar' ) {
      $tooltip = 'data-toggle="tooltip" data-placement="bottom" data-trigger="hover"';
    } else {
      $tooltip = 'data-toggle="tooltip" data-placement="top" data-trigger="hover"';
    }

    $output = '<div class="x-social-global">';

      if ( $facebook )    : $output .= '<a ' . $tooltip . ' href="' . $facebook    . '" class="facebook" title="Facebook" target="_blank"><i class="x-social-facebook"></i></a>'; endif;
      if ( $twitter )     : $output .= '<a ' . $tooltip . ' href="' . $twitter     . '" class="twitter" title="Twitter" target="_blank"><i class="x-social-twitter"></i></a>'; endif;
      if ( $google_plus ) : $output .= '<a ' . $tooltip . ' href="' . $google_plus . '" class="google-plus" title="Google+" target="_blank"><i class="x-social-google-plus"></i></a>'; endif;
      if ( $linkedin )    : $output .= '<a ' . $tooltip . ' href="' . $linkedin    . '" class="linkedin" title="LinkedIn" target="_blank"><i class="x-social-linkedin"></i></a>'; endif;
      if ( $foursquare )  : $output .= '<a ' . $tooltip . ' href="' . $foursquare  . '" class="foursquare" title="Foursquare" target="_blank"><i class="x-social-foursquare"></i></a>'; endif;
      if ( $youtube )     : $output .= '<a ' . $tooltip . ' href="' . $youtube     . '" class="youtube" title="YouTube" target="_blank"><i class="x-social-youtube"></i></a>'; endif;
      if ( $vimeo )       : $output .= '<a ' . $tooltip . ' href="' . $vimeo       . '" class="vimeo" title="Vimeo" target="_blank"><i class="x-social-vimeo"></i></a>'; endif;
      if ( $instagram )   : $output .= '<a ' . $tooltip . ' href="' . $instagram   . '" class="instagram" title="Instagram" target="_blank"><i class="x-social-instagram"></i></a>'; endif;
      if ( $pinterest )   : $output .= '<a ' . $tooltip . ' href="' . $pinterest   . '" class="pinterest" title="Pinterest" target="_blank"><i class="x-social-pinterest"></i></a>'; endif;
      if ( $dribbble )    : $output .= '<a ' . $tooltip . ' href="' . $dribbble    . '" class="dribbble" title="Dribbble" target="_blank"><i class="x-social-dribbble"></i></a>'; endif;
      if ( $behance )     : $output .= '<a ' . $tooltip . ' href="' . $behance     . '" class="behance" title="Behance" target="_blank"><i class="x-social-behance"></i></a>'; endif;
      if ( $rss )         : $output .= '<a ' . $tooltip . ' href="' . $rss         . '" class="rss" title="RSS" target="_blank"><i class="x-social-rss"></i></a>'; endif;

    $output .= '</div>';

    echo $output;

  }
endif;



// Google Authorship Meta
// =============================================================================

if ( ! function_exists( 'x_google_authorship_meta' ) ) :
  function x_google_authorship_meta() {

    $author = sprintf( '%s', get_the_author() );

    $title = sprintf( '%s', get_the_title() );

    $date = sprintf( '<time class="entry-date updated" datetime="%1$s">%2$s</time>',
      esc_attr( get_the_date( 'c' ) ),
      esc_html( get_the_date( 'm.d.Y' ) )
    );

    printf( '<span class="visually-hidden">%1$s%2$s%3$s</span>',
      '<span class="author vcard"><span class="fn">' . $author . '</span></span>',
      '<span class="entry-title">' . $title . '</span>',
      $date
    );

  }
endif;



// Google Authorship Author
// =============================================================================

if ( ! function_exists( 'x_google_authorship_author' ) ) :
  function x_google_authorship_author() {

    GLOBAL $post;

    $show_author_link   = is_front_page() || is_home() || is_singular();
    $google_author_link = get_the_author_meta( 'googleplus', $post->post_author );

    if ( $show_author_link ) :
      if ( $google_author_link ) :
        echo '<link rel="author" href="' . $google_author_link . '">';
      endif;
    endif;

  }
  add_action( 'wp_head', 'x_google_authorship_author' );
endif;