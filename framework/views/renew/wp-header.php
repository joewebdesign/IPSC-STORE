<?php

// =============================================================================
// VIEWS/RENEW/WP-HEADER.PHP
// -----------------------------------------------------------------------------
// Header output for Renew.
// =============================================================================

?>

<?php x_get_view( 'global', '_header' ); ?>

  <!--
  BEGIN #top.site
  -->

  <div id="top" class="site">

    <?php x_get_view( 'global', '_slider-revolution-above' ); ?>

    <header class="<?php x_masthead_class(); ?>" role="banner">
      <?php x_get_view( 'global', '_topbar' ); ?>
      <?php x_get_view( 'global', '_navbar' ); ?>
    </header>

    <?php x_get_view( 'global', '_slider-revolution-below' ); ?>
    <?php x_get_view( 'renew', '_landmark-header' ); ?>