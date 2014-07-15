<?php

// =============================================================================
// VIEWS/GLOBAL/_NAV-PRIMARY.PHP
// -----------------------------------------------------------------------------
// Outputs the primary nav.
// =============================================================================

$has_primary_nav   = has_nav_menu( 'primary' );
$one_page_nav_meta = get_post_meta( get_the_ID(), '_x_page_one_page_navigation', true );
$one_page_nav      = ( $one_page_nav_meta == '' ) ? 'Deactivated' : $one_page_nav_meta;

?>

<a href="#" class="x-btn-navbar collapsed" data-toggle="collapse" data-target=".x-nav-collapse">
  <i class="x-icon-bars"></i>
  <span class="visually-hidden"><?php _e( 'Navigation', '__x__' ); ?></span>
</a>

<nav class="x-nav-collapse collapse" role="navigation">

  <?php

  if ( $one_page_nav != 'Deactivated' ) :
    wp_nav_menu( array(
      'menu'       => $one_page_nav,
      'container'  => false,
      'menu_class' => 'x-nav x-nav-scrollspy sf-menu'
    ) );
  elseif ( $has_primary_nav ) :
    wp_nav_menu( array(
      'theme_location' => 'primary',
      'container'      => false,
      'menu_class'     => 'x-nav sf-menu'
    ) );
  else :
    echo '<ul class="x-nav"><li><a href="' . home_url( '/' ) . 'wp-admin/nav-menus.php">Assign a Menu</a></li></ul>';
  endif;

  ?>

</nav> <!-- end .x-nav-collapse.collapse -->